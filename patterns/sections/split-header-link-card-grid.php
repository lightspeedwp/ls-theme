<?php
/**
 * Title: Section - Split Header Link Card Grid
 * Slug: ls-theme/split-header-link-card-grid
 * Categories: featured
 * Block Types: core/pattern
 * Description: A "related services" section on a surface.card band: a split header (dot eyebrow and H2 on the left, a short paragraph bottom-aligned on the right) above a responsive grid of six linked cards, each a Card - Service Tile with a shared icon well (ls-icon-well-brand), an H3, a short description and a "Read about ..." arrow link. The whole card is one stretched link (the tile style supplies the focus ring and hover border). The grid is a core/group with the grid layout and a minimum column width, so any number of cards wraps cleanly to 3, 2 or 1 per row; duplicate or delete a card freely. Rows share one height and titles and descriptions clamp with an ellipsis through the shared ls-icon-card-grid classes (src/scss/structural/split-header-icon-card-grid.scss). Falls back to core/group and core/columns because no semantic core block fits a linked card grid. Cards use surface.canvas. Adapts between light and dark through surface, text and border tokens. Edit the eyebrow, heading, paragraph, icons, copy and links after inserting.
 * Keywords: related, services, links, cards, icons, grid, solutions, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_link_cards = array(
	array(
		'icon'        => 'search',
		'title'       => __( 'Discovery', 'ls-theme' ),
		'description' => __( 'Align stakeholders and identify requirements before building the system.', 'ls-theme' ),
		'link_label'  => __( 'Read about discovery', 'ls-theme' ),
		'url'         => '/services/discovery/',
	),
	array(
		'icon'        => 'paint-brush',
		'title'       => __( 'Design', 'ls-theme' ),
		'description' => __( 'Create the visual language, component kit and interactive prototypes.', 'ls-theme' ),
		'link_label'  => __( 'Read about design', 'ls-theme' ),
		'url'         => '/services/design/',
	),
	array(
		'icon'        => 'code',
		'title'       => __( 'Development', 'ls-theme' ),
		'description' => __( 'Implement the theme.json, block patterns and custom components in WordPress.', 'ls-theme' ),
		'link_label'  => __( 'Read about development', 'ls-theme' ),
		'url'         => '/services/development/',
	),
	array(
		'icon'        => 'shield',
		'title'       => __( 'Accessibility', 'ls-theme' ),
		'description' => __( 'Audit and remediate to meet WCAG standards across all patterns.', 'ls-theme' ),
		'link_label'  => __( 'Read about accessibility', 'ls-theme' ),
		'url'         => '/services/accessibility/',
	),
	array(
		'icon'        => 'book',
		'title'       => __( 'Training', 'ls-theme' ),
		'description' => __( 'Enable your team to use the design system confidently and maintain it over time.', 'ls-theme' ),
		'link_label'  => __( 'Read about training', 'ls-theme' ),
		'url'         => '/services/training/',
	),
	array(
		'icon'        => 'help',
		'title'       => __( 'Support & Grow', 'ls-theme' ),
		'description' => __( 'Ongoing optimisation, token updates and pattern evolution.', 'ls-theme' ),
		'link_label'  => __( 'Read about support & grow', 'ls-theme' ),
		'url'         => '/services/support/',
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
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Related services', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"600"} -->
				<h2 class="wp-block-heading has-600-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Complementary services that support this solution.', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"bottom"} -->
			<div class="wp-block-column is-vertically-aligned-bottom">
				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Six services that sit alongside a design-system engagement, from discovery through to ongoing support.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:group {"className":"ls-icon-card-grid","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"grid","minimumColumnWidth":"22rem"}} -->
		<div class="wp-block-group ls-icon-card-grid">

			<?php foreach ( $ls_link_cards as $ls_link_card ) : ?>
			<!-- wp:group {"tagName":"article","className":"is-style-card-service-tile ls-icon-card","style":{"color":{"background":"var:custom|color|surface|canvas"},"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-service-tile ls-icon-card has-background" style="background-color:var(--wp--custom--color--surface--canvas);min-height:100%">
				<!-- wp:group {"className":"ls-icon-well-brand"} -->
				<div class="wp-block-group ls-icon-well-brand">
					<!-- wp:icon {"icon":"lightspeed/<?php echo esc_attr( $ls_link_card['icon'] ); ?>","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"20px"}}} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"ls-card-service-tile__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<div class="wp-block-group ls-card-service-tile__content">
					<!-- wp:heading {"level":3,"className":"ls-icon-card__title","style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"300"} -->
					<h3 class="wp-block-heading ls-icon-card__title has-300-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html( $ls_link_card['title'] ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"className":"ls-icon-card__text","style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
					<p class="ls-icon-card__text has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_link_card['description'] ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"className":"is-style-link-arrow-accent","fontSize":"200"} -->
				<p class="is-style-link-arrow-accent has-200-font-size"><a class="ls-card-service-tile__link" href="<?php echo esc_url( home_url( $ls_link_card['url'] ) ); ?>"><?php echo esc_html( $ls_link_card['link_label'] ); ?></a></p>
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
