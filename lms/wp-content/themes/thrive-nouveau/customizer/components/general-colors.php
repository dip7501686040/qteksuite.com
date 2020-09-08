<?php
if ( ! defined('ABSPATH' ) ) exit;

Thrive_Kirki::add_section( 'thrive_customizer_color_scheme', array(
    'title'          => __( 'General Colors', 'thrive-nouveau' ),
    'description'    => __( 'Choose the appropriate colors for your website.', 'thrive-nouveau' ),
    'panel'          => 'thrive_customizer_panel', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
) );

/**
 * Primary Colors
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'color',
	'settings'    => 'thrive_customizer_colorscheme_primary',
	'label'       => esc_attr__( 'Primary Colors', 'thrive-nouveau' ),
    'description'    => __( 'Primary colors will be applied to general link colors, buttons, and other section that requires distinction. For widgets, headers, and footer colors, kindly refer to their respective areas of customization.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_color_scheme',
	'default'     => '#0077ff',
	'priority'    => 10,
	'choices'     => array(
		'alpha' => false,
	),
	'output' => array(
		array(
			'element' => thrive_colors_tags('primary_background'),
			'property' => 'background-color'
		),
		array(
			'element' => thrive_colors_tags('primary_color'),
			'property' => 'color'
		),
		array(
			'element' => thrive_colors_tags('border_color'),
			'property' => 'border-color'
		)
	)
) );

/**
 * Secondary Colors
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'color',
	'settings'    => 'thrive_customizer_colorscheme_secondary',
	'label'       => esc_attr__( 'Secondary Colors', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_color_scheme',
	'default'     => '#673AB7',
	'priority'    => 10,
	'choices'     => array(
		'alpha' => false,
	),
	'transport'   => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => thrive_colors_tags('secondary_background'),
			'function' => 'css',
			'property' => 'background-color',
		)
	),
	'output' => array(
			array(
				'element' => thrive_colors_tags('secondary_background'),
				'property' => 'background-color'
			),
		)
) );