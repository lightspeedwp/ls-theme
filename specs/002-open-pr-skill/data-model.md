# Phase 1 Data Model: Open PR Skill

This feature has no persistent storage or database — "entities" here are the conceptual objects the skill's instructions reason about, re-derived fresh from `git`/`gh` state on every invocation (per spec FR-001), not stored anywhere by the skill itself.

## Pull Request

The reviewable unit this skill creates or updates.

| Field | Description | Source / Validation Rule |
|---|---|---|
| `title` | Plain description of what the diff does, or the matched template's title format | Derived from branch commits/diff (FR-001); never fabricated (FR-020) |
| `base` | Target branch | `develop` for normal work, `main` for hotfix/release (FR-003) |
| `body` | Description content | Either the matched org template's structure, or the fallback structure (FR-009, FR-011) |
| `labels` | Set of applied labels | Must exist in the repo's real label set (FR-010); must include exactly one changelog-decision label (FR-012) |
| `assignee` | Responsible person | Fixed value (`brandonmarshal`), set in the same action as creation/update (FR-012) |
| `draft` | Draft vs. ready state | `true` for large/multi-day work opened early (FR-015); gates whether ready-for-review actions run (FR-016) |
| `closingReference` | Issue-closing phrase, if any | Only present on the stack layer that actually completes the issue (FR-014) |

**Relationships**: A Pull Request references exactly one Branch (1:1 for the PR's own commits), may belong to zero or one Stack, and is described by zero or one PR Template.

## Branch

The unit of work a Pull Request represents.

| Field | Description | Validation Rule |
|---|---|---|
| `name` | Branch name | Must match `{type}/{scope}-{short-title}` with an approved prefix; tool-specific prefixes rejected (FR-004) |
| `commits` | Commit history since base | Read-only source of PR content; never fabricated |
| `diff` | Changed files/lines vs. base | Used to calculate review-budget size, excluding generated/compiled/lock/snapshot/translation files |

**Lifecycle**: Assumed to already exist with commits already made — this feature never creates a branch (spec FR-002).

## PR Template

An organization-defined structure a Pull Request should follow, when one is configured.

| Field | Description |
|---|---|
| `routingKey` | Branch prefix (or, for tool-specific prefixes, the linked issue's type) used to select a template |
| `titleFormat` | The template's own title convention |
| `sections` | The template's own section order/checklist |
| `suggestedLabels` | Labels the template's frontmatter proposes — only applied if they exist in the repo's real label set (FR-010) |

**Relationships**: Resolved from a Branch's prefix via the repository's routing configuration (`.github/PULL_REQUEST_TEMPLATE/config.yml`), then applied to a Pull Request.

## Stack

A coordinated, ordered set of Pull Requests representing one larger change split into independently reviewable layers.

| Field | Description |
|---|---|
| `position` | This PR's position (e.g. "PR 2 of 4") |
| `issueOrEpic` | The overarching issue/epic reference |
| `dependsOn` | The PR this layer depends on, if any |
| `followedBy` | The PR that depends on this layer, if any |
| `reviewScope` | What this specific layer covers |

**Constraints**: No more than 5 PRs per stack; larger work splits into multiple stacks under an epic instead (spec, Stacked PRs section). Only the top/completing layer uses a closing reference; every other layer uses a non-closing one (FR-014).

## Changelog Entry

A user-facing record of a change, linked to its Pull Request.

| Field | Description |
|---|---|
| `content` | What changed, in user-facing terms — not implementation detail |
| `prLink` | Reference back to the Pull Request this entry belongs to |

**Lifecycle**: Created only after the Pull Request already exists (so `prLink` can be populated), and only when that PR's changelog-decision label requires one (FR-013). Never duplicated across every layer of a stack — the owning/final-delivery layer carries it.
