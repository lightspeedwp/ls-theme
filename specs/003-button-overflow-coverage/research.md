# Research: Button and Container Horizontal Overflow Coverage (LSA-187)

No `NEEDS CLARIFICATION` remained after `/speckit-clarify`. The items below are design decisions the codebase forced.

## R-1: Where the check lives

- **Decision**: Add `expectNoElementOverflow(page, viewportWidth)` to `tests/helpers/responsive.ts`; call it next to the existing check in `tests/specs/standing/responsive-overflow.spec.ts`. Leave `expectNoHorizontalOverflow` unchanged.
- **Rationale**: `expectNoHorizontalOverflow` is also called by `navigation.spec.ts`, `mobile-menu.spec.ts` and `special-routes.spec.ts`. Changing its behaviour would silently alter those specs (FR-001 says preserve it).
- **Alternatives**: Fold the new logic into the existing function (rejected: affects other callers); new spec file (rejected: duplicates URL loop and BugHerd wiring; ticket names the existing spec).

## R-2: Container resolution (clarified Q1)

- **Decision**: For each button, compute up to two containers: the nearest `.wp-block-buttons` ancestor (for a `.wp-block-buttons` child, its parent) and the nearest ancestor with a visible border or non-transparent background (panel). Check left/right overshoot against each, tolerance 1px; also check the viewport edges. A missing container is skipped.
- **Rationale**: Matches the ticket's defect (button escaping a panel) and the "either exceeded" rule.
- **Bordered/backgrounded rule** (computed style, on ancestors only, never the button itself): an ancestor is a panel if any side has border width > 0 with a style other than `none`/`hidden`, or its `background-color` has alpha > 0, or it has a `background-image` other than `none`. `html` and `body` are not panels. A full-bleed section band is a valid panel; its bounds equal the viewport, so it never adds a failure beyond the viewport check.
- **Alternatives**: Nearest-only and panel-only (rejected in clarify).

## R-3: Exclusions (clarified Q2)

- **Decision**: Skip elements with `width === 0` or `height === 0`, and anything inside `.mobile-menu` (the part's root class in `parts/mobile-menu.html`; `mobile-menu.spec.ts` uses the same selector). The check runs with the menu closed.
- **Rationale**: The off-screen menu would fail every page; open-menu overflow already has its own spec.
- **Risk**: The drawer's outer wrapper is rendered by the header navigation block, not by `.mobile-menu`. Verify during implementation that no button sits in the wrapper outside `.mobile-menu`; if one does, widen the exclusion to the wrapper's selector.

## R-4: Naming the pattern or section

- **Finding**: Rendered markup has no pattern slug or name. Patterns insert as ordinary blocks, and the pattern name lives only in the PHP header.
- **Decision**: Build the label from what the page does expose: the nearest ancestor `section` (or `.alignfull` group), its first heading text (trimmed, max 60 chars), and its `is-style-*` / custom class names. Fall back to the nearest ancestor that has a class. The button text and `ls-buttons-wrap` presence are reported separately.
- **Rationale**: Adding a data attribute or class would change theme markup, which is out of scope.
- **Consequence**: Failures name sections by heading text, not by pattern title. Verification maps each reported heading back to its pattern file by searching `patterns/` for that text. FR-006 and the six-pattern acceptance scenario are met by section heading plus button text, not by the pattern's title string. Flagged for confirmation.

## R-5: Mobile Chrome, widths and mobile emulation

- **Decision**: Add `/standing\/responsive-overflow\.spec\.ts$/` to `MOBILE_STANDING_SPECS` in `playwright.config.ts`. `setViewportSize` is used at every width, as today.
- **Rationale**: Clarified Q3. `webkit` already runs the standing suite (desktop Safari).
- **Risk**: On the Pixel 5 profile (mobile emulation), widths such as 1440 may behave differently from desktop because of viewport meta handling. Verify results at 768/1024/1440 on Mobile Chrome; if they differ, report rather than skip silently.
- **Cost**: Each added standing spec runs a full discovery on Mobile Chrome (see the config comment). `SINGLE_PAGE_URL` avoids that for one-off checks.

## R-6: BugHerd signature

- **Finding**: `extractFailureSignature` groups overflow failures by matching "Horizontal overflow at ... Likely offenders:". A new message shape would fall through to the generic fallback and group poorly across pages.
- **Decision**: Give the new message a fixed prefix (see [contracts/failure-message.md](./contracts/failure-message.md)) and add one branch returning `button-overflow:<section label>|<button text>|<side>`, excluding widths and page URL so the same defect on many pages becomes one task.
- **Scope note**: `failure-signature.ts` is not in the ticket's target files. Needed so full-suite runs do not create one task per page and width. `SINGLE_PAGE_URL` runs create none regardless.
- **Alternatives**: Leave as is (rejected: noisy tasks); skip BugHerd for this check (rejected: the standing suite's contract is to report).

## R-7: Timeout budget and soft assertions

- **Decision**: Keep `expect.soft`, one soft assertion per offending element so every offender prints. Update the per-URL budget from 800ms x 5 widths to cover 8 widths (and the second evaluation).
- **Rationale**: The current formula multiplies by `VIEWPORT_WIDTHS.length`, so adding widths scales it automatically; confirm the 800ms per step remains enough for two evaluations.

## R-8: Light and dark mode (clarified Q3)

- **Decision**: No in-test theme switching. The maintainer switches the target site to Dark and re-runs; the README states this, as it does for `mobile-menu.spec.ts`.
- **Rationale**: Tests see only what `BASE_URL` serves.

## R-9: Verifying "without the fix"

- **Decision**: Temporarily revert `ls-buttons-wrap` on the target site (or locally in `corner-glow.scss` and rebuild) only during verification; never committed. Record results in the PR.
- **Note**: The user, not the plan, runs and switches the site state.
