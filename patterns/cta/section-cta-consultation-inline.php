<?php
/**
 * Title: CTA - Consultation Inline
 * Slug: ls-theme/section-cta-consultation-inline
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
<!-- wp:group {"tagName":"aside","className":"ls-cta-inline-card ls-cta-inline","style":{"color":{"background":"var:custom|color|surface|on-dark-card","text":"var:custom|color|text|on-dark"},"border":{"top":{"color":"var:custom|color|text|brand","style":"solid","width":"1px"},"right":{"color":"var:custom|color|text|brand","style":"solid","width":"1px"},"bottom":{"color":"var:custom|color|text|brand","style":"solid","width":"1px"},"left":{"color":"var:custom|color|text|brand","style":"solid","width":"3px"},"radius":"var:preset|border-radius|200"},"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<aside class="wp-block-group ls-cta-inline-card ls-cta-inline has-text-color has-background" style="border-top-color:var(--wp--custom--color--text--brand);border-top-style:solid;border-top-width:1px;border-right-color:var(--wp--custom--color--text--brand);border-right-style:solid;border-right-width:1px;border-bottom-color:var(--wp--custom--color--text--brand);border-bottom-style:solid;border-bottom-width:1px;border-left-color:var(--wp--custom--color--text--brand);border-left-style:solid;border-left-width:3px;border-radius:var(--wp--preset--border-radius--200);color:var(--wp--custom--color--text--on-dark);background-color:var(--wp--custom--color--surface--on-dark-card);padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"className":"ls-cta-inline__content","style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-cta-inline__content">

		<!-- wp:group {"className":"ls-cta-inline__badge","layout":{"type":"flex","verticalAlignment":"center","flexWrap":"nowrap"}} -->
		<div class="wp-block-group ls-cta-inline__badge">
			<!-- wp:group {"className":"ls-cta-inline__badge-icon","style":{"color":{"background":"var(--wp--custom--color--icon--background)"},"border":{"radius":"var:preset|border-radius|200"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
			<div class="wp-block-group ls-cta-inline__badge-icon" style="background-color:var(--wp--custom--color--icon--background);border-radius:var(--wp--preset--border-radius--200);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
				<!-- wp:html -->
				<span class="ls-icon ls-icon--phone" aria-hidden="true" style="display:inline-flex;flex-shrink:0;width:12px;height:12px;color:var(--wp--custom--color--icon--color)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" width="12" height="12" fill="currentColor"><path d="M222.37,158.46l-47.11-21.11-.13-.06a16,16,0,0,0-15.17,1.4,8.12,8.12,0,0,0-.75.56L134.87,160c-15.42-7.49-31.34-23.29-38.83-38.51l20.78-24.71c.2-.25.39-.5.57-.77a16,16,0,0,0,1.32-15.06l0-.12L97.54,33.64a16,16,0,0,0-16.62-9.52A56.26,56.26,0,0,0,32,80c0,79.4,64.6,144,144,144a56.26,56.26,0,0,0,55.88-48.92A16,16,0,0,0,222.37,158.46ZM176,208A128.14,128.14,0,0,1,48,80,40.2,40.2,0,0,1,82.87,40a.61.61,0,0,0,0,.12l21,47L83.2,111.86a6.13,6.13,0,0,0-.57.77,16,16,0,0,0-1,15.7c9.06,18.53,27.73,37.06,46.46,46.11a16,16,0,0,0,15.75-1.14,8.44,8.44,0,0,0,.74-.56L168.89,152l47,21.05h0s.08,0,.11,0A40.21,40.21,0,0,1,176,208Z"></path></svg></span>
				<!-- /wp:html -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"className":"ls-cta-inline__badge-label","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest"}},"fontSize":"100"} -->
			<p class="ls-cta-inline__badge-label has-100-font-size" style="color:var(--wp--custom--color--text--brand);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Free consultation', 'ls-theme' ); ?></p>
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
