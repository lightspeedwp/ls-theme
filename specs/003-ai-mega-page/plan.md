# Implementation Plan: AI Mega Page

**Branch**: `003-ai-mega-page` | **Date**: 2026-09-16 | **Spec**: [spec.md](./spec.md)

**Input**: Feature specification from `/specs/003-ai-mega-page/spec.md`

## Summary

Build a single, purpose-built landing page (LS-2605) that consolidates AI Services and AI
Solutions content into one coherent narrative, with clear paths back to both source pages
and to conversion. This is the smallest batch by page count (1) but the heaviest single
visual build in the release plan. Its defining constraint is not technical complexity but
sequencing: implementation cannot start until AI Services (batch 1) and AI Solutions (batch
2) are both actually built and stable — this plan treats that as a hard gate, not a note.

## Technical Context

**Language/Version**: PHP 8.1+ (theme baseline), block markup, JSON (`theme.json`,
`styles/**/*.json`)

**Primary Dependencies**: WordPress 6.9+ core block editor. Content-wise (not
technically-wise): the AI Services page (`/services/ai/`, batch 1) and AI Solutions page
(`/solutions/ai/`, batch 2) as source material — this page does not import or transclude
them programmatically, it is independently authored content that references and links to
them.

**Storage**: N/A — standard WordPress `page` post, no custom fields or CPTs

**Testing**: Manual QA per constitution Principle VII, same as batches 1 and 2

**Target Platform**: WordPress 6.9+ site (`ls-agency.lightspeedwp.dev`), block theme
(`ls-theme`)

**Project Type**: WordPress block theme — single project, no build pipeline changes

**Performance Goals**: No batch-specific target beyond the constitution's general baseline

**Constraints**: Theme-first JSON-over-CSS (Principle I); ls-theme/ls-plugin ownership
boundary — no plugin-owned logic (Principle II); light/dark token parity for any new tokens
(Principle III); WCAG 2.1 AA (Principle IV); no `validate_blocks` (Principle VII);
reuse-before-create for patterns (Principle VIII) — checked against `service-phase-hero`/
`service-card` (batch 1) and `family-hub`/`legal-content` (batch 2) before building anything
new; **hard sequencing constraint**: implementation MUST NOT start before AI Services and AI
Solutions are both built and stable (spec FR-006)

**Scale/Scope**: 1 page, single site, single batch (Batch 3 of 7) — smallest batch by page
count, largest by design complexity per the release plan's own characterization

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

| Principle | Check | Status |
|---|---|---|
| I. Theme-First, JSON-Over-CSS | Page built as block pattern(s) using theme tokens; no hand-authored CSS unless documented | PASS |
| II. Theme/Plugin Ownership Boundary | No CPTs/taxonomies/business logic; pure presentation content | PASS |
| III. Design Token Discipline & Light/Dark Parity | If this heaviest-visual-build page introduces new tokens (likely, given its described complexity), each MUST have genuine, distinct light/dark values | PASS, flagged as a likely token-audit point at implementation |
| IV. Accessibility Baseline (WCAG 2.1 AA) | Applies | PASS |
| V. Security & Escaping Discipline | No new PHP beyond pattern markup | PASS |
| VI. PHP Minimalism | No PHP architecture needed | PASS |
| VII. QA & Verification Integrity | Manual verification required | PASS |
| VIII. Pattern & Style Reuse Discipline | Reuse checked against batch 1 (`service-phase-hero`, `service-card`) and batch 2 (`family-hub`, `legal-content`) patterns first — none match this page's "single heavy narrative landing page" shape, so a new bespoke pattern is justified, not a shortcut | PASS |
| IX. Branch, PR & Changelog Discipline | Standard | PASS |

No violations requiring justification.

## Project Structure

### Documentation (this feature)

```text
specs/003-ai-mega-page/
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
└── ai-mega-page.php     # NEW bespoke pattern — reuse-checked against existing patterns first, none fit
```

**Structure Decision**: One new bespoke pattern, justified by an explicit reuse-check against
every existing shared pattern from batches 1 and 2 (recorded in `research.md`) rather than
skipped. URL/slug: this page is recommended to live at a new top-level path (e.g. `/ai/`)
rather than nested under either `/services/` or `/solutions/`, since its content
deliberately spans both and nesting under either would misrepresent it as belonging to one
family over the other — this is a plan-level decision per spec Assumptions, not a spec-level
requirement, and can be revisited if the actual Figma frame implies otherwise.

## Complexity Tracking

*No Constitution Check violations — this section is intentionally empty.*

## Constitution Check — Post-Design Re-evaluation

Re-checked after Phase 1 design: the single bespoke pattern and the explicit blocking
sequencing gate do not introduce any new principle conflicts. All 9 principles remain PASS.
