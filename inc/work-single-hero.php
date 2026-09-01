<?php
/**
 * Work Single Hero — "View site" button.
 *
 * The Work Single hero (patterns/hero/work-single-hero.php) is a pattern PHP
 * file: its top-level PHP runs once when the pattern is registered (at
 * `init`, outside any post query), not per-request. `get_the_ID()`/
 * `get_post_meta()` called at that point cannot see the actual post being
 * viewed, so the button's real destination has to be resolved later, at
 * actual render time — hence this `render_block` filter rather than a
 * conditional in the pattern file itself.
 *
 * The button ships with a `ls-view-site-button` marker class and a `href="#"`
 * placeholder. This filter swaps in the post's `ls_plugin_portfolio_website`
 * meta value, or removes the button entirely when that meta is empty.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Resolve or remove the Work Single hero's "View site" button at render time.
 *
 * @param string $block_content The block content.
 * @param array  $block         The full block data.
 * @return string
 */
function ls_theme_work_single_view_site_button( $block_content, $block ) {
	if ( 'core/button' !== $block['blockName'] ) {
		return $block_content;
	}

	$class_name = $block['attrs']['className'] ?? '';

	if ( false === strpos( $class_name, 'ls-view-site-button' ) ) {
		return $block_content;
	}

	$post_id = get_the_ID();

	if ( ! $post_id ) {
		return '';
	}

	$project_url = get_post_meta( $post_id, 'ls_plugin_portfolio_website', true );

	if ( empty( $project_url ) ) {
		return '';
	}

	return str_replace( 'href="#"', 'href="' . esc_url( $project_url ) . '"', $block_content );
}
add_filter( 'render_block', 'ls_theme_work_single_view_site_button', 10, 2 );
