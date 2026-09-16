# Feature Specification: Website Launch

**Feature Branch**: `005-website-launch`

**Created**: 2026-09-16

**Status**: Draft

**Input**: User description: "Website Launch batch: define the go-live process, readiness gate, and rollback safety for launching the LightSpeedWP.Agency website. Batch 5 of 7 in the release plan, feeding the Website Launch milestone."

## Context

This is Batch 5 of 7 delivery batches defined in `.specify/memory/release-plan.md`, feeding
the **Website Launch** milestone. It is governed by `.specify/memory/constitution.md` v1.0.0.

**No Linear issue currently exists for this batch's actual launch-checklist work.** This
spec's completion notes that one needs to be created — that decision is deferred to the site
owner, not made here.

**This is the go-live event itself**: promoting the site from
`https://ls-agency.lightspeedwp.dev/` (dev/staging) to be the live production site at
`https://lightspeedwp.agency/`. Per this project's standing rule, the live site is
**strictly read-only from any agent context** — no edits or edit attempts are ever made to
it directly by an agent. The actual cutover is a human-performed action using the site
owner's own deployment/hosting process. This spec defines the decision points and safety
net around that moment; it does not, and cannot, execute the cutover itself.

**Hard prerequisite**: this batch cannot start until Pre-Launch Manual QA (batch 4,
`specs/004-prelaunch-manual-qa`) is fully complete — 100% of conversion-core journeys
passing, zero known accessibility violations, and all legacy-page redirect/retire decisions
recorded. This is a structural blocking gate, the same pattern used for batch 3's AI
Services/AI Solutions dependency and batch 4's batches-1–3 dependency.

**Non-goals**: This batch does not include the manual QA test execution itself (batch 4) or
the post-launch validation work (batch 6, separate spec). It covers specifically: the go/
no-go decision, the cutover sequencing, and the rollback safety net for the period
immediately around go-live. No page-build work, no Phase 3/4 work.

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Go/No-Go Decision (Priority: P1)

Before any cutover action is taken, the site owner makes an explicit go/no-go decision based
on Pre-Launch Manual QA's completion status — not on assumption or partial completion.

**Why this priority**: Every other part of this batch depends on this decision being made
deliberately and correctly; a premature "go" undermines everything else in the release plan.

**Independent Test**: Can be tested by confirming a go/no-go decision is recorded, with its
basis (Pre-Launch Manual QA's actual completion status) explicitly stated, before any
cutover step begins.

**Acceptance Scenarios**:

1. **Given** Pre-Launch Manual QA (batch 4) is not fully complete, **When** a go/no-go
   decision is due, **Then** the decision is "no-go" — launch does not proceed on partial
   QA completion.
2. **Given** Pre-Launch Manual QA is fully complete, **When** the go/no-go decision is made,
   **Then** it is explicitly recorded as "go," with a timestamp and who made the call.

---

### User Story 2 - Cutover Sequencing (Priority: P2)

Once "go" is decided, the site owner promotes the site from staging to production in a
defined, low-risk sequence, including the specific reminders already flagged on LS-3716
(removing staging `noindex`, confirming production form destinations).

**Why this priority**: The sequence itself is what determines whether the cutover is safe or
reckless — this is the actual mechanics of the launch, appropriately second only to the
decision to do it at all.

**Independent Test**: Can be tested by confirming each cutover step is completed in order,
with each of LS-3716's launch reminders explicitly checked off, not assumed.

**Acceptance Scenarios**:

1. **Given** a "go" decision, **When** the cutover begins, **Then** the staging site's
   `noindex` directive is removed as part of the sequence (per LS-3716's existing launch
   reminder) — not forgotten because it wasn't the "main" part of the launch.
2. **Given** a "go" decision, **When** the cutover begins, **Then** production form
   destinations (Free Consultation, Contact) are confirmed to point at production endpoints,
   not staging ones (per LS-3716's existing launch reminder).
3. **Given** the cutover is complete, **When** a visitor reaches the live domain, **Then**
   they reach the newly-launched site, not the old previous site or a broken intermediate
   state.

---

### User Story 3 - Rollback Safety Net (Priority: P3)

If a critical issue is discovered immediately after go-live — before Post-Launch Manual QA
(batch 6) has even had a chance to run — the site owner has a clear, pre-defined rollback
path rather than improvising one under pressure.

**Why this priority**: Lower priority than the decision and the cutover itself only in
sequencing terms (it's prepared *before* launch but only exercised *if needed after*) — but
its absence would be the single highest-severity gap in this whole batch if a critical issue
did occur.

**Independent Test**: Can be tested by confirming a rollback plan exists and is specific
enough to execute without needing to be invented in the moment — not just "we'll figure it
out."

**Acceptance Scenarios**:

1. **Given** a critical issue is found immediately after go-live, **When** the site owner
   decides to roll back, **Then** a pre-defined rollback path is followed, not improvised.
2. **Given** a rollback is executed, **When** it completes, **Then** the site owner has a
   clear signal for what "rolled back successfully" looks like, so the rollback itself isn't
   left in an ambiguous state.

### Edge Cases

- What happens if Pre-Launch Manual QA appears complete but a new critical issue is found in
  the final review before cutover? The go/no-go decision reverts to "no-go" — this batch does
  not assume QA sign-off is permanently valid once granted; it's checked at the moment of
  decision, not just historically true.
- What happens if the rollback path itself is untested? This spec does not require a full
  rehearsed rollback drill (that would be disproportionate for a single-site launch), but
  does require the rollback path to be concretely documented, not just assumed to work.
- How is "immediately after go-live" distinguished from Post-Launch Manual QA's own scope
  (batch 6)? This batch's rollback safety net covers the window between cutover and the
  start of batch 6's own validation work — once batch 6 begins, ongoing issue management is
  its concern, not this batch's.

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: A go/no-go decision MUST be explicitly recorded (decision, basis, timestamp,
  decision-maker) before any cutover step begins.
- **FR-002**: The decision MUST be "no-go" if Pre-Launch Manual QA (batch 4) is not fully
  complete at the time of the decision.
- **FR-003**: The cutover sequence MUST include removing the staging site's `noindex`
  directive (per LS-3716's existing launch reminder).
- **FR-004**: The cutover sequence MUST include confirming production form destinations
  (Free Consultation, Contact) point at production endpoints, not staging.
- **FR-005**: A rollback plan MUST exist and be documented concretely enough to execute
  without improvisation, before the go/no-go decision is made — not authored after a
  critical issue is already occurring.
- **FR-006**: This batch MUST NOT proceed to cutover via automated process alone — the
  go/no-go decision and the cutover sequence both require human execution and verification
  (constitution Principle VII), consistent with the live site being strictly read-only from
  any agent context.
- **FR-007**: A Linear issue for this batch's launch-checklist work does not yet exist; this
  spec's completion should flag that a decision is needed on whether/how to create one, not
  create it automatically.

### Key Entities

- **Go/No-Go Decision**: A recorded decision (go or no-go), its basis, timestamp, and
  decision-maker.
- **Cutover Step**: One item in the defined promotion sequence (e.g. noindex removal, form
  destination confirmation, DNS/hosting promotion).
- **Rollback Plan**: A documented, pre-defined path back to the prior state, usable without
  improvisation if invoked.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: Zero cutover steps begin before an explicit "go" decision is recorded.
- **SC-002**: 100% of LS-3716's launch reminders (noindex removal, production form
  destinations) are explicitly checked off during cutover, not assumed complete.
- **SC-003**: A documented rollback plan exists before the go/no-go decision is made, 100%
  of the time — not authored reactively.
- **SC-004**: If a rollback is invoked, the site owner has an unambiguous signal for when it
  is complete.

## Assumptions

- The actual domain/DNS or hosting-promotion mechanics are specific to the site owner's
  hosting setup and are not detailed in this spec — this spec defines the decision points
  and required checks around that mechanism, not the mechanism itself.
- A full rehearsed rollback drill is disproportionate for a single-site launch of this scale;
  a concretely documented (but not necessarily rehearsed) rollback path satisfies FR-005.
- This batch assumes Pre-Launch Manual QA's completion status is checked fresh at
  decision-time, not relied upon from an earlier point in time (see Edge Cases).
- Whether/how to create a Linear issue for this batch's launch-checklist work is a decision
  for the site owner, not made in this spec (FR-007).
