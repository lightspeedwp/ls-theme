# Quickstart: Running Post-Launch Manual QA

The final runbook in the release plan. Every step is human-executed, read-only observation
of the live site — never an agent edit.

## Prerequisites

- Website Launch (batch 5) has actually happened — a recorded "Go" decision and completed
  cutover. If not, stop; this batch cannot run yet.
- Access to LS-3716's full journey list, BugHerd, and the site's live analytics/tracking
  dashboard.

## Run: Staging-to-Live Confirmation (User Story 1)

1. Re-run the FULL set of journeys documented in LS-3716 against the live domain — every
   one, not a sample (per Clarifications).
2. For each journey: compare against its batch-4 staging result. If it still passes, mark
   Pass. If it diverges, log a new, live-environment-specific defect (spec Acceptance
   Scenario 1) — this is treated with priority since it affects real visitors now.
3. Test Free Consultation and Contact submissions live; confirm they're captured correctly
   in the production system, not a staging one (spec FR-002).

## Run: External Link and Analytics Sanity Check (User Story 2)

1. Check external links site-wide for breakage; log any broken ones and route them to their
   originating batch (spec FR-003).
2. Trigger a real page view and a real conversion event on the live domain; confirm
   analytics/tracking records both correctly (spec FR-004).

## Run: Real-User Issue Triage and Close-Out (User Story 3)

1. Triage any issue reported by an actual live-site visitor: classify as release-related
   (route to its originating batch) or pre-existing/unrelated (out of this batch's scope).
2. Once User Stories 1 and 2's coverage above is complete: formally close this batch (spec
   FR-006, SC-005).
3. Closing this batch closes the entire 7-batch release plan — confirm this explicitly, it
   is not implicit.

## Sign-off

Per constitution Principle VII and spec FR-007/FR-008: no requirement above is satisfied by
an automated check alone, and no investigation performed here ever involves an agent
directly editing the live site. This is the last gate in the release plan — once it closes,
further work is normal ongoing operations, not tracked under any spec in this series.
