<?php
/**
 * Title: Template: Taxonomy
 * Slug: ls-theme/template-taxonomy
 * Categories: template
 * Block Types: core/template-part
 * Description: Main-content pattern for the Taxonomy template — shared across every Portfolio taxonomy (Industry, Project types, Service, Software). Shows the term title/description and a paginated grid of matching case studies.
 * Inserter: false
 */

?>

<!-- wp:group {"tagName":"main","layout":{"type":"constrained"}} -->
<main class="wp-block-group">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} -->
	<div class="wp-block-group">
		<!-- wp:query-title {"type":"archive","showPrefix":true} /-->
		<!-- wp:term-description /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:query {"query":{"perPage":10,"pages":0,"offset":0,"postType":"ls_plugin_portfolio","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
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
			<p><?php echo esc_html__( 'No case studies found.', 'ls-theme' ); ?></p>
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