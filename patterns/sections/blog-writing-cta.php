<?php
/**
 * Title: Section - Blog Writing CTA
 * Slug: ls-theme/blog-writing-cta
 * Categories: cta
 * Block Types: core/pattern
 * Description: The Blog archive's closing CTA: a bordered, monospace code-comment-style eyebrow
 * pill, a two-line heading (plain white first line, on-dark-accent second line), supporting
 * paragraph, and a single primary CTA button on the left; a decorative code-snippet card on
 * the right. A second, outline "Read the resources" button was removed — it linked back to
 * `/blog/`, the same page this section renders on, so it never had a distinct destination. Two-column layout via core/columns, which stacks automatically on mobile.
 * Permanently dark, independent of the light/dark style variation toggle, using the same on-dark
 * tokens as the Blog Hero. Rendered as a bounded, rounded card within the page margins (align:wide
 * + border + radius + padding), capped to a narrower max width than the theme's own wideSize —
 * see src/scss/structural/blog-writing-cta.scss (className ls-writing-cta) for that cap and the
 * badge's subtle cyan-tinted border, neither of which has a block-supports equivalent.
 * Keywords: blog, cta, writing, archive, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"align":"wide","tagName":"section","className":"ls-writing-cta","style":{"color":{"gradient":"linear-gradient(158deg,var(--wp--custom--color--surface--band-start) 0%,var(--wp--custom--color--surface--band-end) 100%)"},"border":{"color":"var:custom|color|border|on-dark","radius":"var:preset|border-radius|400","style":"solid","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|80","bottom":"var:preset|spacing|90","left":"var:preset|spacing|80"}}},"layout":{"type":"default"}} -->
<section class="wp-block-group alignwide ls-writing-cta has-border-color has-background" style="border-color:var(--wp--custom--color--border--on-dark);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--400);background:linear-gradient(158deg,var(--wp--custom--color--surface--band-start) 0%,var(--wp--custom--color--surface--band-end) 100%);padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--80)">

	<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|80"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center">

			<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">

				<!-- wp:group {"className":"ls-writing-cta-badge","style":{"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|20","bottom":"var:preset|spacing|5","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
				<div class="wp-block-group ls-writing-cta-badge" style="border-radius:var(--wp--preset--border-radius--500);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--20)">
					<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","letterSpacing":"var:custom|typography|letter-spacing|wide"},"color":{"text":"var(--wp--custom--color--text--on-dark-accent)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--on-dark-accent);font-family:var(--wp--preset--font-family--monospace);letter-spacing:var(--wp--custom--typography--letter-spacing--wide)"><?php echo esc_html__( '/* WRITING.NEXT */', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":2,"style":{"color":{"text":"var(--wp--custom--color--text--on-dark)"},"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"700"} -->
				<h2 class="wp-block-heading has-text-color has-700-font-size" style="color:var(--wp--custom--color--text--on-dark);margin-top:var(--wp--preset--spacing--20);font-weight:var(--wp--custom--typography--font-weight--extrabold)"><?php
				echo wp_kses_post(
					sprintf(
						/* translators: 1: heading line 1, plain white. 2: heading line 2, coloured with the text.on-dark-accent token, followed by a plain white full stop. */
						__( '%1$s<br />%2$s.', 'ls-theme' ),
						esc_html__( 'Architecture', 'ls-theme' ),
						'<span style="color:var(--wp--custom--color--text--on-dark-accent)">' . esc_html__( 'precedes aesthetics', 'ls-theme' ) . '</span>'
					)
				);
				?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--on-dark-muted)"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--on-dark-muted);margin-top:var(--wp--preset--spacing--20)"><?php echo esc_html__( "Before a single screen is designed, we agree the tokens, the governance and the audit trail. Aesthetic decisions follow architectural ones — that's how systems stay maintainable.", 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)">
					<!-- wp:button {"className":"is-style-button-primary-on-dark"} -->
					<div class="wp-block-button is-style-button-primary-on-dark"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>"><?php echo esc_html__( 'Book a consultation', 'ls-theme' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","width":"45%","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%;margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)">
				<!-- wp:pattern {"slug":"ls-theme/blog-code-snippet"} /-->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
</section>
<!-- /wp:group -->
