<?php
/**
 * Title: Template: 404
 * Slug: ls-theme/template-404
 * Categories: template
 * Block Types: core/template-part
 * Description: Main-content pattern for the 404 template — a faded 404 watermark, a not-found heading, supporting copy, and Homepage/Search CTAs.
 * Inserter: false
 *
 * @package ls-theme
 */

?>

<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}},"blockGap":"var:preset|spacing|30"},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="margin-top:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">

	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|extrabold","fontSize":"clamp(4.5rem, 12vw, 10rem)","lineHeight":"1"},"color":{"text":"color-mix(in srgb, var(--wp--custom--color--effect--watermark--brand) 15%, transparent)"}}} -->
	<p class="has-text-align-center has-text-color" style="color:color-mix(in srgb, var(--wp--custom--color--effect--watermark--brand) 15%, transparent);font-family:var(--wp--preset--font-family--heading);font-size:clamp(4.5rem, 12vw, 10rem);font-weight:var(--wp--custom--typography--font-weight--extrabold);line-height:1"><?php echo esc_html__( '404', 'ls-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"700"} -->
	<h1 class="wp-block-heading has-text-align-center has-700-font-size" style="margin-top:var(--wp--preset--spacing--20);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'We could not find the page you were looking for', 'ls-theme' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"300"} -->
	<p class="has-text-align-center has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted);margin-top:var(--wp--preset--spacing--20)"><?php echo esc_html__( 'The route may have moved, changed or no longer exist, but you do not need to start from scratch.', 'ls-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Go to the homepage', 'ls-theme' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/?s=' ) ); ?>"><?php echo esc_html__( 'Search the site', 'ls-theme' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</main>
<!-- /wp:group -->
