( function() {
	const gsapInstance = window.gsap;
	const pointerQuery = window.matchMedia ? window.matchMedia( '(pointer: fine)' ) : { matches: true };
	const reducedMotionQuery = window.matchMedia ? window.matchMedia( '(prefers-reduced-motion: reduce)' ) : { matches: false };

	if ( ! gsapInstance ) {
		return;
	}

	function canTrackPointer() {
		return pointerQuery.matches && ! reducedMotionQuery.matches;
	}

	function getCardPosition( card, event ) {
		const bounds = card.getBoundingClientRect();

		return {
			x: event.clientX - bounds.left,
			y: event.clientY - bounds.top,
		};
	}

	function setEffectPosition( card, x, y ) {
		gsapInstance.set( card, {
			'--ls-effect-x': `${ x.toFixed( 2 ) }px`,
			'--ls-effect-y': `${ y.toFixed( 2 ) }px`,
		} );
	}

	function showEffect( card, settings = {} ) {
		const duration = reducedMotionQuery.matches ? 0 : ( settings.duration ?? 0.24 );

		gsapInstance.to( card, {
			'--ls-effect-opacity': settings.opacity ?? 1,
			'--ls-effect-border-opacity': settings.borderOpacity ?? 1,
			'--ls-effect-scale': settings.scale ?? 1,
			duration,
			ease: settings.ease ?? 'power2.out',
			overwrite: 'auto',
		} );
	}

	function hideEffect( card ) {
		const duration = reducedMotionQuery.matches ? 0 : 0.28;

		gsapInstance.to( card, {
			'--ls-effect-opacity': 0,
			'--ls-effect-border-opacity': 0,
			'--ls-effect-scale': 0.94,
			duration,
			ease: 'power2.out',
			overwrite: 'auto',
		} );
	}

	function setFocusState( card ) {
		const bounds = card.getBoundingClientRect();

		setEffectPosition( card, bounds.width / 2, bounds.height / 2 );
		showEffect( card, {
			opacity: 0.72,
			borderOpacity: 0.62,
			scale: 1,
			duration: 0.2,
		} );
	}

	function initSpotlightCard( card ) {
		if ( card.dataset.lsGsapSpotlight === 'true' ) {
			return;
		}

		card.dataset.lsGsapSpotlight = 'true';

		gsapInstance.set( card, {
			'--ls-effect-opacity': 0,
			'--ls-effect-border-opacity': 0,
			'--ls-effect-scale': 0.94,
		} );

		card.addEventListener( 'pointerenter', ( event ) => {
			if ( ! canTrackPointer() ) {
				return;
			}

			const position = getCardPosition( card, event );

			setEffectPosition( card, position.x, position.y );
			showEffect( card );
		} );

		card.addEventListener( 'pointermove', ( event ) => {
			if ( ! canTrackPointer() ) {
				return;
			}

			const position = getCardPosition( card, event );

			setEffectPosition( card, position.x, position.y );
		} );

		card.addEventListener( 'pointerleave', () => {
			if ( ! canTrackPointer() ) {
				return;
			}

			hideEffect( card );
		} );

		card.addEventListener( 'focusin', () => {
			setFocusState( card );
		} );

		card.addEventListener( 'focusout', () => {
			hideEffect( card );
		} );
	}

	function initEffects() {
		document.querySelectorAll( '.is-style-card-spotlight' ).forEach( initSpotlightCard );
	}

	function boot() {
		initEffects();
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', boot );
	} else {
		boot();
	}

	window.addEventListener( 'load', boot );
}() );