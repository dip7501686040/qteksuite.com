<?php
/**
 * Search for active plugins in the db inside wp_options table column 'active_plugins'
 *
 * Sample Usage: thrive_installer_get_active_plugins()
 * 
 * @since 	1.0,0
 * @return 	array The list of active plugins.
 */
function thrive_installer_get_active_plugins() {
	$active_plugins = (array) get_option( 'active_plugins', array() );
	$active_plugins_slug = array();
	if ( !empty ( $active_plugins)) {
		foreach( $active_plugins as $active_plugin) {
			$split_by_backslash = explode('/', $active_plugin);
			$active_plugins_slug[] = $split_by_backslash[0];
		}
	}
	if ( is_multisite() ) {
		$ms_plugins = (array)get_site_option( 'active_sitewide_plugins');
		if ( !empty ( $ms_plugins)) {
			foreach( $ms_plugins as $ms_plugin) {
				$ms_split_by_backslash = explode('/', $ms_plugin);
				$active_plugins_slug[] = $ms_split_by_backslash[0];
			}
		}
	}
	return $active_plugins_slug;
}