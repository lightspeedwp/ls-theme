---
applyTo: "{style.css,src/scss/**/*.scss,src/scss/**/*.css,assets/css/*.css,styles/**/*.json}"
---

# Styling Instructions

## Source and Output

- In this repo, authored styling source lives in `src/scss/**/*.scss`.
- Runtime theme CSS lives in `assets/css/*.css`.
- If sibling `.css` or source-map files appear under `src/scss/`, treat the `.scss` files as the primary authoring targets unless a repo script explicitly says otherwise.
- Prefer changing source Sass and then rebuilding CSS over patching compiled files directly.
- Keep style JSON focused on defaults, metadata, and small declarative overrides. If a raw `css` string becomes long, repeated, or stateful, move that contract into Sass or authored CSS.

## Toolchain

- Use the existing Sass workflow: `npm run sync:breakpoints`, `npm run build:css`, and `npm run watch:css`.
- Do not introduce Gulp, Grunt, CodeKit, Scout, LiveReload, or alternate Sass pipelines unless the user explicitly asks to change the toolchain.
- Do not add Autoprefixer, PurgeCSS, critical-CSS splitting, or CSS frameworks by default. In a WordPress block theme, those changes need measured ROI plus runtime and editor compatibility planning.
- Do not add vendor prefixes by default. Only keep or add them when existing code, verified browser support, or a specific bug requires them.

## Sass Architecture

- Prefer Sass modules with `@use` over legacy `@import`.
- Group partials and mixins by concern, such as motion, breakpoints, surfaces, focus, or glass effects.
- Create mixins, maps, functions, and Sass variables only when they remove verified duplication or encode a stable rule.
- Avoid `@extend` by default. It can create brittle selector output that is harder to reason about in a WordPress theme.
- Keep compile-time Sass helpers separate from runtime WordPress tokens. Sass values are for authoring convenience; `theme.json` and CSS custom properties are for live theming.

## Selectors and Specificity

- Keep selectors shallow and class-driven.
- Avoid universal selectors and deeply nested descendant chains.
- Prefer explicit component, utility, or block-style classes over element-only selectors where that improves reuse without fighting core block markup.
- Use IDs only when markup or browser behaviour truly requires them.
- Keep specificity low enough that block styles, style variations, and theme overrides remain predictable.

## Layout and Responsiveness

- Prefer Flexbox and Grid for layout.
- Prefer logical properties such as `margin-inline`, `padding-block`, `inset-inline`, and `inset-block` when the rule represents directional spacing or positioning that should remain RTL-safe.
- Reuse the shared breakpoint map and `mq()` mixin instead of scattering repeated hard-coded media queries.
- Group related responsive changes rather than creating near-duplicate queries throughout the file.

## Performance and Motion

- Prefer animating `transform` and `opacity`. Avoid layout-triggering animation properties such as `top`, `left`, `width`, and `height` when a compositor-friendly alternative will do the same job.
- Use blur, filters, gradients, and large shadows deliberately. They are acceptable when they earn their cost, but they should not be the default styling answer.
- Honour `prefers-reduced-motion` for interactive or decorative motion.
- Treat generic CSS performance advice through the WordPress runtime lens. Do not split or defer theme CSS unless there is a measured need and an enqueue strategy that fits both frontend and editor behaviour.

## WordPress Styling Boundaries

- Keep semantic design-token ownership in `theme.json` and style variations.
- In normal JSON property values, use WordPress token shorthand such as `var:preset|...` and `var:custom|...`.
- In Sass, CSS, and raw `css` strings, use CSS custom property syntax such as `var(--wp--preset--...)` and `var(--wp--custom--...)`.
- When repeated literals appear across multiple selectors, check whether the value belongs in an existing theme token before introducing a Sass helper.
- Do not optimise away CSS that WordPress may apply dynamically unless usage has been verified.

## What Not To Do

- Do not copy tutorial folder structures or tooling into the repo when the existing structure already serves the same need.
- Do not manually edit compiled CSS when source Sass exists.
- Do not over-abstract one-off declarations into mixins.
- Do not use raw colour values in authored UI when the theme already has an appropriate semantic token.
