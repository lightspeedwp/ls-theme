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
5. Route motion deliberately:
   - selector-driven hover, focus-visible, active, and keyframe work -> `assets/css/animations.css`
   - JS-managed or pointer-tracked effects -> `assets/css/gsap-animations.css`, `assets/js/gsap-effects.js`, and `inc/gsap.php` when registration is required
6. Keep the base visual contract in style JSON where practical, and keep the interaction layer in CSS or JS.
7. Stop after the proposal report and ask for explicit approval before writing files.

## Output Before Approval

Provide:

- Pattern file path and slug
- Reuse opportunities
- New block and section styles
- Motion routing decision
- Semantic tokens to reuse or add
- Icons to stage
- Open questions or assumptions

Then ask: `Approve this plan and proceed with implementation?`
