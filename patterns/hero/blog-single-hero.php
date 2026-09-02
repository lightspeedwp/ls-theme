<?php
/**
 * Title: Hero - Blog Single
 * Slug: ls-theme/blog-single-hero
 * Categories: hero
 * Block Types: core/pattern
 * Description: The Blog single (article) hero: breadcrumb trail, category eyebrow, post title,
 * excerpt, and a metadata row (author, date, reading time) on a bordered strip, all confined to
 * the theme's default 800px content width like the post content below it, then the post's
 * featured image full wide. The breadcrumb sits in its own align-wide, left-justified row (no
 * contentSize) ahead of the 800px column, matching the Blog Archive hero's own breadcrumb
 * convention — templates/single.html does not render the shared parts/breadcrumbs.html template
 * part for this template, so this is the page's only breadcrumb. Adapts between light and dark
 * mode using existing semantic tokens, mirroring the structure already established by the Work
 * Single hero.
 * Keywords: blog, hero, single, article, post, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-blog-single-hero","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|30","bottom":"var:preset|spacing|70","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-blog-single-hero" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)">

	<?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
	<!-- wp:group {"align":"wide","style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide has-text-color" style="color:var(--wp--custom--color--text--muted)">
		<!-- wp:yoast-seo/breadcrumbs /-->
	</div>
	<!-- /wp:group -->
	<?php endif; ?>

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|10","margin":{"top":"var:preset|spacing|40"}}}} -->
		<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--40)">
			<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"8px","style":{"color":{"text":"var(--wp--custom--color--icon--background)"}}} -->
			<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--icon--background);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
			<!-- /wp:outermost/icon-block -->

			<!-- wp:group {"style":{"color":{"text":"var(--wp--custom--color--text--brand)"}}} -->
			<div class="wp-block-group has-text-color" style="color:var(--wp--custom--color--text--brand)">
				<!-- wp:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"100"} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:post-title {"level":1,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"700"} /-->

		<!-- wp:post-excerpt {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"300"} /-->

		<!-- wp:group {"className":"ls-blog-single-meta","style":{"spacing":{"blockGap":"var:preset|spacing|10","margin":{"top":"var:preset|spacing|40"},"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}},"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"},"bottom":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group ls-blog-single-meta" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;margin-top:var(--wp--preset--spacing--40);padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);letter-spacing:var(--wp--custom--typography--letter-spacing--wide)"><?php echo esc_html__( 'By', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:post-author-name {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"100"} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:post-date {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"100"} /-->

			<!-- wp:post-time-to-read {"displayAsRange":false,"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"100"} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:post-featured-image {"align":"wide","aspectRatio":"21/9","scale":"cover","style":{"border":{"color":"var(--wp--custom--color--border--field)","width":"1px","style":"solid","radius":"var:preset|border-radius|400"},"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} /-->
</section>
<!-- /wp:group -->
