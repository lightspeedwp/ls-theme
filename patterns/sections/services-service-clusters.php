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

$ls_service_icons = array(
	'discovery' => 'search',
	'content' => 'file-text',
	'design' => 'paint-brush',
	'development' => 'code',
	'migrations' => 'arrows-left-right',
	'hosting' => 'cloud',
	'training' => 'graduation-cap',
	'support' => 'lifebuoy',
	'ai' => 'sparkle',
	'seo' => 'chart-line-up',
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
		'icon' => 'search',
		'title'       => __( 'Discovery and content', 'ls-theme' ),
		'description' => __( 'For scope clarity, content structure, risk reduction and better planning before design or build decisions harden.', 'ls-theme' ),
		'tags'        => array( 'discovery', 'content' ),
	),
	array(
		'index'       => '02',
		'icon' => 'paint-brush',
		'title'       => __( 'Design systems and accessibility', 'ls-theme' ),
		'description' => __( 'For clearer interfaces, stronger consistency and more maintainable design-to-development translation.', 'ls-theme' ),
		'tags'        => array( 'design' ),
	),
	array(
		'index'       => '03',
		'icon' => 'code',
		'title'       => __( 'Engineering and migrations', 'ls-theme' ),
		'description' => __( 'For custom WordPress work, integrations, migrations and cleaner long-term architecture.', 'ls-theme' ),
		'tags'        => array( 'development', 'migrations' ),
	),
	array(
		'index'       => '04',
		'icon' => 'rocket',
		'title'       => __( 'Launch and infrastructure', 'ls-theme' ),
		'description' => __( 'For hosting, readiness, security-minded thinking and performance-aware go-live planning.', 'ls-theme' ),
		'tags'        => array( 'hosting', 'training' ),
	),
	array(
		'index'       => '05',
		'icon' => 'question',
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
$ls_render_cluster = function ( $ls_cluster ) use ( $ls_service_icons, $ls_service_urls, $ls_service_labels ) {
	?>
	<!-- wp:group {"tagName":"article","className":"is-style-card-cluster","style":{"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
	<article class="wp-block-group is-style-card-cluster" style="min-height:100%">

		<!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:group {"className":"ls-icon-well-brand"} -->
			<div class="wp-block-group ls-icon-well-brand">
				<!-- wp:icon {"icon":"lightspeed/<?php echo esc_attr( $ls_cluster['icon'] ); ?>","style":{"dimensions":{"width":"22px"}}} /-->
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
				<!-- wp:icon {"icon":"lightspeed/<?php echo esc_attr( $ls_service_icons[ $ls_tag_key ] ); ?>","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"},"dimensions":{"width":"13px"}}} /-->

				<!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"100"} -->
				<p class="has-100-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><a class="ls-cluster-tag__link" href="<?php echo esc_url( home_url( $ls_service_urls[ $ls_tag_key ] ) ); ?>" style="color:inherit;text-decoration:none"><?php echo esc_html( $ls_service_labels[ $ls_tag_key ] ); ?></a></p>
				<!-- /wp:paragraph -->

				<!-- wp:icon {"icon":"lightspeed/arrow-right","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"},"dimensions":{"width":"11px"}}} /-->
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
					<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

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
