<?php
/**
 * Title: Section - FAQ
 * Slug: ls-theme/section-faq
 * Categories: faq
 * Block Types: core/pattern
 * Description: Reusable FAQ section using Yoast's FAQ block. Duplicate per page and edit questions/answers as needed.
 * Keywords: faq, questions, accordion, yoast
 * Viewport Width: 1240
 * Inserter: true
 */

?>
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<div class="wp-block-group alignwide">
	<!-- wp:heading {"level":2,"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'Frequently Asked Questions', 'ls-theme' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:yoast/faq-block {"questions":[{"id":"faq-question-1","question":"What is your typical project timeline?","answer":"Most projects take between four and eight weeks, depending on scope. We will confirm a schedule during discovery.","images":[]},{"id":"faq-question-2","question":"Do you offer ongoing support after launch?","answer":"Yes, we offer maintenance and support plans so your site stays secure and up to date after launch.","images":[]},{"id":"faq-question-3","question":"Can you work with our existing brand guidelines?","answer":"Absolutely. We build within your existing brand guidelines, or help establish new ones if needed.","images":[]}]} -->
	<div class="schema-faq wp-block-yoast-faq-block">
		<div class="schema-faq-section" id="faq-question-1">
			<strong class="schema-faq-question">What is your typical project timeline?</strong>
			<p class="schema-faq-answer">Most projects take between four and eight weeks, depending on scope. We will confirm a schedule during discovery.</p>
		</div>
		<div class="schema-faq-section" id="faq-question-2">
			<strong class="schema-faq-question">Do you offer ongoing support after launch?</strong>
			<p class="schema-faq-answer">Yes, we offer maintenance and support plans so your site stays secure and up to date after launch.</p>
		</div>
		<div class="schema-faq-section" id="faq-question-3">
			<strong class="schema-faq-question">Can you work with our existing brand guidelines?</strong>
			<p class="schema-faq-answer">Absolutely. We build within your existing brand guidelines, or help establish new ones if needed.</p>
		</div>
	</div>
	<!-- /wp:yoast/faq-block -->
</div>
<!-- /wp:group -->
