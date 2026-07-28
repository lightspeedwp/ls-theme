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

	<!-- wp:group {"className":"is-style-card-divider-bottom","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
	<div class="wp-block-group is-style-card-divider-bottom">
		<!-- wp:group {"className":"is-style-icon-well-brand"} -->
		<div class="wp-block-group is-style-icon-well-brand">
			<!-- wp:outermost/icon-block {"iconName":"","width":"18px"} -->
			<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:18px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M104,40H56A16,16,0,0,0,40,56v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,104,40Zm0,64H56V56h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,200,40Zm0,64H152V56h48v48Zm-96,32H56a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,104,136Zm0,64H56V152h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,200,136Zm0,64H152V152h48v48Z"></path></svg></div></div>
			<!-- /wp:outermost/icon-block -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"200"} -->
			<h4 class="wp-block-heading has-200-font-size" style="margin-top:0;margin-bottom:0;font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'WordPress Work', 'ls-theme' ); ?></h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted);margin-top:0;margin-bottom:0"><?php echo esc_html__( 'Examples grouped around platform structure, maintainability and redesign decisions.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"is-style-card-divider-bottom","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
	<div class="wp-block-group is-style-card-divider-bottom">
		<!-- wp:group {"className":"is-style-icon-well-commerce"} -->
		<div class="wp-block-group is-style-icon-well-commerce">
			<!-- wp:outermost/icon-block {"iconName":"","width":"18px"} -->
			<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:18px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M230.14,58.87A8,8,0,0,0,224,56H62.68L56.6,22.57A8,8,0,0,0,48.73,16H24a8,8,0,0,0,0,16h18L67.56,172.29a24,24,0,0,0,5.33,11.27,28,28,0,1,0,44.4,8.44h45.42A27.75,27.75,0,0,0,160,204a28,28,0,1,0,28-28H91.17a8,8,0,0,1-7.87-6.57L80.13,152h116a24,24,0,0,0,23.61-19.71l12.16-66.86A8,8,0,0,0,230.14,58.87ZM104,204a12,12,0,1,1-12-12A12,12,0,0,1,104,204Zm96,0a12,12,0,1,1-12-12A12,12,0,0,1,200,204Zm4-74.57A8,8,0,0,1,196.1,136H77.22L65.59,72H214.41Z"></path></svg></div></div>
			<!-- /wp:outermost/icon-block -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"200"} -->
			<h4 class="wp-block-heading has-200-font-size" style="margin-top:0;margin-bottom:0;font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'WooCommerce Work', 'ls-theme' ); ?></h4>
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
		<!-- wp:group {"className":"is-style-icon-well-accent"} -->
		<div class="wp-block-group is-style-icon-well-accent">
			<!-- wp:outermost/icon-block {"iconName":"","width":"18px"} -->
			<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:18px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M223.68,66.15,135.68,18h0a15.88,15.88,0,0,0-15.36,0l-88,48.17a16,16,0,0,0-8.32,14v95.64a16,16,0,0,0,8.32,14l88,48.17a15.88,15.88,0,0,0,15.36,0l88-48.17a16,16,0,0,0,8.32-14V80.18A16,16,0,0,0,223.68,66.15ZM128,32h0l80.34,44L128,120,47.66,76ZM40,90l80,43.78v85.79L40,175.82Zm96,129.57V133.82L216,90v85.78Z"></path></svg></div></div>
			<!-- /wp:outermost/icon-block -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"200"} -->
			<h4 class="wp-block-heading has-200-font-size" style="margin-top:0;margin-bottom:0;font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'Design-System Work', 'ls-theme' ); ?></h4>
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
