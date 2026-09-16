# LightSpeedWP.Agency — Release-Level Plan

This is a planning document, not a Spec Kit feature. It is intentionally **not** run through
`/speckit-specify` — it isn't itself an independently implementable/testable unit, and forcing
it into a `spec.md`/`plan.md`/`tasks.md` shape would make `/speckit-analyze` and
`/speckit-converge` treat it as a feature with no code to converge against. Batch specs below
reference this document; it does not run the Spec Kit pipeline itself.

Governed by [`.specify/memory/constitution.md`](./constitution.md) v1.0.0. Any conflict
between this plan and the constitution is resolved in the constitution's favour.

Source project: [LightSpeedWP.Agency](https://linear.app/lightspeedwp/project/lightspeedwpagency-2c2eec553465)
(Linear). This plan is derived from a full review of that project's 39 open (non-Done,
non-Cancelled) issues as of 2026-09-16.

---

## Scope Boundary

**In scope for this plan** (near-term delivery, per the constitution's Delivery Phase Scope
Boundary): Phase 1 core pages/templates, Phase 2 Services/Solutions/About subpage depth, and
the AI Mega Page as the final item.

**Explicitly out of scope / later-sequenced, not implied work:**
- Phase 3 — AI Governance & Readiness, AI Chatbot planning/implementation, Grow/Evolve telemetry
- Phase 4 — full content finalisation pass, claims/proof review, legal/policy sign-off

**Non-goals for this plan specifically:**
- Content/SEO conventions are not defined here — deferred to a future content-strategy pass
  (see constitution `TODO(CONTENT_SEO_CONVENTIONS)`).
- Internal AI/agent tooling work (support-writer, sales-assistant, PRD-generator agents,
  the Linear-skill builder, OpenSpec skills planning) is **not** website delivery and is
  excluded from every batch below.
- Learning/documentation-only issues (e.g. a standards blog post) are excluded.
- Work already completed or in flight on its own branch/PR outside this planning effort is
  excluded, not re-specified.

---

## Milestones (final)

Before this redesign, "QA Testing," "Launch," and "Site-wide integration QA" showed 100%
while "Core & depth pages built" sat at 16%, with both its target date (2026-09-01) and the
project target date (2026-09-11) already past as of 2026-09-16 — those percentages and
dates were never treated as evidence of real completion, which is exactly why the milestone
structure below replaces them rather than reusing their numbers. It is not pushed to Linear
until reviewed and confirmed (see Next Step).

Milestones are deliberately **fewer than batches** — they are stakeholder-visible checkpoints,
not a 1:1 mirror of the internal batch list. Each milestone's exit criteria ties to the
constitution's Definition of Done, not a percentage.

**Bug-fix issues are never assigned to a milestone.** They surface continuously and can't be
planned for in advance — they're tracked as their own issues, worked opportunistically, and
excluded from every milestone below by design (per explicit instruction), not by oversight.

### Existing Linear milestones — verified against actual issue contents, left untouched

Pulled every issue currently in each of these six milestones (including Done/Cancelled) before
deciding anything. Four have **zero open issues** — they are closed historical record, not live
tracking, so touching them (renaming, redating) would edit history for no operational benefit:

| Existing milestone | Contents | Decision |
|---|---|---|
| Foundation complete | 6 issues, all Done | **Untouched** — real completed work, not to be disturbed |
| Launch | 2 issues (1 Done, 1 Canceled) | **Untouched** — nothing open; new forward-looking "Launch" milestone below is a separate, distinctly-named milestone to avoid confusion with this closed one |
| QA Testing | 4 issues, all Done | **Untouched** — nothing open depends on it |
| Site-wide integration QA complete | 3 issues (2 Done, 1 Canceled) | **Untouched** — nothing open depends on it |
| Core & depth pages built | 28 issues: 4 Done (Home page, 404 template, search results template, mega menu config) + 1 tracking epic (LS-1596) + 23 open page-build issues | **Split** — the 4 Done items stay here undisturbed; the 23 open issues (plus the epic) move to the new milestones below, since this is the only existing milestone that actually had live, unassigned work in it |

### New milestones

| # | Milestone | Issues | Due (draft) |
|---|-----------|--------|-------------|
| 1 | **Priority Pages Complete** | LS-1598, LS-645, LS-654, LS-2592, LS-2593, LS-2597, LS-2601 (Services Family) + LS-1203 (epic: website-rebuild — Plan Phase 1 MVP scope) | 2026-10-10 |
| 2 | **Core Site Pages Complete** | LS-1600, LS-1601, LS-1604, LS-1605, LS-2595 (Shared Foundations) + LS-1602, LS-1603, LS-2602, LS-2603, LS-2604 (About) + LS-1599, LS-649, LS-2598, LS-2599, LS-2600 (Solutions) + LS-1596 (epic: phase-1-page-builds) | 2026-11-27 |
| 3 | **AI Mega Page Complete** | LS-2605 | 2026-12-10 |
| 4 | **Pre-Launch Manual QA Complete** | LS-3716 (full-circle staging test plan) + *new issue*: audit legacy/overlapping pages and decide redirect vs. retire per page | 2026-12-17 |
| 5 | **Launch** | *(new — no existing issues; this is the go-live event itself, distinct from milestone 6)* | 2026-12-19 |
| 6 | **Post-Launch Manual QA Complete** | *(new — no issue exists yet; needs creating during Linear re-planning)* | 2026-12-22 |

The two tracking epics (LS-1203, LS-1596) are placed at their most representative milestone
rather than left unassigned, since they are open, non-bug issues and the instruction is that
every open, non-bug issue gets a milestone.

### No milestone, by design (bug fixes — excluded per explicit instruction, not oversight)

| Issue | Title | Why excluded |
|---|---|---|
| LS-2940 | Resolve remaining console errors | Bug fix, being finished directly, outside planned batches |
| LS-3222 | Restore mobile-menu links, remove Systems | Bug fix, already implemented on its own active branch/PR |
| LS-4168 | Icon renders too small (SVG padding) | Bug fix, opportunistic, non-blocking |
| LS-2934 | epic: bugherd-backlog — Resolve BugHerd issues | This epic *is* a bug-fix backlog by definition — excluded from Pre-Launch QA milestone for the same reason as the other three |

### No milestone, out of scope (not website redesign — separate reason from bug fixes)

| Issue | Title |
|---|---|
| LS-1317 | Create OOP standards blog post (learning/doc content) |
| LS-1017 / LS-1018 / LS-1019 | aiops agent-building (support-writer, sales-assistant, PRD-generator) |
| LS-1225 | aiops: build Linear skill |
| LS-3223 | aiops: openspec skills planning |
| LS-867 | epic: lightspeed-agents — Build agent workflow suite |
| LS-712 | Organise Claude Design assets (tooling housekeeping) |
| LS-593 | "Refine website design" (dropped — vague triage scope, no defined content) |

### Full coverage audit

26 milestone-assigned + 4 bug-bucket + 9 out-of-scope = **39 of 39 open issues accounted for.**
No issue is silently missing a category.

---

## Resourcing & Review Model

- **Build**: solo (you), with AI-agent assistance. Batches run **sequentially**, not in
  parallel — one batch is fully drafted, planned, and implemented before the next starts,
  unless you explicitly pull one forward.
- **Spec review/approval**: you are the sole sign-off on each batch spec before it proceeds
  to `/speckit-plan`. No external/client review gate is assumed in these dates — if that
  changes, every downstream date needs a wait-time buffer added.
- **Velocity calibration**: based on actual repo history for the Services page
  (`feature/ls-1598-*` branches), a single flagship page with heavy review/iteration took
  ~7 working days across ~49 commits and multiple PR review-fix cycles (2026-09-07 →
  2026-09-16, still closing out). That is the anchor for "L" sizing below — everything else
  is sized relative to it, not from scratch.

---

## Batch Sizing (internal detail feeding the Milestones section above)

**These dates are draft estimates for your review, not committed Linear dates** — the
Milestones section above is the authoritative due-date list; this table is the per-batch
math behind it. Assumes a start date of **2026-09-17** (tomorrow), pure sequential solo
work, 5-day weeks, with a modest review-fix buffer built into each size band (matching the
multi-PR pattern seen on Services). Adjust the start date, sizing, or order and I'll
recompute both this table and the milestone dates above.

| Size | Assumption | Typical batch |
|------|------------|----------------|
| S | Standard content page(s), existing patterns, low iteration | 1–2 days/page |
| M | New sections/patterns needed, moderate iteration | 2–3 days/page |
| L | Flagship/hero-heavy page or family, high iteration (Services-calibrated) | 3–4+ days/page equivalent |

| # | Batch | Size | Est. working days | Draft start | Draft due | Feeds milestone |
|---|-------|------|--------------------|-------------|-----------|------------------|
| 1 | Services Family (remaining: 6 subpages) | L | 18 | 2026-09-17 | 2026-10-10 | Priority Pages Complete |
| 2 | Shared Foundations (5 pages) | M | 10 | 2026-10-13 | 2026-10-24 | Core Site Pages Complete |
| 3 | About Family (5 pages) | M–L | 13 | 2026-10-27 | 2026-11-12 | Core Site Pages Complete |
| 4 | Solutions Family (5 pages) | M | 11 | 2026-11-13 | 2026-11-27 | Core Site Pages Complete |
| 5 | AI Mega Page (1 page, heaviest single build) | L | 9 | 2026-11-30 | 2026-12-10 | AI Mega Page Complete |
| 6 | Pre-Launch Manual QA (all pages/areas) | M | 5 | 2026-12-11 | 2026-12-17 | Pre-Launch Manual QA Complete |
| 7 | Launch (go-live event) | S | 1–2 | 2026-12-18 | 2026-12-19 | Launch |
| 8 | Post-Launch Manual QA (staging-to-live + live monitoring) | S | 2–3 | 2026-12-19 | 2026-12-22 | Post-Launch Manual QA Complete |
| — | Technical Fixes (icon padding) — bug fix, no milestone | S | 0.5–1 | opportunistic | slots in anywhere, non-blocking | *(none)* |

**Total critical path**: ~70 working days ≈ **14 calendar weeks** from 2026-09-17, landing
around **2026-12-22** if run back-to-back with no gaps. This is a draft floor, not a
committed date — it has zero slack for illness, client delay, or scope growth, which is a
real risk given the last plan's dates were already blown.

---

## Dependency Graph

- **Services Family** has no upstream dependency — can start immediately (confirmed
  priority #1).
- **Shared Foundations** blocks About/Solutions/AI Mega Page indirectly: those batches'
  pages link to Work archive, Contact, Free Consultation, etc. Building it second (rather
  than first) means About/Solutions patterns get built referencing placeholder links until
  Foundations lands — flagged as a risk below, not a blocker to sequencing Services first.
- **About Family** and **Solutions Family** have no dependency on each other — could swap
  order freely if priorities change.
- **AI Mega Page** depends on **AI Services** (in Services Family) and **AI Solutions** (in
  Solutions Family) existing first, per the project's own stated design (it consolidates
  their content) — it cannot start before both of those land.
- **Pre-Launch Manual QA** depends on all page-build batches (1–5) having working drafts —
  it cannot meaningfully cover "all pages" until they exist.
- **Post-Launch Manual QA** depends on Pre-Launch QA passing and an actual launch/staging
  promotion happening.
- **Technical Fixes** (icon padding) has no dependency — can be slotted in whenever
  convenient without affecting the critical path.

---

## Batches

Each batch below becomes one `/speckit-specify` feature spec. Pages within a batch are
modeled as separate user stories (P1, P2…) inside that spec's `spec.md`, so `/speckit-tasks`
decomposes them into independently testable phases per page.

### 1. Services Family — priority batch
- LS-1598 — Services (in progress — first spec here should retro-fit the spec against
  existing code, then run `/speckit-converge` rather than assuming a blank slate)
- LS-645 — Discovery
- LS-654 — Design
- LS-2592 — Development
- LS-2593 — Hosting
- LS-2597 — Support
- LS-2601 — AI Services

### 2. Shared Foundations
- LS-1600 — Work archive
- LS-1601 — Insights archive
- LS-1604 — Free Consultation
- LS-1605 — Contact and legal pages
- LS-2595 — Contact thank-you page

### 3. About Family
- LS-1602 — About
- LS-1603 — About/Process
- LS-2602 — Team
- LS-2603 — Culture
- LS-2604 — History

### 4. Solutions Family
- LS-1599 — Solutions
- LS-649 — Tour Operator
- LS-2598 — WordPress
- LS-2599 — WooCommerce
- LS-2600 — AI Solutions

### 5. AI Mega Page
Standalone batch — deliberately built and tested last, per the project's own sequencing
rationale (heaviest visual build, least incremental day-to-day signal), and blocked on
AI Services + AI Solutions per the Dependency Graph above.
- LS-2605 — AI Mega Page

### 6. Pre-Launch Manual QA
New batch (not yet represented by a dedicated Linear issue beyond LS-3716). Manual,
human-executed test plan covering **every page across every batch above**: navigation and
mega-menu click-through, forms end-to-end, search, SEO/redirects, accessibility spot-checks
against the constitution's WCAG 2.1 AA baseline, and light/dark + mobile/tablet/desktop
verification. Must not be marked complete via automated checks alone (constitution
Principle VII — QA & Verification Integrity).
- LS-3716 — Run full-circle staging test plan
- *(new issue, to be created)* — Audit legacy/overlapping pages against the new page
  inventory and decide redirect vs. retire per page, per the project's Phase 2 description.
  No such list exists yet; it can only be built once the new page inventory (batches 1–5) is
  settled, which is why it sits here rather than earlier.
- *(LS-2934, the BugHerd backlog epic, is deliberately excluded here — it's a bug-fix
  backlog by definition, not planned QA work; see "No milestone, by design" above)*

### 7. Launch
The go-live event itself — a distinct, short milestone, not bundled with either QA batch.
- *(no existing issue — created during Linear re-planning)*

### 8. Post-Launch Manual QA
New batch (no existing Linear issue — needs one created once this plan is confirmed).
Manual test plan for the period immediately after launch: staging-to-live checklist, broken
external links, real-user-reported issues, analytics/monitoring sanity checks. Distinct from
Pre-Launch QA because it validates the *live* environment, not staging, and distinct from
the Launch batch because it happens *after* go-live, not during it.
- *(no existing issue — to be created during Linear re-planning)*

### 9. Technical Fixes (bug fix — no milestone)
Small, cross-cutting, not tied to a single page, non-blocking to the critical path, excluded
from milestone tracking per the bug-fix rule.
- LS-4168 — Lightspeed/dot icon renders too small due to excessive SVG padding

---

## Risk Register

| Risk | Impact | Mitigation |
|------|--------|------------|
| Services Family built before Shared Foundations exists | Services pages may link to not-yet-built Work/Contact/Free Consultation pages | Use placeholder-aware linking (nav-ref-resolver pattern already in ls-plugin) and flag broken links for Pre-Launch QA to catch |
| Zero slack in the draft timeline | Any illness/delay/scope growth blows the whole sequence, repeating the current milestone problem | Treat draft due dates as floor estimates; add explicit buffer before pushing to Linear as real milestone dates |
| AI Mega Page hard-blocked on two other batches | If Services or Solutions slips, AI Mega Page slips 1:1 | Keep it last (already planned) so its slip doesn't cascade backward onto other batches |
| Pre-Launch QA is the first batch to touch *every* page | Any defect found here can bounce work back into an already-closed batch | Budget review-fix time in Pre-Launch QA's own estimate (already sized M, not S) rather than assuming zero rework |
| Legacy page redirect/retire audit has no existing list, must be built from scratch | Could run long or surface unexpected overlap once started | Scoped into Pre-Launch Manual QA Complete (batch 6) as its own new issue, not squeezed into an existing one |

---

## Release Acceptance Criteria

A release covering the batches above is acceptance-ready when, per the constitution's
Definition of Done:
- Every page in every batch meets the page-level Definition of Done (resolved tokens,
  accessibility baseline, real cross-device/cross-theme verification, changelog entry).
- Every shared component reused across batches (patterns, template parts, block styles) has
  been checked for reuse and verified in every context it's used, not just its first call site.
- Pre-Launch Manual QA has been genuinely exercised — not represented by the current
  (untrusted) 100% milestone values.
- Post-Launch Manual QA has run at least once against the live environment before this
  release is considered fully closed.
- No test-plan checklist item is checked without having been verified in-session.

## Design Approval Points

- Figma frames are provided **per page, on demand** — not upfront for the whole plan. Each
  batch spec's `/speckit-clarify` pass is where you supply the specific frame links for that
  batch's pages; no batch spec should assume Figma references exist before you provide them.
- Visual work in each batch requires your own review/hand-off checkpoint before
  `/speckit-implement` begins on that batch — this plan does not assume design sign-off has
  already happened for any batch not yet built.

## Reference Environments

- **Figma** — the design source of truth, but supplied incrementally: frames for a given
  page/batch are provided only when that batch's spec work starts, not gathered in advance.
- **Live site — `https://lightspeedwp.agency/`** — **READ-ONLY, no exceptions.** No edits,
  and no attempts at edits, are made to the live site under any circumstance. It is used
  only as a visual/content reference when comparing current-vs-planned pages.
- **Dev/Staging site — `https://ls-agency.lightspeedwp.dev/`** — where these builds land
  first. Also **read-only from this planning/spec-writing context** — referenced for
  comparison when needed, not edited directly as part of spec or planning work. Actual
  deployment to it happens through the project's normal build/push process, not through
  ad hoc edits made while comparing pages.

## Next Step

Only after this plan is reviewed: begin the first batch spec (**Services Family**, retro-
fitted against the in-progress work, then the remaining 6 subpages), then proceed through
the remaining batches in the order above. Linear re-planning happens only after each batch's
spec/plan/tasks have been reviewed — not before, and not via `/speckit-taskstoissues` (that
command is GitHub-only and does not apply to this Linear-tracked project). That re-planning
pass will:
- move the 23 open issues (plus the two tracking epics) out of "Core & depth pages built"
  and into the six new milestones defined above — the milestone section is the map for that;
- leave "Foundation complete," "Launch" (old), "QA Testing," and "Site-wide integration QA
  complete" untouched, since none of them have open issues in them;
- create the new "Launch" and "Post-Launch Manual QA Complete" milestones and the missing
  Post-Launch QA issue;
- leave every bug-fix issue (LS-2940, LS-3222, LS-4168, LS-2934) and every out-of-scope issue
  unassigned to any milestone, exactly as this plan has them.
