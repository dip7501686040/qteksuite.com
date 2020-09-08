<?php
/**
 * BuddyPress - Groups Home
 *
 * @since 3.0.0
 */

if ( bp_has_groups() ) :
	while ( bp_groups() ) :
		bp_the_group();
	?>

		<?php bp_nouveau_group_hook( 'before', 'home_content' ); ?>

	

		<div class="bp-wrap">

			<?php if ( ! bp_nouveau_is_object_nav_in_sidebar() ) : ?>

				<?php bp_get_template_part( 'groups/single/parts/item-nav' ); ?>

			<?php endif; ?>

			<div id="item-body" class="item-body">

				<?php // Originally from includex/groups/templates-tags.php ?>
				
				<?php bp_nouveau_template_notices(); ?>
				
				<?php bp_nouveau_group_template_part(); ?>

			</div><!-- #item-body -->

		</div><!-- // .bp-wrap -->

		<?php bp_nouveau_group_hook( 'after', 'home_content' ); ?>

	<?php endwhile; ?>

<?php
endif;