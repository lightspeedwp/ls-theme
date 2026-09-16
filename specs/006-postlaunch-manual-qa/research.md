# Phase 0 Research: Post-Launch Manual QA

## Decision: Full LS-3716 journey set is re-run live, not a sample

**Decision**: Per `/speckit-clarify`, User Story 1 re-runs every journey documented in
LS-3716 against the live domain, not a representative subset.

**Rationale**: Explicit user decision, overriding the initially-recommended sampling
approach — prioritizes completeness over efficiency for this final release gate.

**Alternatives considered**: A representative sample targeting live-environment-specific
risk (DNS/caching/config) — this was the original recommendation, rejected by explicit user
instruction in favor of full coverage.

## Decision: Defects found here route back to their originating batch, same as batch 4

**Decision**: Any defect requiring a code fix becomes a task in batch 1, 2, or 3 — whichever
owns the affected page — not fixed as part of this batch's own work.

**Rationale**: Consistent with the pattern already established in batch 4's `research.md` —
keeps this batch's scope honest as a verification gate, not an implementation batch.

**Alternatives considered**: None — this is a direct continuation of an already-decided
pattern, not a new decision point.

## Decision: This batch's close-out formally completes the entire release plan

**Decision**: Once User Stories 1 and 2's coverage is complete (spec FR-006, SC-005), this
batch closes, and with it, the entire 7-batch release plan defined in `release-plan.md` is
complete.

**Rationale**: The release plan explicitly sequences this as its final batch — there is no
batch 7. Without an explicit close-out decision here, there would be no defined moment where
"the release plan is done" is ever true.

**Alternatives considered**: Leaving the release plan open-ended, folding future work
(Phase 3/4) into it — rejected; the constitution's Delivery Phase Scope Boundary already
treats Phase 3/4 as separate, later-sequenced scope, not a continuation of this same release
plan.
