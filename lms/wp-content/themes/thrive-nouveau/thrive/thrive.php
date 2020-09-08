<?php
/**
 * Thrive Custom Components
 * Theme Mods Customiser, Widgets, etc.
 *
 * @since 1.0
 */
$components = array(
		'theme-widgets/featured-group',
		'theme-widgets/featured-member',
		'theme-widgets/members-birthday',
		'widgets/widgets',
		'user-navigation/user-navigation',
		'sidebars/sidebars',
		'colors/collections',
		'menu/menu',
	);

foreach ( $components as $component ) {
	require_once get_template_directory() . '/thrive/' . $component . '.php';
}
?>
