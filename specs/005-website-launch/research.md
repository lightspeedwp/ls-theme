# Phase 0 Research: Website Launch

No unresolved `NEEDS CLARIFICATION` markers — `/speckit-clarify` found no critical
ambiguities for this batch.

## Decision: Rollback plan must exist before the decision, not be authored reactively

**Decision**: FR-005 requires the rollback plan to be documented before the go/no-go
decision is made, not written after a critical issue is already occurring.

**Rationale**: A rollback plan invented under the pressure of an active incident is far more
likely to be wrong or incomplete than one written calmly beforehand. This is a standard
incident-readiness practice, not specific to this project, but worth stating explicitly
since nothing else in this release plan has forced the team to think about failure modes
proactively until now.

**Alternatives considered**: Writing the rollback plan only if/when needed — rejected per
FR-005's own reasoning above.

## Decision: No agent-executed cutover action, ever

**Decision**: Every task in this batch's eventual `tasks.md` is a human-executed step with a
verification checkpoint, never an action performed directly against the live site by an
agent.

**Rationale**: This directly follows from the project's own standing rule (established
early in this planning effort, recorded in `release-plan.md`'s Reference Environments
section) that the live site is strictly read-only from any agent context, with no
exceptions. This batch is the one place in the entire release plan where that rule has the
most direct operational consequence — the actual go-live action itself.

**Alternatives considered**: None — this is a hard constraint from project governance, not a
design choice with alternatives to weigh.

## Decision: Rollback drill is not required, but the plan itself must be concrete

**Decision**: Per spec Assumptions, a full rehearsed rollback drill is disproportionate for
this launch's scale; a concretely documented (not necessarily rehearsed) plan satisfies
FR-005.

**Rationale**: Matches the release plan's own resourcing model (solo, dev-agency scale) —
demanding a full rehearsal would be a heavier process than this project's actual risk profile
warrants, while still requiring more than a vague intention.

**Alternatives considered**: Requiring a rehearsed drill — rejected as disproportionate given
project scale; requiring nothing beyond "we'll figure it out" — rejected, directly
contradicts FR-005.

## Decision: This batch's rollback window ends when Post-Launch QA (batch 6) begins

**Decision**: Per spec Edge Cases, this batch's rollback safety net covers the window
between cutover and the start of batch 6's own validation work. Once batch 6 begins, ongoing
issue management is that batch's concern.

**Rationale**: Prevents scope bleed between batch 5 and batch 6 — without this boundary,
"how long does rollback readiness last" would be an open-ended question with no natural end
point.

**Alternatives considered**: A fixed time window (e.g. 24 hours) instead of an event
boundary (batch 6 starting) — rejected as arbitrary; tying it to batch 6's actual start is
more meaningful than a fixed clock.
