<?php
/**
 * Title: Section - Split Intro Staggered Icon Cards
 * Slug: ls-theme/split-intro-staggered-icon-cards
 * Categories: featured
 * Block Types: core/pattern
 * Description: A "growth and learning" section on the page canvas: a dot eyebrow, H2 and two intro paragraphs above a row of three icon cards of rising height, all sitting on the same bottom edge like steps. Each card is a surface.card card with a brand Icon block well pinned to the top, an H3 and a paragraph pinned to the bottom. The staircase comes from core/columns with bottom vertical alignment and a different minimum height on each card, so it needs no custom layout code; the columns stack on mobile and src/scss/structural/about-careers.scss only drops the minimum heights there, because they are inline styles. Falls back to core/columns and core/group because no semantic core block fits a staggered card. Adapts between light and dark mode through surface, text, border and brand tokens. Authored for the About Careers page "Growth and Upskilling" section; edit the copy and icons after inserting.
 * Keywords: cards, icons, staggered, staircase, growth, careers, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_stair_cards = array(
	array(
		'icon'        => 'users-three',
		'title'       => __( 'AI Study Groups & Hackathons', 'ls-theme' ),
		'description' => __( 'Dedicated time to experiment with new AI capabilities, APIs, and prompt engineering.', 'ls-theme' ),
		'height'      => '260px',
	),
	array(
		'icon'        => 'graduation-cap',
		'title'       => __( 'Mentorship', 'ls-theme' ),
		'description' => __( 'We actively support junior developers through structured internships and senior mentorship.', 'ls-theme' ),
		'height'      => '340px',
	),
	array(
		'icon'        => 'book',
		'title'       => __( 'Continuous Learning Allowances', 'ls-theme' ),
		'description' => __( 'We provide resources to help you master GitHub, Copilot, and modern block theme practices.', 'ls-theme' ),
		'height'      => '420px',
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"color":{"background":"var:custom|color|surface|canvas"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-background" style="background-color:var(--wp--custom--color--surface--canvas);margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
		<div class="wp-block-group">

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Growth', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"600"} -->
			<h2 class="wp-block-heading has-600-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Riding the AI Wave: Growth & Upskilling', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'We believe that continuous growth is the key to innovation. We actively drive developer upskilling through internships, senior hires, and AI-powered workflows. Our culture ensures that our team evolves alongside the current of technology.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'When you join LightSpeed, you will be supported by cultural initiatives designed for professional development, including:', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:columns {"verticalAlignment":"bottom","className":"ls-stairs","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
		<div class="wp-block-columns are-vertically-aligned-bottom ls-stairs">
			<?php foreach ( $ls_stair_cards as $ls_stair_card ) : ?>

			<!-- wp:column {"verticalAlignment":"bottom"} -->
			<div class="wp-block-column is-vertically-aligned-bottom">
				<!-- wp:group {"tagName":"article","className":"ls-stairs__card","style":{"dimensions":{"minHeight":"<?php echo esc_attr( $ls_stair_card['height'] ); ?>"},"color":{"background":"var:custom|color|surface|card"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|300","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between","flexWrap":"nowrap"}} -->
				<article class="wp-block-group ls-stairs__card has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--300);background-color:var(--wp--custom--color--surface--card);min-height:<?php echo esc_attr( $ls_stair_card['height'] ); ?>;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
					<!-- wp:group {"className":"ls-icon-well-brand ls-stairs__icon"} -->
					<div class="wp-block-group ls-icon-well-brand ls-stairs__icon">
						<!-- wp:icon {"icon":"lightspeed/<?php echo esc_attr( $ls_stair_card['icon'] ); ?>","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"20px"}}} /-->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"default"}} -->
					<div class="wp-block-group">
						<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"300"} -->
						<h3 class="wp-block-heading has-300-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html( $ls_stair_card['title'] ); ?></h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
						<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_stair_card['description'] ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</article>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
