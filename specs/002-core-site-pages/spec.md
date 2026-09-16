# Feature Specification: Core Site Pages (Shared Foundations, About, Solutions)

**Feature Branch**: `002-core-site-pages`

**Created**: 2026-09-16

**Status**: Draft

**Input**: User description: "Core Site Pages batch: build the Shared Foundations, About Family, and Solutions Family pages, 19 pages total as separate user stories, grouped by family. Batch 2 of 7 in the release plan, feeding the Core Site Pages Complete milestone."

## Context

This is Batch 2 of 7 delivery batches defined in `.specify/memory/release-plan.md`, feeding
the **Core Site Pages Complete** milestone. It is governed by
`.specify/memory/constitution.md` v1.0.0 — the ls-theme/ls-plugin ownership split,
accessibility/token/QA principles, and the page-level Definition of Done all apply to every
user story below.

**Scope note (2026-09-16)**: this batch was checked against the dev site before writing this
spec, the same way the Services Family batch's phase-page gap was found. Unlike Services,
**this batch has no hidden phase-page hierarchy** — pages under `/about/` and `/solutions/`
are flat, confirmed by inspecting dev-site page parent/child relationships. The check did
surface two real gaps, both resolved during `/speckit-clarify`:
- **4 untracked pages**: Accessibility Commitment (About), and Publishing, Design Systems,
  and LSX (Solutions). Created as LS-4193–LS-4196.
- **Policies & Principles is 7 real, separate pages** (Publishing Principles, Ownership &
  Funding, Actionable Feedback, Ethics, Diversity Staffing, Corrections, Editorial Content
  Diversity), not the "single condensed page" LS-1605's original description assumed.
  Created as LS-4197–LS-4203.

This batch is **25 pages**, not the originally-assumed 15 (19 after the first correction,
25 after the second).

## Clarifications

### Session 2026-09-16

- Q: Should this batch treat Policies & Principles as 7 separate tracked pages, instead of the 1 single condensed page LS-1605's description currently claims? → A: Yes (Option A) — 7 separate pages, each with its own Linear issue (LS-4197–LS-4203), added to this batch under the same Contact & Legal user story.
- Resolved without a question, by evidence rather than assumption: whether Contact and Free Consultation share one thank-you page or have distinct ones. Dev site already has two separate, already-built pages — `/free-consultation/thank-you/` (Linear issue LS-1211, status Done) and `/contact/thank-you/` (LS-2595, tracked in this batch). They do not share a page. This batch's remaining thank-you work is limited to the Contact thank-you page (LS-2595); the Free Consultation thank-you page is already complete, outside this batch's scope.

**Explicitly excluded**, confirmed present on dev but correctly out of scope per the
constitution's Delivery Phase Scope Boundary (Phase 3 AI governance/chatbot functionality):
`/solutions/ai-chatbots/`, `/solutions/ai-readiness/`, `/about/ai-governance/`. These MUST
NOT be built or linked to as part of this batch.

**Non-goals**: Services Family content (separate batch, already spec'd) and the AI Mega Page
are out of scope here. Phase 3 AI governance/chatbot functionality and Phase 4 content
finalisation are out of scope for the whole release, not just this batch.

**Design source timing**: no visual design reference (Figma frame) is attached to this spec.
Each page-build user story's implementation carries its own explicit prerequisite to request
the relevant frame from the site owner before implementation of that page begins, exactly as
in the Services Family spec.

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Free Consultation (Priority: P1)

A visitor ready to engage LightSpeed reaches the Free Consultation page and can submit a
request for a consultation. This is the primary conversion target that every other batch's
service/solution pages link to as their call-to-action, so it is the highest-priority page
in this batch.

**Why this priority**: Every page across every other batch (Services Family already spec'd,
and the About/Solutions pages in this same batch) depends on this page existing and working
as their CTA target. It already exists on dev (`https://ls-agency.lightspeedwp.dev/free-consultation/`).

**Independent Test**: Can be fully tested by visiting the Free Consultation page directly and
confirming a visitor can submit a consultation request end-to-end, independent of any other
page in this batch.

**Acceptance Scenarios**:

1. **Given** a visitor on the Free Consultation page, **When** they complete and submit the
   form, **Then** the submission is captured and the visitor is routed to the existing,
   already-complete Free Consultation thank-you page (`/free-consultation/thank-you/`,
   LS-1211, Done) — not the Contact thank-you page (see Clarifications).
2. **Given** a visitor viewing the page on mobile, tablet, or desktop, in light or dark mode,
   **When** they view the form, **Then** it remains fully usable in every combination.

---

### User Story 2 - Shared Foundations Index Pages (Priority: P2)

A visitor wants to browse LightSpeed's past work or read its blog/insights content, and finds
a working archive page for each.

**Why this priority**: These are top-level navigation destinations referenced across the
whole site (including the already-spec'd Services Family pages' "View our Work" links).

**Independent Test**: Can be fully tested by visiting the Work archive and Insights archive
pages directly and confirming each lists its content correctly, independent of any other
page in this batch.

**Acceptance Scenarios**:

1. **Given** a visitor on the Work archive page, **When** they browse it, **Then** they see
   an index of LightSpeed's portfolio/case-study work.
2. **Given** a visitor on the Insights archive page, **When** they browse it, **Then** they
   see an index of blog/resource content (dev-site equivalent currently lives at `/blog/`).

---

### User Story 3 - Contact & Legal Pages (Priority: P3)

A visitor wants to contact LightSpeed directly, or needs to read a legal/policy page:
Privacy Policy, Terms & Conditions, or one of the 7 Policies & Principles pages (the
Policies & Principles hub itself plus 7 sub-policies — see Clarifications).

**Why this priority**: Contact is a secondary conversion path (after Free Consultation); the
legal/policy pages are compliance requirements, not conversion-critical, but bundled here
because they share the same low-bespoke-effort Default Page template and largely the same
Linear issue lineage (LS-1605 plus LS-4197–LS-4203 for the 7 Policies sub-pages).

**Independent Test**: Can be fully tested by visiting each of the 10 pages directly (Contact,
Privacy Policy, Terms & Conditions, Policies & Principles hub, and its 7 sub-policies) and
confirming its content is present and correct, independent of any other page in this batch.

**Acceptance Scenarios**:

1. **Given** a visitor on the Contact page, **When** they submit the contact form, **Then**
   the submission is captured and the visitor is routed to the Contact thank-you page
   (LS-2595, see User Story 4).
2. **Given** a visitor on the Privacy Policy or Terms & Conditions page, **When** they read
   it, **Then** the approved legal content is displayed correctly (content itself is already
   finalised and approved per LS-1224 — this batch wires it in, it does not author it).
3. **Given** a visitor on the Policies & Principles hub, **When** they read it, **Then** they
   can navigate to any of its 7 sub-policies (Publishing Principles, Ownership & Funding,
   Actionable Feedback, Ethics, Diversity Staffing, Corrections, Editorial Content Diversity).
4. **Given** a visitor on any individual policy sub-page, **When** they read it, **Then**
   they understand that policy independent of having visited the Policies hub first.

---

### User Story 4 - Contact Thank-You Page (Priority: P4)

A visitor who has just submitted the Contact form reaches a thank-you confirmation page.
This is a distinct page from the Free Consultation thank-you page (already Done, LS-1211,
per Clarifications) — this batch's remaining thank-you work is limited to Contact's own page
(LS-2595).

**Why this priority**: Lower priority than the forms it serves, since it's only reached after
a successful submission on those pages, but is still a required completion step.

**Independent Test**: Can be fully tested by visiting the Contact thank-you page directly and
confirming it displays a clear confirmation message, independent of arriving via an actual
form submission.

**Acceptance Scenarios**:

1. **Given** a visitor who has just submitted a form, **When** they land on the thank-you
   page, **Then** they see a clear confirmation that their submission was received.

---

### User Story 5 - About Family (Priority: P5)

A visitor evaluating LightSpeed as a company reads the About hub and can navigate to
About/Process, Team, Culture, History, and the Accessibility Commitment page for deeper
context.

**Why this priority**: Company-trust content, valuable but not conversion-blocking —
appropriately sequenced after the conversion-critical pages above.

**Independent Test**: Can be fully tested by visiting the About hub page directly and
confirming it links correctly to all five related pages, independent of the Solutions Family
below.

**Acceptance Scenarios**:

1. **Given** a visitor on the About hub page, **When** they read it, **Then** they understand
   LightSpeed's company context and can navigate to Process, Team, Culture, History, or the
   Accessibility Commitment page.
2. **Given** a visitor on any of the five About-family subpages, **When** they read it,
   **Then** they understand that page's own content independent of having visited the hub
   first.
3. **Given** a visitor on the Accessibility Commitment page specifically, **When** they read
   it, **Then** they understand LightSpeed's accessibility commitments — this page was
   previously untracked (no Linear issue existed before this batch's scope check) and MUST
   NOT be silently dropped now that it is tracked (LS-4196).

---

### User Story 6 - Solutions Family (Priority: P6)

A visitor exploring which LightSpeed solution fits their business (Tour Operator, WordPress,
WooCommerce, AI Solutions, Publishing, Design Systems, or LSX) reads the Solutions hub and
can navigate to any of the seven solution pages.

**Why this priority**: Lowest priority in this batch — solution-specific content is useful
for a visitor who has already decided LightSpeed is a fit, later in the funnel than the
conversion and trust-building pages above.

**Independent Test**: Can be fully tested by visiting the Solutions hub page directly and
confirming it links correctly to all seven solution pages, independent of the About Family
above.

**Acceptance Scenarios**:

1. **Given** a visitor on the Solutions hub page, **When** they read it, **Then** they can
   identify and navigate to any of the seven solutions (Tour Operator, WordPress, WooCommerce,
   AI Solutions, Publishing, Design Systems, LSX).
2. **Given** a visitor on any of the seven solution subpages, **When** they read it, **Then**
   they understand that solution's own scope independent of having visited the hub first.
3. **Given** a visitor looking for AI Chatbots, AI Readiness, or AI Governance content,
   **When** they browse the Solutions or About sections, **Then** no page in this batch links
   to or references that content — those pages exist on dev but are explicitly Phase 3 scope,
   not part of this batch (see Context).

### Edge Cases

- What happens when a visitor reaches a link to a page in this batch before it's built? Per
  the same convention established in the Services Family spec, this is expected in-progress
  dev-site state, not a defect.
- How does the Contact/Free Consultation form behave on submission failure (validation error,
  network error)? Must show a user-friendly error state, per the constitution's general
  error-handling default — no specific requirement beyond that was described for this batch.
- What happens if a visitor reaches the Contact thank-you page directly, without having
  submitted a form? The page must still display a coherent confirmation message, not an error
  — it has no dependency on referrer/session state per this spec.
- How does each page handle a missing/placeholder Figma frame at the point implementation is
  attempted? Implementation must stop and request the frame rather than guess layout.
- How does each page behave for a visitor with reduced-motion preferences, and in dark mode
  with unpaired tokens? Same constitution-driven requirements as the Services Family spec
  (Principles III and IV) — not re-derived from scratch here.

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: The Free Consultation page MUST allow a visitor to submit a consultation
  request end-to-end and see confirmation of submission.
- **FR-002**: The Work archive and Insights archive pages MUST each display a working index
  of their respective content types.
- **FR-003**: The Contact page MUST allow a visitor to submit a contact request end-to-end
  and see confirmation of submission.
- **FR-004**: The Privacy Policy, Terms & Conditions, Policies & Principles hub, and its 7
  sub-policy pages MUST display their already-approved legal/policy content (LS-1224 covers
  Privacy Policy/Terms/Policies hub content; the 7 sub-policies' content sourcing follows the
  same approved-content model) correctly — this batch wires existing approved content into
  pages, it does not author new legal content.
- **FR-005**: The Contact thank-you page (LS-2595) MUST display a clear confirmation message
  independent of how the visitor arrived at it. It is distinct from the Free Consultation
  thank-you page (LS-1211, already Done, outside this batch).
- **FR-006**: The About hub page MUST link to all five related About-family pages (Process,
  Team, Culture, History, Accessibility Commitment).
- **FR-007**: The Solutions hub page MUST link to all seven solution pages (Tour Operator,
  WordPress, WooCommerce, AI Solutions, Publishing, Design Systems, LSX).
- **FR-008**: No page in this batch may link to or reference `/solutions/ai-chatbots/`,
  `/solutions/ai-readiness/`, or `/about/ai-governance/` — these are explicitly out of scope
  (constitution Delivery Phase Scope Boundary).
- **FR-009**: The Policies & Principles hub MUST link to all 7 sub-policy pages, and each
  sub-policy page MUST be independently readable without requiring a visitor to have visited
  the hub first.
- **FR-010**: Every page in this batch (25 total) MUST meet the constitution's Accessibility
  Baseline (WCAG 2.1 AA).
- **FR-011**: Every page in this batch MUST carry working SEO metadata (title, description).
- **FR-012**: Every page in this batch MUST be verified in both light and dark mode and
  across mobile, tablet, and desktop breakpoints before being considered complete.
- **FR-013**: Implementation of any page in this batch MUST NOT proceed on visual/layout
  specifics without first obtaining that page's Figma frame from the site owner.

### Key Entities

- **Conversion Page**: Free Consultation or Contact — a page whose primary purpose is
  capturing a form submission and routing to its own distinct thank-you confirmation page.
- **Index Page**: Work archive or Insights archive — a page listing other content
  (portfolio items, blog posts) rather than being a standalone destination itself.
- **Family Hub**: About or Solutions — a page linking to a fixed set of related subpages
  within its family.
- **Legal Page**: Privacy Policy or Terms & Conditions — static content pages with
  already-approved copy, no dynamic behavior.
- **Policies Hub**: Policies & Principles — a page linking to 7 sub-policy pages, structurally
  the same as a Family Hub but legal/compliance in nature rather than marketing content.
- **Policy Sub-Page**: One of 7 pages (Publishing Principles, Ownership & Funding, Actionable
  Feedback, Ethics, Diversity Staffing, Corrections, Editorial Content Diversity) — belongs to
  exactly one Policies Hub.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: A visitor can complete a Free Consultation submission and reach its own
  confirmation state without encountering a broken step.
- **SC-002**: A visitor can complete a Contact submission and reach its own confirmation
  state without encountering a broken step.
- **SC-003**: A visitor can identify and reach any of the 5 About-family pages, 7
  Solutions-family pages, or 7 Policies sub-pages within one visit to the respective hub.
- **SC-004**: Every page in this batch (25 total) passes an accessibility spot-check (WCAG
  2.1 AA) before being marked complete, with zero known violations at hand-off.
- **SC-005**: Every page in this batch renders correctly across mobile, tablet, and desktop,
  in both light and dark mode — verified by actual visual inspection, not automated checks
  alone.
- **SC-006**: Zero pages in this batch link to or reference the explicitly-excluded Phase 3
  pages (AI Chatbots, AI Readiness, AI Governance).

## Assumptions

- Figma frames for each of the 25 pages will be supplied by the site owner individually, at
  the point implementation of that specific page begins.
- Legal/policy page content (Privacy Policy, Terms & Conditions, Policies & Principles hub
  and its 7 sub-policies) is already finalised and approved (LS-1224 for the first three;
  the 7 sub-policies follow the same approved-content sourcing model) — this batch is a
  wiring/build task, not a content-drafting task.
- Team's URL stays at the existing top-level `/team/` rather than being moved under
  `/about/team/` — this matches current dev-site structure and no requirement in this batch
  calls for restructuring it.
- The Contact form and Free Consultation form route to distinct thank-you pages — confirmed
  by direct evidence (both pages already exist separately on dev; the Free Consultation one,
  LS-1211, is already Done), not assumed. This batch's remaining thank-you work is limited to
  the Contact thank-you page (LS-2595).
- Content for each page follows the same sourcing model as prior batches: approved content
  supplied per page, not authored from scratch as part of this spec.
