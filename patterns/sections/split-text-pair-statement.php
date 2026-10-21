<?php
/**
 * Title: Section - Split Text Pair Statement
 * Slug: ls-theme/split-text-pair-statement
 * Categories: text
 * Block Types: core/pattern
 * Description: A two-column text section on the page canvas followed by a large closing statement: each column is a dot-eyebrow H2 (the heading itself carries the eyebrow styling, so the page keeps a real heading) and a lede paragraph, and below a hairline sits one oversized statement in which one phrase is struck through in the subtle text colour and another is highlighted in the brand colour. The strike-through and highlight are core inline formats (strikethrough and highlight), so editors can change them from the toolbar. The columns stack on mobile. Falls back to core/columns and core/group because no semantic core block fits a text pair with a statement. Adapts between light and dark mode through text, border and brand tokens. Authored for the About Careers page "Why join" and "How we work" section; edit the headings, paragraphs and statement after inserting.
 * Keywords: text, pair, statement, columns, careers, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_pair_columns = array(
	array(
		'heading' => __( 'Why join LightSpeed', 'ls-theme' ),
		'text'    => __( 'LightSpeed is not trying to build a culture around noise. We care about doing good work, improving over time, and using modern tools in ways that make the team stronger. If you like clean systems, practical delivery and open-source values, you will probably feel more at home here than in a company chasing hype.', 'ls-theme' ),
	),
	array(
		'heading' => __( 'How we work', 'ls-theme' ),
		'text'    => __( 'We are a remote-first team, and have been since 2014. That means flexible schedules, but it also means clear expectations. We document work, define review points, rely on shared tools, and expect people to communicate well.', 'ls-theme' ),
	),
);

$ls_goal_html = sprintf(
	/* translators: 1: struck-through phrase, 2: highlighted phrase. */
	esc_html__( 'The goal is not %1$s. The goal is %2$s.', 'ls-theme' ),
	'<s><span style="color:var(--wp--custom--color--text--subtle)" class="has-inline-color">' . esc_html__( 'constant visibility', 'ls-theme' ) . '</span></s>',
	'<mark style="background-color:transparent;color:var(--wp--custom--color--text--brand)" class="has-inline-color">' . esc_html__( 'dependable progress', 'ls-theme' ) . '</mark>'
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"color":{"background":"var:custom|color|surface|canvas"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-background" style="background-color:var(--wp--custom--color--surface--canvas);margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|80"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:columns {"verticalAlignment":"top","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|90"}}}} -->
		<div class="wp-block-columns are-vertically-aligned-top">
			<?php foreach ( $ls_pair_columns as $ls_pair_column ) : ?>

			<!-- wp:column {"verticalAlignment":"top","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
			<div class="wp-block-column is-vertically-aligned-top">

				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

					<!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
					<h2 class="wp-block-heading has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html( $ls_pair_column['heading'] ); ?></h2>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_pair_column['text'] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:columns -->

		<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|70"}}},"layout":{"type":"constrained","contentSize":"","justifyContent":"left"}} -->
		<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--70)">
			<!-- wp:paragraph {"className":"ls-careers-goal","style":{"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|extrabold","letterSpacing":"var:custom|typography|letter-spacing|tight","lineHeight":"var:custom|line-height|heading-snug"}},"fontSize":"800"} -->
			<p class="ls-careers-goal has-800-font-size" style="font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--extrabold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight);line-height:var(--wp--custom--line-height--heading-snug)"><?php echo wp_kses_post( $ls_goal_html ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
