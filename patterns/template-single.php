<?php
/**
 * Title: Template: Single
 * Slug: ls-theme/template-single
 * Categories: template
 * Block Types: core/template-part
 * Description: Main-content pattern for the Single Blog template — title, date, and content.
 * Inserter: false
 *
 * @package ls-theme
 */

?>

<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="margin-top:0">
	<!-- wp:post-title {"level":1} /-->
	<!-- wp:post-date /-->
	<!-- wp:post-content {"layout":{"type":"constrained"}} /-->

	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">
		<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"typography":{"fontStyle":"normal","fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"200"} -->
		<p class="has-200-font-size" style="padding-top:0;padding-bottom:0;font-style:normal;font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Share:', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:outermost/social-sharing {"size":"has-normal-icon-size","style":{"layout":{"selfStretch":"fit","flexSize":null}},"className":"is-style-default","layout":{"type":"flex","justifyContent":"center","orientation":"horizontal","flexWrap":"wrap"}} -->
		<ul class="wp-block-outermost-social-sharing has-normal-icon-size is-style-default">
			<!-- wp:outermost/social-sharing-link {"service":"linkedin"} /-->

			<!-- wp:outermost/social-sharing-link {"service":"facebook"} /-->

			<!-- wp:outermost/social-sharing-link {"service":"x"} /-->

			<!-- wp:outermost/social-sharing-link {"service":"whatsapp"} /-->
		</ul>
		<!-- /wp:outermost/social-sharing -->
	</div>
	<!-- /wp:group -->
</main>
<!-- /wp:group -->