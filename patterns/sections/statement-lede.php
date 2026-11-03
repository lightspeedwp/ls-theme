<?php
/**
 * Title: Section - Statement Lede
 * Slug: ls-theme/statement-lede
 * Categories: text
 * Block Types: core/pattern
 * Description: A statement section on a surface.card band: a dot eyebrow, a very large H2 statement with a brand-coloured closing phrase, and a lede paragraph beneath it, all left-aligned. The heading is capped to a narrow measure (max-width in ch, in src/scss/structural/about-careers.scss, because the heading block has no key for it) so the statement breaks onto short lines. Falls back to core/group because no semantic core block fits an eyebrow, statement and lede. Adapts between light and dark mode through surface, text and brand tokens. Authored for the About Careers page "Shape the Future" section; edit the eyebrow, heading and lede after inserting.
 * Keywords: statement, lede, intro, careers, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","style":{"color":{"background":"var:custom|color|surface|card"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-background" style="background-color:var(--wp--custom--color--surface--card);margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Shape the Future', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:heading {"level":2,"className":"ls-careers-statement","style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold","letterSpacing":"var:custom|typography|letter-spacing|tight","lineHeight":"var:custom|line-height|heading-snug"}},"fontSize":"900"} -->
		<h2 class="wp-block-heading ls-careers-statement has-900-font-size" style="font-weight:var(--wp--custom--typography--font-weight--extrabold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight);line-height:var(--wp--custom--line-height--heading-snug)"><?php echo esc_html__( 'Shape the Future of Digital Publishing and', 'ls-theme' ); ?> <span style="color:var(--wp--custom--color--text--brand)"><?php echo esc_html__( 'Ride the AI Wave.', 'ls-theme' ); ?></span></h2>
		<!-- /wp:heading -->

		<!-- wp:group {"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'At LightSpeed, we are always looking for passionate, self-motivated individuals to join our globally distributed team. As an AI-ready WordPress engineering partner, we are fundamentally transforming how websites are designed, built, and maintained. If you are excited by modern WordPress block development, token-driven design systems, and the integration of artificial intelligence, you belong here.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
