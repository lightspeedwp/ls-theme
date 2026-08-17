import { expect } from '@playwright/test';
import { test } from '../../fixtures/site';
import { watchBrowserErrors } from '../../helpers/browser-errors';

test.describe('Runtime errors', () => {
	test('every discovered page loads with no console errors or uncaught exceptions', async ({
		page,
		siteUrls,
	}) => {
		for (const { url } of siteUrls) {
			await test.step(url, async () => {
				const errors = watchBrowserErrors(page);
				await page.goto(url);

				expect(errors.consoleErrors, `Console errors on ${url}`).toEqual([]);
				expect(errors.pageErrors, `Uncaught exceptions on ${url}`).toEqual([]);
			});
		}
	});
});
