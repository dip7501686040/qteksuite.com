<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package thrive
 */

?>

<article itemscope itemtype="http://schema.org/Article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header sr-only">
		
		<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
		<?php $class = "hidden"; ?>
		<?php if ( is_singular('page') ): ?>
			<?php $class = ""; ?>
		<?php endif; ?>
		<div class="sr-only <?php echo esc_attr($class); ?>" id="page-published-date">
			<i class="material-icons">date_range</i>
			<?php esc_html_e( 'Published on ', 'thrive-nouveau' ); ?>
			<?php echo thrive_posted_on(); ?>
			<span itemprop="author" class="sr-only">
				<?php echo the_author_meta('display_name'); ?>
			</span>
		</div>
		<?php $logo_fallback = get_template_directory_uri() . '/logo.svg'; ?>
		<?php $logo_url = get_theme_mod( 'thrive_logo', esc_url( $logo_fallback ) ); ?>
		<div class="sr-only" itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
    		<span itemprop="name"><?php echo get_bloginfo('name'); ?></span>
    		<span itemprop="logo"><?php echo esc_url($logo_url); ?></span>
		</div>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( has_post_thumbnail() ) { ?>
		<div class="article-thumbnail thrive-material-card-1 entry-featured-image">
			<a href="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="magnific-popup">
				<?php the_post_thumbnail('thrive-thumbnail'); ?>
			</a>
			<span class="sr-only" itemprop="image"><?php echo esc_url(the_post_thumbnail_url()); ?></span>
			<span class="sr-only" itemprop="mainEntityOfPage"><?php echo esc_url(the_permalink()); ?></span>
		</div>
		<?php } ?>
		<div class="article-body" itemprop="articleBody">
			<?php the_content(); ?>
		</div>
		<div class="clearfix"></div>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'thrive-nouveau' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'thrive-nouveau' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
	
</article><!-- #post-## -->
