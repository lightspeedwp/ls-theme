import { test as base } from '@playwright/test';
import { discoverSiteUrls, type SiteUrl } from '../helpers/site-urls';

type SiteFixtures = {
	siteUrls: SiteUrl[];
};

// TEMPORARY ROLLOUT THROTTLE — the standing suite is still being verified
// against staging, so only the first N discovered URLs are actually tested,
// to avoid flooding BugHerd with tasks while specs are being confirmed.
// Raise this back to a value that covers the full site (~326 URLs found via
// sitemap at time of writing) before merging the PR.
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
