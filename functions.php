<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP Theme Boilerplate
 */

/* That's all, stop editing! Happy blogging. */

// Load up WordPress Theme Autoloader.
require_once get_template_directory() . '/functions/autoload.php';

// Load up our theme options, functions and related code.
require_once get_template_directory() . '/functions/loadup.php';

// Load up vendor autoloader if exists.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once 'vendor/autoload.php';
}
