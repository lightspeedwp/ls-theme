<?php
/**
 * Featured Work query filtering.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filters the Featured Work Query Loop to only show posts tagged with the "featured" project-tag
 * term, resolved by slug at render time rather than a hardcoded term ID.
 *
 * PHP pattern files execute once at `init`, long before any environment-specific term IDs are
 * known, and a Query Loop block's `taxQuery` attribute can only store a numeric term ID (that's
 * how the block editor itself serializes a tag selection) — there's no block attribute for a
 * slug-based filter. Term IDs are assigned per-database and are not portable: the same "Featured"
 * term can have a different numeric ID on every environment (local, staging, production), so a
 * hardcoded ID copied from one site can silently point at the wrong term — or none at all — on
 * another. Resolving the slug here, at render time, makes the section work identically regardless
 * of which environment it runs on.
 *
 * Scoped to this specific block via its `ls-featured-work-grid` className so no other Query Loop
 * on the site is affected.
 *
 * @param array    $query Query args for the block.
 * @param WP_Block $block Block instance.
 * @return array
 */
function ls_theme_filter_featured_work_query( $query, $block ) {
	$class_name = $block->parsed_block['attrs']['className'] ?? '';

	if ( false === strpos( $class_name, 'ls-featured-work-grid' ) ) {
		return $query;
	}

	$term = get_term_by( 'slug', 'featured', 'project-tag' );

	if ( ! $term || is_wp_error( $term ) ) {
		return $query;
	}

	$query['tax_query'] = array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
		array(
			'taxonomy' => 'project-tag',
			'field'    => 'term_id',
			'terms'    => array( $term->term_id ),
		),
	);

	return $query;
}
add_filter( 'query_loop_block_query_vars', 'ls_theme_filter_featured_work_query', 10, 2 );
