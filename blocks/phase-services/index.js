/**
 * Editor-side registration for ls-theme/phase-services.
 *
 * The PHP registration in inc/blocks.php (register_block_type against this folder's block.json)
 * only tells WordPress how to render this block on the front end — the block editor's own JS
 * registry is entirely separate, and needs its own wp.blocks.registerBlockType() call by the same
 * name or it shows "Your site doesn't include support for this block" and renders nothing in the
 * canvas. ServerSideRender is used for `edit` (rather than reimplementing the markup in JS) so the
 * editor preview always matches render.php's actual output, including the current phase's real
 * content and colour — no separate editor-only representation to keep in sync.
 *
 * Plain global-based script (no build step), per AGENTS.md "Avoid inventing a build pipeline".
 *
 * @package ls-theme
 */
( function ( blocks, element, serverSideRender ) {
	var el = element.createElement;

	blocks.registerBlockType( 'ls-theme/phase-services', {
		title: 'Phase Services',
		category: 'text',
		usesContext: [ 'postId' ],
		description: 'Renders the current phase page\'s "Services in this phase" heading and service cards.',
		edit: function ( props ) {
			return el( serverSideRender, {
				block: 'ls-theme/phase-services',
				urlQueryArgs: { post_id: props.context ? props.context.postId : undefined },
			} );
		},
		save: function () {
			return null;
		},
	} );
} )( window.wp.blocks, window.wp.element, window.wp.serverSideRender );
