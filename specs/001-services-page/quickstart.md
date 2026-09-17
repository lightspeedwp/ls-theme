# Quickstart: Validate the Services Page (LS-1598)

## Prerequisites

- Local WordPress environment running `ls-theme` (e.g. via WordPress Studio) with the local
  test page already resynced to the current pattern source (see project convention: fetch
  registered pattern content via `WP_Block_Patterns_Registry`, write to a temp file,
  `wp post update`, `wp_get_theme()->delete_pattern_cache()`, `cache flush`)
- Access to the Figma file referenced in LS-1598 for design QA
- `npm install` run at repo root if patterns require Sass compilation

## Setup

```bash
npm install
npm run build:css
```

Open the Services page (slug `services`) on the local site.

## Validate: Entry Points section present (FR-001, SC-001)

1. Load the Services page front-end view.
2. Scroll to the Entry Points section.
3. Expected: distinct, labeled entry-point options matching Figma (node 8044-164205), each
   with a working link/CTA.

## Validate: Delivery by the Numbers section present (FR-002, SC-001)

1. Scroll to the Delivery by the Numbers section.
2. Expected: metric values/labels render as specified in Figma (node 8044-164253), with no
   layout imbalance regardless of value length.

## Validate: Closing CTA present (FR-003, SC-001)

1. Scroll to the end of the page.
2. Expected: a clear, actionable CTA matching Figma (node 8044-164294) with a working link.

## Validate: Existing sections reused, not duplicated (FR-004)

1. Confirm Hero, Linked decisions, Service clusters, and Service tiles each appear exactly
   once.
2. Expected: no duplicate patterns, no content forked from the merged PR #51/#54 versions.

## Validate: Design QA against Figma (FR-008, SC-002)

1. Open the Figma file for the Services page.
2. Compare each new section side-by-side with the live page (spacing, typography, color
   tokens, copy).
3. Expected: zero unresolved discrepancies; any found are fixed or logged as an accepted
   deviation.

## Validate: Responsive check (FR-007, SC-003)

```bash
# Use the Browser pane's resize_window tool (or browser dev tools) to emulate breakpoints
```

1. View the page at desktop, tablet, and mobile widths.
2. Expected: no overlapping, clipped, or unreadable content in any section, including the 3
   new ones, at any breakpoint.

## Validate: SEO metadata (FR-006, SC-004)

1. Inspect the page's `<title>` and meta description (view source or SEO plugin panel).
2. Expected: unique title and description reflecting the service-model hub purpose, not
   shared with any other page.

## Validate: Constitution compliance (theme-first, reuse, tokens, icons, validation)

1. Confirm each new section reused an existing card shell where one genuinely fit
   (`card-link-row.json`, `stat-segment.json`, or the existing `section-cta.php` stub) before
   any new `styles/sections/cards/**` file was created, and that any new one is named by shape.
2. Confirm icons use `core/icon` + `lightspeed/{slug}`, not `outermost/icon-block`.
3. Confirm any new structural CSS bundle's front-end condition uses `is_page( 'services' )`
   (or a more specific real conditional), not an unconditional load deferred "until later."
4. Run `npm run schema:validate`, `npm run patterns:escape`, `npm run security:scan`, and
   `composer run phpcs` — expect no new failures. **Never** use the `validate_blocks` tool.
