<?php
/**
 * Title: Template: Archive
 * Slug: ls-theme/template-archive
 * Categories: template
 * Block Types: core/template-part
 * Description: Main-content pattern for the All Archives template (category, tag, author and date listings) — the Hero - Archive (breadcrumb, title, description) followed by a paginated 3-column grid of Card - Blog Post cards, the same cards the Blog archive uses. The query inherits the archive being viewed, so its page size of nine comes from inc/archive-query.php, not from the block's own perPage. The section carries its own top:80/bottom:90 padding, matching the Blog archive's All Articles section.
 * Inserter: false
 *
 * @package ls-theme
 */

?>

<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="margin-top:0">
	<!-- wp:pattern {"slug":"ls-theme/archive-hero"} /-->

	<!-- wp:group {"align":"full","tagName":"section","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|30","bottom":"var:preset|spacing|90","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
	<section class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--30)">

		<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
		<div class="wp-block-group alignwide">

			<!-- wp:heading {"level":2,"className":"screen-reader-text"} -->
			<h2 class="wp-block-heading screen-reader-text"><?php echo esc_html__( 'Articles', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:query {"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|60"}}} -->
			<div class="wp-block-query alignwide">

				<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
					<!-- wp:pattern {"slug":"ls-theme/blog-post-card"} /-->
				<!-- /wp:post-template -->

				<!-- wp:query-no-results -->
					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
					<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'No articles found here yet.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				<!-- /wp:query-no-results -->

				<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
					<!-- wp:query-pagination-previous /-->
					<!-- wp:query-pagination-numbers /-->
					<!-- wp:query-pagination-next /-->
				<!-- /wp:query-pagination -->
			</div>
			<!-- /wp:query -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->
</main>
<!-- /wp:group -->
