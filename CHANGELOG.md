# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

---

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

### Fixed

- Fixed several pre-existing bugs surfaced while auditing the is-style layer (LS-2341): a `wp:list` block with a duplicated base classname breaking editor validation on the Work Discuss Project CTA; hand-authored inline spacing styles on `core/query`/`core/columns` that neither block nor the theme's settings actually support; the `ls-plugin/taxonomy-filter` block being inserted as a self-closing void block when its `save()` returns a real wrapper div; `assets/js/gsap-effects.js` querying a stale classname after a fold-in rename, breaking the homepage hero's GSAP initialization; the WooCommerce card-colour swap not reliably reading post context for `core/group` blocks on `render_block_data` inside a Post Template loop (moved to `render_block`); and WordPress core's default `.wp-block-group.has-background` padding going un-overridden on the Work Project Card, inset-ing its banner grid.
- Fixed an invalid nested `wp:site-title` block inside `patterns/footer.php`'s paragraph markup that broke block parsing on every template (LS-1226).
- Fixed `patterns/breadcrumbs.php` rendering full-bleed instead of content width by removing an unnecessary `align:full` (LS-1226).
- Fixed the header search field rendering incorrectly in the Site Editor (input shown expanded by default) by adding `assets/css/animations.css` via `add_editor_style()` in `functions.php`, so it reliably reaches the Site Editor's iframed canvas rather than only the outer wp-admin document (LS-1618).
- Fixed inconsistent column widths in the footer nav link grid (`patterns/footer.php`): the second row (Company/Studio) used a fixed `226px` column against an auto column, splitting differently than the first row's three auto-equal columns above it, so nothing lined up as a grid. Both rows now use the same auto-equal column pattern, with an empty spacer column completing the second row to three tracks (LS-1618).
- Fixed mega-menu item icon alignment across the Work, Solutions, Pricing, Insights, and About menus (31 items total): the icon, text block, and trailing arrow were direct siblings all vertically centred together, so aligning the icon to the top would have also incorrectly pushed the arrow to the top. Wrapped the text block and arrow together in their own centred group so the icon can align to the top independently while the arrow stays vertically centred against the text (LS-1618).
- Fixed the footer's phase-colour nav dots and social icons rendering black in both light and dark mode: none of their `<svg>` markup declared `fill="currentColor"`, so the browser's default SVG fill (solid black) was used instead of the semantic colour token set via their inline `color` style. Added `.site-footer .icon-container svg { fill: currentColor; }` in `src/scss/animations/_footer-motion.scss`, the same fix already used for `is-style-icon-frame-glow` and the Services card icon shell (LS-1618).

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
