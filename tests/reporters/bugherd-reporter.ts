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

/**
 * Groups this test's errors by failure signature, so 10 pages failing on
 * the same underlying bug become one entry, not ten.
 */
function groupErrorsBySignature(result: TestResult): Map<string, string[]> {
	const groups = new Map<string, string[]>();
	for (const error of result.errors) {
		if (!error.message) continue;
		const signature = extractFailureSignature(error.message);
		const existing = groups.get(signature) ?? [];
		existing.push(error.message);
		groups.set(signature, existing);
	}
	return groups;
}

export default class BugherdReporter implements Reporter {
	private pending: Promise<void>[] = [];
	// Serializes find-then-create per external_id. Without this, two tests
	// with the same failure signature running in different Playwright
	// workers can both see "no existing task" at the same moment and both
	// create one — this chains same-key calls so the second always sees the
	// first's result before deciding whether to create.
	private locksByExternalId = new Map<string, Promise<void>>();
	// Records every external_id already resolved (created or found-open)
	// during THIS run. The lock above already guarantees these calls run one
	// at a time, but BugHerd's own lookup endpoint may not immediately return
	// a task this same run just created a moment earlier (read-after-write
	// lag) — a second browser project hitting the identical failure could
	// still ask "does this exist?" and wrongly hear "no". Once we know the
	// answer for an external_id this run, trust that instead of asking
	// BugHerd again. Reset per run (per BugherdReporter instance) — this is
	// a plain in-memory Set, not a file or a persisted store, so it never
	// grows across runs.
	private handledExternalIdsThisRun = new Set<string>();

	onTestEnd(test: TestCase, result: TestResult): void {
		if (!isStandingSpec(test)) return;
		if (result.status !== 'failed' && result.status !== 'timedOut') return;

		// Queue the work rather than awaiting inline — onTestEnd itself isn't
		// async-awaited by Playwright, so we track promises and settle them
		// in onEnd to make sure nothing is dropped when the run finishes.
		this.pending.push(this.reportTest(test, result));
	}

	private async reportTest(test: TestCase, result: TestResult): Promise<void> {
		const specRelativePath = path.relative(process.cwd(), test.location.file);
		const groups = groupErrorsBySignature(result);

		for (const [signature, messages] of groups) {
			try {
				await this.reportSignature(test, specRelativePath, signature, messages);
			} catch (err) {
				// A BugHerd API failure must never crash the test run itself —
				// log and move on, same as any other reporter-side side effect.
				console.error(
					`[bugherd-reporter] Failed to report "${test.title}" (${signature}): ${
						(err as Error).message
					}`
				);
			}
		}
	}

	private async reportSignature(
		test: TestCase,
		specRelativePath: string,
		signature: string,
		messages: string[]
	): Promise<void> {
		const externalId = stableExternalId(specRelativePath, signature);

		// Chain onto any in-flight report for this same external_id so the
		// find-then-create sequence below never overlaps with itself.
		const previous = this.locksByExternalId.get(externalId) ?? Promise.resolve();
		const next = previous.then(() =>
			this.reportSignatureLocked(test, specRelativePath, externalId, signature, messages)
		);
		// Swallow errors here so one failed report doesn't permanently wedge
		// the lock chain for that key — the real error is still logged by
		// reportTest's own try/catch around this call.
		this.locksByExternalId.set(
			externalId,
			next.then(
				() => undefined,
				() => undefined
			)
		);
		return next;
	}

	private async reportSignatureLocked(
		test: TestCase,
		specRelativePath: string,
		externalId: string,
		signature: string,
		messages: string[]
	): Promise<void> {
		if (this.handledExternalIdsThisRun.has(externalId)) {
			console.log(`[bugherd-reporter] Already handled this run: ${externalId}`);
			return;
		}

		const existing = await findTaskByExternalId(externalId);

		if (existing && !existing.closed_at) {
			console.log(`[bugherd-reporter] Already tracked (open): ${externalId}`);
			this.handledExternalIdsThisRun.add(externalId);
			return;
		}

		const description = this.buildDescription(test, specRelativePath, signature, messages);
		const priority = determinePriority(specRelativePath, signature, messages);
		const requesterEmail = getLocalReporterEmail();

		const categoryTags = deriveCategoryTags(specRelativePath, test.title, signature);

		const created = await createTask({
			description,
			external_id: externalId,
			tag_names: [...new Set(['playwright', 'standing-suite', ...categoryTags])],
			priority,
			...(requesterEmail ? { requester_email: requesterEmail } : {}),
		});
		// Mark handled only after a successful create — if createTask throws,
		// leave this unmarked so a later occurrence of the same signature this
		// run still gets a genuine retry rather than being silently skipped.
		this.handledExternalIdsThisRun.add(externalId);

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

	private buildDescription(
		test: TestCase,
		specRelativePath: string,
		signature: string,
		messages: string[]
	): string {
		const uniqueMessages = [...new Set(messages)];
		const label = humanizeSignature(signature);
		const header =
			`${label}\n\n` +
			`Found by the standing Playwright suite — Spec: ${specRelativePath} — Test: ${test.title}\n\n` +
			`Occurrences (${messages.length}):\n`;

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
	 * the actual console/network error text) instead of the previous
	 * behaviour of keeping only the generic first line. That first line is
	 * near-identical boilerplate across unrelated bugs (e.g. every `toEqual`
	 * mismatch reads "expect(received).toEqual(expected) // deep equality"
	 * regardless of what actually differed) — showing only that line is what
	 * made genuinely distinct failures look like duplicates to BugHerd's own
	 * similarity detection and to a human reviewing the task list.
	 *
	 * Still caps per-occurrence length so one runaway stack trace can't
	 * consume the entire task description.
	 */
	private formatOccurrence(message: string): string {
		const cleanedLines = stripAnsi(message).trim().split('\n');
		const shown = cleanedLines.slice(0, MAX_LINES_PER_OCCURRENCE);
		const indented = shown.map((line, i) => (i === 0 ? line : `  ${line}`)).join('\n');
		const truncated =
			cleanedLines.length > MAX_LINES_PER_OCCURRENCE ? '\n  … (occurrence truncated)' : '';
		return `- ${indented}${truncated}`;
	}

	async onEnd(_result: FullResult): Promise<void> {
		await Promise.all(this.pending);
	}
}
