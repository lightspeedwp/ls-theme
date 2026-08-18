import type { Page } from '@playwright/test';
import { isSameOrigin } from './url-utils';

export type NetworkErrorCollector = {
	failedRequests: string[];
	httpErrors: string[];
};

// Mirrors browser-errors.ts's ALLOWED_ERROR_PATTERNS — known, unavoidable
// third-party network noise (e.g. a tracking beacon that legitimately 4xxs)
// shouldn't fail the theme's own network-health check.
const ALLOWED_URL_PATTERNS = [/bugherd/i];

function isAllowedUrl(url: string): boolean {
	return ALLOWED_URL_PATTERNS.some((pattern) => pattern.test(url));
}

/**
 * Installs request/response listeners on `page` and returns a collector of
 * same-origin network failures — both transport-level failures
 * (`requestfailed`) and HTTP error responses (>= 400), since a 404/500 is
 * still a "successfully completed" request from Playwright's perspective.
 * Off-origin (third-party) failures are ignored so an unrelated embed/CDN
 * outage doesn't fail the theme's own tests.
 */
export function watchNetworkErrors(page: Page, baseURL: string): NetworkErrorCollector {
	const collector: NetworkErrorCollector = { failedRequests: [], httpErrors: [] };

	page.on('requestfailed', (request) => {
		if (isAllowedUrl(request.url())) return;
		if (isSameOrigin(request.url(), baseURL)) {
			collector.failedRequests.push(
				`${request.url()} (${request.failure()?.errorText ?? 'unknown error'})`
			);
		}
	});

	page.on('response', (response) => {
		// Skip the main navigation response itself — a route can legitimately
		// be expected to return a non-2xx status (e.g. the 404 template in
		// special-routes.spec.ts). This only flags *sub-resources* on the
		// page (broken images, scripts, CSS, etc.), not the page's own,
		// possibly-intentional, status code.
		if (response.request().isNavigationRequest()) return;
		if (isAllowedUrl(response.url())) return;

		if (isSameOrigin(response.url(), baseURL) && response.status() >= 400) {
			collector.httpErrors.push(`${response.url()} (${response.status()})`);
		}
	});

	return collector;
}
