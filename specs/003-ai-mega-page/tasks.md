---

description: "Task list for the AI Mega Page (Batch 3: single consolidated AI landing page)"
---

# Tasks: AI Mega Page

**Input**: Design documents from `/specs/003-ai-mega-page/`

**Prerequisites**: plan.md, spec.md, research.md, data-model.md, quickstart.md

**Tests**: Not requested in spec.md — no test tasks generated. Manual QA per
`quickstart.md` and constitution Principle VII is the completion gate.

**Organization**: This batch has one user story (single page), so the structural emphasis is
on the Foundational phase, which carries the cross-batch dependency gate — not on
user-story count.

## Phase 1: Setup

**Purpose**: Confirm reuse-before-create before any new file is written.

- [ ] T001 Check `patterns/` for any existing pattern (including `service-phase-hero`, `service-card` from batch 1, and `family-hub`, `legal-content` from batch 2) that could be reused for this page before creating `ai-mega-page.php` — per `research.md`, none are expected to fit, but the check must actually happen, not be assumed (constitution Principle VIII)
- [ ] T002 [P] Confirm the recommended URL/slug decision (new top-level path, e.g. `/ai/`, per `research.md`) against the actual Figma frame once supplied — do not finalize the page's permalink before this check

**Checkpoint**: Reuse check complete.

---

## Phase 2: Foundational (Blocking Prerequisites)

**Purpose**: The cross-batch content dependency gate. This is the most important phase in
this batch's task list.

**⚠️ CRITICAL — DO NOT SKIP THIS CHECK**: This batch's single user story (US1) MUST NOT
begin until BOTH of the following are independently confirmed:

- [ ] T003 Confirm the AI Services page (`/services/ai/`, Services Family batch 1, `specs/001-services-family`) is actually built and stable — not merely spec'd/planned. If not yet built, STOP here; do not proceed to Phase 3 (spec FR-006, SC-004)
- [ ] T004 Confirm the AI Solutions page (`/solutions/ai/`, Core Site Pages batch 2, `specs/002-core-site-pages`) is actually built and stable — not merely spec'd/planned. If not yet built, STOP here; do not proceed to Phase 3 (spec FR-006, SC-004)

**Checkpoint**: Both source pages confirmed built and stable — only then does Phase 3 begin.
Re-run T003/T004 if significant time has passed since they were last confirmed, since either
source page could have changed.

---

## Phase 3: User Story 1 - Consolidated AI Landing Page (Priority: P1) 🎯 MVP

**Goal**: A single page presenting AI Services and AI Solutions as one coherent narrative,
with paths to both source pages and to conversion.

**Independent Test**: Visit the AI Mega Page directly; confirm it presents a coherent,
consolidated view of both source pages' content, independent of whether the visitor has seen
either source page.

- [ ] T005 [US1] Request the Figma frame for the AI Mega Page from the user before starting any other task in this phase (blocking)
- [ ] T006 [US1] Read the finished AI Services and AI Solutions pages' actual content (not their specs) as the source material for this page's editorial synthesis (spec Assumptions — genuine consolidation, not a copy-paste merge)
- [ ] T007 [US1] Author the consolidated narrative content for `patterns/ai-mega-page.php`, synthesizing both sources into one coherent piece (spec FR-001)
- [ ] T008 [US1] Wire a link to the AI Services page and a link to the AI Solutions page into the page (spec FR-002)
- [ ] T009 [US1] Wire at least one conversion CTA (Free Consultation or Contact) into the page (spec FR-002)
- [ ] T010 [US1] Add/verify SEO metadata (title, description) for the page
- [ ] T011 [US1] Run `quickstart.md` → "Validate: Consolidated AI Landing Page" steps, including the "meaningfully exceeds simple concatenation" check (spec Acceptance Scenario 4)

**Checkpoint**: AI Mega Page fully functional and testable independently.

---

## Phase 4: Polish & Cross-Cutting Concerns

- [ ] T012 [P] Run the "Validate: Token Discipline" step from `quickstart.md` if any new tokens were introduced during T007 — confirm no light/dark value pair is identical
- [ ] T013 [P] Add a CHANGELOG.md entry for this batch, grouped under its own dated heading
- [ ] T014 Confirm the PR opened for this batch uses the correct branch prefix (`design/`)
- [ ] T015 Only after the page passes its own `quickstart.md` steps: mark this batch's Linear milestone work as ready for review — do not check any PR test-plan item that wasn't actually verified in-session (constitution Principle VII)

---

## Dependencies & Execution Order

### Phase Dependencies

- **Setup (Phase 1)**: No dependencies — can start immediately, including before AI
  Services/AI Solutions exist (it's a reuse-check and a slug-decision note, not content
  work).
- **Foundational (Phase 2)**: The cross-batch dependency gate. BLOCKS Phase 3 entirely.
  This is the one phase in this whole release plan where the blocking condition is not
  "ask the user for a Figma frame" but "confirm two other batches actually finished."
- **User Story (Phase 3)**: Cannot start until Phase 2's gate (T003, T004) is satisfied.
- **Polish (Phase 4)**: Depends on Phase 3 completion.

### Parallel Opportunities

- T001 and T002 can run in parallel.
- T003 and T004 are independent confirmations and can be checked in parallel, though both
  must pass before Phase 3 starts.
- T012 and T013 can run in parallel once Phase 3 is done.

---

## Implementation Strategy

### Sequencing Note (this batch is different from 001/002)

Unlike the Services Family and Core Site Pages batches, this batch's critical path is not
"work through the tasks" — it's "wait for two other batches to finish, then do one
concentrated content-and-design push." Do not attempt to pre-build any part of Phase 3 before
Phase 2's gate passes; there is nothing to consolidate yet.

### MVP First

There is only one user story in this batch — Phase 3 IS the MVP. Complete Setup, satisfy the
Foundational gate, then complete Phase 3 and validate.

### Solo Execution Note

Same as batches 1 and 2: built solo with AI-agent assistance, task by task, not via
unattended `/speckit-implement`.
