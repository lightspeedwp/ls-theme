<?php
/**
 * Title: Section - Homepage Where To Fit
 * Slug: ls-theme/homepage-where-to-fit
 * Categories: featured
 * Block Types: core/pattern
 * Description: The Homepage "Where to fit" section: eyebrow, heading, copy, and a 3-card package row (Foundation/Growth/Enterprise). The middle "Growth" card is pre-styled with its active border/shadow as a permanent rest-state treatment (it is the featured/"Most chosen" package, not actually hovered) — the other two cards only gain that border/shadow on hover. All 3 cards lift slightly on hover.
 * Keywords: homepage, where to fit, packages, pricing, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band">

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
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Where to fit', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"0"}}},"fontSize":"700"} -->
			<h2 class="wp-block-heading has-700-font-size" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:0;font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Foundation, Growth or Enterprise — choose the route that matches your stage.', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"0"}}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted);margin-top:var(--wp--preset--spacing--20);margin-bottom:0"><?php echo esc_html__( 'Packages help you see where you are likely to fit and what kind of engagement makes sense. They are not a promise that complex work becomes simple.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:columns {"align":"wide","className":"ls-homepage-card-row","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
		<div class="wp-block-columns alignwide ls-homepage-card-row" style="margin-top:var(--wp--preset--spacing--50)">

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"tagName":"article","className":"ls-package-card is-style-card-package","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<article class="wp-block-group ls-package-card is-style-card-package">
					<!-- wp:group {"className":"ls-icon-well-brand"} -->
					<div class="wp-block-group ls-icon-well-brand">
						<!-- wp:icon {"icon":"lightspeed/house","style":{"dimensions":{"width":"20px"}}} /-->
					</div>
					<!-- /wp:group -->

					<!-- wp:heading {"level":3,"fontSize":"500"} -->
					<h3 class="wp-block-heading has-500-font-size"><?php echo esc_html__( 'Foundation', 'ls-theme' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
					<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'A stronger baseline for teams that need a cleaner reset.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:group {"className":"ls-package-card__list","style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"var:preset|spacing|10"},"padding":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
					<div class="wp-block-group ls-package-card__list" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;margin-top:var(--wp--preset--spacing--10);padding-top:var(--wp--preset--spacing--30)">
						<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
						<div class="wp-block-group">
							<!-- wp:group {"style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent)"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
							<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
								<!-- wp:icon {"icon":"lightspeed/check","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"9px"}}} /-->
							</div>
							<!-- /wp:group -->

							<!-- wp:paragraph {"fontSize":"200"} -->
							<p class="has-200-font-size"><?php echo esc_html__( 'Structured discovery', 'ls-theme' ); ?></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->

						<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
						<div class="wp-block-group">
							<!-- wp:group {"style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent)"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
							<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
								<!-- wp:icon {"icon":"lightspeed/check","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"9px"}}} /-->
							</div>
							<!-- /wp:group -->

							<!-- wp:paragraph {"fontSize":"200"} -->
							<p class="has-200-font-size"><?php echo esc_html__( 'Cleaner platform baseline', 'ls-theme' ); ?></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->

						<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
						<div class="wp-block-group">
							<!-- wp:group {"style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent)"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
							<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
								<!-- wp:icon {"icon":"lightspeed/check","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"9px"}}} /-->
							</div>
							<!-- /wp:group -->

							<!-- wp:paragraph {"fontSize":"200"} -->
							<p class="has-200-font-size"><?php echo esc_html__( 'Performance foundations', 'ls-theme' ); ?></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->

						<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
						<div class="wp-block-group">
							<!-- wp:group {"style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent)"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
							<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
								<!-- wp:icon {"icon":"lightspeed/check","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"9px"}}} /-->
							</div>
							<!-- /wp:group -->

							<!-- wp:paragraph {"fontSize":"200"} -->
							<p class="has-200-font-size"><?php echo esc_html__( 'Internal team enablement', 'ls-theme' ); ?></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"className":"is-style-link-arrow-accent","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}}} -->
					<p class="is-style-link-arrow-accent" style="margin-top:var(--wp--preset--spacing--20)"><a class="ls-package-card__link" href="<?php echo esc_url( home_url( '/packages/foundation/' ) ); ?>"><?php echo esc_html__( 'Read about Foundation', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</article>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"tagName":"article","className":"ls-package-card is-featured is-style-card-package","style":{"border":{"color":"var:custom|color|text|brand"},"shadow":"var:custom|shadow|elevation|400"},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<article class="wp-block-group ls-package-card is-featured is-style-card-package has-border-color" style="border-color:var(--wp--custom--color--text--brand);box-shadow:var(--wp--custom--shadow--elevation--400)">
					<!-- wp:group {"className":"ls-package-card__badge-row","layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"top"}} -->
					<div class="wp-block-group ls-package-card__badge-row">
						<!-- wp:group {"className":"ls-icon-well-brand"} -->
						<div class="wp-block-group ls-icon-well-brand">
							<!-- wp:icon {"icon":"lightspeed/trending-up","style":{"dimensions":{"width":"20px"}}} /-->
						</div>
						<!-- /wp:group -->

						<!-- wp:paragraph {"className":"ls-package-card__badge","style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 14%, transparent)","text":"var(--wp--custom--color--text--brand)"},"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wide","fontWeight":"var:custom|typography|font-weight|bold"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"auto"},"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|10","bottom":"var:preset|spacing|5","left":"var:preset|spacing|10"}}},"fontSize":"100"} -->
						<p class="ls-package-card__badge has-text-color has-background has-100-font-size" style="border-radius:var(--wp--preset--border-radius--500);color:var(--wp--custom--color--text--brand);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 14%, transparent);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--wide);margin-top:0;margin-right:0;margin-bottom:0;margin-left:auto;padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--10);text-transform:uppercase"><?php echo esc_html__( 'Most chosen', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:heading {"level":3,"fontSize":"500"} -->
					<h3 class="wp-block-heading has-500-font-size"><?php echo esc_html__( 'Growth', 'ls-theme' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
					<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'For organisations with traction that need the platform to support more.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:group {"className":"ls-package-card__list","style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"var:preset|spacing|10"},"padding":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
					<div class="wp-block-group ls-package-card__list" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;margin-top:var(--wp--preset--spacing--10);padding-top:var(--wp--preset--spacing--30)">
						<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
						<div class="wp-block-group">
							<!-- wp:group {"style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent)"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
							<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
								<!-- wp:icon {"icon":"lightspeed/check","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"9px"}}} /-->
							</div>
							<!-- /wp:group -->

							<!-- wp:paragraph {"fontSize":"200"} -->
							<p class="has-200-font-size"><?php echo esc_html__( 'Conversion and journey work', 'ls-theme' ); ?></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->

						<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
						<div class="wp-block-group">
							<!-- wp:group {"style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent)"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
							<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
								<!-- wp:icon {"icon":"lightspeed/check","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"9px"}}} /-->
							</div>
							<!-- /wp:group -->

							<!-- wp:paragraph {"fontSize":"200"} -->
							<p class="has-200-font-size"><?php echo esc_html__( 'Editorial operations', 'ls-theme' ); ?></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->

						<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
						<div class="wp-block-group">
							<!-- wp:group {"style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent)"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
							<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
								<!-- wp:icon {"icon":"lightspeed/check","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"9px"}}} /-->
							</div>
							<!-- /wp:group -->

							<!-- wp:paragraph {"fontSize":"200"} -->
							<p class="has-200-font-size"><?php echo esc_html__( 'Stronger design-system layer', 'ls-theme' ); ?></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->

						<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
						<div class="wp-block-group">
							<!-- wp:group {"style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent)"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
							<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
								<!-- wp:icon {"icon":"lightspeed/check","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"9px"}}} /-->
							</div>
							<!-- /wp:group -->

							<!-- wp:paragraph {"fontSize":"200"} -->
							<p class="has-200-font-size"><?php echo esc_html__( 'Governance maturity', 'ls-theme' ); ?></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"className":"is-style-link-arrow-accent","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}}} -->
					<p class="is-style-link-arrow-accent" style="margin-top:var(--wp--preset--spacing--20)"><a class="ls-package-card__link" href="<?php echo esc_url( home_url( '/packages/growth/' ) ); ?>"><?php echo esc_html__( 'Read about Growth', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</article>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"tagName":"article","className":"ls-package-card is-style-card-package","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<article class="wp-block-group ls-package-card is-style-card-package">
					<!-- wp:group {"className":"ls-icon-well-brand"} -->
					<div class="wp-block-group ls-icon-well-brand">
						<!-- wp:icon {"icon":"lightspeed/building-office","style":{"dimensions":{"width":"20px"}}} /-->
					</div>
					<!-- /wp:group -->

					<!-- wp:heading {"level":3,"fontSize":"500"} -->
					<h3 class="wp-block-heading has-500-font-size"><?php echo esc_html__( 'Enterprise', 'ls-theme' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
					<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'For larger orgs where governance and integrations matter more deeply.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:group {"className":"ls-package-card__list","style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"var:preset|spacing|10"},"padding":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
					<div class="wp-block-group ls-package-card__list" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;margin-top:var(--wp--preset--spacing--10);padding-top:var(--wp--preset--spacing--30)">
						<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
						<div class="wp-block-group">
							<!-- wp:group {"style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent)"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
							<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
								<!-- wp:icon {"icon":"lightspeed/check","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"9px"}}} /-->
							</div>
							<!-- /wp:group -->

							<!-- wp:paragraph {"fontSize":"200"} -->
							<p class="has-200-font-size"><?php echo esc_html__( 'Migration depth', 'ls-theme' ); ?></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->

						<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
						<div class="wp-block-group">
							<!-- wp:group {"style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent)"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
							<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
								<!-- wp:icon {"icon":"lightspeed/check","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"9px"}}} /-->
							</div>
							<!-- /wp:group -->

							<!-- wp:paragraph {"fontSize":"200"} -->
							<p class="has-200-font-size"><?php echo esc_html__( 'Cross-team delivery', 'ls-theme' ); ?></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->

						<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
						<div class="wp-block-group">
							<!-- wp:group {"style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent)"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
							<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
								<!-- wp:icon {"icon":"lightspeed/check","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"9px"}}} /-->
							</div>
							<!-- /wp:group -->

							<!-- wp:paragraph {"fontSize":"200"} -->
							<p class="has-200-font-size"><?php echo esc_html__( 'Long-term platform reliability', 'ls-theme' ); ?></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->

						<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
						<div class="wp-block-group">
							<!-- wp:group {"style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent)"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
							<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 16%, transparent);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
								<!-- wp:icon {"icon":"lightspeed/check","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"9px"}}} /-->
							</div>
							<!-- /wp:group -->

							<!-- wp:paragraph {"fontSize":"200"} -->
							<p class="has-200-font-size"><?php echo esc_html__( 'Training and handover', 'ls-theme' ); ?></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"className":"is-style-link-arrow-accent","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}}} -->
					<p class="is-style-link-arrow-accent" style="margin-top:var(--wp--preset--spacing--20)"><a class="ls-package-card__link" href="<?php echo esc_url( home_url( '/packages/enterprise/' ) ); ?>"><?php echo esc_html__( 'Read about Enterprise', 'ls-theme' ); ?></a></p>
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
