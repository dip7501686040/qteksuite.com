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

get_header(); ?>

<div id="document-wrapper" class="<?php echo apply_filters('thrive-document-wrapper', 'thrive-document-wrapper'); ?>">
	
	<?php thrive_the_page_title(); ?>

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

		<?php do_action( 'thrive_before_page_content' ); ?>
		
		<?php $layout = thrive_get_layout(); ?>

		<div class="<?php echo esc_attr( $layout['layout'] ); ?>">

		<div class="row">

			<div id="content-left-col" class="<?php echo esc_attr( $layout['content'] ); ?>">

				<?php do_action('thrive_bp_member_header'); ?>

				<div id="primary" class="content-area thrive-page-document">

				<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // End of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!--.col-md-8-->

	<div id="content-right-col" class="col-md-4 <?php echo esc_attr( $layout['sidebar'] ); ?>">

		<?php  get_sidebar(); ?>

	</div><!--.col-md-4-->
	</div><!--.row-->
</div>
	</div><!--#page-content-wrapper-->
</div>

<?php get_footer(); ?>
