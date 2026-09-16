# Quickstart: Validating the AI Mega Page

Validation guide, not an implementation guide.

## Prerequisites

- **Both AI Services (`/services/ai/`) and AI Solutions (`/solutions/ai/`) must already be
  built and stable before any of the steps below are meaningful.** If either is not yet
  built, stop — this quickstart cannot be run yet, per spec FR-006.
- Local/dev WordPress environment with `ls-theme` active.
- The Figma frame for this page, supplied by the site owner at implementation time.

## Validate: Consolidated AI Landing Page (User Story 1)

1. Open the AI Mega Page in the editor or front end.
2. Read it end-to-end without having read either source page first. Confirm you come away
   understanding both what AI-related services LightSpeed delivers and what AI-powered
   solutions it builds, as one narrative — not two visibly separate, disconnected sections
   (spec FR-001, SC-001).
3. Confirm a link to the AI Services page and a link to the AI Solutions page are both
   present and correct (spec FR-002).
4. Confirm at least one conversion action (Free Consultation or Contact) is present and
   links correctly.
5. Toggle light/dark mode and resize to mobile/tablet/desktop — confirm layout holds at
   every combination (spec SC-003).
6. Run an accessibility spot-check (heading hierarchy, alt text, keyboard nav, focus
   visibility) — zero known violations required (spec SC-002).
7. Compare the page against a simple mental concatenation of the AI Services and AI
   Solutions pages' content — confirm it reads as meaningfully more than that (spec
   Acceptance Scenario 4).

## Validate: Token Discipline (if new tokens were introduced)

Same as batches 1 and 2: for every new colour/design token this page introduces, confirm
`theme.json` and `styles/dark.json` both have a value, and the two values are genuinely
different (constitution Principle III).

## Sign-off

Same rule as batches 1 and 2: this page is not complete until every step above has been run
and passed manually — no step is satisfied by an automated check alone (constitution
Principle VII).
