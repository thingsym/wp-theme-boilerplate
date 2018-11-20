<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pera
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
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
	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'pera' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pera' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
<?php 
	if ( class_exists( 'Pera\Functions\Entry_Meta' ) && method_exists( 'Pera\Functions\Entry_Meta', 'entry_footer' ) ) {
		Pera\Functions\Entry_Meta::entry_footer();
	}
?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
