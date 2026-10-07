<?php
/**
 * Title: Card - Route Tile
 * Slug: ls-theme/card-route-tile
 * Categories: featured
 * Block Types: core/pattern
 * Description: A single route tile for a "choose where to go" grid: icon well, index number, H3 heading, an accent mono kicker line, supporting copy and a bottom-anchored arrow link — the whole card is one stretched link. Authored with the WordPress solution; edit the icon, index, heading, kicker, copy and link after inserting. Uses the existing Card - Service Tile style (no new style or SCSS). Section - Solutions Route Tiles renders seven of these from one data array, so keep the two markups in step.
 * Keywords: card, tile, route, solution, link, index
 * Viewport Width: 400
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"tagName":"article","className":"is-style-card-service-tile","style":{"dimensions":{"minHeight":"100%"},"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
<article class="wp-block-group is-style-card-service-tile" style="min-height:100%">
	<!-- wp:group {"className":"ls-icon-well-brand"} -->
	<div class="wp-block-group ls-icon-well-brand">
		<!-- wp:icon {"icon":"lightspeed/list-bullets","style":{"dimensions":{"width":"18px"}}} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"className":"ls-card-service-tile__index","style":{"typography":{"fontFamily":"var:preset|font-family|monospace","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"var:custom|color|text|subtle"}},"fontSize":"200"} -->
	<p class="has-text-color has-200-font-size ls-card-service-tile__index" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);letter-spacing:var(--wp--custom--typography--letter-spacing--wide)"><?php echo esc_html__( '01', 'ls-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"className":"ls-card-service-tile__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-card-service-tile__content">
		<!-- wp:heading {"level":3,"fontSize":"400"} -->
		<h3 class="wp-block-heading has-400-font-size"><?php echo esc_html__( 'WordPress', 'ls-theme' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"var:custom|color|text|brand"}},"fontSize":"200"} -->
		<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--monospace);letter-spacing:var(--wp--custom--typography--letter-spacing--wide);text-transform:uppercase"><?php echo esc_html__( 'Block-theme architecture', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"style":{"color":{"text":"var:custom|color|text|muted"}}} -->
		<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Custom block-theme architectures and integrations for content-rich business sites.', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"className":"is-style-link-arrow-accent","style":{"spacing":{"margin":{"top":"auto"}}}} -->
	<p class="is-style-link-arrow-accent" style="margin-top:auto"><a class="ls-card-service-tile__link" href="<?php echo esc_url( home_url( '/solutions/wordpress/' ) ); ?>"><?php echo esc_html__( 'Read about WordPress', 'ls-theme' ); ?></a></p>
	<!-- /wp:paragraph -->
</article>
<!-- /wp:group -->
