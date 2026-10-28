( function() {
	'use strict';

	const config = window.lsLogoMarquee || {};
	const labels = config.labels || { pause: 'Pause animation', play: 'Play animation' };
	const icons = config.icons || {};
	const reducedMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' );

	function enhance( root ) {
		const button = root.querySelector( '.ls-logo-marquee__pause button' );
		const set = root.querySelector( '.ls-logo-marquee__set' );
		const clone = root.querySelector( '.ls-logo-marquee__set--clone' );
		let observer = null;

		if ( ! button || ! set || ! clone ) {
			return;
		}

		// The label names the next action, so it carries the state and the button needs no
		// aria-pressed (a toggle that keeps aria-pressed must also keep a stable label). The icon
		// shows the same next action and is hidden from assistive tech.
		function syncLabel() {
			const paused = root.classList.contains( 'is-paused' );
			const label = document.createElement( 'span' );

			label.textContent = paused ? labels.play : labels.pause;
			button.innerHTML = icons[ paused ? 'play' : 'pause' ] || '';
			button.appendChild( label );
		}

		// A logo and its repeat are one set apart, so the window must be narrower than a set by at
		// least the widest logo, or the same logo could show twice at once.
		function sizeWindow() {
			let widest = 0;

			set.querySelectorAll( '.ls-logo-marquee__item' ).forEach( ( item ) => {
				widest = Math.max( widest, item.getBoundingClientRect().width );
			} );

			const windowWidth = Math.floor( set.getBoundingClientRect().width - widest );

			if ( windowWidth > 0 ) {
				root.style.setProperty( '--ls-logo-marquee-window', windowWidth + 'px' );
			}
		}

		function start() {
			root.classList.remove( 'is-paused' );
			root.classList.add( 'is-animated' );
			// The repeat is only there for the seamless loop, so assistive tech skips it.
			clone.setAttribute( 'aria-hidden', 'true' );
			syncLabel();
			sizeWindow();

			// The logos are images, so the set's width settles as they load and as the screen resizes.
			if ( ! observer && 'ResizeObserver' in window ) {
				observer = new ResizeObserver( sizeWindow );
				observer.observe( set );
			}
		}

		function stop() {
			root.classList.remove( 'is-animated', 'is-paused' );
			root.style.removeProperty( '--ls-logo-marquee-window' );
			clone.removeAttribute( 'aria-hidden' );

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
			root.classList.toggle( 'is-paused' );
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
