# **Figma Make Interactions Assets And Behaviour**

---

[Purpose](#purpose)

[Behaviour rules](#behaviour-rules)

[Responsive baseline from prototype docs](#responsive-baseline-from-prototype-docs)

[Current asset audit](#current-asset-audit)

[Current behaviour contracts](#current-behaviour-contracts)

[Current strengths](#current-strengths)

[Current gaps](#current-gaps)

[Recommended asset rules going forward](#recommended-asset-rules-going-forward)

[Recommended behaviour build-out](#recommended-behaviour-build-out)

[Accessibility and performance guardrails](#accessibility-and-performance-guardrails)

[Required development](#required-development)

---

## **Purpose**

This document defines how the prototype's interaction, animation, asset, and enhancement rules should map to `ls-theme`.

## **Behaviour rules**

1. JavaScript is progressive enhancement only.
2. Motion must respect `prefers-reduced-motion`.
3. Mobile-first responsive behaviour is the baseline.
4. Minimum touch target size should remain at least `44x44px`.
5. Prefer `transform` and `opacity` for motion.
6. Avoid interaction patterns that require JavaScript for core navigation or content access.

## **Responsive baseline from prototype docs**

| Breakpoint | Use                                |
| ---------- | ---------------------------------- |
| `768px`    | tablet portrait and up             |
| `1024px`   | tablet landscape and small desktop |
| `1440px`   | desktop refinements                |

Additional responsive rules:

- prefer fluid `clamp()`-based spacing and typography over one-off breakpoint tuning
- wrap hover-only affordances in hover-capable conditions where needed
- keep mobile navigation and utility controls touch-safe

## **Current asset audit**

| File                             | Current role                                                                                                                         | Status |
| -------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------ | ------ |
| `assets/css/animations.css`      | motion layer for gradient headings, link underline treatment, fill and outline button interactions, and glow accent button behaviour | Active |
| `assets/css/gsap-animations.css` | GSAP-specific styles for spotlight cards and the homepage hero surface                                                               | Active |
| `assets/js/gsap-effects.js`      | shared GSAP runtime for `.is-style-card-spotlight` and `.is-style-home-hero-section`                                                 | Active |
| `inc/animations.php`             | enqueues shared effect CSS on front end and editor with filemtime cache busting                                                      | Active |
| `inc/gsap.php`                   | registers the two GSAP block styles and enqueues GSAP assets on front end and editor                                                 | Active |

## **Current behaviour contracts**

### Spotlight card

- selector: `.is-style-card-spotlight`
- visual CSS in `gsap-animations.css`
- dynamic pointer tracking in `gsap-effects.js`
- reduced motion guarded in CSS and JS duration choices

### Homepage hero surface

- selector: `.is-style-home-hero-section`
- visual background and orbs in `gsap-animations.css`
- DOM enhancement and canvas network injection in `gsap-effects.js`
- motion reduced through particle count and animation behaviour when motion preferences require it

### Button motion

- default fill and outline buttons are styled through `theme.json` token seeds plus selectors in `animations.css`
- glow accent button has an explicit `.is-style-button-glow-accent` selector, but the style is not editor-registered yet

### Text motion

- gradient headings use `.is-style-gradient-accent`
- paragraph link underline treatment uses `.is-style-link-underline-accent`

## **Current strengths**

1. Asset enqueueing is already separated cleanly between shared effects and GSAP-specific effects.
2. File modification times are already used for cache busting.
3. The editor and front end both receive the same enhancement assets.
4. The current JS scope is small and tied to specific classes rather than becoming a theme-wide app layer.

## **Current gaps**

1. Only two GSAP-enhanced behaviours exist.
2. There is no mobile menu enhancement yet.
3. There are no search, archive, filter, or sort enhancements yet.
4. There is no general utility enhancement layer such as back-to-top or small navigational helpers.
5. The dormant style contracts under `styles/blocks` are not consistently wired to behaviour selectors.

## **Recommended asset rules going forward**

1. Keep design tokens in `theme.json`.
2. Keep shared motion and selector-driven behaviour in `assets/css/animations.css`.
3. Keep GSAP-specific surfaces in `assets/css/gsap-animations.css` and `assets/js/gsap-effects.js`.
4. Only add new JS when the interaction cannot be expressed as CSS alone.
5. Do not introduce React, Tailwind, or a front-end app shell into the theme.

## **Recommended behaviour build-out**

### First priority

- mobile navigation enhancement, only if the final header pattern needs an overlay or drawer
- archive and listing control enhancement, only if sorting or filtering requires small client-side quality-of-life behaviour
- search utility improvements for `search.html`, while preserving full non-JS fallback

### Second priority

- optional scroll-to-top utility
- subtle section reveal or state transitions, only where they materially support the prototype
- page-specific enhancements for featured templates after the pattern catalogue and template hierarchy exist

## **Accessibility and performance guardrails**

1. Every motion feature must support `prefers-reduced-motion`.
2. Decorative canvases should stay `aria-hidden`.
3. Interactive controls must keep visible focus states.
4. Avoid frame-heavy effects outside hero or flagship surfaces.
5. Keep core navigation, search, filtering, and content access usable with JavaScript disabled.

## **Required development**

1. Preserve the current progressive-enhancement architecture.
2. Expand JS only after the corresponding templates and patterns exist.
3. Register editor-facing styles before relying on their selectors in shared CSS.
4. Add new GSAP work only for truly high-value surfaces, not for routine content blocks.
5. Use the prototype responsive rules and touch-target rules as fixed implementation constraints.
