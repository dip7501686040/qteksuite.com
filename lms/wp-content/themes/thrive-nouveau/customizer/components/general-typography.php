<?php
if ( ! defined('ABSPATH' ) ) exit;

Thrive_Kirki::add_section( 'thrive_customizer_typography', array(
    'title'          => __( 'Typography', 'thrive-nouveau' ),
    'description'    => __( 'Personalize the typographical style of your website by choosing specific fonts to each area. Fonts are delivered via Google Fonts..', 'thrive-nouveau' ),
    'panel'          => 'thrive_customizer_panel', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
) );

/**
 * Header
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'typography',
	'settings'    => 'thrive_customizer_general_typography_header',
	'label'       => esc_attr__( 'Headers Font Choice', 'thrive-nouveau' ),
	'description' => esc_attr__( 'Select a font that will be applied to each h1, h2, h3, h4, h5, h6, and other headings element of your site.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_typography',
	'default'     => array(
		'font-family'    => 'Roboto',
		'font-weight'    => '500',
		'variant'        => 'regular',
		'subsets'        => array( 'latin-ext' ),
		'text-transform' => 'none',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'h1,h2,h3,h4,h5,h6, .h1, .h2, .h3, .h4, .h5, .h6, .headlings, .buddypress.widget .item-options, .item-title',
		),
	),
) );

/**
 * Body Font
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'typography',
	'settings'    => 'thrive_customizer_general_typography_body',
	'label'       => esc_attr__( 'Body Font Choice', 'thrive-nouveau' ),
	'description' => esc_attr__( 'Select a font that will be applied to the overall text and paragraphs of your site.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_typography',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '300',
		'subsets'        => array( 'latin-ext' ),
		'text-transform' => 'none',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'body',
		),
	),
) );

/**
 * Font Size
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'number',
	'settings'    => 'thrive_customizer_general_font_size',
	'label'       => esc_attr__( 'Font Size', 'thrive-nouveau' ),
	'description' => esc_attr__( 'Enter a general size for the fonts of your website. Approriate font size heirarchy will be applied.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_typography',
	'default'     => 14,
	'choices'     => array(
		'min'  => 10,
		'max'  => 18,
		'step' => 1,
	),
	'priority'    => 10,
	'output'      => array(
			array(
					'element' => 'html',
					'property' => 'font-size',
					'value_pattern' => '$px'
				)
		),
) );