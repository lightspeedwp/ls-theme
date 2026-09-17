---

description: "Task list for the open-pr skill implementation"
---

# Tasks: Open PR Skill

**Input**: Design documents from `/specs/002-open-pr-skill/`

**Prerequisites**: plan.md, spec.md, research.md, data-model.md, contracts/open-pr-invocation.md, quickstart.md — all present.

**Tests**: Not requested for this feature. Verification instead uses the 7 live scenarios in `quickstart.md` (running the actual skill against real branches/PRs), since there is no unit-test framework applicable to a Markdown instruction file.

**Organization**: Tasks are grouped by user story (from spec.md) to enable independent implementation and testing of each story. All implementation tasks target the same single file, `.claude/skills/open-pr/SKILL.md` — noted explicitly where this constrains parallelism.

**Context found while planning**: `.claude/skills/open-pr/SKILL.md` already exists on this branch (built earlier via the OpenSpec workflow, before this feature switched planning tools to Spec Kit), but its content predates every LightSpeed-doc/org-template refinement made afterward to the validated personal command file. The tasks below **sync** `SKILL.md` to match that finalized content — this is an update, not a from-scratch build.

## Format: `[ID] [P?] [Story] Description`

- **[P]**: Can run in parallel (different files, or independent read-only verification with no conflicting edit)
- **[Story]**: Which user story this task belongs to (e.g., US1, US2, US3, US4)
- Include exact file paths in descriptions

## Phase 1: Setup

**Purpose**: Confirm the skill's scaffolding is in place before syncing content.

- [ ] T001 Verify `.claude/skills/open-pr/SKILL.md` frontmatter matches spec: `name: open-pr`, and a `description` covering both explicit and natural-language trigger phrasing per FR-019, under the 1024-character agentskills.io limit.

---

## Phase 2: Foundational (Blocking Prerequisites)

**Purpose**: Core content every user story depends on — context gathering, pre-flight checks, and base-branch/naming logic. No user story's PR can be created or updated correctly until this phase is synced.

**⚠️ CRITICAL**: No user story work can begin until this phase is complete.

- [ ] T002 Sync "Step 1: Gather context from the branch itself" (commit/diff/ticket derivation, FR-001) into `.claude/skills/open-pr/SKILL.md`.
- [ ] T003 Sync Step 2 pre-flight checks 1-4, 6-7 (branch/push state, existing-PR check, merged-PR convention check, real label set, changelog-requirement check, lint/test run per FR-005, FR-020) into `.claude/skills/open-pr/SKILL.md`.
- [ ] T004 Sync the branch-type base-branch logic (Step 2.5: `develop` for normal work, `main` for hotfix/release with sync-back flagged, per FR-003 and data-model.md's Branch entity) into `.claude/skills/open-pr/SKILL.md`.
- [ ] T005 Sync branch-naming validation including the stacked-layer-prefix rule (Step 2.8, per FR-004) into `.claude/skills/open-pr/SKILL.md`.

**Checkpoint**: Foundation ready — user story sections can now be synced.

---

## Phase 3: User Story 1 - Open a new PR from a finished branch (Priority: P1) 🎯 MVP

**Goal**: Running the skill on a finished, pushed branch produces a correctly-based, correctly-labeled, correctly-assigned PR in one action.

**Independent Test**: Run the skill on a real branch with committed, pushed changes and confirm a PR is opened with the correct base, an accurate description, an assignee, and exactly one changelog-decision label (quickstart.md Scenario 1).

### Implementation for User Story 1

- [ ] T006 [US1] Sync the review-budget calculation and flagging thresholds (Step 2.9: ~15 files/~400 lines preferred, ~25 files/~800 lines requiring a stack or exception, per FR-006) into `.claude/skills/open-pr/SKILL.md`.
- [ ] T007 [US1] Sync the self-review gate (Step 2.10: coherent-outcome check, budget re-check, build checks, WCAG 2.2 AA, CodeRabbit/AI-review-findings check, per FR-007 and FR-008) into `.claude/skills/open-pr/SKILL.md`.
- [ ] T008 [US1] Sync the "Choosing a PR template" section (config.yml routing lookup, verbatim template structure, label-existence guard, per FR-009 and FR-010, and the PR Template entity in data-model.md) into `.claude/skills/open-pr/SKILL.md`.
- [ ] T009 [US1] Sync the fallback "PR structure" section — all 10 body sections including Scope and exclusions, Screenshots/video, a11y/perf/backcompat notes (per FR-011) — into `.claude/skills/open-pr/SKILL.md`.
- [ ] T010 [US1] Sync the "Creating the PR" section (labels + assignee + exactly one changelog-decision label in the same `gh pr create` call, per FR-012) into `.claude/skills/open-pr/SKILL.md`.
- [ ] T011 [US1] Sync the "Changelog — after the PR is created" section (gated on `meta:needs-changelog`, changelog-validation command, per FR-013) into `.claude/skills/open-pr/SKILL.md`.
- [ ] T012 [P] [US1] Run quickstart.md Scenario 1 (explicit invocation creates a compliant PR) against a real branch and confirm all fields per the "Create a new Pull Request" contract in contracts/open-pr-invocation.md.
- [ ] T013 [P] [US1] Run quickstart.md Scenario 3 (oversized change is flagged) against a branch exceeding the larger threshold.
- [ ] T014 [P] [US1] Run quickstart.md Scenario 6 (natural-language invocation confirms branch/base before acting, per FR-019) and confirm the invocation-guard wording already in `SKILL.md`'s header still matches this behavior.

**Checkpoint**: User Story 1 fully functional and testable independently — this is the MVP.

---

## Phase 4: User Story 2 - Update an existing PR instead of duplicating it (Priority: P2)

**Goal**: Re-running the skill against a branch that already has an open PR updates it in place rather than creating a duplicate, preserving accurate content and backfilling anything missing.

**Independent Test**: Run the skill twice against the same branch (create, then after adding commits) and confirm the second run updates the original PR (quickstart.md Scenario 2).

### Implementation for User Story 2

- [ ] T015 [US2] Sync the "Updating an existing PR" section (read current body first, preserve accurate content, rewrite only what's stale, refresh Test Plan checkboxes, backfill missing labels/assignee/changelog-decision label immediately, per FR-017) into `.claude/skills/open-pr/SKILL.md`.
- [ ] T016 [US2] Run quickstart.md Scenario 2 (re-run updates instead of duplicating) against a real branch with an existing open PR, confirming the "Update an existing Pull Request" contract in contracts/open-pr-invocation.md.

**Checkpoint**: User Stories 1 AND 2 both work independently.

---

## Phase 5: User Story 3 - Coordinate a stacked set of PRs (Priority: P3)

**Goal**: A PR that's one layer of a multi-layer stack correctly states its position/dependencies and uses the right issue-closing phrasing for its position in the stack.

**Independent Test**: Open two or more related PRs in sequence and confirm each correctly states its stack position/dependencies, with only the final layer using a closing reference (quickstart.md Scenario 4).

### Implementation for User Story 3

- [ ] T017 [US3] Sync the "Stack information" section — the `## Stack` template, the 5-PR-per-stack / split-under-an-epic rule, and the `Closes`/`Fixes`/`Resolves` vs. `Relates to`/`Part of` phrasing rule (per FR-014 and the Stack entity in data-model.md) — into `.claude/skills/open-pr/SKILL.md`.
- [ ] T018 [US3] Run quickstart.md Scenario 4 (stacked PR carries position/dependency info, correct closing phrasing) against two related PRs.

**Checkpoint**: User Stories 1, 2, and 3 all independently functional.

---

## Phase 6: User Story 4 - Open early as a draft for large or multi-day work (Priority: P4)

**Goal**: A PR opened as a draft skips ready-for-review actions until explicitly marked ready, and marking ready performs the full CI/reviewer/status/tracked-work-item sequence — warning rather than failing if work-item linking isn't available.

**Independent Test**: Request a draft PR on a branch with a partial diff and confirm ready-for-review steps are skipped until explicitly requested (quickstart.md Scenario 5).

### Implementation for User Story 4

- [ ] T019 [US4] Sync the "Draft PRs" section (draft creation for larger/multi-day work, skipping ready-for-review gating, stack draft sequencing — bottom layer ready first, "return to draft" trigger on substantial rework, per FR-015) into `.claude/skills/open-pr/SKILL.md`.
- [ ] T020 [US4] Sync the "Marking Ready for Review" section (CI confirmation, `gh pr ready`, reviewer request, `status:needs-review`, and the Linear/Asana link step that warns and continues rather than blocking when no tool is available, per FR-016 and the 2026-09-17 Clarification) into `.claude/skills/open-pr/SKILL.md`.
- [ ] T021 [P] [US4] Run quickstart.md Scenario 5 (draft PR skips ready-for-review actions) against a partial-diff branch.
- [ ] T022 [P] [US4] Run quickstart.md Scenario 7 (missing Linear/Asana tool warns, doesn't block) confirming the "Mark ready for review" contract in contracts/open-pr-invocation.md.

**Checkpoint**: All four user stories independently functional.

---

## Phase 7: Polish & Cross-Cutting Concerns

**Purpose**: Behavior that spans every user story rather than belonging to one, plus final consistency checks.

- [ ] T023 [P] Sync the "Responding to feedback" section (reply to every review thread, no silent pushes, stacked-PR fix-in-owning-layer + rebase-above, `--force-with-lease` only, per FR-018) into `.claude/skills/open-pr/SKILL.md`.
- [ ] T024 [P] Sync the full "What NOT to do" list, cross-checked against every FR in spec.md, into `.claude/skills/open-pr/SKILL.md`.
- [ ] T025 Update the location-note comment at the top of `.claude/skills/open-pr/SKILL.md` to reference `specs/002-open-pr-skill/research.md` (Decision: Skill location) instead of the now-removed `openspec/changes/open-pr-skill/design.md`.
- [ ] T026 Diff `.claude/skills/open-pr/SKILL.md` against the validated personal command (`~/.claude/commands/open-pr.md`) and confirm full content parity, accounting only for the skill-specific frontmatter and location-note additions.
- [ ] T027 Run all 7 quickstart.md scenarios as one final end-to-end pass.

---

## Dependencies & Execution Order

### Phase Dependencies

- **Setup (Phase 1)**: No dependencies — can start immediately.
- **Foundational (Phase 2)**: Depends on Setup — BLOCKS all user stories.
- **User Story 1 (Phase 3)**: Depends on Foundational. No dependency on other stories — this is the MVP.
- **User Story 2 (Phase 4)**: Depends on Foundational and, practically, on User Story 1's PR-creation content existing to have something to update — but is independently *testable* once synced.
- **User Story 3 (Phase 5)**: Depends on Foundational and User Story 1 (a stack layer is still a PR created via US1's logic, with additional stack fields).
- **User Story 4 (Phase 6)**: Depends on Foundational and User Story 1 (a draft is still created via US1's logic, with the ready-for-review gate added on top).
- **Polish (Phase 7)**: Depends on all four user stories being synced.

### Within Each Phase

- Sync tasks (editing `SKILL.md`) are sequential within a phase — they touch the same file and are ordered to match the section order the file already follows.
- Verification tasks (running quickstart scenarios) marked `[P]` within a phase can run in parallel with each other once that phase's sync tasks are done, since they're independent read/observe actions against different scenarios.

### Parallel Opportunities

- T012, T013, T014 (US1 verification) can run in parallel with each other after T006-T011 are synced.
- T021, T022 (US4 verification) can run in parallel with each other after T019-T020 are synced.
- T023, T024 (Polish sync tasks) touch distinct sections and can be done in parallel.

---

## Implementation Strategy

### MVP First (User Story 1 Only)

1. Complete Phase 1: Setup.
2. Complete Phase 2: Foundational (blocks everything else).
3. Complete Phase 3: User Story 1.
4. **STOP and VALIDATE**: Run quickstart.md Scenarios 1, 3, and 6 independently.
5. At this point, `.claude/skills/open-pr/SKILL.md` is fully synced for the single-PR happy path — the same milestone the earlier OpenSpec-driven build reached, now re-verified against the finalized LightSpeed-doc requirements.

### Incremental Delivery

1. Setup + Foundational → foundation ready.
2. Add User Story 1 → validate → this is the MVP (matches what PR #53 already needed).
3. Add User Story 2 → validate re-run/update behavior.
4. Add User Story 3 → validate stack behavior.
5. Add User Story 4 → validate draft/ready-for-review behavior.
6. Polish → cross-cutting sections + final full quickstart pass.

Each story adds a self-contained section of `SKILL.md` without requiring the others to be redone.
