( function() {
	'use strict';

	const HEADING_SELECTOR = 'h2';

	function slugify( text ) {
		return text
			.toLowerCase()
			.trim()
			.replace( /[^a-z0-9]+/g, '-' )
			.replace( /^-+|-+$/g, '' );
	}

	// Gives every heading an id (keeping any the editor already set) and returns them.
	function prepareHeadings( body ) {
		const used = new Set();

		return Array.from( body.querySelectorAll( HEADING_SELECTOR ) ).map( ( heading ) => {
			let id = heading.id;

			if ( ! id ) {
				const base = slugify( heading.textContent ) || 'section';
				id = base;

				for ( let i = 2; used.has( id ) || document.getElementById( id ); i++ ) {
					id = `${ base }-${ i }`;
				}

				heading.id = id;
			}

			used.add( id );

			return heading;
		} );
	}

	function buildList( headings ) {
		const list = document.createElement( 'ol' );
		list.className = 'ls-legal-toc__list';

		const links = headings.map( ( heading ) => {
			const item = document.createElement( 'li' );
			const link = document.createElement( 'a' );

			link.className = 'ls-legal-toc__link';
			link.href = `#${ heading.id }`;
			link.textContent = heading.textContent;

			item.appendChild( link );
			list.appendChild( item );

			return link;
		} );

		return { list, links };
	}

	function setActive( links, activeLink ) {
		links.forEach( ( link ) => {
			const isActive = link === activeLink;

			link.classList.toggle( 'is-active', isActive );

			if ( isActive ) {
				link.setAttribute( 'aria-current', 'location' );
			} else {
				link.removeAttribute( 'aria-current' );
			}
		} );
	}

	function watchHeadings( headings, links ) {
		if ( ! ( 'IntersectionObserver' in window ) ) {
			return;
		}

		// A heading counts as "current" once it crosses the upper part of the viewport.
		const observer = new IntersectionObserver(
			( entries ) => {
				entries.forEach( ( entry ) => {
					if ( entry.isIntersecting ) {
						setActive( links, links[ headings.indexOf( entry.target ) ] );
					}
				} );
			},
			{ rootMargin: '0px 0px -65% 0px' }
		);

		headings.forEach( ( heading ) => observer.observe( heading ) );
	}

	function initToc( rail ) {
		const body = document.querySelector( '.ls-legal-body' );

		if ( ! body || rail.querySelector( '.ls-legal-toc__list' ) ) {
			return;
		}

		const headings = prepareHeadings( body );

		if ( 0 === headings.length ) {
			rail.hidden = true;
			return;
		}

		const label = rail.querySelector( '.ls-legal-toc__label' );
		const nav = document.createElement( 'nav' );
		const { list, links } = buildList( headings );

		if ( label ) {
			label.id = label.id || 'ls-legal-toc-label';
			nav.setAttribute( 'aria-labelledby', label.id );
		} else {
			nav.setAttribute( 'aria-label', 'On this page' );
		}

		nav.appendChild( list );
		rail.appendChild( nav );

		watchHeadings( headings, links );
	}

	function init() {
		document.querySelectorAll( '.ls-legal-toc' ).forEach( initToc );
	}

	if ( 'loading' === document.readyState ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
} )();
