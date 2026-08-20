<?php
/**
 * Title: Section - Blog All Articles
 * Slug: ls-theme/blog-all-articles
 * Categories: featured
 * Block Types: core/pattern
 * Description: The Blog archive's "All Articles" section: a pill search box, a category filter (ls-plugin/taxonomy-filter retargeted to WordPress's native `category` taxonomy, reusing the same enhancedPagination + hover-state fixes already solved for the Work archive's filter), and a paginated Query Loop of Blog Post Cards in a responsive grid.
 * Keywords: blog, articles, archive, section, query loop, filter, search
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|30","bottom":"var:preset|spacing|90","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:heading {"level":2,"className":"screen-reader-text"} -->
		<h2 class="wp-block-heading screen-reader-text"><?php echo esc_html__( 'All Articles', 'ls-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:query {"queryId":2,"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false},"align":"wide","enhancedPagination":true,"style":{"spacing":{"blockGap":"var:preset|spacing|60"}}} -->
		<div class="wp-block-query alignwide">

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-group">
				<!-- wp:search {"label":<?php echo wp_json_encode( __( 'Search articles', 'ls-theme' ) ); ?>,"showLabel":false,"placeholder":<?php echo wp_json_encode( __( 'Search articles…', 'ls-theme' ) ); ?>,"width":360,"widthUnit":"px","buttonPosition":"no-button","className":"is-style-search-pill"} /-->

				<!-- wp:ls-plugin/taxonomy-filter {"taxonomy":{"name":"Categories","all_items":"All","slug":"category","rest_base":"categories"},"filterType":"buttons","allItemsText":<?php echo wp_json_encode( __( 'All', 'ls-theme' ) ); ?>} -->
				<div class="wp-block-ls-plugin-taxonomy-filter"></div>
				<!-- /wp:ls-plugin/taxonomy-filter -->
			</div>
			<!-- /wp:group -->

			<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
				<!-- wp:pattern {"slug":"ls-theme/blog-post-card"} /-->
			<!-- /wp:post-template -->

			<!-- wp:query-no-results -->
			<!-- wp:paragraph -->
			<p><?php echo esc_html__( 'No articles found. Try a different category.', 'ls-theme' ); ?></p>
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
