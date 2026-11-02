<?php
/**
 * Title: Template: Page (Legal)
 * Slug: ls-theme/template-page-legal
 * Categories: template
 * Block Types: core/template-part
 * Description: Main-content pattern for the Page (Legal) custom template — page hero, the document layout with its "On this page" rail around the page's own content, and the related trust pages band. For trust, legal and policy pages (Privacy, Terms, Cookie, Accessibility). The hero embeds its own breadcrumb, so templates/page-legal.html does not also insert the breadcrumbs template part.
 * Inserter: false
 */

?>

<!-- wp:group {"tagName":"main","align":"full","style":{"spacing":{"margin":{"top":"0"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull" style="margin-top:0">
	<!-- wp:pattern {"slug":"ls-theme/page-hero"} /-->

	<!-- wp:pattern {"slug":"ls-theme/legal-document"} /-->

	<!-- wp:pattern {"slug":"ls-theme/related-trust-pages"} /-->
</main>
<!-- /wp:group -->
