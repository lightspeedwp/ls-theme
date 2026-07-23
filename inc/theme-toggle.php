<?php
/**
 * Client-side light/dark mode toggle.
 *
 * WordPress's own light/dark "mode" is a full theme.json style variation (styles/dark.json)
 * picked by an admin in the Site Editor — there is no built-in mechanism for a site visitor to
 * switch between variations at runtime. assets/css/theme-toggle.css (generated from theme.json +
 * styles/dark.json by `node theme-utils.mjs generate-theme-toggle`) re-points every semantic
 * custom colour/shadow property under a `:root[data-theme="…"]` selector, and this file wires up
 * the inline no-flash bootstrap script, the click-handling script, and the stylesheet.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueues the generated theme-toggle stylesheet.
 */
function ls_theme_enqueue_theme_toggle_style() {
	$path = 'assets/css/theme-toggle.css';

	wp_enqueue_style(
		'ls-theme-toggle',
		get_theme_file_uri( $path ),
		array(),
		ls_theme_get_local_asset_version( $path )
	);
}
add_action( 'wp_enqueue_scripts', 'ls_theme_enqueue_theme_toggle_style' );

/**
 * Enqueues the theme-toggle click handler script.
 */
function ls_theme_enqueue_theme_toggle_script() {
	$path = 'assets/js/theme-toggle.js';

	wp_enqueue_script(
		'ls-theme-toggle',
		get_theme_file_uri( $path ),
		array(),
		ls_theme_get_local_asset_version( $path ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'ls_theme_enqueue_theme_toggle_script' );

/**
 * Outputs a tiny inline bootstrap script as early as possible in <head>, applying any stored
 * mode preference before first paint to avoid a flash of the wrong theme.
 */
function ls_theme_output_theme_toggle_bootstrap() {
	?>
	<script>
	(function () {
		try {
			var stored = localStorage.getItem( 'ls-theme-mode' );
			if ( 'light' === stored || 'dark' === stored ) {
				document.documentElement.setAttribute( 'data-theme', stored );
			}
		} catch ( error ) {}
	})();
	</script>
	<?php
}
add_action( 'wp_head', 'ls_theme_output_theme_toggle_bootstrap', 0 );
