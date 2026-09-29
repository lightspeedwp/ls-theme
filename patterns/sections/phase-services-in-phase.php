<?php
/**
 * Title: Section - Phase Services In Phase
 * Slug: ls-theme/phase-services-in-phase
 * Categories: featured
 * Block Types: core/pattern
 * Description: Shared "Services in the [Phase] phase" section for all six lifecycle phase pages.
 * The section shell below is static and phase-agnostic; the phase-dependent heading and service
 * cards are rendered by the ls-theme/phase-services dynamic block (see
 * blocks/phase-services/render.php) — CodeRabbit's requested fix (PR #64): that block's render.php
 * holds the phase → services map (labels/descriptions/URLs/icons, kept in sync with the master
 * list in services-service-tiles.php), reads the current page via block context rather than
 * get_queried_object(), and re-runs on every real request regardless of whether this surrounding
 * pattern stays a live `wp:pattern` reference or gets flattened by the editor — a dynamic block's
 * render callback isn't affected by pattern flattening the way PHP baked directly into a pattern's
 * own stored content is.
 * Keywords: phase, discover, create, build, launch, grow, evolve, services, cards, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band ls-phase-services-in-phase","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|60","bottom":"var:preset|spacing|90","left":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band ls-phase-services-in-phase" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--60)">
	<!-- wp:ls-theme/phase-services /-->
</section>
<!-- /wp:group -->
