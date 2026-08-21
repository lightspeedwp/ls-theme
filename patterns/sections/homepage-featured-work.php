<?php
/**
 * Title: Section - Homepage Featured Work
 * Slug: ls-theme/homepage-featured-work
 * Categories: featured
 * Block Types: core/pattern
 * Description: The Homepage "Featured work" section: eyebrow, heading, copy, and a Query Loop of `project` posts (3 per page) filtered to the "Featured" project-tag term, rendered via the Card - Featured Work pattern. Editors control which case studies appear here by tagging/untagging posts with "Featured" — no code changes needed. Closes with an "All Case Studies" outline button.
 * Keywords: homepage, featured work, case studies, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"is-style-content-band","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-content-band">

	<!-- wp:group {"align":"wide"} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"style":{"dimensions":{"maxWidth":"var(--wp--style--global--content-size)"}},"layout":{"type":"flow"}} -->
		<div class="wp-block-group" style="max-width:var(--wp--style--global--content-size)">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"8px","style":{"color":{"text":"var(--wp--custom--color--icon--background)"}}} -->
				<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" aria-hidden="true" style="color:var(--wp--custom--color--icon--background);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
				<!-- /wp:outermost/icon-block -->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Featured work', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"0"}}},"fontSize":"700"} -->
			<h2 class="wp-block-heading has-700-font-size" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:0;font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Proof from real platform work, not portfolio decoration.', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"0"}}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted);margin-top:var(--wp--preset--spacing--20);margin-bottom:0"><?php echo esc_html__( 'Each case study explains the business context, what we changed and why it mattered.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:query {"queryId":0,"query":{"perPage":3,"pages":0,"offset":0,"postType":"project","order":"desc","orderBy":"date","inherit":false},"align":"wide","className":"ls-featured-work-grid","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
		<div class="wp-block-query alignwide ls-featured-work-grid" style="margin-top:var(--wp--preset--spacing--50)">
			<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->

				<!-- wp:group {"tagName":"article","className":"is-style-card-case-study","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<article class="wp-block-group is-style-card-case-study">

					<!-- wp:group {"className":"ls-card-case-study__banner ls-card-banner-tint","style":{"dimensions":{"minHeight":"10rem"}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
					<div class="wp-block-group ls-card-case-study__banner ls-card-banner-tint" style="min-height:10rem">
						<!-- wp:group {"className":"ls-platform-tag-brand","style":{"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|200","style":"solid","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}}}} -->
						<div class="wp-block-group ls-platform-tag-brand has-border-color" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--200);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
							<!-- wp:post-terms {"term":"project-group","prefix":<?php echo wp_json_encode( __( 'Platform · ', 'ls-theme' ) ); ?>,"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest"}},"fontSize":"100"} /-->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"ls-card-case-study__content","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
					<div class="wp-block-group ls-card-case-study__content" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">

						<!-- wp:post-terms {"term":"project-group","className":"ls-badge-brand","style":{"border":{"radius":"var:preset|border-radius|200"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|10","bottom":"var:preset|spacing|5","left":"var:preset|spacing|10"}}}} /-->

						<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"300"} /-->

						<!-- wp:post-excerpt {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} /-->

						<!-- wp:group {"className":"ls-featured-work-card__divider","style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"margin":{"top":"var:preset|spacing|10"},"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
						<div class="wp-block-group ls-featured-work-card__divider" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;margin-top:var(--wp--preset--spacing--10);padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">
							<!-- wp:post-terms {"term":"project-tag","separator":" ","className":"ls-tag-pills","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"fontFamily":"var:preset|font-family|monospace","fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"100"} /-->
						</div>
						<!-- /wp:group -->

						<!-- wp:read-more {"content":<?php echo wp_json_encode( __( 'View project', 'ls-theme' ) ); ?>,"className":"is-style-link-arrow-accent","fontSize":"200"} /-->
					</div>
					<!-- /wp:group -->
				</article>
				<!-- /wp:group -->

			<!-- /wp:post-template -->
		</div>
		<!-- /wp:query -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--60)">
			<!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/work/' ) ); ?>"><?php echo esc_html__( 'All Case Studies', 'ls-theme' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
