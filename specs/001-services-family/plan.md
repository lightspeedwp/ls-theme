# Implementation Plan: Services Family Pages

**Branch**: `001-services-family` | **Date**: 2026-09-16 | **Spec**: [spec.md](./spec.md)

**Input**: Feature specification from `/specs/001-services-family/spec.md`

## Summary

Build the LightSpeed Services section as a 3-level hierarchy — Services hub → 6 lifecycle-
phase pages (Discover, Create, Build, Launch, Grow, Evolve) → 14 service pages grouped under
those phases (21 pages total). The hub already has in-progress implementation (LS-1598) to
retro-fit against; the 6 phase pages and 8 of the 14 service pages have no existing content
and need to be built from scratch once their Figma frames are supplied. Technical approach:
pure `ls-theme` block patterns/templates (no new PHP, no new CPTs/taxonomies — per the
constitution's Theme/Plugin Ownership Boundary, this is presentation content, not a plugin
concern), reusing two new shared patterns (a Phase Hero/Badge pattern and a Service Card
pattern) across all 6 phase pages and 14 service pages respectively, rather than one bespoke
pattern per page.

## Technical Context

**Language/Version**: PHP 8.1+ (theme baseline per `style.css`), block markup (HTML comments
+ Gutenberg block grammar), JSON (`theme.json`, `styles/**/*.json`)

**Primary Dependencies**: WordPress 6.9+ core block editor; `ls-plugin` only if a page needs
plugin-owned behavior (none identified for this batch — all 21 pages are static content
pages, no CPT/taxonomy/custom-block logic required)

**Storage**: N/A — each page is a standard WordPress `page` post; no custom fields, CPTs, or
database schema needed for this batch

**Testing**: Manual QA per the constitution's QA & Verification Integrity principle
(cross-device/cross-theme visual verification, accessibility spot-check) is the primary gate
for every page. The repository's existing Playwright suite (`playwright.config.ts`,
`playwright-report/`) covers generic regression assertions and MAY be extended for this
batch, but does not substitute for manual verification per Principle VII.

**Target Platform**: WordPress 6.9+ site (`ls-agency.lightspeedwp.dev` dev/staging), block
theme (`ls-theme`)

**Project Type**: WordPress block theme — single project, no frontend/backend split, no
build pipeline beyond the existing `npm run build:css` (Sass→CSS) and `npm run lint`/
`schema:validate` scripts already in `package.json`

**Performance Goals**: No batch-specific target beyond the constitution's general baseline
(standard WordPress page-load expectations); not a performance-critical batch

**Constraints**: Theme-first JSON-over-CSS (Constitution Principle I); ls-theme/ls-plugin
ownership boundary — no plugin-owned logic introduced here (Principle II); every new colour/
spacing token must have real light and dark values, never identical (Principle III); WCAG 2.1
AA baseline (Principle IV); no `validate_blocks` tool use (Principle VII); reuse-before-create
for patterns (Principle VIII)

**Scale/Scope**: 21 pages, single site, single batch (Batch 1 of 7 in the release plan)

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

| Principle | Check | Status |
|---|---|---|
| I. Theme-First, JSON-Over-CSS | All 21 pages built as block patterns/templates using `theme.json`/`styles/**/*.json` tokens; no hand-authored CSS unless a documented JSON limitation applies | PASS (gate re-checked per page at implementation) |
| II. Theme/Plugin Ownership Boundary | No CPTs, taxonomies, or business logic introduced; this batch is presentation-only content in `ls-theme` | PASS |
| III. Design Token Discipline & Light/Dark Parity | The 6 phase pages introduce a new visual element (numbered phase badges, colour-coded per phase per the confirmed design) — each phase's badge colour MUST be added to both `theme.json` and `styles/dark.json` with genuinely distinct values, never identical | PASS, with an explicit new-token checklist item at implementation time |
| IV. Accessibility Baseline (WCAG 2.1 AA) | Applies to all 21 pages | PASS (gate per page) |
| V. Security & Escaping Discipline | No new PHP introduced; if any pattern PHP is touched (e.g. dynamic related-service lists), standard escaping applies | PASS |
| VI. PHP Minimalism | No PHP architecture needed for static content pages | PASS |
| VII. QA & Verification Integrity | Manual verification required per page; no `validate_blocks` | PASS (gate per page) |
| VIII. Pattern & Style Reuse Discipline | Two shared patterns proposed (Phase Hero/Badge; Service Card) instead of 21 bespoke ones — reuse-before-create explicitly satisfied by this plan's Structure Decision below | PASS |
| IX. Branch, PR & Changelog Discipline | Standard branch/PR/changelog process applies per page or per logical group of pages | PASS |

No violations requiring justification — Complexity Tracking section below is empty.

## Project Structure

### Documentation (this feature)

```text
specs/001-services-family/
├── plan.md              # This file
├── research.md          # Phase 0 output
├── data-model.md        # Phase 1 output
├── quickstart.md        # Phase 1 output
└── tasks.md             # Phase 2 output (/speckit-tasks — not created here)
```

### Source Code (repository root)

No `contracts/` directory — this batch has no external interface (API, CLI, etc.) to
document; it is entirely page/pattern content within the existing block theme.

```text
patterns/
├── services-hub.php                    # Hub page pattern (retro-fit existing LS-1598 work)
├── service-phase-hero.php              # NEW shared pattern — reused by all 6 phase pages
├── service-card.php                    # NEW shared pattern — reused across all 14 service pages
├── phase-discover.php                  # Discover phase page (uses service-phase-hero)
├── phase-create.php                    # Create phase page
├── phase-build.php                     # Build phase page
├── phase-launch.php                    # Launch phase page
├── phase-grow.php                      # Grow phase page
├── phase-evolve.php                    # Evolve phase page
├── service-discovery.php               # Existing content — verify/reconcile against pattern
├── service-design.php
├── service-development.php
├── service-hosting.php
├── service-support.php
├── service-ai.php
├── service-content.php                 # NEW — no existing content
├── service-migrations.php              # NEW — no existing content
├── service-performance.php             # NEW — no existing content
├── service-security.php                # NEW — no existing content
├── service-training.php                # NEW — no existing content
├── service-seo.php                     # NEW — no existing content
├── service-accessibility.php           # NEW — no existing content
└── service-email-marketing.php         # NEW — no existing content

styles/
├── blocks/
│   └── phase-badge.json                # NEW — per-phase colour token, light + dark pair required
└── sections/
    └── service-card-grid.json          # NEW, if a section-level layout token is needed

theme.json                              # New phase-badge colour tokens added here
styles/dark.json                        # Matching dark-mode values — MUST NOT equal light values
```

Actual pattern filenames are illustrative — final names are decided at implementation time
following the existing `patterns/` naming convention in this repo, not invented fresh here.

**Structure Decision**: Two new shared patterns (Phase Hero/Badge, Service Card) are built
once and reused across the 6 phase pages and 14 service pages respectively, rather than 20
one-off patterns. This directly satisfies constitution Principle VIII (reuse-before-create)
and matches this repo's existing convention of shared card/hero patterns (e.g.
`work-project-card`, `homepage-card-rows` already in `src/scss/structural/`). Whether service
pages are URL-reparented under their phase (e.g. `/services/launch/hosting/`) or remain flat
with phase pages linking to them (e.g. `/services/hosting/` linked from `/services/launch/`)
is left as an open implementation decision — both are compatible with this structure; flagged
in `spec.md` Assumptions as not yet resolved and not blocking this plan.

## Complexity Tracking

*No Constitution Check violations — this section is intentionally empty.*

## Constitution Check — Post-Design Re-evaluation

Re-checked after Phase 1 design (`data-model.md`, `quickstart.md`): the two-shared-pattern
structure (Phase Hero/Badge, Service Card) and the explicit new-token light/dark checklist in
`quickstart.md` and `research.md` do not introduce any new principle conflicts. All 9
principles remain PASS. No design decision here requires a Complexity Tracking justification.
