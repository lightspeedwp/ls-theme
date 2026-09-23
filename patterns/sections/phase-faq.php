<?php
/**
 * Title: Section - Phase FAQ
 * Slug: ls-theme/phase-faq
 * Categories: featured
 * Block Types: core/pattern
 * Description: Shared "Frequently asked questions" section for all six lifecycle phase pages —
 * currently authored with Discover's own five questions; the heading, intro and Q&A pairs still
 * need to be pulled out per-page before this is reused on the other five pages. Reuses the
 * existing Yoast FAQ block and its schema-faq accordion component as-is (same JS-driven
 * expand/collapse, rotating +/x icon and open-state border used by section-faq.php) rather than
 * building a new accordion. Centered heading/intro above the accordion, matching the other phase
 * sections' heading conventions.
 * Keywords: phase, discover, create, build, launch, grow, evolve, faq, questions, accordion, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_phase_faqs = array(
	array(
		'question' => __( 'What exactly happens during the Discover stage?', 'ls-theme' ),
		'answer'   => __( 'Discover brings together research, audits, technical review and strategic clarification before design or development begins. We work with your team to understand the platform, the business pressure and the real shape of the opportunity.', 'ls-theme' ),
	),
	array(
		'question' => __( 'How long does the Discover phase typically take?', 'ls-theme' ),
		'answer'   => __( 'Most engagements run between four and eight weeks. The scope depends on the size of the existing platform, the number of stakeholders and how much migration or integration analysis is needed.', 'ls-theme' ),
	),
	array(
		'question' => __( 'Is this only for large projects?', 'ls-theme' ),
		'answer'   => __( 'No. Discover is useful any time the route forward is unclear or the current platform carries enough complexity that guessing would create risk later.', 'ls-theme' ),
	),
	array(
		'question' => __( 'How is AI used in this stage?', 'ls-theme' ),
		'answer'   => __( "AI helps us audit content, find structural patterns and surface issues faster. Human review, judgement and accountability remain central \xe2\x80\x94 AI accelerates the work, it doesn't replace the thinking.", 'ls-theme' ),
	),
	array(
		'question' => __( 'What are the main deliverables?', 'ls-theme' ),
		'answer'   => __( 'A clearer brief, a stronger sense of delivery scope, earlier visibility on risk and complexity, and a realistic basis for moving into Create or Build.', 'ls-theme' ),
	),
);

$ls_faq_block_questions = array();
foreach ( $ls_phase_faqs as $ls_faq_index => $ls_faq ) {
	$ls_faq_block_questions[] = array(
		'id'       => 'faq-question-' . ( $ls_faq_index + 1 ),
		'question' => $ls_faq['question'],
		'answer'   => $ls_faq['answer'],
		'images'   => array(),
	);
}
?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band ls-phase-faq","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|60","bottom":"var:preset|spacing|90","left":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band ls-phase-faq" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--60)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"620px","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"700"} -->
		<h2 class="wp-block-heading has-text-align-center has-700-font-size" style="font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Frequently asked questions', 'ls-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|10"}},"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
		<p class="has-text-align-center has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted);margin-top:var(--wp--preset--spacing--10)"><?php echo esc_html__( 'Find answers to common questions about working with us.', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"880px","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--50)">
		<!-- wp:yoast/faq-block {"questions":<?php echo wp_json_encode( $ls_faq_block_questions ); ?>} -->
		<div class="schema-faq wp-block-yoast-faq-block">
			<?php foreach ( $ls_phase_faqs as $ls_faq_index => $ls_faq ) : ?>
			<div class="schema-faq-section" id="faq-question-<?php echo esc_attr( $ls_faq_index + 1 ); ?>">
				<strong class="schema-faq-question"><?php echo esc_html( $ls_faq['question'] ); ?></strong>
				<p class="schema-faq-answer"><?php echo esc_html( $ls_faq['answer'] ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
		<!-- /wp:yoast/faq-block -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
