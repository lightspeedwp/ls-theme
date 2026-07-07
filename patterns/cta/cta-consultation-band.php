<?php
/**
 * Title: CTA - Consultation Band
 * Slug: ls-theme/cta-consultation-band
 * Categories: cta
 * Block Types: core/pattern
 * Description: A dark gradient call-to-action band inviting visitors to book a free consultation, paired with a "see our work" link and three reassurance tiles.
 * Keywords: cta, consultation, call to action, band
 * Viewport Width: 1240
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"wide","tagName":"section","className":"ls-cta-band","style":{"color":{"gradient":"linear-gradient(158deg,var(--wp--custom--color--surface--band-start) 0%,var(--wp--custom--color--surface--band-end) 100%)"},"border":{"radius":"var:preset|border-radius|300"},"spacing":{"blockGap":"var:preset|spacing|60","padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|60","bottom":"var:preset|spacing|80","left":"var:preset|spacing|60"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"center"}} -->
<section class="wp-block-group alignwide ls-cta-band has-background" style="border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--60);background:linear-gradient(158deg,var(--wp--custom--color--surface--band-start) 0%,var(--wp--custom--color--surface--band-end) 100%)">

	<!-- wp:group {"className":"ls-cta-band__primary","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-cta-band__primary">

		<!-- wp:group {"className":"ls-cta-band__content","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
		<div class="wp-block-group ls-cta-band__content">

			<!-- wp:group {"className":"ls-cta-band__badge","layout":{"type":"flex","verticalAlignment":"center","flexWrap":"nowrap"}} -->
			<div class="wp-block-group ls-cta-band__badge">
				<!-- wp:group {"className":"ls-cta-band__badge-dot","style":{"color":{"background":"var(--wp--custom--color--icon--background)"},"border":{"radius":"var:preset|border-radius|500"}}} -->
				<div class="wp-block-group ls-cta-band__badge-dot" style="background-color:var(--wp--custom--color--icon--background);border-radius:var(--wp--preset--border-radius--500)"></div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"className":"ls-cta-band__badge-label","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"typography":{"textTransform":"uppercase","letterSpacing":"1.2px"}},"fontSize":"x-small"} -->
				<p class="ls-cta-band__badge-label has-x-small-font-size" style="color:var(--wp--custom--color--text--brand);letter-spacing:1.2px;text-transform:uppercase"><?php echo esc_html__( 'Free consultation', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":2,"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"},"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"}}} -->
			<h2 class="wp-block-heading" style="color:var(--wp--custom--color--text--on-dark);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Ready to talk through your project?', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"ls-cta-band__lead","style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}}} -->
			<p class="ls-cta-band__lead" style="color:var(--wp--custom--color--text--on-dark-muted)"><?php echo esc_html__( "Tell us what you are planning and we'll get back to you quickly with clear next steps.", 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"ls-cta-band__actions","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group ls-cta-band__actions">
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"ls-cta-band__button"} -->
				<div class="wp-block-button ls-cta-band__button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>"><?php echo esc_html__( 'Book a free consultation', 'ls-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

			<span style="--ls-link-arrow-colour:var(--wp--custom--color--text--on-dark);--ls-link-arrow-hover-colour:var(--wp--custom--color--text--brand)">
			<!-- wp:paragraph {"className":"ls-cta-band__secondary is-style-link-arrow-accent"} -->
			<p class="ls-cta-band__secondary is-style-link-arrow-accent"><a href="<?php echo esc_url( home_url( '/work/' ) ); ?>"><?php echo esc_html__( 'or see our work', 'ls-theme' ); ?></a></p>
			<!-- /wp:paragraph -->
			</span>
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"ls-cta-band__reassurance","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-cta-band__reassurance">

		<!-- wp:group {"tagName":"article","className":"is-style-glass-card ls-cta-band__tile","layout":{"type":"flex","verticalAlignment":"center","flexWrap":"nowrap"}} -->
		<article class="wp-block-group is-style-glass-card ls-cta-band__tile">
			<span class="ls-icon ls-icon--check" aria-hidden="true" style="display:inline-flex;flex-shrink:0;width:20px;height:20px;background-color:var(--wp--custom--color--text--brand);mask-image:url(<?php echo esc_url( get_theme_file_uri( 'assets/icons/check.svg' ) ); ?>);-webkit-mask-image:url(<?php echo esc_url( get_theme_file_uri( 'assets/icons/check.svg' ) ); ?>);mask-size:contain;-webkit-mask-size:contain;mask-repeat:no-repeat;-webkit-mask-repeat:no-repeat;mask-position:center;-webkit-mask-position:center"></span>

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"},"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}}} -->
			<p style="color:var(--wp--custom--color--text--on-dark);font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Clear next steps', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</article>
		<!-- /wp:group -->

		<!-- wp:group {"tagName":"article","className":"is-style-glass-card ls-cta-band__tile","layout":{"type":"flex","verticalAlignment":"center","flexWrap":"nowrap"}} -->
		<article class="wp-block-group is-style-glass-card ls-cta-band__tile">
			<span class="ls-icon ls-icon--chat" aria-hidden="true" style="display:inline-flex;flex-shrink:0;width:20px;height:20px;background-color:var(--wp--custom--color--text--brand);mask-image:url(<?php echo esc_url( get_theme_file_uri( 'assets/icons/chat.svg' ) ); ?>);-webkit-mask-image:url(<?php echo esc_url( get_theme_file_uri( 'assets/icons/chat.svg' ) ); ?>);mask-size:contain;-webkit-mask-size:contain;mask-repeat:no-repeat;-webkit-mask-repeat:no-repeat;mask-position:center;-webkit-mask-position:center"></span>

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"},"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}}} -->
			<p style="color:var(--wp--custom--color--text--on-dark);font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'No pressure, just useful advice', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</article>
		<!-- /wp:group -->

		<!-- wp:group {"tagName":"article","className":"is-style-glass-card ls-cta-band__tile","layout":{"type":"flex","verticalAlignment":"center","flexWrap":"nowrap"}} -->
		<article class="wp-block-group is-style-glass-card ls-cta-band__tile">
			<span class="ls-icon ls-icon--star" aria-hidden="true" style="display:inline-flex;flex-shrink:0;width:20px;height:20px;background-color:var(--wp--custom--color--text--brand);mask-image:url(<?php echo esc_url( get_theme_file_uri( 'assets/icons/star.svg' ) ); ?>);-webkit-mask-image:url(<?php echo esc_url( get_theme_file_uri( 'assets/icons/star.svg' ) ); ?>);mask-size:contain;-webkit-mask-size:contain;mask-repeat:no-repeat;-webkit-mask-repeat:no-repeat;mask-position:center;-webkit-mask-position:center"></span>

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"},"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}}} -->
			<p style="color:var(--wp--custom--color--text--on-dark);font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( '21 years of WordPress expertise', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</article>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:group -->
