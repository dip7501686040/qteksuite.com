<?php
/**
 * The template for displaying 404 pages (not found).
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
		<div id="content-left-col" class="col-md-12">
			<div id="primary" class="content-area thrive-page-document">
				<main id="main" class="site-main 404-main" role="main">
					<article class="error-404 not-found content-area hentry">
						<header class="404-page-header">
							<h1 class="page-title">
								<?php esc_html_e( '404', 'thrive-nouveau' ); ?>
								<br />
								<small>
									<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'thrive-nouveau' ); ?>
								</small>
							</h1>
						</header><!-- .page-header -->
						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'thrive-nouveau' ); ?></p>
							<?php echo get_search_form(); ?>
						</div><!-- .page-content -->
					</article><!-- .error-404 -->
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</div><!--#page-content-wrapper-->
</div>

<?php
get_footer(); 
