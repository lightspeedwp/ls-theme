<?php
/**
 * Title: Section - Services Service Tiles
 * Slug: ls-theme/services-service-tiles
 * Categories: featured
 * Block Types: core/pattern
 * Description: The Services page's "Fourteen services. One delivery model." section: eyebrow/heading/intro pair and a 14-card bento grid (Discovery through AI), each card a single stretched link to its individual service page, with an icon well, index number, kicker line and description.
 * Keywords: services, bento, grid, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_service_tiles = array(
	array(
		'label'       => __( 'Discovery', 'ls-theme' ),
		'kicker'      => __( 'Strategy, research and technical clarity', 'ls-theme' ),
		'description' => __( 'Stakeholder workshops, audits, scoping and feasibility — the evidence layer that comes before design or build.', 'ls-theme' ),
		'url'         => '/services/discovery/',
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path></svg>',
	),
	array(
		'label'       => __( 'Content', 'ls-theme' ),
		'kicker'      => __( 'Structure, taxonomy, governance', 'ls-theme' ),
		'description' => __( 'Content modelling, editorial workflow and governance that holds up at scale.', 'ls-theme' ),
		'url'         => '/services/content/',
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M88,96a8,8,0,0,1,8-8h64a8,8,0,0,1,0,16H96A8,8,0,0,1,88,96Zm8,40h64a8,8,0,0,0,0-16H96a8,8,0,0,0,0,16Zm32,16H96a8,8,0,0,0,0,16h32a8,8,0,0,0,0-16ZM224,48V156.69A15.86,15.86,0,0,1,219.31,168L168,219.31A15.86,15.86,0,0,1,156.69,224H48a16,16,0,0,1-16-16V48A16,16,0,0,1,48,32H208A16,16,0,0,1,224,48ZM48,208H152V160a8,8,0,0,1,8-8h48V48H48Zm120-40v28.7L196.69,168Z"></path></svg>',
	),
	array(
		'label'       => __( 'Design', 'ls-theme' ),
		'kicker'      => __( 'Systems, patterns, accessibility', 'ls-theme' ),
		'description' => __( 'Design systems, accessible patterns and Figma→WordPress parity. Already a deeper page.', 'ls-theme' ),
		'url'         => '/services/design/',
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M232,32a8,8,0,0,0-8-8c-44.08,0-89.31,49.71-114.43,82.63A60,60,0,0,0,32,164c0,30.88-19.54,44.73-20.47,45.37A8,8,0,0,0,16,224H92a60,60,0,0,0,57.37-77.57C182.3,121.31,232,76.08,232,32ZM92,208H34.63C41.38,198.41,48,183.92,48,164a44,44,0,1,1,44,44Zm32.42-94.45q5.14-6.66,10.09-12.55A76.23,76.23,0,0,1,155,121.49q-5.9,4.94-12.55,10.09A60.54,60.54,0,0,0,124.42,113.55Zm42.7-2.68a92.57,92.57,0,0,0-22-22c31.78-34.53,55.75-45,69.9-47.91C212.17,55.12,201.65,79.09,167.12,110.87Z"></path></svg>',
	),
	array(
		'label'       => __( 'Development', 'ls-theme' ),
		'kicker'      => __( 'Maintainable WordPress engineering', 'ls-theme' ),
		'description' => __( 'Block themes, WooCommerce, integrations and platform refactors built for long-term health.', 'ls-theme' ),
		'url'         => '/services/development/',
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M69.12,94.15,28.5,128l40.62,33.85a8,8,0,1,1-10.24,12.29l-48-40a8,8,0,0,1,0-12.29l48-40a8,8,0,0,1,10.24,12.3Zm176,27.7-48-40a8,8,0,1,0-10.24,12.3L227.5,128l-40.62,33.85a8,8,0,1,0,10.24,12.29l48-40a8,8,0,0,0,0-12.29ZM162.73,32.48a8,8,0,0,0-10.25,4.79l-64,176a8,8,0,0,0,4.79,10.26A8.14,8.14,0,0,0,96,224a8,8,0,0,0,7.52-5.27l64-176A8,8,0,0,0,162.73,32.48Z"></path></svg>',
	),
	array(
		'label'       => __( 'Migrations', 'ls-theme' ),
		'kicker'      => __( 'Move platforms with control', 'ls-theme' ),
		'description' => __( 'Audits, mapping and redirects that take legacy platforms apart without losing traction.', 'ls-theme' ),
		'url'         => '/services/migrations/',
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M213.66,181.66l-32,32a8,8,0,0,1-11.32-11.32L188.69,184H48a8,8,0,0,1,0-16H188.69l-18.35-18.34a8,8,0,0,1,11.32-11.32l32,32A8,8,0,0,1,213.66,181.66Zm-139.32-64a8,8,0,0,0,11.32-11.32L67.31,88H208a8,8,0,0,0,0-16H67.31L85.66,53.66A8,8,0,0,0,74.34,42.34l-32,32a8,8,0,0,0,0,11.32Z"></path></svg>',
	),
	array(
		'label'       => __( 'Hosting', 'ls-theme' ),
		'kicker'      => __( 'Aligned environments', 'ls-theme' ),
		'description' => __( 'Managed environments that match the platform, the workflows and the support model around it.', 'ls-theme' ),
		'url'         => '/services/hosting/',
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M160,40A88.09,88.09,0,0,0,81.29,88.67,64,64,0,1,0,72,216h88a88,88,0,0,0,0-176Zm0,160H72a48,48,0,0,1,0-96c1.1,0,2.2,0,3.29.11A88,88,0,0,0,72,128a8,8,0,0,0,16,0,72,72,0,1,1,72,72Z"></path></svg>',
	),
	array(
		'label'       => __( 'Performance', 'ls-theme' ),
		'kicker'      => __( 'Speed, Vitals, stability', 'ls-theme' ),
		'description' => __( 'Core Web Vitals, caching, query review and template optimisation against real production data.', 'ls-theme' ),
		'url'         => '/services/performance/',
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M207.06,72.67A111.24,111.24,0,0,0,128,40h-.4C66.07,40.21,16,91,16,153.13V176a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V152A111.25,111.25,0,0,0,207.06,72.67ZM224,176H119.71l54.76-75.3a8,8,0,0,0-12.94-9.42L99.92,176H32V153.13c0-3.08.15-6.12.43-9.13H56a8,8,0,0,0,0-16H35.27c10.32-38.86,44-68.24,84.73-71.66V80a8,8,0,0,0,16,0V56.33A96.14,96.14,0,0,1,221,128H200a8,8,0,0,0,0,16h23.67c.21,2.65.33,5.31.33,8Z"></path></svg>',
	),
	array(
		'label'       => __( 'Security', 'ls-theme' ),
		'kicker'      => __( 'Hardening, monitoring, recovery', 'ls-theme' ),
		'description' => __( 'Audits, hardening guidance, monitoring and recovery planning that reduces risk before incidents.', 'ls-theme' ),
		'url'         => '/services/security/',
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M208,40H48A16,16,0,0,0,32,56v56c0,52.72,25.52,84.67,46.93,102.19,23.06,18.86,46,25.26,47,25.53a8,8,0,0,0,4.2,0c1-.27,23.91-6.67,47-25.53C198.48,196.67,224,164.72,224,112V56A16,16,0,0,0,208,40Zm0,72c0,37.07-13.66,67.16-40.6,89.42A129.3,129.3,0,0,1,128,223.62a128.25,128.25,0,0,1-38.92-21.81C61.82,179.51,48,149.3,48,112l0-56,160,0ZM82.34,141.66a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32l-56,56a8,8,0,0,1-11.32,0Z"></path></svg>',
	),
	array(
		'label'       => __( 'Training', 'ls-theme' ),
		'kicker'      => __( 'Confidence and adoption', 'ls-theme' ),
		'description' => __( 'Role-specific training and reference materials that move teams from dependency to confidence.', 'ls-theme' ),
		'url'         => '/services/training/',
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M251.76,88.94l-120-64a8,8,0,0,0-7.52,0l-120,64a8,8,0,0,0,0,14.12L32,117.87v48.42a15.91,15.91,0,0,0,4.06,10.65C49.16,191.53,78.51,216,128,216a130,130,0,0,0,48-8.76V240a8,8,0,0,0,16,0V199.51a115.63,115.63,0,0,0,27.94-22.57A15.91,15.91,0,0,0,224,166.29V117.87l27.76-14.81a8,8,0,0,0,0-14.12ZM128,200c-43.27,0-68.72-21.14-80-33.71V126.4l76.24,40.66a8,8,0,0,0,7.52,0L176,143.47v46.34C163.4,195.69,147.52,200,128,200Zm80-33.75a97.83,97.83,0,0,1-16,14.25V134.93l16-8.53ZM188,118.94l-.22-.13-56-29.87a8,8,0,0,0-7.52,14.12L171,128l-43,22.93L25,96,128,41.07,231,96Z"></path></svg>',
	),
	array(
		'label'       => __( 'Support', 'ls-theme' ),
		'kicker'      => __( 'Maintenance and continuity', 'ls-theme' ),
		'description' => __( 'Maintenance, incident response and quiet improvement so platforms keep getting easier to run.', 'ls-theme' ),
		'url'         => '/services/support/',
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm39.1,131.79a47.84,47.84,0,0,0,0-55.58l28.5-28.49a87.83,87.83,0,0,1,0,112.56ZM96,128a32,32,0,1,1,32,32A32,32,0,0,1,96,128Zm88.28-67.6L155.79,88.9a47.84,47.84,0,0,0-55.58,0L71.72,60.4a87.83,87.83,0,0,1,112.56,0ZM60.4,71.72l28.5,28.49a47.84,47.84,0,0,0,0,55.58L60.4,184.28a87.83,87.83,0,0,1,0-112.56ZM71.72,195.6l28.49-28.5a47.84,47.84,0,0,0,55.58,0l28.49,28.5a87.83,87.83,0,0,1-112.56,0Z"></path></svg>',
	),
	array(
		'label'       => __( 'SEO', 'ls-theme' ),
		'kicker'      => __( 'Structural, technical, content', 'ls-theme' ),
		'description' => __( 'Technical SEO, internal linking, schema and the publishing discipline that supports visibility.', 'ls-theme' ),
		'url'         => '/services/seo/',
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M232,208a8,8,0,0,1-8,8H32a8,8,0,0,1-8-8V48a8,8,0,0,1,16,0V156.69l50.34-50.35a8,8,0,0,1,11.32,0L128,132.69,180.69,80H160a8,8,0,0,1,0-16h40a8,8,0,0,1,8,8v40a8,8,0,0,1-16,0V91.31l-58.34,58.35a8,8,0,0,1-11.32,0L96,123.31l-56,56V200H224A8,8,0,0,1,232,208Z"></path></svg>',
	),
	array(
		'label'       => __( 'Accessibility', 'ls-theme' ),
		'kicker'      => __( 'Usable for more people, by design', 'ls-theme' ),
		'description' => __( 'Audits, remediation and the semantic structure that helps WCAG 2.2 AA stick over time.', 'ls-theme' ),
		'url'         => '/services/accessibility/',
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M255.59,189.47a8,8,0,0,0-10.12-5.06l-17.42,5.81-28.9-57.8A8,8,0,0,0,192,128H112V104h56a8,8,0,0,0,0-16H112V79a32,32,0,1,0-16,0V89.81A72,72,0,0,0,112,232c33.52,0,63.69-22.71,71.75-54a8,8,0,1,0-15.5-4C162.09,198,137.91,216,112,216A56,56,0,0,1,96,106.34V136a8,8,0,0,0,8,8h83.05l29.79,59.58a8,8,0,0,0,9.69,4l24-8A8,8,0,0,0,255.59,189.47ZM88,48a16,16,0,1,1,16,16A16,16,0,0,1,88,48Z"></path></svg>',
	),
	array(
		'label'       => __( 'Email marketing', 'ls-theme' ),
		'kicker'      => __( 'Subscriber journeys, aligned', 'ls-theme' ),
		'description' => __( 'Journey planning, consent flows and the connection between email and the WordPress platform behind it.', 'ls-theme' ),
		'url'         => '/services/email-marketing/',
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48ZM203.43,64,128,133.15,52.57,64ZM216,192H40V74.19l82.59,75.71a8,8,0,0,0,10.82,0L216,74.19V192Z"></path></svg>',
	),
	array(
		'label'       => __( 'AI', 'ls-theme' ),
		'kicker'      => __( 'Readiness, governance, workflow', 'ls-theme' ),
		'description' => __( 'AI-readiness reviews, governance and workflow planning — practical use without messy adoption.', 'ls-theme' ),
		'url'         => '/services/ai/',
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M197.58,129.06,146,110l-19-51.62a15.92,15.92,0,0,0-29.88,0L78,110l-51.62,19a15.92,15.92,0,0,0,0,29.88L78,178l19,51.62a15.92,15.92,0,0,0,29.88,0L146,178l51.62-19a15.92,15.92,0,0,0,0-29.88ZM137,164.22a8,8,0,0,0-4.74,4.74L112,223.85,91.78,169A8,8,0,0,0,87,164.22L32.15,144,87,123.78A8,8,0,0,0,91.78,119L112,64.15,132.22,119a8,8,0,0,0,4.74,4.74L191.85,144ZM144,40a8,8,0,0,1,8-8h16V16a8,8,0,0,1,16,0V32h16a8,8,0,0,1,0,16H184V64a8,8,0,0,1-16,0V48H152A8,8,0,0,1,144,40ZM248,88a8,8,0,0,1-8,8h-8v8a8,8,0,0,1,16,0V96h-8a8,8,0,0,1,0-16h8V72a8,8,0,0,1,16,0v8h8A8,8,0,0,1,248,88Z"></path></svg>',
	),
);

/**
 * Renders one service tile card. A local closure (not a top-level function) since this file
 * can be included more than once per request via pattern registration/re-registration.
 *
 * @param array $ls_tile  Service tile data from $ls_service_tiles.
 * @param int   $ls_index Human-facing 1-based index shown in the card corner.
 */
$ls_render_service_tile = function ( $ls_tile, $ls_index ) {
	$ls_read_link_text = sprintf(
		/* translators: %s: service name, lowercase. */
		__( 'Read about %s', 'ls-theme' ),
		strtolower( $ls_tile['label'] )
	);
	?>

	<!-- wp:group {"tagName":"article","className":"is-style-card-service-tile","style":{"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
	<article class="wp-block-group is-style-card-service-tile" style="min-height:100%">
		<!-- wp:group {"className":"ls-icon-well-brand"} -->
		<div class="wp-block-group ls-icon-well-brand">
			<!-- wp:outermost/icon-block {"iconName":"","width":"18px"} -->
			<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:18px;transform:rotate(0deg) scaleX(1) scaleY(1)"><?php echo $ls_tile['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static, developer-authored Phosphor icon markup, not user input. ?></div></div>
			<!-- /wp:outermost/icon-block -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"className":"ls-card-service-tile__index","style":{"typography":{"fontFamily":"var:preset|font-family|monospace","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"var:custom|color|text|subtle"}},"fontSize":"100"} -->
		<p class="has-text-color has-100-font-size ls-card-service-tile__index" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);letter-spacing:var(--wp--custom--typography--letter-spacing--wide)"><?php echo esc_html( sprintf( '%02d', $ls_index ) ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"className":"ls-card-service-tile__content","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
		<div class="wp-block-group ls-card-service-tile__content" style="margin-top:var(--wp--preset--spacing--20)">
			<!-- wp:heading {"level":3,"fontSize":"300"} -->
			<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html( $ls_tile['label'] ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"var:custom|color|text|brand"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-family:var(--wp--preset--font-family--monospace);letter-spacing:var(--wp--custom--typography--letter-spacing--wide);text-transform:uppercase"><?php echo esc_html( $ls_tile['kicker'] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"color":{"text":"var:custom|color|text|muted"}}} -->
			<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_tile['description'] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"className":"is-style-link-arrow-accent","style":{"spacing":{"margin":{"top":"auto"}}}} -->
		<p class="is-style-link-arrow-accent" style="margin-top:auto"><a class="ls-card-service-tile__link" href="<?php echo esc_url( home_url( $ls_tile['url'] ) ); ?>"><?php echo esc_html( $ls_read_link_text ); ?></a></p>
		<!-- /wp:paragraph -->
	</article>
	<!-- /wp:group -->
	<?php
};
?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|60","bottom":"var:preset|spacing|100","left":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--60)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:columns {"align":"wide","verticalAlignment":"top"} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-top">

			<!-- wp:column {"verticalAlignment":"top","width":"48%"} -->
			<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:48%">
				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"8px","style":{"color":{"text":"var(--wp--custom--color--text--brand)"}}} -->
					<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--text--brand);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
					<!-- /wp:outermost/icon-block -->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'All services', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"600"} -->
				<h2 class="wp-block-heading has-600-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Fourteen services. One delivery model.', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"top","width":"52%"} -->
			<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:52%">
				<!-- wp:group {"layout":{"type":"constrained","contentSize":"576px","justifyContent":"left"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
					<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( "Read about an individual service — or start a conversation and we'll route the brief into the right shape.", 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--60)">
			<?php foreach ( array_slice( $ls_service_tiles, 0, 4 ) as $ls_tile_index => $ls_tile ) : ?>
			<!-- wp:column -->
			<div class="wp-block-column">
				<?php $ls_render_service_tile( $ls_tile, $ls_tile_index + 1 ); ?>
			</div>
			<!-- /wp:column -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:columns -->

		<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--20)">
			<?php foreach ( array_slice( $ls_service_tiles, 4, 4 ) as $ls_tile_index => $ls_tile ) : ?>
			<!-- wp:column -->
			<div class="wp-block-column">
				<?php $ls_render_service_tile( $ls_tile, $ls_tile_index + 5 ); ?>
			</div>
			<!-- /wp:column -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:columns -->

		<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--20)">
			<?php foreach ( array_slice( $ls_service_tiles, 8, 2 ) as $ls_tile_index => $ls_tile ) : ?>
			<!-- wp:column {"width":"50%"} -->
			<div class="wp-block-column" style="flex-basis:50%">
				<?php $ls_render_service_tile( $ls_tile, $ls_tile_index + 9 ); ?>
			</div>
			<!-- /wp:column -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:columns -->

		<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--20)">
			<?php foreach ( array_slice( $ls_service_tiles, 10, 4 ) as $ls_tile_index => $ls_tile ) : ?>
			<!-- wp:column -->
			<div class="wp-block-column">
				<?php $ls_render_service_tile( $ls_tile, $ls_tile_index + 11 ); ?>
			</div>
			<!-- /wp:column -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
