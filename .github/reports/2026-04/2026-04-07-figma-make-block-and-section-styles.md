# **Figma Make Block And Section Styles**

---

[Purpose](#purpose)

[Style rules](#style-rules)

[Current active style audit](#current-active-style-audit)

[Launch block styles](#launch-block-styles)

[Launch section styles](#launch-section-styles)

[Current CSS variable families](#current-css-variable-families)

[Style registration rules](#style-registration-rules)

[Required development](#required-development)

---

## **Purpose**

This document maps the current block and section style contracts in `ls-theme`, identifies which ones are actually active, and defines the style surface needed to support the recovered Make page and pattern inventory.

## **Style rules**

The repo guidance is correct: JSON files under `styles/blocks/` and `styles/sections/` are organisational conventions, not active editor features by default.

At the moment, a style is only genuinely editor-facing if one of the following is true:

1. it is declared directly in `theme.json`
2. it is registered in PHP with `register_block_style()`
3. it is otherwise wired by a custom loader

The prototype does not require a unique style for every pattern. Most page sections should be patterns first and styles second.

## **Current active style audit**

| Style                    | Block type       | Current wiring                                                                                                | Status                       |
| ------------------------ | ---------------- | ------------------------------------------------------------------------------------------------------------- | ---------------------------- |
| Default fill button      | `core/button`    | Defined in `theme.json` `styles.elements.button`, motion in `assets/css/animations.css`                       | Active                       |
| Outline button variation | `core/button`    | Defined in `theme.json` `styles.blocks.core/button.variations.outline`, motion in `assets/css/animations.css` | Active                       |
| `home-hero-section`      | `core/group`     | Registered in `inc/gsap.php`, CSS in `assets/css/gsap-animations.css`, JS in `assets/js/gsap-effects.js`      | Active                       |
| `card-spotlight`         | `core/group`     | Registered in `inc/gsap.php`, CSS in `assets/css/gsap-animations.css`, JS in `assets/js/gsap-effects.js`      | Active                       |
| `button-glow-accent`     | `core/button`    | JSON contract plus matching CSS selector in `assets/css/animations.css`, but not editor-registered            | CSS-ready, not editor-facing |
| `gradient-accent`        | `core/heading`   | JSON contract plus matching CSS selector in `assets/css/animations.css`, but not editor-registered            | CSS-ready, not editor-facing |
| `link-underline-accent`  | `core/paragraph` | JSON contract plus matching CSS selector in `assets/css/animations.css`, but not editor-registered            | CSS-ready, not editor-facing |
| `button-cta`             | `core/button`    | JSON contract only; no registration and no matching runtime selector                                          | Unwired                      |

## **Launch block styles**

These are the block-level styles that should be treated as launch candidates because they solve repeated editorial choices across the recovered page families.

| Style                    | Block type       | Purpose                                                   | Current state                                  |
| ------------------------ | ---------------- | --------------------------------------------------------- | ---------------------------------------------- |
| Default fill button      | `core/button`    | Primary button baseline used across the site              | Active                                         |
| Outline button variation | `core/button`    | Secondary button treatment for less dominant CTAs         | Active                                         |
| `button-glow-accent`     | `core/button`    | Accent CTA style for higher-energy calls to action        | Register for editor use or remove              |
| `button-cta`             | `core/button`    | High-emphasis CTA treatment                               | Wire properly or drop from launch scope        |
| `gradient-accent`        | `core/heading`   | Standout heading treatment for hero and proof sections    | Register for editor use                        |
| `link-underline-accent`  | `core/paragraph` | Editorial link treatment for insight and longform content | Register for editor use                        |
| `card-spotlight`         | `core/group`     | Interactive card surface used by spotlight-style layouts  | Keep active and constrain to approved patterns |

## **Launch section styles**

Only create section styles that support multiple patterns or multiple page families. The recovered prototype surface suggests this initial section-style set.

| Style                      | Block type   | Intended use                                                   | Current state |
| -------------------------- | ------------ | -------------------------------------------------------------- | ------------- |
| `home-hero-section`        | `core/group` | Homepage hero surface                                          | Active        |
| `page-hero-section`        | `core/group` | Solution, service, system, and other detail-page hero surfaces | Missing       |
| `archive-header-surface`   | `core/group` | Hubs, archives, and taxonomy header wrappers                   | Missing       |
| `listing-panel`            | `core/group` | Work, insights, testimonials, video, and podcast grid wrappers | Missing       |
| `editorial-panel`          | `core/group` | Longform content and page-body wrapper surface                 | Missing       |
| `stats-grid-surface`       | `core/group` | Proof, numbers, and capability band treatment                  | Missing       |
| `faq-panel`                | `core/group` | FAQ and support-style wrappers                                 | Missing       |
| `testimonial-card-surface` | `core/group` | Testimonial archive and support cards                          | Missing       |
| `media-card-surface`       | `core/group` | Video and podcast listing cards                                | Missing       |
| `cta-panel`                | `core/group` | Reusable CTA band wrapper                                      | Missing       |
| `form-panel`               | `core/group` | Contact, briefing, and consultation form wrapper               | Missing       |
| `state-panel`              | `core/group` | Empty-state, error, and success-state wrapper                  | Missing       |

The goal is not to create a style for every pattern. The goal is to define a small set of reusable surfaces that multiple patterns can share.

## **Current CSS variable families**

| Variable family         | Used by                | Purpose                                              |
| ----------------------- | ---------------------- | ---------------------------------------------------- |
| `--ls-button-fill-*`    | default fill button    | Sliding well fill motion                             |
| `--ls-button-outline-*` | outline button         | Arrow well and hover geometry                        |
| `--ls-button-glow-*`    | glow-style buttons     | Glow, outline, and hover bloom                       |
| `--ls-gradient-*`       | gradient heading style | Animated gradient text behaviour                     |
| `--ls-link-underline-*` | underline link style   | Link underline reveal behaviour                      |
| `--ls-effect-*`         | spotlight cards        | Pointer-following spotlight coordinates and opacity  |
| `--ls-home-hero-*`      | home hero section      | Background colour sources and hero surface behaviour |

## **Style registration rules**

1. Register any style that editors are expected to choose from the block sidebar.
2. Keep section styles scarce and reuse them across multiple patterns.
3. Do not create a unique section style for every page family.
4. Keep motion-specific selectors in `assets/css`, not in `theme.json` alone.
5. Remove or defer contracts that have no realistic launch use.
6. Let pattern markup lead and style registration follow.

## **Required development**

1. Register `button-glow-accent`, `gradient-accent`, and `link-underline-accent` if they remain in launch scope.
2. Decide whether `button-cta` becomes a real launch style or is removed until its contract is properly wired.
3. Add only the section styles that are reused across multiple recovered page families, starting with page hero, archive header, listing, CTA, and state surfaces.
4. Keep `card-spotlight` and `home-hero-section` as examples of reusable surface treatments rather than page-specific one-offs.
5. Keep style variation work, block style work, and section-style work aligned so the editor exposes only real, supported options.
