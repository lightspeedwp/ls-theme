import type { FullResult, Reporter, TestCase, TestResult } from '@playwright/test/reporter';
import { createHash } from 'crypto';
import * as path from 'path';
import { addComment, createTask, findTaskByExternalId } from '../helpers/bugherd-client';
import {
	deriveCategoryTags,
	determinePriority,
	extractFailureSignature,
	humanizeSignature,
	isTestInfrastructureNoise,
	stripAnsi,
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

// BugHerd's description field renders plain text, not Markdown — "## " or
// "**bold**" would show up as literal characters. ALL-CAPS section labels and
// "- " bullet lines are the closest thing to real headings/bullets it has.
const MAX_ARRAY_ITEMS_SHOWN = 5;
const MAX_FALLBACK_SUMMARY_LENGTH = 150;

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
	// Title of the first test that hit this signature — used for the
	// description header, where one representative title is enough context.
	title: string;
	// Every distinct test title that contributed to this signature — a
	// shared signature can span more than one test (e.g. the same broken
	// CSS resource failing both the "search" and "404" checks in
	// special-routes.spec.ts), and route tags below must only fire when
	// ALL of them agree, not just whichever test happened to report first.
	titles: Set<string>;
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
		// SINGLE_PAGE_URL runs are for local/one-off review (often against a
		// local site nobody else can reach) — never let them create a real
		// BugHerd task, regardless of --reporter flags. Structural, not just
		// a documented convention, so it can't be forgotten.
		if (process.env.SINGLE_PAGE_URL) return;
		this.collected.push({ test, result });
	}

	async onEnd(_result: FullResult): Promise<void> {
		const groups = this.groupAllFailures();

		// A small gap between groups, not just within fetchWithRetry's own
		// backoff — spreads out the burst of create-task calls a large run
		// with many distinct failure groups would otherwise send back-to-back,
		// reducing how often the 429 path gets hit in the first place.
		let isFirst = true;
		for (const [externalId, group] of groups) {
			if (!isFirst) await new Promise((resolve) => setTimeout(resolve, 300));
			isFirst = false;

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
				if (isTestInfrastructureNoise(error.message)) {
					console.log(
						`[bugherd-reporter] Skipping test-infrastructure noise (not a site bug): ${error.message
							.split('\n')[0]
							.trim()}`
					);
					continue;
				}

				const signature = extractFailureSignature(error.message);
				const externalId = stableExternalId(specRelativePath, signature);

				const existing = groups.get(externalId);
				if (existing) {
					existing.messages.push(error.message);
					existing.titles.add(test.title);
				} else {
					groups.set(externalId, {
						specRelativePath,
						signature,
						title: test.title,
						titles: new Set([test.title]),
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
		const categoryTags = deriveCategoryTags(
			group.specRelativePath,
			[...group.titles],
			group.signature,
			group.messages
		);

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

	/**
	 * Plain-text pseudo-headings (BugHerd's description field has no Markdown
	 * rendering — "## "/"**" would show up as literal characters) followed by
	 * one "- " bullet per affected page. Replaces the old approach of
	 * repeating the full Jest diff boilerplate (identical across every
	 * occurrence) once per page — that added no information after the first
	 * repetition and pushed the actually-useful content past the truncation
	 * cap.
	 */
	private buildDescription(group: FailureGroup): string {
		const uniqueMessages = [...new Set(group.messages)];
		// Not uppercased: a "resource:"/"broken-link:" label embeds the
		// actual broken URL, and file paths on a real server are
		// case-sensitive — uppercasing it would show a URL that 404s if
		// someone pastes it back to verify the fix (confirmed against a
		// real task: "cropped-LSdev-Favi-Blue-192x192.png" became
		// unrecoverable as "CROPPED-LSDEV-FAVI-BLUE-192X192.PNG").
		const label = humanizeSignature(group.signature);
		const header =
			`${label}\n` +
			`Spec: ${group.specRelativePath} — Test: ${group.title}\n` +
			`Occurrences: ${group.messages.length}\n\n` +
			`AFFECTED PAGES\n`;

		const bulletLines = uniqueMessages.map((m) => this.summarizeOccurrence(group.signature, m));

		let description = header + bulletLines.join('\n');
		if (description.length > MAX_DESCRIPTION_LENGTH) {
			const budget = MAX_DESCRIPTION_LENGTH - TRUNCATION_SUFFIX.length;
			// Cut on a line boundary rather than mid-bullet, so a truncated
			// description never ends on a half-written page/URL.
			const truncatable = description.slice(0, budget);
			const lastNewline = truncatable.lastIndexOf('\n');
			description = (lastNewline > header.length ? truncatable.slice(0, lastNewline) : truncatable)
				.trimEnd() + TRUNCATION_SUFFIX;
		}
		return description;
	}

	/**
	 * Reduces one raw occurrence message down to a single scannable bullet:
	 * the affected page, plus whatever category-specific detail is actually
	 * useful (which links, which resource, which viewport, how many a11y
	 * nodes). Falls back to a short first-line summary for signature shapes
	 * with no dedicated extractor, rather than guessing at a format that
	 * might not match the real message.
	 */
	private summarizeOccurrence(signature: string, rawMessage: string): string {
		const message = stripAnsi(rawMessage);
		const page = this.extractPageUrl(message) ?? 'unknown page';
		const arrayItems = this.extractArrayItems(message);

		if (signature === 'placeholder-links') {
			const items = arrayItems.slice(0, MAX_ARRAY_ITEMS_SHOWN);
			const suffix = items.length > 0 ? ` — ${items.join(', ')}` : '';
			return `- ${page}${suffix}`;
		}

		if (signature.startsWith('resource:')) {
			const items = arrayItems.slice(0, MAX_ARRAY_ITEMS_SHOWN);
			const suffix = items.length > 0 ? ` — ${items.join('; ')}` : '';
			return `- ${page}${suffix}`;
		}

		if (signature.startsWith('axe:')) {
			const nodeCount = [...message.matchAll(/"html":/g)].length || 1;
			return `- ${page} — ${nodeCount} affected node${nodeCount === 1 ? '' : 's'}`;
		}

		if (signature.startsWith('overflow:')) {
			const widthMatch = message.match(/Horizontal overflow at (\d+)px/);
			return `- ${page}${widthMatch ? ` @ ${widthMatch[1]}px` : ''}`;
		}

		if (signature.startsWith('broken-link:')) {
			// checkUrlStatus() checks the link itself, not a page it was found
			// on, so there's no separate "page" — the URL in the message IS
			// what's being reported. A generic trailing-parenthetical regex
			// here would wrongly match Jest's own boilerplate
			// (`expect(received).toBeLessThan(expected)`) instead of the real
			// received status code, so this looks for that specifically.
			const brokenUrlMatch = message.match(/Expected (\S+) to resolve healthily/);
			const receivedMatch = message.match(/Received:\s*(\d+)/);
			const target = brokenUrlMatch ? brokenUrlMatch[1] : page;
			return `- ${target}${receivedMatch ? ` — received ${receivedMatch[1]}` : ''}`;
		}

		// Generic fallback: no dedicated extractor for this signature shape —
		// show the page plus the first non-boilerplate line of the diff,
		// rather than the whole message.
		const firstLine = message
			.trim()
			.split('\n')
			.map((l) => l.trim())
			.find((l) => l.length > 0 && !/^(?:Error: )?expect\(/.test(l) && l !== '- Array []' && l !== '+ Array [');
		const trimmedLine = firstLine
			? firstLine.length > MAX_FALLBACK_SUMMARY_LENGTH
				? `${firstLine.slice(0, MAX_FALLBACK_SUMMARY_LENGTH)}…`
				: firstLine
			: '';
		return `- ${page}${trimmedLine ? ` — ${trimmedLine}` : ''}`;
	}

	/** Best-effort extraction of the page URL a message is about — tries the
	 * specific phrasings this repo's standing-suite helpers use before
	 * falling back to the first "on <url>" it can find. */
	private extractPageUrl(message: string): string | null {
		const patterns = [
			/Failed requests on (\S+)/,
			/Console errors on (\S+)/,
			/HTTP errors on (\S+)/,
			/Horizontal overflow at \d+px on (\S+)/,
			/placeholder href="#" link\(s\) on (\S+)/i,
			/navigating to (https?:\/\/\S+)/,
			/(?:Error: )?[A-Za-z0-9 ]+ on (https?:\/\/\S+)/,
		];
		for (const pattern of patterns) {
			const match = message.match(pattern);
			if (match) return match[1].replace(/[:.,]+$/, '');
		}
		return null;
	}

	/** Pulls the quoted string entries out of a Jest array-diff block (the
	 * `+ Array [ "...", "...", ]` shape every `toEqual([])` assertion in this
	 * suite produces), unescaping doubled quotes. */
	private extractArrayItems(message: string): string[] {
		const arrayBlock = message.match(/Array \[([\s\S]*?)\n\s*[+-]?\s*\]/);
		if (!arrayBlock) return [];
		const items = [...arrayBlock[1].matchAll(/"((?:[^"\\]|\\.)*)"/g)].map((m) =>
			m[1].replace(/\\"/g, '"')
		);
		return [...new Set(items)];
	}
}
