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
		<div class="wp-block-group ls-cta-band__actions" style="--ls-link-arrow-colour:var(--wp--custom--color--text--on-dark);--ls-link-arrow-hover-colour:var(--wp--custom--color--text--brand)">
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"ls-cta-band__button"} -->
				<div class="wp-block-button ls-cta-band__button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>"><?php echo esc_html__( 'Book a free consultation', 'ls-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

			<!-- wp:paragraph {"className":"ls-cta-band__secondary is-style-link-arrow-accent"} -->
			<p class="ls-cta-band__secondary is-style-link-arrow-accent"><a href="<?php echo esc_url( home_url( '/work/' ) ); ?>"><?php echo esc_html__( 'or see our work', 'ls-theme' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"ls-cta-band__reassurance","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-cta-band__reassurance">

		<!-- wp:group {"tagName":"article","className":"is-style-glass-card ls-cta-band__tile","layout":{"type":"flex","verticalAlignment":"center","flexWrap":"nowrap"}} -->
		<article class="wp-block-group is-style-glass-card ls-cta-band__tile">
			<!-- wp:html -->
			<span class="ls-icon ls-icon--check" aria-hidden="true" style="display:inline-flex;flex-shrink:0;width:20px;height:20px;color:var(--wp--custom--color--text--brand)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" width="20" height="20" fill="currentColor"><path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path></svg></span>
			<!-- /wp:html -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"},"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}}} -->
			<p style="color:var(--wp--custom--color--text--on-dark);font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Clear next steps', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</article>
		<!-- /wp:group -->

		<!-- wp:group {"tagName":"article","className":"is-style-glass-card ls-cta-band__tile","layout":{"type":"flex","verticalAlignment":"center","flexWrap":"nowrap"}} -->
		<article class="wp-block-group is-style-glass-card ls-cta-band__tile">
			<!-- wp:html -->
			<span class="ls-icon ls-icon--chat" aria-hidden="true" style="display:inline-flex;flex-shrink:0;width:20px;height:20px;color:var(--wp--custom--color--text--brand)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" width="20" height="20" fill="currentColor"><path d="M216,48H40A16,16,0,0,0,24,64V224a15.84,15.84,0,0,0,9.25,14.5A16.05,16.05,0,0,0,40,240a15.89,15.89,0,0,0,10.25-3.78l.09-.07L83,208H216a16,16,0,0,0,16-16V64A16,16,0,0,0,216,48ZM40,224h0ZM216,192H80a8,8,0,0,0-5.23,1.95L40,224V64H216Z"></path></svg></span>
			<!-- /wp:html -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"},"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}}} -->
			<p style="color:var(--wp--custom--color--text--on-dark);font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'No pressure, just useful advice', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</article>
		<!-- /wp:group -->

		<!-- wp:group {"tagName":"article","className":"is-style-glass-card ls-cta-band__tile","layout":{"type":"flex","verticalAlignment":"center","flexWrap":"nowrap"}} -->
		<article class="wp-block-group is-style-glass-card ls-cta-band__tile">
			<!-- wp:html -->
			<span class="ls-icon ls-icon--star" aria-hidden="true" style="display:inline-flex;flex-shrink:0;width:20px;height:20px;color:var(--wp--custom--color--text--brand)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" width="20" height="20" fill="currentColor"><path d="M239.18,97.26A16.38,16.38,0,0,0,224.92,86l-59-4.76L143.14,26.15a16.36,16.36,0,0,0-30.27,0L90.11,81.23,31.08,86a16.46,16.46,0,0,0-9.37,28.86l45,38.83L53,211.75a16.38,16.38,0,0,0,24.5,17.82L128,198.49l50.53,31.08A16.4,16.4,0,0,0,203,211.75l-13.76-58.07,45-38.83A16.43,16.43,0,0,0,239.18,97.26Zm-15.34,5.47-48.7,42a8,8,0,0,0-2.56,7.91l14.88,62.8a.37.37,0,0,1-.17.48c-.18.14-.23.11-.38,0l-54.72-33.65a8,8,0,0,0-8.38,0L69.09,215.94c-.15.09-.19.12-.38,0a.37.37,0,0,1-.17-.48l14.88-62.8a8,8,0,0,0-2.56-7.91l-48.7-42c-.12-.1-.23-.19-.13-.5s.18-.27.33-.29l63.92-5.16A8,8,0,0,0,103,91.86l24.62-59.61c.08-.17.11-.25.35-.25s.27.08.35.25L153,91.86a8,8,0,0,0,6.75,4.92l63.92,5.16c.15,0,.24,0,.33.29S224,102.63,223.84,102.73Z"></path></svg></span>
			<!-- /wp:html -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"},"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}}} -->
			<p style="color:var(--wp--custom--color--text--on-dark);font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( '21 years of WordPress expertise', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</article>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:group -->
