<?php
/**
 * Title: Template: Work Single
 * Slug: ls-theme/template-work-single
 * Categories: template
 * Block Types: core/template-part
 * Description: Main-content pattern for the Work Single (project) template — the Work Single hero (redesigned) followed by the post's own content, rendered exactly as authored so existing case studies keep their structure unchanged.
 * Inserter: false
 *
 * @package ls-theme
 */

?>

<!-- wp:group {"tagName":"main","layout":{"type":"constrained"}} -->
<main class="wp-block-group">
	<!-- wp:pattern {"slug":"ls-theme/work-single-hero"} /-->
	<!-- wp:post-content {"align":"wide","layout":{"type":"constrained"}} /-->
</main>
<!-- /wp:group -->
