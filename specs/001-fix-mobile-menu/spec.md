# Feature Specification: Fix Mobile Menu — Restore Links and Remove Systems

**Feature Branch**: `feature/ls-3222-fix-mobile-menu-restore-links-and-remove-systems`

**Created**: 2026-09-14

**Status**: Draft

**Input**: User description: "LS-3222: Fix mobile menu — restore clickable links, remove the non-functional \"Systems\" menu item, and reduce padding around page lists in the mobile dropdown menu."

**Linear Issue**: [LS-3222](https://linear.app/lightspeedwp/issue/LS-3222/fix-mobile-menu-restore-links-and-remove-systems)

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Tap a mobile menu link to navigate (Priority: P1)

A visitor on a mobile device opens the site's mobile menu and taps a link (e.g. Work, Blog, Contact). The link responds to the tap and navigates to the correct page.

**Why this priority**: This is the core defect — mobile menu links are currently not clickable, which blocks all mobile navigation. Nothing else matters if visitors can't get anywhere.

**Independent Test**: On a mobile viewport (320px/375px), open the mobile menu and tap each top-level link and each page link inside an expanded dropdown; confirm each one navigates to its expected destination with no dead taps.

**Acceptance Scenarios**:

1. **Given** the mobile menu is open, **When** a visitor taps a top-level menu link, **Then** the browser navigates to that link's destination.
2. **Given** a mobile dropdown (page list) is expanded, **When** a visitor taps a link inside it, **Then** the browser navigates to that link's destination.
3. **Given** the mobile menu is open, **When** a visitor taps a link, **Then** no JavaScript console errors are produced.
4. **Given** a top-level accordion row contains both a label link and a disclosure toggle, **When** a visitor activates the label (pointer tap/click, or keyboard Enter while the label has focus), **Then** the browser navigates to that label's overview page; **When** a visitor activates the row's toggle area instead (pointer tap/click elsewhere in the row, or keyboard Enter/Space while the row itself has focus), **Then** the dropdown expands or collapses without navigating away.

---

### User Story 2 - Systems item no longer appears (Priority: P2)

A visitor opens the mobile menu and no longer sees the non-functional "Systems" menu item that previously led nowhere useful.

**Why this priority**: A dead menu item erodes trust and clutters navigation, but it's a secondary issue to the broken links in User Story 1.

**Independent Test**: Open the mobile menu on a mobile viewport and confirm "Systems" does not appear anywhere in the menu, including inside any expanded dropdown.

**Acceptance Scenarios**:

1. **Given** the mobile menu is open, **When** a visitor scans the menu items, **Then** "Systems" is not present at any level.
2. **Given** the site's primary/mobile navigation menu is edited going forward, **When** the menu is rendered on mobile, **Then** no orphaned reference to the removed "Systems" item causes an error or empty entry.

---

### User Story 3 - Comfortable spacing in mobile page-list dropdowns (Priority: P3)

A visitor expands a mobile dropdown containing a list of pages and finds the list visually tight but readable, without excessive padding pushing items off-screen or requiring extra scrolling.

**Why this priority**: A visual polish/density issue — it doesn't block navigation, but it affects usability and how much of the menu is visible at once on small screens.

**Independent Test**: On a 320px/375px viewport, expand a mobile dropdown with a page list and confirm the padding around list items is visibly reduced compared to the current implementation, while links remain easily tappable (no overlapping tap targets).

**Acceptance Scenarios**:

1. **Given** a mobile dropdown page list is expanded, **When** compared to its current padding, **Then** the padding around each page-list item is reduced.
2. **Given** the reduced padding, **When** a visitor taps a page-list link, **Then** the tap target remains large enough to hit reliably (no accidental mis-taps on adjacent items).

---

### Edge Cases

- What happens when the mobile menu contains a dropdown with only one page link after "Systems" is removed — does the dropdown still render correctly (not empty, no broken toggle)?
- How does the menu behave if a visitor taps a link immediately as the mobile menu's open/close animation is still running (link should still be tappable, not blocked by a transitional overlay or pointer-events lock)?
- What happens on very small viewports (320px) where reduced padding could bring tap targets too close together?
- How does the menu render if JavaScript fails to load (menu should still allow basic keyboard/no-JS fallback navigation where feasible, or fail gracefully without leaving links inert)?

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: The mobile menu MUST allow every top-level navigation link to be tapped/clicked and navigate to its target URL.
- **FR-002**: The mobile menu MUST allow every link inside an expanded dropdown (page list) to be tapped/clicked and navigate to its target URL.
- **FR-003**: The mobile menu MUST NOT contain a "Systems" menu item at any level (top-level or within a dropdown).
- **FR-004**: The mobile dropdown page lists MUST use reduced vertical/horizontal padding around each list item compared to the current implementation, while keeping tap targets large enough for reliable mobile interaction.
- **FR-005**: Interacting with the mobile menu (opening, expanding a dropdown, tapping a link) MUST NOT produce any browser console errors.
- **FR-006**: The mobile menu MUST function correctly at both 320px and 375px viewport widths.
- **FR-007**: Removing the "Systems" item MUST NOT leave an empty or broken dropdown, orphaned divider, or layout gap in its place.

### Key Entities

- **Mobile Menu**: The collapsible navigation surface shown on mobile breakpoints (`parts/mobile-menu.html` and any related mega/dropdown menu parts), containing top-level links and expandable page-list dropdowns.
- **Menu Item**: A single navigable entry in the mobile menu, either top-level or nested inside a dropdown page list.
- **Systems Item**: The specific non-functional menu item to be removed from the mobile menu (and its underlying menu location entry, if it originates from a WordPress nav menu assignment).

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: 100% of mobile menu links (top-level and within dropdowns) successfully navigate to their intended destination when tapped, verified at 320px and 375px.
- **SC-002**: The "Systems" item no longer appears anywhere in the mobile menu, verified by manual inspection on dev.
- **SC-003**: Zero new browser console errors are introduced by interacting with the mobile menu, verified via manual QA on dev.
- **SC-004**: Visible padding around mobile dropdown page-list items is measurably reduced from its current value, while every link's tap target meets or exceeds the WCAG 2.2 AA target-size minimum (24×24 CSS px, SC 2.5.8) — verified by measuring each link's rendered bounding box in DevTools at 320px and 375px.

## Assumptions

- The mobile menu markup and behavior live primarily in `parts/mobile-menu.html` (and related mega-menu parts such as `parts/solutions-mega-menu.html`), and the broken-link behavior is caused by CSS/markup/JS in the theme rather than by a third-party plugin.
- "Systems" refers to a specific existing WordPress nav menu item (or hardcoded link) that currently renders but does not lead to a working/relevant page; removing it means removing its menu entry rather than fixing its destination.
- No new navigation items or IA changes are in scope — this is a fix/cleanup of existing menu items only.
- "Reduce padding" means adjusting existing spacing tokens/values already used in the theme's CSS, not introducing a new design system or spacing scale.
- Testing is manual on the dev environment (LightSpeedWP.Agency) across mobile breakpoints. An automated suite already exists (`tests/specs/navigation.spec.ts`) covering mobile menu open/close and accordion toggle at 375px; it does not yet assert link destinations or 320px, so those remain manual-QA gaps rather than untested-by-default.
- This spec covers the mobile menu only; desktop navigation is out of scope unless the same root cause affects it.
