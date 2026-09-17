# Feature Specification: Open PR Skill

**Feature Branch**: `feature/ls-3223-aiops-openspec-plan-new-skills`

**Created**: 2026-09-17

**Status**: Draft

**Input**: User description: "An agent skill (`open-pr`) that creates and updates pull requests for the current branch in the `ls-theme` repository, callable both via an explicit `/open-pr` command and via natural-language requests like 'create the PR for me' or 'get this ready for review.' ... [full LightSpeed Pull Request Creation Workflow requirements, see conversation history]"

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Open a new PR from a finished branch (Priority: P1)

A contributor has finished work on a branch and wants a pull request opened that accurately reflects what changed, targets the correct base branch, and carries the labels, assignee, and changelog decision required by team convention — without having to manually reconstruct that context or remember every required field.

**Why this priority**: This is the core value of the skill — every other capability (updating, stacking, drafts) is a variation on this baseline action. Without it, the skill delivers nothing.

**Independent Test**: Can be fully tested by running the skill on a real branch with committed, pushed changes and confirming a PR is opened with the correct base, an accurate description of the change, an assignee, and exactly one changelog-decision indicator — deliverable and demonstrable on its own.

**Acceptance Scenarios**:

1. **Given** a branch with committed, pushed changes and no existing open PR, **When** the skill is run, **Then** a PR is opened against the correct base branch with a title and description derived from the branch's own commits and diff, an assignee, and exactly one changelog-decision label.
2. **Given** a branch whose name doesn't follow the approved naming convention, **When** the skill is run, **Then** the mismatch is flagged to the user before a PR is created, rather than silently proceeding.
3. **Given** a branch whose change exceeds the preferred review-size guidance, **When** the skill is run, **Then** the resulting PR clearly notes that it exceeds the preferred size and that it should either be split or have a documented exception.

---

### User Story 2 - Update an existing PR instead of duplicating it (Priority: P2)

A contributor has pushed additional commits to a branch that already has an open PR, and wants the PR's description and metadata refreshed to reflect the current state of the branch — without losing parts of the existing description that are still accurate, and without ending up with two PRs for the same branch.

**Why this priority**: Branches are iterated on more often than they're opened fresh; without this, every re-run after User Story 1 would either duplicate PRs or require manual editing, undermining the skill's core promise.

**Independent Test**: Can be fully tested by running the skill twice against the same branch (once to create, once after adding commits) and confirming the second run updates the original PR in place, preserving accurate prior content and refreshing only what changed.

**Acceptance Scenarios**:

1. **Given** a branch that already has an open PR, **When** the skill is run again, **Then** the existing PR is updated rather than a new one being created.
2. **Given** an existing PR missing its assignee, labels, or changelog-decision indicator, **When** the skill updates it, **Then** those are backfilled immediately rather than left for a later pass.

---

### User Story 3 - Coordinate a stacked set of PRs (Priority: P3)

A contributor is delivering a large change as multiple dependent, independently-reviewable PRs (a "stack"), and wants each PR to clearly show its position in the stack, its dependencies, and to close the originating issue only once the full stack lands — not on an intermediate layer.

**Why this priority**: This only matters once a change is too large for a single PR (see User Story 1's size guidance); it extends the core flow rather than replacing it, so it's valuable but not required for the skill's baseline usefulness.

**Independent Test**: Can be fully tested by opening two or more related PRs in sequence and confirming each correctly states its stack position/dependencies, and that only the final layer uses a closing reference to the originating issue.

**Acceptance Scenarios**:

1. **Given** a PR that is one layer of a multi-layer stacked change, **When** it is opened, **Then** its description states its position, the issue/epic it belongs to, its dependencies, and its own review scope — and it references the issue with a non-closing phrase.
2. **Given** a PR that is the final layer completing the originating issue, **When** it is opened, **Then** it uses a closing reference so the issue resolves only once that layer merges.

---

### User Story 4 - Open early as a draft for large or multi-day work (Priority: P4)

A contributor starting large or multi-day work wants to open a PR early, once there's a useful initial diff, to surface architecture decisions and scope problems early — without that draft being treated as a formal request for review.

**Why this priority**: A refinement on top of User Story 1 for a specific working style; valuable for larger work but not needed for the common case of a finished, ready-to-review change.

**Independent Test**: Can be fully tested by requesting a draft PR on a branch with a partial diff and confirming it's marked as a draft and does not trigger the ready-for-review steps (CI confirmation, reviewer request, status labelling) until explicitly marked ready later.

**Acceptance Scenarios**:

1. **Given** a request to open a draft PR, **When** the skill runs, **Then** the PR is opened as a draft and the ready-for-review steps are skipped until the user explicitly asks for it to be marked ready.
2. **Given** a draft PR that later needs substantial rework after review has already started on a non-draft PR, **When** this is detected, **Then** the user is prompted about returning it to draft rather than the skill deciding unprompted.

### Edge Cases

- What happens when the branch is `hotfix/` or a release branch rather than normal development work? The correct base branch is `main`, not the repository's general default branch, and a follow-up sync back to `develop` must be flagged rather than silently assumed complete.
- What happens when the current branch name doesn't match any known type-prefix convention, including deliberately-disallowed tool-specific prefixes (e.g. `claude/`)? The mismatch must be surfaced to the user, not silently ignored.
- What happens when this repository has no PR template configuration at all? The skill falls back to a standard description structure rather than failing.
- What happens when a suggested label (from a template's own defaults) doesn't actually exist in the repository's real label set? The skill must not invent it — it proceeds without that specific label rather than creating one.
- What happens when the skill is invoked by a vague natural-language request rather than an explicit command? It must confirm the intended branch and base with the user before creating or changing anything, rather than acting on an assumption.
- What happens when a lower layer of a stacked PR set needs a fix after a higher layer has already been reviewed? The fix must land in the owning (lower) layer, with the higher layer updated afterward — not patched around from the higher layer.
- What happens when a reviewer requests changes? Every review thread must eventually receive a reply; fixes must not be pushed silently without addressing the thread that prompted them.

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: The skill MUST derive all pull request content (what changed, why, and any related ticket) from the branch's own commit history and diff, without relying on assumed context from prior conversation.
- **FR-002**: The skill MUST NOT create branches, and MUST NOT commit or push changes unrelated to the pull request itself, with the sole exception of a changelog update committed after the pull request already exists.
- **FR-003**: The skill MUST determine the correct base branch according to branch type: standard development branches target the repository's normal integration branch; a hotfix or release branch targets the production branch instead, with any required post-merge synchronization flagged as a manual follow-up rather than performed automatically.
- **FR-004**: The skill MUST verify the current branch name follows the organization's approved naming convention, and MUST flag a mismatch to the user rather than proceeding silently — including explicitly rejecting tool-specific branch-name prefixes.
- **FR-005**: The skill MUST check for an already-open pull request on the current branch before creating a new one, updating the existing one instead of creating a duplicate.
- **FR-006**: The skill MUST calculate the size of the change (files and lines meaningfully subject to review, excluding generated/compiled/lock/snapshot/translation content) and flag when that size exceeds the organization's preferred review-size guidance, escalating to a stronger flag (recommending a stacked set of PRs or a documented exception) beyond a larger threshold.
- **FR-007**: The skill MUST perform a self-review pass before drafting the pull request, confirming: the full diff (not only individual commits) has been considered; the change remains one coherent, reviewable outcome; it is within the review-size guidance or has a documented exception; applicable automated checks (lint, unit, build, and any others this repository defines) have been run; debugging or unrelated formatting changes have been removed; and, where the repository has automated AI code review enabled, its findings have been considered and responded to.
- **FR-008**: The skill MUST hold the accessibility bar for this self-review at WCAG 2.2 AA, taking this figure as authoritative even where other repository documentation states an older accessibility standard.
- **FR-009**: Where this repository defines a pull-request-template routing configuration, the skill MUST use it to select the correct template for the current branch, and MUST follow that template's own structure (title format, section order, and checklist) rather than substituting a different structure.
- **FR-010**: Where a selected template's own suggested labels do not exist in the repository's actual label set, the skill MUST NOT create or invent them — it proceeds using only labels that genuinely exist.
- **FR-011**: Where no pull-request-template configuration exists in the repository, the skill MUST fall back to a standard description structure covering: a plain-English summary, grouped subsections of what changed, anything deliberately investigated but not changed, scope and exclusions, visual evidence for user-facing changes, accessibility/performance/backward-compatibility notes where relevant, an optional stack section, a testing summary reflecting only what was genuinely verified, and a stated changelog decision.
- **FR-012**: The skill MUST set the assignee and all applicable labels — including exactly one changelog-decision indicator (needs an entry vs. does not) — as part of the same action that creates or updates the pull request, never as a separate follow-up step.
- **FR-013**: The skill MUST add a changelog entry, linked back to the pull request, only after the pull request exists, and only when the changelog-decision indicator states one is required; it must never add that entry beforehand, and must never add one when the indicator says none is needed.
- **FR-014**: For a pull request that is one layer of a coordinated, multi-layer ("stacked") set, the skill MUST record that PR's position, the issue/epic it belongs to, its dependencies, and its specific review scope, and MUST use a non-closing reference to the originating issue on every layer except the one that actually completes the work.
- **FR-015**: The skill MUST support opening a pull request as a draft for larger or multi-day work, and MUST NOT perform ready-for-review actions (confirming required checks, requesting a reviewer, applying a review-status indicator) while the pull request remains a draft.
- **FR-016**: When explicitly marking a pull request ready for review, the skill MUST confirm required automated checks are passing, request an appropriate reviewer, apply the appropriate review-status indicator, and link back to the originating tracked work item, noting that the work item should move to an in-review state.
- **FR-017**: When updating an existing pull request, the skill MUST read its current description first, preserve any part that remains accurate, and rewrite only what has gone stale — including refreshing what has and hasn't actually been verified.
- **FR-018**: Once a pull request is under review, the skill's guidance MUST require a reply to every review thread rather than a silent fix, and MUST require that a fix for a defect belonging to a lower layer of a stacked set be made in that owning layer, with layers above it updated afterward — never worked around from a higher layer.
- **FR-019**: The skill MUST be usable both via an explicit, unambiguous invocation and via a natural-language request describing the same intent; for the latter, it MUST confirm the intended branch and base with the user before creating or changing anything.
- **FR-020**: The skill MUST never fabricate verification results, metrics, or checks that were not genuinely performed, and MUST never attribute the description of a change to anyone other than the branch's actual author.

### Key Entities

- **Pull Request**: The reviewable unit this skill creates or updates — has a title, base branch, description, labels (including exactly one changelog-decision indicator), an assignee, and a draft/ready state.
- **Branch**: The unit of work the pull request represents — has a name (encoding its type/scope), a commit history, and a diff against its base.
- **PR Template**: An organization-defined structure (title format, sections, checklist) that a pull request should follow when one is configured for the repository, selected according to the branch's type.
- **Stack**: A coordinated, ordered set of pull requests representing one larger change split into independently reviewable layers, where each member records its position and dependencies relative to the others.
- **Changelog Entry**: A user-facing record of a change, linked to its pull request, added only when the pull request's changelog-decision indicator requires one.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: A contributor can go from "branch is ready" to "pull request opened with correct base, description, assignee, and labels" without manually re-deriving any of that information themselves.
- **SC-002**: 100% of pull requests opened or updated by this skill carry an assignee and exactly one changelog-decision indicator — none are left with zero or with both.
- **SC-003**: 0% of pull requests opened by this skill target the wrong base branch for hotfix/release work.
- **SC-004**: 100% of oversized changes (beyond the organization's stronger size threshold) are clearly flagged as needing a stack or a documented exception, rather than silently opened as a single oversized pull request.
- **SC-005**: A reviewer opening any pull request produced by this skill can determine, without asking the author, whether it's part of a larger stack and — if so — its position and dependencies.
- **SC-006**: When a natural-language request is used instead of the explicit command, the user is asked to confirm branch and base before anything is created, in 100% of such invocations.
- **SC-007**: A changelog entry never appears for a pull request before that pull request exists, and never appears at all when the changelog-decision indicator states one isn't needed.

## Assumptions

- This repository does not currently define a constitutional principle governing branch/PR/changelog conventions (the merged-in project constitution covers styling, reuse, tokens, core blocks, accessibility/security, validation, and PHP discipline, but not this area) — this feature's requirements are instead sourced directly from the LightSpeedWP organization's Pull Request Creation Workflow documentation and the organization's shared PR-template repository, both authoritative outside this repository's own constitution.
- Where this repository's own contributor documentation states an older accessibility standard than WCAG 2.2 AA, the newer organization-wide figure takes precedence for this feature specifically; reconciling that repository documentation itself is out of scope for this feature.
- "Natural-language invocation" is assumed to mean any request that expresses the intent to open, update, or prepare a pull request without using the feature's explicit, unambiguous command form.
- The organization's pull-request-template routing configuration and template files are assumed to already exist within the repository (not fetched from elsewhere at run time) so that this feature has no external network dependency during normal operation.
- Creating any missing labels this feature depends on (such as the changelog-decision indicators) is assumed to be a one-time repository setup concern, not an action this feature performs itself.
