---
agent: "ask"
---

# Audit Theme Styling

Adopt `.agents/agents/wordpress-theme-styling-auditor.agent.md` for this session.

Audit this WordPress block theme's styling system and propose the cleanest maintainable fixes before making any edits.

## Scope

Review the relevant styling layers together:

- `src/scss/**/*.scss`
- `assets/css/*.css`
- `theme.json`
- `styles/**/*.json`
- `styles/presets/**/*.json`
- any related template, pattern, or part files when they affect styling contracts

## Workflow requirements

1. Read `AGENTS.md`, `.github/instructions/styling.instructions.md`, `.github/instructions/theme-json.instructions.md`, and `.github/instructions/design-token-policy.instructions.md` first.
2. Treat `src/scss/` as the authored source layer and `assets/css/` as compiled runtime output.
3. Identify duplicated styling contracts across Sass, compiled CSS, and raw `css` strings in style JSON.
4. Check selector depth, specificity, breakpoint reuse, logical-property opportunities, motion performance, and reduced-motion coverage.
5. Check whether repeated values belong in Sass helpers, existing WordPress tokens, or existing JSON config instead of new abstractions.
6. Flag mixin, map, variable, or token opportunities only when they remove verified duplication or clarify a stable rule.
7. Do not propose Gulp, Grunt, CodeKit, PurgeCSS, framework adoption, or alternate pipelines unless the user explicitly asks to change the toolchain.
8. Stop after the audit and proposed fix plan.
9. Ask exactly: `Approve this plan and proceed with implementation?`

## Output before approval

Provide:

- findings ordered by severity
- root cause and impact for each finding
- proposed fix plan grouped by file or styling layer
- recommended mixins, variables, token changes, or selector cleanups
- low-confidence items or trade-offs

Do not edit files until approval is given.
