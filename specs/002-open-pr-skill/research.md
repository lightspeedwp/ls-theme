# Phase 0 Research: Open PR Skill

No `NEEDS CLARIFICATION` markers remained in the Technical Context after drafting `plan.md` — this feature's requirements were fully decided before spec-kit planning began (see spec.md's Assumptions section). This document instead records the key technical decisions already validated in practice, so they're preserved alongside the plan rather than only living in conversation history.

## Decision: Skill location is `.claude/skills/open-pr/`, not `.agents/skills/`

**Rationale**: This repository's own convention (constitution Principle II / `AGENTS.md`) points portable, cross-tool skills at `.agents/skills/`. However, Claude Code's native skill discovery and slash-command registration only scans `.claude/skills/<name>/SKILL.md` — `.agents/skills/` content is only read when something explicitly tells an agent to go read it (as happens for `wp-block-style-audit`). Since this feature has two hard requirements — an explicit `/open-pr` command and natural-language auto-invocation (spec FR-019) — it needs the native mechanism, which only `.claude/skills/` provides.

**Alternatives considered**: `.agents/skills/open-pr/` for consistency with the repo's stated portable-skill convention. Rejected — it would silently break both invocation modes the spec requires. This is a deliberate, scoped exception, not a precedent for all future skills (documented inline in the skill file's own header comment).

## Decision: Auto-invocation stays enabled, with a confirmation guard on implicit triggers

**Rationale**: Spec FR-019 requires both explicit and natural-language invocation to work. Claude Code's own best-practice guidance recommends `disable-model-invocation: true` for side-effect operations (this skill opens PRs, assigns people, applies labels) — but that flag would block natural-language triggering entirely, directly contradicting the requirement. The resolution: leave auto-invocation on, but require the skill to confirm target branch and base with the user specifically when triggered implicitly (not via the literal `/open-pr` command) before running `gh pr create`.

**Alternatives considered**: `disable-model-invocation: true` (slash-only). Rejected as contradicting FR-019. No guard at all on implicit invocation. Rejected as an unacceptable side-effect risk (a vague prompt could silently open/relabel a PR).

## Decision: Follow the matched org PR template verbatim, layering in only what it lacks

**Rationale**: Spec FR-009/FR-010 require using this repository's `.github/PULL_REQUEST_TEMPLATE/config.yml` routing table and the matched template's own title/section/checklist structure, rather than a bespoke structure. The org's 20-file template set (already copied into this repo in a prior change) is the authoritative, team-maintained source; substituting a different structure would fragment PR conventions across the LightSpeedWP organization. Sections the spec requires that a given template may lack (Scope and exclusions, Screenshots/video, a11y/perf/backcompat notes, `## Stack`, Changelog decision) are layered in additively rather than replacing the template's own sections.

**Alternatives considered**: A single freeform structure ignoring org templates entirely. Rejected outright per explicit requirement — kept only as the fallback for repositories that have no template configuration at all (spec FR-011), since this skill's underlying command file is also used outside `ls-theme`.

## Decision: WCAG 2.2 AA for PR self-review, overriding this repo's own older figure

**Rationale**: The LightSpeedWP organization's Pull Request Creation Workflow and its shared PR-template repository both independently state 2.2 AA as the current standard. This repository's constitution (Principle V) and other contributor docs still reference 2.1 AA. Per explicit decision, the newer org-wide figure takes precedence for PR-review purposes specifically (spec FR-008; constitution Principle VIII notes this precedence and flags the inconsistency with Principle V as a separate, unresolved follow-up rather than silently editing Principle V).

**Alternatives considered**: Deferring silently to whatever this repo's own docs say. Rejected — would silently regress to an outdated standard the organization has already moved past.

## Decision: Missing Linear/Asana link tooling warns and continues, rather than blocking

**Rationale**: Resolved directly during `/speckit-clarify` (see spec.md Clarifications, 2026-09-17). The skill's core value — a correct, well-labeled PR — shouldn't be gated on an unrelated project-management integration being connected in a given session.

**Alternatives considered**: Fail/block until linked (rejected — too strict, blocks the skill's primary output over a secondary step). Skip silently with no notice (rejected — the manual follow-up would be too easy to forget).
