<?php
/**
 * Title: Hero - Services
 * Slug: ls-theme/services-hero
 * Categories: hero
 * Block Types: core/pattern
 * Description: The Services page hero: breadcrumb trail, eyebrow badge, heading, description, primary/secondary CTAs, a wrapped row of links to all 14 services, and a decorative "services / lifecycle" preview card. Adapts between light and dark mode using existing semantic tokens.
 * Keywords: services, hero, lifecycle, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_services_hero_tags = array(
	array(
		'label' => __( 'Discovery', 'ls-theme' ),
		'url'   => '/services/discovery/',
		'phase' => 'discover',
		'icon'  => 'search',
	),
	array(
		'label' => __( 'Content', 'ls-theme' ),
		'url'   => '/services/content/',
		'phase' => 'create',
		'icon'  => 'file-text',
	),
	array(
		'label' => __( 'Design', 'ls-theme' ),
		'url'   => '/services/design/',
		'phase' => 'create',
		'icon'  => 'paint-brush',
	),
	array(
		'label' => __( 'Development', 'ls-theme' ),
		'url'   => '/services/development/',
		'phase' => 'build',
		'icon'  => 'code',
	),
	array(
		'label' => __( 'Migrations', 'ls-theme' ),
		'url'   => '/services/migrations/',
		'phase' => 'build',
		'icon'  => 'arrows-left-right',
	),
	array(
		'label' => __( 'Hosting', 'ls-theme' ),
		'url'   => '/services/hosting/',
		'phase' => 'launch',
		'icon'  => 'cloud',
	),
	array(
		'label' => __( 'Performance', 'ls-theme' ),
		'url'   => '/services/performance/',
		'phase' => 'launch',
		'icon'  => 'gauge',
	),
	array(
		'label' => __( 'Security', 'ls-theme' ),
		'url'   => '/services/security/',
		'phase' => 'launch',
		'icon'  => 'shield',
	),
	array(
		'label' => __( 'Training', 'ls-theme' ),
		'url'   => '/services/training/',
		'phase' => 'launch',
		'icon'  => 'graduation-cap',
	),
	array(
		'label' => __( 'Support', 'ls-theme' ),
		'url'   => '/services/support/',
		'phase' => 'grow',
		'icon'  => 'lifebuoy',
	),
	array(
		'label' => __( 'SEO', 'ls-theme' ),
		'url'   => '/services/seo/',
		'phase' => 'grow',
		'icon'  => 'chart-line-up',
	),
	array(
		'label' => __( 'Accessibility', 'ls-theme' ),
		'url'   => '/services/accessibility/',
		'phase' => 'grow',
		'icon'  => 'wheelchair',
	),
	array(
		'label' => __( 'Email marketing', 'ls-theme' ),
		'url'   => '/services/email-marketing/',
		'phase' => 'grow',
		'icon'  => 'envelope',
	),
	array(
		'label' => __( 'AI', 'ls-theme' ),
		'url'   => '/services/ai/',
		'phase' => 'evolve',
		'icon'  => 'special-interests',
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-services-hero","style":{"border":{"bottom":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|30","bottom":"var:preset|spacing|80","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-services-hero" style="border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;margin-top:0;padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
		<!-- wp:yoast-seo/breadcrumbs {"className":"alignwide"} /-->
		<?php endif; ?>

		<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
		<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30)">
			<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Services', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:columns {"align":"wide","verticalAlignment":"top","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"},"blockGap":{"left":"var:preset|spacing|60"}}}} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-top" style="margin-top:var(--wp--preset--spacing--20)">

			<!-- wp:column {"verticalAlignment":"top","width":"68%"} -->
			<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:68%">

				<!-- wp:heading {"level":1,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"}},"fontSize":"900"} -->
				<h1 class="wp-block-heading has-900-font-size" style="font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Services built for the full WordPress lifecycle.', 'ls-theme' ); ?></h1>
				<!-- /wp:heading -->

				<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
					<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'From discovery and content structure to engineering, launch and long-term support, LightSpeed services are designed to work together rather than collide later.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)">
					<!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>"><?php echo esc_html__( 'Request a systems review', 'ls-theme' ); ?></a></div>
					<!-- /wp:button -->

					<!-- wp:button {"className":"is-style-outline"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/solutions/' ) ); ?>"><?php echo esc_html__( 'Explore solutions', 'ls-theme' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->

				<!-- wp:group {"className":"ls-services-hero__tags","style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"margin":{"top":"var:preset|spacing|40"},"padding":{"top":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
				<div class="wp-block-group ls-services-hero__tags" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;margin-top:var(--wp--preset--spacing--40);padding-top:var(--wp--preset--spacing--20)">
					<?php
					foreach ( $ls_services_hero_tags as $ls_tag ) :
						$ls_phase_color = 'var(--wp--custom--color--phase--' . $ls_tag['phase'] . ')';
						$ls_pill_class  = 'ls-service-pill ls-service-pill--' . $ls_tag['phase'];
						$ls_pill_border = 'color-mix(in srgb, ' . $ls_phase_color . ' 35%, var(--wp--custom--color--border--card))';
						$ls_pill_bg     = 'color-mix(in srgb, ' . $ls_phase_color . ' 8%, transparent)';
						?>
					<!-- wp:group {"className":"<?php echo esc_attr( $ls_pill_class ); ?>","style":{"border":{"color":"<?php echo esc_attr( $ls_pill_border ); ?>","radius":"var:preset|border-radius|500","style":"solid","width":"1px"},"color":{"background":"<?php echo esc_attr( $ls_pill_bg ); ?>"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|20","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
					<div class="wp-block-group <?php echo esc_attr( $ls_pill_class ); ?> has-background" style="border-color:<?php echo esc_attr( $ls_pill_border ); ?>;border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--500);background-color:<?php echo esc_attr( $ls_pill_bg ); ?>;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">
						<!-- wp:icon {"icon":"lightspeed/<?php echo esc_attr( $ls_tag['icon'] ); ?>","className":"has-text-color","style":{"color":{"text":"<?php echo esc_attr( $ls_phase_color ); ?>"},"dimensions":{"width":"13px"}}} /-->

						<!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--default)"}},"fontSize":"100"} -->
						<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--default);font-weight:var(--wp--custom--typography--font-weight--semibold)"><a href="<?php echo esc_url( home_url( $ls_tag['url'] ) ); ?>" style="color:inherit;text-decoration:none"><?php echo esc_html( $ls_tag['label'] ); ?></a></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
					<?php endforeach; ?>
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"top","width":"32%"} -->
			<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:32%">
				<!-- wp:group {"className":"is-style-glass-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<div class="wp-block-group is-style-glass-card" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">

					<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"200"} -->
					<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Services / Lifecycle', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
					<div class="wp-block-group">
						<!-- wp:group {"style":{"color":{"background":"var(--wp--custom--color--effect--hero--brand)"},"border":{"radius":"var:preset|border-radius|300"},"dimensions":{"minHeight":"36px"},"layout":{"selfStretch":"fixed","flexSize":"48px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
						<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--300);background-color:var(--wp--custom--color--effect--hero--brand);min-height:36px"></div>
						<!-- /wp:group -->

						<!-- wp:group {"style":{"color":{"background":"var(--wp--custom--color--card--solutions--accent)"},"border":{"radius":"var:preset|border-radius|300"},"dimensions":{"minHeight":"36px"},"layout":{"selfStretch":"fixed","flexSize":"48px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
						<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--300);background-color:var(--wp--custom--color--card--solutions--accent);min-height:36px"></div>
						<!-- /wp:group -->

						<!-- wp:group {"style":{"color":{"background":"var(--wp--custom--color--effect--hero--cyan)"},"border":{"radius":"var:preset|border-radius|300"},"dimensions":{"minHeight":"36px"},"layout":{"selfStretch":"fixed","flexSize":"48px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
						<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--300);background-color:var(--wp--custom--color--effect--hero--cyan);min-height:36px"></div>
						<!-- /wp:group -->

						<!-- wp:group {"style":{"color":{"background":"var(--wp--custom--color--card--solutions--accent)"},"border":{"radius":"var:preset|border-radius|300"},"dimensions":{"minHeight":"36px"},"layout":{"selfStretch":"fixed","flexSize":"48px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
						<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--300);background-color:var(--wp--custom--color--card--solutions--accent);min-height:36px"></div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"dashed","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|10"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
					<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:dashed;border-top-width:1px;padding-top:var(--wp--preset--spacing--10)">
						<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace"},"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
						<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted);font-family:var(--wp--preset--font-family--monospace)"><span style="color:var(--wp--custom--color--text--brand)"><?php echo esc_html__( 'services', 'ls-theme' ); ?></span> <?php echo esc_html__( '14 / 14', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace"},"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
						<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted);font-family:var(--wp--preset--font-family--monospace)"><span style="color:var(--wp--custom--color--text--brand)"><?php echo esc_html__( 'tokens', 'ls-theme' ); ?></span> <?php echo esc_html__( 'live', 'ls-theme' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
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
