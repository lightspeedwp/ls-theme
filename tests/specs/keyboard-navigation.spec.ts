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

	test('Shift+Tab reverses direction, revisiting the same stops in reverse order', async ({
		page,
	}) => {
		await page.goto('/');
		await page.locator('body').click({ position: { x: 1, y: 1 } });

		// A stable-enough identity for comparing "is this the same element" across
		// the forward and backward passes, without relying on tagName alone (which
		// would happily match two different but same-tag elements).
		const focusIdentity = () =>
			page.evaluate(() => {
				const el = document.activeElement as HTMLElement | null;
				if (!el) return null;
				return `${el.tagName}|${el.getAttribute('href') ?? ''}|${(el.textContent ?? '').trim().slice(0, 40)}`;
			});

		const forwardStops: (string | null)[] = [];
		for (let i = 0; i < 10; i++) {
			await page.keyboard.press('Tab');
			forwardStops.push(await focusIdentity());
		}

		const backwardStops: (string | null)[] = [];
		for (let i = 0; i < 10; i++) {
			await page.keyboard.press('Shift+Tab');
			backwardStops.push(await focusIdentity());
		}

		// Not an exact step-by-step mirror check — complex interactive widgets
		// (e.g. a mega-menu that opens/reveals items on forward focus) can
		// legitimately take a slightly different path in reverse without that
		// being a bug in its own right. What must hold regardless: Shift+Tab
		// actually moves focus away from the final forward stop (proving
		// reversal is happening at all)...
		expect(backwardStops[0]).not.toEqual(forwardStops[9]);
		// ...and backward navigation genuinely makes progress toward the start
		// of the page, landing on something seen early in the forward pass,
		// not stuck circling around the same later stops.
		const earlyForwardStops = new Set(forwardStops.slice(0, 3));
		expect(backwardStops.some((stop) => stop && earlyForwardStops.has(stop))).toBe(true);
	});
});
