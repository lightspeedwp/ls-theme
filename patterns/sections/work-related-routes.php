<?php
/**
 * Title: Section - Work Related Routes
 * Slug: ls-theme/work-related-routes
 * Categories: featured
 * Block Types: core/pattern
 * Description: The Work archive's "Where to go next" section: eyebrow badge, heading, and an 8-tile grid of related-route links using the Card - Link Row style.
 * Keywords: work, related routes, navigation, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"wide","tagName":"section","className":"is-style-content-band","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignwide is-style-content-band">

	<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"8px","style":{"color":{"text":"var(--wp--custom--color--icon--background)"}}} -->
			<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--icon--background);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
			<!-- /wp:outermost/icon-block -->

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Related routes', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:heading {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"500"} -->
		<h2 class="wp-block-heading has-500-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Where to go next', 'ls-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"grid","minimumColumnWidth":"280px","columnGap":"var:preset|spacing|20","rowGap":"var:preset|spacing|20"}} -->
		<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--30)">

			<!-- wp:pattern {"slug":"ls-theme/work-next-steps-card"} /-->

			<!-- wp:group {"tagName":"article","className":"is-style-card-link-row","layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"top","flexWrap":"wrap"}} -->
			<article class="wp-block-group is-style-card-link-row">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"200"} -->
					<p class="has-200-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><a class="ls-card-link-row__link" href="#"><?php echo esc_html__( 'Why LightSpeed', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Capability positioning.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"13px","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"}}} -->
				<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--text--subtle);width:13px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg></div></div>
				<!-- /wp:outermost/icon-block -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-link-row","layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"top","flexWrap":"wrap"}} -->
			<article class="wp-block-group is-style-card-link-row">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"200"} -->
					<p class="has-200-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><a class="ls-card-link-row__link" href="#"><?php echo esc_html__( 'All solutions', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Routes by problem type.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"13px","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"}}} -->
				<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--text--subtle);width:13px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg></div></div>
				<!-- /wp:outermost/icon-block -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-link-row","layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"top","flexWrap":"wrap"}} -->
			<article class="wp-block-group is-style-card-link-row">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"200"} -->
					<p class="has-200-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><a class="ls-card-link-row__link" href="#"><?php echo esc_html__( 'WordPress solutions', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'For content-heavy platforms.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"13px","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"}}} -->
				<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--text--subtle);width:13px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg></div></div>
				<!-- /wp:outermost/icon-block -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-link-row","layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"top","flexWrap":"wrap"}} -->
			<article class="wp-block-group is-style-card-link-row">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"200"} -->
					<p class="has-200-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><a class="ls-card-link-row__link" href="#"><?php echo esc_html__( 'WooCommerce solutions', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'For serious commerce work.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"13px","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"}}} -->
				<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--text--subtle);width:13px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg></div></div>
				<!-- /wp:outermost/icon-block -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-link-row","layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"top","flexWrap":"wrap"}} -->
			<article class="wp-block-group is-style-card-link-row">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"200"} -->
					<p class="has-200-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><a class="ls-card-link-row__link" href="#"><?php echo esc_html__( 'Design system solutions', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Reusable pattern work.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"13px","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"}}} -->
				<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--text--subtle);width:13px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg></div></div>
				<!-- /wp:outermost/icon-block -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-link-row","layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"top","flexWrap":"wrap"}} -->
			<article class="wp-block-group is-style-card-link-row">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"200"} -->
					<p class="has-200-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><a class="ls-card-link-row__link" href="#"><?php echo esc_html__( 'Testimonials', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Approved client praise.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"13px","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"}}} -->
				<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--text--subtle);width:13px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg></div></div>
				<!-- /wp:outermost/icon-block -->
			</article>
			<!-- /wp:group -->

			<!-- wp:group {"tagName":"article","className":"is-style-card-link-row","layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"top","flexWrap":"wrap"}} -->
			<article class="wp-block-group is-style-card-link-row">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|semibold"}},"fontSize":"200"} -->
					<p class="has-200-font-size" style="font-weight:var(--wp--custom--typography--font-weight--semibold)"><a class="ls-card-link-row__link" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php echo esc_html__( 'Contact', 'ls-theme' ); ?></a></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Start a conversation.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"13px","style":{"color":{"text":"var(--wp--custom--color--text--subtle)"}}} -->
				<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--text--subtle);width:13px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg></div></div>
				<!-- /wp:outermost/icon-block -->
			</article>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
