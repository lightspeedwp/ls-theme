<?php
/**
 * Title: Hero - Split Form
 * Slug: ls-theme/hero-split-form
 * Categories: hero
 * Block Types: core/pattern
 * Description: A split hero for enquiry pages: breadcrumb trail, dot eyebrow, H1, lede paragraph and primary and outline buttons on the left (about 58%), and a bordered surface.card form card on the right (about 42%) with an H2 and the Gravity Forms block. Same shape as Hero - Split At a Glance with Support Line, without the support line and with a form card in place of the snapshot card. The form slot only renders the Gravity Forms block when Gravity Forms is active (form ID 2 is the Contact Form on DEV); otherwise it shows a short placeholder line. Uses the shared corner-glow class for the background. Falls back to core/group and core/columns (plus Yoast breadcrumbs) because no semantic core block fits a form card. Adapts between light and dark mode through surface, text and border tokens. Edit the eyebrow, heading, lede, buttons and form heading after inserting.
 * Keywords: hero, split, form, contact, enquiry, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-corner-glow","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|30","bottom":"var:preset|spacing|80","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-corner-glow" style="margin-top:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
		<!-- wp:yoast-seo/breadcrumbs {"className":"alignwide"} /-->
		<?php endif; ?>

		<!-- wp:columns {"align":"wide","verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-center">

			<!-- wp:column {"verticalAlignment":"center","width":"58%","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:58%">

				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Contact', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":1,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"700"} -->
				<h1 class="wp-block-heading has-700-font-size" style="font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Talk to LightSpeed about your WordPress platform', 'ls-theme' ); ?></h1>
				<!-- /wp:heading -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
					<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Tell us what you are trying to improve, rebuild, migrate or launch. We will help you route the conversation to the right service, solution or next step.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button {"tagName":"button","className":"pum-triggercta"} -->
					<div class="wp-block-button pum-triggercta"><button type="button" class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Book a consultation', 'ls-theme' ); ?></button></div>
					<!-- /wp:button -->

					<!-- wp:button {"className":"is-style-outline"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#contact-form"><?php echo esc_html__( 'Send an enquiry', 'ls-theme' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","width":"42%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:42%">
				<!-- wp:group {"tagName":"aside","anchor":"contact-form","style":{"color":{"background":"var:custom|color|surface|card"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|400","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}}},"layout":{"type":"default"}} -->
				<aside id="contact-form" class="wp-block-group has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--400);background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">

					<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"300"} -->
					<h2 class="wp-block-heading has-300-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Send an enquiry', 'ls-theme' ); ?></h2>
					<!-- /wp:heading -->

					<?php if ( class_exists( 'GFForms' ) ) : ?>
					<!-- wp:gravityforms/form {"formId":"2","title":false,"description":false} /-->
					<?php else : ?>
					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
					<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'The contact form appears here once Gravity Forms is active.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
					<?php endif; ?>
				</aside>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
