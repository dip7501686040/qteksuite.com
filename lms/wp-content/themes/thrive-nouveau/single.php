<?php
/**
 * The template for displaying all single posts.
 *
 * @package thrive
 */

get_header(); ?>
<div id="document-wrapper" class="<?php echo apply_filters('thrive-document-wrapper', 'thrive-document-wrapper'); ?>">

	<div id="sidebar-wrap">
		<div id="sidebar-wrapper">
			<div id="page-sidenav" class="<?php echo thrive_layout_class('sidenav'); ?>">
				<div id="page-sidenav-section">
					<?php get_template_part( 'template-parts/sidebar', 'content' ); ?>
				</div>
			</div>
		</div>
	</div><!--#sidebar-wrap-->
	
	<div id="page-content-wrapper" itemscope itemtype="http://schema.org/Blog" itemprop="blogPost">

		<?php $layout = thrive_get_layout(); ?>
		
		<?php while ( have_posts() ) : the_post(); ?>
		
		<div class="entry-head">
			
			<div class="entry-big-categories">
				<?php the_category(', '); ?>
			</div>

			<div class="entry-big-title">
				<a href="<?php echo esc_url(the_permalink()); ?>" itemprop="url" title="<?php echo esc_attr( the_title() ); ?>">
					<h1 itemprop="headline" class="entry-title">
						<span itemprop="about">
							<?php echo the_title(); ?>
						</span>
					</h1>
				</a>
			</div>

			<?php if ( has_excerpt() ) { ?>
				<div itemprop="accessibilitySummary" class="entry-big-excerpt">
					<?php the_excerpt(); ?>
				</div>
			<?php } ?>

			<div class="entry-author">
				<div class="entry-author-avatar">
						<a href="<?php echo esc_url( thrive_get_user_link( get_the_author_meta('ID') ) ); ?>" 
						title="<?php echo esc_attr_e('Visit author\'s blog', 'thrive-nouveau'); ?>">
							<?php echo get_avatar(get_the_author_meta('ID')); ?>
						</a>
				</div>
				<?php thrive_posted_on(true); ?>
			</div>

			<div class="thrive-post-edit-link">
				<?php edit_post_link( esc_html__('Edit Post', 'thrive-nouveau') ) ?>
			</div>

			<div class="entry-sep"></div>
		</div><!--.entry-head-->

		<div class="<?php echo esc_attr( $layout['layout'] ); ?>">

			<div class="row">
				<div id="content-left-col" class="<?php echo esc_attr( $layout['content'] ); ?>">

					<div id="primary" class="content-area">
					
						<main id="main" class="site-main" role="main">

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<div class="entry-header hidden">
									
									<header class="single-entry-title">
										<h1 class="entry-title"><?php echo the_title(); ?></h1>
									</header>

								</div>
								<div class="blog-content">
									<?php get_template_part( 'template-parts/content', 'single' ); ?>

								</div>

								<div class="thrive-post-edit-link">
										<?php edit_post_link( esc_html__('Edit Post', 'thrive-nouveau') ) ?>
									</div>

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
					<?php get_sidebar(); ?>
				</div>
			</div><!--.row-->
			<?php endwhile; // End of the loop. ?>

		</div>
	</div><!--#page-content-wrapper-->
</div>

<?php get_footer(); ?>
