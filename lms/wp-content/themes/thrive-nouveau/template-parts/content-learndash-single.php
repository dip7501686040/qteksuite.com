<?php
/**
 * Template part for displaying single posts.
 *
 * @package thrive
 */

?>


<div class="entry-content">
	
	<?php if ( has_post_thumbnail() ): ?>
		<div class="entry-featured-image">
			<a href="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="magnific-popup">
				<?php the_post_thumbnail('thrive-thumbnail'); ?>
			</a>
		</div>
	<?php endif; ?>
	
	<div class="entry-headers sr-only">
		<header class="single-entry-title">
			<h1 class="entry-title"><?php echo the_title(); ?></h1>
		</header>
	</div>

	<div class="entry-content-body learndash-single-content">
		<?php the_content(); ?>
	</div>
	
	<div class="entry-pagination">
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Page: ', 'thrive-nouveau' ),
				'after'  => '</div>',
				'link_before' => '<span class="pagination-item">',
				'link_after' => '</span>'
			) );
		?>
	</div>

	<div class="entry-author-about">
		<div class="row">
			<div class="col-xs-12">
				<h3><?php esc_html_e('About','thrive-nouveau'); ?> <?php echo get_the_author_meta('display_name'); ?></h3>		
			</div>
			<div class="col-xs-2">
				<?php echo get_avatar( get_the_author_meta('ID') ); ?>
			</div>
			<div class="col-xs-10">
				<p><?php echo get_the_author_meta('description'); ?></p>
			</div>
		</div>
	</div>
	
</div><!-- .entry-content -->

<footer class="entry-footer">

	<?php thrive_entry_footer(); ?>
	
</footer><!-- .entry-footer -->


