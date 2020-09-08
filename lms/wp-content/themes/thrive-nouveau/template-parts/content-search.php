<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package thrive
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(array('entry-search')); ?>>

	<div class="entry-search-inner-wrap">
		<?php the_title( sprintf( '<h1 class="h3 search-entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php thrive_posted_on(); ?>
	</div>
	
</div><!-- #post-## -->

