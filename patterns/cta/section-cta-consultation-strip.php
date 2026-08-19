<?php
/**
 * Title: CTA - Consultation Strip
 * Slug: ls-theme/section-cta-consultation-strip
 * Categories: cta
 * Block Types: core/pattern
 * Description: A compact glass-panel strip inviting visitors to book a free consultation, for use as a lightweight inline call to action.
 * Keywords: cta, consultation, call to action, strip
 * Viewport Width: 800
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"className":"is-style-glass-card ls-cta-strip","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group is-style-glass-card ls-cta-strip">

	<!-- wp:group {"className":"ls-cta-strip__intro","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","verticalAlignment":"center","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-cta-strip__intro">

		<!-- wp:group {"className":"ls-cta-strip__icon","style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 20%, transparent)"},"border":{"radius":"var:preset|border-radius|300"},"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
		<div class="wp-block-group ls-cta-strip__icon has-background" style="border-radius:var(--wp--preset--border-radius--300);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 20%, transparent);padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
			<!-- wp:html -->
			<span class="ls-icon ls-icon--phone" aria-hidden="true" style="display:inline-flex;flex-shrink:0;width:20px;height:20px;color:var(--wp--custom--color--text--brand)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" width="20" height="20" fill="currentColor"><path d="M222.37,158.46l-47.11-21.11-.13-.06a16,16,0,0,0-15.17,1.4,8.12,8.12,0,0,0-.75.56L134.87,160c-15.42-7.49-31.34-23.29-38.83-38.51l20.78-24.71c.2-.25.39-.5.57-.77a16,16,0,0,0,1.32-15.06l0-.12L97.54,33.64a16,16,0,0,0-16.62-9.52A56.26,56.26,0,0,0,32,80c0,79.4,64.6,144,144,144a56.26,56.26,0,0,0,55.88-48.92A16,16,0,0,0,222.37,158.46ZM176,208A128.14,128.14,0,0,1,48,80,40.2,40.2,0,0,1,82.87,40a.61.61,0,0,0,0,.12l21,47L83.2,111.86a6.13,6.13,0,0,0-.57.77,16,16,0,0,0-1,15.7c9.06,18.53,27.73,37.06,46.46,46.11a16,16,0,0,0,15.75-1.14,8.44,8.44,0,0,0,.74-.56L168.89,152l47,21.05h0s.08,0,.11,0A40.21,40.21,0,0,1,176,208Z"></path></svg></span>
			<!-- /wp:html -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"ls-cta-strip__text","style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
		<div class="wp-block-group ls-cta-strip__text">
			<!-- wp:heading {"level":3,"style":{"color":{"text":"var(--wp--custom--color--text--default)"},"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"300"} -->
			<h3 class="wp-block-heading has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--default);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Prefer to talk it through first?', 'ls-theme' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Skip the planner, get a straight answer from a person.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"ls-cta-strip__cta-wrap","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-cta-strip__cta-wrap">
	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button {"className":"ls-glass-button ls-cta-strip__button","style":{"border":{"radius":"var:preset|border-radius|200","style":"solid","width":"1px"},"color":{"text":"var:custom|color|text|default"},"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|40","bottom":"var:preset|spacing|20","left":"var:preset|spacing|40"}},"typography":{"fontSize":"var:preset|font-size|200","fontWeight":"var:custom|typography|font-weight|semibold","letterSpacing":"0.08em"}}} -->
		<div class="wp-block-button ls-glass-button ls-cta-strip__button"><a class="wp-block-button__link has-text-color has-custom-font-size wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>" style="border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--200);color:var(--wp--custom--color--text--default);padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--40);font-size:var(--wp--preset--font-size--200);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:0.08em"><?php echo esc_html__( 'Book a free consultation', 'ls-theme' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

	<!-- wp:html -->
	<span class="ls-icon ls-icon--arrow-right ls-cta-strip__button-arrow" aria-hidden="true" style="position:absolute;top:50%;right:var(--wp--preset--spacing--20);transform:translateY(-50%);display:inline-flex;flex-shrink:0;width:13px;height:13px;color:var(--wp--custom--color--text--default);pointer-events:none"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" width="13" height="13" fill="currentColor"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg></span>
	<!-- /wp:html -->
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
