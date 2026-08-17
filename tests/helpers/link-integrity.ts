import { expect, type APIRequestContext, type Page } from '@playwright/test';
import { isSameOrigin, normalizeUrl } from './url-utils';

const IGNORED_HREF_PREFIXES = ['mailto:', 'tel:', 'javascript:', '#'];

/** Extracts, resolves, and dedupes every internal (same-origin) link on the current page. */
export async function extractInternalLinks(page: Page, baseURL: string): Promise<string[]> {
	const hrefs = await page.locator('a[href]').evaluateAll((links) =>
		links.map((link) => link.getAttribute('href') ?? '')
	);

	const internal = new Set<string>();
	for (const href of hrefs) {
		if (!href || IGNORED_HREF_PREFIXES.some((prefix) => href.startsWith(prefix))) continue;
		if (!isSameOrigin(href, baseURL)) continue;

		const normalized = normalizeUrl(href, baseURL);
		if (normalized) internal.add(normalized);
	}
	return [...internal];
}

/** Asserts `url` resolves with a healthy final status (following redirects). */
export async function checkUrlStatus(request: APIRequestContext, url: string): Promise<void> {
	const response = await request.get(url);
	expect.soft(response.status(), `Expected ${url} to resolve healthily`).toBeLessThan(400);
}
