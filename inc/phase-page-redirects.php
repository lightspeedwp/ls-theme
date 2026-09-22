<?php
/**
 * Redirects bare phase-page slugs (e.g. /discover/) to their real nested URL
 * under /services/ (e.g. /services/discover/).
 *
 * The six lifecycle phase pages live as children of the "services" page, but
 * their slugs (discover, create, build, launch, grow, evolve) are similar
 * enough to other existing page slugs (e.g. "discovery") that WordPress's
 * built-in wp_guess_404_permalink() fuzzy match can send a bare-slug request
 * to the wrong page. Redirecting explicitly, before that guesser runs, avoids
 * the ambiguity entirely.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Redirects a bare phase slug request straight to its real nested page.
 */
function ls_theme_redirect_bare_phase_slugs() {
	if ( is_admin() || ! is_404() ) {
		return;
	}

	$ls_phase_slugs = array( 'discover', 'create', 'build', 'launch', 'grow', 'evolve' );
	$ls_request_path = trim( wp_parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );

	if ( ! in_array( $ls_request_path, $ls_phase_slugs, true ) ) {
		return;
	}

	$ls_target = get_page_by_path( 'services/' . $ls_request_path );

	if ( $ls_target instanceof WP_Post ) {
		wp_safe_redirect( get_permalink( $ls_target ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'ls_theme_redirect_bare_phase_slugs', 0 );
