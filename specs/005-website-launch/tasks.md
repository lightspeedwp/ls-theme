---

description: "Task list for Website Launch (Batch 5: go/no-go decision, cutover, rollback readiness)"
---

# Tasks: Website Launch

**Input**: Design documents from `/specs/005-website-launch/`

**Prerequisites**: plan.md, spec.md, research.md, data-model.md, quickstart.md

**Tests**: N/A — no code in this batch. `quickstart.md` is the executable runbook.

**Organization**: Tasks are grouped by user story (P1: Go/No-Go, P2: Cutover, P3: Rollback
Readiness). The Foundational phase carries the cross-batch readiness gate (batch 4 must be
complete) and requires the rollback plan to exist before the decision, per FR-005.

## Phase 1: Setup

**Purpose**: Confirm launch tracking is in place.

- [ ] T001 Confirm whether/how to create a Linear issue for this batch's launch-checklist work (spec FR-007) — this is a decision for the site owner, do not create one unprompted

**Checkpoint**: Setup complete.

---

## Phase 2: Foundational (Blocking Prerequisites)

**Purpose**: The cross-batch readiness gate, plus the rollback-plan-before-decision
requirement.

**⚠️ CRITICAL — DO NOT SKIP THIS CHECK**: User Story 1 (the decision itself) MUST NOT
proceed until:

- [ ] T002 Confirm Pre-Launch Manual QA (batch 4, `specs/004-prelaunch-manual-qa`) is fully complete — checked fresh, not assumed from an earlier point (spec Edge Cases). If not complete, STOP; this batch cannot proceed to a "Go" decision
- [ ] T003 Document the rollback plan (concrete steps + completion signal) BEFORE proceeding to the go/no-go decision — per spec FR-005, this cannot be authored reactively after the decision or after a critical issue occurs

**Checkpoint**: Batch 4 confirmed complete AND rollback plan documented — only then does
Phase 3 begin.

---

## Phase 3: User Story 1 - Go/No-Go Decision (Priority: P1) 🎯 MVP

**Goal**: An explicit, recorded go/no-go decision based on batch 4's actual completion
status.

**Independent Test**: Confirm a decision is recorded with its basis, timestamp, and
decision-maker, before any cutover step begins.

- [ ] T004 [US1] Record the go/no-go decision (Go or No-Go), its basis (batch 4's actual completion status per T002), timestamp, and decision-maker (spec FR-001)
- [ ] T005 [US1] If the decision is No-Go: stop here. Do not proceed to Phase 4. Re-enter this phase once batch 4's outstanding items are resolved

**Checkpoint**: A recorded Go decision — only then does Phase 4 begin.

---

## Phase 4: User Story 2 - Cutover Sequencing (Priority: P2)

**Goal**: The site is promoted from staging to production in a defined, verified sequence.

**Independent Test**: Confirm each cutover step is completed in order, with LS-3716's launch
reminders explicitly checked off, not assumed.

- [ ] T006 [US2] Remove the staging site's `noindex` directive (LS-3716 launch reminder; spec FR-003) — mark this step Complete, verified individually
- [ ] T007 [US2] Confirm production form destinations (Free Consultation, Contact) point at production endpoints, not staging (LS-3716 launch reminder; spec FR-004) — mark this step Complete, verified individually
- [ ] T008 [US2] Perform the site owner's own DNS/hosting promotion process (site-specific, not detailed in this spec) — human-executed only, never by an agent (spec FR-006)
- [ ] T009 [US2] Verify the live domain resolves to the newly-launched site, not the old site or a broken intermediate state (spec Acceptance Scenario 3)

**Checkpoint**: All cutover steps individually marked Complete, verified.

---

## Phase 5: User Story 3 - Rollback Safety Net (Priority: P3)

**Goal**: If a critical issue is found immediately after go-live, a pre-defined rollback
path is followed, not improvised.

**Independent Test**: Confirm the rollback plan (documented in T003) remains accessible and
is followed exactly if invoked, through the window up to Post-Launch QA (batch 6) starting.

- [ ] T010 [US3] Keep the rollback plan (from T003) accessible through the window between cutover and the start of Post-Launch Manual QA (batch 6) — this batch's rollback scope ends when batch 6 begins (spec Edge Cases)
- [ ] T011 [US3] If a critical issue is found in this window: execute the documented rollback plan from T003, not an improvised one
- [ ] T012 [US3] Confirm the rollback's own completion signal (from T003) before considering it resolved (spec SC-004)

**Checkpoint**: Either no rollback was needed, or a rollback was executed and confirmed
complete against its own pre-defined signal.

---

## Phase 6: Polish & Cross-Cutting Concerns

- [ ] T013 Add a CHANGELOG.md entry noting the launch, grouped under its own dated heading
- [ ] T014 Confirm every step in this batch was human-executed, with no agent-executed action taken against the live site at any point (spec FR-006) — audit this explicitly, don't assume it

---

## Dependencies & Execution Order

### Phase Dependencies

- **Setup (Phase 1)**: No dependencies.
- **Foundational (Phase 2)**: BLOCKS User Story 1 — both the batch-4 completion check and
  the rollback-plan-before-decision requirement must pass first.
- **User Story 1 (Phase 3)**: Depends on Foundational. Its outcome gates User Story 2 —
  a No-Go decision halts the batch until re-attempted.
- **User Story 2 (Phase 4)**: Depends on a recorded Go decision (Phase 3).
- **User Story 3 (Phase 5)**: Its rollback plan is prepared in Foundational (T003), but its
  readiness window formally spans the period after Phase 4's cutover completes.
- **Polish (Phase 6)**: Depends on Phase 4 (and Phase 5, if invoked) completing.

### Parallel Opportunities

- None of significance — this batch is inherently sequential (decision → cutover →
  post-cutover readiness), unlike the page-build batches where per-page tasks parallelize.

---

## Implementation Strategy

### MVP First

Phase 3 (the Go/No-Go Decision) is both the MVP and the actual critical control point of
this entire batch — everything before it is preparation, everything after it is execution
of a decision already made.

### Solo Execution Note

Unlike every other batch in this release plan, there is no "coding agent" role here at all —
every task is performed directly by the site owner. An agent's role in this batch, if any,
is limited to helping prepare documentation (e.g. drafting the rollback plan's wording) —
never executing any step against the live site.
