# Phase 0 Research: Core Site Pages

No unresolved `NEEDS CLARIFICATION` markers remain in `plan.md`'s Technical Context — all
were resolved during `/speckit-clarify` (recorded in `spec.md`) or from direct dev-site
inspection. This file records the resulting decisions for traceability.

## Decision: One shared Hub pattern for About, Solutions, and Policies

**Decision**: Build a single `family-hub` pattern reused across the About hub, Solutions
hub, and Policies & Principles hub — all three share the same shape (intro content, list of
grouped links).

**Rationale**: Constitution Principle VIII requires checking for reuse before creating new
patterns. About and Solutions are both "hub linking to N subpages" pages; Policies & Principles
is structurally identical (hub linking to its 7 sub-policies), just legal rather than
marketing content — building 3 separate hub patterns would duplicate the same structure.

**Alternatives considered**: A bespoke pattern per hub — rejected per Principle VIII. Reusing
the Services Family's `service-phase-hero` pattern from batch 1 — rejected, that pattern's
shape (numbered badge, colour-coded phase) doesn't fit a plain hub-to-subpage link list; a
different, simpler pattern is the correct match here.

## Decision: One shared Legal/Policy Content pattern for 9 pages

**Decision**: Build a single `legal-content` pattern reused across Privacy Policy, Terms &
Conditions, and all 7 policy sub-pages.

**Rationale**: All 9 are static, long-form text content with no CTA, no related-content
cards, and no dynamic behavior — a fundamentally different, simpler shape than either the
Family Hub pattern or the Services Family's `service-card` pattern. Building 9 separate
patterns for what is functionally the same content-display shape would violate reuse
discipline.

**Alternatives considered**: Reusing `service-card` from batch 1 — rejected, that pattern
includes a CTA and related-service links that don't apply to static legal content.

## Decision: Reuse existing archive templates for Work/Insights, don't rebuild

**Decision**: Work archive and Insights archive reuse the Portfolio Index and Blog Index
templates already defined per LS-1206, rather than building new archive patterns.

**Rationale**: These templates already exist in this repo per prior work (LS-1206 "Design
System, Templates & Patterns Plan," already Done). Rebuilding them would directly violate
Principle VIII and duplicate completed work.

**Alternatives considered**: None — the templates already exist; the only real decision is
verifying they still match current taxonomy terms (Industries/Services/Project
types/Software, per LS-1208/LS-1220) before treating them as done, which is a task-level
check, not a planning decision.

## Decision: Reuse existing Gravity Forms for Free Consultation and Contact, don't rebuild

**Decision**: This batch wires the already-built Gravity Forms (LS-1207 content/functional
prep, LS-1214 conditional logic, LS-2610 Gravity Forms configuration — all prior work) into
the Free Consultation and Contact pages. No new form logic is built.

**Rationale**: Building new form logic here would duplicate already-completed, already-Done
work and risks diverging from the forms other parts of the site (e.g. the Services Family
batch's CTAs) already point to.

**Alternatives considered**: None — the forms already exist and are in scope for reuse only.

## Decision: Contact and Free Consultation have distinct thank-you pages

**Decision**: Confirmed via direct dev-site inspection (not assumption) — `/contact/thank-you/`
and `/free-consultation/thank-you/` are two separate, already-existing pages. The latter
(LS-1211) is already Done. This batch's only remaining thank-you work is the Contact
thank-you page (LS-2595).

**Rationale**: Recorded in `spec.md` Clarifications — this removes what would otherwise have
been an implementation-time ambiguity.

**Alternatives considered**: A single shared thank-you page — rejected by evidence, not
preference; the site already has two distinct pages built.

## Decision: About-family and Solutions-family subpages remain bespoke, not pattern-forced

**Decision**: About/Process, Team, Culture, History, Accessibility Commitment, and the 7
Solutions subpages are treated as individually bespoke content pages, not forced into either
shared pattern above.

**Rationale**: Their content shapes genuinely differ from each other and from the Hub/Legal
patterns (company narrative vs. solution-offering vs. compliance report) — forcing them into
a shared pattern would add unneeded conditional complexity, the same reasoning the Services
Family plan used to reject a single mega-pattern covering phase and service pages.

**Alternatives considered**: Extending `service-card` (from batch 1) to cover Solutions
subpages, since their shape is closer to a service offering than to legal content — this is
plausible and left as an implementation-time judgment call at `/speckit-tasks`/build time
(check reuse against batch 1's `service-card` pattern before building a new one), not decided
here since it requires seeing both patterns' actual final shape side by side.
