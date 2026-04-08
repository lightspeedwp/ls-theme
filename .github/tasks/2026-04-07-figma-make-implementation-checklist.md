# **Figma Make Implementation Checklist**

---

[Purpose](#purpose)

[Source reports](#source-reports)

[Planning guardrails](#planning-guardrails)

[Plugin development](#plugin-development)

[Theme development](#theme-development)

[Validation and launch](#validation-and-launch)

---

## **Purpose**

Turn the Figma Make blueprint and the related architecture reports into a buildable execution plan for both the `ls-theme` theme and the `ls-plugin` plugin.

This checklist is deliberately granular. It tracks individual templates, template parts, page families, patterns, block styles, section styles, and launch decisions rather than only broad phases.

## **Source reports**

- `../reports/2026-04/2026-04-07-figma-make-blueprint-overview.md`
- `../reports/2026-04/2026-04-07-figma-make-theme-json-and-tokens.md`
- `../reports/2026-04/2026-04-07-figma-make-pages-and-route-inventory.md`
- `../reports/2026-04/2026-04-07-figma-make-templates-and-parts.md`
- `../reports/2026-04/2026-04-07-figma-make-pattern-catalogue.md`
- `../reports/2026-04/2026-04-07-figma-make-block-and-section-styles.md`
- `../reports/2026-04/2026-04-07-figma-make-interactions-assets-and-behaviour.md`
- `../reports/2026-04/2026-04-07-figma-make-gap-analysis.md`

## **Planning guardrails**

- Keep `theme.json` as the source of truth for tokens and baseline presentation.
- Keep templates lean and pattern-driven.
- Keep template parts limited to truly global chrome by default.
- Put custom blocks and site-specific PHP behaviour in `ls-plugin`, not in the theme.
- Do not turn purely presentational sections into plugin blocks unless core blocks and patterns clearly cannot solve them.
- Register only the block styles and section styles that editors genuinely need.
- Keep all motion as progressive enhancement and respect `prefers-reduced-motion`.
- Keep prototype-only reference pages out of production scope unless they are explicitly approved.

## **Plugin development**

### **Ownership and content model**

- [ ] Confirm the final content model for Work, Testimonials, Videos, Podcasts, Services, Solutions, and Systems.
- [ ] Confirm which route families stay Page-based and which become CPT- or taxonomy-based.
- [ ] Create a plugin ownership matrix for prototype features that may need custom behaviour.
- [ ] Lock the launch custom-block list.
- [ ] Lock the deferred custom-block list.
- [ ] Lock block naming, asset handle naming, PHP include naming, and `block.json` directory conventions.
- [ ] Document theme-to-plugin markup contracts for any server-rendered output.

### **Plugin bootstrap and structure**

- [ ] Implement include loading from `ls_plugin_init()`.
- [ ] Add block registration bootstrap files in `inc/`.
- [ ] Define the include structure for render helpers and shared utilities.
- [ ] Define plugin asset-loading rules so blocks only enqueue what they need.

### **Launch plugin capabilities**

- [ ] Decide whether archive filtering needs a plugin-owned block or helper.
- [ ] Decide whether related-content surfaces need a plugin-owned block or helper.
- [ ] Decide whether structured meta for Work, Testimonials, Videos, or Podcasts needs plugin-owned rendering.
- [ ] Decide whether briefing, consultation, or referral forms need plugin-owned integration logic.
- [ ] Decide whether newsletter or MailPoet utility surfaces need plugin-owned integration logic.
- [ ] Decide ownership for back-to-top, scroll indicator, theme switcher, layout switcher, skip-link utilities, focus utilities, modal behaviour, and loading states.

### **Block implementation**

- [ ] Scaffold approved blocks under `src/blocks/`.
- [ ] Add `block.json` metadata for each approved block.
- [ ] Decide which approved blocks are static and which are server-rendered.
- [ ] Define block attributes, inner-block policy, and render contracts for each approved block.
- [ ] Build editor and front-end assets with `@wordpress/scripts` only where needed.
- [ ] Implement render callbacks with sanitisation, validation, and escaped output.
- [ ] Add editor previews or placeholder states for dynamic blocks.
- [ ] Add empty-state and partial-data fallback handling where needed.
- [ ] Add translation wrappers and confirm text-domain consistency.

## **Theme development**

### **Tokens and style variations**

- [ ] Rebuild `styles/light.json` against the root semantic token families.
- [ ] Rebuild `styles/dark.json` against the root semantic token families.
- [ ] Confirm the final colour, spacing, typography, radius, and shadow token families in `theme.json`.
- [ ] Confirm default button, form, and surface tokens.
- [ ] Remove, defer, or flag dormant style contracts that are not in launch scope.

### **Template files**

- [ ] Build `templates/front-page.html`.
- [ ] Build `templates/home.html`.
- [ ] Rebuild `templates/index.html` as a proper fallback listing template.
- [ ] Rebuild `templates/archive.html` as a proper hub fallback template.
- [ ] Build `templates/search.html`.
- [ ] Rebuild `templates/404.html` as a recovery template.
- [ ] Rebuild `templates/single.html` as a proper Single Detail fallback.
- [ ] Build `templates/single-post.html`.
- [ ] Build `templates/category.html`.
- [ ] Build `templates/tag.html`.
- [ ] Build `templates/author.html`.
- [ ] Build `templates/taxonomy.html`.
- [ ] Implement the Work archive template path.
- [ ] Implement the Work single template path.
- [ ] Implement the Testimonial archive template path.
- [ ] Implement the Testimonial single template path.
- [ ] Implement the Video archive template path if Videos ship as a first-class content type.
- [ ] Implement the Video single template path if Videos ship as a first-class content type.
- [ ] Implement the Podcast archive template path if Podcasts ship as a first-class content type.
- [ ] Implement the Podcast single template path if Podcasts ship as a first-class content type.

### **Template parts**

- [ ] Rebuild `parts/header.html`.
- [ ] Rebuild `parts/footer.html`.
- [ ] Add `parts/mobile-menu.html` if the final header requires a global overlay or drawer.
- [ ] Retire `parts/hero.html` from the template-part strategy.
- [ ] Retire or rename `parts/breadbrumbs.html` and fix the spelling to `breadcrumbs` if the file survives temporarily.

### **Public page families**

- [ ] Home.
- [ ] Solutions hub.
- [ ] Solution detail pages.
- [ ] Services hub.
- [ ] Service detail pages.
- [ ] AI service detail pages.
- [ ] Systems hub.
- [ ] Systems detail pages.
- [ ] Work archive.
- [ ] Work or case-study single pages.
- [ ] Insights archive.
- [ ] Insight single pages.
- [ ] About page.
- [ ] Contact page.
- [ ] Testimonials archive.
- [ ] Testimonial single variants.
- [ ] Video archive pages if retained.
- [ ] Video single pages if retained.
- [ ] Podcast archive pages if retained.
- [ ] Podcast single pages if retained.

### **Secondary utility and conversion pages**

- [ ] FAQ pages.
- [ ] Website packages or pricing pages.
- [ ] Why pages and comparison pages.
- [ ] Referrals pages.
- [ ] Consultation pages.
- [ ] Briefing form pages.
- [ ] Getting-started pages.
- [ ] Thank-you pages.
- [ ] Legal and policy pages.
- [ ] MailPoet utility pages.
- [ ] Site-map page.
- [ ] Search results page.
- [ ] 404 recovery page.

### **Prototype-only reference surfaces**

- [ ] Decide whether tutorial or education pages ship publicly.
- [ ] Decide whether the style-guide surface ships publicly.
- [ ] Decide whether WordPress block proof-of-concept pages ship publicly.
- [ ] Decide whether Figma Make showcase pages ship publicly.
- [ ] Decide whether dev-tools route surfaces ship publicly.
- [ ] Decide whether legacy generic template demo routes ship publicly.
- [ ] Decide whether post-format demo routes ship publicly.

### **Pattern catalogue: layout**

- [ ] `ls-theme/layout/site-header`.
- [ ] `ls-theme/layout/site-footer`.
- [ ] `ls-theme/layout/mobile-menu`.
- [ ] `ls-theme/layout/page-shell` if retained.

### **Pattern catalogue: hero**

- [ ] `ls-theme/hero/hero-home`.
- [ ] `ls-theme/hero/hero-solution`.
- [ ] `ls-theme/hero/hero-service`.
- [ ] `ls-theme/hero/hero-system`.
- [ ] `ls-theme/hero/hero-work`.
- [ ] `ls-theme/hero/hero-editorial`.
- [ ] `ls-theme/hero/hero-utility`.

### **Pattern catalogue: header**

- [ ] `ls-theme/header/archive-header`.
- [ ] `ls-theme/header/listing-header`.
- [ ] `ls-theme/header/page-header`.
- [ ] `ls-theme/header/single-header`.
- [ ] `ls-theme/header/media-header`.
- [ ] `ls-theme/header/testimonial-header`.

### **Pattern catalogue: navigation**

- [ ] `ls-theme/nav/breadcrumbs`.
- [ ] `ls-theme/nav/pagination`.
- [ ] `ls-theme/nav/archive-filters`.
- [ ] `ls-theme/nav/term-navigation`.
- [ ] `ls-theme/nav/sorting-controls`.

### **Pattern catalogue: listing**

- [ ] `ls-theme/listing/solutions-grid`.
- [ ] `ls-theme/listing/services-grid`.
- [ ] `ls-theme/listing/systems-grid`.
- [ ] `ls-theme/listing/work-grid`.
- [ ] `ls-theme/listing/insights-grid`.
- [ ] `ls-theme/listing/testimonials-grid`.
- [ ] `ls-theme/listing/videos-grid`.
- [ ] `ls-theme/listing/podcasts-grid`.

### **Pattern catalogue: content**

- [ ] `ls-theme/content/editorial-body`.
- [ ] `ls-theme/content/value-proposition-band`.
- [ ] `ls-theme/content/feature-list`.
- [ ] `ls-theme/content/process-timeline`.
- [ ] `ls-theme/content/stats-grid`.
- [ ] `ls-theme/content/faq-section`.
- [ ] `ls-theme/content/testimonial-band`.
- [ ] `ls-theme/content/logo-cloud`.
- [ ] `ls-theme/content/media-section`.
- [ ] `ls-theme/content/contact-options`.
- [ ] `ls-theme/content/comparison-section`.
- [ ] `ls-theme/content/checklist-section`.

### **Pattern catalogue: meta**

- [ ] `ls-theme/meta/post-meta`.
- [ ] `ls-theme/meta/quick-facts`.
- [ ] `ls-theme/meta/project-meta`.
- [ ] `ls-theme/meta/testimonial-meta`.
- [ ] `ls-theme/meta/media-meta`.

### **Pattern catalogue: related**

- [ ] `ls-theme/related/related-posts`.
- [ ] `ls-theme/related/related-projects`.
- [ ] `ls-theme/related/related-services`.
- [ ] `ls-theme/related/related-media`.

### **Pattern catalogue: CTA**

- [ ] `ls-theme/cta/primary-cta-band`.
- [ ] `ls-theme/cta/newsletter-cta`.
- [ ] `ls-theme/cta/contact-cta`.
- [ ] `ls-theme/cta/referral-cta`.
- [ ] `ls-theme/cta/consultation-cta`.
- [ ] `ls-theme/cta/inline-cta`.

### **Pattern catalogue: state**

- [ ] `ls-theme/state/empty-search`.
- [ ] `ls-theme/state/empty-archive`.
- [ ] `ls-theme/state/error-404`.
- [ ] `ls-theme/state/success-state`.
- [ ] `ls-theme/state/loading-state` if retained.

### **Block styles**

- [ ] Default fill button.
- [ ] Outline button variation.
- [ ] `button-glow-accent`.
- [ ] `button-cta`.
- [ ] `gradient-accent`.
- [ ] `link-underline-accent`.
- [ ] `card-spotlight`.

### **Section styles**

- [ ] `home-hero-section`.
- [ ] `page-hero-section`.
- [ ] `archive-header-surface`.
- [ ] `listing-panel`.
- [ ] `editorial-panel`.
- [ ] `stats-grid-surface`.
- [ ] `faq-panel`.
- [ ] `testimonial-card-surface`.
- [ ] `media-card-surface`.
- [ ] `cta-panel`.
- [ ] `form-panel`.
- [ ] `state-panel`.

### **Interactions and non-block components**

- [ ] Back-to-top control.
- [ ] Scroll indicator.
- [ ] Theme switcher.
- [ ] Layout switcher if retained.
- [ ] Skip-link and focus utilities.
- [ ] Modal behaviour.
- [ ] Loading states.
- [ ] Reduced-motion fallbacks.
- [ ] GSAP-only surfaces where approved patterns actually need them.

## **Validation and launch**

### **Plugin validation**

- [ ] Run `npm run plugin:validate`.
- [ ] Run `npm run schema:validate`.
- [ ] Run `npm run security:scan`.
- [ ] Run `composer run phpcs`.
- [ ] Test editor insertion, save behaviour, render callbacks, and no-JS degradation.

### **Theme validation**

- [ ] Run `npm run theme:validate`.
- [ ] Run `npm run schema:validate`.
- [ ] Run `npm run patterns:escape`.
- [ ] Run `npm run security:scan`.
- [ ] Run `composer run phpcs`.
- [ ] Verify template flows across desktop, tablet, and mobile.
- [ ] Validate heading hierarchy, focus states, contrast, and reduced-motion behaviour.
- [ ] Verify hero and spotlight effects stay performant and non-blocking.

### **Release readiness**

- [ ] Confirm template assignments and pattern availability.
- [ ] Confirm launch styles and variations are present in the editor.
- [ ] Write concise editor guidance for pattern use and plugin-backed blocks.
- [ ] Smoke-test the complete theme and plugin combination on staging.
- [ ] Record launch issues and schedule a stabilisation window.
