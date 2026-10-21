<?php
/**
 * Title: Section - Split Statement Cards
 * Slug: ls-theme/split-statement-cards
 * Categories: text
 * Block Types: core/pattern
 * Description: A statement section on a surface.card band: a dot eyebrow above two large cards side by side (they stack on mobile). Each card has a mono kicker label (an H3) at the top and a large statement at the bottom. The first card is a plain surface.canvas card; the second uses the surface.brand-strong token with inverse text, so it is solid brand blue in light mode and cyan in dark mode, with text that passes WCAG 2.2 AA against it. The cards share a minimum height so the statements sit on one line. Authored for the About Culture page "Why that matters" section; edit the label and statement of each card after inserting. Falls back to core/group because no semantic core block fits a statement card. Adapts between light and dark mode through surface, text and border tokens.
 * Keywords: statement, cards, why, benefits, culture, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_statement_cards = array(
	array(
		'label'     => __( 'For clients', 'ls-theme' ),
		'statement' => __( 'Calmer delivery, clearer communication and fewer surprises.', 'ls-theme' ),
		'strong'    => false,
	),
	array(
		'label'     => __( 'For future teammates', 'ls-theme' ),
		'statement' => __( 'Meaningful autonomy, room to learn, and a team that takes both the work and the craft seriously.', 'ls-theme' ),
		'strong'    => true,
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"color":{"background":"var:custom|color|surface|card"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-background" style="background-color:var(--wp--custom--color--surface--card);margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

			<!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
			<h2 class="wp-block-heading has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Why that matters', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","minimumColumnWidth":"30rem"}} -->
		<div class="wp-block-group alignwide">
			<?php foreach ( $ls_statement_cards as $ls_statement_card ) : ?>
				<?php
				$ls_card_bg         = $ls_statement_card['strong'] ? 'surface|brand-strong' : 'surface|canvas';
				$ls_card_bg_css     = $ls_statement_card['strong'] ? 'var(--wp--custom--color--surface--brand-strong)' : 'var(--wp--custom--color--surface--canvas)';
				$ls_card_text       = $ls_statement_card['strong'] ? 'inverse' : 'default';
				$ls_card_border     = $ls_statement_card['strong'] ? 'surface|brand-strong' : 'border|card';
				$ls_card_border_css = $ls_statement_card['strong'] ? 'var(--wp--custom--color--surface--brand-strong)' : 'var(--wp--custom--color--border--card)';
				?>

			<!-- wp:group {"style":{"dimensions":{"minHeight":"20rem"},"color":{"background":"var:custom|color|<?php echo esc_attr( $ls_card_bg ); ?>","text":"var:custom|color|text|<?php echo esc_attr( $ls_card_text ); ?>"},"border":{"color":"var:custom|color|<?php echo esc_attr( $ls_card_border ); ?>","radius":"var:preset|border-radius|400","style":"solid","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
			<div class="wp-block-group has-border-color has-text-color has-background" style="border-color:<?php echo esc_attr( $ls_card_border_css ); ?>;border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--400);color:var(--wp--custom--color--text--<?php echo esc_attr( $ls_card_text ); ?>);background-color:<?php echo esc_attr( $ls_card_bg_css ); ?>;min-height:20rem;padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">
				<!-- wp:heading {"level":3,"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","fontWeight":"var:custom|typography|font-weight|normal","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest"},"color":{"text":"<?php echo $ls_statement_card['strong'] ? 'var(--wp--custom--color--text--inverse)' : 'var(--wp--custom--color--text--brand)'; ?>"}},"fontSize":"100"} -->
				<h3 class="wp-block-heading has-text-color has-100-font-size" style="color:<?php echo $ls_statement_card['strong'] ? 'var(--wp--custom--color--text--inverse)' : 'var(--wp--custom--color--text--brand)'; ?>;font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--normal);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html( $ls_statement_card['label'] ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight","lineHeight":"var:custom|line-height|heading-tight"}},"fontSize":"600"} -->
				<p class="has-600-font-size" style="font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight);line-height:var(--wp--custom--line-height--heading-tight)"><?php echo esc_html( $ls_statement_card['statement'] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
