<?php
/**
 * Title: Section - Split Header Profile Card Grid
 * Slug: ls-theme/split-header-profile-card-grid
 * Categories: featured
 * Block Types: core/pattern
 * Description: A "meet the team" section on the page canvas: a split header (dot eyebrow and H2 on the left, a short paragraph bottom-aligned on the right) above a responsive four-column grid of flat profile cards (Card - Plain: no link behaviour, because they are not links). Each card has three groups: a 5:4 core Image block for the person's photo (cover crop, rounded corners; empty until you choose a photo, and it shows nothing on the front end until then), an identity group with a bold H3 name and a smaller brand-coloured role, and a description group with a 1px divider above a muted one-line focus. Cards share a row height through the grid. On hover (and only with a hover-capable pointer) a card lifts slightly, its border strengthens, a soft shadow appears and the photo zooms gently; the transitions are removed for reduced-motion users. All of that lives in the .ls-team-card rules in src/scss/structural/card-shells.scss, since block attributes cannot express :hover or a child image zoom. The grid is a core/group with the grid layout capped at four columns, so cards wrap cleanly to 2 or 1 per row on smaller screens; duplicate or delete a card freely. Authored for the About page "People behind the work" section; after inserting, click an image placeholder to add or change a photo and its alt text. Falls back to core/group and core/columns because no semantic core block fits a profile card. Adapts between light and dark mode through text, surface and border tokens.
 * Keywords: team, people, profile, staff, cards, grid, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_profiles = array(
	array(
		'name'  => 'Ash Shaw',
		'role'  => __( 'Founder', 'ls-theme' ),
		'focus' => __( 'Leadership, open-source product work and WordPress community contribution', 'ls-theme' ),
		'image' => 'https://ls-agency.lightspeedwp.dev/wp-content/uploads/2024/06/lightspeedwp-team-ash-shaw-edited.jpg',
	),
	array(
		'name'  => 'Barbara Kerr',
		'role'  => __( 'Finance and operations', 'ls-theme' ),
		'focus' => __( 'Finance, project support, client relationships and team wellbeing', 'ls-theme' ),
		'image' => 'https://ls-agency.lightspeedwp.dev/wp-content/uploads/2023/02/LightSpeed-Team-Barbara-Kerr-Shaw-alt-edited-1.jpg',
	),
	array(
		'name'  => 'Brandon Marshall',
		'role'  => __( 'WordPress designer and developer', 'ls-theme' ),
		'focus' => __( 'Design systems, block themes and prototypes', 'ls-theme' ),
		'image' => 'https://ls-agency.lightspeedwp.dev/wp-content/uploads/2025/12/Lightspeed-Team-Brandon-Marshall.png',
	),
	array(
		'name'  => 'Zared Rogers',
		'role'  => __( 'Designer and site builder', 'ls-theme' ),
		'focus' => __( 'Practical design and build work, Figma design systems and prototypes', 'ls-theme' ),
		'image' => 'https://ls-agency.lightspeedwp.dev/wp-content/uploads/2025/12/zared-profile.jpeg',
	),
	array(
		'name'  => 'Warwick Booth',
		'role'  => __( 'Lead developer', 'ls-theme' ),
		'focus' => __( 'Planning, mentoring, code review and complex development', 'ls-theme' ),
		'image' => 'https://ls-agency.lightspeedwp.dev/wp-content/uploads/2023/02/LightSpeed-Team-Warwick-Booth-edited-1.jpg',
	),
	array(
		'name'  => 'Lourens Visser',
		'role'  => __( 'Support and workflow', 'ls-theme' ),
		'focus' => __( 'Support and workflow coordination across the team', 'ls-theme' ),
		'image' => 'https://ls-agency.lightspeedwp.dev/wp-content/uploads/2023/02/LightSpeed-Team-Lourens-Visser-alt-edited.jpg',
	),
	array(
		'name'  => 'Chris Vancoillie',
		'role'  => __( 'Systems lead', 'ls-theme' ),
		'focus' => __( 'Systems engineering, database administration and hosting stability', 'ls-theme' ),
		'image' => 'https://ls-agency.lightspeedwp.dev/wp-content/uploads/2023/02/LightSpeed-Team-Chris-Vancoillie-alt-edited.jpg',
	),
	array(
		'name'  => 'José Abreu',
		'role'  => __( 'Block theme and block developer', 'ls-theme' ),
		'focus' => __( 'Block themes and custom blocks for WordPress platforms', 'ls-theme' ),
		'image' => 'https://ls-agency.lightspeedwp.dev/wp-content/uploads/2025/12/LightSpeed-Team-Jose-Abreu-alt.png',
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
			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-team-card","style":{"border":{"radius":"var:preset|border-radius|400"},"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-team-card" style="border-radius:var(--wp--preset--border-radius--400)">
				<!-- wp:image {"aspectRatio":"5/4","scale":"cover","width":"100%","sizeSlug":"medium","linkDestination":"none","style":{"border":{"radius":"var:preset|border-radius|300"}}} -->
				<figure class="wp-block-image size-medium has-custom-border"><img<?php if ( ! empty( $ls_profile['image'] ) ) : ?> src="<?php echo esc_url( $ls_profile['image'] ); ?>" alt="<?php echo esc_attr( sprintf( /* translators: %s: team member name */ __( 'Portrait of %s', 'ls-theme' ), $ls_profile['name'] ) ); ?>"<?php else : ?> alt=""<?php endif; ?> style="border-radius:var(--wp--preset--border-radius--300);aspect-ratio:5/4;object-fit:cover;width:100%"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","lineHeight":"var:custom|line-height|heading-default","letterSpacing":"var:custom|typography|letter-spacing|tight"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"400"} -->
					<h3 class="wp-block-heading has-400-font-size" style="margin-top:0;margin-bottom:0;font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight);line-height:var(--wp--custom--line-height--heading-default)"><?php echo esc_html( $ls_profile['name'] ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"200"} -->
					<p class="has-text-color has-200-font-size" style="margin-top:0;margin-bottom:0;color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html( $ls_profile['role'] ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"typography":{"lineHeight":"var:custom|line-height|paragraph"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"200"} -->
					<p class="has-text-color has-200-font-size" style="margin-top:0;margin-bottom:0;color:var(--wp--custom--color--text--muted);line-height:var(--wp--custom--line-height--paragraph)"><?php echo esc_html( $ls_profile['focus'] ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
