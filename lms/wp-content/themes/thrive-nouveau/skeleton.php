<?php
/**
 * This file serves as a reference to
 * the generic layout of the theme.
 */
?>
<div id="document-wrapper" class="<?php echo apply_filters('thrive-document-wrapper', 'thrive-document-wrapper'); ?>">
	<div id="sidebar-wrap">
		<div id="sidebar-wrapper">
			<div id="page-sidenav" class="<?php echo thrive_layout_class('sidenav'); ?>">
				<div id="page-sidenav-section">
					<?php get_template_part( 'template-parts/sidebar', 'content' ); ?>
				</div>
			</div>
		</div>
	</div><!--#sidebar-wrao-->
	<div id="page-content-wrapper">
		<!--content goes here-->
	</div><!--#page-content-wrapper-->
</div>
