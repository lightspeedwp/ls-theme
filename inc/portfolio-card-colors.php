<?php
/**
 * Portfolio Card Platform Colours.
 *
 * The Work Project Card colours its banner, platform tag, and badge by the
 * post's project-group term (WordPress/WooCommerce/etc). Since a Query Loop
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
 * Swap the Work Project Card's banner/platform-tag/badge class to the
 * WooCommerce variant when the current post's project-group term is
 * WooCommerce. Every other term falls back to the default (WordPress-tinted)
 * variant.
 *
 * These are plain classes (LS-2341 Group 4) styled in
 * src/scss/structural/work-project-card.scss, not registered is-style variations, so
 * there's no core CSS-generation timing to race against.
 *
 * Hooked on `render_block` (post-render HTML string), not `render_block_data`
 * (pre-render attrs): confirmed empirically that get_the_ID()/post context
 * for a `core/group` block's `render_block_data` pass inside a Post Template
 * loop doesn't reliably reflect the current iteration's post for every block
 * — the badge (a dynamic core/post-terms block) swapped correctly there, but
 * the banner and platform-tag (static core/group blocks) didn't. By the time
 * `render_block` fires, the block's own inner content (including its
 * post-terms text) has already rendered against the correct post, so post
 * context here is provably reliable.
 *
 * @param string $block_content The block content.
 * @param array  $block         The full block data.
 * @return string
 */
function ls_theme_portfolio_card_platform_class( $block_content, $block ) {
	if ( 'core/group' !== $block['blockName'] && 'core/post-terms' !== $block['blockName'] ) {
		return $block_content;
	}

	$class_name = $block['attrs']['className'] ?? '';

	$is_banner = false !== strpos( $class_name, 'ls-card-banner-tint' );
	$is_tag    = false !== strpos( $class_name, 'ls-platform-tag-brand' );
	$is_badge  = false !== strpos( $class_name, 'ls-badge-brand' );

	if ( ! $is_banner && ! $is_tag && ! $is_badge ) {
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
		return str_replace( 'ls-card-banner-tint', 'ls-card-banner-tint-woocommerce', $block_content );
	}

	if ( $is_tag ) {
		return str_replace( 'ls-platform-tag-brand', 'ls-platform-tag-woocommerce', $block_content );
	}

	return str_replace( 'ls-badge-brand', 'ls-badge-woocommerce', $block_content );
}
add_filter( 'render_block', 'ls_theme_portfolio_card_platform_class', 10, 2 );
