<?php
/**
 * Title: Hero - Archive
 * Slug: ls-theme/archive-hero
 * Categories: hero
 * Block Types: core/pattern
 * Description: A left-aligned hero for archive and taxonomy listings: breadcrumb trail, an "Archive" eyebrow badge, the archive's own title (core/query-title, H1, no "Category:" style prefix) and its description (core/term-description) as the intro line. Because both blocks read from the archive being viewed, the same pattern serves every category, tag, author, date and portfolio taxonomy listing with no per-archive editing. It reuses the Hero - Page layout and its ls-page-hero background and breadcrumb styles, so it has no stylesheet of its own. The breadcrumb is embedded here so it shares this hero's padding, which is why the archive templates do not also insert the shared breadcrumbs template part. Only meaningful inside an archive template, so it is not offered in the inserter.
 * Keywords: hero, archive, taxonomy, category, title, section
 * Viewport Width: 1280
 * Inserter: false
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-page-hero","style":{"border":{"bottom":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|50","bottom":"var:preset|spacing|100","left":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"1216px"}} -->
<section class="wp-block-group alignfull ls-page-hero" style="border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--50)">

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"880px","justifyContent":"left"}} -->
	<div class="wp-block-group">

		<?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
		<!-- wp:yoast-seo/breadcrumbs /-->
		<?php endif; ?>

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group">

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--icon--background)"},"dimensions":{"width":"8px"}}} /-->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Archive', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:query-title {"type":"archive","showPrefix":false,"level":1,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"800"} /-->

			<!-- wp:term-description {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
