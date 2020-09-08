<?php
add_action('import_end', 'thrive_import_end_setup');

function thrive_import_end_setup() 
{

	$demo_import_settings = thrive_demo_import_settings();
	$selected_demo = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	$callback = $demo_import_settings['demo-'.$selected_demo]['after_import_setup'];

	if (!empty($callback)) {
		if (function_exists($callback)) {
			call_user_func($callback);
		}
	}
	return;
}
/**
 * Intranet/Extranet Import Set-up
 */
function thrive_intranet_demo_import() {

	// Homepage
	$homepage_post = get_page_by_path('dashboard', OBJECT, 'page');
	
	// Reading Settings
	update_option('show_on_front', 'page');
	update_option('page_on_front', $homepage_post->ID);
	
	// Menu Settings
	$menu_settings = array(
		'primary' => thrive_get_navigation_id('Header'),
		'secondary' => thrive_get_navigation_id('Sidenav'),
		'topbarmenu' => thrive_get_navigation_id('Top Right Menu')
	);

	set_theme_mod("nav_menu_locations", $menu_settings);

	return;
}
/**
 * Community Demo After Import Set-up
 * 
 * @return void
 */
function thrive_community_demo_import() 
{
	// Homepage
	$homepage_post = get_page_by_path('thrive-community-demo-home', OBJECT, 'page');
	
	// Reading Settings
	update_option('show_on_front', 'page');
	update_option('page_on_front', $homepage_post->ID);
	
	thrive_import_slider('home-slider');

	// Menu Settings
	$menu_settings = array(
		'primary' => thrive_get_navigation_id('Main Menu'),
		'secondary' => thrive_get_navigation_id('Main Menu'),
		'topbarmenu' => thrive_get_navigation_id('Top bar')
	);

	set_theme_mod("nav_menu_locations", $menu_settings);

	return;
}

/**
 * Elearning After Import Set-up
 * 
 * @return void
 */
function thrive_elearning_demo_after_import() {

	// Set Homepage
	$homepage_post = get_page_by_path('landing', OBJECT, 'page');
	
	// Reading Settings
	update_option('show_on_front', 'page');
	update_option('page_on_front', $homepage_post->ID);
	
	thrive_import_slider('elearning-slider');

	// Menu Settings
	$menu_settings = array(
		'primary' => thrive_get_navigation_id('Primary Menu'),
		'secondary' => thrive_get_navigation_id('Secondary Menu'),
		'topbarmenu' => thrive_get_navigation_id('Top Menu')
	);

	set_theme_mod("nav_menu_locations", $menu_settings);

	return;
}

/**
 * Social Media After Import
 */
function thrive_social_media_demo_after_import() {
	// Set Homepage
	$homepage_post = get_page_by_path('activity-2', OBJECT, 'page');
	
	// Reading Settings
	update_option('show_on_front', 'page');
	update_option('page_on_front', $homepage_post->ID);
	
	// Menu Settings
	$menu_settings = array(
		'primary' => thrive_get_navigation_id('Sample Menus'),
		'secondary' => thrive_get_navigation_id('Side Navigation'),
		'topbarmenu' => thrive_get_navigation_id('BuddyPress')
	);

	// Set BuddyPress Pages
	set_theme_mod("nav_menu_locations", $menu_settings);
	
	// Get current bp options.
	$bp_pages = get_option('bp-pages');
	$bp_pages['activity'] = $homepage_post->ID;
	
	// Update the option.
	update_option('bp-pages', $bp_pages);

	return;
}


function thrive_import_slider( $slider = '' ) 
{
    if ( empty ( $slider ) )  return;
    $thrive_demo_slider = get_template_directory() . "/demo/" . $slider . ".zip";
    if ( file_exists( $thrive_demo_slider ) ) {
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        if ( class_exists( 'RevSlider' ) ) {
            $rev_slider = new RevSlider();
            $rev_slider->importSliderFromPost( true, true, $thrive_demo_slider );
        }
    }
    return;
}
