# Phase 1 Data Model: Pre-Launch Manual QA

No database schema — this batch's "entities" are process/tracking records, mostly living in
BugHerd and Linear, not in the WordPress database.

## Entities

### Staging Test Journey

| Field | Type | Notes |
|---|---|---|
| Name | text | e.g. "J1 — conversion core" (per LS-3716's existing journey naming) |
| Browser/device combination | reference | One row per combination in the documented matrix (desktop Chrome/Firefox/Safari, Android, iOS) |
| Outcome | enum | Pass / Defect logged |

### Defect Record

| Field | Type | Notes |
|---|---|---|
| Journey/step reference | reference | Which Staging Test Journey and step it occurred on |
| Expected result | text | |
| Actual result | text | |
| Evidence | reference | Screenshot or recording |
| Originating batch | reference | Which of batches 1–3 owns the affected page — determines where the fix task is created |
| Re-test status | enum | Not yet fixed / Fixed, pending re-test / Re-tested, passing |

Validation rules:
- A Defect Record MUST NOT be closed until its full originating journey (not just the fixed
  step) is re-tested and passes (spec FR-003, Acceptance Scenario 2).

### Legacy Page Decision

| Field | Type | Notes |
|---|---|---|
| Legacy page URL | text | On the current live site |
| Overlapping new page | reference | The batch 1–3 page it overlaps with, if any |
| Decision | enum | Redirect / Retire / No overlap (no decision needed) |
| Redirect target | reference | Required if Decision = Redirect |

Validation rules:
- Every legacy page with an identified overlap MUST have a non-null Decision (spec FR-007,
  SC-004) — "undecided" is not a valid end state for an overlapping page.

## State / Lifecycle

- **Staging Test Journey**: Not run → Run (Pass) or Run (Defect logged) → [if defect] Fixed →
  Re-tested (Pass) or Re-tested (Defect persists, loop back).
- **Legacy Page Decision**: Unaudited → Audited (Decision recorded) → [if Redirect] Redirect
  implemented and verified (spec Acceptance Scenario 2, User Story 2) — implementation is a
  separate downstream task, not part of this batch's own completion, but its *verification*
  once implemented is in scope per that acceptance scenario.
