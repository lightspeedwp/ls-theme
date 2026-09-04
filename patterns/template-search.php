<?php
/**
 * Title: Template: Search
 * Slug: ls-theme/template-search
 * Categories: template
 * Block Types: core/template-part
 * Description: Main-content pattern for the Search Results template — hero (static heading,
 * search-pill field), a paginated results query loop with a category eyebrow + divider per
 * result, and a "Useful destinations" section that always shows below the results.
 * Inserter: false
 *
 * @package ls-theme
 */

?>

<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="margin-top:0">

	<!-- wp:pattern {"slug":"ls-theme/search-hero"} /-->

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"780px"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:query {"query":{"perPage":10,"pages":0,"offset":0,"inherit":true}} -->
		<div class="wp-block-query">
			<!-- wp:post-template -->

				<!-- wp:group {"tagName":"article","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"bottom":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}}}} -->
				<article class="wp-block-group" style="border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
					<!-- wp:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wide","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"100"} /-->

					<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"300"} /-->

					<!-- wp:post-excerpt {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} /-->
				</article>
				<!-- /wp:group -->

			<!-- /wp:post-template -->

			<!-- wp:query-no-results -->
				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
				<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'No results found for your search.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			<!-- /wp:query-no-results -->

			<!-- wp:query-pagination {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
				<!-- wp:query-pagination-previous /-->
				<!-- wp:query-pagination-numbers /-->
				<!-- wp:query-pagination-next /-->
			<!-- /wp:query-pagination -->
		</div>
		<!-- /wp:query -->
	</div>
	<!-- /wp:group -->

	<!-- wp:pattern {"slug":"ls-theme/search-useful-destinations"} /-->
</main>
<!-- /wp:group -->
