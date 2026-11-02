<?php
/**
 * Title: Section - Split FAQ
 * Slug: ls-theme/split-faq
 * Categories: faq
 * Block Types: core/pattern
 * Description: A "common questions" section for the 14 individual service pages — currently
 * authored with Discovery's five questions; edit the eyebrow, heading, description and the
 * questions and answers per page after inserting. Eyebrow, heading and description on the left
 * (45%), and on the right (55%) the Yoast FAQ block — the same block and accordion (JS-driven
 * expand/collapse, FAQPage schema) every other FAQ pattern in the theme uses (section-faq.php,
 * phase-faq.php), so it keeps working schema and keyboard behaviour. The accordion styling is the
 * Phase FAQ component (ls-phase-faq, src/scss/structural/phase-faq.scss) with the ls-service-faq
 * modifier for this layout: the section sits on a surface.card band, the rows fill with the page
 * canvas, and the open-state accent follows the service's parent phase via the
 * `ls-service-phase-{phase}` body class (inc/service-phase-map.php). Plain wp:columns, so it
 * stacks automatically on mobile. Adapts between the site's light and dark style variations via
 * surface/text/border tokens. Questions and answers live in the block's `questions` attribute and
 * the saved markup, which the Yoast block keeps in sync when edited in the editor. The attribute JSON
 * is encoded the way WordPress core serialises block attributes (angle brackets, ampersands and every
 * double hyphen escaped), so a translated question or answer can never close the block comment early.
 * Keywords: service, faq, questions, accordion, yoast, phase, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_service_faqs = array(
	array(
		'question' => __( 'How long does discovery take?', 'ls-theme' ),
		'answer'   => __( 'Most engagements run four to eight weeks, depending on platform size and stakeholder availability.', 'ls-theme' ),
	),
	array(
		'question' => __( 'Do you work with existing agencies or teams?', 'ls-theme' ),
		'answer'   => __( 'Yes. We collaborate with your in-house or partner teams to gather insights and align goals.', 'ls-theme' ),
	),
	array(
		'question' => __( 'What if we already have requirements?', 'ls-theme' ),
		'answer'   => __( 'We validate and refine them, uncovering gaps and dependencies that may have been missed.', 'ls-theme' ),
	),
	array(
		'question' => __( 'Can discovery include SEO research?', 'ls-theme' ),
		'answer'   => __( 'Yes. Keyword analysis, content gap identification and technical SEO auditing can be part of the deliverables.', 'ls-theme' ),
	),
	array(
		'question' => __( 'Is discovery mandatory?', 'ls-theme' ),
		'answer'   => __( 'We strongly recommend it for complex projects because it de-risks later phases and improves budget accuracy.', 'ls-theme' ),
	),
);

$ls_faq_block_questions = array();
foreach ( $ls_service_faqs as $ls_faq_index => $ls_faq ) {
	$ls_faq_block_questions[] = array(
		'id'       => 'faq-question-' . ( $ls_faq_index + 1 ),
		'question' => $ls_faq['question'],
		'answer'   => $ls_faq['answer'],
		'images'   => array(),
	);
}
?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band ls-phase-faq ls-service-faq","style":{"color":{"background":"var:custom|color|surface|card"},"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"},"bottom":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band ls-phase-faq ls-service-faq has-background" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;background-color:var(--wp--custom--color--surface--card)">

	<!-- wp:columns {"verticalAlignment":"top","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|70"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-top">

		<!-- wp:column {"verticalAlignment":"top","width":"45%"} -->
		<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:45%">
			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--ls-phase-accent)"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--ls-phase-accent);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Frequently asked', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","lineHeight":"var:custom|line-height|heading-snug","letterSpacing":"var:custom|typography|letter-spacing|tight"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"600"} -->
			<h2 class="wp-block-heading has-600-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight);line-height:var(--wp--custom--line-height--heading-snug)"><?php echo esc_html__( 'Common questions about discovery', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}},"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="margin-top:var(--wp--preset--spacing--20);color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'More questions? Send us a note and we’ll reply within a working day.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"top","width":"55%"} -->
		<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:55%">
			<!-- wp:yoast/faq-block {"questions":<?php echo str_replace( '--', '\u002d\u002d', wp_json_encode( $ls_faq_block_questions, JSON_HEX_TAG | JSON_HEX_AMP ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON for a block comment, escaped like core's serialize_block_attributes(); HTML escaping would corrupt it. ?>} -->
			<div class="schema-faq wp-block-yoast-faq-block">
				<?php foreach ( $ls_service_faqs as $ls_faq_index => $ls_faq ) : ?>
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
