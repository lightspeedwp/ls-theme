<?php
/**
 * Adds theme context to Sentry events.
 *
 * The LightSpeed plugin (ls-plugin) owns the Sentry SDK: it initialises it, supplies the DSN,
 * environment, release and data scrubbing. This file never initialises the SDK, never reads a DSN
 * and never sends an event. When the SDK is loaded it only tags events with the theme name and
 * version, so errors can be filtered by theme in Sentry. When the SDK is not loaded (the plugin is
 * inactive, no DSN is set, or the site is local) it does nothing.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Tags Sentry events with the theme component and version.
 *
 * Runs only when the Sentry SDK has already been initialised by ls-plugin.
 */
function ls_theme_add_sentry_context() {
	if ( ! function_exists( '\Sentry\configureScope' ) ) {
		return;
	}

	$ls_theme_version = wp_get_theme( get_template() )->get( 'Version' );

	\Sentry\configureScope(
		static function ( \Sentry\State\Scope $scope ) use ( $ls_theme_version ) {
			$scope->setTag( 'component', 'ls-theme' );
			$scope->setTag( 'theme.version', $ls_theme_version ? (string) $ls_theme_version : 'unknown' );
		}
	);
}
add_action( 'after_setup_theme', 'ls_theme_add_sentry_context' );
