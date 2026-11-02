<?php
/**
 * Title: Section - Accent Card Grid
 * Slug: ls-theme/accent-card-grid
 * Categories: featured
 * Block Types: core/pattern
 * Description: A values section on the page canvas: a dot eyebrow, H2 and lede paragraph above a responsive two-column grid of cards (they wrap to one column on small screens), each a surface.card card with a thick top border in its own accent colour, a large H3 word, a small mono label in the same accent colour, and a paragraph. The cards lift slightly on hover (a transform and shadow in src/scss/structural/about-culture.scss, with a reduced-motion fallback). The grid is a core/group with the grid layout and a minimum column width, so duplicate or delete a card freely. Authored for the About Culture page "Core values" section. Falls back to core/group because no semantic core block fits a card. Adapts between light and dark mode through surface, text, border and accent tokens.
 * Keywords: values, cards, accent, grid, culture, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

// The orange accent is the accent.warm semantic token (warm-700 in light mode, warm-300 in dark).
$ls_accent_warm = 'var(--wp--custom--color--accent--warm)';

$ls_accent_cards = array(
	array(
		'word'   => __( 'Curiosity', 'ls-theme' ),
		'label'  => __( '& Continuous Learning', 'ls-theme' ),
		'text'   => __( 'The tech landscape evolves rapidly. We actively encourage our team to experiment with new AI tools, block theme developments, and performance engineering practices.', 'ls-theme' ),
		'colour' => 'var(--wp--custom--color--text--brand)',
	),
	array(
		'word'   => __( 'Independence', 'ls-theme' ),
		'label'  => __( '& Self-Motivation', 'ls-theme' ),
		'text'   => __( 'We trust our team to manage their own time and choose the workspaces that suit them best, whether that’s a home office or a co-working space.', 'ls-theme' ),
		'colour' => $ls_accent_warm,
	),
	array(
		'word'   => __( 'Collaboration', 'ls-theme' ),
		'label'  => __( '& Open Source', 'ls-theme' ),
		'text'   => __( 'We believe in sharing our knowledge. Our team regularly contributes to WordPress Core, releases open-source plugins, and shares our design systems publicly on GitHub.', 'ls-theme' ),
		'colour' => 'var(--wp--custom--color--phase--grow)',
	),
	array(
		'word'   => __( 'Adaptability', 'ls-theme' ),
		'label'  => __( '& AI Stewardship', 'ls-theme' ),
		'text'   => __( 'As we integrate AI into our workflows, we are committed to using it responsibly, ensuring human oversight and maintaining strict data privacy standards.', 'ls-theme' ),
		'colour' => 'var(--wp--custom--color--phase--evolve)',
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
		<div class="wp-block-group">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Core Values', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"700"} -->
			<h2 class="wp-block-heading has-700-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html__( 'Core Values That Drive Us', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Our hiring and our daily operations are guided by a core set of values:', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","minimumColumnWidth":"30rem"}} -->
		<div class="wp-block-group alignwide">
			<?php foreach ( $ls_accent_cards as $ls_accent_card ) : ?>

			<!-- wp:group {"className":"is-style-card-plain ls-accent-card","style":{"color":{"background":"var:custom|color|surface|card"},"border":{"top":{"color":"<?php echo esc_attr( $ls_accent_card['colour'] ); ?>","style":"solid","width":"4px"}},"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"default"}} -->
			<div class="wp-block-group is-style-card-plain ls-accent-card has-background" style="border-top-color:<?php echo esc_attr( $ls_accent_card['colour'] ); ?>;border-top-style:solid;border-top-width:4px;background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"default"}} -->
				<div class="wp-block-group">
				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold","letterSpacing":"var:custom|typography|letter-spacing|tight","lineHeight":"var:custom|line-height|heading-tight"}},"fontSize":"700"} -->
				<h3 class="wp-block-heading has-700-font-size" style="font-weight:var(--wp--custom--typography--font-weight--extrabold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight);line-height:var(--wp--custom--line-height--heading-tight)"><?php echo esc_html( $ls_accent_card['word'] ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","fontWeight":"var:custom|typography|font-weight|semibold","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest"},"color":{"text":"<?php echo esc_attr( $ls_accent_card['colour'] ); ?>"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:<?php echo esc_attr( $ls_accent_card['colour'] ); ?>;font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html( $ls_accent_card['label'] ); ?></p>
				<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
				<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_accent_card['text'] ); ?></p>
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
