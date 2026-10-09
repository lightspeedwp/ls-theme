<?php
/**
 * Title: Section - Solutions Split FAQ
 * Slug: ls-theme/solutions-split-faq
 * Categories: faq
 * Block Types: core/pattern
 * Description: A "common questions" section for the Solutions pages on the page canvas: dot eyebrow, H2 and a short paragraph on the left (about 40%), and on the right (about 60%) the Yoast FAQ block, the same block and accordion (JS-driven expand/collapse, FAQPage schema) every other FAQ pattern in the theme uses. Same shape as Section - Split FAQ but it uses brand colours instead of the service phase accent: the open-state accent and circular plus/minus control read text.brand through src/scss/structural/solutions-split-faq.scss, layered on the shared Phase FAQ component. Plain wp:columns, so it stacks on mobile. Adapts between light and dark through surface, text and border tokens. Questions and answers live in the block's `questions` attribute and the saved markup, which the Yoast block keeps in sync when edited in the editor. The answers other than the first are placeholders; replace them from the content doc. The attribute JSON is encoded the way WordPress core serialises block attributes (angle brackets, ampersands and every double hyphen escaped), so a translated question or answer can never close the block comment early.
 * Keywords: solutions, faq, questions, accordion, yoast, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_solutions_faqs = array(
	array(
		'question' => __( 'What is a design system?', 'ls-theme' ),
		'answer'   => __( 'A design system is a collection of reusable tokens, components and patterns that codify your brand’s visual language, interactions and accessibility rules. It provides a single source of truth for designers, developers and editors.', 'ls-theme' ),
	),
	array(
		'question' => __( 'How is this different from a style guide?', 'ls-theme' ),
		'answer'   => __( 'Add the answer to this question from the content doc.', 'ls-theme' ),
	),
	array(
		'question' => __( 'Do I need a design system if I only have one site?', 'ls-theme' ),
		'answer'   => __( 'Add the answer to this question from the content doc.', 'ls-theme' ),
	),
	array(
		'question' => __( 'How does this improve AI search visibility?', 'ls-theme' ),
		'answer'   => __( 'Add the answer to this question from the content doc.', 'ls-theme' ),
	),
	array(
		'question' => __( 'What happens after launch?', 'ls-theme' ),
		'answer'   => __( 'Add the answer to this question from the content doc.', 'ls-theme' ),
	),
);

$ls_faq_block_questions = array();
foreach ( $ls_solutions_faqs as $ls_faq_index => $ls_faq ) {
	$ls_faq_block_questions[] = array(
		'id'       => 'faq-question-' . ( $ls_faq_index + 1 ),
		'question' => $ls_faq['question'],
		'answer'   => $ls_faq['answer'],
		'images'   => array(),
	);
}
?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-phase-faq ls-solutions-faq","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-phase-faq ls-solutions-faq" style="margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:columns {"align":"wide","verticalAlignment":"top","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|90"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-top">

		<!-- wp:column {"verticalAlignment":"top","width":"40%","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:40%">

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Frequently asked', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"600"} -->
			<h2 class="wp-block-heading has-600-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Common questions about design systems.', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Straight answers on tokens, governance and what happens after launch.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"top","width":"60%"} -->
		<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:60%">
			<!-- wp:yoast/faq-block {"questions":<?php echo str_replace( '--', '\u002d\u002d', wp_json_encode( $ls_faq_block_questions, JSON_HEX_TAG | JSON_HEX_AMP ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON for a block comment, escaped like core's serialize_block_attributes(); HTML escaping would corrupt it. ?>} -->
			<div class="schema-faq wp-block-yoast-faq-block">
				<?php foreach ( $ls_solutions_faqs as $ls_faq_index => $ls_faq ) : ?>
				<div class="schema-faq-section" id="faq-question-<?php echo esc_attr( $ls_faq_index + 1 ); ?>">
					<strong class="schema-faq-question"><?php echo esc_html( $ls_faq['question'] ); ?></strong>
					<p class="schema-faq-answer"><?php echo esc_html( $ls_faq['answer'] ); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
			<!-- /wp:yoast/faq-block -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
