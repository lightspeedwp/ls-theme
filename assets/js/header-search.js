/**
 * Header search expand-on-click.
 *
 * core/search in "button-only" position renders just a submit button with the input hidden —
 * there is no built-in core behavior to reveal and focus that input on click. A pure-CSS
 * :focus-within trick can't do it either, since there's nothing visible to click into until the
 * input is already revealed. This intercepts the button's first click to expand + focus the field
 * instead of submitting immediately; a second click (now that the field has focus) submits
 * normally, matching standard expand-to-search UX.
 */
( function () {
	'use strict';

	var EXPANDED_CLASS = 'site-header__search--expanded';

	document.addEventListener( 'click', function ( event ) {
		var button = event.target.closest( '.site-header__search .wp-block-search__button' );
		if ( ! button ) {
			return;
		}

		var container = button.closest( '.site-header__search' );
		if ( ! container || container.classList.contains( EXPANDED_CLASS ) ) {
			return;
		}

		event.preventDefault();
		container.classList.add( EXPANDED_CLASS );

		var input = container.querySelector( '.wp-block-search__input' );
		if ( input ) {
			input.focus();
		}
	} );

	document.addEventListener( 'focusout', function ( event ) {
		var container = event.target.closest && event.target.closest( '.site-header__search' );
		if ( ! container ) {
			return;
		}
		// Wait a tick so focus can land on the next element inside the same container (e.g. the
		// button itself) before deciding the field has genuinely lost focus.
		window.setTimeout( function () {
			if ( ! container.contains( document.activeElement ) ) {
				container.classList.remove( EXPANDED_CLASS );
			}
		}, 0 );
	} );
} )();
