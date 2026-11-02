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

	// Measure clientWidth directly rather than trusting the requested
	// viewportWidth — a browser that reserves scrollbar width can make the
	// two differ, which would otherwise make a real overflow report zero
	// offenders.
	const offenders: Offender[] = await page.evaluate(() => {
		const viewport = document.documentElement.clientWidth;
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
	});

	const summary = offenders
		.map((o) => `${o.selector} right edge = ${o.rightEdge}px`)
		.join('\n');

	expect
		.soft(
			scrollWidth,
			`Horizontal overflow at ${viewportWidth}px on ${page.url()} ` +
				`(scrollWidth ${scrollWidth} > clientWidth ${clientWidth}). Likely offenders:\n${summary}`
		)
		.toBeLessThanOrEqual(clientWidth + 1);
}

type ContainerKind = 'viewport' | 'button-row' | 'panel';

type ElementFinding = {
	section: string;
	text: string;
	kind: ContainerKind;
	side: 'left' | 'right' | 'left+right';
	elementWidth: number;
	containerWidth: number;
	overshoot: number;
};

/**
 * Asserts no button sits outside the viewport, or outside its own button row or bordered /
 * backgrounded panel, by more than 1px on the left or right. The document-level check above
 * misses both cases: a button spilling out of the left of a panel doesn't widen the document,
 * and neither does one spilling out of a panel that is itself narrower than the page.
 *
 * Each button is one element: the `.wp-block-button__link`, or the `.wp-block-button` wrapper
 * only when it holds no link. A button is compared against the viewport, its nearest
 * `.wp-block-buttons` row and its nearest panel, each separately.
 *
 * Skipped: zero-width/zero-height elements, and everything inside `.mobile-menu` (the off-screen
 * drawer from parts/mobile-menu.html; its open state is covered by mobile-menu.spec.ts), and
 * buttons inside a container that is really scrolling sideways (`overflow-x: auto|scroll` with
 * content wider than the box), whose off-screen buttons are intentional.
 *
 * The failure message format is a contract with failure-signature.ts (BugHerd grouping) — see
 * specs/003-button-overflow-coverage/contracts/failure-message.md.
 */
export async function expectNoElementOverflow(page: Page, viewportWidth: number): Promise<void> {
	const findings: ElementFinding[] = await page.evaluate(() => {
		const TOLERANCE = 1;
		const viewport = document.documentElement.clientWidth;

		const clean = (value: string | null | undefined, max: number) =>
			(value ?? '').replace(/\s+/g, ' ').replace(/\|/g, '/').trim().slice(0, max);

		const isTransparent = (colour: string) => {
			if (colour === 'transparent') return true;
			const legacy = colour.match(/^rgba?\(([^)]+)\)$/);
			if (legacy) {
				const parts = legacy[1].split(/[\s,\/]+/).filter(Boolean);
				return parts.length === 4 && parseFloat(parts[3]) === 0;
			}
			const modern = colour.match(/\/\s*([\d.]+%?)\s*\)$/);
			return modern ? parseFloat(modern[1]) === 0 : false;
		};

		const isPanel = (el: Element) => {
			const style = getComputedStyle(el);
			const bordered = ['Top', 'Right', 'Bottom', 'Left'].some((side) => {
				const borderStyle = style.getPropertyValue(`border-${side.toLowerCase()}-style`);
				return (
					parseFloat(style.getPropertyValue(`border-${side.toLowerCase()}-width`)) > 0 &&
					borderStyle !== 'none' &&
					borderStyle !== 'hidden'
				);
			});
			return bordered || !isTransparent(style.backgroundColor) || style.backgroundImage !== 'none';
		};

		// Only the theme's own stable classes: WordPress adds generated ones (wp-container-…-<hash>,
		// is-layout-*, is-style-…--<n>) that change between builds and would make labels unreadable.
		const stableClasses = (el: Element) =>
			[...el.classList].filter((c) => /^(is-style-|ls-)/.test(c) && !/--\d+$/.test(c)).join('.');

		const sectionLabel = (el: Element) => {
			const section = el.closest('section, .alignfull');
			if (section) {
				const heading = clean(section.querySelector('h1, h2, h3, h4, h5, h6')?.textContent, 60);
				const classes = stableClasses(section);
				return `${heading ? `"${heading}"` : section.tagName.toLowerCase()}${classes ? ` .${classes}` : ''}`;
			}
			// No section ancestor (e.g. the header): fall back to the nearest ancestor with a stable class.
			for (let a = el.parentElement; a && a !== document.body; a = a.parentElement) {
				const classes = stableClasses(a);
				if (classes) return clean(`${a.tagName.toLowerCase()}.${classes}`, 80);
			}
			return 'body';
		};

		const buttons = new Set<Element>();
		document.querySelectorAll('.wp-block-button__link').forEach((el) => buttons.add(el));
		document.querySelectorAll('.wp-block-buttons > *').forEach((el) => {
			// A wrapper that holds a link is measured through the link, not twice.
			if (!el.querySelector('.wp-block-button__link')) buttons.add(el);
		});

		const results: ElementFindingRaw[] = [];
		type ElementFindingRaw = {
			section: string;
			text: string;
			kind: 'viewport' | 'button-row' | 'panel';
			side: 'left' | 'right' | 'left+right';
			elementWidth: number;
			containerWidth: number;
			overshoot: number;
		};

		// A button row that scrolls sideways on purpose (e.g. the blog's taxonomy filter pills) keeps its
		// buttons off-screen by design. Only the button's own row counts, and only while it is genuinely
		// scrolling: a button overflowing an ordinary panel that happens to scroll must still be caught.
		const inHorizontalScroller = (el: Element) => {
			const row = el.parentElement?.closest('.wp-block-buttons');
			if (!row) return false;
			const overflowX = getComputedStyle(row).overflowX;
			return (overflowX === 'auto' || overflowX === 'scroll') && row.scrollWidth > row.clientWidth + TOLERANCE;
		};

		buttons.forEach((el) => {
			if (el.closest('.mobile-menu') || inHorizontalScroller(el)) return;
			const rect = el.getBoundingClientRect();
			if (rect.width === 0 || rect.height === 0) return;

			const containers: { kind: ElementFindingRaw['kind']; left: number; right: number }[] = [
				{ kind: 'viewport', left: 0, right: viewport },
			];
			const row = el.parentElement?.closest('.wp-block-buttons') ?? null;
			if (row) {
				const r = row.getBoundingClientRect();
				containers.push({ kind: 'button-row', left: r.left, right: r.right });
			}
			for (let a = el.parentElement; a && a !== document.body && a !== document.documentElement; a = a.parentElement) {
				if (a.classList.contains('wp-block-button') || a === row) continue;
				const r = a.getBoundingClientRect();
				if (r.width > 0 && r.height > 0 && isPanel(a)) {
					containers.push({ kind: 'panel', left: r.left, right: r.right });
					break;
				}
			}

			for (const c of containers) {
				const overLeft = c.left - rect.left;
				const overRight = rect.right - c.right;
				const left = overLeft > TOLERANCE;
				const right = overRight > TOLERANCE;
				if (!left && !right) continue;
				results.push({
					section: sectionLabel(el),
					text: clean(el.textContent, 80) || clean(el.getAttribute('aria-label'), 80) || '(no text)',
					kind: c.kind,
					side: left && right ? 'left+right' : left ? 'left' : 'right',
					elementWidth: Math.round(rect.width),
					containerWidth: Math.round(c.right - c.left),
					overshoot: Math.round(Math.max(left ? overLeft : 0, right ? overRight : 0)),
				});
			}
		});

		return results;
	});

	// One soft assertion per offender, so each gets its own failure identity: the BugHerd reporter
	// builds a signature from every error, and a single combined message would only be grouped by
	// its first offender, hiding the others until that one was fixed.
	for (const f of findings) {
		expect
			.soft(
				false,
				`Button overflow at ${viewportWidth}px on ${page.url()}: 1 element(s) outside their container\n` +
					`  ${f.section} | "${f.text}" | ${f.side} of ${f.kind} | ` +
					`element ${f.elementWidth}px, container ${f.containerWidth}px | over by ${f.overshoot}px`
			)
			.toBe(true);
	}
}
