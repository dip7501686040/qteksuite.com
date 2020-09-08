<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package thrive
 */

if ( ! function_exists( 'the_posts_navigation' ) ) :

/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'thrive-nouveau' ); ?></h2>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( esc_html__( 'Older posts', 'thrive-nouveau' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( esc_html__( 'Newer posts', 'thrive-nouveau' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'the_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'thrive-nouveau' ); ?></h2>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', '%title' );
				next_post_link( '<div class="nav-next">%link</div>', '%title' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'thrive_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function thrive_posted_on( $is_single = false ) {

	$time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s" itemprop="datePublished">%2$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$posted_on = sprintf(
		esc_html__( '%s', 'thrive-nouveau' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html__( 'by %s', 'thrive-nouveau' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' 
		. get_avatar( get_the_author_meta('ID'), 32 ) . esc_html( get_the_author() ) 
		. '</a></span>'
	);
	if ( $is_single ) {
		$byline = sprintf(
			esc_html__( 'by %s', 'thrive-nouveau' ),
			'<span class="author vcard"><a itemprop="author" class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' 
			. esc_html( get_the_author() ) 
			. '</a></span>'
		);
	}
	echo '<span class="dark_secondary_icon sr-only">' . __('Last updated', 'thrive-nouveau') . sprintf('<time class="type-strong updated mg-left-5" datetime="%1$s" itemprop="dateModified">%2$s</time>',
			 esc_attr( get_the_modified_date( 'c' ) ),
			 esc_html( get_the_modified_date() )) . '</span>';

	if ( $is_single ) {
		echo '<span class="posted-on dark_secondary_icon">' . $byline . '</span><span class="byline" itemprop="dateCreated"> ' . esc_html__('on ', 'thrive-nouveau') . $posted_on . '</span>'; // WPCS: XSS 
	} else {
		echo '<span class="posted-on dark_secondary_icon">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS 
	}

}
endif;

if ( ! function_exists( 'thrive_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function thrive_entry_footer() {
	// Hide category and tag text for pages.
	// disable for attachments

	?>
	<div class="thrive_entry_footer">
			<div class="entry-comment-meta-data">
				<?php
				if ( 'post' == get_post_type() ) {
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( esc_html__( ', ', 'thrive-nouveau' ) );
					if ( $categories_list && thrive_categorized_blog() ) {
						printf( '<span class="cat-links block">' . esc_html__( 'Posted in %1$s', 'thrive-nouveau' ) . '</span>', $categories_list ); // WPCS: XSS OK.
					}
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', esc_html__( ', ', 'thrive-nouveau' ) );
					if ( $tags_list ) {
						printf( '<span class="tags-links block">' . esc_html__( 'Tagged %1$s', 'thrive-nouveau' ) . '</span>', $tags_list ); // WPCS: XSS OK.
					}
				}
				?>
			</div>
			<div class="entry-comment-link">
				<div class="entry-meta-comment-add">
					<?php if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
						<div class="entry-footer-actions">
							<a href="<?php comments_link(); ?>" title="<?php _e('Comments', 'thrive-nouveau'); ?>">
								<span class="material-icons md-18 md-dark">
									comment
								</span>
								<span class="entry-actions-comment-count">
									<?php comments_number('Add Comment', '1 Comment', '% Comments' ); ?>
								</span>
							</a>
							<?php edit_post_link( esc_html__( 'Manage', 'thrive-nouveau' ), '<span class="edit-link">', '</span>' ); ?>
						</div><!--.entry-actions-->
					<?php } ?>
				</div>
			</div>
	</div><!--.thrive_entry_footer-->
	<?php
}
endif;

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( esc_html__( 'Category: %s', 'thrive-nouveau' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( esc_html__( 'Tag: %s', 'thrive-nouveau' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( esc_html__( 'Author: %s', 'thrive-nouveau' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( esc_html__( 'Year: %s', 'thrive-nouveau' ), get_the_date( esc_html__( 'Y', 'thrive-nouveau' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( esc_html__( 'Month: %s', 'thrive-nouveau' ), get_the_date( esc_html__( 'F Y', 'thrive-nouveau' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( esc_html__( 'Day: %s', 'thrive-nouveau' ), get_the_date( esc_html__( 'F j, Y', 'thrive-nouveau' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = esc_html__( 'Asides', 'thrive-nouveau' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = esc_html__( 'Galleries', 'thrive-nouveau' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = esc_html__( 'Images', 'thrive-nouveau' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = esc_html__( 'Videos', 'thrive-nouveau' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = esc_html__( 'Quotes', 'thrive-nouveau' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = esc_html__( 'Links', 'thrive-nouveau' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = esc_html__( 'Statuses', 'thrive-nouveau' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = esc_html__( 'Audio', 'thrive-nouveau' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = esc_html__( 'Chats', 'thrive-nouveau' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( esc_html__( 'Archives: %s', 'thrive-nouveau' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( esc_html__( '%1$s: %2$s', 'thrive-nouveau' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = esc_html__( 'Archives', 'thrive-nouveau' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo thrive_handle_empty_var( $before . $title . $after );  // WPCS: XSS OK.
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {

	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo thrive_handle_empty_var( $before . $description . $after );  // WPCS: XSS OK.
	}

}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function thrive_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'thrive_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'thrive_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so thrive_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so thrive_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in thrive_categorized_blog.
 */
function thrive_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'thrive_categories' );
}

add_action( 'edit_category', 'thrive_category_transient_flusher' );
add_action( 'save_post',     'thrive_category_transient_flusher' );

/**
 * Shim for 'thrive_nav_wrap'
 *
 * Displays the navigation menu and logo of our website
 */
if ( !function_exists('thrive_nav') ) {

	function thrive_nav() {

		get_template_part( 'inc/thrive', 'nav' );

		return;
	} // end thrive_nav()
} // function_exists

if (!function_exists('thrive_favicon_url')) {

	function thrive_favicon_url() {

		return esc_url( get_theme_mod( 'thrive_favicon', get_template_directory_uri() . '/favicon.ico' ) );

	} // end thrive_favicon_url()
} // end function exists

function thrive_display_format_icon() { ?>
<?php
$format = get_post_format(get_the_ID());
$format_link = get_post_format_link($format);
if (empty($format_link)) {
	return;
}
$format_icons = array(
		'standard' => 'sort',
		'aside' => 'content_copy',
		'image' => 'image',
		'video' => 'play_circle_outline',
		'quote' => 'format_quote',
		'link' => 'link',
		'chat' => 'chat',
		'gallery' => 'collections',
		'audio' => 'music_note',
		'status' => 'insert_emoticon',
	);
?>
<?php if (!empty($format_icons[$format])) { ?>
<a href="<?php echo esc_url($format_link); ?>" title="<?php echo esc_attr(the_title()); ?>" class="material-icon-post-formats">
	<i class="material-icons md-12">
		<?php echo esc_attr($format_icons[$format]); ?>
	</i>
</a>
<?php } ?>
<?php
}
/**
 * Get the current page or post layout.
 * @return array The current layout of the post or page.
 */
function thrive_get_layout() {

	$id = get_queried_object_id();

	$layout = array(
		'layout'  => 'content-sidebar',
		'content' => 'col-md-8',
		'sidebar' => 'col-md-4'
	);
	
	if ( is_archive() ) {

		// Term archives.
		$page_layout = get_term_meta( $id, 'thrive-term-layout', true );	

		// Try getting the theme_mod value if term meta is empty.
		if ( empty( $page_layout ) ) {
			$page_layout  = get_theme_mod( 'thrive_customizer_terms_layout', 'content-sidebar');
		}

		// Custom post type archive.
		if ( is_post_type_archive() || is_author() || is_date() ) {
			$page_layout  = get_theme_mod( 'thrive_customizer_taxonomy_layout', 'content-sidebar');
		}

		// WooCommerce Shop Support.
		if ( function_exists( 'is_shop' ) ) {
			if ( is_shop() ) {
				$id = absint( get_option( 'woocommerce_shop_page_id' ) );
				$page_layout = get_post_meta( $id, 'thrive_page_layout', true );	
			}
		}
	} else {
		
		$page_layout = get_post_meta( $id, 'thrive_page_layout', true );	

		if ( is_home() ) {
			$page_layout  = get_theme_mod( 'thrive_customizer_taxonomy_layout', 'content-sidebar');
		}
		
	}
	
	// Fallback to content-sidebar layout if no layout is saved.
	if ( empty ( $page_layout ) ) {
		$page_layout = 'content-sidebar';
	}

	// Set allowed layouts.
	$allowed_layouts = array( 'full-content', 'sidebar-content', 'content-sidebar' );

	// Set the classes assigned on each of the layout.
	$layouts_class = array(
		'full-content' => array(
			'layout'  => 'full-content',
			'content' => 'col-md-12',
			'sidebar' => 'hidden'
			),
		'sidebar-content' => array(
			'layout'  => 'sidebar-content',
			'content' => 'col-md-8 col-md-push-4',
			'sidebar' => 'col-md-4 col-md-pull-8'
			),
		'content-sidebar' => array(
			'layout'  => 'content-sidebar',
			'content' => 'col-md-8',
			'sidebar' => 'col-md-4'
			)
		);

	// Assign the new layout to $layout.
	$layout = $layouts_class[ $page_layout ];

	// Fallback to content-sidebar layout if no layout is saved.
	if ( !in_array( $page_layout, $allowed_layouts ) ) {
		$layout = $layouts_class['full-content'];
	}

	return $layout;

}

add_action('bp_before_member_header', 'thrive_add_bcp_style');
add_action('bp_before_group_header', 'thrive_add_bcp_style');

function thrive_add_bcp_style() {

	$src = thrive_get_cover_photo_src();

	?>
	<style>
	#item-header-cover-photo{
		<?php if ( ! empty ( $src ) )  { ?>
			background-image: url( <?php echo esc_url( $src ); ?> );
		<?php } ?>
		background-size: cover;
	}
	</style>
	<?php

}
/**
 * Returns the cover photo url
 * @return string the cover photo url
 */
function thrive_get_cover_photo_src()
{
	if (!function_exists('bcp_get_cover_photo')) { return; }

	$item_id = bp_displayed_user_id();
	$item_type = 'user';

	if (bp_is_group()) {
		$item_id = bp_get_group_id();
		$item_type = 'group';
	}

	$args = array(
		'type' => $item_type,
		'object_id'=> $item_id,
	);

	$cover_photo_url = esc_url(bcp_get_cover_photo($args));

	return $cover_photo_url;
}


/**
 * Handles empty string or mixed parameters.
 * @param  string $var mixed
 * @return mixed the given input.
 */
function thrive_handle_empty_var( $var = '' ) {

	$output = '';

	if ( !empty( $var ) ) {

		return $var;

	}

	return $output;

}

function thrive_footer_widget() {
	global $wp_customize;
	$footer_column = get_theme_mod('thrive_customizer_footer_widget_columns', 'col-md-3'); 
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="clearfix">
				<?php dynamic_sidebar('sidebar-footer-area'); ?>
			</div>
		</div>
	</div>
	<?php 
	if ( isset( $wp_customize ) ) {
	   ?>
	   <script>
	   jQuery(document).ready(function($){
	   		$('.footer-widget').removeClass().addClass('footer-widget <?php echo sanitize_html_class( $footer_column ); ?>');
	   });
	   </script>
	   <?php
	}
	
} 

/**
 * Renders the current logged-in user top right menu.
 * @return void
 */
if ( ! function_exists('thrive_user_navigation') ):
	
function thrive_user_navigation() {
	?>
	<a href="#" class="dropdown-toggle user-notifications-action-name" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
  		<?php $current_user = wp_get_current_user(); ?>
		<?php echo get_avatar( $current_user->ID, 32 ); ?>  &nbsp;
		<span id="navbar-user-dropdown">
			<?php echo esc_html( $current_user->display_name ); ?>
		</span>
		<span class="caret"></span> 
	</a>
		<?php 
			$user_nav_menu_args = array(
                'menu'              => 'primary',
                'theme_location'    => 'topbarmenu',
                'container'         => 'ul',
                'container_class'   => 'thrive-navigation-class',
                'container_id'      => 'thrive-user-navigation-dropdown',
                'menu_class'        => 'dropdown-menu thrive-navbar-main-menu',
                'echo'				=> false,
                'fallback_cb'		=> false
               );
  			$user_nav_menu = wp_nav_menu( $user_nav_menu_args );
        ?>
    <?php if ( ! empty( $user_nav_menu ) ) { ?>
    	<?php echo thrive_sanity_check( $user_nav_menu ); ?>
    <?php } else { ?>   
	    <ul class="dropdown-menu">
	    	<li>
	    		<a href="<?php echo esc_url(admin_url('nav-menus.php?action=locations')); ?>" id="create-menu-btn" title="<?php esc_attr_e( 'Add \'Top Right Bar\' Menu', 'thrive-nouveau' ); ?>">
	    			<i class="material-icons">add_circle_outline</i>
	    			<?php esc_html_e( 'Add \'Top Right Bar\' Menu', 'thrive-nouveau' ); ?>
	    		</a>
	    	</li>
	    	<li role="separator" class="divider"></li>
	    	<li>
	    		<a href="<?php echo esc_url( wp_logout_url() ); ?>" title="<?php esc_attr_e('Logout', 'thrive-nouveau'); ?>">
	    			<i class="material-icons" style="font-size: 16px;">exit_to_app</i>
	    			<?php esc_html_e('Sign Out', 'thrive-nouveau'); ?>
	    		</a>
	    	</li>
	  	</ul>
    <?php } ?>
	<?php
	return;
}
endif;

if ( ! function_exists( ('thrive_the_page_title' ) ) ) {

	function thrive_the_page_title() { ?>
		
		<?php do_action('thrive_the_page_title_before'); ?>
		
		<?php if ( is_post_type_archive() ) { ?>
			<?php // Do not support post type archives ?>
		<?php } else { ?>
			<?php global $post; ?>
			<?php 
				if ( 0 == $post->ID ) {
					if ( function_exists( 'is_buddypress' ) ) {
						if ( !is_buddypress() ) {
							return; 
						}
					} else {
						return;
					}
				} 
			?>
			<?php if ( have_posts() ) { ?>
				<?php while( have_posts() ) { ?>
					<?php the_post(); ?>
					<div id="page-hero">
						<?php do_action('thrive_before_page_title'); ?>
						<div class="page-hero-inner-wrap">
							<h1 class="entry-title no-mg-bottom">
								<a title="<?php echo esc_url( the_title() ); ?>" 
									href="<?php echo esc_url(the_permalink()); ?>">
									<?php the_title(); ?>
								</a>
							</h1>
							<?php if ( ! empty( thrive_cmb2_pages_meta('subtitle') ) ) { ?>
								<h3 class="subtitle no-mg-bottom mg-top-5">
									<?php echo thrive_cmb2_pages_meta('subtitle') ?>
								</h3>
							<?php } ?>
							<?php do_action('thrive_the_page_title_inner_wrap_after'); ?>
						</div>
					</div>
				<?php } ?>
			<?php } // End if have posts.?>
		<?php } // End Else. ?>
	<?php
	do_action('thrive_the_page_title_after');
	}
}

/**
 * Callback function for Thrive VC Flex.
 *
 * @param array $flex_class The collection of classes extracted by Visual Composer.
 */
function thrive_vc_transfer_flex( $flex_class ) 
{
  return strpos($flex_class, 'vc_row-flex') === false;
}
