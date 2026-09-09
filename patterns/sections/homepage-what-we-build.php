<?php
/**
 * Title: Section - Homepage What We Build
 * Slug: ls-theme/homepage-what-we-build
 * Categories: featured
 * Block Types: core/pattern
 * Description: The Homepage "What we build" section: eyebrow, heading, a 4-card row (WordPress platforms/WooCommerce/Design systems/Migrations) using the shared Card - Work Category style with tinted icon wells, and an "All services" outline button.
 * Keywords: homepage, what we build, services, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","style":{"color":{"background":"var:custom|color|surface|card"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band has-background" style="background-color:var(--wp--custom--color--surface--card)">

	<!-- wp:group {"align":"wide"} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
		<div class="wp-block-group">
			<!-- wp:group {"style":{"layout":{"selfStretch":"fixed","flexSize":"800px"}}} -->
			<div class="wp-block-group">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--icon--background)"},"dimensions":{"width":"8px"}}} /-->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'What we build', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"0"}}},"fontSize":"700"} -->
			<h2 class="wp-block-heading has-700-font-size" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:0;font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Specialist WordPress work for teams that need it to last.', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:columns {"align":"wide","className":"ls-what-we-build-row","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}}} -->
		<div class="wp-block-columns alignwide ls-what-we-build-row" style="margin-top:var(--wp--preset--spacing--60)">

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"tagName":"article","className":"is-style-card-category","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<article class="wp-block-group is-style-card-category">
					<!-- wp:group {"className":"ls-icon-well-brand"} -->
					<div class="wp-block-group ls-icon-well-brand">
						<!-- wp:icon {"icon":"lightspeed/category","style":{"dimensions":{"width":"18px"}}} /-->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"ls-card-category__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
					<div class="wp-block-group ls-card-category__content">
						<!-- wp:heading {"level":3,"fontSize":"300"} -->
						<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html__( 'WordPress platforms', 'ls-theme' ); ?></h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
						<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Block-theme rebuilds, redesigns and platform resets for content-heavy sites.', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"className":"is-style-link-arrow-accent"} -->
					<p class="is-style-link-arrow-accent"><a class="ls-card-category__link" href="<?php echo esc_url( home_url( '/services/wordpress/' ) ); ?>"><?php echo esc_html__( 'WordPress solutions', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</article>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"tagName":"article","className":"is-style-card-category","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<article class="wp-block-group is-style-card-category">
					<!-- wp:group {"className":"ls-icon-well-brand"} -->
					<div class="wp-block-group ls-icon-well-brand">
						<!-- wp:icon {"icon":"lightspeed/cart","style":{"dimensions":{"width":"18px"}}} /-->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"ls-card-category__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
					<div class="wp-block-group ls-card-category__content">
						<!-- wp:heading {"level":3,"fontSize":"300"} -->
						<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html__( 'WooCommerce', 'ls-theme' ); ?></h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
						<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Performance, operational clarity and customer journeys for serious commerce.', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"className":"is-style-link-arrow-accent"} -->
					<p class="is-style-link-arrow-accent"><a class="ls-card-category__link" href="<?php echo esc_url( home_url( '/services/woocommerce/' ) ); ?>"><?php echo esc_html__( 'WooCommerce solutions', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</article>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"tagName":"article","className":"is-style-card-category","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<article class="wp-block-group is-style-card-category">
					<!-- wp:group {"className":"ls-icon-well-brand"} -->
					<div class="wp-block-group ls-icon-well-brand">
						<!-- wp:icon {"icon":"lightspeed/puzzle-piece","style":{"dimensions":{"width":"18px"}}} /-->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"ls-card-category__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
					<div class="wp-block-group ls-card-category__content">
						<!-- wp:heading {"level":3,"fontSize":"300"} -->
						<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html__( 'Design systems', 'ls-theme' ); ?></h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
						<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Reusable patterns, theme.json discipline and cleaner handoff from design into build.', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"className":"is-style-link-arrow-accent"} -->
					<p class="is-style-link-arrow-accent"><a class="ls-card-category__link" href="<?php echo esc_url( home_url( '/services/design-systems/' ) ); ?>"><?php echo esc_html__( 'Design System solutions', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</article>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"tagName":"article","className":"is-style-card-category","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<article class="wp-block-group is-style-card-category">
					<!-- wp:group {"className":"ls-icon-well-brand"} -->
					<div class="wp-block-group ls-icon-well-brand">
						<!-- wp:icon {"icon":"lightspeed/arrows-clockwise","style":{"dimensions":{"width":"18px"}}} /-->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"ls-card-category__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
					<div class="wp-block-group ls-card-category__content">
						<!-- wp:heading {"level":3,"fontSize":"300"} -->
						<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html__( 'Migrations', 'ls-theme' ); ?></h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
						<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Migration planning treated as risk management, not just a content move.', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"className":"is-style-link-arrow-accent"} -->
					<p class="is-style-link-arrow-accent"><a class="ls-card-category__link" href="<?php echo esc_url( home_url( '/services/migrations/' ) ); ?>"><?php echo esc_html__( 'Migration services', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</article>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--60)">
			<!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php echo esc_html__( 'All services', 'ls-theme' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
