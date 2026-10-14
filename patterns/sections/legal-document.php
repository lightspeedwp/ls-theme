<?php
/**
 * Title: Section - Document with Contents Rail
 * Slug: ls-theme/legal-document
 * Categories: text
 * Block Types: core/pattern
 * Description: A long-form document layout for trust, legal and policy pages: a sticky "On this page" rail beside the page's own content. The content column is a core/post-content block, so each page supplies its own headings, paragraphs and lists — nothing in this pattern needs editing per page. The rail is built at runtime from the content's H2 headings and highlights the section being read (assets/js/legal-toc.js; it is hidden when scripting is off). A "Last updated" line above the content reads the page's modified date (core/post-date). Two-column core/columns layout that stacks on mobile; the sticky rail, list markers and heading scroll offset live in src/scss/structural/legal-page.scss. Fallback note: the rail is a core/group (no core block builds a heading-based contents list from post content in a template).
 * Keywords: legal, policy, document, contents, table of contents, sidebar, rail, privacy, terms, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-legal-doc","style":{"spacing":{"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|50","bottom":"var:preset|spacing|100","left":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"1216px"}} -->
<section class="wp-block-group alignfull ls-legal-doc" style="padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--50)">

	<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|100"}}}} -->
	<div class="wp-block-columns">

		<!-- wp:column {"width":"260px"} -->
		<div class="wp-block-column" style="flex-basis:260px">

			<!-- wp:group {"tagName":"aside","className":"ls-legal-toc","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
			<aside class="wp-block-group ls-legal-toc">
				<!-- wp:paragraph {"className":"ls-legal-toc__label","style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var:custom|color|text|subtle"}},"fontSize":"100"} -->
				<p class="ls-legal-toc__label has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'On this page', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</aside>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"border":{"bottom":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"bottom":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group" style="border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;padding-bottom:var(--wp--preset--spacing--40)">
				<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"var:custom|color|text|subtle"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);letter-spacing:var(--wp--custom--typography--letter-spacing--wide)"><?php echo esc_html__( 'Last updated ·', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:post-date {"displayType":"modified","format":"j F Y","style":{"typography":{"fontFamily":"var:preset|font-family|monospace","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"var:custom|color|text|subtle"}},"fontSize":"100"} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:post-content {"className":"ls-legal-body","layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} /-->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
