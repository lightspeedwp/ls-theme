import { test as base } from '@playwright/test';
import { discoverSiteUrls, type SiteUrl } from '../helpers/site-urls';

type SiteFixtures = {
	siteUrls: SiteUrl[];
};

// DELIBERATE, LONGER-LIVED COVERAGE CAP — not a temporary rollout throttle.
// Most of the site's ~326 URLs (verified via the live sitemap) belong to
// pages that are still being redone; running the standing suite against
// them now would just generate BugHerd tasks for content that's about to
// change anyway. Raise this once most pages are in their final state and
// worth testing in full — until then, a fixed sample is the safer choice
// over either 10 (too little real coverage) or all 326 (floods BugHerd).
const MAX_TEST_URLS = 30;

/**
 * Extends Playwright's base test with a worker-scoped `siteUrls` fixture so
 * every standing spec shares one discovery run per worker instead of
 * re-crawling the site per test.
 */
export const test = base.extend<{}, SiteFixtures>({
	siteUrls: [
		async ({}, use) => {
			if (!process.env.BASE_URL) {
				throw new Error(
					'BASE_URL is not set. Create a .env file in the theme root with BASE_URL=<target site URL>.'
				);
			}

			// Escape hatch for testing/reviewing one specific page — e.g. right
			// after fixing something on it — without running (or filing BugHerd
			// tasks for) the full sampled corpus. Bypasses discovery entirely.
			if (process.env.SINGLE_PAGE_URL) {
				await use([{ url: process.env.SINGLE_PAGE_URL, source: 'synthetic' }]);
				return;
			}

			const urls = await discoverSiteUrls(process.env.BASE_URL);
			await use(urls.slice(0, MAX_TEST_URLS));
		},
		// This setup runs BEFORE any test's own testInfo.setTimeout() call
		// takes effect, so it needs its own budget. discoverSiteUrls does
		// sequential network I/O (sitemap index + every child sitemap, each
		// with its own 10s per-fetch timeout, or a paginated REST fallback if
		// the sitemap is unavailable) — a real site with many child sitemaps
		// can exceed Playwright's bare 30s default before a single test body
		// even runs.
		{ scope: 'worker', timeout: 120_000 },
	],
});

export { expect } from '@playwright/test';
