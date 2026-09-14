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
<!-- wp:group {"tagName":"article","className":"is-style-card-link-row","layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"top","flexWrap":"wrap"}} -->
<article class="wp-block-group is-style-card-link-row">

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"200"} -->
		<p class="has-200-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><a class="ls-card-link-row__link" href="<?php echo esc_url( home_url( '/work/' ) ); ?>"><?php echo esc_html__( 'Case studies', 'ls-theme' ); ?></a></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
		<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Specific projects in depth.', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:icon {"icon":"lightspeed/arrow-right","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"},"dimensions":{"width":"13px"}}} /-->
</article>
<!-- /wp:group -->
