---
name: wp-block-style-audit
description: "Audit a WordPress block style JSON file (styles/*.json) and migrate CSS selector soup into proper theme.json-style JSON properties — elements, blocks, pseudo-states — leaving only CSS that has no JSON equivalent."
compatibility: "Targets WordPress 6.9+ (theme.json v3). Requires access to the theme's theme.json for preset token names."
---

# WP Block Style JSON Audit

## When to use

Use this skill when a block style JSON file under `styles/` has a large `css` string doing work that belongs in structured JSON:

- Block-root colours/backgrounds set via `.wp-block-*` selectors instead of `blocks["block/name"].color`
- Descendant element colours (e.g. `.wp-block-button__link`, bare `a`) set via CSS instead of `elements.button`, `elements.link`, etc.
- Nested block styles (link colours on excerpt, terms, paragraph) done via `:where()` CSS instead of `blocks["core/post-excerpt"].elements.link`
- Third-party block colours (outermost/icon-block, etc.) done via CSS instead of `blocks["vendor/block"].color.text`
- Redundant CSS that duplicates what parent `elements` JSON already covers

## Inputs required

- Path to the block style JSON file to audit.
- Path to the theme's `theme.json` (to verify preset token names).
- Any sibling block style files that serve as reference patterns.

## Procedure

### 1) Read the file and catalogue every CSS rule

Parse the `css` string into individual selector groups. For each, note:
- What element or block it targets (the `.wp-block-*` class or aria selector)
- What CSS properties it sets
- Whether it involves a pseudo-state (`:hover`, `:focus-visible`, `:active`)
- Whether it depends on a parent-context trigger (e.g., `&:hover .child`)

Read:
- `references/block-style-json-anatomy.md`

### 2) Check sibling files for established patterns

Look at other files in the same `styles/` directory. Prefer patterns already in use over inventing new structure.

For example in the theme, `styles/sections/cards/card-link-row.json` is the canonical reference for card-style blocks.

### 3) For each CSS rule, decide: JSON or keep?

**Move to JSON if the property has a theme.json equivalent:**

| CSS rule | JSON destination |
|---|---|
| `& .wp-block-button__link { background-color }` | `elements.button.color.background` |
| `& .wp-block-button__link { color }` | `elements.button.color.text` |
| `& .wp-block-button__link:hover { ... }` | `elements.button[":hover"].color` |
| `& .wp-block-post-excerpt__excerpt a { color }` | `blocks["core/post-excerpt"].elements.link.color.text` |
| `& .wp-block-post-excerpt__excerpt a:hover { color }` | `blocks["core/post-excerpt"].elements.link[":hover"].color.text` |
| `& .wp-block-post-terms a { color }` | `blocks["core/post-terms"].elements.link.color.text` |
| `& p a { color }` | `blocks["core/paragraph"].elements.link.color.text` |
| `& .wp-block-outermost-icon-block .icon-container { color }` | `blocks["outermost/icon-block"].color.text` |
| Heading colors | `elements.heading.color.text` |
| `core/post-title` color, typography | `blocks["core/post-title"].color.text` / `.typography` |

**Keep in `css` if there is no JSON equivalent:**

- Layout: `overflow`, `max-width`, `width`, `aspect-ratio` (unless `dimensions` is supported)
- Transitions: `transition`, `transform`, `animation`
- Pseudo-states on the block itself: `&:hover { box-shadow }` (block-level hover isn't a JSON key)
- Parent-triggered child selectors: `&:hover .wp-block-cover img { transform }` — hover is on the parent, so must stay at root `css` level
- Aria-label selectors: `& :is([aria-label="..."])` — no JSON key maps to aria
- SVG fill: `& svg { fill: currentColor }` — no JSON equivalent
- `:focus-visible` on buttons — not a supported pseudo-state key, put in `elements.button.css`

**Remove entirely if redundant:**

- CSS that re-states a color already set by a parent `elements` JSON key (e.g., `& .wp-block-post-title a { color: contrast }` when `elements.link.color.text` is already `contrast`)

### 4) Check token references use the correct format

- In JSON values: use `var:preset|color|slug` (colon-pipe notation) for preset
  tokens, or `var:custom|path|to|key` for custom tokens
- In `css` strings: use `var(--wp--preset--color--slug)` (double-dash notation)
  for preset tokens, or `var(--wp--custom--path--to--key)` for custom tokens

Verify every preset token slug exists in its matching category-specific
`theme.json` collection (e.g. `settings.color.palette`,
`settings.typography.fontSizes`, `settings.spacing.spacingSizes`), and every
custom token path exists in `theme.json` `settings.custom`, before using it.

### 5) Split the remaining `css` by owner

Do **not** leave one monolithic `css` string. Distribute remaining CSS to the nearest owner:

- Root card behavior → `styles.css`
- Button-specific CSS → `styles.elements.button.css`
- Block-specific CSS → `styles.blocks["vendor/block"].css`

### 6) Write the refactored file

- Preserve all top-level metadata: `$schema`, `version`, `title`, `slug`, `blockTypes`, `description`
- Order within `styles`: `border`, `color`, `shadow`, `spacing`, `css` (if any), `elements`, `blocks`
- Order within `elements`: `heading`, `link`, `button`, `separator` (alphabetical within each group)
- Order within `blocks`: core blocks first (alphabetical by block name), then third-party blocks alphabetical

## Verification

After editing:

1. Validate JSON syntax (no trailing commas, balanced braces).
2. Open the block in the Site Editor — confirm the style appears and applies.
3. Hover the block — confirm hover transitions fire.
4. Check buttons: normal state, hover, and focus-visible outline.
5. Confirm link colors in excerpt, terms, and paragraph areas match before/after.
6. Confirm icon block color matches.

## Failure modes

- **Token slug not found**: CSS var resolves to empty. Verify slug against `theme.json` `settings.color.palette`.
- **`blocks` key not applying**: Confirm WordPress version supports per-block scoping in block style JSON (requires WP 6.6+).
- **`:hover` on `elements.button` not generating output**: Confirm the block style file targets a block type that supports button elements.
- **Parent hover not working after moving image CSS to `blocks["core/cover"]`**: Image overflow + hover zoom selectors depend on the parent card's `:hover` trigger and **must stay in root `styles.css`**, not in the cover block's own `css`.

## Escalation

- Theme.json schema reference: <https://developer.wordpress.org/block-editor/reference-guides/theme-json-reference/>
- Block style API: <https://developer.wordpress.org/block-editor/reference-guides/block-api/block-styles/>
- Full Site Editing lessons: <https://fullsiteediting.com/lessons/custom-block-styles/>
