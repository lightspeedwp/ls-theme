---

description: "Task list for Core Site Pages (Batch 2: Shared Foundations + About + Solutions, 25 pages)"
---

# Tasks: Core Site Pages (Shared Foundations, About, Solutions)

**Input**: Design documents from `/specs/002-core-site-pages/`

**Prerequisites**: plan.md, spec.md, research.md, data-model.md, quickstart.md

**Tests**: Not requested in spec.md — no test tasks generated. Manual QA per
`quickstart.md` and constitution Principle VII is the completion gate for every task below.

**Organization**: Tasks are grouped by user story (P1–P6, per spec.md), same convention as
the Services Family batch (001). Every page-build task that touches visual/layout specifics
is preceded by its own blocking Figma-frame-request task.

## Phase 1: Setup

**Purpose**: Confirm reuse-before-create before any new file is written.

- [ ] T001 Check `patterns/` for an existing hub-style pattern reusable for About/Solutions/Policies before creating `family-hub.php` (constitution Principle VIII)
- [ ] T002 [P] Check `patterns/` for an existing static-content pattern reusable for the 9 legal/policy pages before creating `legal-content.php` (constitution Principle VIII)
- [ ] T003 [P] Verify the existing Portfolio Index and Blog Index templates (LS-1206) still reflect current taxonomy terms (Industries/Services/Project types/Software per LS-1208/LS-1220) before reusing them for Work archive / Insights archive — do not rebuild, verify only
- [ ] T004 [P] Verify the existing Gravity Forms for Free Consultation and Contact (LS-1207/LS-1214/LS-2610) are still correctly configured before wiring them into pages — do not rebuild, verify only

**Checkpoint**: Reuse check complete.

---

## Phase 2: Foundational (Blocking Prerequisites)

**Purpose**: Shared patterns that the hub and legal/policy user stories depend on.

**⚠️ CRITICAL**: US3, US5, and US6 below cannot start until this phase is complete (they
build hub or legal/policy pages using these patterns). US1, US2, and US4 do not depend on
this phase and may start in parallel with it.

- [ ] T005 Create shared pattern `patterns/family-hub.php` (intro content + list of grouped subpage links) per `data-model.md` Family Hub entity — used by About hub, Solutions hub, Policies hub
- [ ] T006 Create shared pattern `patterns/legal-content.php` (static long-form content, no CTA, no related links) per `data-model.md` Legal/Policy Page entity — used by Privacy Policy, Terms & Conditions, and all 7 policy sub-pages

**Checkpoint**: Foundation ready — US3, US5, US6 can now begin.

---

## Phase 3: User Story 1 - Free Consultation (Priority: P1) 🎯 MVP

**Goal**: Allow a visitor to submit a consultation request end-to-end.

**Independent Test**: Visit the Free Consultation page directly; submit the form; confirm
routing to its own distinct thank-you page.

- [ ] T007 [US1] Request the Figma frame for the Free Consultation page from the user before starting any other task in this phase (blocking)
- [ ] T008 [US1] Wire the existing, already-verified (T004) Gravity Form into `patterns/free-consultation.php`
- [ ] T009 [US1] Confirm submission routes to `/free-consultation/thank-you/` (LS-1211, already Done) — NOT to the Contact thank-you page (spec Clarifications, data-model.md Conversion Page validation rule)
- [ ] T010 [US1] Add/verify SEO metadata for the Free Consultation page
- [ ] T011 [US1] Run `quickstart.md` → "Validate: Free Consultation and Contact" steps for this page, including the thank-you-page distinctness check

**Checkpoint**: Free Consultation fully functional and testable independently.

---

## Phase 4: User Story 2 - Shared Foundations Index Pages (Priority: P2)

**Goal**: Working Work archive and Insights archive pages.

**Independent Test**: Visit each archive page directly; confirm it lists real content.

- [ ] T012 [US2] Request the Figma frame for the Work archive page (LS-1600) from the user before starting any other task in this phase (blocking)
- [ ] T013 [US2] Wire `patterns/work-archive.php` using the existing, already-verified (T003) Portfolio Index template — do not rebuild
- [ ] T014 [P] [US2] Request the Figma frame for the Insights archive page (LS-1601) from the user before starting implementation of that page (blocking)
- [ ] T015 [US2] Wire `patterns/insights-archive.php` using the existing, already-verified (T003) Blog Index template — do not rebuild
- [ ] T016 [US2] Add/verify SEO metadata for both archive pages
- [ ] T017 [US2] Run `quickstart.md` → "Validate: Work Archive and Insights Archive" steps

**Checkpoint**: Work archive + Insights archive fully functional and testable independently.

---

## Phase 5: User Story 3 - Contact & Legal Pages (Priority: P3)

**Goal**: Working Contact page, Privacy Policy, Terms & Conditions, and a Policies &
Principles hub linking to its 7 sub-policies (LS-4197–LS-4203).

**Independent Test**: Visit each of the 10 pages directly; confirm content is present and,
for the Policies hub, that all 7 sub-policy links resolve.

- [ ] T018 [US3] Request the Figma frame for the Contact page from the user before starting any other task in this phase (blocking)
- [ ] T019 [US3] Wire the existing, already-verified (T004) Gravity Form into `patterns/contact.php`
- [ ] T020 [P] [US3] Request the Figma frame for the Privacy Policy page from the user before starting implementation of that page (blocking)
- [ ] T021 [P] [US3] Request the Figma frame for the Terms & Conditions page from the user before starting implementation of that page (blocking)
- [ ] T022 [US3] Build `patterns/privacy-policy.php` using `legal-content.php` (T006), wiring in the already-approved content (LS-1224)
- [ ] T023 [US3] Build `patterns/terms-conditions.php` using `legal-content.php`, wiring in the already-approved content (LS-1224)
- [ ] T024 [US3] Request the Figma frame for the Policies & Principles hub page from the user before starting any other task for the hub (blocking)
- [ ] T025 [US3] Build `patterns/policies.php` using `family-hub.php` (T005), listing all 7 sub-policies as its grouped subpages
- [ ] T026 [P] [US3] Request the Figma frame for the Publishing Principles page (LS-4197) from the user before starting implementation of that page (blocking)
- [ ] T027 [P] [US3] Request the Figma frame for the Ownership & Funding page (LS-4198) from the user before starting implementation of that page (blocking)
- [ ] T028 [P] [US3] Request the Figma frame for the Actionable Feedback Policy page (LS-4199) from the user before starting implementation of that page (blocking)
- [ ] T029 [P] [US3] Request the Figma frame for the Ethics Policy page (LS-4200) from the user before starting implementation of that page (blocking)
- [ ] T030 [P] [US3] Request the Figma frame for the Diversity Staffing Report page (LS-4201) from the user before starting implementation of that page (blocking)
- [ ] T031 [P] [US3] Request the Figma frame for the Corrections Policy page (LS-4202) from the user before starting implementation of that page (blocking)
- [ ] T032 [P] [US3] Request the Figma frame for the Editorial Content Diversity Policy page (LS-4203) from the user before starting implementation of that page (blocking)
- [ ] T033 [US3] Build `patterns/policy-publishing-principles.php` using `legal-content.php` and the T026 frame
- [ ] T034 [US3] Build `patterns/policy-ownership-funding.php` using `legal-content.php` and the T027 frame
- [ ] T035 [US3] Build `patterns/policy-feedback.php` using `legal-content.php` and the T028 frame
- [ ] T036 [US3] Build `patterns/policy-ethics.php` using `legal-content.php` and the T029 frame
- [ ] T037 [US3] Build `patterns/policy-diversity-staffing.php` using `legal-content.php` and the T030 frame
- [ ] T038 [US3] Build `patterns/policy-corrections.php` using `legal-content.php` and the T031 frame
- [ ] T039 [US3] Build `patterns/policy-diversity-content.php` using `legal-content.php` and the T032 frame
- [ ] T040 [US3] Wire the Policies hub's links to all 7 sub-policy pages (spec FR-009)
- [ ] T041 [US3] Add/verify SEO metadata for all 10 pages in this story (Contact, Privacy Policy, Terms & Conditions, Policies hub, 7 sub-policies)
- [ ] T042 [US3] Run `quickstart.md` → "Validate: Free Consultation and Contact" (Contact half) and "Validate: Legal & Policy Pages" steps for all 10 pages

**Checkpoint**: Contact + Privacy Policy + Terms & Conditions + Policies hub + 7 sub-policies
fully functional and testable independently.

---

## Phase 6: User Story 4 - Contact Thank-You Page (Priority: P4)

**Goal**: A working Contact thank-you confirmation page, distinct from Free Consultation's.

**Independent Test**: Visit the Contact thank-you page directly; confirm a clear confirmation
message displays independent of arriving via an actual form submission.

- [ ] T043 [US4] Request the Figma frame for the Contact thank-you page (LS-2595) from the user before starting any other task in this phase (blocking) — note the existing `/free-consultation/thank-you/` page as a structural reference, but this is a distinct page, not a copy
- [ ] T044 [US4] Build `patterns/contact-thank-you.php`
- [ ] T045 [US4] Add/verify SEO metadata for the Contact thank-you page
- [ ] T046 [US4] Run `quickstart.md` validation for this page

**Checkpoint**: Contact thank-you page fully functional and testable independently.

---

## Phase 7: User Story 5 - About Family (Priority: P5)

**Goal**: A working About hub linking to Process, Team, Culture, History, and Accessibility
Commitment.

**Independent Test**: Visit the About hub directly; confirm it links to all 5 related pages;
visit each subpage directly and confirm independent readability.

- [ ] T047 [US5] Request the Figma frame for the About hub page (LS-1602) from the user before starting any other task for the hub (blocking)
- [ ] T048 [US5] Build `patterns/about.php` using `family-hub.php` (T005), listing Process, Team, Culture, History, and Accessibility Commitment as its grouped subpages
- [ ] T049 [P] [US5] Request the Figma frame for the About/Process page (LS-1603) from the user before starting implementation of that page (blocking)
- [ ] T050 [P] [US5] Request the Figma frame for the Team page (LS-2602) from the user before starting implementation of that page (blocking) — note Team stays at the existing top-level `/team/` URL, not reparented under `/about/`
- [ ] T051 [P] [US5] Request the Figma frame for the Culture page (LS-2603) from the user before starting implementation of that page (blocking)
- [ ] T052 [P] [US5] Request the Figma frame for the History page (LS-2604) from the user before starting implementation of that page (blocking)
- [ ] T053 [P] [US5] Request the Figma frame for the Accessibility Commitment page (LS-4196) from the user before starting implementation of that page (blocking) — no existing content, this page did not exist as a tracked issue before this batch's scope check
- [ ] T054 [US5] Build `patterns/about-process.php` (bespoke) from the T049 frame
- [ ] T055 [US5] Build `patterns/team.php` (bespoke) from the T050 frame
- [ ] T056 [US5] Build `patterns/culture.php` (bespoke) from the T051 frame
- [ ] T057 [US5] Build `patterns/history.php` (bespoke) from the T052 frame
- [ ] T058 [US5] Build `patterns/accessibility-commitment.php` (bespoke) from the T053 frame
- [ ] T059 [US5] Wire the About hub's links to all 5 subpages (spec FR-006)
- [ ] T060 [US5] Add/verify SEO metadata for the About hub and all 5 subpages
- [ ] T061 [US5] Run `quickstart.md` → "Validate: About Family and Solutions Family" steps for the About family

**Checkpoint**: About Family fully functional and testable independently.

---

## Phase 8: User Story 6 - Solutions Family (Priority: P6)

**Goal**: A working Solutions hub linking to Tour Operator, WordPress, WooCommerce, AI
Solutions, Publishing, Design Systems, and LSX.

**Independent Test**: Visit the Solutions hub directly; confirm it links to all 7 solution
pages; visit each subpage directly and confirm independent readability.

- [ ] T062 [US6] Request the Figma frame for the Solutions hub page (LS-1599) from the user before starting any other task for the hub (blocking)
- [ ] T063 [US6] Build `patterns/solutions.php` using `family-hub.php` (T005), listing all 7 solution pages as its grouped subpages
- [ ] T064 [P] [US6] Request the Figma frame for the Tour Operator page (LS-649) from the user before starting implementation of that page (blocking) — note existing content on dev
- [ ] T065 [P] [US6] Request the Figma frame for the WordPress solution page (LS-2598) from the user before starting implementation of that page (blocking) — note existing content on dev
- [ ] T066 [P] [US6] Request the Figma frame for the WooCommerce solution page (LS-2599) from the user before starting implementation of that page (blocking) — note existing content on dev
- [ ] T067 [P] [US6] Request the Figma frame for the AI Solutions page (LS-2600) from the user before starting implementation of that page (blocking) — note existing content on dev; this page is a hard dependency for the future AI Mega Page batch
- [ ] T068 [P] [US6] Request the Figma frame for the Publishing solution page (LS-4195) from the user before starting implementation of that page (blocking) — no existing content
- [ ] T069 [P] [US6] Request the Figma frame for the Design Systems page (LS-4193) from the user before starting implementation of that page (blocking) — no existing content
- [ ] T070 [P] [US6] Request the Figma frame for the LSX page (LS-4194) from the user before starting implementation of that page (blocking) — no existing content
- [ ] T071 [US6] Before building each Solutions subpage, check reuse against the `service-card` pattern from the Services Family batch (001) per `research.md` — use it if the shape genuinely matches, otherwise build bespoke (do not decide this in planning, decide per-page here)
- [ ] T072 [US6] Reconcile/build `patterns/tour-operator.php` against existing dev-site content and the T064 frame
- [ ] T073 [US6] Reconcile/build `patterns/solutions-wordpress.php` against existing dev-site content and the T065 frame
- [ ] T074 [US6] Reconcile/build `patterns/solutions-woocommerce.php` against existing dev-site content and the T066 frame
- [ ] T075 [US6] Reconcile/build `patterns/solutions-ai.php` against existing dev-site content and the T067 frame
- [ ] T076 [US6] Build `patterns/publishing.php` from the T068 frame — no existing content
- [ ] T077 [US6] Build `patterns/design-systems.php` from the T069 frame — no existing content
- [ ] T078 [US6] Build `patterns/lsx.php` from the T070 frame — no existing content
- [ ] T079 [US6] Wire the Solutions hub's links to all 7 solution pages (spec FR-007)
- [ ] T080 [US6] Confirm none of the 7 solution pages or the hub link to `/solutions/ai-chatbots/` or `/solutions/ai-readiness/` (spec FR-008, SC-006)
- [ ] T081 [US6] Add/verify SEO metadata for the Solutions hub and all 7 subpages
- [ ] T082 [US6] Run `quickstart.md` → "Validate: About Family and Solutions Family" steps for the Solutions family

**Checkpoint**: Solutions Family fully functional and testable independently.

---

## Phase 9: Polish & Cross-Cutting Concerns

- [ ] T083 Run a full link-resolution pass across all 25 pages: confirm every hub-to-subpage link resolves (spec SC-003); no page links to the explicitly-excluded Phase 3 pages (spec SC-006, FR-008)
- [ ] T084 [P] Confirm the About hub does not accidentally link to `/about/ai-governance/` (spec FR-008) — check this explicitly since About's structure makes it easy to miss alongside the Solutions-side checks in T080
- [ ] T085 [P] Add a CHANGELOG.md entry for this batch, grouped under its own dated heading, once the batch (or a meaningful sub-slice) is ready to merge
- [ ] T086 Confirm every PR opened for this batch uses the correct branch prefix (`design/`)
- [ ] T087 Only after all 25 pages pass their own `quickstart.md` steps: mark this batch's Linear milestone work as ready for review — do not check any PR test-plan item that wasn't actually verified in-session (constitution Principle VII)

---

## Dependencies & Execution Order

### Phase Dependencies

- **Setup (Phase 1)**: No dependencies — can start immediately.
- **Foundational (Phase 2)**: Depends on Setup (T001/T002 reuse-check) — BLOCKS US3, US5, and
  US6 (they use `family-hub.php`/`legal-content.php`). Does NOT block US1, US2, or US4, which
  use different, already-existing infrastructure (Gravity Forms, archive templates) or fully
  bespoke content.
- **User Stories (Phase 3–8)**: US1 and US2 can start immediately after Setup, in parallel
  with Foundational. US3, US5, US6 need Foundational done first. US4 has no dependency on
  Foundational but is naturally sequenced after US1/US3 since it's their shared completion
  step (though it's a distinct page per user, not literally blocked on them).
- **Polish (Phase 9)**: Depends on however many user stories are complete — T083's
  link-resolution pass is only fully meaningful once all 6 stories are done.

### User Story Dependencies

- US1 (Free Consultation, P1): No dependency on other stories.
- US2 (Shared Foundations Index, P2): No dependency on other stories.
- US3 (Contact & Legal, P3): Depends on Foundational (family-hub, legal-content patterns).
- US4 (Contact Thank-You, P4): No hard dependency on US3, but logically follows it.
- US5 (About Family, P5): Depends on Foundational (family-hub pattern).
- US6 (Solutions Family, P6): Depends on Foundational (family-hub pattern). Its AI Solutions
  page (T075) gates the future AI Mega Page batch outside this spec, same as batch 1's AI
  Services page.

### Parallel Opportunities

- T001–T004 (Setup) can run in parallel with each other.
- T005 and T006 (Foundational) can run in parallel with each other.
- US1 and US2 can be worked in parallel with Foundational and with each other.
- Within US3, US5, and US6, the per-page Figma-frame-request tasks are marked `[P]` — same
  convention as batch 1: independent asks to the user, not code dependencies.

---

## Implementation Strategy

### MVP First (User Story 1 Only)

1. Complete Phase 1: Setup.
2. Complete Phase 3: Free Consultation (US1) — does not need Foundational.
3. **STOP and VALIDATE**: run `quickstart.md`'s Free Consultation steps independently.

### Incremental Delivery

1. Setup (+ Foundational, in parallel where possible).
2. Free Consultation (US1) → validate — MVP slice.
3. Shared Foundations Index (US2) → validate.
4. Contact & Legal (US3, needs Foundational) → validate.
5. Contact Thank-You (US4) → validate.
6. About Family (US5, needs Foundational) → validate.
7. Solutions Family (US6, needs Foundational) → validate.
8. Polish (Phase 9) once all 6 stories are complete.

### Solo Execution Note

Same as batch 1: built solo with AI-agent assistance, task by task, not via unattended
`/speckit-implement` — each task above is handed to a coding agent individually, with the
Figma-frame-request tasks as natural pause points for you to supply that page's design
reference.
