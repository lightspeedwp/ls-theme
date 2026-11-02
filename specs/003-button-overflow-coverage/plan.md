# Implementation Plan: Button and Container Horizontal Overflow Coverage (LSA-187)

**Branch**: `test/lsa-187-button-overflow-coverage` | **Date**: 2026-10-14 | **Spec**: [spec.md](./spec.md)

**Input**: Feature specification from `/specs/003-button-overflow-coverage/spec.md`

## Summary

Add an element-level horizontal overflow check to the standing responsive-overflow spec. A new helper measures every `.wp-block-button__link` and every `.wp-block-buttons` child in the browser, and fails (soft) when one starts left of the viewport, ends past the right edge, or exceeds its nearest button row or nearest bordered/backgrounded panel by more than 1px. The existing document-wide check stays as is. The width list grows to 320, 360, 370, 375, 390, 768, 1024 and 1440. The spec is added to the Mobile Chrome allow-list, a matching BugHerd signature rule keeps full-suite dedupe sensible, and the README testing section documents it. No theme CSS changes.

## Technical Context

**Language/Version**: TypeScript (ES modules), Node >=20

**Primary Dependencies**: `@playwright/test` ^1.62.1 (already installed); no new dependencies

**Storage**: N/A

**Testing**: Playwright. Run manually or by an AI agent, not in CI (README)

**Target Platform**: Playwright projects `chromium`, `firefox`, `webkit` (desktop) and `Mobile Chrome` (Pixel 5) against `BASE_URL`

**Project Type**: Test-suite extension inside a WordPress block theme repo

**Performance Goals**: One in-page measurement per page per width. Suite timeout budget scales with the new width count (8 vs 5)

**Constraints**: No theme/pattern CSS change; no new dependency; keep `expect.soft` and `SINGLE_PAGE_URL`; existing `expectNoHorizontalOverflow` callers (`navigation.spec.ts`, `mobile-menu.spec.ts`, `special-routes.spec.ts`) must be unaffected

**Scale/Scope**: Up to `MAX_TEST_URLS` (30) pages x 8 widths per project; ~28 button patterns site-wide

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

| Principle | Status | Note |
|---|---|---|
| I. Theme-First Styling | Pass (N/A) | No Sass/CSS/JSON style changes |
| II. Reuse Before Create | Pass | Extends `tests/helpers/responsive.ts` and the existing standing spec instead of adding a parallel spec |
| III. Token Parity | Pass (N/A) | No tokens |
| IV. Core Blocks First | Pass (N/A) | No pattern changes |
| V. Accessibility and Security | Pass (N/A) | No PHP/markup; the check reads the DOM only |
| VI. Validation Before Done | Pass | No PHP/JSON changed, so `patterns:escape`, `schema:validate` and `security:scan` are not triggered. `npm run theme:validate` is still run as a regression guard |
| VII. Engineering Discipline | Pass | Small diffs, no new dependency, no build pipeline |

AGENTS.md also requires a `CHANGELOG.md` entry under `## [Unreleased]`, grouped per PR. That is included in the work.

**Post-design re-check**: Pass. Design adds one small branch to `tests/helpers/failure-signature.ts` (scope addition, see research R-6) and nothing else outside the ticket's target files.

## Project Structure

### Documentation (this feature)

```text
specs/003-button-overflow-coverage/
├── plan.md
├── research.md
├── data-model.md
├── quickstart.md
├── contracts/
│   └── failure-message.md
└── tasks.md              # Created by /speckit-tasks, not by this command
```

### Source Code (repository root)

```text
tests/
├── helpers/
│   ├── responsive.ts            # add expectNoElementOverflow(); keep expectNoHorizontalOverflow() unchanged
│   └── failure-signature.ts     # add a button-overflow signature branch (R-6)
└── specs/standing/
    └── responsive-overflow.spec.ts   # 8 widths; call both checks; larger timeout budget
playwright.config.ts             # add responsive-overflow to MOBILE_STANDING_SPECS
README.md                        # Testing section: document the check, widths, SINGLE_PAGE_URL, dark-mode re-run
CHANGELOG.md                     # [Unreleased] entry for this PR
```

**Structure Decision**: Extend the existing helper and standing spec in place (the ticket's named target files). Two small supporting edits (`playwright.config.ts`, `failure-signature.ts`) are required by clarified FR-014 and by the BugHerd dedupe behaviour.

## Complexity Tracking

No constitution violations. Scope note: `failure-signature.ts` and `playwright.config.ts` are outside the ticket's listed target files. Both were approved by the maintainer on 2026-10-14 (R-6, R-5) and are covered by spec FR-014 and FR-015.
