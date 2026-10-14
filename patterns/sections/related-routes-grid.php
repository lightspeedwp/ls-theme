<?php
/**
 * Title: Section - Related Routes Grid
 * Slug: ls-theme/related-routes-grid
 * Categories: featured
 * Block Types: core/pattern
 * Description: A "where to go next" section on a surface.card band: dot eyebrow and H2 above a responsive grid of Card - Link Row cards, each a single stretched link with a title, a short description and a trailing arrow Icon block. The grid is a core/group with the grid layout and a minimum column width, so any number of cards wraps cleanly; duplicate or delete a card freely. The cards sit on surface.canvas so they stand out from the band, and the Card - Link Row style supplies the border, focus ring and hover state. Generic and not phase-coloured (unlike Section - Link Card Grid), so it works on any page. Falls back to core/group because no semantic core block fits a linked card grid. Adapts between light and dark mode through surface, text, icon and border tokens. Edit the eyebrow, heading and cards after inserting.
 * Keywords: related, routes, next, links, cards, grid, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_related_routes = array(
	array(
		'title'       => __( 'Briefing', 'ls-theme' ),
		'description' => __( 'Send context first if a call feels early.', 'ls-theme' ),
		'url'         => '/briefing/',
	),
	array(
		'title'       => __( 'Pricing', 'ls-theme' ),
		'description' => __( 'How project costs are scoped.', 'ls-theme' ),
		'url'         => '/pricing/',
	),
	array(
		'title'       => __( 'Website packages', 'ls-theme' ),
		'description' => __( 'Likely engagement depth before the call.', 'ls-theme' ),
		'url'         => '/website-packages/',
	),
	array(
		'title'       => __( 'FAQ', 'ls-theme' ),
		'description' => __( 'Common scoping questions.', 'ls-theme' ),
		'url'         => '/faq/',
	),
	array(
		'title'       => __( 'Contact', 'ls-theme' ),
		'description' => __( 'Other routes into LightSpeed.', 'ls-theme' ),
		'url'         => '/contact/',
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"color":{"background":"var:custom|color|surface|card"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|30","bottom":"var:preset|spacing|80","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-background" style="background-color:var(--wp--custom--color--surface--card);margin-top:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Related routes', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"500"} -->
			<h2 class="wp-block-heading has-500-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html__( 'Where to go next', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"grid","minimumColumnWidth":"22rem"}} -->
		<div class="wp-block-group">

			<?php foreach ( $ls_related_routes as $ls_related_route ) : ?>
			<!-- wp:group {"tagName":"article","className":"is-style-card-link-row","style":{"color":{"background":"var:custom|color|surface|canvas"}},"layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"center","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-link-row has-background" style="background-color:var(--wp--custom--color--surface--canvas)">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"300"} -->
					<h3 class="wp-block-heading has-300-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><a class="ls-card-link-row__link" href="<?php echo esc_url( home_url( $ls_related_route['url'] ) ); ?>"><?php echo esc_html( $ls_related_route['title'] ); ?></a></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
					<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_related_route['description'] ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:icon {"icon":"lightspeed/arrow-right","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"20px"}}} /-->
			</article>
			<!-- /wp:group -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
