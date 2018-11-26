<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
while ( have_posts() ) :
	the_post();
	do_action( 'pera/theme_hook/content/page/prepend' );
	get_template_part( 'templates/content/page' );
	do_action( 'pera/theme_hook/content/page/append' );
endwhile;
do_action( 'pera/theme_hook/content/append' );
?>
</div>
</div>
<?php get_template_part( 'templates/sidebar/sidebar' ); ?>
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
