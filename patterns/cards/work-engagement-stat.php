<?php
/**
 * Title: Card - Work Engagement Stat
 * Slug: ls-theme/work-engagement-stat
 * Categories: stats
 * Block Types: core/pattern
 * Description: A single stat segment for the Work archive's "Across every engagement" row: label, qualifier, big number with an accent-coloured suffix, and supporting copy.
 * Keywords: work, stats, metric
 * Viewport Width: 342
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"tagName":"article","className":"is-style-stat-segment","style":{"layout":{"selfStretch":"fill"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<article class="wp-block-group is-style-stat-segment">

	<!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"1.2px","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"100"} -->
		<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:1.2px;text-transform:uppercase"><?php echo esc_html__( 'Subscribers', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"1.2px","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
		<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:1.2px;text-transform:uppercase"><?php echo esc_html__( 'Migrated cleanly', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--default)"},"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"800"} -->
	<p class="has-text-color has-800-font-size" style="color:var(--wp--custom--color--text--default);font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( '18k', 'ls-theme' ); ?><span style="color:var(--wp--custom--color--text--brand)"><?php echo esc_html__( '+', 'ls-theme' ); ?></span></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
	<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Self-serve subscription accounts moved without billing interruption', 'ls-theme' ); ?></p>
	<!-- /wp:paragraph -->
</article>
<!-- /wp:group -->
