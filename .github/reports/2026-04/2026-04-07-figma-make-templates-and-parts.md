# **Figma Make Templates And Parts**

---

[Purpose](#purpose)

[Template rules](#template-rules)

[Archetype baseline](#archetype-baseline)

[Launch template inventory](#launch-template-inventory)

[Content-model-dependent templates](#content-model-dependent-templates)

[Reference-only template surfaces](#reference-only-template-surfaces)

[Template-part baseline](#template-part-baseline)

[Target part inventory](#target-part-inventory)

[Template composition rules](#template-composition-rules)

[Required development](#required-development)

---

## **Purpose**

This document maps the recovered Figma Make page inventory to the `ls-theme` template and template-part structure.

The goal is to convert route families into a maintainable block-theme hierarchy without turning every page into its own bespoke template file.

## **Template rules**

The prototype is explicit about page composition:

- every page must fit one archetype
- archetypes use fixed section order
- templates compose patterns
- template parts stay minimal and global
- page-specific content belongs in patterns, not in parts

## **Archetype baseline**

| Archetype         | WordPress templates                                                       | Required section order                                                                                 |
| ----------------- | ------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------ |
| Content Hub       | `archive.html`, `post-type-archive.html`, or locked page hubs             | breadcrumbs, archive header, filters, card grid, pagination, optional CTA                              |
| Taxonomy Archive  | `category.html`, `tag.html`, `author.html`, `taxonomy.html`               | breadcrumbs, archive header, term navigation, card grid, pagination, optional CTA                      |
| Single Detail     | `single.html`, `single-post.html`, `single-{post-type}.html`, `page.html` | hero or page header, editorial content, meta or quick facts, supporting sections, related content, CTA |
| Editorial Listing | `index.html`, `home.html`, archive-like editorial listings                | breadcrumbs, listing header, results and sorting, category filters, post grid, pagination              |
| Utility Page      | `404.html`, `search.html`, `page-{slug}.html` where justified             | page header, editorial or form content, utility block, optional CTA                                    |

## **Launch template inventory**

These templates should exist regardless of the final content model because they map directly to the public prototype surface.

| Template           | Covers                                     | Notes                                                                                  |
| ------------------ | ------------------------------------------ | -------------------------------------------------------------------------------------- |
| `front-page.html`  | Home                                       | Replace the current generic posts query with a homepage-specific pattern stack         |
| `home.html`        | Insights listing when a posts page is used | Prefer this for the editorial listing flow if posts are mapped to Insights             |
| `index.html`       | Global fallback listing                    | Keep as a safe fallback, not the primary marketing surface                             |
| `archive.html`     | Generic hub fallback                       | Supports hub behaviour while post-type-specific archive decisions are still open       |
| `search.html`      | Search results                             | Required utility template                                                              |
| `404.html`         | Not-found and recovery flow                | Required utility template                                                              |
| `single.html`      | Generic single fallback                    | Must still obey the Single Detail archetype                                            |
| `single-post.html` | Insight or article singles                 | Required if blog content ships                                                         |
| `category.html`    | Editorial category archives                | Required for taxonomy-led insight browsing                                             |
| `tag.html`         | Editorial tag archives                     | Required for taxonomy-led insight browsing                                             |
| `author.html`      | Author archives                            | Required if author pages are in scope                                                  |
| `taxonomy.html`    | Generic taxonomy fallback                  | Required if custom taxonomies exist                                                    |
| `page.html`        | General page fallback                      | Covers about, contact, legal, and utility routes unless a locked template is justified |

## **Content-model-dependent templates**

These template families depend on whether the site uses custom post types, taxonomies, or Page-based route management.

| Template family                       | Prototype coverage                                                             | Guidance                                                                              |
| ------------------------------------- | ------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------- |
| Work archive template path            | `/work/`                                                                       | Use `post-type-archive-{type}.html` if Work is a CPT, otherwise a locked page hub     |
| Work single template path             | `/work/*`                                                                      | Use `single-{type}.html` if Work is a CPT, otherwise a page-driven detail composition |
| Testimonial archive template path     | `/testimonials/`                                                               | Use an archive template if testimonials are first-class content                       |
| Testimonial single template family    | `/testimonials/*`                                                              | Support standard and media-variant testimonial detail flows                           |
| Video archive template path           | `/videos/`                                                                     | Only needed if videos ship as a distinct content type                                 |
| Video single template path            | `/videos/*`                                                                    | Same rule as above                                                                    |
| Podcast archive template path         | `/podcasts/`                                                                   | Only needed if podcasts ship as a distinct content type                               |
| Podcast single template path          | `/podcasts/*`                                                                  | Same rule as above                                                                    |
| Solutions hub locked template         | `/solutions/`                                                                  | Create only if `page.html` plus locked patterns is insufficient                       |
| Services hub locked template          | `/services/`                                                                   | Same rule as above                                                                    |
| Systems hub or detail template family | `/systems/`, `/systems/*`                                                      | Create only if the route family needs more than pattern enforcement                   |
| Utility page templates                | Contact, pricing, FAQ, briefing, referrals, consultations, thank-you, site-map | Create only when layout locking or special querying demands it                        |

## **Reference-only template surfaces**

The prototype also exposes internal and demo surfaces. Those should not automatically become live theme templates.

- style-guide and documentation surfaces
- WordPress block proof-of-concept pages
- Figma Make showcase pages
- dev tools route surfaces
- legacy generic archive, single, and search screens
- post-format demo routes unless editorial requirements make them real launch artefacts

## **Template-part baseline**

The prototype treats template parts as global chrome, not page content.

### Parts that should stay global

- site header
- site footer
- optional overlay or mobile-navigation chrome if the final header requires it

### Elements that should remain patterns

- homepage hero
- breadcrumbs
- archive headers
- CTA sections
- FAQ, comparison, and testimonial sections
- state panels and thank-you surfaces

Those should stay pattern-driven so they can be reused across page families without turning into pseudo-global parts.

## **Target part inventory**

| File                     | Role                                 | Guidance                                                                                         |
| ------------------------ | ------------------------------------ | ------------------------------------------------------------------------------------------------ |
| `parts/header.html`      | Global site header                   | Keep and expand using the mature header pattern                                                  |
| `parts/footer.html`      | Global site footer                   | Keep and expand using the mature footer pattern                                                  |
| `parts/mobile-menu.html` | Optional global overlay navigation   | Add only if the final header experience needs a globally managed drawer or panel                 |
| `parts/hero.html`        | Current home-only content wrapper    | Retire as a template part and move hero composition into patterns                                |
| `parts/breadbrumbs.html` | Current breadcrumb wrapper with typo | Retire as a template part and fix the spelling if the file survives temporarily during migration |

## **Template composition rules**

1. Templates should call patterns, not hard-code one-off blocks.
2. Patterns should satisfy each section in archetype order.
3. If a section has no content, omit it or show an explicit state pattern.
4. Do not mix archetypes in a single template.
5. Keep template parts global and reusable.
6. Add page-specific templates only when `page.html` plus locked patterns cannot safely enforce the prototype layout.

## **Required development**

1. Add the missing platform templates first: `search.html`, `home.html`, `category.html`, `tag.html`, `author.html`, and `taxonomy.html`.
2. Decide the final content model before committing archive or single filenames for Work, Testimonials, Videos, and Podcasts.
3. Rework `front-page.html`, `index.html`, `archive.html`, `single.html`, `page.html`, and `404.html` so they stop being shells.
4. Remove the conceptual drift where hero and breadcrumbs behave like template parts when they should be patterns.
5. Keep demo, showcase, and dev-tool routes out of the public template hierarchy.
6. Use page-specific templates sparingly and only where the route family genuinely needs tighter locking than `page.html` can provide.
