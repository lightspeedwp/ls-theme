<?php
/**
 * Title: Section - Homepage CTA
 * Slug: ls-theme/homepage-cta
 * Categories: cta
 * Block Types: core/pattern
 * Description: The Homepage's closing CTA: eyebrow, two-line heading, supporting paragraph, two
 * buttons (filled "Book a free consultation" using the same on-dark button as Blog Writing CTA,
 * and an outline "Send a brief first"), and a reassurance line on the left; a "What you'll leave
 * with" definition-list panel on the right. Two-column layout via core/columns, which stacks
 * automatically on mobile. Permanently dark, independent of the light/dark style variation
 * toggle, using the same on-dark tokens and gradient (surface.band-start/band-end) as
 * blog-writing-cta.php — bounded to a narrower max width than the theme's own wideSize, same
 * technique as that pattern (see src/scss/structural/homepage-cta.scss).
 * Keywords: homepage, cta, ready to start, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"wide","tagName":"section","className":"ls-homepage-cta","style":{"color":{"gradient":"linear-gradient(158deg,var(--wp--custom--color--surface--band-start) 0%,var(--wp--custom--color--surface--band-end) 100%)"},"border":{"color":"color-mix(in srgb, var(--wp--custom--color--text--on-dark) 10%, transparent)","radius":"var:preset|border-radius|400","style":"solid","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|80"}}},"layout":{"type":"default"}} -->
<section class="wp-block-group alignwide ls-homepage-cta has-border-color has-background" style="border-color:color-mix(in srgb, var(--wp--custom--color--text--on-dark) 10%, transparent);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--400);background:linear-gradient(158deg,var(--wp--custom--color--surface--band-start) 0%,var(--wp--custom--color--surface--band-end) 100%);padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--80)">

	<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|80"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:outermost/icon-block {"iconName":"","className":"has-text-color","width":"8px","style":{"color":{"text":"var(--wp--custom--color--text--on-dark-accent)"}}} -->
				<div class="wp-block-outermost-icon-block has-text-color"><div class="icon-container" style="color:var(--wp--custom--color--text--on-dark-accent);width:8px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"></circle></svg></div></div>
				<!-- /wp:outermost/icon-block -->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--on-dark-accent)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--on-dark-accent);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Ready to start?', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":2,"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"},"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"700"} -->
			<h2 class="wp-block-heading has-text-color has-700-font-size" style="color:var(--wp--custom--color--text--on-dark);margin-top:var(--wp--preset--spacing--20);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php echo esc_html__( 'Need a partner that can think beyond the redesign?', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--on-dark-muted);margin-top:var(--wp--preset--spacing--20)"><?php echo esc_html__( 'If the real challenge includes legacy complexity, content structure, migration pressure or long-term support, LightSpeed can help you work out the most practical route forward.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)">
				<!-- wp:button {"className":"is-style-button-primary-on-dark ls-homepage-cta-arrow"} -->
				<div class="wp-block-button is-style-button-primary-on-dark ls-homepage-cta-arrow"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>"><?php echo esc_html__( 'Book a free consultation', 'ls-theme' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline ls-homepage-cta-outline","style":{"color":{"text":"var(--wp--custom--color--text--on-dark)","background":"transparent"},"border":{"color":"color-mix(in srgb, var(--wp--custom--color--text--on-dark) 38%, transparent)","width":"1px","style":"solid","radius":"var:preset|border-radius|500"}},"fontSize":"200"} -->
				<div class="wp-block-button is-style-outline ls-homepage-cta-outline"><a class="wp-block-button__link has-text-color has-background has-border-color has-200-font-size wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" style="border-color:color-mix(in srgb, var(--wp--custom--color--text--on-dark) 38%, transparent);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--500);color:var(--wp--custom--color--text--on-dark);background-color:transparent"><?php echo esc_html__( 'Send a brief first', 'ls-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"300"} -->
			<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--on-dark-muted);margin-top:var(--wp--preset--spacing--20)"><?php echo esc_html__( 'Quick reply, usually within a working day.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
			<!-- wp:group {"className":"ls-homepage-cta-panel","style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--on-dark) 4%, transparent)"},"border":{"color":"color-mix(in srgb, var(--wp--custom--color--text--on-dark) 10%, transparent)","radius":"var:preset|border-radius|300","style":"solid","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flow"}} -->
			<div class="wp-block-group ls-homepage-cta-panel has-border-color has-background" style="border-color:color-mix(in srgb, var(--wp--custom--color--text--on-dark) 10%, transparent);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--300);background-color:color-mix(in srgb, var(--wp--custom--color--text--on-dark) 4%, transparent);padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">

				<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"var(--wp--custom--color--text--on-dark-accent)"},"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}},"fontSize":"200"} -->
				<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark-accent);margin-bottom:var(--wp--preset--spacing--10);font-family:var(--wp--preset--font-family--monospace);letter-spacing:var(--wp--custom--typography--letter-spacing--wide);text-transform:uppercase"><?php echo esc_html__( "What you'll leave with", 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"className":"ls-homepage-cta-panel__row","style":{"border":{"bottom":{"color":"color-mix(in srgb, var(--wp--custom--color--text--on-dark) 10%, transparent)","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group ls-homepage-cta-panel__row" style="border-bottom-color:color-mix(in srgb, var(--wp--custom--color--text--on-dark) 10%, transparent);border-bottom-style:solid;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10)">
					<!-- wp:paragraph {"className":"ls-homepage-cta-panel__label","style":{"typography":{"fontFamily":"var:preset|font-family|monospace"},"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"200"} -->
					<p class="ls-homepage-cta-panel__label has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark-muted);font-family:var(--wp--preset--font-family--monospace)"><?php echo esc_html__( 'Fit', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace"},"color":{"text":"var(--wp--custom--color--text--on-dark)"}},"fontSize":"200"} -->
					<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark);font-family:var(--wp--preset--font-family--monospace)"><?php echo esc_html__( 'Is LightSpeed the right partner?', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"ls-homepage-cta-panel__row","style":{"border":{"bottom":{"color":"color-mix(in srgb, var(--wp--custom--color--text--on-dark) 10%, transparent)","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group ls-homepage-cta-panel__row" style="border-bottom-color:color-mix(in srgb, var(--wp--custom--color--text--on-dark) 10%, transparent);border-bottom-style:solid;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10)">
					<!-- wp:paragraph {"className":"ls-homepage-cta-panel__label","style":{"typography":{"fontFamily":"var:preset|font-family|monospace"},"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"200"} -->
					<p class="ls-homepage-cta-panel__label has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark-muted);font-family:var(--wp--preset--font-family--monospace)"><?php echo esc_html__( 'Scope', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace"},"color":{"text":"var(--wp--custom--color--text--on-dark)"}},"fontSize":"200"} -->
					<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark);font-family:var(--wp--preset--font-family--monospace)"><?php echo esc_html__( 'Likely shape of the engagement', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"ls-homepage-cta-panel__row","style":{"border":{"bottom":{"color":"color-mix(in srgb, var(--wp--custom--color--text--on-dark) 10%, transparent)","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group ls-homepage-cta-panel__row" style="border-bottom-color:color-mix(in srgb, var(--wp--custom--color--text--on-dark) 10%, transparent);border-bottom-style:solid;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10)">
					<!-- wp:paragraph {"className":"ls-homepage-cta-panel__label","style":{"typography":{"fontFamily":"var:preset|font-family|monospace"},"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"200"} -->
					<p class="ls-homepage-cta-panel__label has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark-muted);font-family:var(--wp--preset--font-family--monospace)"><?php echo esc_html__( 'Next step', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace"},"color":{"text":"var(--wp--custom--color--text--on-dark)"}},"fontSize":"200"} -->
					<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark);font-family:var(--wp--preset--font-family--monospace)"><?php echo esc_html__( 'A bounded, useful first move', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"ls-homepage-cta-panel__row","style":{"spacing":{"padding":{"top":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group ls-homepage-cta-panel__row" style="padding-top:var(--wp--preset--spacing--10)">
					<!-- wp:paragraph {"className":"ls-homepage-cta-panel__label","style":{"typography":{"fontFamily":"var:preset|font-family|monospace"},"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"}},"fontSize":"200"} -->
					<p class="ls-homepage-cta-panel__label has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark-muted);font-family:var(--wp--preset--font-family--monospace)"><?php echo esc_html__( 'Timing', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace"},"color":{"text":"var(--wp--custom--color--text--on-dark)"}},"fontSize":"200"} -->
					<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--on-dark);font-family:var(--wp--preset--font-family--monospace)"><?php echo esc_html__( 'Realistic delivery window', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
