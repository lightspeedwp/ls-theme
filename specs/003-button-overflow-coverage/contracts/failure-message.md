# Contract: Failure message format

The soft assertion message is consumed by humans and by `tests/helpers/failure-signature.ts`. Keep the first line and the per-offender line shape stable.

```text
Button overflow at <viewportWidth>px on <url>: 1 element(s) outside their container
  <section label> | "<button text>" | <side> of <container kind> | element <w>px, container <w>px | over by <n>px
```

- `<side>`: `left`, `right`, or `left+right`.
- `<container kind>`: `viewport`, `button-row` or `panel`.
- One soft assertion per offender, each with the first line above and a single offender line, so every offender has its own failure identity and BugHerd signature.
- Signature (BugHerd): `button-overflow:<section label>|<button text>|<side>`. Excludes viewport width, URL, and pixel sizes so one defect across pages and widths is one task.
- Document-wide failures keep their existing message ("Horizontal overflow at ... Likely offenders") and signature.
