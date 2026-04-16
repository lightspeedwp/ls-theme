<?php
/**
 * Title: Card - Post Archive
 * Slug: ls-theme/card-post-archive
 * Categories: featured
 * Block Types: core/pattern
 * Description: A post archive card with a featured-image cover, category pill, excerpt, and compact icon-led meta row.
 * Keywords: card, post, archive, blog
 * Viewport Width: 435
 * Inserter: true
 */

?>
<!-- wp:group {"tagName":"article","metadata":{"categories":["featured"],"patternName":"ls-theme/card-post-archive","name":"Card - Post Archive"},"className":"is-style-card-post ls-card-post-archive","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
<article class="wp-block-group is-style-card-post ls-card-post-archive"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"customOverlayColor":"#FFF","isUserOverlayColor":false,"contentPosition":"top left","isDark":false,"className":"ls-card-post__media ls-card-post-archive__media is-style-card-post-media","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-cover is-light has-custom-content-position is-position-top-left ls-card-post__media ls-card-post-archive__media is-style-card-post-media" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#FFF"></span><div class="wp-block-cover__inner-container"><!-- wp:post-terms {"term":"category","separator":"","className":"ls-card-post-archive__terms is-style-pill"} /--></div></div>
	<!-- /wp:cover -->

	<!-- wp:group {"className":"ls-card-post__content ls-card-post-archive__content","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-card-post__content ls-card-post-archive__content" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:group {"className":"ls-card-post-archive__text","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
		<div class="wp-block-group ls-card-post-archive__text"><!-- wp:post-title {"level":3,"isLink":true,"className":"ls-card-post__title ls-card-post-archive__title","style":{"typography":{"fontSize":"var:preset|font-size|300","fontWeight":"var:custom|typography|font-weight|extrabold","lineHeight":"var:custom|line-height|heading-default"}}} /-->

			<!-- wp:post-excerpt {"showMoreOnNewLine":false,"excerptLength":32,"className":"ls-card-post__excerpt ls-card-post-archive__excerpt","style":{"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|normal","fontSize":"var:preset|font-size|200","lineHeight":"var:custom|line-height|paragraph"}}} /--></div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"ls-card-post__meta ls-card-post-archive__meta","style":{"spacing":{"padding":{"top":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group ls-card-post__meta ls-card-post-archive__meta" style="padding-top:var(--wp--preset--spacing--10)"><!-- wp:group {"className":"ls-card-post-archive__meta-item","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group ls-card-post-archive__meta-item"><!-- wp:outermost/icon-block {"iconName":"user","width":"16px"} /-->

				<!-- wp:post-author-name {"isLink":false,"className":"is-style-meta"} /--></div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"ls-card-post-archive__meta-item","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group ls-card-post-archive__meta-item"><!-- wp:outermost/icon-block {"iconName":"calendar-blank","width":"16px"} /-->

				<!-- wp:post-date {"format":"M j, Y","metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"className":"is-style-meta"} /--></div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"ls-card-post-archive__meta-item","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group ls-card-post-archive__meta-item"><!-- wp:outermost/icon-block {"iconName":"clock","width":"16px"} /-->

				<!-- wp:post-time-to-read {"displayAsRange":false,"className":"is-style-meta"} /--></div>
			<!-- /wp:group --></div>
		<!-- /wp:group --></div>
	<!-- /wp:group --></article>
<!-- /wp:group -->