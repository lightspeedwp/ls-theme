( function() {
	'use strict';

	const config = window.lsLogoMarquee || {};
	const labels = config.labels || { pause: 'Pause animation', play: 'Play animation' };
	const icons = config.icons || {};
	const reducedMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' );
	const FOCUSABLE = 'a[href], button, input, select, textarea, summary, [tabindex]';

	function enhance( root ) {
		const button = root.querySelector( '.ls-logo-marquee__pause button' );
		const set = root.querySelector( '.ls-logo-marquee__set' );
		let clone = null;
		let observer = null;
		// The visitor's own pause choice, kept while the scroll is switched off and on again by a
		// change to their reduced-motion setting.
		let paused = false;

		if ( ! button || ! set ) {
			return;
		}

		// The label names the next action, so it carries the state and the button needs no
		// aria-pressed (a toggle that keeps aria-pressed must also keep a stable label). The icon
		// shows the same next action and is hidden from assistive tech.
		function syncLabel() {
			const label = document.createElement( 'span' );

			label.textContent = paused ? labels.play : labels.pause;
			button.innerHTML = icons[ paused ? 'play' : 'pause' ] || '';
			button.appendChild( label );
		}

		// The repeat is copied from the logo set as it is now, so it can never show an old logo, and
		// it has empty alt text and is hidden from assistive tech (it is only there for the loop).
		function buildClone() {
			clone = set.cloneNode( true );
			clone.classList.add( 'ls-logo-marquee__set--clone' );
			clone.setAttribute( 'aria-hidden', 'true' );
			clone.querySelectorAll( 'img' ).forEach( ( image ) => image.setAttribute( 'alt', '' ) );
			// If an editor links a logo, the copy of that link must not be a keyboard stop that screen
			// readers cannot see (axe: aria-hidden-focus). Pointer clicks on it still work.
			clone.querySelectorAll( FOCUSABLE ).forEach( ( element ) => element.setAttribute( 'tabindex', '-1' ) );
			set.after( clone );
		}

		// Turns the scrolling state off but keeps watching, so it can come back if the logos change size.
		function unanimate() {
			root.classList.remove( 'is-animated', 'is-paused' );
			root.style.removeProperty( '--ls-logo-marquee-window' );

			if ( clone ) {
				clone.remove();
				clone = null;
			}
		}

		// Works out the window from the logos themselves (the sum of their widths plus the gaps, which
		// is the width of one set when it runs on a single line), so it does not depend on which
		// state the strip is in. A logo and its repeat are one set apart, so the window must be
		// narrower than a set by at least the widest logo, or the same logo could show twice at once.
		// If that leaves room for fewer than two logos (for example an editor removed all but one), or
		// the images have not loaded yet, the strip stays a static row, because a scroll that clips
		// the logos is worse than no scroll.
		function apply() {
			const items = set.querySelectorAll( '.ls-logo-marquee__item' );
			const gap = parseFloat( window.getComputedStyle( set ).columnGap ) || 0;
			let widest = 0;
			let natural = 0;

			items.forEach( ( item ) => {
				const width = item.getBoundingClientRect().width;

				widest = Math.max( widest, width );
				natural += width + gap;
			} );

			const windowWidth = Math.floor( natural - widest );

			if ( windowWidth < widest * 2 || widest <= 0 ) {
				unanimate();
				return;
			}

			if ( ! clone ) {
				buildClone();
			}

			root.style.setProperty( '--ls-logo-marquee-window', windowWidth + 'px' );
			root.classList.toggle( 'is-paused', paused );
			root.classList.add( 'is-animated' );
			syncLabel();
		}

		function start() {
			// The logos are images, so their widths settle as they load.
			if ( ! observer && 'ResizeObserver' in window ) {
				observer = new ResizeObserver( apply );
				set.querySelectorAll( '.ls-logo-marquee__item' ).forEach( ( item ) => observer.observe( item ) );
			}

			apply();
		}

		function stop() {
			unanimate();

			if ( observer ) {
				observer.disconnect();
				observer = null;
			}
		}

		function sync() {
			if ( reducedMotion.matches ) {
				stop();
			} else {
				start();
			}
		}

		button.addEventListener( 'click', () => {
			paused = ! paused;
			root.classList.toggle( 'is-paused', paused );
			syncLabel();
		} );

		// Follows the visitor's setting if they change it while the page is open.
		reducedMotion.addEventListener( 'change', sync );

		sync();
	}

	function init() {
		document.querySelectorAll( '.ls-logo-marquee' ).forEach( enhance );
	}

	if ( 'loading' === document.readyState ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
}() );
