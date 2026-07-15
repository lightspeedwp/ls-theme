<?php
/**
 * Title: Breadcrumbs
 * Slug: ls-theme/breadcrumbs
 * Categories: breadcrumbs
 * Block Types: core/template-part/breadcrumbs
 * Description: A breadcrumb navigation section for the website.
 */

?>

<?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
<div class="wp-block-group alignfull">
	<!-- wp:yoast-seo/breadcrumbs /-->
</div>
<!-- /wp:group -->
<?php endif; ?>