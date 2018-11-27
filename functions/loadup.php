<?php
/**
 * Load up our theme options, functions and related code.
 *
 * @package Pera
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

new Pera\Setup\Theme();
new Pera\Setup\Styles_Scripts();
new Pera\Setup\Widgets();

new Pera\Functions\Template();
new Pera\Functions\Customizer();
new Pera\Functions\Theme_Hooks();

$custom_header = new Pera\Functions\Custom_Header();
