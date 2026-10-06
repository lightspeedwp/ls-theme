import AxeBuilder from '@axe-core/playwright';
import { expect, type Page, type TestInfo } from '@playwright/test';

const BLOCKING_IMPACTS = ['serious', 'critical'];

/**
 * Runs a full-page axe-core accessibility scan on the current page.
 * `disableRules` is for a known, separately tracked issue only — pass it with a comment naming
 * the ticket, never to silence a failure.
 */
export async function analyzeAccessibility(page: Page, options: { disableRules?: string[] } = {}) {
	const builder = new AxeBuilder({ page });
	if (options.disableRules?.length) builder.disableRules(options.disableRules);
	return builder.analyze();
}

/**
 * Asserts a page has no serious/critical axe violations, attaching the full
 * scan results to the test report (pass or fail) for diagnosability.
 * This is a baseline gate, not a certification of full accessibility —
 * automated scans only catch a subset of real accessibility issues.
 */
export async function expectNoSeriousAccessibilityViolations(
	page: Page,
	testInfo: TestInfo,
	options: { disableRules?: string[] } = {}
): Promise<void> {
	const results = await analyzeAccessibility(page, options);

	await testInfo.attach(`axe-results-${encodeURIComponent(page.url())}`, {
		body: JSON.stringify(results, null, 2),
		contentType: 'application/json',
	});

	const blocking = results.violations.filter(({ impact }) =>
		BLOCKING_IMPACTS.includes(impact ?? '')
	);

	expect
		.soft(
			blocking,
			`Serious/critical accessibility violations on ${page.url()}:\n` +
				blocking.map((v) => `- ${v.id}: ${v.help} (${v.nodes.length} node(s))`).join('\n')
		)
		.toEqual([]);
}
