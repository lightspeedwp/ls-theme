import { test } from '@playwright/test';

// SKIPPED — the Yoast FAQ block (patterns/section-faq.php) is not currently live on any
// published page (confirmed: checked ~80 published pages, found it only on an unpublished
// draft). Un-skip once a real published page uses this pattern, and set FAQ_PAGE_URL below.
const FAQ_PAGE_URL = '';

test.describe.skip('FAQ accordion', () => {
	test('questions open and close by click, Enter, and Space', async ({ page }) => {
		await page.goto(FAQ_PAGE_URL);

		const question = page.locator('.schema-faq-section').first();
		const summary = question.locator('.schema-faq-question');

		await summary.click();
		// Real assertions to be filled in once a live page/selectors are confirmed:
		// expect open state via aria-expanded / visible answer text, then repeat via
		// keyboard (Enter, Space), and confirm closing collapses it again.
	});
});
