<?php
if ( ! defined('ABSPATH' ) ) exit;

$section = 'thrive_customizer_page';
$config = 'thrive_customizer_config';
$prefix = 'thrive_customizer_page_';

Thrive_Kirki::add_section( $section, array(
    'title'          => __( 'Single Pages', 'thrive-nouveau' ),
    'description'    => __( 'All options related to single pages.', 'thrive-nouveau' ),
    'panel'          => 'thrive_customizer_panel', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

// Title Color End.
Thrive_Kirki::add_field( $config, array(
	'type'        => 'color',
	'settings'    => $prefix . 'title_color',
	'label'       => __( 'Page Title', 'thrive-nouveau' ),
	'description' => esc_attr__( 'The default color for your page titles. Can be overwritten through individual pages options.', 'thrive-nouveau' ),
	'section'     => $section,
	'default'     => '#212121',
) );
// Title Color End.

// Text Alignment.
Thrive_Kirki::add_field( $config, array(
	'type'        => 'select',
	'settings'    => $prefix . 'text_alignment',
	'label'       => __( 'Page Title: Text Alignment', 'thrive-nouveau' ),
	'section'     => $section,
	'description' => __('The default text alignment for your page title. Can be overwritten through individual pages options', 'thrive-nouveau'),
	'default'     => 'option-1',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => array(
		'left' => esc_attr__( 'Align Left', 'thrive-nouveau' ),
		'right' => esc_attr__( 'Align Right', 'thrive-nouveau' ),
		'center' => esc_attr__( 'Centered', 'thrive-nouveau' ),
	),
) );
// Text Alignment End.

// Secondary Title.
Thrive_Kirki::add_field( $config, array(
	'type'     => 'textarea',
	'settings' => $prefix . 'secondary_title',
	'label'    => __( 'Secondary Title', 'thrive-nouveau' ),
	'section'  => $section,
	'description'  => esc_attr__( 'The default secondary title for all new pages. Can be overwritten through individual pages options.', 'thrive-nouveau' ),
	'priority' => 10,
) );
// Secondary Title End.

// Secondary Color.
Thrive_Kirki::add_field( $config, array(
	'type'        => 'color',
	'settings'    => $prefix . 'secondary_title_color',
	'label'       => __( 'Secondary Title Color', 'thrive-nouveau' ),
	'description' => esc_attr__( 'The default color of your secondary title. Can be overwritten through individual pages options', 'thrive-nouveau' ),
	'section'     => $section,
	'default'     => '#212121',
) );
// Secondary Color End.

// Background Control.
Thrive_Kirki::add_field( $config, array(
	'type'        => 'background',
	'settings'    => $prefix . 'background_settings',
	'label'       => esc_attr__( 'Background Control', 'thrive-nouveau' ),
	'description' => esc_attr__( 'The default background settings for your new pages. Can be overwritten through individual pages options.', 'thrive-nouveau' ),
	'section'     => $section,
	'default'     => array(
		'background-color'      => 'rgba(255,255,255,0.50)',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'auto',
		'background-attachment' => 'scroll',
	),
) );
