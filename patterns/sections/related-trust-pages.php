<?php
/**
 * Title: Section - Related Trust Pages
 * Slug: ls-theme/related-trust-pages
 * Categories: featured
 * Block Types: core/pattern
 * Description: A "related pages" band for trust, legal and policy pages: eyebrow badge, H2 heading, and a four-up grid of whole-card links (Card - Service Tile style, each with an icon well, H3, one line of copy and an arrow link). Four cards: the first three of AI Governance, Privacy, Cookie, Accessibility and Terms (in that order), plus Contact. The card for the page being viewed is dropped automatically, so no trust page links to itself. The grid is a core/group with the grid layout (4 columns, 2 on tablet, 1 on mobile — the responsive steps are in src/scss/structural/legal-page.scss). Sits on a surface.card band. Fallback note: no core block renders a card, so cards are core/group + core/heading + core/paragraph.
 * Keywords: related, trust, legal, policy, links, cards, routes, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_trust_pages = array(
	array(
		'icon'  => 'seal-check',
		'title' => __( 'AI Governance', 'ls-theme' ),
		'text'  => __( 'How we use AI responsibly inside delivery.', 'ls-theme' ),
		'label' => __( 'Read AI governance', 'ls-theme' ),
		'path'  => '/about/ai-governance/',
	),
	array(
		'icon'  => 'shield',
		'title' => __( 'Privacy Policy', 'ls-theme' ),
		'text'  => __( 'How we collect, use and protect personal information.', 'ls-theme' ),
		'label' => __( 'Read privacy', 'ls-theme' ),
		'path'  => '/privacy-policy/',
	),
	array(
		'icon'  => 'notepad',
		'title' => __( 'Cookie Policy', 'ls-theme' ),
		'text'  => __( 'What cookies the site uses and what choices you have.', 'ls-theme' ),
		'label' => __( 'Read cookies', 'ls-theme' ),
		'path'  => '/cookie-policy/',
	),
	array(
		'icon'  => 'wheelchair',
		'title' => __( 'Accessibility', 'ls-theme' ),
		'text'  => __( 'Our accessibility statement and feedback route.', 'ls-theme' ),
		'label' => __( 'Read accessibility', 'ls-theme' ),
		'path'  => '/about/accessibility/',
	),
	array(
		'icon'  => 'clipboard-text',
		'title' => __( 'Terms & Conditions', 'ls-theme' ),
		'text'  => __( 'The terms for using our site and services.', 'ls-theme' ),
		'label' => __( 'Read terms', 'ls-theme' ),
		'path'  => '/terms-conditions/',
	),
);

$ls_contact_page = array(
	'icon'  => 'envelope',
	'title' => __( 'Contact us', 'ls-theme' ),
	'text'  => __( 'If you would rather speak to a human.', 'ls-theme' ),
	'label' => __( 'Contact', 'ls-theme' ),
	'path'  => '/contact/',
);

// Drop the card for the page being viewed so a trust page never links to itself. Pattern files
// are loaded when the pattern is used, so the current page is known here; in the inserter (no
// current page) the default set shows. Contact stays last unless it is the current page.
$ls_current_url = is_singular() ? trailingslashit( (string) get_permalink() ) : '';
$ls_is_current  = static function ( $page ) use ( $ls_current_url ) {
	return '' !== $ls_current_url && trailingslashit( home_url( $page['path'] ) ) === $ls_current_url;
};

$ls_cards        = array_values( array_filter( $ls_trust_pages, static fn( $page ) => ! $ls_is_current( $page ) ) );
$ls_show_contact = ! $ls_is_current( $ls_contact_page );
$ls_cards        = array_slice( $ls_cards, 0, $ls_show_contact ? 3 : 4 );

if ( $ls_show_contact ) {
	$ls_cards[] = $ls_contact_page;
}

?>
<!-- wp:group {"align":"full","tagName":"section","style":{"color":{"background":"var:custom|color|surface|card"},"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|50","bottom":"var:preset|spacing|100","left":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|80"}},"layout":{"type":"constrained","contentSize":"1216px"}} -->
<section class="wp-block-group alignfull has-background" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--50)">

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
	<div class="wp-block-group">

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--icon--background)"},"dimensions":{"width":"8px"}}} /-->

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
			<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Related trust pages', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","lineHeight":"var:custom|line-height|heading-snug","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"600"} -->
		<h2 class="wp-block-heading has-600-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight);line-height:var(--wp--custom--line-height--heading-snug)"><?php echo esc_html__( 'Other public commitments from LightSpeed.', 'ls-theme' ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"ls-related-trust-grid","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":4}} -->
	<div class="wp-block-group ls-related-trust-grid">
		<?php foreach ( $ls_cards as $ls_card ) : ?>

		<!-- wp:group {"tagName":"article","className":"is-style-card-service-tile","style":{"dimensions":{"minHeight":"100%"},"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
		<article class="wp-block-group is-style-card-service-tile" style="min-height:100%;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
			<!-- wp:group {"className":"ls-icon-well-brand"} -->
			<div class="wp-block-group ls-icon-well-brand">
				<!-- wp:icon {"icon":"lightspeed/<?php echo esc_attr( $ls_card['icon'] ); ?>"} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"ls-card-service-tile__content","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<div class="wp-block-group ls-card-service-tile__content">
				<!-- wp:heading {"level":3,"fontSize":"300"} -->
				<h3 class="wp-block-heading has-300-font-size"><?php echo esc_html( $ls_card['title'] ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"color":{"text":"var:custom|color|text|muted"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html( $ls_card['text'] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"className":"is-style-link-arrow-accent"} -->
			<p class="is-style-link-arrow-accent"><a class="ls-card-service-tile__link" href="<?php echo esc_url( home_url( $ls_card['path'] ) ); ?>"><?php echo esc_html( $ls_card['label'] ); ?></a></p>
			<!-- /wp:paragraph -->
		</article>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
