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
			<p class="has-text-align-center has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--on-dark-muted)"><?php echo esc_html__( 'Describe your project and our AI planner will help you frame the brief, identify the right approach, and find the best starting point, before you commit to anything.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"ls-hero-prompt-row","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group ls-hero-prompt-row" style="margin-top:var(--wp--preset--spacing--60)">
			<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"17px","style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}}} -->
			<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--text--on-dark-muted);width:17px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M197.58,129.06,146,110l-19-51.62a15.92,15.92,0,0,0-29.88,0L78,110l-51.62,19a15.92,15.92,0,0,0,0,29.88L78,178l19,51.62a15.92,15.92,0,0,0,29.88,0L146,178l51.62-19a15.92,15.92,0,0,0,0-29.88ZM137,164.22a8,8,0,0,0-4.74,4.74L112,223.85,91.78,169A8,8,0,0,0,87,164.22L32.15,144,87,123.78A8,8,0,0,0,91.78,119L112,64.15,132.22,119a8,8,0,0,0,4.74,4.74L191.85,144ZM144,40a8,8,0,0,1,8-8h16V16a8,8,0,0,1,16,0V32h16a8,8,0,0,1,0,16H184V64a8,8,0,0,1-16,0V48H152A8,8,0,0,1,144,40ZM248,88a8,8,0,0,1-8,8h-8v8a8,8,0,0,1-16,0V96h-8a8,8,0,0,1,0-16h8V72a8,8,0,0,1,16,0v8h8A8,8,0,0,1,248,88Z"></path></svg></div></div>
			<!-- /wp:outermost/icon-block -->

			<!-- wp:paragraph {"className":"ls-hero-prompt-text","style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"200"} -->
			<p class="ls-hero-prompt-text has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark-muted)"><?php echo esc_html__( 'Describe the website you need to plan…', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"className":"ls-hero-prompt-send","style":{"color":{"background":"var(--wp--custom--color--text--on-dark-accent)"},"border":{"radius":"var:preset|border-radius|200"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
			<div class="wp-block-group ls-hero-prompt-send has-background" style="border-radius:var(--wp--preset--border-radius--200);background-color:var(--wp--custom--color--text--on-dark-accent);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
				<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"17px","style":{"color":{"text":"var(--wp--custom--color--text--on-light)"}}} -->
				<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--text--on-light);width:17px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg></div></div>
				<!-- /wp:outermost/icon-block -->
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
