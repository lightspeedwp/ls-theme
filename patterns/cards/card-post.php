<?php
/**
 * Title: Card - Post
 * Slug: ls-theme/card-post
 * Categories: featured
 * Block Types: core/pattern
 * Description: A post-aware card with a featured-image cover, category pills, compact post meta, excerpt, and inline read-more CTA.
 * Keywords: card, post, blog, featured
 * Viewport Width: 437
 * Inserter: true
 */

?>
<!-- wp:group {"tagName":"article","metadata":{"categories":["featured"],"patternName":"ls-theme/card-post","name":"Card - Post"},"className":"is-style-card-post","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
<article class="wp-block-group is-style-card-post"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"customOverlayColor":"#FFF","isUserOverlayColor":false,"contentPosition":"top right","isDark":false,"className":"ls-card-post__media is-style-card-post-media","layout":{"type":"constrained"}} -->
	<div class="wp-block-cover is-light has-custom-content-position is-position-top-right ls-card-post__media is-style-card-post-media"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#FFF"></span><div class="wp-block-cover__inner-container"><!-- wp:post-terms {"term":"category","separator":"","className":"ls-card-post__terms is-style-pill"} /--></div></div>
	<!-- /wp:cover -->

	<!-- wp:group {"className":"ls-card-post__content","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-card-post__content" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:group {"className":"ls-card-post__meta","style":{"spacing":{"blockGap":{"vertical":"var:preset|spacing|10","horizontal":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group ls-card-post__meta"><!-- wp:post-date {"format":"M j, Y","metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"className":"is-style-meta"} /-->

			<!-- wp:post-time-to-read {"displayAsRange":false,"className":"is-style-meta"} /--></div>
		<!-- /wp:group -->

		<!-- wp:post-title {"level":3,"isLink":true,"className":"ls-card-post__title"} /-->

		<!-- wp:post-excerpt {"showMoreOnNewLine":false,"excerptLength":35,"className":"ls-card-post__excerpt"} /-->

		<!-- wp:read-more {"content":"Read article","className":"ls-card-post__cta is-style-link-arrow-accent"} /--></div>
	<!-- /wp:group --></article>
<!-- /wp:group -->