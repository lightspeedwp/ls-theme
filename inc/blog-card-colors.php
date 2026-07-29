<?php
/**
 * Blog Category Dot Colours.
 *
 * The Blog archive's category dot (Hero featured/latest cards, All Articles
 * post card) is coloured by the post's real `category` term. Since a Query
 * Loop renders identical block markup for every post, the actual category
 * colour has to be swapped in per-post at render time — it can't be set
 * statically in the pattern.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Swap the Blog card's category dot colour to match the current post's
 * `category` term. Falls back to the pattern's default placeholder colour
 * (WordPress) when the post has none of the five known category slugs.
 *
 * @param string $block_content Rendered block HTML.
 * @param array  $block         Parsed block data.
 * @return string
 */
function ls_theme_blog_card_category_dot_color( $block_content, $block ) {
	if ( 'outermost/icon-block' !== $block['blockName'] ) {
		return $block_content;
	}

	$class_name = $block['attrs']['className'] ?? '';

	if ( false === strpos( $class_name, 'ls-category-dot' ) ) {
		return $block_content;
	}

	$post_id = get_the_ID();

	if ( ! $post_id ) {
		return $block_content;
	}

	$known_categories = array( 'wordpress', 'woocommerce', 'design-systems', 'performance', 'accessibility' );

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

	if ( null === $matched_category || 'wordpress' === $matched_category ) {
		return $block_content;
	}

	return str_replace(
		'--wp--custom--color--category--wordpress',
		'--wp--custom--color--category--' . $matched_category,
		$block_content
	);
}
add_filter( 'render_block', 'ls_theme_blog_card_category_dot_color', 10, 2 );
