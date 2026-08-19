<?php
/**
 * Title: Template: Blog Archive
 * Slug: ls-theme/template-blog-archive
 * Categories: template
 * Block Types: core/template-part
 * Description: Main-content pattern for the Blog Archive custom page template. Injects each Blog archive section pattern in sequence — Hero, All Articles, Engagement, Writing CTA. Not tied to post_content, so it renders the same sections regardless of the assigned page's own content.
 * Inserter: false
 *
 * @package ls-theme
 */

?>

<!-- wp:group {"tagName":"main","style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group">
	<!-- wp:pattern {"slug":"ls-theme/blog-hero"} /-->
	<!-- wp:pattern {"slug":"ls-theme/blog-all-articles"} /-->
	<!-- wp:pattern {"slug":"ls-theme/blog-engagement"} /-->
	<!-- wp:pattern {"slug":"ls-theme/blog-writing-cta"} /-->
</main>
<!-- /wp:group -->
