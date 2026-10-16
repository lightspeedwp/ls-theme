# Data Model: Button and Container Horizontal Overflow Coverage (LSA-187)

In-memory shapes only; nothing is persisted.

## Measured element

| Field | Meaning |
|---|---|
| `text` | Trimmed visible text of the button (fallback `aria-label`, then `(no text)`) |
| `left`, `right`, `width`, `height` | Bounding box in CSS px, rounded |
| `section` | Section label (see research R-4) |

Excluded when `width === 0`, `height === 0`, or inside `.mobile-menu`.

## Container

| Field | Meaning |
|---|---|
| `kind` | `viewport`, `button-row` or `panel` |
| `left`, `right`, `width` | Bounds in CSS px |

A button has up to three containers: the viewport (always), its nearest `.wp-block-buttons` row, and its nearest bordered/backgrounded panel.

## Overflow finding

| Field | Meaning |
|---|---|
| `section` | Pattern or section label |
| `text` | Button text |
| `elementWidth` | Button width |
| `containerWidth` | Width of the container exceeded |
| `containerKind` | `viewport`, `button-row` or `panel` |
| `side` | `left`, `right` or `both` |
| `overshoot` | px beyond the container on that side (must be > 1) |
| `viewportWidth`, `url` | Where it was found |

## Rules

- Fail when `left < -1` or `right > viewportClientWidth + 1`, or overshoot of a container > 1px on either side. The 1px tolerance is the same everywhere.
- One finding per button per container. A `.wp-block-button` wrapper and the `.wp-block-button__link` inside it are one button: measure the link, and measure the wrapper only when it contains no link. The same button failing against two containers yields two findings.
- Every finding is reported, uncapped, as its own soft assertion so each has its own failure identity.
