import { test } from '../../fixtures/site';
import { expectHealthyPage, expectNoPhpErrors } from '../../helpers/page-health';

test.describe('Site health', () => {
	test('every discovered page loads healthily with no PHP error output', async ({
		page,
		siteUrls,
	}, testInfo) => {
		testInfo.setTimeout(testInfo.timeout + siteUrls.length * 1500);
		for (const { url } of siteUrls) {
			await test.step(url, async () => {
				await expectHealthyPage(page, url);
				await expectNoPhpErrors(page);
			});
		}
	});
});
