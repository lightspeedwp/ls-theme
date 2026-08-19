<?php
/**
 * Title: CTA - Consultation Reassurance
 * Slug: ls-theme/section-cta-consultation-reassurance
 * Categories: cta
 * Block Types: core/pattern
 * Description: A two-column call-to-action card pairing a consultation pitch with a short list of reassurances, for use before a commitment point.
 * Keywords: cta, consultation, call to action, reassurance
 * Viewport Width: 1000
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"className":"ls-cta-reassurance","style":{"color":{"background":"var(--wp--custom--color--surface--on-dark-card)"},"border":{"color":"color-mix(in srgb, var(--wp--custom--color--text--on-dark) 8%, transparent)","width":"1px","radius":"var:preset|border-radius|300"},"spacing":{"blockGap":"var:preset|spacing|60","padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60"}}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
<div class="wp-block-group ls-cta-reassurance" style="background-color:var(--wp--custom--color--surface--on-dark-card);border-color:color-mix(in srgb, var(--wp--custom--color--text--on-dark) 8%, transparent);border-width:1px;border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">

	<!-- wp:group {"className":"ls-cta-reassurance__primary","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-cta-reassurance__primary">

		<!-- wp:group {"className":"ls-cta-reassurance__content","style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
		<div class="wp-block-group ls-cta-reassurance__content">
			<!-- wp:paragraph {"className":"ls-cta-reassurance__badge","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest"}},"fontSize":"100"} -->
			<p class="ls-cta-reassurance__badge has-100-font-size" style="color:var(--wp--custom--color--text--brand);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Free consultation', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":2,"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"},"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"500"} -->
			<h2 class="wp-block-heading has-500-font-size" style="color:var(--wp--custom--color--text--on-dark);font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'A quick call before you commit', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}}} -->
			<p style="color:var(--wp--custom--color--text--on-dark-muted)"><?php echo esc_html__( 'Use a free consultation to check fit, ask questions and understand what a sensible next step could look like.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"ls-cta-reassurance__button"} -->
			<div class="wp-block-button ls-cta-reassurance__button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>"><?php echo esc_html__( 'Book a free consultation', 'ls-theme' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<span aria-hidden="true" style="width:1px;align-self:stretch;background-color:color-mix(in srgb, var(--wp--custom--color--text--on-dark) 8%, transparent);flex-shrink:0"></span>

	<!-- wp:group {"className":"ls-cta-reassurance__list","style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-cta-reassurance__list">

		<!-- wp:group {"className":"ls-cta-reassurance__item","style":{"border":{"bottom":{"color":"color-mix(in srgb, var(--wp--custom--color--text--on-dark) 8%, transparent)","style":"solid","width":"1px"}},"spacing":{"blockGap":"var:preset|spacing|20","padding":{"bottom":"var:preset|spacing|10"}}},"layout":{"type":"flex","verticalAlignment":"top","flexWrap":"nowrap"}} -->
		<div class="wp-block-group ls-cta-reassurance__item" style="border-bottom-color:color-mix(in srgb, var(--wp--custom--color--text--on-dark) 8%, transparent);border-bottom-style:solid;border-bottom-width:1px;padding-bottom:var(--wp--preset--spacing--10)">
			<!-- wp:group {"className":"ls-cta-reassurance__item-icon","style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 20%, transparent)"},"border":{"radius":"var:preset|border-radius|300"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
			<div class="wp-block-group ls-cta-reassurance__item-icon" style="background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 20%, transparent);border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
				<!-- wp:html -->
				<span class="ls-icon ls-icon--check" aria-hidden="true" style="display:inline-flex;flex-shrink:0;width:13px;height:13px;color:var(--wp--custom--color--text--brand)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" width="13" height="13" fill="currentColor"><path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path></svg></span>
				<!-- /wp:html -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"},"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}}} -->
			<p style="color:var(--wp--custom--color--text--on-dark);font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'A focused, practical conversation', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"ls-cta-reassurance__item","style":{"border":{"bottom":{"color":"color-mix(in srgb, var(--wp--custom--color--text--on-dark) 8%, transparent)","style":"solid","width":"1px"}},"spacing":{"blockGap":"var:preset|spacing|20","padding":{"bottom":"var:preset|spacing|10"}}},"layout":{"type":"flex","verticalAlignment":"top","flexWrap":"nowrap"}} -->
		<div class="wp-block-group ls-cta-reassurance__item" style="border-bottom-color:color-mix(in srgb, var(--wp--custom--color--text--on-dark) 8%, transparent);border-bottom-style:solid;border-bottom-width:1px;padding-bottom:var(--wp--preset--spacing--10)">
			<!-- wp:group {"className":"ls-cta-reassurance__item-icon","style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 20%, transparent)"},"border":{"radius":"var:preset|border-radius|300"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
			<div class="wp-block-group ls-cta-reassurance__item-icon" style="background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 20%, transparent);border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
				<!-- wp:html -->
				<span class="ls-icon ls-icon--check" aria-hidden="true" style="display:inline-flex;flex-shrink:0;width:13px;height:13px;color:var(--wp--custom--color--text--brand)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" width="13" height="13" fill="currentColor"><path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path></svg></span>
				<!-- /wp:html -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"},"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}}} -->
			<p style="color:var(--wp--custom--color--text--on-dark);font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'No pressure to commit to anything', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"ls-cta-reassurance__item","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","verticalAlignment":"top","flexWrap":"nowrap"}} -->
		<div class="wp-block-group ls-cta-reassurance__item">
			<!-- wp:group {"className":"ls-cta-reassurance__item-icon","style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 20%, transparent)"},"border":{"radius":"var:preset|border-radius|300"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
			<div class="wp-block-group ls-cta-reassurance__item-icon" style="background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 20%, transparent);border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
				<!-- wp:html -->
				<span class="ls-icon ls-icon--check" aria-hidden="true" style="display:inline-flex;flex-shrink:0;width:13px;height:13px;color:var(--wp--custom--color--text--brand)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" width="13" height="13" fill="currentColor"><path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path></svg></span>
				<!-- /wp:html -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"},"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}}} -->
			<p style="color:var(--wp--custom--color--text--on-dark);font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Clear next steps once we understand your project', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
