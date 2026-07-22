<?php
/**
 * Title: Mega Menu - Default
 * Slug: ls-theme/mega-menu-default
 * Categories: menu
 * Block Types: core/template-part/menu
 * Description: Ollie Menu Designer dropdown panel for a standard nav item — featured items grouped in two columns, a featured post callout, and header/footer CTA rows. Replace item links, icons, and the featured post with real destinations in the Site Editor.
 * Keywords: mega menu, navigation, dropdown, ollie
 * Viewport Width: 860
 * Inserter: true
 */

?>
<!-- wp:group {"className":"is-style-mega-menu-panel","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-mega-menu-panel">

	<!-- wp:group {"className":"ls-mega-menu__divider","style":{"border":{"bottom":{"width":"1px","style":"solid"}},"spacing":{"padding":{"bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap","verticalAlignment":"bottom"}} -->
	<div class="wp-block-group ls-mega-menu__divider" style="border-bottom-width:1px;border-bottom-style:solid;padding-bottom:var(--wp--preset--spacing--20)">
		<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
		<div class="wp-block-group" style="--wp--style--block-gap:0">
			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest"},"color":{"text":"var(--wp--custom--color--link--accent)"}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--link--accent);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Work', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":4,"fontSize":"200"} -->
			<h4 class="wp-block-heading has-200-font-size"><?php echo esc_html__( 'Real platform work, not portfolio decoration.', 'ls-theme' ); ?></h4>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"className":"is-style-link-arrow-accent","fontSize":"100"} -->
		<p class="is-style-link-arrow-accent has-100-font-size"><a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>"><?php echo esc_html__( 'See all work', 'ls-theme' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns -->
	<div class="wp-block-columns">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:group {"className":"ls-mega-menu__item","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}},"border":{"radius":"var:preset|border-radius|300"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
			<div class="wp-block-group ls-mega-menu__item" style="border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
				<!-- wp:group {"className":"is-style-icon-frame-glow is-style-icon-frame-glow-link-accent ls-mega-menu__icon-well","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
				<div class="wp-block-group is-style-icon-frame-glow is-style-icon-frame-glow-link-accent ls-mega-menu__icon-well">
					<!-- wp:outermost/icon-block {"iconName":"folder","width":"18px"} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<div class="wp-block-group" style="--wp--style--block-gap:var(--wp--preset--spacing--5)">
					<!-- wp:heading {"level":5,"fontSize":"200"} -->
					<h5 class="wp-block-heading has-200-font-size"><a class="ls-mega-menu__item-link" href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>"><?php echo esc_html__( 'Travel publisher rebuild', 'ls-theme' ); ?></a></h5>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Block-first WordPress for a high-volume travel publisher.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:outermost/icon-block {"iconName":"arrow-right","width":"13px","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"}}} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"ls-mega-menu__item","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}},"border":{"radius":"var:preset|border-radius|300"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
			<div class="wp-block-group ls-mega-menu__item" style="border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
				<!-- wp:group {"className":"is-style-icon-frame-glow is-style-icon-frame-glow-link-accent ls-mega-menu__icon-well","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
				<div class="wp-block-group is-style-icon-frame-glow is-style-icon-frame-glow-link-accent ls-mega-menu__icon-well">
					<!-- wp:outermost/icon-block {"iconName":"puzzle-piece","width":"18px"} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<div class="wp-block-group" style="--wp--style--block-gap:var(--wp--preset--spacing--5)">
					<!-- wp:heading {"level":5,"fontSize":"200"} -->
					<h5 class="wp-block-heading has-200-font-size"><a class="ls-mega-menu__item-link" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Design system rollout', 'ls-theme' ); ?></a></h5>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Reusable patterns and theme.json discipline across products.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:outermost/icon-block {"iconName":"arrow-right","width":"13px","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"}}} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"ls-mega-menu__item","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}},"border":{"radius":"var:preset|border-radius|300"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
			<div class="wp-block-group ls-mega-menu__item" style="border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
				<!-- wp:group {"className":"is-style-icon-frame-glow is-style-icon-frame-glow-link-accent ls-mega-menu__icon-well","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
				<div class="wp-block-group is-style-icon-frame-glow is-style-icon-frame-glow-link-accent ls-mega-menu__icon-well">
					<!-- wp:outermost/icon-block {"iconName":"folder","width":"18px"} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<div class="wp-block-group" style="--wp--style--block-gap:var(--wp--preset--spacing--5)">
					<!-- wp:heading {"level":5,"fontSize":"200"} -->
					<h5 class="wp-block-heading has-200-font-size"><a class="ls-mega-menu__item-link" href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>"><?php echo esc_html__( 'All case studies', 'ls-theme' ); ?></a></h5>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Every engagement, with the business context up front.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:outermost/icon-block {"iconName":"arrow-right","width":"13px","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"}}} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:group {"className":"ls-mega-menu__item","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}},"border":{"radius":"var:preset|border-radius|300"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
			<div class="wp-block-group ls-mega-menu__item" style="border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
				<!-- wp:group {"className":"is-style-icon-frame-glow is-style-icon-frame-glow-link-accent ls-mega-menu__icon-well","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
				<div class="wp-block-group is-style-icon-frame-glow is-style-icon-frame-glow-link-accent ls-mega-menu__icon-well">
					<!-- wp:outermost/icon-block {"iconName":"shopping-cart","width":"18px"} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<div class="wp-block-group" style="--wp--style--block-gap:var(--wp--preset--spacing--5)">
					<!-- wp:heading {"level":5,"fontSize":"200"} -->
					<h5 class="wp-block-heading has-200-font-size"><a class="ls-mega-menu__item-link" href="<?php echo esc_url( home_url( '/woocommerce-solutions/' ) ); ?>"><?php echo esc_html__( 'Subscriptions reset', 'ls-theme' ); ?></a></h5>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'WooCommerce Subscriptions, performance and self-serve.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:outermost/icon-block {"iconName":"arrow-right","width":"13px","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"}}} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"ls-mega-menu__item","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}},"border":{"radius":"var:preset|border-radius|300"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
			<div class="wp-block-group ls-mega-menu__item" style="border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
				<!-- wp:group {"className":"is-style-icon-frame-glow is-style-icon-frame-glow-link-accent ls-mega-menu__icon-well","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
				<div class="wp-block-group is-style-icon-frame-glow is-style-icon-frame-glow-link-accent ls-mega-menu__icon-well">
					<!-- wp:outermost/icon-block {"iconName":"database","width":"18px"} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<div class="wp-block-group" style="--wp--style--block-gap:var(--wp--preset--spacing--5)">
					<!-- wp:heading {"level":5,"fontSize":"200"} -->
					<h5 class="wp-block-heading has-200-font-size"><a class="ls-mega-menu__item-link" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Migration care', 'ls-theme' ); ?></a></h5>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Replatforming as risk management, not a content move.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:outermost/icon-block {"iconName":"arrow-right","width":"13px","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"}}} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"ls-mega-menu__item","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}},"border":{"radius":"var:preset|border-radius|300"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
			<div class="wp-block-group ls-mega-menu__item" style="border-radius:var(--wp--preset--border-radius--300);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
				<!-- wp:group {"className":"is-style-icon-frame-glow is-style-icon-frame-glow-link-accent ls-mega-menu__icon-well","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
				<div class="wp-block-group is-style-icon-frame-glow is-style-icon-frame-glow-link-accent ls-mega-menu__icon-well">
					<!-- wp:outermost/icon-block {"iconName":"bookmark-simple","width":"18px"} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<div class="wp-block-group" style="--wp--style--block-gap:var(--wp--preset--spacing--5)">
					<!-- wp:heading {"level":5,"fontSize":"200"} -->
					<h5 class="wp-block-heading has-200-font-size"><a class="ls-mega-menu__item-link" href="<?php echo esc_url( home_url( '/testimonials/' ) ); ?>"><?php echo esc_html__( 'Testimonials', 'ls-theme' ); ?></a></h5>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Approved client praise — names, roles, companies.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:outermost/icon-block {"iconName":"arrow-right","width":"13px","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"}}} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:group {"className":"ls-mega-menu__divider","style":{"border":{"top":{"width":"1px","style":"solid"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-mega-menu__divider" style="border-top-width:1px;border-top-style:solid;padding-top:var(--wp--preset--spacing--20)">
		<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"100"} -->
		<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Starting a project?', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"is-style-link-arrow-accent","fontSize":"100"} -->
		<p class="is-style-link-arrow-accent has-100-font-size"><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php echo esc_html__( 'Book a free consultation', 'ls-theme' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
