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
 * phase-journey-nav.php, which this section normally closes out a page alongside. Background grid
 * lives in src/scss/structural/phase-cta.scss (className ls-phase-cta), the same technique as
 * phase-hero.scss but its own scoped class — deliberately not sharing .ls-phase-hero. Content uses
 * a plain align:wide columns row, matching the other phase-page section patterns' convention,
 * rather than a narrower constrained wrapper. Heading and paragraph use independent width
 * wrappers (not one shared column width) so the heading can stay on one line while the paragraph
 * keeps a narrower, more editorial wrap; columns are 62/38 rather than an even 50/50 split for the
 * same reason. Buttons keep the shared button-phase-primary/
 * outline styles' colour/border/arrow/height untouched, only their horizontal padding is
 * overridden locally (their own inline style, not the shared JSON) — those styles are also used by
 * phase-hero.php, so they're not edited directly.
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
<!-- wp:group {"align":"full","tagName":"section","className":"ls-phase-cta","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|70","bottom":"var:preset|spacing|90","left":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-phase-cta" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--70)">

	<!-- wp:columns {"align":"wide","verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|100"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center","width":"62%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:62%">
				<!-- wp:heading {"level":2,"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"},"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"700"} -->
				<h2 class="wp-block-heading has-text-color has-700-font-size" style="color:var(--wp--custom--color--text--on-dark);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Ready to Start With Clarity?', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}},"layout":{"type":"constrained","contentSize":"460px"}}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"},"typography":{"lineHeight":"var:custom|line-height|heading-loose"}},"fontSize":"300"} -->
					<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--on-dark-muted);line-height:var(--wp--custom--line-height--heading-loose)"><?php echo esc_html__( 'If you need help defining the right direction, reviewing your current platform or shaping a stronger plan for what comes next, the Discover phase is the best place to begin.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--20)">
					<!-- wp:button {"className":"is-style-button-phase-primary","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
					<div class="wp-block-button is-style-button-phase-primary"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><?php echo esc_html__( 'Book a consultation', 'ls-theme' ); ?></a></div>
					<!-- /wp:button -->

					<!-- wp:button {"className":"is-style-button-phase-outline","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
					<div class="wp-block-button is-style-button-phase-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/?type=discovery-workshop' ) ); ?>" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><?php echo esc_html__( 'Request a discovery workshop', 'ls-theme' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","width":"38%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:38%">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<?php foreach ( $ls_cta_checklist as $ls_checklist_item ) : ?>
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
					<div class="wp-block-group">
						<!-- wp:group {"style":{"color":{"background":"var(--wp--custom--color--phase--discover-on-dark)"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
						<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:var(--wp--custom--color--phase--discover-on-dark);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
							<!-- wp:icon {"icon":"lightspeed/check","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--on-light)"},"dimensions":{"width":"11px"}}} /-->
						</div>
						<!-- /wp:group -->

						<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"200"} -->
						<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark-muted)"><?php echo esc_html( $ls_checklist_item ); ?></p>
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
