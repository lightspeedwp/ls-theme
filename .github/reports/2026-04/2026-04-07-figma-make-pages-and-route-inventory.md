# **Figma Make Pages And Route Inventory**

---

[Purpose](#purpose)

[Primary navigation and information architecture](#primary-navigation-and-information-architecture)

[Launch page families](#launch-page-families)

[Secondary utility and conversion pages](#secondary-utility-and-conversion-pages)

[Prototype-only reference pages](#prototype-only-reference-pages)

[Archetype mapping](#archetype-mapping)

[WordPress output guidance](#wordpress-output-guidance)

[Required development](#required-development)

---

## **Purpose**

This document translates the Figma Make route surface into the page inventory `ls-theme` must cover.

It separates launch or public pages from prototype-only reference pages so the theme build stays disciplined.

## **Primary navigation and information architecture**

The Make navigation layer is explicitly reorganised around these primary journeys:

- Work
- Solutions
- Systems
- Insights
- About
- Contact

The footer navigation also groups content around About, Products, Services, Solutions, and Legal. That confirms the prototype is not a one-off homepage concept. It is a broader site system with multiple reusable hubs and detail flows.

## **Launch page families**

These are the page families that should be treated as public build scope unless the content model changes materially.

| Page family                      | Prototype route surface                                            | Archetype                           | WordPress target                                                               |
| -------------------------------- | ------------------------------------------------------------------ | ----------------------------------- | ------------------------------------------------------------------------------ |
| Home                             | `/`                                                                | Single Detail homepage composition  | `front-page.html` plus homepage pattern stack                                  |
| Solutions hub                    | `/solutions/`                                                      | Content Hub                         | Page or archive-like hub with reusable listing patterns                        |
| Solution detail pages            | `/solutions/*`, including redesign and AI solution detail surfaces | Single Detail                       | Page or single template family with hero, editorial, related, and CTA patterns |
| Services hub                     | `/services/`                                                       | Content Hub                         | Page or archive-like hub with service listing patterns                         |
| Service detail pages             | `/services/*`                                                      | Single Detail                       | Page or single template family                                                 |
| AI service detail pages          | `/services/ai/*`                                                   | Single Detail                       | Service detail template family with AI-specific pattern variants where needed  |
| Systems hub                      | `/systems/`                                                        | Content Hub                         | Page or archive-like hub                                                       |
| Systems detail pages             | `/systems/*`                                                       | Single Detail                       | Page template family or single template family                                 |
| Work archive                     | `/work/`                                                           | Content Hub                         | Archive template or page-driven hub                                            |
| Work or case-study singles       | `/work/*`                                                          | Single Detail                       | Single work template or equivalent page-driven detail flow                     |
| Insights archive                 | `/insights/`                                                       | Editorial Listing                   | `home.html` or `index.html` depending on editorial setup                       |
| Insight single pages             | `/insights/*`                                                      | Single Detail                       | `single-post.html` or equivalent article template                              |
| About                            | `/about/`                                                          | Single Detail                       | `page.html` or a locked about-page template if required                        |
| Contact                          | `/contact/`                                                        | Utility Page                        | `page.html` or a dedicated contact template if the form layout needs locking   |
| Testimonials archive             | `/testimonials/`                                                   | Content Hub                         | Archive or page-driven testimonial hub                                         |
| Testimonial single variants      | `/testimonials/*`, including audio, video, and gallery variants    | Single Detail                       | Single testimonial template family                                             |
| Video archive and single pages   | `/videos/`, `/videos/*`                                            | Editorial Listing and Single Detail | Archive and single media templates if videos ship as first-class content       |
| Podcast archive and single pages | `/podcasts/`, `/podcasts/*`                                        | Editorial Listing and Single Detail | Archive and single media templates if podcasts ship as first-class content     |

## **Secondary utility and conversion pages**

These routes are still public-facing, but they are better treated as utility or conversion layers rather than top-level archetype drivers.

| Page family                    | Prototype surface                                                 | Archetype                     | WordPress target                                                          |
| ------------------------------ | ----------------------------------------------------------------- | ----------------------------- | ------------------------------------------------------------------------- |
| FAQ                            | FAQ or support-style routes                                       | Utility Page                  | `page.html` plus FAQ and CTA patterns                                     |
| Website packages or pricing    | Pricing and package routes                                        | Utility Page                  | Locked page composition or dedicated utility template                     |
| Why pages and comparison pages | Benefit, rationale, and comparison routes                         | Single Detail or Utility Page | Page-based compositions with reusable proof, comparison, and CTA patterns |
| Referrals                      | Referral-focused landing route                                    | Utility Page                  | Locked page composition with conversion-first CTA patterns                |
| Consultations                  | Consultation or booking route                                     | Utility Page                  | Page template with form or booking integration                            |
| Briefing forms                 | Brief or intake routes                                            | Utility Page                  | Form-led page composition plus state patterns                             |
| Getting started                | Onboarding route                                                  | Utility Page                  | Utility page composition with checklist, process, and CTA patterns        |
| Thank-you pages                | Post-conversion state routes                                      | Utility Page                  | Shared success-state pattern stack                                        |
| Legal and policy pages         | Privacy, terms, and related legal routes                          | Utility Page                  | Page-based editorial composition                                          |
| MailPoet utility pages         | Manage subscription, unsubscribe, or newsletter preference routes | Utility Page                  | Minimal utility page composition                                          |
| Site map                       | Site map route                                                    | Utility Page                  | Searchable or linked overview page                                        |
| Search                         | Search result route                                               | Utility Page                  | `search.html`                                                             |
| 404                            | Not-found route                                                   | Utility Page                  | `404.html`                                                                |

## **Prototype-only reference pages**

These surfaces exist in the prototype, but they should remain reference-only unless there is explicit approval to ship them publicly.

| Reference surface                                        | Why it exists in the prototype                                                                       | Build guidance                                                        |
| -------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------- |
| Style guide                                              | Internal design-system reference                                                                     | Keep as internal reference, not a public theme deliverable by default |
| WordPress blocks proof-of-concept pages                  | Testing block parity and component mapping                                                           | Use for QA and comparison, not as live templates                      |
| Figma Make showcase pages                                | Prototype demonstration surface                                                                      | Reference only unless specifically approved                           |
| Dev tools route set                                      | Internal testing and inspection pages                                                                | Do not ship publicly                                                  |
| Legacy generic archive, index, single, and search routes | Backward-compatibility and reference coverage                                                        | Use for template QA, not public IA                                    |
| Post-format demo routes                                  | Prototype exploration of audio, gallery, image, quote, link, chat, status, standard, and aside flows | Keep out of launch scope unless editorial requirements justify them   |
| Experimental test pages                                  | Prototype staging and internal fixtures                                                              | Reference only                                                        |

## **Archetype mapping**

The five fixed prototype archetypes still hold. The route inventory makes their application clearer.

| Archetype         | Route families that map cleanly to it                                                                                                   |
| ----------------- | --------------------------------------------------------------------------------------------------------------------------------------- |
| Content Hub       | Solutions hub, services hub, systems hub, work archive, testimonials archive                                                            |
| Taxonomy Archive  | Insights categories, tags, authors, and any approved custom taxonomies                                                                  |
| Single Detail     | Home, solution detail, service detail, AI service detail, systems detail, case study, article, testimonial, video, podcast, about       |
| Editorial Listing | Insights archive, video archive, podcast archive, and any approved post-format archives                                                 |
| Utility Page      | Contact, FAQ, pricing, referrals, consultations, briefing, getting started, thank-you, legal, MailPoet pages, search, site map, and 404 |

## **WordPress output guidance**

1. Not every route family needs its own custom template file. Many page families can stay on `page.html` if their composition is reliably enforced by patterns.
2. Create page-specific templates only where the prototype requires locked section order, dedicated querying, or unique editorial constraints.
3. Work, testimonials, videos, and podcasts may become archive and single templates if the final content model uses custom post types. If they remain Page-based, the same route families still need stable page-pattern composition rules.
4. Prototype-only reference pages should stay out of production navigation and template assignment unless the project explicitly approves them.
5. Post-format demos should stay reference-only unless there is a real editorial strategy for them on the live site.

## **Required development**

1. Lock the public build scope first, especially the difference between launch pages and prototype-only reference pages.
2. Confirm the content model for Work, Testimonials, Videos, Podcasts, Services, Solutions, and Systems before final template filenames are committed.
3. Build each page family from archetype-safe pattern stacks rather than one-off template markup.
4. Keep utility and conversion routes lightweight, pattern-driven, and easy to maintain.
5. Use reference-only prototype pages to validate parity and quality, but do not let them bloat the public theme deliverables.
