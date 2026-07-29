<?php
/**
 * Portfolio Card Platform Colours.
 *
 * The Work Project Card colours its banner and badge by the post's
 * project-group term (WordPress/WooCommerce/etc). Since a Query Loop
 * renders identical block markup for every post, the WooCommerce variant
 * class has to be swapped in per-post at render time — it can't be set
 * statically in the pattern.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Swap the Work Project Card's banner/badge class to the WooCommerce
 * variant when the current post's project-group term is WooCommerce.
 * Every other term falls back to the default (WordPress-tinted) variant.
 *
 * @param string $block_content Rendered block HTML.
 * @param array  $block         Parsed block data.
 * @return string
 */
function ls_theme_portfolio_card_platform_class( $block_content, $block ) {
	if ( 'core/group' !== $block['blockName'] && 'core/post-terms' !== $block['blockName'] ) {
		return $block_content;
	}

	$class_name = $block['attrs']['className'] ?? '';

	$is_banner = false !== strpos( $class_name, 'is-style-card-banner-tint' );
	$is_badge  = false !== strpos( $class_name, 'is-style-badge-brand' );

	if ( ! $is_banner && ! $is_badge ) {
		return $block_content;
	}

	$post_id = get_the_ID();

	if ( ! $post_id ) {
		return $block_content;
	}

	$terms = wp_get_post_terms( $post_id, 'project-group', array( 'fields' => 'slugs' ) );

	if ( is_wp_error( $terms ) || empty( $terms ) || ! in_array( 'woocommerce', $terms, true ) ) {
		return $block_content;
	}

	if ( $is_banner ) {
		return str_replace( 'is-style-card-banner-tint', 'is-style-card-banner-tint-woocommerce', $block_content );
	}

	return str_replace( 'is-style-badge-brand', 'is-style-badge-woocommerce', $block_content );
}
add_filter( 'render_block', 'ls_theme_portfolio_card_platform_class', 10, 2 );
