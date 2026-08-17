import { expect, type Page } from '@playwright/test';

/**
 * Generic page-health checks for the standing site-crawl suite. These know
 * nothing about any specific page's content — only that a real, working
 * WordPress response was produced.
 */

// Specific PHP error signatures, not a naive "warning"/"error" substring
// match — ordinary authored copy can legitimately contain those words.
const PHP_ERROR_PATTERNS = [
	/PHP (Warning|Notice|Deprecated|Fatal error|Parse error):/,
	/<b>(Warning|Notice|Deprecated|Fatal error|Parse error)<\/b>:/,
	/Warning: [^<]+ in [^<]+\.php on line \d+/,
	/Notice: [^<]+ in [^<]+\.php on line \d+/,
	/Deprecated: [^<]+ in [^<]+\.php on line \d+/,
	/Fatal error: [^<]+ in [^<]+\.php on line \d+/,
	/Parse error: [^<]+ in [^<]+\.php on line \d+/,
	/There has been a critical error on this website/,
];

/** Navigates to `url` and asserts the final response status is healthy (< 400). */
export async function expectHealthyPage(
	page: Page,
	url: string,
	expectedStatus?: number
): Promise<void> {
	const response = await page.goto(url);
	expect(response, `Expected a response when navigating to ${url}`).not.toBeNull();

	const status = response!.status();
	if (expectedStatus !== undefined) {
		expect(status, `Expected ${url} to return status ${expectedStatus}`).toBe(expectedStatus);
	} else {
		expect(status, `Expected ${url} to return a healthy status (< 400)`).toBeLessThan(400);
	}
}

/** Asserts the current page's HTML contains no recognizable PHP/WordPress fatal error output. */
export async function expectNoPhpErrors(page: Page): Promise<void> {
	const html = await page.content();
	for (const pattern of PHP_ERROR_PATTERNS) {
		const match = html.match(pattern);
		expect(match, `Found a PHP error signature on ${page.url()}: "${match?.[0]}"`).toBeNull();
	}
}
