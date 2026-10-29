<?php
/**
 * Title: Section - Search Useful Destinations
 * Slug: ls-theme/search-useful-destinations
 * Categories: featured
 * Block Types: core/pattern
 * Description: The Search template's "Useful destinations" section: eyebrow badge, heading, and
 * a 4-tile grid of next-step links using the Card - Category style. Always shown below the
 * results list regardless of result count, matching the 404 template's "Best next routes"
 * section. Reuses the same is-style-card-category/ls-icon-well-brand/is-style-link-arrow-accent
 * styles and the same Phosphor icon markup as patterns/sections/404-best-next-routes.php (kept
 * as a separate, self-contained file per this repo's one-pattern-per-file rule rather than a
 * shared cross-pattern reference). Uses the Content Band section style for its top/bottom
 * padding so it sits flush against the footer with no reliance on root blockGap (which
 * WordPress core zeroes against template parts).
 * Keywords: search, no results, related routes, navigation, section
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
			<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"8px","style":{"color":{"text":"var(--wp--custom--color--icon--background)"}}} -->
			<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--icon--background);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
			<!-- /wp:outermost/icon-block -->

			<!-- wp:paragraph {"className":"ls-optical-trim","style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold","lineHeight":"1"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size ls-optical-trim" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);line-height:1;text-transform:uppercase"><?php echo esc_html__( 'Useful destinations', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:heading {"textAlign":"center","level":2,"className":"ls-optical-trim","style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold","lineHeight":"1"},"spacing":{"margin":{"top":"var:preset|spacing|70"}}},"fontSize":"600"} -->
		<h2 class="wp-block-heading has-text-align-center has-600-font-size ls-optical-trim" style="margin-top:var(--wp--preset--spacing--70);font-weight:var(--wp--custom--typography--font-weight--extrabold);line-height:1"><?php echo esc_html__( 'If search did not resolve, try one of these.', 'ls-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|70"}}},"layout":{"type":"grid","minimumColumnWidth":"280px","columnGap":"var:preset|spacing|20","rowGap":"var:preset|spacing|20"}} -->
		<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--70)">

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
					<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html__( 'Services', 'ls-theme' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
					<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'What we do across the full WordPress lifecycle.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"className":"is-style-link-arrow-accent"} -->
				<p class="is-style-link-arrow-accent"><a class="ls-card-category__link" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php echo esc_html__( 'Explore services', 'ls-theme' ); ?></a></p>
				<!-- /wp:paragraph -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-category","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-category">
				<!-- wp:group {"className":"ls-icon-well-brand"} -->
				<div class="wp-block-group ls-icon-well-brand">
					<!-- wp:icon {"icon":"lightspeed/folder","style":{"dimensions":{"width":"18px"}}} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"ls-card-category__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<div class="wp-block-group ls-card-category__content">
					<!-- wp:heading {"level":3,"fontSize":"300"} -->
					<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html__( 'Our work', 'ls-theme' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
					<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Case studies and proof of what we deliver.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"className":"is-style-link-arrow-accent"} -->
				<p class="is-style-link-arrow-accent"><a class="ls-card-category__link" href="<?php echo esc_url( home_url( '/work/' ) ); ?>"><?php echo esc_html__( 'See our work', 'ls-theme' ); ?></a></p>
				<!-- /wp:paragraph -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-category","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-category">
				<!-- wp:group {"className":"ls-icon-well-brand"} -->
				<div class="wp-block-group ls-icon-well-brand">
					<!-- wp:icon {"icon":"lightspeed/notepad","style":{"dimensions":{"width":"18px"}}} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"ls-card-category__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<div class="wp-block-group ls-card-category__content">
					<!-- wp:heading {"level":3,"fontSize":"300"} -->
					<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html__( 'Blog', 'ls-theme' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
					<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Practical writing on WordPress and delivery.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"className":"is-style-link-arrow-accent"} -->
				<p class="is-style-link-arrow-accent"><a class="ls-card-category__link" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php echo esc_html__( 'Read the blog', 'ls-theme' ); ?></a></p>
				<!-- /wp:paragraph -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-category","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-category">
				<!-- wp:group {"className":"ls-icon-well-brand"} -->
				<div class="wp-block-group ls-icon-well-brand">
					<!-- wp:outermost/icon-block {"iconName":"","width":"18px"} -->
					<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:18px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48ZM203.43,64,128,133.15,52.57,64ZM216,192H40V74.19l82.59,75.71a8,8,0,0,0,10.82,0L216,74.19V192Z"></path></svg></div></div>
					<!-- /wp:outermost/icon-block -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"ls-card-category__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<div class="wp-block-group ls-card-category__content">
					<!-- wp:heading {"level":3,"fontSize":"300"} -->
					<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html__( 'Contact', 'ls-theme' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
					<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'When search does not resolve the need.', 'ls-theme' ); ?></p>
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
