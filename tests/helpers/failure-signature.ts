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
	// Fallback signatures are already the stripped diff content — take the
	// first line as the label, since it's usually the specific broken
	// resource/error text (e.g. a broken CSS file reference).
	const firstLine = signature.split('\n')[0].trim();
	return firstLine || 'Standing suite failure';
}
