# Phase 1 Data Model: Fix Mobile Menu — Restore Links and Remove Systems

This feature has no persisted data, database schema, or state transitions — it is a front-end
markup/CSS fix to a static WordPress template part. The "entities" below describe the structural
concepts in the markup, for traceability against the functional requirements in
[spec.md](./spec.md), not a data model in the traditional sense.

## Mobile Menu

**Represents**: The collapsible mobile navigation surface rendered inside WordPress core's
Navigation block responsive/overlay container.

**Source**: `parts/mobile-menu.html`

**Key attributes**:
- Brand row (logo)
- A sequence of top-level entries, each either:
  - An accordion (`<details class="mobile-menu-accordion is-style-mobile-menu-accordion">`) containing
    a page-list dropdown, or
  - A standalone link row (`mobile-menu-link-row`)
- A trailing actions block (buttons: "Start a project", "Explore case studies")

**Relationships**: Contains one or more Menu Items (below); wrapped by core's
`.wp-block-navigation__responsive-container` overlay when open.

## Menu Item

**Represents**: A single navigable entry, either top-level or nested inside an accordion's page list.

**Variants present in `parts/mobile-menu.html`**:
- **Accordion group** — `<details>` with a `<summary>` label (Work, Solutions, Services, Pricing,
  Insights, About), containing a page-list grid (`.ls-simple-submenu-links` or, for Services, phase
  groups `.ls-services-phase-links`) of individual link rows styled `is-style-mega-menu-item-service`,
  plus a trailing "See all …" link styled `is-style-link-arrow-accent`.
- **Standalone link row** — a bare `<p class="mobile-menu-link-row is-style-mobile-menu-link-row">`
  containing one `<a>`, used for "Systems" (to be removed) and "Contact" (unaffected).

**Key attributes**: label text, `href` destination, containing style class (determines padding/hover
behavior/hit-area via `styles/blocks/groups/mega-menu-item-service.json` and related JSON partials).

**Validation rule (from FR-001/FR-002)**: every `<a>` inside the mobile menu must remain reachable and
clickable regardless of which variant/style class it uses.

## Systems Item (removed)

**Represents**: The specific standalone link row (`href="/systems/"`, label "Systems") at
`parts/mobile-menu.html` lines 214–216, sitting between the "Services" and "Pricing" accordions.

**Lifecycle**: Deleted outright (see [research.md](./research.md) R2) — not hidden, not repointed.
No other menu item depends on or nests inside it, so removal has no cascading structural impact.
