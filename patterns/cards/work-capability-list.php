<?php
/**
 * Title: Card - Work Capability List
 * Slug: ls-theme/work-capability-list
 * Categories: featured
 * Block Types: core/pattern
 * Description: A bordered card listing LightSpeed's three recurring areas of Work: WordPress, WooCommerce, and Design-System, each with a tinted icon well, title, and description. Used inside the Work archive hero. Adapts between light and dark mode using existing semantic tokens.
 * Keywords: work, hero, capability, list, card
 * Viewport Width: 470
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"className":"is-style-card-list-shell","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<div class="wp-block-group is-style-card-list-shell">

	<!-- wp:group {"style":{"border":{"bottom":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
	<div class="wp-block-group" style="border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;padding-bottom:var(--wp--preset--spacing--20)">
		<!-- wp:group {"className":"ls-icon-well-brand"} -->
		<div class="wp-block-group ls-icon-well-brand">
			<!-- wp:icon {"icon":"lightspeed/category","style":{"dimensions":{"width":"18px"}}} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"200"} -->
			<h2 class="wp-block-heading has-200-font-size" style="margin-top:0;margin-bottom:0;font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'WordPress Work', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted);margin-top:0;margin-bottom:0"><?php echo esc_html__( 'Examples grouped around platform structure, maintainability and redesign decisions.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"border":{"bottom":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
	<div class="wp-block-group" style="border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;padding-bottom:var(--wp--preset--spacing--20)">
		<!-- wp:group {"className":"ls-icon-well-commerce"} -->
		<div class="wp-block-group ls-icon-well-commerce">
			<!-- wp:icon {"icon":"lightspeed/cart","style":{"dimensions":{"width":"18px"}}} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"200"} -->
			<h2 class="wp-block-heading has-200-font-size" style="margin-top:0;margin-bottom:0;font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'WooCommerce Work', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted);margin-top:0;margin-bottom:0"><?php echo esc_html__( 'Examples grouped around ecommerce complexity, conversion and operational pressure.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
	<div class="wp-block-group">
		<!-- wp:group {"className":"ls-icon-well-accent"} -->
		<div class="wp-block-group ls-icon-well-accent">
			<!-- wp:icon {"icon":"lightspeed/cube","style":{"dimensions":{"width":"18px"}}} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"200"} -->
			<h2 class="wp-block-heading has-200-font-size" style="margin-top:0;margin-bottom:0;font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'Design-System Work', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted);margin-top:0;margin-bottom:0"><?php echo esc_html__( 'Examples that connect design consistency to implementation and long-term governance.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
