<?php
/**
 * Title: Section - Split Intro Form Panel
 * Slug: ls-theme/split-intro-form-panel
 * Categories: featured
 * Block Types: core/pattern
 * Description: A form section on a surface.card band, laid out like the Contact page: an H2 and a supporting paragraph on the left (about 55%, no background, sticky on desktop so it stays in view while the taller form scrolls, through the shared ls-hero-form-intro class) and, on the right (about 45%), a bordered surface.canvas card holding only the Gravity Forms block. The form ID is looked up by the form title ("Referral") so the pattern works on every site, falling back to ID 5, and the card carries the referral-form anchor that the form styles are scoped to (the Orbital theme is set so the theme form variables apply). The columns stack on mobile. Falls back to core/group and core/columns because no semantic core block fits an intro beside a form card.
 * Keywords: form, card, referral, gravity forms, partner, contact
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_referral_form_id = 5;

if ( class_exists( 'GFAPI' ) ) {
	foreach ( (array) GFAPI::get_forms() as $ls_referral_form ) {
		if ( isset( $ls_referral_form['title'], $ls_referral_form['id'] ) && 'Referral' === $ls_referral_form['title'] ) {
			$ls_referral_form_id = absint( $ls_referral_form['id'] );
			break;
		}
	}
}

$ls_referral_form_attrs = array(
	'formId'      => (string) $ls_referral_form_id,
	'title'       => false,
	'description' => false,
	'theme'       => 'orbital',
);
?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-referral-form-section","style":{"color":{"background":"var:custom|color|surface|card"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|30","bottom":"var:preset|spacing|80","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-referral-form-section has-background" style="background-color:var(--wp--custom--color--surface--card);margin-top:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:columns {"align":"wide","verticalAlignment":"top","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|90"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-top">

		<!-- wp:column {"verticalAlignment":"top","width":"55%","className":"ls-hero-form-intro","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
		<div class="wp-block-column is-vertically-aligned-top ls-hero-form-intro" style="flex-basis:55%">

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"600"} -->
			<h2 class="wp-block-heading has-600-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Partner with us', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:group {"layout":{"type":"constrained","contentSize":"560px","justifyContent":"left"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Our commitment is to develop strong relationships along with brilliant websites. Send us your referrals and get paid!', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"top","width":"45%"} -->
		<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:45%">
			<!-- wp:group {"tagName":"aside","anchor":"referral-form","className":"ls-referral-form-card","style":{"color":{"background":"var:custom|color|surface|canvas"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|400","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}}},"layout":{"type":"default"}} -->
			<aside id="referral-form" class="wp-block-group ls-referral-form-card has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--400);background-color:var(--wp--custom--color--surface--canvas);padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
				<!-- wp:gravityforms/form <?php echo wp_json_encode( $ls_referral_form_attrs, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS ); ?> /-->
			</aside>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
