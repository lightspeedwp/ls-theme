<?php
/**
 * Title: Section - Testimonial Card Masonry
 * Slug: ls-theme/testimonial-card-masonry
 * Categories: featured
 * Block Types: core/pattern
 * Description: A masonry grid of 27 text-only testimonial cards on a surface.card band: a visually hidden H2, then cards that pack into 1, 2 or 3 columns by width with no gaps, whatever the quote length. Each card reuses the plain card shell (is-style-card-plain) and holds a quote icon, an H3 company name, the full quote as a core/quote and a ruled attribution line. The column packing is SCSS because neither core group layout nor theme.json can express CSS multi-column. Falls back to core/group because no semantic core block fits a card.
 * Keywords: testimonial, cards, masonry, grid, quotes, clients
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-card-masonry-section","style":{"color":{"background":"var:custom|color|surface|card"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|30","bottom":"var:preset|spacing|80","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-card-masonry-section has-background" style="background-color:var(--wp--custom--color--surface--card);margin-top:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:heading {"level":2,"className":"screen-reader-text"} -->
		<h2 class="wp-block-heading screen-reader-text"><?php echo esc_html__( 'More client testimonials', 'ls-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:group {"className":"ls-card-masonry","layout":{"type":"default"}} -->
		<div class="wp-block-group ls-card-masonry">

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'GILTEDGE', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'We’ve been keeping a close watch on LightSpeed since they started their Tour Operator project; we were specifically interested in their Wetu integration as we’ve been a long-standing client of Wetu & are using it across the company.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'When the time came to re-design GiltedgeAfrica.com, I knew they would be the right people for the job & they have not disappointed us: well organized company, constant communication and amazing detailed work! All around, a great team of professionals!', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'The result, we’re on phase 1 of a 3/4 phases roll-out, is outstanding which everyone at Giltedge is very proud of.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'I would recommend Ashley & his team to any company needing great detailed, and sometimes complex work, done within time & budget.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Julien Perreard', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', IT Manager @ ', 'ls-theme' ); ?></span><a href="<?php echo esc_url( 'https://giltedge.travel/' ); ?>"><?php echo esc_html__( 'Giltedge Travel', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'Epping Property', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'LightSpeed initially facilitated the development of our website 7 years ago. They have also hosted our website since inception. Early in 2017 we decided to upgrade our website to a more modern platform. The LightSpeed team assisted Epping Property from start to finish. Their access to specialised people greatly enhanced the entire process, which was actually less traumatic than we had envisaged. The Lightspeed team has always been there to assist us, through every hitch during the last 7 years. No problem was too small for them to attend to or sort out. I have really felt comfortable that LightSpeed have my best interests at heart I feel they are more “partners” of Epping Property than website facilitators.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Tony Bales', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', Business Owner @ ', 'ls-theme' ); ?></span><a href="<?php echo esc_url( 'https://www.eppingproperty.co.za/' ); ?>"><?php echo esc_html__( 'Epping Property', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'Nox Rentals', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'I approached LightSpeed because they were referred to me by Wetu and I also saw some of the great work they had done before.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'LightSpeed helped me by designing and developing my travel website from scratch.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'The result was outstanding with the final product design matching my brand colour theme, the functionality of the website very user-friendly. I have received many compliments on the website.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'One thing I liked was their proactive suggestions on website design and layout and their transparency when it came to pricing. The project was also delivered in a very timely manner.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'I found the experience to be a very positive one and I would recommend LightSpeed to people who need website design and development.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Charlotte Metelerkamp', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', Head of Sales & Distribution @ ', 'ls-theme' ); ?></span><a href="<?php echo esc_url( 'https://noxrentals.com/' ); ?>"><?php echo esc_html__( 'Nox Rentals', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'Elementz Travel', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'LightSpeed initially facilitated the development of our website 7 years ago. They have also hosted our website since inception. Early in 2017 we decided to upgrade our website to a more modern platform. The LightSpeed team assisted Epping Property from start to finish. Their access to specialised people greatly enhanced the entire process, which was actually less traumatic than we had envisaged. The Lightspeed team has always been there to assist us, through every hitch during the last 7 years. No problem was too small for them to attend to or sort out. I have really felt comfortable that LightSpeed have my best interests at heart I feel they are more “partners” of Epping Property than website facilitators.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Sandor Weyers', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', Business Owner @ Elementz Travel', 'ls-theme' ); ?></span></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'ACS', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'We approached LightSpeed because we needed a WooCommerce plugin to integrate our clients into the PayOn payments platform. From the outset LightSpeed made our selection of a development company easy with their friendliness and assistance with requirements gathering. The result was a plugin that was stable, robust, fast and did not cost us an arm and a leg.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'One thing I liked was their agile approach to development which I’m sure led to a better product delivered. Overall I found the experience to be fast, efficient and cost effective. Would do business with them again any day.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Izak Van Heerden', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', Business Partner at ACS Altech', 'ls-theme' ); ?></span></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'Media24 Magazines', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'We have sold our first dress! . . . and learned so much. SARIE launched SARIE BRUID: (ver)koop my rok & ander dienste to advertise the inspiring wedding suppliers we have in our country and offer them affordable advertising backed by SARIE and all SARIE’s brand extensions. Also, you can sell your wedding dress to an upcoming bride! In turn creating a sustainable, creative and affordable way of thinking of your Big Day – a second love story for that dress just hanging in your closet. Eager to see where this website leads us! Kudos to Annemie Lombard, Elmari de Vos and thank you LightSpeed Development for building!', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Carmen Botma', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', Events Director @ Media24 Magazines', 'ls-theme' ); ?></span></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'DocAddress', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'LightSpeed developed our brochure website some years back, we elected to use our own hosting and we didn’t keep our WordPress installation updated.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'The site was infected quite badly and the content was replaced with malicious content. We contacted LightSpeed, who responded quickly and helped clean our site.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'Subsequently we moved our website to LightSpeed’s secure hosting to prevent this type of infection from happening in the future.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Stephan Sliwensky', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', Consultant @ ', 'ls-theme' ); ?></span><a href="<?php echo esc_url( 'http://www.docaddress.de/' ); ?>"><?php echo esc_html__( 'DocAddress', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'Section27', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'Woo hoo!!! Couldn’t have done it without you guys! It really is awesome! The old site didn’t rank as high. I think the move to Wordpress/LightSpeed was definitely the right move! Soooo chuffed!', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'LightSpeed has provided ongoing MailChimp support to us after initially redesigning our website. They have helped with RSS campaigns, newsletter design, regular newsletter support and template changes and have always done their best to solve any queries we have had. I would recommend their services.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Nina Taaibosch', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', Project Manager @ ', 'ls-theme' ); ?></span><a href="<?php echo esc_url( 'https://section27.org.za/' ); ?>"><?php echo esc_html__( 'Section27', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'Media24 Magazines', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'I approached LightSpeed Development because they developed a similar site within our group before and we were satisfied with the job they did previously.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'We contacted LightSpeed again to develop a paygated site for Media24’s lifestyle magazine brand Runner’s World. The site needed to host a 12-week weight-loss plan which includes meal and workout plans, shopping lists and user profiles with weekly weight tracking.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'LightSpeed Development helped me by giving professional input on how to make the site as user-friendly as possible.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'LightSpeed developers are knowledgeable and efficient, always went the extra mile to make sure they produced a final product that we were happy with.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'One thing I liked was their Great communication – prompt response to mails and swift action on requests.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'I found the experience prompt and professional. LightSpeed became part of our team during the development of this project and they accepted our outcomes and deadlines as their own. Great, knowledgeable and willing developers made for a productive partnership with them.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'I would absolutely recommend LightSpeed to people who need custom WordPress development services.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Yentl Barros', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', Project Manager @ Media24 Magazines', 'ls-theme' ); ?></span></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'SATravellers', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'I approached LightSpeed because we were looking for a multi tasks website. first of all it has to represent our brand and the quality we try to put in our products, second point was more technical as we needed a portal that allow us to move, up grade and ad content anytime with ease and no “extra” fees or costs.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'Ashley came in with multiple options and that straight at the first meeting. Knowing that you talk to a team of professionals secure the production delays, quality of the ended work and mostly responsibility', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'for us.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'LightSpeed are definitely unique in the local market, none offer the same and despite the magic of skype or e-mails it is always good to have a physical contact.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'In terms of LightSpeed’s approach and delivery, we enjoyed the clear and explicit timing and schedules as costs sheets. We speak the same language and we have never been told that we couldn’t understand the development works (as technicals it might be).', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'Thanks to a great experience with LightSpeed so far, we’re going to start a second website with them.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'A readily recommend LightSpeed to others.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Alexandre Coffé', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', Business Owner @ ', 'ls-theme' ); ?></span><a href="<?php echo esc_url( 'https://www.satravellers.com/en/' ); ?>"><?php echo esc_html__( 'SATravellers', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'Jembi Health Systems', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'Jembi has found the services rendered and working relationship with LightSpeed satisfactory and is pleased with the final product; an improved, more functional and better representative website.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'LightSpeed was quick to grasp and help us conceptualise a revamped Jembi website, aimed at better communicating the work we undertake, who we are as an organisation, where we work and who we work with. We would definitely recommend LightSpeed services, as we found them to be professional at all times and ready to assist with any challenges, tweaks and raised concerns throughout the process.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'The LightSpeed team were well organised and efficient, providing constant feedback and communicating continuously with Jembi’s communications assistant. The WordPress training and material provided to Jembi’s key staff, has been satisfactory and beneficial towards the on-going management of the Jembi website.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'With the help and service provided by LightSpeed, Jembi has achieved its’ intended objective of creating a new look and feel, and a more relevant and functional website, which forms a crucial part of the Jembi’s communication strategy.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Roger Solomons', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', Project Manager @ ', 'ls-theme' ); ?></span><a href="<?php echo esc_url( 'https://www.jembi.org/' ); ?>"><?php echo esc_html__( 'Jembi Health Systems', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'Media24 Magazines', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'LightSpeed and I recently worked together on the redesign of one my brand’s websites testhouse.fairlady.com. This proved challenging as I had to consult with a number of members on the team and then compile a document which highlighted the look, feel, design and functionality that the team would like from the website. Lightspeed was great during this process, they met with me on several occasions to hash out the document, which admittedly was very basic, included contributions from a few members from my team and was not in any way technical. Ashley and his team were able to understand the requirements my team had listed and then interpret them on a coding level to ensure that all expectations were met. Ashley also kept a particularly keen eye on the design of the website ensuring that it was in line with the magazine’s brand identity. The team was great at keeping us updated throughout the process and talking us through each step, also explaining the implications of each tweak and change and offering alternative, often easier, solutions to our queries.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Jennifer Searle', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', Project Manager @ Media24 Magazines', 'ls-theme' ); ?></span></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'HOMEMAKERS', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'The post-launch feedback from everyone at HOMEMAKERS and our clients is phenomenal, we’re extremely proud of the outcome of this website. The new site is modern and world-class and we believe that it will generate even more quality leads for our exhibitors. From the onset LightSpeed provided us with personable, customer-focused service. Your team was always willing to listen and take on board our needs while at the same time providing practical advice and honest opinion. Your response to any issue or query was always handled swiftly and expertly. LightSpeed is at the top of our list of favourite developers we’ve ever worked with.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Simoni Crause', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', Project Manager @ ', 'ls-theme' ); ?></span><a href="<?php echo esc_url( 'https://www.homemakersonline.co.za/' ); ?>"><?php echo esc_html__( 'HOMEMAKERS', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'FISA', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'LightSpeed has been FISA’s IT partner for the last three years. During this period they did not only host the institute’s website, but also developed and enhanced it to suit our changing needs. Their ability to always find solutions for our demands makes them an essential resource to rely on.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'We love our Email Template design – it’s a very neat design and fits well with our corporate identity. We regularly send email campaigns to send to our member list. The system in place is very efficient and we have had good feedback from our members on this.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'We have ongoing support from LightSpeed when and where needed – support is always available and very efficient. We also received one-on-one training on how to use MailChimp effectively and any additional training we may need is always available.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Angélique Visser', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', Chairperson @ ', 'ls-theme' ); ?></span><a href="<?php echo esc_url( 'https://www.fisa.net.za/' ); ?>"><?php echo esc_html__( 'Fiduciary Institute of South Africa', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'ShowMe', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'Our WordPress site was falling over due to the increase in our traffic. A very capable programming team told us to speak to LightSpeed. Thank Heavens! Within a few days our site was transferred to them and we were running smoothly again, after months of despair.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Beverly Theobald', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', CEO @ ', 'ls-theme' ); ?></span><a href="<?php echo esc_url( 'https://showme.co.za/' ); ?>"><?php echo esc_html__( 'ShowMe', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'SA Bike Fan', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'I just thought I’d take time to let you know that I am incredibly impressed by your teams service. I had an unexpected problem with my website after doing some routine updates at 10:30pm at night. After trying to sort things out myself I emailed you guys at 12:25am. To my surprise, Chris replied and in just under an hour had managed to resolve the issue. I don’t know of a single other web consultancy that has true 24hr support and the level of skill when it comes to the WordPress platform.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Scott Hayes', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', Business Owner @ SA Bike Fan', 'ls-theme' ); ?></span></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'Lufthansa InTouch', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'LightSpeed is managing the MailChimp account on behalf LH InTouch. The tasks include, RSS campaigns, List segmentation, Integrate WordPress plugin called AutoChimp – it synchronises the WordPress users with the MailChimp subscriber list – and template design. They offer on going support wherever needed.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Eva Sittig', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', Head of Global Communications @ ', 'ls-theme' ); ?></span><a href="<?php echo esc_url( 'https://blog.lh-intouch.com/' ); ?>"><?php echo esc_html__( 'Lufthansa InTouch', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'Cedarberg Africa', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'The review brought up some interesting points of improvement. It is clear that you took your time to personalize our site review, and I’m excited to make improvements. I appreciate your clear, detailed instructions, and the follow up links in each section for more information are helpful.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Kate Bergh', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', CEO of ', 'ls-theme' ); ?></span><a href="<?php echo esc_url( 'https://www.cedarberg-travel.com/' ); ?>"><?php echo esc_html__( 'Cedarberg Travel', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'Runners World', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'Thank you for absolutely EVERYTHING you’ve done for me and for our brands over the last few years. I have learned SO much from each and every single one of you, and so appreciate all the calls, Skype sessions, one-on-one training sessions and most of all, your unlimited patience with me. LightSpeed is a fantastic company, you guys are all INCREDIBLE humans, and I’ve just loved working with you all.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Penny Travena', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', Website Manager @ ', 'ls-theme' ); ?></span><a href="<?php echo esc_url( 'https://runnersworld.co.za/' ); ?>"><?php echo esc_html__( 'Runners World', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'Freelancentral', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'The LightSpeed team never fails to impress me with their passion, geeky interest in their industry, creativity and most importantly, unparalleled customer service. Nothing is too much trouble for Ashley and his team, who are a pleasure to work with.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Jo Duxbury', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', Founder of ', 'ls-theme' ); ?></span><a href="<?php echo esc_url( 'http://freelancentral.co.za/' ); ?>"><?php echo esc_html__( 'Freelancentral', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'FISA', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'The Fiduciary Institute of Southern Africa (FISA) has utilized the services of LightSpeed for the past 4 years. At all times, I have found the staff of the company to be highly professional and extremely competent in all their interactions with FISA, and I can highly recommend them to anyone.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Aaron Roup', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', Secretariat @ ', 'ls-theme' ); ?></span><a href="<?php echo esc_url( 'https://www.fisa.net.za/' ); ?>"><?php echo esc_html__( 'Fiduciary Institute of South Africa', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'Virtual Assistant', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'I am thrilled with the work Ashley and his team at LightSpeed put into creating my website. They fully understood what I needed and designed an extremely professional-looking site.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Sandra Gordon', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', Business Owner @ Virtual Assistant', 'ls-theme' ); ?></span></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'Allan Gray Orbis', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'It has been a refreshing experience working with Lightspeed. They are committed to find solutions that suit our organizational needs. What we appreciate most about them is their innovative approach and commitment to excellence.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Angela Coetzee', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', Program Manager @ ', 'ls-theme' ); ?></span><a href="<?php echo esc_url( 'https://allangrayorbis.org/' ); ?>"><?php echo esc_html__( 'Allan Gray Orbis', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'The Ridge Online', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'LightSpeed developed our site The Ridge Online with input from our side on how we wanted the site to look and how we would communicate with our readers. I found their work to be both creative and clean and tidy.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Garth Johnstone', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', Website Manager @ The Ridge Online Magazine', 'ls-theme' ); ?></span></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'Safari Hotel', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'Safari Hotels has worked with LightSpeed for a number of years. As a referral to us, we have enjoyed the punctual fashion in which our enquiries have always been dealt with and the very thorough approach taken when executing instructions.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Melissa Stroh', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', PR Manager @ Safari Hotels', 'ls-theme' ); ?></span></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'African Safaris', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'We contracted LightSpeed for the rebuild of our site. The brief included complex adherence to design, SEO and search functionality. The deadline they set was realistic and unlike previous website builds we’ve experienced; they stuck to it. We definitely intend to work with LightSpeed in the future.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Vanessa Ratcliffe', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', Business Partner @ ', 'ls-theme' ); ?></span><a href="<?php echo esc_url( 'http://www.africansafaris.com/' ); ?>"><?php echo esc_html__( 'African Safaris', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-plain ls-testimonial-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<article class="wp-block-group is-style-card-plain ls-testimonial-card">
				<!-- wp:icon {"icon":"lightspeed/quote","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"32px"}}} /-->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><?php echo esc_html__( 'Media24 Magazines', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote {"style":{"border":{"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"200"} -->
				<blockquote class="wp-block-quote has-200-font-size" style="border-left-style:none;border-left-width:0px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph -->
				<p><?php echo esc_html__( 'We are happy with the turnaround time on issues reported and the fact that our emails are acknowledged once received. Lightspeed is also always eager to help and will go the extra mile to learn the process & procedures of Media24.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph --></blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"fontSize":"200"} -->
					<p class="has-200-font-size"><strong><?php echo esc_html__( 'Rochelle de Beer', 'ls-theme' ); ?></strong><span style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( ', Project Manager @ Media24 Magazines', 'ls-theme' ); ?></span></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
