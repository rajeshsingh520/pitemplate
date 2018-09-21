<?php
if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>
<aside id="pi-sidebar-right" class="widget-area col-12 col-md-3">
	<?php dynamic_sidebar( 'sidebar' ); ?>
</aside><!-- #secondary -->
