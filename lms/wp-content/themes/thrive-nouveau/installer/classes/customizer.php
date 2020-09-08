<?php
namespace DSC\Customizer;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class ImportExport {

	var $demo_id = 'demo-1';

	public function __construct( $demo_id = 'demo-1' ) {
		$this->demo_id = $demo_id;
	}

	public function import() {
		
		$current_theme_mod = trim( sprintf( 'theme_mods_%s', wp_get_theme()->get_stylesheet() ) );

		echo '<h4>'.esc_html__('Importing Customizer Settings &hellip;', 'thrive-nouveau').'</h4>';

		$customizer_json_file = get_template_directory() . '/installer/demos/' . sanitize_title( $this->demo_id ) . '/customizer.json';

		if ( file_exists( $customizer_json_file ) ) {
			
			if ( ! class_exists('WP_Filesystem_Direct')) {
				require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php';
				require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-direct.php';
			}

			$fs = new \WP_Filesystem_Direct( $args = array() );

			$json_file_contents = json_decode( $fs->get_contents( $customizer_json_file ), true);

			if ( json_last_error() == JSON_ERROR_NONE ) {
				echo '<ul>';
				if ( update_option( $current_theme_mod, $json_file_contents ) ) {
					echo '<li><span class="dashicons dashicons-yes"></span> ' . esc_html__('Customizer Settings Applied &hellip;', 'thrive-nouveau').' </li>';
				}
				echo '<li><span class="dashicons dashicons-yes"></span> '. esc_html__('All Done &hellip;', 'thrive-nouveau') .'</li>';
				echo '</ul>';
			}

		}

		return;

	}	
	
	public function export() {

		global $wpdb;

		$current_theme_mod = trim( sprintf( 'theme_mods_%s', wp_get_theme()->get_stylesheet() ) );
		
		echo json_encode( get_option( $current_theme_mod ) );

		return;
	}

	public function setHeaders()
	{
		header('Content-disposition: attachment; filename=customizer.json');
		header('Content-type: application/json');
		return;
	}
}