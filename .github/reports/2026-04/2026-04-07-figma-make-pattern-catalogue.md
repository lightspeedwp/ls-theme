# **Figma Make Pattern Catalogue**

---

[Purpose](#purpose)

[Naming recommendation](#naming-recommendation)

[Current pattern audit](#current-pattern-audit)

[Prototype category baseline](#prototype-category-baseline)

[WordPress target catalogue](#wordpress-target-catalogue)

[Archetype pattern stacks](#archetype-pattern-stacks)

[Pattern construction rules](#pattern-construction-rules)

[Editorial safety rules](#editorial-safety-rules)

[Required development](#required-development)

---

## **Purpose**

This document defines the pattern catalogue `ls-theme` needs in order to implement the prototype as a reusable FSE system.

The Make guidance is clear: pages are composed from patterns, and each visible section should trace back to a reusable pattern family.

## **Naming recommendation**

The prototype uses a category-first catalogue model. For `ls-theme`, the recommended target is:

`ls-theme/{category}/{pattern-name}`

The current flat slugs such as `ls-theme/header` and `ls-theme/hero` are acceptable as seed scaffolding, but they are too vague for the recovered prototype surface.

## **Current pattern audit**

| Pattern file               | Current slug           | Status      | Notes                                        |
| -------------------------- | ---------------------- | ----------- | -------------------------------------------- |
| `patterns/header.php`      | `ls-theme/header`      | Implemented | Should map to `ls-theme/layout/site-header`  |
| `patterns/footer.php`      | `ls-theme/footer`      | Implemented | Should map to `ls-theme/layout/site-footer`  |
| `patterns/home-hero.php`   | `ls-theme/hero`        | Implemented | Should map to `ls-theme/hero/hero-home`      |
| `patterns/breadcrumbs.php` | `ls-theme/breadcrumbs` | Stub        | Needs real block markup and catalogue naming |
| `patterns/cta-section.php` | `ls-theme/cta-section` | Stub        | Needs real block markup and catalogue naming |
| `patterns/statsgrid.php`   | `ls-theme/stats-grid`  | Stub        | Needs real block markup and catalogue naming |

## **Prototype category baseline**

The recovered Make guidance organises the pattern system into ten categories:

- layout
- hero
- header
- nav
- listing
- content
- meta
- related
- cta
- state

That is the correct baseline for the WordPress translation layer.

## **WordPress target catalogue**

The Make catalogue spans roughly 50 or more patterns. The list below is the WordPress target translation of that catalogue.

### Layout

- `ls-theme/layout/site-header`
- `ls-theme/layout/site-footer`
- `ls-theme/layout/mobile-menu`
- `ls-theme/layout/page-shell`

Current state: header and footer exist in simplified form; the rest are missing.

### Hero

- `ls-theme/hero/hero-home`
- `ls-theme/hero/hero-solution`
- `ls-theme/hero/hero-service`
- `ls-theme/hero/hero-system`
- `ls-theme/hero/hero-work`
- `ls-theme/hero/hero-editorial`
- `ls-theme/hero/hero-utility`

Current state: only the homepage hero exists.

### Header

- `ls-theme/header/archive-header`
- `ls-theme/header/listing-header`
- `ls-theme/header/page-header`
- `ls-theme/header/single-header`
- `ls-theme/header/media-header`
- `ls-theme/header/testimonial-header`

Current state: missing.

### Navigation

- `ls-theme/nav/breadcrumbs`
- `ls-theme/nav/pagination`
- `ls-theme/nav/archive-filters`
- `ls-theme/nav/term-navigation`
- `ls-theme/nav/sorting-controls`

Current state: breadcrumbs exists only as a stub; the rest are missing.

### Listing

- `ls-theme/listing/solutions-grid`
- `ls-theme/listing/services-grid`
- `ls-theme/listing/systems-grid`
- `ls-theme/listing/work-grid`
- `ls-theme/listing/insights-grid`
- `ls-theme/listing/testimonials-grid`
- `ls-theme/listing/videos-grid`
- `ls-theme/listing/podcasts-grid`

Current state: missing as named reusable patterns. The current query loops inside templates are not a real catalogue.

### Content

- `ls-theme/content/editorial-body`
- `ls-theme/content/value-proposition-band`
- `ls-theme/content/feature-list`
- `ls-theme/content/process-timeline`
- `ls-theme/content/stats-grid`
- `ls-theme/content/faq-section`
- `ls-theme/content/testimonial-band`
- `ls-theme/content/logo-cloud`
- `ls-theme/content/media-section`
- `ls-theme/content/contact-options`
- `ls-theme/content/comparison-section`
- `ls-theme/content/checklist-section`

Current state: `stats-grid` exists only as a stub; the rest are missing.

### Meta

- `ls-theme/meta/post-meta`
- `ls-theme/meta/quick-facts`
- `ls-theme/meta/project-meta`
- `ls-theme/meta/testimonial-meta`
- `ls-theme/meta/media-meta`

Current state: missing.

### Related

- `ls-theme/related/related-posts`
- `ls-theme/related/related-projects`
- `ls-theme/related/related-services`
- `ls-theme/related/related-media`

Current state: missing.

### CTA

- `ls-theme/cta/primary-cta-band`
- `ls-theme/cta/newsletter-cta`
- `ls-theme/cta/contact-cta`
- `ls-theme/cta/referral-cta`
- `ls-theme/cta/consultation-cta`
- `ls-theme/cta/inline-cta`

Current state: `cta-section` exists only as a stub.

### State

- `ls-theme/state/empty-search`
- `ls-theme/state/empty-archive`
- `ls-theme/state/error-404`
- `ls-theme/state/success-state`
- `ls-theme/state/loading-state`

Current state: missing.

## **Archetype pattern stacks**

| Archetype         | Minimum pattern stack                                                                                       |
| ----------------- | ----------------------------------------------------------------------------------------------------------- |
| Content Hub       | breadcrumbs, archive header, filters or term navigation, listing grid, pagination, CTA                      |
| Taxonomy Archive  | breadcrumbs, archive header, term navigation, listing grid, pagination, CTA                                 |
| Single Detail     | hero or page header, editorial body, meta or quick facts, supporting content patterns, related content, CTA |
| Editorial Listing | listing header, sorting or filter controls, listing grid, pagination                                        |
| Utility Page      | page header, editorial or form-led content, state or guidance pattern, CTA where useful                     |

## **Pattern construction rules**

1. Each pattern should be reusable across more than one template or page type.
2. Each pattern should use semantic tokens only.
3. Each pattern should be composed from core blocks unless there is a clear custom-block need.
4. Each pattern should have a proper WordPress pattern header.
5. Each pattern should document or imply its locking policy.
6. Each pattern should preserve keyboard access, readable heading order, and sensible mobile behaviour.

## **Editorial safety rules**

1. Lock outer structural wrappers where layout integrity matters.
2. Leave content surfaces editable inside those wrappers.
3. Avoid patterns that rely on JavaScript to be usable.
4. Keep one primary CTA per CTA section.
5. Omit empty sections rather than leaving blank structural gaps.
6. Keep reference-only prototype patterns out of the public inserter unless they solve a live editorial need.

## **Required development**

1. Adopt the category-first pattern slug convention for all new work.
2. Convert the current implemented patterns into the mature catalogue structure rather than continuing with flat slugs.
3. Build the archetype-critical catalogue first: layout, hero, header, nav, listing, state, and the minimum content and CTA patterns.
4. Pull common archive, listing, and single-detail sections out of templates and into named patterns.
5. Replace stub files with real block markup or remove them in favour of correctly named catalogue files.
6. Treat the pattern catalogue as the main delivery surface for the prototype, not as documentation-only overhead.
