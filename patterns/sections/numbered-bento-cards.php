<?php
/**
 * Title: Section - Numbered Bento Cards
 * Slug: ls-theme/numbered-bento-cards
 * Categories: text
 * Block Types: core/pattern
 * Description: A "who this is for" section on a surface.card band: a dot-eyebrow H2 and an intro line above a six-column bento of numbered cards. The first card spans four columns, the next four span two and the last spans the full row (a core/group grid with column spans, so each card can be reordered or deleted). Each card is a flat Card - Plain with a mono number in its own accent colour (blue, orange, green or purple) and a statement in the heading font. On small screens the grid drops to two columns, then one (src/scss/structural/about-careers.scss, because core grids have no per-breakpoint column count). Falls back to core/group because no semantic core block fits a card. Adapts between light and dark mode through surface, text, border and accent tokens. Authored for the About Careers page "Who thrives here" section; edit the heading, intro and card text after inserting.
 * Keywords: bento, cards, numbered, grid, careers, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_bento_cards = array(
	array(
		'number' => '01',
		'text'   => __( 'Modern WordPress developers', 'ls-theme' ),
		'colour' => 'var(--wp--custom--color--text--brand)',
		'span'   => 4,
		'size'   => '600',
	),
	array(
		'number' => '02',
		'text'   => __( 'Block-theme and plugin builders', 'ls-theme' ),
		'colour' => 'var(--wp--custom--color--accent--warm)',
		'span'   => 2,
		'size'   => '400',
	),
	array(
		'number' => '03',
		'text'   => __( 'Designers who think in systems, not just screens', 'ls-theme' ),
		'colour' => 'var(--wp--custom--color--phase--grow)',
		'span'   => 2,
		'size'   => '400',
	),
	array(
		'number' => '04',
		'text'   => __( 'People comfortable with async work', 'ls-theme' ),
		'colour' => 'var(--wp--custom--color--phase--evolve)',
		'span'   => 2,
		'size'   => '400',
	),
	array(
		'number' => '05',
		'text'   => __( 'People who can work independently without disappearing', 'ls-theme' ),
		'colour' => 'var(--wp--custom--color--accent--warm)',
		'span'   => 2,
		'size'   => '400',
	),
	array(
		'number' => '06',
		'text'   => __( 'People who are curious about AI-assisted workflows but still care about judgment, craft and review', 'ls-theme' ),
		'colour' => 'var(--wp--custom--color--text--brand)',
		'span'   => 6,
		'size'   => '400',
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"color":{"background":"var:custom|color|surface|card"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-background" style="background-color:var(--wp--custom--color--surface--card);margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group">

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

				<!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<h2 class="wp-block-heading has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Who thrives here', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'The people most likely to do well at LightSpeed are:', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"ls-bento","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"grid","columnCount":6}} -->
		<div class="wp-block-group ls-bento">
			<?php foreach ( $ls_bento_cards as $ls_bento_card ) : ?>
				<?php
				$ls_bento_is_wide    = ( 6 === $ls_bento_card['span'] );
				$ls_bento_attrs      = array(
					'tagName'   => 'article',
					'className' => 'is-style-card-plain ls-bento__card',
					'style'     => array(
						'layout'  => array( 'columnSpan' => $ls_bento_card['span'] ),
						'spacing' => array( 'blockGap' => 'var:preset|spacing|40' ),
					),
					'layout'    => array(
						'type'        => 'flex',
						'orientation' => $ls_bento_is_wide ? 'horizontal' : 'vertical',
						'flexWrap'    => 'nowrap',
					),
				);
				$ls_bento_min_height = $ls_bento_is_wide ? '0px' : '200px';

				$ls_bento_attrs['style']['dimensions'] = array( 'minHeight' => $ls_bento_min_height );
				if ( $ls_bento_is_wide ) {
					$ls_bento_attrs['layout']['verticalAlignment'] = 'center';
				} else {
					$ls_bento_attrs['layout']['verticalAlignment'] = 'space-between';
				}
				?>
			<!-- wp:group <?php echo wp_json_encode( $ls_bento_attrs, JSON_UNESCAPED_SLASHES ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON for a block comment. ?> -->
			<article class="wp-block-group ls-bento__card is-style-card-plain" style="min-height:<?php echo esc_attr( $ls_bento_min_height ); ?>">
				<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","letterSpacing":"var:custom|typography|letter-spacing|wide","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"<?php echo esc_attr( $ls_bento_card['colour'] ); ?>"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:<?php echo esc_attr( $ls_bento_card['colour'] ); ?>;font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--wide)"><?php echo esc_html( $ls_bento_card['number'] ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|bold","lineHeight":"var:custom|line-height|heading-default"}},"fontSize":"<?php echo esc_attr( $ls_bento_card['size'] ); ?>"} -->
				<p class="has-<?php echo esc_attr( $ls_bento_card['size'] ); ?>-font-size" style="font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--bold);line-height:var(--wp--custom--line-height--heading-default)"><?php echo esc_html( $ls_bento_card['text'] ); ?></p>
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
