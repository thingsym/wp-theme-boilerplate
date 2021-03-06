<?php
/**
 * Widget
 *
 * @package WP Theme Boilerplate
 * @since 1.0.0
 */

namespace WP_Theme_Boilerplate\Functions\Setup;

/**
 * Class Widget
 *
 * @since 1.0.0
 */
class Widget {

	public function __construct() {
		add_action( 'widgets_init', [ $this, 'init' ] );
	}

	/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 *
	 * @since 1.0.0
	 */
	public function init() {

		register_sidebar(
			[
				'name'          => esc_html__( 'Sidebar', 'wp-theme-boilerplate' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', 'wp-theme-boilerplate' ),
				'before_widget' => '<section class="widget %2$s %1$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			]
		);

	}

}
