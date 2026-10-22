<?php
/**
 * Title: Hero - Split Index Card
 * Slug: ls-theme/hero-split-index-card
 * Categories: hero
 * Block Types: core/pattern
 * Description: A split hero for team and directory pages: breadcrumb trail, dot eyebrow, H1, lede paragraph and a primary and an outline button on the left (about 50%), and a bordered surface.card index on the right (about 50%) that groups the team by area in two side-by-side lists (they stack into one column when the card is narrow). Each group title and each person's name link to an anchor lower down the page, with the role beneath the name, and each row slides and turns brand-coloured on hover (src/scss/structural/about-team.scss). Uses the shared corner-glow class for the background. The index is a core/group of linked paragraphs because no semantic core block fits an in-page jump list with a role under each name; the group titles are paragraphs, not headings, so the page outline stays H1 then H2. Columns stack on mobile. The outline button is the shared is-style-outline button, the same as the other heroes. Edit the copy, groups, anchors and buttons after inserting.
 * Keywords: hero, split, team, index, directory, jump links, people, buttons, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_index_columns = array(
	array(
		array(
			'title'  => __( 'Leadership and direction', 'ls-theme' ),
			'anchor' => 'leadership',
			'people' => array(
				array(
					'name'   => 'Ash Shaw',
					'role'   => __( 'Founder', 'ls-theme' ),
					'anchor' => 'p-ash',
				),
				array(
					'name'   => 'Barbara Kerr',
					'role'   => __( 'Finance and operations', 'ls-theme' ),
					'anchor' => 'p-barbara',
				),
			),
		),
		array(
			'title'  => __( 'Infrastructure and support', 'ls-theme' ),
			'anchor' => 'infra',
			'people' => array(
				array(
					'name'   => 'Chris Vancoillie',
					'role'   => __( 'Systems lead', 'ls-theme' ),
					'anchor' => 'p-chris',
				),
				array(
					'name'   => 'Lourens Visser',
					'role'   => __( 'Support and workflow', 'ls-theme' ),
					'anchor' => 'p-lourens',
				),
			),
		),
	),
	array(
		array(
			'title'  => __( 'Design and development', 'ls-theme' ),
			'anchor' => 'design',
			'people' => array(
				array(
					'name'   => 'Warwick Booth',
					'role'   => __( 'Lead developer', 'ls-theme' ),
					'anchor' => 'p-warwick',
				),
				array(
					'name'   => 'Brandon Marshall',
					'role'   => __( 'WordPress designer and developer', 'ls-theme' ),
					'anchor' => 'p-brandon',
				),
				array(
					'name'   => 'José Abreu',
					'role'   => __( 'Block theme and block developer', 'ls-theme' ),
					'anchor' => 'p-jose',
				),
				array(
					'name'   => 'Tibi Buzdugan',
					'role'   => __( 'Frontend and backend developer', 'ls-theme' ),
					'anchor' => 'p-tibi',
				),
				array(
					'name'   => 'Zared Rogers',
					'role'   => __( 'Designer and site builder', 'ls-theme' ),
					'anchor' => 'p-zared',
				),
			),
		),
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-corner-glow ls-index-hero","style":{"border":{"bottom":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|30","bottom":"var:preset|spacing|80","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-corner-glow ls-index-hero" style="border-bottom-color:var(--wp--custom--color--border--card);border-bottom-style:solid;border-bottom-width:1px;margin-top:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
		<!-- wp:yoast-seo/breadcrumbs {"className":"alignwide"} /-->
		<?php endif; ?>

		<!-- wp:columns {"align":"wide","verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-center">

			<!-- wp:column {"verticalAlignment":"center","width":"50%","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">

				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'About – Team', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":1,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|extrabold","lineHeight":"var:custom|line-height|heading-tight","letterSpacing":"var:custom|typography|letter-spacing|tighter"}},"fontSize":"900"} -->
				<h1 class="wp-block-heading has-900-font-size" style="font-weight:var(--wp--custom--typography--font-weight--extrabold);letter-spacing:var(--wp--custom--typography--letter-spacing--tighter);line-height:var(--wp--custom--line-height--heading-tight)"><?php echo esc_html__( 'Meet the team behind LightSpeed', 'ls-theme' ); ?></h1>
				<!-- /wp:heading -->

				<!-- wp:group {"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
					<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'We’re a distributed team of strategists, designers, developers, infrastructure specialists and operators who work together to build maintainable WordPress platforms.', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--20)">
					<!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/free-consultation/' ) ); ?>"><?php echo esc_html__( 'Book a consultation', 'ls-theme' ); ?></a></div>
					<!-- /wp:button -->

					<!-- wp:button {"className":"is-style-outline"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/about/culture/' ) ); ?>"><?php echo esc_html__( 'Explore our culture', 'ls-theme' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
				<!-- wp:group {"style":{"color":{"background":"var:custom|color|surface|card"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|400","style":"solid","width":"1px"},"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"grid","minimumColumnWidth":"13rem"}} -->
				<div class="wp-block-group has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--400);background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">

					<?php foreach ( $ls_index_columns as $ls_index_column ) : ?>
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"default"}} -->
					<div class="wp-block-group">

						<?php foreach ( $ls_index_column as $ls_index_group ) : ?>
						<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"default"}} -->
						<div class="wp-block-group">
							<!-- wp:paragraph {"className":"ls-index-hero__title","style":{"typography":{"fontFamily":"var:preset|font-family|monospace","textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|bold"},"color":{"text":"var(--wp--custom--color--text--subtle)"}},"fontSize":"100"} -->
							<p class="ls-index-hero__title has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);font-family:var(--wp--preset--font-family--monospace);font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><a href="<?php echo esc_url( '#' . $ls_index_group['anchor'] ); ?>"><?php echo esc_html( $ls_index_group['title'] ); ?></a></p>
							<!-- /wp:paragraph -->

							<?php foreach ( $ls_index_group['people'] as $ls_index_person ) : ?>
							<!-- wp:group {"className":"ls-index-hero__row","style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"blockGap":"var:preset|spacing|5","padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}},"layout":{"type":"default"}} -->
							<div class="wp-block-group ls-index-hero__row" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10)">
								<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|heading","fontWeight":"var:custom|typography|font-weight|semibold"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"200"} -->
								<p class="has-200-font-size" style="margin-top:0;margin-bottom:0;font-family:var(--wp--preset--font-family--heading);font-weight:var(--wp--custom--typography--font-weight--semibold)"><a href="<?php echo esc_url( '#' . $ls_index_person['anchor'] ); ?>"><?php echo esc_html( $ls_index_person['name'] ); ?></a></p>
								<!-- /wp:paragraph -->

								<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--subtle)"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"100"} -->
								<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--subtle);margin-top:0;margin-bottom:0"><?php echo esc_html( $ls_index_person['role'] ); ?></p>
								<!-- /wp:paragraph -->
							</div>
							<!-- /wp:group -->
							<?php endforeach; ?>
						</div>
						<!-- /wp:group -->
						<?php endforeach; ?>
					</div>
					<!-- /wp:group -->
					<?php endforeach; ?>
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
