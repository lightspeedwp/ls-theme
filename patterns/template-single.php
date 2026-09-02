<?php
/**
 * Title: Template: Single
 * Slug: ls-theme/template-single
 * Categories: template
 * Block Types: core/template-part
 * Description: Main-content pattern for the Single Blog template — the Blog Single hero
 * (breadcrumb, title, excerpt, author/date/read-time/category meta, featured image, all wide),
 * the post's own content rendered exactly as authored at the theme's default 800px content
 * width, a share row (also 800px, alongside the content it belongs to), a wide "Related Reading"
 * Query Loop scoped to the post's own category (excluding the post itself, via
 * inc/blog-single-related-query.php), and the Blog Writing CTA closing band. `wp:post-content`
 * is the only section pinned to the 800px default — every other section carries its own explicit
 * `align:wide` (a `constrained`-layout parent otherwise re-narrows unmarked children back to
 * 800px, so this has to be set on each direct child, not just the wrapping group) so it isn't
 * silently pulled back to that width. The CTA relies on `ls-theme/blog-writing-cta`'s own
 * `align:wide` + bordered/rounded card styling, which caps at the wide bound rather than
 * stretching full-bleed — do not change that pattern's own alignment when touching this file.
 * Inserter: false
 *
 * @package ls-theme
 */

?>

<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="margin-top:0">
	<!-- wp:pattern {"slug":"ls-theme/blog-single-hero"} /-->

	<!-- wp:post-content {"layout":{"type":"constrained"}} /-->

	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">
		<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"typography":{"fontStyle":"normal","fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"200"} -->
		<p class="has-200-font-size" style="padding-top:0;padding-bottom:0;font-style:normal;font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Share:', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:outermost/social-sharing {"size":"has-normal-icon-size","style":{"layout":{"selfStretch":"fit","flexSize":null}},"className":"is-style-default","layout":{"type":"flex","justifyContent":"center","orientation":"horizontal","flexWrap":"wrap"}} -->
		<ul class="wp-block-outermost-social-sharing has-normal-icon-size is-style-default">
			<!-- wp:outermost/social-sharing-link {"service":"linkedin"} /-->

			<!-- wp:outermost/social-sharing-link {"service":"facebook"} /-->

			<!-- wp:outermost/social-sharing-link {"service":"x"} /-->

			<!-- wp:outermost/social-sharing-link {"service":"whatsapp"} /-->
		</ul>
		<!-- /wp:outermost/social-sharing -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--60)">

		<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|10","margin":{"bottom":"var:preset|spacing|20"}}}} -->
		<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--20)">
			<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"8px","style":{"color":{"text":"var(--wp--custom--color--icon--background)"}}} -->
			<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--icon--background);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
			<!-- /wp:outermost/icon-block -->

			<!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
			<h2 class="wp-block-heading has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Related reading', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:query {"align":"wide","queryId":3,"className":"ls-blog-single-related","query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false}} -->
		<div class="wp-block-query alignwide ls-blog-single-related">
			<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
				<!-- wp:pattern {"slug":"ls-theme/blog-post-card"} /-->
			<!-- /wp:post-template -->
		</div>
		<!-- /wp:query -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--80)">
		<!-- wp:pattern {"slug":"ls-theme/blog-writing-cta"} /-->
	</div>
	<!-- /wp:group -->
</main>
<!-- /wp:group -->