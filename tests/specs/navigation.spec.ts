import { test, expect } from '@playwright/test';
import { expectNoHorizontalOverflow } from '../helpers/responsive';

// core/navigation with mobileMenuBreakpoint: 1024 (patterns/header.php) swaps to the
// `mobile-menu` template part below that width, rather than using core's built-in overlay.
// The mobile-menu part itself uses native <details>/<summary> accordions (parts/mobile-menu.html)
// for each top-level section — no custom JS needed for expand/collapse there.
test.describe('Responsive navigation', () => {
	test('desktop navigation is visible above the 1024px breakpoint', async ({ page }) => {
		await page.setViewportSize({ width: 1280, height: 900 });
		await page.goto('/');

		await expect(page.getByRole('navigation', { name: 'Main Navigation' })).toBeVisible();
		await expect(
			page.getByRole('button', { name: /open menu/i })
		).toBeHidden();
	});

	test('mobile menu toggle is visible below the 1024px breakpoint', async ({ page }) => {
		await page.setViewportSize({ width: 768, height: 900 });
		await page.goto('/');

		const openButton = page.getByRole('button', { name: /open menu/i });
		await expect(openButton).toBeVisible();
	});

	test('opening the mobile menu reveals accordion sections that expand and collapse', async ({
		page,
	}) => {
		await page.setViewportSize({ width: 375, height: 900 });
		await page.goto('/');

		await page.getByRole('button', { name: /open menu/i }).click();

		const mobileMenu = page.locator('.mobile-menu');
		await expect(mobileMenu).toBeVisible();

		const firstAccordion = mobileMenu.locator('details.mobile-menu-accordion').first();
		await expect(firstAccordion).not.toHaveAttribute('open', '');

		await firstAccordion.locator('summary').click();
		await expect(firstAccordion).toHaveAttribute('open', '');

		// Toggling the summary again collapses it.
		await firstAccordion.locator('summary').click();
		await expect(firstAccordion).not.toHaveAttribute('open', '');
	});

	test('closing the mobile menu returns focus and hides the panel', async ({ page }) => {
		await page.setViewportSize({ width: 375, height: 900 });
		await page.goto('/');

		await page.getByRole('button', { name: /open menu/i }).click();
		await expect(page.locator('.mobile-menu')).toBeVisible();

		const closeButton = page.getByRole('button', { name: /close menu/i });
		await closeButton.click();

		await expect(page.locator('.mobile-menu')).toBeHidden();
		await expect(page.getByRole('button', { name: /open menu/i })).toBeFocused();
	});

	// The breakpoint is "mobile below 1024px": 1023px is the last mobile width, 1024px the first
	// desktop one. Checked on both sides of the line so an off-by-one in the breakpoint is caught.
	test('the menu swaps to mobile at 1023px, with no desktop mega-menu showing', async ({ page }) => {
		await page.setViewportSize({ width: 1023, height: 900 });
		await page.goto('/');

		await expect(page.getByRole('button', { name: /open menu/i })).toBeVisible();
		await expect(page.locator('.site-header .wp-block-navigation__container')).toBeHidden();
		await expect(
			page.locator('.site-header .wp-block-navigation__submenu-container').first()
		).toBeHidden();
	});

	test('the desktop navigation is back at exactly 1024px, with no menu toggle', async ({ page }) => {
		await page.setViewportSize({ width: 1024, height: 900 });
		await page.goto('/');

		await expect(page.locator('.site-header .wp-block-navigation__container')).toBeVisible();
		await expect(page.getByRole('button', { name: /open menu/i })).toBeHidden();
	});

	for (const width of [768, 1024]) {
		test(`the header does not overflow horizontally at ${width}px`, async ({ page }) => {
			await page.setViewportSize({ width, height: 900 });
			await page.goto('/');
			await expectNoHorizontalOverflow(page, width);
		});
	}

	test('the open mobile menu does not overflow horizontally at 768px', async ({ page }) => {
		await page.setViewportSize({ width: 768, height: 900 });
		await page.goto('/');

		await page.getByRole('button', { name: /open menu/i }).click();
		await expect(page.locator('.mobile-menu')).toBeVisible();
		await expectNoHorizontalOverflow(page, 768);
	});
});
