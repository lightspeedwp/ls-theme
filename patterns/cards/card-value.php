<?php
/**
 * Title: Card - Value
 * Slug: ls-theme/card-value
 * Categories: featured
 * Block Types: core/pattern
 * Description: A compact value card with a reusable gradient icon frame, bold heading, and supporting copy.
 * Keywords: card, values, icon
 * Viewport Width: 426
 * Inserter: true
 */

?>
<!-- wp:group {"tagName":"article","className":"is-style-card-value","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
<article class="wp-block-group is-style-card-value">
	<!-- wp:group {"className":"ls-card-value__icon-shell is-style-icon-frame-brand-cta","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-card-value__icon-shell is-style-icon-frame-brand-cta">
		<!-- wp:outermost/icon-block {"iconName":"heart","width":"28px"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"ls-card-value__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-card-value__content">
		<!-- wp:heading {"level":3,"className":"ls-card-value__title"} -->
		<h3 class="wp-block-heading ls-card-value__title"><?php echo esc_html__( 'Passion', 'ls-theme' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"ls-card-value__copy"} -->
		<p class="ls-card-value__copy"><?php echo esc_html__( 'We love what we do, and it shows in our work.', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</article>
<!-- /wp:group -->