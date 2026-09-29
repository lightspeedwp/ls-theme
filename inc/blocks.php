<?php
/**
 * Registers the theme's own custom blocks (blocks/*).
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers custom blocks from the theme's /blocks directory.
 */
function ls_theme_register_blocks() {
	register_block_type( get_template_directory() . '/blocks/phase-services' );
}
add_action( 'init', 'ls_theme_register_blocks' );

/**
 * Enqueues the editor-side registration script for ls-theme/phase-services.
 *
 * Not declared as block.json's `editorScript` because that auto-wiring registers the script with
 * no explicit dependencies (no `.asset.php` companion file exists here, on purpose — no build
 * step). Registering it manually guarantees `wp-blocks`, `wp-element`, and `wp-server-side-render`
 * are loaded first, since blocks/phase-services/index.js relies on those as global `wp.*` objects
 * rather than importing them.
 */
function ls_theme_enqueue_phase_services_editor_script() {
	wp_enqueue_script(
		'ls-theme-phase-services-editor',
		get_template_directory_uri() . '/blocks/phase-services/index.js',
		array( 'wp-blocks', 'wp-element', 'wp-server-side-render' ),
		ls_theme_get_local_asset_version( '/blocks/phase-services/index.js' ),
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'ls_theme_enqueue_phase_services_editor_script' );
