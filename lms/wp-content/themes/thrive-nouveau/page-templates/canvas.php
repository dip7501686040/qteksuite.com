<?php
/**
 * Template Name: Canvas
 */

get_header();
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
	<div id="page-content-wrapper-canvas">
		<?php
		if ( have_posts() ):
			while ( have_posts() ):
				the_post();
				// using the WordPress loop, we'll display the post content here
				// inorder for page builder to work, you need the page builder's shortcode
				// right into the textarea wherein you compose your blog
				?>
				<?php do_action( 'thrive_before_page_content' ); ?>
					<div id="canvas-template-content" class="col-md-12">
						<div id="primary" class="content-area thrive-page-document">
							<main id="main" class="site-main" role="main">
								<div class="entry-content">
									<?php the_content(); ?>
								</div>
							</main>
						</div>

					</div>

				<?php
			endwhile;
		endif;
		?>
	</div><!--#page-content-wrapper-->
</div>
<?php
get_footer();

