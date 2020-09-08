<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( is_admin() ) 
{
	$current_requested_page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
	// Fixed WooCommerce collision.
	if ( 'product_importer' === $current_requested_page ) {
		return;
	}
	// Load our TGM
	require_once get_template_directory() . '/installer/tgm/class-tgm-plugin-activation.php';

	// Load our plugin manager
	require_once get_template_directory() . '/installer/plugin-manager.php';

	// First load our bootstrap file.
	require_once get_template_directory() . '/installer/classes/class-installer.php';

	// Include after import set-up file
	require_once get_template_directory() . '/installer/classes/set-up.php';

	$bootstrap = new DSC\Installer\Bootstrap();

	// Register all WXR2Importer Dependencies.
	$bootstrap->register_dependencies();

	add_action( 'admin_init', array( $bootstrap, 'wpimportv2_init' ) );

	if ( is_admin() )
	{
		
		$current_page = filter_input( INPUT_GET, 'page', FILTER_SANITIZE_STRING );
		
		// Register the navigation menu (e.g. Appearance > Demo Installer).
		$bootstrap->register_admin_menu();

		// Only load other dependencies when we are in the installer page.
		if ( $bootstrap->menu_id === $current_page ) {
			// Check if the current user can manage options, in short, administrator.
			if ( current_user_can('manage_options') ) {
				// Load the widgets importer class.
				require_once get_template_directory() . '/installer/classes/widgets.php';
				// Load the customizer class.
				require_once get_template_directory() . '/installer/classes/customizer.php';
				// Register the request base actions.
				$bootstrap->register_installer_actions();
			}
		}

	}
}