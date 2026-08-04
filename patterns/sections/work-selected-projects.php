<?php
/**
 * Title: Section - Work Selected Projects
 * Slug: ls-theme/work-selected-projects
 * Categories: featured
 * Block Types: core/pattern
 * Description: The Work archive's "Selected Projects" section: eyebrow badge, heading, intro row, a platform filter (project-group taxonomy) using the existing Taxonomy Filter block, and a 3-column Query Loop of `project` posts rendered with the Work Project Card pattern.
 * Keywords: work, projects, archive, query loop, filter, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:columns {"align":"wide","verticalAlignment":"bottom"} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-bottom">

			<!-- wp:column {"verticalAlignment":"bottom","width":"55%"} -->
			<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:55%">
				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:outermost/icon-block {"iconName":"","iconColor":"brand-500","iconColorValue":"#1E6AFF","width":"8px","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--icon--background)"}}} -->
					<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container has-icon-color has-brand-500-color" style="color:var(--wp--custom--color--icon--background);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
					<!-- /wp:outermost/icon-block -->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.4px","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:1.4px;text-transform:uppercase"><?php echo esc_html__( 'Selected Projects', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"500"} -->
				<h2 class="wp-block-heading has-500-font-size" style="margin-top:var(--wp--preset--spacing--20);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Platform work across WordPress, WooCommerce and design systems.', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"bottom","width":"45%"} -->
			<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:45%">
				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Approved case studies and client context only — no inflated metrics, no unsourced proof. Filter by area of work or browse everything below.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:query {"queryId":0,"query":{"perPage":9,"pages":0,"offset":0,"postType":"project","order":"desc","orderBy":"date","inherit":false},"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
		<div class="wp-block-query alignwide">

			<!-- wp:ls-plugin/taxonomy-filter {"taxonomy":{"name":"Project groups","all_items":"All","slug":"project-group","rest_base":"project-group"},"filterType":"buttons","allItemsText":<?php echo wp_json_encode( __( 'All', 'ls-theme' ) ); ?>,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}}} -->
			<div style="margin-bottom:var(--wp--preset--spacing--30)" class="wp-block-ls-plugin-taxonomy-filter"></div>
			<!-- /wp:ls-plugin/taxonomy-filter -->

			<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
				<!-- wp:pattern {"slug":"ls-theme/work-project-card"} /-->
			<!-- /wp:post-template -->

			<!-- wp:query-pagination {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
				<!-- wp:query-pagination-previous /-->
				<!-- wp:query-pagination-numbers /-->
				<!-- wp:query-pagination-next /-->
			<!-- /wp:query-pagination -->
		</div>
		<!-- /wp:query -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
