# Phase 0 Research: Services Family Pages

No unresolved `NEEDS CLARIFICATION` markers remain in `plan.md`'s Technical Context — all
were resolved during `/speckit-clarify` (recorded in `spec.md`) or from direct inspection of
this repository (`style.css` version requirements, `package.json` scripts, existing pattern
conventions). This file records the resulting decisions for traceability.

## Decision: Page hierarchy — hub → phase → service, not flat

**Decision**: Build all 21 pages as a 3-level hierarchy (Services hub → 6 phase pages → 14
service pages), confirmed against the live design and the dev site's existing page set.

**Rationale**: The dev site (`ls-agency.lightspeedwp.dev`) already has all 21 pages created,
and the confirmed design shows an explicit phase-numbering system (01 Discover → 06 Evolve)
with each phase grouping specific services — this is real, approved information architecture,
not a legacy artifact. A flat hub+subpages model (the original, incorrect assumption for this
batch) would not reflect what's actually being shipped.

**Alternatives considered**: Flat hub + 20 subpages with no phase grouping — rejected because
it doesn't match the confirmed design and would need to be redone once the phase-page
requirement was discovered anyway. Reparenting all service pages under their phase URL
immediately — deferred, not rejected; left as an implementation-time decision since it doesn't
change spec-level requirements either way (see `spec.md` Assumptions).

## Decision: Two shared patterns instead of per-page bespoke patterns

**Decision**: Build one `service-phase-hero` pattern (reused by all 6 phase pages) and one
`service-card` pattern (reused across all 14 service pages), rather than a unique pattern per
page.

**Rationale**: Constitution Principle VIII requires checking for reuse before creating new
patterns/styles. All 6 phase pages share an identical structural shape (phase title, number
badge, description, list of grouped services) and all 14 service pages share an identical
shape (service title, description, CTA, related-service links) per the confirmed design and
the existing content on pages like Discovery/Design/Development. Building 20 one-off patterns
would directly violate that principle and create unmaintainable duplication.

**Alternatives considered**: Per-page custom patterns — rejected per Principle VIII. A single
mega-pattern covering both phase and service shapes — rejected because phase and service pages
have genuinely different content shapes (a phase page lists child services; a service page
does not), so forcing them into one pattern would add unneeded conditional complexity.

## Decision: No new PHP, no ls-plugin changes

**Decision**: This batch requires zero changes to `ls-plugin` and no new PHP logic in
`ls-theme` beyond what block patterns already need (block markup, no custom render callbacks).

**Rationale**: All 21 pages are static content pages — no custom post types, taxonomies, forms,
or dynamic data are described anywhere in `spec.md`. Per constitution Principle II, introducing
plugin-owned concerns here would be a boundary violation.

**Alternatives considered**: None — no requirement in the spec implies a plugin-side need.

## Decision: New design tokens for phase badges need explicit light/dark pairs

**Decision**: The 6 phase-badge colours (visible in the confirmed design — green, blue, pink,
yellow/orange, teal, purple for Discover through Evolve) will be added as new custom colour
tokens in both `theme.json` and `styles/dark.json`, with genuinely distinct resolved values in
each, verified before use.

**Rationale**: Constitution Principle III explicitly forbids a token sharing an identical
light/dark value — this project's own prior incidents (recorded in accumulated feedback) came
from exactly this mistake. Flagging it now, before implementation starts, rather than
discovering it during a later audit.

**Alternatives considered**: Reusing an existing token per phase color if a close enough match
already exists in `theme.json` — this is the actual first implementation step (check for reuse
per Principle III/VIII) and is captured as a task, not decided here since it requires reading
the live `theme.json` at implementation time, not at planning time.

## Decision: Manual QA is the completion gate, Playwright is supplementary

**Decision**: Every page's "done" state depends on manual cross-device/cross-theme/
accessibility verification (constitution Principle VII), not on the existing Playwright suite
passing.

**Rationale**: The Playwright suite (LS-2335, already set up) covers generic regression
assertions, not content-specific or visual-design verification. The constitution explicitly
distinguishes "code compiles/static checks pass" from "the feature was exercised in a real
browser/editor" for UI work.

**Alternatives considered**: Relying on Playwright alone — rejected, directly conflicts with
Principle VII.
