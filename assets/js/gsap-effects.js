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

	function parseCssColour( value ) {
		const trimmedValue = value.trim();

		if ( /^#(?:[0-9a-f]{3}){1,2}$/i.test( trimmedValue ) ) {
			let normalisedValue = trimmedValue.slice( 1 );

			if ( 3 === normalisedValue.length ) {
				normalisedValue = normalisedValue
					.split( '' )
					.map( ( character ) => character + character )
					.join( '' );
			}

			return {
				r: Number.parseInt( normalisedValue.slice( 0, 2 ), 16 ),
				g: Number.parseInt( normalisedValue.slice( 2, 4 ), 16 ),
				b: Number.parseInt( normalisedValue.slice( 4, 6 ), 16 ),
			};
		}

		const rgbMatch = trimmedValue.match( /^rgba?\(\s*([0-9.]+)\s*,\s*([0-9.]+)\s*,\s*([0-9.]+)/i );

		if ( rgbMatch ) {
			return {
				r: Number( rgbMatch[ 1 ] ),
				g: Number( rgbMatch[ 2 ] ),
				b: Number( rgbMatch[ 3 ] ),
			};
		}

		return {
			r: 30,
			g: 106,
			b: 255,
		};
	}

	function mixColours( startColour, endColour, amount ) {
		const clampedAmount = Math.min( 1, Math.max( 0, amount ) );

		return {
			r: Math.round( startColour.r + ( ( endColour.r - startColour.r ) * clampedAmount ) ),
			g: Math.round( startColour.g + ( ( endColour.g - startColour.g ) * clampedAmount ) ),
			b: Math.round( startColour.b + ( ( endColour.b - startColour.b ) * clampedAmount ) ),
		};
	}

	function rgbaString( colour, alpha ) {
		return `rgba(${ colour.r }, ${ colour.g }, ${ colour.b }, ${ alpha })`;
	}

	function getDirectChildByClass( element, className ) {
		return Array.from( element.children ).find( ( child ) => {
			return child.classList.contains( className );
		} ) || null;
	}

	function createEffectCanvas( network ) {
		const existingCanvas = network.querySelector( '.ls-home-hero-section__canvas' );

		if ( existingCanvas ) {
			return existingCanvas;
		}

		const canvas = document.createElement( 'canvas' );

		canvas.className = 'ls-home-hero-section__canvas';
		canvas.setAttribute( 'aria-hidden', 'true' );
		network.appendChild( canvas );

		return canvas;
	}

	function ensureHomeHeroSectionBackground( section ) {
		let background = getDirectChildByClass( section, 'ls-home-hero-section__background' );

		if ( ! background ) {
			background = document.createElement( 'div' );
			background.className = 'ls-home-hero-section__background';
			section.insertBefore( background, section.firstChild );
		}

		if ( ! background.querySelector( '.ls-home-hero-section__orb--brand' ) ) {
			const brandOrb = document.createElement( 'div' );

			brandOrb.className = 'ls-home-hero-section__orb ls-home-hero-section__orb--brand';
			background.appendChild( brandOrb );
		}

		if ( ! background.querySelector( '.ls-home-hero-section__orb--cta' ) ) {
			const ctaOrb = document.createElement( 'div' );

			ctaOrb.className = 'ls-home-hero-section__orb ls-home-hero-section__orb--cta';
			background.appendChild( ctaOrb );
		}

		let network = background.querySelector( '.ls-home-hero-section__network' );

		if ( ! network ) {
			network = document.createElement( 'div' );
			network.className = 'ls-home-hero-section__network';
			background.appendChild( network );
		}

		return network;
	}

	function initHomeHeroSectionNetwork( section, reduceMotion, finePointer ) {
		const network = ensureHomeHeroSectionBackground( section );
		const canvas = createEffectCanvas( network );
		const context = canvas.getContext( '2d' );

		if ( ! context ) {
			return () => {};
		}

		const rootStyles = getComputedStyle( document.documentElement );
		const brandColour = parseCssColour( rootStyles.getPropertyValue( '--wp--preset--color--brand-600' ) || rootStyles.getPropertyValue( '--wp--preset--color--brand-500' ) || '#1E6AFF' );
		const ctaColour = parseCssColour( rootStyles.getPropertyValue( '--wp--preset--color--cta-600' ) || rootStyles.getPropertyValue( '--wp--preset--color--cta-500' ) || '#00FCFC' );
		const interaction = {
			x: 0,
			y: 0,
			strength: 0,
		};
		const moveX = gsapInstance.quickTo( interaction, 'x', {
			duration: reduceMotion ? 0 : 0.18,
			ease: 'power3.out',
		} );
		const moveY = gsapInstance.quickTo( interaction, 'y', {
			duration: reduceMotion ? 0 : 0.18,
			ease: 'power3.out',
		} );
		const moveStrength = gsapInstance.quickTo( interaction, 'strength', {
			duration: reduceMotion ? 0 : 0.16,
			ease: 'power2.out',
		} );
		const size = {
			width: 0,
			height: 0,
			dpr: 1,
		};
		let particles = [];
		let resizeObserver = null;

		function createParticles() {
			const particleCount = reduceMotion
				? Math.min( 20, Math.max( 12, Math.round( ( size.width * size.height ) / 52000 ) ) )
				: Math.min( 48, Math.max( 22, Math.round( ( size.width * size.height ) / 24000 ) ) );

			particles = Array.from( { length: particleCount }, ( value, index ) => {
				const driftX = reduceMotion ? 0 : ( ( Math.random() - 0.5 ) * 0.26 );
				const driftY = reduceMotion ? 0 : ( ( Math.random() - 0.5 ) * 0.26 );
				const mix = 1 === particleCount ? 0.5 : ( index / ( particleCount - 1 ) );

				return {
					x: Math.random() * size.width,
					y: Math.random() * size.height,
					vx: driftX,
					vy: driftY,
					baseVx: driftX,
					baseVy: driftY,
					radius: 1.55 + ( Math.random() * 2.1 ),
					mix,
					seed: Math.random() * Math.PI * 2,
				};
			} );
		}

		function resizeCanvas() {
			const bounds = network.getBoundingClientRect();

			size.width = Math.max( Math.round( bounds.width ), 1 );
			size.height = Math.max( Math.round( bounds.height ), 1 );
			size.dpr = Math.min( window.devicePixelRatio || 1, 1.5 );

			canvas.width = size.width * size.dpr;
			canvas.height = size.height * size.dpr;
			canvas.style.width = `${ size.width }px`;
			canvas.style.height = `${ size.height }px`;

			context.setTransform( 1, 0, 0, 1, 0, 0 );
			context.scale( size.dpr, size.dpr );
			createParticles();

			if ( ! interaction.strength ) {
				moveX( size.width / 2 );
				moveY( size.height * 0.35 );
			}
		}

		function drawFrame( time ) {
			const connectionDistance = Math.min( 220, Math.max( 130, Math.min( size.width, size.height ) * 0.3 ) );
			const connectionDistanceSquared = connectionDistance * connectionDistance;
			const influenceRadius = Math.max( 220, Math.min( size.width, size.height ) * 0.36 );

			context.clearRect( 0, 0, size.width, size.height );

			for ( let index = 0; index < particles.length; index += 1 ) {
				const particle = particles[ index ];

				if ( ! reduceMotion ) {
					const deltaX = particle.x - interaction.x;
					const deltaY = particle.y - interaction.y;
					const distance = Math.max( Math.hypot( deltaX, deltaY ), 1 );

					if ( finePointer && interaction.strength > 0.01 && distance < influenceRadius ) {
						const force = ( 1 - ( distance / influenceRadius ) ) * 0.11 * interaction.strength;

						particle.vx += ( deltaX / distance ) * force;
						particle.vy += ( deltaY / distance ) * force;
					}

					particle.vx += ( particle.baseVx - particle.vx ) * 0.03;
					particle.vy += ( particle.baseVy - particle.vy ) * 0.03;
					particle.x += particle.vx;
					particle.y += particle.vy;

					if ( particle.x <= 0 || particle.x >= size.width ) {
						particle.baseVx *= -1;
						particle.vx *= -0.92;
						particle.x = Math.min( Math.max( particle.x, 0 ), size.width );
					}

					if ( particle.y <= 0 || particle.y >= size.height ) {
						particle.baseVy *= -1;
						particle.vy *= -0.92;
						particle.y = Math.min( Math.max( particle.y, 0 ), size.height );
					}
				}
			}

			for ( let sourceIndex = 0; sourceIndex < particles.length; sourceIndex += 1 ) {
				for ( let targetIndex = sourceIndex + 1; targetIndex < particles.length; targetIndex += 1 ) {
					const sourceParticle = particles[ sourceIndex ];
					const targetParticle = particles[ targetIndex ];
					const deltaX = sourceParticle.x - targetParticle.x;
					const deltaY = sourceParticle.y - targetParticle.y;
					const distanceSquared = ( deltaX * deltaX ) + ( deltaY * deltaY );

					if ( distanceSquared > connectionDistanceSquared ) {
						continue;
					}

					const distance = Math.sqrt( distanceSquared );
					const connectionStrength = 1 - ( distance / connectionDistance );
					const lineColour = mixColours(
						brandColour,
						ctaColour,
						( ( sourceParticle.mix + targetParticle.mix ) / 2 ) + ( Math.sin( time + sourceParticle.seed + targetParticle.seed ) * 0.05 )
					);

					context.beginPath();
					context.moveTo( sourceParticle.x, sourceParticle.y );
					context.lineTo( targetParticle.x, targetParticle.y );
					context.strokeStyle = rgbaString(
						lineColour,
						0.13 + ( connectionStrength * 0.24 ) + ( interaction.strength * connectionStrength * 0.12 )
					);
					context.lineWidth = distance < ( connectionDistance * 0.4 ) ? 1.35 : 0.95;
					context.stroke();
				}
			}

			for ( let index = 0; index < particles.length; index += 1 ) {
				const particle = particles[ index ];
				const dotColour = mixColours(
					brandColour,
					ctaColour,
					particle.mix + ( Math.sin( time + particle.seed ) * 0.08 )
				);

				context.beginPath();
				context.arc( particle.x, particle.y, particle.radius, 0, Math.PI * 2, false );
				context.fillStyle = rgbaString( dotColour, 0.72 + ( interaction.strength * 0.16 ) );
				context.fill();
			}
		}

		function handlePointerMove( event ) {
			const bounds = network.getBoundingClientRect();
			const pointerX = event.clientX - bounds.left;
			const pointerY = event.clientY - bounds.top;

			if ( pointerX < 0 || pointerY < 0 || pointerX > bounds.width || pointerY > bounds.height ) {
				return;
			}

			moveX( pointerX );
			moveY( pointerY );
			moveStrength( 1.2 );
		}

		function resetPointer() {
			moveStrength( 0 );
			moveX( size.width / 2 );
			moveY( size.height * 0.35 );
		}

		resizeCanvas();

		if ( window.ResizeObserver ) {
			resizeObserver = new window.ResizeObserver( resizeCanvas );
			resizeObserver.observe( network );
		} else {
			window.addEventListener( 'resize', resizeCanvas );
		}

		if ( finePointer && ! reduceMotion ) {
			section.addEventListener( 'pointerenter', handlePointerMove );
			section.addEventListener( 'pointermove', handlePointerMove );
			section.addEventListener( 'pointerleave', resetPointer );
		}

		if ( reduceMotion ) {
			drawFrame( 0 );
		} else {
			gsapInstance.ticker.add( drawFrame );
		}

		return () => {
			if ( resizeObserver ) {
				resizeObserver.disconnect();
			} else {
				window.removeEventListener( 'resize', resizeCanvas );
			}

			section.removeEventListener( 'pointerenter', handlePointerMove );
			section.removeEventListener( 'pointermove', handlePointerMove );
			section.removeEventListener( 'pointerleave', resetPointer );
			gsapInstance.ticker.remove( drawFrame );
		};
	}

	function initHomeHeroSection( section ) {
		if ( section.dataset.lsHomeHeroSection === 'true' ) {
			return;
		}

		section.dataset.lsHomeHeroSection = 'true';

		const media = gsapInstance.matchMedia ? gsapInstance.matchMedia( section ) : null;

		if ( ! media ) {
			return;
		}

		media.add(
			{
				reduceMotion: '(prefers-reduced-motion: reduce)',
				finePointer: '(pointer: fine)',
			},
			( context ) => {
				const reduceMotion = Boolean( context.conditions.reduceMotion );
				const finePointer = Boolean( context.conditions.finePointer );
				const teardownNetwork = initHomeHeroSectionNetwork( section, reduceMotion, finePointer );

				return () => {
					teardownNetwork();
				};
			}
		);
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
		document.querySelectorAll( '.is-style-home-hero-section' ).forEach( initHomeHeroSection );
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