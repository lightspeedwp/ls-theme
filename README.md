# LightSpeed Theme — WordPress Block Theme

LightSpeed Theme is a custom WordPress block theme built by [LightSpeed](https://lightspeedwp.agency/) for fast, accessible, and maintainable websites using the WordPress Site Editor and block editor.

---

## What This Repo Is

This is the **LightSpeed Theme** repository — a production WordPress block theme for client and commercial projects.

It includes:

- A working WordPress block theme
- A Sass source layer for authored effect CSS
- Validation and linting tooling
- AI guidance files and GitHub Copilot instructions
- Structured folders for prompts, reports, tasks, docs, and AI agents

> **Note:** This theme is not specifically packaged for WordPress.org submission. It is designed for client and commercial block theme development.

---

## Who It Is For

- WordPress theme developers at LightSpeed
- Developers maintaining or extending this theme
- AI agents building or maintaining block themes in this repo

---

## What It Includes

| Area             | Details                                                     |
| ---------------- | ----------------------------------------------------------- |
| Theme files      | `style.css`, `theme.json`, `functions.php`, `readme.txt`    |
| Templates        | `templates/index.html`                                      |
| Parts            | `parts/header.html`, `parts/footer.html`                    |
| Style variations | `styles/light.json`, `styles/dark.json`                     |
| Assets           | `assets/fonts/`, `assets/css/`, `assets/js/`, etc.          |
| PHP includes     | `inc/` (empty, ready for use)                               |
| Patterns         | `patterns/` (empty, ready for use)                          |
| Validation       | `theme-utils.mjs`, `package.json`, `composer.json`          |
| AI guidance      | `AGENTS.md`, `CLAUDE.md`, `.github/copilot-instructions.md` |
| Copilot prompts  | `.github/prompts/`                                          |
| Reports          | `.github/reports/`                                          |
| Tasks            | `.github/tasks/`                                            |
| Docs             | `docs/`                                                     |
| Agent assets     | `.agents/skills/`, `.agents/agents/`                        |
| CI workflows     | `.github/workflows/`                                        |

---

## Requirements

- **PHP** 8.1+
- **WordPress** 6.9+
- **Node.js** (see `.nvmrc` for version)
- **Composer** 2.x

---

## Quick Start

```bash
# 1. Clone the repo

# 2. Install Node dependencies
npm install

# 3. Install Composer dependencies
composer install

# 4. Validate the theme
npm run theme:validate

# 5. Compile authored CSS
npm run build:css

# 6. Validate JSON schema
npm run schema:validate
```

---

## Repo Map

```
/
├── AGENTS.md                  # AI and developer guidance
├── CLAUDE.md                  # Points to AGENTS.md
├── CHANGELOG.md               # Keep a Changelog / SemVer
├── README.md                  # This file
├── readme.txt                 # Light distribution placeholder
├── style.css                  # Block theme header
├── theme.json                 # Primary theme settings
├── functions.php              # Minimal PHP
├── screenshot.png             # Create manually
├── CODEOWNERS
├── theme-utils.mjs            # Validation and utilities
├── package.json
├── composer.json
├── .editorconfig
├── .gitignore
├── .gitattributes
├── .nvmrc
├── .coderabbit.yml
├── .lintstagedrc.json
├── assets/
│   ├── fonts/
│   ├── icons/
│   ├── logos/
│   ├── images/
│   ├── css/
│   └── js/
├── src/
│   └── scss/                # Sass source for authored theme CSS
├── docs/                      # End-user documentation
├── inc/                       # PHP includes
├── parts/
│   ├── header.html
│   └── footer.html
├── patterns/
├── styles/
│   ├── blocks/
│   ├── sections/
│   ├── light.json
│   └── dark.json
├── templates/
│   └── index.html
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

## Available Commands

### Node

| Command                    | Description                                                   |
| -------------------------- | ------------------------------------------------------------- |
| `npm run schema:validate`  | Validate theme.json and styles JSON schemas                   |
| `npm run theme:validate`   | Validate theme consistency                                    |
| `npm run build:css`        | Compile Sass source to `assets/css/`                          |
| `npm run watch:css`        | Watch Sass entry files and rebuild CSS                        |
| `npm run patterns:escape`  | Check PHP patterns for escaping issues                        |
| `npm run security:scan`    | Scan PHP files for security issues                            |
| `npm run lint`             | Run all linting                                               |
| `npm run lint:json`        | Lint JSON files                                               |

### Composer

| Command                 | Description                 |
| ----------------------- | --------------------------- |
| `composer run phpcs`    | PHP code sniffer            |
| `composer run phpcbf`   | Fix auto-fixable PHP issues |
| `composer run lint:php` | Lint PHP syntax             |

---

## What to Edit

1. `theme.json` — set your colour palette and typography
2. `functions.php` — add any theme supports you need
3. `parts/header.html` — build your header
4. `parts/footer.html` — build your footer
5. `templates/index.html` — build your main template
6. `CHANGELOG.md` — track your changes
7. `CODEOWNERS` — set your team as owners

---

## AI Prompts, Reports, Tasks, Docs, Skills, and Agents

| What                   | Where              |
| ---------------------- | ------------------ |
| Copilot prompts        | `.github/prompts/` |
| Developer reports      | `.github/reports/` |
| Task lists             | `.github/tasks/`   |
| End-user documentation | `docs/`            |
| Portable AI skills     | `.agents/skills/`  |
| Agent personas         | `.agents/agents/`  |

See `AGENTS.md` for full guidance on AI workflow conventions.

---

## Testing (Playwright)

Requires a `.env` file in the theme root (gitignored) with at least:

```
BASE_URL=<the site to test against>
```

First-time setup also needs Playwright's browser binaries (not installed by `npm install` alone):

```bash
npx playwright install
```

| Command | Runs |
| --- | --- |
| `npx playwright test` | Everything (feature specs + standing suite) |
| `npx playwright test tests/specs/standing` | Only the standing regression suite |
| `npx playwright test tests/specs/header-search.spec.ts` | A single feature spec |

**Feature specs** (`header-search.spec.ts`, `navigation.spec.ts`, `keyboard-navigation.spec.ts`, `reduced-motion.spec.ts`) test reusable, site-wide components and behaviors — not one specific page/template — and use the generic assertion helpers in `tests/helpers/assertions.ts` where applicable.

**Standing suite** (`tests/specs/standing/`) is content-agnostic — it discovers every reachable page on `BASE_URL` (via sitemap, REST, or crawl fallback) and runs a fixed set of checks against all of them: page health/PHP errors, console/runtime errors, broken same-origin resources, accessibility (axe), internal link integrity, horizontal overflow at common widths, image alt attributes, and the search/404 routes. It requires no per-template setup — new pages are covered automatically.

- The number of URLs actually tested is currently throttled by `MAX_TEST_URLS` in `tests/fixtures/site.ts` while the suite is being verified — raise this before relying on it for full site coverage.
- Failures in the standing suite are automatically logged as BugHerd tasks (deduplicated, so re-running doesn't create duplicates). This requires `BUGHERD_API_KEY` and `BUGHERD_PROJECT_ID` in `.env`. Feature specs never create BugHerd tasks.
- Each created task is attributed to whoever ran the suite, via your local `git config user.email` — so your name/email will show up as the reporter on any task your run creates.
- No CI wiring — run manually, after `develop` has been merged and the target site has redeployed.

---

## License

See [LICENSE](./LICENSE).
