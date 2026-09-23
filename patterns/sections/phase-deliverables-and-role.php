<?php
/**
 * Title: Section - Phase Deliverables And Role
 * Slug: ls-theme/phase-deliverables-and-role
 * Categories: featured
 * Block Types: core/pattern
 * Description: Shared "What you receive and your role" section for all six lifecycle phase pages —
 * currently authored with Discover's own copy; the heading and both card bodies/lists still need to
 * be pulled out per-page before this is reused on the other five pages. Two bordered cards side by
 * side (core/columns): "What you receive" (phase-coloured dot-bullet list, same convention as
 * phase-common-services.php) and "Your role" (identical shell, generic bullet colour since it is not
 * a phase-specific deliverable). Adapts between the site's light and dark style variations via
 * surface/text tokens — section uses surface.card, cards use surface.card-raised one step lighter,
 * for a section-background → card-surface hierarchy. Columns deliberately omit verticalAlignment so
 * core/columns' native equal-height stretch applies (each card's own minHeight:100% then fills its
 * now-equal-height column) — do not re-add verticalAlignment:"top" here, it disables that stretch.
 * Keywords: phase, discover, create, build, launch, grow, evolve, deliverables, role, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_phase_accent = 'var(--wp--custom--color--phase--discover)';

$ls_deliverables = array(
	__( 'A project summary with priorities, risks, and opportunities', 'ls-theme' ),
	__( 'User and stakeholder insights', 'ls-theme' ),
	__( 'Content and information architecture findings', 'ls-theme' ),
	__( 'Technical requirements and integration notes', 'ls-theme' ),
	__( 'Migration recommendations', 'ls-theme' ),
	__( 'A scoped roadmap covering Create, Build, Launch, Grow, and, where relevant, Evolve', 'ls-theme' ),
	__( 'Clear next-step recommendations for design and development', 'ls-theme' ),
);

$ls_role_items = array(
	__( 'Sharing business priorities and current pain points', 'ls-theme' ),
	__( 'Providing existing analytics, content samples, and system access where needed', 'ls-theme' ),
	__( 'Participating in workshops or review sessions', 'ls-theme' ),
	__( 'Helping confirm internal constraints, risks, and priorities', 'ls-theme' ),
);

/**
 * Renders one dot-bullet list row. Local closure since this file can be included more than once
 * per request via pattern registration/re-registration.
 *
 * @param string $ls_item_text  The row's text.
 * @param string $ls_dot_color  CSS color value for the bullet dot.
 */
$ls_render_bullet_row = function ( $ls_item_text, $ls_dot_color ) {
	?>
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
	<div class="wp-block-group is-vertically-aligned-top">
		<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"<?php echo esc_attr( $ls_dot_color ); ?>"},"spacing":{"margin":{"top":"11px"}},"dimensions":{"width":"6px"}}} /-->

		<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
		<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_item_text ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
	<?php
};
?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","style":{"color":{"background":"var:custom|color|surface|card"},"spacing":{"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|60","bottom":"var:preset|spacing|90","left":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band has-background" style="background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--60)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"980px","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"<?php echo esc_attr( $ls_phase_accent ); ?>"}},"fontSize":"100"} -->
		<p class="has-text-align-center has-text-color has-100-font-size" style="color:<?php echo esc_attr( $ls_phase_accent ); ?>;font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'What you receive and your role', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"700"} -->
		<h2 class="wp-block-heading has-text-align-center has-700-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'A clear plan. Built together', 'ls-theme' ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"900px"}}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:columns {"style":{"blockGap":{"left":"var:preset|spacing|10"}}} -->
		<div class="wp-block-columns">

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|300","style":"solid","width":"1px"},"color":{"background":"var:custom|color|surface|card-raised"},"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}},"dimensions":{"minHeight":"100%"}},"layout":{"type":"default"}} -->
				<div class="wp-block-group has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--300);background-color:var(--wp--custom--color--surface--card-raised);min-height:100%;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:icon {"icon":"lightspeed/help","className":"has-text-color","style":{"color":{"text":"<?php echo esc_attr( $ls_phase_accent ); ?>"},"dimensions":{"width":"22px"}}} /-->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"400"} -->
					<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'What you receive', 'ls-theme' ); ?></h3>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|10"}},"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted);margin-top:var(--wp--preset--spacing--10)"><?php echo esc_html__( 'You leave this stage with a practical set of deliverables that guide the next phase of work, such as:', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--20)">
					<?php
					foreach ( $ls_deliverables as $ls_deliverable ) {
						$ls_render_bullet_row( $ls_deliverable, $ls_phase_accent );
					}
					?>
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|300","style":"solid","width":"1px"},"color":{"background":"var:custom|color|surface|card-raised"},"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}},"dimensions":{"minHeight":"100%"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--300);background-color:var(--wp--custom--color--surface--card-raised);min-height:100%;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:icon {"icon":"lightspeed/users","className":"has-text-color","style":{"color":{"text":"<?php echo esc_attr( $ls_phase_accent ); ?>"},"dimensions":{"width":"22px"}}} /-->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"400"} -->
					<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Your role', 'ls-theme' ); ?></h3>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|10"}},"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted);margin-top:var(--wp--preset--spacing--10)"><?php echo esc_html__( 'We guide the process, but your input matters. We need access to the right people, the right systems, and the right context.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--20)">
					<?php
					foreach ( $ls_role_items as $ls_role_item ) {
						$ls_render_bullet_row( $ls_role_item, $ls_phase_accent );
					}
					?>
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
