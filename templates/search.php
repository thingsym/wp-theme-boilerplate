<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WP Theme Boilerplate
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action( 'wp_theme_boilerplate/theme_hook/body/prepend' ); ?>
<div class="container">
<header class="site-header">
<?php do_action( 'wp_theme_boilerplate/theme_hook/header' ); ?>
</header>

<?php do_action( 'wp_theme_boilerplate/theme_hook/navi/global' ); ?>

<div class="site-content">
<div class="primary">
<div class="content-container">
<?php
do_action( 'wp_theme_boilerplate/theme_hook/content/prepend' );
if ( have_posts() ) {
	do_action( 'wp_theme_boilerplate/theme_hook/content/archive/prepend' );
	while ( have_posts() ) :
		the_post();
		/**
		 * Run the loop for the search to output the results.
		 * If you want to overload this in a child theme then include a file
		 * called content-search.php and that will be used instead.
		 */
		get_template_part( 'templates/content/search' );
	endwhile;
	do_action( 'wp_theme_boilerplate/theme_hook/content/archive/append' );
}
else {
	get_template_part( 'templates/content/not-found' );
}
do_action( 'wp_theme_boilerplate/theme_hook/content/append' );
?>
</div>
</div>
<?php get_template_part( 'templates/sidebar/sidebar' ); ?>
</div>

<footer class="site-footer">
<?php
do_action( 'wp_theme_boilerplate/theme_hook/footer' );
do_action( 'wp_theme_boilerplate/theme_hook/site_info' );
?>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
