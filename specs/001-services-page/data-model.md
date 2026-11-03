# Phase 1 Data Model: Services Page (Remaining Sections & QA)

This feature has no application data storage — it is static block-theme content. "Entities"
below describe content structure, not database models.

## Entry Point

Represents one distinct way a visitor can begin engaging with LightSpeed.

- **Label**: Short name for the entry point
- **Description**: Explanatory copy for what this path involves
- **Link/Action**: URL or CTA the visitor follows to act on it

**Validation rules**:
- Every entry point has a label, description, and a working link/action — no placeholder-only
  content.
- The section layout must accommodate at least the Figma-specified count (node 8044-164205)
  without visual imbalance if the count changes later.

## Delivery Metric

A single stat/figure in the "Delivery by the Numbers" section.

- **Value**: The figure itself (e.g. a number, often with a unit/suffix)
- **Label**: What the figure measures

**Validation rules**:
- Layout must not break or visually unbalance the row when value lengths vary significantly
  (e.g. more digits than sibling values).

## CTA (Call to Action)

The page's closing action element.

- **Heading/Description**: Closing copy summarizing the page's call to action
- **Primary action link**: The single main link/button the visitor is directed to

**Validation rules**:
- Must render a clear, actionable, working link matching Figma (node 8044-164294).

## Service Cluster / Linked Decision / Service Tile (existing, reused)

Already-implemented navigational elements from the merged Hero, "Linked decisions", "Service
clusters", and "Service tiles" sections (PR #51, #54). Not modified by this feature unless
Figma QA finds a defect in one of them.

## Page Metadata

- **Title**: Unique SEO title for the Services page
- **Description**: Meta description summarizing the service-model hub purpose

**Validation rule**: Title and description must be distinct from every other page's metadata
on the site (FR-006 / SC-004).

## State / Relationships

```text
Services Page
 ├─ Hero (built, merged PR #51)
 ├─ Linked Decisions (built, merged PR #51)
 ├─ Service Clusters (built, merged PR #51)
 ├─ Service Tiles (built, merged PR #54)
 ├─ Entry Points        [to build — Figma node 8044-164205]
 ├─ Delivery by the Numbers [to build — Figma node 8044-164253]
 ├─ Closing CTA         [to build — Figma node 8044-164294]
 └─ Page Metadata (title, description) [to set]
```

No section has a hard render-time dependency on another; they are visually sequential per
FR-001–FR-003 but each is independently testable (per spec User Stories 1–3).
