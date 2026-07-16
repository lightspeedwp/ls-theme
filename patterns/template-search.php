<?php
/**
 * Title: Template: Search
 * Slug: ls-theme/template-search
 * Categories: template
 * Block Types: core/template-part
 * Description: Main-content pattern for the Search Results template — a search field, the search term title, and a paginated results query loop.
 * Inserter: false
 */

?>

<!-- wp:group {"tagName":"main","layout":{"type":"constrained"}} -->
<main class="wp-block-group">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} -->
	<div class="wp-block-group">
		<!-- wp:query-title {"type":"search"} /-->
		<!-- wp:search {"label":"<?php echo esc_attr__( 'Search', 'ls-theme' ); ?>","showLabel":false,"buttonText":"<?php echo esc_attr__( 'Search', 'ls-theme' ); ?>"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:query {"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
	<div class="wp-block-query">
		<!-- wp:post-template -->
			<!-- wp:group {"tagName":"article","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
			<article class="wp-block-group">
				<!-- wp:post-title {"isLink":true} /-->
				<!-- wp:post-excerpt /-->
			</article>
			<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
			<!-- wp:paragraph -->
			<p><?php echo esc_html__( 'No results found for your search.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->

		<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
			<!-- wp:query-pagination-previous /-->
			<!-- wp:query-pagination-numbers /-->
			<!-- wp:query-pagination-next /-->
		<!-- /wp:query-pagination -->
	</div>
	<!-- /wp:query -->
</main>
<!-- /wp:group -->