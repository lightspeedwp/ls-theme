<?php
/**
 * Title: CTA - Split Tile Band
 * Slug: ls-theme/split-cta-tile-band
 * Categories: cta
 * Block Types: core/pattern
 * Description: A closing call-to-action band for the Solutions pages: a rounded, fixed-dark band (it stays dark in both light and dark mode) on the page canvas, with a dot eyebrow, H2, short paragraph, a white primary button and an "or see our work" arrow link on the left (about 57%), and three reassurance tiles with check, chat and star Icon blocks on the right (about 43%). The band uses the surface.band-start token with the shared ls-corner-glow background, on-dark text and accent tokens, and glass tile tokens, with one small button rule in src/scss/structural/cta-buttons.scss for the white fill. Falls back to core/group and core/columns because no semantic core block fits a tiled call to action. Columns stack on mobile. Edit the eyebrow, heading, paragraph, button, link and tiles after inserting.
 * Keywords: cta, call to action, consultation, band, tiles, solutions, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_cta_tiles = array(
	array(
		'icon'  => 'check',
		'label' => __( 'Token library and theme.json delivered', 'ls-theme' ),
	),
	array(
		'icon'  => 'chat',
		'label' => __( 'Start with a design-system audit', 'ls-theme' ),
	),
	array(
		'icon'  => 'star',
		'label' => __( '230 design tokens managed', 'ls-theme' ),
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","className":"ls-corner-glow","style":{"color":{"background":"var:custom|color|surface|band-start"},"border":{"radius":"var:preset|border-radius|400"},"spacing":{"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|90","bottom":"var:preset|spacing|100","left":"var:preset|spacing|90"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide ls-corner-glow has-background" style="border-radius:var(--wp--preset--border-radius--400);background-color:var(--wp--custom--color--surface--band-start);padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--90);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--90)">

		<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|60","left":"var:preset|spacing|90"}}}} -->
		<div class="wp-block-columns are-vertically-aligned-center">

			<!-- wp:column {"verticalAlignment":"center","width":"57%","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:57%">

				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--on-dark-accent)"},"dimensions":{"width":"8px"}}} /-->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--on-dark-accent)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--on-dark-accent);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Free consultation', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":2,"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"},"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"600"} -->
				<h2 class="wp-block-heading has-text-color has-600-font-size" style="color:var(--wp--custom--color--text--on-dark);font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Ready to stop managing individual pages and start managing a system?', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"200"} -->
				<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark-muted)"><?php echo esc_html__( 'Book a design-system audit today to discover how token-driven governance can transform your digital presence.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:buttons -->
					<div class="wp-block-buttons">
						<!-- wp:button {"className":"ls-cta-tile-band__button","style":{"border":{"radius":"var:preset|border-radius|500"}},"fontSize":"200"} -->
						<div class="wp-block-button ls-cta-tile-band__button"><a class="wp-block-button__link has-custom-font-size has-200-font-size wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>" style="border-radius:var(--wp--preset--border-radius--500)"><?php echo esc_html__( 'Book a design-system audit', 'ls-theme' ); ?></a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->

					<!-- wp:paragraph {"className":"is-style-link-arrow-accent","fontSize":"200"} -->
					<p class="is-style-link-arrow-accent has-200-font-size"><a href="<?php echo esc_url( home_url( '/work/' ) ); ?>" style="color:var(--wp--custom--color--text--on-dark-accent)"><?php echo esc_html__( 'or see our work', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","width":"43%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:43%">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"default"}} -->
				<div class="wp-block-group">
					<?php foreach ( $ls_cta_tiles as $ls_cta_tile ) : ?>
					<!-- wp:group {"style":{"color":{"background":"var:custom|color|surface|glass-lighter"},"border":{"color":"var:custom|color|surface|glass","radius":"var:preset|border-radius|300","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|30","bottom":"var:preset|spacing|20","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
					<div class="wp-block-group has-border-color has-background" style="border-color:var(--wp--custom--color--surface--glass);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--300);background-color:var(--wp--custom--color--surface--glass-lighter);padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--30)">
						<!-- wp:icon {"icon":"lightspeed/<?php echo esc_attr( $ls_cta_tile['icon'] ); ?>","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--on-dark-accent)"},"dimensions":{"width":"20px"}}} /-->

						<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"},"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"200"} -->
						<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark);font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html( $ls_cta_tile['label'] ); ?></p>
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
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
