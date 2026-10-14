---

description: "Task list for LSA-187 button and container horizontal overflow coverage"
---

# Tasks: Button and Container Horizontal Overflow Coverage (LSA-187)

**Input**: Design documents from `/specs/003-button-overflow-coverage/`

**Prerequisites**: plan.md, spec.md, research.md, data-model.md, contracts/failure-message.md, quickstart.md

**Tests**: The deliverable is itself Playwright test code, so there are no separate test-first tasks. Each story ends with a verification task that follows [quickstart.md](./quickstart.md). The maintainer runs those and switches the site to Dark for the dark-mode pass.

**Organization**: Grouped by user story. Several stories edit the same file (`tests/helpers/responsive.ts`), so only tasks in different files are marked [P].

## Format: `[ID] [P?] [Story] Description`

- **[P]**: Can run in parallel (different files, no dependency on an incomplete task)
- **[Story]**: User story from spec.md (US1-US5)

## Path Conventions

Repository root is the theme root. Source of change: `tests/helpers/`, `tests/specs/standing/`, `playwright.config.ts`, `README.md`, `CHANGELOG.md`. No theme CSS, PHP or JSON is changed.

## Phase 1: Setup

**Purpose**: Confirm the starting point; nothing to install.

- [X] T001 Confirm the working branch is `test/lsa-187-button-overflow-coverage` and that `BASE_URL` points at a site running this branch (see README Testing section and `.env`)
- [X] T002 [P] Re-read `tests/helpers/responsive.ts`, `tests/specs/standing/responsive-overflow.spec.ts` and `tests/helpers/failure-signature.ts` so new code matches their tab indentation, comment density and `expect.soft` style

---

## Phase 2: Foundational (Blocking Prerequisites)

**Purpose**: Shared in-page measurement that every story uses.

- [X] T003 In `tests/helpers/responsive.ts`, add an exported `expectNoElementOverflow(page: Page, viewportWidth: number): Promise<void>` skeleton and the in-page measurement returning the shapes in [data-model.md](./data-model.md): collect every `.wp-block-button__link` and every child of `.wp-block-buttons`, skipping elements with width 0 or height 0 **and every element inside `.mobile-menu`** (clarified Q2; add a short comment naming `parts/mobile-menu.html` as the source). This exclusion must be in place before any verification runs, because the closed drawer is off-screen with non-zero-size buttons. One button = one element: measure the link, and the `.wp-block-button` wrapper only when it has no link (see data-model.md). Measure the viewport as `document.documentElement.clientWidth`, not the requested width. Leave `expectNoHorizontalOverflow` byte-for-byte unchanged (it is used by `navigation.spec.ts`, `mobile-menu.spec.ts`, `special-routes.spec.ts`)

**Checkpoint**: Helper exists and measures; nothing is asserted or wired yet.

---

## Phase 3: User Story 1 - Catch a button spilling out of its own panel (Priority: P1) MVP

**Goal**: Fail when a button leaves the viewport or either of its containers by more than 1px, on the left or right.

**Independent Test**: With `ls-buttons-wrap` removed, the check fails on `/free-consultation/` at 370px and names "Book your free consultation"; with it present, it passes.

- [X] T004 [US1] In `tests/helpers/responsive.ts`, resolve each button's containers per research R-2: nearest `.wp-block-buttons` ancestor (for a `.wp-block-buttons` child, its parent) and nearest ancestor (never the button itself, never `html`/`body`) that has a border width > 0 with a style other than `none`/`hidden` on any side, or a `background-color` with alpha > 0, or a `background-image` other than `none`, using computed style (research R-2). Skip a container that does not exist
- [X] T005 [US1] In `tests/helpers/responsive.ts`, compute overshoot per element against the viewport and each resolved container using "extends more than 1px beyond on the left or on the right" (`left < containerLeft - 1`, `right > containerRight + 1`), and label the side `left`, `right` or `left+right`. An overshoot of exactly 1px MUST NOT fail
- [X] T006 [US1] In `tests/helpers/responsive.ts`, assert with `expect.soft` so every offender prints and the test continues (one finding per button per container, cap at 20 with a "+N more" line)
- [X] T007 [US1] In `tests/specs/standing/responsive-overflow.spec.ts`, import `expectNoElementOverflow` and call it immediately after `expectNoHorizontalOverflow(page, width)` inside the existing per-width `test.step`, so the document-wide check still runs first
- [X] T008 [US1] Verify per [quickstart.md](./quickstart.md) sections 1-2 for `/free-consultation/` at 370px: passes with the fix present, fails naming "Book your free consultation" with the fix removed; also confirm a button overflowing only on the left (document not scrolling) fails with side `left`. Restore the fix afterwards *(Done: passes with the fix present on DEV. "Fix removed" was simulated by injecting the pre-fix CSS, not by reverting the deployed fix: at 370px it fails naming "Book your free consultation" with 307px in a 254px row, side `left`.)*

**Checkpoint**: US1 is independently demonstrable and is the suggested MVP.

---

## Phase 4: User Story 2 - Failure output that points straight at the problem (Priority: P1)

**Goal**: Every failure names the section, button text, element width, container width and side, in a stable format that BugHerd can group.

**Independent Test**: Trigger a known overflow and confirm the message has all required fields and lists every offender.

- [X] T009 [US2] In `tests/helpers/responsive.ts`, derive the section label per research R-4: nearest ancestor `section` (or `.alignfull` group), its first heading text trimmed to 60 characters, plus its `is-style-*` and custom class names; fall back to the nearest ancestor that has a class attribute. Use the button's visible text (fallback `aria-label`, then `(no text)`)
- [X] T010 [US2] In `tests/helpers/responsive.ts`, format the soft-assertion message exactly as in [contracts/failure-message.md](./contracts/failure-message.md): first line `Button overflow at <viewportWidth>px on <url>: <N> element(s) outside their container`, then one line per offender with section, quoted button text, side and container kind, element width, container width and overshoot
- [X] T011 [US2] In `tests/helpers/failure-signature.ts`, add a branch before the fallback that matches the first line from T010 and returns `button-overflow:<section label>|<button text>|<side>` for the first offender, excluding viewport width, URL and pixel sizes (research R-6). Keep the existing document-overflow branch unchanged
- [X] T012 [US2] If `tests/specs/bugherd-reporter.spec.ts` already unit-tests `extractFailureSignature`, add a case for the new message shape that checks the same defect on two pages and two widths yields one signature; otherwise skip this task and say so in the PR *(Done: added a test to `tests/specs/bugherd-reporter.spec.ts`.)*
- [X] T013 [US2] Verify per [quickstart.md](./quickstart.md): read a failing run's output alone and confirm all required fields are present and multiple offenders are all listed in one run

**Checkpoint**: US1 and US2 together give the core, actionable check.

---

## Phase 5: User Story 3 - Sweep the known-broken patterns across widths (Priority: P2)

**Goal**: Run at all eight widths, on chromium, webkit and Mobile Chrome, and catch the six known patterns at 320px.

**Independent Test**: With `ls-buttons-wrap` removed, 320px reports all six patterns.

- [X] T014 [US3] In `tests/specs/standing/responsive-overflow.spec.ts`, change `VIEWPORT_WIDTHS` to `[320, 360, 370, 375, 390, 768, 1024, 1440]` and check the `setTimeout` budget (`siteUrls.length * VIEWPORT_WIDTHS.length * 800`) still covers two evaluations per step; raise the per-step figure if needed and comment why
- [X] T015 [P] [US3] In `playwright.config.ts`, add `/standing\/responsive-overflow\.spec\.ts$/` to `MOBILE_STANDING_SPECS` and update the comment above it to mention the extra discovery run this adds on Mobile Chrome
- [ ] T016 [US3] First locate the URL hosting each of the six patterns and fill the table in [quickstart.md](./quickstart.md) section 3 (use `SINGLE_PAGE_URL` per page, never a full discovery run). Then verify with `ls-buttons-wrap` removed: at 320px, findings cover Split CTA check card, Services hero, Homepage CTA, Phase CTA, Homepage Why LightSpeed and Home hero static. Map each reported heading to its file under `patterns/` and record the mapping in the PR (research R-4) *(Not done: the 120-page sweep with the fix simulated as removed found Homepage CTA, Home hero, Why LightSpeed and Services hero sections, but not the Split CTA check card or Phase CTA pages; their URLs are still to locate.)*
- [ ] T017 [US3] Verify `/free-consultation/` with the fix present passes on `chromium`, `webkit` and `Mobile Chrome` in light mode, then after you switch the site to Dark, in dark mode (quickstart section 1). Check 768, 1024 and 1440 on Mobile Chrome for emulation differences (research R-5) and report any rather than skipping them *(Partly done: passes in light mode on chromium, webkit and Mobile Chrome. Dark mode is waiting for you to switch the site to Dark.)*

**Checkpoint**: Full width and browser matrix covered.

---

## Phase 6: User Story 4 - Safe to run for one-off checks and free of false alarms (Priority: P2)

**Goal**: No BugHerd tasks on single-page runs; hidden elements and the mobile menu never cause failures.

**Independent Test**: Single-page run on a clean page passes with the menu closed and creates no BugHerd task.

- [X] T018 [US4] Confirm in `tests/helpers/responsive.ts` that the `.mobile-menu` and zero-size exclusions added in T003 are in place and commented; add a check on a page with the menu closed that no menu button is reported *(Done: no menu button reported on any page checked.)*
- [X] T019 [US4] Check whether any button sits in the menu drawer's outer wrapper but outside `.mobile-menu` (research R-3 risk) by inspecting `parts/mobile-menu.html` and `patterns/header.php`; if one does, widen the exclusion in `tests/helpers/responsive.ts` to that wrapper's selector *(Done: no button outside `.mobile-menu` in the drawer wrapper was reported on any of the 120 pages checked.)*
- [X] T020 [US4] Confirm the spec does not change how `SINGLE_PAGE_URL` flows through `tests/fixtures/site.ts` and that `tests/reporters/bugherd-reporter.ts` still returns early for it; no code change is expected
- [ ] T021 [US4] Verify per [quickstart.md](./quickstart.md) sections 4-5: closed menu and hidden buttons cause no failure on a page with no real overflow, and no new BugHerd task appears after the single-page runs *(Partly done: no false failures from the closed menu or hidden buttons across 120 pages, and `bugherd-reporter.spec.ts` confirms single-page runs collect nothing. BugHerd itself has not been inspected.)*

**Checkpoint**: No false failures and no tracker noise from one-off runs.

---

## Phase 7: User Story 5 - Documented for the team (Priority: P3)

**Goal**: README and CHANGELOG describe the new check.

**Independent Test**: A reader finds the check, widths, what it flags and single-page usage in the README.

- [X] T022 [P] [US5] In `README.md` Testing section, document the element-level overflow check: what it flags (left/right overflow past the viewport, button row or bordered/backgrounded panel by more than 1px), the eight widths, the exclusions (zero-size elements, `.mobile-menu`), the failure fields, that text clipping and vertical overflow are not covered, and that single-page runs create no BugHerd tasks. Update the project table row for `Mobile Chrome` to include the responsive-overflow spec, and mention re-running against a Dark site for dark mode
- [X] T023 [P] [US5] In `CHANGELOG.md`, add an entry under `## [Unreleased]` for this PR in the existing per-PR style (heading, `### Added`, PR link placeholder to fill when the PR exists)

**Checkpoint**: Documentation matches the behaviour.

---

## Phase 8: Polish & Cross-Cutting Concerns

- [X] T024 Run `npm run theme:validate` as a regression guard (no PHP/JSON changed, so `patterns:escape`, `schema:validate` and `security:scan` are not triggered) *(Done: ran with warnings; no theme files were changed.)*
- [X] T025 Run `npx playwright test navigation special-routes --project=chromium` and confirm results are unchanged, proving `expectNoHorizontalOverflow` callers are unaffected *(Done: navigation and special-routes pass. `keyboard-navigation` fails on DEV with or without these changes.)*
- [X] T026 Confirm `git status` shows only the files listed in plan.md Source Code plus the `specs/003-button-overflow-coverage/` folder, and that any temporary `ls-buttons-wrap` revert has been undone and not committed *(Done: only the planned files changed, plus `tests/specs/bugherd-reporter.spec.ts` from T012; no temporary files or CSS reverts remain.)*
- [ ] T027 Fill the PR description with the quickstart results and the pattern-to-heading mapping from T016; leave manual-QA items unchecked unless actually run (per repo PR rules)

---

## Dependencies & Execution Order

- Phase 1 -> Phase 2 -> Phase 3 (US1) -> Phase 4 (US2). US1 and US2 both edit `tests/helpers/responsive.ts`, so they run in order.
- US3 can start after US1's T007: T014 and T015 touch different files and can run together ([P] applies to T015 only because T014 shares the spec file with T007).
- The `.mobile-menu` exclusion is part of T003, so it exists before any verification. US4's T018-T019 are confirmation and the wrapper check (T019 may edit `tests/helpers/responsive.ts`); run them after US2. T020-T021 are checks.
- US5 (T022, T023) touches only docs and can run any time after behaviour is settled, in parallel with each other.
- Polish last.

### Parallel Opportunities

- T002 alongside T001.
- T015 alongside T014.
- T022 alongside T023.

## Implementation Strategy

- **MVP**: Phases 1-3 (T001-T008). The check detects the `/free-consultation/` regression at 370px, and the existing suite is untouched.
- **Increment 2**: US2 (readable, groupable failures), then US3 (full widths and Mobile Chrome), then US4 (exclusions verified), then US5 (docs).
- Verification tasks that need the site switched to Dark or `ls-buttons-wrap` removed are run by the maintainer; none of that state is committed.
