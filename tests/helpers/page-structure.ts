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

	let previousLevel = 0;
	for (const level of levels) {
		// Compare against the immediately PRECEDING heading, not the deepest
		// ever seen on the page — a global-template-part heading (e.g. an h4/h5
		// in the header's mega-menu) would otherwise permanently raise the
		// "deepest so far" ceiling and silently disable this check for every
		// heading in the actual main content that follows it. Going shallower
		// is always fine; going deeper is only fine by one level at a time.
		if (previousLevel > 0 && level > previousLevel) {
			expect
				.soft(
					level,
					`Heading level jumped from h${previousLevel} to h${level} on ${page.url()} ` +
						`without an intermediate h${previousLevel + 1}`
				)
				.toBeLessThanOrEqual(previousLevel + 1);
		}
		previousLevel = level;
	}
}
