<?php
/**
 * Adds a `page-slug-{slug}` body class on the six lifecycle phase pages.
 *
 * The Journey Phases nav (phase-journey-nav.php) used to detect the active phase in PHP via
 * get_queried_object(), baked into the pattern's own markup at render time. That only works while
 * the pattern stays a live `wp:pattern` reference — WordPress routinely flattens a pattern into a
 * frozen static copy the moment a page is opened in the editor, permanently freezing whatever
 * active state existed at that moment. Since re-attaching the pattern during active development
 * doesn't prevent it from being reflattened again, the active-state logic needed to stop depending
 * on the pattern's stored content entirely. A body class is computed fresh on every real request
 * regardless of how the page's blocks are stored, so driving the active state from CSS keyed off
 * this class (see phase-journey-nav.scss) survives flattening completely.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filters the body_class array to add the current phase page's slug.
 *
 * @param array $classes Body classes.
 * @return array
 */
function ls_theme_add_phase_page_body_class( $classes ) {
	$ls_phase_slugs = array( 'discover', 'create', 'build', 'launch', 'grow', 'evolve' );

	if ( is_page( $ls_phase_slugs ) ) {
		$classes[] = 'page-slug-' . get_post_field( 'post_name', get_queried_object_id() );
	}

	return $classes;
}
add_filter( 'body_class', 'ls_theme_add_phase_page_body_class' );
