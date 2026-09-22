<?php
/**
 * Title: Section - Phase Common Services
 * Slug: ls-theme/phase-common-services
 * Categories: featured
 * Block Types: core/pattern
 * Description: Shared "What happens during [Phase]" section for all six lifecycle phase pages —
 * currently authored with Discover's own copy and its eight most-common-service pills; the
 * heading, intro paragraph, pill list and footnote text still need to be pulled out per-page
 * before this is reused on the other five pages. Centered eyebrow/heading/intro, a wrapped pill
 * list (each pill a phase-coloured dot + label, reusing the same bordered-chip treatment as the
 * site's other tag pills) and a bordered footnote panel. Adapts between the site's light and dark
 * style variations via text tokens; the phase accent falls back from a phase's "-on-dark" token to
 * its normal token, matching phase-journey-nav.php's convention.
 * Keywords: phase, discover, create, build, launch, grow, evolve, services, pills, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_common_services = array(
	__( 'Business and audience discovery', 'ls-theme' ),
	__( 'Technical audit of the current platform', 'ls-theme' ),
	__( 'Competitor and market review where relevant', 'ls-theme' ),
	__( 'Analytics and customer review', 'ls-theme' ),
	__( 'Migration and integration planning', 'ls-theme' ),
	__( 'Content structure and collection planning', 'ls-theme' ),
	__( 'UX and conversion-friction review', 'ls-theme' ),
	__( 'Early AI-readiness assessment', 'ls-theme' ),
);

$ls_phase_accent = 'var(--wp--custom--color--phase--discover-on-dark, var(--wp--custom--color--phase--discover))';
?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|60","bottom":"var:preset|spacing|90","left":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--60)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"900px","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold","lineHeight":"var:custom|line-height|heading-snug"}},"fontSize":"700"} -->
		<h2 class="wp-block-heading has-text-align-center has-700-font-size" style="font-weight:var(--wp--custom--typography--font-weight--extrabold);line-height:var(--wp--custom--line-height--heading-snug)"><?php echo esc_html__( 'What happens during Discover', 'ls-theme' ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"constrained","contentSize":"620px","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--30)">
		<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
		<p class="has-text-align-center has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'We run structured workshops, stakeholder interviews, and technical reviews to understand how your website needs to perform for the business, your users, and your internal teams.', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"constrained","contentSize":"900px","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--30)">
		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold","lineHeight":"var:custom|line-height|heading-snug"},"color":{"text":"<?php echo esc_attr( $ls_phase_accent ); ?>"}},"fontSize":"100"} -->
		<p class="has-text-align-center has-text-color has-100-font-size" style="color:<?php echo esc_attr( $ls_phase_accent ); ?>;font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase;line-height:var(--wp--custom--line-height--heading-snug)"><?php echo esc_html__( 'Most common services', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"constrained","contentSize":"1050px","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--30)">
		<!-- wp:group {"className":"ls-phase-common-services__pills","style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
		<div class="wp-block-group ls-phase-common-services__pills">
			<?php foreach ( $ls_common_services as $ls_service_label ) : ?>
			<!-- wp:group {"style":{"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|500","style":"solid","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|20","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group has-border-color" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--500);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"<?php echo esc_attr( $ls_phase_accent ); ?>"},"dimensions":{"width":"6px"}}} /-->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--default)"}},"fontSize":"200"} -->
				<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--default)"><?php echo esc_html( $ls_service_label ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"constrained","contentSize":"900px","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--30)">
		<!-- wp:group {"style":{"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|400","style":"solid","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|30","bottom":"var:preset|spacing|20","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained","justifyContent":"center"}} -->
		<div class="wp-block-group has-border-color" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--400);padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--30)">
			<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
			<p class="has-text-align-center has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'The output is not a vague strategy deck. It is a working foundation for design, development, launch, growth, and future evolution.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
