<?php
/**
 * Title: Section - Split Header Profile Card Grid
 * Slug: ls-theme/split-header-profile-card-grid
 * Categories: featured
 * Block Types: core/pattern
 * Description: A "meet the team" section on the page canvas: a split header (dot eyebrow and H2 on the left, a short paragraph bottom-aligned on the right) above a responsive four-column grid of flat profile cards (Card - Plain: no shadow and no hover lift, because they are not links), each with a circular brand-tinted initials avatar, an H3 name, a role and a one-line focus. The grid is a core/group with the grid layout capped at four columns, so the cards wrap cleanly to 2 or 1 per row on smaller screens; duplicate or delete a card freely. Authored for the About page "People behind the work" section; swap the initials avatar for an image when headshots are available. Falls back to core/group and core/columns because no semantic core block fits a profile card. Adapts between light and dark mode through text, surface and border tokens. No new SCSS.
 * Keywords: team, people, profile, staff, cards, grid, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_profiles = array(
	array(
		'initials' => 'AS',
		'name'     => __( 'Ash Shaw', 'ls-theme' ),
		'role'     => __( 'Founder', 'ls-theme' ),
		'focus'    => __( 'Leadership, open-source product work and WordPress community contribution', 'ls-theme' ),
	),
	array(
		'initials' => 'BK',
		'name'     => __( 'Barbara Kerr', 'ls-theme' ),
		'role'     => __( 'Finance and operations', 'ls-theme' ),
		'focus'    => __( 'Finance, project support, client relationships and team wellbeing', 'ls-theme' ),
	),
	array(
		'initials' => 'BM',
		'name'     => __( 'Brandon Marshall', 'ls-theme' ),
		'role'     => __( 'WordPress designer and developer', 'ls-theme' ),
		'focus'    => __( 'Design systems, block themes and prototypes', 'ls-theme' ),
	),
	array(
		'initials' => 'ZR',
		'name'     => __( 'Zared Rogers', 'ls-theme' ),
		'role'     => __( 'Designer and site builder', 'ls-theme' ),
		'focus'    => __( 'Practical design and build work, Figma design systems and prototypes', 'ls-theme' ),
	),
	array(
		'initials' => 'WB',
		'name'     => __( 'Warwick Booth', 'ls-theme' ),
		'role'     => __( 'Lead developer', 'ls-theme' ),
		'focus'    => __( 'Planning, mentoring, code review and complex development', 'ls-theme' ),
	),
	array(
		'initials' => 'LV',
		'name'     => __( 'Lourens Visser', 'ls-theme' ),
		'role'     => __( 'Support and workflow', 'ls-theme' ),
		'focus'    => __( 'Support and workflow coordination across the team', 'ls-theme' ),
	),
	array(
		'initials' => 'CV',
		'name'     => __( 'Chris Vancoillie', 'ls-theme' ),
		'role'     => __( 'Systems lead', 'ls-theme' ),
		'focus'    => __( 'Systems engineering, database administration and hosting stability', 'ls-theme' ),
	),
	array(
		'initials' => 'J',
		'name'     => __( 'Jose', 'ls-theme' ),
		'role'     => __( 'Block theme and block developer', 'ls-theme' ),
		'focus'    => __( 'Block themes and custom blocks for WordPress platforms', 'ls-theme' ),
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
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'People behind the work', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"600"} -->
				<h2 class="wp-block-heading has-600-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'A team built for collaboration.', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"bottom"} -->
			<div class="wp-block-column is-vertically-aligned-bottom">
				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'LightSpeed works best when strategy, design, development and operations stay connected. We work across handoffs, review loops and shared systems so design decisions, technical constraints and business goals stay visible throughout a project.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"14rem"}} -->
		<div class="wp-block-group">

			<?php foreach ( $ls_profiles as $ls_profile ) : ?>
			<!-- wp:group {"tagName":"article","className":"is-style-card-plain","layout":{"type":"flex","orientation":"vertical","justifyContent":"left","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain">
				<!-- wp:group {"style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 12%, transparent)"},"border":{"radius":"var:preset|border-radius|500"},"dimensions":{"minHeight":"3rem"},"layout":{"selfStretch":"fixed","flexSize":"3rem"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
				<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 12%, transparent);min-height:3rem">
					<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--brand-strong)"},"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"200"} -->
					<p class="has-text-align-center has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--brand-strong);font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html( $ls_profile['initials'] ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"300"} -->
				<h3 class="wp-block-heading has-300-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html( $ls_profile['name'] ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"200"} -->
				<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html( $ls_profile['role'] ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
				<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_profile['focus'] ); ?></p>
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
