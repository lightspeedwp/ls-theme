<?php
/**
 * Title: Card - Work Project
 * Slug: ls-theme/work-project-card
 * Categories: featured
 * Block Types: core/pattern
 * Description: A single Work archive case-study card: platform banner (Portfolio project-group taxonomy), platform badge, post title/excerpt, service tag pills (project-tag taxonomy), and a "View project" link to the post permalink. Intended as the Post Template content inside a Query Loop scoped to the `project` post type (LS-1617). Adapts between light and dark mode using existing semantic tokens.
 * Keywords: work, portfolio, case study, card, query loop, block bindings
 * Viewport Width: 450
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"tagName":"article","className":"is-style-card-case-study","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
<article class="wp-block-group is-style-card-case-study">

	<!-- wp:group {"className":"ls-card-case-study__banner is-style-card-banner-tint","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
	<div class="wp-block-group ls-card-case-study__banner is-style-card-banner-tint">
		<!-- wp:group {"className":"is-style-card-chip"} -->
		<div class="wp-block-group is-style-card-chip">
			<!-- wp:post-terms {"term":"project-group","prefix":<?php echo wp_json_encode( __( 'Platform · ', 'ls-theme' ) ); ?>,"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"1.1px"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"100"} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"ls-card-case-study__content","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-card-case-study__content" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">

		<!-- wp:post-terms {"term":"project-group","className":"is-style-badge-brand"} /-->

		<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"300"} /-->

		<!-- wp:post-excerpt {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} /-->

		<!-- wp:group {"className":"is-style-card-divider-top"} -->
		<div class="wp-block-group is-style-card-divider-top">
			<!-- wp:post-terms {"term":"project-tag","separator":" ","className":"is-style-tag-pills"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:read-more {"content":<?php echo wp_json_encode( __( 'View project', 'ls-theme' ) ); ?>,"className":"is-style-link-arrow-accent","fontSize":"100"} /-->
	</div>
	<!-- /wp:group -->
</article>
<!-- /wp:group -->
