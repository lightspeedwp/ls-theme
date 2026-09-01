<?php
/**
 * LightSpeed Theme functions and definitions.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Loads effect file */
require get_template_directory() . '/inc/animations.php';

/** Loads GSAP integration file */
require get_template_directory() . '/inc/gsap.php';

/** Loads the presets integration files */
require get_template_directory() . '/inc/presets.php';

/** Loads site header assets */
require get_template_directory() . '/inc/header.php';

/** Loads Portfolio card platform-colour swapping */
require get_template_directory() . '/inc/portfolio-card-colors.php';

/** Loads Blog card category-colour swapping */
require get_template_directory() . '/inc/blog-card-colors.php';

/** Loads breadcrumb separator customisation */
require get_template_directory() . '/inc/breadcrumbs.php';

/** Loads Homepage Featured Work query filtering */
require get_template_directory() . '/inc/featured-work-query.php';

/** Loads Work Single hero "View site" button resolution */
require get_template_directory() . '/inc/work-single-hero.php';

/**
 * Sets up theme supports.
 */
function ls_theme_setup() {
	// Make theme available for translation.
	load_theme_textdomain( 'ls-theme', get_template_directory() . '/languages' );

	// Add support for block styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Required for core/site-logo to render (used by the mobile menu's logo row); without this,
	// the block outputs nothing even when a Site Logo is set via the Site Editor.
	add_theme_support( 'custom-logo' );

	// Enqueue editor styles. These must be listed here (not just enqueued via
	// enqueue_block_editor_assets) so the interactive-control CSS — the collapsed search field,
	// the icon-toggle button shell — reliably reaches the Site Editor's iframed canvas. Every
	// structural bundle is listed unconditionally here (not just the ones with a front-end
	// condition) since the Site Editor's iframed canvas can be editing any page or pattern
	// regardless of which template it's viewed through.
	add_editor_style( 'style.css' );
	add_editor_style( 'assets/css/animations.css' );
	add_editor_style( 'assets/css/taxonomy-filter.css' );
	add_editor_style( 'assets/css/work-project-card.css' );
	add_editor_style( 'assets/css/work-archive-sections.css' );
	add_editor_style( 'assets/css/card-shells.css' );
	add_editor_style( 'assets/css/cta-buttons.css' );
	add_editor_style( 'assets/css/home-hero.css' );
	add_editor_style( 'assets/css/work-hero.css' );
	add_editor_style( 'assets/css/work-single-hero.css' );
	add_editor_style( 'assets/css/blog-hero.css' );
	add_editor_style( 'assets/css/blog-all-articles.css' );
	add_editor_style( 'assets/css/blog-writing-cta.css' );
	add_editor_style( 'assets/css/faq.css' );
	add_editor_style( 'assets/css/links.css' );
	add_editor_style( 'assets/css/button-secondary.css' );
	add_editor_style( 'assets/css/featured-work.css' );
	add_editor_style( 'assets/css/where-to-fit.css' );
	add_editor_style( 'assets/css/homepage-cta.css' );
	add_editor_style( 'assets/css/stats-bar.css' );
	add_editor_style( 'assets/css/homepage-card-rows.css' );
	add_editor_style( 'assets/css/homepage-why-lightspeed.css' );
	add_editor_style( 'assets/css/search-results.css' );
}
add_action( 'after_setup_theme', 'ls_theme_setup' );

/**
 * Enqueues front-end assets.
 *
 * Add CSS and JS files to assets/css/ and assets/js/ and uncomment
 * the relevant lines below once those files exist.
 */
function ls_theme_enqueue_assets() {
	// Main stylesheet (the theme header stylesheet is loaded automatically).
	// Uncomment when assets/css/main.css exists:
	// wp_enqueue_style(
	// 	'ls-theme-main',
	// 	get_template_directory_uri() . '/assets/css/main.css',
	// 	array(),
	// 	wp_get_theme()->get( 'Version' )
	// );

	// Main JavaScript. Uncomment when assets/js/main.js exists:
	// wp_enqueue_script(
	// 	'ls-theme-main',
	// 	get_template_directory_uri() . '/assets/js/main.js',
	// 	array(),
	// 	wp_get_theme()->get( 'Version' ),
	// 	true
	// );
}
add_action( 'wp_enqueue_scripts', 'ls_theme_enqueue_assets' );
