# Phase 0 Research: Services Page (Remaining Sections & QA)

No `[NEEDS CLARIFICATION]` markers remain in the spec or Technical Context — spec.md's
Clarifications session (2026-09-11) already settled the exact scope: three remaining patterns
(Entry Points, Delivery by the Numbers, closing CTA), not generic lifecycle-stage sections.
This document records the key decisions taken from existing repo conventions.

## Decision: Deliver the 3 remaining sections as reusable block patterns

- **Rationale**: `ls-theme` is a block theme; every prior Services page section (Hero, Linked
  decisions, Service clusters, Service tiles) was built as a pattern in `patterns/sections/` or
  `patterns/hero/`. Consistency with established structure, and reviewable against Figma the
  same way PR #51/#54 were.
- **Alternatives considered**: A single monolithic template for the whole page — rejected,
  breaks the established reuse-first pattern convention (constitution Principle II) and
  duplicates work already proven out.

## Decision: Check for a reusable card shell before creating a new one, per section

- **Rationale**: Constitution Principle II requires confirming no existing
  `styles/sections/cards/**` style already fits before creating a new one, and naming any new
  one by shape. Plausible existing-shape candidates to check first:
  - **Entry Points**: `card-link-row.json` (compact, bordered, trailing-arrow link card —
    already used by `homepage-where-to-start.php`/`work-related-routes.php`) is a strong
    candidate if Figma shows a similar simple link-card treatment.
  - **Delivery by the Numbers**: `stat-segment.json` (already used by
    `patterns/section-stats-grid.php`) is a strong candidate for a metrics row.
  - **Closing CTA**: `section-cta.php` already exists as a stub pattern reusing existing
    button/heading conventions — check whether it should be fleshed out directly rather than
    creating a second CTA pattern.
  Each candidate must be confirmed against the actual Figma frame before reuse is assumed.
- **Alternatives considered**: Assuming a new card style is needed for each section without
  checking — rejected, violates Principle II and risks duplicating an existing shape.

## Decision: Style exclusively via theme.json / styles JSON, Sass only for genuine gaps

- **Rationale**: Constitution Principle I mandates theme-first styling; Sass is permitted only
  for what JSON cannot express, with a `// JSON limitation: ...` comment on each such rule.
- **Alternatives considered**: Hand-authored CSS for new sections — rejected, violates the
  constitution and prior explicit team feedback.

## Decision: Reuse existing semantic tokens; only add new tokens with resolved light+dark values if a genuine gap is found during Figma QA

- **Rationale**: Constitution Principle III bans hardcoded/identical light-dark token values;
  existing Services page sections already established a token set likely sufficient for these
  3 sections.
- **Alternatives considered**: Pre-emptively creating new tokens before QA — rejected, adds
  risk of duplicate/unused tokens; confirm the gap first.

## Decision: Icons use `core/icon` with `lightspeed/{slug}`, not `outermost/icon-block`

- **Rationale**: This branch is now based on PR #50 (LS-3229, Core Icon block migration), which
  already converted every sibling Services section (`services-hero.php`,
  `services-linked-decisions.php`, `services-service-clusters.php`) — and, per a prior review
  finding, `services-service-tiles.php` — to `core/icon` referencing the `lightspeed` icon
  collection. Any new section using icons MUST match this, not reintroduce the legacy plugin
  block.
- **Alternatives considered**: Continuing to use `outermost/icon-block` + inline SVG (the
  original convention before LS-3229) — rejected, now inconsistent with every sibling section
  on this exact page.

## Decision: New structural CSS bundles get a real `is_page( 'services' )` enqueue condition immediately

- **Rationale**: Earlier Services sections deferred a head-time condition because the page had
  no stable template yet ("no page template yet (LS-1598 in progress)"). That excuse no longer
  holds — the page's slug (`services`) is already confirmed and already used as a real
  condition for the `work-archive-sections` and `services-service-tiles` bundles (fixed in
  PR #51/#54 review follow-up). New bundles for these 3 sections should use the same condition
  from the start rather than repeating the deferral.
- **Alternatives considered**: Deferring the condition again "until the template exists" —
  rejected; the condition is already knowable, per constitution's Workflow & Process guidance
  on not deferring indefinitely once an answer is known.

## Decision: SEO metadata and responsive QA use existing site-wide mechanisms

- **Rationale**: No custom SEO plugin/infrastructure work is in scope per LS-1598; the site
  already has a metadata mechanism (theme/plugin-level) to reuse.
- **Alternatives considered**: Building custom meta-tag handling in the theme — rejected, out
  of scope and unnecessary.
