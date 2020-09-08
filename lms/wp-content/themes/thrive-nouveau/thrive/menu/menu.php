<?php
/**
 * Theme menu systems
 *
 * @package thrive
 */
class ThriveNouveauMenu {

	public function __construct() {

		$this->registerNavigationMenus();
		$this->registerActionHooks();

		return $this;
	}


	public function registerActionHooks() {

		add_action('after_setup_theme', array($this, 'registerNavigationMenus'));

		return $this;
	}
	
	public function registerNavigationMenus() {

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'primary' => esc_html__('Primary Menu', 'thrive-nouveau'),
			'secondary' => esc_html__('Secondary Menu', 'thrive-nouveau'),
			'topbarmenu' => esc_html__('Top Right Bar', 'thrive-nouveau'),
		));

		return $this;
	}

}

$ThriveNouveauMenu = new ThriveNouveauMenu();
