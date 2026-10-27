<?php
/**
 * Title: Hero - Split Photo
 * Slug: ls-theme/hero-split-photo
 * Categories: hero
 * Block Types: core/pattern
 * Description: A split hero for careers and team pages: breadcrumb trail across the top, then on the left (about 58%) a dot eyebrow, a large H1 with one brand-coloured word and a lede paragraph, and on the right (about 42%) a team photo cropped to the image's natural 3:2 ratio with a large rounded corner. The shared corner-glow class supplies the soft background glow. The photo is a core/image, so swap it for any image from the Media Library; the columns stack on mobile with the photo below the text. Falls back to core/columns and core/group because no semantic core block fits a split hero. Adapts between light and dark mode through surface, text, border and brand tokens. Authored for the About Careers page; edit the eyebrow, heading, lede and photo after inserting.
 * Keywords: hero, split, careers, team, photo, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_hero_photo_url = 'https://ls-agency.lightspeedwp.dev/wp-content/uploads/2024/06/lightspeed-team-photo-edited.png';
?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-corner-glow","style":{"border":{"bottom":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|30","bottom":"var:preset|spacing|80","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-corner-glow" style="border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;margin-top:0;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">

		<?php if ( WP_Block_Type_Registry::get_instance()->is_registered( 'yoast-seo/breadcrumbs' ) ) : ?>
		<!-- wp:yoast-seo/breadcrumbs {"className":"alignwide"} /-->
		<?php endif; ?>

		<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
		<div class="wp-block-columns are-vertically-aligned-center">

			<!-- wp:column {"verticalAlignment":"center","width":"58%","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:58%">

				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'About – Careers', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":1,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold","letterSpacing":"var:custom|typography|letter-spacing|tight","lineHeight":"var:custom|line-height|heading-tight"}},"fontSize":"900"} -->
				<h1 class="wp-block-heading has-900-font-size" style="font-weight:var(--wp--custom--typography--font-weight--extrabold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight);line-height:var(--wp--custom--line-height--heading-tight)"><?php echo esc_html__( 'Careers at', 'ls-theme' ); ?> <span style="color:var(--wp--custom--color--text--brand)"><?php echo esc_html__( 'LightSpeed', 'ls-theme' ); ?></span></h1>
				<!-- /wp:heading -->

				<!-- wp:group {"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
					<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'We’re interested in thoughtful people who care about WordPress, design systems, maintainable work and the kind of collaboration that improves with clarity.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","width":"42%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:42%">
				<!-- wp:image {"aspectRatio":"3/2","scale":"cover","width":"100%","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"var:preset|border-radius|400"}}} -->
				<figure class="wp-block-image size-full has-custom-border"><img src="<?php echo esc_url( $ls_hero_photo_url ); ?>" alt="<?php echo esc_attr__( 'The LightSpeed team together', 'ls-theme' ); ?>" style="border-radius:var(--wp--preset--border-radius--400);aspect-ratio:3/2;object-fit:cover;width:100%"/></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
