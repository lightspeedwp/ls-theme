<!--
Sync Impact Report
- Version change: [TEMPLATE] → 1.0.0 (initial ratification — first concrete constitution;
  previous file was the unfilled Spec Kit scaffold with no governance content)
- Modified principles: none (first population)
- Added principles:
  - I. Theme-First, JSON-Over-CSS
  - II. Theme/Plugin Ownership Boundary
  - III. Design Token Discipline & Light/Dark Parity
  - IV. Accessibility Baseline (WCAG 2.1 AA)
  - V. Security & Escaping Discipline
  - VI. PHP Minimalism
  - VII. QA & Verification Integrity
  - VIII. Pattern & Style Reuse Discipline
  - IX. Branch, PR & Changelog Discipline
- Added sections: Definition of Done, Delivery Phase Scope Boundary, Governance
- Removed sections: none (all template placeholder sections resolved into the above)
- Follow-up TODOs:
  - TODO(RATIFICATION_DATE): No prior formally-ratified constitution exists. Dated to
    2026-03-30, the earliest commit in this repository's git history, as the closest
    available proxy for "project start." Confirm with the team whether a different
    date should be treated as the formal ratification point.
  - TODO(CONTENT_SEO_CONVENTIONS): Content/SEO conventions are intentionally left as a
    placeholder pointer to the release-level specification (not yet written) rather
    than defined here, per explicit request to keep this constitution scoped to
    engineering/design governance and defer content strategy to that spec.
-->

# LightSpeed Theme (`ls-theme`) Constitution

## Core Principles

### I. Theme-First, JSON-Over-CSS

`theme.json` and the block-style/section-style JSON partials under `styles/**/*.json` are
the single source of truth for presentation — colour, typography, spacing, layout, borders,
shadows, and block-level structural properties. Sass/CSS under `src/scss/**/*.scss` MUST be
used only for what JSON genuinely cannot express (pseudo-states with no `elements.*` key,
`content:""` pseudo-elements, comma-separated selectors, SVG `fill`, aria-attribute
selectors, parent-triggered child-selector motion, or structural properties with no JSON
key such as `overflow`, `max-width`). Every such CSS rule MUST carry a comment naming the
specific JSON limitation that forced it. `assets/css/*.css` is compiled Sass output only —
it MUST NOT contain hand-authored CSS; author in the corresponding `.scss` partial instead.
Motion/animation files MAY contain only `@keyframes`, `transition`, `transform`,
`animation`, `will-change`, and their `prefers-reduced-motion` companions — any other
property in those files is a defect. GSAP is permitted only for JS-driven interaction that
CSS transition/animation structurally cannot achieve, never as a default choice.

**Rationale**: `theme.json` is portable, editor-visible, and machine-checkable; hand-rolled
CSS that duplicates what JSON can express fragments the design system and silently drifts
from the Site Editor's own state.

### II. Theme/Plugin Ownership Boundary

`ls-theme` (this repository) owns design tokens (`theme.json`, `styles/**/*.json`),
templates, template parts, block patterns, and presentation-only Sass/CSS. It MUST NOT grow
plugin-like responsibilities: no custom post types, no custom taxonomies, no business logic,
no data-layer features. `ls-plugin` (sibling repository `lightspeedwp/ls-plugin`) owns
custom Gutenberg blocks, site-specific PHP functionality that does not belong in a theme,
and shared non-theme behaviour — currently the Portfolio CPT/taxonomies, search/taxonomy
filtering, the carousel block, nav-ref-resolver, permalinks, the style-switcher, and AI
engine integration. Work that touches CPT registration, taxonomy behaviour, block logic
beyond styling, or site-wide PHP features MUST land in `ls-plugin`, not `ls-theme`, and vice
versa — theme concerns (tokens, templates, patterns, presentation) MUST NOT be implemented
inside the plugin.

**Rationale**: Keeping theme and plugin single-purpose lets either be swapped, themed, or
rebuilt independently, and matches how each repo's own `AGENTS.md` already describes itself
("theme, not plugin-like" / "plugin repo, not a theme").

### III. Design Token Discipline & Light/Dark Parity

Every new design token MUST be added to both `theme.json` and its `styles/dark.json`
counterpart with genuinely distinct, resolved values appropriate to each mode. A token MUST
NOT be created with the same literal value in both files — that is hardcoding disguised as
tokenisation, not a real light/dark pair. Before assigning any existing class, token, or
typography preset to new content, its actual rendered value (colour, px size, line-height)
MUST be verified rather than inferred from its name — a prototype's `H1`–`H6` tag MUST NOT be
mapped straight onto the same-named theme heading preset without confirming the resolved
size matches.

**Rationale**: Prior incidents produced tokens that were technically "dark-mode aware" but
carried identical values in both files, defeating dark mode, and headings assigned by name
match alone that rendered at the wrong size.

### IV. Accessibility Baseline (WCAG 2.1 AA)

All templates, parts, and patterns MUST use semantic HTML with correct heading hierarchy
(no skipped levels), descriptive `alt` text on images, and fully keyboard-accessible
interactive elements. WCAG 2.1 AA is the non-negotiable baseline for every shipped page and
component. ARIA attributes are used only where genuinely needed — never to compensate for
missing semantic markup. Focus styles MUST NOT be removed.

**Rationale**: Accessibility is a release gate, not a polish pass; retrofitting it after
launch is materially more expensive than building to the baseline from the start.

### V. Security & Escaping Discipline

All PHP output MUST be escaped with the appropriate function (`esc_html()`, `esc_attr()`,
`esc_url()`, `wp_kses_post()`); all input MUST be sanitised (`sanitize_text_field()`,
`absint()`, or equivalent) and validated before use. Unescaped output such as
`echo $_GET[...]` and use of `eval()` are forbidden. Direct database queries MUST go through
`$wpdb->prepare()`. Translation output MUST use the correct escaping-aware function
(`esc_html__()`, `esc_attr__()`) rather than bare `__()` where output is rendered. Files in
`patterns/*.php`, `inc/**/*.php`, and `functions.php` require special review care as the
highest-risk surfaces for escaping defects.

**Rationale**: A WordPress theme's PHP surface is a direct injection vector into every site
that installs it; escaping/sanitisation discipline is not optional hardening, it is the
minimum bar for shippable code.

### VI. PHP Minimalism

`functions.php` MUST stay as short as sensibly possible, limited to registering block
supports, enqueuing assets, and adding editor styles. Additional PHP logic belongs in
`inc/`, well-named and loaded deliberately. The theme MUST NOT accumulate a plugin-like
architecture, a custom build pipeline (no Webpack/Vite unless explicitly and separately
adopted), or unjustified npm/Composer dependencies. Prefer WordPress core hooks and filters
over custom implementations, and prefer small, targeted diffs over rewriting files that do
not need to change.

**Rationale**: A block theme's value is in `theme.json` and markup, not in PHP cleverness;
minimal PHP keeps the theme swappable and keeps plugin-owned concerns (Principle II) from
creeping back in through the side door.

### VII. QA & Verification Integrity

A PR test-plan checklist item MUST only be checked off if it was actually run or verified
in that session — manual-QA items that were not personally exercised MUST remain unchecked
or explicitly marked pending. The `validate_blocks` tool MUST NOT be used under any
circumstance — it has a track record of corrupting valid patterns; use JSON/source-based
checks instead, or ask a human to verify directly in the Site Editor. Claims of feature
completeness MUST distinguish between "code compiles / static checks pass" and "the feature
was exercised in a real browser/editor" — the former does not substitute for the latter on
UI or frontend changes.

**Rationale**: A checked box that wasn't actually verified is worse than an honestly
unchecked one — it hides risk instead of surfacing it, and `validate_blocks` has directly
caused pattern breakage in this project before.

### VIII. Pattern & Style Reuse Discipline

Before creating a new block pattern or style variation, existing patterns/styles MUST be
checked for reuse potential. New patterns/styles are named by shape or function (e.g.
`hero-split-media`), never by the page they first appear on. Responsive behaviour MUST use
WP-native breakpoints rather than inventing new ones. A `wp:pattern` slug reference renders
identical static content at every call site — it MUST NOT be reused anywhere the text needs
to vary between instances; use a block variation or per-instance content instead. A new
`is-style` variant MUST NOT be registered for a single-use, one-off treatment with no second
option ever offered — style it inline on the pattern's block attributes instead.

**Rationale**: Page-named patterns and slug-reused static content both silently accumulate
duplication and unfixable content bugs as the page inventory grows — reuse and shape-based
naming keep the pattern library legible as it scales.

### IX. Branch, PR & Changelog Discipline

Feature/fix branches MUST NOT be created directly from a remote-tracking ref (e.g.
`git checkout -b x origin/develop`), which silently sets the wrong upstream and misdirects
pushes; branch creation MUST be verified with `git branch -vv`. `CHANGELOG.md` MUST be
updated for every meaningful change, under `## [Unreleased]`, with each PR receiving its own
dated entry at the time the PR is created — not batched retroactively. The changelog follows
Keep a Changelog and Semantic Versioning.

**Rationale**: Both failure modes are cheap to prevent up front and expensive to unwind
after the fact — a mis-tracked upstream sends work to the wrong branch, and batched
changelog entries lose the per-PR context that makes the history useful.

## Definition of Done

- **A page** is done when: its template/pattern content matches the approved design source
  (Figma or equivalent) at the resolved token level (Principle III), it passes the
  Accessibility Baseline (Principle IV), it has been visually verified in a real
  browser/editor across mobile/tablet/desktop and light/dark (Principle VII — not just
  build/lint passing), and its CHANGELOG entry exists (Principle IX).
- **A shared component** (pattern, template part, block style) is done when it has been
  checked for reuse against the existing library (Principle VIII), uses only resolved,
  parity-checked tokens (Principle III), passes the Accessibility Baseline, and is verified
  in every context it is used, not just its first call site.
- **A release** is done when every included page/component meets the above, site-wide
  integration QA (navigation click-through, forms, search, SEO/redirects) has been
  genuinely exercised, and no test-plan item is checked without having been verified
  (Principle VII).

## Delivery Phase Scope Boundary

The current near-term delivery boundary covers Phase 1 (MVP core pages/templates) and
Phase 2 (Services/Solutions/About subpage depth) page builds, plus the AI Mega Page as the
final item in that boundary. Phase 3 (AI governance, chatbot, structured data) and Phase 4
(full content/legal finalisation) are explicitly deferred, later-sequenced scope — they MUST
NOT be treated as implied or incidental work inside a Phase 1/2 page-build spec. Content and
SEO conventions are intentionally not enumerated in this constitution; they are deferred to
the project's release-level specification (see `TODO(CONTENT_SEO_CONVENTIONS)` above) so
that content strategy can be defined once, at the release-planning layer, rather than
duplicated per implementation spec.

## Governance

This constitution supersedes conflicting ad hoc practice for engineering and design-system
decisions in this repository. `AGENTS.md` remains the operational reference for day-to-day
repo structure and command usage; where the two conflict on a governance-level principle,
this constitution controls and `AGENTS.md` MUST be updated to match.

**Amendment procedure**: Amendments are proposed via `/speckit-constitution`, reviewed by a
human maintainer before being committed, and recorded via the Sync Impact Report at the top
of this file (removed once the amendment is reviewed and merged).

**Versioning policy**: Semantic versioning applies to this document — MAJOR for backward
incompatible principle removal/redefinition, MINOR for a new principle or materially
expanded guidance, PATCH for wording/clarification only.

**Compliance review**: Every spec produced under this constitution (via `/speckit-plan`,
`/speckit-analyze`, `/speckit-converge`) is checked against these principles; a conflict
with a principle here is treated as a blocking finding, not a style suggestion. Principle
changes happen only through this file, never through silent reinterpretation in a spec or
PR.

**Version**: 1.0.0 | **Ratified**: 2026-03-30 | **Last Amended**: 2026-09-16
