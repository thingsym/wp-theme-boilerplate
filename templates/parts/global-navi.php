<?php
/**
 * Global navi
 *
 * @package WP Theme Boilerplate
 */

?>
<?php
wp_nav_menu(
	[
		'theme_location'  => 'menu-1',
		'container'       => 'nav',
		'container_class' => 'site-navi',
		'menu_class'      => 'global-menu',
		'fallback_cb'     => false,
	]
);
