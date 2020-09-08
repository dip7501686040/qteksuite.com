<?php
if ( ! defined('ABSPATH' ) ) exit;

Thrive_Kirki::add_section( 'thrive_customizer_register', array(
    'title'          => esc_attr__( 'Registration Page', 'thrive-nouveau' ),
    'description'    => esc_attr__( 'Use this section to customize your register page. After saving, log-out and visit your register page to see the changes. Make sure to enable the registration option inside the site settings.', 'thrive-nouveau' ),
    'panel'          => 'thrive_customizer_panel', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

/**
 * Disable Page Header
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'checkbox',
	'settings'    => 'thrive_register_disable_header',
	'label'       => esc_attr__( 'Disable Header', 'thrive-nouveau' ),
	'description' => esc_attr__( 'Check to disable site header in the register page.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_register',
	'default'     => false,
	'priority'    => 10,
));

/**
 * Disable Page Footer
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'checkbox',
	'settings'    => 'thrive_register_disable_footer',
	'label'       => esc_attr__( 'Disable Footer', 'thrive-nouveau' ),
	'description' => esc_attr__( 'Check to disable site footer in the register page.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_register',
	'default'     => false,
	'priority'    => 10,
));

/**
 * Enable Logo
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'checkbox',
	'settings'    => 'thrive_register_enable_logo',
	'label'       => esc_attr__( 'Enable Logo', 'thrive-nouveau' ),
	'description' => esc_attr__( 'Check to enable site logo in the register form. Useful if you want to hide the site header..', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_register',
	'default'     => false,
	'priority'    => 10,
));

/**
 * Logo Size
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'slider',
	'settings'    => 'thrive_customizer_registration_logo_size',
	'label'       => esc_attr__( 'Logo Size', 'thrive-nouveau' ),
	'description' => __( 'Adjust the size of your logo by dragging the circle in the slider.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_register',
	'default'     => 120,
	'transport'	  => 'postMessage',
	'choices'     => array(
		'min'  => '100',
		'max'  => '265',
		'step' => '1',
	),
	'js_vars'   => array(
		array(
			'element'  => '#thrive-registration-logo .site-logo',
			'function' => 'css',
			'property' => 'width',
			'units'    => 'px'
		)
	),
	'output' => array(
		array(
			'element'  => '#thrive-registration-logo .site-logo',
			'property' => 'width',
			'units' 	   => 'px',
		)
	)
) );

/**
 * Logo Position
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'select',
	'settings'    => 'thrive_customizer_registration_logo_position',
	'label'       => esc_attr__( 'Logo Position', 'thrive-nouveau' ),
	'description' => esc_attr__( 'Set the registration logo postion.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_register',
	'default'     => 'left',
	'priority'    => 10,
	'transport'   => 'postMessage',
    'choices'     => array(
		'left' => esc_attr__( 'Left', 'thrive-nouveau' ),
		'center' => esc_attr__( 'Center', 'thrive-nouveau' ),
		'right' => esc_attr__( 'Right', 'thrive-nouveau' ),
	),
    'js_vars'     => array(
            array(
                    'element'  => '#thrive-registration-logo',
                    'function' => 'css',
                    'property' => 'text-align',
                )
        ),
	'output'      => array(
			array(
					'element' => '#thrive-registration-logo',
					'function' => 'css',
					'property' => 'text-align'
				)
		),
) );

/**
 * Background
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'image',
	'settings'    => 'thrive_customizer_register_background_image',
	'label'       => esc_attr__( 'Background Image', 'thrive-nouveau' ),
	'description' => esc_attr__( 'Upload an image to be used as the background of your register page. Leave this blank to use the color field below.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_register',
	'default'     => '',
	'priority'    => 10,
	'transport'   => 'postMessage',
	'js_vars'     => array(
			array(
					'element'  => 'body.registration.buddypress #content.site-content',
					'function' => 'css',
					'property' => 'background-image',
				)
		),
	'output'     => array(
			array(
					'element'  => 'body.registration.buddypress #content.site-content',
					'function' => 'css',
					'property' => 'background-image',
				)
		),
) );

/**
 * Background Color
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'color',
	'settings'    => 'thrive_customizer_register_background_color',
	'label'       => esc_attr__( 'Background Color', 'thrive-nouveau' ),
	'description' => esc_attr__( 'Remove the image above to use solid background color', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_register',
	'default'     => '#eceff1',
	'priority'    => 10,
	'transport'   => 'postMessage',
    'choices'     => array(
        'alpha' => true,
    ),
    'js_vars'     => array(
            array(
                    'element'  => 'body.registration.buddypress #content.site-content',
                    'function' => 'css',
                    'property' => 'background-color',
                )
        ),
	'output'      => array(
			array(
					'element' => 'body.registration.buddypress #content.site-content',
					'function' => 'css',
					'property' => 'background-color'
				)
		),
) );

/**
 * Background Size
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'select',
	'settings'    => 'thrive_customizer_register_background_size',
	'label'       => esc_attr__( 'Background Size', 'thrive-nouveau' ),
	'description' => esc_attr__( 'Set the background size for the background image.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_register',
	'default'     => 'cover',
	'priority'    => 10,
	'transport'   => 'postMessage',
    'choices'     => array(
		'auto' => esc_attr__( 'Auto', 'thrive-nouveau' ),
		'cover' => esc_attr__( 'Cover', 'thrive-nouveau' ),
		'contain' => esc_attr__( 'Contain', 'thrive-nouveau' ),
	),
    'js_vars'     => array(
            array(
                    'element'  => 'body.registration.buddypress #content.site-content',
                    'function' => 'css',
                    'property' => 'background-size',
                )
        ),
	'output'      => array(
			array(
					'element' => 'body.registration.buddypress #content.site-content',
					'function' => 'css',
					'property' => 'background-size'
				)
		),
) );


/**
 * Background Repeat
 */
Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'select',
	'settings'    => 'thrive_customizer_register_background_repeat',
	'label'       => esc_attr__( 'Background Repeat', 'thrive-nouveau' ),
	'description' => esc_attr__( 'Choose \'Auto\' for \'Background Size\' if you intend to use image patterns and repeat the background horizontally or vertically.', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_register',
	'default'     => 'cover',
	'priority'    => 10,
	'transport'   => 'postMessage',
    'choices'     => array(
		'repeat-x' => esc_attr__( 'Repeat Horizontally', 'thrive-nouveau' ),
		'repeat-y' => esc_attr__( 'Repeat Vertically', 'thrive-nouveau' ),
		'repeat'   => esc_attr__( 'Repeat both horizontally and vertically', 'thrive-nouveau' ),
		'no-repeat'   => esc_attr__( 'Do not repeat', 'thrive-nouveau' ),
	),
    'js_vars'     => array(
            array(
                    'element'  => 'body.registration.buddypress #content.site-content',
                    'function' => 'css',
                    'property' => 'background-repeat',
                )
        ),
	'output'      => array(
			array(
					'element' => 'body.registration.buddypress #content.site-content',
					'function' => 'css',
					'property' => 'background-repeat'
				)
		),
) );

Thrive_Kirki::add_field( 'thrive_customizer_config', array(
	'type'        => 'color',
	'settings'    => 'thrive_customizer_register_heading_background_color',
	'label'       => esc_attr__( 'Heading Background Color', 'thrive-nouveau' ),
	'description' => esc_attr__( 'The background color of the heading when logo is enabled', 'thrive-nouveau' ),
	'section'     => 'thrive_customizer_register',
	'default'     => '#0077ff',
	'priority'    => 10,
	'transport'   => 'postMessage',
    'choices'     => array(
        'alpha' => true,
    ),
	'output'      => array(
			array(
					'element' => '#thrive-registration-logo',
					'function' => 'css',
					'property' => 'background-color'
				)
		),
) );
