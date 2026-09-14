<?php
/**
 * Title: Section - Services Linked Decisions
 * Slug: ls-theme/services-linked-decisions
 * Categories: featured
 * Block Types: core/pattern
 * Description: The Services page's "Linked decisions, not disconnected tasks" section: an eyebrow/heading pair on the left and, on the right, supporting copy plus a six-step process pill row (Discover → Create → Build → Launch → Grow → Evolve, matching the site's lifecycle-phase colours) that wraps naturally on narrower viewports.
 * Keywords: services, process, steps, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_linked_decisions_steps = array(
	array(
		'index' => '01',
		'label' => __( 'Discover', 'ls-theme' ),
		'phase' => 'discover',
		'url'   => '/services/discover/',
	),
	array(
		'index' => '02',
		'label' => __( 'Create', 'ls-theme' ),
		'phase' => 'create',
		'url'   => '/services/create/',
	),
	array(
		'index' => '03',
		'label' => __( 'Build', 'ls-theme' ),
		'phase' => 'build',
		'url'   => '/services/build/',
	),
	array(
		'index' => '04',
		'label' => __( 'Launch', 'ls-theme' ),
		'phase' => 'launch',
		'url'   => '/services/launch/',
	),
	array(
		'index' => '05',
		'label' => __( 'Grow', 'ls-theme' ),
		'phase' => 'grow',
		'url'   => '/services/grow/',
	),
	array(
		'index' => '06',
		'label' => __( 'Evolve', 'ls-theme' ),
		'phase' => 'evolve',
		'url'   => '/services/evolve/',
	),
);

$ls_step_arrow_icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg>';
?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|60","bottom":"var:preset|spacing|100","left":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--60)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:columns {"align":"wide","verticalAlignment":"top","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-top">

			<!-- wp:column {"verticalAlignment":"top","width":"40%"} -->
			<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:40%">

				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"8px","style":{"color":{"text":"var(--wp--custom--color--text--brand)"}}} -->
					<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--text--brand);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
					<!-- /wp:outermost/icon-block -->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'How the service model works', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"600"} -->
				<h2 class="wp-block-heading has-600-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Linked decisions, not disconnected tasks.', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"top","width":"60%"} -->
			<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:60%">

				<!-- wp:group {"layout":{"type":"constrained","contentSize":"600px","justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
					<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'The strongest platforms are not built through disconnected tasks. They are shaped through linked decisions across scope, design, content, implementation, launch readiness and post-launch care.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30)">
					<?php
					foreach ( $ls_linked_decisions_steps as $ls_step_index => $ls_step ) :
						$ls_step_phase_color = 'var(--wp--custom--color--phase--' . $ls_step['phase'] . ')';
						$ls_badge_bg         = 'color-mix(in srgb, ' . $ls_step_phase_color . ' 10%, transparent)';
						$ls_badge_border     = 'color-mix(in srgb, ' . $ls_step_phase_color . ' 30%, transparent)';
						$ls_pill_class       = 'ls-process-pill ls-process-pill--' . $ls_step['phase'];
						?>

					<!-- wp:group {"className":"<?php echo esc_attr( $ls_pill_class ); ?>","style":{"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|500","style":"solid","width":"1px"},"color":{"background":"var:custom|color|surface|canvas"},"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|30","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
					<div class="wp-block-group <?php echo esc_attr( $ls_pill_class ); ?> has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--500);background-color:var(--wp--custom--color--surface--canvas);padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
						<!-- wp:paragraph {"className":"ls-process-pill__badge","style":{"typography":{"fontFamily":"var:preset|font-family|monospace","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"background":"<?php echo esc_attr( $ls_badge_bg ); ?>","text":"<?php echo esc_attr( $ls_step_phase_color ); ?>"},"border":{"color":"<?php echo esc_attr( $ls_badge_border ); ?>","radius":"var:preset|border-radius|200","style":"solid","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|10","bottom":"var:preset|spacing|5","left":"var:preset|spacing|10"}}},"fontSize":"100"} -->
						<p class="has-text-color has-background has-100-font-size ls-process-pill__badge" style="border-color:<?php echo esc_attr( $ls_badge_border ); ?>;border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--200);color:<?php echo esc_attr( $ls_step_phase_color ); ?>;background-color:<?php echo esc_attr( $ls_badge_bg ); ?>;padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--10);font-family:var(--wp--preset--font-family--monospace);letter-spacing:var(--wp--custom--typography--letter-spacing--wide)"><?php echo esc_html( $ls_step['index'] ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"className":"ls-process-pill__label","style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--default)"}},"fontSize":"200"} -->
						<p class="has-text-color has-200-font-size ls-process-pill__label" style="color:var(--wp--custom--color--text--default);font-weight:var(--wp--custom--typography--font-weight--semibold)"><a href="<?php echo esc_url( home_url( $ls_step['url'] ) ); ?>" style="color:inherit;text-decoration:none"><?php echo esc_html( $ls_step['label'] ); ?></a></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

						<?php if ( $ls_step_index < count( $ls_linked_decisions_steps ) - 1 ) : ?>
					<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"14px","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"}}} -->
					<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--text--subtle);width:14px;transform:rotate(0deg) scaleX(1) scaleY(1)"><?php echo $ls_step_arrow_icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static, developer-authored Phosphor icon markup, not user input. ?></div></div>
					<!-- /wp:outermost/icon-block -->
					<?php endif; ?>

					<?php endforeach; ?>
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
