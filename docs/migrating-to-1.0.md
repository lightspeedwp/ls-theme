# Migrating to LightSpeed Theme 1.0

Version 1.0.0 is the first stable release. It replaces the 0.1.0 scaffold with the full site redesign, so existing sites need the steps below. The full list of changes is in [CHANGELOG.md](../CHANGELOG.md).

## Before you update

1. Back up the database and the active theme.
2. Update to WordPress 7.1 or later. The patterns use the native Core Icon block (`core/icon`), which needs 7.1.
3. Install and activate **ls-plugin 1.0.0**, then activate the theme. The theme relies on it for the items below.

## Requires ls-plugin 1.0.0

| Used by the theme | Where |
|---|---|
| `ls-plugin/taxonomy-filter` block | Blog All Articles, Work Selected Projects and the blog post card patterns |
| `lightspeed` icon collection | The `core/icon` blocks across the patterns |
| `ls_plugin_portfolio_website` post meta | The "View site" button in the Work single hero |

ls-plugin 1.0.0 also makes its post types, including Portfolio, opt-in. Enable the ones your site uses under **Settings > LightSpeed > Post Types**, or the Work pages have no projects to list (see the ls-plugin migration guide).

If ls-plugin is missing, the taxonomy filter and the icons do not render and the Work single hero loses its "View site" button.

## Icons

- The patterns use `core/icon` with icons from the `lightspeed` collection instead of `outermost/icon-block`.
- `patterns/sections/search-useful-destinations.php` still uses `outermost/icon-block` for a decorative marker, and `patterns/template-single.php` still uses `outermost/social-sharing`, so keep the Icon Block and Social Sharing plugins active if you use those patterns.

## Removed files

If you extended or referenced any of these, update your code:

- `blocks/phase-services/` (the `phase-services` block), `inc/blocks.php` and `patterns/sections/phase-services-in-phase.php`. Each phase page now has its own pattern.
- `inc/phase-page-redirects.php`. Create the bare phase-slug redirects (`/discover/`, `/create/`, `/build/`, `/launch/`, `/grow/`, `/evolve/` to `/services/{phase}/`) in **Tools > Redirection** as 301 rules.
- `patterns/thank-you-consultation.php`. Use the reusable confirmation pattern that replaced it.
- `patterns/sections/logo-strip.php`. Use the logo marquee pattern.
- `src/scss/structural/image-captions.scss` and `assets/css/image-captions.css`. Caption styling now lives in `theme.json`.
- `assets/css/animations.min.css`. Enqueue `assets/css/animations.css`.

## Renamed patterns

Section-level pattern slugs now lead with `section-`. Replace the old slugs wherever you insert them:

- `ls-theme/section-cta-consultation-band`, `-inline`, `-reassurance`, `-strip`
- `ls-theme/section-card-feature`, `-services`, `-solutions`
- `ls-theme/section-stats-grid`

## Removed block styles

About 30 single-use `is-style-*` variants were removed (for example `badge-brand`, `card-banner-tint`, `button-glow-accent`, `gradient-accent`, `shadow-heading-base`, `shadow-heading-contrast`, `link-underline-accent`). Content that used them loses that styling. Reapply the styling with block settings or the remaining shared styles such as `link-arrow-accent`, `button-arrow-compact` and `button-secondary`. `button-cta-gradient`, `glass-button` and `footer-nav-link` are now plain classes.

## Removed tokens and scripts

- The `footer-notes` shadow preset (`styles/presets/shadows.json`) and the `custom.shadow.footer.notes` tokens in `theme.json` and `styles/dark.json`. Remove any custom CSS that reads them.
- The `sync:breakpoints` npm script and its `theme-utils.mjs` implementation.

## Style variations

`styles/light.json` is removed. `styles/dark.json` is the only style variation.

## After you update

1. Open the Site Editor and reset any template or template part that you customised on 0.1.0, or compare it with the new version.
2. Check the header, footer and mobile menu links.
3. Re-save permalinks and flush caches.
