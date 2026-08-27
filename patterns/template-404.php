<?php
/**
 * Title: Template: 404
 * Slug: ls-theme/template-404
 * Categories: template
 * Block Types: core/template-part
 * Description: Main-content pattern for the 404 template — a not-found message, search field, and a link back home.
 * Inserter: false
 *
 * @package ls-theme
 */

?>

<!-- wp:group {"tagName":"main","layout":{"type":"constrained"}} -->
<main class="wp-block-group">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
	<div class="wp-block-group">
		<!-- wp:heading {"level":1} -->
		<h1><?php echo esc_html__( 'Page not found', 'ls-theme' ); ?></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php echo esc_html__( 'The page you were looking for could not be found. It may have been moved or no longer exists.', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:search {"label":"<?php echo esc_attr__( 'Search', 'ls-theme' ); ?>","showLabel":false,"buttonText":"<?php echo esc_attr__( 'Search', 'ls-theme' ); ?>"} /-->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-button-secondary"} -->
			<div class="wp-block-button is-style-button-secondary"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Back to homepage', 'ls-theme' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</main>
<!-- /wp:group -->
