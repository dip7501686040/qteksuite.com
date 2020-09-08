<?php
if ( ! defined('ABSPATH' ) ) exit;

Thrive_Kirki::add_section( 'thrive_customizer_widget', array(
    'title'          => __( 'Widget Styling', 'thrive-nouveau' ),
    'description'    => __( 'Personalize the sidebar widgets of your website.', 'thrive-nouveau' ),
    'panel'          => 'thrive_customizer_panel', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
) );

/**
 * Title Background Color
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'color',
	'settings'    => 'thrive_customizer_widget_title_background',
	'label'       => __( 'Title Background', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_widget',
	'default'     => '#0077ff',
	'description' => esc_html__('This option will change the background color of the widget title.', 'thrive-nouveau' ),
	'priority'    => 10,
	'transport'   => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '#secondary .widget-title, .widget.home-widgets h3.widget-title',
			'function' => 'css',
			'property' => 'background-color',
		)
	),
	'output' => array(
		array(
			'element'  => '#secondary .widget-title, .widget.home-widgets h3.widget-title',
			'property' => 'background-color',
		)
	),
) );

/**
 * Title Foreground Color
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'color',
	'settings'    => 'thrive_customizer_widget_title_color',
	'label'       => __( 'Title Color', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_widget',
	'default'     => 'rgba(255, 255, 255, 0.8)',
	'description' => esc_html__('This option will change the color of the widget title.', 'thrive-nouveau' ),
	'priority'    => 10,
	'transport'   => 'postMessage',
	'choices'     => array(
		'alpha' => true,
	),
	'js_vars'   => array(
		array(
			'element'  => '#secondary .widget-title, .widget.home-widgets h3.widget-title',
			'function' => 'css',
			'property' => 'color',
		),
		array(
			'element'  => '#secondary .widget-title > a, .widget.home-widgets h3.widget-title > a',
			'function' => 'css',
			'property' => 'color',
		)
	),
	'output' => array(
		array(
			'element'  => '#secondary .widget-title, .widget.home-widgets h3.widget-title',
			'property' => 'color',
		),
		array(
			'element'  => '#secondary .widget-title > a, .widget.home-widgets h3.widget-title > a',
			'property' => 'color',
		)
	),
) );

/**
 * Border Type
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'radio',
	'settings'    => 'thrive_customizer_widget_border_style',
	'label'       => esc_html__( 'Border Style', 'thrive-nouveau' ),
	'description' => esc_html__( "You can choose between 'Circular' or 'Sharp Edges' style for your sidebar widgets.", 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_widget',
	'default'     => '4px',
	'priority'    => 10,
	'choices'     => array(
		'4px'   => esc_attr__( 'Circular', 'thrive-nouveau' ),
		'0px' => esc_attr__( 'Sharp Edges', 'thrive-nouveau' ),
	),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '#secondary .sidebar-widgets',
			'function' => 'css',
			'property' => 'border-radius',
		),
		array(
			'element'  => '#secondary .sidebar-widgets .widget-title',
			'function' => 'css',
			'property' => 'border-top-right-radius',
		),
		array(
			'element'  => '#secondary .sidebar-widgets .widget-title',
			'function' => 'css',
			'property' => 'border-top-left-radius',
		),

	),
	'output' => array(
		array(
			'element'  => '#secondary .sidebar-widgets',
			'property' => 'border-radius',
		),
		array(
			'element'  => '#secondary .sidebar-widgets .widget-title',
			'property' => 'border-top-right-radius',
		),
		array(
			'element'  => '#secondary .sidebar-widgets .widget-title',
			'property' => 'border-top-left-radius',
		),
	
	),
) );
