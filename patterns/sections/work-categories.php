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
					<!-- wp:group {"className":"ls-icon-well-brand"} -->
					<div class="wp-block-group ls-icon-well-brand">
						<!-- wp:icon {"icon":"lightspeed/category","style":{"dimensions":{"width":"18px"}}} /-->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"ls-card-category__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
					<div class="wp-block-group ls-card-category__content">
						<!-- wp:heading {"level":3,"fontSize":"300"} -->
						<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html__( 'WordPress Work', 'ls-theme' ); ?></h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
						<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Examples grouped around platform structure, maintainability and redesign decisions.', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"className":"is-style-link-arrow-accent"} -->
					<p class="is-style-link-arrow-accent"><a class="ls-card-category__link" href="<?php echo esc_url( add_query_arg( 'filter-0-project-group', 'wordpress', home_url( '/work/' ) ) ); ?>"><?php echo esc_html__( 'See WordPress work', 'ls-theme' ); ?></a></p>
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
						<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html__( 'WooCommerce Work', 'ls-theme' ); ?></h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
						<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Examples grouped around ecommerce complexity, conversion and operational pressure.', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"className":"is-style-link-arrow-accent"} -->
					<p class="is-style-link-arrow-accent"><a class="ls-card-category__link" href="<?php echo esc_url( add_query_arg( 'filter-0-project-group', 'woocommerce', home_url( '/work/' ) ) ); ?>"><?php echo esc_html__( 'See WooCommerce work', 'ls-theme' ); ?></a></p>
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
						<!-- wp:icon {"icon":"lightspeed/cube","style":{"dimensions":{"width":"18px"}}} /-->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"ls-card-category__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
					<div class="wp-block-group ls-card-category__content">
						<!-- wp:heading {"level":3,"fontSize":"300"} -->
						<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html__( 'Design-System Work', 'ls-theme' ); ?></h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
						<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Examples that connect design consistency to implementation and long-term governance.', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"className":"is-style-link-arrow-accent"} -->
					<p class="is-style-link-arrow-accent"><a class="ls-card-category__link" href="<?php echo esc_url( home_url( '/work/' ) ); ?>"><?php echo esc_html__( 'See Design-System work', 'ls-theme' ); ?></a></p>
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
