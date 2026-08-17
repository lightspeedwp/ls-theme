---
name: pattern-extractor
description: Convert Figma designs into ls-theme WordPress block patterns with strict semantic token mapping, dark-token parity, reuse-or-create style workflow, Phosphor icon mapping into Icon Block markup, CSS-versus-GSAP motion routing, mandatory use of the theme-color-token-enforcer skill for created patterns or styles, and mandatory use of the wordpress-gsap skill whenever GSAP is required.
---

# Pattern Extractor

## Purpose

Use this skill when importing a Figma design into `patterns/` as a production-ready WordPress block pattern for `ls-theme`.

Whenever this skill creates or updates authored UI files such as pattern PHP, block style JSON, section style JSON, or theme CSS, it must also load and follow the `theme-color-token-enforcer` skill for those files. Treat `theme-color-token-enforcer` as the authoritative rule set for semantic colour token reuse, token creation, dark-mode parity, and contrast validation.

Whenever the JSON-First Gate below determines that a pattern genuinely needs GSAP-powered motion, this skill must also load and follow the `wordpress-gsap` skill. Treat `wordpress-gsap` as the authoritative workflow for WordPress enqueueing, GSAP plugin registration, runtime scoping, and reduced-motion-safe effect architecture. GSAP is never a default choice — it is only used once the gate confirms CSS cannot do the job.

Patterns should be grouped into taxonomy subfolders rather than stored flat at the top level. For example, a single featured card pattern should live at `patterns/cards/feature-card.php`.

This skill is approval-gated:

1. Analyse the design and propose what to reuse or create.
2. Wait for user approval.
3. Implement the pattern, styles, motion assets, and token updates.

Do not skip the proposal gate.

## Theme Scope

Always read and use these files before proposing or writing anything:

- `AGENTS.md`
- `.github/instructions/design-token-policy.instructions.md`
- `.github/instructions/patterns.instructions.md`
- `.github/instructions/theme-json.instructions.md`
- `.github/instructions/php.instructions.md`
- `theme.json`
- `styles/dark.json`
- `inc/presets.php`
- `styles/presets/**/*.json`
- `patterns/*.php`
- `styles/blocks/**/*.json`
- `styles/sections/**/*.json`
- `assets/css/animations.css`
- `assets/css/gsap-animations.css`
- `assets/js/gsap-effects.js`
- `inc/animations.php`
- `inc/gsap.php`

If the design includes interaction-heavy motion, also read:

- `.github/reports/spotlight-card-gsap-implementation.md`

## Token Sources

Do not assume everything lives in `theme.json`.

Build registries from the real theme sources:

- Fixed palette and semantic colour tokens from `theme.json`
- Dark-mode semantic token mirror from `styles/dark.json`
- Spacing tokens from `styles/presets/spacing.json`
- Typography, font families, font sizes, and line-height tokens from `styles/presets/typography.json`
- Radius presets from `styles/presets/radii.json`
- Shadow presets and custom shadow tokens from `styles/presets/shadows.json` and `theme.json`
- Layout tokens from `styles/presets/layout.json`
- Shared button and link contracts from `styles/presets/buttons.json`, `styles/presets/links.json`, and `styles/presets/blocks/core-button.json`

External design-system token names are not the source of truth. Map them into the theme's existing token model.

## Required Colour Rules

- Authored UI must use semantic custom colour tokens such as `var(--wp--custom--color--text--default)`.
- Do not use direct preset-colour references in authored patterns, style JSON, or theme CSS unless the file is defining the semantic token itself.
- If a required semantic colour token does not exist, add the exact same token path to `theme.json` and `styles/dark.json` before using it.
- Semantic token values must point only to preset colours.
- Do not import raw visual colours from the source design system into authored UI.

## Inputs

- Figma node URL or node ID
- Optional preferred pattern slug and title
- Optional constraints from the user, such as `MVP`, `no new tokens`, `CSS only`, `no new icons`, or `no new GSAP`

## Core Block Reference

Use the WordPress Core Blocks reference as the canonical block inventory:

- https://developer.wordpress.org/block-editor/reference-guides/core-blocks/

Prefer semantic core blocks over generic layout blocks whenever one exists.

## Mandatory Workflow

### Phase 1 — Context Loading

1. Read `theme.json`, `styles/dark.json`, and `styles/presets/**/*.json` and build token registries.
2. Read `inc/presets.php` to understand how preset slices are merged into the live theme data.
3. Read 2 to 4 existing pattern files in `patterns/` and its relevant subfolders.
4. Scan `styles/blocks/**/*.json` and `styles/sections/**/*.json` for reusable styles.
5. Read `assets/css/animations.css`, `assets/css/gsap-animations.css`, `assets/js/gsap-effects.js`, `inc/animations.php`, and `inc/gsap.php` to understand the current motion contracts.
6. Read the Figma node with `mcp_figma_dev-mod_get_design_context`.
7. If the node structure is unclear, use `mcp_figma_dev-mod_get_metadata` or `mcp_figma_dev-mod_get_variable_defs` for supporting context.

### Phase 2 — Pattern Variable Identification

Identify all design values used by the pattern, including:

- Background, text, border, icon, overlay, focus, and effect colours
- Spacing, including padding, margin, gap, and blockGap
- Typography, including font family, size, weight, line-height, and letter-spacing
- Border width, style, and radius
- Shadows
- Layout values, including alignment, content width, columns, and media ratios
- Interaction states, including hover, focus-visible, and active states
- Motion values, including duration, easing, opacity, transforms, and any runtime-driven behaviours

Map every value to the closest existing theme token.

Mapping rules:

1. Reuse an existing semantic colour token whenever it fits the role.
2. Reuse preset-based non-colour tokens from `styles/presets/**/*.json` wherever possible.
3. If no semantic colour token fits, propose a new semantic token path and add it to both `theme.json` and `styles/dark.json` during implementation.
4. Never invent preset slugs that do not exist.
5. Never carry external design-system token names into the final theme unless the user explicitly asks for a migration of the theme token model itself.

Record state deltas explicitly:

- base -> hover
- base -> focus-visible
- base -> active

### Phase 2.5a — JSON-First Gate (mandatory, before any Sass/CSS/GSAP/is-style work)

For every visual property identified in Phase 2, check in this order before writing
any authored CSS:

1. Does an existing `styles/**/*.json` partial already cover this? Check sibling
   files in the same subfolder first — reuse before creating.
2. Can it be expressed as a new block-style/section-style JSON partial using
   `elements.*`, `blocks.*`, pseudo-state keys, or block attributes? Use
   `.agents/skills/wp-block-style-audit/references/block-style-json-anatomy.md` as
   the JSON-vs-CSS decision table.
3. Only if neither applies, and the property has no JSON equivalent (transitions,
   transform, `content:""`, aria-selectors, SVG fill, comma-separated selectors), is
   authored Sass/CSS permitted — and it must carry a comment naming the specific
   limitation, per `AGENTS.md` Theme-First Approach.
4. Do not register a new is-style variant for a single-use, one-off treatment with
   no second option ever offered. If it's used in exactly one place, style it inline
   on the pattern's block attributes instead of registering a global style-picker
   entry.
5. GSAP is permitted only for JS-driven interaction that CSS transition/animation
   structurally cannot achieve (e.g. scroll-triggered sequencing, cursor-tracked
   spotlight effects) — not as a default for "this pattern has motion."

### Phase 2.5 — Context-Aware Block Selection

Infer the correct WordPress core block from design intent before writing markup.

Examples:

- Site branding -> `core/site-logo`, `core/site-title`, `core/site-tagline`
- Navigation intent -> `core/navigation`
- CTA controls -> `core/buttons` and `core/button`
- Post-aware cards or listings -> `core/query`, `core/post-template`, `core/post-title`, `core/post-excerpt`, `core/post-featured-image`, and related post blocks
- Generic content sections -> `core/group`, `core/columns`, `core/heading`, `core/paragraph`, `core/image`, `core/cover`

Selection rules:

1. Prefer the most semantic core block available.
2. Use generic layout blocks only when no better semantic block fits.
3. If a fallback is necessary, document it in the proposal.
4. Keep block choices consistent with existing `ls-theme` patterns where the intent matches.

For each mapped design element, assign a confidence score:

- `high` for an exact semantic match
- `medium` for a close match with a minor compromise
- `low` for a generic fallback

### Phase 3 — Reuse Discovery

Before creating anything, determine what can be reused.

1. Pattern reuse:
   - Search `patterns/*.php` for similar section structures, motifs, and content layouts.
2. Block style reuse:
   - Search `styles/blocks/**/*.json` for a matching block-style variation.
3. Section style reuse:
   - Search `styles/sections/**/*.json` for a matching section shell or visual contract.
4. Motion reuse:
   - Search `assets/css/animations.css` for reusable selector-driven motion.
   - Search `assets/css/gsap-animations.css`, `assets/js/gsap-effects.js`, and `inc/gsap.php` for reusable GSAP effects and registered block-style classes.
5. Token reuse:
   - Reuse existing semantic custom colour tokens before creating new ones.

### Phase 4 — Motion Routing Decision

Every interactive pattern must classify its motion as either CSS-only or GSAP-powered.

Use CSS-only motion when the interaction is selector-driven and does not need runtime state, for example:

- hover, focus-visible, and active transitions
- underline draws, glow blooms, fades, scale shifts, and icon slides
- keyframe loops that can be expressed safely in CSS

If the component is a hoverable card, prefer making the whole card the hover and focus-visible target rather than applying the state only to an inner CTA.

CSS-only output goes in:

- `assets/css/animations.css`
- supporting `styles/blocks/**/*.json` or `styles/sections/**/*.json` files for base tokens and variation defaults

Use GSAP when the interaction needs JavaScript-managed state, for example:

- pointer tracking
- DOM augmentation or effect canvases
- coordinated timelines across multiple elements
- runtime interpolation of CSS custom properties based on user input or viewport state

GSAP output goes in:

- `assets/css/gsap-animations.css`
- `assets/js/gsap-effects.js`
- `inc/gsap.php` when a new registered block style or asset wiring is required
- supporting `styles/blocks/**/*.json` or `styles/sections/**/*.json` files for the base visual contract

Whenever GSAP is chosen, load and follow `wordpress-gsap` before the proposal is finalised or any GSAP files are edited.

Motion guardrails:

- Prefer CSS unless GSAP is clearly required.
- Honour `prefers-reduced-motion` in both CSS and JS.
- Keep base visual styles in JSON where practical, and keep the motion layer in CSS or JS.
- Keep UI-state transition timing close to the existing theme language unless the user asks otherwise. Default to the theme's current micro-interaction range rather than inventing a new one.

### Phase 5 — Style Creation Rules

If no suitable style exists, create the narrowest reusable artefacts needed.

For any new or updated pattern or style artefact created in this phase, follow `theme-color-token-enforcer` in `apply` mode across the authored UI files being changed before considering the implementation complete.

1. Block style JSON:
   - Path: `styles/blocks/<block-family>/<style-slug>.json`
2. Section style JSON:
   - Path: `styles/sections/<subfolder>/<style-slug>.json`
3. CSS-only motion layer:
   - Path: `assets/css/animations.css`
4. GSAP motion layer:
   - Paths: `assets/css/gsap-animations.css` and `assets/js/gsap-effects.js`
5. GSAP registration:
   - Update `inc/gsap.php` if the effect needs a registered block style for editor discoverability or standardised class usage.

For GSAP-powered work in items 4 and 5, follow `wordpress-gsap` before implementation is considered complete.

Style constraints:

- Use semantic colour tokens only in authored UI.
- Use preset or custom non-colour tokens from the merged theme token model.
- Radius values must always resolve through an existing border-radius preset. Do not hardcode radius values in pattern markup, style JSON, or CSS.
- Avoid inline presentational styles in pattern markup when a reusable style file is appropriate.
- Keep style intent narrow and reusable.
- Treat `styles/sections/**/*.json` as organisational artefacts unless runtime registration is also accounted for.
- Prefer existing core block defaults and existing styles before creating new styles. Do not create a new heading block style when a native heading block at the correct level already satisfies the design intent.
- If a hover shadow is likely to be reused across multiple cards, create it as a reusable custom shadow token rather than hardcoding the hover shadow in CSS.

### Phase 6 — Icon Discovery And Phosphor Mapping

1. Detect icon usage from the Figma design.
2. Match each detected icon to the closest Phosphor Icons glyph from https://phosphoricons.com/ using both visual silhouette and semantic intent from the surrounding content.
3. Prefer a high-confidence Phosphor match over exporting a bespoke SVG from Figma.
4. When a card uses an icon holder, model it as a nested `core/group` shell containing an Icon Block populated with the chosen Phosphor icon.
5. Leave the Icon Block empty only when:
   - the user explicitly wants to replace the icon later
   - there is no confident Phosphor match and the user has not approved a fallback
6. Treat icon matching as part of the proposal:
   - report the chosen Phosphor icon name for each detected icon
   - flag any low-confidence matches for confirmation before implementation
7. Use `assets/icons/` only as an explicit fallback path when no suitable Phosphor icon exists and the user approves shipping a bespoke SVG.

### Phase 7 — Proposal Report

Return a structured plan and stop for approval.

The report must include:

1. Pattern file to create and final slug or title
2. Existing patterns to reference or reuse
3. Existing block styles to reuse
4. Existing section styles to reuse
5. New block styles to create
6. New section styles to create
7. Motion routing decision for each interactive element
8. CSS-only files to update
9. GSAP files to update, plus any required handles or GSAP plugins
10. Semantic colour tokens to reuse
11. Semantic colour tokens to add, with matching `theme.json` and `styles/dark.json` paths
12. Non-colour preset mappings used
13. Phosphor icon matches, confidence, and any fallback icons still needing approval
14. Context-aware block map with confidence scores
15. Assumptions or ambiguities that need confirmation

After the report, ask for explicit approval. Do not write files before approval.

### Phase 8 — Implementation After Approval

After the user confirms:

1. Add any required semantic colour token paths to both `theme.json` and `styles/dark.json` first.
2. If a general-purpose muted text colour is required, prefer a broad semantic token such as `text.muted` or `text.subtle` rather than a card-specific token name.
3. Create or update block and section style JSON files.
4. Add CSS-only motion rules to `assets/css/animations.css` when applicable.
5. Add GSAP CSS and JS to `assets/css/gsap-animations.css` and `assets/js/gsap-effects.js` only when the approved plan requires it.
6. Create the pattern file in `patterns/<subfolder>/<pattern-slug>.php`.
7. Run the `theme-color-token-enforcer` skill against every created or updated pattern and style file so authored UI uses only approved semantic custom colour tokens and any required token additions are mirrored in `theme.json` and `styles/dark.json`.
8. Update `inc/gsap.php` when a new registered GSAP block style is part of the plan.
9. Populate Icon Blocks with the approved Phosphor icons, and use `assets/icons/` only for approved bespoke fallbacks.
10. Optionally save a Code Connect mapping with `mcp_figma_dev-mod_send_code_connect_mappings` when the user wants the Figma-to-code link recorded.

## Pattern Authoring Standards

### Metadata

Pattern files should include the maximum useful header metadata unless the user says otherwise:

- `Title`
- `Slug`
- `Description`
- `Categories`
- `Keywords`
- `Block Types` when relevant
- `Post Types` when relevant
- `Viewport Width`
- `Inserter: yes` by default

Single-card patterns should remain insertable from the editor unless the user explicitly says otherwise.

### Pattern Markup

- Use WordPress block markup rather than raw HTML.
- Use semantic `tagName` attributes where appropriate.
- Use the correct heading hierarchy for the pattern context.
- Keep the pattern self-contained.
- Do not hard-code URLs when a WordPress function should provide them.
- Group patterns into subfolders by family, such as `patterns/cards/`, `patterns/hero/`, or `patterns/content/`.
- Prefer a native `core/heading` block at the correct level before introducing a dedicated heading block style.
- When a card includes an icon tile, use a nested `core/group` wrapper with an Icon Block inside it, populated with the approved Phosphor icon unless the user has approved an empty or bespoke fallback state.

### PHP, Escaping, And i18n

- Escape all PHP output.
- Wrap visible strings with `esc_html__()`, `esc_attr__()`, or another context-appropriate translation helper using the `ls-theme` text domain.

### Variable Format Rules

- Use semantic custom colour tokens in authored UI: `var(--wp--custom--color--...)`
- Use preset syntax for non-colour values in block attributes when appropriate: `var:preset|type|slug`
- Use CSS custom properties for preset values in CSS when appropriate: `var(--wp--preset--type--slug)`
- Use the border-radius namespace `--wp--preset--border-radius--<slug>` when referencing radius values in CSS
- Do not mix preset syntax and CSS variable syntax incorrectly
- Do not hardcode radius values; always map radius to an existing preset slug.

### Interactive State Rules

- Do not leave hover, focus-visible, or active states implicit when the design specifies them.
- Ensure keyboard parity for meaningful hover affordances.
- Keep motion contracts token-led and reusable.
- Prefer explicit selectors in CSS over unverified pseudo-state JSON shapes when runtime support is unclear.
- If a card is designed to respond as a single interactive surface, ensure the whole card owns the hover and focus-visible state.
- If a CTA arrow extends or shifts on hover, apply that motion as part of the card's shared hover contract, not as an isolated CTA-only state.

## Validation Checklist

- Pattern file is created in the correct `patterns/<subfolder>/` location
- Pattern slug and filename align
- Pattern markup is valid WordPress block markup
- All PHP output is escaped and all visible strings use the `ls-theme` text domain
- `theme-color-token-enforcer` has been followed for every created or updated pattern or style file
- All semantic custom colour tokens used in authored UI exist in both `theme.json` and `styles/dark.json`
- No direct preset-colour references remain in authored UI files outside token-definition areas
- Non-colour values map to the theme's merged preset model
- Existing styles and motion contracts are reused where possible
- New styles are created only when necessary
- No radius value is hardcoded; radius is mapped to a preset
- CSS-only interactions are placed in `assets/css/animations.css`
- GSAP interactions are placed in `assets/css/gsap-animations.css` and `assets/js/gsap-effects.js`
- `wordpress-gsap` has been followed for any GSAP-powered motion work
- Reduced-motion handling is present for any new motion work
- New GSAP block styles are registered in `inc/gsap.php` when needed
- Icon wrappers use a nested Group plus Icon Block structure, detected icons are matched to Phosphor Icons first, and `assets/icons/` is used only for approved bespoke fallbacks
- Single-card patterns remain insertable from the editor unless explicitly overridden
- Visual output matches the Figma intent without importing foreign design-system token names into the final theme

## Reporting Template

1. **Pattern**: `<title>` -> `patterns/<subfolder>/<slug>.php`
2. **Reuse: Patterns**: `<list>`
3. **Reuse: Block styles**: `<list>`
4. **Reuse: Section styles**: `<list>`
5. **Create: Block styles**: `<path + title + slug + intent>`
6. **Create: Section styles**: `<path + title + slug + intent>`
7. **Motion routing**: `<interactive element -> CSS or GSAP -> files to update>`
8. **Semantic colour tokens**: `<reuse list + new general-purpose paths if required>`
9. **Non-colour token mapping**: `<spacing/typography/radius/shadow/layout summary>`
10. **Icons**: `<group wrapper + icon block handling + chosen Phosphor matches + confidence + any bespoke fallback approvals needed>`
11. **Need confirmation on**: `<open decisions or ambiguities>`

Then ask: `Approve this plan and proceed with implementation?`
