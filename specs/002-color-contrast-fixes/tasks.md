---

description: "Task list for LS-2934 color-contrast accessibility fixes"
---

# Tasks: Fix WCAG Color-Contrast Accessibility Violations (LS-2934)

**Input**: Design documents from `/specs/002-color-contrast-fixes/`

**Prerequisites**: plan.md, spec.md, research.md, data-model.md, quickstart.md (all present; no `contracts/` — no external interface)

**Tests**: Not requested as new test code in the spec — verification reuses the existing `tests/specs/standing/accessibility.spec.ts` in scoped `SINGLE_PAGE_URL` mode. No new test files are created; running that spec is captured as verification tasks within each user story.

**Organization**: Tasks are grouped by user story (US1 = P1 caption fix, US2 = P2 filter-pill fix) so each can be implemented, verified, and shipped independently, per spec.md.

## Path Conventions

Single WordPress theme repository, no frontend/backend split. All paths are relative to `wp-content/themes/ls-theme/`.

---

## Phase 1: Setup

**Purpose**: Confirm the working environment before making changes — no new dependencies or scaffolding required for this feature.

- [X] T001 Confirm current branch is `fix/ls-2934-accessibility-color-contrast-fixes` and working tree is clean (`git status`)
- [X] T002 Confirm `.env` contains `BASE_URL=https://ls-agency.lightspeedwp.dev` (required for later verification steps)

**Checkpoint**: Environment confirmed — no foundational/blocking work needed since both user stories touch entirely separate files with no shared new infrastructure.

---

## Phase 2: Foundational

*None required.* Research (research.md) confirmed both fixes reuse existing, already-parity-checked color tokens (`--text--on-dark-muted`, `--text--on-light`) — no new token creation, no shared setup step blocks either story. Proceed directly to Phase 3.

**Note on spec FR-004**: FR-004 ("any new color token introduced MUST define both light-mode and dark-mode values") has no associated task in this file by design, not oversight — research.md Unknowns 1–2 confirm no new token is introduced by either fix, so FR-004 is not triggered.

---

## Phase 3: User Story 1 - Readable image captions on dark-background posts (Priority: P1) 🎯 MVP

**Goal**: Image captions on posts using the theme's dark-background style meet WCAG AA 4.5:1 text contrast (spec FR-001), using the existing `--wp--custom--color--text--on-dark-muted` token (research.md Unknown 1), without affecting light-background captions (FR-006).

**Independent Test**: Load any of the 3 affected posts on DEV, run the scoped accessibility spec against that single URL, and confirm zero serious/critical `color-contrast` violations for caption elements — verifiable and shippable without touching User Story 2.

### Implementation for User Story 1

- [X] T003 [US1] Create new SCSS partial `src/scss/structural/image-captions.scss` with a `.wp-element-caption` (and `figcaption`) color rule using `var(--wp--custom--color--text--on-dark-muted)`, applied unconditionally (no dark/light scoping selector), consistent with the existing unscoped pattern already used by `taxonomy-filter.scss` for `--text--on-dark` tokens — this theme applies one active global style (`theme.json` or `styles/dark.json`) sitewide rather than mixing light/dark per post (per data-model.md "Color Token: `--wp--custom--color--text--on-dark-muted`" and "Markup Entity: Image Caption"); add the required `// JSON limitation: ...` comment per Constitution Principle I since this is a plain color rule living in SCSS rather than `theme.json`/`styles/**/*.json`
- [X] T004 [US1] Register the new partial as its own `src:dest` pair (`src/scss/structural/image-captions.scss:assets/css/image-captions.css`) in all three `package.json` scripts: `build:css`, `build:css:dev`, `watch:css`
- [X] T005 [US1] Run `npm run build:css` and confirm `assets/css/image-captions.css` is generated with no Sass errors
- [X] T006 [US1] [P] Enqueue `assets/css/image-captions.css` on the frontend, following the existing pattern used for sibling structural CSS files in `inc/animations.php` (see `taxonomy-filter.css` entry at inc/animations.php:223 for the pattern to mirror)
- [X] T007 [US1] [P] Register `assets/css/image-captions.css` via `add_editor_style()` in `functions.php`, following the existing pattern for sibling structural CSS files (see `functions.php:67` for the pattern to mirror), so the caption fix is visible in the block editor too
- [X] T008 [US1] Run `npm run schema:validate`, `npm run theme:validate`, `npm run lint:json`, `php -l`, and `phpcs --standard=WordPress` against the changed PHP files (`inc/animations.php`, `functions.php`) — all five MUST pass, per Constitution Principle VI ("all changed PHP MUST pass `phpcs --standard=WordPress`"); do NOT use the banned `validate_blocks` tool. RESULT: schema:validate, lint:json, php -l, and phpcs on `inc/animations.php` all pass clean; phpcs on `functions.php` reports 20 pre-existing errors in unrelated commented-out code (lines 109-122, untouched by this change) — out of scope for this fix; `theme:validate` fails only on a pre-existing, unrelated repo gap (`styles/light.json` has never existed, confirmed via git history) — not caused by or related to this feature
- [ ] T009 [US1] Verify: run `SINGLE_PAGE_URL="https://ls-agency.lightspeedwp.dev/lightspeed-remote-workspaces-2016/" npx playwright test accessibility --project=chromium --reporter=line` against DEV and confirm zero serious/critical `color-contrast` violations. DEFERRED: attempted on 2026-09-18, still fails because DEV serves the currently-deployed theme, not this local branch — user has decided to re-run this after the PR is merged and deployed, not before
- [ ] T010 [US1] Verify: run `SINGLE_PAGE_URL="https://ls-agency.lightspeedwp.dev/lsx-version-1-3-0-released/" npx playwright test accessibility --project=chromium --reporter=line` against DEV and confirm zero serious/critical `color-contrast` violations. DEFERRED: same reason as T009 — re-run post-merge
- [ ] T011 [US1] Verify: run `SINGLE_PAGE_URL="https://ls-agency.lightspeedwp.dev/lsx-version-1-2-5-released/" npx playwright test accessibility --project=chromium --reporter=line` against DEV and confirm zero serious/critical `color-contrast` violations. DEFERRED: same reason as T009 — re-run post-merge
- [ ] T012 [US1] Manual regression check (spec FR-006, FR-005): if a post using a non-dark local background exists on DEV, confirm caption text rendering is visually unchanged there. If none exists, confirm instead that the new rule is unconditional/global (matching `taxonomy-filter.scss`'s pattern) so it would apply correctly if the site's global style were ever switched to light. Also confirm caption layout, spacing, and positioning are pixel-identical to before the change (only the `color` property should differ)

**Checkpoint**: User Story 1 is fully functional, verified independently across all 3 originally-flagged dark-background posts, and confirmed not to regress light-background captions.

---

## Phase 4: User Story 2 - Readable active filter state on the blog page (Priority: P2)

**Goal**: The active/selected taxonomy filter pill on `/blog/` meets WCAG AA 4.5:1 text contrast (spec FR-002), by swapping its text color to the existing `--wp--custom--color--text--on-light` token (research.md Unknown 2), without affecting default/hover pill states (FR-006).

**Independent Test**: Load `/blog/` on DEV, run the scoped accessibility spec against that single URL, and confirm zero serious/critical `color-contrast` violations for the filter pill — verifiable and shippable independently of User Story 1.

### Implementation for User Story 2

- [X] T013 [US2] In `src/scss/structural/taxonomy-filter.scss`, change the `color` declaration on `.taxonomy-filter-current` (currently `var(--wp--custom--color--text--on-dark)`) to `var(--wp--custom--color--text--on-light)` — no other property on this selector changes (per data-model.md "Markup Entity: Taxonomy Filter Pill"). NOTE: also updated the identical `color` declaration inside `.taxonomy-filter-current:hover, &:focus-visible` (same active-pill state re-asserting its own colors against the generic `.wp-element-button:hover` rule) — left unfixed, hovering the active pill would have visibly reverted to the failing color
- [X] T014 [US2] Run `npm run build:css` and confirm `assets/css/taxonomy-filter.css` is regenerated with the updated color value
- [X] T015 [US2] Run `npm run schema:validate`, `npm run theme:validate`, and `npm run lint:json` — all three MUST pass. RESULT: schema:validate and lint:json pass; theme:validate fails only on the same pre-existing, unrelated `styles/light.json` gap noted in T008
- [X] T016 [US2] Verify: run `SINGLE_PAGE_URL="https://ls-agency.lightspeedwp.dev/blog/" npx playwright test accessibility --project=chromium --reporter=line` against DEV and confirm zero serious/critical `color-contrast` violations. ADAPTED: DEV verification deferred until post-merge (see T009-T011); ran instead against `http://localhost:8882/blog/` (this exact URL exists locally, unlike the 3 caption URLs) — **1 passed**, zero serious/critical color-contrast violations
- [X] T017 [US2] Manual regression check (spec FR-006, FR-005): on `/blog/` (localhost:8882, since DEV isn't updated yet), confirm the default (non-active) filter pill state and the hover state are both visually unchanged, and that the active pill's background color is unchanged (only its text color differs). Also confirm pill layout, spacing, and positioning are pixel-identical to before the change. RESULT: visually confirmed via browser — active "All" pill now shows dark text on blue (legible), hovering a non-active pill ("Accessibility") shows unchanged accent border/text hover state, no layout shift

**Checkpoint**: User Stories 1 AND 2 both verified independently on DEV; all 4 originally-flagged URLs now pass.

---

## Phase 5: Polish & Cross-Cutting Concerns

**Purpose**: Final combined validation and closing out the tracked task.

- [X] T018 Run `npm run build:css` once more with both fixes present together and diff `assets/css/` output to confirm only the expected 2 files changed plus the 1 new file (`git status`/`git diff --stat`). RESULT: confirmed — `assets/css/taxonomy-filter.css` modified, `assets/css/image-captions.css` new, no other compiled CSS changed
- [ ] T019 Run all four scoped verification commands from T009, T010, T011, T016 back-to-back in one pass as a final combined confirmation (still zero new BugHerd tasks, per the `SINGLE_PAGE_URL` structural guard in `tests/reporters/bugherd-reporter.ts`). PARTIAL: T016's equivalent (localhost `/blog/`) passed; T009-T011 (DEV, the 3 caption URLs) remain deferred until post-merge, per user decision — this task can't be fully completed until then
- [ ] T020 Follow quickstart.md Step 5: record the 4 verification results and update BugHerd task #231 to resolved, referencing this branch and the epic LS-2934. DEFERRED: user will re-run DEV verification after this PR is merged, then update BugHerd — not done as part of this implementation pass

---

## Dependencies & Execution Order

### Phase Dependencies

- **Setup (Phase 1)**: No dependencies — start immediately
- **Foundational (Phase 2)**: None — skipped, no blocking shared work exists for this feature
- **User Story 1 (Phase 3)**: Depends on Setup only; fully independent of User Story 2 (different files: `image-captions.scss` vs `taxonomy-filter.scss`)
- **User Story 2 (Phase 4)**: Depends on Setup only; fully independent of User Story 1
- **Polish (Phase 5)**: Depends on both User Story 1 and User Story 2 being complete

### Within Each User Story

- SCSS/token change before recompilation
- Recompilation before validation gates
- Validation gates before scoped verification test runs
- Verification test runs before manual regression check

### Parallel Opportunities

- T006 and T007 (frontend enqueue vs editor-style registration) touch different files/functions and can run in parallel once T005 (compiled CSS) is done
- User Story 1 (Phase 3) and User Story 2 (Phase 4) touch entirely separate SCSS files and can be implemented in parallel by different people, or sequentially in priority order (P1 then P2) by one person — both are valid given their full independence

---

## Parallel Example: User Story 1

```bash
# After T005 (npm run build:css) completes, these two can run in parallel:
Task: "Enqueue assets/css/image-captions.css in inc/animations.php, mirroring the taxonomy-filter.css pattern"
Task: "Register assets/css/image-captions.css via add_editor_style() in functions.php, mirroring the existing pattern"
```

---

## Implementation Strategy

### MVP First (User Story 1 Only)

1. Complete Phase 1: Setup
2. Complete Phase 3: User Story 1 (the higher-priority, higher-volume fix — 3 of 4 flagged URLs)
3. **STOP and VALIDATE**: Confirm T009–T012 all pass
4. This alone resolves the majority of BugHerd #231's flagged nodes and can ship independently if needed

### Incremental Delivery

1. Setup → Phase 3 (US1) → verify independently → optionally ship
2. Phase 4 (US2) → verify independently → optionally ship
3. Phase 5 (Polish) → final combined verification → close out BugHerd #231 and epic LS-2934

---

## Notes

- No `[P]` markers on most tasks within a story because SCSS edit → compile → validate → verify is a strict sequential chain per file; the only true parallel pair is T006/T007 (two different PHP registration points for the same already-compiled CSS file).
- Every verification task explicitly uses `SINGLE_PAGE_URL` against DEV, per the earlier agreed testing method — this is structurally guaranteed (not just convention) to never create a new BugHerd task, per `tests/reporters/bugherd-reporter.ts`.
- Do not run the full/unscoped standing suite as part of this feature's tasks — out of scope per spec.md.
- Do not use the `validate_blocks` tool at any point (banned per Constitution Principle VI).
