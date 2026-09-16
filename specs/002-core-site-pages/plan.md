# Implementation Plan: Core Site Pages (Shared Foundations, About, Solutions)

**Branch**: `002-core-site-pages` | **Date**: 2026-09-16 | **Spec**: [spec.md](./spec.md)

**Input**: Feature specification from `/specs/002-core-site-pages/spec.md`

## Summary

Build 25 pages across three families: Shared Foundations (Work archive, Insights archive,
Free Consultation, Contact + 3 legal pages + 7 policy sub-pages, Contact thank-you — 13
pages), About Family (hub + Process, Team, Culture, History, Accessibility Commitment — 6
pages), and Solutions Family (hub + Tour Operator, WordPress, WooCommerce, AI Solutions,
Publishing, Design Systems, LSX — 8 pages). Unlike the Services Family batch, this batch has
no phase-page hierarchy — About and Solutions are flat hub+subpages, confirmed against dev.
Three reusable patterns cover most of the batch: a **Family/Policies Hub** pattern (About
hub, Solutions hub, Policies hub — same "intro + grouped links" shape), a **Legal/Policy
Content** pattern (Privacy Policy, Terms & Conditions, and the 7 policy sub-pages — plain
long-form static content), and reuse of the **existing** Portfolio Index / Blog Index
archive templates (already defined per LS-1206) for Work archive / Insights archive. Free
Consultation and Contact reuse already-built Gravity Forms (LS-1207/LS-1214/LS-2610) — this
batch wires them into pages, it does not build new form logic.

## Technical Context

**Language/Version**: PHP 8.1+ (theme baseline), block markup, JSON (`theme.json`,
`styles/**/*.json`)

**Primary Dependencies**: WordPress 6.9+ core block editor; existing Gravity Forms
integration (already built, this batch does not touch form logic); existing Portfolio Index
/ Blog Index archive templates (LS-1206, reuse not rebuild)

**Storage**: N/A — every page is a standard WordPress `page` post; Work archive/Insights
archive use existing Portfolio CPT and Post/Blog data respectively (no new data model)

**Testing**: Manual QA per constitution Principle VII is the completion gate for every page,
same as the Services Family batch. Existing Playwright suite is supplementary, not a
substitute.

**Target Platform**: WordPress 6.9+ site (`ls-agency.lightspeedwp.dev`), block theme
(`ls-theme`)

**Project Type**: WordPress block theme — single project, no build pipeline beyond existing
`npm run build:css`/`lint`/`schema:validate` scripts

**Performance Goals**: No batch-specific target beyond the constitution's general baseline

**Constraints**: Theme-first JSON-over-CSS (Principle I); ls-theme/ls-plugin ownership
boundary — no plugin-owned logic introduced (Principle II); light/dark token parity for any
new tokens (Principle III); WCAG 2.1 AA (Principle IV); no `validate_blocks` (Principle VII);
reuse-before-create for patterns and templates (Principle VIII) — explicitly including reuse
of the existing archive templates and Gravity Forms, not just new patterns

**Scale/Scope**: 25 pages, single site, single batch (Batch 2 of 7)

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

| Principle | Check | Status |
|---|---|---|
| I. Theme-First, JSON-Over-CSS | All 25 pages built as block patterns/templates using theme tokens; no hand-authored CSS unless documented | PASS |
| II. Theme/Plugin Ownership Boundary | No CPTs/taxonomies/business logic introduced; Work archive reuses the existing Portfolio CPT (already ls-plugin-owned, not created here) | PASS |
| III. Design Token Discipline & Light/Dark Parity | No new colour tokens anticipated for this batch (unlike Services' phase badges) — if any surface during implementation, same light/dark-pair rule applies | PASS |
| IV. Accessibility Baseline (WCAG 2.1 AA) | Applies to all 25 pages | PASS |
| V. Security & Escaping Discipline | No new PHP; Contact/Free Consultation forms already built and presumably already compliant — not re-audited here unless a defect surfaces | PASS |
| VI. PHP Minimalism | No new PHP architecture | PASS |
| VII. QA & Verification Integrity | Manual verification required per page | PASS |
| VIII. Pattern & Style Reuse Discipline | Family/Policies Hub pattern (3 uses) and Legal/Policy Content pattern (9 uses) proposed instead of 12 bespoke patterns; existing archive templates and Gravity Forms reused, not rebuilt | PASS |
| IX. Branch, PR & Changelog Discipline | Standard | PASS |

No violations requiring justification.

## Project Structure

### Documentation (this feature)

```text
specs/002-core-site-pages/
├── plan.md
├── research.md
├── data-model.md
├── quickstart.md
└── tasks.md             # /speckit-tasks — not created here
```

### Source Code (repository root)

No `contracts/` directory — no external interface for this batch.

```text
patterns/
├── family-hub.php                      # NEW shared pattern — About hub, Solutions hub, Policies hub (3 uses)
├── legal-content.php                   # NEW shared pattern — Privacy Policy, Terms, 7 policy sub-pages (9 uses)
├── work-archive.php                    # Reuse/verify existing Portfolio Index template (LS-1206) — do not rebuild
├── insights-archive.php                # Reuse/verify existing Blog Index template (LS-1206) — do not rebuild
├── free-consultation.php               # Wire existing Gravity Form into Default/No-Title template
├── contact.php                         # Wire existing Gravity Form into Default/No-Title template
├── contact-thank-you.php               # New content, mirrors existing free-consultation/thank-you pattern
├── about.php                           # About hub, uses family-hub.php
├── about-process.php                   # Bespoke — mirrors Services' content-page shape, not a hub or legal page
├── team.php                            # Bespoke — stays at top-level /team/, not reparented under /about/
├── culture.php                         # Bespoke
├── history.php                         # Bespoke
├── accessibility-commitment.php        # Bespoke — new content (LS-4196)
├── solutions.php                       # Solutions hub, uses family-hub.php
├── tour-operator.php                   # Bespoke — existing content on dev
├── solutions-wordpress.php             # Bespoke — existing content on dev
├── solutions-woocommerce.php           # Bespoke — existing content on dev
├── solutions-ai.php                    # Bespoke — existing content on dev
├── publishing.php                      # New — no existing content (LS-4195)
├── design-systems.php                  # New — no existing content (LS-4193)
├── lsx.php                             # New — no existing content (LS-4194)
├── policies.php                        # Policies hub, uses family-hub.php
├── policy-publishing-principles.php    # Uses legal-content.php (LS-4197)
├── policy-ownership-funding.php        # Uses legal-content.php (LS-4198)
├── policy-feedback.php                 # Uses legal-content.php (LS-4199)
├── policy-ethics.php                   # Uses legal-content.php (LS-4200)
├── policy-diversity-staffing.php       # Uses legal-content.php (LS-4201)
├── policy-corrections.php              # Uses legal-content.php (LS-4202)
└── policy-diversity-content.php        # Uses legal-content.php (LS-4203)
```

Actual pattern filenames are illustrative — final names follow this repo's existing
`patterns/` naming convention at implementation time, not invented fresh here.

**Structure Decision**: Two new shared patterns (Family/Policies Hub, Legal/Policy Content)
cover 12 of the 25 pages (About hub, Solutions hub, Policies hub, Privacy Policy, Terms, and
7 policy sub-pages) — satisfying constitution Principle VIII. The remaining 13 pages are
either genuinely bespoke content (About/Process, Team, Culture, History, Accessibility
Commitment, and the 7 Solutions subpages) or reuse of pre-existing infrastructure (Work
archive/Insights archive templates, Free Consultation/Contact forms) rather than new
patterns — reuse-checked before any new pattern work per Principle VIII.

## Complexity Tracking

*No Constitution Check violations — this section is intentionally empty.*

## Constitution Check — Post-Design Re-evaluation

Re-checked after Phase 1 design (`data-model.md`, `quickstart.md`): the Family/Policies Hub
and Legal/Policy Content shared patterns, plus explicit reuse of existing archive templates
and Gravity Forms, introduce no new principle conflicts. All 9 principles remain PASS.
