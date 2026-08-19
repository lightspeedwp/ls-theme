<?php
/**
 * Title: Card - Blog Code Snippet
 * Slug: ls-theme/blog-code-snippet
 * Categories: featured
 * Block Types: core/pattern
 * Description: A decorative code-panel card for the Writing CTA section: a line-numbered,
 * hand-syntax-coloured design-token sample. Reuses Card - Highlight Dark verbatim for the shell
 * (checked against it first — same radius/shadow/surface needs, so no separate card-code-panel
 * style was created). The code sample is authored as raw HTML (core/html, not core/code) so its
 * manual comment/keyword/value colour spans, and the CSS-counter line numbers, don't get flagged
 * as invalid RichText content by the block editor's validator — comments and property/directive
 * names use existing on-dark tokens, string/hex values reuse the same orange accent used
 * elsewhere in this card family (a single, literal, scoped use per the project's token policy —
 * one component, not worth a new semantic token), matching the reference design's
 * syntax-highlighted look as closely as existing tokens allow.
 * Keywords: blog, cta, code, snippet, card
 * Viewport Width: 420
 * Inserter: true
 *
 * @package ls-theme
 */

?>
<!-- wp:group {"tagName":"article","className":"is-style-card-highlight-dark","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<article class="wp-block-group is-style-card-highlight-dark">

	<!-- wp:html -->
	<pre class="wp-block-code has-text-color has-background has-100-font-size ls-code-panel" style="color:var(--wp--custom--color--text--on-dark);background-color:transparent;font-size:var(--wp--preset--font-size--100)"><code><span class="ls-code-line"><span class="ls-code-comment">// design tokens — single source of truth</span></span>
<span class="ls-code-line"><span class="ls-code-key">--c-brand-blue</span>: <span class="ls-code-value">#1E6AFF</span>;</span>
<span class="ls-code-line"><span class="ls-code-key">--c-light-blue</span>: <span class="ls-code-value">#7BE7FF</span>;</span>
<span class="ls-code-line"><span class="ls-code-key">--font-display</span>: <span class="ls-code-value">"Inter"</span>;</span>
<span class="ls-code-line"><span class="ls-code-comment">// governance: WCAG 2.2 AA, GPL, AI-disclosed</span></span>
<span class="ls-code-line"><span class="ls-code-key">@audit</span> <span class="ls-code-value">"contrast"</span>, <span class="ls-code-value">"focus"</span>, <span class="ls-code-value">"motion"</span>;</span>
<span class="ls-code-line"><span class="ls-code-key">@ship</span> design-system → production;</span></code></pre>
	<!-- /wp:html -->
</article>
<!-- /wp:group -->
