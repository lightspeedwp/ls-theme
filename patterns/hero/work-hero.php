<?php
/**
 * Title: Hero - Work Archive
 * Slug: ls-theme/work-hero
 * Categories: hero
 * Block Types: core/pattern
 * Description: The Work archive's hero section: breadcrumb trail, eyebrow badge, heading, description, CTA buttons, and the Work Capability List card. Two-column layout via core/columns, which stacks automatically on mobile. Adapts between light and dark mode using existing semantic tokens.
 * Keywords: work, hero, archive, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-work-hero","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-work-hero">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">

		<?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
		<!-- wp:yoast-seo/breadcrumbs {"className":"alignwide"} /-->
		<?php endif; ?>

		<!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:outermost/icon-block {"iconName":"","iconColor":"brand-500","iconColorValue":"#1E6AFF","width":"8px","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--icon--background)"}}} -->
				<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container has-icon-color has-brand-500-color" style="color:var(--wp--custom--color--icon--background);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
				<!-- /wp:outermost/icon-block -->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.4px","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:1.4px;text-transform:uppercase"><?php echo esc_html__( 'Work · Proof · Outcomes', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":1,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"800"} -->
			<h1 class="wp-block-heading has-800-font-size" style="margin-top:var(--wp--preset--spacing--20);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'See the kind of platform work LightSpeed is trusted to deliver.', 'ls-theme' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted);margin-top:var(--wp--preset--spacing--20)"><?php echo esc_html__( 'The Work page is the broader proof destination for buyers who want to understand the kinds of platforms, industries and delivery challenges we handle in practice — not a portfolio scrapbook.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>"><?php echo esc_html__( 'Book a consultation', 'ls-theme' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/work/' ) ); ?>"><?php echo esc_html__( 'Explore case studies', 'ls-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
			<!-- wp:pattern {"slug":"ls-theme/work-capability-list"} /-->
		</div>
		<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
