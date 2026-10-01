<?php
/**
 * Title: CTA - Split Checklist
 * Slug: ls-theme/section-cta-split-checklist
 * Categories: cta
 * Block Types: core/pattern
 * Description: The closing call to action for the 14 individual service pages ("Begin your project
 * the right way" on the Discovery page) — currently authored with Discovery's copy; edit the
 * heading, description, buttons and checklist per page after inserting. A full-bleed, permanently
 * dark band with a diagonal band-start/band-end gradient (a block attribute, no SCSS): heading,
 * description and the shared phase buttons (Button - Phase Primary / Outline) on the left (60%), and
 * a short checklist on the right (40%) using Tick Phase with the compact and on-dark modifiers —
 * add or remove list items freely. Dark-on-dark, so everything reads the on-dark token family and
 * var(--ls-phase-accent-on-dark), which follows the service's parent phase via the
 * `ls-service-phase-{phase}` body class (inc/service-phase-map.php). Plain wp:columns, so it stacks
 * automatically on mobile. Tick Phase marker styling lives in src/scss/structural/tick-phase.scss
 * and styles/blocks/lists/tick-phase.json.
 * Keywords: service, cta, call to action, consultation, checklist, phase, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_cta_checklist = array(
	__( 'Goal-aligned brief tied to business KPIs', 'ls-theme' ),
	__( 'Audience personas backed by real data', 'ls-theme' ),
	__( 'Competitor analysis and gap identification', 'ls-theme' ),
);

?>
<!-- wp:group {"align":"full","tagName":"section","style":{"color":{"gradient":"linear-gradient(158deg,var(--wp--custom--color--surface--band-start) 0%,var(--wp--custom--color--surface--band-end) 100%)"},"spacing":{"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|60","bottom":"var:preset|spacing|90","left":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-background" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--60);background:linear-gradient(158deg,var(--wp--custom--color--surface--band-start) 0%,var(--wp--custom--color--surface--band-end) 100%)">

	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|80"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%">
			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","lineHeight":"var:custom|line-height|heading-snug","letterSpacing":"var:custom|typography|letter-spacing|tight"},"color":{"text":"var(--wp--custom--color--text--on-dark)"}},"fontSize":"700"} -->
			<h2 class="wp-block-heading has-text-color has-700-font-size" style="color:var(--wp--custom--color--text--on-dark);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight);line-height:var(--wp--custom--line-height--heading-snug)"><?php echo esc_html__( 'Begin your project the right way', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"layout":{"type":"constrained","contentSize":"640px","justifyContent":"left"}} -->
			<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--20)">
				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--on-dark-muted)"><?php echo esc_html__( 'Book a free consultation to uncover your priorities and build a roadmap you can trust.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","justifyContent":"left"}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
				<!-- wp:button {"className":"is-style-button-phase-primary"} -->
				<div class="wp-block-button is-style-button-phase-primary"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>"><?php echo esc_html__( 'Book a free consultation', 'ls-theme' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-button-phase-outline"} -->
				<div class="wp-block-button is-style-button-phase-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/work/?service=discovery' ) ); ?>"><?php echo esc_html__( 'See discovery in practice', 'ls-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
			<!-- wp:list {"className":"is-style-tick-phase ls-tick-phase--compact ls-tick-phase--on-dark","style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"}},"fontSize":"200"} -->
			<ul style="color:var(--wp--custom--color--text--on-dark)" class="wp-block-list is-style-tick-phase ls-tick-phase--compact ls-tick-phase--on-dark has-text-color has-200-font-size">
				<?php foreach ( $ls_cta_checklist as $ls_checklist_item ) : ?>
				<!-- wp:list-item -->
				<li><?php echo esc_html( $ls_checklist_item ); ?></li>
				<!-- /wp:list-item -->
				<?php endforeach; ?>
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
