import { test } from '../../fixtures/site';
import { expectHealthyPage, expectNoPhpErrors } from '../../helpers/page-health';
import { watchBrowserErrors } from '../../helpers/browser-errors';
import { watchNetworkErrors } from '../../helpers/network-errors';
import { expectNoSeriousAccessibilityViolations } from '../../helpers/accessibility';
import { expectNoHorizontalOverflow } from '../../helpers/responsive';
import { expect } from '@playwright/test';

// Synthetic WordPress routes a sitemap can never cover, since they aren't
// individual content permalinks. Composes the same generic checks used by
// the other standing specs, rather than writing bespoke assertions.
const SEARCH_URL = '/?s=__playwright_no_match_sentinel__';
const MISSING_URL = '/this-path-is-guaranteed-not-to-exist-8f3c1a7e';

// A real search term with exactly one confirmed match, verified live on the
// dev site before writing this spec — see LS-2335.
const KNOWN_SEARCH_TERM = 'Recap of webinar with BugHerd';
const KNOWN_SEARCH_RESULT_TITLE = 'From Design to Launch: Recap of webinar with BugHerd and LightSpeed';

test.describe('Special routes', () => {
	test('search renders without error', async ({ page, request }, testInfo) => {
		const baseURL = process.env.BASE_URL!;
		const url = new URL(SEARCH_URL, baseURL).href;

		const browserErrors = watchBrowserErrors(page);
		const networkErrors = watchNetworkErrors(page, baseURL);

		await expectHealthyPage(page, url);
		await expectNoPhpErrors(page);
		expect.soft(browserErrors.consoleErrors).toEqual([]);
		expect.soft(browserErrors.pageErrors).toEqual([]);
		expect.soft(networkErrors.failedRequests).toEqual([]);
		expect.soft(networkErrors.httpErrors).toEqual([]);
		await expectNoSeriousAccessibilityViolations(page, testInfo);
		await page.setViewportSize({ width: 375, height: 900 });
		await expectNoHorizontalOverflow(page, 375);
	});

	test('search for a known term returns the expected result', async ({ page }) => {
		const url = new URL(
			`/?s=${encodeURIComponent(KNOWN_SEARCH_TERM)}`,
			process.env.BASE_URL!
		).href;
		await page.goto(url);

		await expect(
			page.locator('.wp-block-post-title', { hasText: KNOWN_SEARCH_RESULT_TITLE })
		).toBeVisible();
	});

	test('search for an unmatched term shows the no-results message', async ({ page }) => {
		const url = new URL(SEARCH_URL, process.env.BASE_URL!).href;
		await page.goto(url);

		await expect(page.getByText('No results found for your search.')).toBeVisible();
	});

	test('a missing page renders the 404 template correctly', async ({ page }, testInfo) => {
		const baseURL = process.env.BASE_URL!;
		const url = new URL(MISSING_URL, baseURL).href;

		const browserErrors = watchBrowserErrors(page);
		const networkErrors = watchNetworkErrors(page, baseURL);

		// Expects 404 specifically — this route must not be fed into the
		// "status < 400" corpus used by site-health.spec.ts.
		await expectHealthyPage(page, url, 404);
		await expectNoPhpErrors(page);
		expect.soft(browserErrors.consoleErrors).toEqual([]);
		expect.soft(browserErrors.pageErrors).toEqual([]);
		expect.soft(networkErrors.failedRequests).toEqual([]);
		expect.soft(networkErrors.httpErrors).toEqual([]);
		await expectNoSeriousAccessibilityViolations(page, testInfo);
		await page.setViewportSize({ width: 375, height: 900 });
		await expectNoHorizontalOverflow(page, 375);
	});
});
