<?php
/**
 * Title: Stats Bar
 * Slug: ls-theme/section-stats-bar
 * Categories: stats
 * Block Types: core/pattern
 * Description: A compact 4-figure stat strip with vertical dividers, used directly beneath the Homepage Hero.
 * Keywords: stats, bar, homepage, metrics, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","style":{"color":{"background":"var:custom|color|surface|card"},"border":{"bottom":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-background" style="border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;background-color:var(--wp--custom--color--surface--card);margin-top:0;padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">

	<!-- wp:group {"className":"ls-stats-row","align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
	<div class="wp-block-group ls-stats-row alignwide is-content-justification-space-between">

		<!-- wp:group {"className":"ls-stat-item","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"center"},"style":{"spacing":{"padding":{"left":"var:preset|spacing|60","right":"var:preset|spacing|60"}}}} -->
		<div class="wp-block-group ls-stat-item" style="padding-right:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">
			<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"600"} -->
			<p class="has-text-align-center has-text-color has-600-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( '12+ yrs', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
			<p class="has-text-align-center has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'WordPress depth', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"ls-stat-item ls-stat-item--divider","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"center"},"style":{"border":{"left":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"left":"var:preset|spacing|60","right":"var:preset|spacing|60"}}}} -->
		<div class="wp-block-group ls-stat-item ls-stat-item--divider" style="border-left-color:var(--wp--custom--color--border--card);border-left-style:solid;border-left-width:1px;padding-right:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">
			<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"600"} -->
			<p class="has-text-align-center has-text-color has-600-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( '100+', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
			<p class="has-text-align-center has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Platform launches', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"ls-stat-item ls-stat-item--divider","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"center"},"style":{"border":{"left":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"left":"var:preset|spacing|60","right":"var:preset|spacing|60"}}}} -->
		<div class="wp-block-group ls-stat-item ls-stat-item--divider" style="border-left-color:var(--wp--custom--color--border--card);border-left-style:solid;border-left-width:1px;padding-right:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">
			<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"600"} -->
			<p class="has-text-align-center has-text-color has-600-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Block-first', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
			<p class="has-text-align-center has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Modern WordPress only', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"ls-stat-item ls-stat-item--divider","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"center"},"style":{"border":{"left":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"left":"var:preset|spacing|60","right":"var:preset|spacing|60"}}}} -->
		<div class="wp-block-group ls-stat-item ls-stat-item--divider" style="border-left-color:var(--wp--custom--color--border--card);border-left-style:solid;border-left-width:1px;padding-right:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">
			<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"600"} -->
			<p class="has-text-align-center has-text-color has-600-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( '5★', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
			<p class="has-text-align-center has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Approved client praise', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
