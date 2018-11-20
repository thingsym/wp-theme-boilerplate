<?php
/**
 * styles and scripts
 *
 * @package Pera
 * @since 1.0.0
 */

namespace Pera\Setup;

/**
 * class Styles_Scripts
 *
 * @since 1.0.0
 */
class Styles_Scripts {

	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Enqueue styles for front-end.
	 */
	public function enqueue_styles() {

		$style_uri = get_stylesheet_directory_uri() . '/style.css';

		if ( is_dir( get_stylesheet_directory() . '/css' ) && is_file( get_stylesheet_directory() . '/css/style.min.css' ) ) {
			$style_uri = get_stylesheet_directory_uri() . '/css/style.min.css';
		}
		elseif ( is_dir( get_stylesheet_directory() . '/css' ) && is_file( get_stylesheet_directory() . '/css/style.css' ) ) {
			$style_uri = get_stylesheet_directory_uri() . '/css/style.css';
		}
		elseif ( is_file( get_stylesheet_directory() . '/style.css' ) ) {
			$style_uri = get_stylesheet_directory_uri() . '/style.css';
		}

		wp_enqueue_style(
			'pera-style',
			$style_uri,
			false,
			wp_get_theme()->get( 'Version' ),
			'all'
		);
	}

	/**
	 * Enqueue scripts for front-end.
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'pera-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
		wp_enqueue_script( 'pera-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

}
