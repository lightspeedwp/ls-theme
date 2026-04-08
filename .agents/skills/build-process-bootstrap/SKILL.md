# SKILL: Build Process Bootstrap From Scaffold

**Version:** 1.0.0
**Scope:** WordPress block theme repositories

---

## Purpose

Bootstrap or upgrade a theme build process by copying non-installed build configuration files from a known scaffold theme into a target theme, then replacing project identity values.

This skill is for:
- copying manifest and config files (for example `package.json`, `composer.json`, lint/test/build config)
- aligning scripts and tooling between scaffold and target
- replacing scaffold placeholders and names with target theme values

This skill is not for:
- copying installed dependency folders (`node_modules`, `vendor`)
- copying image assets or image URLs
- replacing business logic files unless explicitly requested

---

## Inputs

| Input | Description |
|---|---|
| `scaffold_root` | Source scaffold theme path |
| `target_root` | Target theme path |
| `target_theme_name` | Human-readable theme name |
| `target_slug` | Theme slug and text domain |
| `target_repo` | GitHub repository in `owner/repo` form |
| `target_homepage` | Theme or company homepage URL |

Optional inputs:
- `copy_level`: `minimal`, `standard`, or `full-quality`
- `include_ci`: whether CI/testing files should be included
- `include_wp_env`: whether local `wp-env` config should be included

---

## Steps

### 1. Inventory Build Files

Compare top-level files in source and target and classify them:
- Core manifests: `package.json`, `package-lock.json`, `composer.json`, `composer.lock`
- Build config: `webpack.config.js`, `.babelrc.json`, `.browserslistrc`, `.postcss.config.cjs`
- Quality config: `.eslint*`, `.prettier*`, `.stylelint*`, `phpcs.xml`, `phpunit.xml`, `jest.config.js`
- Dev environment: `.nvmrc`, `.npmrc`, `.wp-env.json`, `.husky/`

Ignore:
- `node_modules/`, `vendor/`, generated output folders
- image files and image URL references

### 2. Build Copy Plan

Create a copy plan grouped by profile:

- `minimal`: manifests and runtime build config only
- `standard`: minimal + linting + formatting + PHPCS
- `full-quality`: standard + tests + optional local dev env

### 3. Copy Files

Copy selected files from scaffold to target with small, explicit diffs.
Do not copy installed dependency folders.

### 4. Apply Identity Replacements

Replace scaffold placeholders and project metadata in copied files:
- package identity: `name`, `description`, `homepage`, `repository.url`, `bugs.url`
- i18n: POT path, slug, text domain
- theme metadata blocks (if present)
- Composer identity: package name, description, support links, author URL
- PHPCS/PHPUnit placeholder tokens and ruleset names

### 5. Validate Script References

Check that local scripts referenced in manifests exist in target:
- for npm scripts, verify required local files and folders (for example `scripts/`, `tests/`, `src/`)
- either copy missing referenced files or remove/adjust dead scripts

### 6. Validate Toolchain

Run:
- `npm run build` (or `npm run start` for dev)
- `composer run` script checks that exist
- lint/test commands that are part of selected copy level

Report failures with exact file references and fixes.

---

## Output

Produce:
1. A file copy matrix (source -> target)
2. A metadata replacement matrix (old -> new)
3. A validation summary (pass/fail + follow-up items)

Recommended report path:
- `.github/reports/YYYY-MM-DD-build-process-bootstrap.md`

---

## Decision Rule: Skill vs Agent

Use this as a skill when one workflow can complete in a single context.
Use a custom agent only if the process needs multi-phase isolation (for example separate research, implementation, and review personas).

For this repository, default to this skill first.

---

## Safety Notes

- Keep diffs small and targeted.
- Do not remove target-specific scripts without confirmation.
- Preserve target theme slug and text domain consistency.
- Never copy secrets or environment-specific credentials.
