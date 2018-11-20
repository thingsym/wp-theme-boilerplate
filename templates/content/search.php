<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pera
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
<?php
	if ( class_exists( 'Pera\Functions\Entry_Meta' ) && method_exists( 'Pera\Functions\Entry_Meta', 'posted_on' ) ) {
		Pera\Functions\Entry_Meta::posted_on();
	}
	if ( class_exists( 'Pera\Functions\Entry_Meta' ) && method_exists( 'Pera\Functions\Entry_Meta', 'posted_by' ) ) {
		Pera\Functions\Entry_Meta::posted_by();
	}
?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

<?php
	if ( class_exists( 'Pera\Functions\Post_Thumbnail' ) && method_exists( 'Pera\Functions\Post_Thumbnail', 'post_thumbnail' ) ) {
		Pera\Functions\Post_Thumbnail::post_thumbnail();
	}
?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
<?php 
	if ( class_exists( 'Pera\Functions\Entry_Meta' ) && method_exists( 'Pera\Functions\Entry_Meta', 'entry_footer' ) ) {
		Pera\Functions\Entry_Meta::entry_footer();
	}
?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
