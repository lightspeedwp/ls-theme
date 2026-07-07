<?php
/**
 * Title: CTA - Consultation Inline
 * Slug: ls-theme/cta-consultation-inline
 * Categories: cta
 * Block Types: core/pattern
 * Description: A compact inline call-to-action card inviting visitors to book a free consultation, for use inside articles, sidebars, or content flows.
 * Keywords: cta, consultation, call to action, inline
 * Viewport Width: 640
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"tagName":"aside","className":"is-style-cta-inline-card ls-cta-inline","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<aside class="wp-block-group is-style-cta-inline-card ls-cta-inline">

	<!-- wp:group {"className":"ls-cta-inline__content","style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-cta-inline__content">

		<!-- wp:group {"className":"ls-cta-inline__badge","layout":{"type":"flex","verticalAlignment":"center","flexWrap":"nowrap"}} -->
		<div class="wp-block-group ls-cta-inline__badge">
			<!-- wp:group {"className":"ls-cta-inline__badge-icon","style":{"color":{"background":"var(--wp--custom--color--icon--background)"},"border":{"radius":"var:preset|border-radius|200"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
			<div class="wp-block-group ls-cta-inline__badge-icon" style="background-color:var(--wp--custom--color--icon--background);border-radius:var(--wp--preset--border-radius--200);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
				<!-- wp:outermost/icon-block {"iconName":"phone","width":"12px","style":{"color":{"text":"var(--wp--custom--color--icon--color)"}}} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"className":"ls-cta-inline__badge-label","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"typography":{"textTransform":"uppercase","letterSpacing":"1.2px"}},"fontSize":"x-small"} -->
			<p class="ls-cta-inline__badge-label has-x-small-font-size" style="color:var(--wp--custom--color--text--brand);letter-spacing:1.2px;text-transform:uppercase"><?php echo esc_html__( 'Free consultation', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:heading {"level":3,"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"},"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"small"} -->
		<h3 class="wp-block-heading has-small-font-size" style="color:var(--wp--custom--color--text--on-dark);font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Want to talk this through for your site?', 'ls-theme' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"}}} -->
		<p style="color:var(--wp--custom--color--text--on-dark)"><?php echo esc_html__( 'We can help you work out the next sensible step — no pressure, just a practical conversation.', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button {"className":"ls-cta-inline__button"} -->
		<div class="wp-block-button ls-cta-inline__button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>"><?php echo esc_html__( 'Book a free consultation', 'ls-theme' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

</aside>
<!-- /wp:group -->
