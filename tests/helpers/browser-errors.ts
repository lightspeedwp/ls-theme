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
// For this specific browser-generated message, ConsoleMessage.location().url
// is the URL of the resource that failed — comparing it to the page's own
// current URL confirms it's the main document's own status, not a broken
// subresource (which would still be correctly caught).
const RESOURCE_STATUS_ERROR_PATTERN = /^Failed to load resource: the server responded with a status of \d+/;

function isExpectedMainDocumentStatusError(message: import('@playwright/test').ConsoleMessage, page: Page): boolean {
	return RESOURCE_STATUS_ERROR_PATTERN.test(message.text()) && message.location().url === page.url();
}

/**
 * Installs console/pageerror listeners on `page` and returns a collector.
 * Must be called before navigation to catch errors from the initial load.
 */
export function watchBrowserErrors(page: Page): BrowserErrorCollector {
	const collector: BrowserErrorCollector = { consoleErrors: [], pageErrors: [] };

	page.on('console', (message) => {
		if (message.type() !== 'error') return;
		if (isAllowed(message.text())) return;
		if (isExpectedMainDocumentStatusError(message, page)) return;
		collector.consoleErrors.push(message.text());
	});

	page.on('pageerror', (error) => {
		if (!isAllowed(error.message)) {
			collector.pageErrors.push(error.message);
		}
	});

	return collector;
}
