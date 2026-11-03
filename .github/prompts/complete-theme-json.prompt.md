---
agent: "ask"
---

# Complete Theme JSON

Adopt `.agents/agents/themejson-completer.agent.md` for this session and follow `.agents/skills/themejson-completion/SKILL.md`.

Audit this WordPress block theme and fill out `theme.json` as completely as possible without overwriting existing configuration.

## Workflow requirements

1. Read `theme.json`, `styles/light.json`, `styles/dark.json`, `styles/presets/**/*.json`, and `inc/presets.php` first so you understand the live configuration surface.
2. Detect whether modular preset slices are merged into runtime `theme.json` data and preserve that layout if they are.
3. Inventory the actual blocks used in `templates/**/*.html`, `parts/**/*.html`, `patterns/**/*.php`, and `patterns/**/*.html`.
4. Read relevant `block.json` metadata for those used blocks:
   - custom block metadata in the workspace first
   - core block metadata in `wp-includes/blocks/*/block.json` when needed
5. Compare the theme's live coverage across global `settings`, global `styles`, `settings.blocks`, `styles.blocks`, `styles.elements`, style variations, and modular preset slices.
6. Use the block support declarations, recurring theme usage, and existing tokens or presets to infer missing configuration conservatively.
7. Reuse existing presets and semantic custom colour tokens first. If a new semantic colour token is required, add the exact same path to `theme.json` and `styles/dark.json`.
8. Write all live block-specific runtime config to individual files in `styles/presets/blocks/`, one file per block.
9. Keep shared runtime config in the file that already owns that concern. Do not flatten modular preset slices back into `theme.json`.
10. Never overwrite existing `theme.json` or style JSON. Only add missing or clearly incomplete subkeys.
11. Stop after a plan grouped by file and block.
12. Ask exactly: `Approve this plan and proceed with implementation?`

## Output before approval

Provide:

- storage model detected
- blocks audited
- missing coverage found
- proposed file edits with JSON paths and inferred values
- low-confidence items, conflicts, or things that should not be inferred automatically

## Output after approval

Provide:

- files changed
- key JSON paths added
- validation results
