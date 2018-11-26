<?php
/**
 * Widgets
 *
 * @package Pera
 * @since 1.0.0
 */

namespace Pera\Setup;

/**
 * class Widgets
 *
 * @since 1.0.0
 */
class Widgets {

	public function __construct() {
		add_action( 'widgets_init', array( $this, 'init' ) );
	}

	/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 *
	 * @since 1.0.0
	 */
	public function init() {

		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'pera' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'pera' ),
			'before_widget' => '<section class="widget %2$s %1$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

	}

}
