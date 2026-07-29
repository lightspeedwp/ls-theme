<?php
/**
 * Title: Section - Blog Writing CTA
 * Slug: ls-theme/blog-writing-cta
 * Categories: cta
 * Block Types: core/pattern
 * Description: The Blog archive's closing CTA: eyebrow pill, gradient-accent heading, supporting paragraph, and a primary/outline button pair on the left; a decorative code-snippet card on the right. Two-column layout via core/columns, which stacks automatically on mobile. Uses the same dark gradient band background and on-dark tokens as the Blog Hero, per the shared dark-section family.
 * Keywords: blog, cta, writing, archive, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","style":{"color":{"gradient":"linear-gradient(158deg,var(--wp--custom--color--surface--band-start) 0%,var(--wp--custom--color--surface--band-end) 100%)"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-background" style="background:linear-gradient(158deg,var(--wp--custom--color--surface--band-start) 0%,var(--wp--custom--color--surface--band-end) 100%)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-center">

			<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">

				<!-- wp:group {"style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 10%, transparent)"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|10","bottom":"var:preset|spacing|5","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
				<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 10%, transparent);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--10)">
					<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"8px","style":{"color":{"text":"var(--wp--custom--color--icon--background)"}}} -->
					<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--icon--background);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
					<!-- /wp:outermost/icon-block -->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.2px","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:1.2px;text-transform:uppercase"><?php echo esc_html__( 'Writing & code', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":2,"className":"is-style-gradient-accent","style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"800"} -->
				<h2 class="wp-block-heading is-style-gradient-accent has-800-font-size" style="margin-top:var(--wp--preset--spacing--20);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Want the details behind the write-up?', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--on-dark-muted);margin-top:var(--wp--preset--spacing--20)"><?php echo esc_html__( 'Most articles link out to the real pattern, filter, or snippet on our GitHub. If you\'d rather talk it through first, we\'re happy to walk you through it directly.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)">
					<!-- wp:button {"className":"is-style-button-primary-on-dark"} -->
					<div class="wp-block-button is-style-button-primary-on-dark"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>"><?php echo esc_html__( 'Book a consultation', 'ls-theme' ); ?></a></div>
					<!-- /wp:button -->

					<!-- wp:button {"className":"is-style-button-outline-on-dark"} -->
					<div class="wp-block-button is-style-button-outline-on-dark"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php echo esc_html__( 'Read the resources', 'ls-theme' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
				<!-- wp:pattern {"slug":"ls-theme/blog-code-snippet"} /-->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
