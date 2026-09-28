# Feature Specification: Fix WCAG Color-Contrast Accessibility Violations (LS-2934)

**Feature Branch**: `fix/ls-2934-accessibility-color-contrast-fixes`

**Created**: 2026-09-18

**Status**: Draft

**Input**: User description: "Fix WCAG color-contrast accessibility violations (LS-2934). Fix two confirmed color-contrast accessibility violations (WCAG 2 AA, `color-contrast` axe rule, 'serious' impact) identified by the standing Playwright accessibility suite and tracked as BugHerd task #231 (epic LS-2934, all sub-issues complete — these fixes close out the epic). Scope: (1) image caption text unreadable on dark-background posts across three published posts, (2) active taxonomy filter pill fails contrast on the blog page. Fixes must be token-based (no hardcoded hex), theme-first per AGENTS.md, with light/dark token parity for any new token. Verification via scoped single-page accessibility test re-runs against DEV without creating new BugHerd tasks. Out of scope: broken CSS asset issues (#233/#235/#236/#241), other axe violation categories, full-suite runs."

## Clarifications

### Session 2026-09-18

- Q: Should verification for this feature also confirm the caption-contrast fix works on other dark-background posts beyond the 3 already flagged, or only on those exact 3 posts? → A: Verify only the 4 originally-flagged URLs; sitewide inheritance is a design property of the fix (applied at the shared style/token level), not something separately tested.

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Readable image captions on dark-background posts (Priority: P1)

A site visitor with low vision or in a bright-light environment reads a blog post rendered with a dark background (e.g. a release-notes or company-update post) and needs to read the caption text under each embedded image without straining to make out the text against the background.

**Why this priority**: This affects the highest volume of flagged violation nodes (16 on one page alone) and spans multiple published, publicly-indexed posts — it's the most visible and widest-reaching of the two issues.

**Independent Test**: Load any of the three affected posts on DEV, run an automated contrast scan restricted to that single page, and confirm the caption text under each image meets the WCAG AA 4.5:1 minimum contrast ratio against its dark background. Can be verified and shipped independently of User Story 2.

**Acceptance Scenarios**:

1. **Given** a published post using the theme's dark background style, **When** the post renders an image with a caption, **Then** the caption text has a contrast ratio of at least 4.5:1 against the dark background.
2. **Given** the three currently-affected posts (`/lightspeed-remote-workspaces-2016/`, `/lsx-version-1-3-0-released/`, `/lsx-version-1-2-5-released/`), **When** each is scanned individually, **Then** zero serious/critical color-contrast violations are reported for caption elements.
3. **Given** a post using the theme's light/default background style, **When** the post renders an image with a caption, **Then** the caption text remains readable and unaffected by this change (no regression to light-background captions).

---

### User Story 2 - Readable active filter state on the blog page (Priority: P2)

A site visitor browsing the blog page applies or views the currently-active category/taxonomy filter ("All" or another filter pill) and needs to clearly read which filter is currently selected.

**Why this priority**: Narrower in scope (one page, one interactive element) than User Story 1, but still a "serious" impact violation on a high-traffic page (the blog listing).

**Independent Test**: Load `/blog/` on DEV, run an automated contrast scan restricted to that single page, and confirm the active filter pill's text meets the WCAG AA 4.5:1 minimum contrast ratio against its background. Can be verified and shipped independently of User Story 1.

**Acceptance Scenarios**:

1. **Given** the blog page with a filter pill in its active/selected state, **When** the page is scanned, **Then** the active pill's text has a contrast ratio of at least 4.5:1 against its background color.
2. **Given** a filter pill in its default (non-active, non-hover) state, **When** the page is scanned, **Then** its existing contrast behavior is unaffected by this change.
3. **Given** a filter pill in its hover state, **When** a user hovers over it, **Then** its existing hover contrast behavior is unaffected by this change.

---

### Edge Cases

- What happens on a post that uses a dark background but has no images/captions at all? (No caption elements exist, so no violation applies — not a regression risk.)
- What happens if a future post reuses the same dark-background style variation? (The caption color fix must apply theme-wide/sitewide to that style, not be patched per-post, so newly published posts inherit the fix automatically.)
- What happens to the color-scheme in dark mode / the site's dark style variation, if distinct from the "dark background post" style? (Any new or adjusted token must carry correct, distinct values in both the light (`theme.json`) and dark (`styles/dark.json`) definitions — never the same value duplicated in both.)
- What happens to other elements sharing the same tokens being adjusted (e.g. other components using the `text--on-dark` or `card--platform--wordpress` tokens elsewhere on the site)? (Must be checked for unintended contrast regressions before the token itself is changed; if a shared token can't be safely adjusted without side effects, a new token is introduced instead of modifying the shared one.)

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: Image captions rendered on posts using the theme's dark-background post style MUST have a text-to-background contrast ratio of at least 4.5:1 (WCAG 2 AA, normal text).
- **FR-002**: The active/selected state of the blog page's taxonomy filter pill MUST have a text-to-background contrast ratio of at least 4.5:1 (WCAG 2 AA, normal text).
- **FR-003**: All color values used to satisfy FR-001 and FR-002 MUST be defined as semantic design tokens (not hardcoded color values), consistent with the theme's existing token-based color system.
- **FR-004**: Any new color token introduced to satisfy FR-001 or FR-002 MUST define both a light-mode value and a dark-mode value, and the two values MUST NOT be identical.
- **FR-005**: The fixes MUST NOT alter the visual layout, spacing, or structural positioning of captions or filter pills — only color values may change.
- **FR-006**: The fixes MUST NOT alter the appearance of image captions on light-background posts, or the default/hover states of filter pills, unless doing so is required to meet FR-001/FR-002.
- **FR-007**: Verification of both fixes MUST be performed against the same live environment (DEV) and exact URLs where the violations were originally observed, using a scoped, single-page test method that does not trigger creation of new externally-tracked bug-report tasks.
- **FR-008**: Verification MUST confirm zero serious/critical color-contrast violations remain on each of the four affected URLs after the fixes are applied.

### Key Entities

- **Post (dark-background style)**: A published blog/content post rendered using the theme's dark background visual style; contains zero or more embedded images with captions.
- **Image Caption**: Text associated with an embedded image within a post's content; inherits a text color that must remain readable against its post's background.
- **Taxonomy Filter Pill**: An interactive, clickable filter control on the blog listing page representing a content category/taxonomy; has distinct visual states (default, active/selected, hover), each with its own color combination.
- **Color Token**: A named, reusable design value representing a color, defined once with a light-mode value and a corresponding dark-mode value, consumed by multiple components/styles across the site.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: 100% of the previously-flagged color-contrast violation nodes (9 total, across the 4 affected URLs) no longer appear in an automated accessibility scan of those same URLs.
- **SC-002**: The caption-contrast fix is applied at the shared style/token level so that any post using the dark-background style — including ones published after this feature ships — inherits a passing 4.5:1 contrast ratio by construction; verification itself is scoped to the 4 originally-flagged URLs (see SC-001), not a sitewide audit.
- **SC-003**: Zero new color-contrast violations are introduced on light-background posts or on the blog page's default/hover filter states as a result of these changes.
- **SC-004**: Verification testing produces zero new externally-tracked bug reports as a side effect of running the checks.

## Assumptions

- The two violations share no common root cause and are treated as independently fixable and independently verifiable (per the two user stories).
- "Dark-background posts" refers to the theme's existing dark post-background style already in use by the three affected posts; no new visual style is being introduced.
- Where an existing color token already provides sufficient contrast for a given use, it will be reused rather than creating a new token, consistent with the theme's existing token library conventions.
- The broken-CSS-asset issue tracked separately (BugHerd #233 and its duplicates #235/#236/#241) is unrelated to color contrast and is explicitly out of scope for this feature.
- Only the "serious/critical" `color-contrast` axe violation category is in scope; no other accessibility rule categories are addressed by this feature.
- Fixing these two issues satisfies the remaining open work under epic LS-2934, whose other sub-issues are already complete.
- "Light-background posts" are not currently a live, separately-selectable context on this site — the whole site uses one active global style variation (`theme.json` or `styles/dark.json`) at a time, and no template or existing sibling component (e.g. `taxonomy-filter.scss`) scopes color rules per-post for light vs. dark. FR-006 and User Story 1's Acceptance Scenario 3 are preserved as a forward-looking safeguard for if/when a future post or block-level override introduces a lighter local background, but today there is no live light-background post on DEV to manually regression-check against.
