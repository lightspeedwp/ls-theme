<?php
/**
 * Title: Badge - Hero
 * Slug: ls-theme/badge-hero
 * Categories: hero
 * Block Types: core/pattern
 * Description: Compact hero badge with a sparkle icon and uppercase label.
 * Keywords: badge, hero, sparkle
 * Viewport Width: 240
 * Inserter: true
 */

?>
<!-- wp:group {"className":"ls-badge-hero is-style-badge-hero-brand","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center","justifyContent":"center"}} -->
<div class="wp-block-group ls-badge-hero is-style-badge-hero-brand">
	<!-- wp:group {"className":"ls-badge-hero__icon","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-badge-hero__icon">
		<!-- wp:outermost/icon-block {"iconName":"sparkle","width":"16px"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"className":"ls-badge-hero__label","style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"typography":{"fontFamily":"var:preset|font-family|heading","fontSize":"var:preset|font-size|100","fontWeight":"var:custom|typography|font-weight|semibold","letterSpacing":"var:custom|typography|letter-spacing|normal","lineHeight":"var:custom|line-height|heading-default","textAlign":"center","textTransform":"uppercase"}}} -->
	<p class="ls-badge-hero__label" style="margin-top:0;margin-bottom:0;font-family:var(--wp--preset--font-family--heading);font-size:var(--wp--preset--font-size--100);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--normal);line-height:var(--wp--custom--line-height--heading-default);text-align:center;text-transform:uppercase"><?php echo esc_html__( 'Badge Title', 'ls-theme' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->