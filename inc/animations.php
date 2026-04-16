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
	* Returns recursive block style variation JSON files for a directory.
	*
	* @param string $directory Base directory.
	* @return array<int, string>
	*/
function ls_theme_get_block_style_json_files( $directory ) {
		$json_files = glob( trailingslashit( $directory ) . '*.json' );

		if ( false === $json_files ) {
			$json_files = array();
		}

		$subdirectories = glob( trailingslashit( $directory ) . '*', GLOB_ONLYDIR );

		if ( false === $subdirectories ) {
			$subdirectories = array();
		}

		foreach ( $subdirectories as $subdirectory ) {
			$json_files = array_merge( $json_files, ls_theme_get_block_style_json_files( $subdirectory ) );
		}

		return $json_files;
	}

/**
	* Returns a modular block style definition by slug.
	*
	* @param string $slug Block style slug.
	* @return array<string, mixed>|null
	*/
function ls_theme_get_block_style_definition( $slug ) {
		static $definitions = null;

		if ( null === $definitions ) {
			$definitions = array();
			$directories = array(
				get_theme_file_path( 'styles/sections' ),
				get_theme_file_path( 'styles/blocks' ),
			);

			foreach ( $directories as $directory ) {
				if ( ! is_dir( $directory ) ) {
					continue;
				}

				foreach ( ls_theme_get_block_style_json_files( $directory ) as $json_file ) {
					$style_definition = wp_json_file_decode( $json_file, array( 'associative' => true ) );

					if (
						! is_array( $style_definition ) ||
						empty( $style_definition['slug'] ) ||
						empty( $style_definition['blockTypes'] ) ||
						! isset( $style_definition['styles'] ) ||
						! is_array( $style_definition['styles'] )
					) {
						continue;
					}

					$definitions[ $style_definition['slug'] ] = $style_definition;
				}
			}
		}

		return $definitions[ $slug ] ?? null;
	}

/**
	* Returns registration arguments for a modular block style.
	*
	* @param string $block_name Block type name.
	* @param string $name       Style slug.
	* @param string $label      Style label.
	* @return array<string, mixed>
	*/
function ls_theme_get_block_style_registration_args( $block_name, $name, $label ) {
		$registration_args = array(
			'name'  => $name,
			'label' => $label,
		);

		$style_definition = ls_theme_get_block_style_definition( $name );

		if ( ! is_array( $style_definition ) ) {
			return $registration_args;
		}

		$block_types = $style_definition['blockTypes'];

		if ( ! is_array( $block_types ) || ! in_array( $block_name, $block_types, true ) ) {
			return $registration_args;
		}

		$registration_args['style_data'] = $style_definition['styles'];

		return $registration_args;
	}

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
			'name'       => 'glass-card',
			'label'      => __( 'Glass Card', 'ls-theme' ),
		),
		array(
			'block_name' => 'core/group',
			'name'       => 'card-feature',
			'label'      => __( 'Card - Feature', 'ls-theme' ),
		),
		array(
			'block_name' => 'core/group',
			'name'       => 'card-post',
			'label'      => __( 'Card - Post', 'ls-theme' ),
		),
		array(
			'block_name' => 'core/cover',
			'name'       => 'card-post-media',
			'label'      => __( 'Card - Post Media', 'ls-theme' ),
		),
		array(
			'block_name' => 'core/group',
			'name'       => 'card-services',
			'label'      => __( 'Card - Services', 'ls-theme' ),
		),
		array(
			'block_name' => 'core/group',
			'name'       => 'card-solutions',
			'label'      => __( 'Card - Solutions', 'ls-theme' ),
		),
		array(
			'block_name' => 'core/group',
			'name'       => 'card-solutions-accent',
			'label'      => __( 'Card - Solutions Accent', 'ls-theme' ),
		),
		array(
			'block_name' => 'core/group',
			'name'       => 'card-hero-stats',
			'label'      => __( 'Card - Hero Stats', 'ls-theme' ),
		),
		array(
			'block_name' => 'core/group',
			'name'       => 'card-performance-stat',
			'label'      => __( 'Card - Performance Stat', 'ls-theme' ),
		),
		array(
			'block_name' => 'core/group',
			'name'       => 'card-value',
			'label'      => __( 'Card - Value', 'ls-theme' ),
		),
		array(
			'block_name' => 'core/group',
			'name'       => 'badge-hero-brand',
			'label'      => __( 'Badge Hero - Brand', 'ls-theme' ),
		),
		array(
			'block_name' => 'core/group',
			'name'       => 'badge-hero-cta',
			'label'      => __( 'Badge Hero - CTA', 'ls-theme' ),
		),
		array(
			'block_name' => 'core/group',
			'name'       => 'badge-hero-accent',
			'label'      => __( 'Badge Hero - Accent', 'ls-theme' ),
		),
		array(
			'block_name' => 'core/group',
			'name'       => 'icon-frame-glow',
			'label'      => __( 'Icon Frame Glow', 'ls-theme' ),
		),
		array(
			'block_name' => 'core/group',
			'name'       => 'icon-frame-brand-cta',
			'label'      => __( 'Icon Frame Brand CTA', 'ls-theme' ),
		),
		array(
			'block_name' => 'core/group',
			'name'       => 'icon-frame-brand-tint',
			'label'      => __( 'Icon Frame Brand Tint', 'ls-theme' ),
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
			ls_theme_get_block_style_registration_args(
				$block_style['block_name'],
				$block_style['name'],
				$block_style['label']
			)
		);
	}
}
add_action( 'init', 'ls_theme_register_effect_block_styles' );
