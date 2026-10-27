<?php
/**
 * Title: Section - Testimonial Featured Split
 * Slug: ls-theme/testimonial-featured-split
 * Categories: featured
 * Block Types: core/pattern
 * Description: Two featured testimonials stacked on the page canvas. Each is a bordered surface.card panel with a split: on one side the client logo (a light/dark pair toggled by the theme visibility tokens), the quote as a core/quote, and a footer row with a round avatar, the attribution and a View Website button; on the other side the full website screenshot. Falls back to core/group and core/columns because no semantic core block fits a split card.
 * Keywords: testimonial, featured, quote, client, split, screenshot
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_media_base = 'https://ls-agency.lightspeedwp.dev/wp-content/uploads/';
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|30","bottom":"var:preset|spacing|80","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:heading {"level":2,"className":"screen-reader-text"} -->
		<h2 class="wp-block-heading screen-reader-text"><?php echo esc_html__( 'Featured testimonials', 'ls-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:group {"tagName":"article","className":"ls-testimonial-featured","style":{"color":{"background":"var:custom|color|surface|card"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|400","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|50","padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}}},"layout":{"type":"default"}} -->
		<article class="wp-block-group ls-testimonial-featured has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--400);background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">

			<!-- wp:group {"className":"ls-testimonial-featured__logo","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group ls-testimonial-featured__logo">
				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-light"} -->
				<figure class="wp-block-image size-full site-logo--for-light"><img src="<?php echo esc_url( $ls_media_base . '2022/12/logo-portfolio-xneelo.svg' ); ?>" alt="<?php echo esc_attr__( 'xneelo, Trusted in Hosting', 'ls-theme' ); ?>"/></figure>
				<!-- /wp:image -->

				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-dark"} -->
				<figure class="wp-block-image size-full site-logo--for-dark"><img src="<?php echo esc_url( $ls_media_base . '2024/06/xneelo-logo.svg' ); ?>" alt="<?php echo esc_attr__( 'xneelo, Trusted in Hosting', 'ls-theme' ); ?>"/></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->

			<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|60"}}}} -->
			<div class="wp-block-columns">

				<!-- wp:column {"width":"52%"} -->
				<div class="wp-block-column" style="flex-basis:52%">

					<!-- wp:group {"className":"ls-testimonial-featured__copy","style":{"dimensions":{"minHeight":"100%"},"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
					<div class="wp-block-group ls-testimonial-featured__copy" style="min-height:100%">

						<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
						<div class="wp-block-group">
							<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"48px"}}} /-->

							<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"300"} -->
							<blockquote class="wp-block-quote has-300-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
							<p><?php echo esc_html__( '“The LightSpeed team is kind, diligent & always ready to assist. We are grateful to have them as part of our extended team, supporting us in maintaining & evolving our WordPress website – which includes the overall health of our WordPress website as well as ongoing optimisation and web page development. We would highly recommend LightSpeed to other companies looking for expert knowledge & support with their WordPress websites.”', 'ls-theme' ); ?></p>
							<!-- /wp:paragraph --></blockquote>
							<!-- /wp:quote -->
						</div>
						<!-- /wp:group -->

						<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
						<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--30)">
							<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","className":"ls-testimonial-featured__avatar","style":{"border":{"radius":"var:preset|border-radius|500"}}} -->
							<figure class="wp-block-image size-thumbnail has-custom-border ls-testimonial-featured__avatar"><img src="<?php echo esc_url( $ls_media_base . '2023/02/testimonial-jenna-laughton.jpeg' ); ?>" alt="" style="border-radius:var(--wp--preset--border-radius--500);aspect-ratio:1;object-fit:cover"/></figure>
							<!-- /wp:image -->

							<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left","flexWrap":"nowrap"}} -->
							<div class="wp-block-group">
								<!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"200"} -->
								<p class="has-200-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'Jenna Laughton', 'ls-theme' ); ?></p>
								<!-- /wp:paragraph -->

								<!-- wp:paragraph {"fontSize":"200"} -->
								<p class="has-200-font-size"><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Marketing Operations Specialist @ ', 'ls-theme' ); ?></span><a href="<?php echo esc_url( 'https://xneelo.co.za/' ); ?>"><?php echo esc_html__( 'xneelo', 'ls-theme' ); ?></a></p>
								<!-- /wp:paragraph -->
							</div>
							<!-- /wp:group -->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"width":"48%"} -->
				<div class="wp-block-column" style="flex-basis:48%">
					<!-- wp:group {"className":"ls-testimonial-featured__panel","style":{"color":{"background":"var:custom|color|surface|canvas"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|300","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
					<div class="wp-block-group ls-testimonial-featured__panel has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--300);background-color:var(--wp--custom--color--surface--canvas);padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
						<!-- wp:image {"aspectRatio":"5/3","scale":"cover","width":"100%","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"var:preset|border-radius|200"}}} -->
						<figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url( $ls_media_base . '2023/02/portfolio-featured-xneelo-1.png' ); ?>" alt="<?php echo esc_attr__( 'The xneelo website home page', 'ls-theme' ); ?>" style="border-radius:var(--wp--preset--border-radius--200);aspect-ratio:5/3;object-fit:cover;width:100%;height:auto"/></figure>
						<!-- /wp:image -->

						<!-- wp:buttons -->
						<div class="wp-block-buttons">
							<!-- wp:button -->
							<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( 'https://xneelo.co.za/' ); ?>" target="_blank" rel="noreferrer noopener"><?php echo esc_html__( 'View Website', 'ls-theme' ); ?></a></div>
							<!-- /wp:button -->
						</div>
						<!-- /wp:buttons -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</article>
		<!-- /wp:group -->

		<!-- wp:group {"tagName":"article","className":"ls-testimonial-featured","style":{"color":{"background":"var:custom|color|surface|card"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|400","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|50","padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}}},"layout":{"type":"default"}} -->
		<article class="wp-block-group ls-testimonial-featured has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--400);background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">

			<!-- wp:group {"className":"ls-testimonial-featured__logo","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group ls-testimonial-featured__logo">
				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-light"} -->
				<figure class="wp-block-image size-full site-logo--for-light"><img src="<?php echo esc_url( $ls_media_base . '2023/02/tsp-logo-gold.svg' ); ?>" alt="<?php echo esc_attr__( 'The Safari Partners', 'ls-theme' ); ?>"/></figure>
				<!-- /wp:image -->

				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"site-logo--for-dark"} -->
				<figure class="wp-block-image size-full site-logo--for-dark"><img src="<?php echo esc_url( $ls_media_base . '2024/06/TSP-logo-white.svg' ); ?>" alt="<?php echo esc_attr__( 'The Safari Partners', 'ls-theme' ); ?>"/></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->

			<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|60"}}}} -->
			<div class="wp-block-columns">

				<!-- wp:column {"width":"52%"} -->
				<div class="wp-block-column" style="flex-basis:52%">

					<!-- wp:group {"className":"ls-testimonial-featured__copy","style":{"dimensions":{"minHeight":"100%"},"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
					<div class="wp-block-group ls-testimonial-featured__copy" style="min-height:100%">

						<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
						<div class="wp-block-group">
							<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"48px"}}} /-->

							<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"300"} -->
							<blockquote class="wp-block-quote has-300-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
							<p><?php echo esc_html__( '“Thank you to the LightSpeed team for all your work! I am very proud of all the work you have all done to make our new website both modern and engaging!“', 'ls-theme' ); ?></p>
							<!-- /wp:paragraph --></blockquote>
							<!-- /wp:quote -->
						</div>
						<!-- /wp:group -->

						<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
						<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--30)">
							<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","className":"ls-testimonial-featured__avatar","style":{"border":{"radius":"var:preset|border-radius|500"}}} -->
							<figure class="wp-block-image size-thumbnail has-custom-border ls-testimonial-featured__avatar"><img src="<?php echo esc_url( $ls_media_base . '2023/04/about-team-bio-chris-e1681992954977.jpeg' ); ?>" alt="" style="border-radius:var(--wp--preset--border-radius--500);aspect-ratio:1;object-fit:cover"/></figure>
							<!-- /wp:image -->

							<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left","flexWrap":"nowrap"}} -->
							<div class="wp-block-group">
								<!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"200"} -->
								<p class="has-200-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'Chris Ronneseth', 'ls-theme' ); ?></p>
								<!-- /wp:paragraph -->

								<!-- wp:paragraph {"fontSize":"200"} -->
								<p class="has-200-font-size"><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Owner of ', 'ls-theme' ); ?></span><a href="<?php echo esc_url( 'https://thesafaripartners.com/' ); ?>"><?php echo esc_html__( 'The Safari Partners', 'ls-theme' ); ?></a></p>
								<!-- /wp:paragraph -->
							</div>
							<!-- /wp:group -->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"width":"48%"} -->
				<div class="wp-block-column" style="flex-basis:48%">
					<!-- wp:group {"className":"ls-testimonial-featured__panel","style":{"color":{"background":"var:custom|color|surface|canvas"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|300","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
					<div class="wp-block-group ls-testimonial-featured__panel has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--300);background-color:var(--wp--custom--color--surface--canvas);padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
						<!-- wp:image {"aspectRatio":"5/3","scale":"cover","width":"100%","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"var:preset|border-radius|200"}}} -->
						<figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url( $ls_media_base . '2022/09/portfolio-featured-the-safari-partners-15.png' ); ?>" alt="<?php echo esc_attr__( 'The Safari Partners website home page', 'ls-theme' ); ?>" style="border-radius:var(--wp--preset--border-radius--200);aspect-ratio:5/3;object-fit:cover;width:100%;height:auto"/></figure>
						<!-- /wp:image -->

						<!-- wp:buttons -->
						<div class="wp-block-buttons">
							<!-- wp:button -->
							<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( 'https://thesafaripartners.com/' ); ?>" target="_blank" rel="noreferrer noopener"><?php echo esc_html__( 'View Website', 'ls-theme' ); ?></a></div>
							<!-- /wp:button -->
						</div>
						<!-- /wp:buttons -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</article>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
