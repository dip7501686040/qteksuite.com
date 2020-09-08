<?php
if ( ! defined('ABSPATH' ) ) exit;

Thrive_Kirki::add_section( 'thrive_customizer_side_navigation', array(
    'title'          => __( 'Side Navigation', 'thrive-nouveau' ),
    'description'    => __( 'Customize your website side navigation to suit your needs.', 'thrive-nouveau' ),
    'panel'          => 'thrive_customizer_panel', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

/**
 * User Profile
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'select',
	'settings'    => 'thrive_customizer_config_sidenav_user_profile',
	'label'       => __( 'User Profile', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_side_navigation',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => array(
		'block' => esc_attr__( 'Show', 'thrive-nouveau' ),
		'none' => esc_attr__( 'Do Not Show', 'thrive-nouveau' )
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
			array(
					'element' => '#page-sidebar-user',
					'function' => 'css',
					'property' => 'display'
				),
		),
	'output' => array(
			array(
					'element' => '#page-sidebar-user',
					'property' => 'display'
				),
		),
) );

/**
 * Logged-out Message
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'     => 'textarea',
	'settings' => 'thrive_sidenav_logout_text',
	'label'    => __( 'Logged Out Message', 'thrive-nouveau' ),
	'section'  => 'thrive_customizer_side_navigation',
	'default'  => esc_attr__( 'Welcome! Please sign-in to your account. Thank you!', 'thrive-nouveau' ),
	'priority' => 10,
	'transport' => 'postMessage'
) );

/**
 * Logged-out Message Image
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'image',
	'settings'    => 'thrive_sidenav_logout_image',
	'label'       => __( 'Logged-out Image', 'thrive-nouveau' ),
	'description' => __( 'You can change the image displayed when logged-out.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_side_navigation',
	'default'     => get_template_directory_uri(). '/lock.svg',
	'priority'    => 10,
	'transport'   => 'postMessage'
) );