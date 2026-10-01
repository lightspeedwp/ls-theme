<?php
/**
 * Title: Section - Icon Card Grid
 * Slug: ls-theme/icon-card-grid
 * Categories: featured
 * Block Types: core/pattern
 * Description: A "what this service includes" section for the 14 individual service pages —
 * currently authored with Discovery's six cards; edit the eyebrow, heading, description and cards
 * per page after inserting. A left-aligned eyebrow/heading/description stack above a responsive grid
 * of flat cards (Card - Plain: no shadow, no hover lift, because they are not links), each with a
 * phase-tinted icon well, an H3 and supporting copy. The grid is a core/group with the grid layout
 * and a minimum column width (not fixed columns), so any number of cards — 3, 6, 9 — wraps cleanly
 * to 3, 2 or 1 per row; just duplicate or delete a card. The eyebrow and icon wells read
 * var(--ls-phase-accent), which follows the service's parent phase via the
 * `ls-service-phase-{phase}` body class (inc/service-phase-map.php). Section sits on a surface.card
 * band; the cards use surface.canvas. Adapts between the site's light and dark style variations via
 * surface/text/border tokens. No new SCSS.
 * Keywords: service, includes, cards, icons, grid, phase, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_cards = array(
	array(
		'icon'        => 'users-three',
		'title'       => __( 'Stakeholder workshops', 'ls-theme' ),
		'description' => __( 'Gather requirements and align expectations across teams.', 'ls-theme' ),
	),
	array(
		'icon'        => 'file-text',
		'title'       => __( 'Content audit', 'ls-theme' ),
		'description' => __( 'Assess existing pages, posts, media and metadata.', 'ls-theme' ),
	),
	array(
		'icon'        => 'search',
		'title'       => __( 'Competitive and keyword research', 'ls-theme' ),
		'description' => __( 'Benchmark against peers and identify content gaps.', 'ls-theme' ),
	),
	array(
		'icon'        => 'code',
		'title'       => __( 'Technical scoping', 'ls-theme' ),
		'description' => __( 'Evaluate CMS, plugins, APIs and hosting constraints.', 'ls-theme' ),
	),
	array(
		'icon'        => 'arrows-left-right',
		'title'       => __( 'Migration feasibility', 'ls-theme' ),
		'description' => __( 'Map legacy data to WordPress and plan redirects.', 'ls-theme' ),
	),
	array(
		'icon'        => 'brain',
		'title'       => __( 'AI readiness assessment', 'ls-theme' ),
		'description' => __( 'Identify structured data needs and future automation opportunities.', 'ls-theme' ),
	),
);

?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","style":{"color":{"background":"var:custom|color|surface|card"},"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"},"bottom":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band has-background" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;background-color:var(--wp--custom--color--surface--card)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--ls-phase-accent)"}},"fontSize":"100"} -->
		<p class="has-text-color has-100-font-size" style="color:var(--ls-phase-accent);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'What this service includes', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold","lineHeight":"var:custom|line-height|heading-snug","letterSpacing":"var:custom|typography|letter-spacing|tight"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"600"} -->
		<h2 class="wp-block-heading has-600-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:var(--wp--custom--typography--font-weight--extrabold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight);line-height:var(--wp--custom--line-height--heading-snug)"><?php echo esc_html__( 'The work we do to get you clarity', 'ls-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}},"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
		<p class="has-text-color has-300-font-size" style="margin-top:var(--wp--preset--spacing--20);color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Each engagement is shaped to the brief. These are the building blocks we draw from.', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

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

			<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"300"} -->
			<h3 class="wp-block-heading has-300-font-size" style="font-weight:var(--wp--custom--typography--font-weight--extrabold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html( $ls_card['title'] ); ?></h3>
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
