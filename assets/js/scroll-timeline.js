( function() {
	'use strict';

	const REVEAL_THRESHOLD = 0.35;
	const PROGRESS_LINE = 0.6;

	function enhance( timeline ) {
		const nodes = timeline.querySelectorAll( '.ls-scroll-timeline__node' );

		if ( ! nodes.length ) {
			return;
		}

		// Hidden and unlit starting states only apply once this class is set, so the
		// editor, no-JS and reduced-motion views keep every node visible and lit.
		timeline.classList.add( 'is-enhanced' );

		const observer = new IntersectionObserver( ( entries ) => {
			entries.forEach( ( entry ) => {
				// A node already scrolled past (anchor link, reload mid-page, fast jump)
				// is not "intersecting", but must still show.
				if ( entry.isIntersecting || entry.boundingClientRect.top < 0 ) {
					entry.target.classList.add( 'is-in' );
					observer.unobserve( entry.target );
				}
			} );
		}, { threshold: REVEAL_THRESHOLD } );

		nodes.forEach( ( node ) => observer.observe( node ) );

		let ticking = false;

		function updateProgress() {
			ticking = false;

			const rect = timeline.getBoundingClientRect();
			const progress = ( window.innerHeight * PROGRESS_LINE - rect.top ) / rect.height;

			timeline.style.setProperty( '--p', Math.max( 0, Math.min( 1, progress ) ) );
		}

		function requestUpdate() {
			if ( ! ticking ) {
				ticking = true;
				window.requestAnimationFrame( updateProgress );
			}
		}

		window.addEventListener( 'scroll', requestUpdate, { passive: true } );
		window.addEventListener( 'resize', requestUpdate );
		updateProgress();
	}

	function init() {
		if ( window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches ) {
			return;
		}

		document.querySelectorAll( '.ls-scroll-timeline' ).forEach( enhance );
	}

	if ( 'loading' === document.readyState ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
}() );
