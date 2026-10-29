<?php
/**
 * Title: Template: Taxonomy
 * Slug: ls-theme/template-taxonomy
 * Categories: template
 * Block Types: core/template-part
 * Description: Main-content pattern for the Taxonomy template — shared across every Portfolio taxonomy (Industry, Project types, Service, Software). The Hero - Archive (breadcrumb, title, description) followed by a paginated 3-column grid of Card - Work Project cards, the same cards the Work archive uses. The query inherits the term being viewed. The section carries its own top:80/bottom:90 padding, matching the Work archive's Selected Projects section.
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

			<!-- wp:query {"query":{"perPage":9,"pages":0,"offset":0,"postType":"project","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|60"}}} -->
			<div class="wp-block-query alignwide">

				<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
					<!-- wp:pattern {"slug":"ls-theme/work-project-card"} /-->
				<!-- /wp:post-template -->

				<!-- wp:query-no-results -->
					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
					<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'No case studies found here yet.', 'ls-theme' ); ?></p>
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
