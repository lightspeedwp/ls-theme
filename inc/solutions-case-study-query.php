<?php
/**
 * Solutions case-study query filtering and editor project picker.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Whether the current request is a Solutions landing page (/solutions/ or /solutions/{slug}/).
 *
 * Used for the head-time conditions of the stylesheets the Solutions patterns rely on.
 *
 * @return bool
 */
function ls_theme_is_solutions_page() {
	if ( ! is_page() ) {
		return false;
	}

	$uri = get_page_uri( get_queried_object_id() );

	return 'solutions' === $uri || 0 === strpos( $uri, 'solutions/' );
}

/**
 * Front end: points the Solutions case-study Query Loop at the project chosen in the block's sidebar.
 *
 * The Solutions case-study pattern (patterns/sections/solutions-case-study.php) is a Query Loop of one
 * `project` post. No taxonomy covers every Solutions page, so the editor picks the project directly:
 * assets/js/solutions-case-study-editor.js adds a "Featured project" control to the Query block that
 * stores the chosen post ID as `query.include`. This reads it back and limits the query to that post.
 * With no project chosen the query is left alone, so the card falls back to the latest project and a
 * page never renders an empty band.
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

	$include = isset( $block->context['query']['include'] ) ? array_filter( array_map( 'absint', (array) $block->context['query']['include'] ) ) : array();

	if ( ! empty( $include ) ) {
		$query['post__in'] = array_values( $include );
	}

	return $query;
}
add_filter( 'query_loop_block_query_vars', 'ls_theme_filter_solutions_case_study_query', 10, 2 );

/**
 * Block editor: loads the script that adds the "Featured project" picker to the Solutions case-study Query block.
 *
 * The picker searches the REST API as the editor types, so it is not limited to the first page of projects. The editor preview needs no server filter: the Post Template block already forwards unknown `query`
 * keys (here `include`) to the REST API, and the `project` endpoint supports `include` natively.
 */
function ls_theme_enqueue_solutions_case_study_editor_script() {
	$path = get_theme_file_path( 'assets/js/solutions-case-study-editor.js' );

	if ( ! file_exists( $path ) ) {
		return;
	}

	wp_enqueue_script(
		'ls-theme-solutions-case-study-editor',
		get_theme_file_uri( 'assets/js/solutions-case-study-editor.js' ),
		array( 'wp-block-editor', 'wp-components', 'wp-compose', 'wp-core-data', 'wp-data', 'wp-element', 'wp-hooks', 'wp-html-entities', 'wp-i18n' ),
		(string) filemtime( $path ),
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'ls_theme_enqueue_solutions_case_study_editor_script' );
