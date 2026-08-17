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
		'effects'               => array(
			'handle'   => 'ls-theme-effects',
			'path'     => 'assets/css/animations.css',
			'contexts' => array( 'front', 'editor' ),
		),
		// Structural bundles (LS-2615): styles that can't live in animations.css because that
		// bundle is reserved for genuinely global, sitewide styling. Split into small,
		// semantically-scoped files instead of one large components.css, so a future conditional-
		// loading pass only has to add a `condition` callback to the relevant entry below rather
		// than re-splitting CSS. All entries are unconditional for now, same as animations.css.
		//
		// Two different loading strategies will apply once conditions are added:
		// - Template-bound (taxonomy-filter, work-project-card, work-archive-sections, work-hero):
		//   only ever render through template-work-archive.php — a simple
		//   is_post_type_archive( 'project' ) condition will cover all of them.
		// - Insertable, page-agnostic (card-shells, cta-buttons, faq): these patterns have no
		//   template reference at all — editors paste them into arbitrary page content — so a
		//   page-based condition can't detect them reliably. These will need a render_block-filter
		//   approach instead (see ls_theme_enqueue_faq_accordion_script() below for the existing
		//   precedent), not a template check.
		// - home-hero is template-bound to the front page specifically (is_front_page()).
		'taxonomy-filter'       => array(
			'handle'   => 'ls-theme-taxonomy-filter',
			'path'     => 'assets/css/taxonomy-filter.css',
			'contexts' => array( 'front', 'editor' ),
		),
		'work-project-card'     => array(
			'handle'   => 'ls-theme-work-project-card',
			'path'     => 'assets/css/work-project-card.css',
			'contexts' => array( 'front', 'editor' ),
		),
		'work-archive-sections' => array(
			'handle'   => 'ls-theme-work-archive-sections',
			'path'     => 'assets/css/work-archive-sections.css',
			'contexts' => array( 'front', 'editor' ),
		),
		'card-shells'           => array(
			'handle'   => 'ls-theme-card-shells',
			'path'     => 'assets/css/card-shells.css',
			'contexts' => array( 'front', 'editor' ),
		),
		'cta-buttons'           => array(
			'handle'   => 'ls-theme-cta-buttons',
			'path'     => 'assets/css/cta-buttons.css',
			'contexts' => array( 'front', 'editor' ),
		),
		'home-hero'             => array(
			'handle'   => 'ls-theme-home-hero',
			'path'     => 'assets/css/home-hero.css',
			'contexts' => array( 'front', 'editor' ),
		),
		'work-hero'             => array(
			'handle'   => 'ls-theme-work-hero',
			'path'     => 'assets/css/work-hero.css',
			'contexts' => array( 'front', 'editor' ),
		),
		'faq'                   => array(
			'handle'   => 'ls-theme-faq',
			'path'     => 'assets/css/faq.css',
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
 * Uses render_block rather than has_block() so the script still loads when the block is rendered
 * via a template part, query loop, or other context that has_block() can't see (it only inspects
 * the current post's content). The FAQ's CSS ships unconditionally via components.css instead of
 * being enqueued here, since it's already loaded on every page.
 *
 * @param string $block_content The block content.
 * @param array  $block         The full block data.
 * @return string
 */
function ls_theme_enqueue_faq_accordion_script( $block_content, $block ) {
	if ( ! isset( $block['blockName'] ) || 'yoast/faq-block' !== $block['blockName'] ) {
		return $block_content;
	}

	$script_path = 'assets/js/faq-accordion.js';

	wp_enqueue_script(
		'ls-theme-faq-accordion',
		get_theme_file_uri( $script_path ),
		array(),
		ls_theme_get_local_asset_version( $script_path ),
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
