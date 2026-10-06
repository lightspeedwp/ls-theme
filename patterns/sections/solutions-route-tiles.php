<?php
/**
 * Title: Section - Solutions Route Tiles
 * Slug: ls-theme/solutions-route-tiles
 * Categories: featured
 * Block Types: core/pattern
 * Description: The Solutions landing page "solution selector" section: eyebrow and heading with the selector intro beside it, above a responsive grid of seven Card - Route Tile cards (WordPress, WooCommerce, Publishing, Tour Operators, AI, Design Systems, AI Chatbots), each a single stretched link to its solution page. The grid is a core/group with the grid layout and a minimum column width, so any number of tiles wraps cleanly to 3, 2 or 1 per row — duplicate or delete a tile. Uses the existing Card - Service Tile style, so no new SCSS. The tile markup mirrors Card - Route Tile; keep the two in step.
 * Keywords: solutions, selector, routes, tiles, grid, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_route_tiles = array(
	array(
		'label'       => __( 'WordPress', 'ls-theme' ),
		'kicker'      => __( 'Block-theme architecture', 'ls-theme' ),
		'description' => __( 'Custom block-theme architectures and integrations for content-rich business sites.', 'ls-theme' ),
		'url'         => '/solutions/wordpress/',
		'icon'        => 'list-bullets',
	),
	array(
		'label'       => __( 'WooCommerce', 'ls-theme' ),
		'kicker'      => __( 'Scalable commerce', 'ls-theme' ),
		'description' => __( 'Scalable ecommerce platforms with bespoke plugins, payment gateways and subscription models.', 'ls-theme' ),
		'url'         => '/solutions/woocommerce/',
		'icon'        => 'cart',
	),
	array(
		'label'       => __( 'Publishing', 'ls-theme' ),
		'kicker'      => __( 'Editorial scale', 'ls-theme' ),
		'description' => __( 'High-traffic publishing systems with editorial workflows, monetisation and large-scale migrations.', 'ls-theme' ),
		'url'         => '/solutions/publishing/',
		'icon'        => 'newspaper',
	),
	array(
		'label'       => __( 'Tour Operators', 'ls-theme' ),
		'kicker'      => __( 'Travel-ready platforms', 'ls-theme' ),
		'description' => __( 'Travel-ready ecosystems with LSX Tour Operator, Wetu integration, multilingual support and booking flows.', 'ls-theme' ),
		'url'         => '/solutions/tour-operators/',
		'icon'        => 'destination',
	),
	array(
		'label'       => __( 'AI', 'ls-theme' ),
		'kicker'      => __( 'AI-first, governed', 'ls-theme' ),
		'description' => __( 'AI-first solutions covering content generation, search visibility, chatbots, analytics and governance.', 'ls-theme' ),
		'url'         => '/solutions/ai/',
		'icon'        => 'sparkle',
	),
	array(
		'label'       => __( 'Design Systems', 'ls-theme' ),
		'kicker'      => __( 'Design-to-dev parity', 'ls-theme' ),
		'description' => __( 'Token-driven design and governance frameworks that ensure design-to-dev parity across sites.', 'ls-theme' ),
		'url'         => '/solutions/design-systems/',
		'icon'        => 'stack',
	),
	array(
		'label'       => __( 'AI Chatbots', 'ls-theme' ),
		'kicker'      => __( 'Bounded and governed', 'ls-theme' ),
		'description' => __( 'Chatbots grounded in approved content, with clear governance and escalation routes, as part of our AI solution.', 'ls-theme' ),
		'url'         => '/solutions/ai-chatbots/',
		'icon'        => 'chat-circle-dots',
	),
);

/**
 * Renders one route tile. A local closure (not a top-level function) since this file can be
 * included more than once per request via pattern registration/re-registration.
 *
 * @param array $ls_tile  Tile data from $ls_route_tiles.
 * @param int   $ls_index Human-facing 1-based index shown in the card corner.
 */
$ls_render_route_tile = function ( $ls_tile, $ls_index ) {
	$ls_read_link_text = sprintf(
		/* translators: %s: solution name. */
		__( 'Read about %s', 'ls-theme' ),
		$ls_tile['label']
	);
	?>

	<!-- wp:group {"tagName":"article","className":"is-style-card-service-tile","style":{"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
	<article class="wp-block-group is-style-card-service-tile" style="min-height:100%">
		<!-- wp:group {"className":"ls-icon-well-brand"} -->
		<div class="wp-block-group ls-icon-well-brand">
			<!-- wp:icon {"icon":"lightspeed/<?php echo esc_attr( $ls_tile['icon'] ); ?>","style":{"dimensions":{"width":"18px"}}} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"className":"ls-card-service-tile__index","style":{"typography":{"fontFamily":"var:preset|font-family|monospace","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"var:custom|color|text|subtle"}},"fontSize":"200"} -->
		<p class="has-text-color has-200-font-size ls-card-service-tile__index" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);letter-spacing:var(--wp--custom--typography--letter-spacing--wide)"><?php echo esc_html( sprintf( '%02d', $ls_index ) ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"className":"ls-card-service-tile__content","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
		<div class="wp-block-group ls-card-service-tile__content" style="margin-top:var(--wp--preset--spacing--20)">
			<!-- wp:heading {"level":3,"fontSize":"300"} -->
			<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html( $ls_tile['label'] ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"var:custom|color|text|brand"}},"fontSize":"200"} -->
			<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--monospace);letter-spacing:var(--wp--custom--typography--letter-spacing--wide);text-transform:uppercase"><?php echo esc_html( $ls_tile['kicker'] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"color":{"text":"var:custom|color|text|muted"}}} -->
			<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_tile['description'] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"className":"is-style-link-arrow-accent","style":{"spacing":{"margin":{"top":"auto"}}}} -->
		<p class="is-style-link-arrow-accent" style="margin-top:auto"><a class="ls-card-service-tile__link" href="<?php echo esc_url( home_url( $ls_tile['url'] ) ); ?>"><?php echo esc_html( $ls_read_link_text ); ?></a></p>
		<!-- /wp:paragraph -->
	</article>
	<!-- /wp:group -->
	<?php
};
?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|60","bottom":"var:preset|spacing|100","left":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--60)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:columns {"align":"wide","verticalAlignment":"bottom"} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-bottom">

			<!-- wp:column {"verticalAlignment":"bottom","width":"48%"} -->
			<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:48%">
				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"200"} -->
					<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Solution selector', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"700"} -->
				<h2 class="wp-block-heading has-700-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Choose the solution built for your organisation.', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"bottom","width":"52%"} -->
			<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:52%">
				<!-- wp:group {"layout":{"type":"constrained","contentSize":"576px","justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
					<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Choose the solution designed for your type of organisation. Each link opens a detailed page describing outcomes, proof points, deliverables and AI readiness.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"grid","minimumColumnWidth":"22rem"}} -->
		<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--60)">
			<?php foreach ( $ls_route_tiles as $ls_tile_index => $ls_tile ) : ?>
				<?php $ls_render_route_tile( $ls_tile, $ls_tile_index + 1 ); ?>
			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
