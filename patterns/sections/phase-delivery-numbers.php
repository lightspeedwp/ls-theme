<?php
/**
 * Title: Section - Phase Delivery Numbers
 * Slug: ls-theme/phase-delivery-numbers
 * Categories: featured
 * Block Types: core/pattern
 * Description: Shared 3-stat row for all six lifecycle phase pages — currently authored with
 * Discover's own stats/copy; the stat values and captions still need to be pulled out per-page
 * (e.g. via Pattern Overrides) before this is reused on the other five pages. Reuses the existing
 * Stat Segment style (is-style-stat-segment) — same building block as services-delivery-numbers.php
 * and the Work archive's engagement row — with a vertical divider border between columns (a
 * per-column border attribute, no new CSS) to match the Figma reference. Fully adapts between the
 * site's light and dark style variations via surface/text tokens — this section is not forced dark
 * like the hero.
 * Keywords: phase, stats, delivery, discover, create, build, launch, grow, evolve, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_phase_stats = array(
	array(
		'value'       => '6',
		'suffix'      => __( '+', 'ls-theme' ),
		'label'       => __( 'Complex CMS migration types', 'ls-theme' ),
		'description' => __( 'WordPress, WooCommerce, Drupal, Shopify, custom CMS and bespoke stacks.', 'ls-theme' ),
	),
	array(
		'value'       => '120,000',
		'suffix'      => __( '+', 'ls-theme' ),
		'label'       => __( 'Legacy posts migrated', 'ls-theme' ),
		'description' => __( 'Audited, restructured and brought into a maintainable WordPress system.', 'ls-theme' ),
	),
	array(
		'value'       => '∞',
		'suffix'      => '',
		'label'       => __( 'Analysis speed', 'ls-theme' ),
		'description' => __( 'AI-assisted research lets us understand a platform in a fraction of the usual time.', 'ls-theme' ),
	),
);

$ls_phase_stats_count = count( $ls_phase_stats );
?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">

	<!-- wp:columns {"align":"wide","className":"ls-phase-stats-row"} -->
	<div class="wp-block-columns alignwide ls-phase-stats-row">
		<?php
		foreach ( $ls_phase_stats as $ls_stat_index => $ls_stat ) :
			$ls_is_last_column = ( $ls_stat_index === $ls_phase_stats_count - 1 );
			?>

			<?php if ( $ls_is_last_column ) : ?>
		<!-- wp:column -->
		<div class="wp-block-column">
		<?php else : ?>
		<!-- wp:column {"style":{"border":{"right":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}}}} -->
		<div class="wp-block-column" style="border-right-color:var(--wp--custom--color--border--card);border-right-style:solid;border-right-width:1px">
		<?php endif; ?>
			<!-- wp:group {"tagName":"article","className":"is-style-stat-segment","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"center"}} -->
			<article class="wp-block-group is-style-stat-segment">
				<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"600"} -->
				<p class="has-text-align-center has-text-color has-600-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html( $ls_stat['value'] . $ls_stat['suffix'] ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wide","fontWeight":"var:custom|typography|font-weight|semibold"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"200"} -->
				<p class="has-text-align-center has-200-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--wide);text-transform:uppercase"><?php echo esc_html( $ls_stat['label'] ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"100"} -->
				<p class="has-text-align-center has-text-color has-100-font-size" style="margin-top:var(--wp--preset--spacing--10);color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_stat['description'] ); ?></p>
				<!-- /wp:paragraph -->
			</article>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
