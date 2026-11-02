<?php
/**
 * Title: Section - Icon Strip
 * Slug: ls-theme/icon-strip
 * Categories: featured
 * Block Types: core/pattern
 * Description: A slim reassurance strip for the page canvas: a single wrapping row of short labels spread evenly across the full width (first item flush left, last flush right), each led by a brand-coloured Icon block, with a bottom border. Sits directly under a hero (the labels are plain text, not figures, so Stats Bar and Stats Row Left do not fit). Add, remove or reword items freely; they wrap on narrow screens. Falls back to core/group and core/paragraph because no semantic core block fits an icon label row. Adapts between light and dark mode through surface, text, icon and border tokens. Edit the labels and icons after inserting.
 * Keywords: strip, labels, icons, reassurance, trust, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_strip_items = array(
	array(
		'icon'  => 'check',
		'label' => __( 'Honest fit assessment', 'ls-theme' ),
	),
	array(
		'icon'  => 'clipboard-text',
		'label' => __( 'Likely scope direction', 'ls-theme' ),
	),
	array(
		'icon'  => 'arrow-right',
		'label' => __( 'Recommended next step', 'ls-theme' ),
	),
	array(
		'icon'  => 'lightbulb',
		'label' => __( 'A smaller, better first move', 'ls-theme' ),
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"border":{"bottom":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;margin-top:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|60"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
	<div class="wp-block-group alignwide is-content-justification-space-between">
		<?php foreach ( $ls_strip_items as $ls_strip_item ) : ?>

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:icon {"icon":"lightspeed/<?php echo esc_attr( $ls_strip_item['icon'] ); ?>","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"20px"}}} /-->

			<!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|medium"}},"fontSize":"200"} -->
			<p class="has-200-font-size" style="font-weight:var(--wp--custom--typography--font-weight--medium)"><?php echo esc_html( $ls_strip_item['label'] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
