<?php
/**
 * Title: Section - Logo Strip
 * Slug: ls-theme/logo-strip
 * Categories: featured
 * Block Types: core/pattern
 * Description: A client logo strip for the page canvas: a bold label on the left and a wrapping row of six client logos on the right, spaced by the block gap. Each logo is a light/dark image pair toggled by the theme light/dark visibility tokens (the same mechanism as the site logo), so the logos stay legible in both modes. Falls back to core/group and core/image because no semantic core block fits a logo row.
 * Keywords: logos, clients, strip, trust, testimonials
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_logo_base = 'https://ls-agency.lightspeedwp.dev/wp-content/uploads/';
?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-logo-strip","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|30","bottom":"var:preset|spacing|40","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-logo-strip" style="margin-top:0;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|50"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"center"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"300"} -->
		<p class="has-300-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'A few of our happy clients:', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group">

			<!-- wp:group {"className":"ls-logo-strip__item","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group ls-logo-strip__item">
				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-light"} -->
				<figure class="wp-block-image size-full site-logo--for-light"><img src="<?php echo esc_url( $ls_logo_base . '2024/06/tas-logo-1.svg' ); ?>" alt="<?php echo esc_attr__( 'The Answer Series', 'ls-theme' ); ?>"/></figure>
				<!-- /wp:image -->

				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-dark"} -->
				<figure class="wp-block-image size-full site-logo--for-dark"><img src="<?php echo esc_url( $ls_logo_base . '2024/06/tas-logo.svg' ); ?>" alt="<?php echo esc_attr__( 'The Answer Series', 'ls-theme' ); ?>"/></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"ls-logo-strip__item","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group ls-logo-strip__item">
				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-light"} -->
				<figure class="wp-block-image size-full site-logo--for-light"><img src="<?php echo esc_url( $ls_logo_base . '2024/06/xneelo-logo-1.svg' ); ?>" alt="<?php echo esc_attr__( 'xneelo', 'ls-theme' ); ?>"/></figure>
				<!-- /wp:image -->

				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-dark"} -->
				<figure class="wp-block-image size-full site-logo--for-dark"><img src="<?php echo esc_url( $ls_logo_base . '2024/06/xneelo-logo.svg' ); ?>" alt="<?php echo esc_attr__( 'xneelo', 'ls-theme' ); ?>"/></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"ls-logo-strip__item","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group ls-logo-strip__item">
				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-light"} -->
				<figure class="wp-block-image size-full site-logo--for-light"><img src="<?php echo esc_url( $ls_logo_base . '2024/06/sd-logo-1.svg' ); ?>" alt="<?php echo esc_attr__( 'Southern Destinations', 'ls-theme' ); ?>"/></figure>
				<!-- /wp:image -->

				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-dark"} -->
				<figure class="wp-block-image size-full site-logo--for-dark"><img src="<?php echo esc_url( $ls_logo_base . '2024/06/sd-logo.svg' ); ?>" alt="<?php echo esc_attr__( 'Southern Destinations', 'ls-theme' ); ?>"/></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"ls-logo-strip__item","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group ls-logo-strip__item">
				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-light"} -->
				<figure class="wp-block-image size-full site-logo--for-light"><img src="<?php echo esc_url( $ls_logo_base . '2024/06/m24-logo-1.svg' ); ?>" alt="<?php echo esc_attr__( 'Media24', 'ls-theme' ); ?>"/></figure>
				<!-- /wp:image -->

				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-dark"} -->
				<figure class="wp-block-image size-full site-logo--for-dark"><img src="<?php echo esc_url( $ls_logo_base . '2024/06/m24-logo.svg' ); ?>" alt="<?php echo esc_attr__( 'Media24', 'ls-theme' ); ?>"/></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"ls-logo-strip__item","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group ls-logo-strip__item">
				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-light"} -->
				<figure class="wp-block-image size-full site-logo--for-light"><img src="<?php echo esc_url( $ls_logo_base . '2024/06/client-logo-safari-partners-22-1.svg' ); ?>" alt="<?php echo esc_attr__( 'The Safari Partners', 'ls-theme' ); ?>"/></figure>
				<!-- /wp:image -->

				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-dark"} -->
				<figure class="wp-block-image size-full site-logo--for-dark"><img src="<?php echo esc_url( $ls_logo_base . '2024/06/client-logo-safari-partners-22.svg' ); ?>" alt="<?php echo esc_attr__( 'The Safari Partners', 'ls-theme' ); ?>"/></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"ls-logo-strip__item","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group ls-logo-strip__item">
				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-light"} -->
				<figure class="wp-block-image size-full site-logo--for-light"><img src="<?php echo esc_url( $ls_logo_base . '2024/06/ctt-logo-1.svg' ); ?>" alt="<?php echo esc_attr__( 'Love Cape Town', 'ls-theme' ); ?>"/></figure>
				<!-- /wp:image -->

				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-dark"} -->
				<figure class="wp-block-image size-full site-logo--for-dark"><img src="<?php echo esc_url( $ls_logo_base . '2024/06/ctt-logo.svg' ); ?>" alt="<?php echo esc_attr__( 'Love Cape Town', 'ls-theme' ); ?>"/></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
