# Feature Specification: Post-Launch Manual QA

**Feature Branch**: `006-postlaunch-manual-qa`

**Created**: 2026-09-16

**Status**: Draft

**Input**: User description: "Post-Launch Manual QA batch: define the QA process, scope, and coverage requirements for validating the live production site immediately after go-live. Batch 6 of 7, the final batch, feeding the Post-Launch Manual QA Complete milestone."

## Context

This is Batch 6 of 7, the **final batch** in `.specify/memory/release-plan.md`, feeding the
**Post-Launch Manual QA Complete** milestone. It is governed by
`.specify/memory/constitution.md` v1.0.0 — the QA & Verification Integrity principle
applies, same as batch 4.

**Scope boundary — coverage/acceptance-bar definition, not a test-case catalog**: same rule
as batch 4 (`specs/004-prelaunch-manual-qa`). This spec defines WHAT must be covered and the
acceptance bar for calling post-launch QA complete. It does not enumerate individual test
cases or create granular per-test-case Linear issues — the site owner produces those
separately with dedicated tooling. Covers LS-4177.

**This is the one batch that validates the LIVE site, not staging.** The live site
(`https://lightspeedwp.agency/`) remains strictly read-only for any agent, same as batch 5 —
this batch's QA execution is entirely human-performed observation and testing of the live
site, never an agent editing it.

**Hard prerequisite**: this batch cannot start until Website Launch (batch 5,
`specs/005-website-launch`) has actually happened — a recorded "Go" decision and completed
cutover, not merely planned. This is a structural blocking gate, the same pattern used for
every cross-batch dependency in this release plan (batch 3 → batches 1/2; batch 4 → batches
1–3; batch 5 → batch 4; this batch → batch 5).

## Clarifications

### Session 2026-09-16

- Q: For User Story 1's re-tested journeys on the live domain — the full LS-3716 set, or a representative sample? → A: Full set. Every conversion-core journey documented in LS-3716 is re-run against the live domain, not a subset.

**This batch is also where batch 5's rollback safety net formally ends** (per that spec's
Edge Cases) — once this batch begins, ongoing issue management is this batch's concern, not
batch 5's.

**Non-goals**: page-build work (batches 1–3), the pre-launch staging validation itself
(batch 4), the go-live event itself (batch 5), and Phase 3/4 work are all out of scope. This
is the last of the 7 batches — its completion means the entire `release-plan.md` is fully
executed and this planning effort's page-delivery scope is done. Phase 3 (AI governance/
chatbot) and Phase 4 (content finalisation) remain deliberately out of scope beyond this
point, per the constitution's Delivery Phase Scope Boundary.

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Staging-to-Live Confirmation (Priority: P1)

Everything that was verified true on staging during Pre-Launch QA (batch 4) is re-confirmed
true on the actual live domain — not assumed to have survived the cutover unchanged.

**Why this priority**: The cutover itself (batch 5) is a point where things can silently
break (DNS misconfiguration, environment-specific settings, caching) that staging testing
cannot catch. This is the direct check that the promotion didn't introduce new problems.

**Independent Test**: Can be tested by re-running the FULL set of conversion-core journeys
documented in LS-3716 against the live domain and confirming each still holds (see
Clarifications — not a subset).

**Acceptance Scenarios**:

1. **Given** a conversion-core journey passed on staging during batch 4, **When** it is
   re-run on the live domain, **Then** it still passes — any divergence is treated as a new
   defect specific to the live environment, not assumed to be the same as a staging issue.
2. **Given** the forms (Free Consultation, Contact) were confirmed to route to production
   endpoints during batch 5's cutover, **When** they are tested live, **Then** actual
   submissions are captured correctly in the live/production system, not a staging one.

---

### User Story 2 - External Link and Analytics Sanity Check (Priority: P2)

Broken external links are identified, and analytics/tracking is confirmed to actually fire
correctly on the live domain — something that cannot be verified until the site is actually
live.

**Why this priority**: These checks are only meaningful post-launch (analytics can't be
verified pre-launch in a way that reflects real production behavior) and are lower-urgency
than the direct conversion-path check above, but still required before this batch is
considered done.

**Independent Test**: Can be tested by checking a sample of external links site-wide for
breakage and confirming analytics/tracking events fire on real page views on the live
domain.

**Acceptance Scenarios**:

1. **Given** the live site, **When** external links are checked, **Then** broken ones are
   identified and logged for follow-up (fixing them is routed to their originating batch,
   same pattern as batch 4).
2. **Given** the live site, **When** a real page view or conversion event occurs, **Then**
   analytics/tracking correctly records it.

---

### User Story 3 - Real-User Issue Triage and Scope Hand-off (Priority: P3)

Issues reported by actual first-time visitors to the live site (not test users) are
triaged, and this batch has a clearly defined end-point where its scope hands off to normal
ongoing site operations, rather than remaining open-ended.

**Why this priority**: Lowest priority in sequencing terms (it depends on the site being
live long enough for real users to arrive), but essential — without a defined end-point,
"post-launch QA" could never formally close.

**Independent Test**: Can be tested by confirming a defined trigger (e.g. a time window, or
a specific set of checks completing) marks this batch's scope as closed, handing off to
ongoing operations.

**Acceptance Scenarios**:

1. **Given** a real user reports an issue on the live site, **When** it's triaged, **Then**
   it's classified as either a defect from this release (routed to its originating batch or
   handled as a new fix) or a pre-existing/unrelated issue (out of this batch's scope).
2. **Given** this batch's defined coverage (User Stories 1 and 2) is complete, **When** the
   end-point condition is reached, **Then** this batch — and with it, the entire 7-batch
   release plan — is formally marked complete, and further issue management becomes normal
   ongoing site operations, not tracked under this spec.

### Edge Cases

- What happens if a Staging-to-Live check (User Story 1) fails — something worked on staging
  but not live? This is a new, live-environment-specific defect, escalated with priority
  (it affects real visitors now), not treated the same as a routine pre-launch finding.
- What happens if real-user issues keep arriving indefinitely — when does this batch actually
  end? Per Acceptance Scenario 2, once User Stories 1 and 2's defined coverage is complete,
  this batch closes; ongoing issue triage after that point is normal operations, not part of
  this spec's scope. This spec does not attempt to define "ongoing operations" itself.
- How does this batch's live-site checks avoid becoming, in practice, an agent editing the
  live site while investigating an issue? All investigation is read-only observation; any fix
  goes through the normal batch/PR process on the theme/plugin repos and is deployed through
  the site owner's normal process, never as a direct live-site edit during this QA activity.

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: The FULL set of conversion-core journeys documented in LS-3716 and verified
  during Pre-Launch QA (batch 4) MUST be re-confirmed on the actual live domain — not a
  subset, and not assumed to have survived cutover unchanged (see Clarifications).
- **FR-002**: Free Consultation and Contact form submissions MUST be confirmed to be
  captured correctly in the live/production system when tested live.
- **FR-003**: External links site-wide MUST be checked for breakage; any found MUST be
  logged and routed to their originating batch for fixing, not fixed inline during this QA
  activity.
- **FR-004**: Analytics/tracking MUST be confirmed to fire correctly on real page views and
  conversion events on the live domain.
- **FR-005**: Issues reported by real visitors to the live site MUST be triaged as either a
  release-related defect or a pre-existing/unrelated issue.
- **FR-006**: This batch MUST have a defined end-point (User Stories 1 and 2's coverage
  being complete) after which further issue management is normal ongoing operations, not
  tracked under this batch.
- **FR-007**: This batch MUST NOT be marked complete via automated checks alone — human
  verification is required for every requirement above (constitution Principle VII).
- **FR-008**: No investigation performed during this batch may involve an agent directly
  editing the live site — all observation is read-only; any resulting fix goes through the
  normal batch/PR/deployment process.
- **FR-009**: This spec MUST NOT be used as the source of granular test cases — that
  catalog is produced separately by the site owner using dedicated tooling.

### Key Entities

- **Live Verification Check**: A re-run of a specific staging-verified journey against the
  live domain, producing a pass/new-defect outcome.
- **External Link Check**: A record of one checked link, whether it resolves, and if broken,
  which batch it's routed to.
- **Analytics Sanity Check**: Confirmation that a specific tracking event fires correctly on
  the live domain.
- **Real-User Issue Record**: A triaged report from an actual site visitor, classified as
  release-related or pre-existing/unrelated.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: 100% of the FULL set of conversion-core journeys (LS-3716) pass when re-run on
  the live domain, or have a logged, escalated defect record — no journey is skipped as
  "already proven on staging" (see Clarifications).
- **SC-002**: Both Free Consultation and Contact are confirmed to capture live submissions
  correctly in the production system.
- **SC-003**: Every checked external link's status (working/broken) is recorded, with broken
  ones routed to their originating batch.
- **SC-004**: Analytics/tracking is confirmed firing correctly for at least one real page
  view and one real conversion event on the live domain.
- **SC-005**: This batch reaches a defined, recorded close point — it does not remain
  open-ended indefinitely.
- **SC-006**: Zero PR test-plan items related to this batch are checked without having been
  actually verified in-session.

## Assumptions

- Detailed test-case authoring and any granular per-test-case Linear issues are produced by
  the site owner separately, using dedicated tooling — same convention as batch 4.
- This batch can only meaningfully start once Website Launch (batch 5) has actually
  happened — running it against a not-yet-live site would produce no real findings.
- "Ongoing site operations" beyond this batch's defined end-point is explicitly not scoped
  or defined by this spec — it is normal post-project operational work, outside the release
  plan's 7-batch structure entirely.
- Any defect found during this batch that requires a code fix is routed back to its
  originating batch (1, 2, or 3) as a task there, following the same pattern established in
  batch 4 — this batch does not itself modify theme/plugin code.
