---

description: "Task list for Pre-Launch Manual QA (Batch 4: whole-site staging validation + legacy-page audit)"
---

# Tasks: Pre-Launch Manual QA

**Input**: Design documents from `/specs/004-prelaunch-manual-qa/`

**Prerequisites**: plan.md, spec.md, research.md, data-model.md, quickstart.md

**Tests**: This entire batch IS a testing activity — no separate test tasks are generated;
`quickstart.md` is itself the executable runbook.

**Organization**: Tasks are grouped by user story (P1: Full-Circle Staging Validation, P2:
Legacy Page Audit). No page-build tasks exist in this batch — no Figma-frame-request
pattern applies here. Instead, the Foundational phase carries the cross-batch readiness gate.

## Phase 1: Setup

**Purpose**: Confirm the LS-3716 test plan and BugHerd access are ready to use as-is.

- [ ] T001 Confirm LS-3716's existing test plan content (browser/device matrix, journey list, supplementary standards tools) is still current — do not re-author it, verify only
- [ ] T002 [P] Confirm BugHerd access and defect-logging workflow are in place

**Checkpoint**: Setup complete.

---

## Phase 2: Foundational (Blocking Prerequisites)

**Purpose**: The cross-batch readiness gate — this batch cannot produce real findings before
batches 1–3 have working drafts.

**⚠️ CRITICAL — DO NOT SKIP THIS CHECK**: Neither user story below may begin until:

- [ ] T003 Confirm the Services Family batch (001) has working drafts on staging, not merely a spec/plan/tasks — if not, STOP; this batch cannot run yet
- [ ] T004 Confirm the Core Site Pages batch (002) has working drafts on staging, not merely a spec/plan/tasks — if not, STOP; this batch cannot run yet
- [ ] T005 Confirm the AI Mega Page batch (003) has working drafts on staging, not merely a spec/plan/tasks — if not, STOP; this batch cannot run yet

**Checkpoint**: All three source batches confirmed to have working drafts — only then does
Phase 3 begin.

---

## Phase 3: User Story 1 - Full-Circle Staging Validation (Priority: P1) 🎯 MVP

**Goal**: Every conversion-core and secondary journey from LS-3716 passes across the
documented browser/device matrix, with all defects logged, fixed in their originating
batch, and re-tested.

**Independent Test**: Work through LS-3716's journeys across the matrix; confirm each
completes cleanly or has a logged, tracked defect record.

- [ ] T006 [US1] Run the conversion-core journeys (per LS-3716) across the full documented browser/device matrix (desktop Chrome/Firefox/Safari, Android, iOS)
- [ ] T007 [US1] Log every defect found in BugHerd with journey/step reference, expected vs. actual result, and evidence (spec FR-002)
- [ ] T008 [US1] Route each logged defect to a task in its originating batch (001, 002, or 003) — do not fix inline as part of this QA batch
- [ ] T009 [US1] Once a defect is fixed in its originating batch, re-run its FULL journey (not just the fixed step) before marking it resolved (spec FR-003)
- [ ] T010 [US1] Click-test site-wide navigation and the mega menu across all pages from batches 001–003 combined; confirm every link resolves correctly regardless of which batch built its source or target (spec FR-004)
- [ ] T011 [US1] Confirm the Free Consultation and Contact forms each route to their own correct, distinct thank-you pages at the whole-site level (spec FR-005)
- [ ] T012 [US1] Run LS-3716's secondary journeys (blog reading, search/404/footer, SEO/social checks) and its supplementary standards checks (Web Platform Tests, CSS Validator, W3C tools, Link Checker, Markup Validator)
- [ ] T013 [US1] Run a whole-site accessibility spot-check (WCAG 2.1 AA) across the combined page set from batches 001–003 (spec FR-006)

**Checkpoint**: All conversion-core and secondary journeys pass or have tracked, re-tested
defect resolutions.

---

## Phase 4: User Story 2 - Legacy Page Redirect/Retire Audit (Priority: P2)

**Goal**: Every legacy/overlapping page has an explicit, recorded redirect-or-retire
decision.

**Independent Test**: Produce a list of every legacy page compared against the new
inventory, with a decision recorded for each overlapping one.

- [ ] T014 [US2] List every page currently live on the production site
- [ ] T015 [US2] Compare the live-site list against the combined new page inventory from batches 001, 002, and 003
- [ ] T016 [US2] Record an explicit Redirect or Retire decision for every legacy page identified as overlapping (spec FR-007) — no page left ambiguous (spec SC-004)
- [ ] T017 [US2] For any legacy page already redirected, verify the redirect actually resolves to the intended new page (spec Acceptance Scenario 2)

**Checkpoint**: 100% of overlapping legacy pages have a recorded decision.

---

## Phase 5: Polish & Cross-Cutting Concerns

- [ ] T018 Confirm no PR test-plan item related to this batch was checked without having been actually verified in-session (spec SC-005, constitution Principle VII) — audit this explicitly, don't just assume it
- [ ] T019 [P] Add a CHANGELOG.md entry summarizing this QA pass's outcome, grouped under its own dated heading
- [ ] T020 Only after both user stories' checkpoints are met: mark the Pre-Launch Manual QA Complete milestone as ready

---

## Dependencies & Execution Order

### Phase Dependencies

- **Setup (Phase 1)**: No dependencies.
- **Foundational (Phase 2)**: The cross-batch readiness gate. BLOCKS both user stories.
- **User Story 1 (Phase 3)**: Depends on Foundational. Independent of User Story 2.
- **User Story 2 (Phase 4)**: Depends on Foundational. Independent of User Story 1 — the
  legacy-page audit doesn't need the staging journeys to be run first, only the new page
  inventory to exist.
- **Polish (Phase 5)**: Depends on both user stories' checkpoints.

### Parallel Opportunities

- T003, T004, T005 (Foundational) can be checked in parallel.
- User Story 1 and User Story 2 can run in parallel once Foundational passes — they use
  different source material (staging journeys vs. live-site page list) and don't block each
  other.
- T018 and T019 can run in parallel.

---

## Implementation Strategy

### MVP First

Phase 3 (Full-Circle Staging Validation) is the higher-priority, higher-signal half of this
batch — it's the direct test of "is the site actually launchable." Complete it first if
sequencing one at a time; Phase 4 (legacy audit) can trail without blocking a launch
decision as tightly.

### Solo Execution Note

Per `release-plan.md`, this work is done solo — but unlike batches 1–3, "solo" here means
you personally running the QA journeys and audit, not handing tasks to a coding agent. The
"agent" role in this batch is closer to test-case generation support (your own dedicated
tooling, per your note) than page implementation.
