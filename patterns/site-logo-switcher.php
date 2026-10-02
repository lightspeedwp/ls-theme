<?php
/**
 * Title: Site Logo Switcher
 * Slug: ls-theme/site-logo-switcher
 * Description: Light/dark logo pair, shared between the footer and the mobile menu so they stay in sync. Core-block fallback: two core/image blocks toggled by the light/dark visibility tokens, because core/site-logo is a single DB-managed image and cannot swap by colour scheme.
 *
 * @package ls-theme
 */

?>

<!-- wp:group {"className":"site-logo-switcher","layout":{"type":"default"}} -->
<div class="wp-block-group site-logo-switcher">
<!-- wp:image {"linkDestination":"custom","className":"site-logo--for-light","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<figure class="wp-block-image site-logo--for-light" style="margin-top:0;margin-bottom:0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/logos/ls-blue-logo.svg' ) ); ?>" alt="<?php echo esc_attr__( 'LightSpeed home', 'ls-theme' ); ?>" width="419" height="90"/></a></figure>
<!-- /wp:image -->

<!-- wp:image {"linkDestination":"custom","className":"site-logo--for-dark","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<figure class="wp-block-image site-logo--for-dark" style="margin-top:0;margin-bottom:0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/logos/ls-white-logo.svg' ) ); ?>" alt="<?php echo esc_attr__( 'LightSpeed home', 'ls-theme' ); ?>" width="419" height="90"/></a></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->
