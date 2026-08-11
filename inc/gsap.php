<?php
/**
 * GSAP asset registration and loading.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns GSAP stylesheet definitions.
 *
 * @param string $context Load context. Accepts 'front' or 'editor'.
 * @return array<string, array<string, mixed>>
 */
function ls_theme_get_gsap_styles( $context = 'front' ) {
	$styles = array(
		'gsap-effects' => array(
			'handle'   => 'ls-theme-gsap-effects',
			'path'     => 'assets/css/gsap-animations.css',
			'contexts' => array( 'front', 'editor' ),
		),
	);

	/**
	 * Filters the registered GSAP styles.
	 *
	 * @param array  $styles Registered GSAP styles.
	 * @param string $context Current load context.
	 */
	return apply_filters( 'ls_theme_gsap_styles', $styles, $context );
}

/**
 * Returns GSAP script definitions.
 *
 * @param string $context Load context. Accepts 'front' or 'editor'.
 * @return array<string, array<string, mixed>>
 */
function ls_theme_get_gsap_scripts( $context = 'front' ) {
	$scripts = array(
		'core' => array(
			'handle'   => 'ls-theme-gsap',
			'src'      => 'https://cdn.jsdelivr.net/npm/gsap@3.14.2/dist/gsap.min.js',
			'deps'     => array(),
			'version'  => null,
			'contexts' => array( 'front', 'editor' ),
		),
		'core-effects' => array(
			'handle'   => 'ls-theme-gsap-core-effects',
			'path'     => 'assets/js/gsap-effects.js',
			'deps'     => array( 'ls-theme-gsap' ),
			'contexts' => array( 'front', 'editor' ),
		),
	);

	/**
	 * Filters the registered GSAP scripts.
	 *
	 * @param array  $scripts Registered GSAP scripts.
	 * @param string $context Current load context.
	 */
	return apply_filters( 'ls_theme_gsap_scripts', $scripts, $context );
}

/**
 * Enqueues GSAP scripts for the requested context.
 *
 * @param string $context Load context. Accepts 'front' or 'editor'.
 */
function ls_theme_enqueue_gsap_scripts( $context = 'front' ) {
	$scripts = ls_theme_get_gsap_scripts( $context );

	foreach ( $scripts as $script ) {
		$handle   = $script['handle'] ?? null;
		$src      = $script['src'] ?? null;
		$path     = $script['path'] ?? null;
		$deps     = $script['deps'] ?? array();
		$version  = $script['version'] ?? null;
		$contexts = $script['contexts'] ?? array();

		if ( $path ) {
			$src     = get_theme_file_uri( $path );
			$version = ls_theme_get_local_asset_version( $path );
		}

		if ( ! $handle || ! $src || ! in_array( $context, $contexts, true ) ) {
			continue;
		}

		wp_enqueue_script(
			$handle,
			$src,
			$deps,
			$version,
			true
		);

		wp_script_add_data( $handle, 'strategy', 'defer' );
	}
}

/**
	* Enqueues GSAP styles for the requested context.
	*
	* @param string $context Load context. Accepts 'front' or 'editor'.
	*/
function ls_theme_enqueue_gsap_styles( $context = 'front' ) {
	$styles = ls_theme_get_gsap_styles( $context );

	foreach ( $styles as $style ) {
		$handle   = $style['handle'] ?? null;
		$src      = $style['src'] ?? null;
		$path     = $style['path'] ?? null;
		$version  = $style['version'] ?? null;
		$contexts = $style['contexts'] ?? array();

		if ( $path ) {
			$src     = get_theme_file_uri( $path );
			$version = ls_theme_get_local_asset_version( $path );
		}

		if ( ! $handle || ! $src || ! in_array( $context, $contexts, true ) ) {
			continue;
		}

		wp_enqueue_style(
			$handle,
			$src,
			array(),
			$version
		);
	}
}

/**
	* Registers GSAP-related block styles.
	*/
function ls_theme_register_gsap_block_styles() {
	if ( ! function_exists( 'register_block_style' ) ) {
		return;
	}

	register_block_style(
		'core/group',
		array(
			'name'  => 'home-hero-section',
			'label' => __( 'Home Hero Section', 'ls-theme' ),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'card-spotlight',
			'label' => __( 'Card Spotlight', 'ls-theme' ),
		)
	);
}
add_action( 'init', 'ls_theme_register_gsap_block_styles' );

/**
 * Detects whether the block currently being rendered needs GSAP, and flags
 * it for the front-end footer enqueue below.
 *
 * Uses render_block (not has_block()) so GSAP-styled blocks are detected
 * regardless of whether they come from post content, a template, or a
 * template-embedded pattern — has_block() only inspects the queried post's
 * own content and would miss template-embedded blocks such as Home Hero.
 * This also means a future GSAP-powered is-style never needs a new
 * page/template check added here — only its class name added to
 * $gsap_styles below.
 *
 * @param string $block_content The block content.
 * @param array  $block         The full block data.
 * @return string
 */
function ls_theme_flag_gsap_needed( $block_content, $block ) {
	$classname = $block['attrs']['className'] ?? '';

	if ( '' === $classname ) {
		return $block_content;
	}

	$gsap_styles = array( 'is-style-home-hero-section', 'is-style-card-spotlight' );
	$classes     = preg_split( '/\s+/', trim( $classname ) );

	foreach ( $gsap_styles as $style ) {
		if ( in_array( $style, $classes, true ) ) {
			add_filter( 'ls_theme_gsap_needed', '__return_true' );
			break;
		}
	}

	return $block_content;
}
add_filter( 'render_block', 'ls_theme_flag_gsap_needed', 10, 2 );

/**
 * Enqueues and prints GSAP assets in the footer, only when a GSAP-powered
 * block style was actually rendered on the page.
 *
 * Printed in wp_footer rather than via the normal wp_head style queue,
 * because detection happens during block rendering, which runs after
 * wp_head has already fired.
 */
function ls_theme_maybe_print_gsap_assets() {
	if ( ! apply_filters( 'ls_theme_gsap_needed', false ) ) {
		return;
	}

	ls_theme_enqueue_gsap_styles( 'front' );
	ls_theme_enqueue_gsap_scripts( 'front' );

	wp_print_styles( array( 'ls-theme-gsap-effects' ) );
	wp_print_scripts( array( 'ls-theme-gsap', 'ls-theme-gsap-core-effects' ) );
}
add_action( 'wp_footer', 'ls_theme_maybe_print_gsap_assets' );

/**
 * Enqueues shared GSAP scripts for the block editor.
 */
function ls_theme_enqueue_editor_gsap_scripts() {
	ls_theme_enqueue_gsap_styles( 'editor' );
	ls_theme_enqueue_gsap_scripts( 'editor' );
}
add_action( 'enqueue_block_editor_assets', 'ls_theme_enqueue_editor_gsap_scripts' );