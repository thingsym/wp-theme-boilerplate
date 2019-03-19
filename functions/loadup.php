<?php
/**
 * Load up our theme options, functions and related code.
 *
 * @package WP Theme Boilerplate
 * @since 1.0.0
 */

new \WP_Theme_Boilerplate\Functions\Setup\Theme();
new \WP_Theme_Boilerplate\Functions\Setup\Style_Script();
new \WP_Theme_Boilerplate\Functions\Setup\Menu();
new \WP_Theme_Boilerplate\Functions\Setup\Widget();

new \WP_Theme_Boilerplate\Functions\Template\Template();
new \WP_Theme_Boilerplate\Functions\Customizer\Customizer();
new \WP_Theme_Boilerplate\Functions\Theme_Hook\Theme_Hook();

new \WP_Theme_Boilerplate\Functions\Custom_Header\Custom_Header();
new \WP_Theme_Boilerplate\Functions\Entry_Meta\Entry_Meta();
new \WP_Theme_Boilerplate\Functions\Post_Thumbnail\Post_Thumbnail();
