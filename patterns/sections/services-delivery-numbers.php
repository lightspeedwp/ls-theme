<?php
/**
 * Title: Section - Services Delivery Numbers
 * Slug: ls-theme/services-delivery-numbers
 * Categories: featured
 * Block Types: core/pattern
 * Description: The Services page's "Twelve years of WordPress engineering, not a slide-deck claim." section: a centered eyebrow/heading/description intro, followed by 3 centered delivery-scale stats (WordPress depth, Platform launches, Approved client praise). Reuses the existing Stat Segment style (is-style-stat-segment) — same building block as the Work archive's engagement row — just composed centered with the value shown before its label, instead of that pattern's left-aligned label-first order. No new card style needed.
 * Keywords: services, stats, delivery, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_delivery_stats = array(
	array(
		'value'       => '12',
		'suffix'      => __( '+ yrs', 'ls-theme' ),
		'label'       => __( 'WordPress depth', 'ls-theme' ),
		'description' => __( 'Continuous practice since 2014 — block-first since 2022.', 'ls-theme' ),
	),
	array(
		'value'       => '100',
		'suffix'      => __( '+', 'ls-theme' ),
		'label'       => __( 'Platform launches', 'ls-theme' ),
		'description' => __( 'Production sites delivered across publishers, retailers and operators.', 'ls-theme' ),
	),
	array(
		'value'       => '5',
		'suffix'      => __( '★', 'ls-theme' ),
		'label'       => __( 'Approved client praise', 'ls-theme' ),
		'description' => __( 'Every testimonial on the site is named, dated and approved.', 'ls-theme' ),
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|60","bottom":"var:preset|spacing|100","left":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--60)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"680px"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"}},"dimensions":{"width":"8px"}} /-->

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Delivery, by the numbers', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"600"} -->
		<h2 class="wp-block-heading has-text-align-center has-600-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Twelve years of WordPress engineering, not a slide-deck claim.', 'ls-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}},"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
		<p class="has-text-align-center has-text-color has-300-font-size" style="margin-top:var(--wp--preset--spacing--20);color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( "We've been working in WordPress since 2014. The numbers below are the ones that survive scrutiny when a buyer asks 'who have you done this for?'", 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--60)">
		<?php foreach ( $ls_delivery_stats as $ls_stat ) : ?>

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"tagName":"article","className":"is-style-stat-segment","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"center"}} -->
			<article class="wp-block-group is-style-stat-segment">
				<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--default)"},"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"900"} -->
				<p class="has-text-align-center has-text-color has-900-font-size" style="color:var(--wp--custom--color--text--default);font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html( $ls_stat['value'] ); ?><span style="color:var(--wp--custom--color--text--brand)"><?php echo esc_html( $ls_stat['suffix'] ); ?></span></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<p class="has-text-align-center has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html( $ls_stat['label'] ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
				<p class="has-text-align-center has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_stat['description'] ); ?></p>
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
