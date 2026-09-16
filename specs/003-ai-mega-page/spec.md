# Feature Specification: AI Mega Page

**Feature Branch**: `003-ai-mega-page`

**Created**: 2026-09-16

**Status**: Draft

**Input**: User description: "AI Mega Page batch: a single consolidated AI landing page (LS-2605) bringing together LightSpeed's AI Services offering and AI Solutions offering. Batch 3 of 7 in the release plan, feeding the AI Mega Page Complete milestone."

## Context

This is Batch 3 of 7 delivery batches defined in `.specify/memory/release-plan.md`, feeding
the **AI Mega Page Complete** milestone. It is governed by
`.specify/memory/constitution.md` v1.0.0 — the ls-theme/ls-plugin ownership split,
accessibility/token/QA principles, and the page-level Definition of Done all apply.

**Scope check (2026-09-16)**: the dev site was checked directly before writing this spec,
the same way batches 1 and 2 were checked. Unlike those batches, **no hidden or untracked
scope was found** — no "AI Mega Page" or equivalent consolidated page exists anywhere on
dev. This batch is genuinely greenfield, a single page (LS-2605), not a family of pages.

**Hard cross-batch dependency, not yet satisfiable**: this page consolidates content from
two pages that do not exist yet — AI Services (`/services/ai/`, part of the Services Family
batch, `specs/001-services-family`) and AI Solutions (`/solutions/ai/`, part of the Core
Site Pages batch, `specs/002-core-site-pages`). Both of those batches are currently
planning-only, same as this one. Writing this spec now does not require those pages to
exist — but **implementation of this batch cannot start** until both are actually built and
stable. This is recorded as an explicit blocking prerequisite in this batch's task
breakdown, the same structural pattern already used for per-page Figma-frame requests in
specs 001 and 002, just applied to a cross-batch content dependency instead of a design
asset.

**Non-goals**: This batch does not build or modify the AI Services or AI Solutions pages
themselves — those belong to their own batches. Phase 3 AI governance/chatbot functionality
(`/about/ai-governance/`, `/solutions/ai-chatbots/`, `/solutions/ai-readiness/`) is
explicitly separate, later-sequenced scope, not part of this "Evolve"-lifecycle AI Mega
Page. Phase 4 content finalisation is out of scope for the whole release.

**Design source timing**: no visual design reference (Figma frame) is attached to this spec,
same convention as specs 001 and 002 — supplied at implementation time, not upfront.

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Consolidated AI Landing Page (Priority: P1)

A visitor interested in LightSpeed's AI capabilities — whether from an AI-services angle
(agency delivers AI-related work for clients) or an AI-solutions angle (LightSpeed builds
AI-powered products/features for clients) — lands on a single AI Mega Page that presents
both perspectives together, rather than needing to separately discover the AI Services and
AI Solutions pages.

**Why this priority**: This is the only user story in this batch — a single-page batch, no
further page-level prioritization is needed.

**Independent Test**: Can be fully tested by visiting the AI Mega Page directly and
confirming it presents a coherent, consolidated view of both the AI Services and AI
Solutions content, independent of whether a visitor has seen either source page.

**Acceptance Scenarios**:

1. **Given** a visitor on the AI Mega Page, **When** they read it, **Then** they understand
   both what AI-related services LightSpeed delivers (from AI Services) and what AI-powered
   solutions LightSpeed builds (from AI Solutions), presented as one coherent narrative, not
   two disconnected sections copy-pasted together.
2. **Given** a visitor on the AI Mega Page, **When** they want to go deeper on either angle,
   **Then** clear paths exist to the AI Services page, the AI Solutions page, or a
   conversion action (Free Consultation/Contact).
3. **Given** a visitor viewing the page on mobile, tablet, or desktop, in light or dark mode,
   **When** they view any section, **Then** content remains legible and fully usable in every
   combination.
4. **Given** the AI Mega Page is described in the release plan as "the heaviest single
   visual build," **When** it is implemented, **Then** its content and layout meaningfully
   exceed a simple concatenation of the AI Services and AI Solutions pages' content — it is
   a purpose-built consolidation, not a copy-paste job.

### Edge Cases

- What happens if implementation of this batch is attempted before AI Services and/or AI
  Solutions are actually built? This MUST NOT happen — the task breakdown carries an
  explicit blocking prerequisite for this, not just a note (see Context).
- What happens if the AI Services or AI Solutions page's content changes after the AI Mega
  Page is built (e.g. during their own batch's review-fix cycle)? Not resolved in this spec
  — flagged as an Assumption below since it depends on those batches' own stability, which
  this spec cannot control.
- How does the page behave for a visitor with reduced-motion preferences, and in dark mode
  with unpaired tokens? Same constitution-driven requirements as specs 001 and 002.
- How does the page handle a missing/placeholder Figma frame at implementation time?
  Implementation must stop and request the frame rather than guess layout.

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: The AI Mega Page MUST present a single, coherent narrative consolidating both
  the AI Services and AI Solutions content — not two sections concatenated without editorial
  integration.
- **FR-002**: The AI Mega Page MUST provide clear navigation paths to the AI Services page,
  the AI Solutions page, and at least one conversion action (Free Consultation or Contact).
- **FR-003**: The AI Mega Page MUST meet the constitution's Accessibility Baseline (WCAG 2.1
  AA).
- **FR-004**: The AI Mega Page MUST carry working SEO metadata (title, description).
- **FR-005**: The AI Mega Page MUST be verified in both light and dark mode and across
  mobile, tablet, and desktop breakpoints before being considered complete.
- **FR-006**: Implementation of this batch MUST NOT begin until the AI Services page (batch
  1) and AI Solutions page (batch 2) are both actually built and stable — not merely spec'd
  or planned. This is a structural blocking prerequisite for `/speckit-tasks`, not a
  suggestion.
- **FR-007**: Implementation MUST NOT proceed on visual/layout specifics without first
  obtaining the Figma frame for this page from the site owner.

### Key Entities

- **AI Mega Page**: The single page in this batch. Attributes: consolidated narrative
  content, navigation paths to AI Services/AI Solutions/conversion, source dependency on two
  other batches' content.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: A visitor can understand both LightSpeed's AI-services and AI-solutions
  offerings from a single visit to the AI Mega Page, without needing to have visited either
  source page first.
- **SC-002**: The AI Mega Page passes an accessibility spot-check (WCAG 2.1 AA) before being
  marked complete, with zero known violations at hand-off.
- **SC-003**: The AI Mega Page renders correctly across mobile, tablet, and desktop, in both
  light and dark mode — verified by actual visual inspection, not automated checks alone.
- **SC-004**: Zero implementation work on this batch starts before AI Services and AI
  Solutions are both confirmed built and stable.

## Assumptions

- AI Services (batch 1) and AI Solutions (batch 2) will each reach a stable, complete state
  before this batch's implementation begins — if either changes materially after this page
  is built, a follow-up reconciliation pass is expected, not treated as a defect in this
  batch's own work.
- The Figma frame for this page will be supplied by the site owner at the point
  implementation begins, not gathered in advance for this spec.
- Content for this page is a genuine editorial consolidation (new copy synthesizing both
  sources), not an automated merge of the two source pages' existing copy — this batch
  involves real content work, not just template assembly.
- This page's URL/slug and its relationship to `/services/ai/` and `/solutions/ai/` (e.g.
  whether it lives at a new top-level path, or elsewhere) is an implementation-time decision
  for `/speckit-plan`, not resolved here.
