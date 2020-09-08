<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

Thrive_Kirki::add_section( 'thrive_misc', array(
    'title'          => esc_attr__( 'Miscellaneous', 'thrive-nouveau' ),
    'description'    => esc_attr__( 'Various types of settings.', 'thrive-nouveau'),
    'panel'          => 'thrive_customizer_panel', 
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

// FB Connect (enable/disable)
Thrive_Kirki::add_field( 'thrive_use_google_material_font_cdn', array(
    'type'        => 'select',
    'settings'    => 'thrive_use_google_material_font_cdn',
    'label'       => esc_attr__( 'Material Icon Fonts', 'thrive-nouveau' ),
    'section'     => 'thrive_misc',
    'description' => esc_attr__('You can use Google Font Material Icons CDN to serve your icons. Material icons by default are served using your own server (locally). The fonts are already included inside the theme.', 'thrive-nouveau'),
    'default'     => 'false',
    'priority'    => 10,
    'choices'     => array(
        'true'  => esc_attr__( 'Serve via Google Material CDN', 'thrive-nouveau' ),
        'false' => esc_attr__( 'Serve Locally', 'thrive-nouveau' ),
    ),
) );

