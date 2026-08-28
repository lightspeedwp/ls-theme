import { test, expect } from '@playwright/test';

/**
 * TEMPORARY — LS-2810 verification only.
 *
 * Deliberately triggers synthetic failures shaped exactly like real
 * standing-suite failures, purely to exercise the bugherd-reporter.ts /
 * failure-signature.ts fixes end-to-end and inspect the real BugHerd tasks
 * they produce. No navigation, no real assertions about site health — the
 * live site is never touched by this file.
 *
 * DELETE THIS FILE after verification is complete. Do not merge it.
 */

const FAKE_BASE = 'https://ls-agency.lightspeedwp.dev';

test.describe('LS-2810 verification (temporary, delete after use)', () => {
	// Expect 1 task — tags should include issue:broken-link.
	test('ls2810 verification: broken link check', async () => {
		expect
			.soft(999, `Expected ${FAKE_BASE}/ls2810-fake-broken-link to resolve healthily`)
			.toBeLessThan(400);
	});

	// Expect 1 task — tags should include type:a11y, area:search,
	// template:search-results (title contains "search").
	test('ls2810 verification: search renders without error', async () => {
		expect
			.soft(
				false,
				`Serious/critical accessibility violations on ${FAKE_BASE}/ls2810-fake-search: [{"id": "color-contrast", "impact": "serious"}]`
			)
			.toBe(true);
	});

	// Expect 1 task — tags should include device:mobile, issue:404-error,
	// template:404 (title contains "404").
	test('ls2810 verification: a missing page renders the 404 template correctly', async () => {
		expect
			.soft(
				false,
				`Horizontal overflow at 375px on ${FAKE_BASE}/ls2810-fake-404 (scrollWidth 900 > clientWidth 375). Likely offenders:\n.ls2810-fake-selector`
			)
			.toBe(true);
	});

	// Grouping test: two different fake "pages", identical underlying
	// defect. Neutral titles (no "search"/"404") to isolate the grouping
	// signal from tag verification. Expect these TWO tests to collapse into
	// exactly ONE BugHerd task — that's the actual thing being verified.
	test('ls2810 verification: fake page A returns 500', async () => {
		expect
			.soft(500, `Expected ${FAKE_BASE}/ls2810-fake-grouping-a to return status 500`)
			.toBeLessThan(400);
	});

	test('ls2810 verification: fake page B returns 500', async () => {
		expect
			.soft(500, `Expected ${FAKE_BASE}/ls2810-fake-grouping-b to return status 500`)
			.toBeLessThan(400);
	});
});
