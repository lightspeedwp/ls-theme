# Quickstart: Running the Website Launch Batch

This is the runbook for the go-live event itself — every step here is human-executed. No
step in this document is ever performed by an agent against the live site.

## Prerequisites

- Pre-Launch Manual QA (batch 4) is confirmed **fully** complete — checked fresh, not
  assumed from an earlier point in time (spec Edge Cases).
- A rollback plan is already documented (see below) — before proceeding to the decision
  step, not after.

## Run: Rollback Plan (prepare this first, before the decision)

1. Document the concrete steps to revert to the pre-launch state if a critical issue is
   found immediately after go-live (spec FR-005).
2. Document an unambiguous completion signal for "rollback successful" (spec SC-004).
3. Do this BEFORE the go/no-go decision below — not reactively.

## Run: Go/No-Go Decision (User Story 1)

1. Check Pre-Launch Manual QA's actual current completion status — not its status from
   whenever it was last checked.
2. If not fully complete: record the decision as No-Go. Stop here; do not proceed.
3. If fully complete: record the decision as Go, with timestamp and decision-maker (spec
   FR-001).

## Run: Cutover Sequencing (User Story 2) — only if Go

1. Remove the staging site's `noindex` directive (LS-3716 launch reminder; spec FR-003).
2. Confirm production form destinations (Free Consultation, Contact) point at production
   endpoints, not staging (LS-3716 launch reminder; spec FR-004).
3. Perform the site owner's own DNS/hosting promotion process (not detailed in this spec —
   site-specific).
4. Verify the live domain resolves to the newly-launched site, not the old site or a broken
   intermediate state (spec Acceptance Scenario 3, User Story 2).
5. Mark each cutover step Complete, verified — individually, not as one bundled "launch
   done" checkbox (spec SC-002).

## Run: Rollback Readiness Window (User Story 3)

1. Keep the rollback plan ready and accessible through the window between cutover and the
   start of Post-Launch Manual QA (batch 6) — this is this batch's own scope boundary (spec
   Edge Cases).
2. If a critical issue is found in this window: execute the documented rollback plan, not an
   improvised one.
3. Confirm the rollback's own completion signal before considering it resolved.

## Sign-off

Per constitution Principle VII, and this batch's own FR-006: no step above is ever satisfied
by an automated process. This is the one batch in the release plan where "human executes
this" isn't just a QA discipline — it's a hard rule about what an agent is allowed to touch.
