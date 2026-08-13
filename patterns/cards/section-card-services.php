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
 */

?>
<!-- wp:group {"tagName":"article","className":"ls-card-services","style":{"color":{"background":"var:custom|color|surface|card","text":"var:custom|color|text|default"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|300","style":"solid","width":"1px"},"shadow":"var:preset|shadow|100","spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
<article class="wp-block-group ls-card-services has-border-color has-text-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--300);color:var(--wp--custom--color--text--default);background-color:var(--wp--custom--color--surface--card);box-shadow:var(--wp--preset--shadow--100);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
	<!-- wp:group {"className":"ls-card__icon-shell is-style-card-icon-shell","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-card__icon-shell is-style-card-icon-shell">
		<!-- wp:outermost/icon-block {"iconName":"rocket-launch","width":"34px"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"ls-card-services__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-card-services__content">
		<!-- wp:heading {"level":3,"textAlign":"center"} -->
		<h3 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'Growth', 'ls-theme' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
		<p class="has-text-align-center" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Design, development, and deployment of your WordPress solution.', 'ls-theme' ); ?></p>
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