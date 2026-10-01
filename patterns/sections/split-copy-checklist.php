<?php
/**
 * Title: Section - Split Copy Checklist
 * Slug: ls-theme/split-copy-checklist
 * Categories: featured
 * Block Types: core/pattern
 * Description: A two-column "why this matters" section for the 14 individual service pages —
 * currently authored with Discovery's own copy; edit the eyebrow, heading, description and
 * checklist per page after inserting. Eyebrow, heading and description on the left (45%), and on
 * the right (55%) a bordered surface.card panel holding a core/list in the Tick Phase style — add
 * or remove list items freely, and wrap key phrases in bold for emphasis. Same shape as
 * homepage-why-lightspeed, but phase-coloured: the eyebrow reads var(--ls-phase-accent) and the
 * ticks/dividers come from the Tick Phase list style (src/scss/structural/tick-phase.scss), both of
 * which follow the service's parent phase via the `ls-service-phase-{phase}` body class
 * (inc/service-phase-map.php). Plain wp:columns, so it stacks automatically on mobile. Adapts
 * between the site's light and dark style variations via surface/text/border tokens.
 * Keywords: service, why, benefits, checklist, split, phase, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band">

	<!-- wp:columns {"verticalAlignment":"top","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|70"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-top">

		<!-- wp:column {"verticalAlignment":"top","width":"45%"} -->
		<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:45%">
			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--ls-phase-accent)"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--ls-phase-accent);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Why this service matters', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold","lineHeight":"var:custom|line-height|heading-snug","letterSpacing":"var:custom|typography|letter-spacing|tight"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"600"} -->
			<h2 class="wp-block-heading has-600-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:var(--wp--custom--typography--font-weight--extrabold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight);line-height:var(--wp--custom--line-height--heading-snug)"><?php echo esc_html__( 'Clarity is the cheapest thing on the timeline', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}},"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="margin-top:var(--wp--preset--spacing--20);color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Three things discovery protects against, drawn from the projects that usually arrive needing a reset.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"top","width":"55%"} -->
		<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:55%">
			<!-- wp:group {"style":{"color":{"background":"var:custom|color|surface|card"},"border":{"color":"var:custom|color|border|card","width":"1px","style":"solid","radius":"var:preset|border-radius|300"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|40","bottom":"var:preset|spacing|5","left":"var:preset|spacing|40"}}},"layout":{"type":"default"}} -->
			<div class="wp-block-group has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--300);background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--40)">
				<!-- wp:list {"className":"is-style-tick-phase"} -->
				<ul class="wp-block-list is-style-tick-phase"><!-- wp:list-item -->
					<li><?php echo esc_html__( 'Projects get expensive when the team starts solving the', 'ls-theme' ); ?> <strong><?php echo esc_html__( 'wrong problem too early.', 'ls-theme' ); ?></strong></li>
					<!-- /wp:list-item -->

					<!-- wp:list-item -->
					<li><?php echo esc_html__( 'Discovery grounds the work in', 'ls-theme' ); ?> <strong><?php echo esc_html__( 'evidence rather than assumptions.', 'ls-theme' ); ?></strong></li>
					<!-- /wp:list-item -->

					<!-- wp:list-item -->
					<li><?php echo esc_html__( 'It’s where', 'ls-theme' ); ?> <strong><?php echo esc_html__( 'migration risk, content issues, accessibility gaps and AI-readiness', 'ls-theme' ); ?></strong> <?php echo esc_html__( 'become visible, before they turn into blockers.', 'ls-theme' ); ?></li>
					<!-- /wp:list-item --></ul>
				<!-- /wp:list -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
