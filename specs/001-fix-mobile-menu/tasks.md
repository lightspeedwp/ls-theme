---
description: "Task list for LS-3222: Fix mobile menu — restore links and remove Systems"
---

# Tasks: Fix Mobile Menu — Restore Links and Remove Systems

**Input**: Design documents from `/specs/001-fix-mobile-menu/`

**Prerequisites**: [plan.md](./plan.md) (required), [spec.md](./spec.md) (required for user stories), [research.md](./research.md), [data-model.md](./data-model.md), [quickstart.md](./quickstart.md)

**Tests**: Not included — the feature spec calls for manual QA only (see [quickstart.md](./quickstart.md)); no automated test suite exists for menu interaction in this theme.

**Organization**: Tasks are grouped by user story (from spec.md) so each can be implemented and verified independently.

## Format: `[ID] [P?] [Story] Description`

- **[P]**: Can run in parallel (different files, no dependencies)
- **[Story]**: Which user story this task belongs to (US1, US2, US3)
- File paths are exact and relative to `wp-content/themes/ls-theme/`

## Path Conventions

Single WordPress block theme (no frontend/backend split). All paths are relative to the theme root
`wp-content/themes/ls-theme/`, per [plan.md](./plan.md) Project Structure.

---

## Phase 1: Setup

**Purpose**: Confirm the working environment is ready to observe and rebuild the affected styles.

- [x] T001 Confirm the theme's SCSS build/watch process is running so edits to `src/scss/**` compile into `assets/css/*.css` (do not hand-edit compiled CSS, per AGENTS.md) — confirmed via `npm run build:css` (compressed/production build, matching what's committed; an earlier `build:css:dev` run was reverted because it rewrote all 24 CSS files in the expanded format, unrelated to this change)
- [x] T002 Load the site's mobile menu on dev at 375px and 320px in a browser/device emulator with DevTools console open, to capture the pre-fix baseline (current broken-link behavior, current "Systems" row, current padding) referenced throughout this task list — done on local dev (localhost:8882); baseline showed "Systems" present, links clickable via simulated clicks, no console errors

**Checkpoint**: Baseline observed and build pipeline confirmed working before any code changes.

---

## Phase 2: Foundational

**Purpose**: No shared blocking infrastructure is required — User Stories 1, 2, and 3 touch
different, independent parts of `parts/mobile-menu.html` and independent style rules (per
[data-model.md](./data-model.md) and [research.md](./research.md)). This phase is intentionally
empty; proceed directly to Phase 3.

**Checkpoint**: N/A — user stories may be implemented in any order or in parallel.

---

## Phase 3: User Story 1 - Tap a mobile menu link to navigate (Priority: P1) 🎯 MVP

**Goal**: Every mobile menu link (top-level and inside expanded dropdowns) is clickable/tappable and
navigates correctly, with zero console errors.

**Independent Test**: On a 320px/375px viewport, open the mobile menu, expand each accordion, and
tap every link — each must navigate; DevTools console must show no new errors.

### Implementation for User Story 1

- [ ] T003 [US1] Run the R1 investigation checklist from [research.md](./research.md) on dev: inspect computed styles on a tapped-but-unresponsive link inside an expanded accordion in `parts/mobile-menu.html` (check `pointer-events`, `z-index`/stacking context, and dimensions on the link, its `::after` stretched-link overlay, and ancestor elements including `.wp-block-navigation__responsive-container-content`) — **NOT COMPLETED**: could not reproduce a click failure with simulated browser clicks on local dev (every link tested navigated correctly); the iOS Simulator (for real touch-event testing) is unavailable on this machine (needs a full Xcode install, not just command-line tools). No root cause confirmed.
- [ ] T004 [US1] Based on T003's findings, fix the confirmed root cause — **BLOCKED**: no root cause was confirmed in T003, so no fix has been applied. Do not guess-fix this without either a real-device repro or more specific information from whoever filed LS-3222 (which links, which device/browser, does the whole menu fail or only some links).
- [ ] T005 [US1] Rebuild theme assets — N/A, no SCSS change was made for this story
- [ ] T006 [US1] Manually verify every link navigates correctly — partially verified only in the sense that no dead-tap bug reproduced on local dev; not verified against DEV on a real device
- [ ] T007 [US1] Confirm zero new console errors — no new errors observed during T002/T006 testing, but this doesn't confirm the underlying bug is fixed since it was never reproduced

**Checkpoint**: NOT MET. The core defect (unclickable links) is still unresolved — needs a real-device repro before a targeted fix can be written.

---

## Phase 4: User Story 2 - Systems item no longer appears (Priority: P2)

**Goal**: The non-functional "Systems" link row is fully removed from the mobile menu, with no
layout gap or orphaned reference left behind.

**Independent Test**: Open the mobile menu on a mobile viewport and confirm "Systems" does not
appear anywhere, and no visual gap remains between the "Services" and "Pricing" accordions.

### Implementation for User Story 2

- [x] T008 [US2] Remove the `mobile-menu-link-row` paragraph block containing the "Systems" link (`<a href="/systems/">Systems</a>`) from `parts/mobile-menu.html` (currently lines 214-216, between the "Services" and "Pricing" `<details>` accordions) — done
- [x] T009 [US2] Check whether a corresponding "Systems" entry exists elsewhere and remove it too, so removal is consistent — checked `parts/*.html`, `patterns/*.php`, `inc/header.php`: no other standalone "Systems" mobile-menu entry found. Note: the **desktop** nav bar (`header.php`/its pattern) has its own separate "Systems" link, out of scope per LS-3222's "mobile menu" wording — flagging so it's a conscious decision, not an oversight
- [x] T010 [US2] Manually verify on dev at 320px and 375px: "Systems" does not appear at any level of the mobile menu, and the spacing between the "Services" and "Pricing" accordions looks correct with no leftover gap or stray divider — confirmed via screenshot, no gap

**Checkpoint**: MET for the mobile menu. Desktop nav still shows "Systems" separately — see note on T009.

---

## Phase 5: User Story 3 - Comfortable spacing in mobile page-list dropdowns (Priority: P3)

**Goal**: Page-list items inside mobile dropdown accordions have visibly reduced padding while
remaining reliably tappable.

**Independent Test**: On a 320px/375px viewport, expand a mobile dropdown page list and confirm
padding is visibly reduced versus the pre-fix baseline (T002), with no mis-taps on adjacent items.

### Implementation for User Story 3

- [x] T011 [US3] Reduce the `styles.spacing.padding` values (top/right/bottom/left, currently all `var:preset|spacing|10`) in `styles/blocks/groups/mega-menu-item-service.json` to the next-smaller existing spacing preset in the theme's scale (per research.md R3) — reduced to `var:preset|spacing|5` (the only smaller preset in `styles/presets/spacing.json`'s scale)
- [x] T012 [US3] Check the same style's effect on **desktop** Services dropdown rows, since `.is-style-mega-menu-item-service` is shared between mobile and desktop — checked via screenshot: desktop Services mega-menu still reads cleanly, not cramped
- [ ] T013 [US3] Mobile-only override fallback — not needed, desktop check in T012 showed no regression
- [x] T014 [US3] Manually verify on dev at 320px and 375px: padding around each page-list item is visibly reduced from the T002 baseline, and every link remains tappable — confirmed via before/after screenshots (Services accordion) and a successful tap-through on "Discovery" post-change

**Checkpoint**: MET — mobile dropdown padding is visibly reduced, desktop unaffected, links still tappable.

---

## Phase 6: Polish & Cross-Cutting Concerns

**Purpose**: Final full-scope verification across all three stories together, matching the Linear
issue's overall Definition of Done (changelog and PR steps happen after merge review, per team
convention — not included here).

- [ ] T015 [P] Run the full quickstart.md validation guide end-to-end — partially done (scenarios 2 and 4 covered; scenario 1's click-through wasn't exhaustively re-run across every single link, and none of this was tested on a real device against DEV)
- [x] T016 Re-check the Constitution Check gates from plan.md — no hardcoded colors, no SCSS touched, JSON-first approach used for the padding change, no new files/dependencies; tap-target sizing not formally re-measured but visually still comfortable
- [x] T017 Review the full diff for unrelated/accidental changes — **caught and fixed one real issue**: an initial `npm run build:css:dev` run rewrote all 24 compiled CSS files in the wrong (expanded, dev) format instead of the committed compressed format; reverted by re-running the correct `npm run build:css`. Final diff is clean: only `parts/mobile-menu.html` (-4 lines) and `styles/blocks/groups/mega-menu-item-service.json` (padding token change)

**Checkpoint**: PARTIALLY MET. "Systems" removed and padding reduced are both done and verified. The core click-bug (US1) remains unresolved and needs real-device input before it can be fixed.

---

## Dependencies & Execution Order

### Phase Dependencies

- **Setup (Phase 1)**: No dependencies — start immediately.
- **Foundational (Phase 2)**: Empty — does not block anything.
- **User Stories (Phase 3-5)**: All depend only on Phase 1 (baseline observed). They touch
  independent files/rules (per data-model.md) and may proceed in parallel or in priority order
  (P1 → P2 → P3).
- **Polish (Phase 6)**: Depends on all three user stories being complete.

### User Story Dependencies

- **User Story 1 (P1)**: No dependency on US2/US3. This is the MVP — LS-3222's core defect.
- **User Story 2 (P2)**: No dependency on US1/US3. Pure removal, independently testable.
- **User Story 3 (P3)**: No dependency on US1/US2. Independently testable, but its T012 check
  (desktop impact) should happen after its own T011, not gated on the other stories.

### Parallel Opportunities

- T001 and T002 (Setup) can run together.
- Once Phase 1 is done, US1 (T003-T007), US2 (T008-T010), and US3 (T011-T014) can be worked on in
  parallel by different people, or sequentially in priority order by one person — they do not
  conflict on the same lines of `parts/mobile-menu.html` (US1's fix is CSS-only; US2 removes a
  specific unrelated block; US3 edits a separate JSON file).
- T015 [P] can run alongside T016/T017 since it's a read-only verification pass.

---

## Parallel Example: All Three Stories After Setup

```bash
# After T001-T002 (Setup) complete, these can be worked on in parallel:
Task: "US1 — investigate and fix unclickable links (T003-T007)"
Task: "US2 — remove the Systems link row (T008-T010)"
Task: "US3 — reduce page-list padding (T011-T014)"
```

---

## Implementation Strategy

### MVP First (User Story 1 Only)

1. Complete Phase 1: Setup.
2. Complete Phase 3: User Story 1 (T003-T007) — this alone fixes LS-3222's headline defect
   (unclickable links).
3. **STOP and VALIDATE**: Confirm every link works and the console is clean.
4. Ship if the "Systems" removal and padding work need to land separately; otherwise continue.

### Incremental Delivery

1. Setup → baseline captured.
2. User Story 1 → verify independently → this is the MVP.
3. User Story 2 → verify independently.
4. User Story 3 → verify independently, watching for desktop side effects (T012/T013).
5. Polish (Phase 6) → full quickstart run, Constitution re-check, diff review → open PR.

---

## Notes

- No test tasks are included — this theme has no automated interaction test suite for menus, and
  the spec calls for manual QA only (documented honestly per this project's PR test-plan convention:
  only check off what was actually run).
- Changelog entry and PR creation happen after this task list is complete, per team convention —
  not tracked here.
- `validate_blocks` must not be used to verify block markup changes (T008) — use direct JSON/source
  inspection or the Site Editor instead, per project policy.
- Commit after each user story phase, or after each task if preferred.
