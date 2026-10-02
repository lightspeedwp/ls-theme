<?php
/**
 * Title: Hero - Service
 * Slug: ls-theme/service-hero
 * Categories: hero
 * Block Types: core/pattern
 * Description: Shared hero for the 14 individual service pages (Discovery, Content, Design,
 * Development, Migrations, Hosting, Performance, Security, Training, Support, SEO, Accessibility,
 * Email marketing, AI) — currently authored with Discovery's own copy; edit the pill, heading,
 * description, buttons and glance rows per page after inserting. Left-aligned two-column layout:
 * breadcrumb, a "Phase 0X · Name" pill, heading, description and the shared phase CTA buttons on
 * the left, and an "At a glance" card of label/value rows on the right (add or remove rows freely).
 * Full-bleed and permanently dark — it reuses the Hero - Phase wrapper class (ls-phase-hero) for the
 * grid texture and radial glow, so no new SCSS. Every accent reads var(--ls-phase-accent-on-dark),
 * which the `ls-service-phase-{phase}` body class (inc/service-phase-map.php) points at the
 * service's parent phase, so the same pattern recolours itself on each service page (Build services
 * pink, Launch yellow, etc.). The "At a glance" label is a paragraph, not a heading, so it doesn't
 * add a stray h2 ahead of the page's real sections.
 * Keywords: service, hero, phase, discovery, glance, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_glance_rows = array(
	array(
		'label' => __( 'Best for', 'ls-theme' ),
		'value' => __( 'New websites, redesigns, migrations and complex integrations', 'ls-theme' ),
	),
	array(
		'label' => __( 'Duration', 'ls-theme' ),
		'value' => __( 'Typically 4–8 weeks, shorter for smaller sites', 'ls-theme' ),
	),
	array(
		'label' => __( 'Engagement', 'ls-theme' ),
		'value' => __( 'Workshops · audits · research · scoping', 'ls-theme' ),
	),
);

$ls_glance_border = 'color-mix(in srgb, var(--wp--custom--color--text--on-dark) 16%, transparent)';

?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-phase-hero","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|30","bottom":"var:preset|spacing|80","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-phase-hero" style="margin-top:0;padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--30)">

	<?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
	<!-- wp:group {"align":"wide","className":"ls-breadcrumbs-on-dark","style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"},"typography":{"fontFamily":"var:preset|font-family|monospace"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide ls-breadcrumbs-on-dark has-text-color" style="color:var(--wp--custom--color--text--on-dark-muted);font-family:var(--wp--preset--font-family--monospace)">
		<!-- wp:yoast-seo/breadcrumbs /-->
	</div>
	<!-- /wp:group -->
	<?php endif; ?>

	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"},"blockGap":{"left":"var:preset|spacing|70"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center" style="margin-top:var(--wp--preset--spacing--60)">

		<!-- wp:column {"verticalAlignment":"center","width":"62%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:62%">

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
			<div class="wp-block-group">
				<!-- wp:group {"style":{"border":{"color":"var(--ls-phase-accent-on-dark)","radius":"var:preset|border-radius|500","style":"solid","width":"1px"},"color":{"background":"color-mix(in srgb, var(--ls-phase-accent-on-dark) 12%, transparent)"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|20","bottom":"var:preset|spacing|5","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
				<div class="wp-block-group has-border-color has-background" style="border-color:var(--ls-phase-accent-on-dark);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--ls-phase-accent-on-dark) 12%, transparent);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--ls-phase-accent-on-dark)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--ls-phase-accent-on-dark);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Phase 01 · Discover', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":1,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold","lineHeight":"var:custom|line-height|heading-snug","letterSpacing":"var:custom|typography|letter-spacing|tight"},"color":{"text":"var(--wp--custom--color--text--on-dark)"},"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"fontSize":"800"} -->
			<h1 class="wp-block-heading has-text-color has-800-font-size" style="color:var(--wp--custom--color--text--on-dark);margin-top:var(--wp--preset--spacing--30);font-weight:var(--wp--custom--typography--font-weight--extrabold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight);line-height:var(--wp--custom--line-height--heading-snug)"><?php echo esc_html__( 'Clarify the roadmap before you build', 'ls-theme' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
			<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--40)">
				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--on-dark-muted)"><?php echo esc_html__( 'Discovery turns stakeholder goals, content realities and technical constraints into a practical plan for design, development and migration, with a shared understanding, a realistic budget and a phased roadmap.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","justifyContent":"left"}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)">
				<!-- wp:button {"className":"is-style-button-phase-primary"} -->
				<div class="wp-block-button is-style-button-phase-primary"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>"><?php echo esc_html__( 'Book a free consultation', 'ls-theme' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-button-phase-outline"} -->
				<div class="wp-block-button is-style-button-phase-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/work/?service=discovery' ) ); ?>"><?php echo esc_html__( 'See discovery in practice', 'ls-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"38%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:38%">
			<!-- wp:group {"tagName":"aside","style":{"border":{"color":"<?php echo esc_attr( $ls_glance_border ); ?>","radius":"var:preset|border-radius|300","style":"solid","width":"1px"},"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--on-dark) 4%, transparent)"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|40","bottom":"var:preset|spacing|10","left":"var:preset|spacing|40"}}},"layout":{"type":"default"}} -->
			<aside class="wp-block-group has-border-color has-background" style="border-color:<?php echo esc_attr( $ls_glance_border ); ?>;border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--300);background-color:color-mix(in srgb, var(--wp--custom--color--text--on-dark) 4%, transparent);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--40)">

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|extrabold"},"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|5"}}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--on-dark-muted);padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--5);font-weight:var(--wp--custom--typography--font-weight--extrabold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'At a glance', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<?php foreach ( $ls_glance_rows as $ls_glance_row ) : ?>
				<!-- wp:columns {"style":{"border":{"top":{"color":"<?php echo esc_attr( $ls_glance_border ); ?>","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"},"blockGap":{"left":"var:preset|spacing|20"}}}} -->
				<div class="wp-block-columns" style="border-top-color:<?php echo esc_attr( $ls_glance_border ); ?>;border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">
					<!-- wp:column {"width":"30%"} -->
					<div class="wp-block-column" style="flex-basis:30%">
						<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"100"} -->
						<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--on-dark-muted);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html( $ls_glance_row['label'] ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"width":"70%"} -->
					<div class="wp-block-column" style="flex-basis:70%">
						<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"}},"fontSize":"200"} -->
						<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark)"><?php echo esc_html( $ls_glance_row['value'] ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->
				<?php endforeach; ?>

				<!-- wp:columns {"style":{"border":{"top":{"color":"<?php echo esc_attr( $ls_glance_border ); ?>","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"},"blockGap":{"left":"var:preset|spacing|20"}}}} -->
				<div class="wp-block-columns" style="border-top-color:<?php echo esc_attr( $ls_glance_border ); ?>;border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">
					<!-- wp:column {"width":"30%"} -->
					<div class="wp-block-column" style="flex-basis:30%">
						<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"100"} -->
						<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--on-dark-muted);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Pairs with', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"width":"70%"} -->
					<div class="wp-block-column" style="flex-basis:70%">
						<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"}},"fontSize":"200"} -->
						<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark)"><a href="<?php echo esc_url( home_url( '/services/content/' ) ); ?>" style="color:var(--ls-phase-accent-on-dark)"><?php echo esc_html__( 'Content', 'ls-theme' ); ?></a>, <a href="<?php echo esc_url( home_url( '/services/development/' ) ); ?>" style="color:var(--ls-phase-accent-on-dark)"><?php echo esc_html__( 'Development', 'ls-theme' ); ?></a>, <a href="<?php echo esc_url( home_url( '/solutions/wordpress/' ) ); ?>" style="color:var(--ls-phase-accent-on-dark)"><?php echo esc_html__( 'WordPress solution', 'ls-theme' ); ?></a></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->
			</aside>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
