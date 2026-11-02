<?php
/**
 * Title: Section - Popup Form Shell
 * Slug: ls-theme/popup-form-shell
 * Categories: featured
 * Block Types: core/pattern
 * Description: The content of a Popup Maker popup that holds a Gravity Forms form: a Card - Plain group with token padding, a centred H2, a one-line intro and the Gravity Forms block (set to the Orbital theme so the theme's form variables apply). Paste it into the popup editor, then change the heading, the intro and the form ID in the block sidebar (the form ID is set to 4, the Free Consultation form). Use it with the Popup Maker "Content Only" theme, which has no background of its own. The card scrolls inside the popup when the form is tall, and the form colours, sizes and spacing come from src/scss/structural/gravity-forms-popup.scss. Falls back to core/group because no semantic core block renders a card. The card sits on the raised surface.card token, not the canvas, so it stays distinct from the page in dark mode, and the fields (canvas surface) read as inset. Adapts between light and dark mode through surface, text and border tokens.
 * Keywords: popup, modal, form, gravity forms, consultation, brief, shell, section
 * Viewport Width: 640
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"className":"is-style-card-plain ls-popup-form","style":{"color":{"background":"var:custom|color|surface|card"},"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group is-style-card-plain ls-popup-form has-background" style="background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
	<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"600"} -->
	<h2 class="wp-block-heading has-text-align-center has-600-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html__( 'Free consultation', 'ls-theme' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
	<p class="has-text-align-center has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Book a 20-30 minute consultation below and take the first step towards tailored success.', 'ls-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:gravityforms/form {"formId":"4","title":false,"description":false,"theme":"orbital"} /-->
</div>
<!-- /wp:group -->
