<?php
/**
 * Title: Mega Menu - Service
 * Slug: ls-theme/mega-menu-service
 * Categories: menu
 * Block Types: core/template-part/menu
 * Description: Ollie Menu Designer dropdown panel for the Services nav item — 6 lifecycle-phase columns (Discover, Create, Build, Launch, Grow, Evolve), each colour-coded via the phase.* tokens, plus header/footer CTA rows. Replace item links with real destinations in the Site Editor.
 * Keywords: mega menu, navigation, dropdown, ollie, services, lifecycle
 * Viewport Width: 960
 * Inserter: true
 */

?>
<!-- wp:group {"tagName":"div","className":"is-style-mega-menu-panel","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-mega-menu-panel">

	<!-- wp:group {"className":"ls-mega-menu__divider","style":{"border":{"bottom":{"width":"1px","style":"solid"}},"spacing":{"padding":{"bottom":"var:preset|spacing|10"}}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap","verticalAlignment":"bottom"}} -->
	<div class="wp-block-group ls-mega-menu__divider" style="border-bottom-width:1px;border-bottom-style:solid;padding-bottom:var(--wp--preset--spacing--10)">
		<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest"},"color":{"text":"var(--wp--custom--color--link--accent)"}},"fontSize":"100"} -->
			<p class="has-100-font-size" style="color:var(--wp--custom--color--link--accent);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Services by lifecycle phase', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":4,"fontSize":"200"} -->
			<h4 class="wp-block-heading has-200-font-size"><?php echo esc_html__( 'Services that span the WordPress lifecycle grouped by phase.', 'ls-theme' ); ?></h4>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"className":"is-style-link-arrow-accent","fontSize":"100"} -->
		<p class="is-style-link-arrow-accent has-100-font-size"><a href="<?php echo esc_url( home_url( '/services-landing/' ) ); ?>"><?php echo esc_html__( 'See all services', 'ls-theme' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns -->
	<div class="wp-block-columns">

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:group {"className":"ls-mega-menu__phase-dot","style":{"color":{"background":"var(--wp--custom--color--phase--discover)"}},"layout":{"type":"flex"}} -->
				<div class="wp-block-group ls-mega-menu__phase-dot has-background" style="background-color:var(--wp--custom--color--phase--discover)"></div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest"},"color":{"text":"var(--wp--custom--color--phase--discover)"}},"fontSize":"100"} -->
				<p class="has-100-font-size" style="color:var(--wp--custom--color--phase--discover);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Discover', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:outermost/icon-block {"iconName":"arrow-right","width":"10px","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"},"opacity":"0.5"}} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"className":"ls-mega-menu__item","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}},"border":{"radius":"var:preset|border-radius|300"}},"fontSize":"100"} -->
			<p class="ls-mega-menu__item has-100-font-size" style="border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Discovery', 'ls-theme' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:group {"className":"ls-mega-menu__phase-dot","style":{"color":{"background":"var(--wp--custom--color--phase--create)"}},"layout":{"type":"flex"}} -->
				<div class="wp-block-group ls-mega-menu__phase-dot has-background" style="background-color:var(--wp--custom--color--phase--create)"></div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest"},"color":{"text":"var(--wp--custom--color--phase--create)"}},"fontSize":"100"} -->
				<p class="has-100-font-size" style="color:var(--wp--custom--color--phase--create);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Create', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:outermost/icon-block {"iconName":"arrow-right","width":"10px","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"},"opacity":"0.5"}} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"className":"ls-mega-menu__item","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}},"border":{"radius":"var:preset|border-radius|300"}},"fontSize":"100"} -->
			<p class="ls-mega-menu__item has-100-font-size" style="border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Content', 'ls-theme' ); ?></a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"ls-mega-menu__item","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}},"border":{"radius":"var:preset|border-radius|300"}},"fontSize":"100"} -->
			<p class="ls-mega-menu__item has-100-font-size" style="border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Design', 'ls-theme' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:group {"className":"ls-mega-menu__phase-dot","style":{"color":{"background":"var(--wp--custom--color--phase--build)"}},"layout":{"type":"flex"}} -->
				<div class="wp-block-group ls-mega-menu__phase-dot has-background" style="background-color:var(--wp--custom--color--phase--build)"></div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest"},"color":{"text":"var(--wp--custom--color--phase--build)"}},"fontSize":"100"} -->
				<p class="has-100-font-size" style="color:var(--wp--custom--color--phase--build);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Build', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:outermost/icon-block {"iconName":"arrow-right","width":"10px","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"},"opacity":"0.5"}} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"className":"ls-mega-menu__item","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}},"border":{"radius":"var:preset|border-radius|300"}},"fontSize":"100"} -->
			<p class="ls-mega-menu__item has-100-font-size" style="border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Development', 'ls-theme' ); ?></a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"ls-mega-menu__item","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}},"border":{"radius":"var:preset|border-radius|300"}},"fontSize":"100"} -->
			<p class="ls-mega-menu__item has-100-font-size" style="border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Migrations', 'ls-theme' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:group {"className":"ls-mega-menu__phase-dot","style":{"color":{"background":"var(--wp--custom--color--phase--launch)"}},"layout":{"type":"flex"}} -->
				<div class="wp-block-group ls-mega-menu__phase-dot has-background" style="background-color:var(--wp--custom--color--phase--launch)"></div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest"},"color":{"text":"var(--wp--custom--color--phase--launch)"}},"fontSize":"100"} -->
				<p class="has-100-font-size" style="color:var(--wp--custom--color--phase--launch);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Launch', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:outermost/icon-block {"iconName":"arrow-right","width":"10px","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"},"opacity":"0.5"}} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"className":"ls-mega-menu__item","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}},"border":{"radius":"var:preset|border-radius|300"}},"fontSize":"100"} -->
			<p class="ls-mega-menu__item has-100-font-size" style="border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Hosting', 'ls-theme' ); ?></a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"ls-mega-menu__item","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}},"border":{"radius":"var:preset|border-radius|300"}},"fontSize":"100"} -->
			<p class="ls-mega-menu__item has-100-font-size" style="border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Performance', 'ls-theme' ); ?></a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"ls-mega-menu__item","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}},"border":{"radius":"var:preset|border-radius|300"}},"fontSize":"100"} -->
			<p class="ls-mega-menu__item has-100-font-size" style="border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Security', 'ls-theme' ); ?></a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"ls-mega-menu__item","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}},"border":{"radius":"var:preset|border-radius|300"}},"fontSize":"100"} -->
			<p class="ls-mega-menu__item has-100-font-size" style="border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Training', 'ls-theme' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:group {"className":"ls-mega-menu__phase-dot","style":{"color":{"background":"var(--wp--custom--color--phase--grow)"}},"layout":{"type":"flex"}} -->
				<div class="wp-block-group ls-mega-menu__phase-dot has-background" style="background-color:var(--wp--custom--color--phase--grow)"></div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest"},"color":{"text":"var(--wp--custom--color--phase--grow)"}},"fontSize":"100"} -->
				<p class="has-100-font-size" style="color:var(--wp--custom--color--phase--grow);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Grow', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:outermost/icon-block {"iconName":"arrow-right","width":"10px","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"},"opacity":"0.5"}} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"className":"ls-mega-menu__item","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}},"border":{"radius":"var:preset|border-radius|300"}},"fontSize":"100"} -->
			<p class="ls-mega-menu__item has-100-font-size" style="border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Support', 'ls-theme' ); ?></a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"ls-mega-menu__item","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}},"border":{"radius":"var:preset|border-radius|300"}},"fontSize":"100"} -->
			<p class="ls-mega-menu__item has-100-font-size" style="border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'SEO', 'ls-theme' ); ?></a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"ls-mega-menu__item","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}},"border":{"radius":"var:preset|border-radius|300"}},"fontSize":"100"} -->
			<p class="ls-mega-menu__item has-100-font-size" style="border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Accessibility', 'ls-theme' ); ?></a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"ls-mega-menu__item","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}},"border":{"radius":"var:preset|border-radius|300"}},"fontSize":"100"} -->
			<p class="ls-mega-menu__item has-100-font-size" style="border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Email marketing', 'ls-theme' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:group {"className":"ls-mega-menu__phase-dot","style":{"color":{"background":"var(--wp--custom--color--phase--evolve)"}},"layout":{"type":"flex"}} -->
				<div class="wp-block-group ls-mega-menu__phase-dot has-background" style="background-color:var(--wp--custom--color--phase--evolve)"></div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest"},"color":{"text":"var(--wp--custom--color--phase--evolve)"}},"fontSize":"100"} -->
				<p class="has-100-font-size" style="color:var(--wp--custom--color--phase--evolve);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Evolve', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"className":"ls-mega-menu__item","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}},"border":{"radius":"var:preset|border-radius|300"}},"fontSize":"100"} -->
			<p class="ls-mega-menu__item has-100-font-size" style="border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'AI', 'ls-theme' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:group {"className":"ls-mega-menu__divider","style":{"border":{"top":{"width":"1px","style":"solid"}},"spacing":{"padding":{"top":"var:preset|spacing|10"}}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-mega-menu__divider" style="border-top-width:1px;border-top-style:solid;padding-top:var(--wp--preset--spacing--10)">
		<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"100"} -->
		<p class="has-100-font-size" style="color:var(--wp--custom--color--text--subtle);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Each service is colour-coded by its lifecycle phase', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"is-style-link-arrow-accent","fontSize":"100"} -->
		<p class="is-style-link-arrow-accent has-100-font-size"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'See our process', 'ls-theme' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
