<?php
namespace DSC\Widgets;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class WidgetImportExport {

	var $demo_id = 'demo-1';

	public function __construct( $demo_id = 'demo-1' )
	{
		$this->demo_id = $demo_id;
	}

	public function export()
	{
		global $wpdb;
		
		// ----- Widget Settings
		$stmt_widgets_settings = $wpdb->prepare("SELECT option_name, option_value FROM $wpdb->options WHERE option_name LIKE '%s'", 
			'widget_%');
		
		$saved_widgets_settings = $wpdb->get_results($stmt_widgets_settings, ARRAY_A);
		$exported_widget_settings = array();
		$exported_sidebar_settings = array();

		// Unserialized the settings
		if ( ! empty( $saved_widgets_settings ) ) {

			foreach($saved_widgets_settings as $saved_widget_settings) {
				$saved_widget_settings['option_value'] = unserialize( $saved_widget_settings['option_value']  );
				$exported_widget_settings[] = $saved_widget_settings;
			}
			
		}

		// ----- Sidebar Widgets
		$stmt_sidebar_widgets = $wpdb->prepare("SELECT option_name, option_value FROM $wpdb->options WHERE option_name = '%s'", 
			'sidebars_widgets');

		$saved_sidebar_widgets = $wpdb->get_results($stmt_sidebar_widgets, ARRAY_A);
		
		if ( !empty( $saved_sidebar_widgets ) ) {
			foreach( $saved_sidebar_widgets as $saved_sidebar_widget ) {
				$saved_sidebar_widget['option_value'] = unserialize( $saved_sidebar_widget['option_value']);
				$exported_sidebar_settings[] = $saved_sidebar_widget;
			}
		}

		// -- Final Settings
		$widget_final_settings = array(
				'widgets' => $exported_widget_settings,
				'sidebars' => $exported_sidebar_settings 
			);	

		echo json_encode( $widget_final_settings );

		return;

	}

	public function import()
	{
		$widget_json_file = get_template_directory() . '/installer/demos/' . sanitize_title( $this->demo_id ) . '/widgets.json';
		
		if ( file_exists( $widget_json_file ) ) {
			
			if ( ! class_exists('WP_Filesystem_Direct')) {
				require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php';
				require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-direct.php';
			}

			$fs = new \WP_Filesystem_Direct( $args = array() );

			$json_file_contents = json_decode( $fs->get_contents( $widget_json_file ), true);
			
			$widgets = $json_file_contents['widgets'];
			$sidebar = $json_file_contents['sidebars'];

			if ( json_last_error() == JSON_ERROR_NONE ) {
				if ( ! empty( $widgets ) ) {
					echo '<h4>'.esc_html__('Updating Individual Widget Settings &hellip;', 'thrive-nouveau').'</h4>';
					echo '<ul>';
					foreach( $widgets as $widget ) {
						if ( update_option($widget['option_name'], $widget['option_value']) ) {
							printf('<li><span class="dashicons dashicons-yes"></span> %s', $widget['option_name'], esc_html__('Updating settings for <strong>%s</strong> ... [Done]</li>', 'thrive-nouveau'));	
						}
					}
					echo '<li><span class="dashicons dashicons-yes"></span> '.esc_html__('All Done &hellip;', 'thrive-nouveau').'</li>';
					echo '</ul>';
				}
				if ( ! empty( $sidebar ) ) {
					$sidebar = end($sidebar);
					echo '<h4>Updating Sidebars &hellip;</h4>';
					echo '<ul>';
						if ( update_option($sidebar['option_name'], $sidebar['option_value']) ) {
							echo '<li><span class="dashicons dashicons-yes"></span>'.esc_html__('Applying settings for all widget positions in sidebars... [Done]','thrive-nouveau').'</li>';	
						}
					echo '<li><span class="dashicons dashicons-yes"></span>'.esc_html__('All Done &hellip;','thrive-nouveau').'</li>';
					echo '</ul>';
				}
			}
		}
		
		return;

	}

	public function setHeaders()
	{
		header('Content-disposition: attachment; filename=widgets.json');
		header('Content-type: application/json');

		return;
	}
}