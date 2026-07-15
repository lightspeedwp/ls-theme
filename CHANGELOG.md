# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

---

## [Unreleased]

### Added

- Wired Yoast SEO's native `yoast-seo/breadcrumbs` block into the `Breadcrumbs` pattern and added the `breadcrumbs` template part to the `page`, `single`, and `archive` templates (LS-1228 Part 2).
- Declared a `Requires Plugins: wordpress-seo` theme header so sites are notified when Yoast SEO is missing.
- Added reusable `Glass Button` and `Glass Card` block style variations that apply the shared Sass frosted-glass surface treatment to buttons and Group-based card shells.
- Added a `Card - Services` pattern with a reusable accent-border gradient contract, a matching services card section style, and a blue tick list block style.
- Added a `Solutions Card` pattern with a reusable `Icon Frame Glow` group style and a compact shared-arrow card CTA button style.
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

- Removed stale compiled CSS and source-map artefacts from `src/scss/` so `assets/css/` remains the only runtime stylesheet output tree.
- Removed the experimental vanilla JavaScript spotlight card implementation pending GSAP evaluation.
- Removed the section style contract loader for `styles/sections/*.json` runtime CSS generation.
- Removed the temporary experimental button variation and its temporary selector path.

### Fixed

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
