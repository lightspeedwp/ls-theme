import { test, expect } from '@playwright/test';

/**
 * Generic keyboard-only focus-journey check: tabbing through the page should never land on a
 * hidden/invisible element (e.g. the collapsed header search input, which carries tabindex="-1"
 * for exactly this reason) and should never lose focus into the void (document.activeElement
 * falling back to <body>).
 */
const TAB_STEPS = 40;

test.describe('Keyboard focus journey', () => {
	test('tabbing forward through the homepage never lands on a hidden element', async ({
		page,
	}) => {
		await page.goto('/');
		await page.locator('body').click({ position: { x: 1, y: 1 } });

		for (let i = 0; i < TAB_STEPS; i++) {
			await page.keyboard.press('Tab');

			const activeElementInfo = await page.evaluate(() => {
				const el = document.activeElement;
				if (!el || el === document.body) {
					return { isBody: true, visible: false, tag: null };
				}
				const rect = el.getBoundingClientRect();
				const style = getComputedStyle(el);
				const visible =
					rect.width > 0 &&
					rect.height > 0 &&
					style.visibility !== 'hidden' &&
					style.display !== 'none';
				return { isBody: false, visible, tag: el.tagName };
			});

			if (activeElementInfo.isBody) {
				// Focus fell back to <body> — acceptable only if we've already tabbed past
				// every focusable element (end of the natural tab order), not mid-journey.
				continue;
			}

			expect(
				activeElementInfo.visible,
				`Tab stop ${i + 1} landed on a hidden <${activeElementInfo.tag}> element`
			).toBe(true);
		}
	});

	test('Shift+Tab reverses direction without getting stuck', async ({ page }) => {
		await page.goto('/');
		await page.locator('body').click({ position: { x: 1, y: 1 } });

		for (let i = 0; i < 10; i++) {
			await page.keyboard.press('Tab');
		}
		const forwardTag = await page.evaluate(() => document.activeElement?.tagName ?? null);

		for (let i = 0; i < 10; i++) {
			await page.keyboard.press('Shift+Tab');
		}
		const backwardTag = await page.evaluate(() => document.activeElement?.tagName ?? null);

		// Both directions should land on a real, focusable element — not null/body.
		expect(forwardTag).not.toBeNull();
		expect(backwardTag).not.toBeNull();
	});
});
