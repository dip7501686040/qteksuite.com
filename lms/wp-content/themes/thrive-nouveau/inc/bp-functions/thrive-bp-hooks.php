<?php
/**
 * Custom BuddyPress Hooks
 * Since 3.0.6
 */
add_action('bp_before_activity_entry', 'thrive_apply_bp_current_component');

/**
 * Apply bp current component to pages that are using buddypress activity shortcode.
 * @return void.
 */
function thrive_apply_bp_current_component() {
	if ( function_exists('buddypress') ) {
		if ( false === bp_current_component() ) {
			buddypress()->current_component = 'activity';
		}
	}
}

add_filter('bp_core_get_js_strings', 'thrive_apply_bp_js_strings');

/**
 * Applies the missing strings and object parameters when in pages and post.
 * @return void
 */
function thrive_apply_bp_js_strings( $params ) {
	
	if ( false !== bp_current_component() ) {
		return $params;
	}

	$activity_params = array(
		'user_id'     => bp_loggedin_user_id(),
		'object'      => 'user',
		'backcompat'  => (bool) has_action( 'bp_activity_post_form_options' ),
		'post_nonce'  => wp_create_nonce( 'post_update', '_wpnonce_post_update' ),
	);

	$user_displayname = bp_get_loggedin_user_fullname();

	if ( buddypress()->avatar->show_avatars ) {

		$width  = bp_core_avatar_thumb_width();
		$height = bp_core_avatar_thumb_height();

		$activity_params = array_merge( $activity_params, array(
			'avatar_url'    => bp_get_loggedin_user_avatar( array(
				'width'  => $width,
				'height' => $height,
				'html'   => false,
			) ),
			'avatar_width'  => $width,
			'avatar_height' => $height,
			'user_domain'   => bp_loggedin_user_domain(),
			'avatar_alt'    => sprintf(
				/* translators: %s = member name */
				__( 'Profile photo of %s', 'thrive-nouveau' ),
				$user_displayname
			),
		) );
	}

	$activity_buttons = apply_filters( 'bp_nouveau_activity_buttons', array() );

	if ( ! empty( $activity_buttons ) ) {

		$activity_params['buttons'] = bp_sort_by_key( $activity_buttons, 'order', 'num' );
		// Enqueue Buttons scripts and styles
		foreach ( $activity_params['buttons'] as $key_button => $buttons ) {
			if ( empty( $buttons['handle'] ) ) {
				continue;
			}
			if ( wp_style_is( $buttons['handle'], 'registered' ) ) {
				wp_enqueue_style( $buttons['handle'] );
			}
			if ( wp_script_is( $buttons['handle'], 'registered' ) ) {
				wp_enqueue_script( $buttons['handle'] );
			}
			unset( $activity_params['buttons'][ $key_button ]['handle'] );
		}
	}
	
	$activity_strings = array(
		'whatsnewPlaceholder' => sprintf( __( "What's new, %s?", 'thrive-nouveau' ), bp_get_user_firstname( $user_displayname ) ),
		'whatsnewLabel'       => __( 'Post what\'s new', 'thrive-nouveau' ),
		'whatsnewpostinLabel' => __( 'Post in', 'thrive-nouveau' ),
		'postUpdateButton'    => __( 'Post Update', 'thrive-nouveau' ),
		'cancelButton'        => __( 'Cancel', 'thrive-nouveau' ),
	);

	if ( bp_is_group() ) {
		$activity_params = array_merge(
			$activity_params,
			array(
				'object'  => 'group',
				'item_id' => bp_get_current_group_id(),
			)
		);
	}
	$params['activity'] = array(
		'params'  => $activity_params,
		'strings' => $activity_strings,
	);
	return $params;
}



/**
 * Get current BuddyPress component page id.
 * @return integer The id of the page which current bp component is living.
 */
function bp_get_current_component_page_id() {

	$id = 0;
	
	if ( function_exists('bp_current_component') ) {
		if ( bp_is_directory() ) {

			$component = bp_current_component();
		
			if ( ! empty( $component ) ) {
				$bp_pages = get_option( 'bp-pages' );
				if ( isset( $bp_pages[$component]) ) {
					$id = $bp_pages[$component];
				}
			}
		}
	}

	return $id;

}

add_action('bp_member_header_actions', 'thrive_bp_member_header_actions');
if ( ! function_exists( 'thrive_bp_member_header_actions') ):
	function thrive_bp_member_header_actions(){
		?>
		<?php if ( ! is_user_logged_in() ): ?>
			<div class="generic-button">
				<a href="<?php echo wp_login_url(); ?>" title="<?php esc_attr_e('Login', 'thrive-nouveau'); ?>">
					<?php esc_html_e('Login', 'thrive-nouveau'); ?>
				</a>
			</div>
			<?php $users_can_register = get_option('users_can_register'); ?>
			<?php if ( $users_can_register ): ?>
				<div class="generic-button">
					<a href="<?php echo wp_registration_url(); ?>" title="<?php esc_attr_e('Register', 'thrive-nouveau'); ?>">
						<?php esc_html_e('Register', 'thrive-nouveau'); ?>
					</a>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<?php
	}
endif;