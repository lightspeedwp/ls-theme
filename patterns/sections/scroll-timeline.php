<?php
/**
 * Title: Section - Scroll Timeline
 * Slug: ls-theme/scroll-timeline
 * Categories: featured
 * Block Types: core/pattern
 * Description: A vertical company timeline on the page canvas: dot eyebrow and H2, then a column of milestone nodes, each a mono year on the left, a dot on a vertical line and a flat Card - Plain with an H3 and a paragraph, followed by a closing statement. As the page scrolls, a glowing gradient line fills down the timeline and each node fades up and lights its dot (assets/js/scroll-timeline.js, progressively enhanced, so the editor and no-JS views show every node lit and the full line, and reduced motion does the same). The last node is a dashed, tinted "future" card. Authored for the About History page "The LightSpeed Journey" section; duplicate or delete a node freely and edit the years and copy after inserting. Falls back to core/group because no semantic core block gives an ordered list of nested cards (core/list items cannot hold headings), so each node is an article. Adapts between light and dark mode through text, surface, border and gradient tokens. SCSS lives in src/scss/structural/scroll-timeline.scss.
 * Keywords: timeline, history, milestones, journey, scroll, years, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_timeline_nodes = array(
	array(
		'year'   => __( '2003', 'ls-theme' ),
		'title'  => __( 'The Foundation', 'ls-theme' ),
		'text'   => __( 'Founded by Ashley Shaw, LightSpeed opened its doors as a network support specialist and computer hardware sales business. This foundation instilled a deep understanding of infrastructure that still guides our hosting services today.', 'ls-theme' ),
		'future' => false,
	),
	array(
		'year'   => __( '2007', 'ls-theme' ),
		'title'  => __( 'The WordPress Pivot', 'ls-theme' ),
		'text'   => __( 'Recognising the future of digital publishing, we successfully pivoted our entire business model to become a dedicated WordPress Design and Development Agency.', 'ls-theme' ),
		'future' => false,
	),
	array(
		'year'   => __( '2009', 'ls-theme' ),
		'title'  => __( 'Performance Hosting Launched', 'ls-theme' ),
		'text'   => __( 'To guarantee the speed, security, and scalability of the websites we built, we launched our own performance-grade managed hosting services. Today, we manage over 250 production sites capable of handling massive enterprise traffic spikes.', 'ls-theme' ),
		'future' => false,
	),
	array(
		'year'   => __( '2014', 'ls-theme' ),
		'title'  => __( 'Remote work before it was fashionable', 'ls-theme' ),
		'text'   => __( 'LightSpeed shifted to a remote-first model. That decision changed how we document work, communicate across roles, hire, and build accountability into the way projects move.', 'ls-theme' ),
		'future' => false,
	),
	array(
		'year'   => __( '2015', 'ls-theme' ),
		'title'  => __( 'WooCommerce & Open-Source Leadership', 'ls-theme' ),
		'text'   => __( 'We expanded heavily into e-commerce by launching dedicated WooCommerce services. This era also marked our deep commitment to the open-source community, leading to the creation and public release of our LSX Theme and Tour Operator plugins. It also shows up in our long-running involvement in WordCamps and meetups.', 'ls-theme' ),
		'future' => false,
	),
	array(
		'year'   => __( '2019', 'ls-theme' ),
		'title'  => __( 'Elite Global Partnerships', 'ls-theme' ),
		'text'   => __( 'Our dedication to high-quality code and engineering excellence earned us global recognition. We proudly joined an elite group of verified partners, officially becoming certified WooExperts and Mailchimp Experts.', 'ls-theme' ),
		'future' => false,
	),
	array(
		'year'   => __( '2022–2023', 'ls-theme' ),
		'title'  => __( 'The block-theme turning point', 'ls-theme' ),
		'text'   => __( 'A major shift began around 2022, when our own public writing tied that period to a clearer understanding of block themes and Full Site Editing. In 2023 we announced LSX Design as a Full Site Editing theme reviewed and approved on WordPress.org, and publicly credited mentorship from Fränk Klein.', 'ls-theme' ),
		'future' => false,
	),
	array(
		'year'   => __( '2024–2026', 'ls-theme' ),
		'title'  => __( 'The AI & Block Theme Era', 'ls-theme' ),
		'text'   => __( 'We fundamentally transformed our workflows by embracing the future of the web. We transitioned entirely to token-driven Figma design systems and modern WordPress block theme development. More importantly, we integrated AI across our services, pioneering Answer Engine Optimisation (AEO), AI content generation, and AI-powered analytics. In 2024, LSX Design 1.4 introduced interactive prototypes and we documented a more connected Figma-to-Git workflow. In 2025 we launched Tour Operator 2.0, announced direct sponsorship from Wetu for our open-source travel tooling, and documented an AI-assisted workflow.', 'ls-theme' ),
		'future' => false,
	),
	array(
		'year'   => __( '2027 & Beyond', 'ls-theme' ),
		'title'  => __( 'Evolving Publishing Systems', 'ls-theme' ),
		'text'   => __( 'Looking to the future, our focus is firmly on structured publishing systems and AI governance. We are investing heavily in AI research, ensuring our clients maintain data sovereignty while their content remains discoverable and citable by the next generation of AI search engines.', 'ls-theme' ),
		'future' => true,
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","style":{"spacing":{"margin":{"top":"0"},"blockGap":"var:preset|spacing|80"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band" style="margin-top:0">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"constrained","contentSize":"680px","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Timeline', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"600"} -->
		<h2 class="wp-block-heading has-600-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'The LightSpeed Journey', 'ls-theme' ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","className":"ls-scroll-timeline","style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained","contentSize":"960px","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide ls-scroll-timeline">
		<?php foreach ( $ls_timeline_nodes as $ls_timeline_node ) : ?>

		<!-- wp:group {"tagName":"article","className":"ls-scroll-timeline__node","style":{"spacing":{"blockGap":"var:preset|spacing|70"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
		<article class="wp-block-group ls-scroll-timeline__node">
			<!-- wp:group {"className":"ls-scroll-timeline__year","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|40"}}}} -->
			<div class="wp-block-group ls-scroll-timeline__year" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--40)">
				<!-- wp:paragraph {"align":"right","style":{"typography":{"fontFamily":"var:preset|font-family|monospace","fontWeight":"var:custom|typography|font-weight|semibold","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"var(--wp--custom--color--text--default)"}},"fontSize":"200"} -->
				<p class="has-text-align-right has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--default);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--wide)"><?php echo esc_html( $ls_timeline_node['year'] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:icon {"icon":"lightspeed/dot","className":"ls-scroll-timeline__dot","style":{"dimensions":{"width":"14px"}}} /-->

			<?php if ( $ls_timeline_node['future'] ) : ?>
			<!-- wp:group {"tagName":"div","className":"is-style-card-plain ls-scroll-timeline__card","style":{"border":{"color":"var:custom|color|text|brand","style":"dashed"},"color":{"gradient":"linear-gradient(135deg,color-mix(in srgb, var(--wp--custom--color--text--brand) 10%, transparent) 0%,transparent 70%)"},"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|10"}}} -->
			<div class="wp-block-group is-style-card-plain ls-scroll-timeline__card has-border-color has-background" style="border-color:var(--wp--custom--color--text--brand);border-style:dashed;background:linear-gradient(135deg,color-mix(in srgb, var(--wp--custom--color--text--brand) 10%, transparent) 0%,transparent 70%);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
			<?php else : ?>
			<!-- wp:group {"tagName":"div","className":"is-style-card-plain ls-scroll-timeline__card","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|10"}}} -->
			<div class="wp-block-group is-style-card-plain ls-scroll-timeline__card" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
			<?php endif; ?>
				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"300"} -->
				<h3 class="wp-block-heading has-300-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html( $ls_timeline_node['title'] ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
				<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_timeline_node['text'] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</article>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"960px","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"300"} -->
		<p class="has-300-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'Our history matters because it explains the kind of partner we are now. We have changed tools, methods and platforms over time, but the through-line is the same: build carefully, stay close to open source, keep learning, and help clients end up with systems they can actually live with.', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
