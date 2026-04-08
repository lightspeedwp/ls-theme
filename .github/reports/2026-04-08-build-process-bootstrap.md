# Build Process Bootstrap Report

## Scope

- Source scaffold: `app/public/wp-content/themes/block-theme-scaffold`
- Target theme: `app/public/wp-content/themes/ls-theme`
- Profile: `standard`

## Copied Or Derived Files

- `package.json`
- `composer.json`
- `.npmrc`
- `.eslint.config.cjs`
- `.eslintignore`
- `.prettier.config.cjs`
- `.prettierignore`
- `.stylelint.config.cjs`
- `.stylelintignore`
- `.postcss.config.cjs`
- `.babelrc.json`
- `.browserslistrc`
- `phpcs.xml`
- `webpack.config.js`
- `src/js/theme.js`
- `src/js/editor.js`
- `src/css/style.scss`
- `src/css/editor.scss`

## Identity Replacements

- Theme slug: `ls-theme`
- Theme name: `LightSpeed Theme`
- Package name: `ls-theme`
- Composer package: `lightspeedwp/ls-theme`
- Homepage: `https://lightspeedwp.agency/`
- Repository: `https://github.com/lightspeedwp/ls-theme`

## Notes

- Existing `theme-utils.mjs` validation commands were preserved.
- Existing GSAP and animation assets remain enqueued from PHP.
- Compiled build assets are now loaded only when `build/` artefacts exist.
- Scaffold-only release, agent, dry-run, and test harness scripts were intentionally excluded.