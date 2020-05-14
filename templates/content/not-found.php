<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP Theme Boilerplate
 */

?>
<header class="page-header">
<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wp-theme-boilerplate' ); ?></h1>
</header><!-- .page-header -->

<article class="no-results not-found">
	<div class="entry-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'wp-theme-boilerplate' ),
					[
						'a' => [
							'href' => [],
						],
					]
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'wp-theme-boilerplate' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wp-theme-boilerplate' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .entry-content -->
</article><!-- .no-results -->
