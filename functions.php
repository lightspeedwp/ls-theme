<?php
/**
 * LightSpeed Theme functions and definitions.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

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

	// Enqueue editor styles.
	add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'ls_theme_setup' );

/**
 * Enqueues front-end assets.
 *
 * Add CSS and JS files to assets/css/ and assets/js/ and uncomment
 * the relevant lines below once those files exist.
 */
function ls_theme_enqueue_assets() {
	// Main stylesheet (the theme header stylesheet is loaded automatically).
	// Uncomment when assets/css/main.css exists:
	// wp_enqueue_style(
	// 	'ls-theme-main',
	// 	get_template_directory_uri() . '/assets/css/main.css',
	// 	array(),
	// 	wp_get_theme()->get( 'Version' )
	// );

	// Main JavaScript. Uncomment when assets/js/main.js exists:
	// wp_enqueue_script(
	// 	'ls-theme-main',
	// 	get_template_directory_uri() . '/assets/js/main.js',
	// 	array(),
	// 	wp_get_theme()->get( 'Version' ),
	// 	true
	// );
}
add_action( 'wp_enqueue_scripts', 'ls_theme_enqueue_assets' );
