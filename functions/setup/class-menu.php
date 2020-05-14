<?php
/**
 * Menu
 *
 * @package WP Theme Boilerplate
 * @since 1.0.0
 */

namespace WP_Theme_Boilerplate\Functions\Setup;

/**
 * Class Menu
 *
 * @since 1.0.0
 */
class Menu {

	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'init' ] );
	}

	/**
	 * Register menus.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		// This theme uses wp_nav_menu() in one location.
		register_nav_menu(
			'menu-1',
			esc_html__( 'Primary', 'wp-theme-boilerplate' )
		);

	}

}
