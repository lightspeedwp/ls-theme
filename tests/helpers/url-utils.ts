/**
 * Generic URL normalization/filtering utilities for the standing site-crawl
 * suite. No network calls here — pure string/URL logic, shared by
 * site-urls.ts (discovery) and any future spec that needs to walk links
 * (e.g. internal-links.spec.ts).
 */

/**
 * Resolves `url` (absolute or relative) against `baseURL`, strips the
 * fragment, and strips a single trailing slash (except for the root path)
 * so equivalent URLs dedupe correctly. Returns null for anything off-origin,
 * non-HTTP(S), or unparsable.
 */
export function normalizeUrl(url: string, baseURL: string): string | null {
	let resolved: URL;
	try {
		resolved = new URL(url, baseURL);
	} catch {
		return null;
	}

	if (resolved.protocol !== 'http:' && resolved.protocol !== 'https:') {
		return null;
	}

	if (!isSameOrigin(resolved.href, baseURL)) {
		return null;
	}

	resolved.hash = '';

	let pathname = resolved.pathname;
	if (pathname.length > 1 && pathname.endsWith('/')) {
		pathname = pathname.slice(0, -1);
	}
	resolved.pathname = pathname;

	return resolved.href;
}

/** True if `url` shares an origin (protocol + host + port) with `baseURL`. */
export function isSameOrigin(url: string, baseURL: string): boolean {
	try {
		const a = new URL(url, baseURL);
		const b = new URL(baseURL);
		return a.origin === b.origin;
	} catch {
		return false;
	}
}

/** Returns a new array with duplicate URLs removed, preserving first-seen order. */
export function dedupeUrls(urls: string[]): string[] {
	return [...new Set(urls)];
}
