<?php
/**
 * Title: Eyebrow Badge
 * Slug: ls-theme/eyebrow-badge
 * Categories: text
 * Block Types: core/pattern
 * Description: A small reusable dot-plus-uppercase-label marker used above section headings across the site (e.g. "Work · Proof · Outcomes" in the Work hero). Edit the label text per instance.
 * Keywords: eyebrow, badge, label, kicker, section
 * Viewport Width: 220
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group">
	<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--icon--background)"},"dimensions":{"width":"8px"}}} /-->

	<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
	<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Project Categories', 'ls-theme' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
