<?php
if ( ! defined( 'ABSPATH' ) ) die();

if ( ! function_exists( 'thrive_user_nav' ) ) {

	function thrive_user_nav() {
		
		if ( !function_exists('buddypress') ) {
			return;
		}
		
		$message_notification = array();

		$profile_notification = array();
		
		?>
		
		<?php $user_link = bp_loggedin_user_domain(); ?>

		<?php $user_notification_href = sprintf( "%s/profile", $user_link ); ?>

		<?php if ( function_exists( 'bp_notifications_get_notifications_for_user') ) { ?>

				<?php 
					$notifications = bp_notifications_get_notifications_for_user( get_current_user_id(), 'string' ); 
					$thrive_layout = get_theme_mod('thrive_layouts_customize', '2_columns'); 
				?>
				
		<?php } ?>

		<?php $user_notification_list_href = sprintf( "%s/notifications", $user_link ); ?>

		<?php if ( function_exists( 'bp_notifications_get_unread_notification_count' ) ) { ?>

			<?php $unread_notifications = absint( 
				bp_notifications_get_unread_notification_count( get_current_user_id() ) ); 
			?>

					<?php if ( 0 !== $unread_notifications ) { ?>

						<li id="user-notification-bubble" class="item user-notification-action user-navigation-menu-option-item">

							<a href="#" title="<?php _e('See All Notifications', 'thrive-nouveau'); ?>">
								<?php if ( 0 !== $unread_notifications ) { ?>
								<span class="thrive-user-nav-bubble">
									<?php echo intval( $unread_notifications ); ?>
								</span>
								<?php } ?>
								<i class="material-icons md-24">notifications_none</i>
								<span class="visible-xs">
									<?php esc_html_e('Notifications', 'thrive-nouveau'); ?>
								</span>
							</a>

							<?php
							 	$user_notifications = thrive_bp_get_the_notifications_description();
                				$loggedin_user_id = bp_loggedin_user_id();
                				$count = 1;
                				$total_allowed_notification_display = apply_filters( 'thrive_bp_total_displayed_notifications', 10 );
                				$see_all_notifications_link = bp_get_notifications_permalink( $loggedin_user_id );
							?>

							<?php if ( 0 !== $unread_notifications ) { ?>

								<div id="user-generic-notifications" class="user-notifications">

										<div id="thrive-user-nav-notification-head">
											<i class="material-icons" style="font-size: 17px;">notifications</i>
											<?php esc_html_e('Notifications','thrive-nouveau'); ?>
										</div>
										
										<ul id="notifications-ul">
											
											 <?php foreach ( $user_notifications as $user_notification ) { ?>

                                                <?php if ( $count <= $total_allowed_notification_display ) { ?>
                                                    <li>
                                                        <?php echo thrive_handle_empty_var( $user_notification ); ?>
                                                    </li>
                                                <?php } ?>

                                                <?php $count++; ?>

                                            <?php } ?>

                                            <?php if ( $count >= $total_allowed_notification_display ) { ?>
                                                <li class="user-see-all-notifications">
                                                    <a href="<?php echo esc_url( $see_all_notifications_link ); ?>" title="<?php _e('See All Notifications', 'thrive-nouveau'); ?>">
                                                        <?php _e('See All Notifications', 'thrive-nouveau'); ?>
                                                    </a>
                                                </li>
                                            <?php } ?>

										</ul>

								</div><!--#user-generic-notifications-->

							<?php } ?>
						</li>
					<?php } else { // 0 !== $unread_notifications ?>
						<li id="user-notification-bubble" class="item user-navigation-menu-option-item">
							<a href="<?php echo esc_url($user_notification_list_href); ?>" title="<?php _e('See All Notifications', 'thrive-nouveau'); ?>">
								<i class="material-icons md-24">notifications_none</i>
								<span class="visible-xs user-navigation-menu-option-item-label">
									<?php esc_html_e('Notifications', 'thrive-nouveau'); ?>
								</span>
							</a>
						</li>
					<?php } // 0 !== $unread_notifications ?>
					
		<?php } // endif ?>

				<?php if ( function_exists('messages_get_unread_count') ) { ?>
				
				<!-- Messages Notifications -->
				<?php $user_messages_link = sprintf("%s%s", $user_link, bp_get_messages_slug() ); ?>
				
				<?php $unread_message_count = absint( messages_get_unread_count() ); ?>

				<?php if ( 0 !== $unread_message_count ) { ?>
					<li id="messages-notification" class="item user-notification-action">
						<a href="#" title="<?php _e('Show Unread Messages', 'thrive-nouveau'); ?>">
							<i class="material-icons md-24">inbox</i>
							<?php if ( 0 !== $unread_message_count ) { ?>
							<span class="thrive-user-nav-bubble">
								<?php echo intval( $unread_message_count ); ?>
							</span>
							<span class="visible-xs user-navigation-menu-option-item-label">
								<?php esc_html_e('My Messages', 'thrive-nouveau'); ?>
							</span>
							<?php } ?>
						</a>
						
						<?php if ( 0 !== $unread_message_count ) { ?>
						<div id="message-notification" class="user-notifications">
							<?php if ( bp_has_message_threads( 'type=unread' ) ) : ?>
								<div id="thrive-user-nav-messages-head">
									<?php _e('Messages', 'thrive-nouveau'); ?>
								</div>
								
								<!-- Get current user messages -->
								<ul id="thrive-user-nav-messages">
									<?php thrive_bp_users_messages(); ?>
								</ul>

								<div class="clearfix"></div>

								<div id="thrive-user-nav-messages-footer">

									<?php $messages_link = trailingslashit( bp_loggedin_user_domain() . bp_get_messages_slug() . '/inbox' ); ?>

									<a href="<?php echo esc_url( $messages_link ); ?>" title="<?php _e('See All Messages', 'thrive-nouveau'); ?>">
										<?php _e('See All Messages', 'thrive-nouveau'); ?>
									</a>

								</div>

							<?php endif; ?>
						</div><!--#message-notification-->
						<?php } ?>
					</li>
					<?php } else { ?>
						<li id="messages-notification" class="item user-navigation-menu-option-item">
							<a href="<?php echo esc_url($user_messages_link); ?>" title="<?php _e('Show Messages', 'thrive-nouveau'); ?>">
								<i class="material-icons md-24">inbox</i>
								<span class="visible-xs user-navigation-menu-option-item-label">
									<?php esc_html_e('My Messages', 'thrive-nouveau'); ?>
								</span>
							</a>
						</li>
					<?php } ?>
					<?php } ?>
					<li class="dropdown user-navigation-menu-option-item"> <?php thrive_user_navigation(); ?> </li>
			<?php
		}

}  // End function exists thrive_user_nav.

add_action( 'thrive_after_bp_nav_menu', 'thrive_usernav_logout_link' );

function thrive_usernav_logout_link() {

	echo '<li id="sign-out" class="menu-parent"><a class="sign-out" href="'.esc_url(  wp_logout_url() ).'">'.__('Sign Out', 'thrive-nouveau').'</a></li>';

}

function thrive_bp_nav_menu() {

	if ( !function_exists('buddypress') ) {
		return;
	}

	$loaded_components = buddypress()->loaded_components;

	$bp_nav_menu_items = bp_get_nav_menu_items();

	$parent_menus = array();

	$bp_menu = array();

	$transport_menu = array();

	foreach ( $loaded_components as $component_id => $component_value ) {

		$transport_menu[ $component_id ] = $component_value;

	}

	$transport_menu['xprofile'] = __('Profile', 'thrive-nouveau');

	if ( function_exists( 'buddydrive_get_name' ) ) {

		$transport_menu['buddydrive'] = buddydrive_get_name();

	}

	$bp_doc_slug = get_option( 'bp-docs-slug', 'docs' );

	$bp_doc_name = get_option( 'bp-docs-user-tab-name', __( 'Docs', 'thrive-nouveau' ) );

	if ( !empty( $bp_doc_slug ) ) {

		if ( !empty( $bp_doc_name ) ) {

			$transport_menu[$bp_doc_slug] = $bp_doc_name;

		}

	}

	// Get all the parent nav.
	foreach ( $bp_nav_menu_items as $nav_item ) {

		if ( $nav_item->parent === 0 ) {

			$parent_menus[ $nav_item->css_id ]['link'] = $nav_item->link;

			$parent_menus[ $nav_item->css_id ]['name'] = $nav_item->name;

		}
	}

	// Assign each sub nav to it's parent nav
	foreach ( $bp_nav_menu_items as $nav_item ) {

		if ( in_array( $nav_item->parent, array_keys( $parent_menus ) ) ) {

			if ( $nav_item->parent !== 0 ) {

				$bp_menu[ $nav_item->parent ][] = $nav_item;

			}

		}

	}
	?>
	<ul>
		<?php
		// Now construct the html.
		foreach ( $bp_menu as $menu => $menu_child ) {

			?>

			<li id="<?php echo esc_attr( $menu ); ?>" class="menu-parent">

				<?php $menu = $transport_menu[ $menu ]; ?>

				<?php $menu_link = ''; ?>

				<?php if ( !empty( $parent_menus[$menu] ) ) { ?>

					<?php $menu_link = bp_core_get_user_domain( get_current_user_id() ) . $parent_menus[$menu]['link']; ?>

				<?php } ?>

				<?php if ( bp_is_user() ) { ?>

					<?php if ( !empty( $parent_menus[$menu] ) ) { ?>

						<?php $menu_link = $parent_menus[$menu]['link']; ?>

					<?php } ?>

				<?php } ?>

				<?php $nicename = bp_members_get_user_nicename( get_current_user_id() ); ?>
				<?php $members_slug = ''; ?>

				<?php $bp_page_option = get_option('bp-pages'); ?>

				<?php if ( !empty( $bp_page_option['members'] ) ) { ?>
					<?php $members_page = get_post(  $bp_page_option['members'], OBJECT ); ?>
					<?php if ( !empty( $members_page) ) { ?>
						<?php $members_slug = $members_page->post_name; ?>
					<?php } ?>
				<?php } ?>

				<?php $menu_link = preg_replace("~".$members_slug."/[^/]+/~",  $members_slug . "/" . $nicename . "/", $menu_link); ?>

				<?php if ( empty( $menu_link ) ) { ?>

					<?php $menu_link = "#"; ?>

				<?php } ?>

				<a href="<?php echo esc_url( $menu_link ); ?>" title="">

					<?php if ( !empty ( $parent_menus[$menu]['name'] ) ) { ?>

						<?php echo thrive_handle_empty_var( $parent_menus[$menu]['name'] ); ?>

					<?php } else { ?>

						<?php echo thrive_handle_empty_var( $menu ); ?>

					<?php } ?>
				</a>

				<?php if ( !empty ( $menu_child ) ) { ?>

				<ul class="sub-menu">

					<?php foreach ( $menu_child as $sub_menu ) { ?>

					<li>

					<?php $sub_menu_link = $sub_menu->link; ?>

					<?php if ( filter_var( $sub_menu_link, FILTER_VALIDATE_URL) === FALSE ) { ?>

    					<?php $sub_menu_link = bp_core_get_user_domain( get_current_user_id() ) . $sub_menu->link; ?>

					<?php } ?>

						<?php $sub_menu_link = preg_replace("~".$members_slug."/[^/]+/~",  $members_slug . "/" . $nicename . "/", $sub_menu_link); ?>

						<a class="<?php echo sanitize_html_class( implode( ' ', $sub_menu->class ) ); ?>" href="<?php echo esc_url( $sub_menu_link ); ?>">

							<?php echo thrive_handle_empty_var( $sub_menu->name ); ?>

						</a>

					</li>

					<?php } ?>

				</ul>

				<?php } ?>


			</li>
			<?php
		}
		?>
		<?php thrive_usernav_logout_link(); ?>
	</ul>

	<?php
}
