# Quickstart: Verifying the LS-2934 Color-Contrast Fixes

This guide validates both fixes end-to-end against DEV, using the existing standing-suite accessibility spec in scoped single-page mode — the same method already agreed for this task, which does not create any new BugHerd tasks.

## Prerequisites

- On branch `fix/ls-2934-accessibility-color-contrast-fixes`, with both fixes implemented:
  - `src/scss/structural/image-captions.scss` created and compiled to `assets/css/image-captions.css`
  - `src/scss/structural/taxonomy-filter.scss` edited (token swap) and recompiled
  - New CSS file enqueued/registered per `research.md` Unknown 4
- `.env` present in the theme root with `BASE_URL=https://ls-agency.lightspeedwp.dev` (already the case in this repo)
- Dependencies installed (`npm install`, Playwright browsers installed)

## Step 1 — Rebuild compiled CSS

```bash
npm run build:css
```

Confirm `assets/css/image-captions.css` now exists and `assets/css/taxonomy-filter.css` has changed (`git diff --stat`).

## Step 2 — Run required validation gates (Constitution Principle VI)

```bash
npm run schema:validate
npm run theme:validate
npm run lint:json
```

`schema:validate` and `lint:json` must pass before proceeding. `theme:validate` is expected to fail on one pre-existing, unrelated finding — `styles/light.json` has never existed in this repo (confirmed via `git log`) — which is not caused by or related to this feature; any other `theme:validate` failure should be treated as a real blocker. Do **not** run the banned `validate_blocks` tool.

## Step 3 — Scoped accessibility re-checks (no new BugHerd tasks)

Run once per originally-flagged URL, each as its own command:

```bash
SINGLE_PAGE_URL="https://ls-agency.lightspeedwp.dev/blog/" npx playwright test accessibility --project=chromium --reporter=line

SINGLE_PAGE_URL="https://ls-agency.lightspeedwp.dev/lightspeed-remote-workspaces-2016/" npx playwright test accessibility --project=chromium --reporter=line

SINGLE_PAGE_URL="https://ls-agency.lightspeedwp.dev/lsx-version-1-3-0-released/" npx playwright test accessibility --project=chromium --reporter=line

SINGLE_PAGE_URL="https://ls-agency.lightspeedwp.dev/lsx-version-1-2-5-released/" npx playwright test accessibility --project=chromium --reporter=line
```

**Expected outcome**: all 4 runs pass with zero serious/critical `color-contrast` violations (matches spec SC-001). `SINGLE_PAGE_URL` structurally prevents the BugHerd reporter from filing anything, regardless of pass/fail (spec FR-007/SC-004).

## Step 4 — Manual regression spot-check (FR-006, SC-003)

In a browser against DEV:
1. Open a post using the **light/default** background style with an image caption — confirm caption text still renders as before (no visual change).
2. Open `/blog/` and hover over a **non-active** filter pill — confirm default and hover states are visually unchanged.
3. Confirm the active pill (`.taxonomy-filter-current`) still uses the same blue background — only its text color should look different (darker/higher-contrast).

## Step 5 — Record results

Attach or reference the 4 scoped test run outputs (pass/fail + any axe JSON attachments) when marking BugHerd task #231 as resolved, per the existing manual QA workflow — this quickstart does not automate BugHerd status changes.
