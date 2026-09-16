# Phase 1 Data Model: Post-Launch Manual QA

No database schema — process/tracking records, same style as batch 4.

## Entities

### Live Verification Check

| Field | Type | Notes |
|---|---|---|
| Journey name | text | One row per LS-3716 journey — the FULL set, not a sample (spec Clarifications) |
| Outcome | enum | Pass / New defect (live-specific) |
| Comparison to staging result | text | Whether this diverges from the batch-4 staging result — a divergence is itself signal (spec Acceptance Scenario 1) |

### External Link Check

| Field | Type | Notes |
|---|---|---|
| URL | text | |
| Status | enum | Working / Broken |
| Routed-to batch | reference | Which of batches 1-3 owns the fix, if broken |

### Analytics Sanity Check

| Field | Type | Notes |
|---|---|---|
| Event type | text | e.g. "page view," "conversion" |
| Fired correctly | boolean | |

### Real-User Issue Record

| Field | Type | Notes |
|---|---|---|
| Report source | text | |
| Classification | enum | Release-related defect / Pre-existing or unrelated |
| Routed-to batch | reference | If release-related, which batch owns the fix |

## State / Lifecycle

This batch's overall lifecycle: Not started → Live Verification Checks running → External
Link/Analytics checks running (can run in parallel with the above) → Real-User Issue triage
ongoing → **Closed** (once User Stories 1 and 2's coverage is complete, per FR-006/SC-005) →
[after closure] any further issue triage is normal ongoing operations, not tracked under this
entity model.
