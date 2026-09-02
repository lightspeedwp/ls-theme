# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

---

## [Unreleased] — Build Single Blog template (LS-2932)

### Added

- Added `ls-theme/blog-single-hero` (`patterns/hero/blog-single-hero.php`): breadcrumb, dot-icon category eyebrow, `post-title`, `post-excerpt`, and a bordered author/date/read-time meta strip, all left-aligned and wide, then a full-wide featured image capped to a `21/9` aspect ratio. Adapted from the Work Single hero's structure, using existing semantic tokens only.
- Added `inc/blog-single-related-query.php`: scopes the new "Related Reading" Query Loop to the current post's own category and excludes the post itself, resolved at render time via `query_loop_block_query_vars` (a pattern's own `wp:query` attributes can't express "the current post").

### Changed

- Rewired `template-single.php` (the Single Blog main-content pattern): hero → `post-content` (unchanged, default 800px width) → share row → wide "Related Reading" grid (reusing the existing `blog-post-card` pattern) → the existing `blog-writing-cta` pattern as the closing CTA.
- Removed the shared `parts/breadcrumbs.html` template-part reference from `templates/single.html` — the hero pattern now renders its own breadcrumb, matching the Blog Archive hero's convention, avoiding a duplicate breadcrumb.

### Docs

- Added a "Core WordPress blocks first" rule to `AGENTS.md`, documenting the existing practice of preferring semantic core blocks (`post-title`, `post-excerpt`, `post-terms`, `query`/`post-template`, etc.) over generic `group`/`columns` markup.

## [Unreleased] — PageSpeed: Fix mobile performance on Homepage (LS-2922)

### Fixed

- Fixed the homepage loading every structural CSS bundle in the theme unconditionally (~20 files), regardless of whether the page actually used them — the root cause behind PageSpeed's "render-blocking requests" and "unused CSS" findings on mobile. `inc/animations.php` now gates most bundles behind a `condition` reflecting their real, verified usage (e.g. `is_front_page()`, `is_post_type_archive('project')`, `is_page_template('page-blog-archive')`) instead of loading everywhere.
- Fixed several of those bundles being gated too narrowly at first: `work-project-card`, `work-archive-sections`, and `taxonomy-filter` are also used by patterns outside their assumed "home" template (e.g. homepage sections, the Blog archive's filter), not just the Work archive.
- Fixed a `render_block`-based safety net for every pattern that's individually insertable via the block inserter (`Inserter: true`), since a template-only condition can't detect a pattern placed somewhere the condition doesn't anticipate. This uncovered and fixed a live bug: the mobile menu's two CTA buttons (`parts/mobile-menu.html`) were unstyled on every page except the homepage/Work archive/404, since template-part markup never appears in a page's own `post_content`.
- Fixed missing `font-display: swap` on all 17 `fontFace` entries in `styles/presets/typography.json`, so text renders in a fallback font instead of staying invisible while a custom font loads.
- Fixed the Featured Work card grid overlay being invisible in light mode: `work-project-card.scss` was tinting the grid lines from `--wp--custom--color--surface--highlight`, a token pinned to the same near-white value in both `theme.json` and `styles/dark.json` (unlike its sibling `canvas`, which correctly flips per mode). Switched to `--wp--custom--color--text--default`, which already adapts correctly, instead of changing the shared token — that token also drives the glass-card/glass-button sheen effect elsewhere and needs to stay light-colored in both modes.

### Added

- Added a `build:css:dev`/`build:css` split in `package.json`: `build:css` now outputs the compressed CSS that's actually committed and shipped; the old expanded output is preserved as `build:css:dev` for local debugging.

### Notes

- `card-shells`, `cta-buttons`, and `faq` are loaded unconditionally rather than through the `render_block` safety net — they have no head-time condition at all, so every use would otherwise flash unstyled (not just a rare off-template case). At ~10 KB/~5 KB/~3 KB compressed combined, that's a better trade than the FOUC/CLS risk.
- `homepage-why-lightspeed` is a known, deliberate gap in the `render_block` safety net: its only defined CSS selector isn't present anywhere in the pattern's current markup (pre-existing, unrelated to this fix), so there's no reliable marker to detect yet.
- Header search expand animation, JS minification, and the GSAP "legacy JavaScript" PageSpeed flag were investigated and deliberately left out of scope — see LS-2922 for reasoning.
- Forced-reflow/long-task profiling and an LCP font preload hint were flagged by the original PageSpeed report but not implemented in this pass.

---

## [Unreleased] — Sync mobile menu links with desktop mega menus (LS-2801)

### Fixed

- Fixed `parts/mobile-menu.html` still using the original placeholder titles and `href="#"` links across all 6 dropdowns (Work, Solutions, Services, Pricing, Insights, About) — these were never updated when the desktop mega menus were wired to real pages/posts. Every item now matches its desktop equivalent's label and real URL exactly.
- Fixed the mobile menu's two footer action buttons ("Book a consultation" and "Start a project") both linking to `#` and pointing at the same destination as each other. "Start a project" is now the primary button, linking to `/free-consultation/` to match the desktop header's CTA; the secondary button now reads "Explore case studies" and links to `/work/`, reusing the same pairing already established on the homepage hero.

### Notes

- Confirmed mobile and desktop are otherwise in full parity — every link/label pair cross-checked programmatically. Desktop's secondary per-dropdown CTAs (e.g. "Book a free consultation" on Work, "Tell us about your project" on Pricing) were deliberately not added to mobile, since they'd duplicate the persistent "Start a project" button already visible at all times in the mobile menu.

---

## [Unreleased] — Audit link cursor behaviour across theme patterns and templates (LS-2804)

### Fixed

- Fixed clickable cards across the theme where only a small inner link (e.g. "See the work →") had the pointer cursor / clickable hit area, not the whole card, despite hover styling implying the entire card was interactive. Applied the existing stretched-link technique (`::before`/`::after` with `inset:0` over a `position:relative` card, already used by `is-style-card-link-row`) to: `is-style-card-category` (Homepage "Where to start", "What we build", Work archive categories), `is-style-card-feature`, `is-style-card-solutions`, `is-style-card-package` (Homepage "Where to fit" packages), `is-style-card-case-study` (Work archive project cards, Homepage Featured Work), `is-style-card-post` (Blog All Articles), and `is-style-card-highlight-dark` (Blog Hero featured tile). Added a `:focus-visible` outline to each so keyboard users see where focus lands.
- Fixed the same underlying issue on the mega-menu item rows (`is-style-mega-menu-item-default`, `is-style-mega-menu-item-service`) by adding a `:focus-visible` outline — the stretched-link hit area itself already existed via `src/scss/structural/_mega-menu.scss` from LS-2801, which this branch's own JSON-based stretched-link addition was found to duplicate during code review and was removed in favour of the existing SCSS implementation.
- Fixed 10 icon SVGs in `patterns/footer.php` missing `fill="currentColor"`, plus a stale `iconColor`/`has-icon-color` class conflict on the availability badge icon — both caused "Block contains unexpected or invalid content" errors in the Site Editor.
- Fixed a block validation error on the Work archive's "Ready to discuss a project?" CTA (`patterns/sections/work-discuss-project.php`): the columns wrapper had a hand-authored inline `--wp--style--block-gap` style that `core/columns`' actual save output never produces.

### Notes

- Every card audited has either exactly one link, or two links to the same destination (post title + "read more"/"view project"), so a single stretched link is safe everywhere it was applied — no card required per-link disambiguation.
- `card-package.json` and `card-post.json` had no `css` field at all before this change; `card-case-study.json` had no `position: relative`. Added both from scratch where missing.

---

## [Unreleased] — Build Homepage Where to Fit and Homepage CTA (LS-1616)

### Added

- Added `patterns/sections/homepage-where-to-fit.php`: eyebrow, heading, copy, and a 3-card package row (Foundation/Growth/Enterprise). The middle "Growth" card is pre-styled with its border/shadow as a permanent rest-state (it's the featured package, not literally hovered); the other two cards gain that border/shadow only on hover. All 3 lift slightly on hover and share an equal height regardless of content length.
- Added `patterns/sections/homepage-cta.php`: the homepage's closing CTA, mirroring `blog-writing-cta.php`'s structure/max-width-cap convention — eyebrow, two-line heading, copy, two buttons ("Book a free consultation" reusing the existing `is-style-button-primary-on-dark`; "Send a brief first" a plain-bordered on-dark outline with no arrow), and a "What you'll leave with" definition-list panel on the right.
- Added `src/scss/structural/where-to-fit.scss` (equal card height, hover border/shadow/lift motion) and `src/scss/structural/homepage-cta.scss` (max-width cap, decorative glow, panel label column width, arrow-reveal on the primary button, and neutralising `is-style-outline`'s built-in arrow-well for the one button that shouldn't have it) — all genuine `theme.json` limitations, documented inline.
- Wired both into `templates/front-page.html`: Where to Fit after Featured Work, Homepage CTA as the final section before the footer.

### Notes

- No new colour tokens needed. Where to Fit flips normally with the style variation (`surface.card`/`border.card`/`text.brand`, same as other homepage card sections); Homepage CTA is permanently dark, reusing the exact `surface.band-start`/`band-end` gradient and `on-dark` token family already established by `blog-writing-cta.php` — confirmed this matches the "light mode still looks dark, dark mode is a lighter shade" behavior requested, since those tokens already resolve that way.
- "Send a brief first" needed its pill shape from `is-style-outline` but not that style's built-in arrow icon — rather than edit the shared `is-style-outline`/`_button-motion.scss` (global, used site-wide, and touching it would have compiled into `animations.css`), the arrow/hover-reveal is neutralised via a scoped override in `homepage-cta.scss` targeting only this button's class. `animations.css` was not touched.
- All CTA buttons across Where to Fit reuse the existing pill button styles (`is-style-button-secondary`/`-outline`) and the `ls-has-arrow-reveal` marker class already established for the other homepage sections, and flip with the style variation as requested.

### Fixed

- Fixed editor crashes on the Why LightSpeed, Featured Work, What We Build, and Where to Start sections (and the mobile menu part): `"layout":{"type":"flow"}` is not a registered Gutenberg layout type (the valid value is `"default"`) — the editor threw `Cannot read properties of undefined (reading 'getOrientation')` and the block failed to render.
- Fixed a block validation "unexpected or invalid content" error on Where to Fit's featured "Growth" card — its shadow style pointed at a nonexistent theme.json preset (`var:preset|shadow|400`) instead of the real custom token (`var:custom|shadow|elevation|400`) already used in the rendered markup.
- Fixed a block validation error on the homepage CTA's "Send a brief first" button — missing `has-custom-font-size` class caused by combining a named `fontSize` with a custom inline style on a `core/button`.

### Changed

- Rebuilt Featured Work's card row as a real `wp:query` Query Loop (`project` post type, 3 per page) filtered to the existing "Featured" `project-tag` term, replacing the 3 hand-written static cards. Editors control which case studies appear by tagging/untagging posts as "Featured" in the post editor — no code changes needed.
- Tagged 3 real project posts ("Modernising African Safari Consultants' Website", "Novus Media", "Drive Botswana") with the "Featured" term so the section has real content on load.
- Card markup is inlined directly inside the Post Template rather than referenced via `wp:pattern {"slug":...}` — a `wp:pattern` reference does not forward the Post Template's block context to nested dynamic blocks (`post-title`/`post-excerpt`/`post-terms`), so referencing it by slug rendered every card empty. Confirmed via live HTML inspection.
- **Superseded the custom horizontal "list view" card entirely** (from the entry below) in favour of reusing the Work archive's existing `is-style-card-case-study` card in a 3-column grid (`wp:post-template {"layout":{"type":"grid","columnCount":3}}`), matching `work-selected-projects.php`'s convention — the custom card had no real per-post data for its stat row and looked sparse once the fabricated numbers were removed. `src/scss/structural/featured-work.scss` now only contains the equal-card-height fix (`.ls-featured-work-grid`, scoped so the Work archive's own grid is unaffected) — the old thumbnail-texture and flex-grow rules were removed as dead code.
- Excerpt/title/tag-pill content is now genuinely dynamic per post (via `post-terms`/`post-title`/`post-excerpt`), not fabricated placeholder copy.

---

## [Unreleased] — Build Homepage What We Build, Why LightSpeed, Featured Work (LS-1616)

### Added

- Added `patterns/sections/homepage-what-we-build.php`: eyebrow, heading, a 4-card row (WordPress platforms/WooCommerce/Design systems/Migrations) reusing the shared `is-style-card-category` shell, and an "All services" `core/button is-style-outline` CTA.
- Added `patterns/sections/homepage-why-lightspeed.php`: two-column section with positioning copy + two `core/button` CTAs (filled + outline) on the left, a 5-item checklist card on the right.
- Added `patterns/sections/homepage-featured-work.php`: a new horizontal "list view" case-study card (thumbnail, heading/description, 3-figure stat row, trailing arrow) — genuinely new, not reused from the existing vertical `is-style-card-case-study` Query Loop card.
- Added `src/scss/structural/featured-work.scss` for the case-study card's flex-grow content column and the thumbnail's decorative diagonal-line texture, both genuine `theme.json` limitations (documented inline).
- Wired all 3 new patterns into `templates/front-page.html`, after Where to Start.
- Registered `featured-work.css` in `package.json`'s `build:css`/`watch:css` scripts, `inc/animations.php`'s effect-styles list, and `functions.php`'s editor styles, matching the existing per-pattern CSS convention.

### Notes

- No new colour tokens were needed — all colours map to existing `surface.card`/`border.card`/`text.brand`/`text.muted` tokens (already flip correctly between light/dark) or the established `color-mix()` convention for tinted badge backgrounds.
- No new `is-style` variants were registered; `is-style-card-category` and `is-style-link-arrow-accent` are reused as already-established multi-use styles, per LS-2341.
- All pill-shaped CTAs use the native `core/button` block (default fill + `is-style-outline`), both already registered/token-driven — no new button styling needed.
- `assets/css/animations.css` was not touched.

---

## [Unreleased] — Build Homepage Hero, Stats Bar, Where to Start (LS-1616)

### Added

- Rebuilt the Homepage Hero (`patterns/home-hero.php`) to match Figma: AI-planner intro, decorative prompt-input row, project-type suggestion pills, and a consultation link. Kept the existing GSAP network background system (`.ls-home-hero-section`) untouched and layered new content on top.
- Added `patterns/section-stats-bar.php`, a 4-figure stat strip with vertical dividers, placed directly beneath the Hero.
- Added `patterns/sections/homepage-where-to-start.php` ("Three honest routes into LightSpeed"), reusing the Work archive's `is-style-card-category` / `.ls-icon-well-brand` / `is-style-link-arrow-accent` styling so both pages now share one improved card treatment.
- Wired all 3 new patterns into `templates/front-page.html`.
- Added 4 new mode-invariant custom colour tokens for the Hero's translucent "glass" badges/borders, following the existing `on-dark` family convention (defined in `theme.json`, intentionally not overridden in `styles/dark.json`): `surface.glass`, `surface.glass-lighter`, `surface.glass-subtle`, `border.glass`.
- Added scoped `ls-hero-badge-neon` / `ls-hero-prompt-row` / `ls-hero-pill` rules to `src/scss/structural/home-hero.scss` for the glass-panel styling with a `JSON limitation` comment (comma-separated background+border+box-shadow combination and hover-state background swap have no theme.json equivalent).

### Notes

- No new `is-style` variants were registered, per the LS-2341 cleanup (PR #24) — single-use Hero treatments use scoped `ls-*` classes; the Where to Start cards reuse the already multi-use `is-style-card-category`.
- Hero prompt input is decorative only (no functional wiring) per current scope.
- `assets/css/animations.css` was not touched.

---

## [PR #26](https://github.com/lightspeedwp/ls-theme/pull/26) — Build Blog Archive page (Hero, All Articles, Engagement, Writing CTA) - 2026-08-19

### Added

- Built the Blog Archive template's 4 sections to match Figma (LS-1616): `patterns/hero/blog-hero.php`, `patterns/sections/blog-all-articles.php`, `patterns/sections/blog-engagement.php`, `patterns/sections/blog-writing-cta.php`, plus supporting card patterns (`blog-featured-article.php`, `blog-latest-item.php`, `blog-post-card.php`, `blog-code-snippet.php`).
- Added a 9-slug `category.*` semantic colour token family (`theme.json`/`dark.json`), mapped to the existing `phase-*` token family by post-volume rank, replacing 5 placeholder categories that didn't match the real site taxonomy.
- Added `text.on-dark-accent`, `surface.on-dark-accent-tint`, `icon.on-dark`, and `border.on-dark` tokens for the permanently-dark Hero and Writing CTA sections.
- Added the `core/post-time-to-read` block to the Blog card patterns for per-post reading time in Query Loop cards.
- Added a `Button - Primary On Dark` block style and a `Card - Post` section style for the archive's post grid.
- Added a `search-pill.json` no-button search variant for the All Articles filter row.
- Added horizontal-scroll behaviour for the taxonomy filter pills below 790px (`src/scss/structural/taxonomy-filter.scss`), now shared by both the Work and Blog archives.

### Fixed

- Fixed category badge and post-title text rendering black instead of the correct on-dark/on-light colour — caused by `elements.link` styles winning the cascade over inherited heading colour on `isLink` blocks (post-title, post-terms).
- Fixed the category badge colour not swapping per post in the Query Loop — `elements.link` renders as one deduped, shared rule, not per-instance — replaced with a plain class + `color: inherit`.
- Fixed long category names overflowing the post card edge.
- Fixed the Writing CTA card's max-width and taxonomy-filter's mobile flex-wrap both silently no-op'ing against WordPress core's own `.alignwide`/`.wp-block-buttons` cascade.
- Fixed the `ls-plugin/taxonomy-filter` block rendering an editor "invalid content" error due to a self-closing pattern comment.
- Removed the Blog Archive template's top padding so the Hero sits flush against the header; kept bottom padding for consistent spacing above the footer.

## [Unreleased]

### Added

- Added 4 Work archive component patterns (LS-1616), each an individually insertable pattern built entirely from existing adaptive semantic tokens — no new `theme.json`/`dark.json` tokens were needed:
  - `patterns/cards/work-project-card.php` — a case-study card bound to real Portfolio post data via WordPress block bindings (LS-1617): `core/post-title`, `core/post-excerpt`, `core/post-terms` (badge bound to `project-group`, tag pills bound to `project-tag`), and `core/read-more` for the permalink. Intended as the Post Template content inside a Query Loop scoped to the `project` post type.
  - `patterns/cards/work-discuss-project-list.php` — a static checklist card reusing the existing `tick-accent` list style.
  - `patterns/cards/work-engagement-stat.php` — a stat segment with a split-colour big number (accent-coloured suffix) and monospace uppercase labels.
  - `patterns/cards/work-next-steps-card.php` — a compact related-route button.
  - Matching section/block styles for rendering dynamically-bound taxonomy terms as a badge bar and individual tag pills, and for the card/divider/checklist shells (all since folded into their consumer patterns or converted to plain classes by LS-2341 — see Removed below).
  - Colour, computed values (background tints, borders, custom-property recipes) are kept out of pattern-level block attributes and defined only in external style/structural files — WordPress's block validator can't reliably round-trip a raw `color-mix()` value placed directly in a block's own `style` attribute. Static values with a real block-supports equivalent (border style/width/radius, padding) were later moved into pattern block attributes directly by LS-2341, per the theme's theme-first rule.
  - Added hover-lift behaviour for the two interactive cards (`is-style-card-case-study` — still the registered style on the card root; only its descendant elements picked up new `.ls-card-case-study__*` BEM classes under LS-2341 — and `is-style-card-link-row`, still a registered multi-consumer style) to `assets/css/animations.css`, reusing the existing `card.hover` shadow contract, and extended the `is-style-link-arrow-accent` style/CSS to also support `core/read-more` (previously `core/paragraph` only).
- Added a `Menu Item Card` pattern (`patterns/menu/menu-item-card.php`) as the single reusable source of the mega-menu list item structure (icon well, title/description, hover-reveal trailing arrow), used across the Work, Solutions, Pricing, Insights, and About mega menus — Services is excluded, it uses its own per-phase item style. Deliberately a plain registered pattern, not a Synced Pattern, so each insertion stays independently editable per menu item (LS-1618).
- Added 6 real mega menu template parts for Ollie Menu Designer's Dropdown Menu block, each with final content, no shared placeholder scaffold: `parts/work-mega-menu.html`, `parts/solutions-mega-menu.html`, `parts/pricing-mega-menu.html`, `parts/insights-mega-menu.html`, `parts/about-mega-menu.html` (Default item styling), and `parts/services-mega-menu.html` (Service item styling, 6 lifecycle-phase columns). All registered in `theme.json` `templateParts` (LS-1618).
- Added `Mega Menu Item - Default` and `Mega Menu Item - Service` block styles (`styles/blocks/groups/mega-menu-item-default.json`, `mega-menu-item-service.json`) as the single reusable, registered source of a row's structural styling (padding, radius) — the icon well itself carries no separate style, just plain inline block attributes, so it has no independent interactive behaviour of its own.
- Added `.is-style-mega-menu-item-default` hover/focus behaviour (row background highlight + trailing arrow icon reveal) in `src/scss/animations/_menu-motion.scss`, compiled to `assets/css/animations.css`. This couldn't be expressed in the JSON style itself — WordPress's global-styles engine only generates `:hover`/`:focus` CSS for the built-in `elements` allowlist (link/button/etc.), not for arbitrary block style variations — so it's authored here instead, scoped tightly to this one selector.
- Added a `Mega Menu Panel` section style (`styles/sections/menu/mega-menu-panel.json`) plus a `shadow.popover` custom shadow token for the dropdown panel shell, and moved its border colour onto native JSON `border.color` instead of a CSS override.
- Added a `phase.discover|create|build|launch|grow|evolve` semantic colour token family (six new `phase-*` / `phase-*-strong` palette presets) for the Services mega menu's lifecycle-phase colour coding, with light-mode values darkened to meet WCAG AA 4.5:1 against the light card surface.
- Added a `text.subtle` semantic colour token (`neutral-600` light / `neutral-500` dark) for a tertiary text tier between `text.muted` and full-contrast text.
- Added the Search Results template (`search.html` + `template-search.php`), a Page (No Title) custom template (`page-no-title.html` + `template-page-no-title.php`, registered in `theme.json` `customTemplates`), and a shared Taxonomy template (`taxonomy.html` + `template-taxonomy.php`) covering all four Portfolio taxonomies (LS-1226).
- Extracted `front-page.html`, `index.html`, `page.html`, `single.html`, and `archive.html` into dedicated pattern files (`hero` + `front-page-latest-posts`, `template-index`, `template-page`, `template-single`, `template-archive`) so every template body is a single pattern injection, per the new template/pattern naming convention (LS-1226).
- Built out `archive.html`'s main content (query title, term description, paginated post query loop), which previously rendered no content at all (LS-1226).
- Added `settings.layout.contentSize` (`800px`) and `wideSize` (`1370px`) to `theme.json` to match the design system's Figma values (LS-1226).
- Wired Yoast SEO's native `yoast-seo/breadcrumbs` block into the `Breadcrumbs` pattern and added the `breadcrumbs` template part to the `page`, `single`, and `archive` templates (LS-1228 Part 2). The pattern degrades gracefully (renders nothing) if Yoast SEO is inactive.
- Added reusable `Glass Button` and `Glass Card` block style variations that apply the shared Sass frosted-glass surface treatment to buttons and Group-based card shells (`Glass Button` since folded into its one consumer pattern by LS-2341 — see Removed below; `Glass Card` remains a real reusable style).
- Added a `Card - Services` pattern with a reusable accent-border gradient contract, a matching services card section style (since folded into the pattern by LS-2341), and a blue tick list block style.
- Added a `Solutions Card` pattern with a reusable `Icon Frame Glow` group style (since folded into the pattern by LS-2341) and a compact shared-arrow card CTA button style.
- Added individual merged block preset files under `styles/presets/blocks/` so live block runtime defaults can be maintained one block per file.
- Added a theme-local `themejson-completion` skill, `ThemeJSON Completer` agent, and `complete-theme-json` prompt for approval-first Global Styles completion work.
- Registered the theme font-family presets as `body`, `heading`, and `monospace`, and applied the `monospace` preset to code elements in `theme.json`.
- Added a Sass source layer under `src/scss/` with reusable mixin families for breakpoints, motion, surfaces, and glass effects.
- Added a GSAP asset bootstrap in `inc/gsap.php` for class-based interactive effects.
- Added a GSAP-driven `is-style-card-spotlight` group effect using theme surface and accent colours.
- Added usage documentation for the spotlight card class.
- Added a registered `Card Spotlight` Group block style for easy editor application.
- Added a CSS-only sliding icon treatment for the core outline button variation.
- Added a GSAP-powered front-page hero with rotating proof points, interactive network background, and primary / outline CTAs.
- Added a dedicated `front-page.html` template that renders the marketing hero before editable page content.
- Added a repo-scoped semantic design-token instruction for theme colour work.
- Added a portable `theme-color-token-enforcer` skill to audit or fix semantic colour token usage.
- Added a theme-local `pattern-extractor` skill and matching `extract-pattern` prompt wrapper for Figma-to-pattern workflows that honour semantic tokens and CSS-versus-GSAP motion routing.
- Added a CSS-only `Card - Feature` group treatment, a matching inline CTA paragraph style, and an insertable single-card pattern at `patterns/cards/card-feature.php`.
- Added a Playwright end-to-end testing setup (LS-2335), matching the official `create-playwright` scaffold: `@playwright/test`, `dotenv`, and `@types/node` as dev dependencies, and `playwright.config.ts` configured for all 3 browser projects (Chromium, Firefox, WebKit) with `baseURL` read from a local, gitignored `.env` (`BASE_URL=`) so each developer points tests at their own environment — no CI wiring, run manually via `npx playwright test`. Added a real spec (`tests/specs/work-archive.spec.ts`) exercising all 6 generic assertion helpers from `tests/helpers/assertions.ts` (LS-2244) against the live Work Archive template — section order, category-card count/parts, hero link href, related-routes grid reflow at mobile, and stats-grid divider styling.
- Added a standing, content-agnostic Playwright regression suite (LS-2335) under `tests/specs/standing/`, run manually against the staging site rather than any single template: `site-health`, `runtime-errors`, `network-errors`, `accessibility` (via `@axe-core/playwright`), `internal-links`, `responsive-overflow`, `media-integrity`, and `special-routes` (search + 404). Backed by a sitemap/REST/crawl URL-discovery fixture (`tests/helpers/site-urls.ts`) with a fetch timeout, crawl-path exclusions (`wp-admin`, `wp-login.php`, feeds), and a hard crawl-budget guardrail. All standing assertions use `expect.soft()` so every discovered URL is checked in full instead of stopping at the first failure.
- Added a BugHerd reporter (`tests/reporters/bugherd-reporter.ts`) that auto-logs standing-suite failures as BugHerd tasks, scoped only to `tests/specs/standing/` — other specs never create tasks. Deduplicates by a stable `external_id` derived from the spec and a normalized failure signature (`tests/helpers/failure-signature.ts`), so the same underlying bug across many pages becomes one task instead of one per page, while genuinely distinct bugs (e.g. two different broken links) stay separate. Reads `BUGHERD_API_KEY`/`BUGHERD_PROJECT_ID` from `.env`.

### Changed

- Moved the majority of `assets/css/animations.css`'s structural (non-motion) CSS into `theme.json`/`styles/**` JSON block-style partials across buttons, cards, footer, header, mega menu, mobile menu, details/accordion, and links — leaving only real motion (transitions, transforms, `@keyframes`) and a small set of confirmed WordPress/JSON limitations (no `:hover`/`:focus` generation for arbitrary style variations, `@media`/`@supports` stripped from the `styles/**.json` `css` field, content referencing Sass variables) in Sass. `assets/css/animations.css` dropped from 2,003 to 1,444 lines (LS-2340).
- Eliminated 3 of 5 files under `src/scss/abstracts/mixins/` (`_mq.scss`, `_breakpoints-theme.scss`, `_glass.scss`) by inlining every remaining call-site as literal CSS; `_motion.scss` and `_surface.scss` remain only because the dead `gsap/_card-spotlight.scss` (tracked for removal on LS-2341) still references them. Removed the now-unneeded `sync:breakpoints` npm script and its `theme-utils.mjs` implementation.
- Consolidated 3 groups of byte-identical (or near-identical) hover/motion rules that had been duplicated once per consuming file — a shared circular icon-button hover contract (header search button, mobile-menu close button, footer proof-card, footer social-icon), a shared mega-menu-item row hover contract, and a shared frosted-glass `@supports` blur block — into one new partial, `src/scss/animations/_shared-hover.scss`.
- Fixed a render-order bug in `inc/portfolio-card-colors.php`: the WooCommerce card-colour swap now runs on `render_block` (after WordPress has already generated the block's own markup and decided which style variation applies) instead of `render_block_data`, whose pre-render `$block['attrs']` proved unreliable for reading `core/group` post context inside a Post Template Query Loop — confirmed empirically (LS-2341) — so WooCommerce-tagged Portfolio cards no longer silently lose their intended styling.
- Renamed section-level patterns to lead with `section-` (`section-cta`, `section-cta-consultation-band`/`inline`/`reassurance`/`strip`, `section-card-feature`/`services`/`solutions`, `section-stats-grid`) to distinguish freely-insertable section patterns from full-page template patterns and page-scoped content patterns (LS-1226).
- Refactored `src/scss/animations.scss` and `src/scss/gsap-animations.scss` into loader entrypoints backed by smaller contextual partials, normalised live preset JSON onto WordPress shorthand for non-colour tokens, and removed the dead `settings.custom.button-padding` branch.
- Made `theme.json` custom layout breakpoints the build-time source for the Sass `mq()` map, and tightened the CSS build to compile only explicit Sass entry files so tracked source-directory CSS artefacts can no longer override live assets.
- Styled the merged `core/details` preset as the site accordion contract, including token-driven default, hover, focus, and open states, tuned chevron alignment, custom typography font-weight tokens for the question and answer text, and moved the selector-driven accordion layer into Sass for maintainability.
- Moved the longer heading, link, list, card, glass, and button style contracts out of inline style JSON and into `src/scss/animations.scss`, added maintenance notes to the migrated style files, and standardised the shared gradient contract on `--ls-accent-gradient-*`.
- Moved authored effect CSS maintenance to Sass entry files that compile back to `assets/css/animations.css` and `assets/css/gsap-animations.css`, while keeping the WordPress runtime asset paths unchanged.
- Rewired shared card icon shells onto the existing accent token path so dark-mode accent remaps stay in sync across icon shells, list markers, and related card accents, and removed the services card icon rotation from its hover state.
- Normalised the GSAP hero mobile breakpoint onto the canonical `theme.json` breakpoint naming set by routing the authored media query through the new `mq()` mixin.
- Tightened the theme.json workflow and instruction files so all live block configuration must be authored in individual `styles/presets/blocks/*.json` files rather than directly in `theme.json`.
- Tightened the theme-local pattern extractor guidance so patterns are grouped into subfolders, card icons use a nested Group plus Icon Block structure, radius values always resolve through presets, whole-card hover states are preferred for interactive cards, and reusable muted-text and hover-shadow tokens are favoured over card-specific hardcoding.
- Enabled root-padding-aware alignments, added theme typography writing-mode support, and applied a default spacing-20 horizontal page gutter in `theme.json`.
- Moved block-style visual tokens into `theme.json` and `styles/blocks/**/*.json`, leaving `assets/css/animations.css` as the interaction layer for the heading, link, and button treatments.
- Started the semantic colour token migration by adding a minimal `settings.custom.color` layer to `theme.json` and `styles/dark.json`, then rewiring the button, heading, and paragraph style JSON hotspots onto semantic tokens.
- Corrected the first dark-mode semantic token mappings so surface and foreground roles invert properly while interactive accents shift contextually within the existing palette.
- Clarified that `styles/dark.json` keeps the same preset palette values as `theme.json`, with only the semantic token preset assignments changing between modes.
- Expanded the token migration across shared preset JSON, animation fallbacks, spotlight card surfaces, and dark-aware custom shadow tokens.
- Added shared animation and z-index custom tokens to `theme.json`, documented how agents should use them, and rewired common motion and stacking literals onto those shared tokens.
- Rewired the GSAP runtime to read shared theme animation tokens for common durations and easings, and to resolve the hero effect colours from the semantic custom token layer.
- Corrected the shared button spacing token references and narrowed the outline button icon well so the fill and outline buttons keep equal height without the outline label or icon frame breaking.
- Reduced the outline button's top and bottom padding by the border thickness so it stays level with the fill button while preserving the narrower square icon frame.
- Tightened the token guidance so same-family semantic tokens must be reused before new ones are created, and re-mapped the light surface tokens so only distinct surface roles keep distinct preset assignments.
- Re-aligned the home hero GSAP wiring to the reusable `Home Hero Section` block style and dropped the abandoned cycling heading path.
- Moved theme and heading line heights in `theme.json` onto shared custom tokens, with H1 using a tighter value and H2 through H6 sharing a common heading rhythm.
- Refined the GSAP spotlight card glow alignment and switched the card shell to a lighter theme palette.
- Refined the GSAP front-page hero so the network background sits behind the headline, responds more directly to pointer movement, and swaps words with a right-to-left character stagger.
- Reduced the default H1 weight in `theme.json` and rebuilt the hero word loop so longer words no longer clip, overlap, or reset with a blank frame.
- Fixed the homepage template so sites using `show_on_front = posts` render the posts query beneath the hero instead of an empty static-page `post-content` block.
- Tightened the hero word-stage measurement, removed the empty transition frame, and added smaller-screen layout rules so the hero scales more cleanly on mobile.
- Softened the hero word transition so the letters stagger vertically from right to left without the word shifting too far sideways during the swap.
- Replaced the hero's stacked-word repeat timeline with a two-layer word controller so the active word sits slightly higher and the loop no longer starts with an empty frame.
- Added a subtle character gap to the animated hero word so the rotating terms read a little more cleanly.
- Simplified the spotlight effect configuration so live tuning happens directly in `assets/css/gsap-animations.css`.
- Moved GSAP-specific spotlight styling from `assets/css/animations.css` to `assets/css/gsap-animations.css`.
- Removed glow hover styling from default and outline buttons so only the dedicated glow button style blooms.
- Renamed the default fill button interaction tokens to a dedicated fill-button namespace and kept the configured fill styling intact.
- Matched the core outline button sizing and typography to the configured fill button proportions.
- Removed the outline border shimmer and kept the core outline button as a solid border with a sliding icon well.
- Added small-screen responsive sizing for the default fill and outline buttons so long labels can wrap cleanly while preserving the icon slide.
- Centred the default fill button arrow inside a fixed icon well so it stays aligned across desktop and small-screen sizes.
- Switched local theme asset enqueue versions to file modification times so CSS and JS edits invalidate browser cache during development.
- Replaced all placeholder tokens with final `ls-theme` / `LightSpeed` values across all files.
- Updated `README.md`, `AGENTS.md`, and `.github/copilot-instructions.md` to reflect the real theme repo rather than a starter template.
- Updated theme prompts and instructions to require semantic custom colour tokens, matching `styles/dark.json` token paths, and WCAG AA contrast checks for new colour work.

### Deprecated

### Removed

- Removed ~30 single-use "fake" `is-style` block-style variants that cluttered the block editor's style picker with options that were never a real second editorial choice (LS-2341): folded each into its one consumer pattern as real inline block attributes, or as scoped plain-classname CSS under the new `src/scss/structural/` directory where JSON block-supports genuinely can't express the rule (nested selectors, custom-property recipes, layered gradients). Converted `badge-brand`/`badge-woocommerce` and `card-banner-tint`/`card-banner-tint-woocommerce` from registered is-styles into plain classes swapped programmatically by `inc/portfolio-card-colors.php`, since they were a taxonomy-driven state flag, not an editorial choice. Deleted 6 fully dead, zero-consumer style files found during the audit, plus the single-use button (`button-cta-gradient`, `glass-button`, `button-glow-accent`), heading (`gradient-accent`, `shadow-heading-base`, `shadow-heading-contrast`), and paragraph/link (`footer-nav-link`, `link-underline-accent`) variants found in those same families. Left only the genuinely multi-consumer variants within icon-well, buttons, headings, and paragraph/link (e.g. `link-arrow-accent`, `button-arrow-compact`, `button-secondary`) registered as-is.
- Removed stale compiled CSS and source-map artefacts from `src/scss/` so `assets/css/` remains the only runtime stylesheet output tree.
- Removed the experimental vanilla JavaScript spotlight card implementation pending GSAP evaluation.
- Removed the section style contract loader for `styles/sections/*.json` runtime CSS generation.
- Removed the temporary experimental button variation and its temporary selector path.
- Removed the temporary CSS/JS light-dark toggle built for the header (`inc/theme-toggle.php`, `assets/js/theme-toggle.js`, `assets/css/theme-toggle.css`, the `generate-theme-toggle` command in `theme-utils.mjs`, and the toggle button markup in `patterns/header.php`). This was a workaround built before discovering the site already has a proper, native light/dark switcher — the `ls-plugin/style-switcher` block registered by the LightSpeed Site Plugin, which reads `styles/*.json` variations directly and needs no theme-side duplicate. The header currently has no light/dark toggle until that block is wired in as follow-up work; fully recoverable from git history if needed sooner (LS-1618).
- Removed `tests/specs/work-archive.spec.ts`, `tests/specs/work-single.spec.ts`, and `tests/specs/archive-pagination.spec.ts` (LS-2335) — these tested one specific page/template's identity rather than a reusable, generic component or behavior, which doesn't fit this suite's intended shape. Fully recoverable from git history if a page-specific spec is wanted again later. `tests/helpers/assertions.ts` is kept, since `media-integrity.spec.ts` (standing suite) still uses `expectElementCount` from it.

### Fixed

- Fixed several pre-existing bugs surfaced while auditing the is-style layer (LS-2341): a `wp:list` block with a duplicated base classname breaking editor validation on the Work Discuss Project CTA; hand-authored inline spacing styles on `core/query`/`core/columns` that neither block nor the theme's settings actually support; the `ls-plugin/taxonomy-filter` block being inserted as a self-closing void block when its `save()` returns a real wrapper div; `assets/js/gsap-effects.js` querying a stale classname after a fold-in rename, breaking the homepage hero's GSAP initialization; the WooCommerce card-colour swap not reliably reading post context for `core/group` blocks on `render_block_data` inside a Post Template loop (moved to `render_block`); and WordPress core's default `.wp-block-group.has-background` padding going un-overridden on the Work Project Card, inset-ing its banner grid.
- Fixed an invalid nested `wp:site-title` block inside `patterns/footer.php`'s paragraph markup that broke block parsing on every template (LS-1226).
- Fixed `patterns/breadcrumbs.php` rendering full-bleed instead of content width by removing an unnecessary `align:full` (LS-1226).
- Fixed the header search field rendering incorrectly in the Site Editor (input shown expanded by default) by adding `assets/css/animations.css` via `add_editor_style()` in `functions.php`, so it reliably reaches the Site Editor's iframed canvas rather than only the outer wp-admin document (LS-1618).
- Fixed inconsistent column widths in the footer nav link grid (`patterns/footer.php`): the second row (Company/Studio) used a fixed `226px` column against an auto column, splitting differently than the first row's three auto-equal columns above it, so nothing lined up as a grid. Both rows now use the same auto-equal column pattern, with an empty spacer column completing the second row to three tracks (LS-1618).
- Fixed mega-menu item icon alignment across the Work, Solutions, Pricing, Insights, and About menus (31 items total): the icon, text block, and trailing arrow were direct siblings all vertically centred together, so aligning the icon to the top would have also incorrectly pushed the arrow to the top. Wrapped the text block and arrow together in their own centred group so the icon can align to the top independently while the arrow stays vertically centred against the text (LS-1618).
- Fixed the footer's phase-colour nav dots and social icons rendering black in both light and dark mode: none of their `<svg>` markup declared `fill="currentColor"`, so the browser's default SVG fill (solid black) was used instead of the semantic colour token set via their inline `color` style. Added `.site-footer .icon-container svg { fill: currentColor; }` in `src/scss/animations/_footer-motion.scss`, the same fix already used for `is-style-icon-frame-glow` and the Services card icon shell (LS-1618).
- Fixed several elements missing the `has-text-color` class despite setting an inline `style.color.text` attribute, causing the block editor to flag them as invalid content on re-insertion, across 9 pattern files (LS-2436).
- Fixed non-existent `x-small`/`small`/`medium` `fontSize` slugs and a non-existent `x-small` spacing slug referenced in several patterns/templates — none of these slugs were ever registered in `styles/presets/typography.json` or `spacing.json` — replaced with real registered slugs (LS-2436).
- Fixed `settings.custom.color.surface.band-start`/`band-end`/`on-dark-card` in `theme.json`/`styles/dark.json` being byte-identical between light and dark mode (hardcoded rather than tokenised); gave dark mode its own distinct, contrast-checked values. Added a `text.brand-on-dark` token so on-dark text/icon colour meets WCAG AA 4.5:1 in both modes (LS-2436).

### Security

---

## [0.1.0] - YYYY-MM-DD

### Added

- Initial LightSpeed Theme repository setup.
- Root theme files: `style.css`, `theme.json`, `functions.php`, `readme.txt`.
- Block template: `templates/index.html`.
- Block template parts: `parts/header.html`, `parts/footer.html`.
- Style variations: `styles/light.json`, `styles/dark.json`.
- Asset folders: `assets/fonts/`, `assets/icons/`, `assets/logos/`, `assets/images/`, `assets/css/`, `assets/js/`.
- Validation and utility script: `theme-utils.mjs`.
- Node-based tooling: `package.json`, `.lintstagedrc.json`, `.nvmrc`.
- PHP tooling: `composer.json`.
- GitHub config: `.editorconfig`, `.gitignore`, `.gitattributes`, `.coderabbit.yml`, `CODEOWNERS`.
- AI guidance: `AGENTS.md`, `CLAUDE.md`.
- GitHub Copilot instructions: `.github/copilot-instructions.md`, `.github/instructions/`.
- GitHub prompts: `.github/prompts/`.
- GitHub reports folder: `.github/reports/`.
- GitHub tasks folder: `.github/tasks/`.
- GitHub Actions workflows: `ci.yml`, `code-quality.yml`, `release.yml`.
- Portable agent assets: `.agents/skills/`, `.agents/agents/`.
- End-user documentation folder: `docs/`.

---

[Unreleased]: https://github.com/lightspeedwp/ls-theme/compare/v0.1.0...HEAD
[0.1.0]: https://github.com/lightspeedwp/ls-theme/releases/tag/v0.1.0
