<?php
/**
 * Title: Card - Blog Latest Item
 * Slug: ls-theme/blog-latest-item
 * Categories: featured
 * Block Types: core/pattern
 * Description: A single row in the Blog Hero's "Latest" list: category dot, linked post title, and date, with a bottom divider. Intended as the Post Template content inside a Query Loop scoped to the next 3 posts after the featured article (offset 1). Adapts between light and dark mode using existing on-dark semantic tokens.
 * Keywords: blog, hero, latest, list, card, query loop, block bindings
 * Viewport Width: 400
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"tagName":"article","className":"is-style-card-divider-bottom","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<article class="wp-block-group is-style-card-divider-bottom">

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:outermost/icon-block {"iconName":"","className":"ls-category-dot has-text-color","width":"6px","style":{"color":{"text":"var(--wp--custom--color--category--wordpress)"}}} -->
		<div class="wp-block-outermost-icon-block ls-category-dot has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--category--wordpress);width:6px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
		<!-- /wp:outermost/icon-block -->

		<!-- wp:post-date {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"100"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--on-dark)"}},"fontSize":"200"} /-->
</article>
<!-- /wp:group -->
