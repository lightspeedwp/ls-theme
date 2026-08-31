import { test } from '../../fixtures/site';
import { expectElementCount } from '../../helpers/assertions';

test.describe('Media integrity', () => {
	test('every image on discovered pages has an alt attribute', async ({ page, siteUrls }, testInfo) => {
		// Default 30s is too short once siteUrls has more than a handful of
		// pages — the loop below visits every one sequentially, and a test
		// killed mid-page.goto() throws "net::ERR_ABORTED; maybe frame was
		// detached?" instead of the recognizable timeout wording, which was
		// wrongly filing BugHerd tasks for what is actually just a timeout.
		testInfo.setTimeout(testInfo.timeout + siteUrls.length * 1500);
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
