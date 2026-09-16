# Phase 1 Data Model: Services Family Pages

This batch has no database schema, custom post type, or taxonomy — every entity below maps
to a standard WordPress `page` post plus block-pattern content. This file documents the
content model, not a data-layer model.

## Entities

### Services Hub

Single instance. The top-level entry point for the Services section.

| Field | Type | Notes |
|---|---|---|
| Title | text | "Services" |
| Intro content | rich text | Explains the lifecycle-phase model |
| Phase links | list of 6 | One link per Service Phase, in lifecycle order |

Relationships: parent of all 6 Service Phases (navigationally, not necessarily via WordPress
`post_parent` — see `plan.md` Structure Decision on URL reparenting, unresolved).

### Service Phase

6 instances: Discover, Create, Build, Launch, Grow, Evolve.

| Field | Type | Notes |
|---|---|---|
| Title | text | e.g. "Discover" |
| Lifecycle position | integer, 1-6 | Fixed order per the confirmed design (01-06) |
| Badge colour | design token | New token per phase; MUST have distinct light/dark values (constitution Principle III) |
| Description | rich text | Explains what the phase covers |
| Grouped services | list of 1-4 | Discover: 1 (Discovery). Create: 2 (Content, Design). Build: 2 (Development, Migrations). Launch: 4 (Hosting, Performance, Security, Training). Grow: 4 (Support, SEO, Accessibility, Email Marketing). Evolve: 1 (AI) |

Validation rules:
- Every Service Phase MUST link to every Service Page in its `Grouped services` list (spec
  FR-002).
- Lifecycle position MUST be unique and sequential 1-6 — no phase may be skipped or reordered
  without an explicit content decision (spec Assumptions: reorder is a business decision, not
  a technical constraint, except Evolve which is a hard dependency for the AI Mega Page batch).

Relationships: one Service Phase has many Service Pages (1:many). One Service Page belongs to
exactly one Service Phase (spec Key Entities).

### Service Page

14 instances, grouped by phase (see above). 6 already have real content on dev
(Discovery, Design, Development, Hosting, Support, AI); 8 are currently blank (Content,
Migrations, Performance, Security, Training, SEO, Accessibility, Email Marketing).

| Field | Type | Notes |
|---|---|---|
| Title | text | e.g. "Discovery" |
| Parent phase | reference | Exactly one Service Phase |
| Summary content | rich text | Service scope, in visitor's terms (spec FR-003) |
| CTA target | URL | Free Consultation (`https://ls-agency.lightspeedwp.dev/free-consultation/`, confirmed real) or Contact |
| Related-service links | list | Links to other Service Pages, existing pattern already in use on Discovery/Design/Development |

Validation rules:
- CTA target MUST resolve to a real page for Free Consultation (confirmed); other CTA
  targets not yet built are permitted to be temporarily unresolved during active dev-site
  work (spec Clarifications, FR-004) — not a validation failure.
- Every Service Page MUST be independently readable/testable without requiring the visitor to
  have visited its parent phase page first (spec FR-003, Independent Test criteria per user
  story).

## State / Lifecycle

No workflow states beyond standard WordPress page statuses (draft → publish). No
approval-gate state machine is described in `spec.md` beyond the constitution's general
design-review checkpoint (human review before `/speckit-implement` begins on a page, per
`release-plan.md` Design Approval Points).
