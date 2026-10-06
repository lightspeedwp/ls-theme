<?php
/**
 * Title: Section - Split Intro Pair Cards
 * Slug: ls-theme/split-intro-pair-cards
 * Categories: featured
 * Block Types: core/pattern
 * Description: A two-column comparison section: eyebrow and heading on the left (about 40%), and on the right a short paragraph above two bordered cards, each a mono kicker label with a line of supporting copy. Authored for the Solutions landing page's "solutions vs services" comparison; edit the eyebrow, heading, paragraph and both cards after inserting. Sits on a raised surface.card band with canvas-surface cards; falls back to core/columns and core/group because no semantic core block fits a labelled comparison pair. Adapts between light and dark mode through surface, text and border tokens. No new SCSS.
 * Keywords: split, comparison, pair, cards, intro, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_pair_cards = array(
	array(
		'label' => __( 'Services', 'ls-theme' ),
		'text'  => __( 'Discovery · Design · Development · Migrations · Hosting · Support', 'ls-theme' ),
	),
	array(
		'label' => __( 'Solutions', 'ls-theme' ),
		'text'  => __( 'Packaged outcomes built around real business models', 'ls-theme' ),
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-split-intro-pair-cards","style":{"color":{"background":"var:custom|color|surface|card"},"spacing":{"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|60","bottom":"var:preset|spacing|90","left":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-split-intro-pair-cards has-background" style="background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--60)">

	<!-- wp:columns {"align":"wide","verticalAlignment":"top","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-top">

		<!-- wp:column {"verticalAlignment":"top","width":"40%"} -->
		<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:40%">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Solutions and services', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"700"} -->
			<h2 class="wp-block-heading has-700-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Solutions are the outcome. Services are the disciplines.', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"top","width":"60%"} -->
		<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:60%">
			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Solutions are packaged outcomes built around real business models, such as WordPress publishing or WooCommerce commerce. Services are the individual disciplines that combine to deliver each solution.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"grid","minimumColumnWidth":"16rem"}} -->
			<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30)">
				<?php foreach ( $ls_pair_cards as $ls_card ) : ?>
				<!-- wp:group {"style":{"color":{"background":"var:custom|color|surface|canvas"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|400","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|30","bottom":"var:preset|spacing|20","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"stretch"}} -->
				<div class="wp-block-group has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--400);background-color:var(--wp--custom--color--surface--canvas);padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--30)">
					<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wide","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var:custom|color|text|brand"}},"fontSize":"200"} -->
					<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--wide);text-transform:uppercase"><?php echo esc_html( $ls_card['label'] ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"color":{"text":"var:custom|color|text|default"}},"fontSize":"200"} -->
					<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--default)"><?php echo esc_html( $ls_card['text'] ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<?php endforeach; ?>
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
