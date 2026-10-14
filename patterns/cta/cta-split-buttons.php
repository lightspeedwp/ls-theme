<?php
/**
 * Title: CTA - Split Buttons
 * Slug: ls-theme/cta-split-buttons
 * Categories: cta
 * Block Types: core/pattern
 * Description: A closing call-to-action on the page canvas: a rounded, bordered surface.card panel with an H2 and a short paragraph on the left (about 58%) and a primary button with an outline button on the right, aligned to the right edge. The columns stack on mobile, with the buttons left-aligned. No eyebrow, no checklist and no tiles, so it reads as a plain two-route prompt. Uses core/buttons and core/button for the actions and falls back to core/group and core/columns for the panel because no semantic core block fits a call-to-action band. Adapts between light and dark mode through surface, text and border tokens. Edit the heading, paragraph, button labels and links after inserting.
 * Keywords: cta, call to action, buttons, consultation, band, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"color":{"background":"var:custom|color|surface|card"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|400","style":"solid","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--400);background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">

		<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|60"}}}} -->
		<div class="wp-block-columns are-vertically-aligned-center">

			<!-- wp:column {"verticalAlignment":"center","width":"58%","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:58%">
				<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"500"} -->
				<h2 class="wp-block-heading has-500-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html__( 'Ready for a serious conversation about what comes next?', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'If the current platform needs a clearer route forward, start with a consultation. If you would rather give context first, send a brief before the call.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","width":"42%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:42%">
				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"tagName":"button","className":"pum-triggercta"} -->
					<div class="wp-block-button pum-triggercta"><button type="button" class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Book your free consultation', 'ls-theme' ); ?></button></div>
					<!-- /wp:button -->

					<!-- wp:button {"tagName":"button","className":"is-style-outline pum-triggerbrief"} -->
					<div class="wp-block-button is-style-outline pum-triggerbrief"><button type="button" class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Send a brief before we talk', 'ls-theme' ); ?></button></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
