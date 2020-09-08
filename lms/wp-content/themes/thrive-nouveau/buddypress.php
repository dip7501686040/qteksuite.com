<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package thrive
 */

get_header(); 
?>

<div id="document-wrapper" class="<?php echo apply_filters('thrive-document-wrapper', 'thrive-document-wrapper'); ?>">
	<?php thrive_the_page_title(); ?>
	<?php // Overlap member header ?>
	<?php if ( bp_is_user() ) { ?>
		<div id="buddypress-user-head">
			<div id="buddypress" class="buddypress-wrap bp-dir-hori-nav">

				<?php $is_user_nav_vertical = bp_nouveau_get_appearance_settings('user_nav_display'); ?>
				<?php $nav_class = 'thrive-bp-vertical-nav'; ?>

				<?php if (!$is_user_nav_vertical) { ?>
					<?php $nav_class = ''; ?>
				<?php } ?>

				<div class="<?php echo sanitize_html_class($nav_class); ?>" id="item-header" role="complementary" data-bp-item-id="<?php echo esc_attr( bp_displayed_user_id() ); ?>" 
					data-bp-item-component="members" class="users-header single-headers">
					<div id="item-header-cover-photo"></div>
					<div id="item-header-inner">
						<?php bp_nouveau_member_header_template_part(); ?>
						<div class="clearfix"></div>
					</div>
				</div><!-- #item-header -->
				<!-- Main Horizontal Navigation -->
				<?php if ( !$is_user_nav_vertical ) { ?>
					<?php if ( ! bp_nouveau_is_object_nav_in_sidebar() ) : ?>
						<?php bp_get_template_part( 'members/single/parts/item-nav' ); ?>
					<?php endif; ?>
				<?php } ?>
				
			</div>
		</div>

	<?php } ?>
	<?php // Overlap group header ?>
	<?php if ( bp_is_group() ) {?>
		<?php if ( bp_has_groups() ) : while ( bp_groups() ): bp_the_group(); ?>
			<div id="buddypress-group-head">
				<div id="buddypress" class="buddypress-wrap bp-dir-hori-nav">
					<div id="item-header" role="complementary" 
					data-bp-item-id="<?php bp_group_id(); ?>" data-bp-item-component="groups" class="groups-header single-headers">
						<div id="item-header-cover-photo"></div>
						<div id="item-header-inner">
							<?php bp_nouveau_group_header_template_part(); ?>
						</div>
					</div><!-- #item-header -->
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
	<?php } ?>

	<div id="sidebar-wrap">
		<div id="sidebar-wrapper">
			<div id="page-sidenav" class="<?php echo thrive_layout_class('sidenav'); ?>">
				<div id="page-sidenav-section">
					<?php get_template_part( 'template-parts/sidebar', 'content' ); ?>
				</div>
			</div>
		</div>
	</div><!--#sidebar-wrao-->
	
	<div id="page-content-wrapper" class="buddypress-layout-1">

		<?php do_action( 'thrive_before_page_content' ); ?>
		
		<?php $layout = thrive_get_layout(); ?>

		<div class="row">

			<div id="content-left-col" class="<?php echo esc_attr( $layout['content'] ); ?>">

				<div id="primary" class="content-area thrive-page-document">

					<main id="buddypress-main" class="site-main-buddypress" role="main">
						
						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'template-parts/content', 'buddypress' ); ?>

						<?php endwhile; // End of the loop. ?>

					</main><!-- #main -->

				</div><!-- #primary -->

			</div><!--.col-md-8-->

		<div id="content-right-col" class="<?php echo esc_attr( $layout['sidebar'] ); ?>">
			
			<div id="secondary" class="widget-area" role="complementary">
				
				<?php if ( bp_is_group() ) { ?>
					<!--Admin/Mod-->

					<div id="group-admin-mods">

						<?php if ( bp_current_user_can( 'groups_access_group' ) ) : ?>

							<dl class="moderators-lists">

								<dt class="moderators-title"><?php _e( 'Group Admins', 'thrive-nouveau' ); ?></dt>

								<dd class="user-list admins"><?php bp_group_list_admins(); ?>

									<?php bp_nouveau_group_hook( 'after', 'menu_admins' ); ?>

								</dd>
								
							</dl>

							<?php
							if ( bp_group_has_moderators() ) :
								  bp_nouveau_group_hook( 'before', 'menu_mods' );
							?>

								<dl class="moderators-lists">
									<dt class="moderators-title"><?php _e( 'Group Mods', 'thrive-nouveau' ); ?></dt>
									<dd class="user-list moderators">
										<?php
										bp_group_list_mods();
										bp_nouveau_group_hook( 'after', 'menu_mods' );
										?>
									</dd>
								</dl>

							<?php endif; ?>

						<?php endif; ?>

					</div><!-- .item-actions -->
					<?php if ( ! bp_nouveau_groups_front_page_description() ) { ?>
						<!--Group Description-->
						<div id="meta-group-description">
							<div id="meta-group-description-title">
								<h3>
									<?php echo sprintf( esc_html__('About %s', 'thrive-nouveau'), get_the_title() ); ?>
								</h3>
							</div>
							
							<?php if ( bp_nouveau_group_meta()->description ) { ?>
								<div class="group-description">
									<?php echo bp_nouveau_group_meta()->description; ?>
								</div><!-- //.group_description -->
							<?php	} ?>
						
						</div>
					<?php } ?>
				<?php } ?>
				
				<?php dynamic_sidebar( thrive_get_bp_sidebar() ); ?>
				
			</div>

		</div><!--.col-md-4-->
</div>
	</div><!--#page-content-wrapper-->
</div>

<?php get_footer(); ?>
