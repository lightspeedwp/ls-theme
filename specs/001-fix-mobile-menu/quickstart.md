# Quickstart: Validate the Mobile Menu Fix (LS-3222)

This is a manual verification guide — this feature has no API/CLI/service contract to test against
(see [plan.md](./plan.md) Project Structure note), so validation is done in a browser/device emulator
against the dev environment.

## Prerequisites

- Local or dev WordPress environment running `ls-theme` with the changes from this feature applied.
- A way to emulate mobile viewports: browser DevTools device toolbar (Chrome/Firefox/Safari) at
  minimum 320px and 375px widths, plus one real mobile device if available.
- Browser DevTools console open to watch for JS errors.

## Setup

1. Check out/pull the branch for this feature (`001-fix-mobile-menu` / the Linear branch
   `feature/ls-3222-fix-mobile-menu-restore-links-and-remove-systems`).
2. Ensure theme assets are built if `assets/css/*.css` is generated from `src/scss/**`
   (follow the repo's existing build command — do not hand-edit `assets/css/*.css`).
3. Load the site's home page (or any page with the global header) in the browser.

## Validation Scenarios

### 1. Mobile menu links are clickable (FR-001, FR-002, SC-001)

1. Resize the viewport to 375px, then 320px.
2. Open the mobile menu (hamburger/menu toggle in the header).
3. For each top-level accordion (Work, Solutions, Services, Pricing, Insights, About):
   - Expand it.
   - Tap/click every link inside the page-list grid.
   - Tap/click the trailing "See all …" link.
   - **Expected**: each tap navigates to the linked page. No dead taps.
4. Tap/click the standalone "Contact" link row.
   - **Expected**: navigates to `/contact/`.
5. Tap/click both action buttons ("Start a project", "Explore case studies").
   - **Expected**: each navigates correctly.

### 2. "Systems" item is gone (FR-003, FR-007, SC-002)

1. With the mobile menu open at 375px and 320px, scan every top-level row and every expanded
   accordion's page list.
   - **Expected**: no "Systems" label or `/systems/` link appears anywhere.
2. Confirm there is no empty gap, stray divider, or broken spacing where the row used to sit
   (between "Services" and "Pricing").

### 3. No console errors (FR-005, SC-003)

1. With DevTools console open, repeat scenario 1 (open menu, expand each accordion, tap several
   links).
   - **Expected**: zero new errors or warnings logged as a result of these interactions.

### 4. Reduced, still-tappable padding (FR-004, SC-004)

1. At 320px and 375px, expand any accordion's page-list grid.
2. Visually compare item padding against the pre-fix baseline (or against the values recorded in
   [research.md](./research.md) R3, e.g. `styles/blocks/groups/mega-menu-item-service.json`).
   - **Expected**: visibly tighter padding than before.
3. Attempt to tap each link, including links immediately adjacent to one another in the 2-column
   grid.
   - **Expected**: no accidental mis-taps on a neighboring link; every tap target still feels
     comfortably sized (informal WCAG 2.2 AA target-size sanity check).

### 5. Breakpoint sanity (FR-006)

- Repeat scenarios 1–4 at exactly 320px and exactly 375px (not just "mobile-ish" widths), since
  these are the two acceptance-criteria breakpoints called out in the Linear issue.

## Sign-off

All five scenarios passing on dev, across both 320px and 375px, with a clean console, is the
Definition of Done bar for LS-3222's client-facing acceptance criteria. PR review and merge to
`develop` follow the repo's normal PR process (see AGENTS.md).
