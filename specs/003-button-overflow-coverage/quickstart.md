# Quickstart: Validating LSA-187

For the maintainer to run after implementation. Nothing here has been run.

## Prerequisites

- `npm install` and `npm run test:setup` done; `.env` has `BASE_URL`, or pass it per run.
- Local site on this branch (e.g. `http://localhost:8882`).
- Use `SINGLE_PAGE_URL` for every run below: no BugHerd tasks are created.

## 1. Passing baseline (fix present)

```bash
SINGLE_PAGE_URL="http://localhost:8882/free-consultation/" npx playwright test standing/responsive-overflow --project=chromium --project=webkit --project="Mobile Chrome"
```

Expected: passes at all eight widths on all three projects. Then switch the site to Dark and repeat; expected: passes.

## 2. Regression at 370px (fix removed)

Temporarily revert `ls-buttons-wrap` (rebuild CSS), then run the command above for chromium.
Expected: fails at 370px, naming "Book your free consultation", with section, button width, container width and side.

## 3. Regression at 320px (fix removed)

The sweep needs one `SINGLE_PAGE_URL` run per page (never a full discovery run, which would file BugHerd tasks, and the 30-URL sample may miss pages). Pattern pages come from page content in the database, so confirm each URL before running:

| Pattern (file) | Page to run | Status |
|---|---|---|
| Homepage CTA (`patterns/sections/homepage-cta.php`) | `/` (used by `templates/front-page.html`) | Known |
| Homepage Why LightSpeed (`patterns/sections/homepage-why-lightspeed.php`) | `/` (used by `templates/front-page.html`) | Known |
| Home hero static (`patterns/home-hero-static.php`) | `/` if it is the hero in use there | Confirm |
| Services hero (`patterns/hero/services-hero.php`) | `/services/` | Confirm |
| Split CTA check card (`patterns/cta/split-cta-check-card.php`) | Solutions landing page | Locate (T016) |
| Phase CTA (`patterns/sections/phase-cta.php`) | A phase page | Locate (T016) |

To locate a URL, search page content for the pattern's heading text or slug on the target site (for example with `wp post list --s=` or the Site Editor). Expected findings, by section heading and button text, each mapped to its pattern file by searching `patterns/`: Split CTA check card, Services hero, Homepage CTA, Phase CTA, Homepage Why LightSpeed, Home hero static.

Restore the fix afterwards.

## 4. No false failures

- Closed mobile menu on a page with no real overflow: no failure.
- Hidden (zero-size) buttons: ignored.

## 5. No BugHerd tasks

Confirm no new task appears in BugHerd after steps 1-4 (all run with `SINGLE_PAGE_URL`).

## 6. Regression guard

```bash
npm run theme:validate
npx playwright test navigation special-routes --project=chromium
```

Expected: unchanged results (the existing helper is untouched).

Contract details: [contracts/failure-message.md](./contracts/failure-message.md). Shapes: [data-model.md](./data-model.md).
