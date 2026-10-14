# Feature Specification: Button and Container Horizontal Overflow Coverage (LSA-187)

**Feature Branch**: None created (out of scope for this command). Linear LSA-187 / GitHub issue #110; the issue's Definition of Done requires a `test/` branch prefix.

**Created**: 2026-10-14

**Status**: Draft

**Input**: User description: "Add Playwright regression coverage for horizontal button and container overflow, based on Linear LSA-187. Detect horizontal overflow that document scrollWidth/clientWidth checks miss, including left-side overflow and buttons extending outside their own panels. Existing coverage: tests/helpers/responsive.ts and tests/specs/standing/responsive-overflow.spec.ts. On /free-consultation/ at 370px, 307px CTA buttons overflowed a 254px panel to the left while the standing suite passed. Existing fix: ls-buttons-wrap in src/scss/structural/corner-glow.scss. Audience: developers and QA. Exclude text clipping and vertical overflow."

## Clarifications

### Session 2026-10-14

- Q: Which element should a button be measured against when the nearest button row and nearest bordered/backgrounded panel disagree, and what if it has neither? → A: Check against both the nearest `.wp-block-buttons` row and the nearest bordered/backgrounded panel and fail if either is exceeded by more than 1px; if there is no panel, only the viewport and button-row checks apply.
- Q: How should the check decide an element belongs to the mobile menu overlay, and should buttons inside the menu be tested once opened? → A: Exclude any element inside the mobile menu overlay container (identified by its existing menu selector) in all states; the check runs with the menu closed, and open-menu overflow stays covered by `mobile-menu.spec.ts`.
- Q: How should "chromium, webkit and Mobile Chrome in light and dark mode" be run, given the tests cannot switch theme themselves? → A: Add the spec to the Mobile Chrome allow-list so it runs on chromium, webkit and Mobile Chrome; dark mode is covered by the maintainer manually switching the target site to Dark and re-running (no in-test theme switching), documented in the README.
- Q: The rendered page carries no pattern name, so how are patterns identified in failures? → A: By section heading text, section class names and button text; each reported section is mapped back to its pattern file by searching `patterns/` for that heading. Putting a pattern title in failures would need a theme markup change, which is out of scope.
- Q: Is touching the BugHerd failure-signature helper in scope? → A: Yes. Without it, full-suite runs would file a separate task per page and width; single-page runs create none either way.

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Catch a button spilling out of its own panel (Priority: P1)

A developer or QA engineer runs the responsive-overflow check after a pattern change. A CTA button is wider than the panel it sits in and pokes out of the panel's left edge, but the page itself does not scroll sideways. The check fails and tells them which pattern, which button, and which side overflowed.

**Why this priority**: This is the escape that prompted the ticket. On `/free-consultation/` at 370px, 307px buttons overflowed a 254px panel to the left while the existing suite passed 27/27; it was found only by a manual screenshot.

**Independent Test**: Remove the `ls-buttons-wrap` fix, run the check against `/free-consultation/` at 370px, and confirm it fails and names "Book your free consultation". Restore the fix and confirm it passes.

**Acceptance Scenarios**:

1. **Given** `ls-buttons-wrap` is removed, **When** the check runs on `/free-consultation/` at 370px, **Then** it fails and the failure names "Book your free consultation".
2. **Given** a button whose left edge is less than 0 (off the left of the viewport) while the document does not overflow on the right, **When** the check runs, **Then** it fails with the overflowing side reported as left.
3. **Given** `ls-buttons-wrap` is present, **When** the check runs on `/free-consultation/`, **Then** it passes.

---

### User Story 2 - Failure output that points straight at the problem (Priority: P1)

When the check fails, the person reading the report can locate and size the problem without opening dev tools or taking screenshots.

**Why this priority**: The ticket's value is an actionable failure, not just a red test. Without a named pattern and measurements, QA must reproduce manually, as happened here.

**Independent Test**: Trigger a known overflow and read the failure output only; it must contain the pattern or section, button text, element width, container width, overflowing side and viewport width.

**Acceptance Scenarios**:

1. **Given** an overflowing button, **When** the check fails, **Then** the message includes pattern or section, button text, element width, container width and overflowing side (left, right or both).
2. **Given** several overflowing buttons on one page, **When** the check fails, **Then** every offender is reported in one run (soft assertions), not only the first.

---

### User Story 3 - Sweep the known-broken patterns across widths (Priority: P2)

QA sweeps the whole site at the full list of widths and sees every known-overflowing pattern flagged when the fix is absent.

**Why this priority**: A sweep of 28 button patterns found six more offenders at 320px by 1–41px. The check must catch all of them, but only after the core detection works.

**Independent Test**: With `ls-buttons-wrap` removed, run at 320px and confirm all six patterns below are reported.

**Acceptance Scenarios**:

1. **Given** `ls-buttons-wrap` is removed, **When** the check runs at 320px, **Then** overflow is reported in: Split CTA check card, Services hero, Homepage CTA, Phase CTA, Homepage Why LightSpeed, and Home hero static.
2. **Given** the check runs, **Then** it covers widths 320, 360, 370, 375, 390, 768, 1024 and 1440 (360 and 370 are new).
3. **Given** a page that overflows the document horizontally, **When** the check runs, **Then** the existing document-wide overflow failure still occurs, unchanged in meaning.

---

### User Story 4 - Safe to run for one-off checks and free of false alarms (Priority: P2)

A developer points the check at a single URL for a local check, and it neither files BugHerd tasks nor fails on elements deliberately placed off-screen.

**Why this priority**: False positives would make the check ignorable; unwanted BugHerd tasks would pollute the tracker.

**Independent Test**: Run with a single-page URL and confirm no BugHerd task is created. Run on a page with the mobile menu closed and confirm no failure from the menu overlay.

**Acceptance Scenarios**:

1. **Given** a single-page URL is set, **When** the check runs and fails, **Then** no new BugHerd task is created.
2. **Given** elements with zero width or zero height, **When** the check runs, **Then** they are ignored.
3. **Given** the mobile menu overlay is positioned off-screen, **When** the check runs, **Then** it produces no failure.

---

### User Story 5 - Documented for the team (Priority: P3)

A developer reading the README testing section learns what the new check does, which widths it covers, and how to run it on one page.

**Independent Test**: Read the README testing section and find the check, its widths, what it flags, and the single-page usage.

**Acceptance Scenarios**:

1. **Given** the README testing section, **When** a developer reads it, **Then** the element-level overflow check is described alongside the existing document-level check.

---

### Edge Cases

- Button overflows only the left side (document does not scroll): must fail, side reported as left.
- Overflow of exactly 1px or less beyond a container: must not fail (tolerance is more than 1px).
- Button with no bordered/backgrounded panel ancestor: only the viewport and button-row checks apply; with no `.wp-block-buttons` row either, only the viewport check applies.
- Button within its row but outside its panel (or the reverse): fails, because each container is checked independently.
- Hidden elements (zero width or height) and off-screen mobile menu overlay: ignored.
- A button inside the mobile menu overlay (open or closed): excluded; open-menu overflow is covered by `mobile-menu.spec.ts`.
- Page that overflows the document and also has an overflowing button: both are reported.
- Text clipping and vertical overflow: not detected (out of scope).

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: The check MUST retain the existing document-wide horizontal overflow assertion at every tested width.
- **FR-002**: The check MUST evaluate every `.wp-block-button__link` and every child of `.wp-block-buttons`.
- **FR-003**: The check MUST fail when an evaluated element starts more than 1px left of the viewport or ends more than 1px beyond the viewport's right edge (the same 1px tolerance as FR-004 and the existing document check).
- **FR-004**: The check MUST fail when an evaluated element extends more than 1px beyond either of its containers on the left or on the right. The containers are the nearest `.wp-block-buttons` row and the nearest bordered/backgrounded panel, each checked independently. Where no panel exists, only the viewport and button-row checks apply.
- **FR-005**: The check MUST run at widths 320, 360, 370, 375, 390, 768, 1024 and 1440.
- **FR-006**: Each failure MUST identify the section (its heading text and class names), button text, element width, container width and overflowing side. The pattern is identified by mapping the reported section to its pattern file; its title is not in the page markup.
- **FR-007**: The check MUST use soft assertions so all offenders at all widths are reported in a single run.
- **FR-008**: The check MUST support the single-page URL option, and runs using it MUST NOT create BugHerd tasks.
- **FR-009**: The check MUST ignore elements with zero width or zero height.
- **FR-010**: The check MUST exclude every element inside the mobile menu overlay container (identified by its existing menu selector) in all states, and MUST run with the menu closed.
- **FR-011**: The check MUST NOT report text clipping or vertical overflow.
- **FR-012**: The README testing section MUST document the new coverage.
- **FR-013**: With `ls-buttons-wrap` removed, the check MUST fail at 370px naming "Book your free consultation", and at 320px MUST flag the sections belonging to these patterns: Split CTA check card, Services hero, Homepage CTA, Phase CTA, Homepage Why LightSpeed and Home hero static (identified by section heading and button text, then mapped to pattern files).
- **FR-014**: With `ls-buttons-wrap` present, `/free-consultation/` MUST pass in light and dark mode on the chromium, webkit and Mobile Chrome configurations. The spec MUST be added to the Mobile Chrome allow-list so it runs there; light/dark is covered by the maintainer manually switching the target site's style variation and re-running, with no in-test theme switching.
- **FR-015**: Failures MUST be grouped for BugHerd by section, button text and side, not by page, width or pixel size, so one defect found on many pages and widths becomes one task on full-suite runs.

### Key Entities

- **Button element**: A `.wp-block-button__link` or direct child of `.wp-block-buttons`; attributes are text, width, left/right edges.
- **Container**: Either the nearest button row or the nearest bordered/backgrounded panel that bounds a button (both are checked); attributes are width, left/right edges.
- **Overflow finding**: Pattern or section, button text, element width, container width, side (left/right/both), viewport width, page URL.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: The known `/free-consultation/` regression (307px buttons in a 254px panel at 370px) is detected 100% of the time when the fix is removed.
- **SC-002**: All six additional known patterns are flagged at 320px when the fix is removed (6 of 6), each reported by section heading and button text and mapped to its pattern file.
- **SC-003**: With the fix present, `/free-consultation/` produces zero overflow failures in the required browser and mode combinations.
- **SC-004**: Every failure lets a reader identify the offending pattern or section and button without re-running or opening dev tools (all required fields present in 100% of failures).
- **SC-005**: Zero BugHerd tasks are created by single-page runs.
- **SC-006**: Zero false failures from hidden elements or the mobile menu overlay on pages with no real overflow.
- **SC-007**: The README testing section documents the check and its widths.

## Assumptions

- Audience is developers and QA; tests are run manually, not in CI (per README).
- This ticket extends the existing check in `tests/helpers/responsive.ts` and `tests/specs/standing/responsive-overflow.spec.ts`; Linear proposes a helper such as `expectNoElementOverflow`.
- Pattern or section is derived from information available on the rendered page; if none exists for an element, a fallback identifier (nearest section class or heading) is used. Planning must verify what the rendered markup exposes.
- Tolerance is "more than 1px", consistent with the existing document check's 1px allowance.
- Theme CSS is not changed by this feature; "without the fix" scenarios are verified by temporarily reverting `ls-buttons-wrap` during implementation verification only.
- The repository's testing rules apply: `SINGLE_PAGE_URL` never creates BugHerd tasks; standing-suite failures on full runs are reported to BugHerd as today.
- `webkit` means the repository's desktop Safari project; Mobile Safari and Tablet are not part of this check.
- Light/dark mode is determined by the style variation the target site is serving (the README states tests see only what `BASE_URL` serves); no mode toggle exists in the tests today and none is added.
- Out of scope: theme/pattern CSS changes, text clipping, vertical overflow.
