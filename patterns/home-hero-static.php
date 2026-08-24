<?php
/**
 * Title: Home Hero (Static)
 * Slug: ls-theme/hero-static
 * Categories: hero
 * Block Types: core/template-part/hero
 * Description: Homepage hero variant without the AI-planner prompt UI: eyebrow badge, heading,
 * intro copy, two CTA buttons, and a reassurance line. For use until the chatbot referenced by
 * the prompt UI in `home-hero.php` has real functionality — kept as a separate pattern (not a
 * replacement) so that one can be swapped back in later without rebuilding it. Same permanently
 * dark background, on-dark token family, and GSAP animated-network effect as `home-hero.php`
 * (both share the `ls-home-hero-section` className that triggers it).
 *
 * @package ls-theme
 */

?>

<!-- wp:group {"align":"full","tagName":"section","className":"ls-home-hero-section","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|30","bottom":"var:preset|spacing|90","left":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
<section class="wp-block-group alignfull ls-home-hero-section" style="margin-top:0;padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"className":"ls-home-hero-content","layout":{"type":"constrained","contentSize":"800px"}} -->
	<div class="wp-block-group ls-home-hero-content">

		<!-- wp:group {"className":"ls-hero-badge-neon","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
		<div class="wp-block-group ls-hero-badge-neon">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"6px","style":{"color":{"text":"var(--wp--custom--color--text--on-dark-accent)"}}} -->
				<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--text--on-dark-accent);width:6px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
				<!-- /wp:outermost/icon-block -->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--on-dark)"}},"fontSize":"200"} -->
				<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'WordPress Partner', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:heading {"textAlign":"center","level":1,"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"},"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"900"} -->
		<h1 class="wp-block-heading has-text-align-center has-text-color has-900-font-size" style="color:var(--wp--custom--color--text--on-dark);margin-top:var(--wp--preset--spacing--20);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Plan a WordPress site your team can', 'ls-theme' ); ?> <span style="color:var(--wp--custom--color--text--on-dark-accent)"><?php echo esc_html__( 'grow with', 'ls-theme' ); ?></span></h1>
		<!-- /wp:heading -->

		<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"600px"}} -->
		<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--60)">
			<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"300"} -->
			<p class="has-text-align-center has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--on-dark-muted)"><?php echo esc_html__( 'WordPress engineering, planning and support for teams that need their platform to last. Tell us about your project and we will help you find the right starting point.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--60)">
			<!-- wp:button {"className":"ls-hero-cta-fill"} -->
			<div class="wp-block-button ls-hero-cta-fill"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>"><?php echo esc_html__( 'Book a consultation', 'ls-theme' ); ?></a></div>
			<!-- /wp:button -->

			<!-- wp:button {"className":"is-style-outline ls-hero-cta-outline"} -->
			<div class="wp-block-button is-style-outline ls-hero-cta-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/work/' ) ); ?>"><?php echo esc_html__( 'Explore case studies', 'ls-theme' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

		<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"200"} -->
		<p class="has-text-align-center has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark-muted);margin-top:var(--wp--preset--spacing--20)"><?php echo esc_html__( 'Quick reply, usually within a working day.', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
