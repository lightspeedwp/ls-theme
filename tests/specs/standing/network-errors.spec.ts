import { expect } from '@playwright/test';
import { test } from '../../fixtures/site';
import { watchNetworkErrors } from '../../helpers/network-errors';

test.describe('Network errors', () => {
	test('every discovered page loads with no broken same-origin resources', async ({
		page,
		siteUrls,
	}) => {
		// Installed once, outside the loop — one call per URL would stack a
		// fresh page.on() handler each iteration without ever removing the
		// previous one.
		const errors = watchNetworkErrors(page, process.env.BASE_URL!);

		for (const { url } of siteUrls) {
			await test.step(url, async () => {
				errors.failedRequests.length = 0;
				errors.httpErrors.length = 0;

				await page.goto(url);

				expect.soft(errors.failedRequests, `Failed requests on ${url}`).toEqual([]);
				expect.soft(errors.httpErrors, `HTTP errors on ${url}`).toEqual([]);
			});
		}
	});
});
