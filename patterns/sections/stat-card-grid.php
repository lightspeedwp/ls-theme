<?php
/**
 * Title: Section - Stat Card Grid
 * Slug: ls-theme/stat-card-grid
 * Categories: stats
 * Block Types: core/pattern
 * Description: A proof section on a surface.card band (the shared Content Band style with its background swapped, so its vertical spacing matches the other page sections): a left-aligned dot eyebrow, H2 and lede paragraph above a responsive grid of four flat stat cards (Card - Plain: no shadow and no hover lift, because they are not links), each a large figure in its own accent colour above one line of supporting copy, followed by a closing statement. The grid is a core/group with the grid layout and a minimum column width, so any number of cards wraps cleanly; duplicate or delete a card freely. Authored for the About History page "A Legacy of Open-Source Contribution" section; edit the figures and copy after inserting. Same family as Section - Stat Icon Cards but with no icon wells and left-aligned figures. Falls back to core/group because no semantic core block fits a stat card. Adapts between light and dark mode through text, surface, border and phase tokens. No new SCSS.
 * Keywords: stats, numbers, proof, cards, open source, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_stat_cards = array(
	array(
		'value'  => __( '300+', 'ls-theme' ),
		'label'  => __( 'Websites built and rebuilt.', 'ls-theme' ),
		'colour' => 'var(--wp--custom--color--text--brand)',
	),
	array(
		'value'  => __( '150+', 'ls-theme' ),
		'label'  => __( 'Custom plugins developed.', 'ls-theme' ),
		'colour' => 'var(--wp--custom--color--phase--launch)',
	),
	array(
		'value'  => __( '30+', 'ls-theme' ),
		'label'  => __( 'Open-source plugins released publicly on GitHub under the GNU Public License.', 'ls-theme' ),
		'colour' => 'var(--wp--custom--color--phase--grow)',
	),
	array(
		'value'  => __( '10+', 'ls-theme' ),
		'label'  => __( 'Open-source themes shared with the WordPress community.', 'ls-theme' ),
		'colour' => 'var(--wp--custom--color--phase--evolve)',
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","style":{"color":{"background":"var:custom|color|surface|card"},"spacing":{"margin":{"top":"0"},"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band has-background" style="background-color:var(--wp--custom--color--surface--card);margin-top:0">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","contentSize":"780px","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Open source', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"600"} -->
		<h2 class="wp-block-heading has-600-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'A Legacy of Open-Source Contribution', 'ls-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
		<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Throughout our evolution, one thing has remained constant: our promise to keep our products open-source. We believe that collaboration drives innovation. Over the years, we have developed:', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"14rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $ls_stat_cards as $ls_stat_card ) : ?>
		<!-- wp:group {"tagName":"article","className":"is-style-card-plain","layout":{"type":"default"}} -->
		<article class="wp-block-group is-style-card-plain">
			<!-- wp:paragraph {"style":{"color":{"text":"<?php echo esc_attr( $ls_stat_card['colour'] ); ?>"},"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|extrabold","lineHeight":"var:custom|line-height|heading-tight"}},"fontSize":"700"} -->
			<p class="has-text-color has-700-font-size" style="color:<?php echo esc_attr( $ls_stat_card['colour'] ); ?>;font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--extrabold);line-height:var(--wp--custom--line-height--heading-tight)"><?php echo esc_html( $ls_stat_card['value'] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
			<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_stat_card['label'] ); ?></p>
			<!-- /wp:paragraph -->
		</article>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"780px","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"300"} -->
		<p class="has-300-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'Our journey continues as we shape the future of AI-optimised digital experiences.', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
