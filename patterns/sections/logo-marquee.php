<?php
/**
 * Title: Section - Logo Marquee
 * Slug: ls-theme/logo-marquee
 * Categories: featured
 * Block Types: core/pattern
 * Description: A client logo strip that scrolls slowly and endlessly: six client logos in a clipped track, with a small text and icon pause control beneath it and a visually hidden H2 that names the section. Each logo is a light/dark image pair toggled by the theme light/dark visibility tokens, so the logos stay legible in both modes. Without JavaScript, and when the visitor prefers reduced motion, it stays a static, centred, wrapping row. The script (assets/js/logo-marquee.js) starts the scroll, builds the repeat for a seamless loop from the current logo set (so editing a logo here is enough; the repeat has empty alt text and is hidden from assistive tech), and shows the pause control, which meets WCAG 2.2.2. It also narrows the window to less than one set of logos, so the same logo never shows twice at once. The scroll also pauses on hover and while anything in it has focus. Falls back to core/group, core/image and core/button (as a button element) because no semantic core block fits a logo carousel.
 * Keywords: logos, clients, marquee, slider, carousel, trust
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_logo_base = 'https://ls-agency.lightspeedwp.dev/wp-content/uploads/';
?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-logo-marquee","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|30","bottom":"var:preset|spacing|50","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-logo-marquee" style="margin-top:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:heading {"level":2,"className":"screen-reader-text"} -->
		<h2 class="wp-block-heading screen-reader-text"><?php echo esc_html__( 'A few of our happy clients', 'ls-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:group {"className":"ls-logo-marquee__viewport","layout":{"type":"default"}} -->
		<div class="wp-block-group ls-logo-marquee__viewport">

			<!-- wp:group {"className":"ls-logo-marquee__track","layout":{"type":"default"}} -->
			<div class="wp-block-group ls-logo-marquee__track">

				<!-- wp:group {"className":"ls-logo-marquee__set","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|60"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"center"}} -->
				<div class="wp-block-group ls-logo-marquee__set">

					<!-- wp:group {"className":"ls-logo-marquee__item","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
					<div class="wp-block-group ls-logo-marquee__item">
						<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-light"} -->
						<figure class="wp-block-image size-full site-logo--for-light"><img src="<?php echo esc_url( $ls_logo_base . '2024/06/tas-logo-1.svg' ); ?>" alt="<?php echo esc_attr__( 'The Answer Series', 'ls-theme' ); ?>"/></figure>
						<!-- /wp:image -->

						<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-dark"} -->
						<figure class="wp-block-image size-full site-logo--for-dark"><img src="<?php echo esc_url( $ls_logo_base . '2024/06/tas-logo.svg' ); ?>" alt="<?php echo esc_attr__( 'The Answer Series', 'ls-theme' ); ?>"/></figure>
						<!-- /wp:image -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"ls-logo-marquee__item","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
					<div class="wp-block-group ls-logo-marquee__item">
						<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-light"} -->
						<figure class="wp-block-image size-full site-logo--for-light"><img src="<?php echo esc_url( $ls_logo_base . '2024/06/xneelo-logo-1.svg' ); ?>" alt="<?php echo esc_attr__( 'xneelo', 'ls-theme' ); ?>"/></figure>
						<!-- /wp:image -->

						<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-dark"} -->
						<figure class="wp-block-image size-full site-logo--for-dark"><img src="<?php echo esc_url( $ls_logo_base . '2024/06/xneelo-logo.svg' ); ?>" alt="<?php echo esc_attr__( 'xneelo', 'ls-theme' ); ?>"/></figure>
						<!-- /wp:image -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"ls-logo-marquee__item","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
					<div class="wp-block-group ls-logo-marquee__item">
						<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-light"} -->
						<figure class="wp-block-image size-full site-logo--for-light"><img src="<?php echo esc_url( $ls_logo_base . '2024/06/sd-logo-1.svg' ); ?>" alt="<?php echo esc_attr__( 'Southern Destinations', 'ls-theme' ); ?>"/></figure>
						<!-- /wp:image -->

						<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-dark"} -->
						<figure class="wp-block-image size-full site-logo--for-dark"><img src="<?php echo esc_url( $ls_logo_base . '2024/06/sd-logo.svg' ); ?>" alt="<?php echo esc_attr__( 'Southern Destinations', 'ls-theme' ); ?>"/></figure>
						<!-- /wp:image -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"ls-logo-marquee__item","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
					<div class="wp-block-group ls-logo-marquee__item">
						<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-light"} -->
						<figure class="wp-block-image size-full site-logo--for-light"><img src="<?php echo esc_url( $ls_logo_base . '2024/06/m24-logo-1.svg' ); ?>" alt="<?php echo esc_attr__( 'Media24', 'ls-theme' ); ?>"/></figure>
						<!-- /wp:image -->

						<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-dark"} -->
						<figure class="wp-block-image size-full site-logo--for-dark"><img src="<?php echo esc_url( $ls_logo_base . '2024/06/m24-logo.svg' ); ?>" alt="<?php echo esc_attr__( 'Media24', 'ls-theme' ); ?>"/></figure>
						<!-- /wp:image -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"ls-logo-marquee__item","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
					<div class="wp-block-group ls-logo-marquee__item">
						<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-light"} -->
						<figure class="wp-block-image size-full site-logo--for-light"><img src="<?php echo esc_url( $ls_logo_base . '2024/06/client-logo-safari-partners-22-1.svg' ); ?>" alt="<?php echo esc_attr__( 'The Safari Partners', 'ls-theme' ); ?>"/></figure>
						<!-- /wp:image -->

						<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-dark"} -->
						<figure class="wp-block-image size-full site-logo--for-dark"><img src="<?php echo esc_url( $ls_logo_base . '2024/06/client-logo-safari-partners-22.svg' ); ?>" alt="<?php echo esc_attr__( 'The Safari Partners', 'ls-theme' ); ?>"/></figure>
						<!-- /wp:image -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"ls-logo-marquee__item","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
					<div class="wp-block-group ls-logo-marquee__item">
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
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons {"className":"ls-logo-marquee__pause","layout":{"type":"flex","justifyContent":"right"}} -->
		<div class="wp-block-buttons ls-logo-marquee__pause">
			<!-- wp:button {"tagName":"button","className":"is-style-button-secondary-outline"} -->
			<div class="wp-block-button is-style-button-secondary-outline"><button type="button" class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Pause animation', 'ls-theme' ); ?></button></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
