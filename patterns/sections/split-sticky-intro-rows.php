<?php
/**
 * Title: Section - Split Sticky Intro Rows
 * Slug: ls-theme/split-sticky-intro-rows
 * Categories: text
 * Block Types: core/pattern
 * Description: A two-column section on the page canvas: on the left a dot eyebrow H2, a large outlined figure (the year) and a lede paragraph; on the right a ruled list of numbered rows, each a mono number, an H3, a paragraph and a row of pill labels. On desktop the left column stays in view while the rows scroll past (position: sticky, in src/scss/structural/about-culture.scss because core only offers sticky on top-level blocks), and below the columns' stacking breakpoint it returns to normal flow. The first row's labels are numbered steps (ls-steps, a CSS counter) and the second row's are tinted tags (ls-chips). Authored for the About Culture page "Remote-first since 2014" section; edit the eyebrow, figure, copy and labels after inserting. Falls back to core/columns and core/group because no semantic core block fits a numbered row with a heading, text and labels (core/list items cannot hold headings). Adapts between light and dark mode through text, surface and border tokens.
 * Keywords: sticky, rows, numbered, remote, culture, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_sticky_rows = array(
	array(
		'number' => __( '01', 'ls-theme' ),
		'title'  => __( 'What remote work means in practice', 'ls-theme' ),
		'text'   => __( 'For us, remote work is not about everyone disappearing into their own corner. It depends on good documentation, clear project specs, agreed review points, and a rhythm that keeps work visible without filling the week with unnecessary meetings. LightSpeed’s public workflow material already points toward discovery workshops, content collection, Figma reviews, staging feedback and post-launch support as part of that operating model.', 'ls-theme' ),
		'list'   => 'ls-steps',
		'labels' => array(
			__( 'Discovery workshops', 'ls-theme' ),
			__( 'Content collection', 'ls-theme' ),
			__( 'Figma reviews', 'ls-theme' ),
			__( 'Staging feedback', 'ls-theme' ),
			__( 'Post-launch support', 'ls-theme' ),
		),
	),
	array(
		'number' => __( '02', 'ls-theme' ),
		'title'  => __( 'Independence with accountability', 'ls-theme' ),
		'text'   => __( 'We value people who can manage their own time, communicate clearly, and move work forward without waiting to be chased. That independence matters, but so does accountability. Good remote culture depends on ownership, clarity and trust.', 'ls-theme' ),
		'list'   => 'ls-chips',
		'labels' => array(
			__( 'Ownership', 'ls-theme' ),
			__( 'Clarity', 'ls-theme' ),
			__( 'Trust', 'ls-theme' ),
		),
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:columns {"align":"wide","verticalAlignment":"top","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|80"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-top">

		<!-- wp:column {"verticalAlignment":"top","width":"45%","className":"ls-sticky-intro","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
		<div class="wp-block-column is-vertically-aligned-top ls-sticky-intro" style="flex-basis:45%">

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

				<!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<h2 class="wp-block-heading has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Remote-first since 2014', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"className":"ls-outline-year","style":{"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|extrabold","letterSpacing":"var:custom|typography|letter-spacing|tighter","lineHeight":"0.9"}},"fontSize":"1000"} -->
			<p class="ls-outline-year has-1000-font-size" style="font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--extrabold);letter-spacing:var(--wp--custom--typography--letter-spacing--tighter);line-height:0.9"><?php echo esc_html__( '2014', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'LightSpeed has worked remotely since 2014. That is not a temporary arrangement or a hiring perk dressed up as culture. It is part of how the company was built to operate: flexible enough for different time zones and work patterns, but structured enough to keep delivery clear and accountable.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"top","width":"55%"} -->
		<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:55%">
			<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px">
				<?php foreach ( $ls_sticky_rows as $ls_sticky_row ) : ?>

				<!-- wp:group {"style":{"border":{"bottom":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
				<div class="wp-block-group" style="border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
					<!-- wp:paragraph {"className":"ls-row-number","style":{"typography":{"fontFamily":"var:preset|font-family|monospace","fontWeight":"var:custom|typography|font-weight|semibold","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"var(--wp--custom--color--text--brand)"},"layout":{"selfStretch":"fixed","flexSize":"3.5rem"}},"fontSize":"100"} -->
					<p class="ls-row-number has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--wide)"><?php echo esc_html( $ls_sticky_row['number'] ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"},"layout":{"selfStretch":"fill"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"stretch"}} -->
					<div class="wp-block-group">
						<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"400"} -->
						<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html( $ls_sticky_row['title'] ); ?></h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
						<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_sticky_row['text'] ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:list {"className":"<?php echo esc_attr( $ls_sticky_row['list'] ); ?>","fontSize":"100"} -->
						<ul class="wp-block-list <?php echo esc_attr( $ls_sticky_row['list'] ); ?> has-100-font-size">
							<?php foreach ( $ls_sticky_row['labels'] as $ls_sticky_label ) : ?>
							<!-- wp:list-item -->
							<li><?php echo esc_html( $ls_sticky_label ); ?></li>
							<!-- /wp:list-item -->
							<?php endforeach; ?>
						</ul>
						<!-- /wp:list -->
					</div>
					<!-- /wp:group -->
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
