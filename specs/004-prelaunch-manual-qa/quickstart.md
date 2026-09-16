# Quickstart: Running Pre-Launch Manual QA

This is the runbook for this batch itself — unlike batches 1–3, there's no separate page to
validate; this document IS the validation activity.

## Prerequisites

- Batches 1, 2, and 3 have working drafts on staging — not just specs. If any is still
  planning-only, stop; this batch cannot produce real findings yet (spec Assumptions).
- Access to the LS-3716 issue for the full test-case content (this document does not repeat
  it).
- BugHerd access for defect logging.

## Run: Full-Circle Staging Validation (User Story 1)

1. Work through LS-3716's documented conversion-core journeys across every browser/device in
   its matrix (desktop Chrome/Firefox/Safari, Android, iOS).
2. For each journey/combination: if it completes cleanly, mark it Pass. If not, log a Defect
   Record in BugHerd with the journey/step reference, expected vs. actual result, and
   evidence (spec FR-002).
3. Route each defect back to its originating batch (1, 2, or 3) as a task there — do not fix
   it inline as part of this QA pass (see `research.md`).
4. Once a defect is fixed in its originating batch, re-run its FULL journey here, not just
   the fixed step (spec FR-003).
5. Specifically verify: site-wide navigation/mega-menu link resolution across all three
   batches' combined pages (spec FR-004), and that Free Consultation and Contact route to
   their own distinct thank-you pages at the whole-site level (spec FR-005).
6. Run LS-3716's secondary journeys (blog reading, search/404/footer, SEO/social checks) and
   its supplementary standards checks (Web Platform Tests, CSS Validator, W3C tools, Link
   Checker, Markup Validator).
7. Run an accessibility spot-check across the combined page set from batches 1–3 (spec
   FR-006) — zero known violations required at hand-off (spec SC-003).

**Expected outcome**: spec SC-001, SC-002, SC-003.

## Run: Legacy Page Redirect/Retire Audit (User Story 2)

1. List every page currently live on the production site.
2. Compare each against the new page inventory from batches 1–3 (their combined `spec.md`
   Key Entities / actual built pages).
3. For every legacy page with an identified overlap, record an explicit Redirect or Retire
   decision — no page left ambiguous (spec FR-007, SC-004).
4. If a redirect is later implemented (separate downstream task, not part of this batch),
   verify it actually resolves to the intended new page before considering that specific
   decision closed (spec Acceptance Scenario 2, User Story 2).

**Expected outcome**: spec SC-004.

## Sign-off

Per constitution Principle VII: no requirement above is satisfied by an automated check
alone. No PR test-plan item related to this batch may be checked without having been
actually verified in-session (spec SC-005) — this is the one batch in the whole release plan
where that discipline is the entire point, not a side constraint.
