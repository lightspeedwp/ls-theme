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

		<!-- wp:group {"style":{"dimensions":{"maxWidth":"var(--wp--style--global--content-size)"}},"layout":{"type":"flow"}} -->
		<div class="wp-block-group" style="max-width:var(--wp--style--global--content-size)">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"8px","style":{"color":{"text":"var(--wp--custom--color--icon--background)"}}} -->
				<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" aria-hidden="true" style="color:var(--wp--custom--color--icon--background);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
				<!-- /wp:outermost/icon-block -->

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

		<!-- wp:columns {"align":"wide","className":"ls-homepage-card-row","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
		<div class="wp-block-columns alignwide ls-homepage-card-row" style="margin-top:var(--wp--preset--spacing--50)">

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"tagName":"article","className":"ls-package-card is-style-card-package","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<article class="wp-block-group ls-package-card is-style-card-package">
					<!-- wp:group {"className":"ls-icon-well-brand"} -->
					<div class="wp-block-group ls-icon-well-brand">
						<!-- wp:outermost/icon-block {"iconName":"","width":"20px"} -->
						<div class="wp-block-outermost-icon-block"><div class="icon-container" aria-hidden="true" style="width:20px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M219.31,108.68l-80-80a16,16,0,0,0-22.62,0l-80,80A15.87,15.87,0,0,0,32,120v96a8,8,0,0,0,8,8h64a8,8,0,0,0,8-8V160h32v56a8,8,0,0,0,8,8h64a8,8,0,0,0,8-8V120A15.87,15.87,0,0,0,219.31,108.68ZM208,208H160V152a8,8,0,0,0-8-8H104a8,8,0,0,0-8,8v56H48V120l80-80,80,80Z"></path></svg></div></div>
						<!-- /wp:outermost/icon-block -->
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
								<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"9px","style":{"color":{"text":"var(--wp--custom--color--text--brand)"}}} -->
								<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" aria-hidden="true" style="color:var(--wp--custom--color--text--brand);width:9px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path></svg></div></div>
								<!-- /wp:outermost/icon-block -->
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
								<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"9px","style":{"color":{"text":"var(--wp--custom--color--text--brand)"}}} -->
								<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" aria-hidden="true" style="color:var(--wp--custom--color--text--brand);width:9px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path></svg></div></div>
								<!-- /wp:outermost/icon-block -->
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
								<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"9px","style":{"color":{"text":"var(--wp--custom--color--text--brand)"}}} -->
								<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" aria-hidden="true" style="color:var(--wp--custom--color--text--brand);width:9px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path></svg></div></div>
								<!-- /wp:outermost/icon-block -->
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
								<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"9px","style":{"color":{"text":"var(--wp--custom--color--text--brand)"}}} -->
								<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" aria-hidden="true" style="color:var(--wp--custom--color--text--brand);width:9px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path></svg></div></div>
								<!-- /wp:outermost/icon-block -->
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
					<p class="is-style-link-arrow-accent" style="margin-top:var(--wp--preset--spacing--20)"><a href="<?php echo esc_url( home_url( '/packages/foundation/' ) ); ?>"><?php echo esc_html__( 'Read about Foundation', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</article>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"tagName":"article","className":"ls-package-card is-featured is-style-card-package","style":{"border":{"color":"var:custom|color|text|brand"},"shadow":"var:preset|shadow|400"},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<article class="wp-block-group ls-package-card is-featured is-style-card-package has-border-color" style="border-color:var(--wp--custom--color--text--brand);box-shadow:var(--wp--custom--shadow--elevation--400)">
					<!-- wp:group {"className":"ls-package-card__badge-row","layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"top"}} -->
					<div class="wp-block-group ls-package-card__badge-row">
						<!-- wp:group {"className":"ls-icon-well-brand"} -->
						<div class="wp-block-group ls-icon-well-brand">
							<!-- wp:outermost/icon-block {"iconName":"","width":"20px"} -->
							<div class="wp-block-outermost-icon-block"><div class="icon-container" aria-hidden="true" style="width:20px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M240,56v64a8,8,0,0,1-16,0V75.31l-82.34,82.35a8,8,0,0,1-11.32,0L96,123.31,29.66,189.66a8,8,0,0,1-11.32-11.32l72-72a8,8,0,0,1,11.32,0L136,140.69,212.69,64H168a8,8,0,0,1,0-16h64A8,8,0,0,1,240,56Z"></path></svg></div></div>
							<!-- /wp:outermost/icon-block -->
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
								<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"9px","style":{"color":{"text":"var(--wp--custom--color--text--brand)"}}} -->
								<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" aria-hidden="true" style="color:var(--wp--custom--color--text--brand);width:9px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path></svg></div></div>
								<!-- /wp:outermost/icon-block -->
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
								<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"9px","style":{"color":{"text":"var(--wp--custom--color--text--brand)"}}} -->
								<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" aria-hidden="true" style="color:var(--wp--custom--color--text--brand);width:9px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path></svg></div></div>
								<!-- /wp:outermost/icon-block -->
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
								<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"9px","style":{"color":{"text":"var(--wp--custom--color--text--brand)"}}} -->
								<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" aria-hidden="true" style="color:var(--wp--custom--color--text--brand);width:9px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path></svg></div></div>
								<!-- /wp:outermost/icon-block -->
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
								<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"9px","style":{"color":{"text":"var(--wp--custom--color--text--brand)"}}} -->
								<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" aria-hidden="true" style="color:var(--wp--custom--color--text--brand);width:9px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path></svg></div></div>
								<!-- /wp:outermost/icon-block -->
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
					<p class="is-style-link-arrow-accent" style="margin-top:var(--wp--preset--spacing--20)"><a href="<?php echo esc_url( home_url( '/packages/growth/' ) ); ?>"><?php echo esc_html__( 'Read about Growth', 'ls-theme' ); ?></a></p>
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
						<!-- wp:outermost/icon-block {"iconName":"","width":"20px"} -->
						<div class="wp-block-outermost-icon-block"><div class="icon-container" aria-hidden="true" style="width:20px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M240,208H224V96a16,16,0,0,0-16-16H144V32a16,16,0,0,0-24.88-13.32L39.12,72A16,16,0,0,0,32,85.34V208H16a8,8,0,0,0,0,16H240a8,8,0,0,0,0-16ZM208,96V208H144V96ZM48,85.34,128,32V208H48ZM112,112v16a8,8,0,0,1-16,0V112a8,8,0,1,1,16,0Zm-32,0v16a8,8,0,0,1-16,0V112a8,8,0,1,1,16,0Zm0,56v16a8,8,0,0,1-16,0V168a8,8,0,0,1,16,0Zm32,0v16a8,8,0,0,1-16,0V168a8,8,0,0,1,16,0Z"></path></svg></div></div>
						<!-- /wp:outermost/icon-block -->
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
								<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"9px","style":{"color":{"text":"var(--wp--custom--color--text--brand)"}}} -->
								<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" aria-hidden="true" style="color:var(--wp--custom--color--text--brand);width:9px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path></svg></div></div>
								<!-- /wp:outermost/icon-block -->
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
								<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"9px","style":{"color":{"text":"var(--wp--custom--color--text--brand)"}}} -->
								<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" aria-hidden="true" style="color:var(--wp--custom--color--text--brand);width:9px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path></svg></div></div>
								<!-- /wp:outermost/icon-block -->
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
								<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"9px","style":{"color":{"text":"var(--wp--custom--color--text--brand)"}}} -->
								<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" aria-hidden="true" style="color:var(--wp--custom--color--text--brand);width:9px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path></svg></div></div>
								<!-- /wp:outermost/icon-block -->
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
								<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"9px","style":{"color":{"text":"var(--wp--custom--color--text--brand)"}}} -->
								<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" aria-hidden="true" style="color:var(--wp--custom--color--text--brand);width:9px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path></svg></div></div>
								<!-- /wp:outermost/icon-block -->
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
					<p class="is-style-link-arrow-accent" style="margin-top:var(--wp--preset--spacing--20)"><a href="<?php echo esc_url( home_url( '/packages/enterprise/' ) ); ?>"><?php echo esc_html__( 'Read about Enterprise', 'ls-theme' ); ?></a></p>
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
