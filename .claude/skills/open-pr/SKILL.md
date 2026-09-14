---
name: open-pr
description: Create or update a pull request for the current branch, following this repo's established PR conventions exactly — gathers context from the branch's own commits/diff, applies labels and assignee (brandonmarshal) in the same gh pr create/edit call, and adds a CHANGELOG.md entry that links the PR afterward. Use this skill whenever the user asks to open a PR, create a pull request, ship/submit the current branch, or says things like "create the PR for me" or "get this ready for review" — even if they don't say "pull request" explicitly, as long as they mean getting the current branch's work up on GitHub.
---

<!--
Location note: this skill intentionally lives at `.claude/skills/` rather than
this repo's usual `.agents/skills/` (portable-skill) location. It needs native
Claude Code slash-command registration (`/open-pr`) and natural-language
auto-invocation, neither of which Claude Code provides for `.agents/skills/`.
This is a deliberate, scoped exception — not an oversight of AGENTS.md rule 11.
See openspec/changes/open-pr-skill/design.md (Decision 1) for the full rationale.
-->

Create a pull request for the current branch, following this repo's established conventions exactly. This skill only creates/updates a PR — it does not create branches, commit changes, or push to `develop`. Assume the branch and its commits already exist.

**Invocation guard**: if this skill was triggered by a natural-language request (e.g. "create the PR for me") rather than the explicit `/open-pr` command, confirm the target branch and base with the user before running `gh pr create`. Skip this confirmation when invoked via the literal `/open-pr` command.

## Step 1: Gather context from the branch itself — never assume prior conversation context

This command must work correctly even with zero memory of what was discussed to get here. Before writing anything:

1. Identify the base branch and diff range: `git log <base>..HEAD --oneline` for the commit list, `git diff <base>...HEAD --stat` for the full list of changed files.
2. Read every commit message in that range — they're the primary source of "what was done and why."
3. For any file whose change isn't self-explanatory from its commit message alone, read the actual diff (`git diff <base>...HEAD -- <file>`) to understand it.
4. If the changes reference an issue/ticket number (in commit messages, branch name, or code comments), look it up for additional context if a tool for that is available — don't invent ticket details.
5. From the actual file types and paths touched, work out what this change is about — don't assume a category of work (performance, a bug fix, a new feature, refactoring, docs) based on anything other than what the diff itself shows.

## Step 2: Pre-flight checks

1. Confirm the current branch is not `develop`/`main`, has commits ahead of it, and is pushed to `origin`. Push it first if it isn't.
2. Check for an existing open PR on this branch: `gh pr list --head <branch-name>`. If one exists, update it instead of creating a duplicate (see "Updating an existing PR" below).
3. Look at 2-3 recent merged PRs (`gh pr list --state merged --limit 3 --json title,body,labels`) to confirm title/body/label conventions haven't drifted — don't assume any previously-seen pattern is permanently fixed.
4. Check `gh label list` for the full current label set — never invent a label that doesn't exist in the repo.
5. Confirm the base branch — verify with `gh repo view --json defaultBranchRef` rather than assuming.
6. Check whether this repo maintains a `CHANGELOG.md` (or equivalent) with a documented rule requiring an entry (check its contributor guidance file — e.g. `AGENTS.md`, `CONTRIBUTING.md`). If so, note that an entry is required — but do not add it yet; the entry is written after the PR exists (see "Changelog — after the PR is created" below), so it can link to the PR.
7. Identify which validation/lint/test commands this repo defines (check its contributor guidance file and `package.json`/`composer.json` scripts) and run whichever ones apply to the file types actually changed in this branch. Use these fresh, real results for the Test Plan section — never rely on memory of checks run earlier in an unrelated conversation.

## PR structure (match existing merged PRs exactly)

- **Title:** plain description of what the diff actually does, derived from Step 1 — not from assumption. Append `(TICKET-ID)` only if a real ticket reference was found in Step 1. Never invent one.
- **Base:** the branch confirmed in Step 2.5.
- **Body**, in this order:
  1. `## Summary` — plain-English explanation of what was broken/needed and why, written as if the PR author wrote it directly. Never refer to "the user," any third party, or narrate an assistant's working process ("I found...", "we decided...") — state the facts of the change only.
  2. Subsections (`###`) grouping related changes, one per distinct area touched — derived from the actual diff, not a fixed template of section names.
  3. A section covering anything investigated but deliberately not changed, if applicable — explain why, with evidence, not just "not done."
  4. `## Test plan` — checklist (`- [x]` / `- [ ]`) of what was actually verified using Step 2.7's fresh results. **Only check off what was genuinely run/verified just now — leave manual-QA items unchecked/pending. Never mark an item done to make the list look complete.**
  5. A closing reference to the ticket, only if one was genuinely found in Step 1.

## Creating the PR — labels and assignee are part of the same command, not a follow-up step

Run `gh pr create` with `--label` and `--assignee` included in that same invocation — never run a bare `gh pr create` and add these afterward as a separate step.

- **Labels:** pull the real set from `gh label list` first — never guess or invent one. Choose labels based on what Step 1 actually found changed (area/component/language touched), not a fixed default set. Pass each chosen label with its own `--label "<name>"` flag.
- **Assignee:** always `--assignee brandonmarshal`.

Example shape: `gh pr create --base <base> --title "<title>" --body "<body>" --label "area:block-editor" --assignee brandonmarshal`

## Changelog — after the PR is created

If Step 2.6 found this repo requires a changelog entry, add it now — only after the PR exists, never before:

1. Take the PR URL and/or number from the `gh pr create` output in the previous step.
2. Add the `CHANGELOG.md` entry per this repo's existing format/conventions, and include a link to that PR in the entry (e.g. the PR URL or a `(#123)` reference, matching however existing entries link PRs).
3. Commit and push that changelog update to the same branch.

## Updating an existing PR

- Read the current PR body first (`gh pr view <number> --json body`) before rewriting it.
- Preserve any part that still accurately reflects the current code — don't blindly overwrite everything. Rewrite only what's gone stale, and refresh the Test Plan checkboxes to reflect what's true now, not what was true when it was first opened.
- If labels or assignee are missing from the existing PR, add them now with `gh pr edit <number> --add-label "<name>" --add-assignee brandonmarshal` — don't leave them for later.

## What NOT to do

- Don't create branches or commit/push unrelated changes as part of this command — assume the branch and commits already exist. The one exception is the changelog entry itself, which is added and pushed after the PR is created (see "Changelog — after the PR is created").
- Don't push to `develop`/main or merge anything — this only opens/updates a PR against the base branch.
- Don't fabricate test results, metrics, or verification steps that weren't actually run in Step 2.7.
- Don't write the PR body from assumed context — every claim in it must trace back to something found in Step 1's actual branch inspection.
- Don't use conversational framing ("the user," "senior," "we discussed") in the PR body — it should read as if the developer wrote it themselves.
- Don't add the changelog entry before the PR exists — it must link to the PR, so it can only be written afterward.
- Don't run `gh pr create` without `--label` and `--assignee` already in that same command.
