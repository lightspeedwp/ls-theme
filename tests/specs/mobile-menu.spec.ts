import { test, expect, type Locator, type Page } from '@playwright/test';
import { expectNoHorizontalOverflow } from '../helpers/responsive';
import { expectNoSeriousAccessibilityViolations } from '../helpers/accessibility';

/**
 * Mobile menu coverage (LSA-183), run on the device projects only (Mobile Chrome, Mobile Safari,
 * Tablet — see playwright.config.ts). The header and its mobile menu are on every page, so the page
 * under test is `SINGLE_PAGE_URL` when set, else the homepage: one command, one URL, one device.
 *
 * This spec lives outside tests/specs/standing/, so the BugHerd reporter never files a task for it.
 *
 * Colour assertions compare against the phase/accent tokens read from the page itself rather than
 * hardcoded hex values, so they hold whichever style variation (light or Dark) the target site is
 * currently on.
 */
const START_URL = process.env.SINGLE_PAGE_URL ?? '/';

const ACCORDIONS = ['Work', 'Solutions', 'Services', 'Pricing', 'Insights', 'About'];
const PHASES = ['discover', 'create', 'build', 'launch', 'grow', 'evolve'];

// WCAG 2.2 SC 2.5.8 (Target Size, Minimum, AA).
const MIN_TARGET_PX = 24;

async function openMobileMenu(page: Page): Promise<Locator> {
	await page.goto(START_URL);
	await page.getByRole('button', { name: /open menu/i }).click();
	const menu = page.locator('.mobile-menu');
	await expect(menu).toBeVisible();
	return menu;
}

function accordion(menu: Locator, name: string): Locator {
	return menu
		.locator('details.mobile-menu-accordion')
		.filter({ has: menu.page().locator('summary', { hasText: new RegExp(`^${name}$`) }) });
}

async function expandAccordion(menu: Locator, name: string): Promise<Locator> {
	const details = accordion(menu, name);
	await expect(details, `"${name}" accordion should exist`).toHaveCount(1);
	await details.locator('summary').click();
	await expect(details).toHaveAttribute('open', '');
	return details;
}

/** Resolves a CSS custom property to the exact computed rgb() colour the browser paints. */
async function resolveColor(page: Page, cssVar: string): Promise<string> {
	return page.evaluate((v) => {
		const probe = document.createElement('span');
		probe.style.color = `var(${v})`;
		document.body.appendChild(probe);
		const color = getComputedStyle(probe).color;
		probe.remove();
		return color;
	}, cssVar);
}

/** Alpha channel of a computed colour string, whatever notation the browser reports it in. */
function alphaOf(color: string): number {
	if (color === 'transparent') return 0;
	const slash = color.match(/\/\s*([\d.]+%?)\s*\)/);
	if (slash) return slash[1].endsWith('%') ? parseFloat(slash[1]) / 100 : parseFloat(slash[1]);
	const rgba = color.match(/^rgba\(\s*[\d.]+[\s,]+[\d.]+[\s,]+[\d.]+[\s,]+([\d.]+)\s*\)$/);
	if (rgba) return parseFloat(rgba[1]);
	return 1;
}

type Box = { x: number; y: number; width: number; height: number };

/** Every visible tap target in the open menu: service rows (stretched link) or plain links. */
async function tapTargets(menu: Locator): Promise<Box[]> {
	return menu.evaluate((root) => {
		const seen = new Set<Element>();
		const boxes: { x: number; y: number; width: number; height: number }[] = [];
		root.querySelectorAll('a[href]').forEach((a) => {
			const el = a.closest('.is-style-mega-menu-item-service') ?? a;
			if (seen.has(el)) return;
			seen.add(el);
			const r = el.getBoundingClientRect();
			if (r.width > 0 && r.height > 0) boxes.push({ x: r.x, y: r.y, width: r.width, height: r.height });
		});
		return boxes;
	});
}

/**
 * True when a MIN_TARGET_PX-diameter circle centred on `target` overlaps no other target
 * (WCAG 2.5.8's spacing exception, measured as a circle, not a square).
 */
function hasSpacingException(target: Box, all: Box[]): boolean {
	const cx = target.x + target.width / 2;
	const cy = target.y + target.height / 2;
	const radius = MIN_TARGET_PX / 2;
	return all.every((o) => {
		const isSelf =
			Math.abs(o.x - target.x) < 1 && Math.abs(o.y - target.y) < 1 && Math.abs(o.width - target.width) < 1;
		if (isSelf) return true;
		const nearestX = Math.max(o.x, Math.min(cx, o.x + o.width));
		const nearestY = Math.max(o.y, Math.min(cy, o.y + o.height));
		return Math.hypot(cx - nearestX, cy - nearestY) >= radius;
	});
}

function isValidHref(href: string | null): boolean {
	if (!href) return false;
	if (href === '#' || href.startsWith('#') || href.toLowerCase().startsWith('javascript:')) return false;
	return href.startsWith('/') || /^https?:\/\//.test(href);
}

test.describe('Mobile menu dropdowns', () => {
	for (const name of ACCORDIONS) {
		test.describe(`${name} dropdown`, () => {
			test('opens and closes', async ({ page }) => {
				const menu = await openMobileMenu(page);
				const details = accordion(menu, name);
				await expect(details).not.toHaveAttribute('open', '');

				await details.locator('summary').click();
				await expect(details).toHaveAttribute('open', '');

				await details.locator('summary').click();
				await expect(details).not.toHaveAttribute('open', '');
			});

			test('links are visible, inside the viewport and have real hrefs', async ({ page }) => {
				const menu = await openMobileMenu(page);
				const details = await expandAccordion(menu, name);

				// Links in the panel only — the summary's own link is the section heading.
				const links = details.locator(':scope > :not(summary) a[href]');
				const count = await links.count();
				expect(count, `"${name}" should list at least one link`).toBeGreaterThan(0);

				const viewportWidth = page.viewportSize()!.width;
				const problems: string[] = [];

				for (let i = 0; i < count; i++) {
					const link = links.nth(i);
					const label = (await link.textContent())?.trim() || `link #${i + 1}`;
					const href = await link.getAttribute('href');

					if (!isValidHref(href)) problems.push(`"${label}" has an invalid href (${href})`);

					await link.scrollIntoViewIfNeeded();
					if (!(await link.isVisible())) {
						problems.push(`"${label}" is not visible`);
						continue;
					}

					const box = await link.boundingBox();
					if (!box || box.x < 0 || box.x + box.width > viewportWidth + 1) {
						problems.push(
							`"${label}" sits outside the ${viewportWidth}px viewport (x=${box?.x}, w=${box?.width})`
						);
					}
				}

				expect(problems, `Problems in the "${name}" dropdown:\n${problems.join('\n')}`).toEqual([]);
			});

			test('tap targets meet WCAG 2.5.8 (24x24px, or spaced apart)', async ({ page }) => {
				const menu = await openMobileMenu(page);
				const details = await expandAccordion(menu, name);

				const links = details.locator(':scope > :not(summary) a[href]');
				const count = await links.count();
				const all = await tapTargets(menu);
				const problems: string[] = [];

				for (let i = 0; i < count; i++) {
					const link = links.nth(i);
					const label = (await link.textContent())?.trim() || `link #${i + 1}`;
					await link.scrollIntoViewIfNeeded();

					// Service rows stretch their link over the whole row (a::after), so the row is
					// the real tap target; plain links are measured directly.
					const row = link.locator('xpath=ancestor::*[contains(@class,"is-style-mega-menu-item-service")][1]');
					const target = (await row.count()) > 0 ? await row.boundingBox() : await link.boundingBox();
					if (!target) {
						problems.push(`"${label}" has no measurable tap target`);
						continue;
					}

					if (target.height < MIN_TARGET_PX || target.width < MIN_TARGET_PX) {
						// WCAG 2.5.8's spacing exception: an undersized target passes when a 24px
						// circle centred on it overlaps no other target.
						if (!hasSpacingException(target, await tapTargets(menu))) {
							problems.push(
								`"${label}" tap target is ${Math.round(target.width)}x${Math.round(target.height)}px ` +
									`and is closer than ${MIN_TARGET_PX}px to another target`
							);
						}
					}
				}

				expect(
					problems,
					`Tap-target problems in the "${name}" dropdown (${all.length} targets):\n${problems.join('\n')}`
				).toEqual([]);
			});

			test('does not overflow the viewport horizontally', async ({ page }) => {
				const menu = await openMobileMenu(page);
				await expandAccordion(menu, name);
				await expectNoHorizontalOverflow(page, page.viewportSize()!.width);
			});
		});
	}

	test('Services lists all six phase groups with matching links', async ({ page }) => {
		const menu = await openMobileMenu(page);
		const services = await expandAccordion(menu, 'Services');

		for (const phase of PHASES) {
			await test.step(phase, async () => {
				const group = services.locator(`.ls-services-phase-links.ls-phase-${phase}`);
				await expect(group, `.ls-phase-${phase} group`).toHaveCount(1);

				// The phase's own heading link sits in the same wrapper, just before the group.
				const heading = group.locator(`xpath=../descendant::a[@href="/services/${phase}/"]`);
				await expect(heading, `heading link to /services/${phase}/`).toHaveCount(1);

				const rows = group.locator('> .is-style-mega-menu-item-service a[href]');
				const count = await rows.count();
				expect(count, `${phase} should list at least one service`).toBeGreaterThan(0);
				for (let i = 0; i < count; i++) {
					const href = await rows.nth(i).getAttribute('href');
					expect(href, `${phase} service link`).toMatch(/^\/services\/[a-z0-9-]+\/$/);
				}
			});
		}
	});
});

test.describe('Mobile menu service rows (LSA-171)', () => {
	test('label clears the accent rail in every dropdown', async ({ page }) => {
		const menu = await openMobileMenu(page);
		for (const name of ACCORDIONS) await expandAccordion(menu, name);

		// Floor: the desktop mega menu's own row padding (spacing|10). The mobile rows were once
		// squeezed to spacing|5, which left the label almost touching the 3px rail.
		const floor = await page.evaluate(() => {
			const probe = document.createElement('span');
			probe.style.paddingLeft = 'var(--wp--preset--spacing--10)';
			document.body.appendChild(probe);
			const px = parseFloat(getComputedStyle(probe).paddingLeft);
			probe.remove();
			return px;
		});

		const rows = await menu.locator('.is-style-mega-menu-item-service').evaluateAll((els) =>
			els.map((el) => {
				const cs = getComputedStyle(el);
				return {
					text: el.textContent?.trim().slice(0, 40) ?? '',
					paddingLeft: parseFloat(cs.paddingLeft),
					rail: parseFloat(cs.borderLeftWidth),
				};
			})
		);

		expect(rows.length, 'service-style rows in the mobile menu').toBeGreaterThan(0);
		const tooTight = rows.filter((r) => r.paddingLeft <= r.rail || r.paddingLeft < floor);
		expect(
			tooTight,
			`Rows whose padding-left is under ${floor}px or does not clear the rail:\n` +
				tooTight.map((r) => `- "${r.text}": padding-left ${r.paddingLeft}px, rail ${r.rail}px`).join('\n')
		).toEqual([]);
	});

	test('a tap leaves no sticky tint behind', async ({ page, hasTouch }) => {
		test.skip(!hasTouch, 'Tap behaviour needs a touch project.');
		const menu = await openMobileMenu(page);
		const services = await expandAccordion(menu, 'Services');

		// Stop the tap navigating away so the row can be inspected afterwards.
		await page.evaluate(() => document.addEventListener('click', (e) => e.preventDefault(), true));

		const row = services.locator('.ls-phase-build > .is-style-mega-menu-item-service').first();
		await row.tap();
		// Move the (emulated) pointer away and let the background transition finish.
		await page.waitForTimeout(400);

		const state = await row.evaluate((el) => {
			const cs = getComputedStyle(el);
			return { rail: cs.borderLeftColor, background: cs.backgroundColor };
		});
		expect(alphaOf(state.rail), `rail colour after a tap (${state.rail})`).toBe(0);
		expect(alphaOf(state.background), `background after a tap (${state.background})`).toBe(0);
	});
});

// Forcing :active / :focus-visible needs the Chrome DevTools Protocol, which only Chromium has.
test.describe('Mobile menu pressed state colours (Chromium only)', () => {
	test.beforeEach(({ browserName }) => {
		test.skip(browserName !== 'chromium', 'CSS.forcePseudoState is Chromium-only.');
	});

	async function forceState(page: Page, target: Locator, pseudo: 'active' | 'focus-visible') {
		const marker = `lsa-183-${pseudo}`;
		await target.evaluate((el, m) => el.setAttribute('data-lsa-force', m), marker);
		const client = await page.context().newCDPSession(page);
		await client.send('DOM.enable');
		await client.send('CSS.enable');
		const { root } = await client.send('DOM.getDocument', { depth: -1 });
		const { nodeId } = await client.send('DOM.querySelector', {
			nodeId: root.nodeId,
			selector: `[data-lsa-force="${marker}"]`,
		});
		await client.send('CSS.forcePseudoState', { nodeId, forcedPseudoClasses: [pseudo] });
	}

	async function expectPressed(page: Page, row: Locator, expectedColor: string, what: string) {
		await expect
			.poll(async () => row.evaluate((el) => getComputedStyle(el).borderLeftColor), {
				message: `${what}: rail colour`,
			})
			.toBe(expectedColor);
		const tint = await row.evaluate((el) => getComputedStyle(el).backgroundColor);
		expect(alphaOf(tint), `${what}: background tint (${tint})`).toBeGreaterThan(0);
		await expect
			.poll(async () => row.locator('a').evaluate((el) => getComputedStyle(el).color), {
				message: `${what}: link colour`,
			})
			.toBe(expectedColor);
	}

	for (const pseudo of ['active', 'focus-visible'] as const) {
		for (const phase of PHASES) {
			test(`${phase} row uses the ${phase} phase colour when :${pseudo}`, async ({ page }) => {
				const menu = await openMobileMenu(page);
				const services = await expandAccordion(menu, 'Services');
				const row = services.locator(`.ls-phase-${phase} > .is-style-mega-menu-item-service`).first();
				await row.scrollIntoViewIfNeeded();

				const expected = await resolveColor(page, `--wp--custom--color--phase--${phase}`);
				await forceState(page, pseudo === 'active' ? row : row.locator('a'), pseudo);
				await expectPressed(page, row, expected, `${phase} :${pseudo}`);
			});
		}
	}

	test('rows without a phase fall back to the neutral accent colour when :active', async ({ page }) => {
		const menu = await openMobileMenu(page);
		const solutions = await expandAccordion(menu, 'Solutions');
		const row = solutions.locator('.ls-simple-submenu-links > .is-style-mega-menu-item-service').first();
		await expect(row, 'a plain (non-phase) service row in Solutions').toHaveCount(1);
		await row.scrollIntoViewIfNeeded();

		const expected = await resolveColor(page, '--wp--custom--color--link--accent');
		await forceState(page, row, 'active');
		await expect
			.poll(async () => row.evaluate((el) => getComputedStyle(el).borderLeftColor), {
				message: 'neutral :active rail colour',
			})
			.toBe(expected);
	});
});

test.describe('Mobile menu accessibility', () => {
	// KNOWN ISSUE, tracked separately (not fixed by LSA-183): every accordion's <summary> contains a
	// link (`summary > a`), which axe reports as nested-interactive / no-focusable-content. The
	// first test below scans everything else with that one rule off; the second keeps the issue
	// itself visible as an expected failure, so it flips (and says so) the day the markup is fixed.
	const KNOWN_ISSUE_RULES = ['nested-interactive'];

	test('has no other serious/critical axe violations with the menu open and Services expanded', async ({
		page,
	}, testInfo) => {
		const menu = await openMobileMenu(page);
		await expandAccordion(menu, 'Services');
		await expectNoSeriousAccessibilityViolations(page, testInfo, { disableRules: KNOWN_ISSUE_RULES });
	});

	test('accordion summaries do not contain links (known issue: nested-interactive)', async ({
		page,
	}, testInfo) => {
		test.fail(true, 'Known issue: each accordion <summary> wraps a link. Remove this once fixed.');
		const menu = await openMobileMenu(page);
		await expandAccordion(menu, 'Services');
		await expectNoSeriousAccessibilityViolations(page, testInfo);
	});
});
