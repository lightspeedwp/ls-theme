# DEV vs LIVE launch-readiness audit

Date: 2026-10-23. Read-only audit. LIVE: lightspeedwp.agency. DEV: ls-agency.lightspeedwp.dev. Nothing was edited on either site.

## Summary

- LIVE has 69 published pages, 151 published posts, 19 published projects.
- **Posts:** all 151 present on DEV at identical URLs.
- **Pages:** 65 of 69 resolve on DEV (one via a 301). **4 do not (404).**
- **Projects:** all 19 resolve via 301 from `/portfolio/<slug>/` to `/work/<slug>/`. The `/portfolio/` archive itself 404s.
- **Redesign status of the 65 resolving pages:** 16 redesigned clean, 9 redesigned with defects, **40 still old, broken or blank.**

## Blockers: LIVE URLs that 404 on DEV

| LIVE URL | DEV state |
|---|---|
| /briefing/request-a-quote/ | DEV page 45865 exists but is DRAFT |
| /client-intake-form/ | DEV page 38058 exists but is DRAFT (its published child /client-intake-form/thank-you/ works) |
| /free-woo-consultation/ | DEV page 51498 exists but is DRAFT, no content |
| /briefing/about-page-content/ | DEV page 46015 exists but slug is `about-us-page` (no redirect) |
| /portfolio/ (projects archive) | DEV equivalent is /work/; no redirect from /portfolio/ |

Handled by redirect already: /solutions/hosting/ → /services/hosting/ and all 19 /portfolio/<slug>/ → /work/<slug>/.

Taxonomy archives on LIVE sitemap that 404 on DEV (low priority): /portfolio-group/elearning/, 5 × /project-type/*, /project-tag/branding/, /project-tag/content-management/, /project-tag/featued/. Post tags (24) and authors (3) all resolve.

## Pages that still need the redesign (old, broken or blank)

| LIVE path | Status | Note |
|---|---|---|
| /briefing/woo/ | BROKEN | Form text dark-on-black, unreadable |
| /briefing/wordpress/ | OLD | Unstyled Gravity form |
| /client-feedback/ | OLD | Default checkboxes/button |
| /client-intake-form/thank-you/ | OLD | Legacy thank-you layout |
| /contact/thank-you/ | OLD | Legacy thank-you layout |
| /free-consultation/thank-you/ | OLD | Legacy thank-you layout |
| /getting-started-with-lightspeed/ | OLD | Plain text, no hero |
| /mailpoet-manage-your-subscription/ | OLD | Legacy layout |
| /mailpoet-re-engangement-page/ | OLD | Legacy layout |
| /mailpoet-unsubscribe-confirmation/ | BROKEN | Raw [mailpoet_page] shortcode text visible; unreadable button |
| /mailpoet-unsubscribe-success-page/ | OLD | Legacy layout |
| /policies/ | OLD | Plain text |
| /policies/corrections/ | OLD | Plain text |
| /policies/diversity-content/ | OLD | Plain text |
| /policies/diversity-staffing/ | OLD | Plain text |
| /policies/ethics/ | OLD | Plain text |
| /policies/feedback/ | OLD | Plain text |
| /policies/ownership-funding/ | OLD | Plain text |
| /policies/publishing-principles/ | OLD | Plain text |
| /referrals/ | BROKEN | Overlapping buttons/logo strip, unstyled form |
| /referrals/thank-you/ | OLD | Legacy thank-you layout |
| /services/content/audit/ | BROKEN | Overlapping CTA/logo strip, unreadable button |
| /services/content/collection/ | OLD | Legacy layout, dark-on-dark button |
| /services/content/strategy/ | OLD | Legacy layout, empty white band |
| /solutions/lsx/ | BROKEN | Unreadable "Key Features" text; "Couldn't load plugin" PDF embed |
| /team/ | OLD | Old team page; titles differ from new /about/team/ |
| /testimonials/ | BROKEN | Testimonial cards are blank white boxes (no quotes/images) |
| /thank-you-content-audit-post/ | OLD | Legacy thank-you layout |
| /thank-you-for-subscribing/ | OLD | Legacy thank-you layout |
| /thank-you-newsletter-subscribe/ | OLD | Legacy, duplicate headings |
| /wcct-sticker-competition/ | OLD | Legacy layout |
| /website-development-project-terms-conditions/ | OLD | Plain legal text |
| /website-packages/ | BROKEN | Package blocks have no visible text; empty boxes |
| /why/ | BLANK | Title + one image only |
| /why/lightspeed/ | OLD | Legacy layout |
| /why/lsx/ | BROKEN | Overlapping cards, lorem ipsum in LSX Tour Operators card |
| /why/mailchimp/ | BROKEN | Page titled Mailchimp shows Mailpoet content; invisible logo |
| /why/tour-operator/ | OLD | Content is actually WooCommerce copy |
| /why/woo/ | OLD | Legacy layout |
| /why/wp/ | BROKEN | Sparse, overlapping buttons |

Notes on likely replacements (inferred, please confirm): `/policies/*` probably maps to the blank new pages under `/about/` (privacy-and-terms, diversity, publishing-principles-ai-ethics); `/team/` to `/about/team/`; `/solutions/lsx/` to `/lsx/` (currently blank "being rebuilt"); `/why/*` is unclear. If these are meant to be replaced, they need redirects as well as content.

## Redesigned pages with defects to fix

| Path | Defect (from visual review) |
|---|---|
| /blog/ | Stat cards ("18/12/24") look like placeholder data |
| /contact/ | FAQ is about design systems (wrong topic); Email field split into two inputs |
| /services/ | Hero colour-swatch panel (hex codes) looks like leftover design-doc content |
| /services/content/ | ~100px empty gap before FAQ; no case study |
| /services/email-marketing/ | Blank dark band before FAQ (empty case-study slot?) |
| /services/security/ | Large empty band before FAQ |
| /services/support/ | Case-study block labelled "Discovery in practice" (wrong copy) |
| /services/training/ | Blank dark band after "What you receive"; "See training in practice" link has no target |
| /solutions/ | 7th card (AI Chatbots) orphaned |

## Redesigned and clean

/, /about/, /about/culture/, /about/history/, /about/process/, /free-consultation/, /privacy-policy/, /services/design/, /services/development/, /services/discovery/, /services/migrations/, /solutions/hosting/, /solutions/tour-operators/, /solutions/woocommerce/, /solutions/wordpress/, /terms-conditions/

## DEV-only pages that are published but blank (title only)

These do not exist on LIVE, but they would go live empty: /faq/, /faq-2/ (duplicate), /pricing/ and 5 children (foundation, growth, enterprise, how-we-price-work, pricing-principles), /guarantees/, /systems/ and 3 children, /solutions/ai-readiness/, /about/ai-governance/, /about/community-events/, /about/diversity/, /about/publishing-principles-ai-ethics/, /about/privacy-and-terms/, /book-a-call/, /services-landing/, /woocommerce-redesign/, /wordpress-redesign/, /woocommerce-solutions/, /tour-operators-solutions/, and /lsx/ + 2 children ("being rebuilt"). 28 pages in total. Also /briefing/ and /briefing/about-us-page/ are old content.

Draft-only on LIVE (not blockers): 9 pages, including 6 Mailchimp pages and a Website Briefing page.

## Method and limits

- Page and post lists from both MCPs plus LIVE Yoast sitemaps; every LIVE URL requested on DEV (GET only).
- Content state from rendered HTML (overlap of LIVE text on DEV), theme `ls-` classes, and a read-only DB query on DEV.
- Visual review: 179 full-page screenshot segments at 1280px, reviewed by four sub-agents. Their defect notes are observations from screenshots; spot-check before acting.
- Popups: LIVE has 2, DEV has 3 (not public URLs, not compared). Server-level redirects were inferred from HTTP responses only.
