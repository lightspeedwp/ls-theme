<?php
/**
 * Service case-study query filtering.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filters the service pages' "case study" Query Loop to the project tagged with that service.
 *
 * The same pattern (patterns/sections/featured-case-study.php) is reused on all 14 individual
 * service pages, so the project it shows has to follow the page it is on: on /services/discovery/ it
 * shows a project tagged "Discovery" in the `project-tag` ("Services") taxonomy, on
 * /services/hosting/ one tagged "Hosting", and so on. A Query Loop block's `taxQuery` attribute can
 * only store numeric term IDs, which differ per environment, so this resolves the term by the
 * service page's own slug at render time instead — the same approach as
 * inc/featured-work-query.php. If the page is not a service page, or no `project-tag` term matches
 * its slug, the query is forced to return nothing rather than falling back to unrelated projects.
 *
 * Scoped via an `ls-service-case-study` className on the pattern's Post Template block — WordPress
 * passes the inner Post Template block (not the outer Query block) to this filter, so that is where
 * the className must live — so no other Query Loop on the site is affected.
 *
 * @param array    $query Query args for the block.
 * @param WP_Block $block Block instance.
 * @return array
 */
function ls_theme_filter_service_case_study_query( $query, $block ) {
	$class_name = $block->parsed_block['attrs']['className'] ?? '';

	if ( false === strpos( $class_name, 'ls-service-case-study' ) ) {
		return $query;
	}

	$post_id = isset( $block->context['postId'] ) ? absint( $block->context['postId'] ) : get_queried_object_id();
	$term    = false;

	if ( $post_id && '' !== ls_theme_get_service_page_phase( $post_id ) ) {
		$term = get_term_by( 'slug', get_post_field( 'post_name', $post_id ), 'project-tag' );
	}

	if ( ! $term || is_wp_error( $term ) ) {
		$query['post__in'] = array( 0 );
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
add_filter( 'query_loop_block_query_vars', 'ls_theme_filter_service_case_study_query', 10, 2 );
