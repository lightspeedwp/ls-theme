---
applyTo: "{theme.json,styles/**/*.json,patterns/**/*.php,templates/**/*.html,parts/**/*.html,assets/css/*.css}"
---

# Design Token Policy

## Purpose

This theme uses a two-layer colour system:

- `settings.color.palette` stores fixed palette presets.
- `settings.custom.color` stores semantic usage tokens.

Whenever you create or change a colour in a theme file, follow this policy before writing the final value.

## Naming Rules

- Keep palette slugs value-based and kebab-case, such as `neutral-100`, `surface-800`, or `brand-500`.
- Use `color` in token paths, not `colour`, because the WordPress variable format uses `custom.color`.
- Name semantic tokens broad-to-specific, such as `text.default`, `surface.card`, or `action.primary.background`.
- Name shared non-colour tokens broad-to-specific too, such as `animation.duration.base`, `animation.delay.enter`, `animation.easing.emphasised`, or `z-index.content`.
- Keep semantic token names stable across modes. Do not create `light` or `dark` suffixes for normal semantic roles.
- Non-colour custom tokens such as spacing, line-height, shadow, width, layout, or interaction values may use hard values or preset references.

## Shared Non-Colour Tokens

- Keep shared motion tokens in `settings.custom.animation`.
- Keep shared stacking tokens in `settings.custom.z-index`.
- Use these families for repeated durations, delays, easings, scales, and z-index layers instead of scattering the same literals through `theme.json`, style JSON, or theme CSS.
- These shared non-colour token families live in `theme.json` only. Do not mirror them into `styles/dark.json` unless a task explicitly calls for a mode-specific non-colour override.
- Only semantic colour tokens require dark-mode parity by default.

## Preset Reference Syntax

- In JSON property values, use WordPress preset shorthand such as `var(preset|spacing|20)`.
- In authored CSS, use CSS custom property syntax such as `var(--wp--preset--spacing--20)`.
- This CSS form also applies inside raw `css` strings embedded in style JSON files, because those strings are authored as CSS rather than JSON token values.

## Required Colour Architecture

- Define fixed colours only in `settings.color.palette`.
- Define semantic usage tokens only in `settings.custom.color`.
- Treat `theme.json` as the default or light semantic mapping.
- In this theme, `styles/dark.json` should preserve the same preset palette values as `theme.json`; dark mode is created by remapping semantic tokens, not by redefining the preset colours themselves.
- Every custom colour token path in `theme.json` must exist with the exact same path in `styles/dark.json`.
- Every custom colour token value must point only to a preset colour reference.
- In authored UI styles, patterns, templates, template parts, and theme CSS, use semantic custom colour tokens only. Do not reference preset colours directly.

## Authoring Workflow

When adding or changing a colour:

1. Read the existing semantic tokens in `theme.json` and `styles/dark.json`.
2. Check the existing tokens in the same semantic family first.
3. Reuse an existing token if it already matches the role. Keep families aligned: `surface.*` should look for `surface.*` first, `text.*` should look for `text.*` first, and so on.
4. Do not create a new token in the same family if it would point to the same preset as an existing same-family token for the same mode and state. Reuse the existing token instead.
5. If no suitable same-family token exists, create a new semantic token in `theme.json` and add the exact same token path to `styles/dark.json` before using it.
6. Map both token values only to preset colours.
7. Replace the authored usage with `var(--wp--custom--color--...)`.
8. Re-scan the edited file for raw colours or direct preset-colour references before finishing.

## Dark Mode Mapping

- Do not treat dark mode as a blind copy of the light mapping.
- Do not rewrite the preset palette in `styles/dark.json`; only the preset references assigned to semantic tokens should change.
- Start by checking whether the role is a direct foreground or surface inversion. In those cases, a switch such as `base` to `contrast`, `contrast` to `base`, or light surface to dark surface is often correct.
- For accents, gradients, glows, borders, fills, and hover states, keep the semantic role and usually keep the colour family, but move to a nearby palette step that reads well against the dark surface.
- Choose dark mappings in context: look at the token's background, adjacent tokens, interaction states, and surrounding surfaces before deciding whether the mapping should be a straight inversion or a tonal shift.
- When a dark variant needs a lifted or recessed surface, prefer nearby existing dark surface presets such as `surface-*` rather than forcing a full inverse.

## Contrast Requirements

- Normal text pairings must meet WCAG AA `4.5:1`.
- Large text, icons, borders, focus indicators, and other non-text UI pairings must meet at least `3:1`.
- If no preset pairing satisfies the role, stop and surface the gap instead of inventing a raw colour value.

## Exceptions

- Raw colours are only acceptable for non-visual technical cases such as masks or compositing helpers where a semantic UI token is the wrong abstraction.
- Flag those cases explicitly instead of silently keeping them.

## What Not To Do

- Do not create appearance-based semantic names such as `button-blue`, `dark-text`, or `green-border`.
- Do not set `settings.custom.color` values to hex, `rgb()`, `rgba()`, `hsl()`, `hsla()`, or `color-mix()` strings.
- Do not add direct `var:preset|color|...` or `var(--wp--preset--color--...)` references to authored UI styles outside token-definition areas.
- Do not update only one mode. `theme.json` and `styles/dark.json` must stay in sync for semantic colour token paths.
- Do not copy `settings.custom.animation` or `settings.custom.z-index` into `styles/dark.json` unless the task explicitly asks for a mode-specific non-colour override.
- Do not create duplicate same-family tokens that point to the same preset unless a verified mode-specific or state-specific distinction is required.
