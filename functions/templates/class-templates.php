<?php
/**
 * Templates
 *
 * @package Pera
 * @since 1.0.0
 */

namespace Pera\Functions;

/**
 * class Templates
 *
 * @since 1.0.0
 */
class Templates {
	protected $templates_dir = 'templates/';

	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'custom_template_hierarchy' ) );
	}

	/**
	 * custom template hierarchy
	 *
	 * @since 1.0.0
	 */
	public function custom_template_hierarchy() {
		$types = array(
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
		);

		foreach ( $types as $type ) {
			add_filter( "{$type}_template_hierarchy", function( $templates ) {
				$custom_templates = array();

				foreach ( $templates as $template ) {
					$custom_templates[] = $this->templates_dir . $template;
					$custom_templates[] = $template;
				}

				return $custom_templates;
			} );
		}
	}

}
