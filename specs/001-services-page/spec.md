# Feature Specification: Services Page (Remaining Sections & QA)

**Feature Branch**: `feature/ls-1598-services-page-batch-2`

**Created**: 2026-09-11

**Status**: Draft

**Input**: User description: "Build the Services page (LS-1598) — a hub page explaining the LightSpeed service model, following the confirmed Discover → Create → Build → Launch → Grow → Evolve lifecycle model (LS-1204). Hero, "Linked decisions", and "Service clusters" sections are already built and merged (PR #51); the "Service tiles" section is also already built and merged (PR #54). Remaining scope: build any remaining lifecycle-stage sections/patterns in ls-theme to complete the page content, then design QA against Figma, SEO metadata (title/description), and a responsive check (desktop/tablet/mobile). Reference: https://linear.app/lightspeedwp/issue/LS-1598/design-services-page-build-services-page"

## Clarifications

### Session 2026-09-11

- Q: On the Services page itself, which of the six lifecycle stages still need their own dedicated section built (beyond the already-merged Hero, "Linked decisions," "Service clusters," and "Service tiles" sections)? → A: None — all six lifecycle stages are already fully represented via the merged "Linked decisions" six-step pill row. No lifecycle-stage sections remain to be built.
- Q: What are the two remaining section patterns and the CTA pattern needed to complete the Services page? → A: Section pattern 4 "Entry Points" ([Figma](https://www.figma.com/design/OTqchq3sRBzUy6TICruzc3/LightSpeedWP-Design-System?node-id=8044-164205)), Section pattern 5 "Delivery by the Numbers" ([Figma](https://www.figma.com/design/OTqchq3sRBzUy6TICruzc3/LightSpeedWP-Design-System?node-id=8044-164253)), and a closing CTA pattern ([Figma](https://www.figma.com/design/OTqchq3sRBzUy6TICruzc3/LightSpeedWP-Design-System?node-id=8044-164294)).

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Understand entry points into working with LightSpeed (Priority: P1)

A prospective client who already understands the service lifecycle (via Hero/Linked decisions/Service clusters/Service tiles) needs to know the concrete ways they can actually start engaging — the "Entry Points" section.

**Why this priority**: This is the next unbuilt piece of the page and the primary remaining content gap — without it, a convinced visitor has no clear next step.

**Independent Test**: Load the Services page, scroll to the Entry Points section, and confirm a visitor can identify the distinct ways to begin working with LightSpeed using only on-page content, matching the Figma design.

**Acceptance Scenarios**:

1. **Given** a visitor who has read the earlier Services page sections, **When** they reach the Entry Points section, **Then** they see clearly labeled entry-point options matching the Figma design (node 8044-164205).
2. **Given** an entry-point option is presented, **When** the visitor wants to act on it, **Then** an appropriate link/CTA is provided consistent with the site's existing link/CTA conventions.

---

### User Story 2 - See proof of delivery scale (Priority: P1)

A prospective client wants quick, credible evidence of LightSpeed's track record — the "Delivery by the Numbers" section.

**Why this priority**: This is the second unbuilt content section and reinforces trust before the closing CTA; equally load-bearing as Entry Points for page completeness.

**Independent Test**: Load the Services page, scroll to the Delivery by the Numbers section, and confirm the stated metrics/figures render correctly and match the Figma design.

**Acceptance Scenarios**:

1. **Given** a visitor scrolling the Services page, **When** they reach the Delivery by the Numbers section, **Then** they see the metrics/figures laid out as specified in Figma (node 8044-164253).

---

### User Story 3 - Take action after reading the page (Priority: P1)

A prospective client who has read the full page is ready to act — the closing CTA pattern gives them an unambiguous next step.

**Why this priority**: Without a closing call to action, the page's persuasive work goes nowhere; this is the final piece completing the page.

**Independent Test**: Load the Services page, scroll to the end, and confirm a clear, actionable CTA renders matching the Figma design.

**Acceptance Scenarios**:

1. **Given** a visitor who reaches the bottom of the Services page, **When** they view the closing section, **Then** they see a CTA pattern matching Figma (node 8044-164294) with a working link/action.

---

### User Story 4 - Confirm the page matches the approved design (Priority: P2)

A design reviewer or stakeholder checks the built page against the Figma design to confirm visual and content fidelity before sign-off.

**Why this priority**: Design QA is an explicit acceptance criterion in LS-1598 and gates stakeholder approval.

**Independent Test**: Compare each section of the live page side-by-side with its Figma frame and confirm no unresolved visual discrepancies.

**Acceptance Scenarios**:

1. **Given** the completed Services page, **When** compared section-by-section against Figma, **Then** spacing, typography, color tokens, and content match the design within normal implementation tolerance.
2. **Given** a discrepancy is found during QA, **Then** it is either fixed or explicitly logged as an accepted deviation before the page is considered done.

---

### User Story 5 - View the page correctly on any device (Priority: P2)

A visitor on a phone or tablet views the Services page and all sections, including the new Entry Points, Delivery by the Numbers, and CTA sections, remain legible and usable.

**Why this priority**: Responsive check is an explicit task in LS-1598; a hub page that breaks on mobile fails its core purpose.

**Independent Test**: Load the page at desktop, tablet, and mobile breakpoints and confirm no overlapping, clipped, or unreadable content in any section.

**Acceptance Scenarios**:

1. **Given** the Services page on a mobile viewport, **When** a visitor scrolls through all sections, **Then** all text, images, and interactive elements remain legible and reachable.
2. **Given** the Services page on a tablet viewport, **When** compared to desktop, **Then** layout adapts appropriately without broken grids or overflow.

---

### User Story 6 - Find the page via search with meaningful context (Priority: P3)

A search engine indexes the Services page and a searcher sees a meaningful title and description in results.

**Why this priority**: SEO metadata is an explicit task in LS-1598 but is lower-impact than the on-page content and QA.

**Independent Test**: Inspect the page's title tag and meta description and confirm they accurately summarize the Services page content.

**Acceptance Scenarios**:

1. **Given** the published Services page, **When** its metadata is inspected, **Then** it has a distinct, descriptive title and meta description reflecting the service model hub purpose.

---

### Edge Cases

- What happens if the Entry Points section has more or fewer options than the Figma design currently shows (e.g. a future entry point is added)? The section layout must accommodate at least the Figma-specified count without visual imbalance.
- How does the Delivery by the Numbers section handle a metric value that is significantly longer (e.g. more digits) than the others? Layout must not break or visually unbalance the row when value lengths vary.
- What happens if a visitor's viewport is between defined breakpoints (e.g. a small laptop)? Content must degrade gracefully rather than jump abruptly.

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: The Services page MUST include an "Entry Points" section matching the Figma design (node 8044-164205), presenting the distinct ways a visitor can begin working with LightSpeed.
- **FR-002**: The Services page MUST include a "Delivery by the Numbers" section matching the Figma design (node 8044-164253), presenting delivery-scale metrics/figures.
- **FR-003**: The Services page MUST include a closing CTA section matching the Figma design (node 8044-164294), giving the visitor a clear, actionable next step.
- **FR-004**: The Services page MUST reuse the already-merged Hero, "Linked decisions", "Service clusters", and "Service tiles" sections without duplicating their content or patterns.
- **FR-005**: Each new section (Entry Points, Delivery by the Numbers, CTA) MUST be implemented as a reusable `ls-theme` pattern consistent with existing Services page patterns (naming, semantic color tokens, spacing tokens).
- **FR-006**: The Services page MUST have a unique, descriptive SEO title and meta description reflecting its role as the LightSpeed service-model hub.
- **FR-007**: The Services page MUST render correctly (no overlapping, clipped, or unreadable content) at desktop, tablet, and mobile breakpoints, including the three new sections.
- **FR-008**: The completed page MUST be reviewed against the Figma design for the Services page, with discrepancies resolved or explicitly accepted before sign-off.

### Key Entities

- **Entry Point**: A distinct way a visitor can begin engaging with LightSpeed; has a label, description, and an associated link/action.
- **Delivery Metric**: A single stat/figure in the "Delivery by the Numbers" section; has a value and a label describing what it measures.
- **CTA (Call to Action)**: The page's closing action element; has a heading/description and a primary action link.
- **Service Cluster / Linked Decision / Service Tile** (existing, unchanged): Already-implemented navigational elements from the merged sections; not modified by this feature unless Figma QA finds a defect.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: All three remaining sections (Entry Points, Delivery by the Numbers, CTA) render on the Services page matching their respective Figma frames.
- **SC-002**: The page shows zero unresolved visual discrepancies against Figma at design QA sign-off.
- **SC-003**: The page renders with no layout defects (overlap, clipping, overflow) across desktop, tablet, and mobile breakpoints.
- **SC-004**: The page has a unique title and meta description distinct from every other page on the site.

## Assumptions

- The Figma design referenced in LS-1598 (nodes 8044-164205, 8044-164253, 8044-164294) already reflects the final approved layout and content for the three remaining sections; no new design decisions are being made in this spec.
- Existing `ls-theme` semantic color/typography/spacing tokens are sufficient for the three new sections; no new design tokens are required unless Figma QA reveals a gap.
- The site's existing SEO metadata mechanism (theme/plugin-level) is reused; no new SEO infrastructure is introduced.
