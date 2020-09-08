<?php
namespace DSC\Installer;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Bootstrap {

	var $menu_id = 'dsc-demo-installer';

	public function register_dependencies() {

		if ( ! class_exists( 'WP_Importer' ) ) {
			defined( 'WP_LOAD_IMPORTERS' ) || define( 'WP_LOAD_IMPORTERS', true );
			require ABSPATH . '/wp-admin/includes/class-wp-importer.php';
		}

		require_once get_template_directory() . '/installer/classes/class-demo-config.php';
		require_once get_template_directory() . '/installer/classes/class-logger.php';
		require_once get_template_directory() . '/installer/classes/class-logger-cli.php';
		require_once get_template_directory() . '/installer/classes/class-logger-html.php';
		require_once get_template_directory() . '/installer/classes/class-logger-serversentevents.php';
		require_once get_template_directory() . '/installer/classes/class-wxr-importer.php';
		require_once get_template_directory() . '/installer/classes/class-wxr-import-info.php';
		require_once get_template_directory() . '/installer/classes/class-wxr-import-ui.php';

	}

	public function wpimportv2_init() 
	{
		
		$GLOBALS['wxr_importer'] = new \WXR_Import_UI();
		// Disable when on tools > import to prevent collision with WordPress importer.
		if ( !strpos($_SERVER['REQUEST_URI'], 'import.php') 
			&& !strpos($_SERVER['REQUEST_URI'], 'admin.php?import=wordpress')) {
			add_action( 'load-importer-wordpress', array( $GLOBALS['wxr_importer'], 'on_load' ) );
			add_action( 'wp_ajax_wxr-import', array( $GLOBALS['wxr_importer'], 'stream_import' ) );
		}
		
	}
	

	public function register_admin_menu()
	{
		add_action('admin_menu', array( $this, 'register_admin_menu_cb') );
	}

	public function register_admin_menu_cb() 
	{
		add_theme_page(
			esc_attr__('Theme Demo Installation', 'thrive-nouveau'), 
			esc_html__('Set-up Wizard','thrive-nouveau'), 
			'edit_theme_options', 
			$this->menu_id, 
			array( $this, 'register_installer_template')
		);
	}

	public function register_installer_template() 
	{
		include_once get_template_directory() . '/installer/views/index.php';
	}

	public function register_installer_actions() 
	{
		add_action('init', array( $this, 'register_installer_actions_cb') );
	}

	public function register_installer_actions_cb() 
	{

		$current_page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
		$current_action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

		if ( $current_page === $this->menu_id ) {
			if ( 'export' === $current_action ) {
				$widget = new \DSC\Widgets\WidgetImportExport();
				$widget->setHeaders();
				$widget->export();
				die();
			}
			if ( 'export-customizer' === $current_action ) {
				$customizer = new \DSC\Customizer\ImportExport();
				$customizer->setHeaders();
				$customizer->export();
				die();
			}
		}
		
	}
}