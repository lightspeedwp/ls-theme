/**
 * Example: Using the Dark Mode Switcher in Your Template
 *
 * This file demonstrates common patterns for integrating the mode switcher
 * into your WordPress block theme templates.
 *
 * @package ls-theme
 * @since 1.0.0
 */

/**
 * OPTION 1: Add to a PHP template part (e.g., parts/header.php)
 *
 * Simply output the button where you want it:
 */

// In parts/header.php or templates/parts/header.php:
?>

<header class="site-header">
	<div class="site-header__content">
		<!-- Your logo, nav, etc. -->
		
		<!-- Mode Switcher -->
		<?php
		if ( function_exists( 'ls_theme\\includes\\display_mode_switcher_button' ) ) {
			ls_theme\includes\display_mode_switcher_button();
		}
		?>
	</div>
</header>

<?php
/**
 * OPTION 2: Create a Custom Block Template Part
 *
 * Use the block-based template system to add the switcher as a component.
 * Create: parts/dark-mode-switcher.html
 */
?>

<!-- wp:html -->
<?php
if ( function_exists( 'ls_theme\\includes\\get_mode_switcher_button' ) ) {
	echo ls_theme\includes\get_mode_switcher_button(
		array(
			'label_light' => '☀️ Light',
			'label_dark'  => '🌙 Dark',
		)
	);
}
?>
<!-- /wp:html -->


<?php
/**
 * OPTION 3: As a Hook/Action
 *
 * If you prefer, hook it into an existing action point in functions.php:
 */
?>

<?php
// In functions.php:
add_action( 'wp_footer', function() {
	if ( function_exists( 'ls_theme\\includes\\display_mode_switcher_button' ) ) {
		echo '<div class="mode-switcher-footer">';
		ls_theme\includes\display_mode_switcher_button();
		echo '</div>';
	}
}, 5 );
?>


<?php
/**
 * OPTION 4: Custom HTML & Styling
 *
 * Get the button and customize the markup/styling:
 */
?>

<div class="header-controls">
	<?php
	if ( function_exists( 'ls_theme\\includes\\get_mode_switcher_button' ) ) {
		$switcher = ls_theme\includes\get_mode_switcher_button(
			array(
				'label_light' => 'Light',
				'label_dark'  => 'Dark',
				'class'       => 'btn btn--secondary btn--sm',
			)
		);
		echo $switcher; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
	?>
</div>


<?php
/**
 * OPTION 5: Listening for Mode Changes in JavaScript
 *
 * Other scripts can react to mode changes:
 */
?>

<script>
// Listen for when the user toggles the mode
document.addEventListener( 'lsThemeModeChanged', function( event ) {
	const mode = event.detail.mode; // 'light' or 'dark'
	
	console.log( 'User switched to:', mode );
	
	// Example: Update any third-party widgets that need to know about the mode
	if ( typeof MyCustomWidget !== 'undefined' ) {
		MyCustomWidget.updateTheme( mode );
	}
} );
</script>


<?php
/**
 * OPTION 6: Server-Side Detection (for conditional rendering)
 *
 * If you need to know the user's mode preference on the server:
 */
?>

<?php
use ls_theme\includes;

$current_mode = includes\get_mode_preference(); // 'light' or 'dark'

if ( 'dark' === $current_mode ) {
	// Load dark-mode-specific resources
	wp_enqueue_style( 'dark-fonts', '...' );
} else {
	// Load light-mode-specific resources
	wp_enqueue_style( 'light-fonts', '...' );
}
?>


<?php
/**
 * OPTION 7: CSS Targeting Dark Mode
 *
 * In your stylesheets, target the dark-mode class:
 */
?>

<style>
/* Light mode (default) */
.my-component {
	background: #fff;
	color: #000;
}

/* Dark mode */
body.dark-mode .my-component {
	background: #111;
	color: #fff;
}

/* Or use CSS variables (recommended) */
.my-component {
	background: var( --wp--preset--color--base );
	color: var( --wp--preset--color--contrast );
}
</style>
