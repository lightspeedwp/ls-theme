# Contract: `open-pr` Skill Invocation

This feature has no network API — its "interface" is the agent-invocation contract: what triggers it, what it guarantees on success, and what it must never do regardless of trigger.

## Trigger forms

| Form | Example | Pre-action requirement |
|---|---|---|
| Explicit command | `/open-pr` | None — proceeds directly (spec FR-019) |
| Natural-language request | "create the PR for me", "get this ready for review" | MUST confirm target branch and base with the user before creating or changing anything (FR-019) |

## Preconditions (checked before any PR is created or modified)

- Current branch is not `develop`/`main`, has commits ahead of base, and is pushed to `origin`.
- No existing open PR for this branch — if one exists, the "Update" contract below applies instead of "Create."
- Repository's real label set is known (via `gh label list`), not assumed.
- Correct base branch is known, by branch type (FR-003).

## Contract: Create a new Pull Request

**Given** the preconditions above are satisfied and no open PR exists for this branch,
**When** the skill runs,
**Then** it MUST produce, in one atomic action:

- A PR against the correct base branch (FR-003)
- Title and body derived from the branch's own commits/diff (FR-001), following the matched org template if one exists (FR-009) or the fallback structure otherwise (FR-011)
- An assignee and applicable labels, including exactly one changelog-decision label, set in that same action (FR-012)
- If the change exceeds review-size guidance: an explicit note in the PR body, and — beyond the larger threshold — a flag that this should be a stack or have a documented exception (spec, Review Budget)

**And must NOT**:
- Create a branch, or commit/push unrelated changes (FR-002)
- Fabricate verification results not actually run (FR-020)
- Apply a label absent from the repository's real label set (FR-010)

## Contract: Update an existing Pull Request

**Given** an open PR already exists for this branch,
**When** the skill runs,
**Then** it MUST:

- Read the current PR body first, preserving accurate content and rewriting only what's stale (FR-017)
- Backfill any missing labels, assignee, or changelog-decision label immediately (FR-017)
- Refresh the testing/verification summary to reflect what's true now

## Contract: Mark ready for review

**Given** a draft PR the user explicitly confirms is ready,
**When** the skill runs this step,
**Then** it MUST confirm required checks are passing, request a reviewer, and apply the review-status indicator (FR-016), and MUST attempt to link back to the originating tracked work item — warning (not failing) if no tool is available to do so (spec Clarifications, 2026-09-17).

## Contract: Changelog entry

**Given** a PR that requires a changelog entry (per its changelog-decision label),
**When** the skill adds one,
**Then** it MUST do so only after the PR already exists, linking back to it (FR-013) — and MUST NOT add one at all when the label states none is needed.
