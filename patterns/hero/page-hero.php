<?php
/**
 * Title: Hero - Page
 * Slug: ls-theme/page-hero
 * Categories: hero
 * Block Types: core/pattern
 * Description: A reusable left-aligned page hero for trust, legal and other text-led pages: breadcrumb trail, eyebrow badge, the page's own title (core/post-title, H1) and its excerpt as the intro line (core/post-excerpt). Because the title and intro come from the page itself, the same pattern serves every page that uses it with no per-page editing — set the page's Excerpt for the intro. The breadcrumb is embedded here (not the shared breadcrumbs template part) so it shares this hero's padding, matching the other heroes. The bottom border is a block attribute; the soft corner glows live in src/scss/structural/legal-page.scss (className ls-page-hero).
 * Keywords: hero, page, legal, trust, policy, title, section
 * Viewport Width: 1280
 * Inserter: true
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
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Trust · Legal', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:post-title {"level":1,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"800"} /-->

			<!-- wp:post-excerpt {"moreText":"","excerptLength":40,"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
