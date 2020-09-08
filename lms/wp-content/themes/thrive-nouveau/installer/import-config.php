<?php
add_filter('dsc_demo_installer_demos', 'thrive_demo_import_settings');

function thrive_demo_import_settings() {

	$config = array(
		'demo-1' => array(
			'name' => esc_attr__('Intranet/Extranet', 'thrive-nouveau'),
			'id' => '1',
			'image' => 'http://image-turbo.s3.amazonaws.com/thrive-docs/Thrive+Intranet+%26+Extranet+Demo+Files/thrive-intrane-and-extranet-preview.jpg',
			'after_import_setup' => 'thrive_intranet_demo_import',
			'plugins' => array(
					// Nifty menu options.
					array(
						'slug' => 'nifty-menu-options',
						'name' => esc_attr__('Nifty Menu Options', 'thrive-nouveau')
					),
					array(
							'slug' => 'buddypress',
							'name' => esc_attr__('BuddyPress', 'thrive-nouveau')
						),
					array(
							'slug' => 'buddykit',
							'name' => esc_attr__('BuddyKit', 'thrive-nouveau'),
							'source' => 'https://s3.amazonaws.com/dsc-plugins/buddykit.zip',
							'external_url' => 'https://dunhakdis.com/'
						),
					array(
							'slug' => 'bbpress',
							'name' => esc_attr__('BbPress', 'thrive-nouveau')
						),
					array(
							'slug' => 'taskbreaker-project-management',
							'name' => esc_attr__('TaskBreaker - Project Management', 'thrive-nouveau')
						),
					array(
							'slug' => 'reference-knowledgebase-and-docs',
							'name' => esc_attr__('Reference Knowledgebase and Docs', 'thrive-nouveau')
						),
					array(
							'slug' => 'subway',
							'name' => esc_attr__('Subway - Private Site Option', 'thrive-nouveau')
						),
					array(
							'slug' => 'buddypress-docs',
							'name' => esc_attr__('BuddyPress Docs', 'thrive-nouveau')
						),
					array(
							'slug' => 'visual-form-builder',
							'name' => esc_attr__('Visual Form Builder', 'thrive-nouveau')
						),

					array(
							'slug' => 'woocommerce',
							'name' => esc_attr__('WooCommerce', 'thrive-nouveau'),
						),
					array(
							'slug' => 'buddydrive',
							'name' => esc_attr__('BuddyDrive', 'thrive-nouveau')
						),
					array(
							'slug' => 'the-events-calendar',
							'name' => esc_attr__('The Events Calendar', 'thrive-nouveau')
						),
					array(
							'slug' => 'wp-polls',
							'name' => esc_attr__('WP Polls', 'thrive-nouveau')
						),
					array(
							'slug' => 'js_composer',
							'name' => esc_attr__('Visual Composer', 'thrive-nouveau'),
							'source' => 'https://s3.amazonaws.com/dsc-plugins/js_composer.zip',
							'external_url' => 'https://wpbakery.com'
						),
					array(
							'slug' => 'revslider',
							'name' => esc_attr__('Slider Revolution', 'thrive-nouveau'),
							'source' => 'https://s3.amazonaws.com/dsc-plugins/revslider.zip',
							'external_url' => 'https://revolution.themepunch.com/'
						),
					array(
							'slug' => 'gears',
							'name' => esc_attr__('Gears', 'thrive-nouveau'),
							'source' => 'http://demo.dunhakdis.me/plugins/gears.zip',
							'external_url' => 'https://dunhakdis.com'
						),
				),
		),
		// Community Demo
		'demo-2' => array(
			'name' => esc_attr__('Small Community', 'thrive-nouveau'),
			'id' => '2',
			'after_import_setup' => 'thrive_community_demo_import',
			'image' => 'https://s3.amazonaws.com/image-turbo/thrive-docs/demo-import/community-1-demo.jpg',
			'plugins' => array(
					array(
						'slug' => 'nifty-menu-options',
						'name' => esc_attr__('Nifty Menu Options', 'thrive-nouveau')
					),
					array(
							'slug' => 'buddypress',
							'name' => esc_attr__('BuddyPress', 'thrive-nouveau')
						),
					array(
							'slug' => 'buddykit',
							'name' => esc_attr__('BuddyKit', 'thrive-nouveau'),
							'source' => 'https://s3.amazonaws.com/dsc-plugins/buddykit.zip',
							'external_url' => 'https://dunhakdis.com/'
						),
					array(
							'slug' => 'bbpress',
							'name' => esc_attr__('BbPress', 'thrive-nouveau')
						),
					array(
							'slug' => 'subway',
							'name' => esc_attr__('Subway - Private Site Option', 'thrive-nouveau')
						),
					array(
							'slug' => 'js_composer',
							'name' => esc_attr__('Visual Composer', 'thrive-nouveau'),
							'source' => 'https://s3.amazonaws.com/dsc-plugins/js_composer.zip',
							'external_url' => 'https://wpbakery.com'
						),
					array(
							'slug' => 'revslider',
							'name' => esc_attr__('Slider Revolution', 'thrive-nouveau'),
							'source' => 'https://s3.amazonaws.com/dsc-plugins/revslider.zip',
							'external_url' => 'https://revolution.themepunch.com/'
						),
					array(
							'slug' => 'gears',
							'name' => esc_attr__('Gears', 'thrive-nouveau'),
							'source' => 'http://demo.dunhakdis.me/plugins/gears.zip',
							'external_url' => 'https://dunhakdis.com'
						),
				)
		),
		// eLearning Demo
		'demo-3' => array(
			'name' => esc_attr__('E-Learning via LearnDash', 'thrive-nouveau'),
			'id' => '3',
			'after_import_setup' => 'thrive_elearning_demo_after_import',
			'image' => 'https://s3.amazonaws.com/image-turbo/thrive-docs/demo-import/learndash.png',
			'plugins' => array(
				array(
						'slug' => 'nifty-menu-options',
						'name' => esc_attr__('Nifty Menu Options', 'thrive-nouveau')
					),
				array(
						'slug' => 'buddypress',
						'name' => esc_attr__('BuddyPress', 'thrive-nouveau')
					),
				array(
						'slug' => 'buddykit',
						'name' => esc_attr__('BuddyKit', 'thrive-nouveau'),
						'source' => 'https://s3.amazonaws.com/dsc-plugins/buddykit.zip',
						'external_url' => 'https://dunhakdis.com/'
					),
				array(
						'slug' => 'bbpress',
						'name' => esc_attr__('BbPress', 'thrive-nouveau')
					),
				array(
						'slug' => 'buddydrive',
						'name' => esc_attr__('BuddyDrive', 'thrive-nouveau')
					),
				array(
						'slug' => 'buddypress-docs',
						'name' => esc_attr__('BuddyDocs', 'thrive-nouveau')
					),
				array(
						'slug' => 'the-events-calendar',
						'name' => esc_attr__('The Events Calendar', 'thrive-nouveau')
					),
				array(
						'slug' => 'subway',
						'name' => esc_attr__('Subway - Private Site Option', 'thrive-nouveau')
					),
				array(
						'slug' => 'js_composer',
						'name' => esc_attr__('Visual Composer', 'thrive-nouveau'),
						'source' => 'https://s3.amazonaws.com/dsc-plugins/js_composer.zip',
						'external_url' => 'https://wpbakery.com'
					),
				array(
						'slug' => 'revslider',
						'name' => esc_attr__('Slider Revolution', 'thrive-nouveau'),
						'source' => 'https://s3.amazonaws.com/dsc-plugins/revslider.zip',
						'external_url' => 'https://revolution.themepunch.com/'
					),
				array(
						'slug' => 'gears',
						'name' => esc_attr__('Gears', 'thrive-nouveau'),
						'source' => 'http://demo.dunhakdis.me/plugins/gears.zip',
						'external_url' => 'https://dunhakdis.com'
					),
				),
			),

		// Social Media: Demo
		'demo-4' => array(
			'name' => esc_attr__('Social Media', 'thrive-nouveau'),
			'id' => '4',
			'after_import_setup' => 'thrive_social_media_demo_after_import',
			'image' => 'http://image-turbo.s3.amazonaws.com/thrive-docs/demo-import/demo-4.png',
			'plugins' => array(
				array(
						'slug' => 'nifty-menu-options',
						'name' => esc_attr__('Nifty Menu Options', 'thrive-nouveau')
					),
				array(
						'slug' => 'buddypress',
						'name' => esc_attr__('BuddyPress', 'thrive-nouveau')
					),
				array(
						'slug' => 'buddykit',
						'name' => esc_attr__('BuddyKit', 'thrive-nouveau'),
						'source' => 'https://s3.amazonaws.com/dsc-plugins/buddykit.zip',
						'external_url' => 'https://dunhakdis.com/'
					),
				array(
						'slug' => 'bbpress',
						'name' => esc_attr__('BbPress', 'thrive-nouveau')
					),
				array(
						'slug' => 'subway',
						'name' => esc_attr__('Subway - Private Site Option', 'thrive-nouveau')
					),
				array(
						'slug' => 'js_composer',
						'name' => esc_attr__('Visual Composer', 'thrive-nouveau'),
						'source' => 'https://s3.amazonaws.com/dsc-plugins/js_composer.zip',
						'external_url' => 'https://wpbakery.com'
					),
				array(
						'slug' => 'gears',
						'name' => esc_attr__('Gears', 'thrive-nouveau'),
						'source' => 'http://demo.dunhakdis.me/plugins/gears.zip',
						'external_url' => 'https://dunhakdis.com'
					),
				),
			),


	);
	return $config;
}

add_action( 'tgmpa_register', 'thrive_register_required_plugins' );

function thrive_register_required_plugins() {

	$demo_import_settings = thrive_demo_import_settings();

	$selected_demo = filter_input(INPUT_GET, 'demo', FILTER_SANITIZE_SPECIAL_CHARS);

	$plugins = array();

	if ( ! empty ( $selected_demo ) ) {
		if ( isset ( $demo_import_settings[$selected_demo]['plugins'] ) ) {
			$plugins = $demo_import_settings[$selected_demo]['plugins'];
		}
	}

	$config = array(
		'id'           => 'thrive-nouveau',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}


function thrive_suggest_plugins_for_selected_demo() {

	$selected_demo = filter_input(INPUT_GET, 'demo', FILTER_SANITIZE_SPECIAL_CHARS);

	if ( empty( $selected_demo ) ) {
		return array();
	}

	$demos = thrive_demo_import_settings();

	if ( isset( $demos[$selected_demo] ) ) {
		if ( isset( $demos[$selected_demo]['plugins'] ) && !empty ($demos[$selected_demo]['plugins']) ) {
			return $demos[$selected_demo]['plugins'];
		}
	}

	return array();
}
