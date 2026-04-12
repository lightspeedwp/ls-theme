# Task List

Track ongoing and completed tasks for this repository.

Update this file as tasks are created, started, or completed.

---

## Setup

- [x] Replace all placeholder tokens in the repo
- [x] Set the theme name, slug, and text domain in `style.css`, `theme.json`, and `functions.php`
- [ ] Update `CHANGELOG.md` with the initial release date
- [x] Update `CODEOWNERS` with the correct GitHub team
- [ ] Create `screenshot.png` (1200×900 recommended)
- [x] Update `composer.json` with the correct author details
- [x] Update `package.json` with the correct name and description
- [ ] Run `npm install` and `composer install`
- [ ] Run `npm run theme:validate` to confirm setup is clean

## Development

- [ ] Execute the detailed Figma Make implementation plan in `.github/tasks/2026-04-07-figma-make-implementation-checklist.md`
- [x] Draft mixin strategy report in `.github/reports/2026-04-10-theme-mixin-strategy.md`
- [x] Implement Sass mixin structure and compiled CSS workflow for authored theme effects
- [ ] Build `parts/header.html`
- [ ] Build `parts/footer.html`
- [ ] Build `templates/index.html`
- [ ] Customise `theme.json` colour palette
- [ ] Customise `theme.json` typography
- [ ] Create initial block patterns in `patterns/`
- [ ] Create initial style variation adjustments in `styles/light.json` and `styles/dark.json`
- [ ] Add custom CSS to `assets/css/` if needed
- [ ] Add end-user documentation to `docs/`

## Quality

- [x] Add semantic colour token policy instructions and a colour-token enforcement skill
- [ ] Run `npm run security:scan`
- [ ] Run `npm run patterns:escape`
- [ ] Run `composer run phpcs`
- [x] Run `npm run schema:validate`
