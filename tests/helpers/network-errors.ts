import type { Page } from '@playwright/test';
import { isSameOrigin } from './url-utils';

export type NetworkErrorCollector = {
	failedRequests: string[];
	httpErrors: string[];
};

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
		if (isSameOrigin(request.url(), baseURL)) {
			collector.failedRequests.push(
				`${request.url()} (${request.failure()?.errorText ?? 'unknown error'})`
			);
		}
	});

	page.on('response', (response) => {
		if (isSameOrigin(response.url(), baseURL) && response.status() >= 400) {
			collector.httpErrors.push(`${response.url()} (${response.status()})`);
		}
	});

	return collector;
}
