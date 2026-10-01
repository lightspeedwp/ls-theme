<?php
/**
 * Maps each of the 14 individual service pages to the lifecycle phase it belongs to.
 *
 * The six phase pages (discover … evolve) and the 14 service pages are siblings under /services/,
 * so a service page cannot learn its phase from its URL or parent. This map is the single source of
 * truth used to (a) add the `ls-service-phase-{phase}` body class that recolours the shared phase
 * accent custom properties (see inc/phase-page-body-class.php and phase-journey-nav.scss), (b)
 * recolour the block editor canvas to match, and (c) gate the stylesheets the service patterns need
 * (see inc/animations.php). Keep it in sync with the service lists in
 * patterns/sections/services-service-tiles.php and parts/services-mega-menu.html.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns the service slug => phase slug map.
 *
 * @return array<string, string>
 */
function ls_theme_get_service_phase_map() {
	return array(
		'discovery'       => 'discover',
		'content'         => 'create',
		'design'          => 'create',
		'development'     => 'build',
		'migrations'      => 'build',
		'hosting'         => 'launch',
		'performance'     => 'launch',
		'security'        => 'launch',
		'training'        => 'launch',
		'support'         => 'grow',
		'seo'             => 'grow',
		'accessibility'   => 'grow',
		'email-marketing' => 'grow',
		'ai'              => 'evolve',
	);
}

/**
 * Returns the phase slug for a service page, or an empty string if the post is not one.
 *
 * Matches on the full page path (services/{slug}) rather than the bare slug, so an unrelated
 * top-level page that happens to share a slug (e.g. /support/) is never treated as a service page.
 *
 * @param int|WP_Post|null $post Post ID or object. Defaults to the queried object.
 * @return string Phase slug (e.g. 'build'), or '' when the post is not a service page.
 */
function ls_theme_get_service_page_phase( $post = null ) {
	$post = $post ? get_post( $post ) : get_queried_object();

	if ( ! $post instanceof WP_Post || 'page' !== $post->post_type ) {
		return '';
	}

	$ls_map  = ls_theme_get_service_phase_map();
	$ls_slug = $post->post_name;

	if ( ! isset( $ls_map[ $ls_slug ] ) ) {
		return '';
	}

	return get_page_uri( $post ) === 'services/' . $ls_slug ? $ls_map[ $ls_slug ] : '';
}

/**
 * Whether the current request is one of the 14 individual service pages.
 *
 * @return bool
 */
function ls_theme_is_service_page() {
	return is_page() && '' !== ls_theme_get_service_page_phase();
}
