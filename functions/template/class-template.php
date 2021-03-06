<?php
/**
 * Template
 *
 * @package WP Theme Boilerplate
 * @since 1.0.0
 */

namespace WP_Theme_Boilerplate\Functions\Template;

/**
 * Class Template
 *
 * @since 1.0.0
 */
class Template {

	/**
	 * Protected value.
	 *
	 * @access protected
	 *
	 * @var string $templates_dir
	 */
	protected $templates_dir = 'templates/';

	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'custom_template_hierarchy' ] );
		add_action( 'get_search_form', [ $this, 'get_search_form' ] );
	}

	/**
	 * Custom template hierarchy
	 *
	 * @since 1.0.0
	 */
	public function custom_template_hierarchy() {
		$types = [
			'index',
			'404',
			'archive',
			'author',
			'category',
			'tag',
			'taxonomy',
			'date',
			'embed',
			'home',
			'frontpage',
			'page',
			'paged',
			'search',
			'single',
			'singular',
			'attachment',
		];

		foreach ( $types as $type ) {
			add_filter(
				"{$type}_template_hierarchy",
				function( $templates ) {
					$custom_templates = [];

					foreach ( $templates as $template ) {
						$custom_templates[] = $this->templates_dir . $template;
						$custom_templates[] = $template;
					}

					return $custom_templates;
				}
			);
		}
	}

	/**
	 * Get search_form from templates/parts
	 *
	 * @since 1.0.0
	 */
	public function get_search_form( $form ) {
		do_action( 'pre_get_search_form' );

		ob_start();
		get_template_part( 'templates/parts/search_form' );
		$tmp_form = ob_get_clean();

		if ( empty( $tmp_form ) ) {
			return $form;
		}

		return $tmp_form;
	}

}
