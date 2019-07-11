<?php
/**
 * Theme
 *
 * @package WP Theme Boilerplate
 * @since 1.0.0
 */

namespace WP_Theme_Boilerplate\Functions\Setup;

/**
 * Class Theme
 *
 * @since 1.0.0
 */
class Theme {
	protected $hook_prefix = 'wp_theme_boilerplate/functions/setup/';

	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'setup' ) );
		add_action( 'after_setup_theme', array( $this, 'content_width' ), 0 );
		add_action( 'wp_head', array( $this, 'print_meta' ), 0 );
	}

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since 1.0.0
	 */
	public function setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on WP Theme Boilerplate, use a find and replace
		 * to change 'wp-theme-boilerplate' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wp-theme-boilerplate', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				$this->hook_prefix . 'custom-background/args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Set up the WordPress core custom header feature.
		add_theme_support(
			'custom-header',
			apply_filters(
				$this->hook_prefix . 'custom-header/args',
				array(
					'default-image'      => '',
					'default-text-color' => '000000',
					'width'              => 1000,
					'height'             => 250,
					'flex-width'         => true,
					'flex-height'        => true,
					'wp-head-callback'   => array( 'WP_Theme_Boilerplate\Functions\Custom_Header\Custom_Header', 'header_style' ),
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
				'header-text' => array(
					'site-title',
					'site-description',
				),
			)
		);

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'css/style-editor.css' );

		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

	}

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	public function content_width() {
		// This variable is intended to be overruled from themes.
		// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
		$GLOBALS['content_width'] = apply_filters( $this->hook_prefix . 'content_width', 640 );
	}

	public function print_meta() {
		get_template_part( 'templates/parts/meta' );
	}

}
