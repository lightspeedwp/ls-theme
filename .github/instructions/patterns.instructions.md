---
applyTo: "patterns/**/*.php"
---

# Patterns Instructions

## What Is a Block Pattern?

A block pattern is a predefined block layout registered with WordPress.
Patterns live in `patterns/` and are typically PHP files.

---

## Pattern Header Comments

Every pattern file must start with a valid registration header:

```php
<?php
/**
 * Title: My Pattern Name
 * Slug: ls-theme/my-pattern-name
 * Categories: featured, text
 * Description: A short description.
 * Keywords: hero, banner
 * Viewport Width: 1200
 */
```

---

## Output Escaping in Patterns

Patterns often contain PHP output. All output must be escaped:

```php
// Correct:
echo esc_html( get_bloginfo( 'name' ) );
echo esc_url( home_url( '/' ) );
echo esc_html__( 'Read more', 'ls-theme' );

// Wrong:
echo get_bloginfo( 'name' );
echo home_url( '/' );
```

---

## Block Markup

Prefer block markup in patterns over raw HTML:

```php
?>
<!-- wp:paragraph -->
<p><?php echo esc_html__( 'Example text', 'ls-theme' ); ?></p>
<!-- /wp:paragraph -->
<?php
```

---

## Colour Usage

- If a pattern needs a colour in block attributes, inline styles, or custom CSS variables, use semantic custom colour tokens such as `var(--wp--custom--color--text--default)`.
- Do not reference `var:preset|color|...` or `var(--wp--preset--color--...)` directly in authored pattern styles.
- If the required semantic colour token does not exist yet, create it in `theme.json` and add the exact same token path to `styles/dark.json` before using it.
- Spacing, width, line-height, and other non-colour values may still use presets or hard values where appropriate.

---

## Keep Patterns Focused

- One pattern per file.
- Keep patterns self-contained — do not rely on other patterns.
- Keep patterns accessible — correct heading levels, alt text for images.
- Do not hard-code URLs in patterns — use WordPress functions.
