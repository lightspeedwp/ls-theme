# Block Style JSON Anatomy

Block style JSON files live under `styles/` (or subdirectories like `styles/sections/`). They share the theme.json v3 schema but only contain a subset of keys.

## Minimal structure

```json
{
  "$schema": "https://schemas.wp.org/wp/6.9/theme.json",
  "version": 3,
  "title": "Human-readable name",
  "slug": "css-class-suffix",
  "blockTypes": ["core/group"],
  "description": "Optional.",
  "styles": { ... }
}
```

The block receives the class `is-style-<slug>` on its root element. All selectors in `css` use `&` to refer to that root.

## What `styles` supports

```
styles
├── border          { radius, color, style, width }
├── color           { background, text, gradient }
├── shadow          "var:preset|shadow|slug"
├── spacing         { blockGap, padding, margin }
├── typography      { fontSize, fontFamily, fontWeight, ... }
├── dimensions      { minHeight, aspectRatio }
├── css             "raw CSS string, & = the block root"
├── elements
│   ├── heading     { color, typography }
│   ├── link        { color, typography, ":hover", ":focus", ":active", ":visited" }
│   ├── button      { color, typography, spacing, border, ":hover", ":focus", ":active", "css" }
│   ├── separator   { color }
│   ├── h1–h6       { typography }
│   └── caption     { color, typography }
└── blocks
    └── "core/post-excerpt"
        ├── color, typography, spacing, border, css
        └── elements
            └── link  { color, ":hover", ... }
```

## Token formats

Use `var:preset|type|slug` in JSON values, `var(--wp--preset--type--slug)` in `css` strings.

```json
"color": { "text": "var:preset|color|accent-500" }
"css": "color: var(--wp--preset--color--accent-500);"
```

Custom tokens from `theme.json settings.custom` use `var:custom|path|to|key` / `var(--wp--custom--path--to--key)`.

## Pseudo-states

`link` and `button` elements support `:hover`, `:focus`, `:active`, `:visited` as sibling keys:

```json
"elements": {
  "button": {
    "color": { "background": "var:preset|color|primary-500" },
    ":hover": {
      "color": { "background": "var:preset|color|accent-500" }
    },
    "css": "&:focus-visible{ outline: 2px solid ...; }"
  }
}
```

## `blocks` sub-key

Allows scoped styles for child blocks. Supported in block style JSON from WP 6.6+.

```json
"blocks": {
  "core/post-excerpt": {
    "elements": {
      "link": {
        "color": { "text": "var:preset|color|accent-500" },
        ":hover": { "color": { "text": "var:preset|color|accent-600" } }
      }
    }
  },
  "outermost/icon-block": {
    "color": { "text": "var:preset|color|accent-500" },
    "css": "& svg { fill: currentColor; }"
  }
}
```

## What must stay in `css`

| Situation | Reason |
|---|---|
| `overflow`, `max-width`, transitions | No JSON key maps to these properties |
| `&:hover { box-shadow }` on the block root | Block-level hover has no JSON pseudo-state |
| `&:hover .child-selector { transform }` | Hover trigger is the parent; can't live in the child block's `css` |
| `& :is([aria-label="..."])` | No JSON key for aria-label targeting |
| `& svg { fill: currentColor }` | No JSON key for SVG fill |
| `:focus-visible` on buttons | Not a supported pseudo-state key; use `elements.button.css` |
