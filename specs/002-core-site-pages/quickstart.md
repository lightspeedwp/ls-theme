# Quickstart: Validating the Core Site Pages Batch

Validation guide, not an implementation guide — mirrors the structure of the Services Family
batch's `quickstart.md`.

## Prerequisites

Same as the Services Family batch: local/dev WordPress environment with `ls-theme` active,
read-only access to the dev site for comparison, and the relevant Figma frame supplied
per-page, on demand, not gathered upfront.

## Validate: Free Consultation and Contact (User Stories 1 & 3, Conversion Pages)

1. Open the page and submit the form end-to-end.
2. Confirm the submission is captured and the visitor is routed to that page's own distinct
   thank-you page — Free Consultation → `/free-consultation/thank-you/` (already built,
   verify it still works); Contact → `/contact/thank-you/` (this batch's own build).
3. Confirm the two thank-you pages are NOT the same page (spec Clarifications) — this is a
   specific regression to check for, not just a general form-works check.
4. Repeat the light/dark + responsive + accessibility checks used in every prior batch.

**Expected outcome**: spec SC-001 and SC-002.

## Validate: Work Archive and Insights Archive (User Story 2, Index Pages)

1. Open each archive page and confirm it lists real content (portfolio items / blog posts).
2. Confirm taxonomy filters on Work archive reflect current terms (Industries/Services/
   Project types/Software) — do not assume the existing LS-1206 template needs changes;
   verify first.

## Validate: Legal & Policy Pages (User Story 3, 9 pages)

1. Open each of Privacy Policy, Terms & Conditions, and the 7 policy sub-pages directly.
2. Confirm the approved content (LS-1224 for the first three) displays correctly — this
   batch wires content in, it does not draft it; a missing/wrong-looking paragraph is a
   content-sourcing issue to flag, not something to author inline.
3. From the Policies & Principles hub, confirm all 7 sub-policy links resolve (spec FR-009).

## Validate: About Family and Solutions Family (User Stories 5 & 6, Family Hubs)

1. Open the About hub / Solutions hub and confirm it links to all of its grouped subpages
   (5 for About, 7 for Solutions).
2. Open each subpage directly (not via the hub) and confirm it's independently readable.
3. Specifically confirm no page anywhere in this batch links to or mentions AI Chatbots, AI
   Readiness, or AI Governance (spec SC-006) — these exist on dev but are Phase 3, explicitly
   excluded.

## Sign-off

Same rule as batch 1: a page here is not complete until every relevant step above has been
run and passed manually — no step is satisfied by an automated check alone (constitution
Principle VII).
