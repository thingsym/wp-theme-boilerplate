<?php
/**
 * Entry Meta
 *
 * @package WP Theme Boilerplate
 * @since 1.0.0
 */

namespace WP_Theme_Boilerplate\Functions\Entry_Meta;

/**
 * Class Entry_Meta
 *
 * @since 1.0.0
 */
class Entry_Meta {

	public function __construct() {}

	public static function entry_header() {
		self::posted_on();
		self::modified_on();
		self::posted_by();
	}

	public static function posted_on() {
		if ( empty( get_option( 'date_format' ) ) ) {
			return;
		}

		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s %3$s</time>';

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_html( get_the_time() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'wp-theme-boilerplate' ),
			$time_string
		);

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo '<span class="posted-on">' . $posted_on . '</span> ';
	}

	public static function modified_on() {
		if ( empty( get_option( 'date_format' ) ) ) {
			return;
		}

		if ( get_the_modified_time( 'U' ) <= get_the_time( 'U' ) ) {
			return;
		}

		$time_string = '<time class="entry-date modified" datetime="%1$s">%2$s %3$s</time>';

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() ),
			esc_html( get_the_modified_time() )
		);

		$modified_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Modified on %s', 'post date', 'wp-theme-boilerplate' ),
			$time_string
		);

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo '<span class="modified-on">' . $modified_on . '</span> ';
	}

	public static function posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'wp-theme-boilerplate' ),
			/* @phpstan-ignore-next-line */
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo '<span class="byline"> ' . $byline . '</span> ';
	}

	public static function entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'wp-theme-boilerplate' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'wp-theme-boilerplate' ) . '</span>', $categories_list );  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo ' ';
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'wp-theme-boilerplate' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'wp-theme-boilerplate' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo ' ';
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'wp-theme-boilerplate' ),
						[
							'span' => [
								'class' => [],
							],
						]
					),
					get_the_title()
				)
			);
			echo '</span> ';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit<span class="screen-reader-text"> %s</span>', 'wp-theme-boilerplate' ),
					[
						'span' => [
							'class' => [],
						],
					]
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}

}
