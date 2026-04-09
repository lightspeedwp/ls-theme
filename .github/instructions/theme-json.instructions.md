---
applyTo: "{theme.json,styles/**/*.json}"
---

# theme.json Instructions

## Role of theme.json

`theme.json` is the **primary source of truth** for design tokens in this theme.

Also follow `design-token-policy.instructions.md` for any colour change.

Prefer `theme.json` over:

- PHP `add_theme_support()` for colours, fonts, or spacing
- Hardcoded CSS values
- Inline block attributes

---

## Schema

Always include the `$schema` key at the top:

```json
{
  "$schema": "https://schemas.wp.org/trunk/theme.json",
  "version": 3
}
```

The schema version should match the minimum WordPress version the theme targets.

---

## Colour System

This theme uses two colour layers:

- `settings.color.palette` for fixed palette values
- `settings.custom.color` for semantic usage tokens

### Palette presets

Define fixed palette values in `settings.color.palette`.
Use value-based family and scale slugs, not interface meaning:

```json
{
  "name": "Brand 500",
  "slug": "brand-500",
  "color": "#0066cc"
}
```

Keep aliases such as `base` and `contrast` limited and consistent.

### Semantic colour tokens

Define semantic usage tokens in `settings.custom.color`.
Name them broad-to-specific and keep them stable across modes:

```json
{
  "settings": {
    "custom": {
      "color": {
        "text": {
          "default": "var(--wp--preset--color--neutral-900)"
        },
        "surface": {
          "canvas": "var(--wp--preset--color--base)"
        }
      }
    }
  }
}
```

Use `color`, not `colour`, in token paths.
Every custom colour token in `theme.json` must have the exact same path in `styles/dark.json`.
Every custom colour token value must point only to preset colours.

### Authored colour usage

When styling blocks or elements in `theme.json` or `styles/**/*.json`, reference semantic custom colour tokens:

```json
"color": {
	"background": "var(--wp--custom--color--surface--canvas)",
	"text": "var(--wp--custom--color--text--default)"
}
```

Direct preset-colour references belong only inside token-definition areas. If no semantic token exists yet, create it in `theme.json` and `styles/dark.json` before using it.

---

## Typography

Define font sizes in `settings.typography.fontSizes`.
Define font families in `settings.typography.fontFamilies` only if custom fonts are registered.

Do not bundle web fonts by default — add them only when `.woff2` files exist in `assets/fonts/`.

---

## Spacing

Define spacing in `settings.spacing.spacingSizes` or via the spacing scale.
Reference spacing using presets or non-colour custom tokens:

```css
var(--wp--preset--spacing--40)
```

---

## Shadows

- If a shadow preset or authored component shadow needs mode-aware behaviour, define the shadow string in `settings.custom.shadow`.
- Reference those shadow tokens with `var(--wp--custom--shadow--...)` from `settings.shadow.presets` or authored shadow properties.
- Keep shadow token paths stable across modes, and override the same paths in `styles/dark.json` when the dark surface needs different shadow values.

---

## Style Variations

- `styles/light.json` and `styles/dark.json` are registered style variations.
- Additional variations can be added as `styles/*.json`.
- `styles/blocks/` and `styles/sections/` are organisational conventions —
  WordPress does not auto-consume these as global style variations.
- Keep variation files focused — only override what differs from the base `theme.json`.
- `styles/dark.json` must mirror the semantic colour token paths from `theme.json`.
- Do not create separate light or dark token names for normal semantic roles. Remap values, not token names.

---

## Contrast

- Normal text pairings must meet WCAG AA `4.5:1`.
- Large text, borders, icons, focus indicators, and other non-text UI pairings must meet at least `3:1`.
- If no preset pairing satisfies the role, surface the gap instead of inventing a raw colour.

---

## What Not To Do

- Do not set `"defaultPalette": true` — use the custom palette only.
- Do not add font families without also registering the font files.
- Do not set global styles that are too opinionated for a starter.
- Do not copy-paste large theme.json files from other themes without review.
- Do not add direct `var:preset|color|...` or `var(--wp--preset--color--...)` references to authored UI styles when a semantic token exists or can be created.
- Do not set `settings.custom.color` values to raw hex, `rgb()`, `hsl()`, or `color-mix()` strings.
