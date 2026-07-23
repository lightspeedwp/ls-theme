/**
 * Light/dark mode toggle click handling.
 *
 * Assumes theme.json (light) is the site's baked-in default whenever no `data-theme` override is
 * present on <html> — true for this theme's setup, where styles/dark.json is an opt-in variation
 * rather than the deployed default. If that ever changes, the initial "no attribute" case here
 * would need a server-provided default instead of the light-mode assumption below.
 */
( function () {
	'use strict';

	var STORAGE_KEY = 'ls-theme-mode';
	var TOGGLE_SELECTOR = '[data-ls-theme-toggle]';

	function getEffectiveMode() {
		return 'dark' === document.documentElement.getAttribute( 'data-theme' ) ? 'dark' : 'light';
	}

	function syncToggleButtons( mode ) {
		var toggles = document.querySelectorAll( TOGGLE_SELECTOR );
		for ( var i = 0; i < toggles.length; i++ ) {
			toggles[ i ].setAttribute( 'aria-pressed', 'dark' === mode ? 'true' : 'false' );
		}
	}

	function applyMode( mode ) {
		document.documentElement.setAttribute( 'data-theme', mode );
		try {
			localStorage.setItem( STORAGE_KEY, mode );
		} catch ( error ) {}
		syncToggleButtons( mode );
	}

	document.addEventListener( 'click', function ( event ) {
		var toggle = event.target.closest( TOGGLE_SELECTOR );
		if ( ! toggle ) {
			return;
		}
		event.preventDefault();
		applyMode( 'dark' === getEffectiveMode() ? 'light' : 'dark' );
	} );

	document.addEventListener( 'DOMContentLoaded', function () {
		syncToggleButtons( getEffectiveMode() );
	} );
} )();
