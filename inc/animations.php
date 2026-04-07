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
