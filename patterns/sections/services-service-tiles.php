<?php
/**
 * Title: Section - Services Service Tiles
 * Slug: ls-theme/services-service-tiles
 * Categories: featured
 * Block Types: core/pattern
 * Description: The Services page's "Fourteen services. One delivery model." section: eyebrow/heading/intro pair and a 14-card bento grid (Discovery through AI), each card a single stretched link to its individual service page, with an icon well, index number, kicker line and description.
 * Keywords: services, bento, grid, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_service_tiles = array(
	array(
		'label'       => __( 'Discovery', 'ls-theme' ),
		'kicker'      => __( 'Strategy, research and technical clarity', 'ls-theme' ),
		'description' => __( 'Stakeholder workshops, audits, scoping and feasibility — the evidence layer that comes before design or build.', 'ls-theme' ),
		'url'         => '/services/discovery/',
		'icon'        => 'search',
	),
	array(
		'label'       => __( 'Content', 'ls-theme' ),
		'kicker'      => __( 'Structure, taxonomy, governance', 'ls-theme' ),
		'description' => __( 'Content modelling, editorial workflow and governance that holds up at scale.', 'ls-theme' ),
		'url'         => '/services/content/',
		'icon'        => 'file-text',
	),
	array(
		'label'       => __( 'Design', 'ls-theme' ),
		'kicker'      => __( 'Systems, patterns, accessibility', 'ls-theme' ),
		'description' => __( 'Design systems, accessible patterns and Figma→WordPress parity. Already a deeper page.', 'ls-theme' ),
		'url'         => '/services/design/',
		'icon'        => 'paint-brush',
	),
	array(
		'label'       => __( 'Development', 'ls-theme' ),
		'kicker'      => __( 'Maintainable WordPress engineering', 'ls-theme' ),
		'description' => __( 'Block themes, WooCommerce, integrations and platform refactors built for long-term health.', 'ls-theme' ),
		'url'         => '/services/development/',
		'icon'        => 'code',
	),
	array(
		'label'       => __( 'Migrations', 'ls-theme' ),
		'kicker'      => __( 'Move platforms with control', 'ls-theme' ),
		'description' => __( 'Audits, mapping and redirects that take legacy platforms apart without losing traction.', 'ls-theme' ),
		'url'         => '/services/migrations/',
		'icon'        => 'arrows-left-right',
	),
	array(
		'label'       => __( 'Hosting', 'ls-theme' ),
		'kicker'      => __( 'Aligned environments', 'ls-theme' ),
		'description' => __( 'Managed environments that match the platform, the workflows and the support model around it.', 'ls-theme' ),
		'url'         => '/services/hosting/',
		'icon'        => 'cloud',
	),
	array(
		'label'       => __( 'Performance', 'ls-theme' ),
		'kicker'      => __( 'Speed, Vitals, stability', 'ls-theme' ),
		'description' => __( 'Core Web Vitals, caching, query review and template optimisation against real production data.', 'ls-theme' ),
		'url'         => '/services/performance/',
		'icon'        => 'gauge',
	),
	array(
		'label'       => __( 'Security', 'ls-theme' ),
		'kicker'      => __( 'Hardening, monitoring, recovery', 'ls-theme' ),
		'description' => __( 'Audits, hardening guidance, monitoring and recovery planning that reduces risk before incidents.', 'ls-theme' ),
		'url'         => '/services/security/',
		'icon'        => 'shield',
	),
	array(
		'label'       => __( 'Training', 'ls-theme' ),
		'kicker'      => __( 'Confidence and adoption', 'ls-theme' ),
		'description' => __( 'Role-specific training and reference materials that move teams from dependency to confidence.', 'ls-theme' ),
		'url'         => '/services/training/',
		'icon'        => 'graduation-cap',
	),
	array(
		'label'       => __( 'Support', 'ls-theme' ),
		'kicker'      => __( 'Maintenance and continuity', 'ls-theme' ),
		'description' => __( 'Maintenance, incident response and quiet improvement so platforms keep getting easier to run.', 'ls-theme' ),
		'url'         => '/services/support/',
		'icon'        => 'lifebuoy',
	),
	array(
		'label'       => __( 'SEO', 'ls-theme' ),
		'kicker'      => __( 'Structural, technical, content', 'ls-theme' ),
		'description' => __( 'Technical SEO, internal linking, schema and the publishing discipline that supports visibility.', 'ls-theme' ),
		'url'         => '/services/seo/',
		'icon'        => 'chart-line-up',
	),
	array(
		'label'       => __( 'Accessibility', 'ls-theme' ),
		'kicker'      => __( 'Usable for more people, by design', 'ls-theme' ),
		'description' => __( 'Audits, remediation and the semantic structure that helps WCAG 2.2 AA stick over time.', 'ls-theme' ),
		'url'         => '/services/accessibility/',
		'icon'        => 'wheelchair',
	),
	array(
		'label'       => __( 'Email marketing', 'ls-theme' ),
		'kicker'      => __( 'Subscriber journeys, aligned', 'ls-theme' ),
		'description' => __( 'Journey planning, consent flows and the connection between email and the WordPress platform behind it.', 'ls-theme' ),
		'url'         => '/services/email-marketing/',
		'icon'        => 'envelope',
	),
	array(
		'label'       => __( 'AI', 'ls-theme' ),
		'kicker'      => __( 'Readiness, governance, workflow', 'ls-theme' ),
		'description' => __( 'AI-readiness reviews, governance and workflow planning — practical use without messy adoption.', 'ls-theme' ),
		'url'         => '/services/ai/',
		'icon'        => 'special-interests',
	),
);

/**
 * Renders one service tile card. A local closure (not a top-level function) since this file
 * can be included more than once per request via pattern registration/re-registration.
 *
 * @param array $ls_tile  Service tile data from $ls_service_tiles.
 * @param int   $ls_index Human-facing 1-based index shown in the card corner.
 */
$ls_render_service_tile = function ( $ls_tile, $ls_index ) {
	// Acronym labels (AI, SEO) must stay upper-case in the CTA text — only lower-case the rest.
	$ls_acronym_labels    = array( 'AI', 'SEO' );
	$ls_read_link_service = in_array( $ls_tile['label'], $ls_acronym_labels, true )
		? $ls_tile['label']
		: strtolower( $ls_tile['label'] );
	$ls_read_link_text    = sprintf(
		/* translators: %s: service name, lowercase except acronyms (AI, SEO). */
		__( 'Read about %s', 'ls-theme' ),
		$ls_read_link_service
	);
	?>

	<!-- wp:group {"tagName":"article","className":"is-style-card-service-tile","style":{"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
	<article class="wp-block-group is-style-card-service-tile" style="min-height:100%">
		<!-- wp:group {"className":"ls-icon-well-brand"} -->
		<div class="wp-block-group ls-icon-well-brand">
			<!-- wp:icon {"icon":"lightspeed/<?php echo esc_attr( $ls_tile['icon'] ); ?>","width":"18px"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"className":"ls-card-service-tile__index","style":{"typography":{"fontFamily":"var:preset|font-family|monospace","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"var:custom|color|text|subtle"}},"fontSize":"100"} -->
		<p class="has-text-color has-100-font-size ls-card-service-tile__index" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);letter-spacing:var(--wp--custom--typography--letter-spacing--wide)"><?php echo esc_html( sprintf( '%02d', $ls_index ) ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"className":"ls-card-service-tile__content","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
		<div class="wp-block-group ls-card-service-tile__content" style="margin-top:var(--wp--preset--spacing--20)">
			<!-- wp:heading {"level":3,"fontSize":"300"} -->
			<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html( $ls_tile['label'] ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"var:custom|color|text|brand"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--monospace);letter-spacing:var(--wp--custom--typography--letter-spacing--wide);text-transform:uppercase"><?php echo esc_html( $ls_tile['kicker'] ); ?></p>
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

		<!-- wp:columns {"align":"wide","verticalAlignment":"top"} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-top">

			<!-- wp:column {"verticalAlignment":"top","width":"48%"} -->
			<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:48%">
				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"8px","style":{"color":{"text":"var(--wp--custom--color--text--brand)"}}} -->
					<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--text--brand);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
					<!-- /wp:outermost/icon-block -->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'All services', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"600"} -->
				<h2 class="wp-block-heading has-600-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Fourteen services. One delivery model.', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"top","width":"52%"} -->
			<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:52%">
				<!-- wp:group {"layout":{"type":"constrained","contentSize":"576px","justifyContent":"left"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
					<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( "Read about an individual service — or start a conversation and we'll route the brief into the right shape.", 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--60)">
			<?php foreach ( array_slice( $ls_service_tiles, 0, 4 ) as $ls_tile_index => $ls_tile ) : ?>
			<!-- wp:column -->
			<div class="wp-block-column">
				<?php $ls_render_service_tile( $ls_tile, $ls_tile_index + 1 ); ?>
			</div>
			<!-- /wp:column -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:columns -->

		<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--20)">
			<?php foreach ( array_slice( $ls_service_tiles, 4, 4 ) as $ls_tile_index => $ls_tile ) : ?>
			<!-- wp:column -->
			<div class="wp-block-column">
				<?php $ls_render_service_tile( $ls_tile, $ls_tile_index + 5 ); ?>
			</div>
			<!-- /wp:column -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:columns -->

		<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--20)">
			<?php foreach ( array_slice( $ls_service_tiles, 8, 2 ) as $ls_tile_index => $ls_tile ) : ?>
			<!-- wp:column {"width":"50%"} -->
			<div class="wp-block-column" style="flex-basis:50%">
				<?php $ls_render_service_tile( $ls_tile, $ls_tile_index + 9 ); ?>
			</div>
			<!-- /wp:column -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:columns -->

		<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--20)">
			<?php foreach ( array_slice( $ls_service_tiles, 10, 4 ) as $ls_tile_index => $ls_tile ) : ?>
			<!-- wp:column -->
			<div class="wp-block-column">
				<?php $ls_render_service_tile( $ls_tile, $ls_tile_index + 11 ); ?>
			</div>
			<!-- /wp:column -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
