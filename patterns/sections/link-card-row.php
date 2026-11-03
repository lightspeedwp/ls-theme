<?php
/**
 * Title: Section - Link Card Row
 * Slug: ls-theme/link-card-row
 * Categories: featured
 * Block Types: core/pattern
 * Description: A "where to go next" section on the page canvas: a left-aligned dot eyebrow and H2, above a responsive row of five whole-card links (Card - Service Tile style, each with an icon well, H3, one line of copy and an arrow link). The grid is a core/group with the grid layout capped at five columns, so the cards wrap cleanly to 3, 2 or 1 per row on smaller screens; duplicate or delete a card freely. Authored for the About page, linking to its sibling pages (History, Team, Culture, Process and Careers). Falls back to core/group because no semantic core block renders a card. Adapts between light and dark mode through surface, text and border tokens. No new SCSS.
 * Keywords: routes, links, next, cards, related, navigation, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_route_cards = array(
	array(
		'icon'  => 'clock',
		'title' => __( 'Our story', 'ls-theme' ),
		'text'  => __( 'A timeline of delivery, open source, community and workflow change since 2003.', 'ls-theme' ),
		'label' => __( 'Read our history', 'ls-theme' ),
		'path'  => '/about/history/',
	),
	array(
		'icon'  => 'users-three',
		'title' => __( 'Team', 'ls-theme' ),
		'text'  => __( 'Who you may work with and how the team is structured.', 'ls-theme' ),
		'label' => __( 'Meet the team', 'ls-theme' ),
		'path'  => '/about/team/',
	),
	array(
		'icon'  => 'heart',
		'title' => __( 'Culture', 'ls-theme' ),
		'text'  => __( 'How a remote-first team works together in practice.', 'ls-theme' ),
		'label' => __( 'Explore our culture', 'ls-theme' ),
		'path'  => '/about/culture/',
	),
	array(
		'icon'  => 'arrows-clockwise',
		'title' => __( 'Process', 'ls-theme' ),
		'text'  => __( 'The six-stage model that reduces risk and keeps work clear.', 'ls-theme' ),
		'label' => __( 'See our process', 'ls-theme' ),
		'path'  => '/about/process/',
	),
	array(
		'icon'  => 'rocket',
		'title' => __( 'Careers', 'ls-theme' ),
		'text'  => __( 'Open roles and how we support developer upskilling.', 'ls-theme' ),
		'label' => __( 'View careers', 'ls-theme' ),
		'path'  => '/about/careers/',
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"layout":{"type":"constrained","contentSize":"760px","justifyContent":"left"}} -->
		<div class="wp-block-group">

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Where to go next', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"600"} -->
			<h2 class="wp-block-heading has-600-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Explore the rest of LightSpeed.', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":5,"minimumColumnWidth":"14rem"}} -->
		<div class="wp-block-group">
			<?php foreach ( $ls_route_cards as $ls_route_card ) : ?>

			<!-- wp:group {"tagName":"article","className":"is-style-card-service-tile","style":{"dimensions":{"minHeight":"100%"},"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-service-tile" style="min-height:100%;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:group {"className":"ls-icon-well-brand"} -->
				<div class="wp-block-group ls-icon-well-brand">
					<!-- wp:icon {"icon":"lightspeed/<?php echo esc_attr( $ls_route_card['icon'] ); ?>"} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"ls-card-service-tile__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<div class="wp-block-group ls-card-service-tile__content">
					<!-- wp:heading {"level":3,"fontSize":"300"} -->
					<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html( $ls_route_card['title'] ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var:custom|color|text|muted"}},"fontSize":"200"} -->
					<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_route_card['text'] ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"className":"is-style-link-arrow-accent"} -->
				<p class="is-style-link-arrow-accent"><a class="ls-card-service-tile__link" href="<?php echo esc_url( home_url( $ls_route_card['path'] ) ); ?>"><?php echo esc_html( $ls_route_card['label'] ); ?></a></p>
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
