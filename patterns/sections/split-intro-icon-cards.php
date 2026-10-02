<?php
/**
 * Title: Section - Split Intro Icon Cards
 * Slug: ls-theme/split-intro-icon-cards
 * Categories: featured
 * Block Types: core/pattern
 * Description: An "AI in discovery"-style section for the 14 individual service pages — currently
 * authored with Discovery's copy; edit the eyebrow, heading, principle paragraph and the three
 * cards per page after inserting. A two-column intro (eyebrow and heading on the left, a short
 * principle paragraph with a phase-coloured left rule on the right) above a responsive grid of flat
 * icon cards (Card - Plain: no shadow, no hover lift, because they are not links), each with a
 * phase-tinted icon well, an H3 and supporting copy. Deliberately an ordinary content-band section
 * (no boxed gradient shell, no extra accent colour) so it reads as a section and not as a call to
 * action. Sits on the page canvas (the cards are flat bordered surfaces on it). The eyebrow, rule
 * and icon wells read var(--ls-phase-accent), which follows the service's parent phase via the
 * `ls-service-phase-{phase}` body class (inc/service-phase-map.php). The grid is a core/group with
 * the grid layout and a minimum column width, so any number of cards wraps cleanly. Adapts between
 * the site's light and dark style variations via surface/text/border tokens. No new SCSS.
 * Keywords: service, ai, principle, cards, icons, split, phase, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_cards = array(
	array(
		'icon'        => 'search',
		'title'       => __( 'Search visibility', 'ls-theme' ),
		'description' => __( 'Surface content gaps, competitor patterns and structured opportunities.', 'ls-theme' ),
	),
	array(
		'icon'        => 'arrows-clockwise',
		'title'       => __( 'Reporting automation', 'ls-theme' ),
		'description' => __( 'Find repetitive analysis and reporting work that can be safely accelerated.', 'ls-theme' ),
	),
	array(
		'icon'        => 'stack',
		'title'       => __( 'Future-ready foundations', 'ls-theme' ),
		'description' => __( 'Check content structure, metadata and governance before later AI work depends on them.', 'ls-theme' ),
	),
);

?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band">

	<!-- wp:columns {"verticalAlignment":"bottom","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|70"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-bottom">

		<!-- wp:column {"verticalAlignment":"bottom"} -->
		<div class="wp-block-column is-vertically-aligned-bottom">
			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--ls-phase-accent)"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--ls-phase-accent);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'AI in discovery', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","lineHeight":"var:custom|line-height|heading-snug","letterSpacing":"var:custom|typography|letter-spacing|tight"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"600"} -->
			<h2 class="wp-block-heading has-600-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight);line-height:var(--wp--custom--line-height--heading-snug)"><?php echo esc_html__( 'Use AI to find signals, not to replace judgement', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"bottom"} -->
		<div class="wp-block-column is-vertically-aligned-bottom">
			<!-- wp:paragraph {"style":{"border":{"left":{"color":"var(--ls-phase-accent)","style":"solid","width":"3px"}},"spacing":{"padding":{"left":"var:preset|spacing|30"}}},"fontSize":"200"} -->
			<p class="has-200-font-size" style="border-left-color:var(--ls-phase-accent);border-left-style:solid;border-left-width:3px;padding-left:var(--wp--preset--spacing--30)"><strong><?php echo esc_html__( 'Faster analysis, human-reviewed decisions.', 'ls-theme' ); ?></strong> <span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'We use AI to surface patterns in your content and competitors, and to spot where it can serve the business, always grounded in real requirements.', 'ls-theme' ); ?></span></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"grid","minimumColumnWidth":"22rem"}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--60)">

		<?php foreach ( $ls_cards as $ls_card ) : ?>
		<!-- wp:group {"tagName":"article","className":"is-style-card-plain","layout":{"type":"flex","orientation":"vertical","justifyContent":"left","flexWrap":"nowrap"}} -->
		<article class="wp-block-group is-style-card-plain">
			<!-- wp:group {"style":{"border":{"color":"color-mix(in srgb, var(--ls-phase-accent) 30%, transparent)","radius":"var:preset|border-radius|200","style":"solid","width":"1px"},"color":{"background":"color-mix(in srgb, var(--ls-phase-accent) 10%, transparent)"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
			<div class="wp-block-group has-border-color has-background" style="border-color:color-mix(in srgb, var(--ls-phase-accent) 30%, transparent);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--200);background-color:color-mix(in srgb, var(--ls-phase-accent) 10%, transparent);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
				<!-- wp:icon {"icon":"lightspeed/<?php echo esc_attr( $ls_card['icon'] ); ?>","className":"has-text-color","style":{"color":{"text":"var(--ls-phase-accent)"},"dimensions":{"width":"26px"}}} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"300"} -->
			<h3 class="wp-block-heading has-300-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html( $ls_card['title'] ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
			<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_card['description'] ); ?></p>
			<!-- /wp:paragraph -->
		</article>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
