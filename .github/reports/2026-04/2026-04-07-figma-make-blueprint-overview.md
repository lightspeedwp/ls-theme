# **Figma Make Blueprint Overview**

---

[Purpose](#purpose)

[Source-of-truth rules](#source-of-truth-rules)

[Prototype surface summary](#prototype-surface-summary)

[Current ls-theme snapshot](#current-ls-theme-snapshot)

[Critical findings](#critical-findings)

[Working assumptions for implementation](#working-assumptions-for-implementation)

[Report set](#report-set)

[Recommended reading order](#recommended-reading-order)

---

## **Purpose**

This report set translates the LightSpeedWP.Agency Figma Make prototype into a WordPress block theme implementation plan for `ls-theme`.

It is based on two inputs:

- the Figma Make governance and route documents, especially the WordPress mapping, page archetype, pattern catalogue, navigation, route, design token, animation, responsive, and project goal guidance
- the current `ls-theme` codebase under `wp-content/themes/ls-theme`

This overview now reflects the actual prototype route and page surface rather than only the current theme audit.

## **Source-of-truth rules**

These rules are consistent across the prototype documents and should stay fixed while `ls-theme` is built out.

1. `theme.json` is the source of truth for tokens and baseline block styling.
2. Pages are built from patterns, not bespoke template-only sections.
3. Templates must map to one archetype only. No hybrid templates.
4. Template parts are reserved for global chrome, not page-specific content.
5. JavaScript is progressive enhancement only. Core UX must work without it.
6. Motion must respect `prefers-reduced-motion`.
7. Styling should stay token-based. Avoid hard-coded one-off values.

## **Prototype surface summary**

The Make prototype already defines a clear public information architecture around six top-level journeys:

- Work
- Solutions
- Systems
- Insights
- About
- Contact

Under that top-level navigation, the prototype route surface expands into the following page families:

- home and campaign-style landing composition
- solutions, services, and systems hubs and detail pages
- work archive and case-study detail pages
- insights archive, article singles, and taxonomy-led editorial flows
- testimonials archive and testimonial media variants
- video and podcast archive or single flows
- pricing, referrals, consultations, briefing, getting-started, thank-you, policy, search, and site-map utility pages

The prototype also contains reference-only surfaces such as the style guide, WordPress blocks proof-of-concept pages, showcase pages, dev tools, legacy template routes, and post-format demos. Those should inform the build, but they should not automatically become public theme deliverables.

## **Current `ls-theme` snapshot**

| Concern                  | Current state                                                                                                                                    | Assessment |
| ------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------ | ---------- |
| Token foundation         | `theme.json` already contains 78 colour presets, 11 spacing presets, 3 font families, 9 font sizes, 6 shadow presets, and 6 radius presets       | Strong     |
| Root layout              | Content width `800px`, wide width `1360px`, fluid spacing and typography enabled                                                                 | Strong     |
| Style variations         | `styles/light.json` and `styles/dark.json` exist, but they use a reduced placeholder palette that does not mirror the main semantic token system | Weak       |
| Templates                | 6 templates exist: `front-page`, `index`, `archive`, `single`, `page`, `404`                                                                     | Partial    |
| Template parts           | 4 HTML part files exist, but only `header` and `footer` are registered in `theme.json`                                                           | Partial    |
| Patterns                 | 6 pattern files exist, but only `header`, `footer`, and `home-hero` are materially implemented                                                   | Weak       |
| Block and section styles | 8 JSON files exist under `styles`, but most are not editor-registered or runtime-loaded                                                          | Weak       |
| Motion and assets        | Shared CSS motion layer and GSAP layer exist, with filemtime cache busting and editor/front-end loading                                          | Partial    |

## **Critical findings**

### 1. The prototype surface is broader than the first report pass captured

The earlier report set covered the right architectural direction, but it under-represented the actual Make route inventory. The missing area was page and route coverage, not just tokens or styling.

### 2. The main implementation gap is template and pattern coverage, not `theme.json`

The theme already has enough token depth to support the prototype. The real shortfall is the number of archetype templates, reusable patterns, and page-family compositions still missing.

### 3. The prototype is journey-based, not a flat list of marketing pages

The Make navigation and route modules show a deliberate structure around Work, Solutions, Systems, Insights, About, and Contact. That structure should drive both the template hierarchy and the checklist.

### 4. Public build scope and prototype-only reference scope need to stay separate

The Make file contains public-facing routes and internal reference routes. If those are not separated early, the checklist will overbuild the theme.

### 5. Style and interaction work should follow the page, template, and pattern build-out

The prototype does contain motion, visual effects, and non-block components, but those should be layered onto confirmed page families and reusable patterns. They should not lead the implementation order.

## **Working assumptions for implementation**

1. Keep `theme.json` as the primary design-token source.
2. Keep CSS and JS in `assets/` and use them only for behaviour or motion that `theme.json` cannot express.
3. Treat `styles/blocks/*.json` and `styles/sections/*.json` as contracts until each style is explicitly registered or otherwise loaded.
4. Build archetype templates from patterns rather than placing raw blocks directly in each template.
5. Keep template parts minimal: header, footer, and only other truly global chrome pieces.
6. Avoid React or a separate app shell in the theme.
7. Treat prototype-only pages as reference material until the public build scope is explicitly approved.

## **Report set**

This report bundle is split by concern so each area can later become a checklist workstream.

- `2026-04-07-figma-make-theme-json-and-tokens.md`
- `2026-04-07-figma-make-pages-and-route-inventory.md`
- `2026-04-07-figma-make-templates-and-parts.md`
- `2026-04-07-figma-make-pattern-catalogue.md`
- `2026-04-07-figma-make-block-and-section-styles.md`
- `2026-04-07-figma-make-interactions-assets-and-behaviour.md`
- `2026-04-07-figma-make-gap-analysis.md`

## **Recommended reading order**

1. Read this overview first.
2. Read the pages and route inventory to lock public build scope.
3. Read the template and pattern reports together.
4. Then read the block and section style report.
5. Then read the interactions report.
6. Use the gap analysis and checklist last to drive implementation order.
