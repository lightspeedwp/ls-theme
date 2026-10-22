<?php
/**
 * Title: CTA - Dark Band Buttons
 * Slug: ls-theme/cta-dark-band-buttons
 * Categories: cta
 * Block Types: core/pattern
 * Description: A closing call-to-action band: a rounded, fixed-dark band (it stays dark in both light and dark mode) on the page canvas, with a dot eyebrow, H2, short paragraph, and a white primary button with an outline button, all in one narrow left-aligned column (capped to a 720px content size on the group's own layout). The band uses the surface.band-start token with the shared ls-corner-glow background and on-dark text and accent tokens. The primary button reuses the existing button-primary-on-dark style with an arrow, and the outline button is the shared is-style-outline with on-dark colours and no arrow tile, both through src/scss/structural/about-team.scss. Falls back to core/group because no semantic core block fits a call-to-action band. Buttons wrap on small screens. Edit the copy and button labels and links after inserting.
 * Keywords: cta, call to action, band, dark, buttons, consultation, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","className":"ls-corner-glow ls-team-cta","style":{"color":{"background":"var:custom|color|surface|band-start"},"border":{"radius":"var:preset|border-radius|400"},"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|60","bottom":"var:preset|spacing|80","left":"var:preset|spacing|60"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide ls-corner-glow ls-team-cta has-background" style="border-radius:var(--wp--preset--border-radius--400);background-color:var(--wp--custom--color--surface--band-start);padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--60)">

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
		<div class="wp-block-group">

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--on-dark-accent)"},"dimensions":{"width":"8px"}}} /-->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--on-dark-accent)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--on-dark-accent);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Work with us', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":2,"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"},"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"600"} -->
			<h2 class="wp-block-heading has-text-color has-600-font-size" style="color:var(--wp--custom--color--text--on-dark);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Want to work with a team that thinks together?', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--on-dark-muted)"><?php echo esc_html__( 'Start a conversation, explore our culture, or see how we work.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)">
				<!-- wp:button {"className":"is-style-button-primary-on-dark"} -->
				<div class="wp-block-button is-style-button-primary-on-dark"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>"><?php echo esc_html__( 'Book a consultation', 'ls-theme' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline ls-team-ghost-button","style":{"color":{"text":"var(--wp--custom--color--text--on-dark)","background":"transparent"},"border":{"color":"color-mix(in srgb, var(--wp--custom--color--text--on-dark) 38%, transparent)","width":"1px","style":"solid","radius":"var:preset|border-radius|500"}},"fontSize":"200"} -->
				<div class="wp-block-button is-style-outline ls-team-ghost-button"><a class="wp-block-button__link has-text-color has-background has-border-color has-200-font-size has-custom-font-size wp-element-button" href="<?php echo esc_url( home_url( '/work/' ) ); ?>" style="border-color:color-mix(in srgb, var(--wp--custom--color--text--on-dark) 38%, transparent);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--500);color:var(--wp--custom--color--text--on-dark);background-color:transparent"><?php echo esc_html__( 'Explore related work', 'ls-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
