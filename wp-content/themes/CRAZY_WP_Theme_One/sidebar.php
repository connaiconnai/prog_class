<div id="sidebar-blog">
	<?php if ( is_active_sidebar( 'my_sidebar' ) ) : ?>
	    <div class="sidebar-widget">
	        <?php dynamic_sidebar( 'my_sidebar' ); ?>
	    </div><!-- #primary-sidebar -->
	<?php endif; ?>
</div><!--end left-sidebar-->