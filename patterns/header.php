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
<div class="wp-block-group"><!-- wp:image {"id":225,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="http://localhost:8882/wp-content/uploads/2026/07/image-1.png" alt="" class="wp-image-225"/></figure>
<!-- /wp:image -->

<!-- wp:navigation {"ref":226,"layout":{"type":"flex","justifyContent":"left","flexWrap":"nowrap"}} /-->

<!-- wp:group {"className":"site-header__actions","style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group site-header__actions"><!-- wp:group {"className":"site-header__search","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group site-header__search"><!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search…","buttonText":"Search","buttonPosition":"button-only","buttonUseIcon":true,"isSearchFieldHidden":true} /--></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-header-icon-button","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group is-style-header-icon-button"><!-- wp:html -->
<button type="button" class="ls-theme-toggle" data-ls-theme-toggle aria-pressed="false" aria-label="Toggle light and dark mode">
					<span class="ls-theme-toggle__icon--moon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" width="18" height="18" fill="currentColor"><path d="M233.54,142.23a8,8,0,0,0-8-2,88.08,88.08,0,0,1-109.8-109.8,8,8,0,0,0-10-10,104.84,104.84,0,0,0-52.91,37A104,104,0,0,0,136,224a103.09,103.09,0,0,0,62.52-20.88,104.84,104.84,0,0,0,37-52.91A8,8,0,0,0,233.54,142.23ZM188.9,190.34A88,88,0,0,1,65.66,67.11a89,89,0,0,1,31.4-26A106,106,0,0,0,96,56,104.11,104.11,0,0,0,200,160a106,106,0,0,0,14.92-1.06A89,89,0,0,1,188.9,190.34Z"></path></svg></span>
					<span class="ls-theme-toggle__icon--sun" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" width="18" height="18" fill="currentColor"><path d="M120,40V16a8,8,0,0,1,16,0V40a8,8,0,0,1-16,0Zm72,88a64,64,0,1,1-64-64A64.07,64.07,0,0,1,192,128Zm-16,0a48,48,0,1,0-48,48A48.05,48.05,0,0,0,176,128ZM58.34,69.66A8,8,0,0,0,69.66,58.34l-16-16A8,8,0,0,0,42.34,53.66Zm0,116.68-16,16a8,8,0,0,0,11.32,11.32l16-16a8,8,0,0,0-11.32-11.32ZM192,72a8,8,0,0,0,5.66-2.34l16-16a8,8,0,0,0-11.32-11.32l-16,16A8,8,0,0,0,192,72Zm5.66,114.34a8,8,0,0,0-11.32,11.32l16,16a8,8,0,0,0,11.32-11.32ZM48,128a8,8,0,0,0-8-8H16a8,8,0,0,0,0,16H40A8,8,0,0,0,48,128Zm80,80a8,8,0,0,0-8,8v24a8,8,0,0,0,16,0V216A8,8,0,0,0,128,208Zm112-88H216a8,8,0,0,0,0,16h24a8,8,0,0,0,0-16Z"></path></svg></span>
				</button>
<!-- /wp:html --></div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-button-cta-gradient"} -->
<div class="wp-block-button is-style-button-cta-gradient"><a class="wp-block-button__link wp-element-button" href="#">Start a project →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></header>
<!-- /wp:group -->
