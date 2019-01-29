<?php
/**
 * Global navi
 *
 * @package WP Theme Boilerplate
 */

?>
<?php
wp_nav_menu(
	array(
		'theme_location'  => 'menu-1',
		'container'       => 'nav',
		'container_class' => 'global-menu',
		'menu_class'      => 'menu',
		'fallback_cb'     => false,
	)
);

