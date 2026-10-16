<?php
/**
 * Title: Section - Phase Link Card Grid
 * Slug: ls-theme/phase-link-card-grid
 * Categories: featured
 * Block Types: core/pattern
 * Description: A permanently dark band holding a responsive grid of six whole-card links, one per lifecycle phase (Discover, Create, Build, Launch, Grow, Evolve) linking to /services/{phase}/. Each card is a Card - Service Tile (a single stretched link with the shared focus ring) with a monospace "PHASE 0X" label, an H2 phase name, a short paragraph and a "Read about ..." arrow link (Link Arrow Accent). Label, border, tint and arrow all take that phase's own on-dark colour token (Evolve uses phase.evolve-on-dark-card, a lighter violet that meets WCAG AA on the card in both modes); hovering or focusing a card tints it, lifts it and slides the arrow. Copy comes from the content doc's "Process page" stage descriptions (the internal source note on the Create stage is left out); the "PHASE 0X" labels and "Read about ..." links are from the design. The grid is a core/group with the grid layout and a minimum column width, so it wraps to 3, 2 or 1 per row. Authored for the About "Our Process" page and sits directly under Hero - Centered Gradient Title. Falls back to core/group because no semantic core block fits a linked card grid. The dark surface, per-phase accent and hover live in src/scss/structural/phase-link-card-grid.scss.
 * Keywords: process, phases, lifecycle, stages, cards, links, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_phase_cards = array(
	array(
		'phase'       => 'discover',
		'index'       => '01',
		'title'       => __( 'Discover', 'ls-theme' ),
		'description' => __( 'Every project starts with understanding. We clarify goals, audiences, content, constraints, integrations and risks before design or development accelerates. This stage gives everyone the same picture of the problem.', 'ls-theme' ),
		'link_label'  => __( 'Read about Discover', 'ls-theme' ),
	),
	array(
		'phase'       => 'create',
		'index'       => '02',
		'title'       => __( 'Create', 'ls-theme' ),
		'description' => __( 'This is where structure becomes visible. We shape the design system, prototype key journeys, organise content and make decisions reviewable before code is written. That reduces guesswork later and makes feedback more useful.', 'ls-theme' ),
		'link_label'  => __( 'Read about Create', 'ls-theme' ),
	),
	array(
		'phase'       => 'build',
		'index'       => '03',
		'title'       => __( 'Build', 'ls-theme' ),
		'description' => __( 'Once the system is clear, we build. That means modern WordPress development, maintainable components, careful implementation and review loops that keep design intent and technical quality aligned.', 'ls-theme' ),
		'link_label'  => __( 'Read about Build', 'ls-theme' ),
	),
	array(
		'phase'       => 'launch',
		'index'       => '04',
		'title'       => __( 'Launch', 'ls-theme' ),
		'description' => __( 'A launch should feel prepared, not dramatic. We use this stage to handle QA, performance checks, content review, training and deployment planning so go-live is a controlled handover, not a scramble.', 'ls-theme' ),
		'link_label'  => __( 'Read about Launch', 'ls-theme' ),
	),
	array(
		'phase'       => 'grow',
		'index'       => '05',
		'title'       => __( 'Grow', 'ls-theme' ),
		'description' => __( 'After launch, the work becomes more valuable when it is improved deliberately. We look at content, performance, accessibility, user behaviour and operational needs so the platform can keep doing its job well.', 'ls-theme' ),
		'link_label'  => __( 'Read about Grow', 'ls-theme' ),
	),
	array(
		'phase'       => 'evolve',
		'index'       => '06',
		'title'       => __( 'Evolve', 'ls-theme' ),
		'description' => __( 'The strongest platforms are the ones that can change without needing to be replaced every few years. This stage is about adaptation: new requirements, better tooling, cleaner workflows and smarter next steps.', 'ls-theme' ),
		'link_label'  => __( 'Read about Evolve', 'ls-theme' ),
		'accent'      => 'evolve-on-dark-card',
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"color":{"background":"var:custom|color|surface|band-end"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-background" style="background-color:var(--wp--custom--color--surface--band-end);margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","className":"ls-phase-link-card-grid","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"grid","minimumColumnWidth":"22rem"}} -->
	<div class="wp-block-group alignwide ls-phase-link-card-grid">

		<?php foreach ( $ls_phase_cards as $ls_phase_card ) : ?>
			<?php $ls_phase_accent = isset( $ls_phase_card['accent'] ) ? $ls_phase_card['accent'] : $ls_phase_card['phase'] . '-on-dark'; ?>
		<!-- wp:group {"tagName":"article","className":"is-style-card-service-tile ls-phase-link-card ls-phase-link-card--<?php echo esc_attr( $ls_phase_card['phase'] ); ?>","style":{"dimensions":{"minHeight":"100%"},"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"},"border":{"radius":"var:preset|border-radius|400"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
		<article class="wp-block-group is-style-card-service-tile ls-phase-link-card ls-phase-link-card--<?php echo esc_attr( $ls_phase_card['phase'] ); ?>" style="border-radius:var(--wp--preset--border-radius--400);min-height:100%;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold","fontFamily":"var:preset|font-family|monospace"},"color":{"text":"var(--wp--custom--color--phase--<?php echo esc_attr( $ls_phase_accent ); ?>)"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--phase--<?php echo esc_attr( $ls_phase_accent ); ?>);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html( sprintf( /* translators: %s: two-digit phase number, e.g. 01 */ __( 'Phase %s', 'ls-theme' ), $ls_phase_card['index'] ) ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"className":"ls-card-service-tile__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<div class="wp-block-group ls-card-service-tile__content">
				<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold","letterSpacing":"var:custom|typography|letter-spacing|tight","lineHeight":"var:custom|line-height|heading-tight"},"color":{"text":"var(--wp--custom--color--text--on-dark)"}},"fontSize":"500"} -->
				<h2 class="wp-block-heading has-text-color has-500-font-size" style="color:var(--wp--custom--color--text--on-dark);font-weight:var(--wp--custom--typography--font-weight--extrabold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight);line-height:var(--wp--custom--line-height--heading-tight)"><?php echo esc_html( $ls_phase_card['title'] ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"200"} -->
				<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark-muted)"><?php echo esc_html( $ls_phase_card['description'] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"className":"is-style-link-arrow-accent","style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"200"} -->
			<p class="is-style-link-arrow-accent has-200-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><a class="ls-card-service-tile__link" href="<?php echo esc_url( home_url( '/services/' . $ls_phase_card['phase'] . '/' ) ); ?>"><?php echo esc_html( $ls_phase_card['link_label'] ); ?></a></p>
			<!-- /wp:paragraph -->
		</article>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
