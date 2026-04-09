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
 * Handles dark/light mode switching behaviour for the theme.
 *
 * @since ls_theme 1.1
 */
class Mode_Switcher {

	/**
	 * Registers WordPress hooks used by the mode switcher.
	 *
	 * @since ls_theme 1.1
	 *
	 * @return void
	 */
	public function register_hooks() {
		add_action( 'wp_head', array( $this, 'output_dark_mode_css' ), 1 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_mode_switcher_script' ) );
		add_filter( 'wp_theme_json_data_theme', array( $this, 'merge_dark_mode_theme_json' ), 200 );
	}

	/**
	 * Generates CSS custom properties from dark.json for use on the frontend.
	 *
	 * @since ls_theme 1.0
	 *
	 * @return string CSS containing dark mode color variables, or empty string if file not found.
	 */
	public function get_dark_mode_css() {
		$dark_data = $this->get_dark_json_data();

		if ( ! isset( $dark_data['settings']['color']['palette'] ) || ! is_array( $dark_data['settings']['color']['palette'] ) ) {
			return '';
		}

		$css = 'body.dark-mode {' . "\n";

		foreach ( $dark_data['settings']['color']['palette'] as $color ) {
			if ( ! isset( $color['slug'] ) || ! isset( $color['color'] ) ) {
				continue;
			}

			$css .= "\t" . '--wp--preset--color--' . sanitize_key( $color['slug'] ) . ': ' . sanitize_hex_color( $color['color'] ) . ";\n";
		}

		$css .= '}' . "\n";

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
	 * @since ls_theme 1.0
	 *
	 * @return void
	 */
	public function output_dark_mode_css() {
		$dark_css = $this->get_dark_mode_css();

		if ( empty( $dark_css ) ) {
			return;
		}

		echo '<style id="ls-theme-dark-mode" type="text/css">' . "\n";
		echo wp_kses_post( $dark_css );
		echo '</style>' . "\n";
	}

	/**
	 * Enqueues mode switcher JavaScript on the frontend.
	 *
	 * @since ls_theme 1.0
	 *
	 * @return void
	 */
	public function enqueue_mode_switcher_script() {
		if ( is_admin() ) {
			return;
		}

		wp_enqueue_script(
			'ls-theme-mode-switcher',
			get_template_directory_uri() . '/assets/js/mode-switcher.js',
			array(),
			wp_get_theme()->get( 'Version' ),
			array( 'in_footer' => false, 'strategy' => 'inline' )
		);

		wp_localize_script(
			'ls-theme-mode-switcher',
			'lsThemeModeData',
			array(
				'localStorageKey' => 'ls_theme_mode_preference',
				'defaultMode'    => 'light',
			)
		);
	}

	/**
	 * Outputs the mode switcher button HTML.
	 *
	 * @since ls_theme 1.0
	 *
	 * @param array $args Optional arguments for customization.
	 * @return string HTML for the mode switcher button.
	 */
	public function get_mode_switcher_button( $args = array() ) {
		$defaults = array(
			'label_light' => esc_html__( 'Light Mode', 'ls-theme' ),
			'label_dark'  => esc_html__( 'Dark Mode', 'ls-theme' ),
			'class'       => 'ls-theme-mode-switcher',
		);

		$args = wp_parse_args( $args, $defaults );

		$next_mode_label = 'light' === $this->get_mode_preference() ? $args['label_dark'] : $args['label_light'];

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
			esc_attr( sprintf( 'Switch to %s', $next_mode_label ) ),
			esc_attr( sprintf( 'Switch to %s', $next_mode_label ) ),
			esc_html( $next_mode_label )
		);

		return $button_html;
	}

	/**
	 * Displays the mode switcher button.
	 *
	 * @since ls_theme 1.0
	 *
	 * @param array $args Optional arguments.
	 * @return void
	 */
	public function display_mode_switcher_button( $args = array() ) {
		echo $this->get_mode_switcher_button( $args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Gets the user's current mode preference from cookie fallback.
	 *
	 * @since ls_theme 1.0
	 *
	 * @return string Either 'light' or 'dark'. Defaults to 'light'.
	 */
	public function get_mode_preference() {
		if ( isset( $_COOKIE['_ls_theme_mode'] ) ) {
			return 'dark' === sanitize_text_field( wp_unslash( $_COOKIE['_ls_theme_mode'] ) ) ? 'dark' : 'light';
		}

		return 'light';
	}

	/**
	 * Merges dark mode colours into theme.json when dark mode is active.
	 *
	 * @since ls_theme 1.1
	 *
	 * @param WP_Theme_JSON_Data $theme_json The theme JSON data object.
	 * @return WP_Theme_JSON_Data The modified theme JSON data object.
	 */
	public function merge_dark_mode_theme_json( $theme_json ) {
		if ( 'dark' !== $this->get_mode_preference() ) {
			return $theme_json;
		}

		$dark_data = $this->get_dark_json_data();

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

	/**
	 * Loads and decodes dark.json.
	 *
	 * @since ls_theme 1.1
	 *
	 * @return array Parsed dark.json data or empty array on failure.
	 */
	private function get_dark_json_data() {
		$dark_json_path = get_template_directory() . '/styles/dark.json';

		if ( ! file_exists( $dark_json_path ) ) {
			return array();
		}

		$dark_data = json_decode( file_get_contents( $dark_json_path ), true ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents

		if ( ! is_array( $dark_data ) ) {
			return array();
		}

		return $dark_data;
	}
}

/**
 * Gets the Mode_Switcher singleton instance.
 *
 * @since ls_theme 1.1
 *
 * @return Mode_Switcher
 */
function mode_switcher() {
	static $mode_switcher = null;

	if ( null === $mode_switcher ) {
		$mode_switcher = new Mode_Switcher();
	}

	return $mode_switcher;
}

mode_switcher()->register_hooks();

/**
 * Backward-compatible wrapper for mode preference.
 *
 * @since ls_theme 1.1
 *
 * @return string
 */
function get_mode_preference() {
	return mode_switcher()->get_mode_preference();
}

/**
 * Backward-compatible wrapper for mode switcher button markup.
 *
 * @since ls_theme 1.1
 *
 * @param array $args Optional arguments.
 * @return string
 */
function get_mode_switcher_button( $args = array() ) {
	return mode_switcher()->get_mode_switcher_button( $args );
}

/**
 * Backward-compatible wrapper to display mode switcher button markup.
 *
 * @since ls_theme 1.1
 *
 * @param array $args Optional arguments.
 * @return void
 */
function display_mode_switcher_button( $args = array() ) {
	mode_switcher()->display_mode_switcher_button( $args );
}

