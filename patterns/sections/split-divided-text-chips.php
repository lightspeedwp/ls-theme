<?php
/**
 * Title: Section - Split Divided Text Chips
 * Slug: ls-theme/split-divided-text-chips
 * Categories: text
 * Block Types: core/pattern
 * Description: A two-column section on a surface.card band: each column is a dot eyebrow H2, a paragraph and a row of tinted pill labels, with a hairline divider between the columns (the divider becomes a top rule when the columns stack on mobile, in src/scss/structural/about-culture.scss). The pill labels reuse the ls-chips list style. Authored for the About Culture page "Learning is part of the job" and "Open-source mindset" pair; edit the eyebrows, paragraphs and labels after inserting. Falls back to core/columns and core/group because no semantic core block fits a divided text pair. Adapts between light and dark mode through surface, text, border and brand tokens.
 * Keywords: split, pair, divided, chips, learning, open source, culture, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_divided_columns = array(
	array(
		'title'  => __( 'Learning is part of the job', 'ls-theme' ),
		'text'   => __( 'LightSpeed’s public community and workflow material consistently points to learning as part of the company’s identity. That includes WordPress involvement, conference participation, mentoring, tool adoption and ongoing experimentation with better ways of working. We treat learning as part of delivery, not as something squeezed in after hours.', 'ls-theme' ),
		'labels' => array(
			__( 'WordPress involvement', 'ls-theme' ),
			__( 'Conference participation', 'ls-theme' ),
			__( 'Mentoring', 'ls-theme' ),
			__( 'Tool adoption', 'ls-theme' ),
			__( 'Experimentation', 'ls-theme' ),
		),
	),
	array(
		'title'  => __( 'Open-source mindset', 'ls-theme' ),
		'text'   => __( 'We still see open source as a working value, not a badge line. It shapes how we think about ownership, extensibility, contribution and shared learning. That mindset runs through our products, our WordPress.org presence and the way we talk about systems with clients.', 'ls-theme' ),
		'labels' => array(
			__( 'Ownership', 'ls-theme' ),
			__( 'Extensibility', 'ls-theme' ),
			__( 'Contribution', 'ls-theme' ),
			__( 'Shared learning', 'ls-theme' ),
		),
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"color":{"background":"var:custom|color|surface|card"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-background" style="background-color:var(--wp--custom--color--surface--card);margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:columns {"align":"wide","verticalAlignment":"top","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-top">
		<?php foreach ( $ls_divided_columns as $ls_divided_index => $ls_divided_column ) : ?>

			<?php
			$ls_divided_first = 0 === $ls_divided_index;
			$ls_divided_style = array(
				'spacing' => array(
					'blockGap' => 'var:preset|spacing|30',
					'padding'  => array(
						'right' => $ls_divided_first ? 'var:preset|spacing|60' : '0',
						'left'  => $ls_divided_first ? '0' : 'var:preset|spacing|60',
					),
				),
			);
			if ( ! $ls_divided_first ) {
				$ls_divided_style = array(
					'border' => array(
						'left' => array(
							'color' => 'var:custom|color|border|card',
							'style' => 'solid',
							'width' => '1px',
						),
					),
				) + $ls_divided_style;
			}
			$ls_divided_attrs = array(
				'verticalAlignment' => 'top',
				'className'         => 'ls-divided-col',
				'style'             => $ls_divided_style,
			);
			$ls_divided_css   = ( $ls_divided_first ? '' : 'border-left-color:var(--wp--custom--color--border--card);border-left-style:solid;border-left-width:1px;' )
			. 'padding-right:' . ( $ls_divided_first ? 'var(--wp--preset--spacing--60)' : '0' )
			. ';padding-left:' . ( $ls_divided_first ? '0' : 'var(--wp--preset--spacing--60)' );
			?>
		<!-- wp:column <?php echo wp_json_encode( $ls_divided_attrs ); ?> -->
		<div class="wp-block-column is-vertically-aligned-top ls-divided-col" style="<?php echo esc_attr( $ls_divided_css ); ?>">

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

				<!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<h2 class="wp-block-heading has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html( $ls_divided_column['title'] ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_divided_column['text'] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"className":"ls-chips","fontSize":"100"} -->
			<ul class="wp-block-list ls-chips has-100-font-size">
				<?php foreach ( $ls_divided_column['labels'] as $ls_divided_label ) : ?>
				<!-- wp:list-item -->
				<li><?php echo esc_html( $ls_divided_label ); ?></li>
				<!-- /wp:list-item -->
				<?php endforeach; ?>
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
