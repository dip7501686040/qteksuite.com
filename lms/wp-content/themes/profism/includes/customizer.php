<?php

add_action( 'customize_register', 'profism_customize_register' );
function profism_customize_register( $wp_customize ) {
	
	//$wp_customize->get_section( 'header_image' )->panel = 'profism_header_panel';
    $wp_customize->get_section( 'header_image' )->priority = '13';
	$wp_customize->remove_control( 'display_header_text' );
    //$wp_customize->get_section( 'colors' )->priority = '10';
	
	/*--- Header Top Panel ---*/
	$wp_customize->add_panel( 'header_top_panel', array(
		'title' => __( 'Header Top Section', 'profism' ),
		'description' => __( 'Change the font size and color for Site Title, Site Tagline and Menu', 'profism' ), // Include html tags such as <p>.
		'priority' => 1, // Mixed with top-level-section hierarchy.
		) );
		
		//Site Title section
		$wp_customize->add_section( 'site_title_section', array(
			'title' => __( 'Site Title' , 'profism' ),
			'panel' => 'header_top_panel',
			'priority' => 1,
			'capability' => 'edit_theme_options',
			) );
			
			//Site title color
			$wp_customize->add_setting( 'site_title_color', array(
				'capability' => 'edit_theme_options',
				'default' => '#ffffff',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
				) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control(
				$wp_customize, 'site_title_color', array(
					'priority' => 2,
					'section' => 'site_title_section',
					'settings' => 'site_title_color',
					'label' => __( 'Color', 'profism' ),
					'description' => __( 'Change color of site title', 'profism' ),
					) )
				);
		
		//Site Tagline section
		$wp_customize->add_section( 'site_tagline_section', array(
			'title' => __( 'Site Tagline' , 'profism' ),
			'panel' => 'header_top_panel',
			'priority' => 2,
			'capability' => 'edit_theme_options',
			) );
			
			//Tagline color
			$wp_customize->add_setting( 'tagline_color', array(
				'capability' => 'edit_theme_options',
				'default' => '#ffffff',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
				) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control(
				$wp_customize, 'tagline_color', array(
					'priority' => 2,
					'section' => 'site_tagline_section',
					'settings' => 'tagline_color',
					'label' => __( 'Color', 'profism' ),
					'description' => __( 'Change color of site tagline', 'profism' ),
					) ) );
			
	/*--- Header Banner ---*/
	$wp_customize->add_panel( 'header_banner', array(
		'title' => __( 'Header Banner', 'profism' ),
		'description' => __( 'Change the font size and color for Site Title, Site Tagline and Menu', 'profism' ),
		'priority' => 2,
		) );
	
		//Banner type section
		$wp_customize->add_section( 'banner_type_section', array(
			'title' => __( 'Banner Type' , 'profism' ),
			'panel' => 'header_banner',
			'priority' => 1,
			'capability' => 'edit_theme_options',
			) );
		
			//Banner type
			$wp_customize->add_setting( 'banner_type', array(
				'capability' => 'edit_theme_options',
				'default' => 'image',
				'transport' => 'refresh',
				'sanitize_callback' => 'twx_sntz_banner_type',
				) );
			
			$wp_customize->add_control( 'banner_type', array(
				'priority' => 1,
				'type' => 'radio',
				'section' => 'banner_type_section',
				'settings' => 'banner_type',
				'label' => __( 'Fron page banner type', 'profism' ),
				'description' => __( 'Select banner type for front page', 'profism' ),
				'choices' => array(
					'bg-color' => __( 'Background Color', 'profism' ),
					'bg-gradient' => __( 'Background Gradient', 'profism' ),
					'image' => __( 'Background Image', 'profism' ),
					'video' => __( 'Background Video', 'profism' ),
				),
				) );
				
			//Banner height
			$wp_customize->add_setting( 'banner_height', array(
				'capability' => 'edit_theme_options',
				'default' => '700',
				'transport' => 'refresh',
				'sanitize_callback' => 'absint',
				) );
			
			$wp_customize->add_control( 'banner_height', array(
				'priority' => 2,
				'type' => 'number',
				'section' => 'banner_type_section',
				'settings' => 'banner_height',
				'label' => __( 'Height of banner (Default: 700px)', 'profism' ),
				'input_attrs' => array(
					'min' => 0,
					'max' => 2000,
					'step' => 1,
				),
				) );
			
		//Banner background color section
		$wp_customize->add_section( 'banner_bg_color_section', array(
			'title' => __( 'Banner Background: Color' , 'profism' ),
			'panel' => 'header_banner',
			'priority' => 2,
			'capability' => 'edit_theme_options',
			) );
		
			//Banner background color
			$wp_customize->add_setting( 'banner_bg_color', array(
				'capability' => 'edit_theme_options',
				'default' => '#1C76A8',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
				) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control(
				$wp_customize, 'banner_bg_color', array(
					'priority' => 1,
					'section' => 'banner_bg_color_section',
					'settings' => 'banner_bg_color',
					'label' => __( 'Background Color', 'profism' ),
					'description' => __( 'Change background color of banner', 'profism' ),
				) ) );
			
		//Banner background Gradient section
		$wp_customize->add_section( 'banner_bg_gradient_section', array(
			'title' => __( 'Banner Background: Gradient' , 'profism' ),
			'panel' => 'header_banner',
			'priority' => 3,
			'capability' => 'edit_theme_options',
			'description' => __( 'Choose the colors below to give gradient background to your banner', 'profism' ),
			) );
		
			//Banner background Gradient 1
			$wp_customize->add_setting( 'banner_bg_gradient_1', array(
				'capability' => 'edit_theme_options',
				'default' => '#1C76A8',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
				) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control(
				$wp_customize, 'banner_bg_gradient_1', array(
					'priority' => 1,
					'section' => 'banner_bg_gradient_section',
					'settings' => 'banner_bg_gradient_1',
					'label' => __( 'Gradient color 1', 'profism' ),
					'description' => __( 'Add 1st Gradient color', 'profism' ),
					) ) );
			
			//Banner background Gradient 2
			$wp_customize->add_setting( 'banner_bg_gradient_2', array(
				'capability' => 'edit_theme_options',
				'default' => '#3DC5EF',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
				) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control(
				$wp_customize, 'banner_bg_gradient_2', array(
					'priority' => 2,
					'section' => 'banner_bg_gradient_section',
					'settings' => 'banner_bg_gradient_2',
					'label' => __( 'Gradient color 2', 'profism' ),
					'description' => __( 'Add 2nd Gradient color', 'profism' ),
					) ) );
			
			//Banner background Gradient 3
			$wp_customize->add_setting( 'banner_bg_gradient_3', array(
				'capability' => 'edit_theme_options',
				'default' => '#A4DAF6',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
				) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control(
				$wp_customize, 'banner_bg_gradient_3', array(
					'priority' => 3,
					'section' => 'banner_bg_gradient_section',
					'settings' => 'banner_bg_gradient_3',
					'label' => __( 'Gradient color 3', 'profism' ),
					'description' => __( 'Add 3rd Gradient color', 'profism' ),
					) ) );
		
		//Banner background image section
		$wp_customize->add_section( 'banner_bg_img_section', array(
			'title' => __( 'Banner Background: Image' , 'profism' ),
			'panel' => 'header_banner',
			'priority' => 4,
			'capability' => 'edit_theme_options',
			'description' => __( 'Upload image and set other settings for banner background', 'profism' ),
			) );
		
			//Banner background image
			$wp_customize->add_setting( 'banner_bg_img', array(
				'capability' => 'edit_theme_options',
				'default' => get_stylesheet_directory_uri() . '/images/other_pages_bg.jpg',
				'transport' => 'refresh',
				'sanitize_callback' => 'esc_url_raw',
				) );
			
			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize, 'banner_bg_img', array(
					'priority' => 1,
					'type' => 'image',
					'section' => 'banner_bg_img_section',
					'settings' => 'banner_bg_img',
					'label' => __( 'Upload image for background', 'profism' ),
					) ) );
			
			//Background size
			$wp_customize->add_setting( 'banner_bg_size', array(
				'capability' => 'edit_theme_options',
				'default' => 'cover',
				'transport' => 'refresh',
				'sanitize_callback' => 'twx_sntz_bg_size',
				) );
			
			$wp_customize->add_control( 'banner_bg_size', array(
				'priority' => 2,
				'type' => 'radio',
				'section' => 'banner_bg_img_section',
				'settings' => 'banner_bg_size',
				'label' => __( 'Banner background size', 'profism' ),
				'choices' => array(
					'cover' => __( 'cover', 'profism' ),
					'contain' => __( 'contain', 'profism' ),
				),
				) );
			
			//Background position
			$wp_customize->add_setting( 'banner_bg_pos', array(
				'capability' => 'edit_theme_options',
				'default' => 'center-center',
				'transport' => 'refresh',
				'sanitize_callback' => 'twx_sntz_bg_pos',
				) );
			
			$wp_customize->add_control( 'banner_bg_pos', array(
				'priority' => 3,
				'type' => 'select',
				'section' => 'banner_bg_img_section',
				'settings' => 'banner_bg_pos',
				'label' => __( 'Banner background position', 'profism' ),
				'choices' => array(
					'top-left' => __( 'top left', 'profism' ),
					'top-center' => __( 'top center', 'profism' ),
					'top-right' => __( 'top right', 'profism' ),
					'center-left' => __( 'center left', 'profism' ),
					'center-center' => __( 'center center', 'profism' ),
					'center-right' => __( 'center right', 'profism' ),
					'bottom-left' => __( 'bottom left', 'profism' ),
					'bottom-center' => __( 'bottom center', 'profism' ),
					'bottom-right' => __( 'bottom right', 'profism' ),
				),
				) );
			
			//Background repeat
			$wp_customize->add_setting( 'banner_bg_repeat', array(
				'capability' => 'edit_theme_options',
				'default' => 1,
				'transport' => 'refresh',
				'sanitize_callback' => 'twx_sntz_checkbox',
				) );
			
			$wp_customize->add_control( 'banner_bg_repeat', array(
				'priority' => 4,
				'type' => 'checkbox',
				'section' => 'banner_bg_img_section',
				'settings' => 'banner_bg_repeat',
				'label' => __( 'Banner background no-repeat', 'profism' ),
				) );
			
		//Banner content section
		$wp_customize->add_section( 'banner_content_section', array(
			'title' => __( 'Banner content' , 'profism' ),
			'panel' => 'header_banner',
			'priority' => 5,
			'capability' => 'edit_theme_options',
			'description' => __( 'Form here you can change the text of all titles, subititle and paragraph present on banner', 'profism' ),
			) );
		
			//Banner main title
			$wp_customize->add_setting( 'banner_main_title', array(
				'capability' => 'edit_theme_options',
				'default' => __( 'New Establishment', 'profism' ),
				'transport' => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				) );
			
			$wp_customize->add_control( 'banner_main_title', array(
				'priority' => 1,
				'type' => 'text',
				'section' => 'banner_content_section',
				'settings' => 'banner_main_title',
				'label' => __( 'Banner main title', 'profism' ),
				) );
			
			//Banner paragraph
			$wp_customize->add_setting( 'banner_para', array(
				'capability' => 'edit_theme_options',
				'default' => __( 'We seek out partnerships with many of the world’s top hardware, software', 'profism' ),
				'transport' => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				) );
			
			$wp_customize->add_control( 'banner_para', array(
				'priority' => 3,
				'type' => 'textarea',
				'section' => 'banner_content_section',
				'settings' => 'banner_para',
				'label' => __( 'Banner paragraph', 'profism' ),
				) );
			
			//Banner button1 text
			$wp_customize->add_setting( 'banner_btn1_txt', array(
				'capability' => 'edit_theme_options',
				'default' => __( 'Ready to start', 'profism' ),
				'transport' => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				) );
			
			$wp_customize->add_control( 'banner_btn1_txt', array(
				'priority' => 4,
				'type' => 'text',
				'section' => 'banner_content_section',
				'settings' => 'banner_btn1_txt',
				'label' => __( 'Banner 1st button text', 'profism' ),
				) );
			
			//Banner button1 url
			$wp_customize->add_setting( 'banner_btn1_url', array(
				'capability' => 'edit_theme_options',
				'default' => __( '#', 'profism' ),
				'transport' => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				) );
			
			$wp_customize->add_control( 'banner_btn1_url', array(
				'priority' => 5,
				'type' => 'text',
				'section' => 'banner_content_section',
				'settings' => 'banner_btn1_url',
				'label' => __( 'Banner 1st button url', 'profism' ),
				) );
			
			//Banner button2 text
			$wp_customize->add_setting( 'banner_btn2_txt', array(
				'capability' => 'edit_theme_options',
				'default' => __( 'Contact Us', 'profism' ),
				'transport' => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				) );
			
			$wp_customize->add_control( 'banner_btn2_txt', array(
				'priority' => 6,
				'type' => 'text',
				'section' => 'banner_content_section',
				'settings' => 'banner_btn2_txt',
				'label' => __( 'Banner 2nd button text', 'profism' ),
				) );
			
			//Banner button2 url
			$wp_customize->add_setting( 'banner_btn2_url', array(
				'capability' => 'edit_theme_options',
				'default' => __( '#', 'profism' ),
				'transport' => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				) );
			
			$wp_customize->add_control( 'banner_btn2_url', array(
				'priority' => 7,
				'type' => 'text',
				'section' => 'banner_content_section',
				'settings' => 'banner_btn2_url',
				'label' => __( 'Banner 2nd button url', 'profism' ),
				) );
				
	
	/*--- General settings ---*/
	$wp_customize->add_panel( 'general_settings', array(
		'title' => __( 'General settings', 'profism' ),
		'priority' => 3,
		) );
		
		//Page padding section
		$wp_customize->add_section( 'page_padding', array(
			'title' => __( 'Main page padding' , 'profism' ),
			'panel' => 'general_settings',
			'priority' => 1,
			'capability' => 'edit_theme_options',
			'description' => __( 'Form here you can change the top and bottom padding of page', 'profism' ),
			) );
		
			//Top padding between header and page
			$wp_customize->add_setting( 'page_top_padding', array(
				'capability' => 'edit_theme_options',
				'default' => '80',
				'transport' => 'refresh',
				'sanitize_callback' => 'absint',
				) );
			
			$wp_customize->add_control( 'page_top_padding', array(
				'priority' => 1,
				'type' => 'number',
				'section' => 'page_padding',
				'settings' => 'page_top_padding',
				'label' => __( 'Space between header and page content (in px)', 'profism' ),
				'input_attrs' => array(
					'min' => 0,
					'max' => 500,
					'step' => 1,
				),
				) );
				
			//Bottom padding between footer and page
			$wp_customize->add_setting( 'page_bottom_padding', array(
				'capability' => 'edit_theme_options',
				'default' => '80',
				'transport' => 'refresh',
				'sanitize_callback' => 'absint',
				) );
			
			$wp_customize->add_control( 'page_bottom_padding', array(
				'priority' => 2,
				'type' => 'number',
				'section' => 'page_padding',
				'settings' => 'page_bottom_padding',
				'label' => __( 'Space between footer and page content (in px)', 'profism' ),
				'input_attrs' => array(
					'min' => 0,
					'max' => 500,
					'step' => 1,
				),
				) );
			
	/*--- Blogs panel ---*/
	$wp_customize->add_panel( 'theme_blog_panel', array(
		'title' => __( 'Blogs Panel', 'profism' ),
		'priority' => 4,
		) );
		
		//Blog layout
		$wp_customize->add_section( 'theme_blog_layout', array(
			'title' => __( 'Blog layout' , 'profism' ),
			'panel' => 'theme_blog_panel',
			'priority' => 1,
			'capability' => 'edit_theme_options',
			) );
			
			//Blog type
			$wp_customize->add_setting( 'theme_blog_type', array(
				'capability' => 'edit_theme_options',
				'default' => 'special',
				'transport' => 'refresh',
				'sanitize_callback' => 'twx_sntz_blog_type',
				) );
			
			$wp_customize->add_control( 'theme_blog_type', array(
				'priority' => 1,
				'type' => 'radio',
				'section' => 'theme_blog_layout',
				'settings' => 'theme_blog_type',
				'label' => __( 'Select blog layout', 'profism' ),
				'description' => __( 'This will change the styling of blogs on blog and single blog page', 'profism' ),
				'choices' => array(
					'default' => __( 'Default', 'profism' ),
					'special' => __( 'Special', 'profism' ),
				),
				) );
				
			//Show/hide sidebar on blog page
			$wp_customize->add_setting( 'show_sidebar', array(
				'capability' => 'edit_theme_options',
				'default' => 1,
				'transport' => 'refresh',
				'sanitize_callback' => 'twx_sntz_checkbox',
				) );
			
			$wp_customize->add_control( 'show_sidebar', array(
				'priority' => 2,
				'type' => 'checkbox',
				'section' => 'theme_blog_layout',
				'settings' => 'show_sidebar',
				'label' => __( 'Check this box to show sidebar on blogs page', 'profism' ),
				) );
				
			//Show/hide sidebar on single blog page
			$wp_customize->add_setting( 'show_sidebar_single', array(
				'capability' => 'edit_theme_options',
				'default' => 1,
				'transport' => 'refresh',
				'sanitize_callback' => 'twx_sntz_checkbox',
				) );
			
			$wp_customize->add_control( 'show_sidebar_single', array(
				'priority' => 3,
				'type' => 'checkbox',
				'section' => 'theme_blog_layout',
				'settings' => 'show_sidebar_single',
				'label' => __( 'Check this box to show sidebar on single blog page', 'profism' ),
				) );
				
	/*--- Colors panel ---*/		
	
			//Primary color
			$wp_customize->add_setting( 'primary_color', array(
				'capability' => 'edit_theme_options',
				'default' => '#7F7F7D',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
				) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control(
				$wp_customize, 'primary_color', array(
					'priority' => 1,
					'section' => 'colors',
					'settings' => 'primary_color',
					'label' => __( 'Primary color', 'profism' ),
					'description' => __( 'Change in this color will change the primary color of whole theme', 'profism' ),
					) ) );
					
			//Theme text color
			$wp_customize->add_setting( 'theme_text_color', array(
				'capability' => 'edit_theme_options',
				'default' => '#8e88aa',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
				) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control(
				$wp_customize, 'theme_text_color', array(
					'priority' => 2,
					'section' => 'colors',
					'settings' => 'theme_text_color',
					'label' => __( 'Theme text color', 'profism' ),
					'description' => __( 'Change in this color will change the text color of whole theme (basically all paragraphs).', 'profism' ),
					) ) );
					
	// Register upsell
	$wp_customize->register_section_type( 'Profism_Upsell' );
	class Profism_Upsell extends WP_Customize_Section {
        public $type = 'upsell';
        public $url = '';
		public $text = '';
		
		public function json() {
			$array = parent::json();
			$array['text'] = $this->text;
			$array['url'] = esc_url( $this->url );
			return $array;
		}
        protected function render_template() {
		?>
			<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
				<a href="{{ data.url }}">
					<h3 class="accordion-section-title" tabindex="0">
						{{ data.text }}
						<span class="dashicons dashicons-arrow-right-alt"></span>
					</h3>
				</a>
			</li>
		<?php
        }
    }
	
	$wp_customize->add_section( new Profism_Upsell( $wp_customize, 'upsell', array(
		'title' => __('upsell', 'profism'),
        'text' => 'Pro Features',
        'url' => 'https://themeworx.net/details/corporate/profism-pro',
        'priority' => 0
        ) )
    );
}

/*--- All Sanitize callback functions used in customizer ---*/

function twx_sntz_banner_type( $value ){
	$valid = array(
        'bg-color' => __( 'Color', 'profism' ),
		'bg-gradient' => __( 'Gradient', 'profism' ),
		'image' => __( 'Image', 'profism' ),
		'video' => __( 'Video', 'profism' ),
		'carousel' => __( 'Background Carousel', 'profism' ),
	);
	return ( array_key_exists( $value, $valid ) ? $value : '' );
}

function profism_sanitize_menu( $value ){
	$valid = array(
		'sticky'   => __('Sticky', 'profism'),
		'static'   => __('Static', 'profism'),
	);
	return ( array_key_exists( $value, $valid ) ? $value : '' );
}

function twx_sntz_bg_size( $value ){
	$valid = array(
		'cover'     => __('Cover', 'profism'),
		'contain'   => __('Contain', 'profism'),
	);
	return ( array_key_exists( $value, $valid ) ? $value : '' );
}

function twx_sntz_bg_pos( $value ){
	$valid = array(
		'top-left' => __( 'top left', 'profism' ),
		'top-center' => __( 'top center', 'profism' ),
		'top-right' => __( 'top right', 'profism' ),
		'center-left' => __( 'center left', 'profism' ),
		'center-center' => __( 'center center', 'profism' ),
		'center-right' => __( 'center right', 'profism' ),
		'bottom-left' => __( 'bottom left', 'profism' ),
		'bottom-center' => __( 'bottom center', 'profism' ),
		'bottom-right' => __( 'bottom right', 'profism' ),
	);
	return ( array_key_exists( $value, $valid ) ? $value : '' );
}

function twx_sntz_blog_type( $value ){
	$valid = array(
		'default'           => __( 'Default', 'profism' ),
		'special'       => __( 'Special', 'profism' )
	);
	return ( array_key_exists( $value, $valid ) ? $value : '' );
}

function twx_sntz_checkbox( $value ) {
	//returns true if checkbox is checked
    return ( $value == 1 ? 1 : '' );
}

function profism_sanitize_widget_area($value){
	$valid = array(
		'1'     => __('One', 'profism'),
		'2'     => __('Two', 'profism'),
		'3'     => __('Three', 'profism'),
		'4'     => __('Four', 'profism')
	);
	return ( array_key_exists( $value, $valid ) ? $value : '' );
}

function profism_sanitize_wc_content($value){
	$valid = array(
		'left'    => __('Left', 'profism'),
		'right'     => __('Right', 'profism'),
	);
	return ( array_key_exists( $value, $valid ) ? $value : '' );
}

function profism_sanitize_image( $input ){
 
    /* default output */
    $value = '';
 
    /* check file type */
    $filetype = wp_check_filetype( $input );
    $mime_type = $filetype['type'];
 
    /* only mime type "image" allowed */
    if ( strpos( $mime_type, 'image' ) !== false ){
        $value = $input;
    }
 
    return $value;
}