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
 * placeholder. This filter sets the button's href to the post's
 * `ls_plugin_portfolio_website` meta value via `WP_HTML_Tag_Processor` (falling
 * back to a string replace only if that class or the anchor tag isn't
 * available), or removes the button entirely when that meta is empty. When
 * there's no post context at all (e.g. a Site Editor canvas render with no
 * bound post), the block is left untouched rather than removed, matching
 * `inc/portfolio-card-colors.php` and `inc/blog-card-colors.php`.
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
		return $block_content;
	}

	$project_url = get_post_meta( $post_id, 'ls_plugin_portfolio_website', true );

	if ( empty( $project_url ) ) {
		return '';
	}

	return ls_theme_set_view_site_href( $block_content, $project_url );
}

/**
 * Sets the "View site" button's href, preferring WP_HTML_Tag_Processor over a
 * raw string replace so this doesn't depend on the exact serialised markup of
 * the placeholder href.
 *
 * @param string $block_content The block content.
 * @param string $project_url   The post's `ls_plugin_portfolio_website` meta value.
 * @return string
 */
function ls_theme_set_view_site_href( $block_content, $project_url ) {
	if ( ! class_exists( 'WP_HTML_Tag_Processor' ) ) {
		return str_replace( 'href="#"', 'href="' . esc_url( $project_url ) . '"', $block_content );
	}

	$tags = new WP_HTML_Tag_Processor( $block_content );

	if ( ! $tags->next_tag( 'a' ) ) {
		return str_replace( 'href="#"', 'href="' . esc_url( $project_url ) . '"', $block_content );
	}

	$tags->set_attribute( 'href', esc_url( $project_url ) );

	return $tags->get_updated_html();
}
add_filter( 'render_block', 'ls_theme_work_single_view_site_button', 10, 2 );
