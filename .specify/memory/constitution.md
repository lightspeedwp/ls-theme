<!--
Sync Impact Report
- Version change: 1.1.0 → 1.2.0
- Modified principles:
  - I. Theme-First Styling — added the `assets/css/animations.css` global-only-styling rule
    and the GSAP-restraint clause ("never a default choice for 'this pattern has motion'")
  - IV. Core Blocks First — added: verify a core block attribute is actually supported before
    using it, rather than guessing
  - VI. Validation Before Done — added `npm run theme:validate` to the required command list
- Added principles: VII. PHP Minimalism & Engineering Discipline
- Added sections:
  - Available Skills for Planning (repo-local `.agents/skills/` + global/session WordPress
    skills, per user request to make all WordPress dev skills visible to future plans)
- Expanded sections: Workflow & Process — added file-location governance
  (`.github/reports/`, `.github/tasks/`, `.github/prompts/`, `.agents/skills/`,
  `.agents/agents/`) and a caution on modifying `.github/workflows/`
- Removed sections: none
- Templates requiring updates: plan-template.md, spec-template.md, tasks-template.md,
  checklist-template.md — ✅ no changes required; none hardcode prior text and all read this
  file at runtime.
- Follow-up TODOs: none
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

- `CHANGELOG.md` gets one dated entry per PR (Keep a Changelog format), written when the PR
  is opened/updated — not batched per-commit.
- Commit messages use a heading + bullet structure, never prose paragraphs, grouped under
  short section headings (e.g. "Bug fix", "Cleanup", "Context").
- PR test-plan checkboxes are only checked when actually run/verified in that session — leave
  manual-QA-only items unchecked/pending; never mark an item complete to make the list look
  more thorough than the work actually was.
- Never branch directly from a remote-tracking ref (`git checkout -b x origin/develop`
  silently tracks it as upstream); verify branch tracking with `git branch -vv`.
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

**Version**: 1.2.0 | **Ratified**: 2026-09-11 | **Last Amended**: 2026-09-11
