( function() {
	'use strict';

	const labels = window.lsExpandAll || { expand: 'Expand all', collapse: 'Collapse all' };

	function enhance( section ) {
		const button = section.querySelector( '.ls-year-by-year__toggle button' );
		const cards = section.querySelectorAll( 'details.ls-year-card' );

		if ( ! button || ! cards.length ) {
			return;
		}

		function allOpen() {
			return Array.prototype.every.call( cards, ( card ) => card.open );
		}

		// The label names the next action, so it carries the state and the button needs no
		// aria-pressed (a toggle that keeps aria-pressed must also keep a stable label).
		function sync() {
			button.textContent = allOpen() ? labels.collapse : labels.expand;
		}

		button.addEventListener( 'click', () => {
			const open = ! allOpen();

			cards.forEach( ( card ) => {
				card.open = open;
			} );

			sync();
		} );

		// Keeps the label right when cards are opened or closed one by one.
		cards.forEach( ( card ) => card.addEventListener( 'toggle', sync ) );

		sync();
	}

	function init() {
		document.querySelectorAll( '.ls-year-by-year' ).forEach( enhance );
	}

	if ( 'loading' === document.readyState ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
}() );
