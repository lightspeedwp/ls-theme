<?php
/**
 * Title: Section - Project Query Image Cards
 * Slug: ls-theme/project-query-image-cards
 * Categories: featured
 * Block Types: core/pattern
 * Description: A "Related Case Studies" section on the page canvas: an H2 above a 2-column Query Loop of `project` posts, filtered to the "WordPress" project group, each rendered as a Card - Case Study shell with the featured image (16:10) and the post title as an H3 link. The whole card is one link (the title link is stretched in SCSS). The group is looked up by slug so the pattern works on every site, and the query is unfiltered if the term does not exist. Uses core/query, core/post-template, core/post-featured-image and core/post-title.
 * Keywords: case studies, projects, query, cards, related work
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_project_query = array(
	'perPage'  => 2,
	'pages'    => 0,
	'offset'   => 0,
	'postType' => 'project',
	'order'    => 'desc',
	'orderBy'  => 'date',
	'author'   => '',
	'search'   => '',
	'exclude'  => array(),
	'sticky'   => '',
	'inherit'  => false,
);
$ls_project_term  = get_term_by( 'slug', 'wordpress', 'project-group' );

if ( $ls_project_term instanceof WP_Term ) {
	$ls_project_query['taxQuery'] = array( 'project-group' => array( absint( $ls_project_term->term_id ) ) );
}

$ls_project_query_attrs = array(
	'queryId'   => 0,
	'query'     => $ls_project_query,
	'align'     => 'wide',
	'className' => 'ls-case-study-query',
);
?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-referral-cases","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|30","bottom":"var:preset|spacing|80","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-referral-cases" style="margin-top:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"600"} -->
		<h2 class="wp-block-heading has-600-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Related Case Studies', 'ls-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:query <?php echo wp_json_encode( $ls_project_query_attrs, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS ); ?> -->
		<div class="wp-block-query alignwide ls-case-study-query">
			<!-- wp:post-template {"layout":{"type":"grid","columnCount":2},"style":{"spacing":{"blockGap":"var:preset|spacing|50"}}} -->

				<!-- wp:group {"tagName":"article","className":"is-style-card-case-study ls-case-study-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<article class="wp-block-group is-style-card-case-study ls-case-study-card">
					<!-- wp:post-featured-image {"isLink":false,"aspectRatio":"16/10","width":"100%","scale":"cover","sizeSlug":"medium_large"} /-->

					<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"default"}} -->
					<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
						<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","lineHeight":"var:custom|line-height|heading-snug"}},"fontSize":"400"} /-->
					</div>
					<!-- /wp:group -->
				</article>
				<!-- /wp:group -->

			<!-- /wp:post-template -->
		</div>
		<!-- /wp:query -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
