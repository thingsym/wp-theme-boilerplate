<?php
/**
 * Post Thumbnail
 *
 * @package Pera
 * @since 1.0.0
 */

namespace Pera\Functions;

class Post_Thumbnail {

	public function __construct() {}

	public static function post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
?>

<div class="post-thumbnail">
<?php the_post_thumbnail(); ?>
</div><!-- .post-thumbnail -->

		<?php else : ?>

<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
?>
</a>

<?php
		endif; // End is_singular().
	}

}