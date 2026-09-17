import type { Page } from '@playwright/test';

export type BrowserErrorCollector = {
	consoleErrors: string[];
	pageErrors: string[];
};

// Centralized allowlist for known, unavoidable third-party console noise.
// Add new entries here rather than per-spec — keeps the standing suite
// free of per-feature customization.
const ALLOWED_ERROR_PATTERNS = [
	/bugherd/i, // BugHerd's own tracking snippet, present on staging
];

function isAllowed(message: string): boolean {
	return ALLOWED_ERROR_PATTERNS.some((pattern) => pattern.test(message));
}

// Chromium logs this itself (independent of any theme JS) whenever the
// top-level document's own response is >= 400 — e.g. loading the 404
// template. network-errors.ts already exempts the main-frame navigation
// response for the same reason (a route can legitimately return a non-2xx
// status); this mirrors that exemption for the console-side equivalent.
// Tracked via the actual main-frame navigation response's status (reset on
// every navigation) rather than a URL string comparison — a subresource can
// legitimately request the same URL as the page, which a URL-based check
// would wrongly treat as the page's own status and swallow.
function isMainFrameNavigationResponse(response: import('@playwright/test').Response, page: Page): boolean {
	const request = response.request();
	return request.isNavigationRequest() && request.frame() === page.mainFrame();
}

/**
 * Installs console/pageerror listeners on `page` and returns a collector.
 * Must be called before navigation to catch errors from the initial load.
 */
export function watchBrowserErrors(page: Page): BrowserErrorCollector {
	const collector: BrowserErrorCollector = { consoleErrors: [], pageErrors: [] };
	let expectedStatusErrorPrefix: string | null = null;

	page.on('response', (response) => {
		if (!isMainFrameNavigationResponse(response, page)) return;
		expectedStatusErrorPrefix =
			response.status() >= 400
				? `Failed to load resource: the server responded with a status of ${response.status()}`
				: null;
	});

	page.on('console', (message) => {
		if (message.type() !== 'error') return;
		if (isAllowed(message.text())) return;
		if (expectedStatusErrorPrefix && message.text().startsWith(expectedStatusErrorPrefix)) return;
		collector.consoleErrors.push(message.text());
	});

	page.on('pageerror', (error) => {
		if (!isAllowed(error.message)) {
			collector.pageErrors.push(error.message);
		}
	});

	return collector;
}
