<?php
/**
 * Template part for displaying posts.
 *
 * @package thrive
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(array('thrive-archives')); ?>>
	
	<div class="entry-content-wrap">
		<div class="entry-header-wrap">
			<!--"End Header"-->
			<header class="entry-header has-post-thumbnail">
				<?php if ( has_post_thumbnail() ): ?>
					<div class="entry-thumbnail">
						<a href="<?php echo esc_url(the_permalink()); ?>" title="<?php echo esc_attr(the_title()); ?>">
							<?php the_post_thumbnail( 'thrive-thumbnail' ); ?>
						</a>
					</div>
				<?php else: ?>
					<div class="entry-thumbnail">
						<a href="<?php echo esc_url(the_permalink()); ?>" title="<?php echo esc_attr(the_title()); ?>">
							<img class="default-thumbnail" src="<?php echo get_template_directory_uri(); ?>/css/images/demo-featured-image.png" alt="<?php echo esc_attr( 'Default thumbnail', 'thrive-nouveau' ); ?>">
						</a>
					</div>
				<?php endif; ?>
			</header><!-- .entry-header -->
		</div>

		<?php if ( is_sticky() ): ?>
			<div class="entry-is-sticky">
				<i class="material-icons">label_important</i>
			</div>
		<?php endif; ?>

		<div class="entry-categories">
			<?php
			 	the_taxonomies(array(
			 			'sep' => ', ',
			 			'template' => '<span class="taxonomy-title">%s:</span> %l'
			 		)); 
			 ?>
		</div>

		<div class="entry-title">
			<a href="<?php echo esc_url(the_permalink()); ?>" title="<?php echo esc_attr(the_title()); ?>">
				<?php the_title( '<h1 class="entry-title type-light">', '</h1>' ); ?>
			</a>
		</div><!-- .entry-meta -->
		<?php if ( 'sfwd-courses' === $post->post_type ) { ?>
			<div class="entry-leardash-course-progress">
				<?php echo do_shortcode('[learndash_course_progress course_id="'.absint(get_the_ID()).'" user_id="'.absint(get_current_user_id()).'"]'); ?>
			</div>
		<?php } ?>

		<div class="entry-summary">
			<p>
				<?php $excerpt = get_the_excerpt(); ?>
				<?php $trimmed_excerpt = substr( $excerpt, 0, 100); ?>
				<?php echo esc_html( $trimmed_excerpt ); ?>
				<?php if ( strlen( $trimmed_excerpt ) >= 100 ) { ?>
					&hellip;
				<?php } ?>
			</p>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'thrive-nouveau' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php thrive_posted_on(); ?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
