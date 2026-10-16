<?php
/**
 * Title: Hero - Centered Gradient Title
 * Slug: ls-theme/hero-centered-gradient-title
 * Categories: hero
 * Block Types: core/pattern
 * Description: A full-bleed, permanently dark, centred page hero: an independently-aligned breadcrumb, a compact pill (dot and uppercase label), a centred H1 whose last words take a gradient built from the six lifecycle phase colours, and an intro paragraph. Authored for the About "Our Process" page, with the page title as the pill label and the design's heading ("A six-stage lifecycle. Built for clarity.", the second line carrying the gradient) and intro paragraph. It reuses Hero - Phase's wrapper class (ls-phase-hero) for the grid texture, radial glow and dark base, and the same on-dark breadcrumb treatment, so there is no second copy of that background. Unlike Hero - Phase it has no phase number, buttons or share pill, and its accent is not tied to a phase page: the pill, dot and glow use text.brand-on-dark, which is cyan in the dark style variation and blue in the light one. The gradient text (background-clip) and the accent override live in src/scss/structural/hero-gradient-title.scss. Falls back to core/group because no semantic core block fits a custom hero layout.
 * Keywords: hero, centered, gradient, title, process, lifecycle, phases, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-phase-hero ls-hero-gradient-title","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|30","bottom":"var:preset|spacing|80","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-phase-hero ls-hero-gradient-title" style="margin-top:0;padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--30)">

	<?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
	<!-- wp:group {"align":"wide","className":"ls-breadcrumbs-on-dark","style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"},"typography":{"fontFamily":"var:preset|font-family|monospace"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide ls-breadcrumbs-on-dark has-text-color" style="color:var(--wp--custom--color--text--on-dark-muted);font-family:var(--wp--preset--font-family--monospace)">
		<!-- wp:yoast-seo/breadcrumbs /-->
	</div>
	<!-- /wp:group -->
	<?php endif; ?>

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"var:preset|spacing|60"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--60)">

		<!-- wp:group {"style":{"border":{"color":"var(--ls-phase-accent-on-dark)","radius":"var:preset|border-radius|500","style":"solid","width":"1px"},"color":{"background":"color-mix(in srgb, var(--ls-phase-accent-on-dark) 12%, transparent)"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|20","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
		<div class="wp-block-group has-border-color has-background" style="border-color:var(--ls-phase-accent-on-dark);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--ls-phase-accent-on-dark) 12%, transparent);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">
			<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--ls-phase-accent-on-dark)"},"dimensions":{"width":"6px"}}} /-->

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--ls-phase-accent-on-dark)"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--ls-phase-accent-on-dark);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Our Process', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"layout":{"type":"constrained","contentSize":"880px","justifyContent":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold","lineHeight":"var:custom|line-height|heading-tight","letterSpacing":"var:custom|typography|letter-spacing|tight"},"color":{"text":"var(--wp--custom--color--text--on-dark)"}},"fontSize":"900"} -->
			<h1 class="wp-block-heading has-text-align-center has-text-color has-900-font-size" style="color:var(--wp--custom--color--text--on-dark);font-weight:var(--wp--custom--typography--font-weight--extrabold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight);line-height:var(--wp--custom--line-height--heading-tight)"><?php echo esc_html__( 'A six-stage lifecycle.', 'ls-theme' ); ?><br><span class="ls-hero-gradient-title__accent"><?php echo esc_html__( 'Built for clarity.', 'ls-theme' ); ?></span></h1>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"layout":{"type":"constrained","contentSize":"760px","justifyContent":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"300"} -->
			<p class="has-text-align-center has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--on-dark-muted)"><?php echo esc_html__( 'LightSpeed uses a six-stage lifecycle to keep website work organised and commercially useful. The stages are Discover, Create, Build, Launch, Grow and Evolve — each with clear inputs, outputs and a route into the next.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
