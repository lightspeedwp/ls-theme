<?php
/**
 * Title: Section - Services Entry Points
 * Slug: ls-theme/services-entry-points
 * Categories: featured
 * Block Types: core/pattern
 * Description: The Services page's "You don't have to buy everything at once." section: eyebrow/heading/description on the left and, on the right, a 2x2 grid of entry-point link cards (Start with discovery, Support review, Migration assessment, AI-readiness discussion), each linking to its corresponding individual service page. Reuses the existing Card - Link Row style — no new card style needed.
 * Keywords: services, entry points, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_entry_points = array(
	array(
		'label'       => __( 'Start with discovery', 'ls-theme' ),
		'description' => __( 'When the route forward is unclear and the brief needs evidence.', 'ls-theme' ),
		'url'         => '/services/discovery/',
	),
	array(
		'label'       => __( 'Support review', 'ls-theme' ),
		'description' => __( 'When the platform is live but the day-to-day is fragile.', 'ls-theme' ),
		'url'         => '/services/support/',
	),
	array(
		'label'       => __( 'Migration assessment', 'ls-theme' ),
		'description' => __( 'When the platform needs to move without losing traction.', 'ls-theme' ),
		'url'         => '/services/migrations/',
	),
	array(
		'label'       => __( 'AI-readiness discussion', 'ls-theme' ),
		'description' => __( "When AI work is on the roadmap but the foundations aren't ready.", 'ls-theme' ),
		'url'         => '/services/ai/',
	),
);

$ls_arrow_icon_slug = 'arrow-right';
?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","style":{"color":{"background":"var:custom|color|surface|card-raised"},"spacing":{"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|60","bottom":"var:preset|spacing|100","left":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band has-background" style="background-color:var(--wp--custom--color--surface--card-raised);padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--60)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:columns {"align":"wide","verticalAlignment":"top"} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-top">

			<!-- wp:column {"verticalAlignment":"top","width":"38%"} -->
			<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:38%">
				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"}},"dimensions":{"width":"8px"}} /-->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Entry points', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"600"} -->
				<h2 class="wp-block-heading has-600-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( "You don't have to buy everything at once.", 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}},"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="margin-top:var(--wp--preset--spacing--20);color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'A project may start with discovery, a support review, a migration assessment or an AI-readiness discussion. The value comes from the fact that each next step still fits into a larger model.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"top","width":"62%"} -->
			<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:62%">
				<!-- wp:group {"layout":{"type":"grid","minimumColumnWidth":"260px","columnGap":"var:preset|spacing|20","rowGap":"var:preset|spacing|20"}} -->
				<div class="wp-block-group">
					<?php foreach ( $ls_entry_points as $ls_entry ) : ?>

					<!-- wp:group {"tagName":"article","className":"is-style-card-link-row","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
					<article class="wp-block-group is-style-card-link-row">
						<!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"center","flexWrap":"nowrap"}} -->
						<div class="wp-block-group">
							<!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"200"} -->
							<p class="has-200-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><a class="ls-card-link-row__link" href="<?php echo esc_url( home_url( $ls_entry['url'] ) ); ?>"><?php echo esc_html( $ls_entry['label'] ); ?></a></p>
							<!-- /wp:paragraph -->

							<!-- wp:icon {"icon":"lightspeed/<?php echo esc_attr( $ls_arrow_icon_slug ); ?>","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"}},"dimensions":{"width":"14px"}} /-->
						</div>
						<!-- /wp:group -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|10"}},"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
						<p class="has-text-color has-100-font-size" style="margin-top:var(--wp--preset--spacing--10);color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_entry['description'] ); ?></p>
						<!-- /wp:paragraph -->
					</article>
					<!-- /wp:group -->

					<?php endforeach; ?>
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
