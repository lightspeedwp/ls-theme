<?php
/**
 * Title: Section - Thank You Confirmation
 * Slug: ls-theme/thank-you-confirmation
 * Categories: featured
 * Block Types: core/pattern
 * Description: A reusable form-confirmation section for every thank-you page, written with neutral placeholder copy to overwrite per page: Yoast breadcrumb, a success status badge (check icon and label), H1, a lead paragraph, a primary home button, a "what happens next" card with a tick list (add or remove items freely), and a "while you wait" row of three whole-card links to the About pages below a top border. Delete the card or the row on pages that do not need them, and insert the page-specific blocks (for example the audit downloads or MailPoet output) between the sections. Insert it as blocks rather than by slug so each page's copy stays editable. Falls back to core/group because no semantic core block renders a card, and uses the Card - Plain and Card - Service Tile styles plus the Tick Accent list style. The success colour reads the status.success token, which has its own light and dark values. No new SCSS.
 * Keywords: thank you, confirmation, success, form, next steps, cards, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_next_steps = array(
	__( 'We’ve received your details and will read through them.', 'ls-theme' ),
	__( 'We’ll get back to you with the next step.', 'ls-theme' ),
	__( 'If you don’t hear from us, check your spam or junk folder.', 'ls-theme' ),
);

$ls_wait_cards = array(
	array(
		'icon'  => 'users',
		'title' => __( 'Meet the team', 'ls-theme' ),
		'text'  => __( 'The people you’ll likely be speaking with.', 'ls-theme' ),
		'label' => __( 'Say hello', 'ls-theme' ),
		'path'  => '/about/team/',
	),
	array(
		'icon'  => 'lightbulb',
		'title' => __( 'Our culture', 'ls-theme' ),
		'text'  => __( 'How we work, and what we care about.', 'ls-theme' ),
		'label' => __( 'Take a look', 'ls-theme' ),
		'path'  => '/about/culture/',
	),
	array(
		'icon'  => 'buildings',
		'title' => __( 'About LightSpeed', 'ls-theme' ),
		'text'  => __( 'A bit more on who we are and how we started.', 'ls-theme' ),
		'label' => __( 'Read more', 'ls-theme' ),
		'path'  => '/about/',
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">

		<?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
		<!-- wp:yoast-seo/breadcrumbs {"className":"alignwide"} /-->
		<?php endif; ?>

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained","contentSize":"900px","justifyContent":"center"}} -->
		<div class="wp-block-group">

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","contentSize":"760px","justifyContent":"center"}} -->
		<div class="wp-block-group">

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/seal-check","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--status--success)"},"dimensions":{"width":"20px"}}} /-->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--status--success)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--status--success);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Request received', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold","lineHeight":"var:custom|line-height|heading-tight","letterSpacing":"var:custom|typography|letter-spacing|tighter"}},"fontSize":"800"} -->
			<h1 class="wp-block-heading has-text-align-center has-800-font-size" style="font-weight:var(--wp--custom--typography--font-weight--extrabold);letter-spacing:var(--wp--custom--typography--letter-spacing--tighter);line-height:var(--wp--custom--line-height--heading-tight)"><?php echo esc_html__( 'Thanks — we’ve got your request.', 'ls-theme' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
			<p class="has-text-align-center has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'You don’t need to submit the form again. Here’s what to expect, and a few things worth a look in the meantime.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--20)">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Return to the homepage', 'ls-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-card-plain","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"default"}} -->
		<div class="wp-block-group is-style-card-plain" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"500"} -->
			<h2 class="wp-block-heading has-500-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html__( 'What happens next', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:list {"className":"is-style-tick-accent"} -->
			<ul class="wp-block-list is-style-tick-accent">
				<?php foreach ( $ls_next_steps as $ls_next_step ) : ?>
				<!-- wp:list-item -->
				<li><?php echo esc_html( $ls_next_step ); ?></li>
				<!-- /wp:list-item -->
				<?php endforeach; ?>
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"blockGap":"var:preset|spacing|50","padding":{"top":"var:preset|spacing|60"}}},"layout":{"type":"default"}} -->
		<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--60)">

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"constrained","contentSize":"760px","justifyContent":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"500"} -->
				<h2 class="wp-block-heading has-text-align-center has-500-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html__( 'While you wait', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
				<p class="has-text-align-center has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'A few things worth a look before we’re in touch.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"14rem"}} -->
			<div class="wp-block-group">
				<?php foreach ( $ls_wait_cards as $ls_wait_card ) : ?>

				<!-- wp:group {"tagName":"article","className":"is-style-card-service-tile","style":{"dimensions":{"minHeight":"100%"},"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
				<article class="wp-block-group is-style-card-service-tile" style="min-height:100%;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
					<!-- wp:group {"className":"ls-icon-well-brand"} -->
					<div class="wp-block-group ls-icon-well-brand">
						<!-- wp:icon {"icon":"lightspeed/<?php echo esc_attr( $ls_wait_card['icon'] ); ?>"} /-->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"ls-card-service-tile__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
					<div class="wp-block-group ls-card-service-tile__content">
						<!-- wp:heading {"level":3,"fontSize":"300"} -->
						<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html( $ls_wait_card['title'] ); ?></h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"color":{"text":"var:custom|color|text|muted"}},"fontSize":"200"} -->
						<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_wait_card['text'] ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"className":"is-style-link-arrow-accent"} -->
					<p class="is-style-link-arrow-accent"><a class="ls-card-service-tile__link" href="<?php echo esc_url( home_url( $ls_wait_card['path'] ) ); ?>"><?php echo esc_html( $ls_wait_card['label'] ); ?></a></p>
					<!-- /wp:paragraph -->
				</article>
				<!-- /wp:group -->
				<?php endforeach; ?>
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
