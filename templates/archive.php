<?php
/**
 * The template for displaying archive pages
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
if ( have_posts() ) {
	do_action( 'pera/theme_hook/content/archive/prepend' );
	while ( have_posts() ) :
		the_post();
		/*
		* Include the Post-Type-specific template for the content.
		* If you want to override this in a child theme, then include a file
		* called content-___.php (where ___ is the Post Type name) and that will be used instead.
		*/
		get_template_part( 'templates/content/archive', get_post_type() );
	endwhile;
	do_action( 'pera/theme_hook/content/archive/append' );
}
else {
	get_template_part( 'templates/content/not-found' );
}
do_action( 'pera/theme_hook/content/append' );
?>
</div>
</div>
<?php get_template_part( 'templates/sidebar/sidebar' ); ?>
</div>

<footer class="site-footer">
<?php
do_action( 'pera/theme_hook/footer' );
do_action( 'pera/theme_hook/site_info' );
?>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
