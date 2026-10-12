/**
 * Solutions case study — "Featured project" picker for the Query block.
 *
 * Adds a sidebar panel to the Solutions case-study Query Loop (the one carrying the
 * `ls-solutions-case-study-query` class from patterns/sections/solutions-case-study.php) that lets the
 * editor choose which `project` post the card shows. The choice is stored as `query.include` (a one-item
 * array of post IDs). The Post Template block forwards unknown `query` keys to the REST API, so the
 * editor preview follows the choice, and inc/solutions-case-study-query.php applies it on the front end.
 * No choice means the latest project. Plain script, no build step.
 *
 * Patterns inserted into a page are content-only in the editor: every descendant of the pattern root is
 * `disabled`, so the Query block cannot be selected and shows no settings. The wrapper below lifts this
 * one block to `contentOnly` and renders the picker in the sidebar's "Content" group, which content-only
 * blocks do show.
 */
( function ( wp ) {
	'use strict';

	var el = wp.element.createElement;
	var Fragment = wp.element.Fragment;
	var __ = wp.i18n.__;
	var InspectorControls = wp.blockEditor.InspectorControls;
	var useBlockEditingMode = wp.blockEditor.useBlockEditingMode;
	var SelectControl = wp.components.SelectControl;
	var useSelect = wp.data.useSelect;
	var createHigherOrderComponent = wp.compose.createHigherOrderComponent;

	var MARKER_CLASS = 'ls-solutions-case-study-query';

	function FeaturedProjectPanel( props ) {
		var attributes = props.attributes;
		var query = attributes.query || {};
		var selected = Array.isArray( query.include ) && query.include.length ? String( query.include[ 0 ] ) : '';

		var projects = useSelect( function ( select ) {
			return select( 'core' ).getEntityRecords( 'postType', 'project', {
				per_page: 100,
				orderby: 'title',
				order: 'asc',
				status: 'publish',
				_fields: 'id,title',
			} );
		}, [] );

		var options = [ { label: __( 'Latest project (default)', 'ls-theme' ), value: '' } ];

		( projects || [] ).forEach( function ( project ) {
			var title = project.title && project.title.rendered ? project.title.rendered : String( project.id );
			options.push( { label: title, value: String( project.id ) } );
		} );

		function onChange( value ) {
			var next = Object.assign( {}, query );

			if ( value ) {
				next.include = [ parseInt( value, 10 ) ];
			} else {
				delete next.include;
			}

			props.setAttributes( { query: next } );
		}

		return el(
			InspectorControls,
			{ group: 'content' },
			el( SelectControl, {
				__nextHasNoMarginBottom: true,
				__next40pxDefaultSize: true,
				label: __( 'Featured project', 'ls-theme' ),
				help: __( 'The portfolio project this case study features. Leave on the default to show the latest project.', 'ls-theme' ),
				value: selected,
				options: options,
				onChange: onChange,
			} )
		);
	}

	function FeaturedProjectEdit( props ) {
		var BlockEdit = props.BlockEdit;

		useBlockEditingMode( 'contentOnly' );

		return el( Fragment, null, el( BlockEdit, props.blockProps ), props.blockProps.isSelected ? el( FeaturedProjectPanel, props.blockProps ) : null );
	}

	var withFeaturedProjectPanel = createHigherOrderComponent( function ( BlockEdit ) {
		return function ( props ) {
			var isTarget =
				'core/query' === props.name &&
				( props.attributes.className || '' ).split( ' ' ).indexOf( MARKER_CLASS ) !== -1;

			if ( ! isTarget ) {
				return el( BlockEdit, props );
			}

			return el( FeaturedProjectEdit, { BlockEdit: BlockEdit, blockProps: props } );
		};
	}, 'withSolutionsFeaturedProjectPanel' );

	wp.hooks.addFilter( 'editor.BlockEdit', 'ls-theme/solutions-case-study-project', withFeaturedProjectPanel );
}( window.wp ) );
