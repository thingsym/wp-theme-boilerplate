<?php
/**
 * Load up our theme options, functions and related code.
 *
 * @package WP Theme Boilerplate
 * @since 1.0.0
 */

$require_paths = array(
	'/setup/class-theme.php',
	'/setup/class-styles-scripts.php',
	'/setup/class-widgets.php',

	'/template/class-template.php',
	'/customizer/class-customizer.php',
	'/theme-hooks/class-theme-hooks.php',

	'/post-thumbnail/class-post-thumbnail.php',
	'/entry-meta/class-entry-meta.php',

	'/custom-header/class-custom-header.php'
);

foreach ( $require_paths as $key => $path ) {
	require_once( __DIR__ . $path );
}

new WP_Theme_Boilerplate\Setup\Theme();
new WP_Theme_Boilerplate\Setup\Styles_Scripts();
new WP_Theme_Boilerplate\Setup\Widgets();

new WP_Theme_Boilerplate\Functions\Template();
new WP_Theme_Boilerplate\Functions\Customizer();
new WP_Theme_Boilerplate\Functions\Theme_Hooks();

$custom_header = new WP_Theme_Boilerplate\Functions\Custom_Header();
