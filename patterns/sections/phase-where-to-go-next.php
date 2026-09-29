<?php
/**
 * Title: Section - Phase Where To Go Next
 * Slug: ls-theme/phase-where-to-go-next
 * Categories: featured
 * Block Types: core/pattern
 * Description: Shared "Where to go next" section for all six lifecycle phase pages — currently
 * authored with Discover's own two next-step cards (the next phase in the lifecycle, and the
 * Our Process overview); the eyebrow and card content still need to be pulled out per-page before
 * this is reused on the other five pages. Two equal-width cards reusing the existing
 * Card - Link Row style and Link Arrow Accent paragraph style (same "Explore service"/"Read more"
 * convention used in phase-services-in-phase.php), rather than the source design's 4-column grid,
 * which only ever renders two cards. Adapts between the site's light and dark style variations via
 * text tokens; the phase accent uses the plain phase.{slug} token, same reasoning as
 * phase-support-focus.php and phase-common-services.php.
 * Keywords: phase, discover, create, build, launch, grow, evolve, next steps, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_next_steps = array(
	array(
		'title'       => __( 'Create', 'ls-theme' ),
		'description' => __( 'Once the evidence is in place, Create turns that clarity into usable design and content structure.', 'ls-theme' ),
		'url'         => '/services/create/',
	),
	array(
		'title'       => __( 'Our Process', 'ls-theme' ),
		'description' => __( 'See where Discover sits inside the full lifecycle.', 'ls-theme' ),
		'url'         => '/about/process/',
	),
);

$ls_phase_accent = 'var(--ls-phase-accent)';
?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band ls-phase-where-to-go-next","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|60","bottom":"var:preset|spacing|100","left":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band ls-phase-where-to-go-next" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--60)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"<?php echo esc_attr( $ls_phase_accent ); ?>"}},"fontSize":"100"} -->
		<p class="has-text-align-center has-text-color has-100-font-size" style="color:<?php echo esc_attr( $ls_phase_accent ); ?>;font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Where to go next', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"1050px","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:columns {"blockGap":{"left":"var:preset|spacing|10"}} -->
		<div class="wp-block-columns">
			<?php foreach ( $ls_next_steps as $ls_step ) : ?>

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"tagName":"article","className":"is-style-card-link-row","style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<article class="wp-block-group is-style-card-link-row">
					<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"300"} -->
					<h3 class="wp-block-heading has-300-font-size" style="font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html( $ls_step['title'] ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
					<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_step['description'] ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"is-style-link-arrow-accent","style":{"spacing":{"margin":{"top":"auto"}}},"fontSize":"200"} -->
					<p class="is-style-link-arrow-accent has-200-font-size" style="margin-top:auto"><a class="ls-card-link-row__link" href="<?php echo esc_url( home_url( $ls_step['url'] ) ); ?>"><?php echo esc_html__( 'Read more', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</article>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<?php endforeach; ?>
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
