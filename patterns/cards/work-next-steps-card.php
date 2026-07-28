<?php
/**
 * Title: Card - Work Next Steps
 * Slug: ls-theme/work-next-steps-card
 * Categories: featured
 * Block Types: core/pattern
 * Description: A compact related-route button for the Work archive's "Where to go next" grid: title, description, and a trailing arrow.
 * Keywords: work, related, next steps, button
 * Viewport Width: 311
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"tagName":"article","className":"is-style-card-link-row","layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"center","flexWrap":"wrap"}} -->
<article class="wp-block-group is-style-card-link-row">

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"200"} -->
		<p class="has-200-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'Case studies', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
		<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Specific projects in depth.', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"13px","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"}}} -->
	<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--text--subtle);width:13px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg></div></div>
	<!-- /wp:outermost/icon-block -->
</article>
<!-- /wp:group -->
