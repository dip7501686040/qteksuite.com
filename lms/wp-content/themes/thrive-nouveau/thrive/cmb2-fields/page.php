<?php
if ( ! defined( 'ABSPATH' ) ) { exit;
}

add_action( 'cmb2_admin_init', 'thrive_cmb2_pages' );

define( 'THRIVE_CBM2_PAGES_PREFIX', 'thrive_cmb2_pages_' );

function thrive_cmb2_get_option_name( $suffix ) {
	return THRIVE_CBM2_PAGES_PREFIX . $suffix;
}

function thrive_cmb2_get_supported_post_types() {

	$post_types = get_post_types();

	// Remove support for blog.
	$disabled_on = apply_filters( 'thrive-cmb2-pages-disabled', array( 'post', 'tribe_events', 'tribe_venue', 'tribe_organizer' ) );

	foreach ( $disabled_on as $key ):
		unset ( $post_types[$key] );
	endforeach;

	return array_keys( $post_types );
}

function thrive_cmb2_pages() {

	$prefix = THRIVE_CBM2_PAGES_PREFIX;
	$customizer_prefix = 'thrive_customizer_page_';


	/**
	 * Initiate the page layout metabox
	 */
	$page_layout = new_cmb2_box( array(
		'id'            => 'thrive_metabox_page_layout',
		'title'         => __( 'Thrive: Page Layout', 'thrive-nouveau' ),
		'object_types'  => thrive_cmb2_get_supported_post_types(),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	) );

	// Page Layout.
	$customizer_selected_layout = get_theme_mod('thrive_layouts_customize', '2_columns');
	$customizer_selected_layout = str_replace('_', '-', $customizer_selected_layout);

	$page_layout->add_field( array(
		'name'       => __( 'Page Layout', 'thrive-nouveau' ),
		'desc'       => __( 'Select a layout for this page', 'thrive-nouveau' ),
		'id'         => thrive_cmb2_get_option_name( 'page_layout' ),
		'type'       => 'select',
		'default'    => $customizer_selected_layout,
		'options'	=> array(
				'1-column' => __('1 Column', 'thrive-nouveau'),
				'2-columns' => __('2 Columns', 'thrive-nouveau'),
			),
	) );

	// ====== // ====== // ===== // ====== // ====== // ====== // ===== // ===== // ==== //
	/**
	 * Initiate the page title style metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'thrive_metabox_page',
		'title'         => __( 'Thrive: Page Title Style', 'thrive-nouveau' ),
		'object_types'  => thrive_cmb2_get_supported_post_types(),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	) );

	

	// Title field
	$cmb->add_field( array(
		'name'       => __( 'Title Color', 'thrive-nouveau' ),
		'desc'       => __( 'Select a color for the title of this page', 'thrive-nouveau' ),
		'id'         => thrive_cmb2_get_option_name( 'color_title' ),
		'type'       => 'colorpicker',
		'default'    => get_theme_mod( $customizer_prefix . 'title_color', '#212121' ),
	) );

	// Text Alignment
	$cmb->add_field( array(
		'name' 	=> __( 'Text Alignment', 'thrive-nouveau' ),
		'id'   	=> thrive_cmb2_get_option_name( 'textalignment' ),
		'type'	=> 'radio',
		'default' => get_theme_mod( $customizer_prefix . 'text_alignment', 'left' ),
		'options'  => array(
			'left' 		=> __( 'Left', 'thrive-nouveau' ),
			'right'   	=> __( 'Right', 'thrive-nouveau' ),
			'center'    => __( 'Center', 'thrive-nouveau' ),
		),
		'desc' => __( 'Choose the text alignment for the title and subtitle', 'thrive-nouveau' ),
	) );

	// Sub Title Field.
	$cmb->add_field( array(
		'name'       => __( 'Secondary Title', 'thrive-nouveau' ),
		'desc'       => __( 'Add a secondary title below the main title of the page. Could be any text.', 'thrive-nouveau' ),
		'id'         => thrive_cmb2_get_option_name( 'subtitle' ),
		'type'       => 'textarea_small',
		'default'    => get_theme_mod( $customizer_prefix . 'secondary_title', '' ),
	));
	// Sub Title Color Field.
	$cmb->add_field( array(
		'name'       => __( 'Secondary Title Color', 'thrive-nouveau' ),
		'desc'       => __( 'Select a color for the subtitle of this page', 'thrive-nouveau' ),
		'id'         => thrive_cmb2_get_option_name( 'color_subtitle' ),
		'type'       => 'colorpicker',
		'default'    => get_theme_mod( $customizer_prefix . 'secondary_title_color', '#212121' ),
	) );

	$default_background = get_theme_mod( $customizer_prefix . 'background_settings' );

	/**
	 * Background Color Overlay
	 */
	$cmb->add_field( array(
		'name'       => __( 'Background Color', 'thrive-nouveau' ),
		'desc'       => __( 'Select a background color for this page', 'thrive-nouveau' ),
		'id'         => thrive_cmb2_get_option_name( 'background_overlay' ),
		'type'       => 'colorpicker',
		'default'    => isset( $default_background['background-color'] ) ? $default_background['background-color']:  'rgba(255,255,255,0.50)',
		'options' => array(
			'alpha' => true,
		),
	) );

	/**
	 * Background Image
	 */
	$cmb->add_field( array(
		'name'    => __( 'Background Image', 'thrive-nouveau' ),
		'desc'    => 'Upload a background image for the title.',
		'id'      => thrive_cmb2_get_option_name( 'background_image' ),
		'type'    => 'file',
		'options' => array( 'url' => true ),
		'default' => isset( $default_background['background-image'] ) ? $default_background['background-image']:  '',
		'text'    => array(
			'add_upload_file_text' => 'Add File',// Change upload button text. Default: "Add or Upload File"
		),
		// query_args are passed to wp.media's library query.
		'query_args' => array( 'type' => array( 'image/gif', 'image/jpeg', 'image/png' ) ),
		'preview_size' => 'large', // Image size to use when previewing in the admin.
	) );

	/**
	 * Background Image Alignment
	 */
	$cmb->add_field( array(
		'name'       => __( 'Background Image Position', 'thrive-nouveau' ),
		'desc'       => __( 'Select the background position of the title for this page', 'thrive-nouveau' ),
		'id'         => thrive_cmb2_get_option_name( 'background_position' ),
		'type'       => 'select',
		'default'    => isset( $default_background['background-position'] ) ? $default_background['background-position']:  'center center',
		'options'    => array(
			'left top'		=> __( 'Left Top', 'thrive-nouveau' ),
			'left center'   => __( 'Left Center', 'thrive-nouveau' ),
			'left bottom'   => __( 'Left Bottom', 'thrive-nouveau' ),
			'right top'     => __( 'Right Top', 'thrive-nouveau' ),
			'right center'  => __( 'Right Center', 'thrive-nouveau' ),
			'right bottom'  => __( 'Right Bottom', 'thrive-nouveau' ),
			'center top'    => __( 'Center Top', 'thrive-nouveau' ),
			'center center'	=> __( 'Center Center', 'thrive-nouveau' ),
			'center bottom' => __( 'Center bottom', 'thrive-nouveau' ),
		),
	) );

	/**
	 * Background Size
	 */
	$cmb->add_field( array(
		'name'       => __( 'Background Image Size', 'thrive-nouveau' ),
		'desc'       => __( 'Select the background size', 'thrive-nouveau' ),
		'id'         => thrive_cmb2_get_option_name( 'background_size' ),
		'type'       => 'select',
		'default'    => isset( $default_background['background-size'] ) ? $default_background['background-size']:  'auto',
		'options'    => array(
			'auto'		=> __( 'Auto', 'thrive-nouveau' ),
			'cover'   	=> __( 'Cover', 'thrive-nouveau' ),
			'contain'   => __( 'Contain', 'thrive-nouveau' ),
		),
	) );
	/**
	 * Background Repeat
	 */
	$cmb->add_field( array(
		'name'       => __( 'Background Image Repeat', 'thrive-nouveau' ),
		'desc'       => __( 'Select the background repeat', 'thrive-nouveau' ),
		'id'         => thrive_cmb2_get_option_name( 'background_repeat' ),
		'type'       => 'select',
		'default'    => isset( $default_background['background-repeat'] ) ? $default_background['background-repeat']:  'auto',
		'options'    => array(
			'repeat'		=> __( 'Repeat All', 'thrive-nouveau' ),
			'repeat-x'   	=> __( 'Repeat Horizontally', 'thrive-nouveau' ),
			'repeat-y'   	=> __( 'Repeat Vertically', 'thrive-nouveau' ),
			'no-repeat'   	=> __( 'No Repeat', 'thrive-nouveau' ),
		),
	) );

	/**
	 * Disable page header.
	 */
	$cmb->add_field( array(
		'name'       => __( 'Enable/Disable Page Title', 'thrive-nouveau' ),
		'desc'       => __( 'Hide the page title completely. This options does not completely disable the title in the HTML markup of this page but somewhat hides it using display property in CSS.', 'thrive-nouveau' ),
		'id'         => thrive_cmb2_get_option_name( 'disable_page_header' ),
		'type'       => 'radio',
		'default'    => 'block',
		'options'    => array(
			'block'		=> __( 'Enabled', 'thrive-nouveau' ),
			'none'   	=> __( 'Disabled', 'thrive-nouveau' ),
		),
	) );
	
	return;

}

add_action( 'wp_enqueue_scripts', 'thrive_page_add_meta_css' );

function thrive_get_meta_css() {
	ob_start();
	include_once get_template_directory() . '/thrive/cmb2-fields/page-meta.css.php';
	$output = ob_get_clean();
	return trim( str_replace( array( "\r", "\n", "\t" ),'', $output ) );
}

function thrive_page_add_meta_css() {
	$custom_css = thrive_get_meta_css();
	if ( is_singular( thrive_cmb2_get_supported_post_types() ) ) {
		wp_add_inline_style( 'thrive-style', $custom_css );
	}
	// WooCommerce Support.
	if ( function_exists( 'is_shop' ) ) {
		if ( is_shop() ) {
			wp_add_inline_style( 'thrive-style', $custom_css );		
		}
	}
}

function thrive_cmb2_pages_meta( $suffix ) {
	
	$id = get_the_ID();
	
	// BuddyPress Integration.
	if ( function_exists( 'is_buddypress' ) ) {
		if ( is_buddypress() ) {
			$id = bp_get_current_component_page_id();
		}
	}
	
	// WooCommerce Integration.
	if ( function_exists( 'is_shop') ) {
		if ( is_shop() ) {
			$id = absint( get_option( 'woocommerce_shop_page_id' ) );
		}
	}

	return get_post_meta( $id, thrive_cmb2_get_option_name( $suffix ), true );
	
}


add_action('body_class', 'thrive_meta_page_layout');

function thrive_meta_page_layout($classes) {
	if ( is_singular() ) {
		$layout = get_post_meta( get_queried_object_id(), thrive_cmb2_get_option_name( 'page_layout' ), true );
		$classes[] = sprintf( 'thrive-meta-layout-%d', $layout);
	}
	return $classes;
}

add_filter('thrive-document-wrapper', 'thrive_meta_page_layout_document_wrapper');

function thrive_meta_page_layout_document_wrapper( $classes ){
	
	if ( is_singular() ) {
		$layout = get_post_meta( get_queried_object_id(), thrive_cmb2_get_option_name( 'page_layout' ), true );
		if ( '1-column' == $layout ) {
			$classes .= ' active';
		}
	}
	return $classes;
}
