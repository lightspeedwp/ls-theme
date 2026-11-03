<?php
/**
 * Title: Section - Split Header Icon Columns
 * Slug: ls-theme/split-header-icon-columns
 * Categories: featured
 * Block Types: core/pattern
 * Description: A section on the page canvas: a split header (dot eyebrow and H2 on the left, a short paragraph bottom-aligned on the right) above three ruled columns, each a large Icon block in its own accent colour, an H3 and a paragraph, divided by hairlines. The columns stack on mobile and the side dividers become bottom dividers (src/scss/structural/about-culture.scss). Authored for the About Culture page "Fostering Connection" section; edit the copy and icons after inserting. Falls back to core/columns and core/group because no semantic core block fits an icon column. Adapts between light and dark mode through text, border and accent tokens.
 * Keywords: icons, columns, initiatives, connection, culture, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_icon_columns = array(
	array(
		'icon'   => 'calendar',
		'title'  => __( 'Quarterly Retreats', 'ls-theme' ),
		'text'   => __( 'Bringing the team together for strategic planning and team building.', 'ls-theme' ),
		'colour' => 'var(--wp--custom--color--text--brand)',
	),
	array(
		'icon'   => 'sparkle',
		'title'  => __( 'AI Study Groups & Hackathons', 'ls-theme' ),
		'text'   => __( 'Dedicated time for the team to experiment with new AI capabilities and prototype new solutions.', 'ls-theme' ),
		'colour' => 'var(--wp--custom--color--accent--warm)',
	),
	array(
		'icon'   => 'graduation-cap',
		'title'  => __( 'Mentorship & Upskilling', 'ls-theme' ),
		'text'   => __( 'We provide training allowances and actively support junior developers through internships and mentorship.', 'ls-theme' ),
		'colour' => 'var(--wp--custom--color--phase--grow)',
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:columns {"align":"wide","verticalAlignment":"bottom","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|80"}}}} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-bottom">

			<!-- wp:column {"verticalAlignment":"bottom","width":"50%","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:50%">
				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Fostering Connection', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"700"} -->
				<h2 class="wp-block-heading has-700-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html__( 'Remote, but not isolated', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"bottom","width":"50%"} -->
			<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:50%">
				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'While we are remote, we are not isolated. We foster team bonding and professional development through cultural initiatives like:', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:columns {"align":"wide","style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
		<div class="wp-block-columns alignwide" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px">
			<?php foreach ( $ls_icon_columns as $ls_icon_index => $ls_icon_column ) : ?>

				<?php
				$ls_icon_first = 0 === $ls_icon_index;
				$ls_icon_style = array(
					'spacing' => array(
						'blockGap' => 'var:preset|spacing|20',
						'padding'  => array(
							'top'    => 'var:preset|spacing|50',
							'right'  => 'var:preset|spacing|40',
							'bottom' => 'var:preset|spacing|50',
							'left'   => $ls_icon_first ? '0' : 'var:preset|spacing|40',
						),
					),
				);
				if ( ! $ls_icon_first ) {
					$ls_icon_style = array(
						'border' => array(
							'left' => array(
								'color' => 'var:custom|color|border|card',
								'style' => 'solid',
								'width' => '1px',
							),
						),
					) + $ls_icon_style;
				}
				$ls_icon_attrs = array(
					'className' => 'ls-col-rule',
					'style'     => $ls_icon_style,
				);
				$ls_icon_css   = ( $ls_icon_first ? '' : 'border-left-color:var(--wp--custom--color--border--card);border-left-style:solid;border-left-width:1px;' )
				. 'padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:'
				. ( $ls_icon_first ? '0' : 'var(--wp--preset--spacing--40)' );
				?>
			<!-- wp:column <?php echo wp_json_encode( $ls_icon_attrs ); ?> -->
			<div class="wp-block-column ls-col-rule" style="<?php echo esc_attr( $ls_icon_css ); ?>">
				<!-- wp:icon {"icon":"lightspeed/<?php echo esc_attr( $ls_icon_column['icon'] ); ?>","className":"has-text-color","style":{"color":{"text":"<?php echo esc_attr( $ls_icon_column['colour'] ); ?>"},"dimensions":{"width":"6rem"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html( $ls_icon_column['title'] ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
				<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_icon_column['text'] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
