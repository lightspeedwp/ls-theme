<?php
/**
 * Title: Card - Work Project
 * Slug: ls-theme/work-project-card
 * Categories: featured
 * Block Types: core/pattern
 * Description: A single Work archive case-study card: platform banner (Portfolio Industry taxonomy), project-type badge, post title/excerpt, service tag pills, and a "View project" link to the post permalink. Intended as the Post Template content inside a Query Loop scoped to the Portfolio post type (LS-1617). Adapts between light and dark mode using existing semantic tokens.
 * Keywords: work, portfolio, case study, card, query loop, block bindings
 * Viewport Width: 450
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"tagName":"article","className":"is-style-card-work-project","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
<article class="wp-block-group is-style-card-work-project">

	<!-- wp:group {"className":"ls-card-work-project__banner is-style-card-work-project-banner","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
	<div class="wp-block-group ls-card-work-project__banner is-style-card-work-project-banner">
		<!-- wp:group {"className":"is-style-card-work-project-chip"} -->
		<div class="wp-block-group is-style-card-work-project-chip">
			<!-- wp:post-terms {"term":"ls_plugin_portfolio_industry","prefix":"Platform · ","style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"1.1px"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"100"} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"ls-card-work-project__content","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-card-work-project__content" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">

		<!-- wp:post-terms {"term":"ls_plugin_portfolio_project_type","className":"is-style-badge-brand"} /-->

		<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"300"} /-->

		<!-- wp:post-excerpt {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} /-->

		<!-- wp:group {"className":"is-style-card-work-project-tags"} -->
		<div class="wp-block-group is-style-card-work-project-tags">
			<!-- wp:post-terms {"term":"ls_plugin_portfolio_service","separator":" ","className":"is-style-tag-pills"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:read-more {"content":"View project","className":"is-style-link-arrow-accent"} /-->
	</div>
	<!-- /wp:group -->
</article>
<!-- /wp:group -->
