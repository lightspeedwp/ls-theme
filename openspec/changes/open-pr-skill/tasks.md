## 1. Skill scaffolding

- [x] 1.1 Create `.claude/skills/open-pr/SKILL.md` with frontmatter: `name: open-pr`, a description written per agentskills.io description-optimization guidance (imperative, covers explicit and natural-language trigger phrasing, under 1024 chars), no `disable-model-invocation` flag.
- [x] 1.2 Add a header note in the skill body documenting the deliberate `.claude/skills/` vs `.agents/skills/` location decision (Design Decision 1), so it isn't mistaken for an oversight of the repo's stated portable-skill convention.

## 2. Port existing instructions

- [x] 2.1 Carry over the validated content from `~/.claude/commands/open-pr.md` into the skill body near-verbatim: context-gathering (Step 1), pre-flight checks (Step 2), PR structure, "Creating the PR" section, "Changelog — after the PR is created" section, "Updating an existing PR" section, "What NOT to do" section.
- [x] 2.2 Verify every requirement in `specs/pr-creation/spec.md` is represented in the ported instructions (context gathering, pre-flight checks, labels/assignee in the same command, changelog-after-PR, no fabricated verification).

## 3. Dual invocation support

- [x] 3.1 Confirm the skill is reachable via `/open-pr` (directory-name-derived command).
- [x] 3.2 Add the implicit-trigger confirmation guard to the skill body: before running `gh pr create` when invoked from a natural-language request rather than the literal `/open-pr` command, confirm target branch and base with the user first.

## 4. Verification

- [ ] 4.1 Run `/open-pr` explicitly on a real branch with commits ahead of `develop` and confirm labels + assignee land in the same `gh pr create` call (no separate follow-up step).
- [ ] 4.2 Trigger the skill with a natural-language prompt (e.g. "create the PR for me") and confirm the branch/base confirmation guard fires before any `gh pr create` call.
- [ ] 4.3 Confirm the changelog step only runs after the PR exists and correctly links the PR in the entry.

## 5. Cleanup

- [ ] 5.1 Once the new skill is verified working end-to-end, delete `~/.claude/commands/open-pr.md` (personal machine-local file, done by the user outside this repo's diff).
- [ ] 5.2 Archive this OpenSpec change (`openspec archive open-pr-skill`) once implementation is complete and verified.
