<?php
namespace ls_theme\includes;

/**
 * Register Modular Theme.json Presets.
 *
 * Loads separate JSON preset files from /styles/presets/ and merges them
 * into theme.json via the wp_theme_json_data_theme filter. This allows
 * design tokens (colours, typography, spacing, shadows, radii, borders,
 * layout) and CSS utility classes (aspect ratios, flex/grid helpers,
 * spacing utilities, text truncation) to be maintained in individual
 * files for better organisation and reusability across projects.
 *
 * @package ls_theme\includes
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Merges modular preset JSON files into the theme's theme.json data.
 *
 * Automatically discovers and loads all .json files from the /styles/presets/
 * directory and its subdirectories (e.g., /styles/presets/blocks/). Each preset
 * file contains a slice of `settings` or `styles` that would otherwise live
 * directly in theme.json. Files are loaded alphabetically, and WordPress's
 * native WP_Theme_JSON::merge() handles the merging logic.
 *
 * @since ls_theme 1.0
 *
 * @param WP_Theme_JSON_Data $theme_json The theme JSON data object.
 * @return WP_Theme_JSON_Data The modified theme JSON data object.
 */
function merge_preset_files( $theme_json ) {
	$preset_dir = get_template_directory() . '/styles/presets/';

	// Automatically discover all JSON files in the presets directory.
	if ( ! is_dir( $preset_dir ) ) {
		return $theme_json;
	}

	// Recursively find all JSON files in presets directory and subdirectories.
	$preset_files = get_preset_files_recursive( $preset_dir );

	if ( empty( $preset_files ) ) {
		return $theme_json;
	}

	// Sort alphabetically for predictable loading order.
	sort( $preset_files );

	foreach ( $preset_files as $file ) {
		$preset_data = json_decode( file_get_contents( $file ), true ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents

		if ( ! is_array( $preset_data ) ) {
			continue;
		}

		// Use WordPress's native merge method via update_with().
		$theme_json->update_with( $preset_data );
	}

	return $theme_json;
}

/**
 * Recursively retrieves all JSON files from a directory and its subdirectories.
 *
 * @since ls_theme 1.1
 *
 * @param string $directory The directory path to scan for JSON files.
 * @return array Array of file paths to JSON files.
 */
function get_preset_files_recursive( $directory ) {
	$files = array();

	// Get JSON files in the current directory.
	$json_files = glob( $directory . '*.json' );
	if ( ! empty( $json_files ) ) {
		$files = array_merge( $files, $json_files );
	}

	// Get subdirectories and recursively scan them.
	$subdirs = glob( $directory . '*', GLOB_ONLYDIR );
	if ( ! empty( $subdirs ) ) {
		foreach ( $subdirs as $subdir ) {
			$files = array_merge( $files, get_preset_files_recursive( trailingslashit( $subdir ) ) );
		}
	}

	return $files;
}

add_filter( 'wp_theme_json_data_theme', __NAMESPACE__ . '\merge_preset_files' );

/**
 * Merges block/section style-variation JSON files into the theme's theme.json data.
 *
 * /styles/blocks/**.json and /styles/sections/**.json are authored as standalone block
 * style variation files ({slug, blockTypes, styles}), not raw theme.json fragments — unlike
 * /styles/presets/, nothing was loading them at all, so every is-style-<slug> class referenced
 * in patterns/parts (mega-menu-item-service, mega-menu-panel, mobile-menu-accordion,
 * mobile-menu-list, etc.) had no matching CSS. This converts each file into the
 * `styles.blocks.<blockType>.variations.<slug>` shape WP_Theme_JSON expects, for every
 * blockType the file declares, then merges via the same update_with() WordPress uses for
 * /styles/presets/.
 *
 * @since ls_theme 1.2
 *
 * @param WP_Theme_JSON_Data $theme_json The theme JSON data object.
 * @return WP_Theme_JSON_Data The modified theme JSON data object.
 */
function merge_block_style_variations( $theme_json ) {
	$variation_dirs = array(
		get_template_directory() . '/styles/blocks/',
		get_template_directory() . '/styles/sections/',
	);

	$variation_files = array();
	foreach ( $variation_dirs as $dir ) {
		if ( is_dir( $dir ) ) {
			$variation_files = array_merge( $variation_files, get_preset_files_recursive( $dir ) );
		}
	}

	if ( empty( $variation_files ) ) {
		return $theme_json;
	}

	sort( $variation_files );

	foreach ( $variation_files as $file ) {
		$variation_data = json_decode( file_get_contents( $file ), true ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents

		if ( ! is_array( $variation_data ) || empty( $variation_data['slug'] ) || empty( $variation_data['blockTypes'] ) || empty( $variation_data['styles'] ) ) {
			continue;
		}

		$slug  = $variation_data['slug'];
		$patch = array( 'styles' => array( 'blocks' => array() ) );

		foreach ( (array) $variation_data['blockTypes'] as $block_type ) {
			$patch['styles']['blocks'][ $block_type ] = array(
				'variations' => array(
					$slug => $variation_data['styles'],
				),
			);
		}

		$theme_json->update_with( $patch );
	}

	return $theme_json;
}
add_filter( 'wp_theme_json_data_theme', __NAMESPACE__ . '\merge_block_style_variations' );

/**
 * Registers each /styles/blocks/ and /styles/sections/ variation as a block style.
 *
 * merge_block_style_variations() above puts the actual CSS into theme.json's
 * styles.blocks.<blockType>.variations.<slug> — but WP_Theme_JSON only emits CSS for a
 * variation slug that is ALSO present in WP_Block_Styles_Registry; theme.json data alone
 * isn't enough. This performs that registration (name + label only — no 'style_data' /
 * inline styles, since the real styles already come from the theme.json merge).
 *
 * @since ls_theme 1.2
 */
function register_block_style_variations() {
	$variation_dirs = array(
		get_template_directory() . '/styles/blocks/',
		get_template_directory() . '/styles/sections/',
	);

	$variation_files = array();
	foreach ( $variation_dirs as $dir ) {
		if ( is_dir( $dir ) ) {
			$variation_files = array_merge( $variation_files, get_preset_files_recursive( $dir ) );
		}
	}

	foreach ( $variation_files as $file ) {
		$variation_data = json_decode( file_get_contents( $file ), true ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents

		if ( ! is_array( $variation_data ) || empty( $variation_data['slug'] ) || empty( $variation_data['blockTypes'] ) ) {
			continue;
		}

		$slug  = $variation_data['slug'];
		$label = ! empty( $variation_data['title'] ) ? $variation_data['title'] : $slug;

		foreach ( (array) $variation_data['blockTypes'] as $block_type ) {
			register_block_style(
				$block_type,
				array(
					'name'  => $slug,
					'label' => $label,
				)
			);
		}
	}
}
add_action( 'init', __NAMESPACE__ . '\register_block_style_variations' );