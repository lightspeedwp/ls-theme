import { createHash } from 'crypto';
import * as path from 'path';
import { test, expect } from '@playwright/test';
import type { TestCase, TestResult } from '@playwright/test/reporter';
import BugherdReporter from '../reporters/bugherd-reporter';

/**
 * Guards the BugHerd reporter's rules without touching BugHerd: failures are fed straight into a
 * reporter instance with fake TestCase/TestResult objects, and `fetch` is stubbed so any attempt to
 * reach the API is caught. Pure logic, so it only needs to run once (Chromium).
 */
test.beforeEach(({}, testInfo) => {
	test.skip(testInfo.project.name !== 'chromium', 'Reporter logic is browser-independent.');
});

const STANDING_SPEC = path.join(process.cwd(), 'tests', 'specs', 'standing', 'accessibility.spec.ts');
const FEATURE_SPEC = path.join(process.cwd(), 'tests', 'specs', 'mobile-menu.spec.ts');
const MESSAGE = 'Horizontal overflow at 375px on https://example.test/services/ (scrollWidth 400 > clientWidth 375)';

function fakeTest(file: string, projectName: string, width: number): TestCase {
	return {
		location: { file },
		title: 'fake test',
		parent: { project: () => ({ name: projectName, use: { viewport: { width, height: 800 } } }) },
	} as unknown as TestCase;
}

function failed(message = MESSAGE): TestResult {
	return { status: 'failed', errors: [{ message }] } as unknown as TestResult;
}

type Internals = {
	collected: unknown[];
	groupAllFailures(): Map<string, { deviceProject: { name: string } | null }>;
};

function internals(reporter: BugherdReporter): Internals {
	return reporter as unknown as Internals;
}

async function withEnv<T>(singlePage: string | undefined, fn: () => Promise<T>): Promise<T> {
	const previous = process.env.SINGLE_PAGE_URL;
	if (singlePage === undefined) delete process.env.SINGLE_PAGE_URL;
	else process.env.SINGLE_PAGE_URL = singlePage;
	try {
		return await fn();
	} finally {
		if (previous === undefined) delete process.env.SINGLE_PAGE_URL;
		else process.env.SINGLE_PAGE_URL = previous;
	}
}

test.describe('BugHerd reporter', () => {
	test('SINGLE_PAGE_URL runs never collect a failure and never call the BugHerd API', async () => {
		const realFetch = globalThis.fetch;
		let fetchCalls = 0;
		globalThis.fetch = (async () => {
			fetchCalls++;
			throw new Error('BugHerd API must not be reached');
		}) as typeof fetch;

		try {
			await withEnv('https://example.test/services/', async () => {
				const reporter = new BugherdReporter();
				for (const [name, width] of [
					['chromium', 1280],
					['firefox', 1280],
					['webkit', 1280],
					['Mobile Chrome', 393],
					['Mobile Safari', 390],
					['Tablet', 768],
				] as const) {
					reporter.onTestEnd(fakeTest(STANDING_SPEC, name, width), failed());
				}
				expect(internals(reporter).collected, 'nothing may be collected').toHaveLength(0);
				await reporter.onEnd({ status: 'failed' } as never);
			});
		} finally {
			globalThis.fetch = realFetch;
		}

		expect(fetchCalls, 'BugHerd API calls during a SINGLE_PAGE_URL run').toBe(0);
	});

	test('failures outside tests/specs/standing are never collected, even on device projects', async () => {
		await withEnv(undefined, async () => {
			const reporter = new BugherdReporter();
			reporter.onTestEnd(fakeTest(FEATURE_SPEC, 'Mobile Chrome', 393), failed());
			expect(internals(reporter).collected).toHaveLength(0);
		});
	});

	test('desktop browsers share one task id, unchanged from before device projects existed', async () => {
		await withEnv(undefined, async () => {
			const reporter = new BugherdReporter();
			for (const name of ['chromium', 'firefox', 'webkit']) {
				reporter.onTestEnd(fakeTest(STANDING_SPEC, name, 1280), failed());
			}
			const groups = internals(reporter).groupAllFailures();
			expect([...groups.keys()], 'one shared group across desktop browsers').toHaveLength(1);

			const [id] = [...groups.keys()];
			const group = groups.get(id)!;
			expect(group.deviceProject).toBeNull();

			// Legacy id formula: sha256("<posix spec path>::<signature>"). Reproduced here so a
			// change to the desktop id (which would orphan existing open tasks) fails this test.
			const specRelative = path.relative(process.cwd(), STANDING_SPEC).split(path.sep).join('/');
			const signature = (group as unknown as { signature: string }).signature;
			const legacy = `playwright-standing-${createHash('sha256')
				.update(`${specRelative}::${signature}`)
				.digest('hex')
				.slice(0, 16)}`;
			expect(id).toBe(legacy);
		});
	});

	test('each device project gets its own task id, distinct from desktop and from each other', async () => {
		await withEnv(undefined, async () => {
			const reporter = new BugherdReporter();
			reporter.onTestEnd(fakeTest(STANDING_SPEC, 'chromium', 1280), failed());
			reporter.onTestEnd(fakeTest(STANDING_SPEC, 'Mobile Chrome', 393), failed());
			reporter.onTestEnd(fakeTest(STANDING_SPEC, 'Tablet', 768), failed());

			const groups = internals(reporter).groupAllFailures();
			expect(groups.size, 'desktop + Mobile Chrome + Tablet = 3 tasks').toBe(3);
			expect(
				[...groups.values()].map((g) => g.deviceProject?.name ?? 'desktop').sort()
			).toEqual(['Mobile Chrome', 'Tablet', 'desktop']);
		});
	});
});
