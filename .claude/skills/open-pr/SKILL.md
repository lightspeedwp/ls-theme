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
See specs/002-open-pr-skill/research.md ("Decision: Skill location") for the
full rationale and alternatives considered.
-->

Create a pull request for the current branch, following this repo's established conventions exactly, plus the LightSpeed Pull Request Creation Workflow (below). This skill only creates/updates a PR — it does not create branches, commit changes, or push to `develop`. Assume the branch and its commits already exist.

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
5. **Confirm the base branch by branch type, not just the repo default:** normal development branches (`feat/`, `fix/`, `chore/`, etc.) target `develop`; a `hotfix/` branch or a release branch targets `main` (and, once approved and merged, must be synchronised back to `develop` — flag this to the user as a follow-up, since this command doesn't perform that sync itself). Only fall back to `gh repo view --json defaultBranchRef` when the branch type doesn't clearly indicate one of the above.
6. Check whether this repo maintains a `CHANGELOG.md` (or equivalent) with a documented rule requiring an entry (check its contributor guidance file — e.g. `AGENTS.md`, `CONTRIBUTING.md`). If so, note that an entry is required — but do not add it yet; the entry is written after the PR exists (see "Changelog — after the PR is created" below), so it can link to the PR.
7. Identify which validation/lint/test commands this repo defines (check its contributor guidance file and `package.json`/`composer.json` scripts) and run whichever ones apply to the file types actually changed in this branch. Use these fresh, real results for the Test Plan section — never rely on memory of checks run earlier in an unrelated conversation.
8. **Branch naming (LightSpeed convention):** confirm the current branch name matches `{type}/{scope}-{short-title}` using one of the approved prefixes: `feat/, fix/, hotfix/, refactor/, chore/, task/, docs/, test/, perf/, ci/, build/, deps/, security/, design/, a11y/, seo/, config/`. Never use a tool-specific prefix (`claude/`, `copilot/`, `openai/`). Each branch in a stacked PR must use the prefix that describes *that layer's own* work, not the stack's overall type. This command does not rename branches — if the current branch doesn't match, flag it to the user before proceeding rather than silently creating the PR anyway.
9. **Review budget (LightSpeed convention):** from the diff stat gathered in Step 1, count reviewable files/lines — excluding generated assets, lock files, compiled/build output, snapshots, and translation files (call these exclusions out explicitly in the PR body if any were excluded from the count). Preferred budget is roughly ≤15 files / ≤400 lines / ~30-45 min human review time.
   - Over ~15 files or ~400 lines: note in the PR that it exceeds the preferred budget.
   - Over ~25 files or ~800 lines: flag clearly to the user that this should either be split into a stacked PR (see "Stack information" below) or have a maintainer-approved exception recorded before requesting review. Do not silently proceed as if this were a normal-sized PR.
10. **Self-review gate:** before drafting the PR, confirm (don't just assume) all of the following:
    - The final diff — not just individual commits — was reviewed.
    - The PR still contains one coherent outcome a reviewer can understand (if it's drifted into multiple unrelated outcomes, flag this rather than proceeding).
    - It remains within the review budget from Step 2.9, or has a documented exception.
    - Applicable lint, unit, **build**, and other automated checks were run (Step 2.7) — not just lint/test in isolation.
    - PHP/JavaScript errors were checked, and debugging/temporary code and unrelated formatting changes have been removed.
    - Responsive, editor/front-end, and accessibility behaviour were tested where relevant. Accessibility target is **WCAG 2.2 AA** — use this figure even if this repo's own docs reference an older WCAG version, since 2.2 AA is the current LightSpeed org-wide standard.
    - Documentation was updated where required.
    - **If this repo has AI code-review automation enabled (e.g. CodeRabbit)**, its findings on this PR have been reviewed and responded to — noted in the PR, not silently ignored. AI review assists but never substitutes for the required human review.
    - Use this repo's own `AGENTS.md`/`CONTRIBUTING.md` for the concrete WordPress-specific checks (coding standards, sanitize/escape, capabilities, nonces, backwards compatibility, `block.json`/`theme.json`/editor-front-end parity) rather than re-deriving them here.

## Choosing a PR template (if this repo has one)

Before drafting the PR body, check whether this repo has `.github/PULL_REQUEST_TEMPLATE/config.yml`:

- **If it exists:** use it as the branch-prefix → template routing table (it supersedes the shorter prefix list in Step 2.8 for this purpose — treat it as the fuller, authoritative version). Resolve the current branch's prefix to its mapped template file under `.github/PULL_REQUEST_TEMPLATE/`, and follow **that template's own title format, section order, and checklist verbatim** — don't substitute your own freeform structure over it. If the branch prefix is one of the forbidden tool-specific ones (`claude/`, `copilot/`, `openai/`), resolve the template via the linked issue's type instead, per the config's documented fallback strategy.
  - Layer in any of the following sections from "PR structure" below that the matched template doesn't already have: Scope and exclusions, Screenshots/video, Accessibility/performance/backwards-compatibility notes, `## Stack` (when applicable), and a stated Changelog decision. Add them in the same relative position "PR structure" specifies.
  - Still apply every rule from "Creating the PR" and "Changelog" below (labels + assignee in the same command, changelog gated on `meta:needs-changelog`) — a template defining its own suggested labels in frontmatter doesn't override "never invent a label that doesn't exist in this repo": only apply a template-suggested label if it's actually present in `gh label list`.
- **If it doesn't exist:** use the freeform "PR structure" below as-is.

## PR structure (fallback structure when this repo has no PR template; also the source for sections to layer into a matched template above)

- **Title:** plain description of what the diff actually does, derived from Step 1 — not from assumption. Append `(TICKET-ID)` only if a real ticket reference was found in Step 1. Never invent one.
- **Base:** the branch confirmed in Step 2.5.
- **Body**, in this order:
  1. `## Summary` — plain-English explanation of what was broken/needed and why, written as if the PR author wrote it directly. Never refer to "the user," any third party, or narrate an assistant's working process ("I found...", "we decided...") — state the facts of the change only.
  2. Subsections (`###`) grouping related changes, one per distinct area touched — derived from the actual diff, not a fixed template of section names.
  3. A section covering anything investigated but deliberately not changed, if applicable — explain why, with evidence, not just "not done."
  4. **Scope and exclusions** — what this PR deliberately does not cover, and any files excluded from the review-budget count (generated assets, lock files, compiled output, snapshots, translations).
  5. **Screenshots/video** — required for any visible/UI change; note explicitly if none apply.
  6. **Accessibility/performance/backwards-compatibility notes** — where relevant to the change; omit the heading entirely if genuinely not applicable rather than writing "N/A".
  7. `## Stack` — only when this PR is one layer of a stacked PR set (see "Stack information" below); omit entirely for a standalone PR.
  8. `## Test plan` — checklist (`- [x]` / `- [ ]`) of what was actually verified using Step 2.7's fresh results. **Only check off what was genuinely run/verified just now — leave manual-QA items unchecked/pending. Never mark an item done to make the list look complete.**
  9. **Changelog decision** — state which of `meta:needs-changelog` / `meta:no-changelog` applies and why (see "Labels and changelog" below).
  10. A closing reference to the ticket, only if one was genuinely found in Step 1 — see "Stack information" for which phrasing to use.

## Stack information (only when this PR is part of a stacked PR set)

A stack is used when the change contains multiple dependent-but-independently-reviewable layers, a foundation must land before UI/integration work, a refactor must land before behavioural changes, or the full change would be too large/hard to review as one PR (see the review-budget check in Step 2.9). A normal stack should contain no more than 5 PRs — larger work should normally be split into multiple stacks under an epic rather than one oversized stack. Don't split work arbitrarily just to reduce file counts — each layer must be coherent and testable on its own.

When this PR is part of a stack, include in the body:

```
## Stack

- Position: PR <n> of <total>
- Issue/Epic: #<issue>
- Depends on: #<pr> (omit if this is the bottom layer)
- Followed by: #<pr> (omit if this is the top layer)
- Review scope: <what this specific layer covers>
```

**Ticket-closing phrasing depends on stack position:**
- Only the PR that actually completes the issue uses `Closes #123` / `Fixes #123` / `Resolves #123`.
- Every supporting/intermediate layer uses `Relates to #123` / `Part of #123` instead — never a closing keyword on a layer that doesn't finish the work, since that would let the issue auto-close before the full stack merges.

## Draft PRs (for larger or multi-day work)

Once there's a useful initial diff for larger or multi-day work, prefer opening as a draft rather than waiting until everything is finished: `gh pr create --draft` (still with `--label`/`--assignee` in the same call — draft status doesn't change that rule). A draft is not a formal review request — skip the "Marking Ready for Review" gating below until the user explicitly says it's ready.

For a stack opened as drafts: create the planned layers as drafts, mark the bottom layer ready first, and mark later layers ready only once their dependency and incremental diff are stable. If substantial rework begins after review has started on a non-draft PR, that's a signal to return it to draft — flag this to the user rather than doing it unprompted.

## Creating the PR — labels and assignee are part of the same command, not a follow-up step

Run `gh pr create` with `--label` and `--assignee` included in that same invocation — never run a bare `gh pr create` and add these afterward as a separate step.

- **Labels:** pull the real set from `gh label list` first — never guess or invent one. Choose labels based on what Step 1 actually found changed (area/component/language touched), not a fixed default set. Pass each chosen label with its own `--label "<name>"` flag.
- **Changelog label (required, LightSpeed convention):** every PR must carry **exactly one** of `meta:needs-changelog` or `meta:no-changelog`, in addition to the type/area/status/priority labels above. Use `meta:needs-changelog` for a user-facing change on the owning/final-delivery PR; supporting/internal stack layers normally use `meta:no-changelog` even if the overall change is user-facing, since the owning PR carries that entry (see "Changelog" below).
- **Assignee:** always `--assignee brandonmarshal`.

Example shape: `gh pr create --base <base> --title "<title>" --body "<body>" --label "area:block-editor" --label "meta:needs-changelog" --assignee brandonmarshal`

## Changelog — after the PR is created

If Step 2.6 found this repo requires a changelog entry, **and** this PR is labelled `meta:needs-changelog` (see above), add it now — only after the PR exists, never before:

1. Take the PR URL and/or number from the `gh pr create` output in the previous step.
2. Add the `CHANGELOG.md` entry per this repo's existing format/conventions, and include a link to that PR in the entry (e.g. the PR URL or a `(#123)` reference, matching however existing entries link PRs). Describe what changed, not implementation details, and avoid repeating the same entry across every layer of a stack — it belongs on the owning/final-delivery PR only.
3. Run this repo's changelog validation command if it has one (check its contributor guidance/`package.json` scripts), and follow its changelog automation rather than hand-editing `CHANGELOG.md` where automation generates it.
4. Commit and push that changelog update to the same branch.

If the PR is labelled `meta:no-changelog`, skip this section entirely — don't add an entry.

## Marking Ready for Review

Once the PR is genuinely ready (not applicable while it's intentionally a draft — see "Draft PRs" above):

1. Confirm required CI is passing before asking for review.
2. Mark the PR ready for review if it was opened as a draft (`gh pr ready <number>`).
3. Request the appropriate reviewer/code owner if one can be determined; otherwise flag to the user that a reviewer still needs to be chosen.
4. Confirm `status:needs-review` is applied (add it if this repo tracks review status via labels and it's missing).
5. Link the PR back to its Linear/Asana issue and note that the work item should move to "In Review" — do this via an available tool if one exists. **If no such tool is available, warn that this step needs doing manually and still finish successfully — don't fail or skip the notice silently.**

## Updating an existing PR

- Read the current PR body first (`gh pr view <number> --json body`) before rewriting it.
- Preserve any part that still accurately reflects the current code — don't blindly overwrite everything. Rewrite only what's gone stale, and refresh the Test Plan checkboxes to reflect what's true now, not what was true when it was first opened.
- If labels or assignee are missing from the existing PR, add them now with `gh pr edit <number> --add-label "<name>" --add-assignee brandonmarshal` — don't leave them for later. This includes the `meta:needs-changelog`/`meta:no-changelog` label if it's missing from an existing PR.

## Responding to feedback (once review is underway)

- Respond to every review thread — don't leave any unaddressed.
- Do not silently push fixes: when changes are requested, fix the owning branch, test again, push, let CI run again, **reply to the review threads explaining what changed**, then re-request review.
- For stacked PRs, fix the issue in the layer that actually owns the affected code — never work around a defect in a lower layer from a higher one in the stack. After fixing the owning layer, rebase/update the layers above it and confirm their CI reruns.
- Use `git push --force-with-lease` only where stack rebasing genuinely requires it after fixing a lower layer. Avoid unqualified `--force` pushes.

## What NOT to do

- Don't create branches or commit/push unrelated changes as part of this command — assume the branch and commits already exist. The one exception is the changelog entry itself, which is added and pushed after the PR is created (see "Changelog — after the PR is created").
- Don't push to `develop`/main or merge anything — this only opens/updates a PR against the base branch.
- Don't fabricate test results, metrics, or verification steps that weren't actually run in Step 2.7.
- Don't write the PR body from assumed context — every claim in it must trace back to something found in Step 1's actual branch inspection.
- Don't use conversational framing ("the user," "senior," "we discussed") in the PR body — it should read as if the developer wrote it themselves.
- Don't add the changelog entry before the PR exists — it must link to the PR, so it can only be written afterward.
- Don't run `gh pr create` without `--label` and `--assignee` already in that same command.
- Don't create a PR without exactly one of `meta:needs-changelog` / `meta:no-changelog` applied.
- Don't use a closing keyword (`Closes`/`Fixes`/`Resolves`) on a supporting layer of a stack — only the layer that actually completes the issue.
- Don't silently create an oversized PR (>~25 files/~800 lines) without flagging that it should be a stack or needs a documented exception.
- Don't apply a template's suggested label from its frontmatter if that label doesn't actually exist in this repo's `gh label list`.
- Don't silently push a fix without replying to the review thread it addresses, and don't force-push without `--force-with-lease` during stack rebasing.
