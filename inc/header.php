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

/**
 * Resolves the header's Navigation block to a valid wp_navigation post on this environment.
 *
 * The block's `ref` attribute is a wp_navigation post ID, which is not portable — each
 * environment (local/dev/live) has its own numeric ID for the same logical "Main Navigation"
 * menu. If the ref baked into the pattern markup doesn't resolve to a published wp_navigation
 * post here, look one up by title instead, so the header keeps working without a manual
 * per-environment ref update or reattachment in the Site Editor.
 *
 * @param array $parsed_block The block being rendered.
 * @return array The (possibly modified) block.
 */
function ls_theme_resolve_portable_navigation_ref( $parsed_block ) {
	if ( 'core/navigation' !== ( $parsed_block['blockName'] ?? '' ) ) {
		return $parsed_block;
	}

	$ref = $parsed_block['attrs']['ref'] ?? null;

	if ( $ref && 'wp_navigation' === get_post_type( $ref ) && 'publish' === get_post_status( $ref ) ) {
		return $parsed_block;
	}

	$fallback = get_posts(
		array(
			'post_type'      => 'wp_navigation',
			'post_status'    => 'publish',
			'title'          => 'Main Navigation',
			'posts_per_page' => 1,
		)
	);

	if ( $fallback ) {
		$parsed_block['attrs']['ref'] = $fallback[0]->ID;
	}

	return $parsed_block;
}
add_filter( 'render_block_data', 'ls_theme_resolve_portable_navigation_ref' );
