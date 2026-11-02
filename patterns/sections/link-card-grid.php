<?php
/**
 * Title: Section - Link Card Grid
 * Slug: ls-theme/link-card-grid
 * Categories: featured
 * Block Types: core/pattern
 * Description: A "where to go next" section for the 14 individual service pages — currently
 * authored with Discovery's three next steps (Content, Development, WordPress solution); edit the
 * eyebrow, heading, description and the cards (title, description, link) per page after inserting.
 * A left-aligned eyebrow/heading/description stack above a responsive grid of Card - Link Row
 * cards, each a single stretched link with a title, a short description and a trailing arrow (the
 * same card as Card - Work Next Steps). The grid is a core/group with the grid layout and a
 * minimum column width, so any number of cards wraps cleanly — duplicate or delete a card. The
 * section reuses the Phase "Where to go next" wrapper class (ls-phase-where-to-go-next,
 * src/scss/structural/phase-where-to-go-next.scss) for equal-height cards and the phase-coloured
 * hover border and arrow, which follow the service's parent phase via the
 * `ls-service-phase-{phase}` body class (inc/service-phase-map.php); the eyebrow and resting arrow
 * read var(--ls-phase-accent). Sits on the page canvas. Adapts between the site's light and dark
 * style variations via surface/text/border tokens. No new SCSS.
 * Keywords: service, next steps, related, links, cards, phase, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_next_steps = array(
	array(
		'title'       => __( 'Content', 'ls-theme' ),
		'description' => __( 'Turn audit insights into structured, on-brand messaging.', 'ls-theme' ),
		'url'         => '/services/content/',
	),
	array(
		'title'       => __( 'Development', 'ls-theme' ),
		'description' => __( 'Scope custom themes and integrations from the findings.', 'ls-theme' ),
		'url'         => '/services/development/',
	),
	array(
		'title'       => __( 'WordPress solution', 'ls-theme' ),
		'description' => __( 'See how discovery informs complex platform builds.', 'ls-theme' ),
		'url'         => '/solutions/wordpress/',
	),
);

?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band ls-phase-where-to-go-next","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band ls-phase-where-to-go-next">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--ls-phase-accent)"}},"fontSize":"100"} -->
		<p class="has-text-color has-100-font-size" style="color:var(--ls-phase-accent);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Next steps', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","lineHeight":"var:custom|line-height|heading-snug","letterSpacing":"var:custom|typography|letter-spacing|tight"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"600"} -->
		<h2 class="wp-block-heading has-600-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight);line-height:var(--wp--custom--line-height--heading-snug)"><?php echo esc_html__( 'Where to go next', 'ls-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}},"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
		<p class="has-text-color has-300-font-size" style="margin-top:var(--wp--preset--spacing--20);color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Discovery findings feed directly into the work that follows.', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"grid","minimumColumnWidth":"22rem"}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--60)">

		<?php foreach ( $ls_next_steps as $ls_step ) : ?>
		<!-- wp:group {"tagName":"article","className":"is-style-card-link-row","layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"center","flexWrap":"nowrap"}} -->
		<article class="wp-block-group is-style-card-link-row">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">
				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"300"} -->
				<h3 class="wp-block-heading has-300-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><a class="ls-card-link-row__link" href="<?php echo esc_url( home_url( $ls_step['url'] ) ); ?>"><?php echo esc_html( $ls_step['title'] ); ?></a></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
				<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_step['description'] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:icon {"icon":"lightspeed/arrow-right","className":"has-text-color","style":{"color":{"text":"var(--ls-phase-accent)"},"dimensions":{"width":"20px"}}} /-->
		</article>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
