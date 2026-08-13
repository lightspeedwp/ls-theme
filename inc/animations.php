<?php
/**
 * Effect asset registration and loading.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns a cache-busting version for a local theme asset.
 *
 * @param string $path Relative asset path inside the theme.
 * @return string
 */
function ls_theme_get_local_asset_version( $path ) {
	$file_path = get_theme_file_path( $path );

	if ( file_exists( $file_path ) ) {
		return (string) filemtime( $file_path );
	}

	return wp_get_theme()->get( 'Version' );
}

/**
 * Returns effect stylesheet definitions.
 *
 * @param string $context Load context. Accepts 'front' or 'editor'.
 * @return array<string, array<string, mixed>>
 */
function ls_theme_get_effect_styles( $context = 'front' ) {
	$effects = array(
		'effects' => array(
			'handle'   => 'ls-theme-effects',
			'path'     => 'assets/css/animations.css',
			'contexts' => array( 'front', 'editor' ),
		),
	);

	/**
	 * Filters the registered effect styles.
	 *
	 * @param array  $effects Registered effect styles.
	 * @param string $context Current load context.
	 */
	return apply_filters( 'ls_theme_effect_styles', $effects, $context );
}

/**
 * Enqueues effect styles for the requested context.
 *
 * @param string $context Load context. Accepts 'front' or 'editor'.
 */
function ls_theme_enqueue_effect_styles( $context = 'front' ) {
	$effects = ls_theme_get_effect_styles( $context );

	foreach ( $effects as $effect ) {
		$handle   = $effect['handle'] ?? null;
		$path     = $effect['path'] ?? null;
		$contexts = $effect['contexts'] ?? array();

		if ( ! $handle || ! $path || ! in_array( $context, $contexts, true ) ) {
			continue;
		}

		wp_enqueue_style(
			$handle,
			get_theme_file_uri( $path ),
			array(),
			ls_theme_get_local_asset_version( $path )
		);
	}
}

/**
 * Enqueues shared effect styles for the front end.
 */
function ls_theme_enqueue_frontend_effect_styles() {
	ls_theme_enqueue_effect_styles( 'front' );
}
add_action( 'wp_enqueue_scripts', 'ls_theme_enqueue_frontend_effect_styles' );

/**
 * Enqueues shared effect styles for the block editor.
 */
function ls_theme_enqueue_editor_effect_styles() {
	ls_theme_enqueue_effect_styles( 'editor' );
}
add_action( 'enqueue_block_editor_assets', 'ls_theme_enqueue_editor_effect_styles' );

/**
 * Enqueues the FAQ accordion script when the Yoast FAQ block is actually rendered.
 *
 * Uses render_block rather than has_block() so the script still loads when the
 * block is rendered via a template part, query loop, or other context that
 * has_block() can't see (it only inspects the current post's content).
 *
 * @param string $block_content The block content.
 * @param array  $block         The full block data.
 * @return string
 */
function ls_theme_enqueue_faq_accordion_script( $block_content, $block ) {
	if ( ! isset( $block['blockName'] ) || 'yoast/faq-block' !== $block['blockName'] ) {
		return $block_content;
	}

	$path = 'assets/js/faq-accordion.js';

	wp_enqueue_script(
		'ls-theme-faq-accordion',
		get_theme_file_uri( $path ),
		array(),
		ls_theme_get_local_asset_version( $path ),
		true
	);

	wp_script_add_data( 'ls-theme-faq-accordion', 'strategy', 'defer' );

	return $block_content;
}
add_filter( 'render_block', 'ls_theme_enqueue_faq_accordion_script', 10, 2 );

/**
	* Registers CSS-driven block styles.
	*/
function ls_theme_register_effect_block_styles() {
	if ( ! function_exists( 'register_block_style' ) ) {
		return;
	}

	$block_styles = array(
		array(
			'block_name' => 'core/group',
			'name'       => 'card-feature',
			'label'      => __( 'Card - Feature', 'ls-theme' ),
		),
		array(
			'block_name' => 'core/group',
			'name'       => 'card-category',
			'label'      => __( 'Card - Category', 'ls-theme' ),
		),
		array(
			'block_name' => 'core/group',
			'name'       => 'card-solutions',
			'label'      => __( 'Card - Solutions', 'ls-theme' ),
		),
		array(
			'block_name' => 'core/group',
			'name'       => 'icon-frame-glow',
			'label'      => __( 'Icon Frame Glow', 'ls-theme' ),
		),
		array(
			'block_name' => 'core/button',
			'name'       => 'button-arrow-compact',
			'label'      => __( 'Button Arrow Compact', 'ls-theme' ),
		),
	);

	foreach ( $block_styles as $block_style ) {
		register_block_style(
			$block_style['block_name'],
			array(
				'name'  => $block_style['name'],
				'label' => $block_style['label'],
			)
		);
	}
}
add_action( 'init', 'ls_theme_register_effect_block_styles' );
