<?php
/**
 * Title: Card - Solutions
 * Slug: ls-theme/section-card-solutions
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
	<!-- wp:group {"className":"ls-card-solutions__icon-shell ls-icon-frame-glow","style":{"border":{"style":"solid","width":"1px","radius":"var:preset|border-radius|200"},"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-card-solutions__icon-shell ls-icon-frame-glow" style="border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--200);padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
		<!-- wp:outermost/icon-block /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"ls-card-solutions__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-card-solutions__content">
		<!-- wp:heading {"level":3} -->
		<h3 class="wp-block-heading"><?php echo esc_html__( 'Prototyping', 'ls-theme' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
		<p style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Rapid Figma prototypes validated before development starts.', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:buttons {"className":"ls-card-solutions__cta"} -->
	<div class="wp-block-buttons ls-card-solutions__cta">
		<!-- wp:button {"className":"is-style-button-arrow-compact"} -->
		<div class="wp-block-button is-style-button-arrow-compact"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="screen-reader-text"><?php echo esc_html__( 'Learn more about prototyping', 'ls-theme' ); ?></span></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</article>
<!-- /wp:group -->