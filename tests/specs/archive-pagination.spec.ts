import { test, expect } from '@playwright/test';

/**
 * Real, verified archive example with more than one page of results (confirmed live against the
 * dev site before writing this spec): Blog category "News", 62 posts, /category/news/.
 *
 * The "Development" project-tag was originally included too, but /project-tag/development/
 * redirects to a real, unrelated static page ("WordPress Development", /services/development/) —
 * not a paginated project archive — so it's not a valid target for this test and was dropped.
 */
const PAGINATED_ARCHIVES = [{ name: 'blog category archive (News)', url: '/category/news/' }];

for (const { name, url } of PAGINATED_ARCHIVES) {
	test.describe(`Archive pagination — ${name}`, () => {
		test('moving to the next page changes the result set', async ({ page }) => {
			await page.goto(url);

			const titleLocator = page.locator('.wp-block-post-title');
			await expect(titleLocator.first()).toBeVisible();
			const firstPageTitles = await titleLocator.allTextContents();
			expect(firstPageTitles.length).toBeGreaterThan(0);

			const nextLink = page.locator('a.wp-block-query-pagination-next');
			await expect(nextLink).toBeVisible();
			await nextLink.click();

			await expect(page).toHaveURL(/\/page\/2\/?/);
			await expect(titleLocator.first()).toBeVisible();
			const secondPageTitles = await titleLocator.allTextContents();
			expect(secondPageTitles.length).toBeGreaterThan(0);

			// The two pages must not show the exact same set of entries.
			expect(secondPageTitles).not.toEqual(firstPageTitles);
		});

		test('the first page has no "previous" control', async ({ page }) => {
			await page.goto(url);
			await expect(page.locator('a.wp-block-query-pagination-previous')).toHaveCount(0);
		});

		test('a page beyond the first exposes a "previous" control', async ({ page }) => {
			await page.goto(`${url}page/2/`);
			await expect(page.locator('a.wp-block-query-pagination-previous')).toBeVisible();
		});
	});
}
