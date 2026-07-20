( function() {
	'use strict';

	function toggleSection( section, question ) {
		const isOpen = section.classList.toggle( 'is-open' );
		question.setAttribute( 'aria-expanded', isOpen ? 'true' : 'false' );
	}

	function enhanceSection( section, index ) {
		const question = section.querySelector( '.schema-faq-question' );
		const answer = section.querySelector( '.schema-faq-answer' );

		if ( ! question || ! answer ) {
			return;
		}

		const answerId = answer.id || `schema-faq-answer-${ index }`;
		answer.id = answerId;

		question.setAttribute( 'role', 'button' );
		question.setAttribute( 'tabindex', '0' );
		question.setAttribute( 'aria-expanded', 'false' );
		question.setAttribute( 'aria-controls', answerId );

		question.addEventListener( 'click', () => toggleSection( section, question ) );
		question.addEventListener( 'keydown', ( event ) => {
			if ( 'Enter' === event.key || ' ' === event.key ) {
				event.preventDefault();
				toggleSection( section, question );
			}
		} );
	}

	function initFaqAccordions() {
		document.querySelectorAll( '.schema-faq-section' ).forEach( enhanceSection );
	}

	if ( 'loading' === document.readyState ) {
		document.addEventListener( 'DOMContentLoaded', initFaqAccordions );
	} else {
		initFaqAccordions();
	}
} )();
