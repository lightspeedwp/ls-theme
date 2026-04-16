<?php
/**
 * Title: Card - Performance Stat
 * Slug: ls-theme/card-performance-stat
 * Categories: featured
 * Block Types: core/pattern
 * Description: A compact metric card with a tinted brand icon frame, accent rail, and supporting copy.
 * Keywords: card, stats, metrics
 * Viewport Width: 360
 * Inserter: true
 */

?>
<!-- wp:group {"tagName":"article","className":"is-style-card-performance-stat","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
<article class="wp-block-group is-style-card-performance-stat">
	<!-- wp:group {"className":"is-style-icon-frame-brand-tint","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
	<div class="wp-block-group is-style-icon-frame-brand-tint">
		<!-- wp:outermost/icon-block {"iconName":"calendar-check","width":"20px"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:heading {"level":4} -->
	<h4 class="wp-block-heading"><?php echo esc_html__( '40%', 'ls-theme' ); ?></h4>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php echo esc_html__( 'Increase in online bookings', 'ls-theme' ); ?></p>
	<!-- /wp:paragraph -->
</article>
<!-- /wp:group -->