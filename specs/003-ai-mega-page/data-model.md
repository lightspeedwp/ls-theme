# Phase 1 Data Model: AI Mega Page

No database schema, CPT, or taxonomy — a single standard WordPress `page` post.

## Entities

### AI Mega Page

Single instance.

| Field | Type | Notes |
|---|---|---|
| Title | text | |
| Consolidated narrative content | rich text | Synthesizes AI Services and AI Solutions content editorially, not mechanically merged (spec Assumptions) |
| Link to AI Services page | URL | `/services/ai/` (batch 1) |
| Link to AI Solutions page | URL | `/solutions/ai/` (batch 2) |
| Conversion CTA | URL | Free Consultation (`https://ls-agency.lightspeedwp.dev/free-consultation/`) or Contact, per the established convention from batches 1 and 2 |

Validation rules:
- MUST NOT be built/published before both source pages (AI Services, AI Solutions) are
  confirmed built and stable (spec FR-006) — this is a build-sequencing rule, not a
  data-shape rule, but recorded here since it governs when this entity's content can be
  authored at all (it depends on reading the finished source pages, not just knowing they
  exist).

## State / Lifecycle

Standard WordPress page statuses (draft → publish). No approval-gate state machine beyond
the constitution's general design-review checkpoint. This entity has one additional
lifecycle precondition not present in batches 1/2: it cannot meaningfully enter a "draft
content" state until its two source pages exist to draw from.
