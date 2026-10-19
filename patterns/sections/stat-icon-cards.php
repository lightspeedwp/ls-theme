<?php
/**
 * Title: Section - Stat Icon Cards
 * Slug: ls-theme/stat-icon-cards
 * Categories: featured
 * Block Types: core/pattern
 * Description: A proof section on the page canvas: a centered eyebrow, H2 and paragraph above a responsive grid of flat stat cards (Card - Plain: no shadow and no hover lift, because they are not links), each with a circular brand-tinted Icon block well, a large brand-coloured figure, a label and a line of supporting copy. The grid is a core/group with the grid layout and a minimum column width, so any number of cards wraps cleanly; duplicate or delete a card freely. Authored for the About page "What we ship" section. Falls back to core/group because no semantic core block fits a stat card. Adapts between light and dark mode through text, surface and border tokens. No new SCSS.
 * Keywords: stats, numbers, proof, icons, cards, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_stat_cards = array(
	array(
		'icon'        => 'rocket',
		'value'       => '1,500',
		'suffix'      => '+',
		'label'       => __( 'Projects completed', 'ls-theme' ),
		'description' => __( 'Delivered since September 2013 across WordPress, WooCommerce and publishing platforms.', 'ls-theme' ),
	),
	array(
		'icon'        => 'globe',
		'value'       => '300',
		'suffix'      => '+',
		'label'       => __( 'Websites built and rebuilt', 'ls-theme' ),
		'description' => __( 'Websites, builds and rebuilds delivered for clients as broad proof of delivery experience.', 'ls-theme' ),
	),
	array(
		'icon'        => 'arrows-clockwise',
		'value'       => '6',
		'suffix'      => '',
		'label'       => __( 'Stages of delivery', 'ls-theme' ),
		'description' => __( 'Discover, Create, Build, Launch, Grow and Evolve: connected stages that keep a platform useful after launch.', 'ls-theme' ),
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","style":{"spacing":{"margin":{"top":"0"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band" style="margin-top:0">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"680px"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'What we ship', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"600"} -->
		<h2 class="wp-block-heading has-text-align-center has-600-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'The work in numbers.', 'ls-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}},"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
		<p class="has-text-align-center has-text-color has-300-font-size" style="margin-top:var(--wp--preset--spacing--20);color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'A grounded view of what working with LightSpeed produces: delivered projects, maintainable platforms and a process that keeps improving them after launch.', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"18rem"}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--60)">
		<?php foreach ( $ls_stat_cards as $ls_stat_card ) : ?>
		<!-- wp:group {"tagName":"article","className":"is-style-card-plain","layout":{"type":"flex","orientation":"vertical","justifyContent":"center","flexWrap":"nowrap"}} -->
		<article class="wp-block-group is-style-card-plain">
			<!-- wp:group {"style":{"border":{"color":"var:custom|color|text|brand","radius":"var:preset|border-radius|500","style":"solid","width":"2px"},"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 12%, transparent)"},"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
			<div class="wp-block-group has-border-color has-background" style="border-color:var(--wp--custom--color--text--brand);border-style:solid;border-width:2px;border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 12%, transparent);padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
				<!-- wp:icon {"icon":"lightspeed/<?php echo esc_attr( $ls_stat_card['icon'] ); ?>","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"28px"}}} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|extrabold","lineHeight":"var:custom|line-height|heading-tight"}},"fontSize":"700"} -->
			<p class="has-text-align-center has-text-color has-700-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--extrabold);line-height:var(--wp--custom--line-height--heading-tight)"><?php echo esc_html( $ls_stat_card['value'] . $ls_stat_card['suffix'] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"200"} -->
			<p class="has-text-align-center has-200-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html( $ls_stat_card['label'] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
			<p class="has-text-align-center has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_stat_card['description'] ); ?></p>
			<!-- /wp:paragraph -->
		</article>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
