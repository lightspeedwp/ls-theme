<?php
/**
 * Title: Section - Stats Row Left-aligned
 * Slug: ls-theme/stats-row-left
 * Categories: stats
 * Block Types: core/pattern
 * Description: A four-figure proof-point strip with left-aligned stats and vertical dividers, on a surface.card band with a bottom border. Same building blocks as Stats Bar (the ls-stats-row / ls-stat-item classes and their responsive 2x2 grid below 1020px, switching to a single column below 600px) but left-aligned and with larger figures. Uses core/group and core/paragraph because no semantic core block fits a stat. Adapts between light and dark mode through surface, text and border tokens. Edit the figures and captions after inserting.
 * Keywords: stats, proof, metrics, numbers, strip, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_stats_row_items = array(
	array(
		'value' => __( '10+', 'ls-theme' ),
		'label' => __( 'Enterprise design systems created', 'ls-theme' ),
	),
	array(
		'value' => __( '230', 'ls-theme' ),
		'label' => __( 'Design tokens actively managed', 'ls-theme' ),
	),
	array(
		'value' => __( '2,000+', 'ls-theme' ),
		'label' => __( 'Hours invested in design-system engineering', 'ls-theme' ),
	),
	array(
		'value' => __( '100%', 'ls-theme' ),
		'label' => __( 'WCAG 2.1/2.2 AA compliance from day one', 'ls-theme' ),
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"color":{"background":"var:custom|color|surface|card"},"border":{"bottom":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|30","bottom":"var:preset|spacing|50","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-background" style="border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;background-color:var(--wp--custom--color--surface--card);margin-top:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"className":"ls-stats-row ls-stats-row--left","align":"wide","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
	<div class="wp-block-group ls-stats-row ls-stats-row--left alignwide is-content-justification-space-between">
		<?php foreach ( $ls_stats_row_items as $ls_stats_row_index => $ls_stats_row_item ) : ?>

			<?php if ( 0 === $ls_stats_row_index ) : ?>
		<!-- wp:group {"className":"ls-stat-item","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"layout":{"selfStretch":"fixed","flexSize":"25%"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"left"}} -->
		<div class="wp-block-group ls-stat-item" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
		<?php else : ?>
		<!-- wp:group {"className":"ls-stat-item ls-stat-item--divider","style":{"border":{"left":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"blockGap":"var:preset|spacing|10","padding":{"left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"layout":{"selfStretch":"fixed","flexSize":"25%"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"left"}} -->
		<div class="wp-block-group ls-stat-item ls-stat-item--divider" style="border-left-color:var(--wp--custom--color--border--card);border-left-style:solid;border-left-width:1px;padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
		<?php endif; ?>
			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"700"} -->
			<p class="has-text-color has-700-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html( $ls_stats_row_item['value'] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
			<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_stats_row_item['label'] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
