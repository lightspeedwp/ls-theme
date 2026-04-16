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

	<!-- wp:paragraph {"className":"ls-badge-hero__label"} -->
	<p class="ls-badge-hero__label"><?php echo esc_html__( 'Badge Title', 'ls-theme' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->