<?php
/**
 * Title: Section - Split Header Labelled Card Row
 * Slug: ls-theme/split-header-labelled-card-row
 * Categories: featured
 * Block Types: core/pattern
 * Description: A "products" section on a surface.card band: a split header (dot eyebrow and H2 on the left, a short paragraph bottom-aligned on the right) above a responsive four-column grid of bordered cards, each a mono accent kicker label, an H3 name and a short description. The grid is a core/group with the grid layout capped at four columns, so the cards wrap cleanly to 2 or 1 per row on smaller screens. Same card shape as Section - Labelled Card Trio, on canvas-surface cards. Authored for the About page "Products and platforms" section. Falls back to core/group and core/columns because no semantic core block fits a labelled product card. Adapts between light and dark mode through surface, text and border tokens. No new SCSS.
 * Keywords: products, platforms, open source, cards, labelled, kicker, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_product_cards = array(
	array(
		'kicker'      => __( 'Block theme', 'ls-theme' ),
		'title'       => __( 'LSX Design', 'ls-theme' ),
		'description' => __( 'A Full Site Editing block theme, reviewed and approved on WordPress.org in July 2023 and backed by a public design system.', 'ls-theme' ),
	),
	array(
		'kicker'      => __( 'Plugin · Travel', 'ls-theme' ),
		'title'       => __( 'Tour Operator', 'ls-theme' ),
		'description' => __( 'A block-based plugin for travel sites with Wetu integration, dynamic templates, query loops and custom post types. Version 2.0 launched in 2025.', 'ls-theme' ),
	),
	array(
		'kicker'      => __( 'Plugin · Partner', 'ls-theme' ),
		'title'       => __( 'Wetu Content Importer', 'ls-theme' ),
		'description' => __( "Brings Wetu itinerary content into WordPress. Wetu sponsored its development in 2025, LightSpeed's first externally sponsored open-source initiative.", 'ls-theme' ),
	),
	array(
		'kicker'      => __( 'Design system', 'ls-theme' ),
		'title'       => __( 'Tour Operator Design System', 'ls-theme' ),
		'description' => __( 'A Figma design system published in 2024 alongside the rebuilt Tour Operator plugin, treating design systems as working infrastructure.', 'ls-theme' ),
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"color":{"background":"var:custom|color|surface|card"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-background" style="background-color:var(--wp--custom--color--surface--card);margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:columns {"verticalAlignment":"bottom","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|90"}}}} -->
		<div class="wp-block-columns are-vertically-aligned-bottom">

			<!-- wp:column {"verticalAlignment":"bottom","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
			<div class="wp-block-column is-vertically-aligned-bottom">

				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Products and platforms', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"600"} -->
				<h2 class="wp-block-heading has-600-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Open-source products with a long lineage.', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"bottom"} -->
			<div class="wp-block-column is-vertically-aligned-bottom">
				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Open-source work from the early LSX themes through to block themes, Figma design systems and the Tour Operator plugin keeps us close to how WordPress actually evolves.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"14rem"}} -->
		<div class="wp-block-group">

			<?php foreach ( $ls_product_cards as $ls_product_card ) : ?>
			<!-- wp:group {"tagName":"article","style":{"color":{"background":"var:custom|color|surface|canvas"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|300","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left","flexWrap":"nowrap"}} -->
			<article class="wp-block-group has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--300);background-color:var(--wp--custom--color--surface--canvas);padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wide","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var:custom|color|text|brand"}},"fontSize":"200"} -->
				<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--wide);text-transform:uppercase"><?php echo esc_html( $ls_product_card['kicker'] ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"300"} -->
				<h3 class="wp-block-heading has-300-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html( $ls_product_card['title'] ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
				<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_product_card['description'] ); ?></p>
				<!-- /wp:paragraph -->
			</article>
			<!-- /wp:group -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
