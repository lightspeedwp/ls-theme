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
 * Returns the query args that point a case-study query at the project tagged with a service page.
 *
 * The same pattern (patterns/sections/featured-case-study.php) is reused on all 14 individual
 * service pages, so the project it shows has to follow the page it is on: on /services/discovery/ it
 * shows a project tagged "Discovery" in the `project-tag` ("Services") taxonomy, on
 * /services/hosting/ one tagged "Hosting", and so on. A Query Loop block's `taxQuery` attribute can
 * only store numeric term IDs, which differ per environment, so this resolves the term by the
 * service page's own slug instead — the same approach as inc/featured-work-query.php. If the post is
 * not a service page, or no `project-tag` term matches its slug, the args force an empty result
 * rather than falling back to unrelated projects.
 *
 * @param int $post_id The service page the case study sits on.
 * @return array Query args to merge into the project query.
 */
function ls_theme_get_service_case_study_args( $post_id ) {
	$term = false;

	if ( $post_id && '' !== ls_theme_get_service_page_phase( $post_id ) ) {
		$term = get_term_by( 'slug', get_post_field( 'post_name', $post_id ), 'project-tag' );
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
 * Front end: filters the service pages' "case study" Query Loop to the project tagged with that service.
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

	return array_merge( $query, ls_theme_get_service_case_study_args( $post_id ) );
}
add_filter( 'query_loop_block_query_vars', 'ls_theme_filter_service_case_study_query', 10, 2 );

/**
 * Block editor: makes the case-study preview show the same project the front end will.
 *
 * The editor does not render a Query Loop on the server. It asks the REST API for the block's raw
 * attributes (`/wp/v2/project?context=edit&per_page=1&order=desc&orderby=date`), which carry no page
 * or className, so without this the preview shows the newest project of any kind. The only context
 * the editor request does carry is its HTTP referer — the edit screen's URL — so this reads the
 * post being edited from that (`post.php?post={id}` or the Site Editor's `postId`).
 *
 * It deliberately fails safe: it only acts for a logged-in user who can edit that post, only when
 * the post is one of the 14 service pages, and only for the one-project, unfiltered request shape
 * this pattern produces (so a Featured Work grid or any other project query on the same page is left
 * alone). Anything else is returned untouched. The front-end filter above remains the source of
 * truth; this affects the editor preview only.
 *
 * @param array           $args    WP_Query args built from the REST request.
 * @param WP_REST_Request $request The REST request.
 * @return array
 */
function ls_theme_filter_service_case_study_rest_query( $args, $request ) {
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

	if ( ! $post_id || ! current_user_can( 'edit_post', $post_id ) || '' === ls_theme_get_service_page_phase( $post_id ) ) {
		return $args;
	}

	return array_merge( $args, ls_theme_get_service_case_study_args( $post_id ) );
}
add_filter( 'rest_project_query', 'ls_theme_filter_service_case_study_rest_query', 10, 2 );
