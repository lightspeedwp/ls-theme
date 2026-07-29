<?php
/**
 * Title: Card - Blog Featured Article
 * Slug: ls-theme/blog-featured-article
 * Categories: featured
 * Block Types: core/pattern
 * Description: The Blog Hero's single featured-article tile: category dot, post title, excerpt, date, and a "Read article" link to the post permalink. Intended as the Post Template content inside a Query Loop scoped to a single latest post (perPage 1). Adapts between light and dark mode using existing on-dark semantic tokens.
 * Keywords: blog, hero, featured, article, card, query loop, block bindings
 * Viewport Width: 480
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"tagName":"article","className":"is-style-card-highlight-dark","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<article class="wp-block-group is-style-card-highlight-dark">

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:outermost/icon-block {"iconName":"","className":"ls-category-dot has-text-color","width":"8px","style":{"color":{"text":"var(--wp--custom--color--category--wordpress)"}}} -->
		<div class="wp-block-outermost-icon-block ls-category-dot has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--category--wordpress);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
		<!-- /wp:outermost/icon-block -->

		<!-- wp:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.2px","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"100"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:post-title {"level":2,"isLink":true,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"400"} /-->

	<!-- wp:post-excerpt {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"100"} /-->

	<!-- wp:group {"className":"is-style-card-divider-top","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
	<div class="wp-block-group is-style-card-divider-top">
		<!-- wp:post-date {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"100"} /-->

		<!-- wp:read-more {"content":<?php echo wp_json_encode( __( 'Read article', 'ls-theme' ) ); ?>,"className":"is-style-button-primary-on-dark","fontSize":"200"} /-->
	</div>
	<!-- /wp:group -->
</article>
<!-- /wp:group -->
