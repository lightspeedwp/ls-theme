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

/**
 * Sets the per-phase accent custom properties inside the block editor canvas.
 *
 * The editor canvas never receives the `page-slug-{phase}` body class added above, so the per-phase
 * rules in phase-journey-nav.scss never match there and every phase-coloured element would fall back
 * to the Discover defaults on `body`. This appends the same two properties for the phase page
 * being edited to the editor's styles (after the theme's editor stylesheets, so it wins), so the
 * editor preview matches the front end. Front-end output is unaffected.
 *
 * @param array                   $settings       Block editor settings.
 * @param WP_Block_Editor_Context $editor_context Current block editor context.
 * @return array
 */
function ls_theme_add_phase_editor_accent( $settings, $editor_context ) {
	$ls_phase_slugs = array( 'discover', 'create', 'build', 'launch', 'grow', 'evolve' );

	if ( empty( $editor_context->post ) || ! $editor_context->post instanceof WP_Post ) {
		return $settings;
	}

	if ( 'page' !== $editor_context->post->post_type || ! in_array( $editor_context->post->post_name, $ls_phase_slugs, true ) ) {
		return $settings;
	}

	$ls_phase = $editor_context->post->post_name;

	$settings['styles'][] = array(
		'css' => sprintf(
			'body{--ls-phase-accent-on-dark:var(--wp--custom--color--phase--%1$s-on-dark,var(--wp--custom--color--phase--%1$s));--ls-phase-accent:var(--wp--custom--color--phase--%1$s);}',
			$ls_phase
		),
	);

	return $settings;
}
add_filter( 'block_editor_settings_all', 'ls_theme_add_phase_editor_accent', 10, 2 );
