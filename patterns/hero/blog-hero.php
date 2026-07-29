<?php
/**
 * Title: Hero - Blog Archive
 * Slug: ls-theme/blog-hero
 * Categories: hero
 * Block Types: core/pattern
 * Description: The Blog archive's hero section: eyebrow, heading, supporting paragraph on the left; a single live featured-article tile plus a "Latest" list of the next 3 posts on the right. Two-column layout via core/columns, which stacks automatically on mobile. Adapts between light and dark mode using existing on-dark semantic tokens.
 * Keywords: blog, hero, archive, section, query loop
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-hero-dark","style":{"color":{"gradient":"linear-gradient(158deg,var(--wp--custom--color--surface--band-start) 0%,var(--wp--custom--color--surface--band-end) 100%)"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-hero-dark has-background" style="background:linear-gradient(158deg,var(--wp--custom--color--surface--band-start) 0%,var(--wp--custom--color--surface--band-end) 100%)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:columns {"align":"wide","verticalAlignment":"top"} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-top">

			<!-- wp:column {"verticalAlignment":"top","width":"50%"} -->
			<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:50%">

				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"8px","style":{"color":{"text":"var(--wp--custom--color--icon--background)"}}} -->
					<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--icon--background);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
					<!-- /wp:outermost/icon-block -->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.4px","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:1.4px;text-transform:uppercase"><?php echo esc_html__( 'Blog · Practice · Proof', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":1,"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"},"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"800"} -->
				<h1 class="wp-block-heading has-text-color has-800-font-size" style="color:var(--wp--custom--color--text--on-dark);margin-top:var(--wp--preset--spacing--20);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Everything we\'ve learned building on WordPress, out loud.', 'ls-theme' ); ?></h1>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--on-dark-muted);margin-top:var(--wp--preset--spacing--20)"><?php echo esc_html__( 'Notes from the delivery floor — block themes, WooCommerce operations, and the design-system decisions behind them. Written by the people doing the work.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"top","width":"50%"} -->
			<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:50%">

				<!-- wp:query {"queryId":0,"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false}} -->
				<div class="wp-block-query">
					<!-- wp:post-template -->
						<!-- wp:pattern {"slug":"ls-theme/blog-featured-article"} /-->
					<!-- /wp:post-template -->
				</div>
				<!-- /wp:query -->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.2px","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"},"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--on-dark-muted);margin-top:var(--wp--preset--spacing--30);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:1.2px;text-transform:uppercase"><?php echo esc_html__( 'Latest', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:query {"queryId":1,"query":{"perPage":3,"pages":0,"offset":1,"postType":"post","order":"desc","orderBy":"date","inherit":false},"style":{"spacing":{"margin":{"top":"var:preset|spacing|10"}}}} -->
				<div class="wp-block-query" style="margin-top:var(--wp--preset--spacing--10)">
					<!-- wp:post-template -->
						<!-- wp:pattern {"slug":"ls-theme/blog-latest-item"} /-->
					<!-- /wp:post-template -->
				</div>
				<!-- /wp:query -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
