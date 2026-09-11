# Implementation Plan: Services Page (Remaining Sections & QA)

**Branch**: `feature/ls-1598-services-page-batch-2` | **Date**: 2026-09-11 | **Spec**: [spec.md](./spec.md)

**Input**: Feature specification from `/specs/001-services-page/spec.md`

## Summary

Complete the LightSpeed Services page (LS-1598). Hero, "Linked decisions", "Service clusters",
and "Service tiles" sections are already built and merged (PR #51, #54) and together already
cover all six lifecycle stages (Discover → Create → Build → Launch → Grow → Evolve) per
spec.md's Clarifications session — no further lifecycle-stage sections are needed. The
remaining scope is exactly three new `ls-theme` block patterns confirmed against Figma:

1. **Entry Points** ([Figma node 8044-164205](https://www.figma.com/design/OTqchq3sRBzUy6TICruzc3/LightSpeedWP-Design-System?node-id=8044-164205))
2. **Delivery by the Numbers** ([Figma node 8044-164253](https://www.figma.com/design/OTqchq3sRBzUy6TICruzc3/LightSpeedWP-Design-System?node-id=8044-164253))
3. **Closing CTA** ([Figma node 8044-164294](https://www.figma.com/design/OTqchq3sRBzUy6TICruzc3/LightSpeedWP-Design-System?node-id=8044-164294))

...followed by SEO metadata, design QA against Figma, and a responsive check — all as
WordPress block-theme patterns/templates, no custom PHP architecture or backend services.

## Technical Context

**Language/Version**: PHP (block theme, no plugin logic), Sass/SCSS compiled to CSS, block
markup (HTML comments) for patterns

**Primary Dependencies**: WordPress block theme conventions (`theme.json`, Site Editor
patterns/templates), existing `ls-theme` build tooling (`theme-utils.mjs`, Sass build), the
`lightspeed` icon collection (`core/icon` + `lightspeed/{slug}`, registered in `ls-plugin` via
the WordPress 7.1 icon API) per the theme's current icon-block migration (LS-3229) — **not**
the legacy `outermost/icon-block` plugin, GSAP only if a section genuinely needs JS-driven
motion CSS cannot express. This repo's own `.agents/skills/` toolchain is the primary
implementation dependency for each new pattern: `pattern-extractor` (Figma → pattern
conversion, reuse-or-create workflow, Phosphor/Icon-Block mapping), which mandatorily loads
`theme-color-token-enforcer` (semantic color token audit/fix, dark-mode parity, contrast) for
any file it creates or touches, and `wp-block-style-audit` (the JSON-vs-CSS decision authority
for any `styles/**/*.json` file) — per constitution Principle II

**Storage**: N/A (static theme patterns/content; no custom data storage)

**Testing**: Manual Site Editor verification, `theme-utils.mjs` validation/lint commands
(`npm run schema:validate`, `npm run patterns:escape`, `npm run security:scan`,
`composer run phpcs`), visual QA against Figma, WCAG AA contrast checks — the `validate_blocks`
tool is banned by the project constitution and MUST NOT be used

**Target Platform**: WordPress Site Editor / front-end, responsive desktop/tablet/mobile

**Project Type**: WordPress block theme (single project — no frontend/backend split)

**Performance Goals**: Standard front-end page-load expectations for a marketing/hub page; any
new structural CSS bundle's front-end enqueue condition should use a real WordPress
conditional tag (e.g. `is_page( 'services' )`) rather than loading unconditionally, once that
condition is actually knowable — it already is for this page

**Constraints**: Theme-first styling (`theme.json`/`styles/**` JSON before any hand-authored
CSS, each Sass exception commented with the specific JSON limitation it addresses); reuse
existing semantic color/typography/spacing tokens with light/dark parity, or add new ones with
real resolved values in both `theme.json` and `styles/dark.json`; new patterns and any new card
style named by shape, not by page, and only created after confirming no existing
pattern/style/token already fits; prefer semantic core blocks before a generic
group/columns fallback; SCSS-only for hand-authored styling, properly partial-scoped

**Scale/Scope**: Single page (`Services`), exactly 3 new section patterns (Entry Points,
Delivery by the Numbers, closing CTA), plus SEO metadata and a responsive QA pass

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

Checked against `.specify/memory/constitution.md` v1.2.0 (ratified 2026-09-11):

- **I. Theme-First Styling**: New sections style via `theme.json`/`styles/**` JSON first; any
  Sass exception must carry a `// JSON limitation: ...` comment. No violation anticipated.
- **II. Reuse Before Create**: Before building each of the 3 new patterns, check
  `styles/sections/cards/**` and existing Services page patterns for a fitting shape first
  (e.g. `card-link-row.json` is a plausible fit for Entry Points' link-style cards;
  `stat-segment.json` is a plausible fit for Delivery by the Numbers). Any new card style must
  be named by shape and justified by a genuine JSON-vs-inline gap, not page-scoped naming.
  Build each pattern via the `pattern-extractor` skill rather than ad hoc Figma translation —
  it already encodes this reuse-or-create workflow and mandatorily invokes
  `theme-color-token-enforcer`; consult `wp-block-style-audit` for any JSON-vs-CSS decision.
- **III. Token Parity**: No new tokens are expected (existing Services page sections already
  established a sufficient token set); if Figma QA reveals a genuine gap, any new token gets
  real resolved values in both `theme.json` and `styles/dark.json`.
- **IV. Core Blocks First**: CTA section uses `core/buttons`/`core/button`, not a hand-rolled
  link; Entry Points/Delivery by the Numbers use `core/heading`/`core/paragraph` over generic
  substitutes where a semantic block fits.
- **V. Accessibility and Security**: Heading hierarchy continues correctly from the existing
  page sections (no skipped levels); any whole-card-click pattern keeps the anchor
  `position: static` with the `::before` overlay on a `position: relative` ancestor; all PHP
  output escaped, translation functions used correctly.
- **VI. Validation Before Done**: Each new pattern passes `php -l`, `patterns:escape`,
  `security:scan`, `schema:validate` (for new JSON), and `phpcs --standard=WordPress` before
  being considered done. `validate_blocks` is never used.
- **VII. PHP Minimalism & Engineering Discipline**: No new PHP architecture is introduced —
  the 3 sections are patterns under `patterns/sections/`, with any enqueue wiring going into
  the existing `inc/animations.php`/`functions.php` structure, not a new file/class hierarchy.
  No new npm/Composer dependencies or build-pipeline changes are anticipated.

No violations anticipated — this feature is additive content/pattern work within existing
theme conventions. **Gate: PASS.**

## Project Structure

### Documentation (this feature)

```text
specs/001-services-page/
├── plan.md              # This file (/speckit-plan command output)
├── research.md          # Phase 0 output (/speckit-plan command)
├── data-model.md        # Phase 1 output (/speckit-plan command)
├── quickstart.md        # Phase 1 output (/speckit-plan command)
├── contracts/           # Phase 1 output (/speckit-plan command) — skipped, no external interface
└── tasks.md             # Phase 2 output (/speckit-tasks command - NOT created by /speckit-plan)
```

### Source Code (repository root)

```text
patterns/sections/
├── services-entry-points.php        # New — Entry Points section
├── services-delivery-numbers.php    # New — Delivery by the Numbers section
└── services-cta.php                 # New — closing CTA section

styles/sections/cards/
└── [only if Reuse Before Create confirms no existing card style fits — name by shape]

theme.json
styles/
├── sections/           # section-style JSON partials, reused/extended for the 3 new sections
└── dark.json           # required dark-mode parity for any new tokens (not expected)

src/scss/structural/
└── [only if a genuine JSON-gap styling need is identified — one file per new section,
    matching the existing services-*.scss naming convention, each rule commented with its
    specific JSON limitation]
```

**Structure Decision**: Single WordPress block-theme project (no frontend/backend split, no
contracts/API surface). The 3 remaining sections are delivered as `ls-theme` block patterns
under `patterns/sections/`, styled via `theme.json`/`styles/**` JSON first, assembled onto the
existing Services page (post ID varies by environment; slug `services`). No new PHP
architecture, storage, or services are introduced.

## Complexity Tracking

*No constitution violations identified — this section is not applicable.*
