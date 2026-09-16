# Implementation Plan: Website Launch

**Branch**: `005-website-launch` | **Date**: 2026-09-16 | **Spec**: [spec.md](./spec.md)

**Input**: Feature specification from `/specs/005-website-launch/spec.md`

## Summary

This batch is a governance/process gate, not a code or content build — like batch 4, there
is no pattern, template, or token work here. Its deliverable is a documented go/no-go
decision framework, a cutover checklist (folding in LS-3716's existing launch reminders),
and a pre-defined rollback plan. The one hard constraint shaping this plan is that no part
of the actual cutover can be executed by an agent — the live site is strictly read-only from
any agent context, so this batch's task list is entirely human-executed steps with
verification checkpoints, not automatable work.

## Technical Context

**Language/Version**: N/A — no code changes.

**Primary Dependencies**: Pre-Launch Manual QA's completion status (batch 4,
`specs/004-prelaunch-manual-qa`) as the hard gate input; LS-3716's existing launch reminders
(noindex removal, production form destinations) as the cutover checklist's content source;
the site owner's own hosting/DNS promotion process (unspecified here, per spec Assumptions).

**Storage**: N/A

**Testing**: N/A in the code sense — the "testing" here is the go/no-go decision itself and
the post-cutover verification that the live domain resolves to the new site correctly.

**Target Platform**: The live production site (`https://lightspeedwp.agency/`) as the
cutover target — strictly read-only from any agent context, human-executed only.

**Project Type**: Governance/process batch — not a code project structure.

**Performance Goals**: N/A

**Constraints**: Cannot start until Pre-Launch Manual QA (batch 4) is fully complete
(structural blocking gate, spec FR-002); no agent-executed action against the live site,
ever (spec FR-006); rollback plan must exist before the go/no-go decision, not authored
reactively (spec FR-005).

**Scale/Scope**: One go-live event, one site.

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

| Principle | Check | Status |
|---|---|---|
| I–III, V, VI, VIII (theme/plugin/token/security/PHP/reuse principles) | Not applicable — no code changes in this batch | N/A |
| IV. Accessibility Baseline | Not re-verified here — already the gate's own input from batch 4 | N/A (inherited, not re-checked) |
| VII. QA & Verification Integrity | This batch's go/no-go decision and cutover checklist are themselves a human-verification gate, consistent with this principle | PASS |
| IX. Branch, PR & Changelog Discipline | Applies to whatever documentation this batch produces (e.g. a launch-checklist doc/issue), not to the live-site cutover action itself | PASS |

No violations requiring justification.

## Project Structure

### Documentation (this feature)

```text
specs/005-website-launch/
├── plan.md
├── research.md
├── data-model.md
├── quickstart.md
└── tasks.md             # /speckit-tasks — not created here
```

### Source Code (repository root)

No source code changes. This batch's only durable artifact beyond its own spec/plan/tasks is
whatever launch-checklist record the site owner chooses to keep (e.g. a Linear issue, per
spec FR-007 — not created by this plan).

**Structure Decision**: No code structure. This batch's structure is the three-user-story
sequence already in `spec.md`: decide → cut over → have a rollback ready. Nothing here is
theme/plugin code, so there is nothing to reuse-check against Principle VIII.

## Complexity Tracking

*No Constitution Check violations — this section is intentionally empty.*

## Constitution Check — Post-Design Re-evaluation

Re-checked after Phase 1 design: no new findings. This batch remains a pure governance gate
with no code-level principle exposure.
