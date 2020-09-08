<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! class_exists('DemoConfig') ) 
{
class DemoConfig {
	
	protected $demos = array();

	public function __construct() 
	{
		$this->demos = apply_filters(
				'dsc_demo_installer_demos',
				array(
					'demo-1' => array(
						'name' => esc_html__('Sample Demo', 'thrive-nouveau'),
						'id' => 'demo-1',
						'image' => 'http://via.placeholder.com/320x225'
					)
				)
			);
	}

	public function get( $demo_id = 'demo-1' ) 
	{
		return $this->demos[$demo_id];
	}

	public function getAll() {
		return $this->demos;
	}

}
}
