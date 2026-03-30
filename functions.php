<?php
/**
 * {{THEME_NAME}} functions and definitions.
 *
 * @package {{TEXT_DOMAIN}}
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sets up theme supports.
 */
function {{TEXT_DOMAIN}}_setup() {
	// Make theme available for translation.
	load_theme_textdomain( '{{TEXT_DOMAIN}}', get_template_directory() . '/languages' );

	// Add support for block styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Enqueue editor styles.
	add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', '{{TEXT_DOMAIN}}_setup' );

/**
 * Enqueues front-end assets.
 *
 * Add CSS and JS files to assets/css/ and assets/js/ and uncomment
 * the relevant lines below once those files exist.
 */
function {{TEXT_DOMAIN}}_enqueue_assets() {
	// Main stylesheet (the theme header stylesheet is loaded automatically).
	// Uncomment when assets/css/main.css exists:
	// wp_enqueue_style(
	// 	'{{TEXT_DOMAIN}}-main',
	// 	get_template_directory_uri() . '/assets/css/main.css',
	// 	array(),
	// 	wp_get_theme()->get( 'Version' )
	// );

	// Main JavaScript. Uncomment when assets/js/main.js exists:
	// wp_enqueue_script(
	// 	'{{TEXT_DOMAIN}}-main',
	// 	get_template_directory_uri() . '/assets/js/main.js',
	// 	array(),
	// 	wp_get_theme()->get( 'Version' ),
	// 	true
	// );
}
add_action( 'wp_enqueue_scripts', '{{TEXT_DOMAIN}}_enqueue_assets' );
