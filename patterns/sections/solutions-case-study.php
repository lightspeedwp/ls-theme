<?php
/**
 * Title: Section - Solutions Case Study
 * Slug: ls-theme/solutions-case-study
 * Categories: featured
 * Block Types: core/pattern
 * Description: A single featured case study for the Solutions pages (/solutions/{slug}/). Same shape as Section - Featured Case Study (query-driven, image left and copy right, stacking on mobile) but self-contained: it reads brand colours instead of the service phase accent and has its own query filter and stylesheet, so the service pages are not affected. A core/query of one `project` post, filtered by inc/solutions-case-study-query.php (matched via the `ls-solutions-case-study` className on the Post Template block) to the project tagged (project-tag) with the same slug as the Solutions page it is on. The featured image, title, excerpt, service tags and read-more link are real post blocks; the eyebrow, the pull quote and its attribution are plain editable blocks, so edit the quote and attribution on each page after inserting (projects have no per-post quote field to query, so they do not follow the project). If no project is tagged for the page, the query renders nothing, though the section band remains, so only insert this on a page with a tagged project. Sits on a surface.card band with a surface.canvas card; mobile image corners are handled by src/scss/structural/solutions-case-study.scss. Adapts between light and dark through surface, text and border tokens. Falls back to core/group and core/columns for the card layout because no semantic core block fits.
 * Keywords: solutions, case study, featured project, query, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","style":{"color":{"background":"var:custom|color|surface|card"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-background" style="background-color:var(--wp--custom--color--surface--card);margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:query {"queryId":0,"query":{"perPage":1,"pages":0,"offset":0,"postType":"project","order":"desc","orderBy":"date","inherit":false},"align":"wide"} -->
	<div class="wp-block-query alignwide">

		<!-- wp:post-template {"className":"ls-solutions-case-study"} -->
		<!-- wp:group {"tagName":"article","style":{"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|400","style":"solid","width":"1px"},"color":{"background":"var:custom|color|surface|canvas"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"type":"default"}} -->
		<article class="wp-block-group has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--400);background-color:var(--wp--custom--color--surface--canvas);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

			<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
			<div class="wp-block-columns are-vertically-aligned-center">

				<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
					<!-- wp:post-featured-image {"isLink":false,"aspectRatio":"auto","height":"35rem","scale":"cover","style":{"border":{"radius":{"topLeft":"var:preset|border-radius|400","bottomLeft":"var:preset|border-radius|400"}}}} /-->
				</div>
				<!-- /wp:column -->

					<!-- wp:column {"verticalAlignment":"center","width":"55%","style":{"spacing":{"blockGap":"var:preset|spacing|40","padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|80"}}}} -->
					<div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--80);flex-basis:55%">

						<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
						<div class="wp-block-group">
							<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
							<div class="wp-block-group">
								<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

								<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
								<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Featured case study', 'ls-theme' ); ?></p>
								<!-- /wp:paragraph -->
							</div>
							<!-- /wp:group -->

							<!-- wp:post-terms {"term":"project-tag","separator":" ","className":"ls-tag-pills","fontSize":"200"} /-->
						</div>
						<!-- /wp:group -->

						<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
						<div class="wp-block-group">
							<!-- wp:post-title {"level":2,"isLink":false,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","lineHeight":"var:custom|line-height|heading-snug","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"500"} /-->

							<!-- wp:post-excerpt {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} /-->
						</div>
						<!-- /wp:group -->

						<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"default"}} -->
						<div class="wp-block-group">
							<!-- wp:group {"style":{"color":{"background":"var:custom|color|surface|card"},"border":{"radius":"var:preset|border-radius|300"},"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"top"}} -->
							<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--300);background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
								<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"24px"}}} /-->

								<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}},"typography":{"fontStyle":"italic"}},"fontSize":"200"} -->
								<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:italic"><!-- wp:paragraph -->
								<p><?php echo esc_html__( '“LightSpeed helped us shift from managing dozens of templates to managing one living system. Our editors now focus on content rather than fighting with layouts.”', 'ls-theme' ); ?></p>
								<!-- /wp:paragraph --></blockquote>
								<!-- /wp:quote -->
							</div>
							<!-- /wp:group -->

							<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"200"} -->
							<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--subtle)"><?php echo esc_html__( 'Head of Digital, Novus Media', 'ls-theme' ); ?></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->

						<!-- wp:read-more {"content":<?php echo wp_json_encode( __( 'Read the case study', 'ls-theme' ) ); ?>,"className":"is-style-link-arrow-accent","fontSize":"200","style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--brand)"},"border":{"color":"var:custom|color|button|outline|border","style":"solid","width":"1px","radius":"var:preset|border-radius|200"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|20","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20"}}}} /-->
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
