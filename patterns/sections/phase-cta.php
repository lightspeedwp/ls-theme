<?php
/**
 * Title: Section - Phase CTA
 * Slug: ls-theme/phase-cta
 * Categories: cta
 * Block Types: core/pattern
 * Description: Shared closing CTA for all six lifecycle phase pages — currently authored with
 * Discover's own copy; the heading, paragraph and checklist still need to be pulled out per-page
 * before this is reused on the other five pages. Two-column layout: heading, paragraph and the two
 * buttons already established in phase-hero.php (is-style-button-phase-primary /
 * is-style-button-phase-outline) on the left, a 3-item checklist on the right reusing the
 * green-circle-check row convention from homepage-why-lightspeed.php. Permanently dark, independent
 * of the light/dark style variation toggle — same "on-dark" tokens as phase-hero.php and
 * phase-journey-nav.php, which this section normally closes out a page alongside.
 * Keywords: phase, discover, create, build, launch, grow, evolve, cta, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_cta_checklist = array(
	__( 'Goal-aligned project brief aligned to business KPIs', 'ls-theme' ),
	__( 'Audience personas backed by real data', 'ls-theme' ),
	__( 'Competitor analysis & gap identification', 'ls-theme' ),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"color":{"background":"var:custom|color|surface|band-end"},"spacing":{"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|60","bottom":"var:preset|spacing|90","left":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-background" style="background-color:var(--wp--custom--color--surface--band-end);padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--60)">

	<!-- wp:columns {"align":"wide","verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center","width":"58%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:58%">
			<!-- wp:heading {"level":2,"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"},"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"800"} -->
			<h2 class="wp-block-heading has-text-color has-800-font-size" style="color:var(--wp--custom--color--text--on-dark);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Ready to Start With Clarity?', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--on-dark-muted);margin-top:var(--wp--preset--spacing--20)"><?php echo esc_html__( 'If you need help defining the right direction, reviewing your current platform or shaping a stronger plan for what comes next, the Discover phase is the best place to begin.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)">
				<!-- wp:button {"className":"is-style-button-phase-primary"} -->
				<div class="wp-block-button is-style-button-phase-primary"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>"><?php echo esc_html__( 'Book a consultation', 'ls-theme' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-button-phase-outline"} -->
				<div class="wp-block-button is-style-button-phase-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/?type=discovery-workshop' ) ); ?>"><?php echo esc_html__( 'Request a discovery workshop', 'ls-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"42%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:42%">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">
				<?php foreach ( $ls_cta_checklist as $ls_checklist_item ) : ?>
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:group {"style":{"color":{"background":"var(--wp--custom--color--phase--discover-on-dark)"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
					<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:var(--wp--custom--color--phase--discover-on-dark);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
						<!-- wp:icon {"icon":"lightspeed/check","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"},"dimensions":{"width":"11px"}}} /-->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"}},"fontSize":"200"} -->
					<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark)"><?php echo esc_html( $ls_checklist_item ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<?php endforeach; ?>
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
