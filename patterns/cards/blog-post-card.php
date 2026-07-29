<?php
/**
 * Title: Card - Blog Post
 * Slug: ls-theme/blog-post-card
 * Categories: featured
 * Block Types: core/pattern
 * Description: A single Blog All Articles card: category dot + label, post title, excerpt, tag pills (post_tag taxonomy), and a "Read article" link to the post permalink. Intended as the Post Template content inside a Query Loop scoped to the `post` post type, filterable by category via ls-plugin/taxonomy-filter. No image, by design. Adapts between light and dark mode using existing semantic tokens.
 * Keywords: blog, post, card, query loop, block bindings
 * Viewport Width: 380
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"tagName":"article","className":"is-style-card-post","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<article class="wp-block-group is-style-card-post">

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:outermost/icon-block {"iconName":"","className":"ls-category-dot has-text-color","width":"8px","style":{"color":{"text":"var(--wp--custom--color--category--wordpress)"}}} -->
		<div class="wp-block-outermost-icon-block ls-category-dot has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--category--wordpress);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
		<!-- /wp:outermost/icon-block -->

		<!-- wp:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.2px"},"color":{"text":"var(--wp--custom--color--text--subtle)"}}} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"300"} /-->

	<!-- wp:post-excerpt /-->

	<!-- wp:group {"className":"is-style-card-divider-top"} -->
	<div class="wp-block-group is-style-card-divider-top">
		<!-- wp:post-terms {"term":"post_tag","separator":" ","className":"is-style-tag-pills"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:read-more {"content":<?php echo wp_json_encode( __( 'Read article', 'ls-theme' ) ); ?>,"className":"is-style-link-arrow-accent","fontSize":"100"} /-->
</article>
<!-- /wp:group -->
