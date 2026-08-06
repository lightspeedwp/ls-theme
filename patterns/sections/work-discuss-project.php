<?php
/**
 * Title: Section - Work Discuss Project
 * Slug: ls-theme/work-discuss-project
 * Categories: cta
 * Block Types: core/pattern
 * Description: The Work archive's consultation CTA: eyebrow badge, heading, description, and two buttons on the left; the Work Discuss Project List checklist card on the right. Adapts between light and dark mode using existing semantic tokens.
 * Keywords: work, cta, consultation, checklist, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"wide","tagName":"section","className":"is-style-content-band-alt","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignwide is-style-content-band-alt">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:columns {"align":"wide","verticalAlignment":"center","style":{"spacing":{"blockGap":"var:preset|spacing|60"}}} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-center" style="--wp--style--block-gap:var(--wp--preset--spacing--60)">

			<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">

				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:outermost/icon-block {"iconName":"","width":"8px","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--icon--background)"}}} -->
					<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--icon--background);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
					<!-- /wp:outermost/icon-block -->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.4px","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:1.4px;text-transform:uppercase"><?php echo esc_html__( 'Ready to discuss a project?', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"500"} -->
				<h2 class="wp-block-heading has-500-font-size" style="margin-top:var(--wp--preset--spacing--20);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( "Tell us about the platform you're building — or the one you need to fix.", 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted);margin-top:var(--wp--preset--spacing--20)"><?php echo esc_html__( "We reply within a working day. If we're not the right fit, we'll say so and point you somewhere better.", 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)">
					<!-- wp:button {"className":"is-style-button-secondary"} -->
					<div class="wp-block-button is-style-button-secondary"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>"><?php echo esc_html__( 'Book a consultation →', 'ls-theme' ); ?></a></div>
					<!-- /wp:button -->

					<!-- wp:button {"className":"is-style-button-secondary-outline"} -->
					<div class="wp-block-button is-style-button-secondary-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php echo esc_html__( 'Send a brief first', 'ls-theme' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","width":"42%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:42%">
				<!-- wp:pattern {"slug":"ls-theme/work-discuss-project-list"} /-->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
