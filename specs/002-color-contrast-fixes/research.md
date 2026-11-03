# Phase 0 Research: Fix WCAG Color-Contrast Accessibility Violations (LS-2934)

## Unknown 1: Does an existing token satisfy the caption-on-dark-background fix (FR-001), or is a new token pair required?

**Decision**: Reuse the existing `--wp--custom--color--text--on-dark-muted` token. No new token needed.

**Rationale**: This token already exists in `theme.json` (`settings.custom.color.text.on-dark-muted`, resolving to preset `neutral-400` / `#B8B8B8`) and is exactly the semantic use case needed — muted text on a dark surface. Checked its actual resolved contrast against the theme's `contrast` background token (`#080808`, the dark post-background color): **10.1:1**, comfortably clearing the 4.5:1 AA minimum for normal text. Per Constitution Principle III ("verify what a token actually resolves to rather than inferring from its name"), the resolved value was computed directly (WCAG relative-luminance contrast formula) rather than assumed from the token name.

**Alternatives considered**:
- Introducing a new `text--caption-on-dark` token — rejected because an existing token already satisfies the requirement with a wide margin (10.1:1 vs the 4.5:1 minimum), and Constitution Principle II (Reuse Before Create) requires checking for a fit before adding a new token.
- Reusing `--text--on-dark` (the token currently causing violation #2, resolving to `base`/`#FAFAFA`) for captions too — not evaluated, since it's the wrong semantic fit (full-emphasis text token, not muted/secondary text) and isn't the token actually causing this violation (captions currently inherit WordPress core's unthemed default `#555555`, not any theme token at all).

## Unknown 2: Does an existing token satisfy the taxonomy-filter-pill fix (FR-002), or is a new token pair required?

**Decision**: Reuse the existing `--wp--custom--color--text--on-light` token. No new token needed.

**Rationale**: The failing pair is `background-color: var(--wp--custom--color--card--platform--wordpress)` (resolves to a brand blue, `#5c90ff` as rendered live) with `color: var(--wp--custom--color--text--on-dark)` (`#FAFAFA`) — actual ratio 2.92:1. The existing `--text--on-light` token resolves to the `contrast` preset (`#080808`, a near-black). Computed contrast of `#080808` against the live blue background: **6.57:1**, clearing AA with margin. This token already exists and is used elsewhere in the theme for dark text on light/mid-brightness surfaces.

**Alternatives considered**:
- Adding a new token pair specifically for "text on platform-wordpress blue" — rejected; an existing general-purpose token already resolves correctly, so a new one would duplicate it (Principle II).
- Darkening the background token instead of changing the text token — rejected; `--card--platform--wordpress` is a shared token likely used elsewhere (e.g. other platform/brand card treatments), and the spec's edge cases explicitly call for not modifying a shared token if it risks side effects elsewhere. Changing only the locally-scoped `.taxonomy-filter-current` text color has no shared-token blast radius.
- **Naming caveat**: `--text--on-light` is semantically named for light backgrounds, but its *resolved* dark value is what makes it work here against a medium-blue background — this is exactly the "verify resolved value, don't infer from name" case Constitution Principle III warns about. This is noted for whoever reviews the diff, since the token name won't intuitively read as "text on a blue pill" — but per Reuse Before Create, correctness of the resolved value takes precedence over naming intuition, and renaming/aliasing an existing shared token is out of scope for a 2-line contrast fix.

## Unknown 3: Where does a new sitewide/theme-wide SCSS rule belong, given AGENTS.md's animations-file restriction?

**Decision**: New partial at `src/scss/structural/image-captions.scss`, registered as its own `src:dest` pair in `package.json`'s `build:css`, `build:css:dev`, and `watch:css` scripts, following the exact pattern already used for every other file under `src/scss/structural/` (each compiles 1:1 to its own file under `assets/css/`).

**Rationale**: `src/scss/animations/**` and `assets/css/animations.css` are restricted by Constitution Principle I to motion-only properties (`@keyframes`, `transition`, `transform`, `animation`, `will-change`) — a `color` declaration does not qualify and placing it there would be a direct constitution violation. `src/scss/structural/` is the established location for non-motion, non-JSON-expressible SCSS in this repo (confirmed: `taxonomy-filter.scss`, the file already being edited for violation #2, lives there).

**Alternatives considered**:
- Adding the caption-color rule directly inside `taxonomy-filter.scss` — rejected; unrelated to that file's shape (filter pills, not captions), and Principle II's shape-based naming convention argues against bundling unrelated concerns into one file.
- Expressing the rule via `theme.json`/`styles/dark.json` block-style JSON instead of SCSS — considered per Principle I's JSON-first preference, but WordPress's `theme.json` currently has no generic `elements.caption` key comparable to `elements.link`/`elements.heading` for arbitrary caption styling across contexts; this would need confirming against the theme's installed WP version before ruling out. Flagged as a design-time check during implementation (see quickstart.md) rather than a blocking unknown, since the SCSS-partial approach is already a proven, constitution-compliant fallback consistent with sibling files in this repo.

## Unknown 4: How does a new compiled CSS file get loaded on the frontend?

**Decision**: Follow the existing enqueue pattern used for sibling structural CSS files (e.g. `taxonomy-filter.css`), confirmed in `inc/animations.php` (frontend enqueue) and `functions.php` (`add_editor_style()` for editor parity) — add equivalent entries for the new `image-captions.css` file rather than inventing a new enqueue mechanism.

**Rationale**: Consistent with Constitution Principle VII (no new PHP architecture; use the existing enqueue conventions already present in this theme).

**Alternatives considered**: None — this is a direct, established pattern with no reasonable alternative in a WordPress classic-enqueue theme.

## Summary of resolved unknowns

| # | Unknown | Resolution |
|---|---|---|
| 1 | New token needed for caption fix? | No — reuse `--text--on-dark-muted` (10.1:1 against dark bg) |
| 2 | New token needed for filter-pill fix? | No — reuse `--text--on-light` (6.57:1 against blue bg) |
| 3 | Where does the new SCSS rule live? | `src/scss/structural/image-captions.scss` (new file) |
| 4 | How is the new CSS enqueued? | Same pattern as `taxonomy-filter.css` in `inc/animations.php` / `functions.php` |

All `NEEDS CLARIFICATION` items from Technical Context are resolved. No blockers remain for Phase 1 design.
