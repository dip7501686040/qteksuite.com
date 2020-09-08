<?php
if ( ! defined('ABSPATH' ) ) exit;

Thrive_Kirki::add_section( 'thrive_customizer_footer_widget', array(
    'title'          => esc_html__( 'Footer Widgets', 'thrive-nouveau' ),
    'description'    => esc_html__( 'All settings related to the footer widgets section. You can control the number of columns per row for each widget, the background color, and other things.', 'thrive-nouveau' ),
    'panel'          => 'thrive_customizer_panel', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
) );

/**
 * Number of Columns
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'radio',
	'settings'    => 'thrive_customizer_footer_widget_columns',
	'label'       => esc_attr__( 'No. Of Columns', 'thrive-nouveau' ),
	'description' => esc_attr__( 'Choose how many columns you would like to display for each widgets rows in the footer', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_footer_widget',
	'default'     => 'col-md-3',
	'priority'    => 10,
	'choices'     => array(
		'col-md-12' => esc_attr__( 'Single Column', 'thrive-nouveau' ),
		'col-md-6' 	=> esc_attr__( '2 Columns', 'thrive-nouveau' ),
		'col-md-4'  => esc_attr__( '3 Columns', 'thrive-nouveau' ),
		'col-md-3'  => esc_attr__( '4 Columns', 'thrive-nouveau' ),
	),
	'partial_refresh' => array(
		'thrive_customizer_footer_widget_columns' => array(
			'selector'        => '#thrive_footer_widget',
			'render_callback' => 'thrive_footer_widget'
		),
	)
) );

/**
 * Background Color
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'color',
	'settings'    => 'thrive_customizer_footer_widget_background_color',
	'label'       => esc_attr__( 'Background Color', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_footer_widget',
	'default'     => '#0077ff',
	'priority'    => 10,
	'transport'	  => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '#thrive_footer_widget',
			'function' => 'css',
			'property' => 'background-color'
		)
	),
	'output' => array(
		array(
			'element'  => '#thrive_footer_widget',
			'property' => 'background-color'
		)
	)
) );
