<?php
/**
 * Title: CTA - Split Check Card
 * Slug: ls-theme/split-cta-check-card
 * Categories: cta
 * Block Types: core/pattern
 * Description: A closing call to action: eyebrow, heading, paragraph and two buttons on the left, and on the right a bordered surface card holding a short checklist where each item has a solid filled check badge. Authored for the Solutions Landing page ("Every successful platform starts with the right solution"); edit the eyebrow, heading, paragraph, buttons and the four checklist items after inserting. Same shape as Section - Homepage Why LightSpeed, but with solid check badges and a larger card radius. The columns stack on mobile. Falls back to core/columns and core/group because no semantic core block fits a checklist card. Adapts between light and dark mode through surface, text, border and icon tokens. No new SCSS.
 * Keywords: cta, call to action, checklist, split, conversation, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_cta_checklist = array(
	__( 'Start from your business model and operational needs', 'ls-theme' ),
	__( 'Discovery maps your requirements and recommends the best-fit solution', 'ls-theme' ),
	__( 'Typical projects run eight to sixteen weeks, with a detailed timeline at scoping', 'ls-theme' ),
	__( 'Custom block themes and bespoke plugins, never page builders', 'ls-theme' ),
);
?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|60","bottom":"var:preset|spacing|100","left":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--60)">

	<!-- wp:columns {"align":"wide","verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center","width":"50%","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Start the conversation', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"700"} -->
			<h2 class="wp-block-heading has-700-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Every successful platform starts with the right solution.', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Start by considering your business model and operational needs. Our Discovery service helps map your requirements and recommend the best solution.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>"><?php echo esc_html__( 'Discuss your platform', 'ls-theme' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php echo esc_html__( 'Explore our services', 'ls-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:group {"style":{"color":{"background":"var:custom|color|surface|card"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|400","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|50","bottom":"var:preset|spacing|40","left":"var:preset|spacing|50"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"stretch"}} -->
			<div class="wp-block-group has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--400);background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--50)">
				<?php foreach ( $ls_cta_checklist as $ls_item ) : ?>
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:group {"style":{"color":{"background":"var:custom|color|icon|background"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
					<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:var(--wp--custom--color--icon--background);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
						<!-- wp:icon {"icon":"lightspeed/check","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--icon--color)"},"dimensions":{"width":"16px"}}} /-->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--default)"}},"fontSize":"200"} -->
					<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--default)"><?php echo esc_html( $ls_item ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<?php endforeach; ?>
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
