# Feature Specification: Pre-Launch Manual QA

**Feature Branch**: `004-prelaunch-manual-qa`

**Created**: 2026-09-16

**Status**: Draft

**Input**: User description: "Pre-Launch Manual QA batch: define the QA process, scope, and coverage requirements for validating every page built across batches 1-3 before launch, plus the legacy-page redirect/retire audit. Batch 4 of 7 in the release plan, feeding the Pre-Launch Manual QA Complete milestone."

## Context

This is Batch 4 of 7 delivery batches defined in `.specify/memory/release-plan.md`, feeding
the **Pre-Launch Manual QA Complete** milestone. It is governed by
`.specify/memory/constitution.md` v1.0.0 — specifically the QA & Verification Integrity
principle (manual verification required, no `validate_blocks`, no automated-check-only
sign-off), which this entire batch exists to enforce.

**Scope boundary — this spec is a coverage/acceptance-bar definition, not a test-case
catalog**: this spec defines WHAT must be covered and WHEN pre-launch QA can be called
complete. It does **not** enumerate every individual test case, browser/device/journey
combination, or create granular per-test-case Linear issues. Detailed test-case authoring
and any needed sub-issues are handled separately by the site owner using dedicated tooling
built for that purpose (GPT agents / Claude skills specialised for test-case generation) —
this is recorded explicitly in Assumptions so this spec is never mistaken for that catalog.

**Unlike batches 1–3**, this batch is not page-build work — it validates work already
planned (and, eventually, built) in those batches. It has two distinct halves: (1) the
full-circle staging test plan (LS-3716, which already carries a detailed existing
description with a browser/device matrix and human user-journey test cases attached — this
spec does not restate that content, it references it), and (2) the legacy-page redirect/
retire audit (LS-4176).

**Non-goals**: This batch does not build or fix pages — that is batches 1–3's job, and any
defect found here becomes a task back in the relevant batch, not fixed inline as part of QA.
Website Launch (batch 5) and Post-Launch Manual QA (batch 6) are separate, later batches.
Phase 3/4 work is out of scope for the whole release.

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Full-Circle Staging Validation (Priority: P1)

Before launch, every page built across the Services Family, Core Site Pages, and AI Mega
Page batches is exercised end-to-end on staging by a human, covering navigation, forms,
search, SEO/redirects, accessibility, and cross-browser/cross-device rendering — not just
individually (as each batch's own `quickstart.md` already requires) but as a connected,
whole-site experience.

**Why this priority**: This is the primary gate between "individually verified pages" and
"a site ready to launch." A page passing its own batch's quickstart checks in isolation does
not guarantee the whole site holds together (e.g. a mega-menu link from one batch pointing
at a page from another batch).

**Independent Test**: Can be tested by working through the existing LS-3716 test plan
(conversion core across the documented browser/device matrix, secondary journeys, and the
supplementary standards checks it already lists) and confirming each journey completes
without a blocking defect.

**Acceptance Scenarios**:

1. **Given** the conversion core journeys (documented in LS-3716) are run across every
   browser/device in the documented matrix, **When** a journey is attempted, **Then** it
   completes without a blocking defect, or any defect found is logged in BugHerd with its
   journey/step reference, expected vs. actual result, and evidence.
2. **Given** a defect is fixed on staging, **When** its affected journey is re-run, **Then**
   the full journey passes, not just the specific step that was fixed.
3. **Given** the mega menu and site-wide navigation, **When** every link is clicked through,
   **Then** it resolves to a real, correct page — no link from one batch pointing at a page
   from another batch may be broken.
4. **Given** the Free Consultation and Contact forms, **When** each is submitted, **Then**
   each routes to its own correct, distinct thank-you page (per the batch 2 spec's
   Clarifications — this is a specific regression to check for at the whole-site level, not
   just within batch 2's own scope).

---

### User Story 2 - Legacy Page Redirect/Retire Audit (Priority: P2)

Every legacy/overlapping page on the current live site is compared against the new page
inventory from batches 1–3, and a redirect-or-retire decision is made and recorded for each
one that overlaps.

**Why this priority**: Lower priority than the staging validation because it can only start
once the new page inventory is actually known — it depends on batches 1–3 having working
drafts to compare against, not just their specs.

**Independent Test**: Can be tested by producing a list of every legacy page compared against
the new inventory, with an explicit redirect/retire decision recorded for each overlapping
page.

**Acceptance Scenarios**:

1. **Given** the new page inventory from batches 1–3 is known, **When** the legacy site is
   audited against it, **Then** every legacy page that overlaps with a new page has an
   explicit redirect-or-retire decision recorded — no page is left ambiguous.
2. **Given** a legacy page is marked for redirect, **When** the redirect is implemented (as
   a task, tracked separately from this audit), **Then** it is verified to actually resolve
   to the correct new page, not left as a decision-only record.

### Edge Cases

- What happens if a defect is found during User Story 1 that turns out to require a design
  decision, not just a bug fix (e.g. a genuinely missing page)? This is escalated back to the
  relevant batch (1, 2, or 3) as new/updated scope, not resolved inline during QA — QA
  surfaces gaps, it does not close them.
- What happens if the legacy-page audit (User Story 2) finds a legacy page with no clear
  equivalent anywhere in the new inventory? It defaults to "retire" unless there's a specific
  reason to keep it, but the actual decision criteria are a judgment call for the site owner,
  not something this spec can fully predetermine.
- How is a defect distinguished from a "known, expected dev-state" link (per batches 1/2's
  own Clarifications about unresolved cross-batch links during active development)? By the
  time this batch runs, batches 1–3 should have working drafts — a link that's still
  unresolved at this stage is a real defect, not expected dev-state anymore.

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: Every conversion-core user journey documented in LS-3716 MUST be run across
  the full documented browser/device matrix before this batch can be marked complete.
- **FR-002**: Every defect found MUST be logged in BugHerd with its journey/step reference,
  expected vs. actual result, and supporting evidence (screenshot or recording) — per
  LS-3716's existing acceptance criteria.
- **FR-003**: Every fixed defect's full journey MUST be re-run, not just the specific step
  that was fixed.
- **FR-004**: Site-wide navigation (including the mega menu) MUST be click-through tested,
  confirming every link resolves to a real, correct page regardless of which batch built the
  link's source or target.
- **FR-005**: The Free Consultation and Contact forms MUST each be confirmed to route to
  their own correct, distinct thank-you pages at the whole-site level.
- **FR-006**: Every page across batches 1–3 MUST pass an accessibility spot-check (WCAG 2.1
  AA) at the whole-site level, not just within its own originating batch.
- **FR-007**: The legacy-page audit MUST compare every current live-site page against the
  new page inventory from batches 1–3 and record an explicit redirect-or-retire decision for
  every overlapping page.
- **FR-008**: This batch MUST NOT be marked complete via automated checks alone — every
  requirement above requires human verification (constitution Principle VII).
- **FR-009**: This spec MUST NOT be used as the source of granular test cases — that
  catalog is produced separately by the site owner using dedicated tooling.

### Key Entities

- **Staging Test Journey**: A named, documented user journey (from LS-3716) run across a
  browser/device matrix, producing a pass/fail/defect-logged outcome per combination.
- **Defect Record**: A BugHerd entry tied to a specific journey/step, with expected vs.
  actual result and evidence — the unit of tracked failure in this batch.
- **Legacy Page Decision**: A record of one legacy page's redirect-or-retire disposition
  relative to the new page inventory.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: 100% of conversion-core journeys pass on every documented browser/device
  combination, or have a logged, triaged, and re-tested defect record.
- **SC-002**: 100% of site-wide navigation links (mega menu and otherwise) resolve correctly
  across batches 1–3's combined page set.
- **SC-003**: Zero known WCAG 2.1 AA violations remain open across batches 1–3's combined
  page set at hand-off.
- **SC-004**: 100% of legacy pages that overlap with the new inventory have an explicit,
  recorded redirect-or-retire decision — zero left ambiguous.
- **SC-005**: Zero PR test-plan items are checked without having been verified in-session
  (constitution Principle VII) — this is audited, not just aspirational.

## Assumptions

- Detailed test-case authoring and any granular per-test-case Linear issues are produced by
  the site owner separately, using dedicated tooling (GPT agents / Claude skills) built for
  that purpose — this spec defines coverage and the acceptance bar, not the test-case
  catalog itself.
- This batch can only meaningfully start once batches 1–3 have working drafts of their pages
  — running it against specs alone (before any implementation) would produce no real
  findings.
- The existing LS-3716 description (browser/device matrix, human user-journey test cases,
  supplementary standards checks) remains the authoritative source for the staging test
  plan's actual content; this spec governs its completion bar, not its content.
- Defects found during this batch are routed back to their originating batch (1, 2, or 3) as
  new or updated tasks, not fixed inline as part of the QA process itself.
