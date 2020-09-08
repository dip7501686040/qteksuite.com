<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

Thrive_Kirki::add_section( 'thrive_social_login', array(
    'title'          => esc_attr__( 'Social Connect', 'thrive-nouveau' ),
    'description'    => esc_attr__( 'All customizations related to Social Logins. Social Login requires PHP 5.4+ version with PHP Curl enabled. Gears plugin must be installed and enabled.', 'thrive-nouveau'),
    'panel'          => 'thrive_customizer_panel', 
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

// FB Connect (enable/disable)
Thrive_Kirki::add_field( 'enable_facebook_connect', array(
    'type'        => 'select',
    'settings'    => 'enable_facebook_connect',
    'label'       => esc_attr__( 'Enable Facebook Connect', 'thrive-nouveau' ),
    'section'     => 'thrive_social_login',
    'description' => esc_attr__('Toggle to disable or enable user login using Facebook Account. You need to create a new Facebook App and then enter the App ID and App Secret in the associated fields below. ', 'thrive-nouveau'),
    'default'     => 'disable',
    'priority'    => 10,
    'choices'     => array(
        'enable'  => esc_attr__( 'Enabled', 'thrive-nouveau' ),
        'disable' => esc_attr__( 'Disabled', 'thrive-nouveau' ),
    ),
) );

// FB Api ID
Thrive_Kirki::add_field( 'facebook_api_id', array(
    'type'     => 'text',
    'settings' => 'facebook_api_id',
    'label'    => esc_attr__( 'Facebook App ID', 'thrive-nouveau' ),
    'description' => sprintf( esc_attr__( 'Click %s to learn on how to get your FB App ID.', 'thrive-nouveau'), '<a href="https://dunhakdis.com/setting-up-facebook-connect" target="__blank"><u>here</u></a>' ),
    'section'  => 'thrive_social_login',
    'default'  => esc_attr__( '40121904-{Get Your Own)', 'thrive-nouveau' ),
    'transport'   => 'postMessage',
    'priority' => 10,
    'active_callback'  => array(
        array(
            'setting'  => 'enable_facebook_connect',
            'operator' => '==',
            'value'    => 'enable',
            )
        ),
) );

// FB Api Secret
Thrive_Kirki::add_field( 'facebook_api_secret', array(
    'type'     => 'text',
    'settings' => 'facebook_api_secret',
    'label'    => esc_attr__( 'Facebook App Secret', 'thrive-nouveau' ),
    'description' => sprintf( esc_attr__( 'Click %s to learn on how to get your FB Secret.', 'thrive-nouveau'), '<a href="https://dunhakdis.com/setting-up-facebook-connect" target="__blank"><u>here</u></a>' ),
    'section'  => 'thrive_social_login',
    'default'  => esc_attr__( '6911f0e323b-(Get Your Own)', 'thrive-nouveau' ),
    'transport'   => 'postMessage',
    'priority' => 10,
    'active_callback'  => array(
        array(
            'setting'  => 'enable_facebook_connect',
            'operator' => '==',
            'value'    => 'enable',
            )
        ),
) );


/**
 * Google Connect
 */
// Google Connect (enable/disable)
Thrive_Kirki::add_field( 'enable_google_connect', array(
    'type'        => 'select',
    'settings'    => 'enable_google_connect',
    'label'       => esc_attr__( 'Enable Google Connect', 'thrive-nouveau' ),
    'description' => esc_attr__('Toggle to disable or enable user login using Google Account. You need to create a new Google App and then enter the 
    Client ID and the Client Secret in the associated fields below. ', 'thrive-nouveau'),
    'section'     => 'thrive_social_login',
    'default'     => 'disable',
    'priority'    => 10,
    'choices'     => array(
        'enable'  => esc_attr__( 'Enabled', 'thrive-nouveau' ),
        'disable' => esc_attr__( 'Disabled', 'thrive-nouveau' ),
    ),
) );

// Google Api ID
Thrive_Kirki::add_field( 'google_api_id', array(
    'type'     => 'text',
    'settings' => 'google_api_id',
    'label'    => esc_attr__( 'Google Client ID', 'thrive-nouveau' ),
    'section'  => 'thrive_social_login',
    'description' => sprintf( esc_attr__( '%s to learn on how to get your Google Client ID.', 'thrive-nouveau'), '<a href="https://dunhakdis.com/setting-up-google-connect" target="__blank"><u>Click here</u></a>' ),
    'default'  => esc_attr__( '1029578692451-(Get Your Own)', 'thrive-nouveau' ),
    'priority' => 10,
    'transport'   => 'postMessage',
    'active_callback'  => array(
        array(
            'setting'  => 'enable_google_connect',
            'operator' => '==',
            'value'    => 'enable',
            )
        ),
) );

// Google Api Secret
Thrive_Kirki::add_field( 'google_api_secret', array(
    'type'     => 'text',
    'settings' => 'google_api_secret',
    'label'    => esc_attr__( 'Google Client Secret', 'thrive-nouveau' ),
    'description' => sprintf( esc_attr__( '%s to learn on how to get your Google Client Secret.', 'thrive-nouveau'), '<a href="https://dunhakdis.com/setting-up-google-connect" target="__blank"><u>Click here</u></a>' ),
    'section'  => 'thrive_social_login',
    'default'  => esc_attr__( 'zWHSTEQvTwU-(Get Your Own)', 'thrive-nouveau' ),
    'priority' => 10,
    'transport'   => 'postMessage',
    'active_callback'  => array(
        array(
            'setting'  => 'enable_google_connect',
            'operator' => '==',
            'value'    => 'enable',
            )
        ),
) );


Thrive_Kirki::add_field( 'google_api_redirect_instruction', array(
    'type'        => 'custom',
    'settings'    => 'google_api_redirect_instruction',
    'description' => esc_attr__('Important: Add the following URL in your Google Developer Console "Authorized redirect URIs"', 'thrive-nouveau'),
    'label'       => esc_attr__( 'Authorized Redirect URIs', 'thrive-nouveau' ),
    'section'     => 'thrive_social_login',
    'default'     => '<div style="padding: 15px;background-color: #f6f8f9; color: #777; border-color: #eee;border-radius: 4px;">' 
                    . admin_url( "admin-ajax.php?action=clientConnectionInit" ) . '</div>',
    'priority'    => 10,
    'active_callback'  => array(
        array(
            'setting'  => 'enable_google_connect',
            'operator' => '==',
            'value'    => 'enable',
            )
        ),
) );

/**
 * Google Social Connect
 */
function thrive_customizer_register_google_api_id() { return get_theme_mod('google_api_id', ''); }
function thrive_customizer_register_google_api_secret() { return get_theme_mod('google_api_secret', ''); }
function thrive_customizer_register_google_is_enabled() { 
    $is_enabled = get_theme_mod('enable_google_connect', false); 
    $is_enabled = get_theme_mod('enable_google_connect', 'disable');
    if ( 'enable' === $is_enabled ) {
        return true;
    }
    return false; 
}

add_filter('gears_g+_app_id', 'thrive_customizer_register_google_api_id');
add_filter('gears_g+_app_secret', 'thrive_customizer_register_google_api_secret');
add_filter('gears_g+_api_enabled', 'thrive_customizer_register_google_is_enabled');

/**
 * Facebook Social Connect
 */
function thrive_customizer_register_fb_api_id() { return get_theme_mod('facebook_api_id', ''); }
function thrive_customizer_register_fb_api_secret() { return get_theme_mod('facebook_api_secret', ''); }
function thrive_customizer_register_fb_is_enabled() { 
    $is_enabled = get_theme_mod('enable_facebook_connect', 'disable');
    if ( 'enable' === $is_enabled ) {
        return true;
    }
    return false; 
}

add_filter('gears_fb_app_id', 'thrive_customizer_register_fb_api_id');
add_filter('gears_fb_app_secret', 'thrive_customizer_register_fb_api_secret');
add_filter('gears_is_fb_enabled', 'thrive_customizer_register_fb_is_enabled');
