# Quickstart: Validating the Services Family Batch

This is a validation guide, not an implementation guide — it documents how to prove each
piece of this batch works end-to-end once built. Implementation details belong in `tasks.md`.

## Prerequisites

- Local or dev WordPress environment with `ls-theme` active (this repo's existing dev
  workflow — see root `README.md`/`AGENTS.md`, not repeated here).
- Read access to the dev site (`https://ls-agency.lightspeedwp.dev/`) for content/link
  comparison — per `release-plan.md` Reference Environments, this is read-only from a
  planning/spec context; actual page edits happen through the normal WordPress editing flow,
  not ad hoc.
- The relevant Figma frame for whichever page is being validated (per-page, on demand — not
  gathered upfront; see `spec.md` Design source timing).

## Validate: Services Hub (User Story 1)

1. Open the Services hub page in the WordPress editor or front end.
2. Confirm all 6 Service Phases (Discover, Create, Build, Launch, Grow, Evolve) are listed
   and linked, in lifecycle order.
3. Click each phase link — confirm it lands on the correct phase page.
4. Toggle light/dark mode and resize to mobile/tablet/desktop — confirm layout holds at every
   combination (constitution Accessibility Baseline + spec SC-004).
5. Run an accessibility spot-check (heading hierarchy, alt text, keyboard nav, focus
   visibility) — zero known violations required (spec SC-003).

**Expected outcome**: A visitor can identify all 6 phases and reach any of them within one
visit, per spec SC-001.

## Validate: A Phase Page (User Stories 2-7, repeat per phase)

1. Open the phase page (e.g. Launch) in the editor or front end.
2. Confirm the phase's own explanatory content is present (not just a stub).
3. Confirm every service grouped under that phase is linked (e.g. Launch → Hosting,
   Performance, Security, Training) — cross-check against the phase→service mapping in
   `data-model.md`.
4. Click each service link — confirm it lands on the correct service page.
5. Repeat the light/dark + responsive + accessibility checks from the hub validation above.

**Expected outcome**: A visitor can identify which service within the phase matches their
need within one visit, per spec SC-002.

## Validate: A Service Page (all 14, repeat per page)

1. Open the service page directly (not via its phase page) — confirms independent
   testability per each user story's Independent Test criterion.
2. Confirm the page explains its own service scope without requiring prior context.
3. Confirm the CTA is present and points to the correct target:
   - Free Consultation → `https://ls-agency.lightspeedwp.dev/free-consultation/` (must
     resolve — this page exists).
   - Any other CTA target — record whether it currently resolves; an unresolved target is
     acceptable dev-state, not a failure, per spec Clarifications.
4. Confirm related-service links point to other real Service Pages in this batch.
5. Repeat the light/dark + responsive + accessibility checks.

**Expected outcome**: 100% of phase-to-service and hub-to-phase links resolve (spec SC-005,
excluding the CTA exemption noted above); the AI service page specifically is verified stable
enough to hand off to the AI Mega Page batch (spec SC-006).

## Validate: Design Token Discipline (cross-cutting)

1. For every new colour token introduced for the 6 phase badges, open both `theme.json` and
   `styles/dark.json`.
2. Confirm each phase's badge token has a value in both files, and the two values are
   genuinely different (never identical) — constitution Principle III.
3. If a token was reused from an existing entry rather than newly created, confirm that reuse
   was checked first (Principle VIII) rather than assumed.

**Expected outcome**: Zero tokens with matching light/dark values anywhere touched by this
batch.

## Sign-off

A page in this batch is not marked complete until every step above for that page has been
run and passed manually — no step here is satisfied by an automated check alone (constitution
Principle VII).
