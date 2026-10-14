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

/**
 * Caps the Solutions case-study card's service pills and fixes brand capitalisation, for display only.
 *
 * The case-study card (patterns/sections/solutions-case-study.php) lists the project's `project-tag`
 * terms, and a project can carry eight or more, which crowds the card. The core/post-terms block has
 * no "limit" or label control, so this render filter trims the rendered pill list to a handful and
 * brand-cases names stored lowercase. It is scoped by the `ls-solutions-case-study__pills` className, so
 * no other post-terms block is touched, and it only rewrites the rendered HTML: the stored terms, their
 * slugs and the full tag list on the case study page are unchanged.
 *
 * @param string $block_content Rendered block HTML.
 * @param array  $block         Parsed block.
 * @return string
 */
function ls_theme_filter_solutions_case_study_pills( $block_content, $block ) {
	$class_name = $block['attrs']['className'] ?? '';

	if ( false === strpos( $class_name, 'ls-solutions-case-study__pills' ) ) {
		return $block_content;
	}

	$max_pills   = 4;
	$brand_names = array(
		'wordpress'   => 'WordPress',
		'woocommerce' => 'WooCommerce',
	);
	$count       = 0;

	$result = preg_replace_callback(
		'#(<span class="wp-block-post-terms__separator">[^<]*</span>)?(<a\b[^>]*>)(.*?)(</a>)#s',
		static function ( $matches ) use ( &$count, $max_pills, $brand_names ) {
			++$count;

			if ( $count > $max_pills ) {
				return '';
			}

			$key   = strtolower( trim( wp_strip_all_tags( $matches[3] ) ) );
			$label = $brand_names[ $key ] ?? $matches[3];

			return $matches[1] . $matches[2] . $label . $matches[4];
		},
		$block_content
	);

	return null === $result ? $block_content : $result;
}
add_filter( 'render_block_core/post-terms', 'ls_theme_filter_solutions_case_study_pills', 10, 2 );
