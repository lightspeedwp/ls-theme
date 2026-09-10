## Context

A working set of PR-creation instructions already exists and has been validated in real use: `~/.claude/commands/open-pr.md` (personal, machine-local). Its content is correct and battle-tested — it was iterated on after a real failure (agents skipping labels/assignee because they were trailing sections rather than part of the create action). The job here is not to redesign the PR-creation logic, but to re-platform it as a proper, repo-committed skill, and to decide how it's discovered/invoked.

Constraints:
- Must keep the `/open-pr` explicit invocation working (established user preference).
- Must also become invocable from natural language ("create the PR for me") without requiring the user to remember a command name.
- Must not silently fire `gh pr create` (a real side effect: opens a PR, assigns a person, applies labels) from a vague/ambiguous prompt.
- Repo already has a portable-skill convention (`AGENTS.md` rule 11, `.agents/skills/wp-block-style-audit/`) using `.agents/skills/`, which is the vendor-neutral agentskills.io path — but Claude Code's own native skill auto-discovery/slash-command registration only scans `.claude/skills/`.

## Goals / Non-Goals

**Goals:**
- Single source of truth for PR-creation instructions, committed to the repo.
- Skill triggers both via `/open-pr` and via natural-language requests to open/create/ship a PR.
- Labels and assignee are structurally part of the `gh pr create`/`gh pr edit` call, not a separate step that can be skipped.
- Changelog entry is written after the PR exists and links to it.
- Retire the old personal command file once the skill is verified.

**Non-Goals:**
- Not redesigning the PR content/format rules themselves — those are already correct and are carried over unchanged.
- Not making this skill portable to non-Claude-Code agent tools in this iteration (see Decisions below on `.claude/skills/` vs `.agents/skills/`).
- Not changing this repo's underlying `gh`/GitHub label taxonomy or changelog format.

## Decisions

**1. Skill location: `.claude/skills/open-pr/SKILL.md`, not `.agents/skills/open-pr/`.**
This repo's existing convention (`AGENTS.md` rule 11) points portable skills at `.agents/skills/`. However, Claude Code's native skill discovery/slash-command registration only scans `.claude/skills/<name>/SKILL.md` — `.agents/skills/` content is only read when something (like `AGENTS.md`) explicitly tells an agent to go read it. Since the actual requirement here is "`/open-pr` keeps working and natural-language invocation also works," and this skill is inherently a `gh`-CLI/GitHub-specific workflow (not a cross-tool WordPress convention like `wp-block-style-audit`), portability to other agent tools isn't a real near-term need. Decision: use `.claude/skills/open-pr/`.
- *Alternative considered*: `.agents/skills/open-pr/` for consistency with the repo's stated skill convention. Rejected because it would silently break native `/open-pr` slash-command registration and auto-invocation, the two explicit requirements driving this work.

**2. Auto-invocation: omit `disable-model-invocation`, but add an explicit confirmation guard for implicit triggers.**
The user wants both explicit (`/open-pr`) and natural-language invocation to work. Claude Code's own best practice recommends `disable-model-invocation: true` for side-effect operations, but that would block natural-language triggering entirely, which is a stated requirement here. Decision: leave auto-invocation enabled, and add an instruction in the skill body requiring the agent to confirm target branch and base with the user before running `gh pr create` when the skill was triggered implicitly (i.e., not via the literal `/open-pr` command) — for `gh pr edit` are more common on updates. This preserves today's "just run it" convenience for the explicit command while adding a safety check only for the ambiguous-trigger path.
- *Alternative considered*: `disable-model-invocation: true` (slash-only, no natural-language trigger). Rejected — explicitly contradicts the user's stated requirement to trigger on phrases like "create the PR for me".

**3. `description` field is written to carry real triggering weight**, per agentskills.io's description-optimization guidance: imperative phrasing, explicit "even if they don't say 'pull request'" coverage, naming concrete trigger phrases, staying under 1024 characters.

**4. Content carryover**: the existing command's instructions (context-gathering, pre-flight checks, PR structure, labels/assignee-in-same-command, post-creation changelog-with-PR-link) are carried over near-verbatim into the skill body — they are already correct and validated; this change is about packaging/discovery, not instruction content. The full detailed ruleset stays inline in `SKILL.md` (current draft is ~70 lines, well under the 500-line/5000-token progressive-disclosure ceiling), so no `references/` split is needed.

**5. Retirement of the old command**: `~/.claude/commands/open-pr.md` is deleted only after the new skill is confirmed working in a real PR, to avoid a gap with no working command mid-transition.

## Risks / Trade-offs

- **[Risk]** Natural-language auto-invocation could fire on a vague, unintended prompt (e.g. "can you get this ready for review") → **Mitigation**: the branch/base confirmation guard on implicit triggers (Decision 2) surfaces the action before `gh pr create` runs, giving the user a chance to stop it.
- **[Risk]** `.claude/skills/` deviates from this repo's own stated `.agents/skills/` convention for portable skills → **Mitigation**: explicitly documented as a deliberate exception in this design doc (Decision 1) and in the skill's own header comment, so it isn't mistaken for an oversight later; scoped to this one skill's genuinely Claude-Code-specific requirement (native slash command + auto-invocation), not a precedent for all future skills.
- **[Risk]** Team members without this branch merged won't have the skill yet → **Mitigation**: none needed beyond normal PR merge; this is a net-new, additive skill with no migration for existing work.

## Migration Plan

1. Create `.claude/skills/open-pr/SKILL.md` per the spec in this change.
2. Verify it locally: confirm `/open-pr` still works, and confirm a natural-language prompt (e.g. "create the PR for me") triggers it with the confirmation guard behaving as designed.
3. Once verified, delete `~/.claude/commands/open-pr.md` (personal, out of repo scope — done by the user, not part of this change's repo diff).
4. No rollback complexity: this is an additive file with no runtime dependents; reverting is a straight file deletion if needed.

## Open Questions

- Should the confirmation guard apply narrowly (branch/base only) or also require confirming label/assignee choices before an implicit-trigger PR is created? Current design keeps it narrow (branch/base only) to avoid over-prompting; revisit if implicit invocation proves too permissive in practice.
