<?php
/**
 * Site header asset registration.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueues the header search expand-on-click script.
 */
function ls_theme_enqueue_header_search_script() {
	$path = 'assets/js/header-search.js';

	wp_enqueue_script(
		'ls-theme-header-search',
		get_theme_file_uri( $path ),
		array(),
		ls_theme_get_local_asset_version( $path ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'ls_theme_enqueue_header_search_script' );
