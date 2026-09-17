<!--
Sync Impact Report
- Version change: 1.2.0 → 1.3.0
- Modified principles: none (I-VII preserved verbatim, no rewording)
- Added principles: VIII. Branch, PR & Changelog Discipline — sourced from the LightSpeedWP
  organization's Pull Request Creation Workflow document and shared PR-template repository
  (lightspeedwp/.github), validated in practice while building this repo's own `open-pr` agent
  skill (specs/002-open-pr-skill/). Covers branch naming/base-branch selection, review-size and
  stacked-PR guidance, mandatory changelog-decision labelling, PR-template routing, a WCAG 2.2 AA
  PR-review accessibility bar, and post-review feedback discipline.
- Added sections: none
- Modified sections:
  - Workflow & Process — the "CHANGELOG.md gets one dated entry per PR" and "Never branch
    directly from a remote-tracking ref" bullets are now cross-referenced to Principle VIII
    (which restates and materially expands both) instead of duplicated verbatim, to avoid the
    two locations drifting out of sync. No information was removed — both rules are fully
    covered, in more detail, under Principle VIII.
- Removed sections: none
- Flagged inconsistency (not resolved by this amendment): Principle V states "WCAG 2.1 AA" as
  the general baseline. Principle VIII sets WCAG 2.2 AA specifically for PR self-review, per the
  current LightSpeedWP org-wide standard, and notes it supersedes Principle V's figure for that
  purpose. Principle V's own text was intentionally left unedited per this amendment's scope
  (additive only) — reconciling the two into one consistent figure is a follow-up TODO.
- Templates requiring updates: plan-template.md, spec-template.md, tasks-template.md,
  checklist-template.md — ✅ no changes required; none hardcode prior text and all read this
  file at runtime.
- Follow-up TODOs:
  - TODO(WCAG_BASELINE_RECONCILIATION): Decide whether to bump Principle V's baseline from
    2.1 AA to 2.2 AA org-wide, or keep the two figures deliberately scoped differently
    (general theme baseline vs. PR-review bar). Requires a maintainer decision, not just an
    editorial fix.
-->

# LightSpeed Theme (ls-theme) Constitution

## Core Principles

### I. Theme-First Styling

`theme.json` and `styles/**/*.json` are the single source of truth for color, typography,
spacing, layout, borders, shadows, and block-level structural properties. Sass/CSS in
`src/scss/**/*.scss` is permitted **only** for what JSON genuinely cannot express:
`:hover`/`:focus-within`/`:focus-visible` states with no `elements.*` pseudo-state key,
`content:""` pseudo-elements, comma-separated selectors, SVG `fill`, and parent-triggered
child-selector motion. Every such rule MUST carry a comment directly above it naming the
specific limitation, in the form:
`// JSON limitation: <specific reason> — see AGENTS.md Theme-First Approach`.

Motion/animation files (`src/scss/animations/**`, `src/scss/gsap/**`) MUST contain only
`@keyframes`, `transition`, `transform`, `animation`, and `will-change` rules, plus their
`prefers-reduced-motion` companions — nothing else; any other property in those files is a
defect. `assets/css/animations.css` (and the Sass it compiles from) MUST contain **only**
genuinely global styling — content that loads sitewide via the header/footer template parts,
including anything nested in them (mobile menu, mega menus). Styling tied to a specific page
or pattern does not belong there no matter how small, and MUST live in its own dedicated file
instead. GSAP is permitted only for JS-driven interaction that CSS transition/animation
structurally cannot achieve (e.g. scroll-triggered sequencing, cursor-tracked effects) — it
MUST NOT be the default choice just because a pattern happens to have motion.

**Rationale**: A block theme's editor-facing consistency and dark-mode parity depend on
styling living in the token/JSON layer, where the Site Editor and `theme.json` can reason
about it. Undocumented hand-authored CSS silently drifts from that system and is the
single biggest source of untraceable styling bugs in this repo's history. The
`animations.css` global-only rule exists specifically because a page-scoped rule leaking into
a sitewide-loaded file is both a performance cost (loaded on every page) and a cascade risk
(the header/footer are inescapable, so a leaked rule can't be scoped away later).

### II. Reuse Before Create

Before authoring a new pattern, card style, or token, check existing patterns, styles, and
tokens for something that already fits. Name new patterns and card styles by shape, not by
page (e.g. `card-link-row`, not `services-page-link-card`), so they remain available for
reuse elsewhere. A single-consumer card style under `styles/sections/cards/` is acceptable,
established precedent in this repo, provided it defines something a JSON-vs-inline-attribute
approach genuinely cannot express otherwise (child selectors, pseudo-elements). It is **not**
acceptable to invent a new one-off `is-style` variant for a single-use treatment with no
second consumer ever anticipated — style that inline on the pattern's block attributes
instead. `styles/blocks/**` and `styles/sections/**` files are auto-discovered by WordPress
6.6+ as real, user-visible style-picker entries — every file added there is a live editor
option, not an implementation detail, so this rule matters beyond code cleanliness.

Building a new pattern from a Figma design MUST use the repo's own `.agents/skills/`
toolchain, not ad hoc Figma-to-markup translation: `pattern-extractor` for the Figma-to-pattern
conversion itself (it already encodes this reuse-or-create workflow, dark-token parity, and
Phosphor/Icon-Block mapping), which in turn mandatorily loads `theme-color-token-enforcer` for
any authored pattern/style/CSS file it creates or touches. `wp-block-style-audit` is the
authoritative JSON-vs-CSS decision procedure for any `styles/**/*.json` file — consult it
before writing a `css` field or a new Sass exception. For any WordPress-development task more
generally (not just pattern building), check the "Available Skills for Planning" section
below and use whichever available skill actually matches the task — do not default to a
single familiar skill when a more specific one is available.

**Rationale**: Page-scoped naming and speculative one-off styles fragment the design system
and make later reuse (or auditing) effectively impossible; shape-based naming is what makes
"is there already something for this?" answerable in the first place.

### III. Token Parity

Any new custom color, spacing, or typography token MUST have a real, resolved value in both
`theme.json` and `styles/dark.json`. Assigning the same literal value to both light and dark
modes is hardcoding, not tokenizing, and MUST NOT be done. Before reusing an existing
token or class, verify what it actually resolves to (color/size) rather than inferring from
its name. When mapping a design's heading levels (H1-H6) onto theme typography tokens, verify
the actual resolved px value first — do not assume a design's H2 maps onto the theme's `heading-2`
token just because the names match.

**Rationale**: Dark-mode parity breaks silently and often invisibly to the author working in
light mode; verifying resolved values (not names) is the only reliable defense against both
missing dark-mode coverage and confidently reusing the wrong token or the wrong type scale.

### IV. Core Blocks First

Prefer the most semantic core WordPress block available (`core/post-title`,
`core/post-excerpt`, `core/buttons`, `core/navigation`, etc.) before falling back to a
generic `core/group`/`core/columns` substitute. Any decision to fall back to a generic block
MUST be noted in the pattern's description. Before using an attribute or attribute value on a
core WordPress block, verify it is actually supported by that block (check its registered
attributes/supports, or an existing working usage in this repo) rather than guessing.

**Rationale**: Semantic core blocks carry accessibility, editor-UX, and future-core-feature
benefits that a hand-assembled group/columns substitute does not, and silently defaulting to
generic blocks erodes those benefits theme-wide over time. Guessing at unsupported attributes
produces markup that silently fails to apply, which is harder to diagnose than a missing
feature.

### V. Accessibility and Security Non-Negotiables

Heading hierarchy MUST be correct (no skipped levels), images MUST have descriptive alt
text, interactive elements MUST be keyboard-accessible, and focus states MUST NOT be
removed — WCAG 2.1 AA is the baseline. Use ARIA attributes only where genuinely needed; do
not over-ARIA. All PHP output MUST be escaped (`esc_html()`, `esc_attr()`, `esc_url()`,
`wp_kses_post()`), all input MUST be sanitized (`sanitize_text_field()`, `absint()`, etc.) and
validated before use, and translation functions MUST be used correctly
(`__()`, `esc_html__()`, `esc_attr__()`). Never use `eval()`; avoid direct database queries and
use `$wpdb->prepare()` when one is genuinely necessary. A stretched-link/whole-card-click
pattern MUST keep the real anchor at `position: static` — only its `::before` overlay gets
`position: absolute`, sized against an ancestor with `position: relative`. Setting
`position: relative` directly on the anchor breaks the click target by making the anchor its
own containing block; this is a real, recurring bug in this codebase and has been fixed
multiple times.

**Rationale**: These are non-negotiable because they are either legally/ethically required
(accessibility, security) or a specific, repeatedly-reintroduced structural bug in this exact
codebase (the stretched-link anchor mistake) that is cheaper to prevent by rule than to keep
re-diagnosing.

### VI. Validation Before Done

Every new or changed PHP pattern MUST pass `php -l`, `npm run patterns:escape`, and
`npm run security:scan`; every new/changed JSON file MUST pass `npm run schema:validate`;
theme-wide consistency (slugs, required files) MUST pass `npm run theme:validate`; and all
changed PHP MUST pass `phpcs --standard=WordPress`, before being considered complete. The
`validate_blocks` tool MUST NEVER be used — it has corrupted patterns before and is banned
outright. Verify block correctness via source/JSON inspection or a manual Site Editor check
instead.

**Rationale**: These checks are cheap, fast, and catch the classes of error (escaping gaps,
security issues, malformed JSON, coding-standard drift) that are expensive to find later in
review or production; the `validate_blocks` ban exists because of direct prior damage it
caused to real patterns in this repo.

### VII. PHP Minimalism & Engineering Discipline

Keep `functions.php` as short as sensibly possible — only register block supports, enqueue
assets, or add editor styles there; use `inc/` only for genuine PHP logic that doesn't belong
in `functions.php`, and never invent PHP architecture that `theme.json` can handle. Do not add
a plugin-like architecture to the theme, and do not add features that belong in a plugin
instead. Prefer WordPress core hooks and filters over custom implementations. Prefer small,
targeted diffs — do not rewrite a file that doesn't need rewriting. Do not add npm or Composer
dependencies without clear justification, and do not invent a build pipeline (Webpack, Vite,
etc.) — this repo does not use one unless explicitly added later.

**Rationale**: This is a theme, not a plugin — architecture creep here is a maintenance and
upgrade-path risk. Small diffs and dependency discipline keep the codebase reviewable and keep
the actual cost of a change proportionate to its stated scope.

### VIII. Branch, PR & Changelog Discipline

Branch names MUST follow `{type}/{scope}-{short-title}` using the organization's approved
prefixes (`feat/, fix/, hotfix/, refactor/, chore/, task/, docs/, test/, perf/, ci/, build/,
deps/, security/, design/, a11y/, seo/, config/`); tool-specific prefixes (`claude/`,
`copilot/`, `openai/`) MUST NOT be used. Each layer of a stacked PR MUST use the prefix
describing that layer's own work, not the stack's overall type. Branches MUST NOT be created
directly from a remote-tracking ref (e.g. `git checkout -b x origin/develop`), which silently
sets the wrong upstream and misdirects pushes; branch creation MUST be verified with
`git branch -vv`.

The base branch MUST be chosen by branch type, not assumed from the repository default:
normal development targets `develop`; a `hotfix/` branch or a release branch targets `main`,
and MUST be flagged for synchronisation back to `develop` after merge rather than assumed
automatic.

A PR MUST contain one coherent, reviewable outcome and SHOULD stay within a preferred review
budget (~15 files / ~400 lines / ~30-45 minutes of review time), excluding generated/compiled/
lock/snapshot/translation files from that count (but identifying them in the PR). Beyond ~25
files or ~800 lines, the change MUST either be split into a stacked PR set or have a
documented maintainer-approved exception recorded before requesting review. A stack MUST
contain no more than 5 PRs; larger work MUST be split into multiple stacks under an epic
rather than one oversized stack, and layers MUST NOT be split arbitrarily just to reduce file
counts. Only the PR that actually completes an issue MAY use a closing reference
(`Closes`/`Fixes`/`Resolves #N`); every supporting/intermediate layer MUST use a non-closing
reference (`Relates to`/`Part of #N`) instead, so the issue cannot auto-close before the full
stack lands.

Every PR MUST carry an assignee and its applicable labels — including exactly one
changelog-decision label (`meta:needs-changelog` or `meta:no-changelog`) — set in the same
action that creates or updates the PR, never as a separate follow-up step. `CHANGELOG.md`
MUST receive one dated entry per PR (Keep a Changelog format), added only after the PR exists
(so it can link back to it) and only when `meta:needs-changelog` applies — never batched
retroactively, and never repeated across every layer of a stack (the owning/final-delivery
layer carries it). Where this repository defines a PR-template routing configuration (e.g.
`.github/PULL_REQUEST_TEMPLATE/config.yml`), the matching template's own title format, section
order, and checklist MUST be followed rather than a different structure substituted in; a
template's own suggested labels only apply if they actually exist in this repository's real
label set.

The accessibility bar for PR self-review is **WCAG 2.2 AA** — this is the current LightSpeedWP
organization-wide standard and takes precedence over any older figure referenced elsewhere in
this repository's own documentation for PR-review purposes specifically (see the flagged
inconsistency with Principle V's general 2.1 AA baseline in this file's Sync Impact Report).

Once a PR is under review, every review thread MUST receive a reply — fixes MUST NOT be
pushed silently. For a stacked PR, a defect belonging to a lower layer MUST be fixed in that
owning layer, with layers above it rebased/updated afterward; a lower layer's defect MUST NOT
be worked around from a higher layer. Force-pushes during stack rebasing MUST use
`--force-with-lease`, never an unqualified `--force`.

**Rationale**: These rules were validated in practice while building and refining this repo's
own `open-pr` agent skill (`specs/002-open-pr-skill/`), and are sourced directly from the
LightSpeedWP organization's canonical Pull Request Creation Workflow and shared PR-template
repository. Codifying them here means every future Spec Kit-planned feature is automatically
checked against this same standard during `/speckit-plan`, instead of each feature having to
rediscover or restate these rules independently — the same reasoning that already justifies
Principle VI's validation commands and Principle VII's engineering discipline.

## Available Skills for Planning

Every plan should check this list and use whichever skill actually matches the task at hand —
not just the one most recently used. Repo-local skills are always available and are
purpose-built for this theme's exact conventions; where a repo-local and a global skill share
similar territory, the repo-local one takes precedence for this repository. Global/session
skill availability can vary by session — confirm a global skill is actually listed as
available before relying on it, and don't treat its absence in a given session as a reason to
skip the workflow it would otherwise cover.

**Repo-local (`.agents/skills/`, always available in this repo):**

- `pattern-extractor` — Figma → `ls-theme` pattern conversion (reuse-or-create, token mapping,
  dark parity, Icon Block mapping, CSS-vs-GSAP routing); mandatorily chains
  `theme-color-token-enforcer`
- `theme-color-token-enforcer` — audit/fix semantic color token usage, dark-mode parity, WCAG
  AA contrast
- `wp-block-style-audit` — the JSON-vs-CSS decision procedure for `styles/**/*.json` files
- `block-theme-audit` — broader block-theme conformance audit
- `theme-orphaned-refs` — find orphaned/dead references across the theme
- `themejson-completion` — fill out `theme.json` gaps without overwriting existing config
- `themejson-extractor-orchestrator` / `extractor-skills` — coordinate multi-part
  `theme.json` extraction work
- `figma-themejson-palette`, `figma-themejson-radius`, `figma-themejson-shadow`,
  `figma-themejson-spacing`, `figma-themejson-style-variations`, `figma-themejson-typography`
  — extract specific token families from a Figma variables table into `theme.json`
- `breakdown-plan` — issue/project planning breakdown

**Global/session WordPress skills (availability varies by session — verify before relying on one):**

- `wordpress-router` / `wordpress-block-theme-router` — route an ambiguous WP task to the
  correct specialist skill
- `wp-block-development`, `wp-block-themes`, `wp-patterns` — block and block-theme development
  fundamentals
- `wp-interactivity-api` — Interactivity API (`data-wp-*` directives, stores)
- `wp-abilities-api`, `wp-abilities-audit`, `wp-abilities-verify` — WordPress Abilities API
  registration and verification
- `wp-rest-api` — REST route/controller development
- `wp-performance` — profiling, query/cache/autoload optimization
- `wp-phpstan` — static analysis setup and fixes
- `wp-playground` — WordPress Playground blueprints and local instances
- `wp-plugin-development`, `wp-plugin-directory-guidelines` — plugin architecture and
  WordPress.org guideline compliance (not generally applicable to this theme repo, but
  relevant if a companion plugin is touched)
- `wp-project-triage` — deterministic repo inspection/classification
- `wp-wpcli-and-ops` — WP-CLI usage and operational scripting
- `wpds` — WordPress Design System component/token usage
- `wordpress-pattern-generator`, `wordpress-block-style-generator`,
  `wordpress-section-style-generator`, `wordpress-template-generator`,
  `wordpress-template-part-generator`, `wordpress-custom-template-generator`,
  `wordpress-asset-parameter-generator`, `wordpress-block-asset-validator` — generator/
  validator skills for specific WP block-theme asset types; prefer the repo-local
  `pattern-extractor` for actual pattern builds in this repo, but these remain useful for
  template/template-part/custom-template work `pattern-extractor` doesn't cover
- `wordpress-plugin-packaging-review` — plugin packaging/release review (not generally
  applicable to this theme repo)

## Workflow & Process

- Branch, PR, and changelog conventions are governed by Principle VIII above — see that
  principle for branch naming/base-branch selection, review-size/stacked-PR guidance, the
  mandatory changelog-decision label, and per-PR `CHANGELOG.md` entries.
- Commit messages use a heading + bullet structure, never prose paragraphs, grouped under
  short section headings (e.g. "Bug fix", "Cleanup", "Context").
- PR test-plan checkboxes are only checked when actually run/verified in that session — leave
  manual-QA-only items unchecked/pending; never mark an item complete to make the list look
  more thorough than the work actually was.
- A structural/enqueue change (e.g. a new CSS bundle's front-end loading condition) should use
  a real, known WordPress conditional tag (`is_page()`, `is_front_page()`,
  `is_post_type_archive()`, etc.) as soon as the condition is actually knowable. Don't defer
  it indefinitely once the answer is known, and don't invent a fragile guess before it is.
- Never reuse a `wp:pattern` slug reference for text that must vary between call sites — it
  always renders identical static content at every instance; use a PHP pattern with per-call
  data instead when content needs to vary.
- File locations are not optional conventions: developer/AI-generated reports go in
  `.github/reports/` (never the repo root or `docs/`), task lists in `.github/tasks/`,
  reusable prompt files in `.github/prompts/`, portable skills in `.agents/skills/`, and agent
  persona definitions in `.agents/agents/`. `docs/` is reserved for end-user documentation
  only. Do not modify `.github/workflows/` without understanding the CI impact of the change.

## Governance

This constitution is derived from, and subordinate to, `AGENTS.md` — the repo's actual
binding contributor guidance. `AGENTS.md` remains authoritative if the two ever diverge; this
file exists so Spec Kit's `/speckit-plan`, `/speckit-specify`, and `/speckit-tasks` generation
inherit these rules automatically, instead of requiring them to be manually re-explained each
session. When `AGENTS.md` changes in a way that affects a principle here, this file MUST be
amended to match in the same change or a prompt follow-up. This file is intentionally *not* a
full copy of `AGENTS.md` — only the rules that materially affect planning/implementation
decisions are curated here, to avoid the two documents drifting out of sync from duplicated
content.

Amendments follow semantic versioning: MAJOR for a backward-incompatible principle removal or
redefinition, MINOR for a new principle or materially expanded guidance, PATCH for wording/
clarification fixes. Every PR that touches `patterns/`, `styles/`, `src/scss/`, or
`theme.json` is expected to comply with the principles above; a reviewer citing this document
supersedes an unstated personal preference, but never supersedes `AGENTS.md` itself.

**Version**: 1.3.0 | **Ratified**: 2026-09-11 | **Last Amended**: 2026-09-17
