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

/**
 * Installs console/pageerror listeners on `page` and returns a collector.
 * Must be called before navigation to catch errors from the initial load.
 */
export function watchBrowserErrors(page: Page): BrowserErrorCollector {
	const collector: BrowserErrorCollector = { consoleErrors: [], pageErrors: [] };

	page.on('console', (message) => {
		if (message.type() === 'error' && !isAllowed(message.text())) {
			collector.consoleErrors.push(message.text());
		}
	});

	page.on('pageerror', (error) => {
		if (!isAllowed(error.message)) {
			collector.pageErrors.push(error.message);
		}
	});

	return collector;
}
