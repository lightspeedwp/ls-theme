<?php
/**
 * Title: Section - Stat Feature Bento
 * Slug: ls-theme/stat-feature-bento
 * Categories: featured
 * Block Types: core/pattern
 * Description: A proof section: eyebrow, heading and paragraph above a two-column bento. On the left, one large feature stat card (oversized value, label and supporting copy, with a soft glow and two decorative rings); on the right, two smaller stat cards stacked (value beside a label and description). Authored with the Solutions Landing proof points (300+, 10,000+, 220,000+); edit the values, labels and copy after inserting. The columns stack on mobile. Surfaces, borders and text read semantic tokens, so it adapts between light and dark mode; the glow and ring styling lives in src/scss/structural/stat-feature-bento.scss.
 * Keywords: stats, proof, numbers, bento, feature, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_bento_small_stats = array(
	array(
		'value'       => __( '10,000+', 'ls-theme' ),
		'label'       => __( 'Peak concurrent sessions handled', 'ls-theme' ),
		'description' => __( 'Infrastructure and engineering tuned for high-traffic spikes.', 'ls-theme' ),
	),
	array(
		'value'       => __( '220,000+', 'ls-theme' ),
		'label'       => __( 'Posts migrated without metadata loss', 'ls-theme' ),
		'description' => __( 'Massive legacy migrations executed safely and accurately.', 'ls-theme' ),
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|60","bottom":"var:preset|spacing|100","left":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--60)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","contentSize":"900px","justifyContent":"left"}} -->
		<div class="wp-block-group">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Why these solutions', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"700"} -->
			<h2 class="wp-block-heading has-700-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Engineered for real operating models, not generic builds.', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Generic themes and no-code builders lock you into limited patterns, poor performance and vendor dependencies. LightSpeed solutions are engineered from the ground up using open-source technologies, custom block themes and robust integrations.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:columns {"align":"wide","className":"ls-stat-bento","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
		<div class="wp-block-columns alignwide ls-stat-bento">

			<!-- wp:column {"width":"58%","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
			<div class="wp-block-column" style="flex-basis:58%">
				<!-- wp:group {"className":"ls-stat-feature-card","style":{"color":{"background":"var:custom|color|surface|card"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|400","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|80","bottom":"var:preset|spacing|90","left":"var:preset|spacing|80"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"stretch"}} -->
				<div class="wp-block-group ls-stat-feature-card has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--400);background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--80)">
					<!-- wp:paragraph {"className":"ls-stat-feature-card__value","style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold","lineHeight":"var:custom|line-height|heading-tight"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"1000"} -->
					<p class="ls-stat-feature-card__value has-text-color has-1000-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--extrabold);line-height:var(--wp--custom--line-height--heading-tight)"><?php echo esc_html__( '300+', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"fontSize":"400"} -->
					<h3 class="wp-block-heading has-400-font-size"><?php echo esc_html__( 'Custom block themes', 'ls-theme' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
					<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'And 150+ bespoke plugins, built without page-builder bloat to solve specific business problems.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"42%","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
			<div class="wp-block-column" style="flex-basis:42%">
				<?php foreach ( $ls_bento_small_stats as $ls_stat ) : ?>
				<!-- wp:group {"style":{"color":{"background":"var:custom|color|surface|card"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|400","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|40","padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
				<div class="wp-block-group has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--400);background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
					<!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold","lineHeight":"var:custom|line-height|heading-tight"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"700"} -->
					<p class="has-text-color has-700-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--extrabold);line-height:var(--wp--custom--line-height--heading-tight)"><?php echo esc_html( $ls_stat['value'] ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
					<div class="wp-block-group">
						<!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--default)"}},"fontSize":"200"} -->
						<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--default);font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html( $ls_stat['label'] ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
						<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_stat['description'] ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
				<?php endforeach; ?>
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
