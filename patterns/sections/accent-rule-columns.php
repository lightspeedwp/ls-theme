<?php
/**
 * Title: Section - Accent Rule Columns
 * Slug: ls-theme/accent-rule-columns
 * Categories: text
 * Block Types: core/pattern
 * Description: A "values" section on a surface.card band: a dot eyebrow, H2 and lede above a row of three flat columns, each with a thick top rule in its own accent colour (blue, orange or green), a large H3 and a paragraph pinned to the bottom. The row is a core/group grid with a minimum column width, so the columns share one height and wrap to a single column on small screens without any custom CSS. The columns have no card fill, unlike Section - Accent Card Grid. Falls back to core/group because no semantic core block fits a ruled column. Adapts between light and dark mode through surface, text and accent tokens. Authored for the About Careers page "What we look for in candidates" section; edit the copy after inserting.
 * Keywords: values, columns, accent, rule, careers, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_rule_columns = array(
	array(
		'title'       => __( 'Curiosity & Adaptability', 'ls-theme' ),
		'description' => __( 'A relentless desire to learn new technologies and an openness to AI experimentation.', 'ls-theme' ),
		'token'       => 'text--brand',
		'colour'      => 'text|brand',
	),
	array(
		'title'       => __( 'Independence', 'ls-theme' ),
		'description' => __( 'Self-motivated professionals who communicate clearly and can manage their own goals across different time zones.', 'ls-theme' ),
		'token'       => 'accent--warm',
		'colour'      => 'accent|warm',
	),
	array(
		'title'       => __( 'Open-Source Collaboration', 'ls-theme' ),
		'description' => __( 'A belief in sharing knowledge. We value developers and designers who are eager to contribute to WordPress Core, release open-source plugins, and share their work with the community.', 'ls-theme' ),
		'token'       => 'phase--grow',
		'colour'      => 'phase|grow',
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"color":{"background":"var:custom|color|surface|card"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-background" style="background-color:var(--wp--custom--color--surface--card);margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
		<div class="wp-block-group">

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Core values', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"600"} -->
			<h2 class="wp-block-heading has-600-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'What We Look For in Candidates', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:group {"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Because we have been a remote-first agency since 2014, our hiring prioritizes individuals who thrive in a flexible, asynchronous environment. We look for candidates who embody our core values:', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"18rem"}} -->
		<div class="wp-block-group">
			<?php foreach ( $ls_rule_columns as $ls_rule_column ) : ?>
			<!-- wp:group {"tagName":"article","style":{"border":{"top":{"color":"var:custom|color|<?php echo esc_attr( $ls_rule_column['colour'] ); ?>","style":"solid","width":"4px"}},"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|40"}},"dimensions":{"minHeight":"280px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between","flexWrap":"nowrap"}} -->
			<article class="wp-block-group" style="border-top-color:var(--wp--custom--color--<?php echo esc_attr( $ls_rule_column['token'] ); ?>);border-top-style:solid;border-top-width:4px;min-height:280px;padding-top:var(--wp--preset--spacing--40)">
				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold","letterSpacing":"var:custom|typography|letter-spacing|tight","lineHeight":"var:custom|line-height|heading-snug"}},"fontSize":"600"} -->
				<h3 class="wp-block-heading has-600-font-size" style="font-weight:var(--wp--custom--typography--font-weight--extrabold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight);line-height:var(--wp--custom--line-height--heading-snug)"><?php echo esc_html( $ls_rule_column['title'] ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_rule_column['description'] ); ?></p>
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
