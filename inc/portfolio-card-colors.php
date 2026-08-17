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
 * Hooked on `render_block_data` at priority 9 — one step before core's own
 * `wp_render_block_style_variation_support_styles` (priority 10, registered
 * in wp-includes/block-supports/block-style-variations.php), which decides
 * which is-style-* variation to generate CSS for and stamps a numbered
 * instance class (e.g. is-style-card-banner-tint--175) based on whatever
 * className is present at that point. Swapping the className here, on the
 * parsed block attrs, means core sees the WooCommerce classname before it
 * makes that decision. Swapping later via a `render_block` string-replace
 * (the previous approach) edits the rendered HTML text only — core had
 * already generated CSS for the un-swapped classname's numbered instance,
 * so the final class in the HTML no longer matched any compiled rule at
 * all, confirmed empirically 2026-08-12.
 *
 * @param array $block Parsed block data.
 * @return array
 */
function ls_theme_portfolio_card_platform_class( $block ) {
	if ( 'core/group' !== $block['blockName'] && 'core/post-terms' !== $block['blockName'] ) {
		return $block;
	}

	$class_name = $block['attrs']['className'] ?? '';

	$is_banner = false !== strpos( $class_name, 'is-style-card-banner-tint' );
	$is_badge  = false !== strpos( $class_name, 'is-style-badge-brand' );

	if ( ! $is_banner && ! $is_badge ) {
		return $block;
	}

	$post_id = get_the_ID();

	if ( ! $post_id ) {
		return $block;
	}

	$terms = wp_get_post_terms( $post_id, 'project-group', array( 'fields' => 'slugs' ) );

	if ( is_wp_error( $terms ) || empty( $terms ) || ! in_array( 'woocommerce', $terms, true ) ) {
		return $block;
	}

	if ( $is_banner ) {
		$block['attrs']['className'] = str_replace( 'is-style-card-banner-tint', 'is-style-card-banner-tint-woocommerce', $class_name );
	} else {
		$block['attrs']['className'] = str_replace( 'is-style-badge-brand', 'is-style-badge-woocommerce', $class_name );
	}

	return $block;
}
add_filter( 'render_block_data', 'ls_theme_portfolio_card_platform_class', 9 );
