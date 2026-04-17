<?php
/**
 * Title: Footer Stats Button
 * Slug: ls-theme/footer-stats-button
 * Categories: featured, footer
 * Block Types: core/pattern
 * Description: Linked footer proof card for a metric and supporting label.
 * Keywords: footer, stats, proof
 * Viewport Width: 280
 * Inserter: true
 */

?>
<!-- wp:group {"className":"ls-footer__stat is-style-footer-stats-button","layout":{"type":"default"}} -->
<div class="wp-block-group ls-footer__stat is-style-footer-stats-button">
	<!-- wp:heading {"level":3,"textAlign":"center","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
	<h3 class="wp-block-heading has-text-align-center" style="margin-top:0;margin-bottom:0"><?php echo esc_html__( '200+', 'ls-theme' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
	<p class="has-text-align-center" style="margin-top:0;margin-bottom:0"><?php echo esc_html__( 'Projects shipped', 'ls-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph {"className":"ls-footer-stats-button__link","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
	<p class="ls-footer-stats-button__link" style="margin-top:0;margin-bottom:0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="screen-reader-text"><?php echo esc_html__( 'View projects shipped', 'ls-theme' ); ?></span></a></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->