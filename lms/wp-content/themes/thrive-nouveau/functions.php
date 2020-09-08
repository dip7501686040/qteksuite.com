<?php
/**
 * Dunhakdis functions and definitions
 *
 * @package thrive
 */
if ( ! defined('ABSPATH') ) exit;

define( 'THRIVE_THEME_VERSION', '3.1.1' );

if ( ! function_exists( 'thrive_init' ) ) :

	function thrive_init() {

		// Add styling to the default editor
		add_editor_style( get_template_directory_uri() . '/css/editor-style.css' );
	}

	add_action( 'init', 'thrive_init' );

endif;

if ( ! function_exists( 'thrive_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function thrive_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on thrive, use a find and replace
		 * to change 'thrive-nouveau' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'thrive-nouveau', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Use nouveau
		add_theme_support( 'buddypress-use-nouveau' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/**
		 * Add Image Size
		 */
		 add_image_size( 'thrive-thumbnail', 590, 250, true );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		// add_theme_support( 'post-formats', array() );
		// add_theme_support( 'custom-header', $args = array() );
		// add_theme_support( 'custom-background', $args = array() );
	}

	if ( function_exists( 'bp_is_active' ) ) {
		if ( bp_is_active( 'activity' ) ) {
			define( 'BP_DEFAULT_COMPONENT', 'activity' );
		}
	}

	/**
	 * Support WooCommerce
	 */
	add_action( 'after_setup_theme', 'woocommerce_support' );

	function woocommerce_support() {
	    /**
	     * Support WooCommerce.
	     */
	    add_theme_support( 'woocommerce' );
	    /**
	     * Add support for woocommerce zoom
	     */
	    add_theme_support( 'wc-product-gallery-zoom' );
	    /**
	     * Add support for woocommerce lightbox
	     */
	    add_theme_support( 'wc-product-gallery-lightbox' );
	    /**
	     * Add support for woocommerce slider
	     */
	    add_theme_support( 'wc-product-gallery-slider' );
	}

endif; // End function thrive_setup.

add_action( 'after_setup_theme', 'thrive_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function thrive_content_width() {

	$GLOBALS['content_width'] = apply_filters( 'thrive_content_width', 750 );

}

add_action( 'after_setup_theme', 'thrive_content_width', 0 );

if ( ! isset( $content_width ) ) {
	$content_width = 850;
}

/**
 * Register Google Fonts
 *
 * @return  string The url of the google font.
 */
function thrive_google_fonts_url() {

	$font_url = '';

	$font_code = apply_filters( 'thrive_google_font', 'Roboto:300,400,500,700,400italic,500italic,700italic,300italic|Noto+Serif:400,400i,700' );
	/*
     Translators: If there are characters in your language that are not supported
     by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
	if ( 'off' !== _x( 'on', 'Google font: on or off', 'thrive-nouveau' ) ) {

		$font_url = add_query_arg( 'family', $font_code, '//fonts.googleapis.com/css' );

	}

	return $font_url;
}

/**
 * Check if user enable RTL option inside WordPress Customizer
 *
 * @return boolean True if user enabled RTL. Otherwise, false.
 */
function thrive_is_rtl() {

	// @todo: Create rtl option inside customizer
	// $rtl_option = get_theme_mod('rtl_option');
	$rtl_option = get_theme_mod( 'thrive_layouts_rtl', 'no' );

	if ( 'yes' === $rtl_option ) {

		return true;

	}

	return false;

}

/**
 * Enqueue scripts and styles.
 */
function thrive_scripts() {

	// --- START CSS STYLESHEETS ---//
	wp_enqueue_style( 'thrive-google-font', thrive_google_fonts_url(), array(), THRIVE_THEME_VERSION );
	
	if ( thrive_use_google_material_font_cdn() ):
		wp_enqueue_style('thrive-material-font-cdn', 'https://fonts.googleapis.com/icon?family=Material+Icons', 
			array(), THRIVE_THEME_VERSION);
	else:
		wp_enqueue_style( 'thrive-material-font', get_template_directory_uri() . '/css/material-fonts.css', 
			array(), THRIVE_THEME_VERSION );
	endif;

	wp_enqueue_style( 'thrive-bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array( 'thrive-google-font' ), THRIVE_THEME_VERSION );

	// Add theme support for LearnDash LMS.
	if ( in_array( 'sfwd-lms/sfwd_lms.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

		wp_enqueue_style( 'thrive-learndash-style', get_template_directory_uri() . '/css/learndash.css', array(), THRIVE_THEME_VERSION );
		wp_dequeue_style( 'wpProQuiz_front_style' );

	}

	wp_enqueue_style( 'thrive-style', get_stylesheet_uri(), array( 'thrive-bootstrap' ), THRIVE_THEME_VERSION );

	// RTL
	if ( thrive_is_rtl() ) {
		wp_enqueue_style( 'bootstrap-rtl', '//cdn.rawgit.com/morteza/bootstrap-rtl/master/dist/css/bootstrap-rtl.min.css',
		array( 'thrive-bootstrap-rtl' ), THRIVE_THEME_VERSION );
		wp_enqueue_style( 'thrive-rtl', get_template_directory_uri() . '/rtl.css', array( 'thrive-style' ), THRIVE_THEME_VERSION );
	}
	// Check if BuddyPress Media is active.
	if ( in_array( 'buddypress-media/index.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		wp_enqueue_style( 'thrive-buddyress-media', get_template_directory_uri() . '/css/buddypress-media.css', array(), THRIVE_THEME_VERSION );
	}
	// Magnific popup css on single pages.
	if ( is_singular() ) {
		wp_enqueue_style( 'magnific-popup-css', get_template_directory_uri() . '/css/magnific-popup.css', array(), THRIVE_THEME_VERSION );
	}

	// --- END CSS STYLESHEETS ---//
	wp_enqueue_script( 'thrive-navigation', get_template_directory_uri() . '/js/navigation.js', array(), THRIVE_THEME_VERSION, true );
	wp_enqueue_script( 'thrive-jquery-plugins', get_template_directory_uri() . '/js/jquery-plugins.js', array( 'jquery' ), THRIVE_THEME_VERSION, true );

	// Magnific popup js on single pages.
	if ( is_singular() ) {
		wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/magnific-popup.js', 
			array('jquery'), THRIVE_THEME_VERSION, false );
	}

	// Drag and drop dashboard page.
	$is_dashboard = is_page_template( 'page-templates/dashboard.php' );
	// Disable the drag and drop functionality in the meantime
	$is_dashboard = false;
	if ( $is_dashboard ) {
		wp_enqueue_script( 'thrive-packery', get_template_directory_uri() . '/js/packery.min.js', array(), THRIVE_THEME_VERSION, true );
		wp_enqueue_script( 'thrive-dashboard-drag-drop', get_template_directory_uri() . '/js/thrive-dashboard.js', array( 'jquery' ) );
		wp_localize_script( 'thrive-dashboard-drag-drop', 'thrive_dashboard_widgets',  array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'user_widgets_position' => get_user_meta( get_current_user_id(), 'thrive_user_dashboard_widget_position_packery' ),

		));
	}
	// Drag and drop dashboard page end.
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), THRIVE_THEME_VERSION, true );

	wp_enqueue_script( 'thrive-script', get_template_directory_uri() . '/js/thrive.js', array(), THRIVE_THEME_VERSION, true );

	wp_enqueue_script( 'thrive-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), THRIVE_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	return;

}

/**
 * Check if the user prefers the material fonts to be loaded via CDN.
 * @return boolean Returns true if font is loaded via CDN otherwise, false.
 */
function thrive_use_google_material_font_cdn() 
{
	// Check the value in customizer.
	$use_cdn = get_theme_mod( 'thrive_use_google_material_font_cdn', false );
	
	// Theme mod actually contains string instead of bool.
	if ( "true" === $use_cdn ) {
		return true;
	}

	return false;

}

/**
 * Remove the BP legacy CSS loaded by RTMedia.
 */
function thrive_remove_rtmedia_bp_legacy_css() {
	wp_dequeue_style( 'bp-neavuaue-stylesheet-theme' );
	wp_dequeue_style( 'bp-neavuaue-stylesheet-buddypress' );
}

add_action( 'wp_print_styles', 'thrive_remove_rtmedia_bp_legacy_css', 100 );

add_action( 'wp_enqueue_scripts', 'thrive_scripts' );
/**
 * Disable BuddyPress Cover Photo
 */
add_filter( 'bp_is_profile_cover_image_active', '__return_false' );
add_filter( 'bp_is_groups_cover_image_active', '__return_false' );

/**
 * Require the menu
 */
require get_template_directory() . '/thrive/thrive.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load WooCommerce compatability file.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Option Tree Settings.
 */
if ( class_exists( 'Gears' ) ) {

	add_filter( 'ot_theme_options_page_title', 'thrive_options_page_title' );

	function thrive_options_page_title() {
		return __( 'Social Connect ', 'thrive-nouveau' ); }

	add_filter( 'ot_theme_options_menu_title', 'thrive_options_menu_title' );

	function thrive_options_menu_title() {
		return __( 'Social Connect ', 'thrive-nouveau' ); }

	add_filter( 'ot_header_version_text', 'thrive_ot_header_version_text' );

	function thrive_ot_header_version_text() {
		return __( 'Thrive Social Connect ', 'thrive-nouveau' ) . THRIVE_THEME_VERSION;
	};

	add_filter( 'gears_widget_recent_posts_is_enabled', '__return_true' );
	add_filter( 'gears_widget_social_media_link_is_enabled', '__return_true' );
	add_filter( 'gears_counters_enabled', '__return_true' );

}

/**
 * WP Login CSS.
 */
require_once get_template_directory() . '/inc/wp-login-css.php';

/**
 * Include the CMB2
 */

require_once get_template_directory() . '/thrive/cmb2/init.php';
require_once get_template_directory() . '/thrive/cmb2-fields/page.php';
require_once get_template_directory() . '/thrive/cmb2-fields/terms.php';

/**
 * BuddyPress theme functions.
 */
require_once get_template_directory() . '/inc/bp-functions/thrive-bp-messages.php';
require_once get_template_directory() . '/inc/bp-functions/thrive-bp-notifications.php';
require_once get_template_directory() . '/inc/bp-functions/thrive-bp-hooks.php';


/**
 * Include Kirky
 */
require_once get_template_directory() . '/customizer/include-kirky.php';

/**
 * Include Thrive Class
 */
require_once get_template_directory() . '/customizer/class-thrive-kirky.php';

/**
 * Include Customizer Bootstrap
 */
require_once get_template_directory() . '/customizer/customizer.php';

/**
 * Include the theme welcome page.
 */
require_once get_template_directory() . '/inc/theme-welcome.php';

/**
 * Include the nav walker for bootstrap
 */
require_once get_template_directory() . '/inc/bootstrap-nav-walker.php';

/**
 * Include the installer
 */
require_once get_template_directory() . '/installer/bootstrap.php';

/**
 * Include the config file
 */
require_once get_template_directory() . '/installer/import-config.php';
