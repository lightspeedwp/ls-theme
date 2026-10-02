<?php
/**
 * Title: Footer
 * Slug: ls-theme/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Full site footer — company summary with proof points, 5-column link grid, and legal/social bottom bar.
 *
 * @package ls-theme
 */

?>

<!-- wp:group {"tagName":"footer","metadata":{"patternName":"ls-theme/footer","name":"Footer","description":"Full site footer — company summary with proof points, 5-column link grid, and legal/social bottom bar.","categories":["footer"]},"className":"site-footer","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|60","bottom":"var:preset|spacing|100","left":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<footer class="wp-block-group site-footer" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--60)"><!-- wp:columns {"align":"wide","className":"site-footer__columns","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|80"}}}} -->
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

<!-- wp:column {"className":"footer-nav-columns"} -->
<div class="wp-block-column footer-nav-columns"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var:custom|color|text|subtle"}},"fontSize":"100"} -->
<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Services', 'ls-theme' ); ?></p>
<!-- /wp:paragraph --></div>
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
<p class="is-style-link-arrow-accent has-100-font-size"><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php echo esc_html__( 'View all services', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var:custom|color|text|subtle"}},"fontSize":"100"} -->
<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Company', 'ls-theme' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/work/' ) ); ?>"><?php echo esc_html__( 'Work', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php echo esc_html__( 'Insights', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php echo esc_html__( 'About', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php echo esc_html__( 'Contact', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/pricing/' ) ); ?>"><?php echo esc_html__( 'Pricing', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var:custom|color|text|subtle"}},"fontSize":"100"} -->
<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Solutions', 'ls-theme' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/solutions/woocommerce/' ) ); ?>"><?php echo esc_html__( 'Ecommerce', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/solutions/' ) ); ?>"><?php echo esc_html__( 'Memberships', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/solutions/publishing/' ) ); ?>"><?php echo esc_html__( 'Publishing', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/solutions/tour-operators/' ) ); ?>"><?php echo esc_html__( 'Tourism', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/solutions/ai-readiness/' ) ); ?>"><?php echo esc_html__( 'AI readiness', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var:custom|color|text|subtle"}},"fontSize":"100"} -->
<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Studio', 'ls-theme' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>"><?php echo esc_html__( 'Start a project', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/book-a-call/' ) ); ?>"><?php echo esc_html__( 'Book a call', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/services/support/' ) ); ?>"><?php echo esc_html__( 'Support', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php echo esc_html__( 'Partnerships', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php echo esc_html__( 'Cape Town studio', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var:custom|color|text|subtle"}},"fontSize":"100"} -->
<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Systems', 'ls-theme' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/solutions/lsx/' ) ); ?>"><?php echo esc_html__( 'LSX Design', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/solutions/tour-operators/' ) ); ?>"><?php echo esc_html__( 'Tour Operator', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/systems/block-themes/' ) ); ?>"><?php echo esc_html__( 'Block themes', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/systems/woocommerce-plugins/' ) ); ?>"><?php echo esc_html__( 'WooCommerce plugins', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ls-footer-nav-link","style":{"color":{"text":"var:custom|color|text|muted"},"typography":{"textDecoration":"none"}}} -->
<p class="ls-footer-nav-link has-text-color" style="color:var(--wp--custom--color--text--muted);text-decoration:none"><a href="<?php echo esc_url( home_url( '/systems/pattern-libraries/' ) ); ?>"><?php echo esc_html__( 'Pattern libraries', 'ls-theme' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"align":"wide","style":{"border":{"top":{"width":"1px","style":"solid","color":"var:custom|color|border|card"}},"spacing":{"padding":{"top":"var:preset|spacing|40"},"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap","verticalAlignment":"center"}} -->
<div class="wp-block-group alignwide" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;margin-top:var(--wp--preset--spacing--40);padding-top:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
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

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:group {"className":"ls-footer-social-icon","style":{"color":{"background":"var:custom|color|surface|card","text":"var:custom|color|text|default"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|500","style":"solid","width":"1px"},"dimensions":{"minHeight":"var(--wp--custom--spacing--tap-target-min)"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group ls-footer-social-icon has-border-color has-text-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--500);color:var(--wp--custom--color--text--default);background-color:var(--wp--custom--color--surface--card);min-height:var(--wp--custom--spacing--tap-target-min);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><!-- wp:icon {"icon":"lightspeed/linkedin","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--default)"},"dimensions":{"width":"18px"}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ls-footer-social-icon","style":{"color":{"background":"var:custom|color|surface|card","text":"var:custom|color|text|default"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|500","style":"solid","width":"1px"},"dimensions":{"minHeight":"var(--wp--custom--spacing--tap-target-min)"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group ls-footer-social-icon has-border-color has-text-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--500);color:var(--wp--custom--color--text--default);background-color:var(--wp--custom--color--surface--card);min-height:var(--wp--custom--spacing--tap-target-min);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><!-- wp:icon {"icon":"lightspeed/github","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--default)"},"dimensions":{"width":"18px"}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ls-footer-social-icon","style":{"color":{"background":"var:custom|color|surface|card","text":"var:custom|color|text|default"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|500","style":"solid","width":"1px"},"dimensions":{"minHeight":"var(--wp--custom--spacing--tap-target-min)"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group ls-footer-social-icon has-border-color has-text-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--500);color:var(--wp--custom--color--text--default);background-color:var(--wp--custom--color--surface--card);min-height:var(--wp--custom--spacing--tap-target-min);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><!-- wp:icon {"icon":"lightspeed/facebook","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--default)"},"dimensions":{"width":"18px"}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ls-footer-social-icon","style":{"color":{"background":"var:custom|color|surface|card","text":"var:custom|color|text|default"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|500","style":"solid","width":"1px"},"dimensions":{"minHeight":"var(--wp--custom--spacing--tap-target-min)"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group ls-footer-social-icon has-border-color has-text-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--500);color:var(--wp--custom--color--text--default);background-color:var(--wp--custom--color--surface--card);min-height:var(--wp--custom--spacing--tap-target-min);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><!-- wp:icon {"icon":"lightspeed/instagram","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--default)"},"dimensions":{"width":"18px"}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></footer>
<!-- /wp:group -->
