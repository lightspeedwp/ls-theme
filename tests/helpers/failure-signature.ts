/**
 * Strips ANSI SGR escape codes — Playwright/Jest's own error formatting adds
 * these for terminal colour/bold, but BugHerd's UI renders them as either
 * garbage characters or invisible control codes, never as actual colour.
 * Single source of truth: used both when computing the failure signature
 * (below) and when formatting the occurrence text shown in the task body.
 */
export function stripAnsi(text: string): string {
	// eslint-disable-next-line no-control-regex
	return text.replace(/\x1b\[[0-9;]*m/g, '');
}

/**
 * Patterns that mean "the test runner itself had a problem," not "the site
 * has a bug" — a timeout, a browser/context closing mid-test, a run being
 * killed. These must never become BugHerd tasks: a timeout says nothing
 * about the site being tested, and reporting it as a "bug" is actively
 * misleading. Confirmed against real examples that were wrongly created as
 * tasks (e.g. "Test timeout of 30000ms exceeded.",
 * "apiRequestContext.get: Target page, context or browser has been closed").
 */
const INFRASTRUCTURE_NOISE_PATTERNS = [
	/^Test timeout of \d+ms exceeded\.?$/,
	/Target page, context or browser has been closed/,
	/^(?:Error: )?page\.goto: Test ended\.?$/,
	// Both of these are downstream symptoms of the SAME timeout-kill event as
	// "Test timeout of Xms exceeded" — Playwright aborts whichever async call
	// (page.goto / apiRequestContext.get) was in-flight at the moment a test
	// is killed, and that call's own rejection surfaces instead of the outer
	// timeout wrapper. Root cause is fixed by the testInfo.setTimeout(...)
	// budgets added to every standing spec that loops over siteUrls; this is
	// the safety net for when a genuinely slow dev site still runs over.
	/^(?:Error: )?page\.goto: net::ERR_ABORTED; maybe frame was detached\?$/,
	/^(?:Error: )?apiRequestContext\.get: Request context disposed\.?$/,
];

/** True if `message` is test-runner noise rather than a real site failure. */
export function isTestInfrastructureNoise(rawMessage: string): boolean {
	const message = stripAnsi(rawMessage).trim();
	return INFRASTRUCTURE_NOISE_PATTERNS.some((pattern) => pattern.test(message));
}

/**
 * Groups a raw Playwright assertion error message into a stable "bug
 * identity" signature, so 10 pages failing on the same underlying issue
 * collapse into one BugHerd task, while genuinely distinct bugs (e.g. two
 * different broken links) stay separate.
 *
 * These patterns are matched against messages produced by this repo's own
 * standing-suite helpers (page-health, accessibility, link-integrity,
 * responsive, browser-errors, network-errors) — not general-purpose parsing.
 * If a helper's message wording changes, the matching pattern here needs
 * updating too.
 */
export function extractFailureSignature(rawMessage: string): string {
	// Strip ANSI first, before any pattern below runs. A handful of checks
	// (special-routes.spec.ts's bare `expect.soft(array).toEqual([])` calls,
	// with no custom message) produce raw Jest output with no recognizable
	// text at the very start — ANSI codes were sitting right where every
	// pattern below expects to find "Expected "/"Found "/etc, so none of them
	// ever matched, and the raw colour codes leaked straight into the
	// signature and the task's visible label. Stripping first also means
	// these particular messages can still collapse correctly across pages
	// when their (now-clean) diff content is identical, even without a
	// custom message to URL-normalize.
	// Firefox appends "{file: "<page-url>" line: N}" to console-error text —
	// its own debugging metadata repeating the current page's URL, not part
	// of the actual error. Chromium doesn't add this, so without stripping
	// it, the identical underlying bug groups correctly across pages in
	// Chromium (identical message) but never groups at all in Firefox (every
	// page's message differs only in this trailing, meaningless fragment).
	// Always safe to strip: it's a fixed, recognizable devtools-metadata
	// pattern, never part of the actual diagnostic content.
	//
	// The quotes around the URL arrive as a literal backslash + quote
	// (`\"`, two characters), not a plain `"` — Firefox's console message is
	// itself embedded inside Jest's array-diff printer, which escapes the
	// message's own internal quotes when rendering it as a printable array
	// element. Verified directly against a real captured task description;
	// the original version of this pattern only matched a bare `"` and
	// never fired on real output, so the fix silently did nothing.
	const message = stripAnsi(rawMessage).replace(
		/\s*\{file:\s*\\?"[^"]*\\?"\s*line:\s*\d+\}/g,
		''
	);

	// internal-links: the broken URL itself IS the bug identity — two
	// different broken links are two different bugs, never merge these.
	const brokenLinkMatch = message.match(/Expected (\S+) to resolve healthily/);
	if (brokenLinkMatch) {
		return `broken-link:${brokenLinkMatch[1]}`;
	}

	// accessibility: group by the set of axe rule IDs involved. The same
	// rule firing on multiple pages is very likely the same design-level
	// issue (e.g. a site-wide button color); a different rule is a
	// different class of problem.
	const ruleIds = [...message.matchAll(/"id":\s*"([a-z-]+)"/g)].map((m) => m[1]);
	if (ruleIds.length > 0) {
		return `axe:${[...new Set(ruleIds)].sort().join(',')}`;
	}

	// responsive-overflow: group by the first offending selector — the most
	// concrete signal available for "which part of the layout is broken."
	const overflowMatch = message.match(/Horizontal overflow at .*?Likely offenders:\n([^\n]+)/s);
	if (overflowMatch) {
		const firstOffender = overflowMatch[1].replace(/\s*right edge = \d+px$/, '').trim();
		return `overflow:${firstOffender || 'unspecified'}`;
	}

	// internal-links: placeholder href="#" links are a single class of
	// content defect (shared header/nav markup, not a per-page bug) — group
	// every page's occurrences into one task rather than one per page.
	if (/placeholder href="#" link/.test(message)) {
		return 'placeholder-links';
	}

	// network/console errors: a single broken static asset (a CSS/JS file
	// returning the wrong content, a missing image, etc.) shows up in
	// completely different message shapes depending on which spec caught it
	// (network-errors.spec.ts's "Failed requests", runtime-errors.spec.ts's
	// "Console errors", special-routes.spec.ts's 4 separate bare checks) and
	// which browser reported it (Chromium: "Refused to apply style...",
	// Firefox: "[JavaScript Error: ...]", WebKit: a plain 404). None of that
	// wording overlaps, so without this, one broken file fragments into a
	// task per spec × per check × per browser — confirmed on a real run: one
	// broken CSS file produced 16 separate tasks.
	//
	// Fix: pull out the actual broken asset's URL (a concrete, verifiable
	// fact) and group by that instead of the surrounding prose. Scoped
	// deliberately narrow — only URLs ending in a known static-asset
	// extension match, with the query string stripped (a cache-busting
	// ?ver= must not fragment grouping, but also must never be trusted to
	// disambiguate two genuinely different files). This intentionally does
	// NOT match dynamic/tokenised URLs (e.g. Cloudflare's
	// /cdn-cgi/challenge-platform/.../<random-token> paths) since those
	// don't end in a static extension — merging those would risk treating
	// genuinely different per-page challenge requests as one bug, which is
	// a real but separate, harder problem left alone here.
	const staticResourceUrls = [...message.matchAll(/https?:\/\/\S+/g)]
		.map((m) => m[0].replace(/["'\]).,]+$/, '').split('?')[0])
		.filter((url) => /\.(?:css|js|mjs|png|jpe?g|svg|webp|gif|ico|woff2?|ttf|eot)$/i.test(url));
	if (staticResourceUrls.length > 0) {
		return `resource:${[...new Set(staticResourceUrls)].sort().join(',')}`;
	}

	// Fallback (page-health, runtime-errors, network-errors): strip the
	// specific page URL being checked so the same underlying defect (e.g. a
	// shared template throwing a 500, or a PHP notice present on every
	// archive page) collapses into one task across every page it appears on,
	// instead of one task per page. This only strips the URL of the page
	// *being checked* — it deliberately does NOT touch URLs that appear
	// inside a toEqual diff's actual values (e.g. a specific broken resource
	// referenced in a network-error array), since two different broken
	// resources really are two different bugs and must stay separate.
	//
	// Matched against the real message shapes in helpers/page-health.ts —
	// if that file's wording changes, these patterns need updating too.
	//
	// Playwright prepends "Error: " to every expect() failure message
	// (confirmed against real BugHerd task output, not assumed) — every
	// pattern below tolerates that optional prefix. The earlier version of
	// this code didn't, so it silently never matched real Playwright output
	// and two occurrences of the same underlying bug on different fake pages
	// wrongly stayed as two separate tasks instead of collapsing into one.
	return message
		.replace(
			/^(?:Error: )?(Expected a response when navigating to )https?:\/\/\S+/,
			'$1<page-url>'
		)
		.replace(/^(?:Error: )?(Expected )https?:\/\/\S+( to return )/, '$1<page-url>$2')
		.replace(
			/^(?:Error: )?(Found a PHP error signature on )https?:\/\/\S+(: )/,
			'$1<page-url>$2'
		)
		.replace(/^(?:Error: )?[A-Za-z0-9 ]+ (?:on|at \d+px on) https?:\/\/\S+\n?/, '')
		.trim();
}

/**
 * Produces a short, human-scannable label from a signature string, so two
 * BugHerd tasks from the same spec/test are visually distinguishable at a
 * glance (in the task list and in BugHerd's own similarity suggestions)
 * instead of both reading as generic, near-identical boilerplate.
 */
export function humanizeSignature(signature: string): string {
	if (signature.startsWith('broken-link:')) {
		return `Broken internal link: ${signature.slice('broken-link:'.length)}`;
	}
	if (signature.startsWith('axe:')) {
		return `Accessibility violation (${signature.slice('axe:'.length).split(',').join(', ')})`;
	}
	if (signature.startsWith('overflow:')) {
		return `Horizontal overflow: ${signature.slice('overflow:'.length)}`;
	}
	if (signature === 'placeholder-links') {
		return 'Placeholder href="#" links found (real destinations needed)';
	}
	if (signature.startsWith('resource:')) {
		return `Broken resource: ${signature.slice('resource:'.length)}`;
	}
	// Fallback signatures are already the stripped diff content — take the
	// first line as the label, since it's usually the specific broken
	// resource/error text (e.g. a broken CSS file reference).
	const firstLine = signature.split('\n')[0].trim();
	return firstLine || 'Standing suite failure';
}

/**
 * The complete, fixed set of BugHerd tags this project is allowed to use.
 * Playwright must never send a tag outside this list — deriveCategoryTags()
 * below filters against it as a safety net, so even a bug in the mapping
 * logic can't invent a new tag in BugHerd.
 *
 * Source of truth: the approved label list supplied for LS-2810. Update this
 * set (and BugHerd's own saved tags) together if the approved list changes —
 * this file doesn't fetch it dynamically, by design (Playwright must not be
 * able to create tags on the fly).
 */
export const APPROVED_TAGS: ReadonlySet<string> = new Set([
	'area:analytics',
	'area:block-visibility',
	'area:cards',
	'area:cookie-policies',
	'area:cta',
	'area:emails',
	'area:forms',
	'area:gallery',
	'area:hero',
	'area:integration',
	'area:mega-menu',
	'area:mobile-menu',
	'area:modal',
	'area:navigation',
	'area:plugins',
	'area:post-format',
	'area:search',
	'area:seo',
	'area:slider',
	'area:testimonials',
	'area:theme',
	'block:audio',
	'block:button',
	'block:columns',
	'block:comments',
	'block:cover',
	'block:excerpt',
	'block:featured-image',
	'block:gallery',
	'block:group',
	'block:image',
	'block:list',
	'block:pagination',
	'block:post-navigation',
	'block:query-loop',
	'block:quote',
	'block:read-more',
	'block:site-logo',
	'block:social',
	'block:video',
	'block:yoast-faq',
	'comp:block-editor',
	'comp:block-json',
	'comp:block-patterns',
	'comp:block-styles',
	'comp:block-templates',
	'comp:color-palette',
	'comp:post-settings',
	'comp:section-styles',
	'comp:settings',
	'comp:site-editor',
	'comp:spacing',
	'comp:template-parts',
	'comp:theme-json',
	'comp:typography',
	'comp:wp-admin',
	'device:desktop',
	'device:laptop',
	'device:mobile',
	'device:tablet-landscape',
	'device:tablet-portrait',
	'env:live',
	'env:local',
	'env:prototype',
	'env:staging',
	'issue:404-error',
	'issue:broken-link',
	'issue:js-error',
	'issue:open-link_blank',
	'issue:redirect',
	'layout:content-width',
	'layout:full-width',
	'layout:grid',
	'layout:list',
	'layout:wide-width',
	'page:about',
	'page:blog',
	'page:contact',
	'page:events',
	'page:faq',
	'page:gallery',
	'page:home',
	'page:legal',
	'page:newsletter-subscribe',
	'page:portfolio',
	'page:products',
	'page:services',
	'page:solutions',
	'page:team',
	'page:testimonials',
	'page:thank-you',
	'phase:post-launch',
	'phase:pre-launch',
	'phase:staging-uat',
	'playwright',
	'size:L',
	'size:M',
	'size:S',
	'size:unknown',
	'size:XS',
	'standing-suite',
	'status:blocked',
	'status:duplicate',
	'status:in-discussion',
	'status:in-progress',
	'status:needs-client-discussion',
	'status:needs-design',
	'status:needs-design-review',
	'status:needs-dev',
	'status:needs-discussion',
	'status:needs-documentation',
	'status:needs-figma-update',
	'status:needs-loom-video',
	'status:needs-more-info',
	'status:needs-qa',
	'status:needs-review',
	'status:needs-testing',
	'status:on-hold',
	'status:ready',
	'status:ready-for-deployment',
	'status:scope-creep',
	'status:wontfix',
	'template-part:breadcrumbs',
	'template-part:footer',
	'template-part:header',
	'template-part:post-meta',
	'template-part:sidebar',
	'template:404',
	'template:all-archives',
	'template:category-archives',
	'template:front-page',
	'template:index',
	'template:page',
	'template:page-blank',
	'template:page-default',
	'template:page-no-title',
	'template:search-results',
	'template:single',
	'template:tag-archives',
	'theme:block-theme',
	'theme:configuration',
	'theme:content-model',
	'theme:design-system',
	'theme:plugin',
	'theme:tour-operator',
	'to:accommodation-archive',
	'to:accommodation-type-archive',
	'to:brand-archive',
	'to:continent-archive',
	'to:core',
	'to:destinations-archive',
	'to:fast-facts',
	'to:maps',
	'to:post-relationships',
	'to:prices',
	'to:read-more',
	'to:related-accommodation',
	'to:related-destinations',
	'to:related-tours',
	'to:search-results',
	'to:single-accommodation',
	'to:single-country',
	'to:single-destination',
	'to:single-region',
	'to:single-review',
	'to:single-special',
	'to:single-team',
	'to:single-tour',
	'to:team-archive',
	'to:tour-archive',
	'to:tour-itinerary',
	'to:travel-style-archive',
	'to:wetu-importer',
	'type:a11y',
	'type:bug',
	'type:chore',
	'type:compat',
	'type:content-import',
	'type:content-management',
	'type:design',
	'type:dev',
	'type:feature',
	'type:fix',
	'type:improve',
	'type:missing-content',
	'type:performance',
	'type:refactor',
	'type:task',
	'type:ui',
	'type:usability',
	'type:ux',
	'verify-test',
]);

/**
 * Maps a Playwright viewport width (as tested by responsive-overflow.spec.ts
 * and special-routes.spec.ts's own overflow check — widths 320, 375, 768,
 * 1024, 1440) to the matching approved device tag. Returns null for a width
 * outside this known set, so an unrecognized width is omitted rather than
 * guessed.
 */
function deviceTagForWidth(width: number): string | null {
	if (width <= 480) return 'device:mobile';
	if (width <= 800) return 'device:tablet-portrait';
	if (width <= 1200) return 'device:tablet-landscape';
	return 'device:desktop';
}

/**
 * Derives BugHerd category tags for a failure from information already
 * computed elsewhere (the failure signature, the spec path, the test title,
 * the raw occurrence messages) — never from free text or an AI suggestion.
 * Every candidate tag is filtered against APPROVED_TAGS before being
 * returned, so this function structurally cannot emit a tag BugHerd doesn't
 * already have saved.
 *
 * Deliberately conservative: only adds a tag when the signature/spec/title
 * give a confident, unambiguous signal. When in doubt, it's better to under-
 * tag (task still has 'playwright' + 'standing-suite' + 'type:bug') than to
 * guess and mislabel.
 */
export function deriveCategoryTags(
	specRelativePath: string,
	testTitle: string,
	signature: string,
	messages: string[] = []
): string[] {
	const tags = new Set<string>(['type:bug']);
	const title = testTitle.toLowerCase();

	if (signature.startsWith('broken-link:') || signature === 'placeholder-links') {
		tags.add('issue:broken-link');
	} else if (signature.startsWith('axe:')) {
		tags.add('type:a11y');
	} else if (signature.startsWith('overflow:')) {
		// The overflow check runs at several widths — mobile, tablet, and
		// desktop (see responsive-overflow.spec.ts's VIEWPORT_WIDTHS and
		// special-routes.spec.ts's own 375px check) — so the width has to be
		// read from the actual occurrence messages, not assumed. If a single
		// group's occurrences span more than one distinct width (the same
		// offending selector failing at, say, both 768px and 1024px), no
		// single device tag would be accurate, so none is added.
		const widths = new Set(
			messages
				.map((m) => m.match(/Horizontal overflow at (\d+)px/)?.[1])
				.filter((w): w is string => Boolean(w))
				.map(Number)
		);
		if (widths.size === 1) {
			const deviceTag = deviceTagForWidth([...widths][0]);
			if (deviceTag) tags.add(deviceTag);
		}
	}

	// Route/page-specific tags: only added when the test title makes the
	// route unambiguous, never guessed from the spec file name alone.
	if (title.includes('404')) {
		tags.add('issue:404-error');
		tags.add('template:404');
	}
	if (title.includes('search')) {
		tags.add('area:search');
		tags.add('template:search-results');
	}

	return [...tags].filter((tag) => APPROVED_TAGS.has(tag));
}

export type BugherdPriority = 'critical' | 'important' | 'normal' | 'minor';

/**
 * Maps a failure to a BugHerd priority. This is a judgment-call heuristic,
 * not true severity analysis — based on which spec found the issue and,
 * for accessibility, the axe-reported impact level (which IS a real
 * severity signal, so it's used directly rather than re-guessed).
 */
export function determinePriority(
	specRelativePath: string,
	signature: string,
	messages: string[]
): BugherdPriority {
	// site-health: the page itself is broken/unreachable — highest impact.
	if (specRelativePath.includes('site-health')) {
		return 'critical';
	}

	if (signature.startsWith('axe:')) {
		const hasCritical = messages.some((m) => /"impact":\s*"critical"/.test(m));
		return hasCritical ? 'important' : 'normal';
	}

	if (signature.startsWith('broken-link:') || signature === 'placeholder-links') {
		return 'important';
	}

	// runtime-errors / network-errors: broken JS/CSS/resources sitewide.
	if (specRelativePath.includes('runtime-errors') || specRelativePath.includes('network-errors')) {
		return 'important';
	}

	// responsive-overflow: usually cosmetic, rarely blocks a user outright.
	if (signature.startsWith('overflow:')) {
		return 'normal';
	}

	return 'normal';
}
