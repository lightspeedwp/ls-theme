<?php
/**
 * Title: Section - List Card Pair
 * Slug: ls-theme/list-card-pair
 * Categories: featured
 * Block Types: core/pattern
 * Description: Two equal bordered cards on the page canvas, each an H3, a lead paragraph and a core List. The first list is an ordered list whose numbers become round brand badges (CSS counters, so it stays a real ol), and the second is a bulleted list with brand-coloured bullets and bold lead-ins. The cards stack on mobile. Falls back to core/group and core/columns because no semantic core block fits a card; the badge numbers and bullet colour are SCSS because the list marker has no theme.json key.
 * Keywords: list, cards, steps, reasons, numbered, pair
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-referral-lists","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|30","bottom":"var:preset|spacing|80","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-referral-lists" style="margin-top:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:columns {"align":"wide","verticalAlignment":"top","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-top">

		<!-- wp:column {"verticalAlignment":"top"} -->
		<div class="wp-block-column is-vertically-aligned-top">
			<!-- wp:group {"className":"ls-referral-card","style":{"color":{"background":"var:custom|color|surface|card"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|300","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group ls-referral-card has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--300);background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'How referrals work', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'If you have friends or clients who need assistance with their WordPress website:', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"ordered":true,"className":"ls-referral-steps","fontSize":"200"} -->
				<ol class="wp-block-list ls-referral-steps has-200-font-size">
					<!-- wp:list-item -->
					<li><?php echo esc_html__( 'Notify your friend that you are submitting their details to LightSpeed and that they should expect an email and / or a call to the LightSpeed team.', 'ls-theme' ); ?></li>
					<!-- /wp:list-item -->

					<!-- wp:list-item -->
					<li><?php echo esc_html__( 'Next complete the referral form below.', 'ls-theme' ); ?></li>
					<!-- /wp:list-item -->

					<!-- wp:list-item -->
					<li><?php echo esc_html__( 'LightSpeed will contact your referral and provide them with professional (and awesome) advice on their website requirements.', 'ls-theme' ); ?></li>
					<!-- /wp:list-item -->

					<!-- wp:list-item -->
					<li><?php echo esc_html__( 'If our proposal is accepted, we will pay you your referral fee of 10% up to R10,000 for each referral that converts to a sale for us.', 'ls-theme' ); ?></li>
					<!-- /wp:list-item -->

					<!-- wp:list-item -->
					<li><?php echo esc_html__( 'After each payment we receive, we will pay it forward to you.', 'ls-theme' ); ?></li>
					<!-- /wp:list-item -->
				</ol>
				<!-- /wp:list -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"top"} -->
		<div class="wp-block-column is-vertically-aligned-top">
			<!-- wp:group {"className":"ls-referral-card","style":{"color":{"background":"var:custom|color|surface|card"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|300","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group ls-referral-card has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--300);background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"400"} -->
				<h3 class="wp-block-heading has-400-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Why refer LightSpeed?', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'You may have your own reasons for wanting to refer us, but we believe this sets us apart:', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"className":"ls-referral-reasons","fontSize":"200"} -->
				<ul class="wp-block-list ls-referral-reasons has-200-font-size">
					<!-- wp:list-item -->
					<li><strong><?php echo esc_html__( 'Our team have more than a decade as a WordPress Agency:', 'ls-theme' ); ?></strong> <?php echo esc_html__( 'we have been working with WordPress since 2007 and building Open Source products since 2014, view our work and our own LSX theme.', 'ls-theme' ); ?></li>
					<!-- /wp:list-item -->

					<!-- wp:list-item -->
					<li><strong><?php echo esc_html__( 'We are proud of the quality of our work:', 'ls-theme' ); ?></strong> <?php echo esc_html__( 'we design, build and maintain elegant and well-thought-out websites, using WordPress, WooCommerce and MailChimp.', 'ls-theme' ); ?></li>
					<!-- /wp:list-item -->

					<!-- wp:list-item -->
					<li><strong><?php echo esc_html__( 'We are dedicated to nurturing long term partners that help our clients grow:', 'ls-theme' ); ?></strong> <?php echo esc_html__( 'we understand that the most important ingredient of any business is its people, our team is ready to assist.', 'ls-theme' ); ?></li>
					<!-- /wp:list-item -->

					<!-- wp:list-item -->
					<li><?php echo esc_html__( 'Verified theme developers with theme & plugins on', 'ls-theme' ); ?> <a href="<?php echo esc_url( 'https://wordpress.org/themes/author/feedmymedia/' ); ?>"><?php echo esc_html__( 'WordPress.org', 'ls-theme' ); ?></a></li>
					<!-- /wp:list-item -->
				</ul>
				<!-- /wp:list -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
