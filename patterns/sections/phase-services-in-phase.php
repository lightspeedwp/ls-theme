<?php
/**
 * Title: Section - Phase Services In Phase
 * Slug: ls-theme/phase-services-in-phase
 * Categories: featured
 * Block Types: core/pattern
 * Description: Shared "Services in the [Phase] phase" section for all six lifecycle phase pages.
 * Unlike the other phase sections, this one needs no per-page copy edits at all: it detects the
 * current page by slug (same technique as phase-journey-nav.php) and renders only that phase's
 * service cards from the single $ls_phase_services_by_phase map below, whose labels/descriptions/
 * URLs/icons are kept in sync with the master list in services-service-tiles.php. Each card reuses
 * that pattern's existing icon-well (ls-icon-well-brand) and arrow-link (is-style-link-arrow-accent)
 * treatments — no new card style. Cards are chunked into rows of up to four via core/columns.
 *
 * IMPORTANT — insert this as a live reference, not a flattened copy: like phase-journey-nav.php,
 * the phase-detection below only re-evaluates per request if this stays a live
 * `<!-- wp:pattern {"slug":"ls-theme/phase-services-in-phase"} /-->` reference block.
 * Keywords: phase, discover, create, build, launch, grow, evolve, services, cards, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_phase_services_by_phase = array(
	'discover' => array(
		array(
			'label'       => __( 'Discovery', 'ls-theme' ),
			'description' => __( 'Stakeholder workshops, audits, scoping and feasibility — the evidence layer that comes before design or build.', 'ls-theme' ),
			'url'         => '/services/discovery/',
			'icon'        => 'search',
		),
	),
	'create'   => array(
		array(
			'label'       => __( 'Content', 'ls-theme' ),
			'description' => __( 'Content modelling, editorial workflow and governance that holds up at scale.', 'ls-theme' ),
			'url'         => '/services/content/',
			'icon'        => 'file-text',
		),
		array(
			'label'       => __( 'Design', 'ls-theme' ),
			'description' => __( 'Design systems, accessible patterns and Figma→WordPress parity. Already a deeper page.', 'ls-theme' ),
			'url'         => '/services/design/',
			'icon'        => 'paint-brush',
		),
	),
	'build'    => array(
		array(
			'label'       => __( 'Development', 'ls-theme' ),
			'description' => __( 'Block themes, WooCommerce, integrations and platform refactors built for long-term health.', 'ls-theme' ),
			'url'         => '/services/development/',
			'icon'        => 'code',
		),
		array(
			'label'       => __( 'Migrations', 'ls-theme' ),
			'description' => __( 'Audits, mapping and redirects that take legacy platforms apart without losing traction.', 'ls-theme' ),
			'url'         => '/services/migrations/',
			'icon'        => 'arrows-left-right',
		),
	),
	'launch'   => array(
		array(
			'label'       => __( 'Hosting', 'ls-theme' ),
			'description' => __( 'Managed environments that match the platform, the workflows and the support model around it.', 'ls-theme' ),
			'url'         => '/services/hosting/',
			'icon'        => 'cloud',
		),
		array(
			'label'       => __( 'Performance', 'ls-theme' ),
			'description' => __( 'Core Web Vitals, caching, query review and template optimisation against real production data.', 'ls-theme' ),
			'url'         => '/services/performance/',
			'icon'        => 'gauge',
		),
		array(
			'label'       => __( 'Security', 'ls-theme' ),
			'description' => __( 'Audits, hardening guidance, monitoring and recovery planning that reduces risk before incidents.', 'ls-theme' ),
			'url'         => '/services/security/',
			'icon'        => 'shield',
		),
		array(
			'label'       => __( 'Training', 'ls-theme' ),
			'description' => __( 'Role-specific training and reference materials that move teams from dependency to confidence.', 'ls-theme' ),
			'url'         => '/services/training/',
			'icon'        => 'graduation-cap',
		),
	),
	'grow'     => array(
		array(
			'label'       => __( 'Support', 'ls-theme' ),
			'description' => __( 'Maintenance, incident response and quiet improvement so platforms keep getting easier to run.', 'ls-theme' ),
			'url'         => '/services/support/',
			'icon'        => 'lifebuoy',
		),
		array(
			'label'       => __( 'SEO', 'ls-theme' ),
			'description' => __( 'Technical SEO, internal linking, schema and the publishing discipline that supports visibility.', 'ls-theme' ),
			'url'         => '/services/seo/',
			'icon'        => 'chart-line-up',
		),
		array(
			'label'       => __( 'Accessibility', 'ls-theme' ),
			'description' => __( 'Audits, remediation and the semantic structure that helps WCAG 2.2 AA stick over time.', 'ls-theme' ),
			'url'         => '/services/accessibility/',
			'icon'        => 'wheelchair',
		),
		array(
			'label'       => __( 'Email marketing', 'ls-theme' ),
			'description' => __( 'Journey planning, consent flows and the connection between email and the WordPress platform behind it.', 'ls-theme' ),
			'url'         => '/services/email-marketing/',
			'icon'        => 'envelope',
		),
	),
	'evolve'   => array(
		array(
			'label'       => __( 'AI', 'ls-theme' ),
			'description' => __( 'AI-readiness reviews, governance and workflow planning — practical use without messy adoption.', 'ls-theme' ),
			'url'         => '/services/ai/',
			'icon'        => 'special-interests',
		),
	),
);

$ls_current_phase_slug   = '';
$ls_services_queried_obj = get_queried_object();
if ( $ls_services_queried_obj instanceof WP_Post ) {
	$ls_current_phase_slug = $ls_services_queried_obj->post_name;
}

$ls_phase_labels = array(
	'discover' => __( 'Discover', 'ls-theme' ),
	'create'   => __( 'Create', 'ls-theme' ),
	'build'    => __( 'Build', 'ls-theme' ),
	'launch'   => __( 'Launch', 'ls-theme' ),
	'grow'     => __( 'Grow', 'ls-theme' ),
	'evolve'   => __( 'Evolve', 'ls-theme' ),
);

$ls_active_phase_label = isset( $ls_phase_labels[ $ls_current_phase_slug ] ) ? $ls_phase_labels[ $ls_current_phase_slug ] : __( 'Discover', 'ls-theme' );
$ls_active_services    = isset( $ls_phase_services_by_phase[ $ls_current_phase_slug ] ) ? $ls_phase_services_by_phase[ $ls_current_phase_slug ] : $ls_phase_services_by_phase['discover'];
$ls_service_rows       = array_chunk( $ls_active_services, 4 );
?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|60","bottom":"var:preset|spacing|90","left":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--60)">

	<!-- wp:group {"layout":{"type":"constrained","contentSize":"620px","justifyContent":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--phase--discover-on-dark, var(--wp--custom--color--phase--discover))"}},"fontSize":"100"} -->
		<p class="has-text-align-center has-text-color has-100-font-size" style="color:var(--wp--custom--color--phase--discover-on-dark, var(--wp--custom--color--phase--discover));font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Services in this phase', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"700"} -->
		<h2 class="wp-block-heading has-text-align-center has-700-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html( sprintf( /* translators: %s: phase label, e.g. "Discover". */ __( 'Services in the %s phase', 'ls-theme' ), $ls_active_phase_label ) ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|10"}},"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
		<p class="has-text-align-center has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted);margin-top:var(--wp--preset--spacing--10)"><?php echo esc_html( sprintf( /* translators: %s: phase label, e.g. "Discover". */ __( 'The %s phase can include the following services:', 'ls-theme' ), $ls_active_phase_label ) ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<?php foreach ( $ls_service_rows as $ls_row_index => $ls_row ) : ?>
	<!-- wp:columns {"style":{"spacing":{"margin":{"top":"<?php echo 0 === $ls_row_index ? 'var:preset|spacing|40' : 'var:preset|spacing|20'; ?>"},"blockGap":"var:preset|spacing|20"}}} -->
	<div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--<?php echo 0 === $ls_row_index ? '40' : '20'; ?>)">
		<?php foreach ( $ls_row as $ls_service ) : ?>
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"tagName":"article","className":"is-style-card-service-tile","style":{"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-service-tile" style="min-height:100%">
				<!-- wp:group {"className":"ls-icon-well-brand"} -->
				<div class="wp-block-group ls-icon-well-brand">
					<!-- wp:icon {"icon":"lightspeed/<?php echo esc_attr( $ls_service['icon'] ); ?>","style":{"dimensions":{"width":"18px"}}} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"ls-card-service-tile__content","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<div class="wp-block-group ls-card-service-tile__content" style="margin-top:var(--wp--preset--spacing--20)">
					<!-- wp:heading {"level":4,"fontSize":"300"} -->
					<h4 class="wp-block-heading has-300-font-size"><?php echo esc_html( $ls_service['label'] ); ?></h4>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var:custom|color|text|muted"}},"fontSize":"200"} -->
					<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_service['description'] ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"className":"is-style-link-arrow-accent","style":{"spacing":{"margin":{"top":"auto"}}}} -->
				<p class="is-style-link-arrow-accent" style="margin-top:auto"><a class="ls-card-service-tile__link" href="<?php echo esc_url( home_url( $ls_service['url'] ) ); ?>"><?php echo esc_html__( 'Explore service', 'ls-theme' ); ?></a></p>
				<!-- /wp:paragraph -->
			</article>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->
	<?php endforeach; ?>
</section>
<!-- /wp:group -->
