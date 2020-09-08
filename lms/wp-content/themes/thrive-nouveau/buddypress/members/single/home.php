<?php
/**
 * BuddyPress - Members Home
 *
 * @since   1.0.0
 */
?>

	<?php bp_nouveau_member_hook( 'before', 'home_content' ); ?>

	<?php $is_user_nav_vertical = bp_nouveau_get_appearance_settings('user_nav_display'); ?>
	
	<?php if ( $is_user_nav_vertical ) { ?>
		<!-- Main Vertical Navigation -->
		<?php if ( ! bp_nouveau_is_object_nav_in_sidebar() ) : ?>
			<?php bp_get_template_part( 'members/single/parts/item-nav' ); ?>
		<?php endif; ?>
	<?php } ?>

	<div class="bp-wrap">

		<div id="item-body" class="item-body">

			<?php bp_nouveau_member_template_part(); ?>

		</div><!-- #item-body -->
		
	</div><!-- // .bp-wrap -->

	<?php bp_nouveau_member_hook( 'after', 'home_content' ); ?>