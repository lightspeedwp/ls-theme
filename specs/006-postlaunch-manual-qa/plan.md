# Implementation Plan: Post-Launch Manual QA

**Branch**: `006-postlaunch-manual-qa` | **Date**: 2026-09-16 | **Spec**: [spec.md](./spec.md)

**Input**: Feature specification from `/specs/006-postlaunch-manual-qa/spec.md`

## Summary

The final batch in the release plan. Like batch 4, this is a QA-process gate with no code
changes — it re-runs the full LS-3716 journey set against the live domain (per
`/speckit-clarify`), checks external links and analytics on the live site, triages real-user
issues, and closes with a defined end-point that formally completes the entire 7-batch
release plan. Every check is human-executed observation of the live site; no agent edits it,
ever.

## Technical Context

**Language/Version**: N/A — no code changes to `ls-theme`/`ls-plugin` in this batch itself.

**Primary Dependencies**: The full LS-3716 journey set (re-run here, not a subset, per
Clarifications); Website Launch (batch 5) having actually happened; analytics/tracking
infrastructure already configured (not built here); external link-checking tooling (e.g. the
Link Checker already referenced in LS-3716).

**Storage**: N/A

**Testing**: This batch IS the testing activity — manual, human-executed, per constitution
Principle VII, same as batch 4.

**Target Platform**: The live production site (`https://lightspeedwp.agency/`) — read-only
observation only, never agent-edited.

**Project Type**: QA/process batch — final batch in the release plan.

**Performance Goals**: N/A

**Constraints**: Cannot start before Website Launch (batch 5) has actually happened
(structural blocking gate); must re-run the FULL LS-3716 journey set, not a sample (spec
Clarifications); no agent-executed action against the live site (spec FR-008); must reach a
defined close point rather than remaining open-ended (spec FR-006).

**Scale/Scope**: Whole live-site validation, one-time completion event that closes the
entire release plan.

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

| Principle | Check | Status |
|---|---|---|
| I–III, V, VI, VIII (code-related principles) | Not applicable — no code changes | N/A |
| IV. Accessibility Baseline | Inherited from batch 4's verification, not re-audited from scratch here unless the live re-test surfaces a new divergence | N/A (inherited) |
| VII. QA & Verification Integrity | This batch's entire purpose is enforcing this principle on the live site | PASS |
| IX. Branch, PR & Changelog Discipline | Applies to any defect-fix PRs this batch generates in their originating batch, and to this batch's own closing CHANGELOG entry | PASS |

No violations requiring justification.

## Project Structure

### Documentation (this feature)

```text
specs/006-postlaunch-manual-qa/
├── plan.md
├── research.md
├── data-model.md
├── quickstart.md
└── tasks.md             # /speckit-tasks — not created here
```

### Source Code (repository root)

No source code changes. Any defect requiring a fix is routed to its originating batch (1, 2,
or 3), same as batch 4's pattern.

**Structure Decision**: No new code structure. This batch's structure is procedural: full
journey re-verification → external link/analytics checks → real-user triage → formal
close-out of the release plan. No reuse-check applies since no patterns/styles are touched.

## Complexity Tracking

*No Constitution Check violations — this section is intentionally empty.*

## Constitution Check — Post-Design Re-evaluation

Re-checked after Phase 1 design: no new findings. This batch remains a pure QA-process gate,
consistent with batch 4's assessment.
