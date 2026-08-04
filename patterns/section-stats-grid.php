<?php
/**
 * Title: Stats Grid
 * Slug: ls-theme/section-stats-grid
 * Categories: stats
 * Block Types: core/pattern
 * Description: A generic 4-column stat/segment row with a heading, intro copy, and a small pill badge, wrapped in a top-and-bottom divider band. Used on the Work archive as "Across every engagement," but not tied to that page — content is edited per instance.
 * Keywords: stats, grid, segment, metrics, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"left"}} -->
		<div class="wp-block-group alignwide">

			<!-- wp:columns {"align":"wide"} -->
			<div class="wp-block-columns alignwide">

				<!-- wp:column {"width":""} -->
				<div class="wp-block-column">
					<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"500px","justifyContent":"left"}} -->
					<div class="wp-block-group alignwide">
						<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
						<div class="wp-block-group alignwide">

							<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
							<div class="wp-block-group">
								<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"500"} -->
								<h2 class="wp-block-heading has-500-font-size" style="font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Across every engagement.', 'ls-theme' ); ?></h2>
								<!-- /wp:heading -->

								<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"300"} -->
								<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted);margin-top:var(--wp--preset--spacing--10)"><?php echo esc_html__( 'A flat tally of what these case studies represent in total. The numbers below cover the work index on this page.', 'ls-theme' ); ?></p>
								<!-- /wp:paragraph -->
							</div>
							<!-- /wp:group -->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"bottom","width":"210px"} -->
				<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:210px">
					<!-- wp:group {"style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 10%, transparent)"},"border":{"radius":"var:preset|border-radius|200"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|10","bottom":"var:preset|spacing|5","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"bottom"}} -->
					<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--200);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 10%, transparent);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--10)">
						<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"1px"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
						<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--monospace);letter-spacing:1px;text-transform:uppercase"><?php echo esc_html__( 'Across every engagement', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:group -->

		<!-- wp:columns {"align":"wide","className":"is-style-card-divider-both","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
		<div class="wp-block-columns alignwide is-style-card-divider-both" style="margin-top:var(--wp--preset--spacing--40)">

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:columns {"isStackedOnMobile":false} -->
				<div class="wp-block-columns is-not-stacked-on-mobile">

					<!-- wp:column -->
					<div class="wp-block-column">
						<!-- wp:group {"tagName":"article","className":"is-style-stat-segment","style":{"border":{"right":{"color":"var(--wp--custom--color--border--card)","width":"1px","style":"solid"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
						<article class="wp-block-group is-style-stat-segment" style="border-right-color:var(--wp--custom--color--border--card);border-right-width:1px;border-right-style:solid">
							<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
							<div class="wp-block-group">
								<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"1.2px","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"100"} -->
								<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:1.2px;text-transform:uppercase"><?php echo esc_html__( 'Platforms', 'ls-theme' ); ?></p>
								<!-- /wp:paragraph -->

								<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"1.2px","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
								<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:1.2px;text-transform:uppercase"><?php echo esc_html__( 'Case studies', 'ls-theme' ); ?></p>
								<!-- /wp:paragraph -->
							</div>
							<!-- /wp:group -->

							<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--default)"},"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"800"} -->
							<p class="has-text-color has-800-font-size" style="color:var(--wp--custom--color--text--default);font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( '4', 'ls-theme' ); ?></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
							<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Production WordPress and WooCommerce sites', 'ls-theme' ); ?></p>
							<!-- /wp:paragraph -->
						</article>
						<!-- /wp:group -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column -->
					<div class="wp-block-column">
						<!-- wp:pattern {"slug":"ls-theme/work-engagement-stat"} /-->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:columns {"isStackedOnMobile":false} -->
				<div class="wp-block-columns is-not-stacked-on-mobile">

					<!-- wp:column -->
					<div class="wp-block-column">
						<!-- wp:group {"tagName":"article","className":"is-style-stat-segment","style":{"border":{"right":{"color":"var(--wp--custom--color--border--card)","width":"1px","style":"solid"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
						<article class="wp-block-group is-style-stat-segment" style="border-right-color:var(--wp--custom--color--border--card);border-right-width:1px;border-right-style:solid">
							<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
							<div class="wp-block-group">
								<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"1.2px","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"100"} -->
								<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:1.2px;text-transform:uppercase"><?php echo esc_html__( 'TTFB', 'ls-theme' ); ?></p>
								<!-- /wp:paragraph -->

								<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"1.2px","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
								<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:1.2px;text-transform:uppercase"><?php echo esc_html__( 'Avg improvement', 'ls-theme' ); ?></p>
								<!-- /wp:paragraph -->
							</div>
							<!-- /wp:group -->

							<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--default)"},"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"800"} -->
							<p class="has-text-color has-800-font-size" style="color:var(--wp--custom--color--text--default);font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( '−1.4', 'ls-theme' ); ?><span style="color:var(--wp--custom--color--text--brand)"><?php echo esc_html__( 's', 'ls-theme' ); ?></span></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
							<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Time-to-first-byte gain after platform reset', 'ls-theme' ); ?></p>
							<!-- /wp:paragraph -->
						</article>
						<!-- /wp:group -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column -->
					<div class="wp-block-column">
						<!-- wp:group {"tagName":"article","className":"is-style-stat-segment","style":{"border":{"right":{"color":"var(--wp--custom--color--border--card)","width":"1px","style":"solid"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
						<article class="wp-block-group is-style-stat-segment" style="border-right-color:var(--wp--custom--color--border--card);border-right-width:1px;border-right-style:solid">
							<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
							<div class="wp-block-group">
								<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"1.2px","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"100"} -->
								<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:1.2px;text-transform:uppercase"><?php echo esc_html__( 'Tokens', 'ls-theme' ); ?></p>
								<!-- /wp:paragraph -->

								<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"1.2px","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
								<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:1.2px;text-transform:uppercase"><?php echo esc_html__( 'In system', 'ls-theme' ); ?></p>
								<!-- /wp:paragraph -->
							</div>
							<!-- /wp:group -->

							<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--default)"},"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"800"} -->
							<p class="has-text-color has-800-font-size" style="color:var(--wp--custom--color--text--default);font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( '180', 'ls-theme' ); ?><span style="color:var(--wp--custom--color--text--brand)"><?php echo esc_html__( '+', 'ls-theme' ); ?></span></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
							<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Design-system tokens authored across active themes', 'ls-theme' ); ?></p>
							<!-- /wp:paragraph -->
						</article>
						<!-- /wp:group -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
