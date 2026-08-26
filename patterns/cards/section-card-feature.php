<?php
/**
 * Title: Card - Feature
 * Slug: ls-theme/section-card-feature
 * Categories: featured
 * Block Types: core/pattern
 * Description: A single feature card with a replaceable icon well, supporting copy, and an inline CTA.
 * Keywords: card, feature, cta
 * Viewport Width: 480
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"tagName":"article","className":"is-style-card-feature","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
<article class="wp-block-group is-style-card-feature">
	<!-- wp:group {"className":"ls-card__icon-shell","style":{"spacing":{"padding":"var:preset|spacing|20"}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-card__icon-shell" style="padding:var(--wp--preset--spacing--20)">
		<!-- wp:outermost/icon-block /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"ls-card-feature__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-card-feature__content">
		<!-- wp:heading {"level":3} -->
		<h3 class="wp-block-heading"><?php echo esc_html__( 'Custom WordPress builds that scale with your team.', 'ls-theme' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
		<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Ship faster with accessible, block-first sites and plugins designed around reusable patterns, semantic tokens, and maintainable editorial workflows.', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"className":"ls-card-feature__cta is-style-link-arrow-accent"} -->
	<p class="ls-card-feature__cta is-style-link-arrow-accent"><a class="ls-card-feature__link" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Learn More', 'ls-theme' ); ?></a></p>
	<!-- /wp:paragraph -->
</article>
<!-- /wp:group -->