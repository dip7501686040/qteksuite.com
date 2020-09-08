<?php
/**
 * The template for displaying search results pages.
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
	</div><!--#sidebar-wrao-->
	<div id="page-content-wrapper">
		<div class="row limiter">
			<div id="content-left-col" class="col-md-8">
				<section id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

					<?php if ( have_posts() ) : ?>

						<header class="search-page-header">
							
							<h1 class="h3">
								<?php echo sprintf( esc_html__('Search results for "%s"', 'thrive-nouveau'), get_search_query() ); ?>
							</h1>
						
							<div id="search-page-search-form">
								<?php echo get_search_form(); ?>
							</div>

						</header><!-- .page-header -->

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );
							?>

						<?php endwhile; ?>

						<?php the_posts_navigation(); ?>

					<?php else : ?>

						<?php get_template_part( 'template-parts/content', 'none' ); ?>

					<?php endif; ?>

					</main><!-- #main -->
				</section><!-- #primary -->
			</div><!--.col-md-8-->
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</div>	
	</div><!--#page-content-wrapper-->
</div>

<?php get_footer(); ?>
