<?php
/**
 * Title: Card - Solutions
 * Slug: ls-theme/card-solutions
 * Categories: featured
 * Block Types: core/pattern
 * Description: A compact solutions card with a replaceable icon well, supporting copy, and an icon-only CTA.
 * Keywords: card, solution, cta
 * Viewport Width: 360
 * Inserter: true
 */

?>
<!-- wp:group {"tagName":"article","className":"is-style-card-solutions","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
<article class="wp-block-group is-style-card-solutions">
	<!-- wp:group {"className":"ls-card-solutions__icon-shell is-style-icon-frame-glow","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-card-solutions__icon-shell is-style-icon-frame-glow">
		<!-- wp:outermost/icon-block /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"ls-card-solutions__content","style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-card-solutions__content" style="display:flex;flex-direction:column;gap:var(--wp--preset--spacing--5)">
		<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
		<h3 class="wp-block-heading" style="margin-top:0;margin-bottom:0"><?php echo esc_html__( 'Prototyping', 'ls-theme' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
		<p style="margin-top:0;margin-bottom:0;color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Rapid Figma prototypes validated before development starts.', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:buttons {"className":"ls-card-solutions__cta","style":{"spacing":{"margin":{"top":"auto","bottom":"0"}}}} -->
	<div class="wp-block-buttons ls-card-solutions__cta" style="margin-top:auto;margin-bottom:0">
		<!-- wp:button {"className":"is-style-button-arrow-compact"} -->
		<div class="wp-block-button is-style-button-arrow-compact"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="screen-reader-text"><?php echo esc_html__( 'Learn more about prototyping', 'ls-theme' ); ?></span></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</article>
<!-- /wp:group -->