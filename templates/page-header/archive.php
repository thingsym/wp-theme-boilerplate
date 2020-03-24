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
<?php
the_archive_title( '<h1 class="page-title">', '</h1>' );
the_archive_description( '<div class="archive-description">', '</div>' );
?>
</header><!-- .page-header -->
