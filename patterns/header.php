<?php
/**
 * Title: Header
 * Slug: ls-theme/header
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Site header — logo, primary navigation, search, light/dark toggle, and "Start a project" CTA.
 *
 * @package ls-theme
 */

?>

<!-- wp:group {"tagName":"header","metadata":{"patternName":"ls-theme/header","name":"Header","description":"Site header — logo, primary navigation, search, light/dark toggle, and \u0022Start a project\u0022 CTA.","categories":["header"]},"className":"site-header","style":{"border":{"bottom":{"width":"1px","style":"solid","color":"var:custom|color|border|card"}},"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|100","bottom":"var:preset|spacing|20","left":"var:preset|spacing|100"}}}} -->
<header class="wp-block-group site-header" style="border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--100);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--100)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"className":"site-logo-switcher","layout":{"type":"default"}} -->
<div class="wp-block-group site-logo-switcher">
<!-- wp:image {"id":458,"linkDestination":"custom","className":"site-logo--for-light","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<figure class="wp-block-image site-logo--for-light" style="margin-top:0;margin-bottom:0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( wp_get_attachment_url( 458 ) ); ?>" alt="<?php echo esc_attr__( 'LightSpeed home', 'ls-theme' ); ?>" class="wp-image-458"/></a></figure>
<!-- /wp:image -->

<!-- wp:image {"id":459,"linkDestination":"custom","className":"site-logo--for-dark","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<figure class="wp-block-image site-logo--for-dark" style="margin-top:0;margin-bottom:0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( wp_get_attachment_url( 459 ) ); ?>" alt="<?php echo esc_attr__( 'LightSpeed home', 'ls-theme' ); ?>" class="wp-image-459"/></a></figure>
<!-- /wp:image -->
</div>
<!-- /wp:group -->

<!-- wp:navigation {"ref":226,"mobileMenuSlug":"mobile-menu","mobileMenuBreakpointEnabled":true,"mobileMenuBreakpoint":1024,"layout":{"type":"flex","justifyContent":"left","flexWrap":"nowrap"}} /-->

<!-- wp:group {"className":"site-header__actions","style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group site-header__actions"><!-- wp:group {"className":"site-header__search","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group site-header__search"><!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search…","buttonText":"Search","buttonPosition":"button-only","buttonUseIcon":true,"isSearchFieldHidden":true,"style":{"border":{"color":"var(--wp--custom--color--border--card)","radius":"var:preset|border-radius|500","style":"solid","width":"1px"},"color":{"text":"var(--wp--custom--color--text--default)"}}} /--></div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"ls-button-cta-gradient","style":{"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|500","style":"solid","width":"1px"},"color":{"gradient":"linear-gradient(135deg, var(--wp--custom--color--phase--create) 0%, var(--wp--custom--color--link--accent) 60%, var(--wp--custom--color--link--accent) 100%)","text":"var:custom|color|button|fill|text"},"shadow":"var:preset|shadow|interactive-accent","spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}},"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"100"} -->
<div class="wp-block-button ls-button-cta-gradient"><a class="wp-block-button__link has-text-color has-background has-border-color has-100-font-size has-custom-font-size wp-element-button" href="#" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--500);color:var(--wp--custom--color--button--fill--text);background:linear-gradient(135deg, var(--wp--custom--color--phase--create) 0%, var(--wp--custom--color--link--accent) 60%, var(--wp--custom--color--link--accent) 100%);padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);box-shadow:var(--wp--preset--shadow--interactive-accent);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Start a project →', 'ls-theme' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></header>
<!-- /wp:group -->
