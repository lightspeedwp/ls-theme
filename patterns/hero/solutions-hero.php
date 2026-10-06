<?php
/**
 * Title: Hero - Solutions
 * Slug: ls-theme/solutions-hero
 * Categories: hero
 * Block Types: core/pattern
 * Description: The Solutions landing page hero: breadcrumb trail, eyebrow badge, heading, description, primary/secondary CTAs and a decorative tilted "solutions / palette" specimen card (two stacked cards, four colour swatches and a paths/tokens footer). Same skeleton as Hero - Services, without the service-pill row. The background uses the shared corner-glow class. Adapts between light and dark mode using existing semantic tokens; the swatch colours are fixed palette presets so the specimen does not change with the mode.
 * Keywords: solutions, hero, landing, palette, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

// Swatch order matches the modifier classes in src/scss/structural/solutions-hero.scss.
$ls_solutions_hero_swatches = array( 'brand', 'violet', 'cyan', 'orange' );
?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-solutions-hero ls-corner-glow","style":{"border":{"bottom":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|30","bottom":"var:preset|spacing|80","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-solutions-hero ls-corner-glow" style="border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;margin-top:0;padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
		<!-- wp:yoast-seo/breadcrumbs {"className":"alignwide"} /-->
		<?php endif; ?>

		<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
		<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30)">
			<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"200"} -->
			<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Solution-specific platforms', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:columns {"align":"wide","verticalAlignment":"top","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"},"blockGap":{"left":"var:preset|spacing|60"}}}} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-top" style="margin-top:var(--wp--preset--spacing--20)">

			<!-- wp:column {"verticalAlignment":"top","width":"68%"} -->
			<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:68%">

				<!-- wp:heading {"level":1,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"900"} -->
				<h1 class="wp-block-heading has-900-font-size" style="font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'WordPress solutions built around real operating models', 'ls-theme' ); ?></h1>
				<!-- /wp:heading -->

				<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
					<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Explore the platform solution that fits your business model, from publishing and ecommerce to travel, redesigns, education and AI-ready systems.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)">
					<!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>"><?php echo esc_html__( 'Discuss your platform', 'ls-theme' ); ?></a></div>
					<!-- /wp:button -->

					<!-- wp:button {"className":"is-style-outline"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php echo esc_html__( 'Explore our services', 'ls-theme' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"top","width":"32%"} -->
			<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:32%">
				<!-- wp:group {"className":"ls-specimen-card","layout":{"type":"default"}} -->
				<div class="wp-block-group ls-specimen-card">

					<!-- wp:spacer {"height":"0px","className":"ls-specimen-card__back"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer ls-specimen-card__back"></div>
					<!-- /wp:spacer -->

					<!-- wp:group {"className":"ls-specimen-card__front","style":{"color":{"background":"var:custom|color|surface|card"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|400","style":"solid","width":"1px"},"shadow":"var:preset|shadow|100","spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|20","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"stretch"}} -->
					<div class="wp-block-group ls-specimen-card__front has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--400);background-color:var(--wp--custom--color--surface--card);box-shadow:var(--wp--preset--shadow--100);padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--30)">

						<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"200"} -->
						<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Solutions / Palette', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:group {"className":"ls-specimen-card__swatches","layout":{"type":"default"}} -->
						<div class="wp-block-group ls-specimen-card__swatches">
							<?php foreach ( $ls_solutions_hero_swatches as $ls_swatch ) : ?>
							<!-- wp:spacer {"height":"0px","className":"ls-specimen-card__swatch ls-specimen-card__swatch--<?php echo esc_attr( $ls_swatch ); ?>"} -->
							<div style="height:0px" aria-hidden="true" class="wp-block-spacer ls-specimen-card__swatch ls-specimen-card__swatch--<?php echo esc_attr( $ls_swatch ); ?>"></div>
							<!-- /wp:spacer -->
							<?php endforeach; ?>
						</div>
						<!-- /wp:group -->

						<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"dashed","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
						<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:dashed;border-top-width:1px;padding-top:var(--wp--preset--spacing--10)">
							<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
							<div class="wp-block-group">
								<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"200"} -->
								<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'paths', 'ls-theme' ); ?></p>
								<!-- /wp:paragraph -->

								<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace"},"color":{"text":"var(--wp--custom--color--text--default)"}},"fontSize":"200"} -->
								<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--default);font-family:var(--wp--preset--font-family--monospace)"><?php echo esc_html__( '7 / 7', 'ls-theme' ); ?></p>
								<!-- /wp:paragraph -->
							</div>
							<!-- /wp:group -->

							<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
							<div class="wp-block-group">
								<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"200"} -->
								<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'tokens', 'ls-theme' ); ?></p>
								<!-- /wp:paragraph -->

								<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace"},"color":{"text":"var(--wp--custom--color--text--default)"}},"fontSize":"200"} -->
								<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--default);font-family:var(--wp--preset--font-family--monospace)"><?php echo esc_html__( 'live', 'ls-theme' ); ?></p>
								<!-- /wp:paragraph -->
							</div>
							<!-- /wp:group -->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
