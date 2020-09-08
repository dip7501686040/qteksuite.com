<?php
if ( ! defined('ABSPATH' ) ) exit;

Thrive_Kirki::add_section( 'thrive_customizer_layout', array(
    'title'          => __( 'Site Layout', 'thrive-nouveau' ),
    'panel'          => 'thrive_customizer_panel', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

/**
 * Site Layout
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'select',
	'settings'    => 'thrive_layouts_customize',
	'label'       => __( 'Layout Type', 'thrive-nouveau' ),
	'description' => __( 'Select the layout type of your website. You can choose between 2 columns and 1 column. The 1 column will disable the side navigation.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_layout',
	'default'     => '2_columns',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => array(
		'2_columns' => esc_attr__( '2 Columns', 'thrive-nouveau' ),
		'1_column' => esc_attr__( '1 Column', 'thrive-nouveau' ),
	),
) );

/**
 * Maximum Width
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'slider',
	'settings'    => 'thrive_layouts_max_width',
	'label'       => esc_attr__( 'Maximum Inner Container Width', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_layout',
	'default'     => 1047,
	'choices'     => array(
		'min'  => '960',
		'max'  => '2500',
		'step' => '1',
	),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '#page-content-wrapper, #page-hero .page-hero-inner-wrap, .limiter, #item-header-inner',
			'function' => 'css',
			'property' => 'max-width',
			'units' => 'px'
		),
		array(
			'element' => '.bp-user #buddypress #object-nav.users-nav.horizontal ul',
			'function' => 'css',
			'property' => 'max-width',
			'units' => 'px',
			'media_query' => '@media (min-width: 768px)'
		)
	),
	'output' => array(
		array(
			'element'  => '#page-content-wrapper, #page-hero .page-hero-inner-wrap, .limiter, #item-header-inner',
			'property' => 'max-width',
			'units' => 'px',
		),
		array(
			'element' => '.bp-user #buddypress #object-nav.users-nav.horizontal ul',
			'property' => 'max-width',
			'units' => 'px',
			'media_query' => '@media (min-width: 768px)'
		)
	),
) );

/**
 * Background Color
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'color',
	'settings'    => 'thrive_customizer_layout_background',
	'label'       => __( 'Background Color', 'thrive-nouveau' ),
	'description' => esc_html__('This option allows you to change the background color of the main section.', 'thrive-nouveau'),
	'section'     => 'thrive_customizer_layout',
	'default'     => '#f5f5f5',
	'priority'    => 10,
	'transport'   => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '#content.site-content',
			'function' => 'css',
			'property' => 'background-color',
		)
	),
	'output' => array(
		array(
			'element'  => '#content.site-content',
			'property' => 'background-color',
		)
	),
) );

/**
 * Background Image
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'image',
	'settings'    => 'thrive_customizer_layout_background_image',
	'label'       => __( 'Background Image', 'thrive-nouveau' ),
	'description' => __( 'Upload an image to be used as the background of your website.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_layout',
	'default'     => '',
	'priority'    => 10,
	'transport'	  => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '#content.site-content',
			'function' => 'css',
			'property' => 'background-image',
		)
	),
	'output' => array(
		array(
			'element'  => '#content.site-content',
			'property' => 'background-image',
		)
	),
) );

/**
 * Background Size
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'select',
	'settings'    => 'thrive_customizer_layout_background_size',
	'label'       => __( 'Background Size', 'thrive-nouveau' ),
	'description' => __( 'Select a size for your background image', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_layout',
	'default'     => 'auto',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => array(
		'auto' => esc_attr__( 'Automatic', 'thrive-nouveau' ),
		'cover' => esc_attr__( 'Cover', 'thrive-nouveau' ),
		'contain' => esc_attr__( 'Contain', 'thrive-nouveau' ),
	),
	'transport'	  => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '#content.site-content',
			'function' => 'css',
			'property' => 'background-size',
		)
	),
	'output' => array(
		array(
			'element'  => '#content.site-content',
			'property' => 'background-size',
		)
	),
) );

/**
 * Background Repeat
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'select',
	'settings'    => 'thrive_customizer_layout_background_repeat',
	'label'       => __( 'Background Repeat', 'thrive-nouveau' ),
	'description' => __( 'Select the \'repeat\' pattern of your site\'s background image.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_layout',
	'default'     => 'auto',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => array(
		'initial' => esc_attr__( 'Default', 'thrive-nouveau' ),
		'no-repeat' => esc_attr__( 'Do Not Repeat', 'thrive-nouveau' ),
		'repeat' => esc_attr__( 'Repeat Horizontally & Vertically', 'thrive-nouveau' ),
		'repeat-x' => esc_attr__( 'Repeat Horizontally', 'thrive-nouveau' ),
		'repeat-y' => esc_attr__( 'Repeat Vertically', 'thrive-nouveau' ),
	),
	'transport'	  => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '#content.site-content',
			'function' => 'css',
			'property' => 'background-repeat',
		)
	),
	'output' => array(
		array(
			'element'  => '#content.site-content',
			'property' => 'background-repeat',
		)
	),
) );
