<?php
/**
 * Title: Card - Blog Code Snippet
 * Slug: ls-theme/blog-code-snippet
 * Categories: featured
 * Block Types: core/pattern
 * Description: A decorative code-panel card for the Writing CTA section: traffic-light window dots, a filename label, and a short code sample. Reuses Card - Highlight Dark verbatim for the shell (checked against it first — same radius/shadow/surface needs, so no separate card-code-panel style was created). The window dots reuse the existing error/warning/success palette colours; the filename label's orange accent (#FFB86E) is a single, literal, scoped use per the project's token policy — one component, not worth a new semantic token.
 * Keywords: blog, cta, code, snippet, card
 * Viewport Width: 420
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"tagName":"article","className":"is-style-card-highlight-dark","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<article class="wp-block-group is-style-card-highlight-dark">

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:html -->
		<span aria-hidden="true" style="display:inline-flex;width:10px;height:10px;border-radius:9999px;background-color:var(--wp--preset--color--error-foreground)"></span>
		<!-- /wp:html -->

		<!-- wp:html -->
		<span aria-hidden="true" style="display:inline-flex;width:10px;height:10px;border-radius:9999px;background-color:var(--wp--preset--color--warning-foreground)"></span>
		<!-- /wp:html -->

		<!-- wp:html -->
		<span aria-hidden="true" style="display:inline-flex;width:10px;height:10px;border-radius:9999px;background-color:var(--wp--preset--color--success-foreground)"></span>
		<!-- /wp:html -->
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"1px"},"color":{"text":"#FFB86E"}},"fontSize":"100"} -->
	<p class="has-text-color has-100-font-size" style="color:#FFB86E;font-family:var(--wp--preset--font-family--monospace);letter-spacing:1px;text-transform:uppercase"><?php echo esc_html__( 'inc/blog-card-colors.php', 'ls-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:code {"style":{"color":{"background":"transparent","text":"var(--wp--custom--color--text--on-dark)"}}} -->
	<pre class="wp-block-code has-text-color has-background" style="color:var(--wp--custom--color--text--on-dark);background-color:transparent"><code><?php echo esc_html( "add_filter( 'render_block', function ( \$content, \$block ) {\n\t\$terms = wp_get_post_terms( get_the_ID(), 'category', [ 'fields' => 'slugs' ] );\n\treturn ls_theme_tint_by_category( \$content, \$terms );\n} );" ); ?></code></pre>
	<!-- /wp:code -->
</article>
<!-- /wp:group -->
