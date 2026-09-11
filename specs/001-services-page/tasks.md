---
description: "Task list for Services Page (Remaining Sections & QA) — LS-1598"
---

# Tasks: Services Page (Remaining Sections & QA)

**Input**: Design documents from `/specs/001-services-page/`

**Prerequisites**: plan.md, spec.md, research.md, data-model.md, quickstart.md,
`.specify/memory/constitution.md`

**Tests**: Not requested for this feature (manual QA per quickstart.md is the verification
method — no automated test suite exists in this theme repo for pattern/content work).

**Organization**: Tasks are grouped by user story from spec.md, in priority order
(P1 → P1 → P1 → P2 → P2 → P3).

## Format: `[ID] [P?] [Story] Description`

- **[P]**: Can run in parallel (different files, no dependencies)
- **[Story]**: US1 = Entry Points, US2 = Delivery by the Numbers, US3 = closing CTA,
  US4 = Figma design QA, US5 = responsive check, US6 = SEO metadata

## Path Conventions

Single WordPress block-theme project. Existing Services page patterns live in
`patterns/sections/services-*.php` (and `patterns/hero/services-hero.php`), styled via
`styles/sections/**` JSON, with `theme.json`/`styles/dark.json` for any new tokens. No
`src/`/`backend/`/`frontend/` split.

---

## Phase 1: Setup

**Purpose**: Confirm exact Figma content for the 3 remaining sections before building anything.

- [x] T001 Pull design context (code, tokens, screenshot) for Entry Points via the Figma MCP
      tools, node `8044-164205`, from the file
      `https://www.figma.com/design/OTqchq3sRBzUy6TICruzc3/LightSpeedWP-Design-System`
- [x] T002 [P] Pull design context for Delivery by the Numbers, node `8044-164253`, same Figma
      file
- [ ] T003 [P] Pull design context for the closing CTA, node `8044-164294`, same Figma file

**Checkpoint**: Exact copy, layout, and card/metric counts for all 3 sections are confirmed
from Figma — no guessing content during implementation.

---

## Phase 2: Foundational (Blocking Prerequisites)

**Purpose**: Reuse-before-create and token/icon groundwork per constitution Principle II,
using this repo's own `.agents/skills/` toolchain — not ad hoc manual comparison — before any
new pattern file is written.

- [x] T004 Invoke the `pattern-extractor` skill's analysis phase for Entry Points (Figma
      context from T001): propose what to reuse (starting from
      `styles/sections/cards/card-link-row.json`, already used by
      `patterns/sections/homepage-where-to-start.php` and
      `patterns/sections/work-related-routes.php`) vs. create, per its approval-gated
      reuse-or-create workflow — get explicit sign-off on the proposal before any file is
      written
- [x] T005 [P] Invoke `pattern-extractor`'s analysis phase for Delivery by the Numbers (Figma
      context from T002): propose reuse of `styles/sections/cards/stat-segment.json` (already
      used by `patterns/section-stats-grid.php`) vs. create, same approval-gated workflow
- [ ] T006 [P] Invoke `pattern-extractor`'s analysis phase for the closing CTA (Figma context
      from T003), first reading the existing `patterns/section-cta.php` stub: propose fleshing
      it out vs. creating a new pattern, per research.md's decision
- [ ] T007 Confirm every color/spacing/typography value in all 3 Figma frames resolves to an
      existing `settings.custom.color`/typography/spacing token in `theme.json` — for any value
      that doesn't, add the token to both `theme.json` and `styles/dark.json` with real
      resolved values in each (never an identical light/dark duplicate); `pattern-extractor`'s
      mandatory `theme-color-token-enforcer` load covers color specifically, so this task only
      needs to separately confirm spacing/typography tokens
- [ ] T008 [P] Confirm the icon slugs needed for all 3 sections exist in
      `wp-content/plugins/ls-plugin/assets/icons/lightspeed/` — every icon must be referenced
      via `core/icon` (`{"icon":"lightspeed/{slug}", ...}`), never `outermost/icon-block`, per
      research.md's icon decision (`pattern-extractor`'s Phosphor/Icon-Block mapping step
      should already produce this, but confirm explicitly since this theme uses the newer
      Core Icon block form, not the legacy Icon Block plugin `pattern-extractor` may default to)

**Checkpoint**: Card-shell reuse decisions, token gaps, and icon slugs are confirmed and
approved — Phase 3+
can proceed without inventing anything speculatively.

---

## Phase 3: User Story 1 - Understand entry points into working with LightSpeed (Priority: P1) 🎯 MVP

**Goal**: A convinced visitor sees clearly labeled entry-point options with working
links/CTAs, matching Figma node `8044-164205`.

**Independent Test**: Load the Services page, scroll to the Entry Points section, and confirm
a visitor can identify the distinct ways to begin working with LightSpeed using only on-page
content, per quickstart.md's "Entry Points section present" validation.

### Implementation for User Story 1

- [x] T009 [US1] Execute `pattern-extractor`'s build phase for Entry Points, using T004's
      approved reuse-or-create proposal — this creates
      `patterns/sections/services-entry-points.php` with the standard pattern header
      (Title/Slug/Categories/Block Types/Description/Keywords/Viewport Width/Inserter,
      matching the format in `patterns/sections/services-service-tiles.php`) and, if new JSON
      styling is written, `theme-color-token-enforcer` runs automatically per
      `pattern-extractor`'s own mandatory chain — do not skip it
- [x] T010 [US1] Write the Entry Point array (per data-model.md: label, description,
      link/action for each) and render loop, reusing `card-link-row.json` if T004 confirmed
      it fits, or the new shape-named style if T004 identified a genuine gap (consult
      `wp-block-style-audit` before writing any new `css` field in that style's JSON)
- [x] T011 [US1] Render each entry point's icon via `core/icon` with the `lightspeed/{slug}`
      confirmed in T008
- [x] T012 [US1] Assemble the Entry Points section onto the Services page content, positioned
      per the Figma page flow (after Service Tiles, before Delivery by the Numbers)
- [x] T013 [US1] **N/A** — no `services-entry-points` bundle was needed. The section reuses
      `card-link-row.json` and `core/icon` entirely; no new SCSS/JSON styling was written, so
      there is nothing to register a stylesheet bundle for.
- [x] T014 [US1] **N/A** — same reason as T013, no new stylesheet exists to add as an editor
      style or wire into the build scripts.
- [x] T015 [US1] Run `php -l`, `npm run patterns:escape`, `npm run security:scan`,
      `npm run schema:validate` (if new JSON was added), and `composer run phpcs` against every
      file touched in T009-T014 — fix any failure before proceeding; never use `validate_blocks`

**Checkpoint**: Entry Points section renders on the Services page, independently testable via
quickstart.md.

---

## Phase 4: User Story 2 - See proof of delivery scale (Priority: P1)

**Goal**: A visitor sees credible delivery-scale metrics, matching Figma node `8044-164253`.

**Independent Test**: Load the Services page, scroll to Delivery by the Numbers, and confirm
the stated metrics render correctly and match Figma, per quickstart.md.

### Implementation for User Story 2

- [x] T016 [US2] Execute `pattern-extractor`'s build phase for Delivery by the Numbers, using
      T005's approved proposal — creates `patterns/sections/services-delivery-numbers.php` with
      the standard pattern header; `theme-color-token-enforcer` runs automatically if new JSON
      styling is written
- [x] T017 [US2] Write the Delivery Metric array (per data-model.md: value, label for each) and
      render loop, reusing `stat-segment.json` if T005 confirmed it fits, or the new
      shape-named style if T005 identified a genuine gap (consult `wp-block-style-audit`
      before writing any new `css` field)
- [x] T018 [US2] Confirm the row layout does not visually unbalance when a value has
      significantly more digits than its siblings (data-model.md validation rule) — test with
      the actual longest value from the Figma frame, not a placeholder
- [x] T019 [US2] Assemble the Delivery by the Numbers section onto the Services page content,
      after Entry Points and before the closing CTA
- [x] T020 [US2] **N/A** — same reason as T013: no new SCSS/JSON styling was written (pure
      reuse of `stat-segment.json`), so there is no stylesheet bundle to register.
- [x] T021 [US2] **N/A** — same reason as T014, no new stylesheet exists.
- [x] T022 [US2] Run the full validation suite from T015 against every file touched in
      T016-T021

**Checkpoint**: Delivery by the Numbers section renders correctly, independently testable.

---

## Phase 5: User Story 3 - Take action after reading the page (Priority: P1)

**Goal**: A visitor who reaches the bottom of the page sees an unambiguous, working CTA,
matching Figma node `8044-164294`.

**Independent Test**: Load the Services page, scroll to the end, and confirm a clear CTA
renders matching Figma, per quickstart.md.

### Implementation for User Story 3

- [ ] T023 [US3] Execute `pattern-extractor`'s build phase using T006's approved finding:
      either flesh out the existing `patterns/section-cta.php` stub with this section's
      heading/description/primary link, or (only if T006 found it genuinely doesn't fit)
      create a new, shape-named CTA pattern — reusing existing `core/buttons`/`core/button`
      conventions per constitution Principle IV, not a hand-rolled link;
      `theme-color-token-enforcer` runs automatically if new JSON styling is written
- [ ] T024 [US3] Render any CTA icon via `core/icon` with the `lightspeed/{slug}` confirmed in
      T008, if the Figma frame includes one
- [ ] T025 [US3] Assemble the closing CTA section as the final section on the Services page
      content
- [ ] T026 [US3] If T023 required new/changed styling, register/update the bundle's
      `is_page( 'services' )` condition and editor-style/build-script wiring, same pattern as
      T013-T014
- [ ] T027 [US3] Run the full validation suite from T015 against every file touched in
      T023-T026

**Checkpoint**: Closing CTA renders correctly — all 3 remaining sections are now built. This
completes the MVP (all P1 user stories).

---

## Phase 6: User Story 4 - Confirm the page matches the approved design (Priority: P2)

**Goal**: The completed page has zero unresolved visual discrepancies against Figma.

**Independent Test**: Compare each section of the live page against its Figma frame per
quickstart.md's "Design QA against Figma" validation.

### Implementation for User Story 4

- [ ] T028 [US4] Resync the local test page from the current pattern registry (per the
      project's established WP-CLI resync workflow) and compare Entry Points, Delivery by the
      Numbers, and the closing CTA against their Figma frames: spacing, typography, color
      tokens, copy. Also explicitly confirm Hero, Linked Decisions, Service Clusters, and
      Service Tiles each still appear exactly once on the assembled page (FR-004) — not just
      visually similar to before, but not duplicated or forked by the new sections' assembly
- [ ] T029 [US4] Fix any discrepancy found in T028 directly in the relevant pattern/style file,
      or explicitly log it as an accepted deviation in `specs/001-services-page/quickstart.md`
      under a new "Accepted deviations" heading
- [ ] T030 [US4] Verify correctness via source/JSON inspection or a manual Site Editor check —
      never the `validate_blocks` tool, per constitution Principle VI

**Checkpoint**: Design QA sign-off achieved.

---

## Phase 7: User Story 5 - View the page correctly on any device (Priority: P2)

**Goal**: All 3 new sections remain legible and usable at desktop, tablet, and mobile
breakpoints.

**Independent Test**: Load the page at desktop, tablet, and mobile widths and confirm no
overlapping, clipped, or unreadable content, per quickstart.md's "Responsive check" validation.

### Implementation for User Story 5

- [ ] T031 [US5] Check Entry Points, Delivery by the Numbers, and the closing CTA at desktop,
      tablet, and mobile breakpoints using the Browser pane's `resize_window` tool — pay
      specific attention to vertical `blockGap` consistency when any multi-column row stacks
      (the exact bug class already found twice in `services-service-clusters.php` and
      `services-service-tiles.php`: a `blockGap` set only as `{"left": ...}` silently drops the
      vertical gap to WordPress's default on stack — use a scalar `blockGap` value instead)
- [ ] T032 [US5] Fix any layout defect found in T031 by adjusting layout/spacing JSON in
      `styles/sections/**` (theme-first) rather than adding hand-authored CSS, unless a genuine
      JSON gap exists

**Checkpoint**: Page confirmed responsive across all three breakpoints with no layout defects.

---

## Phase 8: User Story 6 - Find the page via search with meaningful context (Priority: P3)

**Goal**: The Services page has a unique, descriptive SEO title and meta description.

**Independent Test**: Inspect the page's title tag and meta description per quickstart.md's
"SEO metadata" validation.

### Implementation for User Story 6

- [ ] T033 [US6] Set a unique SEO title and meta description for the Services page using the
      site's existing metadata mechanism, summarizing its role as the LightSpeed service-model
      hub
- [ ] T034 [US6] Confirm the title/description from T033 are distinct from every other page's
      metadata on the site

**Checkpoint**: Page metadata complete and unique.

---

## Phase 9: Polish & Cross-Cutting Concerns

**Purpose**: Final housekeeping across all stories.

- [ ] T035 [P] Add a dated `CHANGELOG.md` entry (Keep a Changelog format, one entry for this
      PR) describing the 3 completed sections, per constitution Workflow & Process
- [ ] T036 Run `npm run lint:json` and `npm run build:css` (full, not just the 3 new files) to
      confirm no unintended drift in other compiled output
- [ ] T037 Run through `specs/001-services-page/quickstart.md` end-to-end as a final full
      validation pass before opening/updating the PR
- [ ] T038 Only check off PR test-plan items that were actually run and verified this session;
      leave manual-QA-only items (e.g. live Figma comparison, physical device check) unchecked/
      pending if not literally performed, per constitution Workflow & Process
- [ ] T039 Write the commit message using heading + bullet structure (never prose paragraphs),
      grouped under short section headings, per constitution Workflow & Process

---

## Dependencies & Execution Order

### Phase Dependencies

- **Setup (Phase 1)**: No dependencies — start immediately
- **Foundational (Phase 2)**: Depends on Phase 1 (needs the Figma design context to compare
  against existing card shells/tokens/icons)
- **User Story 1 (Phase 3)**: Depends on Phase 2 — this is part of the MVP
- **User Story 2 (Phase 4)**: Depends on Phase 2; independent of Phase 3's files — can run in
  parallel with Phase 3
- **User Story 3 (Phase 5)**: Depends on Phase 2; independent of Phases 3-4's files — can run
  in parallel with them
- **User Story 4 (Phase 6)**: Depends on Phases 3-5 being complete (nothing to QA until
  sections exist)
- **User Story 5 (Phase 7)**: Depends on Phases 3-5 being complete; can run in parallel with
  Phase 6 (different concern — visual fidelity vs. responsive layout)
- **User Story 6 (Phase 8)**: Independent of Phases 3-7 content-wise; can start any time after
  Phase 1, sequenced last here since it's P3 and lowest impact
- **Polish (Phase 9)**: Depends on all prior phases being complete

### Parallel Opportunities

- T002, T003 can run in parallel with T001 (independent Figma pulls)
- T005, T006, T008 can run in parallel with T004 (different files/checks)
- Phase 3 (US1), Phase 4 (US2), and Phase 5 (US3) can be worked in parallel once Phase 2 is
  complete — three different pattern files, no shared files
- Phase 6 (US4) and Phase 7 (US5) can be worked in parallel once Phases 3-5 are complete
- T035 (changelog) can be written in parallel with T036-T039 (verification tasks)

---

## Implementation Strategy

### MVP First (User Stories 1-3)

1. Complete Phase 1: Setup (pull Figma context for all 3 sections)
2. Complete Phase 2: Foundational (confirm card-shell reuse, tokens, icons)
3. Complete Phases 3-5: Build Entry Points, Delivery by the Numbers, and the closing CTA
   (parallelizable)
4. **STOP and VALIDATE**: Run quickstart.md's section-presence checks independently
5. This is a demoable MVP — the page's remaining content is complete

### Incremental Delivery

1. Setup + Foundational → confirmed Figma content and reuse/token/icon decisions
2. User Stories 1-3 (parallel) → all 3 remaining sections built (MVP)
3. User Story 4 + User Story 5 (parallel) → design QA and responsive check pass
4. User Story 6 → SEO metadata finalized
5. Polish → changelog, lint, full quickstart pass, honest PR test-plan, commit message
