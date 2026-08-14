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
<!-- wp:group {"tagName":"article","className":"ls-card-case-study","style":{"color":{"background":"var:custom|color|surface|card","text":"var:custom|color|text|default"},"border":{"color":"color-mix(in srgb, var(--wp--custom--color--border--card) 55%, transparent)","radius":"var:preset|border-radius|300","style":"solid","width":"1px"},"shadow":"var:preset|shadow|100","spacing":{"blockGap":"0","padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
<article class="wp-block-group ls-card-case-study has-border-color has-text-color has-background" style="border-color:color-mix(in srgb, var(--wp--custom--color--border--card) 55%, transparent);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--300);color:var(--wp--custom--color--text--default);background-color:var(--wp--custom--color--surface--card);box-shadow:var(--wp--preset--shadow--100);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

	<!-- wp:group {"className":"ls-card-case-study__banner ls-card-banner-tint","style":{"dimensions":{"minHeight":"10rem"}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
	<div class="wp-block-group ls-card-case-study__banner ls-card-banner-tint" style="min-height:10rem">
		<!-- wp:group {"className":"ls-platform-tag-brand","style":{"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|200","style":"solid","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}}}} -->
		<div class="wp-block-group ls-platform-tag-brand has-border-color" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--200);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
			<!-- wp:post-terms {"term":"project-group","prefix":<?php echo wp_json_encode( __( 'Platform · ', 'ls-theme' ) ); ?>,"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest"}},"fontSize":"100"} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"ls-card-case-study__content","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-card-case-study__content" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">

		<!-- wp:post-terms {"term":"project-group","className":"ls-badge-brand","style":{"border":{"radius":"var:preset|border-radius|200"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|10","bottom":"var:preset|spacing|5","left":"var:preset|spacing|10"}}}} /-->

		<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"300"} /-->

		<!-- wp:post-excerpt {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} /-->

		<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}}} -->
		<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10)">
			<!-- wp:post-terms {"term":"project-tag","separator":" ","className":"ls-tag-pills","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"fontFamily":"var:preset|font-family|monospace","fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"100"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:read-more {"content":<?php echo wp_json_encode( __( 'View project', 'ls-theme' ) ); ?>,"className":"is-style-link-arrow-accent","fontSize":"100"} /-->
	</div>
	<!-- /wp:group -->
</article>
<!-- /wp:group -->
