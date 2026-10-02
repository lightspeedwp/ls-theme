<?php
/**
 * Title: Section - Checklist Card Pair
 * Slug: ls-theme/checklist-card-pair
 * Categories: featured
 * Block Types: core/pattern
 * Description: A "what you receive and your role" section for the 14 individual service pages —
 * currently authored with Discovery's copy; edit the eyebrow, heading, description, card titles and
 * checklist items per page after inserting. A left-aligned eyebrow/heading/description stack above
 * two equal-height, border-only cards (transparent, no fill — the plainer look already used by
 * phase-deliverables-and-role), each with an H3 and a Tick Phase checklist at a smaller size using
 * the compact modifier (add or remove list items freely). Sits on a surface.card band with top and
 * bottom borders. The eyebrow and ticks read var(--ls-phase-accent), which follows the service's
 * parent phase via the `ls-service-phase-{phase}` body class (inc/service-phase-map.php). Plain
 * wp:columns, so the cards stack automatically on mobile; columns deliberately omit
 * verticalAlignment so core/columns' native equal-height stretch applies and each card's own
 * minHeight:100% fills its column. Adapts between the site's light and dark style variations via
 * surface/text/border tokens. Tick Phase marker styling lives in
 * src/scss/structural/tick-phase.scss.
 * Keywords: service, deliverables, receive, role, checklist, cards, phase, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_cards = array(
	array(
		'title' => __( 'What you receive', 'ls-theme' ),
		'items' => array(
			__( 'Discovery report with findings and recommendations', 'ls-theme' ),
			__( 'Prioritised requirements and phased roadmap', 'ls-theme' ),
			__( 'Content inventory and migration plan', 'ls-theme' ),
			__( 'Technical architecture outline', 'ls-theme' ),
			__( 'AI readiness summary', 'ls-theme' ),
		),
	),
	array(
		'title' => __( 'Your role', 'ls-theme' ),
		'items' => array(
			__( 'Share business priorities and current pain points', 'ls-theme' ),
			__( 'Provide analytics, content samples and system access', 'ls-theme' ),
			__( 'Make stakeholders available for workshops', 'ls-theme' ),
			__( 'Review findings and confirm priorities', 'ls-theme' ),
		),
	),
);

?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","style":{"color":{"background":"var:custom|color|surface|card"},"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"},"bottom":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band has-background" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;background-color:var(--wp--custom--color--surface--card)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--ls-phase-accent)"}},"fontSize":"100"} -->
		<p class="has-text-color has-100-font-size" style="color:var(--ls-phase-accent);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'What you receive', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","lineHeight":"var:custom|line-height|heading-snug","letterSpacing":"var:custom|typography|letter-spacing|tight"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"600"} -->
		<h2 class="wp-block-heading has-600-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight);line-height:var(--wp--custom--line-height--heading-snug)"><?php echo esc_html__( 'A plan your whole team can build from', 'ls-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}},"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
		<p class="has-text-color has-300-font-size" style="margin-top:var(--wp--preset--spacing--20);color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Findings, priorities and a phased roadmap you can hand straight to design and development.', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"},"blockGap":{"left":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--60)">

		<?php foreach ( $ls_cards as $ls_card ) : ?>
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|300","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}},"dimensions":{"minHeight":"100%"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group has-border-color" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--300);min-height:100%;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html( $ls_card['title'] ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:list {"className":"is-style-tick-phase ls-tick-phase--compact","fontSize":"200"} -->
				<ul class="wp-block-list is-style-tick-phase ls-tick-phase--compact has-200-font-size">
					<?php foreach ( $ls_card['items'] as $ls_item ) : ?>
					<!-- wp:list-item -->
					<li><?php echo esc_html( $ls_item ); ?></li>
					<!-- /wp:list-item -->
					<?php endforeach; ?>
				</ul>
				<!-- /wp:list -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
