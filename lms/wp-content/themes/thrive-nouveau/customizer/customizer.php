<?php
/**
 * Configuration sample for the Kirki Customizer.
 * The function's argument is an array of existing config values
 * The function returns the array with the addition of our own arguments
 * and then that result is used in the kirki/config filter
 *
 * @param $config the configuration array
 *
 * @return array
 */
if ( ! defined('ABSPATH' ) ) exit;

function thrive_customisation_styling( $config ) {
	return wp_parse_args( array(
		'description'  => esc_attr__( 'You are currently using Thrive WordPress Theme. This is where you can customize almost everything about Thrive. Personalize your website and make the branding yours by changing the default settings below.', 'thrive-nouveau' ),
	), $config );
}

add_filter( 'kirki/config', 'thrive_customisation_styling' );

Thrive_Kirki::add_config( 'thrive_customizer_config', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

Thrive_Kirki::add_panel( 'thrive_customizer_panel', array(
    'priority'    => 10,
    'title'       => __( 'Thrive Customization', 'thrive-nouveau' ),
    'description' => __( 'My Description', 'thrive-nouveau' ),
) );

/**
 * Add Styling to Customizer
 */
function thrive_customizer_css() { ?>
	<style>
		#customize-controls .description 
		{
			font-weight: 300;
		    font-style: normal;
		    color: #757575;
		    margin-bottom: 10px;
		    font-size: 12px;
		}
	</style>
	<?php
	return;
}

add_action( 'customize_controls_print_styles', 'thrive_customizer_css', 20 );

$customizer_components = array(
		'layout',
		'logo',
		'general-typography',
		'general-colors',
		'header-menu',
		'widget-style',
		'side-navigation',
		'page',
		'single-post',
		'archive',
		'registration',
		'footer-widgets',
		'footer-copyright',
		'social-connect',
		'miscellaneous',
		'custom-css'
	);

foreach( $customizer_components as $component ) {
	require_once get_template_directory() . '/customizer/components/' . sanitize_title( $component ) . '.php';
}
