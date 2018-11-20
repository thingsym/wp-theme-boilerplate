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

	'/custom-header/class-custom-header.php',
	'/post-thumbnail/class-post-thumbnail.php',
	'/templates/class-templates.php',
	'/customizer/class-customizer.php'
);

foreach ( $require_paths as $key => $path ) {
	require_once( __DIR__ . $path );
}

new Pera\Setup\Theme();
new Pera\Setup\Styles_Scripts();
new Pera\Setup\Widgets();

new Pera\Functions\Templates();
new Pera\Functions\Customizer();

$custom_header = new Pera\Functions\Custom_Header();
$post_thumbnail = new Pera\Functions\Post_Thumbnail();
