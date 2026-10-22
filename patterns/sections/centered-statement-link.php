<?php
/**
 * Title: Section - Centered Statement Link
 * Slug: ls-theme/centered-statement-link
 * Categories: text
 * Block Types: core/pattern
 * Description: A centred statement section on the page canvas: a centred dot-eyebrow H2 (the heading itself carries the eyebrow styling, so the page keeps a real heading) above one large statement paragraph in the heading font, set to a narrow measure, with an inline link at the end. Falls back to core/group because no semantic core block fits a centred statement. Adapts between light and dark mode through surface, text and link tokens. Authored for the About Careers page "Open source still matters here" section; edit the heading, statement and link after inserting.
 * Keywords: statement, centered, link, open source, careers, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_statement_html = sprintf(
	/* translators: %s: link to the LightSpeedWP GitHub organisation. */
	__( 'LightSpeed’s public profile shows an ongoing relationship with the WordPress ecosystem through themes, plugins, translations, WordCamp involvement and open-source product work. That is part of the environment you are joining. %s', 'ls-theme' ),
	'<a href="' . esc_url( 'https://github.com/lightspeedwp' ) . '">' . esc_html__( 'View our work on GitHub', 'ls-theme' ) . '</a>'
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"color":{"background":"var:custom|color|surface|canvas"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-background" style="background-color:var(--wp--custom--color--surface--canvas);margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"920px"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

			<!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
			<h2 class="wp-block-heading has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Open source still matters here', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|semibold","lineHeight":"var:custom|line-height|heading-loose"}},"fontSize":"500"} -->
		<p class="has-text-align-center has-500-font-size" style="font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--semibold);line-height:var(--wp--custom--line-height--heading-loose)"><?php echo wp_kses( $ls_statement_html, array( 'a' => array( 'href' => array() ) ) ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
