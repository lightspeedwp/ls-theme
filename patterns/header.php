<?php
/**
 * Title: Header
 * Slug: ls-theme/header
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Site header with site logo, navigation, and a compact search utility.
 */

?>

<?php
// Render the sticky header wrapper that the scroll morph script targets.
?>
<!-- wp:group {"tagName":"header","className":"site-header ls-site-header","style":{"position":{"type":"sticky","top":"0px"}},"layout":{"type":"constrained"}} -->
<header class="wp-block-group site-header ls-site-header">
	<?php
	// Render the full-width shell that spans edge to edge by default and shrinks into the pill state.
	?>
	<!-- wp:group {"align":"full","className":"ls-site-header__shell","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull ls-site-header__shell">
		<?php
		// Render the centred inner row that holds the logo, navigation, and search utility.
		?>
		<!-- wp:group {"align":"wide","className":"ls-site-header__inner","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
		<div class="wp-block-group alignwide ls-site-header__inner">
			<?php
			// Output the site logo block with the default editor width that the pill state scales down.
			?>
			<!-- wp:site-logo {"width":220,"shouldSyncIcon":true,"className":"ls-site-header__branding"} /-->

			<?php
			// Output the main navigation while leaving all hover and current-state colours to the block preset.
			?>
			<!-- wp:navigation {"className":"ls-site-header__nav","layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap","verticalAlignment":"center"}} /-->

			<?php
			// Group the header utilities so the search block can be aligned independently from the nav.
			?>
			<!-- wp:group {"className":"ls-site-header__utilities","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right","verticalAlignment":"center"}} -->
			<div class="wp-block-group ls-site-header__utilities">
				<?php
				// Output the icon-only search block that inherits the header utility control styling.
				?>
				<!-- wp:search {"label":"Search","showLabel":false,"buttonText":"Search","buttonPosition":"button-only","buttonUseIcon":true,"className":"ls-site-header__search"} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<?php
		// Render the shared bottom accent strip that fades in on hover for both header states.
		?>
		<!-- wp:group {"className":"ls-site-header__accent","layout":{"type":"default"}} -->
		<div class="wp-block-group ls-site-header__accent" aria-hidden="true"></div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</header>
<!-- /wp:group -->
