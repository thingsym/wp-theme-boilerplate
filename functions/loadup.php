<?php
/**
 * Load up our theme options, functions and related code.
 *
 * @package WP Theme Boilerplate
 * @since 1.0.0
 */

$wp_theme_boilerplate_setup_theme        = new \WP_Theme_Boilerplate\Functions\Setup\Theme();
$wp_theme_boilerplate_setup_style_script = new \WP_Theme_Boilerplate\Functions\Setup\Style_Script();
$wp_theme_boilerplate_setup_menu         = new \WP_Theme_Boilerplate\Functions\Setup\Menu();
$wp_theme_boilerplate_setup_widget       = new \WP_Theme_Boilerplate\Functions\Setup\Widget();
$wp_theme_boilerplate_setup_editor       = new \WP_Theme_Boilerplate\Functions\Setup\Editor();

new \WP_Theme_Boilerplate\Functions\Template\Template();
new \WP_Theme_Boilerplate\Functions\Customizer\Customizer();
new \WP_Theme_Boilerplate\Functions\Theme_Hook\Theme_Hook();

new \WP_Theme_Boilerplate\Functions\Custom_Header\Custom_Header();
new \WP_Theme_Boilerplate\Functions\Entry_Meta\Entry_Meta();
new \WP_Theme_Boilerplate\Functions\Post_Thumbnail\Post_Thumbnail();
