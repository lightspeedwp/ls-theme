<?php
/**
 * Title: Hero - Blog Archive
 * Slug: ls-theme/blog-hero
 * Categories: hero
 * Block Types: core/pattern
 * Description: The Blog archive's hero section: a full-width eyebrow/heading/paragraph block up
 * top, then a row with the live Featured Article tile on the left and a "Latest" list of the
 * next 3 posts on the right. Two-column row via core/columns, which stacks automatically on
 * mobile. Permanently dark, independent of the site's light/dark style variation toggle. The
 * section's own base gradient plus its decorative radial-glow and corner-wedge accents are all
 * defined together in src/scss/structural/blog-hero.scss (className ls-blog-hero) rather than as
 * a block-level color.gradient attribute — an inline background style always wins the cascade
 * over an external stylesheet's background-image, so the two can't coexist on this block.
 * Keywords: blog, hero, archive, section, query loop
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-blog-hero","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|30","bottom":"var:preset|spacing|90","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-blog-hero" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">

		<?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
		<!-- wp:group {"align":"wide","className":"ls-breadcrumbs-on-dark","style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
		<div class="wp-block-group alignwide ls-breadcrumbs-on-dark has-text-color" style="color:var(--wp--custom--color--text--on-dark-muted)">
			<!-- wp:yoast-seo/breadcrumbs /-->
		</div>
		<!-- /wp:group -->
		<?php endif; ?>

		<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"800px","justifyContent":"left"}} -->
		<div class="wp-block-group alignwide">

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center","justifyContent":"left"}} -->
			<div class="wp-block-group">
				<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"8px","style":{"color":{"text":"var(--wp--custom--color--icon--on-dark)"}}} -->
				<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--icon--on-dark);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
				<!-- /wp:outermost/icon-block -->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--on-dark-accent)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--on-dark-accent);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Insights · Articles · Resources', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":1,"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"},"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"800"} -->
			<h1 class="wp-block-heading has-text-color has-800-font-size" style="color:var(--wp--custom--color--text--on-dark);margin-top:var(--wp--preset--spacing--20);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Practical writing on WordPress, design systems, and the work in between.', 'ls-theme' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--on-dark-muted);margin-top:var(--wp--preset--spacing--20)"><?php echo esc_html__( 'Field notes from delivery work. Not a content calendar — things we found worth writing down because they kept coming up.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:columns {"align":"wide","verticalAlignment":"top","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"},"margin":{"top":"var:preset|spacing|50"}}}} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-top" style="margin-top:var(--wp--preset--spacing--50)">

			<!-- wp:column {"verticalAlignment":"top","width":"62%"} -->
			<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:62%">

				<!-- wp:group {"layout":{"type":"constrained","contentSize":"800px","justifyContent":"left"}} -->
				<div class="wp-block-group">

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wider","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--on-dark-muted);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--wider);text-transform:uppercase"><?php echo esc_html__( 'Featured Article', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:query {"queryId":0,"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false},"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}}} -->
					<div class="wp-block-query" style="margin-top:var(--wp--preset--spacing--20)">
						<!-- wp:post-template -->
							<!-- wp:pattern {"slug":"ls-theme/blog-featured-article"} /-->
						<!-- /wp:post-template -->
					</div>
					<!-- /wp:query -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"top","width":"38%"} -->
			<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:38%">

				<!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wider","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--on-dark)"},"spacing":{"padding":{"left":"var:preset|spacing|30"}}},"fontSize":"100"} -->
				<h2 class="wp-block-heading has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--on-dark);padding-left:var(--wp--preset--spacing--30);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--wider);text-transform:uppercase"><?php echo esc_html__( 'Latest', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:query {"queryId":1,"className":"ls-latest-rail","query":{"perPage":3,"pages":0,"offset":1,"postType":"post","order":"desc","orderBy":"date","inherit":false},"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}}} -->
				<div class="wp-block-query ls-latest-rail" style="margin-top:var(--wp--preset--spacing--20)">
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
