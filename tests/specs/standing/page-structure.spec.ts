import { test } from '../../fixtures/site';
import { expectSensibleHeadingHierarchy, expectSingleMainLandmark } from '../../helpers/page-structure';

// Landmark/heading structure across every discovered page. Deliberately excludes the 404
// template's "visible error content" check — that page has no real content yet (a known,
// in-progress gap tracked separately on LS-2335), so only the generic structural checks below
// apply to it via site-health/special-routes; this spec covers ordinary discovered pages only.
test.describe('Page structure', () => {
	test('every discovered page has a single main landmark and a sensible heading hierarchy', async ({
		page,
		siteUrls,
	}) => {
		for (const { url } of siteUrls) {
			await test.step(url, async () => {
				await page.goto(url);
				await expectSingleMainLandmark(page);
				await expectSensibleHeadingHierarchy(page);
			});
		}
	});
});
