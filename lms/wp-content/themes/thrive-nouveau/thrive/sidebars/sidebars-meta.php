<?php
/**
 * Theme Meta Box
 *
 * @package Thrive
 * @since 1.0
 */
?>
<?php

//Hook our post meta boxes in WordPress Editor.
add_action( 'load-post.php', 'thrive_post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'thrive_post_meta_boxes_setup' );

//Save post meta on the 'save_post' hook.
add_action( 'save_post', 'thrive_save_post_class_meta', 10, 2 );

/**
 * Saves the meta box post data
 * @param  int $post_id The Post's ID.
 * @param  object $post The Post Object.
 * @return void
 */
function thrive_save_post_class_meta( $post_id, $post ) {

	//Verify the nonce before proceeding.
	if ( ! isset( $_POST['thrive_appearance_nonce'] ) || ! wp_verify_nonce( $_POST['thrive_appearance_nonce'], basename( __FILE__ ) ) ) {
		return $post_id; }

	//Get the post type object.
	$post_type = get_post_type_object( $post->post_type );

	//Check if the current user has permission to edit the post.
	if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
		return $post_id; }

	$thrive_metas = array(
		'thrive_sidebar' => isset( $_POST['thrive_sidebar'] ) ? esc_attr( $_POST['thrive_sidebar'] ) : '',
		'thrive_sidebar_left' => isset( $_POST['thrive_sidebar_left'] ) ? esc_attr( $_POST['thrive_sidebar_left'] ) : '',
		'thrive_page_layout' => isset( $_POST['thrive_page_layout'] ) ? esc_attr( $_POST['thrive_page_layout'] ) : '',
		'thrive_page_title_hide' => isset( $_POST['thrive_page_title_hide'] ) ? esc_attr( $_POST['thrive_page_title_hide'] ) : '',
	);

	foreach ( $thrive_metas as $meta_key => $new_meta_value ) {

		/* Get the meta value of the custom field key. */
		$meta_value = get_post_meta( $post_id, $meta_key, true );

		/* If a new meta value was added and there was no previous value, add it. */
		if ( $new_meta_value && '' === $meta_value ) {
			add_post_meta( $post_id, $meta_key, $new_meta_value, true ); 
		} /* If the new meta value does not match the old value, update it. */
		elseif ( $new_meta_value && $new_meta_value !== $meta_value )
			update_post_meta( $post_id, $meta_key, $new_meta_value );

		/* If there is no new meta value but an old value exists, delete it. */
		elseif ( '' === $new_meta_value && $meta_value )
			delete_post_meta( $post_id, $meta_key, $meta_value );
	}

}

/**
 * The Meta Box set-up function
 *
 * @return void
 */
function thrive_post_meta_boxes_setup() {

	// Add meta boxes on the 'add_meta_boxes' hook.
	add_action( 'add_meta_boxes', 'thrive_add_post_meta_boxes' );

	return;
}

/**
 * Create Meta Box to be displayed inside the screen.
 */
function thrive_add_post_meta_boxes() {

	global $post;

	// Post.
	add_meta_box(
		'thrive-appearance-meta-box',
		esc_html__( 'Appearance', 'thrive-nouveau' ),
		'thrive_appearance_meta_box',
		get_post_types(),
		'side',
		'default'
	);

	
}

/**
 * Displays the meta box.
 * @param  object $object WP returns object.
 * @param  object $box WP Return Object.
 * @return void
 */
function thrive_appearance_meta_box( $object, $box ) {
	?>

	<?php global $wp_registered_sidebars, $post; ?>
	
	<?php $registered_sidebars = $wp_registered_sidebars; ?>
	<?php
	// Disable some sidebars.
	$disabled_sidebars = array('homepage-widgets', 'sidenav-sidebar', 'sidebar-footer-area');
	foreach( $registered_sidebars as $key => $registered_sidebar) {
		if ( in_array( $key, $disabled_sidebars ) ) {
			unset($registered_sidebars[$key]);
		}
	}
	?>
	
	<?php wp_nonce_field( basename( __FILE__ ), 'thrive_appearance_nonce' ); ?>
	
		<!-- Sidebar Left -->
		<?php if ( ! empty( $registered_sidebars ) ) { ?>
		
			<?php $default_sidebar = get_post_meta( $post->ID, 'thrive_sidebar_left', true ); ?>
			
			<?php // Prepare default sidebars for each post types. ?>
			
			<?php 
				$post_type_default_sidebar = array(
					'post' => array(
						'sidebar-left' => 'sidebar-1',
						'sidebar-right' => 'sidebar-1',
					),
					'page' => array(
						'sidebar-left' => 'sidebar-1',
						'sidebar-right' => 'sidebar-1',
					),
					'product' => array(
						'sidebar-left' => 'wc-thrive-sidebar-left',
						'sidebar-right' => 'wc-thrive-sidebar-right',
					),
					'forum' => array(
						'sidebar-left' => 'bbp-thrive-sidebar-left',
						'sidebar-right' => 'bbp-thrive-sidebar',
					),
					'topic' => array(
						'sidebar-left' => 'bbp-thrive-sidebar-left',
						'sidebar-right' => 'bbp-thrive-sidebar',
					),
				);
				
			?>
			
			<?php
			// If post meta sidebar is not define,
			// use the default sidebar for each post type.
			$current_post_type_default_sidebar = '';
			if ( isset( $post_type_default_sidebar[ $post->post_type ]['sidebar-left'] ) ) 
			{
				$current_post_type_default_sidebar = $post_type_default_sidebar[ $post->post_type ]['sidebar-left'];
			}
			if ( empty( $default_sidebar ) ) {
				$default_sidebar = $current_post_type_default_sidebar;
			}
			?>
			<p class="howto">
				<?php esc_html_e( 'Sidebar: Left', 'thrive-nouveau' ); ?>
			</p>
			
			<p>
				<select name="thrive_sidebar_left" id="thrive_sidebar_left">
					
					<?php foreach ( (array) $registered_sidebars as $sidebar ) { ?>
						<?php $selected = $sidebar['id'] === $default_sidebar ? 'selected' : ''; ?>
						<option <?php echo esc_attr( $selected ); ?> value="<?php echo esc_attr( $sidebar['id'] ); ?>">
							<?php echo esc_html( $sidebar['name'] ); ?>
						</option>
					<?php } ?>
					
				</select>
			</p>
			
		<?php } else { ?>
			<p class="howto">
				<?php esc_html_e( 'No Sidebars Available', 'thrive-nouveau' ); ?>
			</p>
		<?php } ?>
		
		<?php // Reset Sidebars.
			unset( $registered_sidebars );
		?>
		<!-- Sidebar Right -->
		
		
		<?php $registered_sidebars = $wp_registered_sidebars; ?>
		<?php 
			foreach( $registered_sidebars as $key => $registered_sidebar) {
				if ( in_array( $key, $disabled_sidebars ) ) {
					unset($registered_sidebars[$key]);
				}
			}
		?>
		
		<?php if ( ! empty( $registered_sidebars ) ) { ?>

			<?php $default_sidebar = get_post_meta( $post->ID, 'thrive_sidebar', true ); ?>

			<p class="howto">
				<?php esc_html_e( 'Sidebar: Right', 'thrive-nouveau' ); ?>
			</p>
			<?php
			// If post meta sidebar is not define,
			// use the default sidebar for each post.
			$current_post_default_sidebar = '';
			if ( isset( $post_type_default_sidebar[ $post->post_type ]['sidebar-right'] ) ) {
				$current_post_default_sidebar = $post_type_default_sidebar[ $post->post_type ]['sidebar-right'];
			}
			if ( empty( $default_sidebar ) ) {
				$default_sidebar = $current_post_default_sidebar;
			}
			?>
			
			<p>
				<select name="thrive_sidebar" id="thrive_sidebar">
					
					<?php foreach ( (array) $registered_sidebars as $sidebar ) { ?>

						<?php $selected = $sidebar['id'] === $default_sidebar ? 'selected' : ''; ?>
						
						<option <?php echo esc_attr( $selected ); ?> value="<?php echo esc_attr( $sidebar['id'] ); ?>">

							<?php echo esc_html( $sidebar['name'] ); ?>

						</option>

					<?php } ?>
				</select>
			</p>
			
		<?php } else { ?>
			<p class="howto">
				<?php esc_html_e( 'No Sidebars Available', 'thrive-nouveau' ); ?>
			</p>
		<?php } ?>
		
		<p class="howto">
			<?php esc_html_e( 'Page Layout', 'thrive-nouveau' ); ?>
		</p>
		<p>
			<?php $page_layout = get_post_meta( $post->ID, 'thrive_page_layout', true ); ?>
			<?php if ( empty( $page_layout ) ) { ?>
				<?php // Ff page layout is empty, use the default settings. ?>
				<?php $page_layout = 'layout_post'; ?>
			<?php } ?>
			
			<?php
				$page_layouts_option = array(
					'content-sidebar' => __( 'Content / Sidebar Right', 'thrive-nouveau' ),
					'sidebar-content' => __( 'Sidebar Left / Content', 'thrive-nouveau' ),
					'full-content' => __( 'Full Content / No Sidebar','thrive-nouveau' ),
				);
			?>

			<select name="thrive_page_layout" id="thrive_page_layout">
				<?php foreach ( (array) $page_layouts_option as $key => $page_layout_option ) { ?>
					<?php $selected = ( $page_layout === $key ) ? 'selected' : ''; ?>
					<option <?php echo esc_attr( $selected ); ?> value="<?php echo esc_attr( $key );?>">
						<?php echo esc_html( $page_layout_option ); ?>
					</option>
				<?php } ?>
			</select>
		</p>
		
<?php }

?>
