import type { FullResult, Reporter, TestCase, TestResult } from '@playwright/test/reporter';
import { createHash } from 'crypto';
import * as path from 'path';
import { addComment, createTask, findTaskByExternalId } from '../helpers/bugherd-client';
import {
	determinePriority,
	extractFailureSignature,
	humanizeSignature,
} from '../helpers/failure-signature';
import { getLocalReporterEmail } from '../helpers/reporter-identity';

// Only tests under this directory can ever create a BugHerd task. Anything
// outside it (e.g. work-archive.spec.ts, work-single.spec.ts) is ignored
// completely, even on failure.
const STANDING_SPECS_DIR = path.join('tests', 'specs', 'standing');

function isStandingSpec(test: TestCase): boolean {
	const relativePath = path.relative(process.cwd(), test.location.file);
	return relativePath.startsWith(STANDING_SPECS_DIR + path.sep);
}

function stableExternalId(specRelativePath: string, signature: string): string {
	const hash = createHash('sha256').update(`${specRelativePath}::${signature}`).digest('hex');
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
		const existing = await findTaskByExternalId(externalId);

		if (existing && !existing.closed_at) {
			console.log(`[bugherd-reporter] Already tracked (open): ${externalId}`);
			return;
		}

		const description = this.buildDescription(test, specRelativePath, signature, messages);
		const priority = determinePriority(specRelativePath, signature, messages);
		const requesterEmail = getLocalReporterEmail();

		const created = await createTask({
			description,
			external_id: externalId,
			tag_names: ['playwright', 'standing-suite'],
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

	private buildDescription(
		test: TestCase,
		specRelativePath: string,
		signature: string,
		messages: string[]
	): string {
		const uniqueMessages = [...new Set(messages)];
		const label = humanizeSignature(signature);
		return (
			`${label}\n\n` +
			`Found by the standing Playwright suite — Spec: ${specRelativePath} — Test: ${test.title}\n\n` +
			`Occurrences (${messages.length}):\n` +
			uniqueMessages.map((m) => `- ${m.split('\n')[0]}`).join('\n')
		);
	}

	async onEnd(_result: FullResult): Promise<void> {
		await Promise.all(this.pending);
	}
}
