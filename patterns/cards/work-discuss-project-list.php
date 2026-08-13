<?php
/**
 * Title: Card - Work Discuss Project List
 * Slug: ls-theme/work-discuss-project-list
 * Categories: cta
 * Block Types: core/pattern
 * Description: A checklist card used on the Work archive CTA to summarise the kinds of projects LightSpeed discusses. Adapts between light and dark mode using existing semantic tokens.
 * Keywords: work, checklist, cta, list
 * Viewport Width: 570
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"tagName":"article","style":{"color":{"background":"var:custom|color|surface|card","text":"var:custom|color|text|default"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|300","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<article class="wp-block-group has-border-color has-text-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--300);color:var(--wp--custom--color--text--default);background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:list {"className":"is-style-tick-accent"} -->
	<ul class="wp-block-list is-style-tick-accent">
		<!-- wp:list-item -->
		<li><?php echo esc_html__( 'WordPress platforms and publishing systems', 'ls-theme' ); ?></li>
		<!-- /wp:list-item -->

		<!-- wp:list-item -->
		<li><?php echo esc_html__( 'WooCommerce and subscription stores', 'ls-theme' ); ?></li>
		<!-- /wp:list-item -->

		<!-- wp:list-item -->
		<li><?php echo esc_html__( 'Design systems, tokens and governance', 'ls-theme' ); ?></li>
		<!-- /wp:list-item -->

		<!-- wp:list-item -->
		<li><?php echo esc_html__( 'Long-term platform care and performance work', 'ls-theme' ); ?></li>
		<!-- /wp:list-item -->
	</ul>
	<!-- /wp:list -->
</article>
<!-- /wp:group -->
