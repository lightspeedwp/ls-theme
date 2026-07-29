<?php
/**
 * Title: Section - Blog All Articles
 * Slug: ls-theme/blog-all-articles
 * Categories: featured
 * Block Types: core/pattern
 * Description: The Blog archive's "All Articles" section: eyebrow, heading, intro paragraph, a pill search box, a category filter (ls-plugin/taxonomy-filter retargeted to WordPress's native `category` taxonomy, reusing the same enhancedPagination + hover-state fixes already solved for the Work archive's filter), and a paginated Query Loop of Blog Post Cards in a responsive grid.
 * Keywords: blog, articles, archive, section, query loop, filter, search
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-center">

			<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%">
				<!-- wp:pattern {"slug":"ls-theme/eyebrow-badge"} /-->

				<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"500"} -->
				<h2 class="wp-block-heading has-500-font-size" style="margin-top:var(--wp--preset--spacing--20);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'All articles.', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Every article we\'ve published, filterable by the topics you care about.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:search {"label":<?php echo wp_json_encode( __( 'Search articles', 'ls-theme' ) ); ?>,"showLabel":false,"placeholder":<?php echo wp_json_encode( __( 'Search articles…', 'ls-theme' ) ); ?>,"buttonText":<?php echo wp_json_encode( __( 'Search', 'ls-theme' ) ); ?>,"buttonPosition":"button-inside","className":"is-style-search-pill","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} /-->

		<!-- wp:query {"queryId":2,"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false},"align":"wide","enhancedPagination":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
		<div class="wp-block-query alignwide" style="margin-top:var(--wp--preset--spacing--30)">

			<!-- wp:ls-plugin/taxonomy-filter {"taxonomy":{"name":"Categories","all_items":"All","slug":"category","rest_base":"categories"},"filterType":"buttons","allItemsText":<?php echo wp_json_encode( __( 'All', 'ls-theme' ) ); ?>,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}}} /-->

			<!-- wp:post-template {"layout":{"type":"grid","minimumColumnWidth":"18rem"}} -->
				<!-- wp:pattern {"slug":"ls-theme/blog-post-card"} /-->
			<!-- /wp:post-template -->

			<!-- wp:query-pagination {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
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
