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
 * dark, matching the hero it normally sits directly beneath (see phase-hero.php) — a solid
 * surface.band-end fill (the same permanently-dark token used for the hero's own base gradient,
 * rather than surface.canvas, which flips with the light/dark style variation) for a near-black,
 * understated band, with definition coming from the top/bottom borders rather than a lighter panel
 * fill. The active step's colour falls back from a
 * phase's "-on-dark" token (only phase.discover-on-dark exists yet) to the phase's normal token, so
 * this keeps working once Create/Build/Launch/Grow/Evolve ship without their own "-on-dark" token
 * yet defined. Inactive/hover/active/hover-active/focus-visible states live in
 * src/scss/structural/phase-journey-nav.scss, since a bare :hover/:focus-visible in a style JSON's
 * css field is silently stripped by WordPress, and an inline `style="color:..."` on each link would
 * always win the cascade over any external hover rule for the same property (the same class of bug
 * already documented for the hero's "Send to a friend" control) — so each item's accent colour is
 * passed down as a CSS custom property instead of a literal `color`, leaving the actual `color`
 * property free for that external stylesheet to own per state.
 *
 * Active-state detection does NOT depend on this pattern staying a live reference. An earlier
 * version computed the active step purely in PHP via get_queried_object(), which only re-evaluated
 * on real front-end requests while the pattern stayed a live `wp:pattern` reference — WordPress
 * routinely flattens a pattern into a frozen static copy the moment a page is opened in the
 * editor, permanently baking in whatever active state existed at that moment (often wrong or
 * blank), and re-attaching the live reference doesn't prevent it from being reflattened again on
 * the next edit. The PHP below still computes `$ls_is_active` and adds an `is-active` class as a
 * best-effort default, but the actual visual active/inactive treatment (link colour, dot
 * visibility) is driven entirely by CSS keyed off a `page-slug-{slug}` body class — see
 * ls_theme_add_phase_page_body_class() in inc/phase-page-body-class.php and the body-class rules
 * in phase-journey-nav.scss. That body class is recomputed by WordPress core on every single
 * request regardless of how this pattern's blocks are stored, so the correct step stays
 * highlighted even if this instance is (or becomes) a flattened copy.
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
		'url'   => '/services/discover/',
	),
	array(
		'index' => '02',
		'label' => __( 'Create', 'ls-theme' ),
		'phase' => 'create',
		'url'   => '/services/create/',
	),
	array(
		'index' => '03',
		'label' => __( 'Build', 'ls-theme' ),
		'phase' => 'build',
		'url'   => '/services/build/',
	),
	array(
		'index' => '04',
		'label' => __( 'Launch', 'ls-theme' ),
		'phase' => 'launch',
		'url'   => '/services/launch/',
	),
	array(
		'index' => '05',
		'label' => __( 'Grow', 'ls-theme' ),
		'phase' => 'grow',
		'url'   => '/services/grow/',
	),
	array(
		'index' => '06',
		'label' => __( 'Evolve', 'ls-theme' ),
		'phase' => 'evolve',
		'url'   => '/services/evolve/',
	),
);

$ls_current_phase_slug = '';
$ls_queried_object     = get_queried_object();
if ( $ls_queried_object instanceof WP_Post ) {
	$ls_current_phase_slug = $ls_queried_object->post_name;
}
?>
<!-- wp:group {"align":"full","tagName":"nav","className":"ls-phase-journey-nav","style":{"border":{"top":{"color":"color-mix(in srgb, var(--wp--custom--color--text--on-dark) 12%, transparent)","style":"solid","width":"1px"},"bottom":{"color":"color-mix(in srgb, var(--wp--custom--color--text--on-dark) 12%, transparent)","style":"solid","width":"1px"}},"color":{"background":"var:custom|color|surface|band-end"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|20","right":"8%","bottom":"var:preset|spacing|20","left":"8%"}}},"layout":{"type":"constrained"}} -->
<nav class="wp-block-group alignfull ls-phase-journey-nav has-background" aria-label="<?php echo esc_attr__( 'Journey phases', 'ls-theme' ); ?>" style="border-top-color:color-mix(in srgb, var(--wp--custom--color--text--on-dark) 12%, transparent);border-top-style:solid;border-top-width:1px;border-bottom-color:color-mix(in srgb, var(--wp--custom--color--text--on-dark) 12%, transparent);border-bottom-style:solid;border-bottom-width:1px;background-color:var(--wp--custom--color--surface--band-end);margin-top:0;padding-top:var(--wp--preset--spacing--20);padding-right:8%;padding-bottom:var(--wp--preset--spacing--20);padding-left:8%">

	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"className":"ls-phase-journey-nav__label","style":{"border":{"right":{"color":"color-mix(in srgb, var(--wp--custom--color--text--on-dark) 22%, transparent)","style":"solid","width":"2px"}},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|40","bottom":"var:preset|spacing|5"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"center"}} -->
		<div class="wp-block-group ls-phase-journey-nav__label" style="border-right-color:color-mix(in srgb, var(--wp--custom--color--text--on-dark) 22%, transparent);border-right-style:solid;border-right-width:2px;padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--5)">
			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wider","fontWeight":"var:custom|typography|font-weight|bold","lineHeight":"var:custom|line-height|heading-snug"},"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--on-dark-muted);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--wider);line-height:var(--wp--custom--line-height--heading-snug);text-transform:uppercase"><?php echo esc_html__( 'Journey', 'ls-theme' ) . '<br />' . esc_html__( 'Phases', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"ls-phase-journey-nav__items","style":{"spacing":{"padding":{"left":"var:preset|spacing|40"}},"layout":{"selfStretch":"fill"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
		<div class="wp-block-group ls-phase-journey-nav__items" style="padding-left:var(--wp--preset--spacing--40)">
			<?php
			foreach ( $ls_journey_phases as $ls_step ) :
				$ls_is_active  = ( $ls_current_phase_slug === $ls_step['phase'] );
				$ls_step_color = 'var(--wp--custom--color--phase--' . $ls_step['phase'] . '-on-dark, var(--wp--custom--color--phase--' . $ls_step['phase'] . '))';
				$ls_step_class = 'ls-phase-journey-nav__step ls-phase-journey-nav__step--' . $ls_step['phase'] . ( $ls_is_active ? ' is-active' : '' );
				?>
			<!-- wp:group {"className":"<?php echo esc_attr( $ls_step_class ); ?>","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group <?php echo esc_attr( $ls_step_class ); ?>" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
				<!-- wp:paragraph {"className":"ls-phase-journey-nav__link","style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wide","fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"100"} -->
				<p class="has-100-font-size ls-phase-journey-nav__link" style="font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--wide);text-transform:uppercase"><a href="<?php echo esc_url( home_url( $ls_step['url'] ) ); ?>" style="text-decoration:none"><?php echo esc_html( $ls_step['index'] . ' ' . $ls_step['label'] ); ?></a></p>
				<!-- /wp:paragraph -->

				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color ls-phase-journey-nav__dot","style":{"color":{"text":"<?php echo esc_attr( $ls_step_color ); ?>"},"dimensions":{"width":"8px"}}} /-->
			</div>
			<!-- /wp:group -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</nav>
<!-- /wp:group -->
