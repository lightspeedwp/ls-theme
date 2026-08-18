import { test } from '../../fixtures/site';
import { expectNoHorizontalOverflow } from '../../helpers/responsive';

const VIEWPORT_WIDTHS = [320, 375, 768, 1024, 1440];

test.describe('Responsive overflow', () => {
	test('no discovered page overflows horizontally at representative widths', async ({
		page,
		siteUrls,
	}) => {
		for (const { url } of siteUrls) {
			await test.step(url, async () => {
				await page.goto(url);
				for (const width of VIEWPORT_WIDTHS) {
					await test.step(`${width}px`, async () => {
						await page.setViewportSize({ width, height: 900 });
						await expectNoHorizontalOverflow(page, width);
					});
				}
			});
		}
	});
});
