<?php
/**
 * Title: Section - Phase Journey Nav
 * Slug: ls-theme/phase-journey-nav
 * Categories: featured
 * Block Types: core/pattern
 * Description: A shared "Journey Phases" strip for the six phase pages (Discover, Create, Build,
 * Launch, Grow, Evolve). Self-contained and reusable as-is on each phase page — it detects the
 * current page by slug and highlights the matching step automatically, so inserting this same
 * pattern on the Create/Build/Launch/Grow/Evolve pages needs no manual editing per instance. Always
 * dark, matching the hero it normally sits directly beneath (see discover-hero.php) — uses the same
 * always-dark card tokens rather than surface.canvas. The active step's colour falls back from a
 * phase's "-on-dark" token (only phase.discover-on-dark exists yet) to the phase's normal token, so
 * this keeps working once Create/Build/Launch/Grow/Evolve ship without their own "-on-dark" token
 * yet defined.
 * Keywords: phase, journey, lifecycle, navigation, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_journey_phases = array(
	array(
		'index' => '01',
		'label' => __( 'Discover', 'ls-theme' ),
		'phase' => 'discover',
		'url'   => '/discover/',
	),
	array(
		'index' => '02',
		'label' => __( 'Create', 'ls-theme' ),
		'phase' => 'create',
		'url'   => '/create/',
	),
	array(
		'index' => '03',
		'label' => __( 'Build', 'ls-theme' ),
		'phase' => 'build',
		'url'   => '/build/',
	),
	array(
		'index' => '04',
		'label' => __( 'Launch', 'ls-theme' ),
		'phase' => 'launch',
		'url'   => '/launch/',
	),
	array(
		'index' => '05',
		'label' => __( 'Grow', 'ls-theme' ),
		'phase' => 'grow',
		'url'   => '/grow/',
	),
	array(
		'index' => '06',
		'label' => __( 'Evolve', 'ls-theme' ),
		'phase' => 'evolve',
		'url'   => '/evolve/',
	),
);

$ls_current_phase_slug = '';
$ls_queried_object     = get_queried_object();
if ( $ls_queried_object instanceof WP_Post ) {
	$ls_current_phase_slug = $ls_queried_object->post_name;
}
?>
<!-- wp:group {"align":"full","tagName":"nav","className":"ls-phase-journey-nav","style":{"border":{"top":{"color":"color-mix(in srgb, var(--wp--custom--color--text--on-dark) 8%, transparent)","style":"solid","width":"1px"},"bottom":{"color":"color-mix(in srgb, var(--wp--custom--color--text--on-dark) 8%, transparent)","style":"solid","width":"1px"}},"color":{"background":"color-mix(in srgb, var(--wp--custom--color--surface--on-dark-card) 60%, transparent)"},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"constrained"}} -->
<nav class="wp-block-group alignfull ls-phase-journey-nav has-background" aria-label="<?php echo esc_attr__( 'Journey phases', 'ls-theme' ); ?>" style="border-top-color:color-mix(in srgb, var(--wp--custom--color--text--on-dark) 8%, transparent);border-top-style:solid;border-top-width:1px;border-bottom-color:color-mix(in srgb, var(--wp--custom--color--text--on-dark) 8%, transparent);border-bottom-style:solid;border-bottom-width:1px;background-color:color-mix(in srgb, var(--wp--custom--color--surface--on-dark-card) 60%, transparent);padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">

	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left","verticalAlignment":"center"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"style":{"border":{"right":{"color":"color-mix(in srgb, var(--wp--custom--color--text--on-dark) 10%, transparent)","style":"solid","width":"1px"}},"spacing":{"padding":{"right":"var:preset|spacing|20"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
		<div class="wp-block-group" style="border-right-color:color-mix(in srgb, var(--wp--custom--color--text--on-dark) 10%, transparent);border-right-style:solid;border-right-width:1px;padding-right:var(--wp--preset--spacing--20)">
			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wide","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--on-dark-muted);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--wide);text-transform:uppercase"><?php echo esc_html__( 'Journey Phases', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<?php
		foreach ( $ls_journey_phases as $ls_step ) :
			$ls_is_active   = ( $ls_current_phase_slug === $ls_step['phase'] );
			$ls_step_color  = 'var(--wp--custom--color--phase--' . $ls_step['phase'] . '-on-dark, var(--wp--custom--color--phase--' . $ls_step['phase'] . '))';
			$ls_label_color = $ls_is_active ? $ls_step_color : 'var(--wp--custom--color--text--on-dark-muted)';
			$ls_step_class  = 'ls-phase-journey-nav__step' . ( $ls_is_active ? ' is-active' : '' );
			?>
		<!-- wp:group {"className":"<?php echo esc_attr( $ls_step_class ); ?>","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|20","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group <?php echo esc_attr( $ls_step_class ); ?>" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">
			<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wide","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"<?php echo esc_attr( $ls_label_color ); ?>"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:<?php echo esc_attr( $ls_label_color ); ?>;font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--wide);text-transform:uppercase"><a href="<?php echo esc_url( home_url( $ls_step['url'] ) ); ?>" style="color:inherit;text-decoration:none"><?php echo esc_html( $ls_step['index'] . ' ' . $ls_step['label'] ); ?></a></p>
			<!-- /wp:paragraph -->

			<?php if ( $ls_is_active ) : ?>
			<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"<?php echo esc_attr( $ls_step_color ); ?>"},"dimensions":{"width":"8px"}}} /-->
			<?php endif; ?>
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</nav>
<!-- /wp:group -->
