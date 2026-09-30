<?php
/**
 * Title: Section - Phase Services: Grow
 * Slug: ls-theme/phase-services-grow
 * Categories: featured
 * Block Types: core/pattern
 * Description: "Services in the Grow phase" section for the Grow lifecycle phase page — a
 * centred eyebrow/heading/intro and a wrapped row of service tiles. One of six static per-phase
 * patterns (phase-services-discover.php … phase-services-evolve.php) that replace the former
 * ls-theme/phase-services dynamic block: each pattern hardcodes its own phase, so its content is
 * fixed once inserted and stays correct whether or not the pattern is later flattened. Service
 * labels, descriptions, URLs and icons are kept in sync with the master list in
 * services-service-tiles.php. The phase accent uses the plain phase.grow token, which already
 * resolves to the correct light/dark value for this adaptive surface.
 * Keywords: phase, grow, services, cards, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_services = array(
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
);

$ls_service_rows = array_chunk( $ls_services, 4 );
$ls_phase_accent = 'var(--wp--custom--color--phase--grow)';
?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band ls-phase-services-in-phase","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|60","bottom":"var:preset|spacing|90","left":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band ls-phase-services-in-phase" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--60)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"700px","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"<?php echo esc_attr( $ls_phase_accent ); ?>"}},"fontSize":"100"} -->
		<p class="has-text-align-center has-text-color has-100-font-size" style="color:<?php echo esc_attr( $ls_phase_accent ); ?>;font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Services in this phase', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"500"} -->
		<h3 class="wp-block-heading has-text-align-center has-500-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Services in the Grow phase', 'ls-theme' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|10"}},"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
		<p class="has-text-align-center has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted);margin-top:var(--wp--preset--spacing--10)"><?php echo esc_html__( 'The Grow phase can include the following services:', 'ls-theme' ); ?></p>
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

</section>
<!-- /wp:group -->
