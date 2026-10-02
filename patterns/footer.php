<?php
/**
 * Title: Footer
 * Slug: ls-theme/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Full site footer — company summary with proof points, 6-section link grid mirroring the header nav, and legal/social bottom bar. Core-block fallbacks: core/image x2 for the logo (core/site-logo cannot swap by colour scheme), core/group + core/paragraph for the proof cards and availability badge (no semantic core equivalent), core/paragraph links for the nav lists.
 *
 * @package ls-theme
 */

?>

<!-- wp:group {"tagName":"footer","metadata":{"patternName":"ls-theme/footer","name":"Footer","description":"Full site footer — company summary with proof points, 6-section link grid mirroring the header nav, and legal/social bottom bar. Core-block fallbacks: core/image x2 for the logo (core/site-logo cannot swap by colour scheme), core/group + core/paragraph for the proof cards and availability badge (no semantic core equivalent), core/paragraph links for the nav lists.","categories":["footer"]},"className":"site-footer","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|60","bottom":"var:preset|spacing|80","left":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<footer class="wp-block-group site-footer" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--60)"><!-- wp:columns {"align":"wide","className":"site-footer__columns","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|80"}}}} -->
<div class="wp-block-columns alignwide site-footer__columns"><!-- wp:column {"width":"35%","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
<div class="wp-block-column" style="flex-basis:35%"><!-- wp:pattern {"slug":"ls-theme/site-logo-switcher"} /-->

<!-- wp:paragraph {"style":{"color":{"text":"var:custom|color|text|muted"}}} -->
<p class="has-text-color" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'Premium WordPress and WooCommerce design, development and care for teams who need practical systems, not fragile one-off pages.', 'ls-theme' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"color":{"background":"var:custom|color|surface|success-tint"},"border":{"color":"var:custom|color|status|success","width":"1px","style":"solid","radius":"var:preset|border-radius|500"},"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|20","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center","justifyContent":"center"}} -->
<div class="wp-block-group has-border-color has-background" style="border-color:var(--wp--custom--color--status--success);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--500);background-color:var(--wp--custom--color--surface--success-tint);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)"><!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--status--success)"},"dimensions":{"width":"8px"}}} /-->

<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"},"color":{"text":"var(--wp--custom--color--status--success)"}},"fontSize":"100"} -->
<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--status--success);text-transform:uppercase"><?php echo esc_html__( 'Available for selected projects', 'ls-theme' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|10"}}}} -->
<div class="wp-block-columns is-not-stacked-on-mobile"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"ls-footer-proof-card","style":{"color":{"background":"var:custom|color|surface|card","text":"var:custom|color|text|muted"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|300","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|5","padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<div class="wp-block-group ls-footer-proof-card has-border-color has-text-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--300);color:var(--wp--custom--color--text--muted);background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var:custom|color|text|default"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"100"} -->
<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--default);margin-top:0;margin-bottom:0;font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( '15+', 'ls-theme' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textTransform":"capitalize"},"color":{"text":"var:custom|color|text|muted"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"100"} -->
<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted);margin-top:0;margin-bottom:0;text-transform:capitalize"><?php echo esc_html__( 'Years building WordPress sites', 'ls-theme' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"ls-footer-proof-card","style":{"color":{"background":"var:custom|color|surface|card","text":"var:custom|color|text|muted"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|300","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|5","padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<div class="wp-block-group ls-footer-proof-card has-border-color has-text-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--300);color:var(--wp--custom--color--text--muted);background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var:custom|color|text|default"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"100"} -->
<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--default);margin-top:0;margin-bottom:0;font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'AA', 'ls-theme' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textTransform":"capitalize"},"color":{"text":"var:custom|color|text|muted"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"100"} -->
<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted);margin-top:0;margin-bottom:0;text-transform:capitalize"><?php echo esc_html__( 'Accessibility target for launches', 'ls-theme' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"ls-footer-proof-card","style":{"color":{"background":"var:custom|color|surface|card","text":"var:custom|color|text|muted"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|300","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|5","padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<div class="wp-block-group ls-footer-proof-card has-border-color has-text-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--300);color:var(--wp--custom--color--text--muted);background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var:custom|color|text|default"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"100"} -->
<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--default);margin-top:0;margin-bottom:0;font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( '100%', 'ls-theme' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textTransform":"capitalize"},"color":{"text":"var:custom|color|text|muted"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"100"} -->
<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted);margin-top:0;margin-bottom:0;text-transform:capitalize"><?php echo esc_html__( 'Block-theme workflow focused', 'ls-theme' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"footer-nav-columns","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"grid","columnCount":3}} -->
<div class="wp-block-group footer-nav-columns"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

<!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold","lineHeight":"var:custom|line-height|paragraph"},"color":{"text":"var:custom|color|text|subtle"}},"fontSize":"100","fontFamily":"body"} -->
<h2 class="wp-block-heading has-text-color has-body-font-family has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);line-height:var(--wp--custom--line-height--paragraph);text-transform:uppercase"><?php echo esc_html__( 'Services', 'ls-theme' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/services/discovery/' ) ); ?>"><?php echo esc_html__( 'Discovery', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/services/design/' ) ); ?>"><?php echo esc_html__( 'Design', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/services/development/' ) ); ?>"><?php echo esc_html__( 'Development', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/services/migrations/' ) ); ?>"><?php echo esc_html__( 'Migrations', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/services/performance/' ) ); ?>"><?php echo esc_html__( 'Performance', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/services/support/' ) ); ?>"><?php echo esc_html__( 'Support', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"is-style-link-arrow-accent","fontSize":"100"} -->
<p class="is-style-link-arrow-accent has-100-font-size"><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php echo esc_html__( 'See all services', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

<!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold","lineHeight":"var:custom|line-height|paragraph"},"color":{"text":"var:custom|color|text|subtle"}},"fontSize":"100","fontFamily":"body"} -->
<h2 class="wp-block-heading has-text-color has-body-font-family has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);line-height:var(--wp--custom--line-height--paragraph);text-transform:uppercase"><?php echo esc_html__( 'Solutions', 'ls-theme' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/solutions/wordpress/' ) ); ?>"><?php echo esc_html__( 'WordPress', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/solutions/publishing/' ) ); ?>"><?php echo esc_html__( 'Publishing', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/solutions/ai/' ) ); ?>"><?php echo esc_html__( 'AI', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/solutions/woocommerce/' ) ); ?>"><?php echo esc_html__( 'WooCommerce', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/solutions/tour-operators/' ) ); ?>"><?php echo esc_html__( 'Tour Operators', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/solutions/design-systems/' ) ); ?>"><?php echo esc_html__( 'Design Systems', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"is-style-link-arrow-accent","fontSize":"100"} -->
<p class="is-style-link-arrow-accent has-100-font-size"><a href="<?php echo esc_url( home_url( '/solutions/' ) ); ?>"><?php echo esc_html__( 'See all solutions', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

<!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold","lineHeight":"var:custom|line-height|paragraph"},"color":{"text":"var:custom|color|text|subtle"}},"fontSize":"100","fontFamily":"body"} -->
<h2 class="wp-block-heading has-text-color has-body-font-family has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);line-height:var(--wp--custom--line-height--paragraph);text-transform:uppercase"><?php echo esc_html__( 'Work', 'ls-theme' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/work/drive-botswana-case-study/' ) ); ?>"><?php echo esc_html__( 'Drive Botswana', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/work/novus-media-design-at-scale/' ) ); ?>"><?php echo esc_html__( 'Novus Media', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/work/slimmer-met-sarie/' ) ); ?>"><?php echo esc_html__( 'Slimmer met SARIE', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/work/xneelo/' ) ); ?>"><?php echo esc_html__( 'xneelo', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/testimonials/' ) ); ?>"><?php echo esc_html__( 'Testimonials', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"is-style-link-arrow-accent","fontSize":"100"} -->
<p class="is-style-link-arrow-accent has-100-font-size"><a href="<?php echo esc_url( home_url( '/work/' ) ); ?>"><?php echo esc_html__( 'See all work', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

<!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold","lineHeight":"var:custom|line-height|paragraph"},"color":{"text":"var:custom|color|text|subtle"}},"fontSize":"100","fontFamily":"body"} -->
<h2 class="wp-block-heading has-text-color has-body-font-family has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);line-height:var(--wp--custom--line-height--paragraph);text-transform:uppercase"><?php echo esc_html__( 'Pricing', 'ls-theme' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/pricing/foundation/' ) ); ?>"><?php echo esc_html__( 'Foundation', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/pricing/growth/' ) ); ?>"><?php echo esc_html__( 'Growth', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/pricing/enterprise/' ) ); ?>"><?php echo esc_html__( 'Enterprise', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/website-packages/' ) ); ?>"><?php echo esc_html__( 'Website packages', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"is-style-link-arrow-accent","fontSize":"100"} -->
<p class="is-style-link-arrow-accent has-100-font-size"><a href="<?php echo esc_url( home_url( '/pricing/pricing-principles/' ) ); ?>"><?php echo esc_html__( 'See pricing principles', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

<!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold","lineHeight":"var:custom|line-height|paragraph"},"color":{"text":"var:custom|color|text|subtle"}},"fontSize":"100","fontFamily":"body"} -->
<h2 class="wp-block-heading has-text-color has-body-font-family has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);line-height:var(--wp--custom--line-height--paragraph);text-transform:uppercase"><?php echo esc_html__( 'Insights', 'ls-theme' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/lsx-design-system-for-wordpress-a-powerful-open-source-tool-for-designers-and-developers/' ) ); ?>"><?php echo esc_html__( 'The LSX Design System', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/our-lsx-theme-is-gutenberg-compatible-and-thats-just-the-beginning/' ) ); ?>"><?php echo esc_html__( 'Built for the Block Editor', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/website-discovery-process/' ) ); ?>"><?php echo esc_html__( 'Website Discovery Process', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/ai-workflow/' ) ); ?>"><?php echo esc_html__( 'Our AI-Assisted Workflow', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"is-style-link-arrow-accent","fontSize":"100"} -->
<p class="is-style-link-arrow-accent has-100-font-size"><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php echo esc_html__( 'Read all insights', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

<!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold","lineHeight":"var:custom|line-height|paragraph"},"color":{"text":"var:custom|color|text|subtle"}},"fontSize":"100","fontFamily":"body"} -->
<h2 class="wp-block-heading has-text-color has-body-font-family has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);line-height:var(--wp--custom--line-height--paragraph);text-transform:uppercase"><?php echo esc_html__( 'About', 'ls-theme' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php echo esc_html__( 'About LightSpeed', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/why/lightspeed/' ) ); ?>"><?php echo esc_html__( 'Why LightSpeed', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/getting-started-with-lightspeed/' ) ); ?>"><?php echo esc_html__( 'Getting started', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/about/process/' ) ); ?>"><?php echo esc_html__( 'Our process', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php echo esc_html__( 'Get in touch', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"align":"wide","style":{"border":{"top":{"width":"1px","style":"solid","color":"var:custom|color|border|card"}},"spacing":{"padding":{"top":"var:preset|spacing|80"},"margin":{"top":"var:preset|spacing|80"}}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap","verticalAlignment":"center"}} -->
<div class="wp-block-group alignwide" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;margin-top:var(--wp--preset--spacing--80);padding-top:var(--wp--preset--spacing--80)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"},"color":{"text":"var:custom|color|text|subtle"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"100"} -->
<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);margin-top:0;margin-bottom:0;text-transform:uppercase"><?php
/* translators: %s: current year. */
echo esc_html( sprintf( __( '© %s LightSpeedWP.agency. All rights reserved.', 'ls-theme' ), gmdate( 'Y' ) ) );
?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}},"fontSize":"100"} -->
<p class="ls-footer-nav-link has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php echo esc_html__( 'Privacy policy', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}},"fontSize":"100"} -->
<p class="ls-footer-nav-link has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/cookie-policy/' ) ); ?>"><?php echo esc_html__( 'Cookie policy', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}},"fontSize":"100"} -->
<p class="ls-footer-nav-link has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/about/accessibility/' ) ); ?>"><?php echo esc_html__( 'Accessibility statement', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}},"fontSize":"100"} -->
<p class="ls-footer-nav-link has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/terms-conditions/' ) ); ?>"><?php echo esc_html__( 'Terms', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:social-links {"size":"has-normal-icon-size","openInNewTab":true,"className":"ls-footer-social","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<ul class="wp-block-social-links has-normal-icon-size ls-footer-social"><!-- wp:social-link {"url":"https://www.linkedin.com/company/lightspeedwp","service":"linkedin"} /-->
<!-- wp:social-link {"url":"https://github.com/lightspeedwp","service":"github"} /-->
<!-- wp:social-link {"url":"https://www.facebook.com/lightspeedwpdev","service":"facebook"} /-->
<!-- wp:social-link {"url":"https://www.instagram.com/lightspeedwpdev/","service":"instagram"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></footer>
<!-- /wp:group -->
