<?php
if ( ! defined('ABSPATH' ) ) exit;

Thrive_Kirki::add_section( 'thrive_customizer_header', array(
    'title'          => __( 'Header Styling', 'thrive-nouveau' ),
    'description'    => __( 'Personalize the header of your website.', 'thrive-nouveau' ),
    'panel'          => 'thrive_customizer_panel', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
) );

/**
 * Header Style
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'select',
	'settings'    => 'thrive_customizer_header_style',
	'label'       => __( 'Header Type', 'thrive-nouveau' ),
	'description' => esc_html__("Select which header you would like your website to have.", 'thrive-nouveau'),
	'section'     => 'thrive_customizer_header',
	'default'     => 'navigation-1',
	'priority'    => 10,
	'choices'     => array(
		'navigation-1'  => esc_attr__( 'Header Style 1', 'thrive-nouveau' ),
		'navigation-2' => esc_attr__( 'Header Style 2', 'thrive-nouveau' ),
	)
) );

/**
 * Enable/Disable search
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'select',
	'settings'    => 'thrive_customizer_enable_search',
	'label'       => __( 'Search', 'thrive-nouveau' ),
	'description' => esc_html__("Select the 'Disabled' option to disable the search in the header menu.", 'thrive-nouveau'),
	'section'     => 'thrive_customizer_header',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => array(
		'block'  => esc_attr__( 'Enabled', 'thrive-nouveau' ),
		'none' => esc_attr__( 'Disabled', 'thrive-nouveau' ),
	),
	'transport'   => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '#navbar-search',
			'function' => 'css',
			'property' => 'display',
		),
		 array(
		 	'element'  => 'li.hs2-search-icon',
			'function' => 'css',
			'property' => 'display'
		)
	),
	'output' => array(
		array(
			'element'  => '#navbar-search, .hs2-search-icon',
			'property' => 'display',
		),
		array(
		 	'element'  => 'li.hs2-search-icon',
			'function' => 'css',
			'property' => 'display'
		)
	)
) );

/**
 * Background Color
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'color',
	'settings'    => 'thrive_customizer_header_background_color',
	'label'       => __( 'Background Color', 'thrive-nouveau' ),
	'description' => esc_html__('Pick a background color for the header.', 'thrive-nouveau'),
	'section'     => 'thrive_customizer_header',
	'default'     => '#0077ff',
	'priority'    => 10,
	'transport'   => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '#thrive-bar',
			'function' => 'css',
			'property' => 'background-color',
		)
	),
	'output' => array(
		array(
			'element'  => '#thrive-bar',
			'property' => 'background-color',
		)
	),
	'active_callback' => array(
			array(
					'setting' => 'thrive_customizer_header_menu_is_background_gradient',
					'operator' => 'equals',
					'value' => false
				)
		)
) );

/**
 * Use Gradient Background?
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'checkbox',
	'settings'    => 'thrive_customizer_header_menu_is_background_gradient',
	'label'       => esc_attr__( 'Linear Gradient Background', 'thrive-nouveau' ),
	'description' => esc_attr__( 'Check to use linear gradient background instead of solid', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_header',
	'default'     => false,
	'priority'    => 10,
) );

// Color Start
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'color',
	'settings'    => 'thrive_customizer_header_background_gradient_color_start',
	'label'       => __( 'Gradient Color Start', 'thrive-nouveau' ),
	'description' => esc_html__('Pick your first gradient color.', 'thrive-nouveau'),
	'section'     => 'thrive_customizer_header',
	'default'     => '#51039f',
	'priority'    => 10,
	'active_callback' => array(
			array(
					'setting' => 'thrive_customizer_header_menu_is_background_gradient',
					'operator' => 'equals',
					'value' => true
				)
		)
) );

// Color End
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'color',
	'settings'    => 'thrive_customizer_header_background_gradient_color_end',
	'label'       => __( 'Gradient Color End', 'thrive-nouveau' ),
	'description' => esc_html__('Pick your second gradient color.', 'thrive-nouveau'),
	'section'     => 'thrive_customizer_header',
	'default'     => '#0476ff',
	'priority'    => 10,
	'active_callback' => array(
			array(
					'setting' => 'thrive_customizer_header_menu_is_background_gradient',
					'operator' => 'equals',
					'value' => true
				)
		)
));

add_action( 'wp_enqueue_scripts', function() {

	$color_start = get_theme_mod( 'thrive_customizer_header_background_gradient_color_start', '#51039f' );
	$color_end = get_theme_mod( 'thrive_customizer_header_background_gradient_color_end', '#0476ff' );
	$is_gradient = get_theme_mod( 'thrive_customizer_header_menu_is_background_gradient', false );

	if ( $is_gradient ) {
		if ( ! empty( $color_start )  && ! empty ( $color_end ) ) {
			$custom_css = '
				body #thrive-bar {
					background: linear-gradient(to right, ' . $color_start . ', ' . $color_end . '); 
				}';
			wp_add_inline_style( "thrive-style", $custom_css );
		}
	}

}, 1000 );
/**
 * Typography
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'typography',
	'settings'    => 'thrive_customizer_header_menu_typography',
	'label'       => esc_attr__( 'Header Typography', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_header',
	'description' => esc_html__('Pick a background color for the header.', 'thrive-nouveau'),
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'subsets'        => array( 'latin-ext' ),
		'text-transform' => 'none',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => '#thrive-bar',
		),
		array(
			'element' => '#thrive-bar.navbar.navbar-style-2 .navbar-nav > li > .dropdown-menu > li a'
		),
		array(
			'element' => '#thrive-bar .navbar-nav > li > a',
		),
	),
) );

/**
 * Sign Up Color Option
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
    'type'        => 'multicolor',
    'settings'    => 'thrive_customizer_header_signup',
    'label'       => esc_attr__( 'Sign Up Button Gradient', 'thrive-nouveau' ),
    'section'     => 'thrive_customizer_header',
    'description' => esc_attr__( 'Choose the color for the \'Sign-up\' button. Pro tip: Registration must be enabled for the button to show up.', 'thrive-nouveau'),
    'priority'    => 10,
    'choices'     => array(
        'top'    => esc_attr__( 'Top', 'thrive-nouveau' ),
        'bottom'   => esc_attr__( 'Bottom', 'thrive-nouveau' ),
    ),
    'default'     => array(
        'top'    => '#61bd4f',
        'bottom'   => '#5aac44',
    ),
) );

add_action( 'wp_enqueue_scripts', 'thrive_customizer_signup_color_style', 1000 );

function thrive_customizer_signup_color_style() {

	$colors = get_theme_mod( 'thrive_customizer_header_signup' );

	if ( ! empty ( $colors ) ) {
		$custom_css = '
			#thrive-bar .navbar-nav > li > a.navbar-btn#header-sign-up {
				background: '.$colors['top'].';
	    		background: linear-gradient(to bottom, '.$colors['top'].' 0, '.$colors['bottom'].' 100%);
			}';
		wp_add_inline_style( "thrive-style", $custom_css );
	}

}
