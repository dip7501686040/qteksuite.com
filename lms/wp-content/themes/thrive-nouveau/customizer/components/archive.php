<?php
if ( ! defined('ABSPATH' ) ) exit;

$section = 'thrive_customizer_archive';
$config = 'thrive_customizer_config';

Thrive_Kirki::add_section( $section, array(
    'title'          => esc_html__( 'Posts Archives', 'thrive-nouveau' ),
    'description'    => esc_html__( 'The settings related to posts and custom post typ archives', 'thrive-nouveau' ),
    'panel'          => 'thrive_customizer_panel', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
) );

Thrive_Kirki::add_field( $config, array(
	'type'        => 'select',
	'settings'    => 'thrive_customizer_taxonomy_layout',
	'label'       => __( 'Post Type Archive Layout', 'thrive-nouveau' ),
	'description' => __( 'Select the default layout for post archives (e.g. index, date, author) archive pages.', 'thrive-nouveau' ),
	'section'     => $section,
	'default'     => '',
	'priority'    => 10,
	'choices'     => array(
		'content-sidebar' => __('Content / Sidebar Right', 'thrive-nouveau'),
		'sidebar-content' => __('Sidebar Left / Content', 'thrive-nouveau'),
		'full-content'    => __('Full Content', 'thrive-nouveau'),
	),
) );

Thrive_Kirki::add_field( $config, array(
	'type'        => 'select',
	'settings'    => 'thrive_customizer_terms_layout',
	'label'       => __( 'Terms Archive Layout', 'thrive-nouveau' ),
	'description' => __( 'Select the default layout for terms archives pages.', 'thrive-nouveau' ),
	'section'     => $section,
	'default'     => '',
	'priority'    => 10,
	'choices'     => array(
		'content-sidebar' => __('Content / Sidebar Right', 'thrive-nouveau'),
		'sidebar-content' => __('Sidebar Left / Content', 'thrive-nouveau'),
		'full-content'    => __('Full Content', 'thrive-nouveau'),
	),
) );