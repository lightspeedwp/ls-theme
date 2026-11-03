---
title: 'ADR-001: Release 1.0.0 breaking changes'
description: Decision to ship the full redesign, the ls-plugin dependency, the removals and renames, and the dark-only styles together in the 1.0.0 major release
file_type: documentation
date: 2026-11-02T00:00:00.000Z
adr_status: accepted
status: active
authors:
  - LightSpeed Team
---

# ADR-001: Release 1.0.0 breaking changes

## Status

✅ **Accepted** — Released in 1.0.0 (Linear LSA-181)

## Context

ls-theme 1.0.0 is the first release from `main` and ships together with ls-plugin 1.0.0. `main` still holds the original starter scaffold (version 0.1.0), so every site that moves to 1.0.0 upgrades across all the work on `develop`. That work is not backwards compatible with the scaffold:

1. **Full site redesign:** most templates, template parts and patterns are rebuilt, and the theme now depends on ls-plugin 1.0.0 (the `ls-plugin/taxonomy-filter` block, the `lightspeed` icon collection and the `ls_plugin_portfolio_website` post meta). It also uses the native `core/icon` block, which needs WordPress 7.1.
2. **Removals and renames:** the `phase-services` block, `inc/blocks.php`, `inc/phase-page-redirects.php` and several patterns and stylesheets are removed. Section-level patterns are renamed to lead with `section-`, about 30 single-use `is-style-*` variants are removed, and the `footer-notes` shadow preset and tokens and the `sync:breakpoints` script are gone.
3. **Dark only:** `styles/light.json` is removed, so `styles/dark.json` is the only style variation.

## Decision

Ship all of it as breaking changes in a single major release, `1.0.0`, instead of spreading it across several releases or adding compatibility layers.

- **Redesign and ls-plugin:** the theme requires ls-plugin 1.0.0, which is released and tagged first.
- **Removals and renames:** no redirects, aliases or legacy copies of the removed files, pattern slugs or block styles.
- **Dark only:** no light style variation is shipped.
- Document each change in the `1.0.0` changelog under "BREAKING CHANGES" and in `docs/migrating-to-1.0.md`.

## Rationale

- A single major version is a clear signal that upgrades need attention, and it lines up with the ls-plugin 1.0.0 release.
- There is no earlier stable release to migrate from, so compatibility layers would add code to maintain with no users.
- The redesign changes the markup of most patterns, so partial compatibility with the scaffold is not possible.
- Removing single-use block styles keeps the editor's style picker to real editorial choices.

## Consequences

**Positive**

- Smaller, consistent theme: shared patterns and styles, no dead files.
- One clear upgrade path documented in one place.

**Negative**

- Custom code or content that references the removed files, old pattern slugs or removed block styles breaks until updated.
- The theme does not render fully without ls-plugin 1.0.0.
- Sites that relied on a light variation have none.

## Alternatives considered

- **Keep compatibility shims for one release:** rejected; there is no earlier stable release depending on the old names.
- **Split the redesign, the removals and the dark-only change across releases:** rejected; the redesign already rewrites the affected patterns, so splitting would mean two upgrades for the same sites.
- **Keep `styles/light.json` alongside the dark variation:** rejected; `styles/light.json` was intentionally removed and `styles/dark.json` is the only variation the theme validates.

## References

- [CHANGELOG.md](../../CHANGELOG.md) — 1.0.0 breaking changes
- [Migration guide](../migrating-to-1.0.md)
- [ADR-002: Join main and develop histories for the v1.0.0 release](./ADR-002-join-main-and-develop-for-v1.0.0.md)
- Linear LSA-181 (release)
