<?php
/**
 * Title: Section - Profile Card Group
 * Slug: ls-theme/profile-card-group
 * Categories: featured
 * Block Types: core/pattern
 * Description: A "meet the team" group section on the page canvas: a stacked header (dot eyebrow and H2) above a responsive three-column grid of flat profile cards. Each card is a plain group with no shell, with a 4:5 portrait (core Image block, cover crop, rounded corners; empty until you choose a photo), the name (H3) with a monospace brand-coloured role beneath it, and a short bio. The section and each card carry an anchor so an index can link to them, and a scroll offset (src/scss/structural/about-team.scss) keeps a jumped-to group clear of the sticky header. Falls back to core/group because no semantic core block fits a profile card grid. The grid reflows to fewer columns on small screens. Insert it once per team group and keep only that group's cards, changing the eyebrow, heading and anchors.
 * Keywords: team, people, profile, staff, cards, grid, bio, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_profiles = array(
	array(
		'anchor' => 'p-warwick',
		'name'   => 'Warwick Booth',
		'role'   => __( 'Lead developer', 'ls-theme' ),
		'bio'    => __( 'Warwick’s public team profile emphasises planning, mentoring, code review and complex development work. He is the kind of senior developer clients trust when architecture and implementation need to stay aligned.', 'ls-theme' ),
		'image'  => 'https://ls-agency.lightspeedwp.dev/wp-content/uploads/2023/02/LightSpeed-Team-Warwick-Booth-edited-1.jpg',
	),
	array(
		'anchor' => 'p-brandon',
		'name'   => 'Brandon Marshall',
		'role'   => __( 'WordPress designer and developer', 'ls-theme' ),
		'bio'    => __( 'Brandon is a WordPress Designer/Developer at LightSpeed, passionate about thoughtful design, structured workflows, and contributing to reliable, high-quality WordPress websites and plugins with the team.', 'ls-theme' ),
		'image'  => 'https://ls-agency.lightspeedwp.dev/wp-content/uploads/2025/12/Lightspeed-Team-Brandon-Marshall.png',
	),
	array(
		'anchor' => 'p-jose',
		'name'   => 'José Abreu',
		'role'   => __( 'Block theme and block developer', 'ls-theme' ),
		'bio'    => __( 'José focuses on web design to code and user interface and experience. He also assists with backend development, theme and blocks updates and development, project planning and mentoring interns.', 'ls-theme' ),
		'image'  => 'https://ls-agency.lightspeedwp.dev/wp-content/uploads/2025/12/LightSpeed-Team-Jose-Abreu-alt.png',
	),
	array(
		'anchor' => 'p-tibi',
		'name'   => 'Tibi Buzdugan',
		'role'   => __( 'Frontend and backend developer', 'ls-theme' ),
		'bio'    => __( 'Tibi works on WordPress theme and block development, translating Figma design systems to web interfaces.', 'ls-theme' ),
		'image'  => 'https://ls-agency.lightspeedwp.dev/wp-content/uploads/2025/12/LightSpeed-Team-Tibi-Buzdugan.jpg',
	),
	array(
		'anchor' => 'p-zared',
		'name'   => 'Zared Rogers',
		'role'   => __( 'Designer and site builder', 'ls-theme' ),
		'bio'    => __( 'Zared’s role reflects practical design and build work, and LightSpeed’s WordCamp Cape Town 2024 material also placed him in public demos around Figma design systems and prototypes.', 'ls-theme' ),
		'image'  => 'https://ls-agency.lightspeedwp.dev/wp-content/uploads/2025/12/zared-profile.jpeg',
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","anchor":"design","className":"ls-profile-group","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section id="design" class="wp-block-group alignfull ls-profile-group" style="margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group">

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Design and build', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"700"} -->
			<h2 class="wp-block-heading has-700-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Design and development', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"14rem"}} -->
		<div class="wp-block-group">

			<?php foreach ( $ls_profiles as $ls_profile ) : ?>
			<!-- wp:group {"tagName":"article","anchor":"<?php echo esc_attr( $ls_profile['anchor'] ); ?>","className":"ls-profile-card","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article id="<?php echo esc_attr( $ls_profile['anchor'] ); ?>" class="wp-block-group ls-profile-card">
				<!-- wp:image {"aspectRatio":"4/5","scale":"cover","width":"100%","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"var:preset|border-radius|300"}}} -->
				<figure class="wp-block-image size-large is-resized has-custom-border"><img<?php echo empty( $ls_profile['image'] ) ? '' : ' src="' . esc_url( $ls_profile['image'] ) . '"'; ?> alt="<?php echo empty( $ls_profile['image'] ) ? '' : esc_attr( sprintf( /* translators: %s: team member name */ __( 'Portrait of %s', 'ls-theme' ), $ls_profile['name'] ) ); ?>" style="border-radius:var(--wp--preset--border-radius--300);aspect-ratio:4/5;object-fit:cover;width:100%;height:auto"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","lineHeight":"var:custom|line-height|heading-snug","letterSpacing":"var:custom|typography|letter-spacing|tight"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"500"} -->
					<h3 class="wp-block-heading has-500-font-size" style="margin-top:0;margin-bottom:0;font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight);line-height:var(--wp--custom--line-height--heading-snug)"><?php echo esc_html( $ls_profile['name'] ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"typography":{"fontFamily":"var:preset|font-family|monospace","fontWeight":"var:custom|typography|font-weight|semibold","letterSpacing":"var:custom|typography|letter-spacing|wider"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="margin-top:0;margin-bottom:0;color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--wider)"><?php echo esc_html( $ls_profile['role'] ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"typography":{"lineHeight":"var:custom|line-height|paragraph"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"200"} -->
				<p class="has-text-color has-200-font-size" style="margin-top:0;margin-bottom:0;color:var(--wp--custom--color--text--muted);line-height:var(--wp--custom--line-height--paragraph)"><?php echo esc_html( $ls_profile['bio'] ); ?></p>
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
