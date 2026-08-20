<?php
/**
 * Breadcrumb Separator.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Swaps Yoast SEO's default "»" breadcrumb separator for a plain slash.
 *
 * @return string
 */
function ls_theme_breadcrumb_separator() {
	return '/';
}
add_filter( 'wpseo_breadcrumb_separator', 'ls_theme_breadcrumb_separator' );
