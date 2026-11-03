<?php
/**
 * Title: Template: Blog Archive
 * Slug: ls-theme/template-blog-archive
 * Categories: template
 * Block Types: core/template-part
 * Description: Main-content pattern for the Blog Archive custom page template. Injects each Blog archive section pattern in sequence — Hero, All Articles, Engagement, Writing CTA. Not tied to post_content, so it renders the same sections regardless of the assigned page's own content. Every section carries its own top:80/bottom:90 padding (no blockGap here) so each section-to-section gap is identical. The one exception is this wrapper's own bottom padding: Writing CTA is a bordered, rounded card floating on the plain page background, not a full-bleed band like the other three, so its own padding only creates room inside the card — it doesn't push the card itself away from whatever follows. This wrapper's bottom padding (reusing the same spacing|90 token every section already uses) is what actually keeps the card clear of the footer.
 * Inserter: false
 *
 * @package ls-theme
 */

?>

<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0"},"padding":{"bottom":"var:preset|spacing|90"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="margin-top:0;padding-bottom:var(--wp--preset--spacing--90)">
	<!-- wp:pattern {"slug":"ls-theme/blog-hero"} /-->
	<!-- wp:pattern {"slug":"ls-theme/blog-all-articles"} /-->
	<!-- wp:pattern {"slug":"ls-theme/blog-engagement"} /-->
	<!-- wp:pattern {"slug":"ls-theme/blog-writing-cta"} /-->
</main>
<!-- /wp:group -->
