<?php
/**
 * Title: Section - Split Statement Words
 * Slug: ls-theme/split-statement-words
 * Categories: text
 * Block Types: core/pattern
 * Description: A two-column statement section on a surface.card band: three oversized one-word lines on the left, each with a hairline divider and its first letter in its own accent colour, and a dot eyebrow H2 with a supporting paragraph on the right. The first-letter colours use the ::first-letter pseudo-element in src/scss/structural/about-culture.scss because theme.json has no key for it. Authored for the About Culture page "Our Culture" section; edit the words, eyebrow and paragraph after inserting. Falls back to core/columns and core/paragraph because no semantic core block fits a stacked-word statement. Adapts between light and dark mode through surface, text, border and accent tokens. The columns stack on mobile.
 * Keywords: statement, values, words, culture, about, split, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_statement_words = array(
	array(
		'text'     => __( 'Curiosity.', 'ls-theme' ),
		'modifier' => 'brand',
	),
	array(
		'text'     => __( 'Independence.', 'ls-theme' ),
		'modifier' => 'warm',
	),
	array(
		'text'     => __( 'Collaboration.', 'ls-theme' ),
		'modifier' => 'grow',
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"color":{"background":"var:custom|color|surface|card"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-background" style="background-color:var(--wp--custom--color--surface--card);margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:columns {"align":"wide","verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|90"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center","width":"58%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:58%">
			<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px">
				<?php foreach ( $ls_statement_words as $ls_statement_word ) : ?>

				<!-- wp:paragraph {"className":"ls-statement-word ls-statement-word--<?php echo esc_attr( $ls_statement_word['modifier'] ); ?>","style":{"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|extrabold","letterSpacing":"var:custom|typography|letter-spacing|tight","lineHeight":"var:custom|line-height|heading-tight"},"border":{"bottom":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|5","bottom":"var:preset|spacing|5"}}},"fontSize":"900"} -->
				<p class="ls-statement-word ls-statement-word--<?php echo esc_attr( $ls_statement_word['modifier'] ); ?> has-900-font-size" style="border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--extrabold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight);line-height:var(--wp--custom--line-height--heading-tight)"><?php echo esc_html( $ls_statement_word['text'] ); ?></p>
				<!-- /wp:paragraph -->
				<?php endforeach; ?>
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"42%","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:42%">

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

				<!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<h2 class="wp-block-heading has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Our Culture', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'At LightSpeed, we believe that the best systems are built by teams who are empowered to work where and how they work best. Since 2014, we have been a proudly remote-first agency. Our culture is not defined by an office, but by a shared commitment to open-source innovation, sustainable work practices, and the continuous exploration of new technologies.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
