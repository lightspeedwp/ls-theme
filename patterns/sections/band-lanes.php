<?php
/**
 * Title: Section - Band Lanes
 * Slug: ls-theme/band-lanes
 * Categories: text
 * Block Types: core/pattern
 * Description: A surface.card band that follows light and dark mode through surface, text and border tokens: a dot eyebrow, H2 and lede paragraph, then three ruled "lanes" side by side, each a mono kicker label, a large H3 and a paragraph, divided by hairlines, then a closing row with an H3 on the left and a paragraph, an arrow link to the AI workflow article and a "More time for" row of pill labels on the right. The lane dividers are column borders; src/scss/structural/about-culture.scss only switches them from side dividers to stacked dividers on mobile and styles the pill labels (ls-chips). Authored for the About Culture page "The AI-Empowered Remote Workflow" section; edit the copy and labels after inserting. Falls back to core/columns and core/group because no semantic core block fits a lane.
 * Keywords: band, lanes, columns, workflow, ai, culture, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_lanes = array(
	array(
		'label' => __( 'Daily & Weekly', 'ls-theme' ),
		'title' => __( 'Rhythms', 'ls-theme' ),
		'text'  => __( 'We use AI productivity tools to streamline our daily check-ins and weekly goals, automatically summarising meetings, tracking tasks, and surfacing critical insights so our team can focus on deep work.', 'ls-theme' ),
	),
	array(
		'label' => __( 'Cross-Functional', 'ls-theme' ),
		'title' => __( 'Collaboration', 'ls-theme' ),
		'text'  => __( 'Our designers and developers use AI coding assistants and remote design reviews to collaborate seamlessly across time zones, eliminating the traditional silos between design and development.', 'ls-theme' ),
	),
	array(
		'label' => __( 'Asynchronous', 'ls-theme' ),
		'title' => __( 'Support', 'ls-theme' ),
		'text'  => __( 'Internal AI chatbots help route information and answer questions asynchronously, allowing team members to work independently without being blocked by timezone differences.', 'ls-theme' ),
	),
);

$ls_lane_labels = array(
	__( 'Architecture', 'ls-theme' ),
	__( 'Accessibility', 'ls-theme' ),
	__( 'Design judgement', 'ls-theme' ),
	__( 'Mentoring', 'ls-theme' ),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"color":{"background":"var:custom|color|surface|card"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-background" style="background-color:var(--wp--custom--color--surface--card);margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
		<div class="wp-block-group">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'The AI-Empowered Remote Workflow', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"},"color":{"text":"var(--wp--custom--color--text--default)"}},"fontSize":"700"} -->
			<h2 class="wp-block-heading has-text-color has-700-font-size" style="color:var(--wp--custom--color--text--default);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html__( 'Remote work and AI are multipliers', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Remote work and AI are not just trends for us; they are multipliers. Our asynchronous, globally distributed workflows are heavily supported by the very AI systems we build for our clients.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:columns {"align":"wide","className":"ls-lanes","style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
		<div class="wp-block-columns alignwide ls-lanes" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px">
			<?php foreach ( $ls_lanes as $ls_lane_index => $ls_lane ) : ?>

			<!-- wp:column {"className":"ls-lanes__lane","style":{<?php echo 0 === $ls_lane_index ? '' : '"border":{"left":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},'; ?>"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"<?php echo 0 === $ls_lane_index ? '0' : 'var:preset|spacing|40'; ?>"}}}} -->
			<div class="wp-block-column ls-lanes__lane" style="<?php echo 0 === $ls_lane_index ? '' : 'border-left-color:var(--wp--custom--color--border--card);border-left-style:solid;border-left-width:1px;'; ?>padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:<?php echo 0 === $ls_lane_index ? '0' : 'var(--wp--preset--spacing--40)'; ?>">
				<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--monospace);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html( $ls_lane['label'] ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold","letterSpacing":"var:custom|typography|letter-spacing|tight"},"color":{"text":"var(--wp--custom--color--text--default)"}},"fontSize":"600"} -->
				<h3 class="wp-block-heading has-text-color has-600-font-size" style="color:var(--wp--custom--color--text--default);font-weight:var(--wp--custom--typography--font-weight--extrabold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html( $ls_lane['title'] ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
				<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_lane['text'] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:columns -->

		<!-- wp:columns {"align":"wide","style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"blockGap":{"left":"var:preset|spacing|60"},"padding":{"top":"var:preset|spacing|50"}}}} -->
		<div class="wp-block-columns alignwide" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--50)">

			<!-- wp:column {"width":"40%"} -->
			<div class="wp-block-column" style="flex-basis:40%">
				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"},"color":{"text":"var(--wp--custom--color--text--default)"}},"fontSize":"500"} -->
				<h3 class="wp-block-heading has-text-color has-500-font-size" style="color:var(--wp--custom--color--text--default);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html__( 'How AI changed the way we work', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"60%","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
			<div class="wp-block-column" style="flex-basis:60%">
				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'AI has changed the pace and shape of day-to-day work, but not the standard we hold it to. We use AI to help summarise research, draft documentation, support code reviews, generate starting points, and reduce repetitive task-switching. That means more time can go into architecture, accessibility, design judgement, mentoring and the parts of the job that still need human experience. LightSpeed’s own 2025 workflow article makes that shift public and concrete.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"is-style-link-arrow-accent","style":{"elements":{"link":{"color":{"text":"var:custom|color|link|accent"}}}},"fontSize":"200"} -->
				<p class="is-style-link-arrow-accent has-link-color has-200-font-size"><a href="<?php echo esc_url( home_url( '/ai-workflow/' ) ); ?>"><?php echo esc_html__( 'Read “A Deep Dive into LightSpeed’s AI Workflow”', 'ls-theme' ); ?></a></p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest"},"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted);font-family:var(--wp--preset--font-family--monospace);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'More time for', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:list {"className":"ls-chips","fontSize":"100"} -->
					<ul class="wp-block-list ls-chips has-100-font-size">
						<?php foreach ( $ls_lane_labels as $ls_lane_label ) : ?>
						<!-- wp:list-item -->
						<li><?php echo esc_html( $ls_lane_label ); ?></li>
						<!-- /wp:list-item -->
						<?php endforeach; ?>
					</ul>
					<!-- /wp:list -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
