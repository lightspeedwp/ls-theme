<?php
/**
 * Title: Card - Work Project
 * Slug: ls-theme/work-project-card
 * Categories: featured
 * Block Types: core/pattern
 * Description: A single Work archive case-study card: inset featured-image banner (16:9, cropped to cover; tinted-grid fallback when no image) with compact overlaid platform chips (a static "Platform" label chip plus the Portfolio project-group term chip), post title/excerpt, a divider, service tag pills (project-tag taxonomy), and a "View project →" link to the post permalink. Intended as the Post Template content inside a Query Loop scoped to the `project` post type (LS-1617). Adapts between light and dark mode using existing semantic tokens.
 * Keywords: work, portfolio, case study, card, query loop, block bindings
 * Viewport Width: 450
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"tagName":"article","className":"is-style-card-case-study ls-work-card","style":{"border":{"radius":"var:preset|border-radius|400"},"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
<article class="wp-block-group is-style-card-case-study ls-work-card" style="border-radius:var(--wp--preset--border-radius--400);padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">

	<!-- wp:group {"className":"ls-card-case-study__banner ls-card-banner-tint","style":{"border":{"radius":"var:preset|border-radius|300"},"dimensions":{"minHeight":"10rem"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group ls-card-case-study__banner ls-card-banner-tint" style="border-radius:var(--wp--preset--border-radius--300);min-height:10rem">
		<!-- wp:post-featured-image {"isLink":false,"aspectRatio":"16/9","width":"100%","scale":"cover","sizeSlug":"medium_large"} /-->

		<!-- wp:group {"className":"ls-card-case-study__chips","style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
		<div class="wp-block-group ls-card-case-study__chips">
			<!-- wp:group {"className":"ls-card-chip","style":{"color":{"background":"var:custom|color|surface|card"},"border":{"radius":"var:preset|border-radius|200"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|10","bottom":"var:preset|spacing|5","left":"var:preset|spacing|10"}}}} -->
			<div class="wp-block-group ls-card-chip has-background" style="border-radius:var(--wp--preset--border-radius--200);background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--10)">
				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wide","fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--wide);text-transform:uppercase"><?php echo esc_html__( 'Platform', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"ls-card-chip ls-platform-tag-brand","style":{"border":{"radius":"var:preset|border-radius|200"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|10","bottom":"var:preset|spacing|5","left":"var:preset|spacing|10"}}}} -->
			<div class="wp-block-group ls-card-chip ls-platform-tag-brand" style="border-radius:var(--wp--preset--border-radius--200);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--10)">
				<!-- wp:post-terms {"term":"project-group","style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wide","fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"100"} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"ls-card-case-study__content","style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"right":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-card-case-study__content" style="padding-right:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">

		<!-- wp:group {"className":"ls-card-case-study__text","style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
		<div class="wp-block-group ls-card-case-study__text">
			<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","lineHeight":"var:custom|line-height|heading-snug"}},"fontSize":"400"} /-->

			<!-- wp:post-excerpt {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"typography":{"lineHeight":"var:custom|line-height|paragraph"}},"fontSize":"200"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"ls-card-case-study__meta","style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}}} -->
		<div class="wp-block-group ls-card-case-study__meta" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
			<!-- wp:post-terms {"term":"project-tag","separator":" ","className":"ls-tag-pills","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"fontFamily":"var:preset|font-family|monospace","fontWeight":"var:custom|typography|font-weight|medium"}},"fontSize":"100"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:read-more {"content":<?php echo wp_json_encode( __( 'View project', 'ls-theme' ) ); ?>,"className":"ls-card-case-study__link","fontSize":"200","style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}}} /-->
	</div>
	<!-- /wp:group -->
</article>
<!-- /wp:group -->
