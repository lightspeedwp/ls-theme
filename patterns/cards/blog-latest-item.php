<?php
/**
 * Title: Card - Blog Latest Item
 * Slug: ls-theme/blog-latest-item
 * Categories: featured
 * Block Types: core/pattern
 * Description: A single row in the Blog Hero's "Latest" list: category label, linked post title,
 * and date + reading time, with a bottom divider. Intended as the Post Template content inside a
 * Query Loop scoped to the next 3 posts after the featured article (offset 1). Permanently dark,
 * independent of the light/dark style variation toggle.
 * Keywords: blog, hero, latest, list, card, query loop, block bindings
 * Viewport Width: 400
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"tagName":"article","className":"ls-card-divider-bottom","style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<article class="wp-block-group ls-card-divider-bottom">

	<!-- wp:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wide","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--on-dark-accent)"},"elements":{"link":{"color":{"text":"var(--wp--custom--color--text--on-dark-accent)"}}}},"fontSize":"100"} /-->

	<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--on-dark)"},"elements":{"link":{"color":{"text":"var(--wp--custom--color--text--on-dark)"}}}},"fontSize":"200"} /-->

	<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--20)">
		<!-- wp:post-date {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"100"} /-->

		<!-- wp:post-time-to-read {"displayAsRange":false,"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"100"} /-->
	</div>
	<!-- /wp:group -->
</article>
<!-- /wp:group -->
