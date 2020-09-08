<?php
if ( ! defined('ABSPATH' ) ) exit;

Thrive_Kirki::add_section( 'thrive_customizer_logo', array(
    'title'          => __( 'Logo Settings', 'thrive-nouveau' ),
    'description'    => __( 'Add your own company logo and resize it accordingly.', 'thrive-nouveau' ),
    'panel'          => 'thrive_customizer_panel', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'image',
	'settings'    => 'thrive_logo',
	'label'       => __( 'Upload Logo', 'thrive-nouveau' ),
	'description' => __( 'Upload an image file to be used as the logo for your website.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_logo',
	'default'     => get_template_directory_uri() . '/logo.svg',
	'priority'    => 10,
	'partial_refresh' => array(
		'logo_image' => array(
			'selector'        => '#site-navbar-header #site-brand > a',
			'render_callback' => function() {
				return '<img class="site-logo" src="'.esc_url( get_theme_mod('thrive_logo') ).'" />';
			},
		),
	)
) );

/**
 * Logo Size
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'slider',
	'settings'    => 'thrive_customizer_logo_size',
	'label'       => esc_attr__( 'Logo Size', 'thrive-nouveau' ),
	'description' => __( 'Adjust the size of your logo by dragging the circle in the slider.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_logo',
	'default'     => 120,
	'transport'	  => 'postMessage',
	'choices'     => array(
		'min'  => '125',
		'max'  => '265',
		'step' => '1',
	),
	'js_vars'   => array(
		array(
			'element'  => '#site-brand .site-logo',
			'function' => 'css',
			'property' => 'width',
			'units'    => 'px'
		)
	),
	'output' => array(
		array(
			'element'  => '#site-brand .site-logo',
			'property' => 'width',
			'units' 	   => 'px',
		)
	)
) );

/**
 * Logo Horizontal Position
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'slider',
	'settings'    => 'thrive_customizer_logo_vertical',
	'label'       => esc_attr__( 'Horizontal Position', 'thrive-nouveau' ),
	'description' => __( 'Adjust the horizontal position of your logo.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_logo',
	'default'     => 0,
	'transport'	  => 'postMessage',
	'choices'     => array(
		'min'  => '-100',
		'max'  => '100',
		'step' => '1',
	),
	'js_vars'   => array(
		array(
			'element'  => '#site-brand .site-logo',
			'function' => 'css',
			'property' => 'left',
			'units'    => 'px'
		)
	),
	'output' => array(
		array(
			'element'  => '#site-brand .site-logo',
			'property' => 'left',
			'units'    => 'px',
		)
	)
) );

/**
 * Logo Vertical Position
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'slider',
	'settings'    => 'thrive_customizer_logo_horizontal',
	'label'       => esc_attr__( 'Vertical Position', 'thrive-nouveau' ),
	'description' => __( 'The vertical position of your logo.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_logo',
	'default'     => 0,
	'transport'	  => 'postMessage',
	'choices'     => array(
		'min'  => '-100',
		'max'  => '100',
		'step' => '1',
	),
	'js_vars'   => array(
		array(
			'element'  => '#site-brand .site-logo',
			'function' => 'css',
			'property' => 'top',
			'units'    => 'px'
		)
	),
	'output' => array(
		array(
			'element'  => '#site-brand .site-logo',
			'property' => 'top',
			'units'    => 'px',
		)
	)
) );

/**
 * Logo Background Color
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'color',
	'settings'    => 'thrive_customizer_logo_background_color',
	'label'       => __( 'Background Color', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_logo',
	'default'     => 'rgba(0,0,0,0.24)',
	'description' => __( 'Choose a background color to resolve any contrast issues.', 'thrive-nouveau' ),
	'priority'    => 10,
	'transport'   => 'postMessage',
	'choices'     => array(
		'alpha' => true,
	),
	'js_vars'   => array(
		array(
			'element'  => '#thrive-bar .navbar-brand',
			'function' => 'css',
			'property' => 'background-color',
		)
	),
	'output' => array(
		array(
			'element'  => '#thrive-bar .navbar-brand',
			'property' => 'background-color',
		)
	)
) );
