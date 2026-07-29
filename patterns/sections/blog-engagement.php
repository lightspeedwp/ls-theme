<?php
/**
 * Title: Section - Blog Engagement
 * Slug: ls-theme/blog-engagement
 * Categories: stats
 * Block Types: core/pattern
 * Description: The Blog archive's "Twelve months of practice, charted" section — a thin, blog-specific copy of the existing Stats Grid structure (`ls-theme/section-stats-grid`): same `content-band` shell, `card-divider-both` column row, and `stat-segment` cards, reduced to 3 columns. Deliberately does not reproduce Figma's sparkline chart or 44px heading — this section reuses the existing pattern's shell/styles exactly, only the copy changes. Introduces zero new styles.
 * Keywords: blog, stats, engagement, segment, metrics, section
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

		<!-- wp:pattern {"slug":"ls-theme/eyebrow-badge"} /-->

		<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"500"} -->
		<h2 class="wp-block-heading has-500-font-size" style="margin-top:var(--wp--preset--spacing--20);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Twelve months of practice, charted.', 'ls-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"300"} -->
		<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted);margin-top:var(--wp--preset--spacing--10)"><?php echo esc_html__( 'Each card tracks the topics we write about most often. The shape of the line tells you where our team has been spending its energy in the last year.', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:columns {"align":"wide","className":"is-style-card-divider-both","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
		<div class="wp-block-columns alignwide is-style-card-divider-both" style="margin-top:var(--wp--preset--spacing--40)">

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"tagName":"article","className":"is-style-stat-segment","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<article class="wp-block-group is-style-stat-segment">
					<!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
					<div class="wp-block-group">
						<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"1.2px","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"100"} -->
						<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:1.2px;text-transform:uppercase"><?php echo esc_html__( 'Block Themes', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"1.2px","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
						<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:1.2px;text-transform:uppercase"><?php echo esc_html__( '+34%', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--default)"},"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"800"} -->
					<p class="has-text-color has-800-font-size" style="color:var(--wp--custom--color--text--default);font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( '18', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Articles published', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</article>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"tagName":"article","className":"is-style-stat-segment","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<article class="wp-block-group is-style-stat-segment">
					<!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
					<div class="wp-block-group">
						<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"1.2px","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"100"} -->
						<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:1.2px;text-transform:uppercase"><?php echo esc_html__( 'WooCommerce', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"1.2px","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
						<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:1.2px;text-transform:uppercase"><?php echo esc_html__( '+22%', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--default)"},"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"800"} -->
					<p class="has-text-color has-800-font-size" style="color:var(--wp--custom--color--text--default);font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( '12', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Operations notes', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</article>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"tagName":"article","className":"is-style-stat-segment","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<article class="wp-block-group is-style-stat-segment">
					<!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
					<div class="wp-block-group">
						<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"1.2px","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"100"} -->
						<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:1.2px;text-transform:uppercase"><?php echo esc_html__( 'Design Systems', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"1.2px","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
						<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:1.2px;text-transform:uppercase"><?php echo esc_html__( '+41%', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--default)"},"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"800"} -->
					<p class="has-text-color has-800-font-size" style="color:var(--wp--custom--color--text--default);font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( '24', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Pattern notes & guides', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</article>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
