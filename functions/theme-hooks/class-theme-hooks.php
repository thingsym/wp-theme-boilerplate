<?php
/**
 * Theme Hooks
 *
 * @package Pera
 * @since 1.0.0
 */

namespace Pera\Functions;

/**
 * class Theme_Hooks
 *
 * @since 1.0.0
 */
class Theme_Hooks {
	public function __construct() {
		add_action( 'pera/theme_hook/content/index/append', array( $this, 'content_archive_append' ) );
		add_action( 'pera/theme_hook/content/archive/append', array( $this, 'content_archive_append' ) );
		add_action( 'pera/theme_hook/content/search/append', array( $this, 'content_archive_append' ) );

		add_action( 'pera/theme_hook/content/index/prepend', array( $this, 'content_index_prepend' ) );
		add_action( 'pera/theme_hook/content/archive/prepend', array( $this, 'content_archive_prepend' ) );

		add_action( 'pera/theme_hook/content/page/append', array( $this, 'content_page_append' ) );
		add_action( 'pera/theme_hook/content/single/append', array( $this, 'content_single_append' ) );

		add_action( 'pera/theme_hook/header', array( $this, 'header' ) );
		add_action( 'pera/theme_hook/navi/global', array( $this, 'global_navi' ) );
		add_action( 'pera/theme_hook/site_info', array( $this, 'site_info' ) );

		add_action( 'pera/theme_hook/entry/post_thumbnail', array( $this, 'post_thumbnail' ) );
		add_action( 'pera/theme_hook/entry/meta/header', array( $this, 'entry_meta_header' ) );
		add_action( 'pera/theme_hook/entry/meta/footer', array( $this, 'entry_meta_footer' ) );
	}

	public function header() {
		get_template_part( 'templates/parts/site-header' );
	}

	public function global_navi() {
		get_template_part( 'templates/parts/global-navi' );
	}

	public function site_info() {
		get_template_part( 'templates/parts/site-info' );
	}

	public function content_index_prepend() {
		if ( is_home() && ! is_front_page() ) {
			?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
			<?php
		}
	}

	public function content_archive_prepend() {
		if ( is_archive() ) {
			?>
			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
		<?php
		}
		elseif ( is_search() ) {
			?>
			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'pera' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->
		<?php
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
		if ( class_exists( 'Pera\Functions\Post_Thumbnail' ) && method_exists( 'Pera\Functions\Post_Thumbnail', 'post_thumbnail' ) ) {
			\Pera\Functions\Post_Thumbnail::post_thumbnail();
		}
	}

	public function entry_meta_header() {
		if ( class_exists( 'Pera\Functions\Entry_Meta' ) && method_exists( 'Pera\Functions\Entry_Meta', 'entry_header' ) ) {
			\Pera\Functions\Entry_Meta::entry_header();
		}
	}

	public function entry_meta_footer() {
		if ( class_exists( 'Pera\Functions\Entry_Meta' ) && method_exists( 'Pera\Functions\Entry_Meta', 'entry_footer' ) ) {
			\Pera\Functions\Entry_Meta::entry_footer();
		}
	}

}
