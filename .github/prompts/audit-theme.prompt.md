---
mode: "ask"
---

# Audit Theme

Perform a comprehensive audit of this WordPress block theme.

Check the following and provide a structured report:

## 1. Required Files

Confirm these files exist and are valid:

- `style.css` with a correct theme header
- `theme.json` with a valid `$schema`
- `functions.php`
- `templates/index.html`
- `parts/header.html`
- `parts/footer.html`
- `styles/light.json`
- `styles/dark.json`

## 2. Placeholder Tokens

Check for any unreplaced placeholder tokens (`{{THEME_NAME}}`, `{{TEXT_DOMAIN}}`, etc.) in all text files.

## 3. theme.json Quality

- Confirm the schema version is correct.
- Confirm fixed palette slugs remain value-based and consistent between `theme.json` and style variations.
- Confirm semantic colour usage lives in `settings.custom.color`.
- Flag any deprecated settings.
- Flag any unnecessary complexity.

## 4. Semantic Colour Token Policy

- Confirm every custom colour token path in `theme.json` exists with the exact same path in `styles/dark.json`.
- Confirm custom colour token values point only to preset colours.
- Flag direct preset-colour references or raw visual colour values in `styles/**/*.json`, `patterns/**/*.php`, `templates/**/*.html`, `parts/**/*.html`, and `assets/css/*.css`.
- Treat non-visual masking or compositing colours as exceptions that still need to be called out.
- Flag any pairings that appear to miss WCAG AA contrast thresholds.

## 5. PHP Security

- Review `functions.php`, `inc/**/*.php`, and `patterns/**/*.php`.
- Flag any unescaped output.
- Flag any unsanitised input.
- Flag any direct superglobal usage.

## 6. Accessibility

- Check heading hierarchy in templates and parts.
- Check for semantic HTML tags.
- Check for skip link in header.

## 7. Style Variations

- Confirm `styles/light.json` and `styles/dark.json` are valid JSON.
- Confirm colour references exist in `theme.json`.
- Confirm authored UI styles use semantic custom colour tokens rather than direct preset-colour references.

## 8. Changelog

- Confirm `CHANGELOG.md` is up to date with recent changes.

## Output Format

Provide the report as a structured Markdown list with:

- ✅ for passing checks
- ⚠️ for warnings
- ❌ for errors

Save the report to `.github/reports/YYYY-MM-DD-theme-audit.md`.
