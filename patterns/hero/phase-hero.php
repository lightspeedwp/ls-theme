<?php
/**
 * Title: Hero - Phase
 * Slug: ls-theme/phase-hero
 * Categories: hero
 * Block Types: core/pattern
 * Description: Shared hero for all six lifecycle phase pages (Discover, Create, Build, Launch,
 * Grow, Evolve) — currently authored with Discover's own content; the phase number, heading,
 * description, CTAs and phase colour still need to be pulled out per-page (e.g. via Pattern
 * Overrides) before this is reused on the other five pages. Structure: an independently-aligned
 * breadcrumb, a compact "Phase 0X" pill, a centred two-line heading, description, fine-print, CTA
 * row, and a "send to a friend" utility pill. Full-bleed and permanently dark — the section's own
 * grid texture, radial phase-colour glow, and dark base all live in
 * src/scss/structural/phase-hero.scss (className ls-phase-hero), the same "background can't be
 * a block attribute" reasoning documented in blog-hero.scss (an inline background always wins the
 * cascade over an external stylesheet's background-image). Accents currently use the shipped
 * phase.discover-on-dark token (same phase-one hue as the site's lifecycle system, tuned for
 * permanent-dark surfaces) — each other phase page will need its own "-on-dark" token the same way.
 * The breadcrumb reuses blog-hero.php's existing ls-breadcrumbs-on-dark treatment.
 * Keywords: phase, hero, lifecycle, discover, create, build, launch, grow, evolve, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-phase-hero","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|30","bottom":"var:preset|spacing|80","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-phase-hero" style="margin-top:0;padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--30)">

	<?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
	<!-- wp:group {"align":"wide","className":"ls-breadcrumbs-on-dark","style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"},"typography":{"fontFamily":"var:preset|font-family|monospace"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide ls-breadcrumbs-on-dark has-text-color" style="color:var(--wp--custom--color--text--on-dark-muted);font-family:var(--wp--preset--font-family--monospace)">
		<!-- wp:yoast-seo/breadcrumbs /-->
	</div>
	<!-- /wp:group -->
	<?php endif; ?>

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--60)">

		<!-- wp:group {"style":{"border":{"color":"var:custom|color|phase|discover-on-dark","radius":"var:preset|border-radius|500","style":"solid","width":"1px"},"color":{"background":"color-mix(in srgb, var(--wp--custom--color--phase--discover-on-dark) 12%, transparent)"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|20","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
		<div class="wp-block-group has-border-color has-background" style="border-color:var(--wp--custom--color--phase--discover-on-dark);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--phase--discover-on-dark) 12%, transparent);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">
			<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--phase--discover-on-dark)"},"dimensions":{"width":"6px"}}} /-->

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--phase--discover-on-dark)"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--phase--discover-on-dark);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Phase 01', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"constrained","contentSize":"860px","justifyContent":"center"}} -->
		<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30)">
			<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold","lineHeight":"var:custom|line-height|heading-tight"},"color":{"text":"var(--wp--custom--color--text--on-dark)"}},"fontSize":"900"} -->
			<h1 class="wp-block-heading has-text-align-center has-text-color has-900-font-size" style="color:var(--wp--custom--color--text--on-dark);font-weight:var(--wp--custom--typography--font-weight--extrabold);line-height:var(--wp--custom--line-height--heading-tight)"><span style="color:var(--wp--custom--color--phase--discover-on-dark)"><?php echo esc_html__( 'Discover.', 'ls-theme' ); ?></span> <?php echo esc_html__( 'Uncover. Research. Strategise.', 'ls-theme' ); ?></h1>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"900px","justifyContent":"center"}} -->
		<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--40)">
			<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"300"} -->
			<p class="has-text-align-center has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--on-dark-muted)"><?php echo esc_html__( 'Discover is where the project stops being a vague ambition and becomes a structured plan. LightSpeed uses this stage to understand your goals, your current platform, the pressure points in the workflow and the constraints that could affect delivery later.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontFamily":"var:preset|font-family|monospace","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"100"} -->
		<p class="has-text-align-center has-text-color has-100-font-size" style="margin-top:var(--wp--preset--spacing--20);color:var(--wp--custom--color--text--on-dark-muted);font-family:var(--wp--preset--font-family--monospace);letter-spacing:var(--wp--custom--typography--letter-spacing--wide)"><?php echo esc_html__( 'Research-led discovery for WordPress, WooCommerce, migrations and AI-ready digital platforms.', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
			<!-- wp:button {"className":"is-style-button-phase-primary"} -->
			<div class="wp-block-button is-style-button-phase-primary"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>"><?php echo esc_html__( 'Book a Discovery Call', 'ls-theme' ); ?></a></div>
			<!-- /wp:button -->

			<!-- wp:button {"className":"is-style-button-phase-outline"} -->
			<div class="wp-block-button is-style-button-phase-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/work/?service=discovery' ) ); ?>"><?php echo esc_html__( 'View Discovery Case Studies', 'ls-theme' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

		<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30)">
			<!-- wp:group {"className":"ls-phase-hero__share","style":{"border":{"radius":"var:preset|border-radius|500","style":"solid","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|20","bottom":"var:preset|spacing|5","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group ls-phase-hero__share" style="border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--500);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--20)">
				<!-- wp:icon {"icon":"lightspeed/paper-plane-tilt","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"},"dimensions":{"width":"12px"}}} /-->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"200"} -->
				<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark-muted)"><a href="<?php echo esc_url( 'mailto:?subject=' . rawurlencode( get_the_title() ) . '&body=' . rawurlencode( get_permalink() ) ); ?>" style="color:inherit;text-decoration:none"><?php echo esc_html__( 'Send to a friend', 'ls-theme' ); ?></a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
