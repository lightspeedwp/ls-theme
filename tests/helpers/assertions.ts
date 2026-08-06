import { expect, type Page } from '@playwright/test';

/**
 * Generic Playwright assertion helpers for ls-theme.
 *
 * None of these know about any specific page, pattern, or template — every
 * input (selector, text, count, viewport width, expected value) is a
 * parameter. They were extracted from testing the Work Archive template,
 * but apply to any pattern in the theme with the same shape.
 */

/** Asserts a list of text markers appears on the page in that exact order. */
export async function expectSectionOrder(page: Page, markers: string[]) {
	const bodyText = await page.locator('body').innerText();
	const positions = markers.map((marker) => bodyText.indexOf(marker));

	positions.forEach((pos, i) => {
		expect(pos, `Expected to find "${markers[i]}" on the page`).toBeGreaterThan(-1);
	});

	for (let i = 1; i < positions.length; i++) {
		expect(
			positions[i],
			`Expected "${markers[i]}" to appear after "${markers[i - 1]}"`
		).toBeGreaterThan(positions[i - 1]);
	}
}

/** Asserts a selector matches exactly `count` elements. */
export async function expectElementCount(page: Page, selector: string, count: number) {
	await expect(page.locator(selector)).toHaveCount(count);
}

/**
 * Asserts every element matching `cardSelector` contains all of its
 * `requiredParts` (each a sub-selector, e.g. 'a', '.wp-block-post-excerpt').
 */
export async function expectCardParts(page: Page, cardSelector: string, requiredParts: string[]) {
	const cards = page.locator(cardSelector);
	const count = await cards.count();
	expect(count, `Expected at least one "${cardSelector}" card`).toBeGreaterThan(0);

	for (let i = 0; i < count; i++) {
		const card = cards.nth(i);
		for (const part of requiredParts) {
			await expect(
				card.locator(part).first(),
				`Card ${i} (${cardSelector}) is missing required part "${part}"`
			).toBeAttached({ timeout: 2000 });
		}
	}
}

/** Asserts a link, found by its visible text, has the expected href. */
export async function expectLinkHref(page: Page, linkText: string, expectedHref: string) {
	const link = page.getByRole('link', { name: linkText, exact: false });
	await expect(link).toHaveAttribute('href', expectedHref);
}

/**
 * Resizes the viewport to `viewportWidth` and asserts the grid at
 * `gridSelector` shows exactly `expectedColumns` columns — works for both
 * CSS Grid (reads grid-template-columns) and flex-wrap layouts (groups
 * elements by their top offset).
 */
export async function expectGridColumnsAtViewport(
	page: Page,
	gridSelector: string,
	viewportWidth: number,
	expectedColumns: number,
	viewportHeight = 900
) {
	await page.setViewportSize({ width: viewportWidth, height: viewportHeight });

	const grid = page.locator(gridSelector).first();
	const display = await grid.evaluate((el) => getComputedStyle(el).display);

	if (display === 'grid') {
		const columns = await grid.evaluate(
			(el) => getComputedStyle(el).gridTemplateColumns.split(' ').length
		);
		expect(columns, `Expected ${expectedColumns} grid columns at ${viewportWidth}px`).toBe(
			expectedColumns
		);
		return;
	}

	// Flex/columns layout: count distinct items sharing the first row's top offset.
	const tops: number[] = await grid.evaluate((el) =>
		[...el.children].map((child) => Math.round(child.getBoundingClientRect().top))
	);
	const firstRowCount = tops.filter((t) => t === tops[0]).length;
	expect(
		firstRowCount,
		`Expected ${expectedColumns} items in the first row at ${viewportWidth}px`
	).toBe(expectedColumns);
}

/**
 * Asserts a computed CSS property on `selector` equals `expectedValue`,
 * optionally after resizing to `viewportWidth` first.
 */
export async function expectComputedStyle(
	page: Page,
	selector: string,
	property: string,
	expectedValue: string,
	viewportWidth?: number,
	viewportHeight = 900
) {
	if (viewportWidth) {
		await page.setViewportSize({ width: viewportWidth, height: viewportHeight });
	}

	const value = await page
		.locator(selector)
		.first()
		.evaluate((el, prop) => getComputedStyle(el).getPropertyValue(prop).trim(), property);

	expect(
		value,
		`Expected ${selector} to have ${property}: ${expectedValue}${
			viewportWidth ? ` at ${viewportWidth}px` : ''
		}`
	).toBe(expectedValue);
}
