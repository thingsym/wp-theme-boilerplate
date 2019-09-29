<?php
/**
 * Editor
 *
 * @package WP Theme Boilerplate
 * @since 1.2.0
 */

namespace WP_Theme_Boilerplate\Functions\Setup;

/**
 * Class Editor
 *
 * @since 1.2.0
 */
class Editor {
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'block_editor_settings' ) );
	}

	/**
	 * Sets up Block Editor settings.
	 *
	 * @since 1.2.0
	 */
	public function block_editor_settings() {
	}

}
