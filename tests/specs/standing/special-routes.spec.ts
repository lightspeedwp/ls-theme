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

test.describe('Special routes', () => {
	test('search renders without error', async ({ page, request }, testInfo) => {
		const baseURL = process.env.BASE_URL!;
		const url = new URL(SEARCH_URL, baseURL).href;

		const browserErrors = watchBrowserErrors(page);
		const networkErrors = watchNetworkErrors(page, baseURL);

		await expectHealthyPage(page, url);
		await expectNoPhpErrors(page);
		expect(browserErrors.consoleErrors).toEqual([]);
		expect(browserErrors.pageErrors).toEqual([]);
		expect(networkErrors.failedRequests).toEqual([]);
		expect(networkErrors.httpErrors).toEqual([]);
		await expectNoSeriousAccessibilityViolations(page, testInfo);
		await page.setViewportSize({ width: 375, height: 900 });
		await expectNoHorizontalOverflow(page, 375);
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
		expect(browserErrors.consoleErrors).toEqual([]);
		expect(browserErrors.pageErrors).toEqual([]);
		expect(networkErrors.failedRequests).toEqual([]);
		expect(networkErrors.httpErrors).toEqual([]);
		await expectNoSeriousAccessibilityViolations(page, testInfo);
		await page.setViewportSize({ width: 375, height: 900 });
		await expectNoHorizontalOverflow(page, 375);
	});
});
