import { test } from '../../fixtures/site';
import { expectElementCount } from '../../helpers/assertions';

test.describe('Media integrity', () => {
	test('every image on discovered pages has an alt attribute', async ({ page, siteUrls }) => {
		for (const { url } of siteUrls) {
			await test.step(url, async () => {
				await page.goto(url);
				// Presence of the attribute, not non-empty text — a decorative
				// image correctly uses alt="".
				await expectElementCount(page, 'img:not([alt])', 0);
			});
		}
	});
});
