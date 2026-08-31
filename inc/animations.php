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
 * Returns, per structural bundle, the block names and/or CSS classes that indicate its styles
 * are actually needed on the current page.
 *
 * The `condition` callbacks on ls_theme_get_effect_styles() cover the common, expected
 * placement of each pattern cheaply and correctly (e.g. `is_front_page()` for the homepage
 * hero) — but every one of these patterns is individually insertable via the block inserter
 * (`Inserter: true`), so an editor can place any of them on a page those conditions don't
 * anticipate. This table backs a `render_block`-based safety net (see
 * ls_theme_detect_bundles_via_render_block() below) that catches that case by inspecting what
 * actually rendered — the same mechanism already used for the FAQ accordion script, and for
 * the same reason: it sees blocks wherever they came from (post content, a `wp:pattern`
 * reference, a template part, a synced pattern), unlike a template check or a raw
 * post_content string search.
 *
 * `homepage-why-lightspeed` has no entry: its only defined CSS selector,
 * `.ls-why-lightspeed-checklist`, isn't present anywhere in the pattern's current markup
 * (pre-existing, unrelated to this fix), so there's no reliable marker to detect — it relies
 * on its `is_front_page()` condition alone, which matches its one real usage today.
 *
 * @return array<string, array{blocks?: string[], classes?: string[]}>
 */
function ls_theme_get_bundle_render_markers() {
	return array(
		'taxonomy-filter'       => array( 'blocks' => array( 'ls-plugin/taxonomy-filter' ) ),
		'work-project-card'     => array(
			'classes' => array( 'is-style-card-case-study', 'ls-tag-pills', 'ls-card-banner-tint', 'ls-platform-tag-brand', 'ls-platform-tag-woocommerce' ),
		),
		'work-archive-sections' => array(
			'classes' => array(
				'ls-icon-well-accent',
				'ls-icon-well-brand',
				'ls-icon-well-commerce',
				'is-style-card-category',
				'is-style-card-link-row',
				'is-style-stat-segment',
				'ls-card-divider-both',
			),
		),
		'card-shells'           => array(
			'classes' => array( 'is-style-card-feature', 'is-style-card-services', 'is-style-card-solutions', 'is-style-glass-card' ),
		),
		'cta-buttons'           => array(
			'classes' => array( 'ls-cta-band', 'ls-cta-inline', 'ls-cta-strip', 'ls-cta-reassurance' ),
		),
		'home-hero'             => array( 'classes' => array( 'ls-home-hero-section' ) ),
		'work-hero'             => array( 'classes' => array( 'ls-work-hero' ) ),
		'blog-hero'             => array( 'classes' => array( 'ls-blog-hero' ) ),
		'blog-all-articles'     => array( 'classes' => array( 'is-style-card-post', 'ls-post-card-cta' ) ),
		'blog-writing-cta'      => array( 'classes' => array( 'ls-writing-cta', 'ls-code-panel' ) ),
		'faq'                   => array( 'blocks' => array( 'yoast/faq-block' ) ),
		'button-secondary'      => array( 'classes' => array( 'is-style-button-secondary' ) ),
		'featured-work'         => array( 'classes' => array( 'ls-featured-work-grid', 'ls-featured-work-card__divider' ) ),
		'where-to-fit'          => array( 'classes' => array( 'ls-package-card' ) ),
		'homepage-cta'          => array( 'classes' => array( 'ls-homepage-cta' ) ),
		'stats-bar'             => array( 'classes' => array( 'ls-stats-row', 'ls-stat-item' ) ),
		'homepage-card-rows'    => array( 'classes' => array( 'ls-homepage-card-row', 'ls-what-we-build-row' ) ),
	);
}

/**
 * Enqueues a bundle's stylesheet (if not already queued) and marks it for a footer print pass.
 *
 * Called once a render_block pass confirms a bundle's markers are actually present. Safe to
 * call more than once per request for the same bundle, or after the bundle was already
 * enqueued via its head-time condition — wp_enqueue_style() and the dedup below are both
 * idempotent, and WP_Styles::do_items() skips handles already printed, so this never produces
 * a duplicate <link>.
 *
 * @param string $key Bundle key, matching ls_theme_get_effect_styles()'s array keys.
 */
function ls_theme_register_late_bundle_style( $key ) {
	static $registered = array();

	if ( isset( $registered[ $key ] ) ) {
		return;
	}

	$effects = ls_theme_get_effect_styles( 'front' );
	$effect  = $effects[ $key ] ?? null;

	if ( ! $effect || empty( $effect['handle'] ) || empty( $effect['path'] ) ) {
		return;
	}

	$registered[ $key ] = true;

	wp_enqueue_style(
		$effect['handle'],
		get_theme_file_uri( $effect['path'] ),
		array(),
		ls_theme_get_local_asset_version( $effect['path'] )
	);

	global $ls_theme_late_style_handles;
	$ls_theme_late_style_handles[] = $effect['handle'];
}

/**
 * Detects structural bundles actually rendered on the page and queues their styles.
 *
 * Runs on every block render (matching the FAQ accordion script's existing precedent) so it
 * sees patterns regardless of how they reached the page — post content, a `wp:pattern`
 * reference, a template part, or a synced pattern — none of which a template conditional tag
 * or a raw post_content string search can reliably cover for an individually-insertable
 * pattern. See ls_theme_get_bundle_render_markers() for why this exists.
 *
 * @param string $block_content The block content.
 * @param array  $block         The full block data.
 * @return string
 */
function ls_theme_detect_bundles_via_render_block( $block_content, $block ) {
	foreach ( ls_theme_get_bundle_render_markers() as $key => $markers ) {
		if ( ! empty( $markers['blocks'] ) && isset( $block['blockName'] ) && in_array( $block['blockName'], $markers['blocks'], true ) ) {
			ls_theme_register_late_bundle_style( $key );
			continue;
		}

		if ( ! empty( $markers['classes'] ) ) {
			foreach ( $markers['classes'] as $class ) {
				if ( false !== strpos( $block_content, $class ) ) {
					ls_theme_register_late_bundle_style( $key );
					break;
				}
			}
		}
	}

	return $block_content;
}
add_filter( 'render_block', 'ls_theme_detect_bundles_via_render_block', 10, 2 );

/**
 * Prints any bundle stylesheets only discovered via render_block detection.
 *
 * These were enqueued after wp_head() already ran, so they were never printed there.
 * wp_print_styles() skips any handle already printed (e.g. one also matched by its head-time
 * condition), so this only ever outputs the ones that genuinely needed the fallback.
 */
function ls_theme_print_late_effect_styles() {
	global $ls_theme_late_style_handles;

	if ( ! empty( $ls_theme_late_style_handles ) ) {
		wp_print_styles( array_unique( $ls_theme_late_style_handles ) );
	}
}
add_action( 'wp_footer', 'ls_theme_print_late_effect_styles', 1 );

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
			// No template reference at all, so there's no cheap head-time condition worth
			// having — a post_content string search misses the normal case of a pattern
			// inserted as a `wp:pattern` reference (it stores only the slug, not the expanded
			// markup). Relies entirely on the render_block-based safety net below.
			'condition' => '__return_false',
		),
		'cta-buttons'             => array(
			'handle'    => 'ls-theme-cta-buttons',
			'path'      => 'assets/css/cta-buttons.css',
			'contexts'  => array( 'front', 'editor' ),
			// Same reasoning as card-shells above.
			'condition' => '__return_false',
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
			// No cheap, reliable head-time condition — the FAQ block can appear anywhere, and
			// has_block() only sees the queried post's own content, not a template part, a
			// `wp:pattern` reference, or a query loop. Relies entirely on the render_block-based
			// safety net below, same mechanism already used for the FAQ accordion script.
			'condition' => '__return_false',
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
			// Fast path for its known, common placements: the homepage's Featured Work section,
			// the Work archive's discuss-project section, and the 404 template. It's also used
			// sitewide in the mobile menu template part (parts/mobile-menu.html) and can be
			// pasted into arbitrary page content — both cases are covered by the render_block
			// safety net below, since a template part's markup never appears in any page's own
			// post_content.
			'condition' => static function () {
				return is_front_page() || is_post_type_archive( 'project' ) || is_404();
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
 * the current post's content). The FAQ's CSS is enqueued the same way, via the render_block-based
 * safety net in ls_theme_detect_bundles_via_render_block() above, for the same reason.
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
