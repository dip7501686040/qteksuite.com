<?php
if ( ! defined('ABSPATH') ) exit;

add_action( 'cmb2_admin_init', 'thrive_cmb2_terms' );

function thrive_cmb2_terms() {
	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'thrive_metabox_terms',
		'title'         => __( 'Thrive: Terms Title Style', 'thrive-nouveau' ),
		'object_types'  => array('term'),
		'taxonomies'    => array_values(get_taxonomies(array(), 'names')),
	) );


	// Term Layout.
	$cmb->add_field( array(
		'name' 	=> __( 'Thrive: Term Layout', 'thrive-nouveau' ),
		'id'   	=>  'thrive-term-layout',
		'type'	=> 'select',
		'default' => get_theme_mod('thrive_customizer_terms_layout', 'content-sidebar'),
		'options'  => array(
			'content-sidebar' 		=> __( 'Content / Sidebar Right', 'thrive-nouveau' ),
			'sidebar-content'   	=> __( 'Sidebar Left / Content', 'thrive-nouveau' ),
			'full-content'    => __( 'Full Content / No Sidebars', 'thrive-nouveau' ),
		),
		'desc' => __( 'Select the layout for this term', 'thrive-nouveau' ),
	) );

}