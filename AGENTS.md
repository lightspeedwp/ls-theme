# AGENTS.md

This file provides guidance for AI agents working in this repository.
Human developers should also read this file before contributing.

---

## Repo Purpose

This is the **LightSpeed Theme** WordPress block theme repository (`lightspeedwp/ls-theme`).
It is a production block theme for client and commercial work at [LightSpeed](https://lightspeedwp.agency/).

It is **not** specifically packaged for WordPress.org submission.
Do not add WordPress.org-specific bureaucracy unless there is clear value.

---

## Repo Structure

```
/
├── AGENTS.md                  # This file — AI and developer guidance
├── CLAUDE.md                  # Points to AGENTS.md
├── CHANGELOG.md               # Keep a Changelog / SemVer
├── README.md                  # Root developer README
├── readme.txt                 # Light distribution placeholder
├── style.css                  # Block theme header + minimal CSS
├── theme.json                 # Primary theme settings (theme-first)
├── functions.php              # Minimal PHP
├── screenshot.png             # Create manually
├── CODEOWNERS                 # GitHub code ownership
├── .editorconfig
├── .gitignore
├── .gitattributes
├── .nvmrc
├── .coderabbit.yml
├── .lintstagedrc.json
├── package.json
├── composer.json
├── theme-utils.mjs            # Validation and utility script
├── assets/
│   ├── fonts/                 # Binary font assets (.woff2 etc.)
│   ├── icons/
│   ├── logos/
│   ├── images/
│   ├── css/                   # Compiled or authored CSS
│   └── js/                    # Authored JS
├── docs/                      # End-user documentation
├── inc/                       # Optional PHP include files
├── parts/                     # Block template parts
├── patterns/                  # Block patterns (PHP or HTML)
├── styles/                    # Style variations
│   ├── blocks/
│   ├── sections/
│   ├── light.json
│   └── dark.json
├── templates/                 # Block templates
├── .github/
│   ├── copilot-instructions.md
│   ├── instructions/
│   ├── prompts/
│   ├── reports/
│   ├── tasks/
│   └── workflows/
└── .agents/
    ├── skills/
    └── agents/
```

---

## Theme-First Approach

- `theme.json` and `styles/**/*.json` (block-style and section-style JSON partials)
  are the single source of truth for styling. This includes colour, typography,
  spacing, layout, borders, shadows, and block-level structural properties.
- Author Sass/CSS in `src/scss/**/*.scss` **only** for what a JSON style genuinely
  cannot express: `:hover`/`:focus-within` states not covered by an `elements.*`
  pseudo-state key, `content:""` pseudo-elements, comma-separated selectors, SVG
  `fill`, aria-attribute selectors, or parent-triggered child-selector motion. See
  `.agents/skills/wp-block-style-audit/references/block-style-json-anatomy.md` for
  the authoritative JSON-vs-CSS decision table.
- Before writing any new Sass/CSS rule, check whether a JSON equivalent already
  exists — look at sibling files in `styles/**` for the established pattern first.
- When a CSS rule is genuinely unavoidable, add a comment directly above it naming
  the specific limitation that forced it, e.g.:
  `// JSON limitation: block-level :hover has no theme.json pseudo-state key — see AGENTS.md Theme-First Approach`
- Structural properties — layout (flex/grid), spacing, sizing, positioning — belong
  in JSON or block attributes **always**, never in Sass/CSS, regardless of what
  folder or filename the CSS would otherwise land in (a file named "motion" is not
  exempt).
- Motion/animation files (`src/scss/animations/**`, `src/scss/gsap/**`) may contain
  **only** `@keyframes`, `transition`, `transform`, `animation`, and `will-change`
  rules, plus their `prefers-reduced-motion` companions. Any other property in those
  files is a defect and must be moved to a JSON style partial or removed.
- GSAP is permitted only for JS-driven interaction that CSS transition/animation
  structurally cannot achieve (e.g. scroll-triggered sequencing, cursor-tracked
  effects) — never as a default choice for "this pattern has motion."
- Do not register a new `is-style` variant for a single-use, one-off treatment with
  no second option ever offered. If it's used in exactly one place, style it inline
  on the pattern's block attributes instead of creating a global style-picker entry.
- Prefer `theme.json` over PHP for colours, typography, spacing, and layout.
- Keep `functions.php` minimal. Only register block supports, enqueue assets, or add editor styles there.
- Use `inc/` only for genuine PHP logic that does not belong in `functions.php`.
- Do not invent PHP architecture that `theme.json` can handle.

---

## Slug and Text Domain

This theme uses the following identifiers consistently:

| Key              | Value                                |
|------------------|--------------------------------------|
| Theme name       | `LightSpeed Theme`                   |
| Theme slug       | `ls-theme`                           |
| Text domain      | `ls-theme`                           |
| Theme URI        | `https://lightspeedwp.agency/`       |
| Author           | `LightSpeed`                         |
| Author URI       | `https://lightspeedwp.agency/`       |
| Repo             | `lightspeedwp/ls-theme`              |

Rules:
- Text domain must match the theme slug (`ls-theme`) everywhere.
- Keep the slug consistent in `style.css`, `theme.json`, `composer.json`, and `package.json`.

---

## Accessibility Expectations

- Use semantic HTML in all templates and parts.
- Use correct heading hierarchy. Do not skip heading levels.
- Provide descriptive `alt` text for images.
- Ensure interactive elements are keyboard accessible.
- Follow WCAG 2.1 AA as a baseline.
- Use ARIA attributes only where genuinely needed — do not over-ARIA.
- Do not remove focus styles.

---

## Security Expectations

- **Always escape output** in PHP files. Use `esc_html()`, `esc_attr()`, `esc_url()`, `wp_kses_post()` as appropriate.
- **Sanitise input** before using it. Use `sanitize_text_field()`, `absint()`, or similar.
- **Validate data** before acting on it.
- Never use `echo $_GET[...]` or similar unescaped output.
- Never use `eval()`.
- Avoid direct database queries. If necessary, use `$wpdb->prepare()`.
- Review `patterns/*.php`, `inc/**/*.php`, and `functions.php` with special care.
- Use translation functions correctly: `__()`, `esc_html__()`, `esc_attr__()`.

---

## PHP Minimalism

- Keep `functions.php` as short as sensibly possible.
- Use `inc/` for optional, well-named PHP includes.
- Do not add a plugin-like architecture to the theme.
- Do not add features that belong in plugins.
- Prefer hooks and filters from WordPress core over custom implementations.

---

## Where Assets Belong

| Asset type       | Folder            |
|------------------|-------------------|
| Font files       | `assets/fonts/`   |
| SVG/icon files   | `assets/icons/`   |
| Logo files       | `assets/logos/`   |
| Images           | `assets/images/`  |
| CSS              | `assets/css/`     |
| JavaScript       | `assets/js/`      |

- Font files are binary (`*.woff2`, `*.woff`, etc.). They are **not** JSON.
- Do not validate font files as JSON.
- Do not create schema validation that targets `assets/fonts/`.

---

## Style Variation Guidance

- Style variations live in `styles/`.
- Two style variations are provided: `light.json` and `dark.json`.
- Additional variations can be added as `styles/*.json`.
- `styles/blocks/` and `styles/sections/` files carry the `blockTypes` + `slug`
  schema, which WordPress 6.6+ auto-discovers recursively and registers as live,
  editor-facing style-picker entries. Every file added here is a real, user-visible
  option — do not add one as a one-off hack for a single pattern (see Theme-First
  Approach above).
- Keep variation files small and focused.

---

## Validation and Linting Commands

Run these before committing:

```bash
# Install Node dependencies
npm install

# Validate JSON schema for theme.json and styles
npm run schema:validate

# Validate theme consistency (slugs, required files, etc.)
npm run theme:validate

# Check PHP patterns for escaping issues
npm run patterns:escape

# Run PHP security scan
npm run security:scan

# Run all linting
npm run lint

# Install Composer dependencies
composer install

# Run PHP code sniffer
composer run phpcs

# Fix auto-fixable PHP issues
composer run phpcbf

# Lint PHP syntax
composer run lint:php
```

---

## Changelog Expectations

- Follow [Keep a Changelog](https://keepachangelog.com/en/1.1.0/).
- Follow [Semantic Versioning](https://semver.org/).
- Update `CHANGELOG.md` on every meaningful change.
- Add new entries under `## [Unreleased]`.
- Move entries to a versioned section on release.

---

## Docs Expectations

- `docs/` is for **end-user documentation** — setup guides, editor guides, client-facing notes.
- Developer reports belong in `.github/reports/`, not in `docs/`.
- Keep `docs/` clean and human-readable.

---

## AI Folder Expectations

| Folder                  | Purpose                                      |
|-------------------------|----------------------------------------------|
| `.github/prompts/`      | Reusable GitHub Copilot prompt files         |
| `.github/reports/`      | Developer and AI-generated reports           |
| `.github/tasks/`        | Task lists and AI-maintained work tracking   |
| `.github/instructions/` | Copilot instruction files per file type      |
| `.agents/skills/`       | Portable, reusable AI skills                 |
| `.agents/agents/`       | Agent persona definitions                    |

Key skill: `.agents/skills/wp-block-style-audit/` — the JSON-vs-CSS decision
procedure for migrating CSS-selector-soup into proper theme.json-style JSON
(`elements`, `blocks`, pseudo-states). Read this before authoring or auditing any
`styles/**/*.json` file or `src/scss/**/*.scss` partial.

---

## Rules for AI Agents

1. **Prefer small diffs.** Make minimal, targeted changes. Do not rewrite files that do not need rewriting.
2. **Avoid unnecessary dependencies.** Do not add npm or Composer packages without justification.
3. **Avoid inventing a build pipeline.** This repo does not use Webpack, Vite, or similar unless explicitly added later.
4. **Keep the theme lean.** Do not add features beyond the scope of a block theme.
5. **Escape output correctly.** Every PHP `echo` must use an appropriate escaping function.
6. **Sanitise and validate input.** Do not trust data from `$_GET`, `$_POST`, or similar.
7. **Review pattern PHP carefully.** Patterns with PHP output are a common source of escaping issues.
8. **Keep reports in `.github/reports/`.** Do not write developer reports to the root or to `docs/`.
9. **Keep task lists in `.github/tasks/`.** Update `task-list.md` as tasks are created, in-progress, or completed.
10. **Keep prompt files in `.github/prompts/`.** Do not scatter prompt files across the repo.
11. **Keep portable skills in `.agents/skills/`.** Skills should be self-contained and reusable.
12. **Keep agent personas in `.agents/agents/`.** Agent persona files describe specialist roles.
13. **Do not modify `.github/workflows/` without understanding CI impacts.**
14. **Always update `CHANGELOG.md`** when making meaningful changes.
15. **Keep slug and text domain consistent** — use `ls-theme` as both the theme slug and text domain.
