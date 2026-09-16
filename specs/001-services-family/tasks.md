---

description: "Task list for Services Family Pages (Batch 1: hub + 6 phase pages + 14 service pages)"
---

# Tasks: Services Family Pages

**Input**: Design documents from `/specs/001-services-family/`

**Prerequisites**: plan.md, spec.md, research.md, data-model.md, quickstart.md

**Tests**: Not requested in spec.md — no test tasks generated. Manual QA per
`quickstart.md` and constitution Principle VII is the completion gate for every task below.

**Organization**: Tasks are grouped by user story (P1–P7, one per lifecycle phase, per
spec.md) so each phase + its service pages can be implemented and verified independently.

## Format: `[ID] [P?] [Story] Description`

- **[P]**: Can run in parallel (different files, no dependency on an incomplete task)
- **[Story]**: Which user story this task belongs to (US1–US7)
- Every page-build task that touches visual/layout specifics is preceded by its own
  blocking Figma-frame-request task — this is structural, not optional, per
  `release-plan.md`'s Design Approval Points.

## Phase 1: Setup

**Purpose**: Confirm reuse-before-create and repo conventions before any new file is written.

- [ ] T001 Check `patterns/` for an existing hero/badge pattern reusable for the new phase pages, and an existing card pattern reusable for the new service pages, before creating `service-phase-hero.php` / `service-card.php` (constitution Principle VIII — reuse-before-create)
- [ ] T002 [P] Check `theme.json` and `styles/dark.json` for existing colour tokens close enough to the 6 confirmed phase-badge colours before creating new ones (constitution Principle III/VIII)
- [ ] T003 [P] Confirm current WP-native breakpoints in use elsewhere in `styles/**/*.json` before authoring any new responsive behaviour for the phase/service patterns (constitution Principle VIII)

**Checkpoint**: Reuse check complete — proceed to Foundational only after confirming what, if anything, from T001–T003 can be reused instead of created new.

---

## Phase 2: Foundational (Blocking Prerequisites)

**Purpose**: Shared patterns and tokens that every user story below depends on.

**⚠️ CRITICAL**: No phase/service page work can begin until this phase is complete.

- [ ] T004 Create shared pattern `patterns/service-phase-hero.php` (phase title, number badge, description, list of grouped service links) per `data-model.md` Service Phase entity — used by all 6 phase pages
- [ ] T005 Create shared pattern `patterns/service-card.php` (service title, description, CTA, related-service links) per `data-model.md` Service Page entity — used by all 14 service pages
- [ ] T006 Add the 6 phase-badge colour tokens to `theme.json` (Discover, Create, Build, Launch, Grow, Evolve), only after T001/T002 reuse-check confirms new tokens are actually needed
- [ ] T007 Add matching phase-badge colour tokens to `styles/dark.json` with genuinely distinct values from T006 — no token may share an identical light/dark value (constitution Principle III, non-negotiable)
- [ ] T008 Verify T006/T007 pass `npm run schema:validate` and `npm run lint:json`

**Checkpoint**: Foundation ready — phase/service page implementation can now begin.

---

## Phase 3: User Story 1 - Services Hub Page (Priority: P1) 🎯 MVP

**Goal**: Explain the lifecycle-phase model and link to all six phase pages.

**Independent Test**: Visit the Services hub page directly; confirm it explains the phase
model and links correctly to all six phase pages, independent of subpage build state.

- [ ] T009 [US1] Request the Figma frame for the Services hub page from the user before starting any other task in this phase (blocking — do not guess layout from LS-1598's title/description alone)
- [ ] T010 [US1] Reconcile `patterns/services-hub.php` against the existing in-progress implementation (LS-1598, branches `feature/ls-1598-*`) — retro-fit, do not discard and rebuild (spec FR-008)
- [ ] T011 [US1] Wire hub content to explain the 6-phase lifecycle model and link to all 6 phase pages (spec FR-001)
- [ ] T012 [US1] Add/verify SEO metadata (title, description) on the Services hub page
- [ ] T013 [US1] Run `quickstart.md` → "Validate: Services Hub" steps: responsive (mobile/tablet/desktop) + light/dark + accessibility spot-check (WCAG 2.1 AA); zero known violations required before marking complete

**Checkpoint**: Services hub fully functional and testable independently.

---

## Phase 4: User Story 2 - Discover Phase (Priority: P2)

**Goal**: Explain the Discover phase and link to the Discovery service (LS-645).

**Independent Test**: Visit the Discover phase page directly; confirm it explains the phase
and links to the Discovery service page.

- [ ] T014 [US2] Request the Figma frame for the Discover phase page (LS-4179) from the user before starting any other task in this phase (blocking)
- [ ] T015 [US2] Build `patterns/phase-discover.php` using the `service-phase-hero` pattern (T004), listing Discovery as its one grouped service
- [ ] T016 [US2] Request the Figma frame for the Discovery service page (LS-645) from the user before starting implementation of that page (blocking) — note Discovery already has real content on dev; confirm whether the frame changes it before rebuilding
- [ ] T017 [US2] Reconcile/build `patterns/service-discovery.php` using the `service-card` pattern (T005) against existing dev-site content
- [ ] T018 [US2] Wire the Discover phase page's link to the Discovery service page (spec FR-002)
- [ ] T019 [US2] Add/verify SEO metadata for both the Discover phase page and the Discovery service page
- [ ] T020 [US2] Run `quickstart.md` → "Validate: A Phase Page" and "Validate: A Service Page" steps for Discover + Discovery

**Checkpoint**: Discover phase + Discovery service fully functional and testable independently.

---

## Phase 5: User Story 3 - Create Phase (Priority: P3)

**Goal**: Explain the Create phase and link to its two services, Content (LS-4185) and
Design (LS-654).

**Independent Test**: Visit the Create phase page directly; confirm it explains the phase and
links to both the Content and Design service pages.

- [ ] T021 [US3] Request the Figma frame for the Create phase page (LS-4180) from the user before starting any other task in this phase (blocking)
- [ ] T022 [US3] Build `patterns/phase-create.php` using the `service-phase-hero` pattern, listing Content and Design as its grouped services
- [ ] T023 [P] [US3] Request the Figma frame for the Content service page (LS-4185) from the user before starting implementation of that page (blocking)
- [ ] T024 [P] [US3] Request the Figma frame for the Design service page (LS-654) from the user before starting implementation of that page (blocking) — note Design already has real content on dev
- [ ] T025 [US3] Build `patterns/service-content.php` using the `service-card` pattern (T005) — no existing content, build from the T023 frame
- [ ] T026 [US3] Reconcile/build `patterns/service-design.php` using the `service-card` pattern against existing dev-site content and the T024 frame
- [ ] T027 [US3] Wire the Create phase page's links to both the Content and Design service pages (spec FR-002)
- [ ] T028 [US3] Add/verify SEO metadata for the Create phase page, Content, and Design service pages
- [ ] T029 [US3] Run `quickstart.md` validation steps for Create phase + Content + Design

**Checkpoint**: Create phase + Content + Design fully functional and testable independently.

---

## Phase 6: User Story 4 - Build Phase (Priority: P4)

**Goal**: Explain the Build phase and link to its two services, Development (LS-2592) and
Migrations (LS-4186).

**Independent Test**: Visit the Build phase page directly; confirm it explains the phase and
links to both the Development and Migrations service pages.

- [ ] T030 [US4] Request the Figma frame for the Build phase page (LS-4181) from the user before starting any other task in this phase (blocking)
- [ ] T031 [US4] Build `patterns/phase-build.php` using the `service-phase-hero` pattern, listing Development and Migrations as its grouped services
- [ ] T032 [P] [US4] Request the Figma frame for the Development service page (LS-2592) from the user before starting implementation of that page (blocking) — note Development already has real content on dev
- [ ] T033 [P] [US4] Request the Figma frame for the Migrations service page (LS-4186) from the user before starting implementation of that page (blocking)
- [ ] T034 [US4] Reconcile/build `patterns/service-development.php` using the `service-card` pattern against existing dev-site content and the T032 frame
- [ ] T035 [US4] Build `patterns/service-migrations.php` using the `service-card` pattern — no existing content, build from the T033 frame
- [ ] T036 [US4] Wire the Build phase page's links to both the Development and Migrations service pages (spec FR-002)
- [ ] T037 [US4] Add/verify SEO metadata for the Build phase page, Development, and Migrations service pages
- [ ] T038 [US4] Run `quickstart.md` validation steps for Build phase + Development + Migrations

**Checkpoint**: Build phase + Development + Migrations fully functional and testable
independently.

---

## Phase 7: User Story 5 - Launch Phase (Priority: P5)

**Goal**: Explain the Launch phase and link to its four services, Hosting (LS-2593),
Performance (LS-4187), Security (LS-4188), and Training (LS-4189).

**Independent Test**: Visit the Launch phase page directly; confirm it explains the phase
and links to all four service pages.

- [ ] T039 [US5] Request the Figma frame for the Launch phase page (LS-4182) from the user before starting any other task in this phase (blocking)
- [ ] T040 [US5] Build `patterns/phase-launch.php` using the `service-phase-hero` pattern, listing Hosting, Performance, Security, and Training as its grouped services
- [ ] T041 [P] [US5] Request the Figma frame for the Hosting service page (LS-2593) from the user before starting implementation of that page (blocking) — note Hosting already has real content on dev
- [ ] T042 [P] [US5] Request the Figma frame for the Performance service page (LS-4187) from the user before starting implementation of that page (blocking)
- [ ] T043 [P] [US5] Request the Figma frame for the Security service page (LS-4188) from the user before starting implementation of that page (blocking)
- [ ] T044 [P] [US5] Request the Figma frame for the Training service page (LS-4189) from the user before starting implementation of that page (blocking)
- [ ] T045 [US5] Reconcile/build `patterns/service-hosting.php` using the `service-card` pattern against existing dev-site content and the T041 frame
- [ ] T046 [US5] Build `patterns/service-performance.php` using the `service-card` pattern — no existing content, build from the T042 frame
- [ ] T047 [US5] Build `patterns/service-security.php` using the `service-card` pattern — no existing content, build from the T043 frame
- [ ] T048 [US5] Build `patterns/service-training.php` using the `service-card` pattern — no existing content, build from the T044 frame
- [ ] T049 [US5] Wire the Launch phase page's links to all four service pages (spec FR-002)
- [ ] T050 [US5] Add/verify SEO metadata for the Launch phase page and all four service pages
- [ ] T051 [US5] Run `quickstart.md` validation steps for Launch phase + Hosting + Performance + Security + Training

**Checkpoint**: Launch phase + its four services fully functional and testable
independently.

---

## Phase 8: User Story 6 - Grow Phase (Priority: P6)

**Goal**: Explain the Grow phase and link to its four services, Support (LS-2597), SEO
(LS-4190), Accessibility (LS-4191), and Email Marketing (LS-4192).

**Independent Test**: Visit the Grow phase page directly; confirm it explains the phase and
links to all four service pages.

- [ ] T052 [US6] Request the Figma frame for the Grow phase page (LS-4183) from the user before starting any other task in this phase (blocking)
- [ ] T053 [US6] Build `patterns/phase-grow.php` using the `service-phase-hero` pattern, listing Support, SEO, Accessibility, and Email Marketing as its grouped services
- [ ] T054 [P] [US6] Request the Figma frame for the Support service page (LS-2597) from the user before starting implementation of that page (blocking) — note Support already has real content on dev
- [ ] T055 [P] [US6] Request the Figma frame for the SEO service page (LS-4190) from the user before starting implementation of that page (blocking)
- [ ] T056 [P] [US6] Request the Figma frame for the Accessibility service page (LS-4191) from the user before starting implementation of that page (blocking)
- [ ] T057 [P] [US6] Request the Figma frame for the Email Marketing service page (LS-4192) from the user before starting implementation of that page (blocking)
- [ ] T058 [US6] Reconcile/build `patterns/service-support.php` using the `service-card` pattern against existing dev-site content and the T054 frame
- [ ] T059 [US6] Build `patterns/service-seo.php` using the `service-card` pattern — no existing content, build from the T055 frame
- [ ] T060 [US6] Build `patterns/service-accessibility.php` using the `service-card` pattern — no existing content, build from the T056 frame
- [ ] T061 [US6] Build `patterns/service-email-marketing.php` using the `service-card` pattern — no existing content, build from the T057 frame
- [ ] T062 [US6] Wire the Grow phase page's links to all four service pages (spec FR-002)
- [ ] T063 [US6] Add/verify SEO metadata for the Grow phase page and all four service pages
- [ ] T064 [US6] Run `quickstart.md` validation steps for Grow phase + Support + SEO + Accessibility + Email Marketing

**Checkpoint**: Grow phase + its four services fully functional and testable independently.

---

## Phase 9: User Story 7 - Evolve Phase / AI Service (Priority: P7)

**Goal**: Explain the Evolve phase and link to the AI service (LS-2601) — this page's
content is a hard dependency for the later AI Mega Page batch.

**Independent Test**: Visit the Evolve phase page directly; confirm it explains the phase
and links to the AI service page.

- [ ] T065 [US7] Request the Figma frame for the Evolve phase page (LS-4184) from the user before starting any other task in this phase (blocking)
- [ ] T066 [US7] Build `patterns/phase-evolve.php` using the `service-phase-hero` pattern, listing AI as its one grouped service
- [ ] T067 [US7] Request the Figma frame for the AI service page (LS-2601) from the user before starting implementation of that page (blocking) — note AI already has real content on dev
- [ ] T068 [US7] Reconcile/build `patterns/service-ai.php` using the `service-card` pattern against existing dev-site content and the T067 frame
- [ ] T069 [US7] Wire the Evolve phase page's link to the AI service page (spec FR-002)
- [ ] T070 [US7] Add/verify SEO metadata for the Evolve phase page and the AI service page
- [ ] T071 [US7] Run `quickstart.md` validation steps for Evolve phase + AI
- [ ] T072 [US7] Confirm the AI service page's content is stable and complete enough to be referenced by the AI Mega Page batch without rework (spec SC-006) — flag explicitly to the user if not, since this blocks that later batch

**Checkpoint**: All 7 user stories (21 pages) independently functional.

---

## Phase 10: Polish & Cross-Cutting Concerns

**Purpose**: Batch-wide checks that span multiple user stories.

- [ ] T073 [P] Run the "Validate: Design Token Discipline" steps from `quickstart.md` across every token touched in T006/T007 — confirm no light/dark value pair is identical
- [ ] T074 Run a full link-resolution pass across all 21 pages: confirm 100% of hub→phase and phase→service links resolve (spec SC-005); CTA links to Free Consultation/Contact are exempt while Shared Foundations is still in progress, per spec Clarifications
- [ ] T075 [P] Add a CHANGELOG.md entry for this batch, grouped under its own dated heading, once the batch (or a meaningful sub-slice of it) is ready to merge
- [ ] T076 Confirm every PR opened for this batch uses the correct branch prefix (`design/`) per the sibling issues' existing DoR/DoD checklists
- [ ] T077 Only after all 21 pages pass their own `quickstart.md` steps: mark this batch's Linear milestone work as ready for review — do not check any PR test-plan item that wasn't actually verified in-session (constitution Principle VII)

---

## Dependencies & Execution Order

### Phase Dependencies

- **Setup (Phase 1)**: No dependencies — can start immediately.
- **Foundational (Phase 2)**: Depends on Setup (T001–T003 reuse-check) — BLOCKS all user
  stories. The two shared patterns (T004, T005) and the phase-badge tokens (T006, T007) are
  used by every phase/service page below.
- **User Stories (Phase 3–9)**: All depend on Foundational phase completion. Each phase
  story is independently testable once Foundational is done — they do not depend on each
  other, except:
  - **US7 (Evolve/AI)** has a downstream dependency: its output (AI service page content)
    blocks the future AI Mega Page batch, not any story in this batch.
- **Polish (Phase 10)**: Depends on however many user stories are complete at the time it
  runs — T074's link-resolution pass is only fully meaningful once all 7 stories are done.

### User Story Dependencies

- US1 (Hub, P1): No dependency on other stories in this batch.
- US2–US6 (Discover, Create, Build, Launch, Grow): No dependency on each other — freely
  reorderable if priorities change (spec Assumptions).
- US7 (Evolve/AI, P7): No dependency on other stories in this batch, but its completion
  gates the AI Mega Page batch outside this spec.

### Parallel Opportunities

- T002 and T003 (Setup) can run in parallel with T001.
- Within Launch (US5) and Grow (US6), the four per-service Figma-frame-request tasks
  (T041–T044, T054–T057) are marked [P] — they're independent requests to the user and can
  be asked together rather than strictly sequentially, though the *build* tasks that follow
  each frame remain sequential relative to their own frame.
- Different phase-page user stories (US2–US6) can be worked in parallel by different people
  if capacity allows — this repo's actual resourcing is solo (per `release-plan.md`), so in
  practice these run sequentially, but the task graph does not force that.

---

## Implementation Strategy

### MVP First (User Story 1 Only)

1. Complete Phase 1: Setup (reuse-check).
2. Complete Phase 2: Foundational (shared patterns + tokens) — blocks everything else.
3. Complete Phase 3: Services Hub (US1).
4. **STOP and VALIDATE**: run `quickstart.md`'s hub validation steps independently.

### Incremental Delivery

1. Setup + Foundational → shared patterns and tokens ready.
2. Hub (US1) → validate → this is the MVP slice.
3. Discover (US2) → validate. Then Create (US3), Build (US4), Launch (US5), Grow (US6),
   Evolve (US7) in that order, per the release plan's lifecycle-order rationale — though any
   of US2–US6 could be pulled forward without breaking anything.
4. Polish (Phase 10) once all 7 stories are complete.

### Solo Execution Note

Per `release-plan.md`'s Resourcing & Review Model, this batch is built solo with AI-agent
assistance, task by task, not via unattended `/speckit-implement` — each task above is meant
to be handed to a coding agent individually, with the Figma-frame-request tasks acting as
natural pause points for the site owner to supply that page's design reference.
