<?php
if ( ! defined('ABSPATH' ) ) exit;

Thrive_Kirki::add_section( 'thrive_customizer_single_post', array(
    'title'          => __( 'Single Blog Post', 'thrive-nouveau' ),
    'description'    => __( 'Single post typography and other options', 'thrive-nouveau' ),
    'panel'          => 'thrive_customizer_panel', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
) );

/**
 * Header
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'typography',
	'settings'    => 'thrive_customizer_single_post',
	'label'       => esc_attr__( 'Typography', 'thrive-nouveau' ),
	'description' => esc_attr__( 'Select a font that will be applied to the blog post of your site.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_single_post',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'subsets'        => array( 'latin-ext' ),
		'text-transform' => 'none',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => '.single.single-blog #primary article .entry-content'
		)
	),
) );

/**
 * Padding
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'spacing',
	'settings'    => 'thrive_customizer_blog_padding',
	'label'       => esc_attr( 'Spacing Control', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_single_post',
	'default'     => array(
		'top'    => '0', //15px 70px 25px
		'bottom' => '0',
		'left'   => '0',
		'right'  => '0',
	),
	'priority'    => 10,
	'js_vars' => array(
			'element'  => '.single.single-blog #primary article .entry-content',
			'function' => 'css',
			'property' => 'padding',
		),
	'output' => array(
			array(
				'element' => '.single.single-blog #primary article .entry-content',
				'property' => 'padding',
			),
		)
) );

/**
 * Font-size
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'slider',
	'settings'    => 'thrive_customizer_single_post_font_size',
	'label'       => esc_attr__( 'Font Size', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_single_post',
	'default'     => 18,
	'transport'	  => 'postMessage',
	'choices'     => array(
		'min'  => '9',
		'max'  => '22',
		'step' => '1',
	),
	'js_vars' => array(
			array(
				'element' => '.thrive-archives .entry-content, .single.single-blog #primary article .entry-content',
				'function' => 'css',
				'property' => 'font-size',
				'units'    => 'px'
			)
		),
	'output' => array(
			array(
				'element' => '.thrive-archives .entry-content, .single.single-blog #primary article .entry-content',
				'property' => 'font-size',
				'units'    => 'px'
			),
		)
) );

/**
 * Post Sharing
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'select',
	'settings'    => 'thrive_customizer_single_post_social_share',
	'label'       => esc_attr__( 'Social Sharing Icons', 'thrive-nouveau' ),
	'description' => esc_attr__( 'Enable or disable the post social media sharing icons.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_single_post',
	'default'     => '',
	'choices'     => array(
		'inline-block' => esc_attr__( 'Enable', 'thrive-nouveau' ),
		'none' => esc_attr__( 'Disable', 'thrive-nouveau' ),
	),
	'transport' => 'postMessage',
	'priority'    => 10,
	'js_vars'   => array(
		array(
			'element'  => '.thrive-inline.single .entry-share',
			'function' => 'css',
			'property' => 'display',
		)
	),
	'output'      => array(
		array(
			'element' => '.thrive-inline.single .entry-share',
			'property' => 'display'
		)
	),
) );

/**
 * Post Author
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'select',
	'settings'    => 'thrive_customizer_single_post_author_about',
	'label'       => esc_attr__( 'Author About', 'thrive-nouveau' ),
	'description' => esc_attr__( 'Enable or disable the author section below the body of the post.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_single_post',
	'default'     => '',
	'choices'     => array(
		'block' => esc_attr__( 'Enable', 'thrive-nouveau' ),
		'none' => esc_attr__( 'Disable', 'thrive-nouveau' ),
	),
	'transport' => 'postMessage',
	'priority'    => 10,
	'js_vars'   => array(
		array(
			'element'  => '.thrive-inline.single .entry-author-about',
			'function' => 'css',
			'property' => 'display',
		)
	),
	'output'      => array(
		array(
			'element' => '.thrive-inline.single .entry-author-about',
			'property' => 'display'
		)
	),
) );