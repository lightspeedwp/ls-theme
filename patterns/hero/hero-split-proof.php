<?php
/**
 * Title: Hero - Split Proof
 * Slug: ls-theme/hero-split-proof
 * Categories: hero
 * Block Types: core/pattern
 * Description: A split hero for company-story pages: breadcrumb trail, dot eyebrow, H1 with one brand-coloured word, lede paragraph and primary/outline CTAs on the left (about 58%), and a bordered "proof" card on the right (about 42%) listing three rows of a large figure, a label and a line of supporting copy, each figure in its own accent colour. Authored for the About page; edit the figures and copy after inserting. Same structure and glow as Hero - Split At a Glance; falls back to core/columns and core/group because no semantic core block fits a hero with a stat card. Adapts between light and dark mode through text, surface, border and phase tokens. No new SCSS.
 * Keywords: hero, split, proof, about, company, stats, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_proof_rows = array(
	array(
		'figure'      => __( '23', 'ls-theme' ),
		'label'       => __( 'Years in business', 'ls-theme' ),
		'description' => __( 'Founded in 2003 and adapting with the web ever since.', 'ls-theme' ),
		'colour'      => 'var(--wp--custom--color--text--brand)',
	),
	array(
		'figure'      => __( '2014', 'ls-theme' ),
		'label'       => __( 'Remote-first since', 'ls-theme' ),
		'description' => __( 'A distributed team with clear handoffs and accountable delivery.', 'ls-theme' ),
		'colour'      => 'var(--wp--custom--color--phase--launch)',
	),
	array(
		'figure'      => __( '2007', 'ls-theme' ),
		'label'       => __( 'WordPress specialists since', 'ls-theme' ),
		'description' => __( 'The platform the company chose to grow around.', 'ls-theme' ),
		'colour'      => 'var(--wp--custom--color--phase--evolve)',
	),
);

$ls_proof_row_count = count( $ls_proof_rows );
?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-corner-glow","style":{"border":{"bottom":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|30","bottom":"var:preset|spacing|80","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-corner-glow" style="border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;margin-top:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
		<!-- wp:yoast-seo/breadcrumbs {"className":"alignwide"} /-->
		<?php endif; ?>

		<!-- wp:columns {"align":"wide","verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-center">

			<!-- wp:column {"verticalAlignment":"center","width":"58%","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:58%">

				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'About LightSpeed', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":1,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"700"} -->
				<h1 class="wp-block-heading has-700-font-size" style="font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'A WordPress Partner Built to', 'ls-theme' ); ?> <span style="color:var(--wp--custom--color--text--brand)"><?php echo esc_html__( 'Evolve', 'ls-theme' ); ?></span></h1>
				<!-- /wp:heading -->

				<!-- wp:group {"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
					<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Founded in 2003, LightSpeed helps organisations design, build, launch and evolve better WordPress platforms through structured thinking, open-source discipline, modern Figma workflows and careful AI-assisted delivery.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>"><?php echo esc_html__( 'Book a consultation', 'ls-theme' ); ?></a></div>
					<!-- /wp:button -->

					<!-- wp:button {"className":"is-style-outline"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/about/process/' ) ); ?>"><?php echo esc_html__( 'Explore our process', 'ls-theme' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","width":"42%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:42%">
				<!-- wp:group {"tagName":"aside","style":{"color":{"background":"var:custom|color|surface|card"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|400","style":"solid","width":"1px"},"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|30","bottom":"var:preset|spacing|10","left":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
				<aside class="wp-block-group has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--400);background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--30)">
					<?php
					foreach ( $ls_proof_rows as $ls_proof_index => $ls_proof_row ) :
						$ls_proof_is_last = ( $ls_proof_index === $ls_proof_row_count - 1 );
						?>

						<?php if ( $ls_proof_is_last ) : ?>
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
					<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
						<?php else : ?>
					<!-- wp:group {"style":{"border":{"bottom":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
					<div class="wp-block-group" style="border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
						<?php endif; ?>
						<!-- wp:group {"style":{"spacing":{"blockGap":"0"},"layout":{"selfStretch":"fixed","flexSize":"30%"}}} -->
						<div class="wp-block-group">
							<!-- wp:paragraph {"style":{"color":{"text":"<?php echo esc_attr( $ls_proof_row['colour'] ); ?>"},"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|bold","lineHeight":"var:custom|line-height|heading-tight"}},"fontSize":"500"} -->
							<p class="has-text-color has-500-font-size" style="color:<?php echo esc_attr( $ls_proof_row['colour'] ); ?>;font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--bold);line-height:var(--wp--custom--line-height--heading-tight)"><?php echo esc_html( $ls_proof_row['figure'] ); ?></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->

						<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"},"layout":{"selfStretch":"fill"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
						<div class="wp-block-group">
							<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wide","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"100"} -->
							<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--wide);text-transform:uppercase"><?php echo esc_html( $ls_proof_row['label'] ); ?></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
							<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_proof_row['description'] ); ?></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->
					<?php endforeach; ?>
				</aside>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
