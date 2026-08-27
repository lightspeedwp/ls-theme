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
export function extractFailureSignature(message: string): string {
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

	// Fallback (page-health, runtime-errors, network-errors): these
	// messages are shaped "<check> on <page-url>\n<actual diff content>".
	// Strip the page-URL wrapper so the same underlying diff (e.g. the same
	// broken CSS file referenced in a console error) collapses across every
	// page it appears on, while a genuinely different diff still produces a
	// different signature.
	return message
		.replace(/^[A-Za-z0-9 ]+ (?:on|at \d+px on) https?:\/\/\S+\n?/, '')
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
 * Derives BugHerd category tags for a failure from information already
 * computed elsewhere (the failure signature, the spec path, the test title)
 * — never from free text or an AI suggestion. Every candidate tag is
 * filtered against APPROVED_TAGS before being returned, so this function
 * structurally cannot emit a tag BugHerd doesn't already have saved.
 *
 * Deliberately conservative: only adds a tag when the signature/spec/title
 * give a confident, unambiguous signal. When in doubt, it's better to under-
 * tag (task still has 'playwright' + 'standing-suite' + 'type:bug') than to
 * guess and mislabel.
 */
export function deriveCategoryTags(
	specRelativePath: string,
	testTitle: string,
	signature: string
): string[] {
	const tags = new Set<string>(['type:bug']);
	const title = testTitle.toLowerCase();

	if (signature.startsWith('broken-link:') || signature === 'placeholder-links') {
		tags.add('issue:broken-link');
	} else if (signature.startsWith('axe:')) {
		tags.add('type:a11y');
	} else if (signature.startsWith('overflow:')) {
		// The standing suite's overflow check only ever runs at the 375px
		// mobile viewport (see special-routes.spec.ts / responsive-overflow
		// spec) — the failure is inherently a mobile-only defect.
		tags.add('device:mobile');
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
