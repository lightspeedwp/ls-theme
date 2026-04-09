<?php
/**
 * LightSpeed Theme functions and definitions.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme version.
 */
define( 'LS_THEME_VERSION', wp_get_theme()->get( 'Version' ) );

/** Loads effect file */
require get_template_directory() . '/inc/animations.php';

/** Loads GSAP integration file */
require get_template_directory() . '/inc/gsap.php';

/** Loads the presets integration files */
require get_template_directory() . '/inc/presets.php';

/**
 * Sets up theme supports.
 */
function ls_theme_setup() {
	// Make theme available for translation.
	load_theme_textdomain( 'ls-theme', get_template_directory() . '/languages' );

	// Add support for block styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Base editor styles.
	add_editor_style( 'style.css' );

	// Load compiled editor styles when available.
	if ( file_exists( get_theme_file_path( 'build/css/editor-style.css' ) ) ) {
		add_editor_style( 'build/css/editor-style.css' );
	}
}
add_action( 'after_setup_theme', 'ls_theme_setup' );

/**
 * Enqueues front-end assets.
 *
 * Add CSS and JS files to assets/css/ and assets/js/ and uncomment
 * the relevant lines below once those files exist.
 */
function ls_theme_enqueue_assets() {
	$style_asset_file = get_theme_file_path( 'build/css/style.asset.php' );
	if ( file_exists( $style_asset_file ) ) {
		$style_asset = include $style_asset_file;

		wp_enqueue_style(
			'ls-theme-main',
			get_theme_file_uri( 'build/css/style.css' ),
			$style_asset['dependencies'] ?? array(),
			$style_asset['version'] ?? LS_THEME_VERSION
		);
	}

	$script_asset_file = get_theme_file_path( 'build/js/theme.asset.php' );
	if ( file_exists( $script_asset_file ) ) {
		$script_asset = include $script_asset_file;

		wp_enqueue_script(
			'ls-theme-main',
			get_theme_file_uri( 'build/js/theme.js' ),
			$script_asset['dependencies'] ?? array(),
			$script_asset['version'] ?? LS_THEME_VERSION,
			true
		);

		wp_set_script_translations(
			'ls-theme-main',
			'ls-theme',
			get_theme_file_path( 'languages' )
		);
	}
}
add_action( 'wp_enqueue_scripts', 'ls_theme_enqueue_assets' );

/**
 * Enqueue block editor build assets.
 */
function ls_theme_enqueue_editor_assets() {
	$editor_script_asset_file = get_theme_file_path( 'build/js/editor.asset.php' );
	if ( ! file_exists( $editor_script_asset_file ) ) {
		return;
	}

	$editor_script_asset = include $editor_script_asset_file;

	wp_enqueue_script(
		'ls-theme-editor',
		get_theme_file_uri( 'build/js/editor.js' ),
		$editor_script_asset['dependencies'] ?? array(),
		$editor_script_asset['version'] ?? LS_THEME_VERSION,
		true
	);

	wp_set_script_translations(
		'ls-theme-editor',
		'ls-theme',
		get_theme_file_path( 'languages' )
	);
}
add_action( 'enqueue_block_editor_assets', 'ls_theme_enqueue_editor_assets' );
