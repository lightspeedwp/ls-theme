import { test, expect } from '@playwright/test';

/**
 * assets/js/gsap-effects.js gates pointer-tracking hero/spotlight motion behind
 * `canTrackPointer()`, which checks `(prefers-reduced-motion: reduce)` via matchMedia and
 * disables pointer-driven movement when it matches (in addition to the coarse-pointer check).
 * This verifies that gate holds for the home hero section under emulated reduced motion.
 */
test.describe('Reduced motion', () => {
	test.use({ reducedMotion: 'reduce' });

	test('home hero section does not apply pointer-driven motion when reduced motion is requested', async ({
		page,
	}) => {
		await page.goto('/');

		const hero = page.locator('.ls-home-hero-section').first();
		if ((await hero.count()) === 0) {
			test.skip(true, 'No .ls-home-hero-section on the homepage to check.');
		}

		const orb = hero.locator('.ls-home-hero-section__orb--brand').first();
		if ((await orb.count()) === 0) {
			test.skip(true, 'Hero section present but no pointer-tracked orb element found.');
		}

		const styleBefore = await orb.getAttribute('style');

		await hero.hover({ position: { x: 10, y: 10 } });
		await page.mouse.move(200, 200);
		await page.waitForTimeout(200);

		const styleAfter = await orb.getAttribute('style');

		expect(
			styleAfter,
			'Orb inline style changed after pointer movement despite prefers-reduced-motion: reduce'
		).toBe(styleBefore);
	});

	test('reduced motion does not break page load (no console/JS errors)', async ({ page }) => {
		const consoleErrors: string[] = [];
		const pageErrors: string[] = [];
		page.on('console', (message) => {
			if (message.type() === 'error') consoleErrors.push(message.text());
		});
		page.on('pageerror', (error) => pageErrors.push(error.message));

		await page.goto('/');
		await page.mouse.move(300, 300);
		await page.waitForTimeout(200);

		expect(consoleErrors).toEqual([]);
		expect(pageErrors).toEqual([]);
	});
});
