<?php
/**
 * Title: Hero - Search
 * Slug: ls-theme/search-hero
 * Categories: hero
 * Block Types: core/pattern
 * Description: The Search template's hero section: breadcrumb trail, eyebrow badge, a static
 * "Search LightSpeed" heading (intentionally not bound to the query — this template's H1 does
 * not change with the search term), supporting copy, and a no-button pill search field
 * (is-style-search-pill) with a leading magnifying-glass icon. The breadcrumb is embedded here
 * (not the shared ls-theme/breadcrumbs template part) so it shares this hero's own padding
 * instead of stacking a second set on top, matching the ls-theme/blog-hero and ls-theme/work-hero
 * pattern convention — templates/search.html does not also insert the breadcrumbs template part.
 * The bottom border and decorative corner gradients live in
 * src/scss/structural/search-hero.scss (className ls-search-hero) — see that file's own comment
 * for why the gradients can't be a block color.gradient attribute.
 * Keywords: search, hero, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-search-hero","style":{"border":{"bottom":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|30","bottom":"var:preset|spacing|90","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-search-hero" style="border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--30)">

	<?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
	<!-- wp:yoast-seo/breadcrumbs {"className":"alignwide"} /-->
	<?php endif; ?>

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"640px","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center","justifyContent":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"8px","style":{"color":{"text":"var(--wp--custom--color--icon--background)"}}} -->
			<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--icon--background);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
			<!-- /wp:outermost/icon-block -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
			<p class="has-text-align-center has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Search', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|80"}}},"fontSize":"800"} -->
		<h1 class="wp-block-heading has-text-align-center has-800-font-size" style="margin-top:var(--wp--preset--spacing--80);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Search LightSpeed', 'ls-theme' ); ?></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"fontSize":"300"} -->
		<p class="has-text-align-center has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted);margin-top:var(--wp--preset--spacing--40)"><?php echo esc_html__( 'Use search to find services, solutions, proof, FAQs and resource content more quickly.', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
		<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--50)">
			<!-- wp:search {"label":<?php echo wp_json_encode( __( 'Search', 'ls-theme' ) ); ?>,"showLabel":false,"placeholder":<?php echo wp_json_encode( __( 'Try: WordPress redesign · WooCommerce support · migration · AI readiness · pricing', 'ls-theme' ) ); ?>,"width":100,"widthUnit":"%","buttonPosition":"no-button","className":"is-style-search-pill"} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
