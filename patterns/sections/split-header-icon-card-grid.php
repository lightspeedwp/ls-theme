<?php
/**
 * Title: Section - Split Header Icon Card Grid
 * Slug: ls-theme/split-header-icon-card-grid
 * Categories: featured
 * Block Types: core/pattern
 * Description: A "what this includes" section on a surface.card band: a split header (dot eyebrow and H2 on the left, a short paragraph bottom-aligned on the right) above a responsive grid of six cards, each a circular check Icon block well, an H3 and supporting copy. The grid is a core/group with the grid layout and a minimum column width, so any number of cards wraps cleanly to 3, 2 or 1 per row; duplicate or delete a card freely. Same card shape as Section - Icon Card Grid but with a split header and brand colours instead of the service phase accent. Falls back to core/group and core/columns because no semantic core block fits an icon card grid. Cards use surface.canvas. Adapts between light and dark through surface, text and border tokens. Edit the eyebrow, heading, paragraph and cards after inserting.
 * Keywords: includes, cards, icons, grid, solutions, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_icon_cards = array(
	array(
		'title'       => __( 'Design tokens & mathematics', 'ls-theme' ),
		'description' => __( 'Define a unified spacing scale (e.g. 8 px base grid), modular typographic hierarchy and colour palette, then manage these variables centrally.', 'ls-theme' ),
	),
	array(
		'title'       => __( 'Pattern governance', 'ls-theme' ),
		'description' => __( 'Establish reusable components and block patterns (heroes, stats grids, CTA bands) with locked wrappers and editable inner content. Train editors on safe usage.', 'ls-theme' ),
	),
	array(
		'title'       => __( 'Accessibility built in', 'ls-theme' ),
		'description' => __( 'Enforce colour contrast ratios, visible focus states, scalable target sizes and semantic headings at the token level to meet WCAG 2.1/2.2 AA standards.', 'ls-theme' ),
	),
	array(
		'title'       => __( 'Figma to WordPress parity', 'ls-theme' ),
		'description' => __( 'Develop interactive product-requirements prototypes (PRPs) in Figma that map 1:1 with WordPress Full Site Editing. Reduce dev guesswork and ensure consistency across design and build.', 'ls-theme' ),
	),
	array(
		'title'       => __( 'Design-to-dev workflow', 'ls-theme' ),
		'description' => __( 'Work through phases: foundation (tokens), components (buttons, forms, navigation), patterns (block compositions), and governance (deploy theme.json and lock down layouts). Provide documentation and training so the system remains sustainable.', 'ls-theme' ),
	),
	array(
		'title'       => __( 'Ongoing maintenance & evolution', 'ls-theme' ),
		'description' => __( 'Maintain the token library, evolve patterns, and support your team as new requirements arise.', 'ls-theme' ),
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"color":{"background":"var:custom|color|surface|card"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-background" style="background-color:var(--wp--custom--color--surface--card);margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:columns {"verticalAlignment":"bottom","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|90"}}}} -->
		<div class="wp-block-columns are-vertically-aligned-bottom">

			<!-- wp:column {"verticalAlignment":"bottom","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
			<div class="wp-block-column is-vertically-aligned-bottom">

				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'What this solution includes', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"600"} -->
				<h2 class="wp-block-heading has-600-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Strategy, design and engineering, combined.', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"bottom"} -->
			<div class="wp-block-column is-vertically-aligned-bottom">
				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Our design-systems engagement combines strategy, design and engineering in six building blocks.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"grid","minimumColumnWidth":"22rem"}} -->
		<div class="wp-block-group">

			<?php foreach ( $ls_icon_cards as $ls_icon_card ) : ?>
			<!-- wp:group {"tagName":"article","style":{"color":{"background":"var:custom|color|surface|canvas"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|300","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left","flexWrap":"nowrap"}} -->
			<article class="wp-block-group has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--300);background-color:var(--wp--custom--color--surface--canvas);padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:group {"style":{"color":{"background":"var:custom|color|surface|brand-light"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
				<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:var(--wp--custom--color--surface--brand-light);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
					<!-- wp:icon {"icon":"lightspeed/check","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"18px"}}} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"300"} -->
				<h3 class="wp-block-heading has-300-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html( $ls_icon_card['title'] ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
				<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_icon_card['description'] ); ?></p>
				<!-- /wp:paragraph -->
			</article>
			<!-- /wp:group -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
