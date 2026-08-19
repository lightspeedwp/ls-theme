<?php
/**
 * Blog Category Colours.
 *
 * The All Articles post card's badge chip is coloured by the post's real
 * `category` term — the site's 6 highest-volume real categories each get
 * their own phase-family colour, with the remaining lower-volume categories
 * sharing the existing dark-blue/cyan fallback pair. Since a Query Loop
 * renders identical block markup for every post, the actual category colour
 * has to be swapped in per-post at render time — it can't be set statically
 * in the pattern.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Swap the Blog card's category badge colour to match the current post's
 * `category` term. Falls back to the pattern's default placeholder colour
 * (News) when the post has none of the known category slugs.
 *
 * @param string $block_content Rendered block HTML.
 * @param array  $block         Parsed block data.
 * @return string
 */
function ls_theme_blog_card_category_dot_color( $block_content, $block ) {
	$class_name = $block['attrs']['className'] ?? '';

	if ( 'core/group' !== $block['blockName'] || false === strpos( $class_name, 'ls-badge-category-dynamic' ) ) {
		return $block_content;
	}

	$post_id = get_the_ID();

	if ( ! $post_id ) {
		return $block_content;
	}

	// Ordered highest-to-lowest post count on the live site; the first 6 each carry
	// their own phase-family token, the rest share the brand/cta fallback pair.
	$known_categories = array( 'news', 'tour-operators', 'lsx', 'design-systems', 'project-workflows', 'content', 'release-notes', 'design', 'wordcamp' );

	$terms = wp_get_post_terms( $post_id, 'category', array( 'fields' => 'slugs' ) );

	if ( is_wp_error( $terms ) || empty( $terms ) ) {
		return $block_content;
	}

	$matched_category = null;

	foreach ( $known_categories as $known_category ) {
		if ( in_array( $known_category, $terms, true ) ) {
			$matched_category = $known_category;
			break;
		}
	}

	if ( null === $matched_category || 'news' === $matched_category ) {
		return $block_content;
	}

	return str_replace(
		'--wp--custom--color--category--news',
		'--wp--custom--color--category--' . $matched_category,
		$block_content
	);
}
add_filter( 'render_block', 'ls_theme_blog_card_category_dot_color', 10, 2 );
