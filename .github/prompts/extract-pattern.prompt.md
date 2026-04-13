---
mode: "ask"
---

# Extract Pattern From Figma

Use `.agents/skills/pattern-extractor/SKILL.md` to convert a Figma design into a production-ready `ls-theme` block pattern.

## Provide Before Generating

- **Figma node URL or ID**
- **Pattern name**
- **Pattern slug**
- **Category**
- **Description**
- **Optional constraints** such as `MVP`, `no new tokens`, `CSS only`, `no new icons`, or `no new GSAP`

## Workflow Requirements

1. Load the theme context from `theme.json`, `styles/dark.json`, `styles/presets/**/*.json`, `patterns/*.php`, `styles/blocks/**/*.json`, `styles/sections/**/*.json`, `assets/css/animations.css`, `assets/css/gsap-animations.css`, `assets/js/gsap-effects.js`, `inc/animations.php`, and `inc/gsap.php`.
2. Map authored UI colours to semantic custom colour tokens only.
3. If a required semantic colour token does not exist, add the same token path to `theme.json` and `styles/dark.json` before using it.
4. Prefer existing pattern, block-style, section-style, and motion contracts before creating new ones.
5. Store patterns in family subfolders under `patterns/`, for example `patterns/cards/feature-card.php`.
6. Use border-radius presets only. Do not hardcode radius values.
7. Prefer native block defaults, such as using a plain `core/heading` H3, before proposing a new heading block style.
8. When muted body text is needed, prefer a general semantic token such as `text.muted` rather than a card-specific token.
9. If the component is a hoverable card, make the whole card the hover and focus-visible target.
10. Detect icons in the design, match each one to the closest Phosphor Icons glyph from https://phosphoricons.com/, and model card icons as a nested Group with an Icon Block populated with that Phosphor icon.
11. Leave the Icon Block empty only when the user plans to replace the icon later or when no confident Phosphor match exists and a fallback still needs approval.
12. If a hover shadow is intended for reuse across multiple cards, create it as a reusable custom shadow token rather than hardcoding it.
13. Route motion deliberately:

- selector-driven hover, focus-visible, active, and keyframe work -> `assets/css/animations.css`
- JS-managed or pointer-tracked effects -> `assets/css/gsap-animations.css`, `assets/js/gsap-effects.js`, and `inc/gsap.php` when registration is required

14. Keep the base visual contract in style JSON where practical, and keep the interaction layer in CSS or JS.
15. Default single-card patterns to insertable from the editor unless the user says otherwise.
16. Stop after the proposal report and ask for explicit approval before writing files.

## Output Before Approval

Provide:

- Pattern file path and slug
- Reuse opportunities
- New block and section styles
- Motion routing decision
- Semantic tokens to reuse or add
- Icon wrapper, chosen Phosphor icon matches, and any fallback approvals needed
- Open questions or assumptions

Then ask: `Approve this plan and proceed with implementation?`
