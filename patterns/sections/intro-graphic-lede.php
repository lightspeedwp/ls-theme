<?php
/**
 * Title: Section - Intro Graphic Lede
 * Slug: ls-theme/intro-graphic-lede
 * Categories: featured
 * Block Types: core/pattern
 * Description: An intro section on a surface.card band: an H2, then a decorative graphic on the left (about 40%, an empty group masked with a three-person network shape and filled with the brand text token, so it follows light and dark mode, hidden from assistive tech) beside a lede paragraph on the right (about 60%, capped to a readable measure). The columns stack on mobile. Falls back to core/group and core/columns because no semantic core block fits a graphic beside a lede; the mask is styled in SCSS because core has no block for a masked shape.
 * Keywords: intro, lede, graphic, referral, split
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-referral-intro","style":{"color":{"background":"var:custom|color|surface|card"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|30","bottom":"var:preset|spacing|80","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-referral-intro has-background" style="background-color:var(--wp--custom--color--surface--card);margin-top:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"600"} -->
		<h2 class="wp-block-heading has-600-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'We love our clients and our partners!', 'ls-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|80"}}}} -->
		<div class="wp-block-columns are-vertically-aligned-center">

			<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
				<!-- wp:group {"className":"ls-referral-network","layout":{"type":"default"}} -->
				<div class="wp-block-group ls-referral-network"></div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%">
				<!-- wp:group {"layout":{"type":"constrained","contentSize":"640px","justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"fontSize":"300"} -->
					<p class="has-300-font-size"><?php echo esc_html__( 'Do you know anyone who needs our expertise with their website? Refer us to your contacts, and if we get the nod, you will receive 10% of the total project value (up to max R10000) as our thank you to you!', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
