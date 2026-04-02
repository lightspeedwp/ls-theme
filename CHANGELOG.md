# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

---

## [Unreleased]

### Added

- Added a GSAP asset bootstrap in `inc/gsap.php` for class-based interactive effects.
- Added a GSAP-driven `is-style-card-spotlight` group effect using theme surface and accent colours.
- Added usage documentation for the spotlight card class.
- Added a registered `Card Spotlight` Group block style for easy editor application.
- Added a CSS-only sliding icon treatment for the core outline button variation.

### Changed

- Refined the GSAP spotlight card glow alignment and switched the card shell to a lighter theme palette.
- Simplified the spotlight effect configuration so live tuning happens directly in `assets/css/gsap-animations.css`.
- Moved GSAP-specific spotlight styling from `assets/css/animations.css` to `assets/css/gsap-animations.css`.
- Removed glow hover styling from default and outline buttons so only the dedicated glow button style blooms.
- Renamed the default fill button interaction tokens to a dedicated fill-button namespace and kept the configured fill styling intact.
- Matched the core outline button sizing and typography to the configured fill button proportions.
- Removed the outline border shimmer and kept the core outline button as a solid border with a sliding icon well.
- Added small-screen responsive sizing for the default fill and outline buttons so long labels can wrap cleanly while preserving the icon slide.
- Centred the default fill button arrow inside a fixed icon well so it stays aligned across desktop and small-screen sizes.
- Switched local theme asset enqueue versions to file modification times so CSS and JS edits invalidate browser cache during development.
- Replaced all placeholder tokens with final `ls-theme` / `LightSpeed` values across all files.
- Updated `README.md`, `AGENTS.md`, and `.github/copilot-instructions.md` to reflect the real theme repo rather than a starter template.

### Deprecated

### Removed

- Removed the experimental vanilla JavaScript spotlight card implementation pending GSAP evaluation.
- Removed the section style contract loader for `styles/sections/*.json` runtime CSS generation.
- Removed the temporary experimental button variation and its temporary selector path.

### Fixed

### Security

---

## [0.1.0] - YYYY-MM-DD

### Added

- Initial LightSpeed Theme repository setup.
- Root theme files: `style.css`, `theme.json`, `functions.php`, `readme.txt`.
- Block template: `templates/index.html`.
- Block template parts: `parts/header.html`, `parts/footer.html`.
- Style variations: `styles/light.json`, `styles/dark.json`.
- Asset folders: `assets/fonts/`, `assets/icons/`, `assets/logos/`, `assets/images/`, `assets/css/`, `assets/js/`.
- Validation and utility script: `theme-utils.mjs`.
- Node-based tooling: `package.json`, `.lintstagedrc.json`, `.nvmrc`.
- PHP tooling: `composer.json`.
- GitHub config: `.editorconfig`, `.gitignore`, `.gitattributes`, `.coderabbit.yml`, `CODEOWNERS`.
- AI guidance: `AGENTS.md`, `CLAUDE.md`.
- GitHub Copilot instructions: `.github/copilot-instructions.md`, `.github/instructions/`.
- GitHub prompts: `.github/prompts/`.
- GitHub reports folder: `.github/reports/`.
- GitHub tasks folder: `.github/tasks/`.
- GitHub Actions workflows: `ci.yml`, `code-quality.yml`, `release.yml`.
- Portable agent assets: `.agents/skills/`, `.agents/agents/`.
- End-user documentation folder: `docs/`.

---

[Unreleased]: https://github.com/lightspeedwp/ls-theme/compare/v0.1.0...HEAD
[0.1.0]: https://github.com/lightspeedwp/ls-theme/releases/tag/v0.1.0
