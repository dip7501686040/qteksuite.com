<?php
/**
 * BuddyPress - Groups Header
 *
 * @since 3.0.0
 */
?>

<?php bp_get_template_part( 'groups/single/parts/header-item-actions' ); ?>

<?php if ( ! bp_disable_group_avatar_uploads() ) : ?>
	<div id="item-header-avatar">
		<a href="<?php echo esc_url( bp_get_group_permalink() ); ?>" class="bp-tooltip" data-bp-tooltip="<?php echo esc_attr( bp_get_group_name() ); ?>">
			<?php bp_group_avatar(); ?>
		</a>
	</div><!-- #item-header-avatar -->
<?php endif; ?>

<div id="item-header-content">

	<h2 class="group-title entry-title">
		<?php the_title(); ?>
	</h2>

	<div id="bp_nouveau_group_header_buttons">
		<?php bp_nouveau_group_header_buttons(); ?>
	</div>
	
	<div class="clearfix"></div>

	<div id="group-status-last-active">
		<p class="activity" data-_disabled_livestamp="<?php bp_core_iso8601_date( bp_get_group_last_active( 0, array( 'relative' => false ) ) ); ?>">
			<strong>
				<?php echo esc_html( bp_nouveau_group_meta()->status ); ?>
			</strong>
			&middot;
			<small>
				<?php printf( __( 'active %s', 'thrive-nouveau' ), bp_get_group_last_active() ); ?>
			</small>
		</p>
	</div>

	<?php bp_nouveau_group_hook( 'before', 'header_meta' ); ?>

	<?php if ( bp_nouveau_group_has_meta_extra() ) : ?>
		<div class="item-meta">
			<?php echo bp_nouveau_group_meta()->extra; ?>
		</div><!-- .item-meta -->
	<?php endif; ?>

</div><!-- #item-header-content -->

