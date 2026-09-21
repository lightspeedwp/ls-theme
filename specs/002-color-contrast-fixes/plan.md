# Implementation Plan: Fix WCAG Color-Contrast Accessibility Violations (LS-2934)

**Branch**: `fix/ls-2934-accessibility-color-contrast-fixes` | **Date**: 2026-09-18 | **Spec**: [spec.md](./spec.md)

**Input**: Feature specification from `/specs/002-color-contrast-fixes/spec.md`

## Summary

Two WCAG AA color-contrast violations (BugHerd #231, epic LS-2934) must be fixed using existing theme color tokens, with zero hardcoded hex values and full light/dark parity. Research (below) confirms both fixes can reuse **existing** tokens already defined in `theme.json`/`styles/dark.json` — no new token needs to be created. The approach is: (1) add one new theme-first SCSS partial that overrides `.wp-element-caption`/`figcaption` color using the existing `--wp--custom--color--text--on-dark-muted` token, scoped to dark-background post contexts; (2) swap one `color` declaration in the existing `taxonomy-filter.scss` partial from `--text--on-dark` to the existing `--text--on-light` token (which resolves to a dark value that passes contrast against the pill's blue background).

## Technical Context

**Language/Version**: SCSS (Dart Sass), compiled to static CSS; PHP 8.x (WordPress theme, no build framework beyond the Sass CLI)

**Primary Dependencies**: WordPress core theme.json token system; Dart `sass` CLI (already used by `npm run build:css`); `@axe-core/playwright` + Playwright (existing test suite, used for verification only — not modified)

**Storage**: N/A (static theme files — `theme.json`, `styles/dark.json`, `.scss`/`.css`)

**Testing**: Existing Playwright "standing suite" accessibility spec (`tests/specs/standing/accessibility.spec.ts`), run in scoped `SINGLE_PAGE_URL` mode against DEV per URL — no new test code needed, this feature is verified with the existing spec

**Target Platform**: WordPress block theme (`ls-theme`), all frontend browsers/viewports covered by the existing style system (no new platform surface)

**Project Type**: Single WordPress theme repository (no frontend/backend split, no mobile component)

**Performance Goals**: N/A — this is a pure color-value change; no measurable performance impact expected (no new assets, no new requests, one additional small compiled CSS file)

**Constraints**: Token-only color values (Constitution Principle III); no changes to layout/spacing/markup (spec FR-005); no hardcoded hex; must not regress light-background captions or filter pill default/hover states (spec FR-006)

**Scale/Scope**: 2 files changed (`taxonomy-filter.scss`), 1 new file added (new caption-color partial) + build script registration; 0 new color tokens required per research below

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

| Principle | Applicability | Status |
|---|---|---|
| I. Theme-First Styling | New caption-color rule is a `:hover`/pseudo-state-free plain color declaration expressible in JSON in principle, but the existing repo pattern for equivalent per-context color overrides (e.g. `taxonomy-filter.scss`) already lives in `src/scss/structural/**` as an SCSS partial compiled 1:1 to its own CSS file and separately enqueued — following that same established pattern for consistency, not introducing a new mechanism. Placed in `src/scss/structural/`, never `src/scss/animations/` (motion-only, per Principle I). | **PASS** |
| II. Reuse Before Create | Research (Phase 0) confirms both fixes reuse existing tokens (`text--on-dark-muted`, `text--on-light`) — zero new tokens created. New SCSS partial named by shape (`image-captions`), not by page. | **PASS** |
| III. Token Parity | Both reused tokens already have real, distinct, resolved light/dark values (verified in research.md) — no new token pair needed, so no parity gap possible. | **PASS** |
| IV. Core Blocks First | N/A — no block markup or attributes are changed, only inherited caption/pill color. | **N/A** |
| V. Accessibility and Security Non-Negotiables | This feature *is* the WCAG AA remediation; no PHP output/escaping surface is touched. | **PASS** |
| VI. Validation Before Done | Plan includes `npm run schema:validate` (if any JSON touched) and `npm run theme:validate` before completion; `validate_blocks` tool will NOT be used (banned). | **PASS** |
| VII. PHP Minimalism | If new CSS file needs enqueuing, follow the existing `inc/animations.php` / `functions.php` `add_editor_style()` pattern already used for sibling structural CSS files — no new PHP architecture. | **PASS** |

No violations requiring justification — Complexity Tracking section is not needed.

## Project Structure

### Documentation (this feature)

```text
specs/002-color-contrast-fixes/
├── plan.md              # This file
├── research.md          # Phase 0 output
├── data-model.md         # Phase 1 output (tokens as "entities", minimal — no runtime data model)
├── quickstart.md         # Phase 1 output — manual + scripted verification steps
├── tasks.md              # Phase 2 output (/speckit-tasks command — not created by this command)
└── checklists/           # /speckit-specify (requirements.md) and /speckit-checklist (accessibility.md) outputs
```

(No `contracts/` — this feature has no external API/interface surface; it is a static styling fix internal to the theme.)

### Source Code (repository root)

This is a single WordPress block theme repository — no frontend/backend split. Real paths affected:

```text
wp-content/themes/ls-theme/
├── theme.json                          # read-only reference for existing token values (no edits expected)
├── styles/dark.json                    # read-only reference for existing token dark values (no edits expected)
├── src/scss/structural/
│   ├── taxonomy-filter.scss            # EDIT: swap one `color` token on `.taxonomy-filter-current`
│   └── image-captions.scss             # NEW: dark-background caption color override
├── inc/animations.php or functions.php # EDIT (if needed): enqueue/register the new compiled CSS file,
│                                        #   following the existing pattern used for sibling structural CSS
├── package.json                        # EDIT: register new src→dest pair in build:css / build:css:dev / watch:css
├── assets/css/
│   ├── taxonomy-filter.css             # REGENERATED (compiled output, not hand-edited)
│   └── image-captions.css              # NEW (compiled output, not hand-edited)
└── tests/specs/standing/accessibility.spec.ts  # UNCHANGED — used as-is for verification
```

**Structure Decision**: Follow the repo's existing 1-SCSS-partial-to-1-compiled-CSS-file convention already used by every other file under `src/scss/structural/` (confirmed via `package.json`'s `build:css` script, which lists each structural partial and its compiled destination explicitly) — no new build tooling, no consolidation of partials, no framework change.

## Complexity Tracking

*Not applicable — no Constitution Check violations.*
