<?php
/**
 * Template Name: Dashboard 
 */
global $wp_registered_widgets;
$widgets = wp_get_sidebars_widgets(); 
get_header();
?>
<div id="document-wrapper">
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
		<?php
		if( have_posts() ){
			while( have_posts() ){
				the_post();
				// using the WordPress loop, we'll display the post content here
				// inorder for page builder to work, you need the page builder's shortcode
				// right into the textarea wherein you compose your blog
				?>
				<?php do_action( 'thrive_before_page_content' ); ?>

					<div id="start-template-content" class="col-md-12">

						<div id="primary" class="content-area thrive-page-document">
							<main id="main" class="site-main" role="main">
								<?php the_content(); ?>
							</main>
						</div>
						<?php if ( is_user_logged_in() ) { ?>
						<div id="dashboard-toolbar" role="toolbar" class="hidden __disabled_feature">
  							<div class="row">
								<div class="col-md-12">
									<div>
										<a data-placement="bottom" data-toggle="tooltip" title="<?php esc_attr_e('Click to Reset Widget Positions','thrive-nouveau'); ?>" 
											href="<?php echo esc_url( admin_url('admin-ajax.php?action=thrive_dashboard_widgets_reposition_reset') ); ?>" id="reset-widgets-position">
											<i class="material-icons">widgets</i>
										</a>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<?php } ?>
						<?php if ( is_user_logged_in() ) { ?>
							<div id="dashboard-widgets" >
								<?php // thrive_user_dynamic_sidebar ?>
								<?php $user_dashboard_widgets = get_user_meta(get_current_user_id(), 'thrive_user_dashboard_widget_position', false); ?>
								<?php if ( ! empty ( $user_dashboard_widgets ) ) { ?>
									<?php thrive_dashboard_widget_dynamic_sidebar(esc_html__('Dashboard','thrive-nouveau')); ?>
								<?php } else { ?>
									<?php dynamic_sidebar(esc_html__('Dashboard','thrive-nouveau')); ?>
								<?php } ?>
							</div>
						<?php } ?>
					</div>

				<?php
			}
		}
		?>
	</div><!--#page-content-wrapper-->
</div>
<?php 
get_footer();
