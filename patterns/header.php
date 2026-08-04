<?php
/**
 * Title: Header
 * Slug: ls-theme/header
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Site header — logo, primary navigation, search, light/dark toggle, and "Start a project" CTA.
 */

?>

<!-- wp:group {"tagName":"header","metadata":{"patternName":"ls-theme/header","name":"Header","description":"Site header — logo, primary navigation, search, light/dark toggle, and \u0022Start a project\u0022 CTA.","categories":["header"]},"className":"site-header","style":{"border":{"bottom":{"width":"1px","style":"solid","color":"var:custom|color|border|card"}},"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
<header class="wp-block-group site-header" style="border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:site-logo {"isLink":true} /-->

<!-- wp:navigation {"ref":226,"mobileMenuSlug":"mobile-menu","mobileMenuBreakpointEnabled":true,"mobileMenuBreakpoint":1024,"layout":{"type":"flex","justifyContent":"left","flexWrap":"nowrap"}} /-->

<!-- wp:group {"className":"site-header__actions","style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group site-header__actions"><!-- wp:group {"className":"site-header__search","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group site-header__search"><!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search…","buttonText":"Search","buttonPosition":"button-only","buttonUseIcon":true,"isSearchFieldHidden":true} /--></div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-button-cta-gradient"} -->
<div class="wp-block-button is-style-button-cta-gradient"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'Start a project →', 'ls-theme' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></header>
<!-- /wp:group -->
