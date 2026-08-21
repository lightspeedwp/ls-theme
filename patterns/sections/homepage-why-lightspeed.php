<?php
/**
 * Title: Section - Homepage Why LightSpeed
 * Slug: ls-theme/homepage-why-lightspeed
 * Categories: featured
 * Block Types: core/pattern
 * Description: The Homepage "Why LightSpeed" section: eyebrow, heading, copy and two CTA buttons on the left, a 5-item checklist card on the right.
 * Keywords: homepage, why lightspeed, positioning, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band">

	<!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"8px","style":{"color":{"text":"var(--wp--custom--color--icon--background)"}}} -->
				<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--icon--background);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
				<!-- /wp:outermost/icon-block -->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Why LightSpeed', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"bottom":"0"}}},"fontSize":"700"} -->
			<h2 class="wp-block-heading has-700-font-size" style="margin-bottom:0;font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'When the website matters commercially, the partner choice matters too.', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"spacing":{"margin":{"bottom":"0"}}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted);margin-bottom:0"><?php echo esc_html__( 'Most website projects slow down because strategy, content, design and engineering are treated as separate purchases. We work across those decisions together so the platform makes more sense at launch and keeps making sense after launch.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-button-secondary"} -->
				<div class="wp-block-button is-style-button-secondary"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/why-lightspeed/' ) ); ?>"><?php echo esc_html__( 'Read the full positioning', 'ls-theme' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-button-secondary-outline ls-has-arrow-reveal"} -->
				<div class="wp-block-button is-style-button-secondary-outline ls-has-arrow-reveal"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/commitments/' ) ); ?>"><?php echo esc_html__( 'What we commit to', 'ls-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
			<!-- wp:group {"style":{"color":{"background":"var:custom|color|surface|card"},"border":{"color":"var:custom|color|border|card","width":"1px","style":"solid","radius":"var:preset|border-radius|200"},"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flow"}} -->
			<div class="wp-block-group has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--200);background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">

			<!-- wp:list {"className":"ls-why-lightspeed-checklist"} -->
			<ul class="wp-block-list ls-why-lightspeed-checklist">
				<!-- wp:list-item {"align":null,"style":{"layout":{"flexWrap":"nowrap","verticalAlignment":"top"}}} -->
				<li>
					<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
					<div class="wp-block-group">
						<!-- wp:group {"style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 10%, transparent)"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
						<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 10%, transparent);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
							<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"11px","style":{"color":{"text":"var(--wp--custom--color--text--brand)"}}} -->
							<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" aria-hidden="true" style="color:var(--wp--custom--color--text--brand);width:11px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path></svg></div></div>
							<!-- /wp:outermost/icon-block -->
						</div>
						<!-- /wp:group -->

						<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--default)"}},"fontSize":"200"} -->
						<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--default)"><?php echo esc_html__( 'Systems thinking across content, design and engineering, not separate purchases.', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</li>
				<!-- /wp:list-item -->

				<!-- wp:list-item {"align":null,"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}},"layout":{"flexWrap":"nowrap","verticalAlignment":"top"}}} -->
				<li style="margin-top:var(--wp--preset--spacing--20)">
					<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
					<div class="wp-block-group">
						<!-- wp:group {"style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 10%, transparent)"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
						<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 10%, transparent);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
							<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"11px","style":{"color":{"text":"var(--wp--custom--color--text--brand)"}}} -->
							<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" aria-hidden="true" style="color:var(--wp--custom--color--text--brand);width:11px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path></svg></div></div>
							<!-- /wp:outermost/icon-block -->
						</div>
						<!-- /wp:group -->

						<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--default)"}},"fontSize":"200"} -->
						<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--default)"><?php echo esc_html__( 'Migration planning treated as risk management, not a content move.', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</li>
				<!-- /wp:list-item -->

				<!-- wp:list-item {"align":null,"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}},"layout":{"flexWrap":"nowrap","verticalAlignment":"top"}}} -->
				<li style="margin-top:var(--wp--preset--spacing--20)">
					<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
					<div class="wp-block-group">
						<!-- wp:group {"style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 10%, transparent)"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
						<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 10%, transparent);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
							<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"11px","style":{"color":{"text":"var(--wp--custom--color--text--brand)"}}} -->
							<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" aria-hidden="true" style="color:var(--wp--custom--color--text--brand);width:11px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path></svg></div></div>
							<!-- /wp:outermost/icon-block -->
						</div>
						<!-- /wp:group -->

						<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--default)"}},"fontSize":"200"} -->
						<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--default)"><?php echo esc_html__( 'Design-system delivery for reusable patterns and cleaner handoff.', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</li>
				<!-- /wp:list-item -->

				<!-- wp:list-item {"align":null,"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}},"layout":{"flexWrap":"nowrap","verticalAlignment":"top"}}} -->
				<li style="margin-top:var(--wp--preset--spacing--20)">
					<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
					<div class="wp-block-group">
						<!-- wp:group {"style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 10%, transparent)"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
						<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 10%, transparent);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
							<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"11px","style":{"color":{"text":"var(--wp--custom--color--text--brand)"}}} -->
							<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" aria-hidden="true" style="color:var(--wp--custom--color--text--brand);width:11px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path></svg></div></div>
							<!-- /wp:outermost/icon-block -->
						</div>
						<!-- /wp:group -->

						<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--default)"}},"fontSize":"200"} -->
						<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--default)"><?php echo esc_html__( 'Long-term support capability for teams that need the platform to keep working.', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</li>
				<!-- /wp:list-item -->

				<!-- wp:list-item {"align":null,"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}},"layout":{"flexWrap":"nowrap","verticalAlignment":"top"}}} -->
				<li style="margin-top:var(--wp--preset--spacing--20)">
					<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
					<div class="wp-block-group">
						<!-- wp:group {"style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 10%, transparent)"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
						<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 10%, transparent);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
							<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"11px","style":{"color":{"text":"var(--wp--custom--color--text--brand)"}}} -->
							<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" aria-hidden="true" style="color:var(--wp--custom--color--text--brand);width:11px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" aria-hidden="true" focusable="false"><path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path></svg></div></div>
							<!-- /wp:outermost/icon-block -->
						</div>
						<!-- /wp:group -->

						<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--default)"}},"fontSize":"200"} -->
						<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--default)"><?php echo esc_html__( 'Governance-aware content planning, AI-readiness without AI theatre.', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
