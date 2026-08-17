import { expect } from '@playwright/test';
import { test } from '../../fixtures/site';
import { watchNetworkErrors } from '../../helpers/network-errors';

test.describe('Network errors', () => {
	test('every discovered page loads with no broken same-origin resources', async ({
		page,
		siteUrls,
	}) => {
		for (const { url } of siteUrls) {
			await test.step(url, async () => {
				const errors = watchNetworkErrors(page, process.env.BASE_URL!);
				await page.goto(url);

				expect(errors.failedRequests, `Failed requests on ${url}`).toEqual([]);
				expect(errors.httpErrors, `HTTP errors on ${url}`).toEqual([]);
			});
		}
	});
});
