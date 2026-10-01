<?php
/**
 * Title: Section - Featured Case Study
 * Slug: ls-theme/featured-case-study
 * Categories: featured
 * Block Types: core/pattern
 * Description: A single featured case study for the 14 individual service pages ("Discovery in
 * practice" on the Discovery page). Query-driven: a core/query of one `project` post, filtered by
 * inc/service-case-study-query.php (matched via the `ls-service-case-study` className on the Post
 * Template block, which is the block WordPress passes to that filter) to the project tagged (project-tag, "Services") with the same
 * slug as the page it is on, so /services/discovery/ shows a Discovery project and
 * /services/hosting/ a Hosting one — no per-page editing of the project itself. The project's
 * featured image, title, excerpt and service tags are real post blocks (post-featured-image,
 * post-title, post-excerpt, post-terms). The eyebrow, the "Also from" proof line and the closing
 * link are plain editable blocks; edit them per page after inserting. If no project is tagged for
 * the page, the query renders nothing — just don't insert this section on that page. Two-column card
 * on the page canvas (image left, copy right) that stacks on mobile; the image's outer corners follow
 * the card radius via per-corner block radius, so no overflow rule is needed. The service tag pills
 * reuse ls-tag-pills from work-project-card.scss. Eyebrow and link read var(--ls-phase-accent),
 * which follows the service's parent phase via the `ls-service-phase-{phase}` body class
 * (inc/service-phase-map.php). Adapts between the site's light and dark style variations via
 * surface/text/border tokens. No new SCSS.
 * Keywords: service, case study, featured project, query, phase, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band">

	<!-- wp:query {"queryId":0,"query":{"perPage":1,"pages":0,"offset":0,"postType":"project","order":"desc","orderBy":"date","inherit":false},"align":"wide"} -->
	<div class="wp-block-query alignwide">

		<!-- wp:post-template {"className":"ls-service-case-study"} -->
		<!-- wp:group {"tagName":"article","style":{"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|400","style":"solid","width":"1px"},"color":{"background":"var:custom|color|surface|canvas"},"shadow":"var:preset|shadow|100"},"layout":{"type":"default"}} -->
		<article class="wp-block-group has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--400);background-color:var(--wp--custom--color--surface--canvas);box-shadow:var(--wp--preset--shadow--100)">

			<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
			<div class="wp-block-columns">

				<!-- wp:column {"width":"49%"} -->
				<div class="wp-block-column" style="flex-basis:49%">
					<!-- wp:post-featured-image {"isLink":false,"aspectRatio":"auto","height":"100%","scale":"cover","style":{"border":{"radius":{"topLeft":"var:preset|border-radius|400","bottomLeft":"var:preset|border-radius|400"}}}} /-->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"width":"51%","style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60"}}}} -->
				<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60);flex-basis:51%">

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--ls-phase-accent)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--ls-phase-accent);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Discovery in practice', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:post-title {"level":2,"isLink":false,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","lineHeight":"var:custom|line-height|heading-snug","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"500"} /-->

					<!-- wp:post-excerpt {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} /-->

					<!-- wp:post-terms {"term":"project-tag","separator":" ","className":"ls-tag-pills","fontSize":"100"} /-->

					<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
					<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
						<!-- wp:paragraph {"fontSize":"200"} -->
						<p class="has-200-font-size"><strong><?php echo esc_html__( 'Also from discovery:', 'ls-theme' ); ?></strong> <span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'a 220,000+ post legacy migration plan for Novus Media, with metadata-preservation checks.', 'ls-theme' ); ?></span></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"className":"is-style-link-arrow-accent","style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}}} -->
					<p class="is-style-link-arrow-accent" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><a href="<?php echo esc_url( home_url( '/work/?service=discovery' ) ); ?>" style="color:var(--ls-phase-accent)"><?php echo esc_html__( 'View discovery case studies', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</article>
		<!-- /wp:group -->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->
</section>
<!-- /wp:group -->
