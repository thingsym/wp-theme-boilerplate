<?php
/**
 * The header image
 *
 * @package WP Theme Boilerplate
 */

?>
<div class="site-header-image">
<img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="">
</div>
