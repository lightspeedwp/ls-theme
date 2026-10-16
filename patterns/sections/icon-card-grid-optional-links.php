<?php
/**
 * Title: Section - Icon Card Grid with Optional Links
 * Slug: ls-theme/icon-card-grid-optional-links
 * Categories: featured
 * Block Types: core/pattern
 * Description: A "what this page is for" section on the page canvas: dot eyebrow and H2 above a responsive grid of five icon cards. Cards with a link are whole-card Card - Service Tile links (icon well, H3, one line of copy and an arrow link); cards without a link use the flat Card - Plain style so nothing signals clickability. Both sit on surface.card. The grid is a core/group with the grid layout and a minimum column width, so any number of cards wraps cleanly; each card is independent, so link or unlink one by adding or removing its arrow-link paragraph and switching its style. Reuses the Split Header Icon Card Grid card classes (ls-icon-card-grid, ls-icon-card) for equal row height. Falls back to core/group because no semantic core block fits an icon card grid. Adapts between light and dark mode through surface, text, icon and border tokens. Edit the eyebrow, heading and cards after inserting.
 * Keywords: cards, icons, grid, links, routes, enquiry, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_enquiry_cards = array(
	array(
		'icon'        => 'rocket-launch',
		'title'       => __( 'New project enquiries', 'ls-theme' ),
		'description' => __( 'New platform, redesign, migration or support conversations that need routing to the right person.', 'ls-theme' ),
		'link_label'  => __( 'Free consultation', 'ls-theme' ),
		'url'         => '/free-consultation/',
	),
	array(
		'icon'        => 'lifebuoy',
		'title'       => __( 'Existing support needs', 'ls-theme' ),
		'description' => __( 'Current platform issues, ongoing support needs or operational follow-up.', 'ls-theme' ),
		'link_label'  => __( 'Read about support', 'ls-theme' ),
		'url'         => '/services/support/',
	),
	array(
		'icon'        => 'users',
		'title'       => __( 'Partnership conversations', 'ls-theme' ),
		'description' => __( 'Agency-to-agency, technology partner or referral introductions.', 'ls-theme' ),
		'link_label'  => __( 'Referrals route', 'ls-theme' ),
		'url'         => '/referrals/',
	),
	array(
		'icon'        => 'audio',
		'title'       => __( 'Speaking and event requests', 'ls-theme' ),
		'description' => __( 'Talks, workshops and panel invitations on WordPress, design systems and platform strategy.', 'ls-theme' ),
		'link_label'  => '',
		'url'         => '',
	),
	array(
		'icon'        => 'question',
		'title'       => __( 'Other platform questions', 'ls-theme' ),
		'description' => __( 'Questions that do not fit a clean category but still need a serious response.', 'ls-theme' ),
		'link_label'  => '',
		'url'         => '',
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'What this page is for', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"600"} -->
			<h2 class="wp-block-heading has-600-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Five enquiry types we route differently.', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"ls-icon-card-grid","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"grid","minimumColumnWidth":"22rem"}} -->
		<div class="wp-block-group ls-icon-card-grid">

			<?php foreach ( $ls_enquiry_cards as $ls_enquiry_card ) : ?>
				<?php $ls_has_link = '' !== $ls_enquiry_card['url']; ?>
				<?php if ( $ls_has_link ) : ?>
			<!-- wp:group {"tagName":"article","className":"is-style-card-service-tile ls-icon-card","style":{"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-service-tile ls-icon-card" style="min-height:100%">
				<?php else : ?>
			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-icon-card","style":{"color":{"background":"var:custom|color|surface|card"},"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-icon-card has-background" style="background-color:var(--wp--custom--color--surface--card);min-height:100%">
				<?php endif; ?>
				<!-- wp:group {"className":"ls-icon-well-brand"} -->
				<div class="wp-block-group ls-icon-well-brand">
					<!-- wp:icon {"icon":"lightspeed/<?php echo esc_attr( $ls_enquiry_card['icon'] ); ?>","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"20px"}}} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"ls-card-service-tile__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<div class="wp-block-group ls-card-service-tile__content">
					<!-- wp:heading {"level":3,"className":"ls-icon-card__title","style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"300"} -->
					<h3 class="wp-block-heading ls-icon-card__title has-300-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html( $ls_enquiry_card['title'] ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"className":"ls-icon-card__text","style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
					<p class="ls-icon-card__text has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_enquiry_card['description'] ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<?php if ( $ls_has_link ) : ?>

				<!-- wp:paragraph {"className":"is-style-link-arrow-accent","fontSize":"200"} -->
				<p class="is-style-link-arrow-accent has-200-font-size"><a class="ls-card-service-tile__link" href="<?php echo esc_url( home_url( $ls_enquiry_card['url'] ) ); ?>"><?php echo esc_html( $ls_enquiry_card['link_label'] ); ?></a></p>
				<!-- /wp:paragraph -->
				<?php endif; ?>
			</article>
			<!-- /wp:group -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
