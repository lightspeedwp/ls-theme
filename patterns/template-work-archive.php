<?php
/**
 * Title: Template: Work Archive
 * Slug: ls-theme/template-work-archive
 * Categories: template
 * Block Types: core/template-part
 * Description: Main-content pattern for the Work Archive custom page template. Injects each Work archive section pattern in sequence — Hero, Categories, Selected Projects, and more to follow (Across Every Engagement stats, CTA, Where to go next). Not tied to post_content, so it renders the same sections regardless of the assigned page's own content.
 * Inserter: false
 *
 * @package ls-theme
 */

?>

<!-- wp:group {"tagName":"main","layout":{"type":"constrained"}} -->
<main class="wp-block-group">
	<!-- wp:pattern {"slug":"ls-theme/work-hero"} /-->
	<!-- wp:pattern {"slug":"ls-theme/work-categories"} /-->
	<!-- wp:pattern {"slug":"ls-theme/work-selected-projects"} /-->
</main>
<!-- /wp:group -->
