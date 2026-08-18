import { dedupeUrls, isSameOrigin, normalizeUrl } from './url-utils';

export type SiteUrlSource = 'sitemap' | 'rest' | 'crawl' | 'synthetic';

export type SiteUrl = {
	url: string;
	source: SiteUrlSource;
};

export type DiscoverOptions = {
	/** Hard cap on total discovered URLs. Exceeding this throws rather than truncating silently. */
	crawlBudget?: number;
	/** Max number of pages to visit during the link-crawl fallback. */
	maxCrawlPages?: number;
};

const DEFAULT_CRAWL_BUDGET = 500;
const DEFAULT_MAX_CRAWL_PAGES = 200;
const FETCH_TIMEOUT_MS = 10_000;

// Paths the crawl fallback must never follow — not content pages, and
// visiting them would pollute the corpus with false-positive failures
// (auth-gated screens, feeds) rather than genuine broken pages.
const CRAWL_EXCLUDED_PATH_PATTERNS = [
	/^\/wp-admin(\/|$)/,
	/^\/wp-login\.php/,
	/\/feed(\/|$)/,
	/^\/wp-json(\/|$)/,
	/^\/xmlrpc\.php/,
];

function isCrawlExcluded(url: string): boolean {
	const pathname = new URL(url).pathname;
	return CRAWL_EXCLUDED_PATH_PATTERNS.some((pattern) => pattern.test(pathname));
}

class CrawlBudgetExceededError extends Error {
	constructor(found: number, budget: number) {
		super(
			`Crawl budget exceeded — discovered at least ${found} URLs, capped at ${budget}. ` +
				`Raise DiscoverOptions.crawlBudget if this site legitimately has this many pages, ` +
				`or investigate whether discovery is looping (e.g. a broken pagination/query-arg link).`
		);
		this.name = 'CrawlBudgetExceededError';
	}
}

async function fetchText(url: string): Promise<string | null> {
	const controller = new AbortController();
	const timeout = setTimeout(() => controller.abort(), FETCH_TIMEOUT_MS);
	try {
		const res = await fetch(url, { redirect: 'follow', signal: controller.signal });
		if (!res.ok) return null;
		return await res.text();
	} catch {
		return null;
	} finally {
		clearTimeout(timeout);
	}
}

function extractLocs(xml: string): string[] {
	const matches = [...xml.matchAll(/<loc>\s*([^<\s]+)\s*<\/loc>/gi)];
	return matches.map((m) => m[1]);
}

/**
 * Recursively resolves a WordPress sitemap index (or a single sitemap file)
 * into a flat list of page URLs. Returns an empty array if no sitemap is
 * reachable (e.g. disabled via blog_public, or a 404 on the route).
 */
async function discoverFromSitemap(baseURL: string): Promise<string[]> {
	const indexUrl = new URL('/wp-sitemap.xml', baseURL).href;
	const indexXml = await fetchText(indexUrl);
	if (!indexXml) return [];

	const locs = extractLocs(indexXml);
	if (locs.length === 0) return [];

	// A sitemap index points at child sitemap files (e.g. wp-sitemap-posts-post-1.xml).
	// A single (non-index) sitemap points directly at pages. Detect which by
	// checking the wrapper tag Core uses.
	const isIndex = /<sitemapindex/i.test(indexXml);
	if (!isIndex) {
		return locs;
	}

	const pageUrls: string[] = [];
	for (const childUrl of locs) {
		if (!isSameOrigin(childUrl, baseURL)) continue;
		const childXml = await fetchText(childUrl);
		if (!childXml) continue;
		pageUrls.push(...extractLocs(childXml));
	}
	return pageUrls;
}

/**
 * Falls back to WordPress's public REST API when the sitemap is unavailable
 * or empty. Introspects registered types via /wp/v2/types, then paginates
 * each type's collection endpoint, reading each item's front-end `link`.
 */
async function discoverFromRest(baseURL: string): Promise<string[]> {
	const typesUrl = new URL('/wp-json/wp/v2/types', baseURL).href;
	const typesJson = await fetchText(typesUrl);
	if (!typesJson) return [];

	let types: Record<string, { rest_base?: string; slug?: string }>;
	try {
		types = JSON.parse(typesJson);
	} catch {
		return [];
	}

	const urls: string[] = [];
	for (const type of Object.values(types)) {
		const restBase = type.rest_base ?? type.slug;
		if (!restBase) continue;

		let page = 1;
		// A handful of pages per type is enough for the REST fallback; the
		// sitemap path is the primary discovery mechanism for large corpora.
		const maxPagesPerType = 10;
		while (page <= maxPagesPerType) {
			const collectionUrl = new URL(
				`/wp-json/wp/v2/${restBase}?per_page=100&page=${page}`,
				baseURL
			).href;
			const json = await fetchText(collectionUrl);
			if (!json) break;

			let items: Array<{ link?: string }>;
			try {
				items = JSON.parse(json);
			} catch {
				break;
			}
			if (!Array.isArray(items) || items.length === 0) break;

			for (const item of items) {
				if (item.link) urls.push(item.link);
			}

			if (items.length < 100) break;
			page++;
		}
	}
	return urls;
}

/**
 * Same-origin breadth-first link crawl starting at baseURL, used only when
 * both the sitemap and REST fallbacks come up empty (e.g. a fully local
 * install with sitemaps disabled and no REST access).
 */
async function discoverFromCrawl(baseURL: string, maxPages: number): Promise<string[]> {
	const seen = new Set<string>();
	const queue: string[] = [baseURL];
	const found: string[] = [];

	while (queue.length > 0 && seen.size < maxPages) {
		const current = queue.shift()!;
		const normalized = normalizeUrl(current, baseURL);
		if (!normalized || seen.has(normalized) || isCrawlExcluded(normalized)) continue;
		seen.add(normalized);
		found.push(normalized);

		const html = await fetchText(normalized);
		if (!html) continue;

		// Only <a href> — not every href in the document (e.g. <link
		// rel="stylesheet">) — since those aren't navigable pages.
		const hrefMatches = [...html.matchAll(/<a\s[^>]*href=["']([^"']+)["']/gi)];
		for (const match of hrefMatches) {
			// Resolve against the page the link was found on, not the site
			// root, so a relative link like "child" on /work/archive/
			// resolves to /work/archive/child rather than /child.
			// normalizeUrl already same-origin-filters against `normalized`,
			// which shares an origin with baseURL, so no separate check needed.
			const candidate = normalizeUrl(match[1], normalized);
			if (candidate && !seen.has(candidate) && !isCrawlExcluded(candidate)) {
				queue.push(candidate);
			}
		}
	}

	return found;
}

/**
 * Discovers every reachable public URL on `baseURL`, in this fallback order:
 * WordPress sitemap -> REST API introspection -> same-origin link crawl.
 * Throws CrawlBudgetExceededError if the result exceeds options.crawlBudget,
 * rather than silently truncating the list.
 */
export async function discoverSiteUrls(
	baseURL: string,
	options: DiscoverOptions = {}
): Promise<SiteUrl[]> {
	const crawlBudget = options.crawlBudget ?? DEFAULT_CRAWL_BUDGET;
	const maxCrawlPages = options.maxCrawlPages ?? DEFAULT_MAX_CRAWL_PAGES;

	let source: SiteUrlSource = 'sitemap';
	let rawUrls = await discoverFromSitemap(baseURL);

	if (rawUrls.length === 0) {
		source = 'rest';
		rawUrls = await discoverFromRest(baseURL);
	}

	if (rawUrls.length === 0) {
		source = 'crawl';
		rawUrls = await discoverFromCrawl(baseURL, maxCrawlPages);
	}

	const normalized = dedupeUrls(
		rawUrls
			.map((url) => normalizeUrl(url, baseURL))
			.filter((url): url is string => url !== null)
	);

	if (normalized.length > crawlBudget) {
		throw new CrawlBudgetExceededError(normalized.length, crawlBudget);
	}

	return normalized.map((url) => ({ url, source }));
}
