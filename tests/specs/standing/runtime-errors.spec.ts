import { expect } from '@playwright/test';
import { test } from '../../fixtures/site';
import { watchBrowserErrors } from '../../helpers/browser-errors';

test.describe('Runtime errors', () => {
	test('every discovered page loads with no console errors or uncaught exceptions', async ({
		page,
		siteUrls,
	}) => {
		// Installed once, outside the loop — one call per URL would stack a
		// fresh page.on() handler each iteration without ever removing the
		// previous one.
		const errors = watchBrowserErrors(page);

		for (const { url } of siteUrls) {
			await test.step(url, async () => {
				errors.consoleErrors.length = 0;
				errors.pageErrors.length = 0;

				await page.goto(url);

				expect.soft(errors.consoleErrors, `Console errors on ${url}`).toEqual([]);
				expect.soft(errors.pageErrors, `Uncaught exceptions on ${url}`).toEqual([]);
			});
		}
	});
});
