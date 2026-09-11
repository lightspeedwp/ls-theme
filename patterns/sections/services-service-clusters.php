<?php
/**
 * Title: Section - Services Service Clusters
 * Slug: ls-theme/services-service-clusters
 * Categories: featured
 * Block Types: core/pattern
 * Description: The Services page's "Five ways the work groups together" section: eyebrow/heading/description row, followed by five service-cluster cards (Discovery and content, Design systems and accessibility, Engineering and migrations, Launch and infrastructure, Support and optimisation) in an asymmetric two-row layout. Each card uses the shared Card - Cluster style with a tinted icon well, an index number, and a footer row of small clickable tag links to the matching individual service pages.
 * Keywords: services, clusters, cards, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_arrow_icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg>';

$ls_service_icons = array(
	'discovery'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path></svg>',
	'content'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M88,96a8,8,0,0,1,8-8h64a8,8,0,0,1,0,16H96A8,8,0,0,1,88,96Zm8,40h64a8,8,0,0,0,0-16H96a8,8,0,0,0,0,16Zm32,16H96a8,8,0,0,0,0,16h32a8,8,0,0,0,0-16ZM224,48V156.69A15.86,15.86,0,0,1,219.31,168L168,219.31A15.86,15.86,0,0,1,156.69,224H48a16,16,0,0,1-16-16V48A16,16,0,0,1,48,32H208A16,16,0,0,1,224,48ZM48,208H152V160a8,8,0,0,1,8-8h48V48H48Zm120-40v28.7L196.69,168Z"></path></svg>',
	'design'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M232,32a8,8,0,0,0-8-8c-44.08,0-89.31,49.71-114.43,82.63A60,60,0,0,0,32,164c0,30.88-19.54,44.73-20.47,45.37A8,8,0,0,0,16,224H92a60,60,0,0,0,57.37-77.57C182.3,121.31,232,76.08,232,32ZM92,208H34.63C41.38,198.41,48,183.92,48,164a44,44,0,1,1,44,44Zm32.42-94.45q5.14-6.66,10.09-12.55A76.23,76.23,0,0,1,155,121.49q-5.9,4.94-12.55,10.09A60.54,60.54,0,0,0,124.42,113.55Zm42.7-2.68a92.57,92.57,0,0,0-22-22c31.78-34.53,55.75-45,69.9-47.91C212.17,55.12,201.65,79.09,167.12,110.87Z"></path></svg>',
	'development' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M69.12,94.15,28.5,128l40.62,33.85a8,8,0,1,1-10.24,12.29l-48-40a8,8,0,0,1,0-12.29l48-40a8,8,0,0,1,10.24,12.3Zm176,27.7-48-40a8,8,0,1,0-10.24,12.3L227.5,128l-40.62,33.85a8,8,0,1,0,10.24,12.29l48-40a8,8,0,0,0,0-12.29ZM162.73,32.48a8,8,0,0,0-10.25,4.79l-64,176a8,8,0,0,0,4.79,10.26A8.14,8.14,0,0,0,96,224a8,8,0,0,0,7.52-5.27l64-176A8,8,0,0,0,162.73,32.48Z"></path></svg>',
	'migrations'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M213.66,181.66l-32,32a8,8,0,0,1-11.32-11.32L188.69,184H48a8,8,0,0,1,0-16H188.69l-18.35-18.34a8,8,0,0,1,11.32-11.32l32,32A8,8,0,0,1,213.66,181.66Zm-139.32-64a8,8,0,0,0,11.32-11.32L67.31,88H208a8,8,0,0,0,0-16H67.31L85.66,53.66A8,8,0,0,0,74.34,42.34l-32,32a8,8,0,0,0,0,11.32Z"></path></svg>',
	'hosting'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M160,40A88.09,88.09,0,0,0,81.29,88.67,64,64,0,1,0,72,216h88a88,88,0,0,0,0-176Zm0,160H72a48,48,0,0,1,0-96c1.1,0,2.2,0,3.29.11A88,88,0,0,0,72,128a8,8,0,0,0,16,0,72,72,0,1,1,72,72Z"></path></svg>',
	'training'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M251.76,88.94l-120-64a8,8,0,0,0-7.52,0l-120,64a8,8,0,0,0,0,14.12L32,117.87v48.42a15.91,15.91,0,0,0,4.06,10.65C49.16,191.53,78.51,216,128,216a130,130,0,0,0,48-8.76V240a8,8,0,0,0,16,0V199.51a115.63,115.63,0,0,0,27.94-22.57A15.91,15.91,0,0,0,224,166.29V117.87l27.76-14.81a8,8,0,0,0,0-14.12ZM128,200c-43.27,0-68.72-21.14-80-33.71V126.4l76.24,40.66a8,8,0,0,0,7.52,0L176,143.47v46.34C163.4,195.69,147.52,200,128,200Zm80-33.75a97.83,97.83,0,0,1-16,14.25V134.93l16-8.53ZM188,118.94l-.22-.13-56-29.87a8,8,0,0,0-7.52,14.12L171,128l-43,22.93L25,96,128,41.07,231,96Z"></path></svg>',
	'support'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm39.1,131.79a47.84,47.84,0,0,0,0-55.58l28.5-28.49a87.83,87.83,0,0,1,0,112.56ZM96,128a32,32,0,1,1,32,32A32,32,0,0,1,96,128Zm88.28-67.6L155.79,88.9a47.84,47.84,0,0,0-55.58,0L71.72,60.4a87.83,87.83,0,0,1,112.56,0ZM60.4,71.72l28.5,28.49a47.84,47.84,0,0,0,0,55.58L60.4,184.28a87.83,87.83,0,0,1,0-112.56ZM71.72,195.6l28.49-28.5a47.84,47.84,0,0,0,55.58,0l28.49,28.5a87.83,87.83,0,0,1-112.56,0Z"></path></svg>',
	'ai'          => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M197.58,129.06,146,110l-19-51.62a15.92,15.92,0,0,0-29.88,0L78,110l-51.62,19a15.92,15.92,0,0,0,0,29.88L78,178l19,51.62a15.92,15.92,0,0,0,29.88,0L146,178l51.62-19a15.92,15.92,0,0,0,0-29.88ZM137,164.22a8,8,0,0,0-4.74,4.74L112,223.85,91.78,169A8,8,0,0,0,87,164.22L32.15,144,87,123.78A8,8,0,0,0,91.78,119L112,64.15,132.22,119a8,8,0,0,0,4.74,4.74L191.85,144ZM144,40a8,8,0,0,1,8-8h16V16a8,8,0,0,1,16,0V32h16a8,8,0,0,1,0,16H184V64a8,8,0,0,1-16,0V48H152A8,8,0,0,1,144,40ZM248,88a8,8,0,0,1-8,8h-8v8a8,8,0,0,1-16,0V96h-8a8,8,0,0,1,0-16h8V72a8,8,0,0,1,16,0v8h8A8,8,0,0,1,248,88Z"></path></svg>',
	'seo'         => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M232,208a8,8,0,0,1-8,8H32a8,8,0,0,1-8-8V48a8,8,0,0,1,16,0V156.69l50.34-50.35a8,8,0,0,1,11.32,0L128,132.69,180.69,80H160a8,8,0,0,1,0-16h40a8,8,0,0,1,8,8v40a8,8,0,0,1-16,0V91.31l-58.34,58.35a8,8,0,0,1-11.32,0L96,123.31l-56,56V200H224A8,8,0,0,1,232,208Z"></path></svg>',
);

$ls_service_urls = array(
	'discovery'   => '/services/discovery/',
	'content'     => '/services/content/',
	'design'      => '/services/design/',
	'development' => '/services/development/',
	'migrations'  => '/services/migrations/',
	'hosting'     => '/services/hosting/',
	'training'    => '/services/training/',
	'support'     => '/services/support/',
	'ai'          => '/services/ai/',
	'seo'         => '/services/seo/',
);

$ls_service_labels = array(
	'discovery'   => __( 'Discovery', 'ls-theme' ),
	'content'     => __( 'Content', 'ls-theme' ),
	'design'      => __( 'Design', 'ls-theme' ),
	'development' => __( 'Development', 'ls-theme' ),
	'migrations'  => __( 'Migrations', 'ls-theme' ),
	'hosting'     => __( 'Hosting', 'ls-theme' ),
	'training'    => __( 'Training', 'ls-theme' ),
	'support'     => __( 'Support', 'ls-theme' ),
	'ai'          => __( 'AI', 'ls-theme' ),
	'seo'         => __( 'SEO', 'ls-theme' ),
);

$ls_clusters = array(
	array(
		'index'       => '01',
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path></svg>',
		'title'       => __( 'Discovery and content', 'ls-theme' ),
		'description' => __( 'For scope clarity, content structure, risk reduction and better planning before design or build decisions harden.', 'ls-theme' ),
		'tags'        => array( 'discovery', 'content' ),
	),
	array(
		'index'       => '02',
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M232,32a8,8,0,0,0-8-8c-44.08,0-89.31,49.71-114.43,82.63A60,60,0,0,0,32,164c0,30.88-19.54,44.73-20.47,45.37A8,8,0,0,0,16,224H92a60,60,0,0,0,57.37-77.57C182.3,121.31,232,76.08,232,32ZM92,208H34.63C41.38,198.41,48,183.92,48,164a44,44,0,1,1,44,44Zm32.42-94.45q5.14-6.66,10.09-12.55A76.23,76.23,0,0,1,155,121.49q-5.9,4.94-12.55,10.09A60.54,60.54,0,0,0,124.42,113.55Zm42.7-2.68a92.57,92.57,0,0,0-22-22c31.78-34.53,55.75-45,69.9-47.91C212.17,55.12,201.65,79.09,167.12,110.87Z"></path></svg>',
		'title'       => __( 'Design systems and accessibility', 'ls-theme' ),
		'description' => __( 'For clearer interfaces, stronger consistency and more maintainable design-to-development translation.', 'ls-theme' ),
		'tags'        => array( 'design' ),
	),
	array(
		'index'       => '03',
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M69.12,94.15,28.5,128l40.62,33.85a8,8,0,1,1-10.24,12.29l-48-40a8,8,0,0,1,0-12.29l48-40a8,8,0,0,1,10.24,12.3Zm176,27.7-48-40a8,8,0,1,0-10.24,12.3L227.5,128l-40.62,33.85a8,8,0,1,0,10.24,12.29l48-40a8,8,0,0,0,0-12.29ZM162.73,32.48a8,8,0,0,0-10.25,4.79l-64,176a8,8,0,0,0,4.79,10.26A8.14,8.14,0,0,0,96,224a8,8,0,0,0,7.52-5.27l64-176A8,8,0,0,0,162.73,32.48Z"></path></svg>',
		'title'       => __( 'Engineering and migrations', 'ls-theme' ),
		'description' => __( 'For custom WordPress work, integrations, migrations and cleaner long-term architecture.', 'ls-theme' ),
		'tags'        => array( 'development', 'migrations' ),
	),
	array(
		'index'       => '04',
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M223.85,47.12a16,16,0,0,0-15-15c-12.58-.75-44.73.4-71.41,27.07L132.69,64H74.36A15.91,15.91,0,0,0,63,68.68L28.7,103a16,16,0,0,0,9.07,27.16l38.47,5.37,44.21,44.21,5.37,38.49a15.94,15.94,0,0,0,10.78,12.92,16.11,16.11,0,0,0,5.1.83A15.91,15.91,0,0,0,153,227.3L187.32,193A15.91,15.91,0,0,0,192,181.64V123.31l4.77-4.77C223.45,91.86,224.6,59.71,223.85,47.12ZM74.36,80h42.33L77.16,119.52,40,114.34Zm74.41-9.45a76.65,76.65,0,0,1,59.11-22.47,76.46,76.46,0,0,1-22.42,59.16L128,164.68,91.32,128ZM176,181.64,141.67,216l-5.19-37.17L176,139.31Zm-74.16,9.5C97.34,201,82.29,224,40,224a8,8,0,0,1-8-8c0-42.29,23-57.34,32.86-61.85a8,8,0,0,1,6.64,14.56c-6.43,2.93-20.62,12.36-23.12,38.91,26.55-2.5,36-16.69,38.91-23.12a8,8,0,1,1,14.56,6.64Z"></path></svg>',
		'title'       => __( 'Launch and infrastructure', 'ls-theme' ),
		'description' => __( 'For hosting, readiness, security-minded thinking and performance-aware go-live planning.', 'ls-theme' ),
		'tags'        => array( 'hosting', 'training' ),
	),
	array(
		'index'       => '05',
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M140,180a12,12,0,1,1-12-12A12,12,0,0,1,140,180ZM128,72c-22.06,0-40,16.15-40,36v4a8,8,0,0,0,16,0v-4c0-11,10.77-20,24-20s24,9,24,20-10.77,20-24,20a8,8,0,0,0-8,8v8a8,8,0,0,0,16,0v-.72c18.24-3.35,32-17.9,32-35.28C168,88.15,150.06,72,128,72Zm104,56A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path></svg>',
		'title'       => __( 'Support and optimisation', 'ls-theme' ),
		'description' => __( 'For maintenance, issue resolution, performance review, training and long-term platform continuity.', 'ls-theme' ),
		'tags'        => array( 'support', 'ai', 'seo' ),
	),
);

/**
 * Renders one service-cluster card. A local closure, not a named function — this file can be
 * included more than once per request (pattern registration + a live "wp:pattern" reference),
 * and a top-level `function` declaration here would fatal with "cannot redeclare" on the second
 * include.
 *
 * @param array $ls_cluster Cluster data (index, icon, title, description, tags).
 */
$ls_render_cluster = function ( $ls_cluster ) use ( $ls_service_icons, $ls_service_urls, $ls_service_labels, $ls_arrow_icon ) {
	?>
	<!-- wp:group {"tagName":"article","className":"is-style-card-cluster","style":{"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
	<article class="wp-block-group is-style-card-cluster" style="min-height:100%">

		<!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:group {"className":"ls-icon-well-brand"} -->
			<div class="wp-block-group ls-icon-well-brand">
				<!-- wp:outermost/icon-block {"iconName":"","width":"22px"} -->
				<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:22px;transform:rotate(0deg) scaleX(1) scaleY(1)"><?php echo $ls_cluster['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static, developer-authored Phosphor icon markup, not user input. ?></div></div>
				<!-- /wp:outermost/icon-block -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);letter-spacing:var(--wp--custom--typography--letter-spacing--wide)"><?php echo esc_html( $ls_cluster['index'] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"ls-card-cluster__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
		<div class="wp-block-group ls-card-cluster__content">
			<!-- wp:heading {"level":3,"fontSize":"300"} -->
			<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html( $ls_cluster['title'] ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
			<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_cluster['description'] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"ls-card-cluster__tags","style":{"spacing":{"margin":{"top":"auto"},"padding":{"top":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
		<div class="wp-block-group ls-card-cluster__tags" style="margin-top:auto;padding-top:var(--wp--preset--spacing--20)">
			<?php foreach ( $ls_cluster['tags'] as $ls_tag_key ) : ?>

			<!-- wp:group {"className":"ls-cluster-tag","style":{"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|500","style":"solid","width":"1px"},"color":{"background":"var:custom|color|surface|canvas"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|10","bottom":"var:preset|spacing|5","left":"var:preset|spacing|10"},"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group ls-cluster-tag has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--500);background-color:var(--wp--custom--color--surface--canvas);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--10)">
				<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"13px","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"}}} -->
				<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--text--subtle);width:13px;transform:rotate(0deg) scaleX(1) scaleY(1)"><?php echo $ls_service_icons[ $ls_tag_key ]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static, developer-authored Phosphor icon markup, not user input. ?></div></div>
				<!-- /wp:outermost/icon-block -->

				<!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"100"} -->
				<p class="has-100-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><a class="ls-cluster-tag__link" href="<?php echo esc_url( home_url( $ls_service_urls[ $ls_tag_key ] ) ); ?>" style="color:inherit;text-decoration:none"><?php echo esc_html( $ls_service_labels[ $ls_tag_key ] ); ?></a></p>
				<!-- /wp:paragraph -->

				<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"11px","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"}}} -->
				<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--text--subtle);width:11px;transform:rotate(0deg) scaleX(1) scaleY(1)"><?php echo $ls_arrow_icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static, developer-authored Phosphor icon markup, not user input. ?></div></div>
				<!-- /wp:outermost/icon-block -->
			</div>
			<!-- /wp:group -->

			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->
	</article>
	<!-- /wp:group -->
	<?php
};
?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","style":{"color":{"background":"var:custom|color|surface|card"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band has-background" style="background-color:var(--wp--custom--color--surface--card)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:columns {"align":"wide","verticalAlignment":"bottom"} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-bottom">

			<!-- wp:column {"verticalAlignment":"bottom"} -->
			<div class="wp-block-column is-vertically-aligned-bottom">
				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"8px","style":{"color":{"text":"var(--wp--custom--color--text--brand)"}}} -->
					<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--text--brand);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
					<!-- /wp:outermost/icon-block -->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Service clusters', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"700"} -->
				<h2 class="wp-block-heading has-700-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Five ways the work groups together.', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"bottom"} -->
			<div class="wp-block-column is-vertically-aligned-bottom">
				<!-- wp:group {"layout":{"type":"constrained","contentSize":"620px","justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
					<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Each cluster solves a different operating problem, but they share one delivery standard. Pick the cluster closest to the work — or read across them.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--40)">

			<!-- wp:column -->
			<div class="wp-block-column">
				<?php $ls_render_cluster( $ls_clusters[0] ); ?>
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<?php $ls_render_cluster( $ls_clusters[1] ); ?>
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<?php $ls_render_cluster( $ls_clusters[2] ); ?>
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--20)">

			<!-- wp:column {"width":"33.33%"} -->
			<div class="wp-block-column" style="flex-basis:33.33%">
				<?php $ls_render_cluster( $ls_clusters[3] ); ?>
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"66.66%"} -->
			<div class="wp-block-column" style="flex-basis:66.66%">
				<?php $ls_render_cluster( $ls_clusters[4] ); ?>
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
