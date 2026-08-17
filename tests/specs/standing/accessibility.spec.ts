import { test } from '../../fixtures/site';
import { expectNoSeriousAccessibilityViolations } from '../../helpers/accessibility';

test.describe('Accessibility baseline', () => {
	test('every discovered page has no serious/critical axe violations', async ({
		page,
		siteUrls,
	}, testInfo) => {
		for (const { url } of siteUrls) {
			await test.step(url, async () => {
				await page.goto(url);
				await expectNoSeriousAccessibilityViolations(page, testInfo);
			});
		}
	});
});
