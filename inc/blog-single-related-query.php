<?php
/**
 * Blog Single "Related Reading" query filtering.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Scopes the Blog Single "Related Reading" Query Loop to posts sharing the current post's
 * category, excluding the post currently being viewed.
 *
 * The pattern's `wp:query` block attribute is static (set once when the pattern is registered
 * at `init`), so it cannot itself express "the current post" or "this post's own categories" —
 * both are only known at render time, once inside The Loop for the actual post being viewed.
 * Scoped to this specific block via its `ls-blog-single-related` className so no other Query
 * Loop on the site is affected.
 *
 * A post with no categories has no basis for "related" — rather than falling through to an
 * unfiltered, unrelated set of posts, the query is forced to return zero results via the
 * standard `post__in => [0]` trick (no post can ever have ID 0).
 *
 * @param array    $query Query args for the block.
 * @param WP_Block $block Block instance.
 * @return array
 */
function ls_theme_filter_blog_single_related_query( $query, $block ) {
	$class_name = $block->parsed_block['attrs']['className'] ?? '';

	if ( false === strpos( $class_name, 'ls-blog-single-related' ) ) {
		return $query;
	}

	$post_id = get_the_ID();

	if ( ! $post_id ) {
		return $query;
	}

	$categories = get_the_category( $post_id );

	if ( empty( $categories ) ) {
		$query['post__in'] = array( 0 );
		return $query;
	}

	$query['post__not_in'] = array( $post_id );
	$query['category__in'] = wp_list_pluck( $categories, 'term_id' );

	return $query;
}
add_filter( 'query_loop_block_query_vars', 'ls_theme_filter_blog_single_related_query', 10, 2 );
