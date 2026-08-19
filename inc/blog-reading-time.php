<?php
/**
 * Blog Reading Time.
 *
 * The Blog Hero's Featured Article and Latest list cards each show a "X min read" estimate.
 * WordPress has no core reading-time block, and a Query Loop renders identical markup for every
 * post, so the real value has to be swapped in per-post at render time — same mechanism as
 * inc/blog-card-colors.php's category dot swap.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Average adult silent reading speed, in words per minute, used to estimate reading time.
 */
const LS_THEME_READING_WPM = 200;

/**
 * Swaps the Blog card's "X min read" placeholder paragraph for the current post's real,
 * computed reading time. Locale-safe: both the placeholder and the computed value are built
 * from the same translated format string, so only the number differs regardless of how a given
 * locale orders the sentence.
 *
 * @param string $block_content Rendered block HTML.
 * @param array  $block         Parsed block data.
 * @return string
 */
function ls_theme_blog_reading_time( $block_content, $block ) {
	if ( 'core/paragraph' !== ( $block['blockName'] ?? '' ) ) {
		return $block_content;
	}

	$class_name = $block['attrs']['className'] ?? '';

	if ( false === strpos( $class_name, 'ls-reading-time' ) ) {
		return $block_content;
	}

	$post_id = get_the_ID();

	if ( ! $post_id ) {
		return $block_content;
	}

	$word_count = str_word_count( wp_strip_all_tags( get_post_field( 'post_content', $post_id ) ) );
	$minutes    = max( 1, (int) ceil( $word_count / LS_THEME_READING_WPM ) );

	/* translators: %s: reading time in minutes. */
	$format      = __( '%s min read', 'ls-theme' );
	$placeholder = sprintf( $format, '0' );
	$computed    = sprintf( $format, number_format_i18n( $minutes ) );

	return str_replace( esc_html( $placeholder ), esc_html( $computed ), $block_content );
}
add_filter( 'render_block', 'ls_theme_blog_reading_time', 10, 2 );
