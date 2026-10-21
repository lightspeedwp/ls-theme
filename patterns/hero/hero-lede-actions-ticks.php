<?php
/**
 * Title: Hero - Lede Actions Ticks
 * Slug: ls-theme/hero-lede-actions-ticks
 * Categories: hero
 * Block Types: core/pattern
 * Description: A left-aligned page hero for culture and working-practice pages: breadcrumb trail, dot eyebrow, a large H1 with one brand-coloured word, a lede paragraph with primary and outline buttons beside it, and a "rhythm" strip of three labelled rows of tick marks (daily, weekly, quarterly). The tick marks are empty groups drawn with CSS gradients in src/scss/structural/about-culture.scss, so they read as decoration while the row labels stay as real text. Uses the shared corner-glow class for the background. Authored for the About Culture page; edit the eyebrow, heading, lede, buttons and row labels after inserting. Falls back to core/group because no semantic core block fits a tick-mark strip. Adapts between light and dark mode through text, border and brand tokens.
 * Keywords: hero, culture, rhythm, ticks, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_rhythm_rows = array(
	array(
		'label' => __( 'Daily', 'ls-theme' ),
		'ticks' => 'daily',
		'end'   => __( 'Check-ins', 'ls-theme' ),
	),
	array(
		'label' => __( 'Weekly', 'ls-theme' ),
		'ticks' => 'weekly',
		'end'   => __( 'Goals', 'ls-theme' ),
	),
	array(
		'label' => __( 'Quarterly', 'ls-theme' ),
		'ticks' => 'quarterly',
		'end'   => __( 'Retreats', 'ls-theme' ),
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-corner-glow","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|30","bottom":"var:preset|spacing|80","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-corner-glow" style="margin-top:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<?php if ( WP_Block_Type_Registry::get_instance()->is_registered( 'yoast-seo/breadcrumbs' ) ) : ?>
		<!-- wp:yoast-seo/breadcrumbs {"className":"alignwide"} /-->
		<?php endif; ?>

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'About – Culture', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:heading {"level":1,"className":"ls-rhythm-hero__title","style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"900"} -->
		<h1 class="wp-block-heading ls-rhythm-hero__title has-900-font-size" style="font-weight:var(--wp--custom--typography--font-weight--extrabold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html__( 'How we work at', 'ls-theme' ); ?> <span style="color:var(--wp--custom--color--text--brand)"><?php echo esc_html__( 'LightSpeed', 'ls-theme' ); ?></span></h1>
		<!-- /wp:heading -->

		<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
		<div class="wp-block-group alignwide">

			<!-- wp:group {"layout":{"type":"constrained","contentSize":"600px","justifyContent":"left"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Our culture is shaped by remote work, accountability, curiosity, and the belief that better systems come from thoughtful people working in clear ways.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/about/careers/' ) ); ?>"><?php echo esc_html__( 'View Open Roles', 'ls-theme' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/about/team/' ) ); ?>"><?php echo esc_html__( 'Meet the Team', 'ls-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"align":"wide","className":"ls-rhythm-ticks","style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group alignwide ls-rhythm-ticks" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px">
			<?php foreach ( $ls_rhythm_rows as $ls_rhythm_row ) : ?>

			<!-- wp:group {"className":"ls-rhythm-ticks__row","style":{"border":{"bottom":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group ls-rhythm-ticks__row" style="border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">
				<!-- wp:paragraph {"className":"ls-rhythm-ticks__label","style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"var(--wp--custom--color--text--subtle)"},"layout":{"selfStretch":"fixed","flexSize":"7rem"}},"fontSize":"100"} -->
				<p class="ls-rhythm-ticks__label has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);letter-spacing:var(--wp--custom--typography--letter-spacing--wide);text-transform:uppercase"><?php echo esc_html( $ls_rhythm_row['label'] ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"className":"ls-rhythm-ticks__marks ls-rhythm-ticks__marks--<?php echo esc_attr( $ls_rhythm_row['ticks'] ); ?>","style":{"layout":{"selfStretch":"fill"}},"layout":{"type":"default"}} -->
				<div class="wp-block-group ls-rhythm-ticks__marks ls-rhythm-ticks__marks--<?php echo esc_attr( $ls_rhythm_row['ticks'] ); ?>"></div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"className":"ls-rhythm-ticks__label ls-rhythm-ticks__label--end","style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"var(--wp--custom--color--text--subtle)"},"layout":{"selfStretch":"fixed","flexSize":"6rem"}},"fontSize":"100"} -->
				<p class="ls-rhythm-ticks__label ls-rhythm-ticks__label--end has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);letter-spacing:var(--wp--custom--typography--letter-spacing--wide);text-transform:uppercase"><?php echo esc_html( $ls_rhythm_row['end'] ); ?></p>
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
