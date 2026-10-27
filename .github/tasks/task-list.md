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
- [x] Align the header to the content width, centre the mega menus, hide Pricing and close the blog hero gaps (BugHerd #268, #269, #270)
- [x] Tighten the breadcrumb gap under the header on the spacing 80 heroes (hero breadcrumb batch 1 of 2, pattern sources only; saved pages update separately)
- [x] Tighten the breadcrumb gap on the spacing 90, 100 and 60 heroes (hero breadcrumb batch 2 of 2, pattern sources only; saved pages update separately)
- [x] Fix image caption contrast (BugHerd #231) with a `theme.json` `elements.caption` style, replacing `image-captions.scss`
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
