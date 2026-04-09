<?php
namespace ls_theme\includes;

/**
 * Dark Mode Switcher.
 *
 * Provides frontend user mode switching (light/dark) without page reload.
 * Stores preference in localStorage and persists across sessions.
 *
 * Strategy:
 * 1. Outputs both light and dark mode CSS variables on page load.
 * 2. JavaScript toggles `body.dark-mode` class to switch between them.
 * 3. Preference persisted via localStorage.
 *
 * @package ls_theme\includes
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Generates CSS custom properties from dark.json for use on the frontend.
 *
 * Parses the dark.json style variation and outputs CSS variables
 * scoped to `body.dark-mode` selector. This avoids re-computing
 * the JSON on each request.
 *
 * @since ls_theme 1.0
 *
 * @return string CSS containing dark mode color variables, or empty string if file not found.
 */
function get_dark_mode_css() {
	$dark_json_path = get_template_directory() . '/styles/dark.json';

	if ( ! file_exists( $dark_json_path ) ) {
		return '';
	}

	$dark_data = json_decode( file_get_contents( $dark_json_path ), true ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents

	if ( ! isset( $dark_data['settings']['color']['palette'] ) || ! is_array( $dark_data['settings']['color']['palette'] ) ) {
		return '';
	}

	$css = 'body.dark-mode {' . "\n";

	foreach ( $dark_data['settings']['color']['palette'] as $color ) {
		if ( ! isset( $color['slug'] ) || ! isset( $color['color'] ) ) {
			continue;
		}

		// Convert palette to CSS custom property format.
		// e.g., slug "accent" becomes --wp--preset--color--accent
		$css .= "\t" . '--wp--preset--color--' . sanitize_key( $color['slug'] ) . ': ' . sanitize_hex_color( $color['color'] ) . ";\n";
	}

	$css .= '}' . "\n";

	// Also apply dark mode text/background styles if defined.
	if ( isset( $dark_data['styles']['color'] ) ) {
		$css .= 'body.dark-mode {' . "\n";
		if ( isset( $dark_data['styles']['color']['background'] ) ) {
			$css .= "\t" . 'background-color: ' . $dark_data['styles']['color']['background'] . ";\n";
		}
		if ( isset( $dark_data['styles']['color']['text'] ) ) {
			$css .= "\t" . 'color: ' . $dark_data['styles']['color']['text'] . ";\n";
		}
		$css .= '}' . "\n";
	}

	return $css;
}

/**
 * Outputs inline CSS containing dark mode variables.
 *
 * Called in wp_head to inject the dark mode CSS before any other stylesheets,
 * ensuring variables are available for immediate use.
 *
 * @since ls_theme 1.0
 */
function output_dark_mode_css() {
	$dark_css = get_dark_mode_css();

	if ( empty( $dark_css ) ) {
		return;
	}

	echo '<style id="ls-theme-dark-mode" type="text/css">' . "\n";
	echo wp_kses_post( $dark_css );
	echo '</style>' . "\n";
}

add_action( 'wp_head', __NAMESPACE__ . '\output_dark_mode_css', 1 );

/**
 * Enqueues mode switcher JavaScript on the frontend.
 *
 * The JS handles:
 * - Applying saved mode preference on page load (no flicker).
 * - Toggling body.dark-mode class when user clicks switcher.
 * - Persisting preference to localStorage.
 *
 * @since ls_theme 1.0
 */
function enqueue_mode_switcher_script() {
	if ( is_admin() ) {
		return;
	}

	wp_enqueue_script(
		'ls-theme-mode-switcher',
		get_template_directory_uri() . '/assets/js/mode-switcher.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => false, 'strategy' => 'inline' ) // Inline to prevent flicker
	);

	// Pass theme data to JS.
	wp_localize_script(
		'ls-theme-mode-switcher',
		'lsThemeModeData',
		array(
			'localStorageKey' => 'ls_theme_mode_preference',
			'defaultMode'    => 'light',
		)
	);
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_mode_switcher_script' );

/**
 * Outputs the mode switcher button HTML.
 *
 * A simple toggle button that can be placed in a header, footer, or custom location.
 * The switcher is invisible until JS loads, then revealed via CSS.
 *
 * @since ls_theme 1.0
 *
 * @param array $args Optional arguments for customization.
 *                     - 'label_light' (string) Light mode label. Default: "Light Mode"
 *                     - 'label_dark' (string) Dark mode label. Default: "Dark Mode"
 *                     - 'class' (string) Custom CSS class for the button. Default: "ls-theme-mode-switcher"
 *
 * @return string HTML for the mode switcher button.
 */
function get_mode_switcher_button( $args = array() ) {
	$defaults = array(
		'label_light' => esc_html__( 'Light Mode', 'ls-theme' ),
		'label_dark'  => esc_html__( 'Dark Mode', 'ls-theme' ),
		'class'       => 'ls-theme-mode-switcher',
	);

	$args = wp_parse_args( $args, $defaults );

	$button_html = sprintf(
		'<button id="ls-theme-mode-switcher" class="%s" aria-label="%s" title="%s" type="button">
			<span class="ls-theme-mode-label">%s</span>
			<svg class="ls-theme-mode-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
				<path class="ls-theme-mode-icon-light" d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z" style="display:none;"></path>
				<circle class="ls-theme-mode-icon-dark" cx="12" cy="12" r="5"></circle>
				<line class="ls-theme-mode-icon-dark" x1="12" y1="1" x2="12" y2="3"></line>
				<line class="ls-theme-mode-icon-dark" x1="12" y1="21" x2="12" y2="23"></line>
				<line class="ls-theme-mode-icon-dark" x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
				<line class="ls-theme-mode-icon-dark" x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
				<line class="ls-theme-mode-icon-dark" x1="1" y1="12" x2="3" y2="12"></line>
				<line class="ls-theme-mode-icon-dark" x1="21" y1="12" x2="23" y2="12"></line>
				<line class="ls-theme-mode-icon-dark" x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
				<line class="ls-theme-mode-icon-dark" x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
			</svg>
		</button>',
		esc_attr( $args['class'] ),
		esc_attr( sprintf( 'Switch to %s', 'light' === get_mode_preference() ? $args['label_dark'] : $args['label_light'] ) ),
		esc_attr( sprintf( 'Switch to %s', 'light' === get_mode_preference() ? $args['label_dark'] : $args['label_light'] ) ),
		esc_html( 'light' === get_mode_preference() ? $args['label_dark'] : $args['label_light'] )
	);

	return $button_html;
}

/**
 * Displays the mode switcher button (wrapper for get_mode_switcher_button).
 *
 * @since ls_theme 1.0
 *
 * @param array $args Optional arguments. See get_mode_switcher_button().
 */
function display_mode_switcher_button( $args = array() ) {
	echo get_mode_switcher_button( $args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Gets the user's current mode preference from localStorage via cookie fallback.
 *
 * For server-side detection (used in PHP), checks for a _ls_theme_mode cookie.
 * The cookie is set by the JavaScript on each update.
 *
 * @since ls_theme 1.0
 *
 * @return string Either 'light' or 'dark'. Defaults to 'light'.
 */
function get_mode_preference() {
	// Check for cookie first (set by JS).
	if ( isset( $_COOKIE['_ls_theme_mode'] ) ) {
		return 'dark' === sanitize_text_field( wp_unslash( $_COOKIE['_ls_theme_mode'] ) ) ? 'dark' : 'light';
	}

	return 'light';
}

/**
 * Merges dark mode colours into theme.json when dark mode is active.
 *
 * Uses the same filter strategy as modular presets and only applies
 * colour-related settings/styles from dark.json for dark-mode requests.
 *
 * @since ls_theme 1.1
 *
 * @param WP_Theme_JSON_Data $theme_json The theme JSON data object.
 * @return WP_Theme_JSON_Data The modified theme JSON data object.
 */
function merge_dark_mode_theme_json( $theme_json ) {
	if ( 'dark' !== get_mode_preference() ) {
		return $theme_json;
	}

	$dark_json_path = get_template_directory() . '/styles/dark.json';

	if ( ! file_exists( $dark_json_path ) ) {
		return $theme_json;
	}

	$dark_data = json_decode( file_get_contents( $dark_json_path ), true ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents

	if ( ! is_array( $dark_data ) ) {
		return $theme_json;
	}

	$dark_color_overrides = array();

	if ( isset( $dark_data['settings']['color'] ) && is_array( $dark_data['settings']['color'] ) ) {
		$dark_color_overrides['settings']['color'] = $dark_data['settings']['color'];
	}

	if ( isset( $dark_data['styles']['color'] ) && is_array( $dark_data['styles']['color'] ) ) {
		$dark_color_overrides['styles']['color'] = $dark_data['styles']['color'];
	}

	if ( empty( $dark_color_overrides ) ) {
		return $theme_json;
	}

	$theme_json->update_with( $dark_color_overrides );

	return $theme_json;
}

add_filter( 'wp_theme_json_data_theme', __NAMESPACE__ . '\merge_dark_mode_theme_json', 200 );

