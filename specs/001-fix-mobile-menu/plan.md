# Implementation Plan: Fix Mobile Menu — Restore Links and Remove Systems

**Branch**: `001-fix-mobile-menu` | **Date**: 2026-09-14 | **Spec**: [spec.md](./spec.md)

**Input**: Feature specification from `/specs/001-fix-mobile-menu/spec.md`

**Note**: This template is filled in by the `/speckit-plan` command; its definition describes the execution workflow.

## Summary

Mobile menu links in `parts/mobile-menu.html` (rendered inside WordPress core's Navigation block responsive/overlay container) are not clickable, and a dead `/systems/` link row must be removed. The fix is CSS/markup-only: identify and remove whatever is intercepting pointer events on the anchors inside the mobile drawer (an overlay layer, a stacking-context/z-index gap, or an animation library leaving a transform/pointer-events state applied after the open transition), delete the "Systems" `mobile-menu-link-row` paragraph block, and tighten the padding on the `.ls-simple-submenu-links` / `.is-style-mega-menu-item-service` page-list items inside each accordion, per the theme's existing SCSS-partial and theme.json-first conventions.

## Technical Context

**Language/Version**: PHP 8.x (WordPress block theme), HTML block markup (`parts/*.html`), Sass/SCSS compiled to `assets/css/*.css`

**Primary Dependencies**: WordPress core Navigation block (`core/navigation`, responsive/overlay container), core `<details>`/`<summary>` accordion block, GSAP (only if the click-blocking root cause turns out to be an animation/transform state — see research.md), no new dependencies planned

**Storage**: N/A (template part markup + compiled CSS only; no data persistence)

**Testing**: Manual QA in a browser/device emulator, plus the existing `tests/specs/navigation.spec.ts` Playwright suite (covers mobile menu open/close and accordion toggle at 375px, but not link destinations or 320px — those stay manual); PHP lint / theme.json schema checks per AGENTS.md validation commands; `validate_blocks` tool is banned per project policy — verify block markup via direct JSON/source inspection or the Site Editor instead

**Target Platform**: WordPress front end, mobile breakpoints (320px, 375px, and general mobile widths below the desktop nav breakpoint)

**Project Type**: WordPress block theme (single theme codebase, no frontend/backend split)

**Performance Goals**: No regression to existing mobile menu open/close animation performance; no additional render-blocking assets

**Constraints**: Theme-first approach — prefer `theme.json` / `styles/**` JSON partials over hand-authored SCSS wherever a JSON-registrable hook exists (per AGENTS.md); SCSS-only for anything JSON cannot express (e.g. core-generated `.wp-block-navigation__responsive-container*` markup, which has no registrable block-style slug); no hardcoded colors — reuse existing semantic tokens; must not regress WCAG 2.2 AA tap-target sizing when reducing padding

**Scale/Scope**: Single template part (`parts/mobile-menu.html`) plus its supporting SCSS partials (`src/scss/structural/_mobile-menu.scss`, `src/scss/animations/_mobile-menu-motion.scss`, `src/scss/animations/_details-motion.scss`, and possibly `_menu-motion.scss`/`_header-motion.scss` if the click-blocking cause lives in the shared open/close transition); no new template parts or patterns required

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

`.specify/memory/constitution.md` is still the unpopulated template (no ratified project-specific principles). This repository's actual governing document is [`AGENTS.md`](../../AGENTS.md), referenced from `CLAUDE.md`. Gates evaluated against it:

- **Theme-first approach**: PASS (planned) — padding/styling changes will prefer `theme.json`/`styles/**` JSON partials; SCSS is reserved for the core-generated overlay markup that has no JSON-registrable slug, consistent with existing comments in `_mobile-menu-motion.scss`.
- **SCSS-only, no hand-authored plain CSS**: PASS (planned) — any new/changed rules go into the existing partials under `src/scss/`, not `assets/css/*.css` directly.
- **No hardcoded colors, semantic token reuse**: PASS (planned) — no new colors are introduced by this fix; existing spacing tokens (`--wp--preset--spacing--*`) will be reused for padding reduction.
- **PHP Minimalism / no unnecessary abstraction**: PASS (planned) — this is a targeted markup removal + CSS fix, no new PHP logic, patterns, or blocks.
- **Accessibility (WCAG 2.2 AA)**: GATE — reduced padding must not shrink tap targets below the theme's existing `--wp--custom--spacing--tap-target-min` token or equivalent; verify during implementation.
- **`validate_blocks` tool banned**: PASS (planned) — verification will use JSON/source inspection and manual Site Editor checks only, per project memory.

No violations requiring justification. Re-checked after Phase 1 design below — still PASS, no new entities, contracts, or dependencies introduced.

## Project Structure

### Documentation (this feature)

```text
specs/001-fix-mobile-menu/
├── plan.md              # This file (/speckit-plan command output)
├── research.md          # Phase 0 output (/speckit-plan command)
├── data-model.md        # Phase 1 output (/speckit-plan command)
├── quickstart.md        # Phase 1 output (/speckit-plan command)
├── contracts/           # Phase 1 output (/speckit-plan command) — not applicable, see note below
└── tasks.md             # Phase 2 output (/speckit-tasks command - NOT created by /speckit-plan)
```

### Source Code (repository root)

This git repository's root **is** the theme root (`parts/`, `src/`, `styles/` sit directly at
the top level) — there is no nested `wp-content/themes/ls-theme/` path inside the repo itself;
that only describes where this checkout happens to sit inside a local WordPress install.

```text
parts/
└── mobile-menu.html                    # Template part: accordion labels, page-list links,
                                         # "Systems" row (removed)
src/scss/structural/
└── _mega-menu.scss                     # Single-column list layout, mobile-only padding
                                         # override, tap-target notes (Work/Solutions/Pricing/
                                         # Insights/About + Services phase links)
styles/blocks/
├── details/mobile-menu-accordion.json  # Accordion label link styling/focus states
└── groups/mega-menu-item-service.json  # Shared page-list-row style (mobile + desktop)
assets/css/
└── animations.css                      # Compiled build output — never hand-edited
```

**Structure Decision**: This is a single WordPress block theme codebase (no frontend/backend split, no
new project). The fix touches one template part (`parts/mobile-menu.html`), its existing SCSS
partials, and — where a registrable block-style slug already exists (e.g. `is-style-mobile-menu-accordion`,
`is-style-mega-menu-item-service`) — the corresponding `styles/**` JSON partial, per the theme's
theme-first / JSON-first convention. No new files, directories, patterns, or dependencies are
introduced. A `contracts/` directory is not applicable — this feature exposes no API, CLI, or
service interface; the "quickstart" instead documents manual browser verification steps.

## Complexity Tracking

*No Constitution Check violations — this section is not applicable.*
