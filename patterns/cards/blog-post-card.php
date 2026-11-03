<?php
/**
 * Title: Card - Blog Post
 * Slug: ls-theme/blog-post-card
 * Categories: featured
 * Block Types: core/pattern
 * Description: A single Blog All Articles card: category badge chip, post title, excerpt, a
 * divider, date + reading time, and an icon-only "Read article" link to the post permalink
 * (real link text kept for screen readers, hidden visually — same footer shape as Card - Blog
 * Featured Article, adapted for this card's light/dark-adaptive surface). Intended as the Post
 * Template content inside a Query Loop scoped to the `post` post type, filterable by category
 * via ls-plugin/taxonomy-filter. No image, by design. Adapts between light and dark mode using
 * existing semantic tokens.
 * Keywords: blog, post, card, query loop, block bindings
 * Viewport Width: 380
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"tagName":"article","className":"is-style-card-post","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
<article class="wp-block-group is-style-card-post">

	<!-- wp:group {"className":"ls-badge-category-dynamic","style":{"color":{"text":"var(--wp--custom--color--category--news)"}}} -->
	<div class="wp-block-group ls-badge-category-dynamic has-text-color" style="color:var(--wp--custom--color--category--news)">
		<!-- wp:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wide","fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"100"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"300"} /-->

	<!-- wp:post-excerpt {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} /-->

	<!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"},"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"},"margin":{"top":"auto"}}}} -->
	<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20);margin-top:auto">
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:post-date {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} /-->

			<!-- wp:post-time-to-read {"displayAsRange":false,"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:read-more {"content":<?php echo wp_json_encode( __( 'Read article', 'ls-theme' ) ); ?>,"className":"ls-post-card-cta ls-card-post__link"} /-->
	</div>
	<!-- /wp:group -->
</article>
<!-- /wp:group -->
