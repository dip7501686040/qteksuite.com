<?php
/**
 * The template for displaying all single posts.
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
	</div><!--#sidebar-wrap-->
	
	<div id="page-content-wrapper">

		<?php $layout = thrive_get_layout(); ?>
		
		<?php while ( have_posts() ) : the_post(); ?>

		<div class="<?php echo esc_attr( $layout['layout'] ); ?>">
			<div class="row">
				<div id="content-left-col" class="<?php echo esc_attr( $layout['content'] ); ?>">

					<div id="primary" class="content-area">
					
						<main id="main" class="site-main" role="main">

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<?php get_template_part( 'template-parts/content', 'learndash-single' ); ?>

								<?php the_post_navigation(); ?>

								<?php
									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
								?>

							</article>
							
						</main><!-- #main -->
					</div><!-- #primary -->
				</div><!--col-md-8-->
				<div id="content-right-col" class="<?php echo esc_attr( $layout['sidebar'] ); ?>">	
					<div id="secondary" class="widget-area" role="complementary">
						<?php dynamic_sidebar('LearnDash Sidebar'); ?>
					</div>
				</div>
			</div><!--.row-->
			<?php endwhile; // End of the loop. ?>

		</div>
	</div><!--#page-content-wrapper-->
</div>

<?php get_footer(); ?>
