# Phase 1 Data Model: Fix WCAG Color-Contrast Accessibility Violations (LS-2934)

This feature has no runtime data model, database schema, or API payloads — it is a static styling fix. The "entities" below are the design-token and markup concepts the fix touches, carried over from the spec's Key Entities section, with the specific resolved values from research.md.

## Color Token: `--wp--custom--color--text--on-dark-muted`

- **Represents**: Muted/secondary text color intended for use on dark surfaces.
- **Current definition**: `theme.json` → `settings.custom.color.text.on-dark-muted` → preset `neutral-400` → `#B8B8B8`.
- **Dark-mode parity**: Already has a distinct, resolved value in `styles/dark.json` (verified pre-existing; not modified by this feature).
- **New usage introduced by this feature**: Referenced by the new `.wp-element-caption` / `figcaption` color rule in `src/scss/structural/image-captions.scss`.
- **Validation rule (FR-001, FR-003)**: Resolved contrast against the `contrast` background token (`#080808`) MUST be ≥ 4.5:1 — confirmed at 10.1:1.

## Color Token: `--wp--custom--color--text--on-light`

- **Represents**: Text color intended for use on light/mid-brightness surfaces; resolves to a near-black value.
- **Current definition**: `theme.json` → `settings.custom.color.text.on-light` → preset `contrast` → `#080808`.
- **Dark-mode parity**: Already has a distinct, resolved value in `styles/dark.json` (verified pre-existing; not modified by this feature).
- **New usage introduced by this feature**: Replaces `--text--on-dark` as the `color` value on `.taxonomy-filter-current` in `src/scss/structural/taxonomy-filter.scss`.
- **Validation rule (FR-002, FR-003)**: Resolved contrast against the `--card--platform--wordpress` background token MUST be ≥ 4.5:1 — confirmed at 6.57:1.

## Markup Entity: Image Caption (`.wp-element-caption` / `figcaption`)

- **Represents**: Caption text rendered under an embedded image within post content (WordPress core block markup, not a custom component).
- **Contexts**: Appears on both dark-background and light-background post styles.
- **Change**: Dark-background context gains an explicit color override (see token above); light-background context is unaffected (FR-006) — no existing rule is removed, only a new scoped rule is added.
- **State**: No interactive states (no hover/focus) — static text.

## Markup Entity: Taxonomy Filter Pill (`.taxonomy-filter-current`)

- **Represents**: The active/selected state of a clickable category filter control on the blog listing page (`src/scss/structural/taxonomy-filter.scss`).
- **States**: default (unaffected), default `:hover`/`:focus-visible` (unaffected, FR-006), `.taxonomy-filter-current` and its own `:hover`/`:focus-visible` (active/selected — the states changed by this feature, since the active pill's hover/focus sub-rule re-asserts the same color as its base state).
- **Change**: The `color` declaration's token reference is swapped on both `.taxonomy-filter-current` and its `:hover`/`:focus-visible` sub-rule; `background-color` and all other properties are unchanged.

No new entities, relationships, or state transitions beyond the above — this table exists to satisfy the plan template's Phase 1 output requirement, not because the feature has meaningful data-model complexity.
