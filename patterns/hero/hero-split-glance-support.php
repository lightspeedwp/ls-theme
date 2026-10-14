<?php
/**
 * Title: Hero - Split At a Glance with Support Line
 * Slug: ls-theme/hero-split-glance-support
 * Categories: hero
 * Block Types: core/pattern
 * Description: A split hero for decision pages: breadcrumb trail, dot eyebrow, H1, lede paragraph, a smaller support line and primary/outline CTAs on the left (about 64%), and a "snapshot" card on the right (about 36%) listing four label/value rows as a semantic description list. Same shape as Hero - Split At a Glance, with the dot eyebrow used by the section patterns, a support line under the lede and no bottom border (the strip beneath it supplies the divider). Uses the shared corner-glow class for the background. Falls back to core/group and core/columns (plus Yoast breadcrumbs) because no semantic core block fits a labelled summary card. Adapts between light and dark mode through surface, text and border tokens. Edit the eyebrow, heading, lede, support line, button labels/links and the four rows after inserting.
 * Keywords: hero, split, glance, snapshot, consultation, landing, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_glance_rows = array(
	array(
		'label' => __( 'Best for', 'ls-theme' ),
		'value' => __( 'Teams under active platform pressure: redesigns, migrations, WooCommerce or support friction.', 'ls-theme' ),
	),
	array(
		'label' => __( 'Typical topics', 'ls-theme' ),
		'value' => __( 'Fit, scope direction and the best next route.', 'ls-theme' ),
	),
	array(
		'label' => __( 'You leave with', 'ls-theme' ),
		'value' => __( 'Clarity on fit, scope direction and your likely next step.', 'ls-theme' ),
	),
	array(
		'label' => __( 'What this isn\'t', 'ls-theme' ),
		'value' => __( 'A sales pitch or a generic discovery call.', 'ls-theme' ),
	),
);

$ls_glance_row_count = count( $ls_glance_rows );
?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-corner-glow","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|30","bottom":"var:preset|spacing|80","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-corner-glow" style="margin-top:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
		<!-- wp:yoast-seo/breadcrumbs {"className":"alignwide"} /-->
		<?php endif; ?>

		<!-- wp:columns {"align":"wide","verticalAlignment":"top","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-top">

			<!-- wp:column {"verticalAlignment":"top","width":"64%","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:64%">

				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Free consultation', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":1,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"700"} -->
				<h1 class="wp-block-heading has-700-font-size" style="font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Book a consultation that helps you make the next move with confidence', 'ls-theme' ); ?></h1>
				<!-- /wp:heading -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
					<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'This consultation is designed for teams that need clarity on what to do next, whether the pressure is coming from redesigns, migrations, WooCommerce complexity, support issues, content friction or broader platform uncertainty.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
					<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'A focused first conversation for teams that need fit, scope and next-step clarity before committing to a wider route.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button {"tagName":"button","className":"pum-triggercta"} -->
					<div class="wp-block-button pum-triggercta"><button type="button" class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Book your free consultation', 'ls-theme' ); ?></button></div>
					<!-- /wp:button -->

					<!-- wp:button {"tagName":"button","className":"is-style-outline pum-triggerbrief"} -->
					<div class="wp-block-button is-style-outline pum-triggerbrief"><button type="button" class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Send a brief before we talk', 'ls-theme' ); ?></button></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"top","width":"36%"} -->
			<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:36%">
				<!-- wp:group {"tagName":"aside","style":{"color":{"background":"var:custom|color|surface|card"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|400","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|30","bottom":"var:preset|spacing|10","left":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
				<aside class="wp-block-group has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--400);background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--30)">

					<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--brand)"},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);padding-top:var(--wp--preset--spacing--20);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Consultation snapshot', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:group {"tagName":"dl","layout":{"type":"default"}} -->
					<dl class="wp-block-group">
						<?php
						foreach ( $ls_glance_rows as $ls_glance_index => $ls_glance_row ) :
							$ls_glance_is_last = ( $ls_glance_index === $ls_glance_row_count - 1 );
							?>

							<?php if ( $ls_glance_is_last ) : ?>
						<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
						<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">
						<?php else : ?>
						<!-- wp:group {"style":{"border":{"bottom":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
						<div class="wp-block-group" style="border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">
						<?php endif; ?>
							<!-- wp:group {"tagName":"dt","style":{"spacing":{"blockGap":"0"},"layout":{"selfStretch":"fixed","flexSize":"35%"}}} -->
							<dt class="wp-block-group">
								<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wide","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"100"} -->
								<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--wide);text-transform:uppercase"><?php echo esc_html( $ls_glance_row['label'] ); ?></p>
								<!-- /wp:paragraph -->
							</dt>
							<!-- /wp:group -->

							<!-- wp:group {"tagName":"dd","style":{"spacing":{"blockGap":"0"},"layout":{"selfStretch":"fixed","flexSize":"65%"}}} -->
							<dd class="wp-block-group">
								<!-- wp:paragraph {"fontSize":"200"} -->
								<p class="has-200-font-size"><?php echo esc_html( $ls_glance_row['value'] ); ?></p>
								<!-- /wp:paragraph -->
							</dd>
							<!-- /wp:group -->
						</div>
						<!-- /wp:group -->
						<?php endforeach; ?>
					</dl>
					<!-- /wp:group -->
				</aside>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
