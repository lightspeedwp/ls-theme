import { test as base } from '@playwright/test';
import { discoverSiteUrls, type SiteUrl } from '../helpers/site-urls';

type SiteFixtures = {
	siteUrls: SiteUrl[];
};

// TEMPORARY ROLLOUT THROTTLE — the standing suite is still being verified
// against staging, so only the first N discovered URLs are actually tested,
// to avoid flooding BugHerd with tasks while specs are being confirmed.
// Raise this back to a value that covers the full site (~320 URLs found via
// sitemap at time of writing) before merging the PR.
const MAX_TEST_URLS = 10;

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
		{ scope: 'worker' },
	],
});

export { expect } from '@playwright/test';
