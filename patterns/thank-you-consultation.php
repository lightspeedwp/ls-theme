<?php
/**
 * Title: Thank You - Consultation
 * Slug: ls-theme/thank-you-consultation
 * Categories: featured
 * Block Types: core/pattern
 * Description: Confirmation content for the Free Consultation Gravity Forms thank-you page — status badge, confirmation copy, next-steps card, and a "while you wait" card row.
 * Keywords: thank you, confirmation, consultation
 * Viewport Width: 1200
 * Inserter: true
 */

?>
<!-- wp:group {"className":"ls-thank-you","layout":{"type":"constrained","contentSize":"800px"}} -->
<div class="wp-block-group ls-thank-you">

	<!-- wp:group {"className":"ls-thank-you__breadcrumb","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-thank-you__breadcrumb">
		<!-- wp:paragraph {"className":"ls-thank-you__breadcrumb-item","style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"typography":{"textTransform":"uppercase","letterSpacing":"1.2px"}},"fontSize":"x-small"} -->
		<p class="ls-thank-you__breadcrumb-item has-x-small-font-size" style="color:var(--wp--custom--color--text--muted);letter-spacing:1.2px;text-transform:uppercase"><?php echo esc_html__( 'Home', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"ls-thank-you__breadcrumb-sep","style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"typography":{"textTransform":"uppercase","letterSpacing":"1.2px"}},"fontSize":"x-small"} -->
		<p class="ls-thank-you__breadcrumb-sep has-x-small-font-size" style="color:var(--wp--custom--color--text--muted);letter-spacing:1.2px;text-transform:uppercase">/</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"ls-thank-you__breadcrumb-item","style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"typography":{"textTransform":"uppercase","letterSpacing":"1.2px"}},"fontSize":"x-small"} -->
		<p class="ls-thank-you__breadcrumb-item has-x-small-font-size" style="color:var(--wp--custom--color--text--muted);letter-spacing:1.2px;text-transform:uppercase"><?php echo esc_html__( 'Free consultation', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"ls-thank-you__status","layout":{"type":"flex","verticalAlignment":"center","flexWrap":"nowrap"}} -->
	<div class="wp-block-group ls-thank-you__status">
		<!-- wp:group {"className":"ls-thank-you__status-icon","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
		<div class="wp-block-group ls-thank-you__status-icon">
			<!-- wp:outermost/icon-block {"iconName":"check","width":"16px","style":{"color":{"text":"var(--wp--custom--color--icon--color)","background":"var(--wp--custom--color--icon--background)"}}} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"className":"ls-thank-you__status-label","style":{"color":{"text":"var(--wp--preset--color--success-foreground)"},"typography":{"textTransform":"uppercase","letterSpacing":"1.2px"}},"fontSize":"x-small"} -->
		<p class="ls-thank-you__status-label has-x-small-font-size" style="color:var(--wp--preset--color--success-foreground);letter-spacing:1.2px;text-transform:uppercase"><?php echo esc_html__( 'Request received', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:heading {"level":1,"style":{"color":{"text":"var(--wp--custom--color--text--default)"}}} -->
	<h1 class="wp-block-heading" style="color:var(--wp--custom--color--text--default)"><?php echo esc_html__( "Thanks — we've got your consultation request.", 'ls-theme' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"ls-thank-you__lead","style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
	<p class="ls-thank-you__lead" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( "You do not need to submit the form again. We'll be in touch soon. We've also sent you a confirmation email. If you don't see it, check your spam or junk folder.", 'ls-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"className":"is-style-card-feature ls-thank-you__next","layout":{"type":"constrained"}} -->
	<div class="wp-block-group is-style-card-feature ls-thank-you__next">
		<!-- wp:heading {"level":2,"style":{"color":{"text":"var(--wp--custom--color--text--default)"}},"fontSize":"medium"} -->
		<h2 class="wp-block-heading has-medium-font-size" style="color:var(--wp--custom--color--text--default)"><?php echo esc_html__( 'What happens next', 'ls-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:group {"className":"ls-thank-you__tick-list","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
		<div class="wp-block-group ls-thank-you__tick-list">
			<!-- wp:group {"className":"ls-thank-you__tick-item","layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group ls-thank-you__tick-item">
				<!-- wp:outermost/icon-block {"iconName":"check","width":"16px","style":{"color":{"text":"var(--wp--preset--color--success-foreground)"}}} /-->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
				<p style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( "We'll read through your message and check what kind of help you need.", 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"ls-thank-you__tick-item","layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group ls-thank-you__tick-item">
				<!-- wp:outermost/icon-block {"iconName":"check","width":"16px","style":{"color":{"text":"var(--wp--preset--color--success-foreground)"}}} /-->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
				<p style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( "We'll reply with available times or a recommended next step.", 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"ls-thank-you__tick-item","layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group ls-thank-you__tick-item">
				<!-- wp:outermost/icon-block {"iconName":"check","width":"16px","style":{"color":{"text":"var(--wp--preset--color--success-foreground)"}}} /-->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}}} -->
				<p style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( "On the call, we'll talk through your goals, current website or project, timing, budget range if relevant, and whether LightSpeed is the right fit.", 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"className":"ls-thank-you__return is-style-link-arrow-accent"} -->
	<p class="ls-thank-you__return is-style-link-arrow-accent"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Return to the homepage', 'ls-theme' ); ?></a></p>
	<!-- /wp:paragraph -->

	<!-- wp:separator {"className":"ls-thank-you__divider","style":{"color":{"text":"var(--wp--custom--color--border--card)"}}} -->
	<hr class="wp-block-separator has-text-color ls-thank-you__divider" style="color:var(--wp--custom--color--border--card)"/>
	<!-- /wp:separator -->

	<!-- wp:group {"className":"ls-thank-you__waiting-intro","layout":{"type":"constrained"}} -->
	<div class="wp-block-group ls-thank-you__waiting-intro">
		<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"typography":{"textTransform":"uppercase","letterSpacing":"1.2px"}},"fontSize":"x-small"} -->
		<p class="has-x-small-font-size" style="color:var(--wp--custom--color--text--muted);letter-spacing:1.2px;text-transform:uppercase"><?php echo esc_html__( 'While you wait', 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"x-small"} -->
		<p class="has-x-small-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( "A few things worth a look before we're in touch.", 'ls-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"ls-thank-you__cards","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"stretch"}} -->
	<div class="wp-block-group ls-thank-you__cards">

		<!-- wp:group {"tagName":"article","className":"is-style-card-feature ls-thank-you__card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
		<article class="wp-block-group is-style-card-feature ls-thank-you__card">
			<!-- wp:group {"className":"ls-card__icon-shell","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
			<div class="wp-block-group ls-card__icon-shell">
				<!-- wp:outermost/icon-block {"iconName":"users","width":"18px"} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"ls-card-feature__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<div class="wp-block-group ls-card-feature__content">
				<!-- wp:heading {"level":3,"fontSize":"x-small"} -->
				<h3 class="wp-block-heading has-x-small-font-size"><?php echo esc_html__( 'Meet the team', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"x-small"} -->
				<p class="has-x-small-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( "The people you'll likely be speaking with.", 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"className":"ls-card-feature__cta is-style-link-arrow-accent","fontSize":"x-small"} -->
			<p class="ls-card-feature__cta is-style-link-arrow-accent has-x-small-font-size"><a href="<?php echo esc_url( home_url( '/about/team/' ) ); ?>"><?php echo esc_html__( 'Say hello', 'ls-theme' ); ?></a></p>
			<!-- /wp:paragraph -->
		</article>
		<!-- /wp:group -->

		<!-- wp:group {"tagName":"article","className":"is-style-card-feature ls-thank-you__card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
		<article class="wp-block-group is-style-card-feature ls-thank-you__card">
			<!-- wp:group {"className":"ls-card__icon-shell","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
			<div class="wp-block-group ls-card__icon-shell">
				<!-- wp:outermost/icon-block {"iconName":"lightbulb","width":"18px"} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"ls-card-feature__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<div class="wp-block-group ls-card-feature__content">
				<!-- wp:heading {"level":3,"fontSize":"x-small"} -->
				<h3 class="wp-block-heading has-x-small-font-size"><?php echo esc_html__( 'Our culture', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"x-small"} -->
				<p class="has-x-small-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'How we work, and what we care about.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"className":"ls-card-feature__cta is-style-link-arrow-accent","fontSize":"x-small"} -->
			<p class="ls-card-feature__cta is-style-link-arrow-accent has-x-small-font-size"><a href="<?php echo esc_url( home_url( '/about/culture/' ) ); ?>"><?php echo esc_html__( 'Take a look', 'ls-theme' ); ?></a></p>
			<!-- /wp:paragraph -->
		</article>
		<!-- /wp:group -->

		<!-- wp:group {"tagName":"article","className":"is-style-card-feature ls-thank-you__card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
		<article class="wp-block-group is-style-card-feature ls-thank-you__card">
			<!-- wp:group {"className":"ls-card__icon-shell","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","flexWrap":"nowrap"}} -->
			<div class="wp-block-group ls-card__icon-shell">
				<!-- wp:outermost/icon-block {"iconName":"buildings","width":"18px"} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"ls-card-feature__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<div class="wp-block-group ls-card-feature__content">
				<!-- wp:heading {"level":3,"fontSize":"x-small"} -->
				<h3 class="wp-block-heading has-x-small-font-size"><?php echo esc_html__( 'About LightSpeed', 'ls-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"x-small"} -->
				<p class="has-x-small-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'A bit more on who we are and how we started.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"className":"ls-card-feature__cta is-style-link-arrow-accent","fontSize":"x-small"} -->
			<p class="ls-card-feature__cta is-style-link-arrow-accent has-x-small-font-size"><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php echo esc_html__( 'Read more', 'ls-theme' ); ?></a></p>
			<!-- /wp:paragraph -->
		</article>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
