# Spotlight Card GSAP Implementation

## Goal

Define a GSAP implementation approach for `ls-theme` that can power the spotlight card effect and other future interactive effects without coupling behaviour to pattern content.

## Why GSAP Is A Better Fit Here

- The team already has a GSAP test theme that uses normal WordPress script enqueueing.
- GSAP keeps the animation logic in one recognised library rather than growing ad hoc front-end scripts.
- A pointer-driven glow is a good use case for tweened custom properties.
- The theme stays block-first because behaviour is attached through classes on existing blocks.
- The same GSAP bootstrap can later support multiple effects and plugins, not just the spotlight card.

## Confirmed Reference Pattern

The `lightspeed-theme-test` repo currently:

- enqueues GSAP from CDN in `functions.php`
- loads a theme script after GSAP
- targets Gutenberg block classes directly from JavaScript

That class-first integration shape should be reused here.

## Recommended Implementation Shape

### 1. Separate GSAP Loading Into Its Own PHP Include

Create a dedicated file in `inc/`, for example `inc/gsap.php`, and keep GSAP registration there just as `inc/animations.php` owns shared animation styles.

This file should:

- register and enqueue GSAP assets
- define handles for core plus any optional plugins
- keep front-end and editor loading decisions in one place
- scale to multiple GSAP-powered effects over time

The important architectural point is that GSAP should be treated as a theme subsystem, not a one-off card script.

### 2. Keep Effects Class-Based And Content-Agnostic

The GSAP layer should only respond to classes applied to existing blocks.

Examples:

- `is-style-card-spotlight` on `core/group`
- `is-style-button-magnetic` on `core/button`
- `is-style-heading-reveal` on `core/heading`

The effect implementation should not ship example content, card copy, or opinionated layouts. Patterns can be created separately by the team and simply apply the relevant classes.

This matches the working model in `lightspeed-theme-test` and keeps the behaviour portable across patterns, templates, and ad hoc editor layouts.

### 3. Store Base Styling In Style JSON Wherever Possible

Base visual styling should live in block or section style JSON as far as WordPress allows.

For the spotlight card, that means the style JSON should own as much as possible, such as:

- border
- radius
- padding
- colours
- shadow
- static custom property defaults

`assets/css/animations.css` should only contain the shared functional CSS that cannot live cleanly in style JSON, for example:

- pseudo-element glow rendering
- state selectors like `:hover` and `:focus-within`
- motion-specific custom property usage
- reduced-motion fallbacks

This is the same design split already used by styles like [wp-content/themes/ls-theme/styles/blocks/buttons/button-glow-accent.json](/Users/zaredrogers/Studio/lightspeed/wp-content/themes/ls-theme/styles/blocks/buttons/button-glow-accent.json), where JSON provides the configurable base and `animations.css` provides the interactive layer.

### 4. Use Broader, Logical Animation Property Names

The earlier spotlight-specific variable set was directionally correct, but the naming standard should be more reusable.

Prefer logical property groups such as:

- `--ls-effect-x`
- `--ls-effect-y`
- `--ls-effect-opacity`
- `--ls-effect-intensity`
- `--ls-effect-scale`
- `--ls-effect-rotation`
- `--ls-effect-duration`
- `--ls-effect-ease`

Then let block-specific classes alias or override those where needed.

For spotlight cards, a scoped version can still exist, but the broader convention should be documented so future GSAP effects use the same mental model.

### 5. Prefer GSAP Core First, Add Plugins Deliberately

The GSAP subsystem should be ready for multiple plugins, but each effect should only load what it needs.

Recommended principle:

- always start with GSAP core
- add plugins only when the interaction genuinely requires them
- keep plugin registration centralised in `inc/gsap.php`

For the spotlight card itself, GSAP core should still be enough.

## Suggested WordPress Wiring

### PHP Structure

- `inc/animations.php` should continue owning shared animation stylesheets.
- `inc/gsap.php` should own GSAP script registration and enqueueing.
- `functions.php` should only require the include, keeping the bootstrap lean.

This mirrors the existing include structure and avoids mixing style loading with library loading.

### Script Handles

Suggested handles:

- `ls-theme-gsap`
- `ls-theme-gsap-core-effects`
- optional plugin handles as needed later

For example, if more advanced interactions arrive later, the theme may eventually register handles for Draggable, ScrollTrigger, or Observer. The report should assume expansion, not a single effect.

### Enqueueing Strategy

- enqueue GSAP first
- enqueue one or more theme scripts that depend on GSAP
- load in the footer
- only enqueue effect scripts where the corresponding classes are expected to be used, if practical

For the first pass, CDN loading is acceptable because it matches the test theme. If the team wants fewer external requests later, ship GSAP locally.

## Suggested Spotlight Card Implementation

### Markup Contract

Use a normal `core/group` with a class such as `is-style-card-spotlight`.

No demo content should be bundled into the implementation itself.

### Styling Contract

The style JSON should own the card shell and tokens.

`animations.css` should own the effect rendering logic.

### Motion Contract

GSAP should animate CSS custom properties rather than inline gradient strings or direct presentational values on every event.

Recommended spotlight behaviour:

1. On pointer enter:
   fade the effect in.

2. On pointer move:
   tween logical position variables toward the pointer coordinates inside the card bounds.

3. On pointer leave:
   fade the effect out.

4. On focus within:
   move the effect to a stable centre position for keyboard users and make it visible.

5. On focus out:
   fade back to zero.

The implementation should work per block instance, not from one global document listener.

## Why This Direction Is Better Than The Removed Version

- keeps GSAP concerns isolated in a dedicated include
- scales from one effect to many without rewriting the bootstrap
- keeps content out of the behaviour layer
- pushes visual defaults into style JSON instead of hardcoding them in shared CSS
- motion logic aligns with the team's existing GSAP experiments
- keeps effects optional and class-driven

## Risks And Caveats

- GSAP is still JavaScript, so this is not a zero-JS solution.
- A CDN dependency introduces an external request unless the library is bundled locally.
- The Site Editor iframe may need separate enqueue handling if the effect is expected inside the editor canvas.
- Reduced-motion handling must still be honoured in both CSS and JS.

## Implementation Sequence

1. Add `inc/gsap.php` and move GSAP registration there.
2. Register GSAP core and define a structure that can support additional plugins later.
3. Re-add the spotlight card as a class-based effect only, with no bundled content.
4. Put the base card styling in style JSON and leave only functional selectors and pseudo-element logic in a GSAP-specific stylesheet.
5. Animate logical custom properties from a GSAP effect script scoped to `.is-style-card-spotlight`.
6. Test front end hover, focus, reduced motion, and editor behaviour.
7. After that, repeat the same pattern for any future GSAP-enabled block classes.

## Notes From The Removed Prototype

- The class name `is-style-card-spotlight` is still the right naming direction.
- `styles/sections/` is retained as an organisational reference, while the editor-facing block style is registered in PHP.
- The original React prompt still contained invalid demo usage and unnecessary framework assumptions.
- The removed prototype proved the visual direction, but not the final architecture.

## Current Implementation

The first GSAP implementation pass now lives in these files:

- `inc/gsap.php`
- `assets/js/gsap-effects.js`
- `assets/css/gsap-animations.css`
- `styles/sections/cards/card-spotlight.json`
- `docs/spotlight-card-style.md`

Current behaviour:

- the class is `is-style-card-spotlight`
- the intended target block is `core/group`
- the style is registered in the editor as `Card Spotlight`
- the glow follows the pointer on fine-pointer devices
- keyboard focus moves the effect to the card centre
- theme colours are used for both the light surface shell and the glow accent
- the live effect configuration is currently owned directly by `assets/css/gsap-animations.css`

The implementation is still class-driven and content-agnostic, so patterns can be authored separately.
