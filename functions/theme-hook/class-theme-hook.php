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
		add_action( 'wp_theme_boilerplate/theme_hook/content/index/prepend', array( $this, 'content_index_prepend' ) );
		add_action( 'wp_theme_boilerplate/theme_hook/content/archive/prepend', array( $this, 'content_archive_prepend' ) );

		add_action( 'wp_theme_boilerplate/theme_hook/content/index/append', array( $this, 'content_archive_append' ) );
		add_action( 'wp_theme_boilerplate/theme_hook/content/archive/append', array( $this, 'content_archive_append' ) );
		add_action( 'wp_theme_boilerplate/theme_hook/content/search/append', array( $this, 'content_archive_append' ) );

		add_action( 'wp_theme_boilerplate/theme_hook/content/page/append', array( $this, 'content_page_append' ) );
		add_action( 'wp_theme_boilerplate/theme_hook/content/single/append', array( $this, 'content_single_append' ) );

		add_action( 'wp_theme_boilerplate/theme_hook/site/header', array( $this, 'header' ) );
		add_action( 'wp_theme_boilerplate/theme_hook/site/header/after', array( $this, 'header_image' ) );
		add_action( 'wp_theme_boilerplate/theme_hook/site/header/after', array( $this, 'global_navi' ) );
		add_action( 'wp_theme_boilerplate/theme_hook/site/footer', array( $this, 'site_info' ) );

		add_action( 'wp_theme_boilerplate/theme_hook/entry/post_thumbnail', array( $this, 'post_thumbnail' ) );
		add_action( 'wp_theme_boilerplate/theme_hook/entry/meta/header', array( $this, 'entry_meta_header' ) );
		add_action( 'wp_theme_boilerplate/theme_hook/entry/meta/footer', array( $this, 'entry_meta_footer' ) );
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
		get_template_part( 'templates/parts/site-info' );
	}

	public function content_index_prepend() {
		if ( is_home() && ! is_front_page() ) {
			get_template_part( 'templates/parts/page-header-single-post' );
		}
	}

	public function content_archive_prepend() {
		if ( is_archive() ) {
			get_template_part( 'templates/parts/page-header-archive' );
		}
		elseif ( is_search() ) {
			get_template_part( 'templates/parts/page-header-search' );
		}
	}

	public function content_archive_append() {
		the_posts_navigation();
	}

	public function content_page_append() {
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template( '/templates/parts/comments.php', true );
		}
	}

	public function content_single_append() {
		the_post_navigation();

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template( '/templates/parts/comments.php', true );
		}
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

}