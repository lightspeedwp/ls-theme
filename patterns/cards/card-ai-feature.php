<?php
/**
 * Title: Card - AI Feature
 * Slug: ls-theme/card-ai-feature
 * Categories: featured
 * Block Types: core/pattern
 * Description: A compact centred AI feature card with a gradient icon frame and supporting copy.
 * Keywords: card, ai, feature
 * Viewport Width: 400
 * Inserter: true
 */

?>
<!-- wp:group {"tagName":"article","className":"is-style-card-ai-feature","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
<article class="wp-block-group is-style-card-ai-feature">
	<!-- wp:group {"className":"ls-card-ai-feature__icon-shell is-style-icon-frame-brand-cta","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-card-ai-feature__icon-shell is-style-icon-frame-brand-cta">
		<!-- wp:outermost/icon-block {"iconName":"broadcast","width":"28px"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"ls-card-ai-feature__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-card-ai-feature__content">
		<!-- wp:heading {"level":3} -->
		<h3 class="wp-block-heading"><?php echo esc_html__( 'AI-optimised markup', 'ls-theme' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php echo esc_html__( 'Semantic HTML and schema.org markup for maximum discoverability.', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</article>
<!-- /wp:group -->