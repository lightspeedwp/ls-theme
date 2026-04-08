/**
 * Dark Mode Switcher.
 *
 * Handles fast light/dark mode toggling without page reload.
 * Persists user preference to localStorage and applies on page load.
 *
 * @package ls-theme
 * @since 1.0.0
 */

( function() {
	'use strict';

	// Configuration from PHP (set via wp_localize_script).
	const config = typeof lsThemeModeData !== 'undefined' ? lsThemeModeData : {
		localStorageKey: 'ls_theme_mode_preference',
		defaultMode: 'light',
	};

	/**
	 * Gets the user's saved mode preference from localStorage.
	 */
	function getSavedMode() {
		try {
			const saved = localStorage.getItem( config.localStorageKey );
			return saved === 'dark' ? 'dark' : 'light';
		} catch ( e ) {
			// localStorage may be disabled; fallback to config default.
			return config.defaultMode;
		}
	}

	/**
	 * Saves the mode preference to localStorage and sets a cookie for server-side detection.
	 */
	function saveMode( mode ) {
		try {
			localStorage.setItem( config.localStorageKey, mode );
		} catch ( e ) {
			// localStorage may be disabled; continue gracefully.
		}

		// Also set a cookie for potential server-side use.
		const expires = new Date();
		expires.setFullYear( expires.getFullYear() + 1 );
		document.cookie = `_ls_theme_mode=${ mode }; path=/; expires=${ expires.toUTCString() }`;
	}

	/**
	 * Applies or removes the dark mode class on the document body.
	 */
	function applyMode( mode ) {
		if ( mode === 'dark' ) {
			document.documentElement.classList.add( 'dark-mode' );
			document.body.classList.add( 'dark-mode' );
		} else {
			document.documentElement.classList.remove( 'dark-mode' );
			document.body.classList.remove( 'dark-mode' );
		}
	}

	/**
	 * Updates the switcher button label and icon based on current mode.
	 */
	function updateSwitcherUI() {
		const button = document.getElementById( 'ls-theme-mode-switcher' );
		if ( ! button ) {
			return;
		}

		const isDark = document.body.classList.contains( 'dark-mode' );
		const label = button.querySelector( '.ls-theme-mode-label' );
		const lightIcon = button.querySelector( '.ls-theme-mode-icon-light' );
		const darkIcon = button.querySelector( '.ls-theme-mode-icon-dark' );

		if ( isDark ) {
			if ( label ) {
				label.textContent = 'Light Mode';
			}
			if ( lightIcon ) {
				lightIcon.style.display = 'block';
			}
			if ( darkIcon ) {
				darkIcon.style.display = 'none';
			}
			button.setAttribute( 'aria-label', 'Switch to Light Mode' );
			button.setAttribute( 'title', 'Switch to Light Mode' );
		} else {
			if ( label ) {
				label.textContent = 'Dark Mode';
			}
			if ( lightIcon ) {
				lightIcon.style.display = 'none';
			}
			if ( darkIcon ) {
				darkIcon.style.display = 'block';
			}
			button.setAttribute( 'aria-label', 'Switch to Dark Mode' );
			button.setAttribute( 'title', 'Switch to Dark Mode' );
		}
	}

	/**
	 * Toggles between light and dark mode.
	 */
	function toggleMode() {
		const currentMode = getSavedMode();
		const newMode = currentMode === 'dark' ? 'light' : 'dark';

		applyMode( newMode );
		saveMode( newMode );
		updateSwitcherUI();

		// Dispatch custom event for other scripts to listen to.
		const event = new CustomEvent( 'lsThemeModeChanged', { detail: { mode: newMode } } );
		document.dispatchEvent( event );
	}

	/**
	 * Initializes the mode switcher and applies saved preference on page load.
	 */
	function init() {
		// Apply saved mode immediately (before DOMContentLoaded) to prevent flicker.
		const savedMode = getSavedMode();
		applyMode( savedMode );

		// Ensure initialization is complete and DOM is ready.
		if ( document.readyState === 'loading' ) {
			document.addEventListener( 'DOMContentLoaded', setup );
		} else {
			setup();
		}
	}

	/**
	 * Sets up event listeners for the switcher button.
	 */
	function setup() {
		const button = document.getElementById( 'ls-theme-mode-switcher' );
		if ( button ) {
			button.addEventListener( 'click', toggleMode );
			updateSwitcherUI();
		}
	}

	// Initialize immediately to minimize flicker.
	init();
} )();
