<?php
/**
 * Title: Hero - Discover
 * Slug: ls-theme/discover-hero
 * Categories: hero
 * Block Types: core/pattern
 * Description: The Discover phase page's hero: breadcrumb trail, "Phase 01" eyebrow badge, a two-line
 * heading, supporting description, fine-print, primary/secondary CTAs, and a "send to a friend"
 * utility pill. Intentionally always dark regardless of the active light/dark style variation —
 * uses the theme's existing always-dark card tokens (surface.on-dark-card, text.on-dark family)
 * rather than surface.canvas, which is the same approach already used in
 * section-cta-consultation-inline.php and section-cta-consultation-reassurance.php. Accents use the
 * shipped phase.discover-on-dark token (same phase-one hue as the site's lifecycle system, tuned
 * for permanent-dark surfaces) instead of the Figma comp's one-off green, keeping this in line with
 * the phase colours already shipped on the Services page.
 * Keywords: discover, hero, phase, lifecycle, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-discover-hero","style":{"color":{"background":"var:custom|color|surface|on-dark-card"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|30","bottom":"var:preset|spacing|80","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-discover-hero has-background" style="margin-top:0;background-color:var(--wp--custom--color--surface--on-dark-card);padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
		<!-- wp:yoast-seo/breadcrumbs {"className":"alignwide ls-discover-hero__breadcrumbs"} /-->
		<?php endif; ?>

		<!-- wp:group {"layout":{"type":"constrained","contentSize":"880px"}} -->
		<div class="wp-block-group">

			<!-- wp:group {"style":{"border":{"color":"var:custom|color|phase|discover-on-dark","radius":"var:preset|border-radius|500","style":"solid","width":"1px"},"color":{"background":"color-mix(in srgb, var(--wp--custom--color--phase--discover-on-dark) 12%, transparent)"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|20","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
			<div class="wp-block-group has-border-color has-background" style="border-color:var(--wp--custom--color--phase--discover-on-dark);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--phase--discover-on-dark) 12%, transparent);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--phase--discover-on-dark)"},"dimensions":{"width":"6px"}}} /-->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--phase--discover-on-dark)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--phase--discover-on-dark);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Phase 01', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"color":{"text":"var(--wp--custom--color--text--on-dark)"},"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"fontSize":"900"} -->
			<h1 class="wp-block-heading has-text-align-center has-text-color has-900-font-size" style="margin-top:var(--wp--preset--spacing--30);color:var(--wp--custom--color--text--on-dark);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><span style="color:var(--wp--custom--color--phase--discover-on-dark)"><?php echo esc_html__( 'Discover.', 'ls-theme' ); ?></span> <?php echo esc_html__( 'Uncover. Research. Strategise.', 'ls-theme' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"constrained","contentSize":"732px","justifyContent":"center"}} -->
			<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30)">
				<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"300"} -->
				<p class="has-text-align-center has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--on-dark-muted)"><?php echo esc_html__( 'Discover is where the project stops being a vague ambition and becomes a structured plan. LightSpeed uses this stage to understand your goals, your current platform, the pressure points in the workflow and the constraints that could affect delivery later.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"100"} -->
			<p class="has-text-align-center has-text-color has-100-font-size" style="margin-top:var(--wp--preset--spacing--20);color:var(--wp--custom--color--text--on-dark-muted);letter-spacing:var(--wp--custom--typography--letter-spacing--wide)"><?php echo esc_html__( 'Research-led discovery for WordPress, WooCommerce, migrations and AI-ready digital platforms.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>"><?php echo esc_html__( 'Book a Discovery Call', 'ls-theme' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/work/?service=discovery' ) ); ?>"><?php echo esc_html__( 'View Discovery Case Studies', 'ls-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

			<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--20)">
				<!-- wp:group {"className":"ls-discover-hero__share","style":{"border":{"color":"color-mix(in srgb, var(--wp--custom--color--text--on-dark) 8%, transparent)","radius":"var:preset|border-radius|500","style":"solid","width":"1px"},"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--on-dark) 5%, transparent)"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|20","bottom":"var:preset|spacing|5","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
				<div class="wp-block-group ls-discover-hero__share has-border-color has-background" style="border-color:color-mix(in srgb, var(--wp--custom--color--text--on-dark) 8%, transparent);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--text--on-dark) 5%, transparent);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--20)">
					<!-- wp:icon {"icon":"lightspeed/paper-plane-tilt","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"},"dimensions":{"width":"11px"}}} /-->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--on-dark-muted)"><a href="<?php echo esc_url( 'mailto:?subject=' . rawurlencode( get_the_title() ) . '&body=' . rawurlencode( get_permalink() ) ); ?>" style="color:inherit;text-decoration:none"><?php echo esc_html__( 'Send to a friend', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
