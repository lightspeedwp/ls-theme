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
| 1 | **Priority Pages Complete** | Services Family, 21 pages: LS-1598, LS-645, LS-654, LS-2592, LS-2593, LS-2597, LS-2601 (originally tracked) + LS-4179–LS-4184 (phase pages: Discover, Create, Build, Launch, Grow, Evolve) + LS-4185–LS-4192 (newly-tracked services: Content, Migrations, Performance, Security, Training, SEO, Accessibility, Email Marketing) + LS-1203 (epic: website-rebuild — Plan Phase 1 MVP scope) | 2026-11-20 |
| 2 | **Core Site Pages Complete** | LS-1600, LS-1601, LS-1604, LS-1605, LS-2595 (Shared Foundations) + LS-1602, LS-1603, LS-2602, LS-2603, LS-2604 (About) + LS-1599, LS-649, LS-2598, LS-2599, LS-2600 (Solutions) + LS-1596 (epic: phase-1-page-builds) | 2027-01-07 |
| 3 | **AI Mega Page Complete** | LS-2605 | 2027-01-20 |
| 4 | **Pre-Launch Manual QA Complete** | LS-3716 (full-circle staging test plan) + LS-4176 (audit legacy/overlapping pages and decide redirect vs. retire per page) | 2027-01-27 |
| 5 | **Website Launch** | *(created; no issues assigned — this is the go-live event itself, distinct from milestone 6. Named "Website Launch" not "Launch" since Linear enforces unique milestone names and "Launch" already existed, closed)* | 2027-01-29 |
| 6 | **Post-Launch Manual QA Complete** | LS-4177 (run post-launch manual QA — staging-to-live checklist, live monitoring) | 2027-02-03 |

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

26 milestone-assigned + 4 bug-bucket + 9 out-of-scope = **39 of 39 open issues accounted for**
as of the initial re-planning pass. This count is superseded by the 2026-09-16 scope
correction below: 14 more issues (LS-4179–LS-4192) were created after the Services Family
spec's `/speckit-clarify` session surfaced the phase-page architecture, bringing total
tracked issues to 53, all still accounted for (40 milestone-assigned + 4 bug-bucket + 9
out-of-scope). No issue is silently missing a category.

---

## Resourcing & Review Model

- **Planning vs. implementation are separate phases.** All 7 batch specs (`spec.md` →
  `plan.md` → `tasks.md`, via `/speckit-clarify` and `/speckit-plan`) are written in one
  planning session, before any implementation begins on any batch. Implementation only
  starts once you explicitly say so, batch by batch — it is not triggered by a spec being
  finished.
- **Implementation is not run via `/speckit-implement`.** Instead, each page-build task is
  handed to a coding agent directly; that agent works the task interactively with you rather
  than executing the full task list unattended.
- **Build**: solo (you), with AI-agent assistance. Once implementation starts, batches run
  **sequentially**, not in parallel — one batch is fully implemented before the next starts,
  unless you explicitly pull one forward.
- **Spec review/approval**: you are the sole sign-off on each batch spec before it proceeds
  to `/speckit-plan`. No external/client review gate is assumed in these dates — if that
  changes, every downstream date needs a wait-time buffer added.
- **Velocity calibration**: based on actual repo history for the Services page
  (`feature/ls-1598-*` branches), a single flagship page with heavy review/iteration took
  ~7 working days across ~49 commits and multiple PR review-fix cycles (2026-09-07 →
  2026-09-16, still closing out). That is the anchor for "L" sizing below — everything else
  is sized relative to it, not from scratch. **The batch-sizing dates below are
  implementation-phase estimates only** — since all specs are written before implementation
  starts, the real start date is whatever date you choose after every spec is reviewed and
  approved, not the date this planning session happens.

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
| 1 | Services Family (21 pages: hub + 6 phase pages + 14 service pages — expanded 2026-09-16, was 7 pages) | L | 47 | 2026-09-17 | 2026-11-20 | Priority Pages Complete |
| 2 | Shared Foundations (5 pages) | M | 10 | 2026-11-23 | 2026-12-04 | Core Site Pages Complete |
| 3 | About Family (5 pages) | M–L | 13 | 2026-12-07 | 2026-12-23 | Core Site Pages Complete |
| 4 | Solutions Family (5 pages) | M | 11 | 2026-12-24 | 2027-01-07 | Core Site Pages Complete |
| 5 | AI Mega Page (1 page, heaviest single build) | L | 9 | 2027-01-08 | 2027-01-20 | AI Mega Page Complete |
| 6 | Pre-Launch Manual QA (all pages/areas) | M | 5 | 2027-01-21 | 2027-01-27 | Pre-Launch Manual QA Complete |
| 7 | Website Launch (go-live event) | S | 1–2 | 2027-01-28 | 2027-01-29 | Website Launch |
| 8 | Post-Launch Manual QA (staging-to-live + live monitoring) | S | 2–3 | 2027-02-01 | 2027-02-03 | Post-Launch Manual QA Complete |
| — | Technical Fixes (icon padding) — bug fix, no milestone | S | 0.5–1 | opportunistic | slots in anywhere, non-blocking | *(none)* |

**Total critical path**: ~99 working days ≈ **20 calendar weeks** from 2026-09-17, landing
around **2027-02-03** if run back-to-back with no gaps. This is a draft floor, not a
committed date — it has zero slack for illness, client delay, or scope growth, which is a
real risk given the last plan's dates were already blown.

**Why batch 1 nearly tripled (18→47 working days)**: the original Services Family estimate
covered only 6 tracked subpages plus the hub. Clarifying this batch's spec on 2026-09-16
surfaced that the Services section actually has 6 lifecycle-phase pages (Discover, Create,
Build, Launch, Grow, Evolve) and 14 total service pages, of which only 6 had a Linear issue.
The other 14 pages had no tracked estimate at all before today. This is a real scope
correction, not padding — every downstream batch's date shifted by the same ~29 working days
(~6 weeks) as a direct result.

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

### 1. Services Family — priority batch (21 pages, expanded 2026-09-16)

Real architecture is hub → 6 lifecycle-phase pages → 14 service pages grouped under them
(confirmed against the live design and dev site during this batch's `/speckit-clarify`
session) — not the flat hub + 6 subpages originally assumed. See
`specs/001-services-family/spec.md` for the full phase→service mapping and user stories.

**Hub**:
- LS-1598 — Services (in progress — first spec here should retro-fit the spec against
  existing code, then run `/speckit-converge` rather than assuming a blank slate)

**Phase pages** (no prior Linear issue — created 2026-09-16):
- LS-4179 — Discover
- LS-4180 — Create
- LS-4181 — Build
- LS-4182 — Launch
- LS-4183 — Grow
- LS-4184 — Evolve

**Service pages, originally tracked**:
- LS-645 — Discovery (under Discover)
- LS-654 — Design (under Create)
- LS-2592 — Development (under Build)
- LS-2593 — Hosting (under Launch)
- LS-2597 — Support (under Grow)
- LS-2601 — AI Services (under Evolve)

**Service pages, newly tracked** (no prior Linear issue — created 2026-09-16):
- LS-4185 — Content (under Create)
- LS-4186 — Migrations (under Build)
- LS-4187 — Performance (under Launch)
- LS-4188 — Security (under Launch)
- LS-4189 — Training (under Launch)
- LS-4190 — SEO (under Grow)
- LS-4191 — Accessibility (under Grow)
- LS-4192 — Email Marketing (under Grow)

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
- LS-4176 — Audit legacy/overlapping pages against the new page inventory and decide
  redirect vs. retire per page, per the project's Phase 2 description. No such list existed;
  it can only be actioned once the new page inventory (batches 1–5) is settled, which is why
  it sits here rather than earlier.
- *(LS-2934, the BugHerd backlog epic, is deliberately excluded here — it's a bug-fix
  backlog by definition, not planned QA work; see "No milestone, by design" above)*

### 7. Website Launch
The go-live event itself — a distinct, short milestone, not bundled with either QA batch. Named "Website Launch" (not "Launch") because Linear enforces unique milestone names per project and a closed, unrelated "Launch" milestone already existed.
- *(milestone created; no issue assigned)*

### 8. Post-Launch Manual QA
New batch (no existing Linear issue — needs one created once this plan is confirmed).
Manual test plan for the period immediately after launch: staging-to-live checklist, broken
external links, real-user-reported issues, analytics/monitoring sanity checks. Distinct from
Pre-Launch QA because it validates the *live* environment, not staging, and distinct from
the Launch batch because it happens *after* go-live, not during it.
- LS-4177 — Run post-launch manual QA (staging-to-live checklist, live monitoring)

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

- Figma frames are provided **per page, at implementation time** — not upfront for the whole
  plan, and not even upfront per batch. Batch specs (`spec.md`/`plan.md`/`tasks.md`) are
  written without Figma references, since spec-writing is about WHAT/WHY, not visual
  implementation detail.
- Every page-build user story's task list carries its own blocking prerequisite task:
  requesting that specific page's Figma frame from you before any other task in that story
  starts. Whichever coding agent picks up the task hits this line first — it is a structural
  part of `tasks.md`, not a hope that the agent remembers to ask. Non-page-build batches
  (Pre-Launch QA, Website Launch, Post-Launch QA) carry no such task.
- Visual work in each batch requires your own review/hand-off checkpoint at implementation
  time — this plan does not assume design sign-off has already happened for any batch not
  yet built.

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

## Linear Re-Planning — Completed 2026-09-16

The Linear re-planning pass described in earlier drafts of this section has been executed:
- Created the six new milestones (Priority Pages Complete, Core Site Pages Complete, AI Mega
  Page Complete, Pre-Launch Manual QA Complete, Website Launch, Post-Launch Manual QA
  Complete) with the draft due dates above.
- Moved all 23 open page-build issues plus the two tracking epics (LS-1203, LS-1596) out of
  "Core & depth pages built" and into the milestones defined above.
- Left "Foundation complete," "Launch" (old, closed), "QA Testing," and "Site-wide
  integration QA complete" fully untouched — confirmed via `list_milestones` that "Core &
  depth pages built" now correctly shows 100% (it only holds its original 4 Done items).
- Created LS-4176 (legacy-page redirect/retire audit) and LS-4177 (post-launch manual QA),
  assigned to their respective milestones.
- The new "Launch" milestone was created as **"Website Launch"** instead — Linear enforces
  unique milestone names per project, and the old closed "Launch" milestone already existed.
- Left every bug-fix issue (LS-2940, LS-3222, LS-4168, LS-2934) and every out-of-scope issue
  unassigned to any milestone, exactly as this plan specified.

### Follow-up — Services Family scope correction (2026-09-16, same day)

Writing the Services Family spec (`/speckit-specify` → `/speckit-clarify`) surfaced that the
batch was undercounted: 21 pages (hub + 6 phase pages + 14 service pages), not 7. Of the 14
service/phase pages beyond the hub, only 6 had a Linear issue. This was corrected the same
day:
- Created 14 new issues (LS-4179–LS-4192), matching the exact structure of sibling page-build
  issues (title format, task checklist, DoR/DoD, `parentId: LS-1596`, labels, priority).
- Assigned all 14 to Brandon, priority Medium, estimate S (phase pages) / M (service pages),
  milestone **Priority Pages Complete** — the same milestone as the rest of this batch.
- Verified all 14 independently via `list_issues` after creation — no drift from the create
  calls.
- Re-sized batch 1 from 18 to 47 working days, which cascaded every subsequent batch's draft
  date by the same ~29 working days (~6 weeks) — see the Batch Sizing table above for the
  updated schedule (now ending 2027-02-03, not 2026-12-22) and its "why batch 1 nearly
  tripled" note.

## Planning Complete — 2026-09-16

All 7 batches now have a complete `spec.md` → `plan.md` → `tasks.md` cycle:

| Batch | Spec | Pages/Scope | Status |
|---|---|---|---|
| 1 | `specs/001-services-family` | 21 pages (hub + 6 phases + 14 services) | Planned |
| 2 | `specs/002-core-site-pages` | 25 pages (Shared Foundations + About + Solutions) | Planned |
| 3 | `specs/003-ai-mega-page` | 1 page, blocked on batches 1-2 being built | Planned |
| 4 | `specs/004-prelaunch-manual-qa` | Whole-site staging QA + legacy audit, blocked on batches 1-3 | Planned |
| 5 | `specs/005-website-launch` | Go-live event, blocked on batch 4 | Planned |
| 6 | `specs/006-postlaunch-manual-qa` | Live-site QA + release-plan close-out, blocked on batch 5 | Planned |

No implementation has started on any batch. Every cross-batch dependency (3→1/2, 4→1-3,
5→4, 6→5) is encoded as a structural blocking task in its respective `tasks.md`, not just a
note. Every page-build task in batches 1-2 carries its own blocking Figma-frame-request task.

Along the way, dev-site scope checks (the same diligence used for batch 1's phase-page
discovery) surfaced and corrected two more gaps in batch 2: 4 untracked pages (Accessibility
Commitment, Publishing, Design Systems, LSX) and Policies & Principles being 7 real pages,
not 1 — all now tracked as LS-4193–LS-4203.

## Next Step

Planning for this release is complete. Next is your call: begin implementation on batch 1
(Services Family), starting with the Figma frames for its pages — or revisit anything in
this plan first. Not via `/speckit-taskstoissues` for any future re-planning pass — that
command is GitHub-only and does not apply to this Linear-tracked project.
