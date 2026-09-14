<?php
/**
 * Title: Home Hero
 * Slug: ls-theme/hero
 * Categories: hero
 * Block Types: core/template-part/hero
 * Description: Homepage hero: AI-planner intro, decorative prompt input, project-type suggestion pills, and a consultation link. Always renders dark, independent of the site's light/dark style variation, using the on-dark token family.
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
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--on-dark-accent)"},"dimensions":{"width":"6px"}}} /-->

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
			<p class="has-text-align-center has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--on-dark-muted)"><?php echo esc_html__( 'Describe your project and our AI planner will help you frame the brief, identify the right approach, and find the best starting point, before you commit to anything.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"ls-hero-prompt-row","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group ls-hero-prompt-row" style="margin-top:var(--wp--preset--spacing--60)">
			<!-- wp:icon {"icon":"lightspeed/special-interests","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"},"dimensions":{"width":"17px"}}} /-->

			<!-- wp:paragraph {"className":"ls-hero-prompt-text","style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"200"} -->
			<p class="ls-hero-prompt-text has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark-muted)"><?php echo esc_html__( 'Describe the website you need to plan…', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"className":"ls-hero-prompt-send","style":{"color":{"background":"var(--wp--custom--color--text--on-dark-accent)"},"border":{"radius":"var:preset|border-radius|200"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
			<div class="wp-block-group ls-hero-prompt-send has-background" style="border-radius:var(--wp--preset--border-radius--200);background-color:var(--wp--custom--color--text--on-dark-accent);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
				<!-- wp:icon {"icon":"lightspeed/arrow-right","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--on-light)"},"dimensions":{"width":"17px"}}} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"align":"center","className":"ls-hero-suggestion-keywords","style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest"},"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"100"} -->
		<p class="has-text-align-center has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--on-dark-muted);margin-top:var(--wp--preset--spacing--20);font-family:var(--wp--preset--font-family--monospace);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Project direction · Content structure · WooCommerce · LMS · Migration · AI readiness', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"className":"ls-hero-pills","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
		<div class="wp-block-group ls-hero-pills" style="margin-top:var(--wp--preset--spacing--20)">
			<!-- wp:paragraph {"className":"ls-hero-pill","style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"}},"fontSize":"200"} -->
			<p class="ls-hero-pill has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark)"><?php echo esc_html__( 'Plan a WordPress website', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"ls-hero-pill","style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"}},"fontSize":"200"} -->
			<p class="ls-hero-pill has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark)"><?php echo esc_html__( 'Scope a tour operator website', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"ls-hero-pill","style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"}},"fontSize":"200"} -->
			<p class="ls-hero-pill has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark)"><?php echo esc_html__( 'Plan a publisher website', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"ls-hero-pill","style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"}},"fontSize":"200"} -->
			<p class="ls-hero-pill has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark)"><?php echo esc_html__( 'Scope a WooCommerce store', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"ls-hero-pill","style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"}},"fontSize":"200"} -->
			<p class="ls-hero-pill has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark)"><?php echo esc_html__( 'Plan an education or LMS website', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"ls-hero-pill","style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"}},"fontSize":"200"} -->
			<p class="ls-hero-pill has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark)"><?php echo esc_html__( 'Assess AI readiness for our website', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"200"} -->
		<p class="has-text-align-center has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark-muted);margin-top:var(--wp--preset--spacing--20)"><?php echo esc_html__( 'Prefer to speak directly?', 'ls-theme' ); ?> <a href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>" style="color:var(--wp--custom--color--text--on-dark-accent)"><?php echo esc_html__( 'Book your consultation instead', 'ls-theme' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
