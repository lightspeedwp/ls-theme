<?php
/**
 * Title: Header
 * Slug: ls-theme/header
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Site header with site title and navigation.
 */

?>

<!-- wp:group {"tagName":"header","className":"site-header","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<header class="wp-block-group site-header" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:group {"metadata":{"name":"Container row"},"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide"><!-- wp:site-logo {"width":220} /-->

<!-- wp:navigation {"ref":4,"overlayMenu":"never","layout":{"type":"flex","justifyContent":"right","flexWrap":"nowrap"}} /-->

<!-- wp:search {"label":"Search","showLabel":false,"buttonText":"Search","buttonPosition":"button-only","buttonUseIcon":true,"isSearchFieldHidden":true} /--></div>
<!-- /wp:group --></header>
<!-- /wp:group -->
 