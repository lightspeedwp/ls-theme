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
<!-- wp:group {"tagName":"article","className":"is-style-card-checklist","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<article class="wp-block-group is-style-card-checklist">
	<!-- wp:list {"className":"is-style-tick-accent"} -->
	<ul class="wp-block-list is-style-tick-accent">
		<li><?php echo esc_html__( 'WordPress platforms and publishing systems', 'ls-theme' ); ?></li>
		<li><?php echo esc_html__( 'WooCommerce and subscription stores', 'ls-theme' ); ?></li>
		<li><?php echo esc_html__( 'Design systems, tokens and governance', 'ls-theme' ); ?></li>
		<li><?php echo esc_html__( 'Long-term platform care and performance work', 'ls-theme' ); ?></li>
	</ul>
	<!-- /wp:list -->
</article>
<!-- /wp:group -->
