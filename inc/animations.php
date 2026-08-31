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
 * Checks the current queried post's raw content for any of the given marker strings.
 *
 * Used as a `has_block()`-style presence check for patterns that are pasted directly into
 * page/post content (rather than pulled in via a template or template part), where the marker
 * is a block className rather than a registered block name that has_block() could match on.
 * Shares has_block()'s own known limitation of not resolving content referenced by ID (e.g. a
 * synced pattern), which is an acceptable trade-off already accepted elsewhere in this codebase.
 *
 * @param string[] $needles Class names or strings to look for in the post content.
 * @return bool
 */
function ls_theme_post_content_has_marker( array $needles ) {
	$post = get_post();

	if ( ! $post instanceof WP_Post ) {
		return false;
	}

	foreach ( $needles as $needle ) {
		if ( false !== strpos( $post->post_content, $needle ) ) {
			return true;
		}
	}

	return false;
}

/**
 * Returns effect stylesheet definitions.
 *
 * @param string $context Load context. Accepts 'front' or 'editor'.
 * @return array<string, array<string, mixed>>
 */
function ls_theme_get_effect_styles( $context = 'front' ) {
	$effects = array(
		// Genuinely global, sitewide styling — always loads, no condition.
		'effects'                 => array(
			'handle'   => 'ls-theme-effects',
			'path'     => 'assets/css/animations.css',
			'contexts' => array( 'front', 'editor' ),
		),
		// Structural bundles (LS-2615, gated LS-2922): each `condition` reflects verified actual
		// usage (grepped against every pattern that references the bundle's CSS classes), not an
		// assumed template mapping — some bundles turned out not to be template-exclusive (e.g.
		// work-archive-sections' icon-well classes are also used by three homepage sections).
		// Conditions only apply in the 'front' context; the editor keeps loading every bundle
		// unconditionally so any pattern still looks correct when edited in isolation.
		'taxonomy-filter'         => array(
			'handle'    => 'ls-theme-taxonomy-filter',
			'path'      => 'assets/css/taxonomy-filter.css',
			'contexts'  => array( 'front', 'editor' ),
			// Used by the Work archive's filter and the Blog archive's category filter.
			'condition' => static function () {
				return is_post_type_archive( 'project' ) || is_page_template( 'page-blog-archive' );
			},
		),
		'work-project-card'       => array(
			'handle'    => 'ls-theme-work-project-card',
			'path'      => 'assets/css/work-project-card.css',
			'contexts'  => array( 'front', 'editor' ),
			// Same "project card" component is reused by the homepage's Featured Work section
			// in addition to the Work archive — not archive-exclusive.
			'condition' => static function () {
				return is_front_page() || is_post_type_archive( 'project' );
			},
		),
		'work-archive-sections'   => array(
			'handle'    => 'ls-theme-work-archive-sections',
			'path'      => 'assets/css/work-archive-sections.css',
			'contexts'  => array( 'front', 'editor' ),
			// Icon-well classes are also used by 3 homepage sections (what-we-build,
			// where-to-start, where-to-fit) in addition to the Work archive.
			'condition' => static function () {
				return is_front_page() || is_post_type_archive( 'project' );
			},
		),
		'card-shells'             => array(
			'handle'    => 'ls-theme-card-shells',
			'path'      => 'assets/css/card-shells.css',
			'contexts'  => array( 'front', 'editor' ),
			// No template reference at all — only ever pasted into arbitrary page content. Checks
			// both the pattern's registered slug (how `wp:pattern` block-comment references store
			// it in post_content — the normal way of inserting a pattern from the inserter) and
			// its CSS class markers (in case the pattern was inserted "detached" into raw blocks).
			'condition' => static function () {
				return ls_theme_post_content_has_marker(
					array(
						'ls-theme/thank-you-consultation',
						'ls-theme/section-card-feature',
						'ls-theme/section-card-services',
						'ls-theme/section-card-solutions',
						'is-style-card-feature',
						'is-style-card-services',
						'is-style-card-solutions',
						'is-style-glass-card',
					)
				);
			},
		),
		'cta-buttons'             => array(
			'handle'    => 'ls-theme-cta-buttons',
			'path'      => 'assets/css/cta-buttons.css',
			'contexts'  => array( 'front', 'editor' ),
			// No template reference at all — only ever pasted into arbitrary page content. Checks
			// both the pattern's registered slug and its CSS class markers, for the same reason
			// as card-shells above.
			'condition' => static function () {
				return ls_theme_post_content_has_marker(
					array(
						'ls-theme/section-cta-consultation-band',
						'ls-theme/section-cta-consultation-strip',
						'ls-theme/section-cta-consultation-reassurance',
						'ls-theme/section-cta-consultation-inline',
						'ls-cta-band',
						'ls-cta-inline',
						'ls-cta-strip',
						'ls-cta-reassurance',
					)
				);
			},
		),
		'home-hero'               => array(
			'handle'    => 'ls-theme-home-hero',
			'path'      => 'assets/css/home-hero.css',
			'contexts'  => array( 'front', 'editor' ),
			'condition' => 'is_front_page',
		),
		'work-hero'               => array(
			'handle'    => 'ls-theme-work-hero',
			'path'      => 'assets/css/work-hero.css',
			'contexts'  => array( 'front', 'editor' ),
			'condition' => static function () {
				return is_post_type_archive( 'project' );
			},
		),
		'blog-hero'               => array(
			'handle'    => 'ls-theme-blog-hero',
			'path'      => 'assets/css/blog-hero.css',
			'contexts'  => array( 'front', 'editor' ),
			'condition' => static function () {
				return is_page_template( 'page-blog-archive' );
			},
		),
		'blog-all-articles'       => array(
			'handle'    => 'ls-theme-blog-all-articles',
			'path'      => 'assets/css/blog-all-articles.css',
			'contexts'  => array( 'front', 'editor' ),
			'condition' => static function () {
				return is_page_template( 'page-blog-archive' );
			},
		),
		'blog-writing-cta'        => array(
			'handle'    => 'ls-theme-blog-writing-cta',
			'path'      => 'assets/css/blog-writing-cta.css',
			'contexts'  => array( 'front', 'editor' ),
			'condition' => static function () {
				return is_page_template( 'page-blog-archive' );
			},
		),
		'faq'                     => array(
			'handle'    => 'ls-theme-faq',
			'path'      => 'assets/css/faq.css',
			'contexts'  => array( 'front', 'editor' ),
			// Matches the existing has_block() precedent used for the FAQ accordion script below.
			'condition' => static function () {
				return has_block( 'yoast/faq-block', get_post() );
			},
		),
		// Not sitewide-exclusive despite appearing in every mega-menu part, the footer, and the
		// mobile menu — both also render in ordinary content patterns (cards, the CTA band, the
		// Work archive's discuss-project section), so per architecture review they were pulled out
		// of animations.css rather than kept there under the header/footer exception. The header
		// and footer template parts render on every page anyway, so a presence condition would
		// never actually skip loading this bundle — left unconditional.
		'links'                   => array(
			'handle'   => 'ls-theme-links',
			'path'     => 'assets/css/links.css',
			'contexts' => array( 'front', 'editor' ),
		),
		'button-secondary'        => array(
			'handle'    => 'ls-theme-button-secondary',
			'path'      => 'assets/css/button-secondary.css',
			'contexts'  => array( 'front', 'editor' ),
			// Used by the homepage's Featured Work section, the Work archive's discuss-project
			// section, the 404 template, and potentially pasted into arbitrary page content.
			'condition' => static function () {
				return is_front_page() || is_post_type_archive( 'project' ) || is_404()
					|| ls_theme_post_content_has_marker( array( 'is-style-button-secondary' ) );
			},
		),
		'featured-work'           => array(
			'handle'    => 'ls-theme-featured-work',
			'path'      => 'assets/css/featured-work.css',
			'contexts'  => array( 'front', 'editor' ),
			'condition' => 'is_front_page',
		),
		'where-to-fit'            => array(
			'handle'    => 'ls-theme-where-to-fit',
			'path'      => 'assets/css/where-to-fit.css',
			'contexts'  => array( 'front', 'editor' ),
			'condition' => 'is_front_page',
		),
		'homepage-cta'            => array(
			'handle'    => 'ls-theme-homepage-cta',
			'path'      => 'assets/css/homepage-cta.css',
			'contexts'  => array( 'front', 'editor' ),
			'condition' => 'is_front_page',
		),
		'stats-bar'               => array(
			'handle'    => 'ls-theme-stats-bar',
			'path'      => 'assets/css/stats-bar.css',
			'contexts'  => array( 'front', 'editor' ),
			'condition' => 'is_front_page',
		),
		'homepage-card-rows'      => array(
			'handle'    => 'ls-theme-homepage-card-rows',
			'path'      => 'assets/css/homepage-card-rows.css',
			'contexts'  => array( 'front', 'editor' ),
			'condition' => 'is_front_page',
		),
		'homepage-why-lightspeed' => array(
			'handle'    => 'ls-theme-homepage-why-lightspeed',
			'path'      => 'assets/css/homepage-why-lightspeed.css',
			'contexts'  => array( 'front', 'editor' ),
			'condition' => 'is_front_page',
		),
		'search-results'          => array(
			'handle'    => 'ls-theme-search-results',
			'path'      => 'assets/css/search-results.css',
			'contexts'  => array( 'front', 'editor' ),
			'condition' => 'is_search',
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
		$handle    = $effect['handle'] ?? null;
		$path      = $effect['path'] ?? null;
		$contexts  = $effect['contexts'] ?? array();
		$condition = $effect['condition'] ?? null;

		if ( ! $handle || ! $path || ! in_array( $context, $contexts, true ) ) {
			continue;
		}

		// Presence conditions only gate the front end; the editor always loads every bundle so
		// patterns look correct when edited outside their usual page context.
		if ( 'front' === $context && is_callable( $condition ) && ! call_user_func( $condition ) ) {
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

/*
 * 'card-feature' (core/group) and 'button-arrow-compact' (core/button) used to be
 * hardcoded here via register_block_style(). Both now live as real style-variation
 * JSON files (styles/sections/cards/card-feature.json, styles/blocks/buttons/
 * button-arrow-compact.json) and are registered generically by
 * inc/presets.php::register_block_style_variations() — keeping both meant two
 * register_block_style() calls for the same block+name pair, which WordPress
 * flags via _doing_it_wrong() and silently drops the second call's label.
 */
