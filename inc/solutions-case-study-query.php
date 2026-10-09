<?php
/**
 * Solutions case-study query filtering.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns the query args that point a case-study query at the project tagged with a Solutions page.
 *
 * The Solutions case-study pattern (patterns/sections/solutions-case-study.php) is reused on every
 * Solutions landing page (/solutions/{slug}/), so the project it shows has to follow the page it is
 * on: the one tagged in the `project-tag` taxonomy with the page's own slug. A Query Loop block's
 * `taxQuery` attribute can only store numeric term IDs, which differ per environment, so this
 * resolves the term by slug instead — the same approach as inc/service-case-study-query.php. If the
 * post is not a Solutions landing page, or no `project-tag` term matches its slug, the args force an
 * empty result rather than falling back to unrelated projects.
 *
 * @param int $post_id The Solutions page the case study sits on.
 * @return array Query args to merge into the project query.
 */
function ls_theme_get_solutions_case_study_args( $post_id ) {
	$term = false;
	$post = $post_id ? get_post( $post_id ) : null;

	if ( $post instanceof WP_Post && 'page' === $post->post_type && 0 === strpos( get_page_uri( $post ), 'solutions/' ) ) {
		$term = get_term_by( 'slug', $post->post_name, 'project-tag' );
	}

	if ( ! $term || is_wp_error( $term ) ) {
		return array( 'post__in' => array( 0 ) );
	}

	return array(
		'tax_query' => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
			array(
				'taxonomy' => 'project-tag',
				'field'    => 'term_id',
				'terms'    => array( $term->term_id ),
			),
		),
	);
}

/**
 * Front end: filters the Solutions pages' "case study" Query Loop to the project tagged with that page.
 *
 * Scoped via an `ls-solutions-case-study` className on the pattern's Post Template block — WordPress
 * passes the inner Post Template block (not the outer Query block) to this filter, so that is where
 * the className must live — so no other Query Loop on the site is affected.
 *
 * @param array    $query Query args for the block.
 * @param WP_Block $block Block instance.
 * @return array
 */
function ls_theme_filter_solutions_case_study_query( $query, $block ) {
	$class_name = $block->parsed_block['attrs']['className'] ?? '';

	if ( false === strpos( $class_name, 'ls-solutions-case-study' ) ) {
		return $query;
	}

	$post_id = isset( $block->context['postId'] ) ? absint( $block->context['postId'] ) : get_queried_object_id();

	return array_merge( $query, ls_theme_get_solutions_case_study_args( $post_id ) );
}
add_filter( 'query_loop_block_query_vars', 'ls_theme_filter_solutions_case_study_query', 10, 2 );

/**
 * Block editor: makes the case-study preview show the same project the front end will.
 *
 * The editor does not render a Query Loop on the server; it asks the REST API for the block's raw
 * attributes, which carry no page or className. The only context the request does carry is its HTTP
 * referer — the edit screen's URL — so this reads the post being edited from that.
 *
 * It deliberately fails safe: it only acts for a logged-in user who can edit that post, only when the
 * post is a Solutions landing page, and only for the one-project, unfiltered request shape the
 * pattern produces. Anything else is returned untouched. The front-end filter above remains the
 * source of truth; this affects the editor preview only.
 *
 * @param array           $args    WP_Query args built from the REST request.
 * @param WP_REST_Request $request The REST request.
 * @return array
 */
function ls_theme_filter_solutions_case_study_rest_query( $args, $request ) {
	if ( 'edit' !== $request->get_param( 'context' ) || 1 !== absint( $request->get_param( 'per_page' ) ) || $request->get_param( 'search' ) ) {
		return $args;
	}

	$referer = isset( $_SERVER['HTTP_REFERER'] ) ? esc_url_raw( wp_unslash( $_SERVER['HTTP_REFERER'] ) ) : '';
	$query   = wp_parse_url( $referer, PHP_URL_QUERY );

	if ( ! $query ) {
		return $args;
	}

	parse_str( $query, $params );

	$post_id = absint( $params['post'] ?? ( 'page' === ( $params['postType'] ?? '' ) ? ( $params['postId'] ?? 0 ) : 0 ) );

	if ( ! $post_id || ! current_user_can( 'edit_post', $post_id ) || 0 !== strpos( get_page_uri( $post_id ), 'solutions/' ) ) {
		return $args;
	}

	return array_merge( $args, ls_theme_get_solutions_case_study_args( $post_id ) );
}
add_filter( 'rest_project_query', 'ls_theme_filter_solutions_case_study_rest_query', 10, 2 );
