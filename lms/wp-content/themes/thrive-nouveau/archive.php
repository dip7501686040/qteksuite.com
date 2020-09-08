<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package thrive
 */


$archive_allowed_tags = array(
    'a' => array(
        'href' => array(),
        'title' => array()
    ),
    'span' => array(
    	'class' => array()
    )
);

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
		
		<?php do_action( 'thrive_before_page_content' ); ?>

		<?php $layout = thrive_get_layout(); ?>

		<div id="archive-section" class="<?php echo esc_attr( $layout['layout'] ); ?>">
			<div class="row">
				<div id="content-left-col" class="<?php echo esc_attr( $layout['content'] ); ?>">
					<div id="primary" class="content-area">
						<main id="main" class="site-main" role="main">
							<header class="page-header thrive-card no-mg-top headlings">
								<?php
									$archive_title = get_the_archive_title( '<h1 class="page-title">', '</h1>' );
								?>
								<?php if ( empty ( $archive_title ) ) { ?>

									<h1 class="page-title">

										<i class="material-icons md-24 md-dark">archive</i>
										<?php if ( is_post_type_archive() ) { ?>
											<?php echo post_type_archive_title(); ?>
										<?php } else { ?> 
											<?php _e( 'Archives', 'thrive-nouveau' ); ?>
										<?php } ?>
									</h1>

								<?php } else { ?>

									<?php echo wp_kses( $archive_title, $archive_allowed_tags ); ?>

								<?php } ?>

								<?php echo get_the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>

							</header><!-- .page-header -->
						<?php if ( have_posts() ) : ?>
							<div id="hentry-loop-wrap">
						
							<?php /* Start the Loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<?php
									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content', get_post_format() );

								?>
							<?php endwhile; ?>
						</div>
							<?php the_posts_navigation(); ?>

						<?php else : ?>

							<?php get_template_part( 'template-parts/content', 'none' ); ?>

						<?php endif; ?>

						</main><!-- #main -->
					</div><!-- #primary -->
				</div><!--col-md-8-->
				<div class="<?php echo esc_attr( $layout['sidebar'] ); ?>" id="content-right-col">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div><!--#archive-section-->
	</div><!--#page-content-wrapper-->
</div>
<?php get_footer(); ?>
