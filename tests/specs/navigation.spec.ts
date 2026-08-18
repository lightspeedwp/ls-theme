import { test, expect } from '@playwright/test';

// core/navigation with mobileMenuBreakpoint: 1024 (patterns/header.php) swaps to the
// `mobile-menu` template part below that width, rather than using core's built-in overlay.
// The mobile-menu part itself uses native <details>/<summary> accordions (parts/mobile-menu.html)
// for each top-level section — no custom JS needed for expand/collapse there.
//
// NOTE: mobile-menu.html's links are currently all `href="#"` placeholders (tracked separately —
// see the internal-links.spec.ts broken-placeholder-link coverage). This test therefore checks
// that the menu opens/expands correctly, not that a specific destination is reachable yet.
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
	});
});
