<?php
/**
 * BuddyPress - Users Header
 *
 * @since 3.0.0
 */
?>

<div id="item-header-avatar">
	<a href="<?php bp_displayed_user_link(); ?>">

		<?php bp_displayed_user_avatar( 'type=full' ); ?>

	</a>
</div><!-- #item-header-avatar -->

<div id="item-header-content">

	<?php if ( bp_is_active( 'activity' ) && bp_activity_do_mentions() ) : ?>
		<h1 class="user-displayname entry-title">
			<?php echo bp_get_displayed_user_fullname(); ?>
		</h1>
	<?php endif; ?>

	<?php bp_nouveau_member_hook( 'before', 'header_meta' ); ?>

	<?php bp_nouveau_member_header_buttons( array( 'container_classes' => array( 'member-header-actions' ) ) ); ?>

	<?php if ( function_exists('bp_displayed_user_mentionname')): ?>
		
		<?php if ( bp_nouveau_member_has_meta() ) : ?>
			
			<div class="item-meta">

				<div class="bp-nouveau-member-meta">
					<strong>
						
						@<?php bp_displayed_user_mentionname(); ?> 
						
					</strong>
					&middot; 
					<small>
						<?php bp_nouveau_member_meta(); ?>
					</small>
				</div>

			</div><!-- #item-meta -->

		<?php endif; ?>
		
	<?php endif; ?>
</div><!-- #item-header-content -->