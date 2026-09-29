<?php
/**
 * Server-side rendering of `ls-theme/phase-services`.
 *
 * Renders the "Services in this phase" heading and card grid for whichever of the six lifecycle
 * phase pages (Discover, Create, Build, Launch, Grow, Evolve) requested it.
 *
 * This is CodeRabbit's requested fix for patterns/sections/phase-services-in-phase.php (PR #64):
 * that pattern used to select its phase-dependent content via get_queried_object() inside the
 * pattern's own PHP, which only re-evaluates per request while the pattern stays a live
 * `wp:pattern` reference — the live reference does not make the pattern's top-level PHP execute
 * again during page rendering, so a flattened copy freezes whatever phase was active when it was
 * flattened. Moving the same selection logic into this dynamic block's render callback fixes that:
 * a dynamic block's render callback always runs at real request time, regardless of how the
 * surrounding pattern is stored.
 *
 * @param array    $attributes Block attributes (none registered).
 * @param string   $content    Block default content (unused; this block has no inner content).
 * @param WP_Block $block      Block instance, used for its `postId` context.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

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

$ls_phase_labels = array(
	'discover' => __( 'Discover', 'ls-theme' ),
	'create'   => __( 'Create', 'ls-theme' ),
	'build'    => __( 'Build', 'ls-theme' ),
	'launch'   => __( 'Launch', 'ls-theme' ),
	'grow'     => __( 'Grow', 'ls-theme' ),
	'evolve'   => __( 'Evolve', 'ls-theme' ),
);

$ls_post_id = isset( $block->context['postId'] ) ? (int) $block->context['postId'] : ( get_the_ID() ?: get_queried_object_id() );

$ls_current_phase_slug = '';
$ls_queried_post       = get_post( $ls_post_id );
if ( $ls_queried_post instanceof WP_Post ) {
	$ls_current_phase_slug = $ls_queried_post->post_name;
}

$ls_active_phase_slug  = isset( $ls_phase_services_by_phase[ $ls_current_phase_slug ] ) ? $ls_current_phase_slug : 'discover';
$ls_active_phase_label = $ls_phase_labels[ $ls_active_phase_slug ];
$ls_active_services    = $ls_phase_services_by_phase[ $ls_active_phase_slug ];
$ls_service_rows       = array_chunk( $ls_active_services, 4 );
$ls_phase_accent       = 'var(--wp--custom--color--phase--' . $ls_active_phase_slug . ')';

ob_start();
?>
<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"700px","justifyContent":"center"}} -->
<div class="wp-block-group alignwide">
	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"<?php echo esc_attr( $ls_phase_accent ); ?>"}},"fontSize":"100"} -->
	<p class="has-text-align-center has-text-color has-100-font-size" style="color:<?php echo esc_attr( $ls_phase_accent ); ?>;font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Services in this phase', 'ls-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"500"} -->
	<h3 class="wp-block-heading has-text-align-center has-500-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html( sprintf( /* translators: %s: phase label, e.g. "Discover". */ __( 'Services in the %s phase', 'ls-theme' ), $ls_active_phase_label ) ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|10"}},"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
	<p class="has-text-align-center has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted);margin-top:var(--wp--preset--spacing--10)"><?php echo esc_html( sprintf( /* translators: %s: phase label, e.g. "Discover". */ __( 'The %s phase can include the following services:', 'ls-theme' ), $ls_active_phase_label ) ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<?php foreach ( $ls_service_rows as $ls_row_index => $ls_row ) : ?>
<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"<?php echo 0 === $ls_row_index ? 'var:preset|spacing|40' : 'var:preset|spacing|20'; ?>"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"}} -->
<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--<?php echo 0 === $ls_row_index ? '40' : '20'; ?>)">
	<?php foreach ( $ls_row as $ls_service ) : ?>
	<!-- wp:group {"tagName":"article","className":"is-style-card-service-tile","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","selfStretch":"fixed","flexSize":"340px"}} -->
	<article class="wp-block-group is-style-card-service-tile">
		<!-- wp:group {"className":"ls-phase-services-in-phase__icon-well","style":{"border":{"color":"<?php echo esc_attr( $ls_phase_accent ); ?>","radius":"var:preset|border-radius|500","style":"solid","width":"1px"},"color":{"background":"color-mix(in srgb, <?php echo esc_attr( $ls_phase_accent ); ?> 12%, transparent)"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
		<div class="wp-block-group ls-phase-services-in-phase__icon-well has-border-color has-background" style="border-color:<?php echo esc_attr( $ls_phase_accent ); ?>;border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, <?php echo esc_attr( $ls_phase_accent ); ?> 12%, transparent);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
			<!-- wp:icon {"icon":"lightspeed/<?php echo esc_attr( $ls_service['icon'] ); ?>","className":"has-text-color","style":{"color":{"text":"<?php echo esc_attr( $ls_phase_accent ); ?>"},"dimensions":{"width":"14px"}}} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"ls-card-service-tile__content","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
		<div class="wp-block-group ls-card-service-tile__content" style="margin-top:var(--wp--preset--spacing--20)">
			<!-- wp:heading {"level":4,"fontSize":"300"} -->
			<h4 class="wp-block-heading has-300-font-size"><?php echo esc_html( $ls_service['label'] ); ?></h4>
			<!-- /wp:heading -->

			<!-- wp:group {"layout":{"type":"constrained","contentSize":"260px"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"color":{"text":"var:custom|color|text|muted"}},"fontSize":"200"} -->
				<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_service['description'] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"className":"is-style-link-arrow-accent","style":{"spacing":{"margin":{"top":"auto"}}}} -->
		<p class="is-style-link-arrow-accent" style="margin-top:auto"><a class="ls-card-service-tile__link" href="<?php echo esc_url( home_url( $ls_service['url'] ) ); ?>"><?php echo esc_html__( 'Explore service', 'ls-theme' ); ?></a></p>
		<!-- /wp:paragraph -->
	</article>
	<!-- /wp:group -->
	<?php endforeach; ?>
</div>
<!-- /wp:group -->
<?php endforeach; ?>
<?php
$ls_phase_services_content = ob_get_clean();

// Same mechanism core's own render_block_core_pattern() uses to turn a registered pattern's
// stored `wp:...` content into final HTML — see wp-includes/blocks/pattern.php.
echo do_blocks( $ls_phase_services_content ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- do_blocks() output is WordPress-rendered block markup; every dynamic value above is already escaped before entering the buffer.
