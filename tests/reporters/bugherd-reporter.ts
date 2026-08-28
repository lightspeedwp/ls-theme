import type { FullResult, Reporter, TestCase, TestResult } from '@playwright/test/reporter';
import { createHash } from 'crypto';
import * as path from 'path';
import { addComment, createTask, findTaskByExternalId } from '../helpers/bugherd-client';
import {
	deriveCategoryTags,
	determinePriority,
	extractFailureSignature,
	humanizeSignature,
} from '../helpers/failure-signature';
import { getLocalReporterEmail } from '../helpers/reporter-identity';

// Only tests under this directory can ever create a BugHerd task. Anything
// outside it (e.g. header-search.spec.ts, navigation.spec.ts) is ignored
// completely, even on failure.
const STANDING_SPECS_DIR = path.join('tests', 'specs', 'standing');

// BugHerd task descriptions have a hard length limit; stay safely under it
// rather than risk the create-task API call failing outright.
const MAX_DESCRIPTION_LENGTH = 1900;
const TRUNCATION_SUFFIX = '\n… (description truncated)';

// Enough lines to show the real diff (the actual expected/received values,
// the actual console or network error text) without letting one huge stack
// trace consume the whole task description.
const MAX_LINES_PER_OCCURRENCE = 12;

/**
 * Strips ANSI SGR escape codes — Playwright's own error formatting adds
 * these for terminal colour/bold, but BugHerd's UI renders them as either
 * garbage characters or invisible control codes, never as actual colour.
 */
function stripAnsi(text: string): string {
	// eslint-disable-next-line no-control-regex
	return text.replace(/\x1b\[[0-9;]*m/g, '');
}

function isStandingSpec(test: TestCase): boolean {
	const relativePath = path.relative(process.cwd(), test.location.file);
	return relativePath.startsWith(STANDING_SPECS_DIR + path.sep);
}

/**
 * path.relative() returns backslashes on Windows and forward slashes on
 * macOS/Linux — normalize before hashing so the same failure produces the
 * same external_id (and dedupes correctly) regardless of which OS ran it.
 */
function toPosixPath(p: string): string {
	return p.split(path.sep).join('/');
}

function stableExternalId(specRelativePath: string, signature: string): string {
	const hash = createHash('sha256')
		.update(`${toPosixPath(specRelativePath)}::${signature}`)
		.digest('hex');
	return `playwright-standing-${hash.slice(0, 16)}`;
}

type FailureGroup = {
	specRelativePath: string;
	signature: string;
	// Title of the first test that hit this signature — used for tag
	// derivation (e.g. detecting "404"/"search" in the title) and for the
	// description header. When several different pages/tests share a
	// signature, they're the same underlying bug, so one representative
	// title is enough context.
	title: string;
	messages: string[];
};

export default class BugherdReporter implements Reporter {
	// Every failed standing-spec test result, collected as the run goes —
	// nothing is reported to BugHerd until the whole run is finished. This
	// means every task is created with the COMPLETE set of pages it affects
	// from the start, instead of the first page to fail "winning" and every
	// other affected page being silently lost. It also removes the need for
	// any in-run locking/dedup cache: reporting happens once, in one
	// sequential pass, after every worker/browser project has already
	// finished — there's nothing left to race against.
	private collected: Array<{ test: TestCase; result: TestResult }> = [];

	onTestEnd(test: TestCase, result: TestResult): void {
		if (!isStandingSpec(test)) return;
		if (result.status !== 'failed' && result.status !== 'timedOut') return;
		this.collected.push({ test, result });
	}

	async onEnd(_result: FullResult): Promise<void> {
		const groups = this.groupAllFailures();

		for (const [externalId, group] of groups) {
			try {
				await this.reportGroup(externalId, group);
			} catch (err) {
				// A BugHerd API failure must never crash the test run itself —
				// log and move on, same as any other reporter-side side effect.
				console.error(
					`[bugherd-reporter] Failed to report ${externalId}: ${(err as Error).message}`
				);
			}
		}
	}

	/**
	 * Groups every failure from every test in the run by failure signature —
	 * across ALL pages/tests, not just within a single test's own errors.
	 * This is what makes "the same bug on 5 pages" collapse into one group
	 * with 5 occurrences, computed once the full picture is known, rather
	 * than relying on a live BugHerd lookup mid-run to catch repeats.
	 */
	private groupAllFailures(): Map<string, FailureGroup> {
		const groups = new Map<string, FailureGroup>();

		for (const { test, result } of this.collected) {
			const specRelativePath = path.relative(process.cwd(), test.location.file);

			for (const error of result.errors) {
				if (!error.message) continue;

				const signature = extractFailureSignature(error.message);
				const externalId = stableExternalId(specRelativePath, signature);

				const existing = groups.get(externalId);
				if (existing) {
					existing.messages.push(error.message);
				} else {
					groups.set(externalId, {
						specRelativePath,
						signature,
						title: test.title,
						messages: [error.message],
					});
				}
			}
		}

		return groups;
	}

	private async reportGroup(externalId: string, group: FailureGroup): Promise<void> {
		const existing = await findTaskByExternalId(externalId);

		if (existing && !existing.closed_at) {
			console.log(`[bugherd-reporter] Already tracked (open): ${externalId}`);
			return;
		}

		const description = this.buildDescription(group);
		const priority = determinePriority(group.specRelativePath, group.signature, group.messages);
		const requesterEmail = getLocalReporterEmail();
		const categoryTags = deriveCategoryTags(group.specRelativePath, group.title, group.signature);

		const created = await createTask({
			description,
			external_id: externalId,
			tag_names: [...new Set(['playwright', 'standing-suite', ...categoryTags])],
			priority,
			...(requesterEmail ? { requester_email: requesterEmail } : {}),
		});

		if (existing && existing.closed_at) {
			// Previously closed, now reappeared: create a fresh task rather than
			// reopening, but cross-link both so history isn't lost.
			await addComment(
				created.id,
				`This bug was previously tracked and closed as task #${existing.id}. ` +
					`Reopening as a new task since it reappeared in a later run.`
			);
			if (existing.admin_link) {
				console.log(
					`[bugherd-reporter] Reappeared after closure — new task ${created.id}, ` +
						`previous task ${existing.id} (${existing.admin_link})`
				);
			}
		} else {
			console.log(`[bugherd-reporter] Created task ${created.id} (${externalId})`);
		}
	}

	private buildDescription(group: FailureGroup): string {
		const uniqueMessages = [...new Set(group.messages)];
		const label = humanizeSignature(group.signature);
		const header =
			`${label}\n\n` +
			`Found by the standing Playwright suite — Spec: ${group.specRelativePath} — Test: ${group.title}\n\n` +
			`Occurrences (${group.messages.length}):\n`;

		const occurrenceBlocks = uniqueMessages.map((m) => this.formatOccurrence(m));

		let description = header + occurrenceBlocks.join('\n\n');
		if (description.length > MAX_DESCRIPTION_LENGTH) {
			description =
				description.slice(0, MAX_DESCRIPTION_LENGTH - TRUNCATION_SUFFIX.length).trimEnd() +
				TRUNCATION_SUFFIX;
		}
		return description;
	}

	/**
	 * Keeps the real assertion diff (the actual expected-vs-received content,
	 * the actual console/network error text) instead of only a generic first
	 * line, and strips ANSI colour codes that would otherwise render as
	 * garbage in BugHerd's UI. Still caps per-occurrence length so one
	 * runaway stack trace can't consume the entire task description.
	 */
	private formatOccurrence(message: string): string {
		const cleanedLines = stripAnsi(message).trim().split('\n');
		const shown = cleanedLines.slice(0, MAX_LINES_PER_OCCURRENCE);
		const indented = shown.map((line, i) => (i === 0 ? line : `  ${line}`)).join('\n');
		const truncated =
			cleanedLines.length > MAX_LINES_PER_OCCURRENCE ? '\n  … (occurrence truncated)' : '';
		return `- ${indented}${truncated}`;
	}
}
