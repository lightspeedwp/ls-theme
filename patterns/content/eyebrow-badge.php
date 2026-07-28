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
	<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"8px","style":{"color":{"text":"var(--wp--custom--color--icon--background)"}}} -->
	<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--icon--background);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
	<!-- /wp:outermost/icon-block -->

	<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.4px","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
	<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:1.4px;text-transform:uppercase"><?php echo esc_html__( 'Project Categories', 'ls-theme' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
