import { test } from '@playwright/test';
import {
	expectSectionOrder,
	expectElementCount,
	expectCardParts,
	expectLinkHref,
	expectGridColumnsAtViewport,
	expectComputedStyle,
} from '../helpers/assertions';

// ILLUSTRATIVE — selectors below are guesses at what work-single will look
// like, based on today's conventions (breadcrumbs, eyebrow badge, CTA
// buttons, a related-projects card row). Swap these for the real selectors
// once the pattern exists. This file exists to show the *shape* of how the
// 6 helpers get used, not to test anything real yet.

const SINGLE_PROJECT_URL = '/portfolio/african-safari-consultants/';

// Skipped: work-single doesn't exist yet, and these selectors/URL are illustrative
// guesses, not real markup. Un-skip once the template is built and selectors are
// swapped for the real ones.
test.describe.skip('Work Single template', () => {
	test('renders sections in order', async ({ page }) => {
		await page.goto(SINGLE_PROJECT_URL);
		await expectSectionOrder(page, ['Home', 'Portfolio', 'Related projects']);
	});

	test('shows exactly 3 related-project cards', async ({ page }) => {
		await page.goto(SINGLE_PROJECT_URL);
		await expectElementCount(page, '.is-style-card-case-study', 3);
	});

	test('each related-project card has its required parts', async ({ page }) => {
		await page.goto(SINGLE_PROJECT_URL);
		await expectCardParts(page, '.is-style-card-case-study', [
			'.wp-block-post-title a',
			'.wp-block-post-excerpt',
			'text=View project',
		]);
	});

	test('the CTA button links to the consultation page', async ({ page }) => {
		await page.goto(SINGLE_PROJECT_URL);
		await expectLinkHref(page, 'Book a consultation', '/free-consultation/');
	});

	test('related-projects grid reflows from 3 to 1 column on mobile', async ({ page }) => {
		await page.goto(SINGLE_PROJECT_URL);
		await expectGridColumnsAtViewport(page, '.related-projects-grid', 1280, 3);
		await expectGridColumnsAtViewport(page, '.related-projects-grid', 375, 1);
	});

	test('the single-project hero keeps its bottom divider border', async ({ page }) => {
		await page.goto(SINGLE_PROJECT_URL);
		await expectComputedStyle(page, '.work-single-hero', 'border-bottom-width', '1px');
	});
});
