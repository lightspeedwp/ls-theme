import { expect, type APIRequestContext, type Page } from '@playwright/test';
import { isSameOrigin, normalizeUrl } from './url-utils';

const IGNORED_HREF_PREFIXES = ['mailto:', 'tel:', 'javascript:', '#'];

/** Extracts, resolves, and dedupes every internal (same-origin) link on the current page. */
export async function extractInternalLinks(page: Page, baseURL: string): Promise<string[]> {
	const hrefs = await page.locator('a[href]').evaluateAll((links) =>
		links.map((link) => link.getAttribute('href') ?? '')
	);

	// Resolve against the current page's own URL, not the site root — a
	// relative href like "child" on /work/archive/ must resolve to
	// /work/archive/child, not /child.
	const currentUrl = page.url();

	const internal = new Set<string>();
	for (const href of hrefs) {
		if (!href || IGNORED_HREF_PREFIXES.some((prefix) => href.startsWith(prefix))) continue;
		if (!isSameOrigin(href, currentUrl)) continue;

		const normalized = normalizeUrl(href, currentUrl);
		if (normalized && isSameOrigin(normalized, baseURL)) internal.add(normalized);
	}
	return [...internal];
}

/** Asserts `url` resolves with a healthy final status (following redirects). */
export async function checkUrlStatus(request: APIRequestContext, url: string): Promise<void> {
	const response = await request.get(url);
	expect.soft(response.status(), `Expected ${url} to resolve healthily`).toBeLessThan(400);
}

/**
 * Returns every bare `href="#"` placeholder link on the current page — a real, clickable-looking
 * anchor that goes nowhere. Distinct from extractInternalLinks(), which deliberately ignores these
 * (they can't be "resolved") — this instead flags them as a content/implementation defect in
 * their own right: a production link should point somewhere real, or the element shouldn't be an
 * `<a>` at all (e.g. a JS-driven toggle should be a <button>).
 */
export async function findPlaceholderLinks(page: Page): Promise<string[]> {
	return page.locator('a[href="#"]').evaluateAll((links) =>
		links.map((link) => link.textContent?.trim() || '(no visible text)')
	);
}
