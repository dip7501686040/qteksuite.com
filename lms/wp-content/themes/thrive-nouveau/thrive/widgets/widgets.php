<?php
/**
 * Theme Widgets Module
 *
 * @package thrive
 */
class DunhakdisWidgets {

	public function __construct() {
		
		$this->registerActionHooks();

		return $this;
	}

	public function registerActionHooks() {

		add_action('widgets_init', array($this, 'registerWidgets'));
		return $this;
	}

	public function registerWidgets() {

		register_sidebar( array(
			'name'          => esc_html__( 'Dashboard', 'thrive-nouveau' ),
			'id'            => 'homepage-widgets',
			'description'   => esc_html__('You can use this area to populate the \'Blocks\' of your dashboard.', 'thrive-nouveau'),
			'before_widget' => '<aside data-item-id="0" id="%1$s" class="home-widgets widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title h6">',
			'after_title'   => '</h3>',
		));

		register_sidebar( array(
			'name'          => esc_html__( 'Left Side Navigation', 'thrive-nouveau' ),
			'id'            => 'sidenav-sidebar',
			'description'   => esc_html__('Use this sidebar to display your favourite widgets in the left navigation below the user photo.', 'thrive-nouveau'),
			'before_widget' => '<aside id="%1$s" class="sidebar-widgets buddypress widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title h6">',
			'after_title'   => '</h3>',
		));
		
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'thrive-nouveau' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('This sidebar appears in the single Pages, Posts, and other Post Types.', 'thrive-nouveau'),
			'before_widget' => '<aside id="%1$s" class="sidebar-widgets widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title h6">',
			'after_title'   => '</h3>',
		));

		register_sidebar( array(
			'name'          => esc_html__( 'Archives', 'thrive-nouveau' ),
			'id'            => 'archives-sidebar',
			'description'   => esc_html__('This sidebar appears in the index, author, and taxonomy pages.', 'thrive-nouveau'),
			'before_widget' => '<aside id="%1$s" class="sidebar-widgets archives widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title h6">',
			'after_title'   => '</h3>',
		));		

		if( function_exists('reference_knowledgebase_count') ) 
		{
			register_sidebar( array(
				'name'          => esc_html__( 'Reference KNB', 'thrive-nouveau' ),
				'id'            => 'reference-sidebar',
				'description'   => esc_html__('Use this sidebar to display widgets in your knowledge-base pages powered by "Reference" plugin.', 'thrive-nouveau'),
				'before_widget' => '<aside id="%1$s" class="sidebar-widgets buddypress widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title h6">',
				'after_title'   => '</h3>',
			));
		}

		if ( function_exists('buddypress')) {

			register_sidebar( array(
				'name'          => esc_html__( 'BuddyPress', 'thrive-nouveau' ),
				'id'            => 'bp-sidebar',
				'description'   => esc_html__('Use this sidebar to display your favourite widgets in the BuddyPress area such as members, groups, and activity streams.', 'thrive-nouveau'),
				'before_widget' => '<aside id="%1$s" class="sidebar-widgets buddypress widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title h6">',
				'after_title'   => '</h3>',
			));

			register_sidebar(array(
					'name'	=> esc_html__('BuddyPress Profile', 'thrive-nouveau'),
					'id' => 'buddypress-profile-sidebar',
					'description' => esc_html__('Use this sidebar area to display widgets to your member\'s profile page. In absense of widgets, \'BuddyPress\' sidebar will be used.', 'thrive-nouveau'),
					'before_widget' => '<aside id="%1$s" class="sidebar-widgets buddypress widget %2$s">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h3 class="widget-title h6">',
					'after_title'   => '</h3>',
				));

			register_sidebar(array(
					'name'	=> esc_html__('BuddyPress Members', 'thrive-nouveau'),
					'id' => 'buddypress-members-page-sidebar',
					'description' => esc_html__('Use this sidebar area to display widgets in members page of your site. In absense of widgets, \'BuddyPress\' sidebar will be used.', 'thrive-nouveau'),
					'before_widget' => '<aside id="%1$s" class="sidebar-widgets buddypress widget %2$s">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h3 class="widget-title h6">',
					'after_title'   => '</h3>',
				));

			register_sidebar(array(
					'name'	=> esc_html__('BuddyPress Groups', 'thrive-nouveau'),
					'id' => 'buddypress-groups-page-sidebar',
					'description' => esc_html__('Use this sidebar area to display widgets in groups page of your site. In absense of widgets, \'BuddyPress\' sidebar will be used.', 'thrive-nouveau'),
					'before_widget' => '<aside id="%1$s" class="sidebar-widgets buddypress widget %2$s">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h3 class="widget-title h6">',
					'after_title'   => '</h3>',
				));

			register_sidebar(array(
					'name'	=> esc_html__('BuddyPress Single Group', 'thrive-nouveau'),
					'id' => 'buddypress-single-group-sidebar',
					'description' => esc_html__('Use this sidebar area to display widgets in the single group page. In absense of widgets, \'BuddyPress\' sidebar will be used.', 'thrive-nouveau'),
					'before_widget' => '<aside id="%1$s" class="sidebar-widgets buddypress widget %2$s">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h3 class="widget-title h6">',
					'after_title'   => '</h3>',
				));
		}
		
		$footer_widget_columns = get_theme_mod('thrive_customizer_footer_widget_columns', 'col-md-3' );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer', 'thrive-nouveau' ),
			'id'            => 'sidebar-footer-area',
			'description'   => esc_html__('Choose the widgets to appear before the site footer.', 'thrive-nouveau'),
			'before_widget' => '<div class="footer-widget '.sanitize_html_class( $footer_widget_columns ).'"><aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside></div>',
			'before_title'  => '<h3 class="widget-title h6">',
			'after_title'   => '</h3>',
		));

		if ( in_array( 'sfwd-lms/sfwd_lms.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) 
		{ 
			register_sidebar( array(
				'name'          => esc_html__( 'LearnDash Sidebar', 'thrive-nouveau' ),
				'id'            => 'learndash-sidebar',
				'description'   => esc_html__('Use this sidebar to display widgets in your LearnDash pages', 'thrive-nouveau'),
				'before_widget' => '<aside id="%1$s" class="sidebar-widgets learndash widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title h6">',
				'after_title'   => '</h3>',
			));
		}
		
		return $this;
	}

}

$thriveWidgets = new DunhakdisWidgets();
?>