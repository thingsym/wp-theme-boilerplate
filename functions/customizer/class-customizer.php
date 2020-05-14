<?php
/**
 * Customizer
 *
 * @package WP Theme Boilerplate
 * @since 1.0.0
 */

namespace WP_Theme_Boilerplate\Functions\Customizer;

/**
 * Class Customizer
 *
 * @since 1.0.0
 */
class Customizer {
	public function __construct() {
		add_action( 'customize_register', [ $this, 'customizer' ] );
		add_action( 'customize_controls_enqueue_scripts', [ $this, 'control_enqueue_scripts' ] );
		add_action( 'customize_preview_init', [ $this, 'preview_enqueue_scripts' ] );
	}

	public function customizer( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial(
				'blogname',
				[
					'selector'        => '.site-title a',
					'render_callback' => [ $this, 'render_partial_blogname' ],
				]
			);

			$wp_customize->selective_refresh->add_partial(
				'blogdescription',
				[
					'selector'        => '.site-description',
					'render_callback' => [ $this, 'render_partial_blogdescription' ],
				]
			);
		}
	}

	/**
	 * Render the site tagline for the selective refresh partial.
	 *
	 * @return void
	 */
	public function render_partial_blogname() {
		bloginfo( 'name' );
	}

	/**
	 * Render the site tagline for the selective refresh partial.
	 *
	 * @return void
	 */
	public function render_partial_blogdescription() {
		bloginfo( 'description' );
	}

	public function control_enqueue_scripts() {
		wp_enqueue_script(
			'wp-theme-boilerplate-customizer-control',
			get_template_directory_uri() . '/js/customize-control.min.js',
			[],
			'20191008',
			true
		);
	}

	public function preview_enqueue_scripts() {
		wp_enqueue_script(
			'wp-theme-boilerplate-customizer-preview',
			get_template_directory_uri() . '/js/customize-preview.min.js',
			[ 'customize-preview' ],
			'20151215',
			true
		);
	}
}
