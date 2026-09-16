# Phase 0 Research: AI Mega Page

No unresolved `NEEDS CLARIFICATION` markers — `/speckit-clarify` found no critical
ambiguities for this batch (recorded in the session summary, not a `spec.md` Clarifications
section since no questions were asked). This file records the plan-level decisions.

## Decision: Build one new bespoke pattern, after checking reuse against both prior batches

**Decision**: Build `patterns/ai-mega-page.php` as a new pattern, after explicitly checking
it against every existing shared pattern from batches 1 and 2.

**Rationale**: Constitution Principle VIII requires checking for reuse before creating new.
None of the existing shared patterns fit this page's shape:
- `service-phase-hero` (batch 1) — designed for a phase-badge + list-of-services shape, not a
  long-form consolidated narrative.
- `service-card` (batch 1) — designed for a single-service offering card, too small a unit
  for a full landing page.
- `family-hub` (batch 2) — designed for a hub-links-to-subpages shape; the AI Mega Page is
  not a hub linking to a fixed subpage set, it's a narrative synthesis.
- `legal-content` (batch 2) — designed for static plain-text content, the opposite of "the
  heaviest single visual build" this page is described as.

**Alternatives considered**: Forcing this page into `family-hub` (treating AI Services and AI
Solutions as its two "grouped subpages") — rejected, because the spec explicitly requires a
consolidated narrative (FR-001), not a links-list; a hub pattern would satisfy the letter of
"links to both" while failing the actual requirement.

## Decision: New top-level URL, not nested under `/services/` or `/solutions/`

**Decision**: Recommend a new top-level path (e.g. `/ai/`) rather than nesting this page
under either `/services/` or `/solutions/`.

**Rationale**: The page's entire purpose (spec FR-001) is presenting both perspectives as one
coherent whole — nesting it under one family's URL space would implicitly frame it as
belonging to that family over the other, undermining the consolidation itself.

**Alternatives considered**: `/services/ai-mega/` or `/solutions/ai-mega/` — rejected for the
reason above. This remains a recommendation, not a hard requirement — flagged in `plan.md`
as revisable once the actual Figma frame is available.

## Decision: Implementation sequencing gate is structural, not advisory

**Decision**: The dependency on AI Services (batch 1) and AI Solutions (batch 2) being built
and stable is encoded as a hard blocking task in `tasks.md` (Phase 2, before the single user
story), not a note in the spec that could be silently skipped.

**Rationale**: This mirrors the Figma-frame-request blocking-task pattern already
established in specs 001 and 002 — a real prerequisite that must stop implementation, not
just inform it. The risk being guarded against: someone picking up this batch's tasks in
isolation, without the context that its content source doesn't exist yet.

**Alternatives considered**: Leaving it as a spec-level note only — rejected, since the whole
point of the structural blocking-task pattern established in this project is that notes get
missed but a literal blocking checklist item does not.

## Decision: Content is genuine editorial synthesis, not automated merge

**Decision**: Per spec Assumptions, this page's content is newly authored to synthesize both
source pages, not a copy-paste concatenation and not a programmatic transclusion.

**Rationale**: The spec's own description of this page as "the heaviest single visual build"
and its explicit requirement (FR-001) that it read as one coherent narrative rules out a
mechanical merge.

**Alternatives considered**: Dynamically pulling content from the AI Services/AI Solutions
pages via a shared data source — rejected per constitution Principle II (this would require
plugin-owned logic for content aggregation, which is out of scope for a theme-only batch) and
because it would fight against the "single coherent narrative" requirement rather than serve
it.
