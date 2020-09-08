<?php
/**
 * The template for displaying all single projects.
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
		<div class="row">
			<?php do_action( 'thrive_before_page_content' ); ?>
			<div id="content-left-col" class="col-md-8">
				<div id="primary" class="content-area thrive-page-document">
					<main id="main" class="site-main" role="main">

						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'template-parts/content', 'page' ); ?>


						<?php endwhile; // End of the loop. ?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!--.col-md-8-->
			<div id="content-right-col" class="col-md-4">
				<?php get_sidebar(); ?>
			</div><!--.col-md-4-->
		</div>
	</div><!--#page-content-wrapper-->
</div>

<?php get_footer(); ?>
