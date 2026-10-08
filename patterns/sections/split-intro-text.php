<?php
/**
 * Title: Section - Split Intro Text
 * Slug: ls-theme/split-intro-text
 * Categories: text
 * Block Types: core/pattern
 * Description: A two-column intro section on the page canvas: dot eyebrow and H2 on the left (about 42%), and a single supporting paragraph on the right (about 58%). Falls back to core/columns because no semantic core block fits an eyebrow/heading and paragraph pair. Adapts between light and dark mode through text tokens. Edit the eyebrow, heading and paragraph after inserting.
 * Keywords: intro, split, introduction, text, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|30","bottom":"var:preset|spacing|90","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:columns {"align":"wide","verticalAlignment":"top","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-top">

		<!-- wp:column {"verticalAlignment":"top","width":"42%","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:42%">

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Intro', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"600"} -->
			<h2 class="wp-block-heading has-600-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'A single source of truth from Figma to WordPress', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"top","width":"58%"} -->
		<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:58%">
			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
			<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Traditional website builds rely on hard-coded styles that quickly become inconsistent and costly to maintain. In contrast, a token-driven design system treats every colour, spacing value and typographic rule as a reusable variable. By defining these tokens in Figma and mapping them directly to your WordPress theme, we give your team a single source of truth and eliminate guesswork between designers and developers. Editors work with locked outer wrappers and flexible inner content surfaces, so they can publish confidently without breaking layouts or brand guidelines.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
