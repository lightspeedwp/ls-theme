<?php
/**
 * Title: Hero - Work Single
 * Slug: ls-theme/work-single-hero
 * Categories: hero
 * Block Types: core/pattern
 * Description: The Work single (case study) hero: breadcrumb trail, "Case Study" eyebrow badge, post title, excerpt, CTA buttons, a metadata row (Software, Project Type, Services from the project-group/project-type/project-tag taxonomies), and the post's featured image. Breadcrumb/eyebrow/heading/excerpt/buttons sit in a focused inner content area; the metadata row and featured image stay full wide. Adapts between light and dark mode using existing semantic tokens.
 * Keywords: work, hero, single, case study, project, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-work-single-hero","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|30","bottom":"var:preset|spacing|70","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-work-single-hero" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide"} -->
	<div class="wp-block-group alignwide">

		<!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide">

			<!-- wp:column {"width":"66%"} -->
			<div class="wp-block-column" style="flex-basis:66%">

				<?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
				<!-- wp:yoast-seo/breadcrumbs {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} /-->
				<?php endif; ?>

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10","margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30)">
					<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"8px","style":{"color":{"text":"var(--wp--custom--color--icon--background)"}}} -->
					<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--icon--background);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
					<!-- /wp:outermost/icon-block -->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Case Study', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:post-title {"level":1,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"700"} /-->

				<!-- wp:post-excerpt {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"300"} /-->

				<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--20)">
					<!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>"><?php echo esc_html__( 'Talk to us about a similar project', 'ls-theme' ); ?></a></div>
					<!-- /wp:button -->

					<!-- wp:button {"className":"is-style-outline ls-view-site-button","linkTarget":"_blank","rel":"noopener noreferrer"} -->
					<div class="wp-block-button is-style-outline ls-view-site-button"><a class="wp-block-button__link wp-element-button" href="#" target="_blank" rel="noopener noreferrer"><?php echo esc_html__( 'View site', 'ls-theme' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:columns {"className":"ls-work-single-meta","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}},"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}}}} -->
		<div class="wp-block-columns ls-work-single-meta" style="margin-top:var(--wp--preset--spacing--40);border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px">

			<!-- wp:column {"className":"ls-work-single-meta__col","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|30","bottom":"var:preset|spacing|10","left":"0"}}}} -->
			<div class="wp-block-column ls-work-single-meta__col" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--10);padding-left:0">
				<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Software', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:post-terms {"term":"project-group","separator":" · ","style":{"typography":{"fontWeight":"var:custom|typography|font-weight|normal"}},"fontSize":"200"} /-->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"className":"ls-work-single-meta__col","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|30","bottom":"var:preset|spacing|10","left":"var:preset|spacing|30"}},"border":{"top":{"width":"0","style":"none"},"right":{"width":"0","style":"none"},"bottom":{"width":"0","style":"none"},"left":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}}}} -->
			<div class="wp-block-column ls-work-single-meta__col has-border-color" style="border-top-width:0;border-top-style:none;border-right-width:0;border-right-style:none;border-bottom-width:0;border-bottom-style:none;border-left-color:var(--wp--custom--color--border--card);border-left-style:solid;border-left-width:1px;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Project Type', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:post-terms {"term":"project-type","separator":" · ","style":{"typography":{"fontWeight":"var:custom|typography|font-weight|normal"}},"fontSize":"200"} /-->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"className":"ls-work-single-meta__col","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|10","right":"0","bottom":"var:preset|spacing|10","left":"var:preset|spacing|30"}},"border":{"top":{"width":"0","style":"none"},"right":{"width":"0","style":"none"},"bottom":{"width":"0","style":"none"},"left":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}}}} -->
			<div class="wp-block-column ls-work-single-meta__col has-border-color" style="border-top-width:0;border-top-style:none;border-right-width:0;border-right-style:none;border-bottom-width:0;border-bottom-style:none;border-left-color:var(--wp--custom--color--border--card);border-left-style:solid;border-left-width:1px;padding-top:var(--wp--preset--spacing--10);padding-right:0;padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Services', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:post-terms {"term":"project-tag","separator":" · ","style":{"typography":{"fontWeight":"var:custom|typography|font-weight|normal"}},"fontSize":"200"} /-->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->

	<!-- wp:post-featured-image {"align":"wide","style":{"border":{"color":"var(--wp--custom--color--border--field)","width":"1px","style":"solid","radius":"var:preset|border-radius|400"},"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} /-->
</section>
<!-- /wp:group -->
