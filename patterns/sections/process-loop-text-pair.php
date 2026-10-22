<?php
/**
 * Title: Section - Process Loop Text Pair
 * Slug: ls-theme/process-loop-text-pair
 * Categories: text
 * Block Types: core/pattern
 * Description: A "how we work" section on the page canvas: a dot eyebrow, H2 and lede above a loop of five tool chips joined by arrow Icon blocks, with a dashed return line underneath that shows the last step feeding back into the first (the line is an empty group drawn with a CSS border in src/scss/structural/about-careers.scss, because borders cannot be curved per corner on one side in block JSON). Below the loop sit two text columns, each a hairline, an H3 and a paragraph. The last chip takes the brand border to mark the destination. On mobile the chips stack, the arrows turn downward and the return line is hidden. Falls back to core/group and core/columns because no semantic core block fits a process loop. Adapts between light and dark mode through surface, text, border and brand tokens. Authored for the About Careers page "Our Modern Toolset and Workflow" section; edit the copy and chip labels after inserting.
 * Keywords: process, loop, workflow, chips, tools, careers, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_loop_chips = array(
	__( 'Figma', 'ls-theme' ),
	__( 'VS Code', 'ls-theme' ),
	__( 'GitHub', 'ls-theme' ),
	__( 'GitHub Copilot', 'ls-theme' ),
	__( 'WordPress', 'ls-theme' ),
);

$ls_loop_columns = array(
	array(
		'title'       => __( 'Design to Development', 'ls-theme' ),
		'description' => __( 'We use a strict Git-based workflow. Designs are created in Figma using design tokens and variables, handed off via GitHub issues, and developed into custom WordPress block themes.', 'ls-theme' ),
	),
	array(
		'title'       => __( 'AI Assistance', 'ls-theme' ),
		'description' => __( 'You will use custom instructions, prompt libraries, and the Model Context Protocol (MCP) to give AI assistants like Copilot real context on our projects, accelerating your coding and QA processes.', 'ls-theme' ),
	),
);

$ls_loop_last_index = count( $ls_loop_chips ) - 1;

$ls_loop_lede_html = sprintf(
	/* translators: %s: the list of tools in the workflow loop, shown in bold. */
	__( 'We have eliminated fragmented, outdated processes. You will work within a cohesive, AI-assisted loop that links %s.', 'ls-theme' ),
	'<strong>' . esc_html__( 'Figma, VS Code, GitHub, and GitHub Copilot', 'ls-theme' ) . '</strong>'
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"color":{"background":"var:custom|color|surface|canvas"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-background" style="background-color:var(--wp--custom--color--surface--canvas);margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|70"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
		<div class="wp-block-group">

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Workflow', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"600"} -->
			<h2 class="wp-block-heading has-600-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Our Modern Toolset & Workflow', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:group {"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo wp_kses( $ls_loop_lede_html, array( 'strong' => array() ) ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"ls-loop","style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group ls-loop">

			<!-- wp:group {"className":"ls-loop__row","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group ls-loop__row">
				<?php foreach ( $ls_loop_chips as $ls_loop_index => $ls_loop_chip ) : ?>
					<?php
					$ls_loop_is_last   = ( $ls_loop_index === $ls_loop_last_index );
					$ls_loop_border    = $ls_loop_is_last ? 'var(--wp--custom--color--text--brand)' : 'var(--wp--custom--color--border--card)';
					$ls_loop_border_bk = $ls_loop_is_last ? 'var:custom|color|text|brand' : 'var:custom|color|border|card';
					$ls_loop_attrs     = array(
						'className' => 'ls-loop__chip',
						'style'     => array(
							'color'   => array( 'background' => 'var:custom|color|surface|card' ),
							'border'  => array(
								'color'  => $ls_loop_border_bk,
								'radius' => 'var:preset|border-radius|300',
								'style'  => 'solid',
								'width'  => '1px',
							),
							'spacing' => array(
								'padding' => array(
									'top'    => 'var:preset|spacing|30',
									'right'  => 'var:preset|spacing|20',
									'bottom' => 'var:preset|spacing|30',
									'left'   => 'var:preset|spacing|20',
								),
							),
							'layout'  => array( 'selfStretch' => 'fill' ),
						),
						'layout'    => array(
							'type'           => 'flex',
							'orientation'    => 'vertical',
							'justifyContent' => 'center',
							'flexWrap'       => 'nowrap',
						),
					);
					?>
				<!-- wp:group <?php echo wp_json_encode( $ls_loop_attrs, JSON_UNESCAPED_SLASHES ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON for a block comment. ?> -->
				<div class="wp-block-group ls-loop__chip has-border-color has-background" style="border-color:<?php echo esc_attr( $ls_loop_border ); ?>;border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--300);background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"align":"center","style":{"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"200"} -->
					<p class="has-text-align-center has-200-font-size" style="font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html( $ls_loop_chip ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
					<?php if ( ! $ls_loop_is_last ) : ?>

				<!-- wp:icon {"icon":"lightspeed/arrow-right","className":"has-text-color ls-loop__arrow","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"},"dimensions":{"width":"20px"}}} /-->
				<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"ls-loop__return","layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group ls-loop__return">
				<!-- wp:icon {"icon":"lightspeed/arrow-up","className":"has-text-color ls-loop__return-arrow","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"},"dimensions":{"width":"20px"}}} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:columns {"verticalAlignment":"top","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|90"}}}} -->
		<div class="wp-block-columns are-vertically-aligned-top">
			<?php foreach ( $ls_loop_columns as $ls_loop_column ) : ?>

			<!-- wp:column {"verticalAlignment":"top","style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|30"}}}} -->
			<div class="wp-block-column is-vertically-aligned-top" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--30)">
				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"500"} -->
				<h3 class="wp-block-heading has-500-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html( $ls_loop_column['title'] ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_loop_column['description'] ); ?></p>
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
