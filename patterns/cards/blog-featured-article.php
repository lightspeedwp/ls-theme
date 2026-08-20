<?php
/**
 * Title: Card - Blog Featured Article
 * Slug: ls-theme/blog-featured-article
 * Categories: featured
 * Block Types: core/pattern
 * Description: The Blog Hero's single featured-article tile: a 4-colour top border, category
 * pill badge, post title, excerpt, date + reading time, and a "Read article" link to the post
 * permalink. Intended as the Post Template content inside a Query Loop scoped to a single latest
 * post (perPage 1). Permanently dark, independent of the light/dark style variation toggle.
 * Keywords: blog, hero, featured, article, card, query loop, block bindings
 * Viewport Width: 480
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"tagName":"article","className":"is-style-card-highlight-dark","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<article class="wp-block-group is-style-card-highlight-dark">

	<!-- wp:group {"className":"ls-badge-category"} -->
	<div class="wp-block-group ls-badge-category">
		<!-- wp:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wide","fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"100"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:post-title {"level":2,"isLink":true,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"elements":{"link":{"color":{"text":"var(--wp--custom--color--text--on-dark)"}}}},"fontSize":"400"} /-->

	<!-- wp:post-excerpt {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"100"} /-->

	<!-- wp:group {"className":"ls-card-divider-top","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-card-divider-top">
		<!-- wp:post-date {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"100"} /-->

		<!-- wp:post-time-to-read {"displayAsRange":false,"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"100"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:read-more {"content":<?php echo wp_json_encode( __( 'Read article', 'ls-theme' ) ); ?>,"className":"is-style-button-primary-on-dark","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"200"} /-->
</article>
<!-- /wp:group -->
