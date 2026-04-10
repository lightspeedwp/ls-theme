# Theme Mixin Strategy

Date: 2026-04-10

## Purpose

Define a pragmatic mixin strategy for `ls-theme` that can be reused across LightSpeed themes without fighting the existing WordPress block-theme architecture.

This document treats `ls-theme` as the proving ground and proposes a company-wide default based on what is already present in the theme.

## Decision Summary

- Use mixins for repeated authored CSS mechanics.
- Keep `theme.json` and `styles/presets/**/*.json` as the source of truth for tokens, block defaults, and style-variation payloads.
- Keep the mixin layer small, token-driven, and split across multiple files by concern.
- Do not use third-party breakpoint helpers such as `include-media`.
- Treat `settings.custom.layout.break-points` in `theme.json` as the canonical breakpoint naming system for all themes.
- Do not try to use WordPress CSS custom properties directly inside media queries; Sass must resolve breakpoints at compile time.

## What Mixins Are For

In LightSpeed themes, mixins should solve repetition in authored CSS that is awkward to maintain by hand.

Good mixin targets:

- Repeated media-query wrappers.
- Reduced-motion wrappers.
- Focus-ring patterns.
- Absolute-fill and pseudo-element overlay primitives.
- Repeated surface treatments such as cards, spotlight shells, and glass panels.
- Repeated interaction bundles such as lift, glow, and hover/focus state transitions.

Bad mixin targets:

- Colour tokens.
- Typography tokens.
- Spacing tokens.
- Block defaults that already belong in `theme.json`.
- One-off component rules that are still simple and readable as plain CSS.

## Validation Of Proposed Use Cases

### Animations

Relevant.

This theme already repeats motion patterns across CSS-only effects and GSAP-adjacent authored CSS. The reusable part is not a single catch-all animation mixin, but a small set of motion primitives:

- transition bundles
- reduced-motion fallbacks
- hover and focus state wrappers
- interactive transforms such as lift and icon travel
- pseudo-element effect scaffolding

### Responsive Statements

Relevant, but keep them thin.

The right abstraction is a single `mq()` mixin that uses LightSpeed's canonical breakpoint names. Do not build a large responsive framework around it.

### Forms

Not currently a strong `ls-theme` use case.

There is no significant theme-owned form styling in the current codebase. This only becomes a useful company mixin family if LightSpeed standardises form UI across multiple projects or form plugins.

### include-media

Not recommended.

`include-media` solves a small problem that a local `mq()` mixin can solve with less dependency surface, less syntax to learn, and less long-term maintenance.

### Glassmorphism

Relevant.

Glassmorphism is a good mixin candidate because it has a repeated structure:

- translucent surface
- blur
- border treatment
- layered shadow
- edge highlights
- overflow and positioning
- fallback behaviour when blur support is unavailable

## Current ls-theme Mixins Worth Introducing

The strongest candidates in `ls-theme` are:

- `mq()`
- `reduced-motion()`
- `focus-ring()`
- `absolute-fill()`
- `surface-card()`
- `glass-surface()`
- `interactive-lift()`

The goal is not to create all of these immediately. The goal is to define a stable first layer that future effects can reuse.

## Canonical Breakpoints

LightSpeed breakpoint names should come from `theme.json` `settings.custom.layout.break-points`.

Current canonical names:

- `full`: `1440px`
- `desktop`: `1280px`
- `tablet-landscape`: `1024px`
- `tablet-portrait`: `768px`
- `mobile-landscape`: `640px`
- `mobile-portrait`: `390px`
- `mobile-compact`: `320px`

### Important Constraint

These values are exposed by WordPress as CSS custom properties, but CSS custom properties cannot be relied on directly inside `@media` conditions.

This will not be the strategy:

```scss
@media (min-width: var(--wp--custom--layout--break-points--tablet-portrait)) {
  // Not supported as the basis of the mq system.
}
```

Instead, the `mq()` mixin should use a Sass map that mirrors the same names and values at build time.

### Recommended mq() Source Of Truth Rule

- `theme.json` is the canonical human-reviewed source.
- Sass mirrors the exact same breakpoint keys and values.
- If the list changes, update both in the same change.
- If this becomes repetitive across projects, add a small generation script later to emit a Sass map from `theme.json`.

## Recommended File Structure

When Sass is introduced, use multiple files and group them by concern.

```text
src/scss/
  abstracts/
    mixins/
      _mq.scss
      _motion.scss
      _focus.scss
      _surface.scss
      _glass.scss
  animations.scss
  gsap-animations.scss
```

Suggested output targets:

- `src/scss/animations.scss` -> `assets/css/animations.css`
- `src/scss/gsap-animations.scss` -> `assets/css/gsap-animations.css`

Keep `style.css` outside this flow because it carries the theme header.

## Recommended v1 Mixins

### _mq.scss

```scss
@use "sass:map";

$ls-breakpoints: (
  full: 1440px,
  desktop: 1280px,
  tablet-landscape: 1024px,
  tablet-portrait: 768px,
  mobile-landscape: 640px,
  mobile-portrait: 390px,
  mobile-compact: 320px,
);

@mixin mq($from: null, $until: null) {
  $query: null;

  @if $from != null {
    $query: "(min-width: #{map.get($ls-breakpoints, $from)})";
  }

  @if $until != null {
    $max-query: "(max-width: #{map.get($ls-breakpoints, $until) - 0.02px})";
    $query: if($query == null, $max-query, "#{$query} and #{$max-query}");
  }

  @media #{$query} {
    @content;
  }
}
```

### _motion.scss

```scss
@mixin reduced-motion {
  @media (prefers-reduced-motion: reduce) {
    @content;
  }
}

@mixin interactive-lift(
  $distance: -6px,
  $duration: var(--wp--custom--animation--duration--medium),
  $easing: var(--wp--custom--animation--easing--emphasised)
) {
  transition: transform $duration $easing;

  &:hover,
  &:focus-within {
    transform: translateY($distance);
  }

  @include reduced-motion {
    transition: none;

    &:hover,
    &:focus-within {
      transform: none;
    }
  }
}
```

### _focus.scss

```scss
@mixin focus-ring(
  $width: 2px,
  $colour: var(--wp--custom--color--focus--ring),
  $offset: 4px
) {
  &:focus-visible {
    outline: $width solid $colour;
    outline-offset: $offset;
  }
}
```

### _surface.scss

```scss
@mixin absolute-fill($inset: 0) {
  position: absolute;
  inset: $inset;
}

@mixin surface-card(
  $radius: var(--wp--preset--border-radius--300),
  $border: 1px solid var(--wp--custom--color--border--card),
  $background: var(--wp--custom--color--surface--card),
  $shadow: var(--wp--custom--shadow--elevation--100)
) {
  position: relative;
  overflow: hidden;
  border: $border;
  border-radius: $radius;
  background: $background;
  box-shadow: $shadow;
}
```

### _glass.scss

```scss
@mixin glass-surface(
  $background: color-mix(in srgb, var(--wp--custom--color--surface--card) 24%, transparent),
  $border: color-mix(in srgb, var(--wp--custom--color--surface--highlight) 35%, transparent),
  $radius: var(--wp--preset--border-radius--300),
  $blur: 24px,
  $shadow: var(--wp--custom--shadow--elevation--200)
) {
  @include surface-card($radius, 1px solid $border, $background, $shadow);

  @supports ((backdrop-filter: blur(1px)) or (-webkit-backdrop-filter: blur(1px))) {
    backdrop-filter: blur($blur);
    -webkit-backdrop-filter: blur($blur);
  }
}

@mixin glass-edge-highlights(
  $top-highlight: rgba(255, 255, 255, 0.8),
  $side-highlight: rgba(255, 255, 255, 0.8)
) {
  &::before,
  &::after {
    content: "";
    pointer-events: none;
    border-radius: inherit;
  }

  &::before {
    @include absolute-fill(auto 0 auto 0);
    top: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, $top-highlight, transparent);
  }

  &::after {
    @include absolute-fill(0 auto 0 0);
    width: 1px;
    background: linear-gradient(180deg, $side-highlight, transparent, rgba(255, 255, 255, 0.3));
  }
}
```

## How To Organise Multiple Glassmorphism Or Animation Styles

If there are two glass styles, they should usually stay in the same mixin family file if they share the same primitive.

Recommended rule:

- Put shared building blocks in one family file such as `_glass.scss`.
- Put named variants in that same file if they are only thin wrappers around the same primitive.
- Split them into separate files only when they become large, semantically different, or component-specific.

Example:

```scss
// _glass.scss
@mixin glass-surface(...) { ... }
@mixin glass-edge-highlights(...) { ... }

@mixin glass-soft-card {
  @include glass-surface(...);
  @include glass-edge-highlights(...);
}

@mixin glass-strong-panel {
  @include glass-surface(...);
  @include glass-edge-highlights(...);
}
```

This is better than creating `_glass-soft.scss` and `_glass-strong.scss` immediately, because the family stays discoverable and the shared primitive stays obvious.

The same rule applies to animations:

- keep generic motion helpers in `_motion.scss`
- keep effect-family helpers in the file that owns that family
- move component-specific wrappers out only when they stop being shared primitives

Good pattern:

- `_motion.scss` for reduced motion, transition bundles, lift
- `_glass.scss` for glass primitives and glass variants
- `_surface.scss` for shared card and overlay primitives

Bad pattern:

- one giant `_mixins.scss`
- one giant `_animations.scss` containing unrelated effect families
- splitting every tiny variant into its own file before reuse is proven

## Company-Wide Rules

For LightSpeed themes, use these rules by default:

1. `theme.json` stays first for tokens and baseline styling.
2. Mixins exist only to remove repeated authored-CSS mechanics.
3. Every mixin should prefer semantic WordPress custom properties over hard-coded values.
4. Breakpoint names must match `theme.json` `settings.custom.layout.break-points`.
5. Media-query values must be resolved by Sass, not by CSS custom properties.
6. Split mixins into small concern-based files.
7. Create a new mixin only when the pattern is repeated, structurally complex, or easy to misuse.
8. Keep component code readable after expansion; if a mixin hides too much, it is too abstract.

## Recommended Next Step For ls-theme

If this strategy is adopted, the first implementation pass should be:

1. Add Dart Sass only.
2. Create the `src/scss/abstracts/mixins/` structure.
3. Port `assets/css/animations.css` and `assets/css/gsap-animations.css` into Sass entry files.
4. Introduce only `mq()`, `reduced-motion()`, `absolute-fill()`, `surface-card()`, and `glass-surface()` in the first pass.
5. Refactor the existing card, button, and spotlight effects only where duplication clearly improves.

That keeps the change controlled and avoids introducing a framework before the pattern library exists.