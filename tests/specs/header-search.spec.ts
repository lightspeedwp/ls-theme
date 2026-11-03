import { test, expect } from '@playwright/test';

// The header search expand-on-click behaviour (assets/js/header-search.js) has no built-in
// core/search equivalent: a collapsed button-only search reveals + focuses its input on first
// activation, then submits normally on a second activation once the input has focus. The
// collapsed input carries tabindex="-1" so a keyboard user tabbing through the header can't land
// on a control they can't see.
test.describe('Header search', () => {
	test('first activation expands and focuses the input, without submitting', async ({ page }) => {
		await page.goto('/');

		const container = page.locator('.site-header__search');
		const input = container.locator('.wp-block-search__input');
		const button = container.locator('.wp-block-search__button');

		await expect(container).not.toHaveClass(/site-header__search--expanded/);
		await expect(input).toHaveAttribute('tabindex', '-1');

		await button.click();

		await expect(container).toHaveClass(/site-header__search--expanded/);
		await expect(input).not.toHaveAttribute('tabindex', '-1');
		await expect(input).toBeFocused();
		// First activation must not navigate away.
		expect(page.url()).toContain('/');
		expect(page.url()).not.toContain('?s=');
	});

	test('second activation submits the search', async ({ page }) => {
		await page.goto('/');

		const container = page.locator('.site-header__search');
		const input = container.locator('.wp-block-search__input');
		const button = container.locator('.wp-block-search__button');

		await button.click();
		await expect(input).toBeFocused();

		await input.fill('Recap of webinar with BugHerd');
		await button.click();

		await expect(page).toHaveURL(/[?&]s=/);
	});

	test('moving focus outside the component collapses it again', async ({ page }) => {
		await page.goto('/');

		const container = page.locator('.site-header__search');
		const input = container.locator('.wp-block-search__input');
		const button = container.locator('.wp-block-search__button');

		await button.click();
		await expect(container).toHaveClass(/site-header__search--expanded/);

		// Move focus somewhere else in the page, outside the search component.
		await page.locator('body').click({ position: { x: 5, y: 5 } });
		await page.waitForTimeout(50); // matches the setTimeout(..., 0) tick in header-search.js

		await expect(container).not.toHaveClass(/site-header__search--expanded/);
		await expect(input).toHaveAttribute('tabindex', '-1');
	});
});
