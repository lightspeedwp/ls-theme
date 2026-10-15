<?php
/**
 * Title: Section - Split Text Pair
 * Slug: ls-theme/split-text-pair
 * Categories: featured
 * Block Types: core/pattern
 * Description: A two-column text section on a surface.card band: each column is an H2 and a supporting paragraph, with equal widths and the columns stacking on mobile. Authored for the Contact page's "What to include" and "What happens next" pair; it suits any two short statements that deserve equal weight (for example a preparation note beside a process note). Falls back to core/columns because no semantic core block fits a paired heading and paragraph. Adapts between light and dark mode through surface and text tokens. Edit both headings and paragraphs after inserting.
 * Keywords: split, pair, columns, text, note, security, process, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_text_pair = array(
	array(
		'heading' => __( 'What to include', 'ls-theme' ),
		'text'    => __( 'Share the current website URL, your main goal, the type of project, any deadlines, and whether you need discovery, design, development, hosting, support, AI readiness or a platform review.', 'ls-theme' ),
	),
	array(
		'heading' => __( 'What happens next', 'ls-theme' ),
		'text'    => __( 'We review the enquiry, identify the likely project route, and recommend the next practical step. That may be a discovery call, AI readiness checklist, technical audit, proposal discussion or support handover.', 'ls-theme' ),
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"color":{"background":"var:custom|color|surface|card"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-background" style="background-color:var(--wp--custom--color--surface--card);margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:columns {"align":"wide","verticalAlignment":"top","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|60","left":"var:preset|spacing|90"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-top">
		<?php foreach ( $ls_text_pair as $ls_text_item ) : ?>

		<!-- wp:column {"verticalAlignment":"top","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-column is-vertically-aligned-top">

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"500"} -->
			<h2 class="wp-block-heading has-500-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html( $ls_text_item['heading'] ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_text_item['text'] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
