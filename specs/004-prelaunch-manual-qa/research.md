# Phase 0 Research: Pre-Launch Manual QA

No unresolved `NEEDS CLARIFICATION` markers — `/speckit-clarify` found no critical
ambiguities for this batch.

## Decision: This batch does not author test cases — that's the site owner's dedicated tooling

**Decision**: This spec and its downstream plan/tasks define coverage and the acceptance
bar only. Detailed test-case authoring is explicitly out of this batch's scope.

**Rationale**: The site owner has said directly that granular test-case generation and any
needed sub-issue creation will be handled with dedicated GPT agents/Claude skills built for
that purpose. Attempting to duplicate that here would create two competing sources of truth
for test-case content and waste the specialised tooling already planned for it.

**Alternatives considered**: Enumerating a full test-case matrix in this spec's own
Assumptions or a separate document — rejected per explicit instruction; would also
contradict LS-3716's existing role as the authoritative source for that content.

## Decision: Sequencing gate mirrors the AI Mega Page batch's cross-batch dependency pattern

**Decision**: This batch cannot start meaningfully until batches 1–3 have working drafts.
This is recorded as a structural blocking task in `tasks.md`, the same pattern used for the
AI Mega Page batch's dependency on AI Services/AI Solutions.

**Rationale**: Running a "full-circle" staging test plan against pages that don't exist yet
produces no real findings — the batch's own name ("full-circle") implies a completed loop to
test, which doesn't exist before batches 1–3 are built.

**Alternatives considered**: Running partial QA incrementally as each batch completes —
plausible in principle, but LS-3716's own scope explicitly frames this as a full-circle,
whole-site pass, not a per-batch one; batches 1–3 already have their own `quickstart.md`
per-batch validation for incremental checks. This batch is specifically the cross-batch,
whole-site pass that those can't cover alone.

## Decision: Defects are routed back to their originating batch, not fixed inline

**Decision**: Any defect found during this batch becomes a task in whichever batch (1, 2, or
3) actually owns the affected page, not a fix applied as part of this QA batch's own work.

**Rationale**: Keeps this batch's scope honest — it's a verification gate, not an
implementation batch. Mixing the two would blur accountability for what "batch 1 complete"
actually means if batch 4 quietly patches batch 1's pages.

**Alternatives considered**: Fixing trivial defects inline during QA to save a round-trip —
rejected; even a "trivial" fix should go through its originating batch's own PR/changelog
process (constitution Principle IX), not bypass it because it was caught during QA.
