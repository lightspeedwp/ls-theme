# **Figma Make Gap Analysis**

---

[Purpose](#purpose)

[Summary matrix](#summary-matrix)

[Highest-priority gaps](#highest-priority-gaps)

[Decisions needed before implementation](#decisions-needed-before-implementation)

[Recommended implementation order](#recommended-implementation-order)

[Known anomalies to carry forward](#known-anomalies-to-carry-forward)

[Checklist handoff](#checklist-handoff)

---

## **Purpose**

This document reduces the full report set into implementation workstreams.

Use it as the bridge between the architecture reports and the granular checklist in `.github/tasks/`.

## **Summary matrix**

| Workstream                       | Current state | Why it matters                                                                                 | Immediate deliverables                                                          |
| -------------------------------- | ------------- | ---------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------- |
| Page and route coverage          | Weak          | The first report pass under-captured the real prototype surface                                | Use the page inventory report and granular checklist as the new source of truth |
| Token foundation                 | Strong        | The theme already has the semantic depth needed for the design system                          | Preserve and extend, do not rewrite wholesale                                   |
| Style variations                 | Weak          | Mode switching needs semantic parity across light and dark                                     | Rebuild `light.json` and `dark.json`                                            |
| Template hierarchy               | Weak          | The prototype is archetype-driven and the current templates are mostly shells                  | Build missing templates and flesh out existing ones                             |
| Template parts                   | Partial       | Global chrome is the right direction, but page content is still leaking into parts             | Keep only global parts and move hero or breadcrumbs logic into patterns         |
| Pattern catalogue                | Weak          | The prototype depends on a broad reusable catalogue, and the current theme has only a seed set | Build the archetype-critical pattern set first                                  |
| Block and section styles         | Weak          | Most JSON style files are not active editor features                                           | Register real styles and remove or wire dormant contracts                       |
| Prototype-only surface filtering | Missing       | The Make file includes demo and internal routes that should not automatically ship             | Mark reference-only surfaces explicitly                                         |
| Interaction layer                | Partial       | The runtime architecture is sound, but coverage is narrow                                      | Expand only where patterns and templates justify it                             |
| Accessibility and QA             | Weak          | The prototype treats accessibility and resilience as non-negotiable                            | Add formal QA once the first implementation slice exists                        |

## **Highest-priority gaps**

### 1. Missing source-driven page coverage in the build plan

The key gap was not only code. It was planning fidelity. The route and page surface in the prototype is broader than the earlier report bundle captured.

### 2. Missing public template coverage

The theme still lacks `search.html`, taxonomy templates, `home.html`, and the content-model decisions needed for Work, Testimonial, Video, and Podcast template families.

### 3. Sparse pattern catalogue

The recovered prototype expects a ten-category pattern system with hub, detail, utility, and state coverage. The theme currently has only a small seed set.

### 4. No hard boundary yet between public pages and prototype-only reference surfaces

Without that boundary, the build can easily drift into shipping style guides, demos, or dev-tool routes that should remain internal.

### 5. Dormant styles and variation mismatch

Several block-style contracts are not registered, and the light or dark style variations still do not map cleanly to the root semantic token model.

## **Decisions needed before implementation**

### Decision 1: Content model

Confirm whether Work, Testimonials, Videos, Podcasts, Services, Solutions, and Systems are Page-based, CPT-based, or hybrid.

### Decision 2: Reference-only surfaces

Confirm which prototype-only routes stay internal and which, if any, should become public deliverables.

### Decision 3: Post-format scope

Confirm whether post-format demo routes are purely reference material or part of the live editorial strategy.

### Decision 4: Pattern slug migration

Confirm whether early flat slugs such as `ls-theme/header` should be migrated immediately to the category-first catalogue scheme.

### Decision 5: Default visual mode

Confirm whether the live theme remains light-first by default or shifts closer to the prototype’s darker presentation.

## **Recommended implementation order**

1. Lock public page scope and final content model.
2. Finalise the template hierarchy and part boundary.
3. Build the archetype-critical pattern catalogue.
4. Register and wire the block and section styles that those patterns require.
5. Expand the interaction layer only where approved patterns need enhancement.
6. Add editorial locking rules and content governance pattern by pattern.
7. Run accessibility, responsive, and performance QA.

## **Known anomalies to carry forward**

1. `parts/breadbrumbs.html` is misspelled and should be corrected during implementation.
2. `button-cta` is currently an unwired contract rather than a functioning style.
3. `styles/blocks/` and `styles/sections/` should not be treated as automatically active.
4. `archive.html`, `single.html`, `page.html`, and `404.html` are still shells rather than archetype templates.
5. Hero and breadcrumbs still appear in the part layer conceptually even though the prototype treats them as patterns.

## **Checklist handoff**

The revised checklist should now track work at the following level of granularity:

- individual template files and template families
- each retained template part
- public page families and reference-only route decisions
- pattern categories and individual launch patterns
- block styles and section styles
- plugin ownership decisions and launch capabilities
- QA and validation work

That keeps the implementation order aligned with the prototype’s system-first model while still being detailed enough to execute page by page.
