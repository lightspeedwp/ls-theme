# Phase 1 Data Model: Core Site Pages

No new database schema, CPT, or taxonomy — every entity below maps to a standard WordPress
`page` post (or, for the two archive pages, existing Portfolio CPT / Post data already
defined elsewhere). This file documents the content model, not a data-layer model.

## Entities

### Conversion Page

2 instances: Free Consultation, Contact.

| Field | Type | Notes |
|---|---|---|
| Title | text | |
| Form | reference | Existing Gravity Form (already built — LS-1207/LS-1214/LS-2610), not created here |
| Thank-you target | reference | Free Consultation → `/free-consultation/thank-you/` (LS-1211, Done). Contact → `/contact/thank-you/` (LS-2595, this batch) — confirmed distinct, not shared |

Validation rules:
- Each Conversion Page's form submission MUST route to its own distinct thank-you page, not
  a shared one (spec Clarifications, FR-005).

### Index Page

2 instances: Work archive, Insights archive.

| Field | Type | Notes |
|---|---|---|
| Title | text | |
| Template | reference | Portfolio Index (Work) or Blog Index (Insights) — both already defined per LS-1206, reused not rebuilt |
| Taxonomy filters | reference | Work archive: Industries/Services/Project types/Software (LS-1208/LS-1220, already deployed) |

### Family Hub

3 instances: About, Solutions, Policies & Principles.

| Field | Type | Notes |
|---|---|---|
| Title | text | |
| Intro content | rich text | |
| Grouped subpages | list | About: 5 (Process, Team, Culture, History, Accessibility Commitment). Solutions: 7 (Tour Operator, WordPress, WooCommerce, AI Solutions, Publishing, Design Systems, LSX). Policies: 7 (Publishing Principles, Ownership & Funding, Actionable Feedback, Ethics, Diversity Staffing, Corrections, Editorial Content Diversity) |

Validation rules:
- Every Family Hub MUST link to every page in its `Grouped subpages` list (spec FR-006,
  FR-007, FR-009).

### Legal/Policy Page

9 instances: Privacy Policy, Terms & Conditions, and the 7 Policy Sub-Pages.

| Field | Type | Notes |
|---|---|---|
| Title | text | |
| Content | rich text | Already finalised and approved (LS-1224 for the first three; same sourcing model for the 7 sub-policies) |
| Parent hub | reference | Only the 7 Policy Sub-Pages have this; Privacy Policy and Terms & Conditions are standalone, not children of a hub |

### Bespoke Content Page

13 instances: About/Process, Team, Culture, History, Accessibility Commitment, Contact
thank-you, Tour Operator, WordPress (Solutions), WooCommerce (Solutions), AI Solutions,
Publishing, Design Systems, LSX.

| Field | Type | Notes |
|---|---|---|
| Title | text | |
| Content | rich text | Individually authored/approved per page, no shared structural pattern forced across all 13 (see `research.md`) |
| Parent family | reference | About-family pages reference the About hub (except Team, which stays at top-level `/team/` — spec Assumptions); Solutions-family pages reference the Solutions hub |

## State / Lifecycle

No workflow states beyond standard WordPress page statuses (draft → publish). No approval
state machine beyond the constitution's general design-review checkpoint, same as batch 1.
