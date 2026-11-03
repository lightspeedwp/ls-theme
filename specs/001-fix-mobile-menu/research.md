# Phase 0 Research: Fix Mobile Menu — Restore Links and Remove Systems

## R1: Root cause of unclickable mobile menu links

**Decision**: Investigate and fix at the CSS/markup layer during implementation, prioritizing the
`.is-style-mega-menu-item-service` stretched-link overlay as the primary suspect, with a documented
fallback checklist if that's not the actual cause.

**Rationale**: Direct source inspection surfaced a concrete, high-probability cause:

- `src/scss/structural/_mega-menu.scss` (`.is-style-mega-menu-item-service`) implements a
  "stretched-link" pattern: `position: relative` on the row (a `<p>`), with `a::after { content: "";
  position: absolute; inset: 0; z-index: 1; }` on the link, so the whole row (not just the text) is
  tappable. This is the style class used for **every** page-list link inside the mobile menu's
  Work/Solutions/Pricing/Insights/About accordions and the Services phase columns
  (`styles/blocks/groups/mega-menu-item-service.json` description confirms this explicitly).
- The same file's comments record a prior, related bug: a selector that assumed a
  `.wp-block-paragraph` prefix never matched real WordPress-rendered markup, silently making the
  stretched-link behavior "inert" for Services rows until it was corrected. This shows the
  stretched-link wiring in this exact area has broken before due to selector/specificity mismatches
  between the mobile grid layout (`.ls-simple-submenu-links`, `columnCount: 2`) and this shared style.
- Because the `<details>`/`<summary>` accordion (`.mobile-menu-accordion.is-style-mobile-menu-accordion`)
  and its motion rules (`_details-motion.scss`) apply transitions and open/close state changes, a
  secondary candidate is a transform/opacity/pointer-events state left over from the open animation
  (e.g., content still `pointer-events: none` or clipped by `overflow: hidden` mid- or
  post-transition) — this pattern exists elsewhere in the codebase (`assets/css/gsap-animations.min.css`
  uses `pointer-events: none` for pre-animation states).

**Investigation checklist for implementation** (to run in a mobile viewport / device emulator on dev):

1. Open the mobile menu, expand an accordion (e.g. "Work"), and inspect a link's computed styles —
   confirm whether the link itself, its `::after` overlay, or an ancestor (`<details>` content wrapper,
   `.wp-block-navigation__responsive-container-content`) has `pointer-events: none`, a `z-index` stacking
   issue, or zero/negative dimensions after the open transition finishes.
2. Confirm whether the `::after` stretched-link overlay's `inset: 0` on `.is-style-mega-menu-item-service`
   resolves against the intended row (`position: relative` parent = the `<p>`) on mobile's 2-column
   grid layout, or whether grid sizing causes it to sit outside/behind the visible row.
3. Check whether the core Navigation block's `.wp-block-navigation__responsive-container` overlay
   itself (or a sibling element) sits above the menu content in stacking order while `is-menu-open`,
   intercepting pointer events before they reach any link.
4. Rule out a JS/GSAP timing issue (`_mobile-menu-motion.scss`, `_details-motion.scss`,
   `_menu-motion.scss`) where the drawer is visually open but an animation-driven class/style hasn't
   been cleared yet.

**Alternatives considered**:
- *Rewrite the mobile menu markup/interactivity from scratch*: rejected — the structure (core
  Navigation + `<details>` accordions + stretched-link rows) is sound and used consistently elsewhere
  in the theme; a full rewrite is disproportionate to a targeted click-through bug and risks violating
  the project's PHP/markup minimalism principle.
- *Add a JS click handler as a workaround*: rejected — this is a WordPress block theme following a
  theme-first, JSON/CSS-driven approach (AGENTS.md); introducing new JS to patch a CSS-caused problem
  would fight the existing architecture rather than fix the underlying stacking/selector issue.

## R2: Removing the "Systems" menu item

**Decision**: Remove the `mobile-menu-link-row` paragraph block containing the `/systems/` link
(`parts/mobile-menu.html` lines 214–216) entirely, plus its corresponding entry in the WordPress
navigation menu (Appearance → Menus) or wherever the desktop equivalent is sourced from, if one exists,
so the removal is consistent across breakpoints.

**Rationale**: The row is a standalone `<p class="mobile-menu-link-row is-style-mobile-menu-link-row">`
sibling between the "Services" and "Pricing" accordions — not nested inside a dropdown — so it can be
deleted without restructuring any accordion or grid.

**Alternatives considered**:
- *Hide via CSS (`display: none`)*: rejected — leaves dead markup and an orphaned link in the DOM,
  contrary to the acceptance criteria ("Systems' menu item no longer appears") and PHP/markup
  minimalism.
- *Repoint the link to a working destination instead of removing it*: rejected — LS-3222 explicitly
  scopes this as removal ("remove the non-functional 'Systems' menu item"), not a redirect/relaunch.

## R3: Reducing padding on mobile dropdown page lists

**Decision**: Reduce the `spacing.padding` values in
`styles/blocks/groups/mega-menu-item-service.json` (currently `var:preset|spacing|10` on all sides)
to the next-smaller existing spacing preset, applied consistently since this style is shared between
desktop Services rows and every mobile dropdown page-list row.

**Rationale**: This JSON partial is the actual, already-JSON-registered source of the padding
visitors see around each page-list link (confirmed via block markup: every page-list `<p>` carries
`className: is-style-mega-menu-item-service`). Editing it here follows the theme-first approach
(AGENTS.md) instead of adding a new SCSS override, and needs no new selector or `!important` hacks.

**Constraint carried forward**: Because this style is shared with desktop Services dropdown rows,
the padding change must be verified on both mobile and desktop to confirm it doesn't make desktop
rows feel cramped — if desktop needs to stay as-is, a mobile-only override may be needed instead
(e.g. a scoped rule in `_mobile-menu-motion.scss`/`_mega-menu.scss` for `.mobile-menu-accordion
.is-style-mega-menu-item-service`, keeping the JSON default for desktop). This decision will be
finalized once padding is visually verified in Phase 1/implementation.

**Alternatives considered**:
- *Reduce the grid `blockGap` instead of per-item padding*: rejected as the sole fix — LS-3222 asks
  specifically for padding "around" list items, and `blockGap` only affects spacing *between* items,
  not the padding inside each tappable row.
- *Introduce a brand-new smaller spacing token*: rejected — the theme.json spacing scale already has
  smaller presets available; adding a new token for a single use would violate the "reuse existing
  tokens" convention and this project's token-reuse memory guidance.

## Summary of unresolved items carried into implementation

None block planning. Two items are explicitly flagged for confirmation during implementation/QA
rather than left as open specification questions:
- Final root cause of the click-through failure (R1) — the investigation checklist above will
  confirm which of the candidate causes applies before a fix is written.
- Whether the padding reduction (R3) can be a single shared JSON change or needs a mobile-only
  scoped override to avoid affecting desktop Services rows.
