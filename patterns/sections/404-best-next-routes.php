<?php
/**
 * Title: Section - 404 Best Next Routes
 * Slug: ls-theme/404-best-next-routes
 * Categories: featured
 * Block Types: core/pattern
 * Description: The 404 template's "Five useful destinations" section: eyebrow badge, heading, and a 5-tile grid of next-step links using the Card - Category style. Uses the Content Band section style for its top/bottom padding so it sits flush against the footer with no reliance on root blockGap (which WordPress core zeroes against template parts).
 * Keywords: 404, not found, related routes, navigation, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"wide","tagName":"section","className":"is-style-content-band","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignwide is-style-content-band">

	<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--icon--background)"},"dimensions":{"width":"8px"}}} /-->

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Best next routes', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"600"} -->
		<h2 class="wp-block-heading has-text-align-center has-600-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Five useful destinations from here.', 'ls-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"grid","minimumColumnWidth":"280px","columnGap":"var:preset|spacing|20","rowGap":"var:preset|spacing|20"}} -->
		<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--40)">

			<!-- wp:group {"tagName":"article","className":"is-style-card-category","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-category">
				<!-- wp:group {"className":"ls-icon-well-brand"} -->
				<div class="wp-block-group ls-icon-well-brand">
					<!-- wp:icon {"icon":"lightspeed/house","style":{"dimensions":{"width":"18px"}}} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"ls-card-category__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<div class="wp-block-group ls-card-category__content">
					<!-- wp:heading {"level":3,"fontSize":"300"} -->
					<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html__( 'Homepage', 'ls-theme' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
					<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'A fast way back into the site when the requested page cannot be found.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"className":"is-style-link-arrow-accent"} -->
				<p class="is-style-link-arrow-accent"><a class="ls-card-category__link" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Go home', 'ls-theme' ); ?></a></p>
				<!-- /wp:paragraph -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-category","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-category">
				<!-- wp:group {"className":"ls-icon-well-brand"} -->
				<div class="wp-block-group ls-icon-well-brand">
					<!-- wp:icon {"icon":"lightspeed/tag","style":{"dimensions":{"width":"18px"}}} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"ls-card-category__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<div class="wp-block-group ls-card-category__content">
					<!-- wp:heading {"level":3,"fontSize":"300"} -->
					<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html__( 'Pricing', 'ls-theme' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
					<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'A useful destination for users who may have arrived while evaluating options.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"className":"is-style-link-arrow-accent"} -->
				<p class="is-style-link-arrow-accent"><a class="ls-card-category__link" href="<?php echo esc_url( home_url( '/pricing/' ) ); ?>"><?php echo esc_html__( 'Read about pricing', 'ls-theme' ); ?></a></p>
				<!-- /wp:paragraph -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-category","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-category">
				<!-- wp:group {"className":"ls-icon-well-brand"} -->
				<div class="wp-block-group ls-icon-well-brand">
					<!-- wp:icon {"icon":"lightspeed/archive","style":{"dimensions":{"width":"18px"}}} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"ls-card-category__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<div class="wp-block-group ls-card-category__content">
					<!-- wp:heading {"level":3,"fontSize":"300"} -->
					<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html__( 'Website packages', 'ls-theme' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
					<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'A good route for visitors trying to understand delivery fit.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"className":"is-style-link-arrow-accent"} -->
				<p class="is-style-link-arrow-accent"><a class="ls-card-category__link" href="<?php echo esc_url( home_url( '/website-packages/' ) ); ?>"><?php echo esc_html__( 'Website packages', 'ls-theme' ); ?></a></p>
				<!-- /wp:paragraph -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-category","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-category">
				<!-- wp:group {"className":"ls-icon-well-brand"} -->
				<div class="wp-block-group ls-icon-well-brand">
					<!-- wp:icon {"icon":"lightspeed/help","style":{"dimensions":{"width":"18px"}}} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"ls-card-category__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<div class="wp-block-group ls-card-category__content">
					<!-- wp:heading {"level":3,"fontSize":"300"} -->
					<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html__( 'FAQ', 'ls-theme' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
					<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Helpful for users who are trying to orient themselves quickly.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"className":"is-style-link-arrow-accent"} -->
				<p class="is-style-link-arrow-accent"><a class="ls-card-category__link" href="<?php echo esc_url( home_url( '/faq/' ) ); ?>"><?php echo esc_html__( 'Read the FAQ', 'ls-theme' ); ?></a></p>
				<!-- /wp:paragraph -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-category","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-category">
				<!-- wp:group {"className":"ls-icon-well-brand"} -->
				<div class="wp-block-group ls-icon-well-brand">
					<!-- wp:icon {"icon":"lightspeed/envelope","style":{"dimensions":{"width":"18px"}}} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"ls-card-category__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<div class="wp-block-group ls-card-category__content">
					<!-- wp:heading {"level":3,"fontSize":"300"} -->
					<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html__( 'Contact', 'ls-theme' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
					<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Useful when a visitor needs human help rather than another search step.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"className":"is-style-link-arrow-accent"} -->
				<p class="is-style-link-arrow-accent"><a class="ls-card-category__link" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php echo esc_html__( 'Contact options', 'ls-theme' ); ?></a></p>
				<!-- /wp:paragraph -->
			</article>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
