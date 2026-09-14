<?php
/**
 * Title: Menu Item Card
 * Slug: ls-theme/menu-item-card
 * Categories: menu
 * Block Types: core/pattern
 * Description: A single mega-menu list item — icon well, title/description, and a hover-reveal trailing arrow. Used across the Work, Solutions, Pricing, Insights, and About mega menus (not Services, which uses its own per-phase item style). The icon aligns to the top of the row; the arrow is wrapped together with the text block in its own group so it stays vertically centred against the text, independent of the icon's alignment.
 * Keywords: menu, mega menu, card, nav item
 * Viewport Width: 380
 * Inserter: true
 */

?>
<!-- wp:group {"className":"is-style-mega-menu-item-default","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group is-style-mega-menu-item-default">
	<!-- wp:group {"style":{"border":{"color":"var:custom|color|link|accent","width":"1px","style":"solid","radius":"var:preset|border-radius|200"},"color":{"background":"color-mix(in srgb, var(--wp--custom--color--link--accent) 10%, transparent)","text":"var:custom|color|link|accent"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}},"dimensions":{"minHeight":"2.25rem"},"layout":{"selfStretch":"fit","flexSize":null}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
	<div class="wp-block-group has-border-color has-text-color has-background" style="border-color:var(--wp--custom--color--link--accent);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--200);color:var(--wp--custom--color--link--accent);background-color:color-mix(in srgb, var(--wp--custom--color--link--accent) 10%, transparent);min-height:2.25rem;padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
		<!-- wp:icon {"icon":"lightspeed/folder","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--link--accent)"},"dimensions":{"width":"36px"}}} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"center","flexWrap":"nowrap"}} -->
	<div class="wp-block-group">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"level":5,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"200"} -->
			<h5 class="wp-block-heading has-200-font-size" style="margin-top:0;margin-bottom:0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Menu item title', 'ls-theme' ); ?></a></h5>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted);margin-top:0;margin-bottom:0"><?php echo esc_html__( 'Brief description of what this link leads to.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:icon {"icon":"lightspeed/arrow-right","style":{"dimensions":{"width":"13px"}}} /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
