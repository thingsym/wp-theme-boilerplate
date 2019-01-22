<?php
/**
 * Custom Header
 *
 * @package WP Theme Boilerplate
 * @since 1.0.0
 */

namespace WP_Theme_Boilerplate\Functions\Custom_Header;

/**
 * class Custom_Header
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @since 1.0.0
 *
 */
class Custom_Header {

	public function __construct() {}

	/**
	 * Styles the header image and text displayed on the blog.
	 */
	public function header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
?>
<style type="text/css">
<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
?>
.site-title,
.site-description {
	position: absolute;
	clip: rect(1px, 1px, 1px, 1px);
}
<?php
		// If the user has set a custom color for the text use that.
		else :
?>
.site-title a,
.site-description {
	color: #<?php echo esc_attr( $header_text_color ); ?>;
}
		<?php endif; ?>
</style>
<?php
	}
}
