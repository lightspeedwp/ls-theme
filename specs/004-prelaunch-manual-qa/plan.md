# Implementation Plan: Pre-Launch Manual QA

**Branch**: `004-prelaunch-manual-qa` | **Date**: 2026-09-16 | **Spec**: [spec.md](./spec.md)

**Input**: Feature specification from `/specs/004-prelaunch-manual-qa/spec.md`

## Summary

This batch is a QA process, not a page-build — there is no new pattern, template, or token
work. The "implementation" is executing the already-documented LS-3716 staging test plan
across its browser/device matrix, logging defects in BugHerd, re-testing fixes, and
separately auditing legacy pages against the new inventory from batches 1–3 for redirect/
retire decisions. This plan's job is to sequence that work correctly (it cannot start
meaningfully before batches 1–3 have working drafts) and to keep it from silently expanding
into the granular test-case authoring that's explicitly out of scope (per spec FR-009).

## Technical Context

**Language/Version**: N/A — this batch involves no code changes to `ls-theme`/`ls-plugin`
itself; defects found are routed back to the relevant batch as tasks there, not fixed here.

**Primary Dependencies**: The existing LS-3716 test plan content (browser/device matrix,
human user-journey test cases, supplementary standards tools — Web Platform Tests, CSS
Validator, W3C tools, Link Checker, Markup Validator, all already listed on that issue);
BugHerd for defect logging; the completed (not just spec'd) page inventories from batches 1–3.

**Storage**: N/A

**Testing**: This entire batch IS the testing activity — manual, human-executed, per
constitution Principle VII. No automated substitute.

**Target Platform**: The dev/staging site (`ls-agency.lightspeedwp.dev`), across the
documented browser/device matrix (desktop Chrome/Firefox/Safari, Android, iOS)

**Project Type**: QA/process batch — not a code project structure

**Performance Goals**: N/A

**Constraints**: Cannot start meaningfully before batches 1–3 have working drafts
(structural blocking prerequisite, same pattern as the AI Mega Page batch's cross-batch
gate); must not be marked complete via automated checks alone (Principle VII); must not
attempt to enumerate granular test cases (spec FR-009, explicitly out of scope)

**Scale/Scope**: Whole-site validation across all pages built in batches 1–3, plus a
site-wide legacy-page audit — scope is "everything built so far," not a fixed page count

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

| Principle | Check | Status |
|---|---|---|
| I–III, V, VI (theme/plugin/token/security/PHP principles) | Not applicable — this batch makes no code changes | N/A, not violated |
| IV. Accessibility Baseline (WCAG 2.1 AA) | This batch is exactly where whole-site accessibility is verified (spec FR-006, SC-003) | PASS |
| VII. QA & Verification Integrity | This batch's entire purpose is enforcing this principle at the whole-site level | PASS — this is the principle's own enforcement mechanism |
| VIII. Pattern & Style Reuse Discipline | Not applicable — no new patterns/styles in this batch | N/A |
| IX. Branch, PR & Changelog Discipline | Standard, applies to any defect-fix PRs this batch generates (in their originating batch, not here) | PASS |

No violations requiring justification.

## Project Structure

### Documentation (this feature)

```text
specs/004-prelaunch-manual-qa/
├── plan.md
├── research.md
├── data-model.md
├── quickstart.md
└── tasks.md             # /speckit-tasks — not created here
```

### Source Code (repository root)

No source code changes in this batch — no `patterns/`, `theme.json`, or `styles/` files are
touched here. Any defect fix happens as a task in the relevant originating batch (1, 2, or
3), tracked there, not as part of this spec's own deliverable.

**Structure Decision**: No new code structure. This batch's "structure" is procedural:
(1) run the LS-3716 plan, (2) log and re-test defects, (3) run the legacy-page audit,
(4) route findings back to their originating batch. Detailed test-case content is
explicitly deferred to the site owner's own tooling (spec Assumptions), not authored here.

## Complexity Tracking

*No Constitution Check violations — this section is intentionally empty.*

## Constitution Check — Post-Design Re-evaluation

Re-checked after Phase 1 design: no new findings change the assessment above. This batch
remains a pure QA-process gate with no code-level principle exposure of its own.
