import { test } from '../../fixtures/site';
import { expectHealthyPage, expectNoPhpErrors } from '../../helpers/page-health';
import { watchBrowserErrors } from '../../helpers/browser-errors';
import { watchNetworkErrors } from '../../helpers/network-errors';
import { expectNoSeriousAccessibilityViolations } from '../../helpers/accessibility';
import { expectNoHorizontalOverflow } from '../../helpers/responsive';
import { expect } from '@playwright/test';

// Synthetic WordPress routes a sitemap can never cover, since they aren't
// individual content permalinks. Composes the same generic checks used by
// the other standing specs, rather than writing bespoke assertions.
const SEARCH_URL = '/?s=__playwright_no_match_sentinel__';
const MISSING_URL = '/this-path-is-guaranteed-not-to-exist-8f3c1a7e';

/**
 * Finds a real, distinctive word from an actual published post via the public
 * REST API, rather than hardcoding a specific title — a hardcoded term only
 * exists on whichever database happened to have it at the time this spec was
 * written, so it would falsely fail (and file a BugHerd task) against any
 * other developer's own environment, contradicting the standing suite's
 * "runs against any BASE_URL, no per-developer setup" design. Returns null if
 * no suitable post/word is found, so the test can skip instead of failing.
 */
async function findRealSearchableTitle(
	request: import('@playwright/test').APIRequestContext,
	baseURL: string
): Promise<{ word: string; title: string } | null> {
	const res = await request.get(new URL('/wp-json/wp/v2/posts?per_page=5', baseURL).href);
	if (!res.ok()) return null;

	const posts: Array<{ title?: { rendered?: string } }> = await res.json();
	for (const post of posts) {
		const rendered = post.title?.rendered;
		if (!rendered) continue;

		// Strip tags and skip words containing HTML-entity artifacts (&, ;, #) —
		// keeps the chosen search term free of encoding edge cases.
		const plainText = rendered.replace(/<[^>]*>/g, '');
		const word = plainText
			.split(/\s+/)
			.find((candidate) => candidate.length >= 6 && /^[A-Za-z]+$/.test(candidate));

		if (word) return { word, title: plainText.trim() };
	}
	return null;
}

test.describe('Special routes', () => {
	test('search renders without error', async ({ page, request }, testInfo) => {
		const baseURL = process.env.BASE_URL!;
		const url = new URL(SEARCH_URL, baseURL).href;

		const browserErrors = watchBrowserErrors(page);
		const networkErrors = watchNetworkErrors(page, baseURL);

		await expectHealthyPage(page, url);
		await expectNoPhpErrors(page);
		expect.soft(browserErrors.consoleErrors, `Console errors on ${url}`).toEqual([]);
		expect.soft(browserErrors.pageErrors, `Uncaught exceptions on ${url}`).toEqual([]);
		expect.soft(networkErrors.failedRequests, `Failed requests on ${url}`).toEqual([]);
		expect.soft(networkErrors.httpErrors, `HTTP errors on ${url}`).toEqual([]);
		await expectNoSeriousAccessibilityViolations(page, testInfo);
		await page.setViewportSize({ width: 375, height: 900 });
		await expectNoHorizontalOverflow(page, 375);
	});

	test('search for a real, discovered term returns a matching result', async ({ page, request }) => {
		const baseURL = process.env.BASE_URL!;
		const found = await findRealSearchableTitle(request, baseURL);
		if (!found) {
			test.skip(true, 'No published posts with a suitable searchable word were found.');
			return;
		}

		const url = new URL(`/?s=${encodeURIComponent(found.word)}`, baseURL).href;
		await page.goto(url);

		// The chosen word isn't guaranteed unique across posts — .first() is
		// intentional here; the goal is confirming search surfaces a real,
		// relevant result, not exclusivity of the match.
		await expect(
			page.locator('.wp-block-post-title', { hasText: found.word }).first()
		).toBeVisible();
	});

	test('search for an unmatched term shows the no-results message', async ({ page }) => {
		const url = new URL(SEARCH_URL, process.env.BASE_URL!).href;
		await page.goto(url);

		await expect(page.getByText('No results found for your search.')).toBeVisible();
	});

	test('a missing page renders the 404 template correctly', async ({ page }, testInfo) => {
		const baseURL = process.env.BASE_URL!;
		const url = new URL(MISSING_URL, baseURL).href;

		const browserErrors = watchBrowserErrors(page);
		const networkErrors = watchNetworkErrors(page, baseURL);

		// Expects 404 specifically — this route must not be fed into the
		// "status < 400" corpus used by site-health.spec.ts.
		await expectHealthyPage(page, url, 404);
		await expectNoPhpErrors(page);
		expect.soft(browserErrors.consoleErrors, `Console errors on ${url}`).toEqual([]);
		expect.soft(browserErrors.pageErrors, `Uncaught exceptions on ${url}`).toEqual([]);
		expect.soft(networkErrors.failedRequests, `Failed requests on ${url}`).toEqual([]);
		expect.soft(networkErrors.httpErrors, `HTTP errors on ${url}`).toEqual([]);
		await expectNoSeriousAccessibilityViolations(page, testInfo);
		await page.setViewportSize({ width: 375, height: 900 });
		await expectNoHorizontalOverflow(page, 375);
	});
});
