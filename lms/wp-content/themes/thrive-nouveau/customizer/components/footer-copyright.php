<?php
if ( ! defined('ABSPATH' ) ) exit;

Thrive_Kirki::add_section( 'thrive_customizer_footer_copyright', array(
    'title'          => esc_html__( 'Footer Copyright', 'thrive-nouveau' ),
    'description'    => esc_html__( 'Change the copyright section of the footer to your own content. You can also personalized the colors to match your needs.', 'thrive-nouveau' ),
    'panel'          => 'thrive_customizer_panel', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
) );

/**
 * Background Color
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'color',
	'settings'    => 'thrive_customizer_footer_copyright_background_color',
	'label'       => esc_html__( 'Background Color', 'thrive-nouveau' ),
	'description' => esc_html__( 'The bacground color of the footer copyright section.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_footer_copyright',
	'default'     => '#212121',
	'priority'    => 10,
	'transport'   => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '#thrive_footer',
			'function' => 'css',
			'property' => 'background-color'
		)
	),
	'output' => array(
		array(
			'element'  => '#thrive_footer',
			'property' => 'background-color'
		)
	)
	
) );

/**
 * Color
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'color',
	'settings'    => 'thrive_customizer_footer_copyright_foreground_color',
	'label'       => esc_html__( 'Foreground Color', 'thrive-nouveau' ),
	'description' => esc_html__( 'The color of the text in your footer copyright section.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_footer_copyright',
	'default'     => '#9e9e9e',
	'priority'    => 10,
	'transport'   => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '#thrive_footer',
			'function' => 'css',
			'property' => 'color'
		)
	),
	'output' => array(
		array(
			'element'  => '#thrive_footer',
			'property' => 'color'
		)
	)
) );

Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'select',
	'settings'    => 'thrive_customizer_footer_copyright_foreground_color_contrast',
	'label'       => __( 'Links Color Mode', 'thrive-nouveau' ),
	'description' => __( 'Choose the color mode for the links in your footer copyright section. For best result, choose the dark contrast option if you are applying a white background color to your footer.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_footer_copyright',
	'default'     => 'rgba(255,255,255,0.7)',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => array(
		'rgba(255,255,255,0.7)' => esc_attr__( 'Light Contrast', 'thrive-nouveau' ),
		'rgba(0,0,0,0.7)' => esc_attr__( 'Dark Contrast', 'thrive-nouveau' ),
	),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '#thrive_footer_copytext a',
			'function' => 'css',
			'property' => 'color'
		)
	),
	'output' => array(
		array(
			'element'  => '#thrive_footer_copytext a',
			'property' => 'color'
		)
	)
) );

/**
 * Copyright Text
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'textarea',
	'settings'    => 'thrive_customizer_footer_copyright_text',
	'label'       => esc_html__( 'Copyright Context', 'thrive-nouveau' ),
	'description' => esc_html__("Replace the default copyright content with your site's copyright statements and contents.", 'thrive-nouveau'),
	'section'     => 'thrive_customizer_footer_copyright',
	'default'     => esc_html__('&copy; [Your Website Name Here] 2015. All Rights Reserved.', 'thrive-nouveau'),
	'priority'    => 10,
	'transport'   => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '#thrive_footer_copytext',
			'function' => 'html',
		)
	),
	'output' => array(
		array(
			'element'  => '#thrive_footer_copytext',
		)
	)
) );