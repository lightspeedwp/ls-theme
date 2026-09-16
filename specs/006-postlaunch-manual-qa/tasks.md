---

description: "Task list for Post-Launch Manual QA (Batch 6, final: live-site validation and release-plan close-out)"
---

# Tasks: Post-Launch Manual QA

**Input**: Design documents from `/specs/006-postlaunch-manual-qa/`

**Prerequisites**: plan.md, spec.md, research.md, data-model.md, quickstart.md

**Tests**: This batch IS a testing activity — no separate test tasks; `quickstart.md` is the
executable runbook.

**Organization**: Tasks are grouped by user story (P1: Staging-to-Live Confirmation, P2:
External Link/Analytics Check, P3: Real-User Triage and Close-Out). The Foundational phase
carries the cross-batch readiness gate (batch 5 must have actually happened).

## Phase 1: Setup

**Purpose**: Confirm tooling access.

- [ ] T001 Confirm access to the full LS-3716 journey list, BugHerd, and the live analytics/tracking dashboard
- [ ] T002 [P] Confirm external link-checking tooling (e.g. the Link Checker referenced in LS-3716) is available

**Checkpoint**: Setup complete.

---

## Phase 2: Foundational (Blocking Prerequisites)

**Purpose**: The cross-batch readiness gate — this batch cannot run before Website Launch
(batch 5) has actually happened.

**⚠️ CRITICAL — DO NOT SKIP THIS CHECK**:

- [ ] T003 Confirm Website Launch (batch 5, `specs/005-website-launch`) has actually happened — a recorded "Go" decision and completed cutover, not merely planned. If not, STOP; this batch cannot run yet

**Checkpoint**: Batch 5 confirmed complete — only then does Phase 3 begin.

---

## Phase 3: User Story 1 - Staging-to-Live Confirmation (Priority: P1) 🎯 MVP

**Goal**: Every conversion-core journey verified on staging in batch 4 is re-confirmed on
the live domain — the FULL set, not a sample (per Clarifications).

**Independent Test**: Re-run every LS-3716 journey against the live domain; confirm each
still passes or has a logged, escalated defect.

- [ ] T004 [US1] Re-run the FULL set of LS-3716 journeys against the live domain (spec FR-001, Clarifications — not a subset)
- [ ] T005 [US1] For each journey, compare its live result against its batch-4 staging result; log any divergence as a new, live-environment-specific defect with priority (spec Acceptance Scenario 1)
- [ ] T006 [US1] Test the Free Consultation form live; confirm the submission is captured correctly in the production system (spec FR-002)
- [ ] T007 [US1] Test the Contact form live; confirm the submission is captured correctly in the production system (spec FR-002)
- [ ] T008 [US1] Route any defect found in T005-T007 to its originating batch (001, 002, or 003) as a task there — do not fix inline as part of this QA batch

**Checkpoint**: 100% of the full LS-3716 journey set passes live, or has a tracked defect
record.

---

## Phase 4: User Story 2 - External Link and Analytics Sanity Check (Priority: P2)

**Goal**: External links are checked for breakage and analytics/tracking is confirmed
firing correctly on the live domain.

**Independent Test**: Check a set of external links; confirm analytics fires on a real page
view and conversion event.

- [ ] T009 [US2] Check external links site-wide on the live domain for breakage (spec FR-003)
- [ ] T010 [US2] Log any broken links found and route them to their originating batch (001, 002, or 003)
- [ ] T011 [US2] Trigger a real page view on the live domain and confirm analytics/tracking records it correctly (spec FR-004)
- [ ] T012 [US2] Trigger a real conversion event (e.g. a test Free Consultation or Contact submission) and confirm analytics/tracking records it correctly (spec FR-004)

**Checkpoint**: External link status recorded site-wide; analytics confirmed firing for at
least one page view and one conversion event.

---

## Phase 5: User Story 3 - Real-User Issue Triage and Scope Hand-off (Priority: P3)

**Goal**: Real-user-reported issues are triaged, and this batch reaches a defined close
point.

**Independent Test**: Confirm each incoming real-user report is classified, and confirm the
batch formally closes once Phases 3 and 4's coverage is complete.

- [ ] T013 [US3] Triage each real-user-reported issue as it arrives: classify as release-related defect (route to its originating batch) or pre-existing/unrelated (out of scope) (spec FR-005)
- [ ] T014 [US3] Once Phase 3 (US1) and Phase 4 (US2) coverage is complete, formally record this batch's close-out (spec FR-006, SC-005) — do not leave it open-ended
- [ ] T015 [US3] Confirm explicitly that closing this batch also closes the entire 7-batch release plan (`release-plan.md`) — this is the final batch, there is no batch 7

**Checkpoint**: Batch formally closed; release plan complete.

---

## Phase 6: Polish & Cross-Cutting Concerns

- [ ] T016 Confirm no investigation performed during this batch involved an agent directly editing the live site (spec FR-008) — audit this explicitly
- [ ] T017 [P] Add a final CHANGELOG.md entry marking the release plan's completion, grouped under its own dated heading
- [ ] T018 Confirm no PR test-plan item related to this batch was checked without having been actually verified in-session (spec SC-006, constitution Principle VII)

---

## Dependencies & Execution Order

### Phase Dependencies

- **Setup (Phase 1)**: No dependencies.
- **Foundational (Phase 2)**: BLOCKS all three user stories — batch 5 must have actually
  happened.
- **User Story 1 (Phase 3)**: Depends on Foundational. Independent of User Story 2.
- **User Story 2 (Phase 4)**: Depends on Foundational. Independent of User Story 1.
- **User Story 3 (Phase 5)**: Its close-out step (T014) depends on Phases 3 and 4 both being
  complete — this is the one dependency between user stories in this batch.
- **Polish (Phase 6)**: Depends on Phase 5's close-out.

### Parallel Opportunities

- T001 and T002 (Setup) can run in parallel.
- User Story 1 (Phase 3) and User Story 2 (Phase 4) can run in parallel once Foundational
  passes — they check different things (journeys vs. links/analytics) and don't block each
  other.
- T016 and T017 can run in parallel.

---

## Implementation Strategy

### MVP First

Phase 3 (Staging-to-Live Confirmation, the full LS-3716 re-run) is both the MVP and the
highest-signal check in this batch — it's the direct test of whether the live site actually
works the way staging proved it should.

### Solo Execution Note

Same as batch 5: every task here is performed directly by the site owner, observing and
testing the live site. No coding-agent role applies to the QA execution itself; any
resulting code fix is a separate task in the relevant originating batch (001, 002, or 003).

### This Is the Last Batch

Once Phase 6 completes, the entire release plan defined in `.specify/memory/release-plan.md`
is done. Any further work (Phase 3 AI governance/chatbot, Phase 4 content finalisation, or
genuinely new scope) belongs to a new planning effort, not an extension of this one.
