<?php
/**
 * The page header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP Theme Boilerplate
 */

?>
<header class="page-header">
<h1 class="page-title">
<?php
/* translators: %s: search query. */
printf( esc_html__( 'Search Results for: %s', 'wp-theme-boilerplate' ), '<span>' . get_search_query() . '</span>' );
?>
</h1>
</header><!-- .page-header -->
