# Quickstart: Validating the Open PR Skill

A runnable guide to prove the feature works end-to-end. This is a validation guide, not the implementation itself — see `contracts/open-pr-invocation.md` for the exact guarantees being checked and `data-model.md` for the fields referenced below.

## Prerequisites

- The skill file exists at `.claude/skills/open-pr/SKILL.md` in this repository.
- `gh` CLI is authenticated against `lightspeedwp/ls-theme`.
- A branch exists with committed, pushed changes, named per the approved convention (e.g. `feat/example-validation-run`).
- `.github/PULL_REQUEST_TEMPLATE/config.yml` and its template files are present (already true in this repo as of a prior change).

## Scenario 1 — Explicit invocation creates a compliant PR (User Story 1)

1. On the prepared branch, run `/open-pr`.
2. Expected: a PR is opened in one action, with:
   - Base branch correct for the branch's type (`develop` unless it's `hotfix/`/release)
   - Title/body following the org template matched by `config.yml` for this branch's prefix
   - Exactly one of `meta:needs-changelog` / `meta:no-changelog` applied
   - Assignee set to `brandonmarshal`
3. Verify: `gh pr view <number> --json labels,assignees,baseRefName` shows all of the above in a single existing PR — not added in a follow-up edit.

## Scenario 2 — Re-running against the same branch updates instead of duplicating (User Story 2)

1. Push an additional commit to the same branch.
2. Run `/open-pr` again.
3. Expected: `gh pr list --head <branch>` still shows exactly one PR; its body reflects the new commit; any test-plan checkboxes are refreshed, not left stale.

## Scenario 3 — Oversized change is flagged (Review Budget)

1. On a branch whose diff exceeds ~25 files or ~800 lines, run `/open-pr`.
2. Expected: the resulting PR body explicitly notes the size and recommends a stacked PR set or a documented maintainer exception — it is not opened silently as a normal-sized PR.

## Scenario 4 — Stacked PR carries position/dependency info (User Story 3)

1. Open two related PRs in sequence representing a two-layer stack, using the natural-language or explicit trigger with stack context provided.
2. Expected: each PR body includes a `## Stack` section (position, issue/epic, dependencies, review scope); only the final layer uses a closing reference (`Closes`/`Fixes`/`Resolves`) to the originating issue — the first layer uses `Relates to`/`Part of`.

## Scenario 5 — Draft PR skips ready-for-review actions (User Story 4)

1. Request a draft PR on a branch with a partial diff.
2. Expected: the PR is created as a draft; no reviewer request, CI-confirmation, or review-status label is applied until the user explicitly asks for it to be marked ready.

## Scenario 6 — Natural-language invocation confirms before acting

1. Instead of `/open-pr`, ask in natural language: "create the PR for me."
2. Expected: the skill asks you to confirm the branch and base before creating anything — it does not act on the assumption silently.

## Scenario 7 — Missing Linear/Asana link tool warns, doesn't block

1. In a session/environment with no Linear/Asana integration tool available, mark a PR ready for review.
2. Expected: the skill still completes (CI check, reviewer request, review-status label all still applied), but explicitly notes that linking the work item needs to be done manually.

## Pass/fail

All seven scenarios passing constitutes this feature working end-to-end. Any scenario the skill can't yet satisfy should become a `tasks.md` item during `/speckit-tasks`.
