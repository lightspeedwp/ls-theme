# Dark Mode Switcher Implementation Guide

## Overview

This implementation provides a **fast, flicker-free light/dark mode toggle** without requiring page reloads. The user's preference is persisted via localStorage and applied automatically on subsequent visits.

## How It Works

### Architecture

1. **CSS Variables Output** (`wp_head`)
   - Both light mode (from theme.json defaults) and dark mode (from dark.json) CSS variables are output inline in a `<style>` tag
   - Dark mode variables are scoped to `body.dark-mode` selector
   - This means the page loads with all variables available immediately

2. **JavaScript Initialization** (inline script)
   - Detects saved mode preference from localStorage
   - Applies `body.dark-mode` class before DOMContentLoaded to prevent flicker
   - Event listeners added for the switcher button

3. **Toggle Action**
   - When user clicks the switcher, JavaScript toggles `body.dark-mode` class
   - Preference saved to localStorage (and cookie for server-side use)
   - No page reload required—colors change instantly

### Flow Diagram

```
Page Load
   ↓
[wp_head] Output dark.json CSS variables scoped to body.dark-mode
   ↓
[wp_enqueue_scripts] Enqueue mode-switcher.js (inline strategy)
   ↓
JavaScript: Check localStorage for saved mode
   ↓
JavaScript: Apply body.dark-mode class if needed (before DOMContentLoaded)
   ↓
Page renders with correct mode applied
   ↓
User clicks switcher button
   ↓
JavaScript toggles body.dark-mode class
   ↓
CSS variables change instantly (no reload)
   ↓
JavaScript saves preference to localStorage + cookie
```

## Implementation Files

### 1. `/inc/mode-switcher.php`
Core PHP functions:

- **`output_dark_mode_css()`** - Outputs inline CSS with dark mode variables from dark.json
- **`enqueue_mode_switcher_script()`** - Enqueues the JavaScript switcher
- **`get_mode_switcher_button()`** - Returns HTML for the switcher button
- **`display_mode_switcher_button()`** - Displays the switcher button (template wrapper)
- **`get_mode_preference()`** - Server-side helper to detect current mode preference

### 2. `/assets/js/mode-switcher.js`
Client-side logic:

- Manages localStorage and cookie persistence
- Handles toggle functionality
- Updates button UI based on current mode
- Applies/removes body classes
- Dispatches custom events for other scripts to listen to

### 3. `/assets/css/mode-switcher.css`
Optional styling for the switcher button. Can be customized to match your design.

## Usage

### Basic Implementation

Add the switcher button to your template (e.g., header, footer, or custom location):

```php
<?php
// In your template file (e.g., header.php or parts/header.php)
if ( function_exists( 'ls_theme\\includes\\display_mode_switcher_button' ) ) {
	ls_theme\includes\display_mode_switcher_button();
}
?>
```

Or use the getter function to customize placement:

```php
<?php
if ( function_exists( 'ls_theme\\includes\\get_mode_switcher_button' ) ) {
	echo ls_theme\includes\get_mode_switcher_button();
}
?>
```

### Custom Styling

Customize the button via custom arguments:

```php
<?php
$args = array(
	'label_light' => esc_html__( '☀️ Light', 'ls-theme' ),
	'label_dark'  => esc_html__( '🌙 Dark', 'ls-theme' ),
	'class'       => 'my-custom-switcher-class',
);
echo ls_theme\includes\get_mode_switcher_button( $args );
?>
```

### Enqueue the Optional CSS

If you want to use the default button styles, enqueue the CSS in `functions.php`:

```php
wp_enqueue_style(
	'ls-theme-mode-switcher',
	get_template_directory_uri() . '/assets/css/mode-switcher.css',
	array(),
	wp_get_theme()->get( 'Version' )
);
```

### Listen for Mode Changes (JavaScript)

Other scripts can listen for the custom event when mode changes:

```javascript
document.addEventListener( 'lsThemeModeChanged', function( event ) {
	console.log( 'Mode changed to:', event.detail.mode );
	// Trigger any additional updates if needed
} );
```

## Server-Side Mode Detection

For server-side rendering where you need to know the current mode (e.g., for generating different initial HTML):

```php
<?php
use ls_theme\includes;

$current_mode = includes\get_mode_preference();
if ( 'dark' === $current_mode ) {
	// Load dark mode specific resources, etc.
}
?>
```

**Note:** This relies on a cookie set by the JavaScript. On the very first visit, it will default to 'light' until the user sets a preference.

## CSS Structure

### Default Light Mode (from `theme.json`)
Your main `theme.json` defines the light mode colors. Example:

```json
{
	"settings": {
		"color": {
			"palette": [
				{ "slug": "base", "color": "#ffffff" },
				{ "slug": "contrast", "color": "#111111" }
			]
		}
	}
}
```

CSS output:
```css
:root {
	--wp--preset--color--base: #ffffff;
	--wp--preset--color--contrast: #111111;
}
```

### Dark Mode (from `dark.json`)
The dark.json file defines overrides for dark mode:

```json
{
	"version": 2,
	"title": "Dark",
	"settings": {
		"color": {
			"palette": [
				{ "slug": "base", "color": "#111111" },
				{ "slug": "contrast", "color": "#ffffff" }
			]
		}
	}
}
```

CSS output (automatically generated):
```css
body.dark-mode {
	--wp--preset--color--base: #111111;
	--wp--preset--color--contrast: #ffffff;
}
```

When `body.dark-mode` is present, all elements using these CSS variables will instantly reflect the dark mode colors.

## Performance Considerations

1. **No Flicker** – JavaScript runs inline and applies mode before page paint
2. **Minimal Layout Shift** – Scoped CSS variables prevent full-page recomputation  
3. **Fast Toggle** – Only DOM class change; no API calls or page reloads
4. **Storage** – localStorage (not session storage) persists across browser sessions
5. **Fallback** – Gracefully degrades if localStorage is disabled

## Browser Support

- Works in all modern browsers (Chrome, Firefox, Safari, Edge)
- localStorage support required for persistence (graceful fallback if unavailable)
- CSS custom properties required (IE11 not supported)

## Troubleshooting

### Page flickers on load
- Ensure the JavaScript is set to `'strategy' => 'inline'` in the enqueue (already done)
- Check that dark.json file exists and is valid JSON

### Colors don't change when toggling
- Verify your CSS uses `var(--wp--preset--color--xxx)` syntax
- Check that dark.json has all necessary color slugs defined
- Open DevTools and inspect `body` for the `dark-mode` class presence

### Preference doesn't persist
- Check that localStorage is enabled in the browser
- Verify JavaScript is loaded and executing (check browser console)
- Check that a cookie `_ls_theme_mode` is being set

### Button doesn't appear
- Verify `get_mode_switcher_button()` or `display_mode_switcher_button()` is called in template
- Check console for any JavaScript errors
- Ensure mode-switcher.js enqueued successfully

## Future Enhancements

- Add theme.json support for `colorScheme` detection (respects OS preference)
- Implement transitions/animations between modes
- Add per-user preference storage (requires user account)
- Multi-theme support (light, dark, auto)

## References

- [WordPress Theme JSON Docs](https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/)
- [CSS Custom Properties (MDN)](https://developer.mozilla.org/en-US/docs/Web/CSS/--*)
- [localStorage API](https://developer.mozilla.org/en-US/docs/Web/API/Window/localStorage)
