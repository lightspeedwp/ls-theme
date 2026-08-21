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

		<!-- wp:group {"style":{"dimensions":{"maxWidth":"var(--wp--style--global--content-size)"}},"layout":{"type":"flow"}} -->
		<div class="wp-block-group" style="max-width:var(--wp--style--global--content-size)">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"8px","style":{"color":{"text":"var(--wp--custom--color--icon--background)"}}} -->
				<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" aria-hidden="true" style="color:var(--wp--custom--color--icon--background);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
				<!-- /wp:outermost/icon-block -->

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

		<!-- wp:columns {"align":"wide","className":"ls-what-we-build-row","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}}} -->
		<div class="wp-block-columns alignwide ls-what-we-build-row" style="margin-top:var(--wp--preset--spacing--60)">

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"tagName":"article","className":"is-style-card-category","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<article class="wp-block-group is-style-card-category">
					<!-- wp:group {"className":"ls-icon-well-brand"} -->
					<div class="wp-block-group ls-icon-well-brand">
						<!-- wp:outermost/icon-block {"iconName":"","width":"18px"} -->
						<div class="wp-block-outermost-icon-block"><div class="icon-container" aria-hidden="true" style="width:18px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M104,40H56A16,16,0,0,0,40,56v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,104,40Zm0,64H56V56h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,200,40Zm0,64H152V56h48v48Zm-96,32H56a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,104,136Zm0,64H56V152h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,200,136Zm0,64H152V152h48v48Z"></path></svg></div></div>
						<!-- /wp:outermost/icon-block -->
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
					<p class="is-style-link-arrow-accent"><a href="<?php echo esc_url( home_url( '/services/wordpress/' ) ); ?>"><?php echo esc_html__( 'WordPress solutions', 'ls-theme' ); ?></a></p>
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
						<!-- wp:outermost/icon-block {"iconName":"","width":"18px"} -->
						<div class="wp-block-outermost-icon-block"><div class="icon-container" aria-hidden="true" style="width:18px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M230.14,58.87A8,8,0,0,0,224,56H62.68L56.6,22.57A8,8,0,0,0,48.73,16H24a8,8,0,0,0,0,16h18L67.56,172.29a24,24,0,0,0,5.33,11.27,28,28,0,1,0,44.4,8.44h45.42A27.75,27.75,0,0,0,160,204a28,28,0,1,0,28-28H91.17a8,8,0,0,1-7.87-6.57L80.13,152h116a24,24,0,0,0,23.61-19.71l12.16-66.86A8,8,0,0,0,230.14,58.87ZM104,204a12,12,0,1,1-12-12A12,12,0,0,1,104,204Zm96,0a12,12,0,1,1-12-12A12,12,0,0,1,200,204Zm4-74.57A8,8,0,0,1,196.1,136H77.22L65.59,72H214.41Z"></path></svg></div></div>
						<!-- /wp:outermost/icon-block -->
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
					<p class="is-style-link-arrow-accent"><a href="<?php echo esc_url( home_url( '/services/woocommerce/' ) ); ?>"><?php echo esc_html__( 'WooCommerce solutions', 'ls-theme' ); ?></a></p>
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
						<!-- wp:outermost/icon-block {"iconName":"","width":"18px"} -->
						<div class="wp-block-outermost-icon-block"><div class="icon-container" aria-hidden="true" style="width:18px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M220.27,158.54a8,8,0,0,0-7.7-.46,20,20,0,1,1,0-36.16A8,8,0,0,0,224,114.69V72a16,16,0,0,0-16-16H171.78a35.36,35.36,0,0,0,.22-4,36.11,36.11,0,0,0-11.36-26.24,36,36,0,0,0-60.55,23.62,36.56,36.56,0,0,0,.14,6.62H64A16,16,0,0,0,48,72v32.22a35.36,35.36,0,0,0-4-.22,36.12,36.12,0,0,0-26.24,11.36,35.7,35.7,0,0,0-9.69,27,36.08,36.08,0,0,0,33.31,33.6,35.68,35.68,0,0,0,6.62-.14V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V165.31A8,8,0,0,0,220.27,158.54ZM208,208H64V165.31a8,8,0,0,0-11.43-7.23,20,20,0,1,1,0-36.16A8,8,0,0,0,64,114.69V72h46.69a8,8,0,0,0,7.23-11.43,20,20,0,1,1,36.16,0A8,8,0,0,0,161.31,72H208v32.23a35.68,35.68,0,0,0-6.62-.14A36,36,0,0,0,204,176a35.36,35.36,0,0,0,4-.22Z"></path></svg></div></div>
						<!-- /wp:outermost/icon-block -->
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
					<p class="is-style-link-arrow-accent"><a href="<?php echo esc_url( home_url( '/services/design-systems/' ) ); ?>"><?php echo esc_html__( 'Design System solutions', 'ls-theme' ); ?></a></p>
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
						<!-- wp:outermost/icon-block {"iconName":"","width":"18px"} -->
						<div class="wp-block-outermost-icon-block"><div class="icon-container" aria-hidden="true" style="width:18px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M224,48V96a8,8,0,0,1-8,8H168a8,8,0,0,1,0-16h28.69L182.06,73.37a79.56,79.56,0,0,0-56.13-23.43h-.45A79.52,79.52,0,0,0,69.59,72.71,8,8,0,0,1,58.41,61.27a96,96,0,0,1,135,.79L208,76.69V48a8,8,0,0,1,16,0ZM186.41,183.29a80,80,0,0,1-112.47-.66L59.31,168H88a8,8,0,0,0,0-16H40a8,8,0,0,0-8,8v48a8,8,0,0,0,16,0V179.31l14.63,14.63A95.43,95.43,0,0,0,130,222.06h.53a95.36,95.36,0,0,0,67.07-27.33,8,8,0,0,0-11.18-11.44Z"></path></svg></div></div>
						<!-- /wp:outermost/icon-block -->
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
					<p class="is-style-link-arrow-accent"><a href="<?php echo esc_url( home_url( '/services/migrations/' ) ); ?>"><?php echo esc_html__( 'Migration services', 'ls-theme' ); ?></a></p>
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
