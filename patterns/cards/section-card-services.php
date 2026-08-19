<?php
/**
 * Title: Card - Services
 * Slug: ls-theme/section-card-services
 * Categories: featured
 * Block Types: core/pattern
 * Description: A centred services card with a replaceable icon tile, supporting copy, a blue tick list, and an inline CTA.
 * Keywords: card, services, cta
 * Viewport Width: 428
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"tagName":"article","className":"is-style-card-services","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
<article class="wp-block-group is-style-card-services">
	<!-- wp:group {"className":"ls-card__icon-shell","style":{"spacing":{"padding":"var:preset|spacing|20"}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-card__icon-shell" style="padding:var(--wp--preset--spacing--20)">
		<!-- wp:outermost/icon-block {"iconName":"rocket-launch","width":"34px"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"ls-card-services__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-card-services__content">
		<!-- wp:heading {"level":3,"textAlign":"center"} -->
		<h3 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'Growth', 'ls-theme' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
		<p class="has-text-align-center has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Design, development, and deployment of your WordPress solution.', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:list {"className":"ls-card-services__list is-style-tick-accent"} -->
		<ul class="wp-block-list ls-card-services__list is-style-tick-accent"><li><?php echo esc_html__( 'Custom design systems', 'ls-theme' ); ?></li><li><?php echo esc_html__( 'Block theme development', 'ls-theme' ); ?></li><li><?php echo esc_html__( 'WooCommerce setup', 'ls-theme' ); ?></li><li><?php echo esc_html__( 'Performance optimisation', 'ls-theme' ); ?></li></ul>
		<!-- /wp:list -->
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"align":"center","className":"ls-card-services__cta is-style-link-arrow-accent"} -->
	<p class="has-text-align-center ls-card-services__cta is-style-link-arrow-accent"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Explore services', 'ls-theme' ); ?></a></p>
	<!-- /wp:paragraph -->
</article>
<!-- /wp:group -->