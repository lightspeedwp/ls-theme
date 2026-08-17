import { expect, type Page } from '@playwright/test';

type Offender = { selector: string; rightEdge: number };

/**
 * Asserts the document does not overflow its viewport horizontally at the
 * current viewport width. On failure, identifies likely offending elements
 * (those extending past the viewport's right edge) for a more actionable
 * error than a bare scrollWidth/clientWidth mismatch.
 */
export async function expectNoHorizontalOverflow(page: Page, viewportWidth: number): Promise<void> {
	const { scrollWidth, clientWidth } = await page.evaluate(() => ({
		scrollWidth: document.documentElement.scrollWidth,
		clientWidth: document.documentElement.clientWidth,
	}));

	if (scrollWidth <= clientWidth + 1) return;

	const offenders: Offender[] = await page.evaluate((viewport) => {
		const results: Offender[] = [];
		document.querySelectorAll('body *').forEach((el) => {
			const rect = el.getBoundingClientRect();
			if (rect.right > viewport + 1) {
				const selector =
					el.tagName.toLowerCase() +
					(el.id ? `#${el.id}` : '') +
					(el.className && typeof el.className === 'string'
						? `.${el.className.trim().split(/\s+/).join('.')}`
						: '');
				results.push({ selector, rightEdge: Math.round(rect.right) });
			}
		});
		return results.slice(0, 10);
	}, viewportWidth);

	const summary = offenders
		.map((o) => `${o.selector} right edge = ${o.rightEdge}px`)
		.join('\n');

	expect(
		scrollWidth,
		`Horizontal overflow at ${viewportWidth}px on ${page.url()} ` +
			`(scrollWidth ${scrollWidth} > clientWidth ${clientWidth}). Likely offenders:\n${summary}`
	).toBeLessThanOrEqual(clientWidth + 1);
}
