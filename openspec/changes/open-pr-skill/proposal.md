## Why

PR creation currently relies on a personal, machine-local slash command (`~/.claude/commands/open-pr.md`) that isn't shared with the team, isn't discoverable by other agent tools, and has already shown a real failure mode: agents running it have skipped the labels/assignee step because it lived as trailing sections after the main "create the PR" action instead of being structurally part of it. LS-3223 also establishes OpenSpec as the required planning process for new skills going forward, and this is the first skill being planned through it — both problems are solved by converting `open-pr` into a proper, repo-committed agent skill with a spec-reviewed design instead of a hand-written command file.

## What Changes

- Introduce a new `open-pr` agent skill, committed to the repo (not a personal machine-local command), following the agentskills.io spec and Claude Code's skill conventions.
- Skill gathers PR context from the branch itself (commits, diff, base branch, existing labels, existing merged-PR conventions) rather than assuming prior conversation context.
- Skill runs `gh pr create` (or `gh pr edit` for an existing PR) with labels and assignee (`brandonmarshal`) included in the same invocation, not as a separate follow-up step — directly addressing the observed failure mode.
- Skill adds a `CHANGELOG.md` entry only after the PR exists, and links that PR into the entry.
- Skill supports both explicit invocation (`/open-pr`) and natural-language invocation (e.g. "create the PR for me"), with a guard requiring branch/base confirmation when triggered implicitly rather than via the explicit command.
- Remove/retire the old personal command file (`~/.claude/commands/open-pr.md`) once the new skill is verified working, so there is a single source of truth.

## Capabilities

### New Capabilities
- `pr-creation`: Creating and updating a GitHub pull request for the current branch — context gathering, title/body conventions, labels, assignee, and changelog linkage.

### Modified Capabilities
<!-- none — this is a net-new capability, no existing specs in openspec/specs/ cover PR creation -->

## Impact

- Affected files: new `.claude/skills/open-pr/SKILL.md` (and this `openspec/changes/open-pr-skill/` planning set).
- Affected systems: `gh` CLI (PR creation/editing, labels, assignees), `CHANGELOG.md` conventions, this repo's Claude Code skill/command surface.
- Removes reliance on a personal, non-portable slash command; no other code paths depend on the old command file.
