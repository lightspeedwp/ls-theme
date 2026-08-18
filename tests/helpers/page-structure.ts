import { expect, type Page } from '@playwright/test';

/** Asserts the page has exactly one <main> landmark (element or role="main"). */
export async function expectSingleMainLandmark(page: Page): Promise<void> {
	const count = await page.locator('main, [role="main"]').count();
	expect.soft(count, `Expected exactly one <main> landmark on ${page.url()}, found ${count}`).toBe(1);
}

/**
 * Asserts heading levels never skip a step going deeper (e.g. an h2 followed directly by an h4
 * with no h3 between them) — the WCAG 1.3.1 "sensible heading structure" baseline. Does not
 * require exactly one h1; some templates legitimately have zero (e.g. when the page title is
 * rendered as a non-heading element) — that's a separate, more opinionated rule than this checks.
 */
export async function expectSensibleHeadingHierarchy(page: Page): Promise<void> {
	const levels = await page
		.locator('h1, h2, h3, h4, h5, h6')
		.evaluateAll((headings) => headings.map((h) => Number(h.tagName[1])));

	let maxLevelSeen = 0;
	for (const level of levels) {
		// The first heading on the page may reasonably start at any level (e.g. h2 if the page
		// title itself isn't rendered as a heading) — only flag a skip relative to the deepest
		// level already seen, once there's a prior heading to compare against.
		if (maxLevelSeen > 0) {
			expect
				.soft(
					level,
					`Heading level jumped to h${level} on ${page.url()} without an intermediate ` +
						`h${maxLevelSeen + 1} (deepest so far: h${maxLevelSeen})`
				)
				.toBeLessThanOrEqual(maxLevelSeen + 1);
		}
		maxLevelSeen = Math.max(maxLevelSeen, level);
	}
}
