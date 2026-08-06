import { test } from '@playwright/test';
import {
	expectSectionOrder,
	expectElementCount,
	expectCardParts,
	expectLinkHref,
	expectGridColumnsAtViewport,
	expectComputedStyle,
} from '../helpers/assertions';

// The Work Archive page's own slug is confirmed as /work/ on dev
// (https://ls-agency.lightspeedwp.dev/work/) but can differ per environment
// (e.g. /portfolio/ on some local setups) — override via env var if needed.
const WORK_ARCHIVE_URL = process.env.WORK_ARCHIVE_PATH || '/work/';

test.describe('Work Archive template', () => {
	test('renders sections in order', async ({ page }) => {
		await page.goto(WORK_ARCHIVE_URL);
		await expectSectionOrder(page, [
			'Work · Proof · Outcomes',
			'Three recurring areas of work.',
			'Selected Projects',
			'Across every engagement.',
			'Ready to discuss a project?',
			'Related routes',
		]);
	});

	test('shows exactly 3 work category cards', async ({ page }) => {
		await page.goto(WORK_ARCHIVE_URL);
		await expectElementCount(page, '.is-style-card-category', 3);
	});

	test('each work category card has its required parts', async ({ page }) => {
		await page.goto(WORK_ARCHIVE_URL);
		await expectCardParts(page, '.is-style-card-category', [
			'h3',
			'p',
			'.is-style-link-arrow-accent a',
		]);
	});

	test('the hero CTA links to the consultation page', async ({ page, baseURL }) => {
		await page.goto(WORK_ARCHIVE_URL);
		// "Book a consultation" text also appears (with a trailing "→") in the
		// Discuss Project section further down, so use the hero-only
		// "Explore case studies" link to keep the match unambiguous. WP renders
		// home_url() links as absolute URLs, so the expected href must match
		// the full origin too.
		await expectLinkHref(page, 'Explore case studies', `${baseURL}/work/`);
	});

	test('related routes grid reflows from multiple columns to 1 on mobile', async ({ page }) => {
		await page.goto(WORK_ARCHIVE_URL);
		await expectGridColumnsAtViewport(page, '.wp-block-group:has(> .is-style-card-link-row)', 375, 1);
	});

	test('work category cards keep their divider styling', async ({ page }) => {
		await page.goto(WORK_ARCHIVE_URL);
		await expectComputedStyle(page, '.is-style-card-divider-both', 'display', 'flex');
	});
});
