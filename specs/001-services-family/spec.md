# Feature Specification: Services Family Pages

**Feature Branch**: `001-services-family`

**Created**: 2026-09-16

**Status**: Draft

**Input**: User description: "Services Family batch: build out the LightSpeed Services section of the site. Covers 7 pages as separate user stories: Services hub (already in progress), Discovery, Design, Development, Hosting, Support, and AI Services subpages. Batch 1 of 7 in the release plan, highest priority. Governed by the project constitution and release-level plan."

## Context

This is Batch 1 of 7 delivery batches defined in `.specify/memory/release-plan.md`, the
highest-priority batch. It is governed by `.specify/memory/constitution.md` v1.0.0 — the
ls-theme/ls-plugin ownership split, accessibility/token/QA principles, and the page-level
Definition of Done all apply to every user story below.

**Scope correction (2026-09-16)**: the original description undercounted this batch. The
Services section is not a flat hub + 6 subpages — it is a **hub → 6 lifecycle-phase pages
(Discover, Create, Build, Launch, Grow, Evolve) → 14 service pages grouped under those
phases** structure, confirmed directly against the live design and the dev site. A client
can engage LightSpeed for one service, one whole phase, several phases, or all phases. Of
the 14 service pages, only 6 had existing Linear issues; the other 8 plus all 6 phase pages
had no issue at all and have been created (LS-4179–LS-4192) to close that gap. This batch is
therefore **21 pages**, not 7.

**Non-goals**: Solutions family, About family, and AI Mega Page content are separate batches
and out of scope here. Phase 3 AI governance/chatbot functionality and Phase 4 content
finalisation are out of scope for the whole release, not just this batch.

**Design source timing**: no visual design reference (Figma frame) is attached to this spec.
Each page-build user story's implementation carries its own explicit prerequisite to request
the relevant frame from the site owner before implementation of that page begins — this is a
deliberate, structural part of the eventual task breakdown, not a gap in this document.

## Clarifications

### Session 2026-09-16

- Q: Since every service subpage's call-to-action points to Free Consultation or Contact — pages that live in the Shared Foundations batch, not this one — how should this batch handle those links while Shared Foundations doesn't exist yet? → A: Free Consultation already exists on dev (`https://ls-agency.lightspeedwp.dev/free-consultation/`) — CTAs link to it directly now, no placeholder needed. For any CTA target not yet built (e.g. Contact, if not yet live on dev), point directly at the final intended URL; an unresolved link during active dev-site work is an expected, non-blocking state, not a public-facing defect.
- Q: Should the Services hub page ship linking to all six subpages immediately, even before those subpages are built, or should each link only appear once its target exists? → A: All target pages (hub, phases, and all 14 service pages) already exist on the dev site as real pages — most already have content, some are currently blank. Ship all links now; an unresolved/blank target is expected in-progress dev state, not a defect.
- Q: Are the six lifecycle-stage pages (Discover, Create, Build, Launch, Grow, Evolve) legacy/prototype content unrelated to this batch? → A: No — they are new content and are the **parent pages** of the service pages. Each phase groups one or more services: Discover → Discovery; Create → Content, Design; Build → Development, Migrations; Launch → Hosting, Performance, Security, Training; Grow → Support, SEO, Accessibility, Email Marketing; Evolve → AI. Clients can purchase a single service, an entire phase, several phases, or all phases. This is confirmed against the live design and against dev-site page hierarchy (all service pages currently sit as flat children of the Services hub, not yet reparented under their phase — see Assumptions).

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Services Hub Page (Priority: P1)

A site visitor evaluating LightSpeed lands on the Services hub page and understands, at a
glance, the full service model — the six lifecycle phases (Discover, Create, Build, Launch,
Grow, Evolve) and that each phase groups one or more specific services — and can navigate
from the hub to any phase or any individual service.

This page already has in-progress implementation work (existing PRs against LS-1598). This
user story describes the page's intended current state so that planning retro-fits against
what already exists rather than treating it as a from-scratch build.

**Why this priority**: The hub is the entry point for every phase and service page in this
batch; without it, none of them have a discoverable path from top-level navigation.

**Independent Test**: Can be fully tested by visiting the Services hub page directly and
confirming it explains the phase model and links correctly to all six phase pages.

**Acceptance Scenarios**:

1. **Given** a visitor on the Services hub page, **When** they read the page, **Then** they
   can identify all six lifecycle phases and understand that each groups specific services.
2. **Given** a visitor on the Services hub page, **When** they select a phase, **Then** they
   are taken to that phase's page.
3. **Given** a visitor viewing the page on a phone, tablet, or desktop, in light or dark
   mode, **When** they view any section of the page, **Then** content remains legible and
   fully usable in every combination.

---

### User Story 2 - Discover Phase (Priority: P2)

A visitor exploring the Discover phase reads the Discover phase page and understands that it
covers the Discovery service, and can navigate directly to it.

**Why this priority**: Discover is the first lifecycle phase; it is also the simplest phase
in this batch (single service), making it a low-risk first phase-page build to validate the
phase-page pattern before the more complex phases.

**Independent Test**: Can be fully tested by visiting the Discover phase page directly and
confirming it explains the phase and links to the Discovery service page.

**Acceptance Scenarios**:

1. **Given** a visitor on the Discover phase page, **When** they read the page, **Then**
   they understand what the Discover phase covers and that it can be engaged on its own.
2. **Given** a visitor on the Discover phase page, **When** they look for the underlying
   service, **Then** a link to the Discovery service page is present and correct.
3. **Given** a visitor on the Discovery service page, **When** they read it, **Then** they
   understand the scope and output of a discovery/audit engagement, independent of whether
   they arrived via the phase page or directly.

---

### User Story 3 - Create Phase (Priority: P3)

A visitor exploring the Create phase reads the Create phase page and understands that it
covers Content and Design services, and can navigate to either.

**Why this priority**: Create is the second lifecycle phase.

**Independent Test**: Can be fully tested by visiting the Create phase page directly and
confirming it explains the phase and links to both the Content and Design service pages.

**Acceptance Scenarios**:

1. **Given** a visitor on the Create phase page, **When** they read the page, **Then** they
   understand the Create phase groups Content and Design.
2. **Given** a visitor on the Create phase page, **When** they look for either underlying
   service, **Then** links to both the Content and Design service pages are present and
   correct.
3. **Given** a visitor on the Content or Design service page, **When** they read it, **Then**
   they understand that service's own scope, independent of the phase page.

---

### User Story 4 - Build Phase (Priority: P4)

A visitor exploring the Build phase reads the Build phase page and understands that it
covers Development and Migrations services, and can navigate to either.

**Why this priority**: Build is the third lifecycle phase.

**Independent Test**: Can be fully tested by visiting the Build phase page directly and
confirming it explains the phase and links to both the Development and Migrations service
pages.

**Acceptance Scenarios**:

1. **Given** a visitor on the Build phase page, **When** they read the page, **Then** they
   understand the Build phase groups Development and Migrations.
2. **Given** a visitor on the Build phase page, **When** they look for either underlying
   service, **Then** links to both the Development and Migrations service pages are present
   and correct.
3. **Given** a visitor on the Development or Migrations service page, **When** they read it,
   **Then** they understand that service's own scope, independent of the phase page.

---

### User Story 5 - Launch Phase (Priority: P5)

A visitor exploring the Launch phase reads the Launch phase page and understands that it
covers Hosting, Performance, Security, and Training services, and can navigate to any of
them.

**Why this priority**: Launch is the fourth lifecycle phase, and the largest phase in this
batch (four services), making it the highest-effort single phase to build.

**Independent Test**: Can be fully tested by visiting the Launch phase page directly and
confirming it explains the phase and links to all four service pages.

**Acceptance Scenarios**:

1. **Given** a visitor on the Launch phase page, **When** they read the page, **Then** they
   understand the Launch phase groups Hosting, Performance, Security, and Training.
2. **Given** a visitor on the Launch phase page, **When** they look for any underlying
   service, **Then** links to all four service pages are present and correct.
3. **Given** a visitor on any of the four service pages, **When** they read it, **Then**
   they understand that service's own scope, independent of the phase page.

---

### User Story 6 - Grow Phase (Priority: P6)

A visitor exploring the Grow phase reads the Grow phase page and understands that it covers
Support, SEO, Accessibility, and Email Marketing services, and can navigate to any of them.

**Why this priority**: Grow is the fifth lifecycle phase, also a four-service phase.

**Independent Test**: Can be fully tested by visiting the Grow phase page directly and
confirming it explains the phase and links to all four service pages.

**Acceptance Scenarios**:

1. **Given** a visitor on the Grow phase page, **When** they read the page, **Then** they
   understand the Grow phase groups Support, SEO, Accessibility, and Email Marketing.
2. **Given** a visitor on the Grow phase page, **When** they look for any underlying
   service, **Then** links to all four service pages are present and correct.
3. **Given** a visitor on any of the four service pages, **When** they read it, **Then**
   they understand that service's own scope, independent of the phase page.

---

### User Story 7 - Evolve Phase / AI Services (Priority: P7)

A visitor exploring the Evolve phase reads the Evolve phase page and understands that it
covers the AI service, and can navigate directly to it.

**Why this priority**: Lowest priority within this batch because the AI service page is also
a hard content dependency for the later AI Mega Page batch (which consolidates AI Services
and AI Solutions content) — it needs to be stable before that later batch can start, but
within this batch it is the last of the six phases in lifecycle order.

**Independent Test**: Can be fully tested by visiting the Evolve phase page directly and
confirming it explains the phase and links to the AI service page.

**Acceptance Scenarios**:

1. **Given** a visitor on the Evolve phase page, **When** they read the page, **Then** they
   understand what the Evolve phase covers and that it can be engaged on its own.
2. **Given** a visitor on the Evolve phase page, **When** they look for the underlying
   service, **Then** a link to the AI service page is present and correct.
3. **Given** the AI Mega Page batch later needs the AI service page's content, **When** this
   page is complete, **Then** its content is stable and complete enough to be
   referenced/consolidated without requiring rework here.

### Edge Cases

- What happens when a visitor reaches a phase or service link before its target page has
  real content? Per the Clarifications above, this is expected in-progress dev-site state,
  not a defect — but implementation must still not ship a phase page whose own explanatory
  content is missing, only its child-service content.
- How does each page handle a missing/placeholder Figma frame at the point implementation is
  attempted? Implementation must stop and request the frame rather than guess layout from the
  page title or Linear issue description alone.
- How does each page behave for a visitor with reduced-motion preferences enabled? Per the
  constitution's accessibility principle, motion must respect `prefers-reduced-motion`.
- How does each page behave in dark mode where a design token has not yet been given a
  genuine dark-mode value? Per the constitution's token-discipline principle, this is a
  defect, not an acceptable gap — no token may share an identical light/dark value.
- What happens to a phase whose services span two Linear-tracked page sets (e.g. Launch
  groups one previously-tracked service, Hosting, alongside three newly-tracked ones,
  Performance/Security/Training)? Each service page is independently built and tested per its
  own user story acceptance scenario regardless of which phase groups it — the phase grouping
  is a navigation/content concern, not a build-dependency concern.

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: The Services hub page MUST explain the LightSpeed lifecycle-phase model and
  link to all six phase pages (Discover, Create, Build, Launch, Grow, Evolve).
- **FR-002**: Each phase page MUST explain its own phase's purpose and link to every service
  page grouped under it, per the confirmed mapping: Discover→Discovery; Create→Content,
  Design; Build→Development, Migrations; Launch→Hosting, Performance, Security, Training;
  Grow→Support, SEO, Accessibility, Email Marketing; Evolve→AI.
- **FR-003**: Each of the 14 service pages MUST explain its own service's scope, in the
  visitor's terms, without requiring the visitor to have read its parent phase page first.
- **FR-004**: Each service page MUST provide at least one clear call-to-action path toward
  conversion (Free Consultation or Contact). The Free Consultation CTA MUST link directly to
  the existing dev-site page (`https://ls-agency.lightspeedwp.dev/free-consultation/`), not a
  placeholder. A CTA target that is not yet built MUST still link directly to its final
  intended URL — an unresolved link during active dev-site work is an expected, non-blocking
  state, not a defect (see Clarifications).
- **FR-005**: Every page in this batch (hub, 6 phases, 14 services) MUST meet the
  constitution's Accessibility Baseline (WCAG 2.1 AA): semantic HTML, correct heading
  hierarchy, descriptive alt text, full keyboard operability, and undisturbed focus styles.
- **FR-006**: Every page in this batch MUST carry working SEO metadata (title, description).
- **FR-007**: Every page in this batch MUST be verified in both light and dark mode and
  across mobile, tablet, and desktop breakpoints before being considered complete.
- **FR-008**: The Services hub page's retro-fit work MUST reconcile against its existing
  in-progress implementation rather than discard and rebuild it.
- **FR-009**: Implementation of any page in this batch MUST NOT proceed on visual/layout
  specifics without first obtaining that page's Figma frame from the site owner.
- **FR-010**: All 14 service pages and all 6 phase pages MUST have a corresponding tracked
  Linear issue before implementation begins (satisfied: LS-4179–LS-4192, created 2026-09-16).

### Key Entities

- **Service Phase**: One of six lifecycle stages (Discover, Create, Build, Launch, Grow,
  Evolve). Attributes: title, position in lifecycle order, summary content, list of grouped
  Service Pages. Parent of one or more Service Pages.
- **Service Page**: A single page representing one specific service offering. Attributes:
  title, parent phase, summary content, call-to-action target, related-service links. A
  Service Page belongs to exactly one Service Phase.
- **Services Hub**: The single top-level page linking to all six Service Phases.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: A visitor can identify which of the six phases matches their need within one
  visit to the Services hub page, without needing external explanation.
- **SC-002**: A visitor can identify which specific service within a phase matches their need
  within one visit to that phase's page.
- **SC-003**: Every page in this batch (21 total) passes an accessibility spot-check (WCAG
  2.1 AA) before being marked complete, with zero known violations at hand-off.
- **SC-004**: Every page in this batch renders correctly (no broken layout, no illegible
  content) across mobile, tablet, and desktop, in both light and dark mode — verified by
  actual visual inspection, not automated checks alone.
- **SC-005**: 100% of phase-to-service and hub-to-phase links across this batch's pages
  resolve to a real page once this batch is complete. CTA links to pages outside this batch
  (Free Consultation, Contact) are exempt from this criterion while their own batch is still
  in progress on the dev site — see Clarifications.
- **SC-006**: The AI service page's content is complete and stable enough to be referenced by
  the AI Mega Page batch without needing to be revisited.

## Assumptions

- The Services hub page's existing in-progress implementation (associated with Linear issue
  LS-1598) represents a reasonable starting point to reconcile against, not a false start to
  discard.
- Figma frames for each of the 21 pages will be supplied by the site owner individually, at
  the point implementation of that specific page begins — not gathered in advance for this
  spec.
- On the dev site today, all 14 service pages sit as flat children of the Services hub
  (`parent: 36912`), not yet reparented under their phase page. Whether the final information
  architecture requires actual parent/child URL reparenting (e.g.
  `/services/launch/hosting/`) or keeps flat URLs with phase pages acting purely as content
  aggregators (e.g. `/services/hosting/` linked from `/services/launch/`) is an implementation
  decision for `/speckit-plan`, not resolved here — both satisfy this spec's functional
  requirements.
- Content for each page (copy, CTA targets) follows the same sourcing model already used for
  the Services hub page and other Phase 1/2 pages: approved content supplied per page, not
  authored from scratch as part of this spec. Several service pages (Discovery, Design,
  Development, Hosting, Support, AI, and others) already carry real content on the dev site;
  phase pages are currently blank and need content.
- The relative priority order (P1–P7, following lifecycle order Discover→Evolve) reflects the
  release plan's batch sequencing rationale, not a strict technical dependency — phases P2–P6
  have no dependency on each other and could be reordered without breaking anything, other
  than Evolve/AI (P7), which the AI Mega Page batch depends on.
