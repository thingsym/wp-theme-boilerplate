<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Pera
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action( 'pera/theme_hook/body/prepend' ); ?>
<div class="container">
<header class="site-header">
<?php do_action( 'pera/theme_hook/header' ); ?>
</header>

<?php do_action( 'pera/theme_hook/navi/global' ); ?>

<div class="site-content">
<div class="primary">
<div class="content-container">
<?php
do_action( 'pera/theme_hook/content/prepend' );
get_template_part( 'templates/content/404' );
do_action( 'pera/theme_hook/content/append' );
?>
</div>
</div>
</div>

<footer class="site-footer">
<?php
do_action( 'pera/theme_hook/footer' );
do_action( 'pera/theme_hook/copyright' );
?>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
