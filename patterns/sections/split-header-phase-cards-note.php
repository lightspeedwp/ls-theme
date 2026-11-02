<?php
/**
 * Title: Section - Split Header Phase Cards with Note
 * Slug: ls-theme/split-header-phase-cards-note
 * Categories: featured
 * Block Types: core/pattern
 * Description: A "how we work" section on the page canvas: a split header (dot eyebrow and H2 on the left, a short paragraph bottom-aligned on the right) above a three-column grid of six whole-card links (Card - Service Tile, each a stretched link on its H3) to the lifecycle phase pages (/services/discover/, /create/, /build/, /launch/, /grow/ and /evolve/), one per phase. Each card's title link takes that phase's own accent colour, and its border does too on hover and focus. Each card has a phase-tinted Icon block well, a two-digit index, an H3 and a short paragraph, all coloured with that phase's own accent token (Discover, Create, Build, Launch, Grow, Evolve), which adapts between light and dark mode. Below the grid sits a bordered surface.card note (centred, 800px max width) with a brand Icon block and a bold lead-in. Authored for the About page "How we work" section. Falls back to core/group and core/columns because no semantic core block fits a phase card grid. Cards share one height and clamp long copy via the existing split-header-icon-card-grid SCSS (ls-icon-card-grid / ls-icon-card classes), which also holds the per-phase hover colours. No new SCSS file.
 * Keywords: process, phases, lifecycle, stages, cards, how we work, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_phase_cards = array(
	array(
		'phase'       => 'discover',
		'path'        => '/services/discover/',
		'icon'        => 'search',
		'index'       => '01',
		'title'       => __( 'Discover', 'ls-theme' ),
		'description' => __( 'We start by understanding the business, audience, content, constraints and goals. This is where strategy, scope and risk reduction begin.', 'ls-theme' ),
	),
	array(
		'phase'       => 'create',
		'path'        => '/services/create/',
		'icon'        => 'paint-brush',
		'index'       => '02',
		'title'       => __( 'Create', 'ls-theme' ),
		'description' => __( 'We turn ideas into structure through content planning, Figma systems, prototypes and reviewable decisions before development begins.', 'ls-theme' ),
	),
	array(
		'phase'       => 'build',
		'path'        => '/services/build/',
		'icon'        => 'code',
		'index'       => '03',
		'title'       => __( 'Build', 'ls-theme' ),
		'description' => __( 'We develop the platform using modern WordPress practices, clean code, tested workflows and maintainable components.', 'ls-theme' ),
	),
	array(
		'phase'       => 'launch',
		'path'        => '/services/launch/',
		'icon'        => 'rocket',
		'index'       => '04',
		'title'       => __( 'Launch', 'ls-theme' ),
		'description' => __( 'We prepare the site for handover and go-live with QA, content checks, performance testing, training and deployment planning.', 'ls-theme' ),
	),
	array(
		'phase'       => 'grow',
		'path'        => '/services/grow/',
		'icon'        => 'trending-up',
		'index'       => '05',
		'title'       => __( 'Grow', 'ls-theme' ),
		'description' => __( 'After launch, we keep improving the site based on performance, content needs, accessibility, search visibility and business priorities.', 'ls-theme' ),
	),
	array(
		'phase'       => 'evolve',
		'path'        => '/services/evolve/',
		'icon'        => 'arrows-clockwise',
		'index'       => '06',
		'title'       => __( 'Evolve', 'ls-theme' ),
		'description' => __( 'As tools, teams and markets change, we help the platform change with them instead of forcing a rebuild every few years.', 'ls-theme' ),
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

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
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'How we work', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"600"} -->
				<h2 class="wp-block-heading has-600-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Six connected stages, from Discover to Evolve.', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"bottom"} -->
			<div class="wp-block-column is-vertically-aligned-bottom">
				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'That structure exists to reduce risk, improve collaboration, and keep platforms useful long after the first release. It is not there to add ceremony. It is there to make the work clearer.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:group {"className":"ls-icon-card-grid","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"18rem"}} -->
		<div class="wp-block-group ls-icon-card-grid">

			<?php foreach ( $ls_phase_cards as $ls_phase_card ) : ?>
				<?php $ls_phase_colour = 'var(--wp--custom--color--phase--' . $ls_phase_card['phase'] . ')'; ?>
			<!-- wp:group {"tagName":"article","className":"is-style-card-service-tile ls-icon-card ls-icon-card--phase-<?php echo esc_attr( $ls_phase_card['phase'] ); ?>","layout":{"type":"flex","orientation":"vertical","justifyContent":"left","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-service-tile ls-icon-card ls-icon-card--phase-<?php echo esc_attr( $ls_phase_card['phase'] ); ?>">
				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:group {"style":{"border":{"color":"color-mix(in srgb, <?php echo esc_attr( $ls_phase_colour ); ?> 30%, transparent)","radius":"var:preset|border-radius|200","style":"solid","width":"1px"},"color":{"background":"color-mix(in srgb, <?php echo esc_attr( $ls_phase_colour ); ?> 10%, transparent)"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
					<div class="wp-block-group has-border-color has-background" style="border-color:color-mix(in srgb, <?php echo esc_attr( $ls_phase_colour ); ?> 30%, transparent);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--200);background-color:color-mix(in srgb, <?php echo esc_attr( $ls_phase_colour ); ?> 10%, transparent);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
						<!-- wp:icon {"icon":"lightspeed/<?php echo esc_attr( $ls_phase_card['icon'] ); ?>","className":"has-text-color","style":{"color":{"text":"<?php echo esc_attr( $ls_phase_colour ); ?>"},"dimensions":{"width":"26px"}}} /-->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"<?php echo esc_attr( $ls_phase_colour ); ?>"}},"fontSize":"200"} -->
					<p class="has-text-color has-200-font-size" style="color:<?php echo esc_attr( $ls_phase_colour ); ?>;font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--wide)"><?php echo esc_html( $ls_phase_card['index'] ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":3,"className":"ls-icon-card__title","style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"300"} -->
				<h3 class="wp-block-heading ls-icon-card__title has-300-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><a class="ls-card-service-tile__link" href="<?php echo esc_url( home_url( $ls_phase_card['path'] ) ); ?>"><?php echo esc_html( $ls_phase_card['title'] ); ?></a></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"ls-icon-card__text","style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
				<p class="ls-icon-card__text has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_phase_card['description'] ); ?></p>
				<!-- /wp:paragraph -->
			</article>
			<!-- /wp:group -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"layout":{"type":"constrained","contentSize":"800px"}} -->
		<div class="wp-block-group">
			<!-- wp:group {"style":{"color":{"background":"var:custom|color|surface|card"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|300","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
			<div class="wp-block-group has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--300);background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:icon {"icon":"lightspeed/sparkle","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"24px"}}} /-->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
				<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><strong style="color:var(--wp--custom--color--text--default)"><?php echo esc_html__( 'How AI fits into the process.', 'ls-theme' ); ?></strong> <?php echo esc_html__( 'AI supports the process where it is genuinely useful: research summaries in discovery, drafting support in content work, code assistance during build, documentation and QA support around launch, and clearer reporting as sites grow. It is a support layer, not the centre of the story.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
