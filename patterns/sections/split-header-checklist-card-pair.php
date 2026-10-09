<?php
/**
 * Title: Section - Split Header Checklist Card Pair
 * Slug: ls-theme/split-header-checklist-card-pair
 * Categories: featured
 * Block Types: core/pattern
 * Description: A "what you receive and who it is for" section on the page canvas: a split header (dot eyebrow and H2 on the left, a short paragraph bottom-aligned on the right) above two equal-height, border-only cards (no fill), each an H3 and a list of check rows separated by dividers. Each row is a circular check Icon block beside a line of copy; add or remove rows freely. Plain core/columns, so the cards stack on mobile; the columns omit verticalAlignment so core/columns' native equal-height stretch applies and each card fills its column. Same shape as Section - Checklist Card Pair but with the split header and brand colours instead of the service phase accent. Falls back to core/columns and core/group because no semantic core block fits an icon checklist. Adapts between light and dark through surface, text and border tokens. Edit the eyebrow, heading, paragraph, card titles and rows after inserting.
 * Keywords: receive, who, checklist, cards, pair, solutions, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_checklist_cards = array(
	array(
		'title' => __( 'What you receive', 'ls-theme' ),
		'items' => array(
			__( 'A token library for colours, typography and spacing managed in Figma and synchronised with WordPress.', 'ls-theme' ),
			__( 'A comprehensive component kit and pattern library with locked wrappers and editable content surfaces.', 'ls-theme' ),
			__( 'A theme.json that enforces design tokens and pattern governance across your WordPress build.', 'ls-theme' ),
			__( 'Documentation and training materials for editors, designers and developers.', 'ls-theme' ),
			__( 'A launch plan including accessibility validation and deployment to staging and production.', 'ls-theme' ),
			__( 'Ongoing support for system maintenance, evolution and integration into additional sites.', 'ls-theme' ),
		),
	),
	array(
		'title' => __( 'Who this is for', 'ls-theme' ),
		'items' => array(
			__( 'Enterprises with multiple websites that need consistent brand execution.', 'ls-theme' ),
			__( 'Publishers and organisations managing a portfolio of properties.', 'ls-theme' ),
			__( 'Marketing teams seeking to reduce design debt and speed up page creation.', 'ls-theme' ),
			__( 'Developers who want a clear handoff from design to code without guesswork.', 'ls-theme' ),
			__( 'Companies planning AI or automation initiatives that rely on semantic clarity.', 'ls-theme' ),
		),
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:columns {"verticalAlignment":"bottom","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|90"}}}} -->
		<div class="wp-block-columns are-vertically-aligned-bottom">

			<!-- wp:column {"verticalAlignment":"bottom","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
			<div class="wp-block-column is-vertically-aligned-bottom">

				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
					<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'What you receive', 'ls-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"600"} -->
				<h2 class="wp-block-heading has-600-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'What you receive, and who it’s for.', 'ls-theme' ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"bottom"} -->
			<div class="wp-block-column is-vertically-aligned-bottom">
				<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"300"} -->
				<p class="has-text-color has-300-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'When you invest in a design system with LightSpeed, this is what you take away, and the teams it suits best.', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
		<div class="wp-block-columns">
			<?php foreach ( $ls_checklist_cards as $ls_checklist_card ) : ?>

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|400","style":"solid","width":"1px"},"dimensions":{"minHeight":"100%"},"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group has-border-color" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--400);min-height:100%;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
					<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold","letterSpacing":"var:custom|typography|letter-spacing|tight"}},"fontSize":"300"} -->
					<h3 class="wp-block-heading has-300-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold);letter-spacing:var(--wp--custom--typography--letter-spacing--tight)"><?php echo esc_html( $ls_checklist_card['title'] ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:group {"layout":{"type":"default"}} -->
					<div class="wp-block-group">
						<?php
						$ls_checklist_item_count = count( $ls_checklist_card['items'] );
						foreach ( $ls_checklist_card['items'] as $ls_checklist_index => $ls_checklist_item ) :
							$ls_is_first = ( 0 === $ls_checklist_index );
							$ls_is_last  = ( $ls_checklist_index === $ls_checklist_item_count - 1 );
							?>

							<?php if ( $ls_is_first ) : ?>
						<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"0","bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
						<div class="wp-block-group" style="padding-top:0;padding-bottom:var(--wp--preset--spacing--20)">
						<?php elseif ( $ls_is_last ) : ?>
						<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|20","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
						<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20);padding-bottom:0">
						<?php else : ?>
						<!-- wp:group {"style":{"border":{"top":{"color":"var:custom|color|border|card","style":"solid","width":"1px"}},"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
						<div class="wp-block-group" style="border-top-color:var(--wp--custom--color--border--card);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">
						<?php endif; ?>
							<!-- wp:group {"style":{"color":{"background":"color-mix(in srgb, var(--wp--custom--color--text--brand) 12%, transparent)"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
							<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:color-mix(in srgb, var(--wp--custom--color--text--brand) 12%, transparent);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
								<!-- wp:icon {"icon":"lightspeed/check","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"13px"}}} /-->
							</div>
							<!-- /wp:group -->

							<!-- wp:paragraph {"fontSize":"200"} -->
							<p class="has-200-font-size"><?php echo esc_html( $ls_checklist_item ); ?></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->
						<?php endforeach; ?>
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
