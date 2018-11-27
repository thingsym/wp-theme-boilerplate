<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pera
 */

?>
<div class="site-info">
<a href="<?php echo esc_url( 'https://wordpress.org/' ); ?>">
<?php
	/* translators: %s: CMS name, i.e. WordPress. */
	printf( esc_html__( 'Proudly powered by %s', 'pera' ), 'WordPress' );
?>
</a>
<span class="sep"> | </span>
<?php echo esc_html__( 'Theme: ', 'pera' ); ?>
<a href="<?php echo esc_url( 'https://wordpress.org/themes/pera/' ); ?>">Pera</a> by
<a href="<?php echo esc_url( 'https://github.com/thingsym/' ); ?>">Thingsym</a>
</div><!-- .site-info -->
