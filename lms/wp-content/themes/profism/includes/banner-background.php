<?php



/*--- Banner background function for image, color, gradient ---*/

function profism_banner_background() {
	
	//$fornt_img = get_theme_mod('banner_side_img',get_stylesheet_directory_uri() . '/images/home_banner.png');
	$subtitle = get_theme_mod('banner_main_title', __('New Establishment', 'profism'));
	$subpera = get_theme_mod('banner_para', __('We seek out partnerships with many of the world’s top hardware, software', 'profism'));
	$button_text1 = get_theme_mod('banner_btn1_txt', __('Ready to start', 'profism'));
	$button_text2 = get_theme_mod('banner_btn2_txt', __('Contact Us', 'profism'));
	$button_url1 = get_theme_mod('banner_btn1_url', '#');
	$button_url2 = get_theme_mod('banner_btn2_url', '#');
	$site_header_type = get_theme_mod('site_header_type', 'image');
	
	?>
	
	<div class="header-background">
		<div class="header-content">
			<div class="container">
				<div class="row align-center">
				<div class="col-md-12 col-lg-12">
						<div class="col-md-12 banner-text-content" >
							<h1 class="bg-subtitle"><?php echo esc_html( $subtitle ); ?></h1>
							<p class="bg-subpera"><?php echo esc_html( $subpera ); ?></p>
							<?php if(!empty($button_text1)){ ?>
							<div class="banner-btn-div">
							    <a href="<?php echo esc_url( $button_url1 ); ?>" class="bg-banner-button banner-button mt-5"><?php echo esc_html( $button_text1 ); ?></a>&nbsp;&nbsp;
							<?php }?>
							<?php if(!empty($button_text2)){ ?>
							<a href="<?php echo esc_url( $button_url2 ); ?>" class="bg-banner-button2 banner-button mt-5"><?php echo esc_html( $button_text2 ); ?></a>
							</div>
							<?php }?>
						</div>
					</div>
					
				</div>	
			</div>	
		</div>
	</div> 
	
	<?php
	
}


/*--- Banner background function for video ---*/

function profism_banner_video() {

	if ( !function_exists('the_custom_header_markup') ) {
		return;
	}

	$banner_type 	= get_theme_mod( 'banner_type' );

	if ( get_theme_mod('banner_type') == 'video' && is_front_page() ) {
		the_custom_header_markup();
	}
}