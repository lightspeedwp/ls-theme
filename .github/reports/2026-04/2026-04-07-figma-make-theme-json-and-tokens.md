# **Figma Make Theme JSON And Tokens**

---

[Purpose](#purpose)

[Theme JSON rules](#theme-json-rules)

[Current root layout and defaults](#current-root-layout-and-defaults)

[Colour presets](#colour-presets)

[Spacing presets](#spacing-presets)

[Typography presets](#typography-presets)

[Shadow presets](#shadow-presets)

[Border radius presets](#border-radius-presets)

[Current element-level styling contracts](#current-element-level-styling-contracts)

[Style variation audit](#style-variation-audit)

[Required development](#required-development)

---

## **Purpose**

This document defines the token and `theme.json` baseline required to map the prototype into `ls-theme`.

The theme already has a strong token system. The required work is mostly consolidation, variation rebuilding, and ensuring all implementation decisions keep using the existing semantic preset structure.

## **Theme JSON rules**

1. Keep `theme.json` as the source of truth for colour, spacing, typography, shadow, radius, and baseline element styling.
2. Keep tokens semantic. Patterns and motion layers should consume presets instead of introducing hard-coded values.
3. Use light and dark variations by remapping the same semantic token families, not by inventing a second naming system.
4. Keep block-level visual defaults in `theme.json` where possible. Reserve CSS for motion, advanced effects, and selectors that `theme.json` cannot represent.

## **Current root layout and defaults**

| Setting                 | Value                                                         |
| ----------------------- | ------------------------------------------------------------- |
| Schema                  | `https://schemas.wp.org/wp/6.9/theme.json`                    |
| Version                 | `3`                                                           |
| Content width           | `800px`                                                       |
| Wide width              | `1360px`                                                      |
| Root block gap          | `var(--wp--preset--spacing--30)`                              |
| Root horizontal padding | left and right `var(--wp--preset--spacing--20)`               |
| Body font               | `var(--wp--preset--font-family--body, system-ui, sans-serif)` |
| Body size               | `var(--wp--preset--font-size--200)`                           |
| Body line height        | `var(--wp--custom--line-height--paragraph)`                   |

## **Colour presets**

### Core And Neutral Presets

| Slug          | Value     |
| ------------- | --------- |
| `base`        | `#F8F8F8` |
| `contrast`    | `#080808` |
| `neutral-100` | `#F8F8F8` |
| `neutral-200` | `#E8E8E8` |
| `neutral-300` | `#D8D8D8` |
| `neutral-400` | `#B8B8B8` |
| `neutral-500` | `#909090` |
| `neutral-600` | `#707070` |
| `neutral-700` | `#505050` |
| `neutral-800` | `#303030` |
| `neutral-900` | `#181818` |

### Surface Presets

| Slug          | Value     |
| ------------- | --------- |
| `surface-100` | `#2A2A30` |
| `surface-200` | `#202028` |
| `surface-300` | `#181820` |
| `surface-400` | `#12121A` |
| `surface-500` | `#101018` |
| `surface-600` | `#0C0C14` |
| `surface-700` | `#080810` |
| `surface-800` | `#05050A` |
| `surface-900` | `#000000` |

### Brand Presets

| Slug        | Value     |
| ----------- | --------- |
| `brand-100` | `#D6E4FF` |
| `brand-200` | `#ADC8FF` |
| `brand-300` | `#85ACFF` |
| `brand-400` | `#5C90FF` |
| `brand-500` | `#1E6AFF` |
| `brand-600` | `#1C5EE4` |
| `brand-700` | `#184FBF` |
| `brand-800` | `#123B8F` |
| `brand-900` | `#0B255F` |

### CTA Presets

| Slug      | Value     |
| --------- | --------- |
| `cta-100` | `#DDFBFF` |
| `cta-200` | `#B8F5FF` |
| `cta-300` | `#8DEEFF` |
| `cta-400` | `#5AE3F5` |
| `cta-500` | `#00FCFC` |
| `cta-600` | `#00D9D9` |
| `cta-700` | `#00A8A8` |
| `cta-800` | `#007476` |
| `cta-900` | `#003D3F` |

### Accent Presets

| Slug         | Value     |
| ------------ | --------- |
| `accent-100` | `#DDFBF1` |
| `accent-200` | `#B8F5DE` |
| `accent-300` | `#86EDC4` |
| `accent-400` | `#4FDEAA` |
| `accent-500` | `#22C78A` |
| `accent-600` | `#17A974` |
| `accent-700` | `#11865B` |
| `accent-800` | `#0B6243` |
| `accent-900` | `#063828` |

### Accent Two Presets

| Slug             | Value     |
| ---------------- | --------- |
| `accent-two-100` | `#FFDDFB` |
| `accent-two-200` | `#FFB8F5` |
| `accent-two-300` | `#FF85EE` |
| `accent-two-400` | `#FF4FE3` |
| `accent-two-500` | `#FC00FC` |
| `accent-two-600` | `#D400D4` |
| `accent-two-700` | `#A600A6` |
| `accent-two-800` | `#760076` |
| `accent-two-900` | `#3F003F` |

### Accent Three Presets

| Slug               | Value     |
| ------------------ | --------- |
| `accent-three-100` | `#E5FFE5` |
| `accent-three-200` | `#BEFFBE` |
| `accent-three-300` | `#8FFF8F` |
| `accent-three-400` | `#4FFF4F` |
| `accent-three-500` | `#00FC00` |
| `accent-three-600` | `#00D400` |
| `accent-three-700` | `#00A300` |
| `accent-three-800` | `#007000` |
| `accent-three-900` | `#003D00` |

### Accent Four Presets

| Slug              | Value     |
| ----------------- | --------- |
| `accent-four-100` | `#FFFFDD` |
| `accent-four-200` | `#FFFFB8` |
| `accent-four-300` | `#FFFF85` |
| `accent-four-400` | `#FFFF4F` |
| `accent-four-500` | `#FCFC00` |
| `accent-four-600` | `#D4D400` |
| `accent-four-700` | `#A6A600` |
| `accent-four-800` | `#767600` |
| `accent-four-900` | `#3F3F00` |

### State Presets

| Slug                     | Value     |
| ------------------------ | --------- |
| `error-foreground`       | `#EF4444` |
| `warning-foreground`     | `#F59E0B` |
| `information-foreground` | `#3B82F6` |
| `success-foreground`     | `#10B981` |

## **Spacing presets**

| Slug  | Name       | Value                                                 |
| ----- | ---------- | ----------------------------------------------------- |
| `5`   | `XXS`      | `clamp(0.250rem, calc(0.227rem + 0.006vw), 0.312rem)` |
| `10`  | `XS`       | `clamp(0.500rem, calc(0.454rem + 0.012vw), 0.625rem)` |
| `20`  | `S`        | `clamp(0.875rem, calc(0.736rem + 0.036vw), 1.250rem)` |
| `30`  | `M`        | `clamp(1.250rem, calc(1.018rem + 0.060vw), 1.875rem)` |
| `40`  | `L`        | `clamp(1.625rem, calc(1.300rem + 0.083vw), 2.500rem)` |
| `50`  | `XL`       | `clamp(2.062rem, calc(1.668rem + 0.101vw), 3.125rem)` |
| `60`  | `XXL`      | `clamp(2.312rem, calc(1.779rem + 0.137vw), 3.750rem)` |
| `70`  | `XXXL`     | `clamp(2.625rem, calc(1.975rem + 0.167vw), 4.375rem)` |
| `80`  | `XXXXL`    | `clamp(3.000rem, calc(2.257rem + 0.190vw), 5.000rem)` |
| `90`  | `Gigantic` | `clamp(3.500rem, calc(2.711rem + 0.202vw), 5.625rem)` |
| `100` | `Colossal` | `clamp(4.000rem, calc(3.164rem + 0.214vw), 6.250rem)` |

## **Typography presets**

### Font Families

| Slug        | Name          | Font family              |
| ----------- | ------------- | ------------------------ |
| `heading`   | `Lexend`      | `Lexend, sans-serif`     |
| `body`      | `Manrope`     | `Manrope, sans-serif`    |
| `monospace` | `Roboto Mono` | `Roboto Mono, monospace` |

### Font Sizes

| Slug  | Name       | Size      | Fluid min  | Fluid max |
| ----- | ---------- | --------- | ---------- | --------- |
| `100` | `Tiny`     | `0.75rem` | `0.688rem` | `0.75rem` |
| `200` | `Base`     | `1rem`    | `0.875rem` | `1rem`    |
| `300` | `Small`    | `1.25rem` | `1rem`     | `1.25rem` |
| `400` | `Medium`   | `1.5rem`  | `1.25rem`  | `1.5rem`  |
| `500` | `Large`    | `2rem`    | `1.625rem` | `2rem`    |
| `600` | `X-Large`  | `2.5rem`  | `2.125rem` | `2.5rem`  |
| `700` | `Huge`     | `3rem`    | `2.375rem` | `3rem`    |
| `800` | `Gigantic` | `3.75rem` | `2.625rem` | `3.75rem` |
| `900` | `Colossal` | `4.5rem`  | `2.75rem`  | `4.5rem`  |

### Custom Line Heights

| Token             | Value  |
| ----------------- | ------ |
| `heading-snug`    | `1.1`  |
| `heading-default` | `1.25` |
| `heading-loose`   | `1.35` |
| `button`          | `1.3`  |
| `paragraph`       | `1.5`  |

### Button Padding Contract

| Side   | Value    |
| ------ | -------- |
| top    | `1rem`   |
| right  | `4rem`   |
| bottom | `1rem`   |
| left   | `1.5rem` |

## **Shadow presets**

| Slug  | Name      | Value                                       |
| ----- | --------- | ------------------------------------------- |
| `100` | `Tiny`    | `0.5px 2px 3px 0.5px rgba(17, 17, 17, 0.2)` |
| `200` | `Base`    | `0.5px 2px 6px 1px rgba(17, 17, 17, 0.2)`   |
| `300` | `Small`   | `1px 4px 12px 4px rgba(17, 17, 17, 0.2)`    |
| `400` | `Medium`  | `1px 4px 12px 4px rgba(17, 17, 17, 0.3)`    |
| `500` | `Large`   | `1px 4px 12px 4px rgba(17, 17, 17, 0.3)`    |
| `600` | `X-Large` | `2px 6px 12px 6px rgba(17, 17, 17, 0.3)`    |

## **Border radius presets**

| Slug  | Name      | Value    |
| ----- | --------- | -------- |
| `0`   | `none`    | `0`      |
| `100` | `small`   | `4px`    |
| `200` | `medium`  | `8px`    |
| `300` | `large`   | `16px`   |
| `400` | `x-large` | `24px`   |
| `500` | `round`   | `9999px` |

## **Current element-level styling contracts**

### Default Fill Button

Current defaults live in `styles.elements.button`.

- text colour: `base`
- radius: `border-radius-200`
- padding: `1rem 4rem 1rem 1.5rem`
- font size: `font-size-200`
- font weight: `700`
- letter spacing: `0.08em`
- motion variables seeded in `theme.json`: `--ls-button-fill-*`

### Outline Button Variation

Current defaults live in `styles.blocks.core/button.variations.outline`.

- border: `2px solid brand-500`
- background: `base`
- text: `contrast`
- radius: `border-radius-200`
- padding: `1rem 4rem 1rem 1.5rem`
- font size: `font-size-200`
- font weight: `700`
- letter spacing: `0.08em`
- motion variables seeded in `theme.json`: `--ls-button-outline-*`

## **Style variation audit**

| File                | Current state                                                                              | Required action                                               |
| ------------------- | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------- |
| `styles/light.json` | Uses a reduced six-colour palette with slugs like `base-2`, `accent`, and `accent-2`       | Rebuild using the same semantic families as root `theme.json` |
| `styles/dark.json`  | Same structural issue as `light.json`; does not remap the existing semantic token families | Rebuild as a proper semantic dark variation                   |

## **Required development**

1. Keep the existing root preset system and build on it rather than replacing it.
2. Rebuild `light.json` and `dark.json` so both variations expose the same semantic palette families.
3. Decide whether the default site mode is light-first or dark-first. The prototype documents lean dark-first, while the current theme root is light-first.
4. Continue keeping button, link, and heading motion tokens in `theme.json`, but do not treat dormant JSON files in `styles/blocks` or `styles/sections` as active features until they are registered.
5. Ensure every new pattern, section style, and JS enhancement consumes existing presets such as `brand-*`, `cta-*`, `accent-*`, spacing presets, and font presets.
6. Keep section backgrounds semantic. Use `base`, `surface-*`, `neutral-*`, and the accent families instead of new one-off presets.
