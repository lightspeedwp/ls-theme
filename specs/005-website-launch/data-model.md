# Phase 1 Data Model: Website Launch

No database schema — this batch's entities are decision/process records, not code or content
data.

## Entities

### Go/No-Go Decision

| Field | Type | Notes |
|---|---|---|
| Decision | enum | Go / No-Go |
| Basis | text | Must reference Pre-Launch Manual QA's actual completion status, checked fresh at decision-time (spec Edge Cases) |
| Timestamp | datetime | |
| Decision-maker | text | |

Validation rules:
- Decision MUST be No-Go if Pre-Launch Manual QA is not fully complete at decision-time
  (spec FR-002).

### Cutover Step

| Field | Type | Notes |
|---|---|---|
| Name | text | e.g. "Remove staging noindex," "Confirm production form destinations," "DNS/hosting promotion" |
| Source | reference | LS-3716's existing launch reminders, for the first two; site owner's hosting process for the rest |
| Status | enum | Not started / Complete, verified |

Validation rules:
- Every Cutover Step MUST be explicitly marked Complete, verified — not assumed complete
  because the overall cutover happened (spec SC-002).

### Rollback Plan

| Field | Type | Notes |
|---|---|---|
| Documented path | text | Concrete enough to execute without improvisation (spec FR-005) |
| Completion signal | text | What "rolled back successfully" looks like (spec SC-004) |
| Authored | datetime | Must be before the Go/No-Go Decision's timestamp (spec FR-005) |

## State / Lifecycle

- **Go/No-Go Decision**: Undecided → Decided (Go or No-Go). If No-Go, the batch's user
  stories 2 and 3 (Cutover, Rollback readiness) do not proceed — the batch effectively pauses
  until re-decided.
- **Cutover Step**: Not started → Complete, verified. All steps must reach this state before
  the cutover as a whole is considered done.
- **Rollback Plan**: Must reach "documented" state before the Go/No-Go Decision is made. If
  invoked post-launch: Documented → Invoked → Complete (per its own Completion signal field).
