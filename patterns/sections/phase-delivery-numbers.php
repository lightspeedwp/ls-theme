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
 * and the Work archive's engagement row — including that style's own built-in trailing divider
 * (border-inline-end), which is deliberately left alone here rather than duplicated with a second,
 * full-column-height border: since the divider lives on the stat article itself, it naturally hugs
 * the stat content's own height instead of stretching the full row. The last column cancels that
 * shared divider locally (an explicit zero-width border override, since a block's own inline style
 * always wins over the class's rule) so the row doesn't end with a stray trailing edge. Background
 * uses surface.card rather than the content-band style's default surface.canvas — a touch lighter
 * than canvas so the band reads as a lifted panel rather than flat pure black/white. Fully adapts
 * between the site's light and dark style variations via surface/text tokens — this section is not
 * forced dark like the hero.
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
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","style":{"color":{"background":"var:custom|color|surface|card"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|60","bottom":"var:preset|spacing|40","left":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band has-background" style="margin-top:0;margin-bottom:0;background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--60)">

	<!-- wp:columns {"align":"wide","className":"ls-phase-stats-row","verticalAlignment":"center"} -->
	<div class="wp-block-columns alignwide ls-phase-stats-row are-vertically-aligned-center">
		<?php
		foreach ( $ls_phase_stats as $ls_stat_index => $ls_stat ) :
			$ls_is_last_column = ( $ls_stat_index === $ls_phase_stats_count - 1 );
			?>

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<?php if ( $ls_is_last_column ) : ?>
			<!-- wp:group {"tagName":"article","className":"is-style-stat-segment","style":{"border":{"right":{"color":"transparent","style":"none","width":"0px"}},"spacing":{"blockGap":"var:preset|spacing|5","padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"center"}} -->
			<article class="wp-block-group is-style-stat-segment" style="border-right-color:transparent;border-right-style:none;border-right-width:0px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
			<?php else : ?>
			<!-- wp:group {"tagName":"article","className":"is-style-stat-segment","style":{"spacing":{"blockGap":"var:preset|spacing|5","padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"center"}} -->
			<article class="wp-block-group is-style-stat-segment" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
			<?php endif; ?>
				<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--phase--discover-on-dark, var(--wp--custom--color--phase--discover))"},"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"600"} -->
				<p class="has-text-align-center has-text-color has-600-font-size" style="color:var(--wp--custom--color--phase--discover-on-dark, var(--wp--custom--color--phase--discover));font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html( $ls_stat['value'] . $ls_stat['suffix'] ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wide","fontWeight":"var:custom|typography|font-weight|semibold","lineHeight":"var:custom|line-height|heading-snug"}},"fontSize":"200"} -->
				<p class="has-text-align-center has-200-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--wide);line-height:var(--wp--custom--line-height--heading-snug);text-transform:uppercase"><?php echo esc_html( $ls_stat['label'] ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"layout":{"type":"constrained","contentSize":"280px","justifyContent":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"200"} -->
					<p class="has-text-align-center has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--subtle)"><?php echo esc_html( $ls_stat['description'] ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
