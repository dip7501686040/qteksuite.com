<?php
if ( ! defined('ABSPATH' ) ) exit;

add_action( 'customize_register', 'thrive_remove_css_section', 15 );
/**
 * Remove the additional CSS section, introduced in 4.7, from the Customizer.
 * @param $wp_customize WP_Customize_Manager
 */
function thrive_remove_css_section( $wp_customize ) {
	$wp_customize->remove_section( 'custom_css' );
}

Thrive_Kirki::add_section( 'thrive_customizer_custom_css', array(
    'title'          => esc_html__( 'Custom CSS', 'thrive-nouveau' ),
    'description'    => esc_html__( 'Your own CSS code', 'thrive-nouveau' ),
    'panel'          => 'thrive_customizer_panel', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
) );

Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'code',
	'settings'    => 'thrive_user_define_css',
	'label'       => __( 'Custom CSS', 'thrive-nouveau' ),
	'description' => __( 'Add your own custom CSS here. Click the button below to get started.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_custom_css',
	'default'     => '',
	'priority'    => 10,
	'choices'     => array(
		'language' => 'css',
		'theme'    => 'monokai',
		'height'   => 250,
	),
) );
