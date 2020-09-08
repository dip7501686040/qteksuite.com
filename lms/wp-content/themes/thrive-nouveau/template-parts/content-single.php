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
			<span class="sr-only" itemprop="thumbnailUrl">
				<?php echo get_the_post_thumbnail_url(); ?>
			</span>
		</div>
	<?php endif; ?>
	
	<div class="entry-share">
		<?php thrive_social_link(); ?>
	</div>
	
	<div class="entry-content-body" itemprop="text">
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
	
	<div class="entry-share">
		<?php thrive_social_link(); ?>
	</div>

	<div class="entry-author-about">
		<div class="row">
			<div class="col-xs-12"> 
				<h3>
					<?php esc_html_e('About','thrive-nouveau'); ?> 
					<a href="<?php echo esc_url( thrive_get_user_link( get_the_author_meta('ID') ) ); ?>" 
						title="<?php echo esc_attr_e('Visit author\'s blog', 'thrive-nouveau'); ?>">
							<?php echo get_the_author_meta('display_name'); ?>
					</a>
				</h3>		
			</div>
			<div class="col-xs-2">
				<a href="<?php echo esc_url( thrive_get_user_link( get_the_author_meta('ID') ) ); ?>" title="<?php echo esc_attr_e('Visit author\'s blog', 'thrive-nouveau'); ?>">
					<?php echo get_avatar( get_the_author_meta('ID') ); ?>
				</a>
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

