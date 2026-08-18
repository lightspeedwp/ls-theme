<?php
/**
 * Title: Home Hero
 * Slug: ls-theme/hero
 * Categories: hero
 * Block Types: core/template-part/hero
 * Description: Minimal home hero section using the reusable GSAP section background style.
 */

?>

<!-- wp:group {"align":"full","tagName":"section","className":"ls-home-hero-section","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|30","bottom":"var:preset|spacing|90","left":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
<section class="wp-block-group alignfull ls-home-hero-section" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:heading {"textAlign":"center","level":1} -->
		<h1 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'AI-powered', 'ls-theme' ); ?><br><?php echo esc_html__( 'WordPress', 'ls-theme' ); ?><br><?php echo esc_html__( 'WooCommerce', 'ls-theme' ); ?><br><?php echo esc_html__( 'Performant', 'ls-theme' ); ?></h1>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->