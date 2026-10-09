<?php
/**
 * Title: Section - Split Copy Checklist Card
 * Slug: ls-theme/split-copy-checklist-card
 * Categories: featured
 * Block Types: core/pattern
 * Description: A two-column "why this matters" section on the page canvas: dot eyebrow, H2 and a supporting paragraph on the left (about 50%), and on the right (about 50%) a bordered surface.card panel of four check rows (capped at 650px wide), each a circular check Icon block beside a bold lead-in and a line of copy, separated by dividers. Same shape as Section - Split Copy Checklist but it uses brand colours instead of the service phase accent. Falls back to core/columns and core/group because no semantic core block fits an icon checklist. Adapts between light and dark through surface, text and border tokens. Edit the eyebrow, heading, paragraph and rows after inserting.
 * Keywords: why, benefits, checklist, split, solutions, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_checklist_rows = array(
	array(
		'lead' => __( 'Less design debt.', 'ls-theme' ),
		'text' => __( 'Externalise style decisions into tokens and patterns before they harden into bespoke modules.', 'ls-theme' ),
	),
	array(
		'lead' => __( 'Brand protection.', 'ls-theme' ),
		'text' => __( 'Lock structural wrappers and leave editorial areas flexible.', 'ls-theme' ),
	),
	array(
		'lead' => __( 'Accessibility.', 'ls-theme' ),
		'text' => __( 'Contrast, focus and target-size rules are enforced at the token level.', 'ls-theme' ),
	),
	array(
		'lead' => __( 'AI readability.', 'ls-theme' ),
		'text' => __( 'Machine-readable consistency improves semantic markup and search engine understanding.', 'ls-theme' ),
	),
);

$ls_checklist_count = count( $ls_checklist_rows );
?>
<!-- wp:group {"align":"full","tagName":"section","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:columns {"align":"wide","verticalAlignment":"top","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|100"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-top">

		<!-- wp:column {"verticalAlignment":"top","width":"50%","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:50%">

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Why this solution matters', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"600"} -->
			<h2 class="wp-block-heading has-600-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'A beautiful website is fragile without a system behind it.', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"}},"fontSize":"200"} -->
			<p class="has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted)"><?php echo esc_html__( 'As teams grow and requirements change, inconsistent margins, ad-hoc colour choices and bespoke modules accumulate technical debt. Design systems solve this by externalising style decisions into tokens and patterns. Pattern governance protects your brand by locking down structural wrappers while leaving editorial areas flexible. It also improves accessibility compliance and developer efficiency. Most importantly, a token-driven design system creates machine-readable consistency that improves AI readability, search engine understanding and semantic markup.', 'ls-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"top","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:50%">
			<!-- wp:group {"layout":{"type":"constrained","contentSize":"650px","justifyContent":"left"}} -->
			<div class="wp-block-group">
				<!-- wp:group {"style":{"color":{"background":"var:custom|color|surface|card"},"border":{"color":"var:custom|color|border|card","radius":"var:preset|border-radius|400","style":"solid","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group has-border-color has-background" style="border-color:var(--wp--custom--color--border--card);border-style:solid;border-width:1px;border-radius:var(--wp--preset--border-radius--400);background-color:var(--wp--custom--color--surface--card);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
					<?php
					foreach ( $ls_checklist_rows as $ls_checklist_index => $ls_checklist_row ) :
						$ls_is_first = ( 0 === $ls_checklist_index );
						$ls_is_last  = ( $ls_checklist_index === $ls_checklist_count - 1 );
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
						<!-- wp:group {"style":{"color":{"background":"var:custom|color|surface|brand-light"},"border":{"radius":"var:preset|border-radius|500"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
						<div class="wp-block-group has-background" style="border-radius:var(--wp--preset--border-radius--500);background-color:var(--wp--custom--color--surface--brand-light);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
							<!-- wp:icon {"icon":"lightspeed/check","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"13px"}}} /-->
						</div>
						<!-- /wp:group -->

						<!-- wp:paragraph {"fontSize":"200"} -->
						<p class="has-200-font-size"><strong><?php echo esc_html( $ls_checklist_row['lead'] ); ?></strong> <?php echo esc_html( $ls_checklist_row['text'] ); ?></p>
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
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
