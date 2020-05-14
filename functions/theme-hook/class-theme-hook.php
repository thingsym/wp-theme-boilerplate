<?php
/**
 * Theme Hook
 *
 * @package WP Theme Boilerplate
 * @since 1.0.0
 */

namespace WP_Theme_Boilerplate\Functions\Theme_Hook;

use WP_Theme_Boilerplate\Functions\Post_Thumbnail\Post_Thumbnail;
use WP_Theme_Boilerplate\Functions\Entry_Meta\Entry_Meta;

/**
 * Class Theme_Hook
 *
 * @since 1.0.0
 */
class Theme_Hook {
	public function __construct() {
		add_action( 'wp_theme_boilerplate/theme_hook/site/header', [ $this, 'header' ] );
		add_action( 'wp_theme_boilerplate/theme_hook/site/header/after', [ $this, 'global_navi' ] );
		add_action( 'wp_theme_boilerplate/theme_hook/site/header/after', [ $this, 'header_image' ] );
		add_action( 'wp_theme_boilerplate/theme_hook/site/footer/after', [ $this, 'site_info' ] );

		add_action( 'wp_theme_boilerplate/theme_hook/entry/post_thumbnail', [ $this, 'post_thumbnail' ] );
		add_action( 'wp_theme_boilerplate/theme_hook/entry/meta/header', [ $this, 'entry_meta_header' ] );
		add_action( 'wp_theme_boilerplate/theme_hook/entry/meta/footer', [ $this, 'entry_meta_footer' ] );

		add_action( 'wp_theme_boilerplate/theme_hook/content/index/prepend', [ $this, 'add_page_header' ] );
		add_action( 'wp_theme_boilerplate/theme_hook/content/archive/prepend', [ $this, 'add_page_header' ] );

		add_action( 'wp_theme_boilerplate/theme_hook/content/index/append', [ $this, 'add_posts_navigation' ] );
		add_action( 'wp_theme_boilerplate/theme_hook/content/archive/append', [ $this, 'add_posts_navigation' ] );
		add_action( 'wp_theme_boilerplate/theme_hook/content/search/append', [ $this, 'add_posts_navigation' ] );

		add_action( 'wp_theme_boilerplate/theme_hook/content/single/append', [ $this, 'add_post_navigation' ] );

		add_action( 'wp_theme_boilerplate/theme_hook/content/page/append', [ $this, 'add_comments' ] );
		add_action( 'wp_theme_boilerplate/theme_hook/content/single/append', [ $this, 'add_comments' ] );
	}

	public function header() {
		get_template_part( 'templates/parts/site-header' );
	}

	public function header_image() {
		get_template_part( 'templates/parts/header-image' );
	}

	public function global_navi() {
		get_template_part( 'templates/parts/global-navi' );
	}

	public function site_info() {
		get_template_part( 'templates/parts/theme-info' );
	}

	public function post_thumbnail() {
		Post_Thumbnail::post_thumbnail();
	}

	public function entry_meta_header() {
		Entry_Meta::entry_header();
	}

	public function entry_meta_footer() {
		Entry_Meta::entry_footer();
	}

	public function add_page_header() {
		if ( is_home() && ! is_front_page() ) {
			get_template_part( 'templates/page-header/single-post' );
		}
		elseif ( is_archive() ) {
			get_template_part( 'templates/page-header/archive' );
		}
		elseif ( is_search() ) {
			get_template_part( 'templates/page-header/search' );
		}
	}

	public function add_posts_navigation() {
		the_posts_navigation();
	}

	public function add_post_navigation() {
		the_post_navigation();
	}

	public function add_comments() {
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template( '/templates/parts/comments.php', true );
		}
	}

}
