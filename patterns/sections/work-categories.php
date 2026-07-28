<?php
/**
 * Title: Section - Work Categories
 * Slug: ls-theme/work-categories
 * Categories: featured
 * Block Types: core/pattern
 * Description: The Work archive's "Three recurring areas of work" section: eyebrow badge, heading, and description in a two-column row, followed by a WordPress/WooCommerce/Design-System card row using the compact Card - Work Category style with tinted icon wells.
 * Keywords: work, categories, archive, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-center">

			<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%">
				<!-- wp:pattern {"slug":"ls-theme/eyebrow-badge"} /-->

				<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"500"} -->
				<h2 class="wp-block-heading has-500-font-size" style="margin-top:var(--wp--preset--spacing--20);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Three recurring areas of work.', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Whatever the platform, our case studies fall into one of three recurring categories of delivery work.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
		<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--40)">

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"tagName":"article","className":"is-style-card-category","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<article class="wp-block-group is-style-card-category">
					<!-- wp:group {"className":"is-style-icon-well-brand"} -->
					<div class="wp-block-group is-style-icon-well-brand">
						<!-- wp:outermost/icon-block {"iconName":"","width":"18px"} -->
						<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:18px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M104,40H56A16,16,0,0,0,40,56v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,104,40Zm0,64H56V56h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,200,40Zm0,64H152V56h48v48Zm-96,32H56a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,104,136Zm0,64H56V152h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,200,136Zm0,64H152V152h48v48Z"></path></svg></div></div>
						<!-- /wp:outermost/icon-block -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"ls-card-category__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
					<div class="wp-block-group ls-card-category__content">
						<!-- wp:heading {"level":3,"fontSize":"300"} -->
						<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html__( 'WordPress Work', 'ls-theme' ); ?></h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
						<p style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Examples grouped around platform structure, maintainability and redesign decisions.', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"className":"is-style-link-arrow-accent"} -->
					<p class="is-style-link-arrow-accent"><a href="<?php echo esc_url( home_url( '/work/' ) ); ?>"><?php echo esc_html__( 'See WordPress work', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</article>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"tagName":"article","className":"is-style-card-category","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<article class="wp-block-group is-style-card-category">
					<!-- wp:group {"className":"is-style-icon-well-brand"} -->
					<div class="wp-block-group is-style-icon-well-brand">
						<!-- wp:outermost/icon-block {"iconName":"","width":"18px"} -->
						<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:18px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M230.14,58.87A8,8,0,0,0,224,56H62.68L56.6,22.57A8,8,0,0,0,48.73,16H24a8,8,0,0,0,0,16h18L67.56,172.29a24,24,0,0,0,5.33,11.27,28,28,0,1,0,44.4,8.44h45.42A27.75,27.75,0,0,0,160,204a28,28,0,1,0,28-28H91.17a8,8,0,0,1-7.87-6.57L80.13,152h116a24,24,0,0,0,23.61-19.71l12.16-66.86A8,8,0,0,0,230.14,58.87ZM104,204a12,12,0,1,1-12-12A12,12,0,0,1,104,204Zm96,0a12,12,0,1,1-12-12A12,12,0,0,1,200,204Zm4-74.57A8,8,0,0,1,196.1,136H77.22L65.59,72H214.41Z"></path></svg></div></div>
						<!-- /wp:outermost/icon-block -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"ls-card-category__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
					<div class="wp-block-group ls-card-category__content">
						<!-- wp:heading {"level":3,"fontSize":"300"} -->
						<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html__( 'WooCommerce Work', 'ls-theme' ); ?></h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
						<p style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Examples grouped around ecommerce complexity, conversion and operational pressure.', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"className":"is-style-link-arrow-accent"} -->
					<p class="is-style-link-arrow-accent"><a href="<?php echo esc_url( home_url( '/work/' ) ); ?>"><?php echo esc_html__( 'See WooCommerce work', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</article>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"tagName":"article","className":"is-style-card-category","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<article class="wp-block-group is-style-card-category">
					<!-- wp:group {"className":"is-style-icon-well-brand"} -->
					<div class="wp-block-group is-style-icon-well-brand">
						<!-- wp:outermost/icon-block {"iconName":"","width":"18px"} -->
						<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:18px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M223.68,66.15,135.68,18h0a15.88,15.88,0,0,0-15.36,0l-88,48.17a16,16,0,0,0-8.32,14v95.64a16,16,0,0,0,8.32,14l88,48.17a15.88,15.88,0,0,0,15.36,0l88-48.17a16,16,0,0,0,8.32-14V80.18A16,16,0,0,0,223.68,66.15ZM128,32h0l80.34,44L128,120,47.66,76ZM40,90l80,43.78v85.79L40,175.82Zm96,129.57V133.82L216,90v85.78Z"></path></svg></div></div>
						<!-- /wp:outermost/icon-block -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"ls-card-category__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
					<div class="wp-block-group ls-card-category__content">
						<!-- wp:heading {"level":3,"fontSize":"300"} -->
						<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html__( 'Design-System Work', 'ls-theme' ); ?></h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
						<p style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Examples that connect design consistency to implementation and long-term governance.', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"className":"is-style-link-arrow-accent"} -->
					<p class="is-style-link-arrow-accent"><a href="<?php echo esc_url( home_url( '/work/' ) ); ?>"><?php echo esc_html__( 'See Design-System work', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</article>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
