# Implementation Plan: Open PR Skill

**Branch**: `feature/ls-3223-aiops-openspec-plan-new-skills` | **Date**: 2026-09-17 | **Spec**: [spec.md](./spec.md)

**Input**: Feature specification from `/specs/002-open-pr-skill/spec.md`

**Note**: This template is filled in by the `/speckit-plan` command; its definition describes the execution workflow.

## Summary

An agent skill (`open-pr`) that creates and updates pull requests for the current branch, invocable both explicitly (`/open-pr`) and via natural language, following this repo's PR conventions plus the LightSpeedWP organization's Pull Request Creation Workflow and shared PR-template repository. Technical approach: a single Markdown `SKILL.md` file at `.claude/skills/open-pr/` containing procedural instructions an agent follows step by step — branch/base validation, review-size and template-routing logic, labels/assignee/changelog handling, and stack/draft/feedback-response behavior — with no runtime code, build step, or external service beyond `git`/`gh` and this repository's own files.

## Technical Context

**Language/Version**: N/A — the artifact is a Markdown instruction file (`SKILL.md`) interpreted by an AI coding agent, not compiled/executed code.

**Primary Dependencies**: `git` and the GitHub CLI (`gh`) for all branch/PR/label operations; this repository's own `.github/PULL_REQUEST_TEMPLATE/config.yml` and template files for PR structure selection; this repository's contributor guidance (`AGENTS.md`) for WordPress-specific self-review checks.

**Storage**: N/A — no persistent state; all context is re-derived from the branch/repository on each invocation (per spec FR-001).

**Testing**: Manual/live verification against a real branch and a real GitHub repository (see `quickstart.md`) — there is no unit-test framework applicable to a Markdown instruction file; correctness is verified by observing the actual `gh pr create`/`gh pr edit` calls and resulting PR state.

**Target Platform**: Claude Code (or another agentskills.io-compatible agent) with Bash and `gh` CLI access, operating inside the `ls-theme` git repository.

**Project Type**: Agent skill (single-file Markdown instruction set) — not a library, service, or application in the traditional sense.

**Performance Goals**: N/A — not a running service; success is measured by correctness of the resulting PR, not latency/throughput.

**Constraints**: MUST NOT fabricate verification results (spec FR-020); MUST set labels/assignee in the same `gh` invocation that creates/updates the PR (FR-012); MUST NOT create branches or push unrelated changes (FR-002); MUST confirm branch/base before acting on an implicit (natural-language) invocation (FR-019).

**Scale/Scope**: Single repository (`ls-theme`); one skill file (`.claude/skills/open-pr/SKILL.md`), expected to remain well under the 500-line/5000-token progressive-disclosure ceiling recommended for agent skills.

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

| Principle | Applicability | Result |
|---|---|---|
| I. Theme-First Styling | N/A — this feature touches no `theme.json`/`styles/**`/`src/scss/**`; it produces a single Markdown skill file. | PASS (N/A) |
| II. Reuse Before Create | Applicable in spirit: no existing skill in this repo covers PR creation, so this is genuinely new, not a duplicate. The org's own PR templates (`.github/PULL_REQUEST_TEMPLATE/`) are reused rather than a bespoke structure invented. | PASS |
| III. Token Parity | N/A — no color/spacing/typography tokens involved. | PASS (N/A) |
| IV. Core Blocks First | N/A — no WordPress blocks involved. | PASS (N/A) |
| V. Accessibility and Security Non-Negotiables | Partially applicable: the skill enforces a WCAG standard as part of PR self-review (spec FR-008), but produces no PHP output/markup itself, so the escaping/sanitization rules don't apply to the artifact. | PASS |
| VI. Validation Before Done | N/A in the literal sense (no PHP/JSON produced to lint/validate), but the same spirit is honored via `quickstart.md`'s live-verification requirement below. | PASS |
| VII. PHP Minimalism & Engineering Discipline | Applicable in spirit: keep the skill file itself minimal and targeted, no invented architecture. | PASS |
| VIII. Branch, PR & Changelog Discipline | **Directly implements this principle** — this feature *is* the codification of Principle VIII as an executable skill. Spec requirements (FR-003 through FR-020) were derived from, and must stay consistent with, this principle's text. | PASS |

No violations requiring justification — Complexity Tracking section below is empty.

*Re-checked after Phase 1 design (data-model.md, contracts/, quickstart.md): no new dependencies, architecture, or source/test directories were introduced by the design artifacts — the gate result above is unchanged.*

## Project Structure

### Documentation (this feature)

```text
specs/002-open-pr-skill/
├── plan.md              # This file (/speckit-plan command output)
├── research.md          # Phase 0 output (/speckit-plan command)
├── data-model.md        # Phase 1 output (/speckit-plan command)
├── quickstart.md        # Phase 1 output (/speckit-plan command)
├── contracts/           # Phase 1 output (/speckit-plan command)
│   └── open-pr-invocation.md
└── tasks.md             # Phase 2 output (/speckit-tasks command - NOT created by /speckit-plan)
```

### Source Code (repository root)

This feature has no traditional `src/`/`tests/` split — the entire deliverable is one Markdown file consumed by an AI agent, not compiled or executed code. The real, concrete structure:

```text
.claude/skills/open-pr/
└── SKILL.md              # The skill: frontmatter (name, description) + full procedural body

.github/PULL_REQUEST_TEMPLATE/
├── config.yml             # Already present (added in a prior change) — branch-prefix routing table
└── pr_*.md, README.md      # Already present — org templates the skill's Choosing-a-PR-template
                             # logic reads from; not modified by this feature
```

**Structure Decision**: Single-file agent skill at `.claude/skills/open-pr/SKILL.md`, per the design decision already validated in this repository (see "Alternatives considered" in `research.md`) that this must be a native Claude Code skill location (not `.agents/skills/`) to get slash-command registration and natural-language auto-invocation. No new source or test directories are introduced.

## Complexity Tracking

*No Constitution Check violations — this section is intentionally empty.*
