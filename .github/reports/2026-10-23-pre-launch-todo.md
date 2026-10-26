# Pre-launch to-do (DEV vs LIVE)

Date: 2026-10-23. Based on the DEV/LIVE audit and the decisions made in chat. Items marked CONFIRM are my defaults and need a yes/no.

## 1. Redirects to set up (no page build needed)
| From (LIVE URL) | To | Note |
|---|---|---|
| /portfolio/ | /work/ | Individual /portfolio/<slug>/ projects already redirect |
| /briefing/request-a-quote/ | /free-consultation/ | Form 3 is retired; brief popup replaces it |
| /client-intake-form/ | /free-consultation/ | Same as above |
| /client-intake-form/thank-you/ | /free-consultation/thank-you/ | Only used by retired form 3 |
| /free-woo-consultation/ | /free-consultation/ | Same consultation form (form 4) |
| /briefing/woo/ | /briefing/wordpress/ | Woo marketing copy retired |
| /briefing/about-page-content/ | /briefing/about-us-page/ | Slug changed on DEV (CONFIRM page still needed) |
| /team/ | /about/team/ | New team page is built |
| /why/lightspeed/ and /why/ | /about/ | Also update the footer link |
| /why/wp/ | /solutions/wordpress/ | |
| /why/woo/ | /solutions/woocommerce/ | |
| /why/tour-operator/ | /solutions/tour-operators/ | LIVE page is a copy of the Woo page |
| /why/lsx/ | /solutions/design-systems/ | CONFIRM |
| /why/mailchimp/ | /services/email-marketing/ | |
| /policies/diversity-content/, /policies/diversity-staffing/ | /about/ | Diversity page dropped for launch (CONFIRM) |
| /policies/, /policies/publishing-principles/, /ethics/, /corrections/, /feedback/, /ownership-funding/ | /about/publishing-principles-ai-ethics/ | Needs that page filled (CONFIRM mapping) |
| /solutions/lsx/ | /solutions/design-systems/ or /lsx/ | /lsx/ is blank today (CONFIRM) |

## 2. Pages to redesign before launch (17)
- Thank-you: /contact/thank-you/, /free-consultation/thank-you/, /thank-you-content-audit-post/, /thank-you-newsletter-subscribe/, /referrals/thank-you/
- MailPoet: /mailpoet-manage-your-subscription/, /mailpoet-unsubscribe-confirmation/ (raw shortcode visible), /mailpoet-unsubscribe-success-page/, /thank-you-for-subscribing/
- Content and utility: /testimonials/, /getting-started-with-lightspeed/, /client-feedback/, /website-development-project-terms-conditions/, /briefing/wordpress/
- Kept by decision: /website-packages/ (broken, no text), /referrals/ (live form 5), /services/content/collection/

## 3. Fix defects on redesigned pages (9)
- /services/support/: case-study block labelled "Discovery in practice"
- /services/email-marketing/, /services/security/, /services/training/: empty band before FAQ; training "See training in practice" link has no target
- /services/content/: empty gap before FAQ
- /contact/: FAQ about design systems; Email field split in two
- /solutions/: 7th card orphaned
- /services/: leftover colour-swatch panel in hero
- /blog/: stat cards look like placeholder numbers

## 4. Unpublish and clean up navigation
- Unpublish: /pricing/, /pricing/foundation/, /growth/, /enterprise/, /how-we-price-work/, /pricing-principles/, and /guarantees/ (CONFIRM it counts as pricing); /about/diversity/
- Remove the Pricing mega menu and the Diversity link from the header and footer, or they will 404
- Website packages sits inside the Pricing mega menu: give it a new menu home; /contact/ and /free-consultation/ also link to it

## 5. Other blank DEV-only pages that are published
Not on LIVE, publicly reachable and empty: /faq/, /faq-2/, /book-a-call/, /services-landing/, /woocommerce-redesign/, /wordpress-redesign/, /woocommerce-solutions/, /tour-operators-solutions/, /systems/ (+3 children), /solutions/ai-readiness/, /about/ai-governance/, /about/community-events/, /about/privacy-and-terms/, /lsx/ (+2 children). Unpublish or fill before launch.

## 6. After launch (not blockers)
- /wcct-sticker-competition/ (kept in the build, restyle later)
- /mailpoet-re-engangement-page/
- Taxonomy archives that 404 on DEV (project-type, project-tag, portfolio-group)
